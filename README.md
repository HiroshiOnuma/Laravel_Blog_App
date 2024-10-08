# Laravel_Blog_App

This is a blog application developed with Laravel that allows user registration, editing and deletion, login and logout, blog posting, editing and deletion, displaying a list of blogs, generating dummy data, and simple search functionality.

## Environment
+ Laravel Framework 9.52.16
+ Laravel Breeze v1.19.2 

## How to Use This Source

1. Clone this repository
```
git clone https://github.com/HiroshiOnuma/Laravel_Blog_App.git
```
2. Navigate to the project directory in the terminal
```
cd Laravel_Blog_App
```
3. Create the .env file
```
cp .env.example .env
```
4. Edit the .env file
```
DB_CONNECTION=database connection
DB_HOST=database host
DB_PORT=database port
DB_DATABASE=database name
DB_USERNAME=database username
DB_PASSWORD=database password
```
5. Generate the APP_KEY
```
php artisan key:generate
```
6. Run the following command to install composer
```
composer install
```
7. Install npm
```
npm i && npm run dev
```
8. Run the following commands to set up the database tables
```
php artisan migrate 
php artisan migrate --seed # If you want to insert test data
```
9. Run the following command to start the Laravel project
```
php artisan serve
```




