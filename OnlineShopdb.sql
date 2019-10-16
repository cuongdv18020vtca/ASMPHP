CREATE DATABASE Onlineshopdb;
USE Onlineshopdb;
CREATE TABLE `User`
(
    userID mediumint(6) UNSIGNED not null,
    first_name varchar(30) not null,
    last_name varchar(30),
    email varchar(60) not null,
    passwords char(60) not null,
    registration_date datetime not null,
    user_level tinyint(1) not null
                       
);
ALTER TABLE `User` add PRIMARY KEY(`userID`);
ALTER TABLE `User` MODIFY`userID` mediumint(6) UNSIGNED NOT null AUTO_INCREMENT, AUTO_INCREMENT =100;