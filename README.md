# Scottiiiie
This project is the documentation of the mandatory assignment in System Architecture and Security course.

# Prerequisites
. PHP 5.5 or higher
. PHP5-mysql enabled in php.ini (extention=pdo_mysql.so/.dll)
. Composer
. MySQL running (Require having a database schema named scottiiiie)

# Setup
1. Clone git repo
2. Open terminal/cmd and cd to the project's root folder.
3. Change .env to reflect your username and password for MySQL.
4. Run the command "composer install" to download necessary frameworks.
5. Run the command "php artisan clear-compiled" to remove optimized files.
6. Run the command "php artisan migrate" to generate the tables necessary.
7. Run the command "php artisan serve" to run the application.