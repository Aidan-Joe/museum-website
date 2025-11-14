-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2025 at 04:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_museum`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GenerateAdminCode` (OUT `newCode` INT(6))   BEGIN
  DECLARE lastCode INT;
  SELECT IFNULL(MAX(AdminCode), 0) + 1 INTO lastCode FROM admin;
  SET newCode = lastCode;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GenerateMemberCode` (OUT `newCode` INT(11))   BEGIN
  DECLARE lastCode INT;
  SELECT IFNULL(MAX(MemCode), 0) + 1 INTO lastCode FROM member;
  SET newCode = lastCode;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GeneratePaymentCode` (OUT `newCode` CHAR(6))   BEGIN
  DECLARE lastCode INT;
  SELECT IFNULL(MAX(SUBSTRING(PaymentCode, 4)), 0) + 1 INTO lastCode FROM payment;
  SET newCode = CONCAT('Pay', LPAD(lastCode, 3, '0'));
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GenerateTicketCode` (OUT `newCode` CHAR(6))   BEGIN
  DECLARE lastCode INT;
  SELECT IFNULL(MAX(SUBSTRING(ticketCode, 4)), 0) + 1 INTO lastCode FROM ticket;
  SET newCode = CONCAT('Tic', LPAD(lastCode, 3, '0'));
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GenerateTransactionCode` (OUT `newCode` CHAR(6))   BEGIN
  DECLARE lastCode INT;
  SELECT IFNULL(MAX(SUBSTRING(transactionCode, 4)), 0) + 1 INTO lastCode FROM transaction;
  SET newCode = CONCAT('Trx', LPAD(lastCode, 3, '0'));
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminCode` int(5) NOT NULL,
  `SuperAdminCode` int(5) NOT NULL,
  `AdminName` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Status` enum('Active','Inactive') DEFAULT NULL,
  `admin_email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminCode`, `SuperAdminCode`, `AdminName`, `Address`, `PhoneNumber`, `Status`, `admin_email`, `Password`) VALUES
(1, 1, 'Jane Doe', 'Grand Bekasi Street', '08124217', 'Active', 'jane@museum.com', '1234'),
(2, 1, 'Steve Harwell', 'Jaga Karsa Street', '08561450', 'Active', 'steve@museum.com', '1234'),
(3, 1, 'Ryan Ghosling', '', '', 'Active', 'ryan@museum.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemCode` int(11) NOT NULL,
  `MemberName` varchar(100) NOT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL,
  `Address` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemCode`, `MemberName`, `Gender`, `Address`, `PhoneNumber`, `member_email`, `Password`) VALUES
(1, 'John Doe', 'Female', 'Carnaby Street', '08470976', 'john@email.com', '1234'),
(2, 'Sarah Johnson', 'Female', 'Fleet Street', '08747621', 'sarah@email.com', '1234'),
(3, 'Matt Schulz', 'Male', 'High Holborn', '08128801', 'matt@email.com', '1234'),
(4, 'Zal Samsung S23', '', '', '', 'zalbatukam@gmail.com', '1234'),
(5, 'Cyrenesayang', '', '', '', 'cyrene@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentCode` char(6) NOT NULL,
  `TransactionCode` char(6) NOT NULL,
  `PaymentDate` date NOT NULL,
  `PaymentMethod` enum('Cash','Credit','Transfer') DEFAULT NULL,
  `Status` enum('Pending','Confirmed','Cancelled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentCode`, `TransactionCode`, `PaymentDate`, `PaymentMethod`, `Status`) VALUES
('Pay001', 'Trx001', '2025-10-20', 'Cash', 'Confirmed'),
('Pay002', 'Trx002', '2025-10-22', 'Cash', 'Pending'),
('Pay003', 'Trx003', '2025-10-25', 'Cash', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `SuperAdminCode` int(5) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `superadmin_email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` enum('Active','Inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`SuperAdminCode`, `Name`, `PhoneNumber`, `superadmin_email`, `Password`, `Status`) VALUES
(1, 'Admin User', '08123456', 'admin@museum.com', '1234', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TicketCode` char(6) NOT NULL,
  `TicketCategoryCode` char(6) NOT NULL,
  `TicketName` varchar(100) NOT NULL,
  `TicketPrice` decimal(10,2) NOT NULL,
  `TotalVisitors` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TicketCode`, `TicketCategoryCode`, `TicketName`, `TicketPrice`, `TotalVisitors`) VALUES
('Tic001', 'Tcc01', 'General Admission', 25000.00, 0),
('Tic002', 'Tcc02', 'General Admission', 20000.00, 1),
('Tic003', 'Tcc03', 'General Admission', 10000.00, 1),
('Tic004', 'Tcc04', 'General Admission', 50000.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ticketcategory`
--

CREATE TABLE `ticketcategory` (
  `TicketCategoryCode` char(6) NOT NULL,
  `CategoryType` enum('Adult','Student','Child','Family') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticketcategory`
--

INSERT INTO `ticketcategory` (`TicketCategoryCode`, `CategoryType`) VALUES
('Tcc01', 'Adult'),
('Tcc02', 'Student'),
('Tcc03', 'Child'),
('Tcc04', 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionCode` char(6) NOT NULL,
  `AdminCode` int(5) NOT NULL,
  `MemCode` int(11) NOT NULL,
  `TransactionDate` date NOT NULL,
  `TotalTransaction` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionCode`, `AdminCode`, `MemCode`, `TransactionDate`, `TotalTransaction`) VALUES
('Trx001', 1, 1, '2025-10-17', 10000.00),
('Trx002', 1, 2, '2025-10-17', 20000.00),
('Trx003', 2, 3, '2025-10-18', 100000.00);

-- --------------------------------------------------------

--
-- Table structure for table `transdetail`
--

CREATE TABLE `transdetail` (
  `TransactionCode` char(6) NOT NULL,
  `TicketCode` char(6) NOT NULL,
  `TicketType` enum('Adult','Student','Child','Family') NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transdetail`
--

INSERT INTO `transdetail` (`TransactionCode`, `TicketCode`, `TicketType`, `Quantity`) VALUES
('Trx001', 'Tic001', 'Child', 1),
('Trx002', 'Tic002', 'Student', 1),
('Trx003', 'Tic004', 'Family', 2);

--
-- Triggers `transdetail`
--
DELIMITER $$
CREATE TRIGGER `after_transdetail_delete` AFTER DELETE ON `transdetail` FOR EACH ROW BEGIN
  UPDATE ticket
  SET TotalVisitors = GREATEST(TotalVisitors - OLD.Quantity, 0)
  WHERE TicketCategoryCode = (
    SELECT TicketCategoryCode FROM ticketcategory WHERE CategoryType = OLD.TicketType LIMIT 1
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_transdetail_insert` AFTER INSERT ON `transdetail` FOR EACH ROW BEGIN
  UPDATE ticket
  SET TotalVisitors = TotalVisitors + NEW.Quantity
  WHERE TicketCategoryCode = (
    SELECT TicketCategoryCode FROM ticketcategory WHERE CategoryType = NEW.TicketType LIMIT 1
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_transdetail_update` AFTER UPDATE ON `transdetail` FOR EACH ROW BEGIN
  DECLARE oldCatCode VARCHAR(10);
  DECLARE newCatCode VARCHAR(10);

  
  SELECT TicketCategoryCode INTO oldCatCode
  FROM ticketcategory
  WHERE CategoryType = OLD.TicketType
  LIMIT 1;

  SELECT TicketCategoryCode INTO newCatCode
  FROM ticketcategory
  WHERE CategoryType = NEW.TicketType
  LIMIT 1;

  
  IF OLD.TicketType <> NEW.TicketType THEN
    UPDATE ticket
    SET TotalVisitors = GREATEST(TotalVisitors - OLD.Quantity, 0)
    WHERE TicketCategoryCode = oldCatCode;

    UPDATE ticket
    SET TotalVisitors = TotalVisitors + NEW.Quantity
    WHERE TicketCategoryCode = newCatCode;

 
  ELSE
    UPDATE ticket
    SET TotalVisitors = GREATEST(TotalVisitors + (NEW.Quantity - OLD.Quantity), 0)
    WHERE TicketCategoryCode = newCatCode;
  END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminCode`),
  ADD KEY `fkSuperAdmin` (`SuperAdminCode`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemCode`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentCode`),
  ADD KEY `fkTransaction` (`TransactionCode`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`SuperAdminCode`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TicketCode`),
  ADD KEY `fkTicketCategory` (`TicketCategoryCode`);

--
-- Indexes for table `ticketcategory`
--
ALTER TABLE `ticketcategory`
  ADD PRIMARY KEY (`TicketCategoryCode`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionCode`),
  ADD KEY `fkAdmin` (`AdminCode`),
  ADD KEY `fkMember` (`MemCode`);

--
-- Indexes for table `transdetail`
--
ALTER TABLE `transdetail`
  ADD KEY `fkTransdetail` (`TransactionCode`),
  ADD KEY `fkTransTicket` (`TicketCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fkSuperAdmin` FOREIGN KEY (`SuperAdminCode`) REFERENCES `superadmin` (`SuperAdminCode`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fkTransaction` FOREIGN KEY (`TransactionCode`) REFERENCES `transaction` (`TransactionCode`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fkTicketCategory` FOREIGN KEY (`TicketCategoryCode`) REFERENCES `ticketcategory` (`TicketCategoryCode`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fkAdmin` FOREIGN KEY (`AdminCode`) REFERENCES `admin` (`AdminCode`),
  ADD CONSTRAINT `fkMember` FOREIGN KEY (`MemCode`) REFERENCES `member` (`MemCode`);

--
-- Constraints for table `transdetail`
--
ALTER TABLE `transdetail`
  ADD CONSTRAINT `fkTransTicket` FOREIGN KEY (`TicketCode`) REFERENCES `ticket` (`TicketCode`),
  ADD CONSTRAINT `fkTransdetail` FOREIGN KEY (`TransactionCode`) REFERENCES `transaction` (`TransactionCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
