# `src` Directory Structure

The `src` directory contains the core components of the PHP Authentication App project. Below is an overview of the folders within the `src` directory, detailing their purposes and how they work together.

## `Config/`

- **Purpose**: Contains configuration files for the application.
- **Files**:
  - `database.php`: Manages database connection settings.
  - `jwt.php`: Manages JSON Web Token (JWT) settings.

## `Controllers/`

- **Purpose**: Handles incoming HTTP requests and returns responses.
- **Files**:
  - `AuthController.php`: Manages authentication-related requests such as login and registration.
  - `AdminController.php`: Manages admin-related requests.
  - Other controller files: Handle specific functionalities and routes.

## `Database/`

- **Purpose**: Manages database-related operations.
- **Contents**: Includes migrations, seeders, and other database-related files.

## `Routes/`

- **Purpose**: Defines the API routes for the application.
- **Files**:
  - `v1.php`: Contains routes for API version 1.

## `Services/`

- **Purpose**: Contains business logic and services used by controllers.
- **Contents**: Various service classes that encapsulate business logic.

## `Middlewares/`

- **Purpose**: Contains middleware that processes HTTP requests before they reach the controllers.
- **Contents**: Middleware classes that handle tasks such as authentication and input validation.

## `Helpers/`

- **Purpose**: Contains utility functions that assist with common tasks.
- **Contents**: Helper functions used throughout the application.