## Squash migrations
### Result is the file generated is located to ./database/schema
php artisan schema:dump


### Pruning migration
php artisan migrate:reset <br/>
then <br/>
php artisan schema:dump --prune


### Adding columns, Renaming columns, Delete column
php artisan make:migration verb_col_in_tbl --table=tbl_you_want_to_renames

### Factories and Seeders
Seeders - real is needed.<br/>
Factories - used when generating fake data.

#### Creating Factories
php artisan make:factory PostFactory <br/>
php artisan make:model TableName -f (-f flag would generate a factory)


#### Creating Seeders 
php artisan make:seeder PostSeeder <br/>
php artisan db:seed (only works when you add the factory inside the factory seeder.) <br/>
or  php artisan db:seed --class=NameOfSeeder
<br/>
php artisan migrate --seed will migrate first all migrations then seed
