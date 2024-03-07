DROP DATABASE IF EXISTS EE2025;
CREATE DATABASE EE2025;
USE EE2025;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: food_db
--

-- Table structure for table `Roles`
--
CREATE TABLE `Role` (
    `rid` int(11) NOT NULL,
    `rolename` varchar(50) NOT NULL,
    PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `Role`
INSERT INTO `Role` (`rid`, `rolename`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'standard');

-- Table structure for table `Users`
CREATE TABLE `Users` (
    `User_ID` int(11) NOT NULL AUTO_INCREMENT,
    `fname` varchar(50),
    `lname` varchar(50),
    `gender` enum('Male','Female') NOT NULL,
    `dob` date NOT NULL,
    `email` varchar(255) UNIQUE NOT NULL,
    `passwd` varchar(255) NOT NULL,
    `tel` varchar(20) NOT NULL,
    `address` varchar(255) NOT NULL,
    `rid` int(11) NOT NULL,
    PRIMARY KEY (`User_ID`),
    CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `Role` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `Users`
INSERT INTO `Users` (fname, lname, gender, dob, email, passwd, tel, address, rid)
VALUES ('John', 'Mensah', 'Male', '1970-08-20', 'kfcadmin126@gmail.com', '$2y$10$6fnTRb.sjgJr8QB/bwRK2.jdRnpzx4n6wRZBBnMgTbDjGkjTeDily', '+233-59-444-4444', 'Accra', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Restaurants` (Name, Address, Phone_Number, Owner_ID, Cuisine_Type, Delivery_Area, Opening_Hours)
VALUES ('KFC', '123 Main Street', '+233-55-900-2794', '1', 'Fast Food', 'Berekuso', '8am to 11pm');

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
  `Img_src` varchar(255) NOT NULL,
  PRIMARY KEY (`Item_ID`),
  KEY `Restaurant_ID` (`Restaurant_ID`),
  CONSTRAINT `Menu_Items_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `Restaurants` (`Restaurant_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Populating Menu_Items table
INSERT INTO Menu_Items (Restaurant_ID, Name, Description, Price, Category, Availability, Img_src)
VALUES
    (1, '15 PIECE BUCKET', NULL, 35.99, 'chicken-pieces-buckets', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/4a782e78-65b5-6fca-d17e-16557fb91b22.jpeg?a=55c333ed-9876-7cea-8e88-4d4a3ca41b3b'),
    (1, '9 PIECE BUCKET', NULL, 29.99, 'chicken-pieces-buckets', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/a9c83d0f-0536-f9e6-2c61-27dcc5de5f1d.jpeg?a=d8845b48-22d4-d598-ab34-5a6169e006c2'),
    (1, 'BONELESS BUCKET MEAL', NULL, 27.99, 'chicken-pieces-buckets', 1, 'https://cdn.tictuk.com/473c0973-02b4-b017-a15f-0c362258e55e/85b44ff5-6d5c-797a-d2b5-a990a0a2fcde.jpeg?a=b5833e38-5e03-ee01-3782-8559f4927438'),
    (1, 'VEG BURGER', NULL, 10.00, 'burgers', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/397a93d4-3560-f18d-51bb-aa249233062a.jpeg?a=4fc1a0e2-a75a-e164-38ba-6a21a6ccb33b'),
    (1, 'ZINGER TOWER BURGER', NULL, 4.00, 'burgers', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/974a85e0-5402-3972-5ecc-b5361120d21d.jpeg?a=540a83b1-f5e9-4940-7339-bb1c4853370f'),
    (1, 'CRUNCH BURGER - ZINGER', NULL, 9.00, 'burgers', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/28dd573b-f5ce-877d-2c06-3041d5a803a3.jpeg?a=799af0c6-b4cb-d8b2-c88b-aa26d5067b66'),
    (1, 'COLONEL TOWER BURGER', NULL, 9.00, 'burgers', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/ccb74601-58cc-156a-3e6a-9f8ba789fe90.jpeg?a=9fa119cf-bfc8-b92e-18fa-79aea52439c4'),
    (1, 'BURGER MEAL - ZINGER', NULL, 7.00, 'meals', 1, 'https://cdn.tictuk.com/2df0b3fc-3555-d893-fd12-dedb0d869bf1/3ad6bb04-a5e6-6568-2997-fcb5319e3d83.jpeg?a=26c629e1-3672-736f-4cae-466483113b0c'),
    (1, 'BOX MASTER ZINGER', NULL, 8.00, 'meals', 1, 'https://cdn.tictuk.com/2df0b3fc-3555-d893-fd12-dedb0d869bf1/2e5f0fb9-87b2-288e-32b7-8959e7034321.jpeg?a=83412a80-0137-c06a-43e5-c2c88dc1d3c4'),
    (1, 'TWISTER MEAL - ZINGER', NULL, 8.00, 'meals', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/28dd573b-f5ce-877d-2c06-3041d5a803a3.jpeg?a=799af0c6-b4cb-d8b2-c88b-aa26d5067b66'),
    (1, 'FAMILY TREAT', NULL, 12.00, 'meals', 1, 'https://cdn.tictuk.com/2df0b3fc-3555-d893-fd12-dedb0d869bf1/28dd573b-f5ce-877d-2c06-3041d5a803a3.jpeg?a=799af0c6-b4cb-d8b2-c88b-aa26d5067b66'),
    (1, 'REGULAR OREO KRUSHER', NULL, 5.00, 'desserts', 1, 'https://cdn.tictuk.com/2df0b3fc-3555-d893-fd12-dedb0d869bf1/21c76f04-2697-4296-e7c8-52c918ba9f7c.jpeg?a=c59aca31-7653-a168-3e7a-cfa3afbaad19'),
    (1, 'REGULAR BERRY KRUSHERS', NULL, 4.25, 'desserts', 1, 'https://cdn.tictuk.com/2df0b3fc-3555-d893-fd12-dedb0d869bf1/21c76f04-2697-4296-e7c8-52c918ba9f7c.jpeg?a=c59aca31-7653-a168-3e7a-cfa3afbaad19'),
    (1, 'STREETWISE 5', NULL, 30.00, 'streetwise', 1, 'https://cdn.tictuk.com/staging/fc9ab8a5-b3d3-4cf6-0e30-555e691086bf/5b9d5be1-481c-5a4c-40d9-6aa4bfc27c58.jpeg?a=6389423d-c937-d721-fb5f-500fe19c4390'),
    (1, 'STREETWISE 3', NULL, 28.00, 'streetwise', 1, 'https://cdn.tictuk.com/staging/fc9ab8a5-b3d3-4cf6-0e30-555e691086bf/55546442-bb6f-9358-e2fa-9a31bc38353e.jpeg?a=1bf05753-12cc-9387-3b4a-c6c170a65eba'),
    (1, 'STREETWISE 2', NULL, 24.00, 'streetwise', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/0b62bc94-58ee-8421-debb-37fb976b9046.jpeg?a=e49fd613-c228-4311-aa24-b62deed1265b'),
    (1, 'COCA COLA 300ML', NULL, 5.00, 'drinks', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/43500061-a98e-ccbb-3ad4-39dd6471da72.jpeg?a=731c930f-0f4b-1df2-7b9a-1e32f462301c'),
    (1, 'FANTA 300ML', NULL, 5.00, 'drinks', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/1ac232fb-42d1-3fad-fe78-21b0df08268e.jpeg?a=a30671f4-0aab-a7ce-cd97-b31a6c3e1ffb'),
    (1, 'SPRITE 300ML', NULL, 5.00, 'drinks', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/9d22f7a7-d8bc-7ee7-719e-5e9329c0cf7c.jpeg?a=ae0fce51-d74a-0822-a127-2fb083140c4c'),
    (1, 'WATER 500ML', NULL, 1.00, 'drinks', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/c31f0521-37fc-cacb-3ea0-ecd88d9e0619.jpeg?a=4badb2fa-a876-5adf-e3c8-1b37ba697f40'),
    (1, 'EXTRA HASH BROWN', NULL, 5.00, 'sides', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/ada462d4-5b3f-95ae-9a41-bf78289118ec.jpeg?a=283b0e6e-274d-e8a3-ff97-642fe3270dc2'),
    (1, 'LARGE CHIPS', NULL, 2.00, 'sides', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/1756be6c-3923-7fb0-307f-5325393c39de.jpeg?a=b36ae5a3-38c2-20c2-9a11-de2ccb94f010'),
    (1, 'ZINGER DRIP SAUCE', NULL, 3.00, 'sides', 1, 'https://cdn.tictuk.com/staging/fc9ab8a5-b3d3-4cf6-0e30-555e691086bf/0b211eb9-37c1-295e-1d3c-038828392bc9.jpeg?a=91ea4ae1-262f-d342-6fe3-74a0639c16df'),
    (1, 'STRAWBERRY MILKSHAKE', NULL, 4.00, 'desserts', 1, 'https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/97fd9cfd-0cfb-d1a7-e7e7-78a227f8d5db.jpeg?a=8fc54dc0-191d-7683-fdbe-0ebcb70d188c');


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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