CREATE DATABASE registration;
USE DATABASE registration;
CREATE TABLE users ( id smallint unsigned not null auto_increment, username varchar(20) not null unique, password varchar(20) not null, primary key (id) );
INSERT INTO users (id, username, password) VALUES ( null, ‘foo’, ‘bar’ );
SELECT * FROM users;
