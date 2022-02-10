init:
	docker-compose build --parallel
	docker-compose up -d
	docker-compose exec --user=www-data php composer install
	docker-compose exec --user=www-data php bin/console lexik:jwt:generate-keypair --skip-if-exists

stop:
	docker-compose down