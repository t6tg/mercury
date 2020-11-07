-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2020 at 03:24 AM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mercury`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `Date_access` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price_access` decimal(9,2) NOT NULL,
  `branch_no` char(7) NOT NULL,
  `mem_id` char(7) DEFAULT NULL,
  `usetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`Date_access`, `price_access`, `branch_no`, `mem_id`, `usetime`) VALUES
('2020-11-06 17:52:23', '3500.00', 'MC00002', 'MB00008', '2020-11-04 11:00:00'),
('2020-11-06 17:52:28', '3500.00', 'MC00002', 'MB00008', '2020-11-04 11:00:00'),
('2020-11-06 17:52:31', '4000.00', 'MC00004', 'MB00005', '2020-11-20 18:00:00'),
('2020-11-06 17:52:36', '1500.00', 'MC00003', 'MB00002', '2020-11-19 17:00:00'),
('2020-11-06 17:52:40', '6500.00', 'MC00005', 'MB00006', '2020-11-11 11:00:00'),
('2020-11-06 17:52:52', '5000.00', 'MC00006', 'MB00010', '2020-11-13 15:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_no` char(7) NOT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `branch_address` text,
  `branch_status` enum('open','close') DEFAULT NULL,
  `brach_open` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_no`, `branch_name`, `branch_address`, `branch_status`, `brach_open`) VALUES
('MC00001', 'The Mercury A', 'รัชดา ซอย 1', 'open', '16:00:00'),
('MC00002', 'The Mercury B', 'รัชดา ซอย 2', 'open', '17:00:00'),
('MC00003', 'The Mercury C', 'รัชดา ซอย 3', 'close', '18:00:00'),
('MC00004', 'The Mercury D', 'สีลม ซอย 4', 'open', '19:00:00'),
('MC00005', 'The Mercury E', 'สีลม ซอย 4', 'open', '15:00:00'),
('MC00006', 'The Mercury C', 'รัชดา ซอย 6', 'close', '18:00:00'),
('MC00007', 'The Mercury X', 'รัชดา ซอย 7', 'open', '18:00:00'),
('MC00008', 'The Mercury Q', 'พัทยา ซอย 8', 'open', '19:00:00'),
('MC00009', 'The Mercury Gold', 'รัชดา ซอย 9', 'open', '20:00:00'),
('MC00010', 'The Mercury Platinum', 'นิวยอร์ก', 'close', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` char(7) NOT NULL,
  `mem_name` varchar(50) DEFAULT NULL,
  `gender` enum('ชาย','หญิง') DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `member_class` enum('Silver','Gold','Platinum','Diamond') DEFAULT NULL,
  `create_member` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `gender`, `bdate`, `member_class`, `create_member`) VALUES
('MB00001', 'สุเทพ เทือกเขา', 'ชาย', '1999-09-19', 'Silver', 'MC00007'),
('MB00002', 'ปรีชา หวยไทย', 'ชาย', '1989-11-11', 'Gold', 'MC00009'),
('MB00003', 'เหมือนเดิม โอโจ้ด้วย', 'หญิง', '1979-10-10', 'Gold', 'MC00008'),
('MB00004', 'คิดจะพัก คิดถึงคิทแคท', 'ชาย', '1969-12-12', 'Platinum', 'MC00001'),
('MB00005', 'สมเจียม เตรียมพร้อม', 'ชาย', '1966-01-13', 'Diamond', 'MC00006'),
('MB00006', 'ปรีณา ไกลบ้าน', 'หญิง', '1959-09-09', 'Silver', 'MC00002'),
('MB00007', 'ประยุทธ์ สุดจัด', 'ชาย', '2000-01-18', 'Diamond', 'MC00001'),
('MB00008', 'เปรมชัย เสือดำรงค์', 'ชาย', '1988-08-08', 'Platinum', 'MC00002'),
('MB00009', 'ประวิทย์ ร้อยเรือน', 'ชาย', '1999-09-09', 'Diamond', 'MC00009'),
('MB00010', 'ธนาธร จึงรุ่งเรื่อง', 'ชาย', '1995-05-05', 'Diamond', 'MC00010');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffno` char(7) NOT NULL,
  `staffname` varchar(50) NOT NULL,
  `worktime` time DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `gender` enum('ชาย','หญิง') DEFAULT NULL,
  `branch_no` char(7) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mem_role` varchar(20) DEFAULT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffno`, `staffname`, `worktime`, `type`, `gender`, `branch_no`, `password`, `mem_role`, `price`) VALUES
('ME00001', 'สมชาย ศรีสมร', '16:00:00', 'พนักงานนวด', 'หญิง', 'MC00001', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 2000),
('ME00002', 'สมหญิง คิงคอง', '17:00:00', 'พนักงานนวด', 'หญิง', 'MC00002', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 2200),
('ME00003', 'ประยุทธ จันทร์ชงชา', '20:00:00', 'พนักงานนวด', 'หญิง', 'MC00003', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 4500),
('ME00004', 'เมธี สีสว่าง', '19:00:00', 'พนักงานนวด', 'หญิง', 'MC00004', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 6000),
('ME00005', 'เมธาวี สีไม่ตก', '15:00:00', 'พนักงานนวด', 'หญิง', 'MC00005', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 3260),
('ME00006', 'ทรงยศ ไม่ทรงเยอะ', '18:00:00', 'พนักงานนวด', 'หญิง', 'MC00006', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 8000),
('ME00007', 'พรประวี ดีเสมอ', '18:00:00', 'พนักงานนวด', 'หญิง', 'MC00007', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 9860),
('ME00008', 'ประนอม ยอมไปก่อน', '19:00:00', 'พนักงานนวด', 'หญิง', 'MC00008', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 2333),
('ME00009', 'สมศรี ศรีไม่ตก', '20:00:00', 'พนักงานนวด', 'หญิง', 'MC00002', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 4444),
('ME00010', 'สมชาย สายควัน', '20:00:00', 'พนักงานนวด', 'หญิง', 'MC00010', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 12345),
('test', 'test', NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 3232);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`Date_access`),
  ADD KEY `branch_no` (`branch_no`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_no`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`),
  ADD KEY `create_member` (`create_member`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffno`),
  ADD KEY `branch_no` (`branch_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `access_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`),
  ADD CONSTRAINT `access_ibfk_2` FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`create_member`) REFERENCES `branch` (`branch_no`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
