## Squash migrations
### Result is the file generated is located to ./database/schema
php artisan schema:dump


### Pruning migration
php artisan migrate:reset <br/>
then <br/>
php artisan schema:dump --prune
