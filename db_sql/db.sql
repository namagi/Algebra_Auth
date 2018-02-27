-- Simple user/password DB for login credentials

CREATE DATABASE `algebra_auth` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE algebra_auth;


CREATE TABLE `algebra_auth`.`users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(64) NOT NULL,
    `salt` VARCHAR(32) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

CREATE TABLE `algebra_auth`.`sessions` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `hash` VARCHAR(64) NOT NULL,
    `user_id` INT UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
