CREATE TABLE `table`.`customers` 
( `ID` INT(3) NOT NULL , 
`Name` VARCHAR(10) NOT NULL , 
`Email` VARCHAR(25) NOT NULL ,
 `Balance` INT(6) NOT NULL ) 
ENGINE = InnoDB;

INSERT INTO `customers` (`ID`, `Name`, `Email`, `Balance`) VALUES 
('1', 'Palash', 'palash@gmail.com', '50000'), 
('2', 'Akash', 'akash@gmail.com', '10000'), 
('3', 'Jim', 'jim@gmail.com', '10000'), 
('4', 'Sushanth', 'sushanth@gmail.com', '20000'), 
('5', 'Neeraj', 'neeraj@gmail.com', '20000'), 
('6', 'Samyak', 'samyak@gmail.com', '30000'),
('7 ', 'Amal', 'amal@gmail.com', '25000'), 
('8', 'Devesh', 'devesh@gmail.com', '30000'), 
('9', 'Vinush', 'vinush@gmail.com', '15000'),
('10', 'Sameer', 'sameer@gmail.com', '40000');

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

COMMIT

CREATE TABLE `table`.`transactions` ( 
`Sno` INT(3) NOT NULL , 
`Name1` VARCHAR(20) NOT NULL , 
`Name2` VARCHAR(20) NOT NULL ,
 `Amount` INT(6) NOT NULL , 
`Time` VARCHAR(40) NOT NULL DEFAULT CURRENT_TIMESTAMP ) 
ENGINE = InnoDB;
