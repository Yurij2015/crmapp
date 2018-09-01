test:
	vendor/bin/codecept run
migration:
	php yii migrate
newmigration:
	php yii migrate/create
start:
	make migration
	composer install
