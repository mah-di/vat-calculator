## How To Run
- Download/clone the project on your machine
- Run `composer install` to install all the dependencies 
- Create `.env` file from `.eample.env`
- run `php artisan key:generate` to generate the app key
- run `php artisan migrate --seed` to create all the database tables and to run database seeding
- run `php artisan serve` which will by default serve the project on `localhost:8000`

## User Credentials
Running the seeder will create a demo user on the database. Below are the credentials for the user
##### Email: jon@doe.com
##### Password: 123
