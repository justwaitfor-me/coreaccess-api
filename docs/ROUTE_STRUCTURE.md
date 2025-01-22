# **Auth and User Management**

## **System Overview**

This system is built using the Slim framework for PHP, providing a RESTful API for authentication, user management, role management, session management, security features, and system administration. Each route corresponds to a specific action handled by a controller. Below is a detailed explanation of each route and its functionality.

---

## **1. Authentication**

### **Authentication Routes**

| Method | Route                   | Description                    |
| ------ | ----------------------- | ------------------------------ |
| POST   | `/auth/signup`          | Registers a new user.          |
| POST   | `/auth/signin`          | Logs in a user.                |
| POST   | `/auth/signout`         | Logs out the current user.     |
| POST   | `/auth/refresh`         | Refreshes a token (e.g., JWT). |
| POST   | `/auth/forgot-password` | Requests a password reset.     |
| POST   | `/auth/reset-password`  | Sets a new password.           |

**Details:**

- **`/auth/signup`**: This route allows a new user to register by providing necessary details like username, email, and password. The `AuthController::signup` method handles the registration logic.
- **`/auth/signin`**: This route allows an existing user to log in by providing their credentials. The `AuthController::signin` method handles the authentication and returns a token.
- **`/auth/signout`**: This route logs out the current user by invalidating their session. The `AuthController::signout` method handles this.
- **`/auth/refresh`**: This route refreshes the authentication token, typically used for JWT. The `AuthController::refresh` method handles token renewal.
- **`/auth/forgot-password`**: This route initiates a password reset process by sending a reset link to the user's email. The `AuthController::forgotPassword` method handles this.
- **`/auth/reset-password`**: This route allows the user to set a new password using the reset link. The `AuthController::resetPassword` method handles this.

---

## **2. User Profile**

### **User Profile Routes**

| Method | Route        | Description                                          |
| ------ | ------------ | ---------------------------------------------------- |
| GET    | `/users/me`  | Retrieves the data of the currently logged-in user.  |
| PATCH  | `/users/me`  | Updates the profile of the currently logged-in user. |
| DELETE | `/users/me`  | Deletes the account of the currently logged-in user. |
| GET    | `/users/:id` | Retrieves the profile of a specific user (Admin).    |
| PATCH  | `/users/:id` | Updates the data of a specific user (Admin).         |
| DELETE | `/users/:id` | Deletes a user (Admin).                              |

**Details:**

- **`/users/me`**: Retrieves the profile information of the currently logged-in user. Handled by `UserController::getProfile`.
- **`/users/me`**: Updates the profile information of the currently logged-in user. Handled by `UserController::updateProfile`.
- **`/users/:id`**: Admin route to get the profile of a specific user by their ID. Handled by `AdminController::getUserProfile`.
- **`/users/:id`**: Admin route to update the profile of a specific user by their ID. Handled by `AdminController::updateUser`.
- **`/users/:id`**: Admin route to delete a specific user by their ID. Handled by `AdminController::deleteUser`.

---

## **Role and Permission Management**

### **Role and Permission Management Routes**

| Method | Route              | Description                         |
| ------ | ------------------ | ----------------------------------- |
| GET    | `/roles`           | Lists all available roles.          |
| POST   | `/roles`           | Creates a new role (Admin).         |
| PATCH  | `/roles/:id`       | Updates a role (Admin).             |
| DELETE | `/roles/:id`       | Deletes a role (Admin).             |
| PATCH  | `/users/:id/roles` | Changes the role of a user (Admin). |

**Details:**

- **`/roles`**: Retrieves a list of all available roles. Handled by `RoleController::listRoles`.
- **`/roles`**: Admin route to create a new role. Handled by `RoleController::createRole`.
- **`/roles/:id`**: Admin route to update an existing role by its ID. Handled by `RoleController::updateRole`.
- **`/roles/:id`**: Admin route to delete a role by its ID. Handled by `RoleController::deleteRole`.
- **`/users/:id/roles`**: Admin route to change the role of a specific user by their ID. Handled by `AdminController::changeUserRole`.

---

## **Session Management**

### **Session Management Routes**

| Method | Route           | Description                     |
| ------ | --------------- | ------------------------------- |
| GET    | `/sessions`     | Lists all sessions of the user. |
| DELETE | `/sessions/:id` | Ends a specific session.        |
| DELETE | `/sessions/all` | Ends all sessions of the user.  |

**Details:**

- **`/sessions`**: Retrieves a list of all sessions for the currently logged-in user. Handled by `SessionController::listSessions`.
- **`/sessions/:id`**: Ends a specific session by its ID. Handled by `SessionController::endSession`.
- **`/sessions/all`**: Ends all sessions for the currently logged-in user. Handled by `SessionController::endAllSessions`.

---

## **Security Features**

### **Security Features Routes**

| Method | Route                   | Description                         |
| ------ | ----------------------- | ----------------------------------- |
| GET    | `/security/logs`        | Retrieves the latest security logs. |
| POST   | `/security/enable-2fa`  | Enables two-factor authentication.  |
| POST   | `/security/disable-2fa` | Disables two-factor authentication. |

**Details:**

- **`/security/logs`**: Retrieves the latest security logs. Handled by `SecurityController::getLogs`.
- **`/security/enable-2fa`**: Enables two-factor authentication for the user. Handled by `SecurityController::enable2FA`.
- **`/security/disable-2fa`**: Disables two-factor authentication for the user. Handled by `SecurityController::disable2FA`.

---

## **System Management (for Admins)**

### **1. User Management**

| Method | Route              | Description                            |
| ------ | ------------------ | -------------------------------------- |
| GET    | `/admin/users`     | Lists all users.                       |
| GET    | `/admin/users/:id` | Retrieves the data of a specific user. |
| DELETE | `/admin/users/:id` | Deletes a user.                        |

**Details:**

- **`/admin/users`**: Admin route to retrieve a list of all users. Handled by `SystemController::listUsers`.
- **`/admin/users/:id`**: Admin route to get the data of a specific user by their ID. Handled by `SystemController::getUser`.
- **`/admin/users/:id`**: Admin route to delete a specific user by their ID. Handled by `SystemController::deleteUser`.

### **2. API Statistics**

| Method | Route          | Description                                  |
| ------ | -------------- | -------------------------------------------- |
| GET    | `/admin/stats` | API usage statistics.                        |
| GET    | `/admin/logs`  | Retrieves API logs (errors, requests, etc.). |

**Details:**

- **`/admin/stats`**: Admin route to retrieve API usage statistics. Handled by `SystemController::getStats`.
- **`/admin/logs`**: Admin route to retrieve API logs, including errors and requests. Handled by `SystemController::getLogs`.

---

## **How the System Works**

1. **Routing**: The Slim framework routes incoming HTTP requests to the appropriate controller methods based on the URL and HTTP method.
2. **Controllers**: Each controller handles specific actions related to authentication, user management, roles, sessions, security, and system administration.
3. **Middleware**: Middleware can be used to handle cross-cutting concerns such as authentication, logging, and error handling.
4. **Responses**: Controllers return responses that are sent back to the client, typically in JSON format.
5. **Security**: Security features such as two-factor authentication and session management help protect user accounts and data.
