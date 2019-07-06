-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2018 at 05:21 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` varchar(10) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_no` int(10) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `c_name`, `c_no`, `pass`) VALUES
('1', 'shakir', 1234567890, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cust_req`
--

CREATE TABLE `cust_req` (
  `req_id` int(10) NOT NULL,
  `sp_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  `client_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_req`
--

INSERT INTO `cust_req` (`req_id`, `sp_id`, `quantity`, `date`, `status`, `client_id`) VALUES
(1, 2, 100, '2018-09-14 19:34:55', 'confirmed', '1');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `m_name` varchar(20) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`m_name`, `u_name`, `pass`, `contact`) VALUES
('sahil', 'sahil', '12345', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `m_id` varchar(10) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `avail` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `supp_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material_req`
--

CREATE TABLE `material_req` (
  `req_id` varchar(10) NOT NULL,
  `m_id` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) NOT NULL,
  `amt` bigint(20) NOT NULL,
  `client_id` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sp_part`
--

CREATE TABLE `sp_part` (
  `sp_id` int(10) NOT NULL,
  `sp_name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `avail` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_part`
--

INSERT INTO `sp_part` (`sp_id`, `sp_name`, `price`, `avail`) VALUES
(2, 'gearbox', 10000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` varchar(20) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `c_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `c_name`, `pass`, `c_no`) VALUES
('1', 'yusuf', '12345', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `cust_req`
--
ALTER TABLE `cust_req`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `sp_id` (`sp_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`u_name`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `supp_id` (`supp_id`);

--
-- Indexes for table `material_req`
--
ALTER TABLE `material_req`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `sp_part`
--
ALTER TABLE `sp_part`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cust_req`
--
ALTER TABLE `cust_req`
  MODIFY `req_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_part`
--
ALTER TABLE `sp_part`
  MODIFY `sp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cust_req`
--
ALTER TABLE `cust_req`
  ADD CONSTRAINT `cust_req_ibfk_1` FOREIGN KEY (`sp_id`) REFERENCES `sp_part` (`sp_id`),
  ADD CONSTRAINT `cust_req_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`supp_id`) REFERENCES `supplier` (`supp_id`);

--
-- Constraints for table `material_req`
--
ALTER TABLE `material_req`
  ADD CONSTRAINT `material_req_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `material` (`m_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
