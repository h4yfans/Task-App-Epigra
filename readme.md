
## TaskApp with Laravel 

## System Requirements
TaskApp is designed to run on a  machine with PHP 5.5.9 and MySQL 5.5.

* PHP >= 5.5.9 with
    
## Installation
Please check the system requirements before installing TaskApp.

1. You may install by cloning from github.
  * Github:
    * `git@github.com:h4yfans/Task-App-Epigra.git`
    * From a command line open in the folder, run `composer install`.
2. Go to your `homestead.yaml` file and add your project path under `sites` and add your db name under `databases`
3. Run `vagrant up`
4. Run `php artisan serve` or edit your `host` file and add 'localhost' or `192.168.10.10`(vagrant)
5. Or just use XAMPP. Extract the files into `htdocs` modify `.env` and run `php artisan server`


### PHP Libraries
* [laravel/laravel](https://github.com/laravel/laravel) - A PHP Framework For Web Artisans
