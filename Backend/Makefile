.PHONY: coverage

EXEC_PHP=docker exec -i -t app.php.rover-discovery-squad

up:
	docker buildx build -t php/php8 etc/devel/docker/php
	docker run -v .:/app -w='/app' -d -it --rm --name app.php.rover-discovery-squad php/php8
	$(EXEC_PHP) composer install

down:
	docker stop app.php.rover-discovery-squad

bash:
	$(EXEC_PHP) bash

unit:
	$(EXEC_PHP) vendor/bin/phpunit

coverage:
	$(EXEC_PHP) vendor/bin/phpunit --coverage-html coverage
