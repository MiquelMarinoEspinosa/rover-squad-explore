EXEC_PHP=docker exec -i -t app.php

up:
	docker buildx build -t php/php8 etc/devel/docker/php
	docker run -v .:/app -w='/app' -d -it --rm --name app.php php/php8

down:
	docker stop app.php

bash:
	$(EXEC_PHP) bash

unit:
	$(EXEC_PHP) vendor/bin/phpunit