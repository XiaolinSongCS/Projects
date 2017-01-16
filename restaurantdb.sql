DROP DATABASE IF EXISTS restaurant_db;

CREATE DATABASE  restaurant_db;

USE restaurant_db;
 

CREATE TABLE restaurant (
    CATEGORY   VARCHAR(20)  NOT NULL,
    NAME       VARCHAR(20)  NOT NULL,
    PRICE      INT(10,2)    NOT NULL,
    
    PRIMARY KEY (CATEGORY)
);

INSERT INTO restaurant VALUES
('breakfast','eggFork','7.99'),
('lunch','sugarChicken','10.99'),
('dinner','chickenDinner','15.00'),
('drinks','beer','1.50');


GRANT SELECT, INSERT, DELETE, UPDATE
ON  restaurant_db.*
TO root@localhost
IDENTIFIED BY '062423';
