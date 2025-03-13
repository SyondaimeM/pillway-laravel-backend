
# Pillway - Laravel Backend

## Overview

This repository contains the Laravel backend for the Pillway project. The backend provides user authentication, token-based JWT authentication, and serves data for the dynamic dashboard.

### Features

- **JWT-based Authentication**: Secure user authentication using JSON Web Tokens (JWT).
- **Posts API**: Provides an API for fetching posts from `https://jsonplaceholder.typicode.com/posts`.
- **Unit Tests**: Includes test cases for verifying the JWT functionality.

### Watch DEMO 
---
[![Watch the video](https://img.youtube.com/vi/zCaCJXG9mjM/0.jpg)](https://youtu.be/zCaCJXG9mjM)]
---

### Project Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/SyondaimeM/pillway-laravel-backend.git
   cd pillway-laravel-backend
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Set up the environment:
   - Copy the `.env.example` to `.env`.
   - Generate the application key and JWT secret:
     ```bash
     cp .env.example .env
     php artisan key:generate
     php artisan jwt:secret
     ```

4. Run the migrations:
   ```bash
   php artisan migrate
   ```

5. Serve the application:
   ```bash
   php artisan serve
   ```

   The backend API should now be available at `http://localhost:8000`.

### JWT Authentication

The backend uses JWT for authenticating users. The `/login` endpoint expects credentials and returns a JWT upon successful authentication. 

### Testing

Unit tests are included to test the JWT-based authentication system.

To run the tests:
```bash
php artisan test
```

This will execute all tests, including the JWT authentication tests.


# API Documentation 📝# API Documentation for Authentication

## Base URL
http://your-api-url.com/api

pgsql
Copy
Edit

### **1. User Registration**

- **Endpoint**: `/register`
- **Method**: `POST`
- **Description**: Registers a new user in the system.
- **Request Body**:
    ```json
    {
        "name": "John Doe",
        "email": "john@example.com",
        "password": "password123",
        "password_confirmation": "password123"
    }
    ```
- **Response**:
    - **Success**:
    ```json
    {
        "message": "User successfully registered.",
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com"
        },
        "token": "JWT_TOKEN_HERE"
    }
    ```
    - **Error**:
    ```json
    {
        "error": "Validation error",
        "messages": {
            "email": ["The email has already been taken."]
        }
    }
    ```

---

### **2. User Login**

- **Endpoint**: `/login`
- **Method**: `POST`
- **Description**: Authenticates the user and provides an access token.
- **Request Body**:
    ```json
    {
        "email": "john@example.com",
        "password": "password123"
    }
    ```
- **Response**:
    - **Success**:
    ```json
    {
        "message": "Login successful",
        "token": "JWT_ACCESS_TOKEN_HERE",
        "refresh_token": "JWT_REFRESH_TOKEN_HERE"
    }
    ```
    - **Error**:
    ```json
    {
        "error": "Invalid credentials"
    }
    ```

---

### **3. User Logout**

- **Endpoint**: `/logout`
- **Method**: `POST`
- **Description**: Logs the user out by invalidating the access token.
- **Headers**: 
    - `Authorization: Bearer <ACCESS_TOKEN>`
- **Response**:
    - **Success**:
    ```json
    {
        "message": "Successfully logged out."
    }
    ```
    - **Error**:
    ```json
    {
        "error": "Unauthorized"
    }
    ```

---

### **4. Refresh Token**

- **Endpoint**: `/refresh`
- **Method**: `POST`
- **Description**: Refreshes the JWT token using the provided refresh token.
- **Request Body**:
    ```json
    {
        "refresh_token": "YOUR_REFRESH_TOKEN_HERE"
    }
    ```
- **Response**:
    - **Success**:
    ```json
    {
        "message": "Token refreshed successfully.",
        "token": "NEW_JWT_ACCESS_TOKEN_HERE"
    }
    ```
    - **Error**:
    ```json
    {
        "error": "Invalid refresh token"
    }
    ```

---

## Error Handling

- All API responses with errors will return an HTTP status code and a response body containing the error message.
- **Validation errors**: Will return a `422 Unprocessable Entity` status.
- **Unauthorized errors**: Will return a `401 Unauthorized` status.
- **Other errors**: Will return a `500 Internal Server Error` status.

---

## Example Requests

1. **Register Request**:
    ```bash
    curl -X POST http://your-api-url.com/api/register \
    -H "Content-Type: application/json" \
    -d '{"name":"John Doe","email":"john@example.com","password":"password123","password_confirmation":"password123"}'
    ```

2. **Login Request**:
    ```bash
    curl -X POST http://your-api-url.com/api/login \
    -H "Content-Type: application/json" \
    -d '{"email":"john@example.com","password":"password123"}'
    ```

3. **Logout Request**:
    ```bash
    curl -X POST http://your-api-url.com/api/logout \
    -H "Authorization: Bearer <ACCESS_TOKEN>"
    ```

4. **Refresh Token Request**:
    ```bash
    curl -X POST http://your-api-url.com/api/refresh \
    -H "Content-Type: application/json" \
    -d '{"refresh_token":"YOUR_REFRESH_TOKEN_HERE"}'
    ```

---

## Conclusion
This API allows users to register, log in, log out, and refresh their tokens. It ensures secure authentication through the use of JWT tokens and provides appropriate error handling and responses for different scenarios.

---

You can replace `your-api-url.com` with the actual backend URL.

Feel free to add any extra details like API versioning or additional security headers if needed.

Let me know if you need more modifications or additions!
