-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 03:00 PM
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
-- Database: `agroculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(255) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `ausername` varchar(255) NOT NULL,
  `apassword` varchar(255) NOT NULL,
  `ahash` varchar(255) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `amobile` varchar(255) NOT NULL,
  `aaddress` text NOT NULL,
  `aactive` int(255) NOT NULL DEFAULT 0,
  `arating` int(11) NOT NULL DEFAULT 0,
  `picExt` varchar(255) NOT NULL DEFAULT 'png',
  `picStatus` int(10) NOT NULL DEFAULT 0,
  `code` int(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `ausername`, `apassword`, `ahash`, `aemail`, `amobile`, `aaddress`, `aactive`, `arating`, `picExt`, `picStatus`, `code`, `status`) VALUES
(0, 'Krish', 'Admin', '$2y$10$18jLYYRtewlp.QFuY.ZwMeLc67T.pxwIG8xa9l2RA9cTjIPDHDVOm', '087408522c31eeb1f982bc0eaf81d35f', 'maniarkrish06@gmail.com', '6353952351', 'Vapi', 0, 0, 'png', 0, 0, 'verified'),
(1, 'Krish', 'admin', '$2y$10$a44Lq3XOtmltMfRDAeRAWOZsrRFO9Io4F/XAqjx4CsyL3iyRQ.Fy.', '7f6ffaa6bb0b408017b62254211691b5', 'maniarkrish2004@gmail.com', '6353952351', 'vapi', 0, 0, 'png', 0, 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `blogdata`
--

CREATE TABLE `blogdata` (
  `blogId` int(10) NOT NULL,
  `blogUser` varchar(256) NOT NULL,
  `blogTitle` varchar(256) NOT NULL,
  `blogContent` longtext NOT NULL,
  `blogTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogdata`
--

INSERT INTO `blogdata` (`blogId`, `blogUser`, `blogTitle`, `blogContent`, `blogTime`, `likes`) VALUES
(19, 'ThePhenom', 'First Blog', '<p>Its Awesome website<img alt=\"wink\" src=\"https://cdn.ckeditor.com/4.8.0/full/plugins/smiley/images/wink_smile.png\" style=\"height:23px; width:23px\" title=\"wink\" /></p>\r\n', '2018-02-25 13:09:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogfeedback`
--

CREATE TABLE `blogfeedback` (
  `blogId` int(10) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `commentUser` varchar(256) NOT NULL,
  `commentPic` varchar(256) NOT NULL DEFAULT 'profile0.png',
  `commentTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogfeedback`
--

INSERT INTO `blogfeedback` (`blogId`, `comment`, `commentUser`, `commentPic`, `commentTime`) VALUES
(19, 'Mast yarr', 'ThePhenom', 'profile0.png', '2018-02-25 13:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `bid` int(100) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `busername` varchar(100) NOT NULL,
  `bpassword` varchar(100) NOT NULL,
  `bhash` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `bmobile` varchar(100) NOT NULL,
  `baddress` text NOT NULL,
  `bactive` int(100) NOT NULL DEFAULT 0,
  `picExt` varchar(255) NOT NULL DEFAULT 'png',
  `picStatus` text NOT NULL DEFAULT '0',
  `code` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bid`, `bname`, `busername`, `bpassword`, `bhash`, `bemail`, `bmobile`, `baddress`, `bactive`, `picExt`, `picStatus`, `code`, `status`) VALUES
(5, 'Daksh', 'buyer-1-daksh', '$2y$10$E3TBc39dkXGWEJA4F6/.cecz/j24dfk1kHX/jb1CC7DQqfoxDzbg.', 'ccb1d45fb76f7c5a0bf619f979c6cf36', 'hellokrish0909@gmail.com', '9727312032', 'vadodara', 0, 'png', '0', 0, 'verified'),
(6, 'Krish', 'Admin', '$2y$10$18jLYYRtewlp.QFuY.ZwMeLc67T.pxwIG8xa9l2RA9cTjIPDHDVOm', '087408522c31eeb1f982bc0eaf81d35f', 'maniarkrish06@gmail.com', '6353952351', 'Vapi', 0, 'png', '0', 954028, 'notverified');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `fid` int(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `pimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crop-data`
--

CREATE TABLE `crop-data` (
  `id` int(11) NOT NULL,
  `n` int(2) NOT NULL,
  `p` int(2) NOT NULL,
  `k` int(2) NOT NULL,
  `t` float NOT NULL,
  `h` float NOT NULL,
  `ph` float NOT NULL,
  `r` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `fid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fusername` varchar(255) NOT NULL,
  `fpassword` varchar(255) NOT NULL,
  `fhash` varchar(255) NOT NULL,
  `femail` varchar(255) NOT NULL,
  `fmobile` varchar(255) NOT NULL,
  `faddress` text NOT NULL,
  `factive` int(255) NOT NULL DEFAULT 0,
  `frating` int(11) NOT NULL DEFAULT 0,
  `picExt` varchar(255) NOT NULL DEFAULT 'png',
  `picStatus` int(10) NOT NULL DEFAULT 0,
  `code` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`fid`, `fname`, `fusername`, `fpassword`, `fhash`, `femail`, `fmobile`, `faddress`, `factive`, `frating`, `picExt`, `picStatus`, `code`, `status`) VALUES
(25, 'farmer-1-Krish', 'farmer-1-Krish', '$2y$10$pH7RVzoRZWR7RiAAV8pxx.bJ/L4JoSD4uIlaLDM6fxxbtgZnuVFv6', '6512bd43d9caa6e02c990b0a82652dca', 'maniarkrish2004@gmail.com', '6353952351', 'vapi', 0, 0, '0a273dc4-db45-4936-aee3-59919e1df44f___JR_HL 9805.JPG', 1, 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `fproduct`
--

CREATE TABLE `fproduct` (
  `fid` int(255) NOT NULL,
  `fusername` varchar(50) NOT NULL,
  `pid` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `pcat` varchar(255) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `pinfo` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `pimage` varchar(255) NOT NULL DEFAULT 'blank.png',
  `picStatus` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fproduct`
--

INSERT INTO `fproduct` (`fid`, `fusername`, `pid`, `product`, `pcat`, `grade`, `pinfo`, `price`, `pimage`, `picStatus`) VALUES
(25, 'farmer-1-Krish', 42, 'Green Apple', 'fruits', 'grade-2', 'fresh  and high quality product. Contact me From chat page for more details.', 70, 'Green Apple.jpg', 1),
(25, 'farmer-1-Krish', 46, 'grain', 'grains', 'grade-1', 'fresh and high quality', 70, 'grain.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(5, 141182825, 741929552, 'hello,sir'),
(6, 141182825, 741929552, 'I am Krish Here'),
(7, 741929552, 141182825, 'hello, I want to Get the products from you , can you please share some details of your product qulity.'),
(8, 141182825, 741929552, 'yes sir'),
(9, 141182825, 741929552, 'hello sir'),
(10, 741929552, 141182825, 'hello'),
(11, 974431621, 741929552, 'hello good morning');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `fid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bid`, `fid`, `pid`, `grade`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(25, 5, 0, 43, 'grade-1', 'Daksh', '9727312032', 'hellokrish0909@gmail.com', 'cash on delivery', 'flat no. shubham green city vapi gujarat india', ', rice ( 1 )', 100, '2024-03-01 11:12:01.262622', 'pending'),
(26, 5, 25, 44, 'grade-1', 'Daksh', '9727312032', 'hellokrish0909@gmail.com', 'cash on delivery', 'flat no. shubham green city vapi gujarat india', ', apple ( 1 ), Green Apple ( 2 )', 340, '2024-03-03 08:18:23.590082', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `sensordata`
--

CREATE TABLE `sensordata` (
  `id` int(6) UNSIGNED NOT NULL,
  `SensorData` varchar(30) NOT NULL,
  `LocationData` varchar(30) NOT NULL,
  `value1` varchar(10) DEFAULT NULL,
  `value2` varchar(255) DEFAULT NULL,
  `value3` varchar(255) DEFAULT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sensordata`
--

INSERT INTO `sensordata` (`id`, `SensorData`, `LocationData`, `value1`, `value2`, `value3`, `reading_time`) VALUES
(330, 'Humidity sensor', 'farm', '25.80', '48.00', '100', '2024-03-03 03:08:13'),
(331, 'Humidity sensor', 'farm', '25.80', '49.00', '100', '2024-03-03 03:08:24'),
(332, 'Humidity sensor', 'farm', '25.60', '49.00', '100', '2024-03-03 03:08:52'),
(333, 'Humidity sensor', 'farm', '25.30', '49.00', '100', '2024-03-03 03:09:02'),
(334, 'Humidity sensor', 'farm', '25.30', '49.00', '100', '2024-03-03 03:09:13'),
(335, 'Humidity sensor', 'farm', '25.30', '49.00', '53', '2024-03-03 03:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `email`, `password`, `img`, `status`) VALUES
(8, 741929552, 'Farmer-1-Krish', 'maniarkrish2004@gmail.com', '202cb962ac59075b964b07152d234b70', '1709190386krish.jpg', 'Offline now'),
(9, 1392450986, 'Farmer-2-Mahim', 'patelmahim240@gmail.com', '202cb962ac59075b964b07152d234b70', '1709190490mahim.jpg', 'Offline now'),
(10, 141182825, 'buyer-1-Daksh', 'dakshlearn@gmail.com', '202cb962ac59075b964b07152d234b70', '1709190528123.jpg', 'Offline now'),
(11, 974431621, 'kamlesh', 'kamlesh123@gmail.com', '202cb962ac59075b964b07152d234b70', '1709460440kamlesh.jpg', 'Offline now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aid` (`aid`);

--
-- Indexes for table `blogdata`
--
ALTER TABLE `blogdata`
  ADD PRIMARY KEY (`blogId`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `bid` (`bid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crop-data`
--
ALTER TABLE `crop-data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `fid` (`fid`);

--
-- Indexes for table `fproduct`
--
ALTER TABLE `fproduct`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensordata`
--
ALTER TABLE `sensordata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogdata`
--
ALTER TABLE `blogdata`
  MODIFY `blogId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `crop-data`
--
ALTER TABLE `crop-data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `fproduct`
--
ALTER TABLE `fproduct`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sensordata`
--
ALTER TABLE `sensordata`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
