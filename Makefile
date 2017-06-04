
DOCKER_IMAGE=jekyll/jekyll:pages
PORT=4444
SERVE=jekyll serve --watch
BUILD=jekyll build

serve:
	$(SERVE)

docker_serve:
	docker run -it --volume=`pwd`:/srv/jekyll --publish $(PORT):4000 $(DOCKER_IMAGE) $(SERVE)

docker_build:
	docker run --rm --volume=`pwd`:/srv/jekyll $(DOCKER_IMAGE) $(BUILD) 

# Migration

RSS_SOURCE=http://blog.postgresql.fr/index.php?feed/atom
RSS_SOURCE=blog.pgfr.rss

import:
	ruby -rubygems -e 'require "jekyll-import"; JekyllImport::Importers::RSS.run({"source" => "$(RSS_SOURCE)"})'

