.PHONY: coverage

EXEC_PHP=docker exec -i -t app.php.rover-discovery-squad
SAMPLE_SCRIPT=src/Rover/UserInterface/RoverSquadExplore/Cartesian/Cardinal/Script/cartesian-cardinal-rover-squad-explore.php

up:
	docker buildx build -t php/php8 etc/devel/docker/php
	docker run -v .:/app -w='/app' -d -it --rm --name app.php.rover-discovery-squad php/php8
	$(EXEC_PHP) composer install

down:
	docker stop app.php.rover-discovery-squad

bash:
	$(EXEC_PHP) bash

unit:
	$(EXEC_PHP) vendor/bin/phpunit --testsuite Unit

integration:
	$(EXEC_PHP) vendor/bin/phpunit --testsuite Integration

acceptance:
	$(EXEC_PHP) vendor/bin/phpunit --testsuite Acceptance

tests:
	$(EXEC_PHP) vendor/bin/phpunit

coverage:
	$(EXEC_PHP) vendor/bin/phpunit --coverage-html coverage

sample:
	$(EXEC_PHP) php $(SAMPLE_SCRIPT) 5 5 1 2 N LMLMLMLMM 3 3 E MMRMMRMRRM
