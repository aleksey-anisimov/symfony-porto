init:
	docker-compose build --parallel
	docker-compose up -d
	docker-compose exec --user=www-data php composer install
	docker-compose exec --user=www-data php bin/console lexik:jwt:generate-keypair --skip-if-exists
	docker-compose exec --user=www-data php bin/console doctrine:migrations:migrate -n

stop:
	docker-compose down