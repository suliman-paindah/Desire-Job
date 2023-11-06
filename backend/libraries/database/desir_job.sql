 
--  table category: for category of job
 CREATE TABLE `desire_job`.`category` (`id` INT(10) NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`))


-- table types: for kinds of job
CREATE TABLE `desire_job`.`types` (`id` INT(10) NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `color` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`))

--  users table

CREATE TABLE `desire_job`.`users` (`id` INT(10) NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(100) NOT NULL , `last_name` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL , `confirm_password` VARCHAR(100) NOT NULL , `role` VARCHAR(100) NOT NULL , `created` DATETIME(0) NULL DEFAULT NULL , PRIMARY KEY (`id`))


-- jobs table:
CREATE TABLE `desire_job`.`jobs` (`id` INT(10) NOT NULL AUTO_INCREMENT , `category_id` INT(10) NOT NULL , `user_id` INT(10) NOT NULL , `type_id` INT(10) NOT NULL , `company_name` VARCHAR(100) NOT NULL , `title` VARCHAR(100) NOT NULL , `description` TEXT NOT NULL , `city` VARCHAR(100) NOT NULL , `contact_email` VARCHAR(100) NOT NULL , `created` DATETIME NOT NULL , PRIMARY KEY (`id`))