# secure_her
## Description
A brief description of your project goes here.

## Database Setup

To set up the database for the application, you need to create the `secure_her` database and the following tables. Run the SQL commands below in your database management system (e.g., MySQL, MariaDB):

### SQL Commands

```sql
-- Create the secure_her database
CREATE DATABASE secure_her;

-- Use the secure_her database
USE secure_her;

-- Create the users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    pwd VARCHAR(255) NOT NULL
);

-- Create the comments table
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
