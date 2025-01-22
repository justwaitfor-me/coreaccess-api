# PHP Authentication App

This is a scalable PHP authentication application that provides a RESTful API for user authentication, including signup and login functionalities. The project is organized into a structured folder layout to facilitate development and maintenance.

## Project Structure

```
php-auth-app
├── public
│   ├── index.php          # Entry point of the API
│   └── .htaccess          # URL rewriting for clean URLs
├── src
│   ├── Controllers         # Contains controllers for handling requests
│   │   └── AuthController.php
│   ├── Models              # Database models
│   │   ├── User.php
│   │   └── Role.php
│   ├── Routes              # API version routes
│   │   ├── v1.php
│   │   └── v2.php
│   ├── Services            # Business logic services
│   │   └── AuthService.php
│   ├── Middlewares         # Request middlewares
│   │   └── AuthMiddleware.php
│   ├── Helpers             # Utility functions
│   │   └── ResponseHelper.php
│   ├── Config              # Configuration files
│   │   ├── database.php
│   │   └── jwt.php
│   └── Database            # Migrations and seeders
│       ├── migrations
│       └── seeders
├── storage                 # Logs and cache
│   ├── logs
│   └── cache
├── tests                   # Unit and integration tests
│   ├── unit
│   └── integration
├── README.md               # Project documentation
├── composer.json           # Composer dependencies
└── .gitignore              # Files to ignore in version control
```

## Installation

1. Clone the repository:

   ```
   git clone https://github.com/justwaitfor-me/coreaccess.git
   coreaccess
   ```

2. Install dependencies using Composer:

   ```
   composer install
   ```

3. Configure your database settings in `src/Config/database.php`.

4. Set up your JWT configuration in `src/Config/jwt.php`.

5. Run migrations and seeders to set up the database:

   ```
   php artisan migrate
   php artisan db:seed
   ```

## Usage

- The API can be accessed at `http://yourdomain.com/api/v1/auth/signup` for signup and `http://yourdomain.com/api/v1/auth/login` for login.
- Ensure to handle authentication tokens as specified in the JWT configuration.

## Testing

- Unit tests are located in the `tests/unit` directory.
- Integration tests are located in the `tests/integration` directory.
- Run tests using PHPUnit:

  ```
  ./vendor/bin/phpunit
  ```

## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any enhancements or bug fixes.

## License

This project is licensed under the MIT License. See the LICENSE file for details.
