create database vms;
use vms;
CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(255) NOT NULL UNIQUE,
    lname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    pin VARCHAR(255) NOT NULL,
    phno VARCHAR(255) NOT NULL UNIQUE,
    gender VARCHAR(255),
    dob DATE NOT NULL,
    hno VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    addr TEXT NOT NULL,
    country VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

select * from users;
describe users;
SET SQL_SAFE_UPDATES = 0;
delete from users;

select * from parties;

delete from users;
delete from parties;

ALTER TABLE users
DROP COLUMN pin,
DROP COLUMN hno;

ALTER TABLE users
ADD COLUMN voted INT NOT NULL DEFAULT 0;


ALTER TABLE users
ADD COLUMN voted TEXT;

CREATE TABLE IF NOT EXISTS parties (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    lname VARCHAR(255) NOT NULL UNIQUE,
    addr TEXT NOT NULL,
    pname VARCHAR(255) NOT NULL UNIQUE,
    image_url VARCHAR(255) NOT NULL,
    phno VARCHAR(255) NOT NULL UNIQUE,
    vc INT, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS results (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pname VARCHAR(255) NOT NULL,
    vc INT,
    pyear TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

select * from results;
delete from results;
describe parties;
describe results;

select * from users;
select * from parties;
select * from results;


