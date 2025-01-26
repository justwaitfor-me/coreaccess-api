# PHP Authentication App

This is a scalable PHP authentication application that provides a RESTful API for user authentication, including signup and login functionalities. The project is organized into a structured folder layout to facilitate development and maintenance.

## Project Structure

```
```
coreaccess/api
├── src
│   ├── Config
│   │   ├── database.php
│   │   └── jwt.php
│   ├── Controllers
│   │   ├── AuthController.php
│   │   └── BaseController.php
│   ├── Middleware
│   │   └── AuthMiddleware.php
│   ├── Models
│   │   └── User.php
│   └── Routes
│       └── api.php
├── tests
│   ├── integration
│   │   └── AuthTest.php
│   └── unit
│       └── UserTest.php
├── vendor
├── .env
├── composer.json
├── composer.lock
└── README.md
```
```

## Installation

1. Clone the repository:

   ```
   git clone https://github.com/justwaitfor-me/coreaccess-api.git
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
