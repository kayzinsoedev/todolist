# laravel-todolist

Build a todo list app with Laravel. 

## Getting Started

Clone the project repository by running the command below if you use SSH

```bash
git clone git@github.com:kayzinsoedev/todolist.git
```

If you use https, use this instead

```bash
git clone https://github.com/kayzinsoedev/todolist.git
```

After cloning,run:

```bash
composer install
```

Copy env file `cp .env.example .env` 

Then run:

```bash
php artisan key:generate
```

### Prerequisites



#### Database Migrations

Be sure to fill in your database details in your `.env` file before running the migrations:

```bash
php artisan migrate
```

And finally, start the application:

```bash
php artisan serve
```

and visit [http://localhost:8000/](http://localhost:8000/) to see the application in action.

