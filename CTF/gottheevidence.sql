CREATE DATABASE IF NOT EXISTS mydatabase;
USE mydatabase;

CREATE TABLE IF NOT EXISTS user_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL
);

-- Insert some initial data
INSERT INTO user_details (name, mail, password, role) VALUES
('Admin', 'admin@example.com', 'adminpassword', 'admin'),
('User', 'user@example.com', 'userpassword', 'user');
