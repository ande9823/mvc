-- The migrations file exists so that everyone can run the script and get the same database
-- on their local machine.

DROP DATABASE IF EXISTS mvc;
CREATE DATABASE mvc;
USE mvc;

CREATE TABLE user (
    user_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(126) UNIQUE NOT NULL,
    username VARCHAR(126) NOT NULL,
    password VARCHAR(126)
);

CREATE TABLE images (
    image_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(126) NOT NULL,
    title VARCHAR(126) NOT NULL,
    image LONGBLOB NOT NULL,
    description VARCHAR(126) NOT NULL
);

-- This is an example, but can't be used as it doesn't hash the password
-- INSERT INTO user (emal, username, password) VALUES (test@test.dk, test, Test1234);
