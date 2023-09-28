up:
	docker buildx build -t php/php8 etc/devel/docker/php
	docker run -v .:/app -w='/app' -d -it --rm --name app.php php/php8

down:
	docker stop app.php

bash:
	docker exec -i -t app.php bash