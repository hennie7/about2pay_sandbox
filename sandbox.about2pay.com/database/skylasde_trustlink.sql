-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2020 at 10:47 AM
-- Server version: 5.6.47
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skylasde_trustlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyerDetails`
--

CREATE TABLE `buyerDetails` (
  `ID` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `b_surname` varchar(100) NOT NULL,
  `b_email` varchar(100) NOT NULL,
  `b_mobile` varchar(15) NOT NULL,
  `dateJoined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateDeleted` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyerDetails`
--

INSERT INTO `buyerDetails` (`ID`, `b_name`, `b_surname`, `b_email`, `b_mobile`, `dateJoined`, `dateDeleted`, `status`) VALUES
(1, 'Jordan', 'Buyer', 'Buyer@test.comm', '0987654321', '2020-07-02 15:24:20', '0000-00-00 00:00:00', 1),
(2, 'Jordan', 'TheTester', 'testme@test.comm', '0987654321', '2020-07-02 20:01:48', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchantDetails`
--

CREATE TABLE `merchantDetails` (
  `ID` int(11) NOT NULL,
  `m_uuid` varchar(36) NOT NULL,
  `m_key` varchar(100) NOT NULL,
  `m_name` varchar(225) NOT NULL,
  `m_regDetails` varchar(225) NOT NULL,
  `m_contact` varchar(225) NOT NULL,
  `m_contactNumber` varchar(225) NOT NULL,
  `m_address1` varchar(225) NOT NULL,
  `m_address2` varchar(225) NOT NULL,
  `m_logo` varchar(225) NOT NULL,
  `m_returnUrl` varchar(225) NOT NULL,
  `m_successUrl` varchar(225) NOT NULL,
  `m_cancelledUrl` varchar(225) NOT NULL,
  `dateJoined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateDeleted` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchantDetails`
--

INSERT INTO `merchantDetails` (`ID`, `m_uuid`, `m_key`, `m_name`, `m_regDetails`, `m_contact`, `m_contactNumber`, `m_address1`, `m_address2`, `m_logo`, `m_returnUrl`, `m_successUrl`, `m_cancelledUrl`, `dateJoined`, `dateDeleted`, `status`) VALUES
(1, '72ab4ba2-bc78-11ea-82cf-001dd8b7399f', 'HereIsATestKey', '', '', '', '', '', '', '', '', '', '', '2020-07-02 15:26:49', '0000-00-00 00:00:00', 1),
(2, 'd4f2bc02-c50a-11ea-ac52-001dd8b7399f', 'c2t5bDRya19UcnVzdEtleQ==', 'SkyL4rk Pty Ltd', '2018/123456/07', 'Mike Beuster', '+27646570633', '10 Lake St Claire, Palm Lakes', 'Ballito 4420', 'skylark-logo-m.png', 'https://skylarktraining.co.za/trustlink/thanks.php', 'https://skylarktraining.co.za/trustlink/success.php', 'https://skylarktraining.co.za/trustlink/error.php', '2020-07-20 13:56:08', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactionDetails`
--

CREATE TABLE `transactionDetails` (
  `ID` int(11) NOT NULL,
  `m_tx_id` varchar(36) NOT NULL,
  `m_tx_amount` decimal(33,2) NOT NULL,
  `m_tx_item_name` varchar(100) NOT NULL,
  `m_tx_item_description` varchar(255) NOT NULL,
  `m_tx_account_uuid` varchar(36) NOT NULL,
  `m_tx_order_nr` varchar(50) NOT NULL,
  `m_tx_invoice_nr` varchar(50) NOT NULL,
  `m_tx_category_1` varchar(50) NOT NULL,
  `m_tx_category_2` varchar(50) NOT NULL,
  `tx_category_3` varchar(50) NOT NULL,
  `m_tx_site_reference` varchar(36) NOT NULL,
  `m_tx_site_name` varchar(100) NOT NULL,
  `m_tx_due_date` varchar(10) NOT NULL,
  `m_tx_message` varchar(255) NOT NULL,
  `dateJoined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateDeleted` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactionDetails`
--

INSERT INTO `transactionDetails` (`ID`, `m_tx_id`, `m_tx_amount`, `m_tx_item_name`, `m_tx_item_description`, `m_tx_account_uuid`, `m_tx_order_nr`, `m_tx_invoice_nr`, `m_tx_category_1`, `m_tx_category_2`, `tx_category_3`, `m_tx_site_reference`, `m_tx_site_name`, `m_tx_due_date`, `m_tx_message`, `dateJoined`, `dateDeleted`, `status`) VALUES
(1, '324324', 45.00, 'ProductName', 'That says productname', 'f7f95586-bc7a-11ea-82cf-001dd8b7399f', '32', '43', 'Cat1', 'Cat2', 'Cat3', 'https://sitereference.comm', 'Site References', '2020-03-22', 'The Message', '2020-07-02 15:44:52', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactionNotificationOptions`
--

CREATE TABLE `transactionNotificationOptions` (
  `ID` int(11) NOT NULL,
  `m_return_url` varchar(255) NOT NULL,
  `m_cancel_url` varchar(255) NOT NULL,
  `m_pending_url` varchar(255) NOT NULL,
  `m_notify_url` varchar(255) NOT NULL,
  `m_email_address` varchar(255) NOT NULL,
  `dateJoined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateDeleted` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactionNotificationOptions`
--

INSERT INTO `transactionNotificationOptions` (`ID`, `m_return_url`, `m_cancel_url`, `m_pending_url`, `m_notify_url`, `m_email_address`, `dateJoined`, `dateDeleted`, `status`) VALUES
(1, 'https://returnurl.comm', 'https://cancelurl.comm', 'https://pendingurl.comm', 'https://notifyurl.comm', 'test@test.com', '2020-07-02 15:21:30', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyerDetails`
--
ALTER TABLE `buyerDetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `merchantDetails`
--
ALTER TABLE `merchantDetails`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `m_uuid` (`m_uuid`);

--
-- Indexes for table `transactionDetails`
--
ALTER TABLE `transactionDetails`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `m_tx_account_uuid` (`m_tx_account_uuid`);

--
-- Indexes for table `transactionNotificationOptions`
--
ALTER TABLE `transactionNotificationOptions`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyerDetails`
--
ALTER TABLE `buyerDetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `merchantDetails`
--
ALTER TABLE `merchantDetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactionDetails`
--
ALTER TABLE `transactionDetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactionNotificationOptions`
--
ALTER TABLE `transactionNotificationOptions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
