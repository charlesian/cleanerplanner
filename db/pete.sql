-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 11:27 AM
-- Server version: 10.3.16-MariaDB
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
-- Database: `pete`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `source_dropdown` varchar(55) DEFAULT NULL,
  `cust_ref` varchar(55) DEFAULT NULL,
  `cust_title` varchar(55) DEFAULT NULL,
  `cust_fname` varchar(55) DEFAULT NULL,
  `cust_lname` varchar(55) DEFAULT NULL,
  `cust_company` varchar(55) DEFAULT NULL,
  `cust_address1` varchar(55) DEFAULT NULL,
  `cust_address2` varchar(55) DEFAULT NULL,
  `cust_town` varchar(55) DEFAULT NULL,
  `cust_country` varchar(55) DEFAULT NULL,
  `cust_postcode` varchar(55) DEFAULT NULL,
  `cust_mobile` varchar(55) DEFAULT NULL,
  `cust_phone` varchar(55) DEFAULT NULL,
  `cust_email` varchar(55) DEFAULT NULL,
  `cust_date_stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `user_id`, `source_dropdown`, `cust_ref`, `cust_title`, `cust_fname`, `cust_lname`, `cust_company`, `cust_address1`, `cust_address2`, `cust_town`, `cust_country`, `cust_postcode`, `cust_mobile`, `cust_phone`, `cust_email`, `cust_date_stamp`) VALUES
(1, 1, 'service 1', 'Customer Ref', 'Mrs', 'First Name', 'Last Name', 'Comp Name', 'Addre 1', 'Addr 2 ', 'Town 2', 'Country', 'Postcode', '12343', '12015550123', 'test@asd.com', '2021-01-18 11:19:25'),
(22, 1, 'new service', 'qwewew', 'Mr & Mrs', 'zxczxc', 'zxc', 'zxcxzc', 'xzc', 'zxczxcxz', 'czx', 'czx', 'czx', 'czx', 'czx', 'cxz', '2021-01-22 20:36:20'),
(23, 1, 'service 1', 'fff', 'Mr & Mrs', 'ff', 'f', 'ff', 'f', 'ff', 'ff', 'ff', 'v', 'ff', '', 'ff', '2021-01-22 20:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `job_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `stats` varchar(55) DEFAULT NULL,
  `job_ref` varchar(55) DEFAULT NULL,
  `checkbox_ref1` varchar(55) DEFAULT NULL COMMENT 'status_of_job',
  `checkbox_ref2` varchar(55) DEFAULT NULL,
  `checkbox_ref3` varchar(55) DEFAULT NULL,
  `my_round` varchar(55) DEFAULT NULL,
  `window_cleaning` varchar(55) DEFAULT NULL,
  `job_hrs` varchar(55) DEFAULT NULL,
  `job_mins` varchar(55) DEFAULT NULL,
  `job_ppl` varchar(55) DEFAULT NULL,
  `jobs_sched_date` date DEFAULT NULL,
  `number_d_w_m` varchar(55) DEFAULT NULL,
  `d_w_m_option1` varchar(55) DEFAULT NULL,
  `d_w_m_option2` varchar(55) DEFAULT NULL,
  `jobs_price1` double DEFAULT NULL,
  `jobs_balance` double NOT NULL,
  `per_jobs` varchar(55) DEFAULT NULL,
  `jobs_price2` double DEFAULT NULL,
  `jobs_price3` double DEFAULT NULL,
  `checkbox_job_price` varchar(55) DEFAULT NULL,
  `payment_method` varchar(55) DEFAULT NULL,
  `checkbox_jobs_invoice` varchar(55) DEFAULT NULL,
  `job_notes` varchar(255) DEFAULT NULL,
  `checkbox_notes` varchar(55) DEFAULT NULL,
  `new_customer_input` varchar(55) DEFAULT NULL,
  `job_address1` varchar(55) DEFAULT NULL,
  `job_address2` varchar(55) DEFAULT NULL,
  `job_town` varchar(55) DEFAULT NULL,
  `job_country` varchar(55) DEFAULT NULL,
  `job_postcode` varchar(55) DEFAULT NULL,
  `job_date_stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`job_id`, `user_id`, `customer_id`, `stats`, `job_ref`, `checkbox_ref1`, `checkbox_ref2`, `checkbox_ref3`, `my_round`, `window_cleaning`, `job_hrs`, `job_mins`, `job_ppl`, `jobs_sched_date`, `number_d_w_m`, `d_w_m_option1`, `d_w_m_option2`, `jobs_price1`, `jobs_balance`, `per_jobs`, `jobs_price2`, `jobs_price3`, `checkbox_job_price`, `payment_method`, `checkbox_jobs_invoice`, `job_notes`, `checkbox_notes`, `new_customer_input`, `job_address1`, `job_address2`, `job_town`, `job_country`, `job_postcode`, `job_date_stamp`) VALUES
(6, 1, 1, NULL, 'qwe', 'Quote', '1', '1', 'qwe 2', 'service 1', '1', '1', '1', '2021-01-25', '1', 'Days', 'Mon', 1, 0, 'Per Clean', 1, 1, '2', 'Cash', '1', ' qwe1', '1', NULL, 'qwe', 'qwe', 'qw', 'eqwe', 'qwe', '2021-01-22 20:35:34'),
(7, 1, 22, NULL, 'zxc', 'Active', '1', '1', 'new round', 'new service', '1', '1', '1', '2021-02-01', '1', 'Days', 'Mon', 11, 0, 'Per Clean', 1, 1, '2', 'Cheque', '1', 'zxc', '1', 'new', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', '2021-01-22 20:36:20'),
(8, 1, 23, NULL, 'ff', 'Active', '1', '1', 'qwe 2', 'new service', '1', '1', '1', '2021-01-14', '1', 'Days', 'Mon', 1, 0, 'Per Clean', 1, 1, '2', 'Cash', '1', 'ffff', '1', 'new', NULL, NULL, NULL, NULL, NULL, '2021-01-22 20:36:55'),
(9, 1, 1, NULL, '', 'Active', '2', '2', 'qwe', 'service 1011111', '1', '1', '1', '2021-01-28', '', '', '', 1, 0, 'Per Clean', 1, 1, '1', 'Cash', '1', ' qwe', '1', NULL, '', '', '', '', '', '2021-01-28 17:07:52'),
(10, 1, 1, NULL, '', '2', '2', '2', 'new round', 'new service', '1', '1', '1', '2021-01-30', '', '', '', 1, 0, 'Per Clean', 1, 1, '1', 'Cash', '1', ' qwe', '1', NULL, '', '', '', '', '', '2021-01-28 23:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `username` varchar(55) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  `subscription` double DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_expired` date DEFAULT NULL,
  `date_subscription` date DEFAULT NULL,
  `trial_start` date DEFAULT NULL,
  `trial_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `first_name`, `last_name`, `username`, `password`, `subscription`, `date`, `date_expired`, `date_subscription`, `trial_start`, `trial_end`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', NULL, '2021-01-11 14:01:24', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `payment` varchar(55) DEFAULT NULL,
  `is_check` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `user`, `payment`, `is_check`, `date`) VALUES
(1, 1, 'cdo', 1, '2021-01-17 19:25:33'),
(2, 1, 'transferwise', 1, '2021-01-17 19:30:28'),
(3, 1, 'abot', 2, '2021-01-17 19:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_round`
--

CREATE TABLE `tbl_round` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `round` varchar(55) DEFAULT NULL,
  `is_check` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_round`
--

INSERT INTO `tbl_round` (`id`, `user`, `round`, `is_check`, `date`) VALUES
(1, 1, 'qwe', NULL, '2021-01-17 18:58:29'),
(2, 1, 'qwe 2', 1, '2021-01-17 19:00:13'),
(3, 1, 'qwe 3 ', 2, '2021-01-17 19:00:30'),
(4, 1, 'qwe 4', 2, '2021-01-17 19:11:38'),
(5, 1, 'new round', 2, '2021-01-18 11:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `service` varchar(55) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `user`, `service`, `date`) VALUES
(1, 1, 'service 1', '2021-01-17 19:15:14'),
(2, 1, 'new service', '2021-01-18 11:18:51'),
(3, 1, 'service 1011111', '2021-01-21 18:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_source`
--

CREATE TABLE `tbl_source` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `source` varchar(55) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_source`
--

INSERT INTO `tbl_source` (`id`, `user`, `source`, `date`) VALUES
(19, 1, 'source 1', '2021-01-17 18:16:47'),
(20, 1, 'source 2', '2021-01-17 18:22:11'),
(21, 1, 'source 3', '2021-01-17 19:11:29'),
(22, 1, 'service 1', '2021-01-17 19:11:45'),
(23, 1, 'service 2', '2021-01-17 19:11:53'),
(24, 1, 'new service', '2021-01-18 11:18:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_round`
--
ALTER TABLE `tbl_round`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_source`
--
ALTER TABLE `tbl_source`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `job_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_round`
--
ALTER TABLE `tbl_round`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_source`
--
ALTER TABLE `tbl_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
