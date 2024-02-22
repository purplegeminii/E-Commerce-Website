DROP DATABASE IF EXISTS food_db;
CREATE DATABASE food_db;
USE food_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Database: food_ordering_system`
--

-- Table structure for table `Roles`
--
CREATE TABLE `Role` (
    `rid` int(11) NOT NULL,
    `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`rid`, `rolename`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'standard');

-- Table structure for table `Users`
--
CREATE TABLE `Users` (
  User_ID int(11) NOT NULL AUTO_INCREMENT,
  Username varchar(255) NOT NULL,
  Email varchar(255) NOT NULL,
  Password varchar(255) NOT NULL,
  Phone_Number varchar(20) NOT NULL,
  Address varchar(255) NOT NULL,
  `Role_ID` int(11) NOT NULL,
  PRIMARY KEY (User_ID),
  KEY `Role_ID` (`Role_ID`),
  CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `Role` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Restaurants
--
CREATE TABLE `Restaurants` (
  Restaurant_ID int(11) NOT NULL AUTO_INCREMENT,
  Name varchar(255) DEFAULT NULL,
  Address varchar(255) DEFAULT NULL,
  Phone_Number varchar(20) DEFAULT NULL,
  Owner_ID int(11) DEFAULT NULL,
  Cuisine_Type varchar(255) DEFAULT NULL,
  Delivery_Area varchar(255) DEFAULT NULL,
  Opening_Hours varchar(255) DEFAULT NULL,
  PRIMARY KEY (Restaurant_ID),
  KEY Owner_ID (Owner_ID),
  CONSTRAINT Restaurants_ibfk_1 FOREIGN KEY (Owner_ID) REFERENCES Users (User_ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `Menu_Items`
--
CREATE TABLE `Menu_Items` (
  Item_ID int(11) NOT NULL AUTO_INCREMENT,
  Restaurant_ID int(11) DEFAULT NULL,
  Name varchar(255) DEFAULT NULL,
  Description text,
  Price decimal(10,2) DEFAULT NULL,
  Category varchar(50) DEFAULT NULL,
  Availability tinyint(1) DEFAULT NULL,
  PRIMARY KEY (Item_ID),
  KEY Restaurant_ID (Restaurant_ID),
  CONSTRAINT Menu_Items_ibfk_1 FOREIGN KEY (Restaurant_ID) REFERENCES Restaurants (Restaurant_ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Orders
--
CREATE TABLE `Orders` (
  Order_ID int(11) NOT NULL AUTO_INCREMENT,
  Customer_ID int(11) DEFAULT NULL,
  Restaurant_ID int(11) DEFAULT NULL,
  Status enum('Pending','Confirmed','Completed','Cancelled') DEFAULT NULL,
  Total_Price decimal(10,2) DEFAULT NULL,
  Delivery_Address varchar(255) DEFAULT NULL,
  Order_Date_Time datetime DEFAULT NULL,
  Delivery_Date_Time datetime DEFAULT NULL,
  Payment_Status varchar(50) DEFAULT NULL,
  
  PRIMARY KEY (Order_ID),
  KEY Customer_ID (Customer_ID),
  KEY Restaurant_ID (Restaurant_ID),
  CONSTRAINT Orders_ibfk_1 FOREIGN KEY (Customer_ID) REFERENCES Users (User_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT Orders_ibfk_2 FOREIGN KEY (Restaurant_ID) REFERENCES Restaurants (Restaurant_ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Order_Items
--
CREATE TABLE `Order_Items` (
  Order_Item_ID int(11) NOT NULL AUTO_INCREMENT,
  Order_ID int(11) DEFAULT NULL,
  Item_ID int(11) DEFAULT NULL,
  Quantity int(11) DEFAULT NULL,
  Subtotal decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (Order_Item_ID),
  KEY Order_ID (Order_ID),
  KEY Item_ID (Item_ID),
  CONSTRAINT Order_Items_ibfk_1 FOREIGN KEY (Order_ID) REFERENCES Orders (Order_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT Order_Items_ibfk_2 FOREIGN KEY (Item_ID) REFERENCES Menu_Items (Item_ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Reviews
--
CREATE TABLE `Reviews` (
  Review_ID int(11) NOT NULL AUTO_INCREMENT,
  Order_ID int(11) DEFAULT NULL,
  Rating int(11) DEFAULT NULL,
  Comment text,
  Date_Time datetime DEFAULT NULL,
  PRIMARY KEY (Review_ID),
  KEY Order_ID (Order_ID),
  CONSTRAINT Reviews_ibfk_1 FOREIGN KEY (Order_ID) REFERENCES Orders (Order_ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- -- Table structure for table Admins
-- --
-- CREATE TABLE Admins (
--   Admin_ID int(11) NOT NULL AUTO_INCREMENT,
--   Username varchar(255) DEFAULT NULL,
--   Password varchar(255) DEFAULT NULL,
--   Email varchar(255) DEFAULT NULL,
--   PRIMARY KEY (Admin_ID)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Delivery_Personnel
--
CREATE TABLE Delivery_Personnel (
  DeliveryPerson_ID int(11) NOT NULL AUTO_INCREMENT,
  Name varchar(255) DEFAULT NULL,
  Phone_Number varchar(20) DEFAULT NULL,
  Current_Location varchar(255) DEFAULT NULL,
  Availability tinyint(1) DEFAULT NULL,
  Assigned_Orders text,
  PRIMARY KEY (DeliveryPerson_ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table Payments
--
CREATE TABLE Payments (
  Payment_ID int(11) NOT NULL AUTO_INCREMENT,
  Order_ID int(11) DEFAULT NULL,
  Amount decimal(10,2) DEFAULT NULL,
  Payment_Date_Time datetime DEFAULT NULL,
  Payment_Method varchar(50) DEFAULT NULL,
  Transaction_ID varchar(255) DEFAULT NULL,
  PRIMARY KEY (Payment_ID),
  KEY Order_ID (Order_ID),
  CONSTRAINT Payments_ibfk_1 FOREIGN KEY (Order_ID) REFERENCES Orders (Order_ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;

