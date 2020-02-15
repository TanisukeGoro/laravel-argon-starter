.PHONY: docker-reset-db
docker-reset-db:
	docker-compose exec app php artisan migrate:refresh --seed 

.PHONY: docker-down
docker-down:
	docker-compose down -v

.PHONY: docker-argon-update
docker-argon-update:
	docker-compose exec app composer require laravel-frontend-presets/argon
	docker-compose exec app php artisan preset argon
	docker-compose exec app composer dump-autoload

.PHONY: docker-destory
docker-destory:
	docker-compose down -v --rmi all
	
.PHONY: first-install
first-install:
	cp .env.example .env
	docker-compose up -d
	docker-compose exec app composer install
	docker-compose exec app composer require laravel-frontend-presets/argon
	docker-compose exec app php artisan preset argon
	docker-compose exec app composer dump-autoload
	# add commit template
	git config commit.template .commit_template