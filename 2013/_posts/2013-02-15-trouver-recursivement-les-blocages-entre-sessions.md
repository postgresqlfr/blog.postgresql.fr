---
layout: post
title: "Trouver récursivement les blocages entre sessions."
author: "marc.cousin"
redirect_from: "index.php?post/2013-02-15-trouver-recursivement-les-blocages-entre-sessions "
---




<!--more-->


!!!! Problématique



C'est quelque chose qu'on rencontre régulièrement en production: une session idle in transaction qui a un verrou sur quelque chose, qui bloque une autre sesssion qui veut acquérir un verrou dessus. Cette autre session a elle même un verrou sur un autre objet, qui bloque une troisième session, et ainsi de suite.



À résoudre à la main, c'est toujours pénible. Pas compliqué, mais ça prend du temps, dans un contexte où on a souvent quelques utilisateurs bloqués qui vous râlent dans les oreilles, voire un chef qui vous souffle dans le cou, pour les plus malchanceux.



!!!! Solution



On doit donc pouvoir résoudre ça avec une requête qui, pour chaque session bloquée, remonte les verrous jusqu'à la source du problème. --En espérant ne pas m'être trompé, voici une requête qui fait exactement ça (testée sur un cas raisonnablement simple en 9.2):-- En m'étant bien trompé, voici une version améliorée (j'espère que cette fois-ci c'est bon, j'ai eu un cas réel pour la tester).



///

with recursive conflicting_locks(lock,conflicts) as

  (

    values ('AccessShareLock','{"AccessExclusiveLock"}'::text[]),

           ('RowShareLock','{"AccessExclusiveLock","ExclusiveLock"}'),

           ('RowExclusiveLock','{"AccessExclusiveLock","ExclusiveLock","ShareRowExclusiveLock","ShareLock"}'),

           ('ShareUpdateExclusiveLock','{"AccessExclusiveLock","ExclusiveLock","ShareRowExclusiveLock","ShareLock","ShareUpdateExclusiveLock"}'),

           ('ShareLock','{"AccessExclusiveLock","ExclusiveLock","ShareRowExclusiveLock","ShareUpdateExclusiveLock","RowExclusiveLock"}'),

           ('ShareRowExclusiveLock','{"AccessExclusiveLock","ExclusiveLock","ShareRowExclusiveLock","ShareLock","ShareUpdateExclusiveLock","RowExclusiveLock"}'),

           ('ExclusiveLock','{"AccessExclusiveLock","ExclusiveLock","ShareRowExclusiveLock","ShareLock","ShareUpdateExclusiveLock","RowExclusiveLock","RowShareLock"}'),

           ('AccessExclusiveLock','{"AccessExclusiveLock","ExclusiveLock","ShareRowExclusiveLock","ShareLock","ShareUpdateExclusiveLock","RowExclusiveLock","RowShareLock","AccessShareLock"}')

  ),

    tmplocks(pid,lockingpid,lock,granted) as

  (

   select distinct l.pid, rl.pid as lockingpid, coalesce(l.relation::text,l.virtualxid::text,l.transactionid::text) as lock ,rl.granted

   from pg_locks rl

   join pg_locks l

     on (coalesce(rl.relation::text,rl.virtualxid::text,rl.transactionid::text)=coalesce(l.relation::text,l.virtualxid::text,l.transactionid::text)

         and rl.pid<>l.pid)

   where l.granted

   and not rl.granted

   and l.locktype <> 'tuple' and rl.locktype <> 'tuple'

   and exists (SELECT 1 FROM conflicting_locks WHERE conflicting_locks.lock=l.mode AND rl.mode=ANY(conflicting_locks.conflicts))

),

   locks (pid,lockingpid,tree) as

  (

        select pid,lockingpid,'{}'::int[]||pid from tmplocks where not granted

        UNION ALL

        select tmplocks.pid,tmplocks.lockingpid,tree || tmplocks.pid from tmplocks join locks on (tmplocks.pid=locks.lockingpid)

  )

select tree||lockingpid as wholockswho from locks limit 1000000

///



Pour les curieux, voila comment elle fonctionne:



La première CTE, conflicting_locks, définit quel lock est en conflit avec un tableau des autres



La deuxième CTE, tmplocks, retourne tous les verrous non accordés (not granted), le pid de celui qui est bloqué, le pid de celui qui possède le verrou, et le verrou. On utilise conflicting_locks pour vérifier que les verrous sont en conflits, et on ignore les verrous de type type (ils sont temporaires, et ne devraient pas engendrer de conflit).



La troisième fait la récursion: pour chaque session verrouillée, on détermine qui la verrouille. Si celle qui verrouille est elle même verrouillée, on continue la récursion. On stocke dans «tree» les pid de la récursion.



Le select final rajoute à tree le pid final (qui n'a pas été stocké durant la récursion, puisque lui n'est pas bloqué).



Voila le résultat que j'obtiens dans mon environnement de test:



///

  wholockswho  |  treelock  

---------------+------------

 {7993,5179}   | {16160479}

 {23390,4245}  | {16154891}

 {20285,23384} | {16158008}

 {32125,23389} | {16161532}

 {23390,21069} | {16154891}

 {23390,9236}  | {16154891}

 {3556,23393}  | {16164983}

 {17780,7982}  | {16156626}

 {23386,23372} | {16158053}

 {7988,21070}  | {16155665}

 {466,6498}    | {16163682}

 {23390,21158} | {16154891}

 {3556,464}    | {16164983}

 {7993,19567}  | {16160479}

 {13206,32122} | {16158730}

 {3556,5170}   | {16164983}

 {23390,24163} | {16154891}

 {6499,3121}   | {16165246}

 {23390,7990}  | {16154891}

 {21065,20438} | {16153879}

 {23390,23394} | {16154891}

 {21065,23385} | {16153879}

 {23390,24164} | {16154891}

 {23286,3554}  | {16161392}

 {23390,32111} | {16154891}

 {3556,6497}   | {16164983}

 {23386,7994}  | {16158053}

 {21065,17795} | {16153879}

 {20285,5176}  | {16158008}

 {6499,32127}  | {16165246}

 {6499,21063}  | {16165246}

 {23390,20442} | {16154891}

 {7789,6500}   | {16166302}

 {12749,465}   | {16159721}

 {5174,24166}  | {16163923}

 {23390,5173}  | {16154891}

 {466,32000}   | {16163682}

///



On voit que le pid 23390 en gène un bon paquet d'autres. C'est un bon candidat à l'extermination (c'est une session IDLE in transaction…)



Si vous voyez des cas que j'ai raté, ou une amélioration de cette requête, n'hésitez pas à poster en-dessous…