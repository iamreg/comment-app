## About This Project

This project is a simple posts comment system on top of Laravel 5.6 and Vue.js.

How to run the application using Laradock?

1. Clone the repository.
2. Clone laradock inside the project directory, check the 'Quick Overview' section for instruction. See https://laradock.io
3. If you have docker already installed, have it running, Otherwise you can download docker (https://www.docker.com/products/docker-desktop) and install.
3. Open terminal, navigate into the laradock directory and run _docker-compose up -d nginx mysql_, press enter and wait while container is being setup.
4. Run package manager to install dependencies, navigate into the projects root directory and run, _npm install_.
5. Install Laravel dependencies by running, _composer install_.
6. Run migration to setup database tables,type in _php artisan migrate_.
4. Open your browser and type localhost in the address bar.

