CREATE DATABASE test_db;

USE test_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) 
VALUES ('admin', PASSWORD('admin_password'));

INSERT INTO users (username, password) VALUES 
('mari', PASSWORD('titok'));

grant all 
on test_db.* 
to 'test_user'@'localhost' 
identified by 'test_password';

