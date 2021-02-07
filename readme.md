## About This Project

This project is a simple posts comment system on top of Laravel 5.6 and Vue.js.

How to run the application using Laradock?

1. Clone the repository.
2. Clone laradock inside the project directory, check the 'Quick Overview' section for instruction. See https://laradock.io
3. If you have docker already installed, have it running, Otherwise you can download docker (https://www.docker.com/products/docker-desktop) and install it first.
4. Open terminal, navigate into the laradock directory and run _docker-compose up -d nginx mysql_, press enter and wait while container is being setup.
5. Run package manager to install dependencies, navigate into the projects root directory and run, _npm install_.
6. Install Laravel dependencies by running, _composer install_.
7. Create you Laravel's .env file and configure your database credentials, you can check for the credentials in Laradock's .env file in line 334.
8. Run migration to setup database tables,type in _php artisan migrate_.
9. Open your browser and type localhost in the address bar.


## NOTE

_If you happen to encounter connection refused error while running migration, try to change DB_HOST = 127.0.0.1 in Laravel's .env file._

