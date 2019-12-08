-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 10:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(4000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderItemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderItemId`, `orderId`, `prodId`, `quantity`) VALUES
(84, 74, 13, 1),
(85, 74, 21, 3),
(86, 74, 25, 2),
(87, 74, 30, 2),
(88, 74, 23, 2),
(89, 75, 20, 1),
(90, 75, 13, 1),
(91, 75, 19, 3),
(92, 75, 23, 1),
(93, 75, 32, 5),
(94, 75, 30, 2),
(95, 75, 33, 1),
(96, 75, 31, 6),
(97, 76, 18, 1),
(98, 76, 19, 1),
(99, 76, 20, 1),
(100, 76, 13, 1),
(101, 77, 19, 3),
(102, 77, 20, 1),
(103, 77, 18, 2),
(104, 77, 23, 1),
(105, 78, 18, 1),
(106, 78, 19, 1),
(107, 78, 33, 1),
(108, 78, 29, 1),
(109, 78, 26, 1),
(110, 79, 18, 1),
(111, 79, 19, 3),
(112, 79, 24, 2),
(113, 79, 13, 1),
(114, 79, 20, 1),
(115, 79, 28, 3),
(116, 79, 33, 1),
(117, 79, 26, 1),
(118, 79, 27, 1),
(119, 80, 18, 1),
(120, 80, 19, 1),
(121, 81, 13, 1),
(122, 82, 18, 1),
(123, 82, 19, 1),
(124, 82, 20, 1),
(125, 83, 13, 1),
(126, 83, 19, 3),
(127, 83, 24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `total`, `status`, `date`) VALUES
(74, 13, '116.00', 'Processing', '12-10-2019'),
(75, 13, '285.00', 'Processing', '12-16-2019'),
(76, 19, '105.50', 'Processing', '12-25-2019'),
(77, 19, '90.00', 'Processing', '12-24-2019'),
(78, 19, '44.50', 'Processing', '03-11-2020'),
(79, 16, '202.00', 'Processing', '12-26-2019'),
(80, 16, '25.50', 'Processing', '12-30-2019'),
(81, 13, '75.00', 'Processing', '12-21-2019'),
(82, 13, '30.50', 'Processing', '12-27-2019'),
(83, 13, '175.00', 'Processing', '12-19-2019');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postId` int(11) NOT NULL,
  `threadId` int(11) NOT NULL,
  `body` varchar(4000) NOT NULL,
  `author` varchar(40) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `threadId`, `body`, `author`, `time`) VALUES
(106, 31, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'bewooten21', '2019-12-07 18:41:31'),
(107, 31, 'ng established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their defang established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their defang established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their defang established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their defa', 'bewooten21', '2019-12-08 00:38:33'),
(109, 31, ' a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha', 'bewooten21', '2019-12-08 00:44:50'),
(110, 27, ' a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha', 'bewooten21', '2019-12-08 00:44:59'),
(111, 27, ' a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha', 'bewooten21', '2019-12-08 00:45:01'),
(112, 27, ' a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha', 'bewooten21', '2019-12-08 00:45:04'),
(113, 28, ' a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha', 'bewooten21', '2019-12-08 00:45:17'),
(114, 28, ' a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions ha', 'bewooten21', '2019-12-08 00:45:19'),
(115, 32, 'Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc ', 'bewooten21', '2019-12-08 14:58:13'),
(116, 32, 'Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedocFt brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedocFt brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc', 'bewooten21', '2019-12-08 14:58:21'),
(117, 32, 'Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedocFt brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc', 'bewooten21', '2019-12-08 14:58:24'),
(118, 33, 'music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet ', 'bewooten21', '2019-12-08 14:58:52'),
(119, 33, 'music is sweet music is sweet music is sweet music is sweet music is sweet ', 'bewooten21', '2019-12-08 14:58:56'),
(120, 33, 'music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet ', 'bewooten21', '2019-12-08 14:59:02'),
(121, 34, '-Contoured frequency response is clean, instrumental reproduction and rich vocal pickup --Professional-quality reproduction for drum, precussion, and instrument amplifier miking ---Uniform cardioid pickup pattern isolates the main source while reducing background noise ---Extre', 'bewooten26', '2019-12-08 19:16:42'),
(122, 34, '-Contoured frequency response is clean, instrumental reproduction and rich vocal pickup --Professional-quality reproduction for drum, precussion, and instrument amplifier miking ---Uniform cardioid pickup pattern isolates the main source while reducing background noise ---Extre-Contoured frequency response is clean, instrumental reproduction and rich vocal pickup --Professional-quality reproduction for drum, precussion, and instrument amplifier miking ---Uniform cardioid pickup pattern isolates the main source while reducing background noise ---Extre', 'bewooten26', '2019-12-08 19:16:47'),
(123, 34, '-Contoured frequency response is clean, instrumental reproduction and rich vocal pickup --Professional-quality reproduction for drum, precussion, and instrument amplifier miking ---Uniform cardioid pickup pattern isolates the main source while reducing background noise ---Extre', 'bewooten26', '2019-12-08 19:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(50) NOT NULL,
  `prodDesc` varchar(1000) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodId`, `price`, `image`, `prodDesc`, `prodName`, `quantity`) VALUES
(13, '75.00', 'images/13.jpg', 'The Behringer Eurodesk SX2442FX 18-channel mixer gives you an incredible amount of capability for the price. You\'ll be able to handle any mixing task with 16 Xenyx mic preamps, 4-band EQs on each channel, four aux sends per channel, and four mix groups. The SX2442FX even features dual effects processors, with 99 effects presets covering reverb, delay, chorus, and more. There are insert points on each channel, group, and bus for adding external processors. The intuitive layout makes this an ideal mixer for schools or churches that rely on volunteers to run sound, and the main output LED meters make it easy to keep your signal levels where they need to be. If you need a large format mixer, the Behringer Eurodesk SX2442FX 18-channel mixer is a serious value.', 'Behringer EURODESK SX2442FX Mixer', 1),
(18, '0.50', 'images/18.jpg', '--Six outlets for power to up to six of your favorite devices\r\n--Cable length of 10 ft.\r\n--Durable black steel housing\r\n', 'Livewire PowerStrip 10ft Cord', 2),
(19, '25.00', 'images/19.jpg', 'The TS215 is rated at 550 watts continuous, 1100 watts peak output. This high power capability ensures greater output for use in larger spaces, with increased clarity, since the amplifiers wonâ€™t â€œrun out of steamâ€ and distort the way less powerful units will.', 'Alto Truesonic TS215 ', 3),
(20, '5.00', 'images/20.jpg', '--Type: Interconnect Gauge: 26 Connector 1: 1/4\" TRS-M Connector 2: XLR-F Facet: Straight/Straight Configuration: Single\r\n--Black 1/4\" TRS male to XLR female\r\n--Carries the ground from a low impedance microphone but does not transform impedance\r\n--Sturdy, reliable audio component connectors with molded strain relief\r\n--1/4\" TRS male to XLR female', 'Livewire Essential Interconnect Cable 1/4\" TRS Male to 1/4\" TRS Male 5 ft. Black', 1),
(21, '5.00', 'images/21.jpg', '--Type: Microphone Gauge: 24 Connecter 1: XLR-F Connecter 2: XLR-M Facet: Straight/Straight Configuration: Single\r\n--Black Microphone cable with nickel-plated Rean connecters, 24-gauge dual conductor design; spiral copper shielding (95% coverage), with strain relief and heavy PVC jacket\r\n--Rean Connecters 24-Gauge Dual Conductor Design Spiral Copper Shield Guaranteed for Life Microphone cable with nickel-plated Rean connecters, 24-gauge dual conductor design; spiral copper shielding (95% coverage), with strain relief and heavy PVC jacket\r\n--Rean Connecters24-Gauge Dual Conductor DesignSpiral Copper ShieldGuaranteed for Life', 'Livewire Essential XLR Microphone Cable 15 ft. Black', 4),
(22, '7.50', 'images/22.jpg', '--Type: Microphone Gauge: 24 Connecter 1: XLR-F Connecter 2: XLR-M Facet: Straight/Straight Configuration: Single\r\n--Black Microphone cable with nickel-plated Rean connecters, 24-gauge dual conductor design; spiral copper shielding (95% coverage), with strain relief and heavy PVC jacket\r\n--Rean Connecters 24-Gauge Dual Conductor Design Spiral Copper Shield Guaranteed for Life Microphone cable with nickel-plated Rean connecters, 24-gauge dual conductor design; spiral copper shielding (95% coverage), with strain relief and heavy PVC jacket\r\n--Rean Connecters24-Gauge Dual Conductor DesignSpiral Copper ShieldGuaranteed for Life', 'Livewire Essential XLR Microphone Cable 25 ft. Black', 6),
(23, '9.00', 'images/23.jpg', '--Type: Microphone Gauge: 20 Connecter 1: XLR-M Connecter 2: XLR-F Facet: Straight/Straight Configuration: Single\r\n--Black Microphone cable with silver-plated Neutrik connecters, 20-gauge dual conductor design; braided copper shielding (85% coverage)\r\n--Internal chuck strain relief, a sealed boot and a heavy PVC jacket provide rock-solid reliability in the studio or on stage\r\n--Livewire Advantage Series represents ruggedness and reliability without compromises in clarity and detail for studio, stage or broadcast\r\n--Protects against RFI and EMI interference', 'Livewire Essential XLR Microphone Cable  50 ft. Black', 2),
(24, '12.50', 'images/24.jpg', 'The TeleLock Series speaker stands from Ultimate Support are extraordinarily strong yet lightweight due to their oversized, heavy-wall aluminum tubing. They\'re everything you\'d expect from an Ultimate Support speaker stand: they\'re strong, sturdy, lightweight, 100% field serviceable, and easy to set up and take down. ', 'Ultimate Support TS-90B Telelock Tripod Speaker Stand Pair', 2),
(25, '2.50', 'images/25.jpg', 'FIT MORE FUNCTIONALITY: The Wingman is equipped with 14 tools, including a knife, pliers, screwdrivers, wire cutters, a wire stripper, scissors, a package opener, bottle and can openers, a file, and a ruler.', 'LEATHERMAN - Wingman Multitool with Spring-Action Pliers and Scissors, Stainless Steel', 2),
(26, '2.50', 'images/26.jpg', '--A premium drop resistant and water resistant flashlight renowned for its quality, durability and reliability\r\n\r\n--Advanced lighting instrument with a diamond knurled design and a powerful projecting beam making it suitable for camping, climbing, fishing, hunting, etc.', 'MagLite LED 3-Cell D Flashlight, Black', 3),
(27, '1.00', 'images/27.jpg', 'Power cord for computers, TVs, Stereos and musical equipment\r\n', '6 Foot IEC Power Cord', 7),
(28, '1.00', 'images/28.jpg', '--Cords use 12-Gauge soft-drawn copper to give 120V 15-amps with a minimal voltage drop providing all the power you require! \r\n--15 ft', '15\' Lighted 3 prong extension cord (yellow)', 3),
(29, '1.50', 'images/29.jpg', '--Cords use 12-Gauge soft-drawn copper to give 120V 15-amps with a minimal voltage drop providing all the power you require! \r\n--35 ft', '35\' Lighted 3 prong extension cord (yellow)', 2),
(30, '1.50', 'images/30.jpg', '---12/3 50\' Kink-free cord\r\n---Converts 1 outlet into 3 outlets\r\n---Lighted female end shows power is on\r\n---cETL Listed / Approved', '50 ft. 3-Outlet 12/3 Heavy Duty Extension Cord - Orange', 2),
(31, '0.50', 'images/31.jpg', 'Securely mounts the Shure wireless handheld transmitters to standard microphone stands', 'Shure WA371 Microphone Clip ', 8),
(32, '20.00', 'images/32.jpg', 'The Shure SM58 cardioid dynamic microphone is one of the best-selling vocal mics in the world. The industry-standard for live vocal performance, the Shure SM58 delivers warm and clear vocal reproduction. Known for its reliability, durability and sound, the SM58 microphone is a common fixture on stages around the world. ', 'Shure SM58 Dynamic Handheld Vocal Microphone', 5),
(33, '15.00', 'images/33.jpg', '---Contoured frequency response is clean, instrumental reproduction and rich vocal pickup\r\n--Professional-quality reproduction for drum, precussion, and instrument amplifier miking\r\n---Uniform cardioid pickup pattern isolates the main source while reducing background noise\r\n---Extremely durable under heaviest use\r\nFrequency response 40 to 15,000 Hz\r\n----Connectivity: Wired', ' Shure SM57Cardioid Dynamic Microphone - Black', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`) VALUES
(1, 'owner'),
(2, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `threadId` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(75) NOT NULL,
  `body` varchar(4000) NOT NULL,
  `numPosts` int(11) NOT NULL,
  `lastPost` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`threadId`, `author`, `time`, `subject`, `body`, `numPosts`, `lastPost`) VALUES
(27, 'bewooten21', '2019-12-07 17:25:42', 'FS: used Japanese Strat', 'Fs new 2007 Japanese Strat..make me an offer', 3, '2019-12-07 18:45:04'),
(28, 'bewooten21', '2019-12-07 17:27:04', 'New phish album', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', 2, '2019-12-07 18:45:19'),
(31, 'bewooten21', '2019-12-07 18:40:16', 'Trey Anasytasio', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 3, '2019-12-07 18:44:50'),
(32, 'bewooten21', '2019-12-08 14:58:12', 'FT: Languedoc', 'Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc Ft brand new languedoc ', 3, '2019-12-08 08:58:24'),
(33, 'bewooten21', '2019-12-08 14:58:52', 'music', 'music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet music is sweet ', 3, '2019-12-08 08:59:02'),
(34, 'bewooten26', '2019-12-08 19:16:42', 'Languedoc', '-Contoured frequency response is clean, instrumental reproduction and rich vocal pickup --Professional-quality reproduction for drum, precussion, and instrument amplifier miking ---Uniform cardioid pickup pattern isolates the main source while reducing background noise ---Extre', 3, '2019-12-08 13:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `email`, `fName`, `lName`, `roleId`) VALUES
(11, 'bewooten23', '$2y$11$SUKsgJim816kcOpieS8Y8OfpRFBo3k04Trrb5/NYN2nN9mICAdV7K', 'bew@hotmail.com', 'Ted', 'Bundy', 1),
(12, 'user001', '$2y$11$QgHBSStCWTKUWsTvtXmzLOlKWG/GfjU4pUFGdNLJwKgk11mye0n3y', 'bew21@hotmail.com', 'Trey', 'Anastasio', 3),
(13, 'bewooten21', '$2y$11$fQ5wwGYnzmHKCReHbQ9Ofer2QEVCSzfQ0ZWQmFPV6szQUEqwZzVd2', 'bewooten21@hotmail.com', 'Brad', 'Wooten', 1),
(14, 'bewooten211', '$2y$11$Ne04AEpvGGjGjR7jT6pigOai1N3V.mjcc1Gu17yodDMViiFWRdUtK', 'Bew2222@hotmail.com', 'Brad', 'Wootennn', 1),
(15, 'bewooten1', '$2y$11$H0R.czv4HdocQJiMy53kEuH3a24MlAPlNtMRWeECCVjYMjXp7o4rG', 'bew2@hotmail.com', 'Ted', 'Bundy', 1),
(16, 'bewooten20', '$2y$11$pyV6o015BUAmR132KFZVlenaiwppgpslkhQ7eIN45XNcAUWdKEZWi', 'bewooten20@hotmail.com', 'Jon ', 'Fishman', 3),
(17, 'bewooten22', '$2y$11$lEzBO5hMj.kk1Fel65IXLer5qtKX2eKnNgcsHM1EF8y/HOCqHxyKS', 'bewooten22@hotmail.com', 'Brad', 'Bundy', 1),
(18, 'bewooten25', '$2y$11$D2Bhp7WpIcqVmwbXWsT7J.4e43Sh7aUccrKAhmSQCYNznYcplz1Fm', 'bewooten25@hotmail.com', 'Brad', 'Wooten', 1),
(19, 'bewooten26', '$2y$11$YPP2xivnS4kQUWA9dRgkb.OSvYQLb6Hb0BVqeLX7cQdRPY.VzsE.m', 'bewooten26@hotmail.com', 'Brad', 'Wooten', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderItemId`),
  ADD KEY `fkprodId` (`prodId`),
  ADD KEY `fkorderId` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `fkuserId` (`userId`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `threadIdfk` (`threadId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`threadId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `fkRole` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `threadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fkorderId` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`),
  ADD CONSTRAINT `fkprodId` FOREIGN KEY (`prodId`) REFERENCES `product` (`prodId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fkuserId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `threadIdfk` FOREIGN KEY (`threadId`) REFERENCES `thread` (`threadId`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fkRole` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
