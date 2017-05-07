-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2017 at 12:24 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assigned_roles`
--

CREATE TABLE `tbl_assigned_roles` (
  `ASSIGNED_ROLE_ID` int(11) NOT NULL,
  `LOGIN_ID` int(11) NOT NULL,
  `ASSIGNED_ROLE` int(5) NOT NULL,
  `ASSIGNED_SUBROLE` char(4) NOT NULL,
  `ASSIGNED_SUBROLE2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assigned_roles`
--

INSERT INTO `tbl_assigned_roles` (`ASSIGNED_ROLE_ID`, `LOGIN_ID`, `ASSIGNED_ROLE`, `ASSIGNED_SUBROLE`, `ASSIGNED_SUBROLE2`) VALUES
(1, 1, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `CLASS_ID` int(11) NOT NULL,
  `CLASS` varchar(100) NOT NULL,
  `CLASS_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `COUNTRY_ID` int(11) NOT NULL,
  `COUNTRY` varchar(100) NOT NULL,
  `COUNTRY_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_institutions`
--

CREATE TABLE `tbl_institutions` (
  `INSTITUTION_ID` int(11) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `CITY` varchar(150) NOT NULL,
  `STATE_ID` int(3) NOT NULL,
  `INSTITUTION` varchar(100) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PHONE` varchar(50) NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_journeys`
--

CREATE TABLE `tbl_journeys` (
  `JOURNEY_ID` int(11) NOT NULL,
  `PRICE_ID` int(5) NOT NULL,
  `REQUESTER` int(11) NOT NULL,
  `VEHICLE_ID` int(11) NOT NULL,
  `DRIVER_ID` int(11) NOT NULL,
  `TRIP_ID` int(11) NOT NULL,
  `SINGLE_DATE_TIME` datetime NOT NULL,
  `RETURN_DATE_TIME` datetime NOT NULL,
  `RATING` int(1) NOT NULL,
  `FEEDBACK` varchar(255) NOT NULL,
  `JOURNEY_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE `tbl_locations` (
  `LOCATION_ID` int(11) NOT NULL,
  `POINT_ID` int(2) NOT NULL,
  `SOURCE_ID` int(5) NOT NULL,
  `LOCATION` varchar(255) NOT NULL,
  `LOCATION_STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `LOGIN_ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL DEFAULT 'Password1',
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`LOGIN_ID`, `USERNAME`, `EMAIL`, `PASSWORD`, `STATUS`) VALUES
(1, 'admin', '', '70ccd9007338d6d81dd3b6271621b9cf9a97ea00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup`
--

CREATE TABLE `tbl_lookup` (
  `LOOKUP_ID` int(11) NOT NULL,
  `LOOKUP_TYPE` varchar(100) NOT NULL,
  `LOOKUP_NAME` varchar(100) NOT NULL,
  `LOOKUP_VALUE` varchar(10) NOT NULL,
  `LOOKUP_DESCRIPTION` varchar(255) NOT NULL,
  `ATTRI1` int(2) NOT NULL,
  `ATTRI2` int(2) NOT NULL,
  `ATTRI3` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_points`
--

CREATE TABLE `tbl_points` (
  `POINTS_ID` int(11) NOT NULL,
  `POINTS` varchar(100) NOT NULL,
  `POINTS_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pricing`
--

CREATE TABLE `tbl_pricing` (
  `PRICE_ID` int(11) NOT NULL,
  `SOURCE_ID` int(5) NOT NULL,
  `DESTINATION_ID` int(5) NOT NULL,
  `CLASS_ID` int(3) NOT NULL,
  `PRICE` int(7) NOT NULL,
  `PRICE_STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE` varchar(100) NOT NULL,
  `ROLE_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`ROLE_ID`, `ROLE`, `ROLE_STATUS`) VALUES
(1, 'Administrator', 1),
(2, 'Owner', 1),
(3, 'Driver', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `STATE_ID` int(11) NOT NULL,
  `STATE` varchar(100) NOT NULL,
  `STATE_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`STATE_ID`, `STATE`, `STATE_STATUS`) VALUES
(1, 'Abia', 1),
(2, 'Adamawa', 1),
(3, 'Anambra', 1),
(4, 'Bauchi', 1),
(5, 'Bayelsa', 1),
(6, 'Benue', 1),
(7, 'Borno', 1),
(8, 'Cross River', 1),
(9, 'Delta', 1),
(10, 'Ebonyi', 1),
(11, 'Enugu', 1),
(12, 'Edo', 1),
(13, 'Ekiti', 1),
(14, 'Gombe', 1),
(15, 'Imo', 1),
(16, 'Jigawa', 1),
(17, 'Kaduna', 1),
(18, 'Kano', 1),
(19, 'Katsina', 1),
(20, 'Kebbi', 1),
(21, 'Kogi', 1),
(22, 'Kwara', 1),
(23, 'Lagos', 1),
(24, 'Nassarawa', 1),
(25, 'Niger', 1),
(26, 'Ogun', 1),
(27, 'Ondo', 1),
(28, 'Osun', 1),
(29, 'Oyo', 1),
(30, 'Plateau', 1),
(31, 'Rivers', 1),
(32, 'Sokoto', 1),
(33, 'Taraba', 1),
(34, 'Yobe', 1),
(35, 'Zamfara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subroles`
--

CREATE TABLE `tbl_subroles` (
  `SUBROLE_ID` int(11) NOT NULL,
  `ROLE_ID` int(2) NOT NULL,
  `SUB_ROLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_titles`
--

CREATE TABLE `tbl_titles` (
  `titleId` int(11) NOT NULL,
  `title` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_titles`
--

INSERT INTO `tbl_titles` (`titleId`, `title`) VALUES
(1, 'Mr.'),
(2, 'Mrs.'),
(3, 'Miss.'),
(4, 'Dr.'),
(5, 'Prof.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `LOGIN_ID` int(11) NOT NULL,
  `PHONENUMBER` int(15) NOT NULL,
  `TITLE_ID` int(2) NOT NULL,
  `FIRSTNAME` varchar(25) NOT NULL,
  `SURNAME` varchar(25) NOT NULL,
  `WEB_ADDRESS` varchar(255) NOT NULL,
  `LICENSE_NUMBER` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_feedback`
--

CREATE TABLE `tbl_users_feedback` (
  `FEEDBACK_ID` int(11) NOT NULL,
  `DRIVER_ID` int(5) NOT NULL,
  `OWNER_ID` int(5) NOT NULL,
  `RATING` int(1) NOT NULL,
  `FEEDBACK` varchar(255) NOT NULL,
  `RATER` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicles`
--

CREATE TABLE `tbl_vehicles` (
  `ID` int(30) NOT NULL,
  `OWNER_ID` int(11) NOT NULL,
  `DRIVER_ID` int(11) NOT NULL,
  `VEHICLE_NAME` varchar(50) NOT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `PLATE_NUMBER` varchar(50) NOT NULL,
  `COLOUR` varchar(50) NOT NULL,
  `MODEL` varchar(50) NOT NULL,
  `THUMB_NAIL` varchar(50) DEFAULT NULL,
  `class_id` int(2) NOT NULL,
  `CREATED_DATE` datetime NOT NULL,
  `CREATED_BY` varchar(11) NOT NULL,
  `MODIFIED_BY` varchar(11) DEFAULT NULL,
  `MODIFIED_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_assigned_roles`
--
ALTER TABLE `tbl_assigned_roles`
  ADD PRIMARY KEY (`ASSIGNED_ROLE_ID`),
  ADD KEY `LOGIN_ID` (`LOGIN_ID`,`ASSIGNED_ROLE`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`CLASS_ID`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`COUNTRY_ID`);

--
-- Indexes for table `tbl_institutions`
--
ALTER TABLE `tbl_institutions`
  ADD PRIMARY KEY (`INSTITUTION_ID`);

--
-- Indexes for table `tbl_journeys`
--
ALTER TABLE `tbl_journeys`
  ADD PRIMARY KEY (`JOURNEY_ID`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`LOGIN_ID`);

--
-- Indexes for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  ADD PRIMARY KEY (`LOOKUP_ID`);

--
-- Indexes for table `tbl_points`
--
ALTER TABLE `tbl_points`
  ADD PRIMARY KEY (`POINTS_ID`);

--
-- Indexes for table `tbl_pricing`
--
ALTER TABLE `tbl_pricing`
  ADD PRIMARY KEY (`PRICE_ID`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`STATE_ID`);

--
-- Indexes for table `tbl_subroles`
--
ALTER TABLE `tbl_subroles`
  ADD PRIMARY KEY (`SUBROLE_ID`),
  ADD KEY `SUB_ROLE` (`SUB_ROLE`);

--
-- Indexes for table `tbl_titles`
--
ALTER TABLE `tbl_titles`
  ADD PRIMARY KEY (`titleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD UNIQUE KEY `LOGIN_ID` (`LOGIN_ID`),
  ADD UNIQUE KEY `LOGIN_ID_3` (`LOGIN_ID`),
  ADD KEY `LOGIN_ID_2` (`LOGIN_ID`);

--
-- Indexes for table `tbl_users_feedback`
--
ALTER TABLE `tbl_users_feedback`
  ADD PRIMARY KEY (`FEEDBACK_ID`);

--
-- Indexes for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_assigned_roles`
--
ALTER TABLE `tbl_assigned_roles`
  MODIFY `ASSIGNED_ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `CLASS_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `COUNTRY_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_institutions`
--
ALTER TABLE `tbl_institutions`
  MODIFY `INSTITUTION_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_journeys`
--
ALTER TABLE `tbl_journeys`
  MODIFY `JOURNEY_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `LOGIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  MODIFY `LOOKUP_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_points`
--
ALTER TABLE `tbl_points`
  MODIFY `POINTS_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pricing`
--
ALTER TABLE `tbl_pricing`
  MODIFY `PRICE_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_states`
--
ALTER TABLE `tbl_states`
  MODIFY `STATE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_subroles`
--
ALTER TABLE `tbl_subroles`
  MODIFY `SUBROLE_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_titles`
--
ALTER TABLE `tbl_titles`
  MODIFY `titleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `LOGIN_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users_feedback`
--
ALTER TABLE `tbl_users_feedback`
  MODIFY `FEEDBACK_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
