
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

10. Load Fixtures Data
php app/console doctrine:fixtures:load --append
In our case we will using `backend` environment
php app/console doctrine:fixtures:load --append --env backend

11. Install bower:
npm install -g bower

12. Install additional libraries:
bower install jquery bootstrap fontawesome highlight Chart.js symfony-collection

13. Install gulp libraries:
npm install --global gulp
npm install --save-dev gulp
npm install gulp-if gulp-uglify gulp-uglifycss gulp-less gulp-concat gulp-sourcemaps

14. Run all scripts fron gulpfile.js:
gulp

15. Generate sonata admin class:
php app/console sonata:admin:generate Tim\DataBundle\Entity\Logger
php app/console sonata:admin:generate Tim\DataBundle\Entity\Configuration
php app/console sonata:admin:generate Tim\DataBundle\Entity\IpAddress

16. Add icons to dashboard menu. See services.yml

17. Install two versions of the same library:
bower install jquery-legacy=jquery#1 jquery-modern=jquery#2 jquery-new=jquery#3
bower install select2-prev=select2#3 select2-current=select2#4

18. Install bootstrap datetime picker
bower install eonasdan-bootstrap-datetimepicker#latest --save

