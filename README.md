# PHP Login System

This is a simple PHP login system project with user authentication using a MySQL database. It includes **login**, **registration**, and a basic homepage. Passwords are hashed using MD5 (for demonstration purposes).  

---

## Files

### 1. `index.php`
- The homepage of the website.
- Displays a welcome message (`hello`).
- Contains links to:
  - `login.php` → Login page
  - `register.php` → Registration page

### 2. `login.php`
- The login page where users can enter their credentials.
- Contains a form with:
  - `Username`
  - `Password`
  - `Login` button
- PHP backend logic:
  - Connects to the MySQL database (`login_sys`).
  - Checks if the submitted username and password exist.
  - Passwords are hashed using MD5 before checking.
  - Starts a session and stores the logged-in username.
  - Displays success or error messages based on login attempt.

**Database table structure (`users`)**:

| Field    | Type        | Description                 |
|----------|------------|-----------------------------|
| id       | INT        | Primary key, auto-increment |
| username | VARCHAR    | User's username (admin)     |
| password | VARCHAR    | User's password(MD5) 12345  |

### 3. `register.php`
- Placeholder for user registration (currently only outputs `"register"`).  
- Can be extended to allow users to create an account and store credentials in the database.

---

## Requirements
- PHP 7.0 or higher
- MySQL database
- XAMPP, WAMP, or any local server environment

---

## Setup Instructions
1. Create a database named `login_sys` in MySQL.
2. Create a `users` table:
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) NOT NULL,
       password VARCHAR(255) NOT NULL
   );
