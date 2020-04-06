
CREATE DATABASE IF NOT EXISTS wp_newuser_demo;

USE wp_newuser_demo;

CREATE TABLE tbl_user
(
	firstname VARCHAR(50),
	lastname VARCHAR(50),
	username VARCHAR(50),
	password VARCHAR(255),
	user_id int(6) AUTO_INCREMENT PRIMARY KEY
);