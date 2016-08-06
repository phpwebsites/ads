-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2016 at 02:50 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newbieads`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(100) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(600) NOT NULL,
  `country_id` int(100) NOT NULL,
  `state_id` int(100) NOT NULL,
  `city_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `subcategory_id` int(100) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `user_id` int(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `phnumber` varchar(100) NOT NULL,
  `price` decimal(60,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `country_id`, `state_id`, `city_id`, `category_id`, `subcategory_id`, `payment_status`, `user_id`, `address`, `image`, `phnumber`, `price`) VALUES
(1, 'sasas', 'asdasd asdASD ADASD					      	\r\n					      ', 0, 0, 0, 4, 5, 'free', 0, '', '', '', '123.00000'),
(2, 'jjdjdj', 'dksdkd					      	\r\n					      ', 0, 0, 0, 4, 5, 'free', 0, '', '', '', '123.00000'),
(3, 'title', 'lormidf kidfkdfd kidfiodfods voosdf', 0, 0, 0, 4, 5, 'free', 0, '', '', '', '123.00000');

-- --------------------------------------------------------

--
-- Table structure for table `adsimages`
--

CREATE TABLE `adsimages` (
  `id` int(50) NOT NULL,
  `name` varchar(300) NOT NULL,
  `ad_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adsimages`
--

INSERT INTO `adsimages` (`id`, `name`, `ad_id`) VALUES
(1, '1.jpg', 2),
(2, '2.jpg', 2),
(3, 'IMG_1136.JPG', 2),
(4, 'IMG_1141.JPG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'Electronics'),
(5, 'Realestates'),
(6, 'Jobs'),
(7, 'Education'),
(8, 'Vehicles');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(100) NOT NULL,
  `state_id` int(200) NOT NULL,
  `country_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `country_id`, `name`) VALUES
(2, 6, 4, 'Vishakapatnam'),
(3, 6, 4, 'Vijayavada'),
(4, 7, 4, 'warangal'),
(5, 9, 8, 'test city'),
(6, 6, 4, 'Vijayavada'),
(7, 6, 4, 'Vijayava'),
(8, 6, 4, 'asaas');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(4, 'india'),
(5, 'Amarica'),
(8, 'testcountry'),
(9, 'category1');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(100) NOT NULL,
  `country_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `name`) VALUES
(6, 4, 'Andhrapradesh'),
(7, 4, 'Telangana'),
(8, 4, 'Thamilnadu'),
(9, 8, 'teststate'),
(10, 4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(50) NOT NULL,
  `categories_id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `categories_id`, `name`) VALUES
(4, 5, 'Plats for sale'),
(5, 4, 'Tv'),
(6, 4, 'Computers'),
(7, 4, 'Mobiles'),
(8, 5, 'land for sale'),
(9, 6, 'software jobs'),
(10, 6, 'Goverment jobs'),
(11, 6, 'civil jobs'),
(12, 6, 'parma jobs'),
(13, 7, 'PG admitions'),
(14, 7, 'Eamcet results'),
(15, 7, 'Icet results'),
(16, 7, 'ssc examination'),
(17, 8, 'Classic &amp Fancy'),
(18, 8, 'Expansive Cars'),
(19, 8, 'Heavy Vehicles'),
(20, 8, 'Van &amp Truks'),
(21, 8, 'Auto Parts'),
(22, 8, 'Others'),
(23, 6, 'Finance jobs'),
(24, 6, 'Cleaning &amp Washing'),
(25, 4, 'Technical Services'),
(26, 4, 'Home Elecronics');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(400) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `country_id` int(200) NOT NULL,
  `state_id` int(200) NOT NULL,
  `city_id` int(200) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phoneno`, `country_id`, `state_id`, `city_id`, `pincode`, `role`) VALUES
(8, 'srinuvasuv', 'srini.newbiesoftsolutions@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '565652', 0, 0, 0, '', '3'),
(17, 'admintest', 'admintest@gmail.com', 'MTIzNDU2', '1256665', 0, 0, 0, '', '2'),
(29, 'srinuvasuv', 'vsv1414@gmail.com', 'MTIzNDU2', '54614336', 4, 6, 2, '54662323', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adsimages`
--
ALTER TABLE `adsimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `adsimages`
--
ALTER TABLE `adsimages`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
