DROP DATABASE IF EXISTS food_db;
CREATE DATABASE food_db;
USE food_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: food_db
--

-- Table structure for table `Roles`
--
CREATE TABLE `Role` (
    `rid` int(11) NOT NULL,
    `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB NOT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `Role`
--
INSERT INTO `Role` (`rid`, `rolename`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'standard');

-- Table structure for table `Users`
--
CREATE TABLE `Users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50),
  `lname` varchar(50),
  `gender` enum('Male','Female') NOT NULL,`dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `rid` int(11) NOT NULL,
  PRIMARY KEY (`User_ID`),
  CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `Role` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB NOT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Restaurants
--
CREATE TABLE `Restaurants` (
  `Restaurant_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone_Number` varchar(20) NOT NULL,
  `Owner_ID` int(11) NOT NULL,
  `Cuisine_Type` varchar(255) NOT NULL,
  `Delivery_Area` varchar(255) NOT NULL,
  `Opening_Hours` varchar(255) NOT NULL,
  PRIMARY KEY (`Restaurant_ID`),
  KEY `Owner_ID` (`Owner_ID`),
  CONSTRAINT `Restaurants_ibfk_1` FOREIGN KEY (`Owner_ID`) REFERENCES `Users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB NOT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `Menu_Items`
--
CREATE TABLE `Menu_Items` (
  `Item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Restaurant_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `Price` decimal(10,2) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Availability` tinyint(1) NOT NULL,
  PRIMARY KEY (`Item_ID`),
  KEY `Restaurant_ID` (`Restaurant_ID`),
  CONSTRAINT `Menu_Items_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `Restaurants` (`Restaurant_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB NOT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Orders
--
CREATE TABLE `Orders` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `Status` enum('Pending','Confirmed','Completed','Cancelled') NOT NULL,
  `Total_Price` decimal(10,2) NOT NULL,
  `Delivery_Address` varchar(255) NOT NULL,
  `Order_Date_Time` datetime NOT NULL,
  `Delivery_Date_Time` datetime NOT NULL,
  `Payment_Status` varchar(50) NOT NULL,
  PRIMARY KEY (`Order_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  KEY `Restaurant_ID` (`Restaurant_ID`),
  CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `Users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Orders_ibfk_2` FOREIGN KEY (`Restaurant_ID`) REFERENCES `Restaurants` (`Restaurant_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB NOT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Order_Items
--
CREATE TABLE `Order_Items` (
  `Order_Item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Order_ID` int(11) NOT NULL,
  `Item_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Order_Item_ID`),
  KEY `Order_ID` (`Order_ID`),
  KEY `Item_ID` (`Item_ID`),
  CONSTRAINT `Order_Items_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `Orders` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Order_Items_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `Menu_Items` (`Item_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB NOT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Reviews
--
CREATE TABLE `Reviews` (
  `Review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Order_ID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Comment` text,
  `Date_Time` datetime NOT NULL,
  PRIMARY KEY (`Review_ID`),
  KEY `Order_ID` (`Order_ID`),
  CONSTRAINT `Reviews_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `Orders` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB NOT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Delivery_Personnel
--
CREATE TABLE `Delivery_Personnel` (
  `DeliveryPerson_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Phone_Number` varchar(20) NOT NULL,
  `Current_Location` varchar(255) NOT NULL,
  `Availability` tinyint(1) NOT NULL,
  `Assigned_Orders` text,
  PRIMARY KEY (`DeliveryPerson_ID`)
) ENGINE=InnoDB NOT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Payments
--
CREATE TABLE `Payments` (
  `Payment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Order_ID` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Payment_Date_Time` datetime NOT NULL,
  `Payment_Method` varchar(50) NOT NULL,
  `Transaction_ID` varchar(255) NOT NULL,
  PRIMARY KEY (`Payment_ID`),
  KEY `Order_ID` (`Order_ID`),
  CONSTRAINT `Payments_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `Orders` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB NOT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
    ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
    ADD KEY 'rid' (`rid`);

--
-- Indexes for table `Order_Items`
--
ALTER TABLE `Order_Items`
  ADD PRIMARY KEY (`Order_Item_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Item_ID` (`Item_ID`);

-- Indexes for table `Payments`
ALTER TABLE `Payments`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
    MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Order_Items`
--
ALTER TABLE `Order_Items`
  MODIFY `Order_Item_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payments`
--
ALTER TABLE `Payments`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT;


COMMIT;