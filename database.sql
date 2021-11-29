DROP DATABASE IF EXISTS ecommerce;
CREATE DATABASE ecommerce;

USE ecommerce;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
   `UserID` int(11) NOT NULL auto_increment,
   `Fname` varchar(35) NOT NULL,
   `Lname` varchar(35) NOT NULL,
   `email` varchar(70) NOT NULL,
   `password` varchar(35) NOT NULL,
   `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(`UserID`)
);


--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
CREATE TABLE `Products` (
   `ProductID` int(11) NOT NULL auto_increment,
   `Title` varchar(35) NOT NULL,
   `Description` varchar(2048) NOT NULL,
    Type ENUM('Accessories','Tops','Bikini & Coverup'),   
   -- ,`ImageID` int,
   `Price` DECIMAL(7,2), 
    size ENUM('small','medium','large'),
    Colour ENUM('Red','Green','Blue','Purple','Orange','Yellow','Multi-coloured'),  
   `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(`ProductID`)
   -- ,FOREIGN KEY(`ImageID`) REFERENCES Images(`ImageID`)

);


--
-- Table structure for table `Images`
--

DROP TABLE IF EXISTS Images;
CREATE TABLE `Images` (
   `ImageID` int(11) NOT NULL auto_increment,
   `ProductID` int,
   `image_url` varchar(256) NOT NULL,
   `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(`ImageID`),
   FOREIGN KEY (`ProductID`) REFERENCES Products(`ProductID`)
);

--
-- Table structure for table `Order`
--

DROP TABLE IF EXISTS Orders;
CREATE TABLE `Orders` (
   `OrderID` int(11) NOT NULL auto_increment,
   `UserID` int NOT NULL,
   `ProductID`int NOT NULL,
   `quantity` TINYINT NOT NULL, 
   `total_cost`  DECIMAL(8,2) NOT NULL,
   `status` ENUM('Pending','Paid','Started','In Progress', 'Completed','Out-for-Delivery','Delivered','Cancelled'),
   `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(`OrderID`),
   FOREIGN KEY(`UserID`) REFERENCES Users(`UserID`),
   FOREIGN KEY(`ProductID`) REFERENCES Products(`ProductID`)
);

--
-- Table structure for table `Invoices`
--

DROP TABLE IF EXISTS Invoices;
CREATE TABLE `Invoices` (
   `InvoiceID` int(11) NOT NULL auto_increment,
   `file_name` varchar(35) NOT NULL,
   `type` VARCHAR(30) NOT NULL,
   `UserID` int NOT NULL,
   `OrderID` int NOT NULL,
   `content` MEDIUMBLOB NOT NULL,
   `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(`InvoiceID`),
   FOREIGN KEY(`UserID`) REFERENCES Users(`UserID`),
   FOREIGN KEY(`OrderID`) REFERENCES Orders(`OrderID`)

);


-- 
-- Insert test data
-- 

INSERT INTO Users(Fname,Lname,email,password) VALUES('Andrew','Hall','andew@comcast.com','password123');

INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Bikini','For a fun day at the beach','Tops',3500.00,'small','Red');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Swimwear','Hotel Trip','Bikini & Coverup',5000.00,'medium','Green');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Winter Wear','For the Winter','Tops',3000.00,'small','Yellow');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Summer Wear','For the Summer','Bikini & Coverup',4500.00,'medium','Green');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Key Chain','a token perfect gift','Accessories',1500.00,'small','Red');

