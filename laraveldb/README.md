## Squash migrations
### Result is the file generated is located to ./database/schema
php artisan schema:dump


### Pruning migration
php artisan migrate:reset <br/>
then <br/>
php artisan schema:dump --prune


### Adding columns
php artisan make:migration add_new_col_in_specified_tbl --table=tabl_you_want_to_add_col


### Renaming columns
php artisan make:migration rename_col_in_tbl --table=tbl_you_want_to_renames
