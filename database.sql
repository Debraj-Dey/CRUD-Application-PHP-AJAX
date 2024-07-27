
-- For creating the database
create database crud;

use crud;

-- For creating the table

CREATE TABLE `crudAjax`. (`id` INT(10) NOT NULL AUTO_INCREMENT , `Name` VARCHAR(20) NOT NULL , `Gender` ENUM('Male','Female','Other') NOT NULL , `Email` VARCHAR(30) NOT NULL , `Mobile` VARCHAR(15) NOT NULL , `Address` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;