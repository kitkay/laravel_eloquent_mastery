## Squash migrations
### Result is the file generated is located to ./database/schema
php artisan schema:dump


### Pruning migration
php artisan migrate:reset <br/>
then <br/>
php artisan schema:dump --prune


### Adding columns, Renaming columns, Delete column
php artisan make:migration verb_col_in_tbl --table=tbl_you_want_to_renames
