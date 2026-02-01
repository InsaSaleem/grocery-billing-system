-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2026 at 04:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery-billing-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BillID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `BillDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`BillID`, `CustomerID`, `BillDate`, `TotalAmount`) VALUES
(2, 12, '2024-01-15', 1850.00),
(3, 7, '2024-01-20', 980.00),
(4, 20, '2024-02-01', 1450.00),
(5, 2, '2024-02-05', 2100.00),
(6, 25, '2024-02-10', 750.00),
(7, 14, '2024-02-18', 1320.00),
(8, 30, '2024-03-01', 1590.00),
(10, 11, '2024-03-08', 890.00),
(11, 9, '2024-03-15', 2200.00),
(12, 3, '2024-03-20', 1760.00),
(13, 16, '2024-04-01', 1375.00),
(14, 4, '2024-04-05', 1680.00),
(15, 17, '2024-04-10', 900.00),
(16, 21, '2024-04-15', 1125.00),
(17, 6, '2024-04-20', 2500.00),
(18, 10, '2024-04-25', 1995.00),
(19, 22, '2024-05-01', 1550.00),
(20, 27, '2024-05-05', 1640.00),
(21, 15, '2024-05-10', 870.00),
(22, 28, '2024-05-12', 1210.00),
(23, 8, '2024-05-15', 1345.00),
(24, 18, '2024-05-18', 980.00),
(26, 24, '2024-05-24', 1430.00),
(28, 23, '2024-05-29', 1095.00);

-- --------------------------------------------------------

--
-- Table structure for table `bill_item`
--

CREATE TABLE `bill_item` (
  `BillItemID` int(11) NOT NULL,
  `BillID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_item`
--

INSERT INTO `bill_item` (`BillItemID`, `BillID`, `ProductID`, `Quantity`, `TotalPrice`) VALUES
(2, 2, 10, 1, 140.00),
(3, 3, 15, 3, 3450.00),
(4, 4, 8, 2, 320.00),
(5, 5, 20, 1, 180.00),
(7, 7, 12, 1, 220.00),
(8, 8, 18, 2, 600.00),
(10, 10, 7, 4, 200.00),
(11, 11, 25, 2, 420.00),
(12, 12, 6, 1, 1050.00),
(13, 13, 14, 1, 480.00),
(14, 14, 4, 3, 750.00),
(15, 15, 9, 2, 220.00),
(16, 16, 11, 5, 450.00),
(17, 17, 22, 2, 260.00),
(18, 18, 19, 1, 320.00),
(19, 19, 13, 3, 1050.00),
(20, 20, 17, 1, 1250.00),
(21, 21, 23, 2, 900.00),
(22, 22, 28, 3, 360.00),
(23, 23, 26, 2, 320.00),
(24, 24, 16, 1, 950.00);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Frozen Food'),
(2, 'Beverages'),
(3, 'Meat'),
(4, 'Personal Care'),
(5, 'Beverages'),
(6, 'Personal Care'),
(7, 'Beverages'),
(8, 'Frozen Foods'),
(9, 'Cleaning Supplies'),
(11, 'Beverages'),
(12, 'Beverages'),
(13, 'Beverages'),
(14, 'Bakery'),
(15, 'Snacks'),
(16, 'Cleaning Supplies'),
(17, 'Snacks'),
(18, 'Frozen Foods');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `Phone`) VALUES
(1, 'Alaya', '45677435634'),
(2, 'Bilal Ahmed', '322-2345678'),
(3, 'Fatima Ali', '323-3456789'),
(4, 'Hamza Malik', '324-4567890'),
(5, 'Zainab Tariq', '325-5678901'),
(6, 'Omar Shah', '326-6789012'),
(7, 'Maryam Iqbal', '327-7890123'),
(8, 'Usman Raza', '328-8901234'),
(9, 'Sara Javed', '329-9012345'),
(10, 'Ali Hassan', '330-0123456'),
(11, 'Noor Fatima', '331-1230987'),
(12, 'Hassan Rafi', '332-2341098'),
(14, 'Adeel Khan', '334-4563210'),
(15, 'Kiran Ahmad', '335-5674321'),
(16, 'Zafar Ali', '336-6785432'),
(17, 'Nida Latif', '337-7896543'),
(18, 'Adnan Qureshi', '338-8907654'),
(20, 'Imran Saeed', '340-0129876'),
(21, 'Sadia Karim', '341-1230987'),
(22, 'Fahad Malik', '342-2341098'),
(23, 'Rabia Noor', '343-3452109'),
(24, 'Asad Zaman', '344-4563210'),
(25, 'Nawal Tariq', '345-5674321'),
(26, 'Owais Javed', '346-6785432'),
(27, 'Sumaira Iqbal', '347-7896543'),
(28, 'Shahid Raza', '348-8907654'),
(29, 'Amina Farooq', '349-9018765'),
(30, 'Zeeshan Ahmad', '350-0129876'),
(32, 'Mayonise', '12345'),
(33, 'customer 2', '123444444444444'),
(34, 'Ayesha', '45677435678'),
(36, 'Ayesha', '45677435678'),
(38, 'Tayyab', '0345657898'),
(39, 'Ayesha', '88577686999'),
(41, 'Mansoor Sadiq', '456774356766'),
(42, 'Ayesha', '45677435678'),
(43, 'Ayesha', '88577686999');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Name`, `Role`) VALUES
(1, 'Ayesha ', 'Manager'),
(2, 'Sana Khalid', 'Stock Keeper'),
(3, 'Usman Javed', 'Store Manager'),
(4, 'Hira Aslam', 'Sales Assistant'),
(5, 'Ali Khan', 'Cashier'),
(6, 'Zoya Tariq', 'Inventory Manager'),
(7, 'Faisal Shah', 'Cashier'),
(8, 'Mariam Iqbal', 'Customer Support'),
(9, 'Noman Akhtar', 'Cashier'),
(10, 'Areeba Malik', 'Store Helper'),
(11, 'Bilal Saeed', 'Supervisor'),
(12, 'Nimra Rehman', 'Cashier'),
(13, 'Talha Yousaf', 'Stock Keeper'),
(14, 'Nadia Rizwan', 'Store Manager'),
(15, 'Shayan Ali', 'Cashier'),
(16, 'Kinza Ahmed', 'Sales Assistant'),
(17, 'Imran Latif', 'Cashier'),
(18, 'Rabia Shahid', 'Inventory Clerk'),
(19, 'Owais Mirza', 'Store Helper'),
(20, 'Farah Zaman', 'Customer Support'),
(21, 'Hassan Tariq', 'Shift Manager'),
(22, 'Iqra Jamil', 'Billing Clerk'),
(23, 'Zain Shah', 'Sales Assistant'),
(24, 'Mehwish Nasir', 'Cashier'),
(25, 'Kamran Aziz', 'Store Assistant'),
(26, 'Laiba Siddiq', 'Cashier'),
(27, 'Rizwan Butt', 'Inventory Manager'),
(28, 'Neha Saleem', 'Customer Support'),
(29, 'Shahzad Rafi', 'Stock Keeper'),
(30, 'Tayyab', 'Manager'),
(31, 'Insa', 'Sales Associate'),
(32, 'Maria Yasmeen', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `BillID` int(11) DEFAULT NULL,
  `PaymentMethod` varchar(20) DEFAULT NULL,
  `AmountPaid` decimal(10,2) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `BillID`, `PaymentMethod`, `AmountPaid`, `PaymentDate`) VALUES
(3, 3, 'Online', 980.00, '2024-01-21'),
(4, 4, 'Easypaisa', 1450.00, '2024-02-02'),
(5, 5, 'JazzCash', 2100.00, '2024-02-06'),
(6, 6, 'Cash', 750.00, '2024-02-10'),
(7, 7, 'Card', 1320.00, '2024-02-19'),
(8, 8, 'Online', 1590.00, '2024-03-01'),
(10, 10, 'Easypaisa', 890.00, '2024-03-08'),
(11, 11, 'Card', 2200.00, '2024-03-16'),
(12, 12, 'Online', 1760.00, '2024-03-21'),
(13, 13, 'Cash', 1375.00, '2024-04-01'),
(14, 14, 'JazzCash', 1680.00, '2024-04-06'),
(15, 15, 'Cash', 900.00, '2024-04-11'),
(16, 16, 'Card', 1125.00, '2024-04-16'),
(17, 17, 'Easypaisa', 2500.00, '2024-04-20'),
(18, 18, 'Cash', 1995.00, '2024-04-26'),
(19, 19, 'JazzCash', 1550.00, '2024-05-01'),
(20, 20, 'Online', 1640.00, '2024-05-06'),
(21, 21, 'Cash', 870.00, '2024-05-10'),
(22, 22, 'Card', 1210.00, '2024-05-12'),
(23, 23, 'Online', 1345.00, '2024-05-15'),
(24, 24, 'Cash', 980.00, '2024-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Price`, `Stock`, `CategoryID`) VALUES
(1, 'Shampoo', 1200.00, 12, 82),
(4, 'Fresh Apples 1kg', 250.00, 35, 4),
(5, 'Chicken Breast 1kg', 850.00, 25, 5),
(6, 'Prawns 500g', 1050.00, 20, 6),
(7, 'Potato Chips', 50.00, 100, 7),
(8, 'Frozen Peas 500g', 160.00, 30, 8),
(9, 'Canned Corn', 110.00, 45, 9),
(10, 'Tomato Ketchup', 140.00, 50, 10),
(11, 'Macaroni 500g', 90.00, 70, 11),
(12, 'Cornflakes 250g', 220.00, 35, 12),
(13, 'Shampoo 200ml', 350.00, 40, 13),
(14, 'Laundry Detergent 1kg', 480.00, 20, 14),
(15, 'Baby Diapers (Pack of 20)', 1150.00, 15, 15),
(16, 'Dog Food 2kg', 950.00, 10, 16),
(17, 'Red Wine 750ml', 1250.00, 12, 17),
(18, 'Chia Seeds 250g', 300.00, 25, 18),
(19, 'Organic Eggs (Dozen)', 320.00, 30, 19),
(20, 'All Purpose Flour 2kg', 180.00, 40, 20),
(21, 'Turkey Slices 500g', 800.00, 15, 21),
(22, 'Chicken Soup Can', 130.00, 45, 22),
(23, 'Vanilla Ice Cream Tub', 450.00, 20, 23),
(24, 'Black Pepper Powder', 95.00, 60, 24),
(25, 'BBQ Sauce Bottle', 210.00, 25, 25),
(26, 'Orange Juice 1L', 160.00, 30, 26),
(27, 'Green Tea Box', 180.00, 35, 27),
(28, 'Chocolate Bar', 120.00, 100, 28),
(29, 'Almonds 250g', 390.00, 20, 29),
(30, 'Rice', 33.00, 3, 2),
(32, 'Shampoo', 22.90, 3, 1),
(33, 'Soap', 350.00, 200, 1),
(34, 'Shampoo', 667.00, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BillID`),
  ADD KEY `fk_bill_customer` (`CustomerID`);

--
-- Indexes for table `bill_item`
--
ALTER TABLE `bill_item`
  ADD PRIMARY KEY (`BillItemID`),
  ADD KEY `fk_billitem_bill` (`BillID`),
  ADD KEY `fk_billitem_product` (`ProductID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `fk_payment_bill` (`BillID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `fk_product_category` (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_customer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE;

--
-- Constraints for table `bill_item`
--
ALTER TABLE `bill_item`
  ADD CONSTRAINT `fk_billitem_bill` FOREIGN KEY (`BillID`) REFERENCES `bill` (`BillID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_billitem_product` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_bill` FOREIGN KEY (`BillID`) REFERENCES `bill` (`BillID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
