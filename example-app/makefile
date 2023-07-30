build:
	@docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(shell pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

	@cp .env.example .env
	
	@./vendor/bin/sail up -d
	@./vendor/bin/sail artisan key:generate
	@./vendor/bin/sail yarn install
	@./vendor/bin/sail yarn dev