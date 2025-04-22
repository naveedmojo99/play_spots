project setup
--------------
backend=laravel
front-end=blade

1)composer install
2)php artisan migrate:fresh --seed

routes http://127.0.0.1:8000/venues main home route.
add mobile number otp authentication.
before booking otp is generated otp is taken from otp table in database and after verifying otp the user is authenticated.
user mobile and name is stored in users table.
all the requirement mentioned in the task is done i have used blade for front end i am not using apis here but passing values into blade files via controller.
