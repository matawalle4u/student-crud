# Do not remove this block. It is used by the 'help' rule when
# constructing the help output.
# help:
# help: matawalle help
# help:

.PHONY: help
# help: help				- Please use "make <target>" where <target> is one of
help:
	@grep "^# help\:" Makefile | sed 's/\# help\: //' | sed 's/\# help\://'

.PHONY: b
# help: b 				- Build the image
b:
	@#echo "Y" | docker builder prune
	@docker-compose --project-name matawalle up --detach --build
