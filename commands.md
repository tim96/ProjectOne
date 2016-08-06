
1. Generate bundle:
php app/console generate bundle

2. Update packages:
php composer.phar update

3. Install assets:
php app/console assets:install

4. Clear cache:
php app/console cache:clear

5. Create database:
php app/console doctrine:database:create

6. Generate entity:
php app/console doctrine:generate:entity --entity User
php app/console doctrine:generate:entity --entity Group

7. Get all routes in project:
php app/console router:debug > router.log

8. Generate methods in entity class
php app/console doctrine:generate:entities TimDataBundle

9. Update database schema
php app/console doctrine:schema:update --force --dump-sql
php app/console doctrine:schema:update --force --dump-sql > migration.log

