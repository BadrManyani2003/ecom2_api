## API for E-Commerce

This is the API for an E-Commerce web store. At the moment, only one seller and multiple buyers are supported.

#### Steps to install this project:

Run the commands below one by one

```
git clone git@github.com:MehulBawadia/laravel-api-ecommerce.git
cd laravel-api-ecommerce
cp .env.example .env
## Don't forget to update the DB_* credentials in the .env file
composer install
php artisan migrate
php artisan storage:link
php artisan scribe:generate
php artisan serve --host=localhost
# The docs can be viewed at http://localhost:8000/docs
```

For the payments, this application uses Stripe Payment Gateway.
If you do not have an account, create an account or simply log in.
Then, add your Publishable Key and Secret Key in the .env file
(Don't forget to restart the server, for the changes to take effect)

#### Test the project

```
php artisan test
# or vendor/bin/phpunit
```

#### License

This project is licensed under MIT.
