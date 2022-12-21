> ### J2G Web App.

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/7.x)


Clone the repository

    git clone https://github.com/quitenoisemaker/calender_activity.git

Switch to the repo folder

    cd calender_activity

Install all the dependencies using composer

    composer install

Copy the .env.example file and rename it to .env. Then make the neccessary changes

    Example:   
                DB_DATABASE=YOUR-DATABASE_NAME
                DB_USERNAME=YOUR_DATABASE-USERNAME
                DB_PASSWORD=YOUR_DATABASE-PASSWORD

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database Seeder 

    php artisan db:seed


After that run the following command to generate a personal access client

    php artisan passport:client --personal

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


## Admin login test details
Email: admin@gmail.com
Password: 12345678


## API Specification and Endpoint
The api can be accessed at [http://127.0.0.1:8000/api](http://127.0.0.1:8000/api).

<ul>
<li>To register user .Use the POST method <br> <a href="http://127.0.0.1:8000/api/user/register">http://127.0.0.1:8000/api/user/register</a></li><br> 

<li>To login user. Use the POST method  <br>  <a href="http://127.0.0.1:8000/api/user/login">http://127.0.0.1:8000/api/user/login</a></li> <br>

<li>To get User Activities on date range. Use the GET method <br>  <a href="http://127.0.0.1:8000/api/user/activities">http://127.0.0.1:8000/api/user/activities</a> Parameter : from_date, end_date</li> <br> 





</ul>

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the api controllers
- `app/Http/Requests/Api` - Contains all the api form requests
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `routes/api` - Contains all the api routes


