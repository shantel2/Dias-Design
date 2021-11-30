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
    Colour ENUM('Red','Green','Blue','Purple','Orange','Yellow','Multi-coloured','White'),  
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

INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Bikini','For a fun day at the beach','Bikini & Coverup',3500.00,'small','Blue');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Tote bag','A special accessory for that special someone','Accessories',1500.00,'medium','Red');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Morning Beach','Excellent for an Early morning dip.','Bikini & Coverup',3000.00,'small','Multi-coloured');

INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Winter Wear','Blends perfectly for a tropical winter outing.','Bikini & Coverup',4500.00,'medium','White');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Primary Colours','A token, the perfect gift','Bikini & Coverup',3500.00,'small','Multi-coloured');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Royalty','Fit for a queen. The Colour of royalty','Bikini & Coverup',5000.00,'small','Blue');

INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Mermaid','For Blending in with the clear caribbean waters','Bikini & Coverup',4000.00,'small','Blue');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Plade-ed','For the Life of the party','Bikini & Coverup',3500.00,'small','Multi-coloured');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Sunshine','Be one with the glow of the sun.','Bikini & Coverup',4000.00,'small','Yellow');

INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Girly Girl','Lovers of pink at heart','Bikini & Coverup',3000.00,'small','white');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Crazy','Show your inner crazy.','Bikini & Coverup',3500.00,'small','Multi-coloured');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Browning','Accentuate Your skin colour with a little brown','Tops',2000.00,'small','Multi-coloured');

INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Evening','Who is up for a swim in th Evening?','Bikini & Coverup',3500.00,'medium','Yellow');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Lady in red','Be the centre of attention','Bikini & Coverup',4000.00,'small','Red');
INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Contrast','Exciting!','Bikini & Coverup',3500.00,'small','Multi-coloured');

INSERT INTO Products(Title,Description,Type,Price,size,Colour)VALUES('Accented Red','Red with Contrast','Bikini & Coverup',3500.00,'medium','Red');




INSERT INTO Orders(UserID,ProductID,quantity,total_cost,status)VALUES(1,2,1,5000.00,'Pending');
INSERT INTO Orders(UserID,ProductID,quantity,total_cost,status)VALUES(1,1,1,3500.00,'Paid');
INSERT INTO Orders(UserID,ProductID,quantity,total_cost,status)VALUES(1,3,1,3000.00,'Started');
INSERT INTO Orders(UserID,ProductID,quantity,total_cost,status)VALUES(1,4,1,4500.00,'Pending');


GRANT ALL PRIVILEGES ON ecommerce.* TO 'dias_designs'@'localhost' IDENTIFIED BY 'admin_root';




