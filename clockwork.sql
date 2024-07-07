-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 11:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- This is Clockwork's SQL Database.
-- Notes: long strings are stored as text instead of VARCHAR (including image paths).
-- booleans are stored as VARCHAR(1).
-- User and Application were changed to Users and Applications respectively since the former seemed to be reserved words. 

-- MYSQL is very specific about how comments are made, sorry.
-- Relations as Tables (Either N:M or N-ary relationships) ----------------------------------------------------

--
-- Database: `clockwork`
--
CREATE DATABASE IF NOT EXISTS `clockwork` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clockwork`;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `App_ID` int(11) NOT NULL,
  `Application_Name` varchar(100) NOT NULL,
  `NumOfUsers` int(11) NOT NULL DEFAULT 0,
  `Price` decimal(10,0) NOT NULL DEFAULT 9999,
  `Sale` decimal(10,0) DEFAULT NULL,
  -- Reviews is a derived attribute, not sure if to write it and make a trigger/macro that calculates its value on any change, or just get it via queries as needed.
  -- I'll go with the second approach for now (not making it)
  -- Not sure if age rating is always needed or not. Assuming it is for now.
  `AgeRating` int(11) NOT NULL DEFAULT 18,
  `System_Requirements` text DEFAULT NULL,
  `Rating` decimal(10,0) DEFAULT NULL,
  -- Somewhere to store the picture link or path.
  `Application_Picture` text DEFAULT NULL,
  -- Somewhere to store the link for the application itself.
  `Application_Link` text DEFAULT NULL,
  `AppDescription` text DEFAULT NULL,
  -- Somewhere to store the video link or path.
  `AppTrailer` text DEFAULT NULL,
  `Region` varchar(100) DEFAULT NULL,
  `Hide` varchar(1) DEFAULT NULL,  -- boolean
  `Release_Date` date DEFAULT NULL,
  `U_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorized`
--

DROP TABLE IF EXISTS `categorized`;
CREATE TABLE `categorized` (
  `App_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `Employee_ID` int(11) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Bdate` date DEFAULT NULL,
  -- Salary could also be integer.
  `Salary` decimal(10,0) DEFAULT NULL,
  -- Did this because "Address" is proably a keyword.
  `Employee_Address` varchar(100) DEFAULT NULL,
  `Department` varchar(100) NOT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  -- MySQL (which we are using) doesn't support composite attributes.
  -- So, I'll just use do Fname and Lname as two separate attributes, either this or a new table.
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Account_Type` varchar(1) NOT NULL, --Either S for Support staff or A for Adminstrator
  `Password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `GROUP_ID` int(11) NOT NULL,
  `GroupName` varchar(30) NOT NULL,
  `Date_Created` date DEFAULT NULL,
  `Group_picture` text DEFAULT NULL,
  `Group_Description` text DEFAULT NULL,
  `U_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_in`
--

DROP TABLE IF EXISTS `member_in`;
CREATE TABLE `member_in` (
  `U_ID` int(11) NOT NULL,
  `Group_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `TEXTpost` text DEFAULT NULL,
  `Date_Written` date DEFAULT NULL,
  `Post_id` int(11) NOT NULL,
  `picture` text DEFAULT NULL,
  `U_ID` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchased_by`
--

DROP TABLE IF EXISTS `purchased_by`;
CREATE TABLE `purchased_by` (
  `UserID` int(11) NOT NULL,
  `ApplicationID` int(11) NOT NULL,
  `Purchase_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  -- Not sure if "Description" is a keyword so changed it to Review_Description just in case.
  `Review_Description` text NOT NULL,
  `ReviewDate` date NOT NULL,
  `Stars` int(11) DEFAULT 3
  -- No foreign keys here, no need to specify deletion and update stuff.

) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewed`
--

DROP TABLE IF EXISTS `reviewed`;
CREATE TABLE `reviewed` (
  -- Assuming A user can review a game only once
  `UserID` int(11) NOT NULL,
  `ApplicationID` int(11) NOT NULL,
  `ReviewID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewedby`
--

DROP TABLE IF EXISTS `reviewedby`;
CREATE TABLE `reviewedby` (
  `EmployeeID` int(11) NOT NULL,
  `TicketID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supportticket`
--

DROP TABLE IF EXISTS `supportticket`;
CREATE TABLE `supportticket` (
  `TicketID` int(11) NOT NULL,
  `ReportDescription` text NOT NULL,
  `Closed` varchar(1) DEFAULT NULL,
  `U_ID` int(11) DEFAULT NULL,
  -- Storing images directly in the DB isn't very good.
  -- A better alternative is to store the images on disk and have a reference to the image in the DB as in the following link:
  -- https://stackoverflow.com/a/6472268
  `AddtionalFilesPath` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `up_down_voted_post`
--

DROP TABLE IF EXISTS `up_down_voted_post`;
CREATE TABLE `up_down_voted_post` (
  `U_ID` int(11) NOT NULL,
  `Post_id` int(11) NOT NULL,
  `Up_Down` varchar(1) DEFAULT NULL  -- no date type bool in MySQL.
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `up_down_voted_review`
--

DROP TABLE IF EXISTS `up_down_voted_review`;
CREATE TABLE `up_down_voted_review` (
  `U_ID` int(11) NOT NULL,
  `Review_id` int(11) NOT NULL,
  `Up_Down` varchar(1) DEFAULT NULL  -- no date type bool in MySQL.
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `U_ID` int(11) NOT NULL,
  `FName` varchar(30) DEFAULT NULL,
  `LName` varchar(30) DEFAULT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Bdate` date DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL, -- boolean
  `Account_Type` varchar(1) NOT NULL DEFAULT '0', -- boolean
  `Phone_Number` int(11) DEFAULT NULL,
  `Balance` float NOT NULL DEFAULT 0,
  `Billing_Info` text NOT NULL DEFAULT 'No information available.', -- long strings are stored as text instead of VARCHAR
  `Ban_End` date DEFAULT NULL,
  `Profile_Picture` text DEFAULT NULL, -- (image path)long strings are stored as text instead of VARCHAR
  `Hide` varchar(12) DEFAULT '111111111111' -- A string that's used as an array of boolean to decide wether to hide an attribute or not
  -- Hide or Not : FName LName Email Address Bdate Gender Phone_Number
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`App_ID`),
  ADD KEY `U_ID` (`U_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`),
  ADD UNIQUE KEY `Category_Name` (`Category_Name`);

--
-- Indexes for table `categorized`
--
ALTER TABLE `categorized`
  ADD PRIMARY KEY (`App_ID`,`Category_ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GROUP_ID`), -- Owned_By Relationship
  ADD KEY `U_ID` (`U_ID`);

--
-- Indexes for table `member_in`
--
ALTER TABLE `member_in`
  ADD PRIMARY KEY (`U_ID`,`Group_ID`),
  ADD KEY `Group_ID` (`Group_ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_id`),
  ADD KEY `U_ID` (`U_ID`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `purchased_by`
--
ALTER TABLE `purchased_by`
  ADD PRIMARY KEY (`UserID`,`ApplicationID`),
  ADD KEY `ApplicationID` (`ApplicationID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`);

--
-- Indexes for table `reviewed`
--
ALTER TABLE `reviewed`
  ADD PRIMARY KEY (`UserID`,`ApplicationID`,`ReviewID`),
  ADD KEY `ApplicationID` (`ApplicationID`),
  ADD KEY `ReviewID` (`ReviewID`);

--
-- Indexes for table `reviewedby`
--
ALTER TABLE `reviewedby`
  ADD PRIMARY KEY (`EmployeeID`,`TicketID`),
  ADD KEY `TicketID` (`TicketID`);

--
-- Indexes for table `supportticket`
--
ALTER TABLE `supportticket`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `U_ID` (`U_ID`);

--
-- Indexes for table `up_down_voted_post`
--
ALTER TABLE `up_down_voted_post`
  ADD PRIMARY KEY (`U_ID`,`Post_id`),
  ADD KEY `Post_id` (`Post_id`);

--
-- Indexes for table `up_down_voted_review`
--
ALTER TABLE `up_down_voted_review`
  ADD PRIMARY KEY (`U_ID`,`Review_id`),
  ADD KEY `Review_id` (`Review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `App_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GROUP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supportticket`
--
ALTER TABLE `supportticket`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
-- Assuming that if a user is deleted, all the apps he published are also deleted.
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;  -- Published_By relationship

--
-- Constraints for table `categorized`
--
ALTER TABLE `categorized`
  -- When an application is deleted, this whole tuple with that application should be deleted
  ADD CONSTRAINT `categorized_ibfk_1` FOREIGN KEY (`App_ID`) REFERENCES `applications` (`App_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- When deleting a category, the category from here should just be removed, not deleting the whole tuple
  ADD CONSTRAINT `categorized_ibfk_2` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`Category_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_in`
--
ALTER TABLE `member_in`
  ADD CONSTRAINT `member_in_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_in_ibfk_2` FOREIGN KEY (`Group_ID`) REFERENCES `groups` (`GROUP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE,  -- Posted Relationship
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`GROUP_ID`) ON DELETE CASCADE ON UPDATE CASCADE; -- Posted_At Relationship

--
-- Constraints for table `purchased_by`
--
ALTER TABLE `purchased_by`
  -- If I delete the user, I no longer need to keep a record of their purchases.
  ADD CONSTRAINT `purchased_by_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- This part is a little bit confusing, if I delete an application, I shouldn't just remove it from the people's libraries,
  -- (who purchased it) so, do I just leave it as is or just force remove it by deleting this tuple as well?
  -- Going with leaving it as is.
  ADD CONSTRAINT `purchased_by_ibfk_2` FOREIGN KEY (`ApplicationID`) REFERENCES `applications` (`App_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `reviewed`
--
ALTER TABLE `reviewed`
  -- When a user gets deleted, all their reviews should be too.
  ADD CONSTRAINT `reviewed_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- When an application gets deleted, all its reviews should be deleted too.
  ADD CONSTRAINT `reviewed_ibfk_2` FOREIGN KEY (`ApplicationID`) REFERENCES `applications` (`App_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- Not too sure about this one.
  ADD CONSTRAINT `reviewed_ibfk_3` FOREIGN KEY (`ReviewID`) REFERENCES `review` (`ReviewID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviewedby`
--
ALTER TABLE `reviewedby`
  -- If an employee gets deleted, should the row be deleted.
  -- Can't have null here since EmployeeID is used in the primary key.
  ADD CONSTRAINT `reviewedby_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviewedby_ibfk_2` FOREIGN KEY (`TicketID`) REFERENCES `supportticket` (`TicketID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supportticket`
--
ALTER TABLE `supportticket`
  ADD CONSTRAINT `supportticket_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE; -- Submitted_By Relationship

--
-- Constraints for table `up_down_voted_post`
--
ALTER TABLE `up_down_voted_post`
  ADD CONSTRAINT `up_down_voted_post_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `up_down_voted_post_ibfk_2` FOREIGN KEY (`Post_id`) REFERENCES `post` (`Post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `up_down_voted_review`
--
ALTER TABLE `up_down_voted_review`
  ADD CONSTRAINT `up_down_voted_review_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `up_down_voted_review_ibfk_2` FOREIGN KEY (`Review_id`) REFERENCES `review` (`ReviewID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
