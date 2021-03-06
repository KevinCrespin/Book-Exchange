-- Select database

use cs3337;

--  Drop table if exists

drop table if exists users;
drop table if exists books;
drop table if exists forum;
drop table if exists comments;
drop table if exists cart;

-- Create users table

CREATE TABLE users (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    is_admin BOOLEAN NOT NULL DEFAULT 0,
    balance DECIMAL(15, 2) NOT NULL DEFAULT 100,
    hold_status VARCHAR(10) NOT NULL DEFAULT 'Active'
);

-- Create forum table

CREATE TABLE forum (
    poster_id INT(10) NOT NULL,
    poster_name VARCHAR(50) NOT NULL,
    post VARCHAR(250) NOT NULL
);

-- Create books table

CREATE TABLE books (
    seller_id INT(10) NOT NULL,
    isbn10 VARCHAR(10) NOT NULL,
    title VARCHAR(100) NULL,
    author VARCHAR(50) NOT NULL,
    price DECIMAL(15, 2) NOT NULL,
    description VARCHAR(500) NULL,
    post_time DATETIME NULL,
    pic_path VARCHAR(100) NULL,
    toc_path VARCHAR(100) NULL,
    rating DOUBLE DEFAULT 0.0
);

-- Create comments table

CREATE TABLE comments (
    commenter_id INT(10) NOT NULL,
    commenter_name VARCHAR(50) NOT NULL,
    comment VARCHAR(250) NOT NULL,
    parent_isbn10 VARCHAR(10) NOT NULL,
    comment_rating INT(1)
);

-- Create temporary cart table (Gets deleted once the user logs out)

create table cart (
    isbn10 VARCHAR(10) NOT NULL
);

-- Populate users table

INSERT INTO users (name, email, is_admin, balance) VALUES ('Kevin Crespin', 'kcrespi@calstatela.edu', 1, 30.00);
INSERT INTO users (name, email, is_admin) VALUES ('Admin', 'admin@calstatela.edu', 1);
INSERT INTO users (name, email) VALUES ('Jose Rosa', 'jrosa@calstatela.edu');
INSERT INTO users (name, email) VALUES ('Manuel Herrera', 'mherrer@calstatela.edu');
INSERT INTO users (name, email) VALUES ('John Jackson', 'jjackson@calstatela.edu');
INSERT INTO users (name, email) VALUES ('Sandip Hodkhasa', 'shodkha@calstatela.edu');
INSERT INTO users (name, email, balance) VALUES ('test', 'test@test.edu', 10.00);

-- Populate forum table

INSERT INTO forum (poster_id, poster_name, post) VALUES (1, 'Kevin Crespin', 'Hello, everyone! I was looking to sell my ''Java Introduction'' I made it available in the BookExchange market');
INSERT INTO forum (poster_id, poster_name, post) VALUES (2, 'Jose Rosa', 'I''m looking to donate my University Physics book, if interested check the BookExchange market');
INSERT INTO forum (poster_id, poster_name, post) VALUES (4, 'John Jackson', 'Help! I need this book <a href="https:///www.amazon.com/History-Empires-Rise-Fall-Greatest/dp/1547021241/ref=tmm_pap_swatch_0?_encoding=UTF8&qid=1556238372&sr=8-2-spons">History of Empires</a> for tomorrow');
INSERT INTO forum (poster_id, poster_name, post) VALUES (3, 'Manuel Herrera', 'Nice website!');

-- Populate books table

INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path, rating) VALUES (1, '0321954351', 'Calculus 2nd Edition', 'William L. Briggs, Lyle Cochran, Bernard Gillett', 40.00, 'Excellent condition, used only for a semester', '2019-03-10', 'images\\calculus2ndedition.jpg', 5);
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path, rating) VALUES (2, '0133813460', 'Introduction to Java Programming Comprehensive Version 10th ', 'Y. Daniel Liang', 14.00, 'Fair condition', '2019-03-10', 'images\\javaprogramming10thedition.jpg', 5);
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path, rating) VALUES (4, '1118290275', 'Data Structures and Algorithms in Python 1st Edition', 'Michael T. Goodrich', 50.99, 'Mint condition, needs to go now!', '2019-03-10', 'images\\datastructurespython1stedition.jpg', 5);
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path, rating) VALUES (1, '0062397346', 'A People''s History of the United States', 'Howard Zinn', 25.00, 'Excellent condition, used only for two semesters', '2019-03-10', 'images\\coverHistroyUs.jpg', 3);
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path) VALUES (5, '1491914912', 'Learning JavaScript 3rd Edition', 'Ethan Brown', 37.00, 'Have been used few times', '2019-03-10', 'images\\CoverLearningJavascript.jpg');
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path) VALUES (6, '0321982584', 'University Physics 14th Edition', 'Hugh D. Young, Roger A. Freedman', 51.00, 'Have been used few times', '2019-05-03', 'images\\coverUPhysics.jpg');
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path) VALUES (6, '1305658000', 'Elementary Linear Algebra 8th Edition', 'Ron Larson', 23.55, 'New', '2019-05-03', 'images\\coverLAlgreba.jpg');
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path) VALUES (5, '1118885840', 'Engineering Mechanics: Dynamics 8th Edition', 'James L. Meriam, L. G. Kraige, Jeffrey N. Bolton', 97.77, 'Never used', '2019-04-10', 'images\\coverDynamics.jpg');
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path) VALUES (3, '0393614182', 'Give Me Liberty!: An American History Seagull Fifth Edition (Vol 1)', 'Eric Foner', 27.77, 'Never used', '2019-04-18', 'images\\coverLiberty.jpg');
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path) VALUES (3, '0393614190', 'Give Me Liberty!: An American History Seagull Fifth Edition (Vol. 2)', 'Eric Foner', 29.97, 'Never used', '2019-04-17', 'images\\coverLiberty2.jpg');
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path) VALUES (5, '1429215100', 'Mathematical Structures for Computer Science Seventh Edition', 'Judith L. Gersting', 97.77, 'Never used', '2019-04-15', 'images\\coverMathS.jpg');
-- Populate comments table

INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, comment_rating) VALUES (1, 'Kevin Crespin', 'If you are taking MATH 2010 and MATH 2020 at Cal State, you are required to have it in two semesters; so if you are a freshman is a must have', '0321954351', 5);
INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, comment_rating) VALUES (1, 'Kevin Crespin', 'Required for US HIST class.', '0062397346', 3);
INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, comment_rating) VALUES (4, 'John Jackson', 'This book will help you understand Java programming way better, I really recommend it.', '0133813460', 5);
INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, comment_rating) VALUES (5, 'Jose Rosa', 'Getting familiar with data structures in programming is really important, if you wanna be a decent programmer I recommend you starting here.', '1118290275', 5);
