## Requirements

- **PHP**: 7.4, 8.0, 8.1, 8.2, or 8.3
- **Laravel**: 8.x, 9.x, 10.x, 11.x, 12.x

## Installation

To install the package, run the following command:

```bash
composer require jatri/api-first-crud:dev-main
```

## Usage

Once installed, you can generate a complete CRUD operation by using the following Artisan command:

```bash
php artisan make:crud Post
```

This will generate:

- A model in `app/Models/Post.php`
- A controller in `app/Http/Controllers/PostController.php`
- A request validation file in `app/Http/Requests/PostRequest.php`
- A migration file in `database/migrations/xxxx_xx_xx_create_posts_table.php`
- API routes in `routes/api.php`


## Troubleshooting
### Common Issues
Missing Cache Table: If you encounter an error related to the cache table not existing, try these following commands:

```bash
php artisan cache:table
php artisan migrate
```
Class Not Found Errors: If you encounter related issues try this following command

```bash
composer dump-autoload
```
