CREATE DATABASE task;
USE task;

CREATE TABLE categories (
	id_category INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name_category VARCHAR(50)
)engine=InnoDB;

CREATE TABLE users (
	id_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name_user VARCHAR(50),
    firstname_user VARCHAR(50),
    email_user VARCHAR(50),
    mdp_user VARCHAR(50)
)engine=InnoDB;

CREATE TABLE tasks (
	id_task INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name_task VARCHAR(50),
    content_tak TEXT,
    date_task DATE,
    id_category INT,
    id_user INT,
    CONSTRAINT fk_categories FOREIGN KEY(id_category) REFERENCES categories(id_category),
    CONSTRAINT fk_users FOREIGN KEY(id_user) REFERENCES users(id_user)
)engine=InnoDB;
