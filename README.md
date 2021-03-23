## Cities

Application displays cities in Nitra region.

### Installation

- clone repository to new directory in docs directory of web server (htdocs in apache)
- create new mysql database
- copy .env.example to .env and type database details into .env file
- run `php artisan key:generate` to generate application key
- run `composer install` to install php packages
- run `npm install` to install js packages
- run `php artisan migrate` to run migrations
- run `php artisan data:import` to import data about cities in Nitra region
- run `php artisan data:geocode` to fetch geocode data for cities
- run `php artisan storage:link` to create storage directory link to public directory
- run `mix` to create development build
- open http://localhost/ in browser
