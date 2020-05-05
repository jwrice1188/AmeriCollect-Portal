-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 05:24 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cigar`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountid` int(11) NOT NULL,
  `adminrights` int(1) NOT NULL,
  `accountusername` varchar(50) NOT NULL,
  `accountpassword` varchar(50) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountid`, `adminrights`, `accountusername`, `accountpassword`, `fname`, `lname`, `address`, `city`, `phone`, `email`) VALUES
(71, 1, 'admin', 'admin', 'James', 'Rice', '343 Prospect Ave', 'Sheboygan Falls', '4142024555', 'jwrice1188@gmail.com'),
(72, 0, 'user', 'user', 'Wilhelmina', 'Rice', '123 Baby Ln', 'Sheboygan Falls', '4142023555', 'minarose@gmail.com'),
(73, 0, 'strick9', 'strick9', 'Jess', 'Rice', '343 Prospect Ave.', 'Sheboygan Falls', '9209184816', 'jessmrice720@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `numberordered` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `quantity` int(250) NOT NULL,
  `price` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `type`, `name`, `description`, `quantity`, `price`) VALUES
(1, 'cigar', 'AVO CLASSIC NO. 2', 'AVO Classic high quality cigars were initially developed by Zino Davidoff for distinguished pianist Avo Uvezian to hold by his piano. This cigar is constructed from 5 different styles of Dominican tobaccos that are enclosed in a light Connecticut wrapper to give a balanced and delicate smoke. Box of 20.', 101, 190),
(2, 'cigar', 'LA FLOR DOMINICANA FACTORY PRESS', 'La Flor Dominicana cigars represent some of the very best premium cigars made in the world today. Only the finest, hand-selected wrappers and perfectly-cured, vintage filler tobaccos are used in these flavorful and truly memorable luxury-class cigars. Here you will also find some of La Flor Dominicana\'s most unique and highly-acclaimed cigars. Discover this gem of the Dominican Republic that every cigar smoker should experience on a regular basis. It doesn\'t get much better than this. Box of 120.', 100, 1631),
(3, 'cigar', 'DAVIDOFF 702 SERIES ANIVERSARIO DOUBLE R', 'Davidoff 702 Series Aniversario Double R cigars are a stunning new version of this classic Davidoff bestseller. By taking the original blend and rolling it in a dark \"702\" hybrid wrapper germinated from three Cuban seeds and grown in the rich volcanic soil of Ecuador, the result is a smooth, creamy smoke teeming with bold, spicy, semi-sweet flavors, and a carload of complexity. A MUST for all Davidoff disciples and cigar smokers looking for more intense luxury-class cigar. Box of 25', 100, 867),
(4, 'cigar', 'DAVIDOFF ANIVERSARIO DOUBLE \'R\'', 'Davidoff Double R cigars are creamy, full-bodied, handcrafted smokes with the finest Dominican tobaccos patiently harvested over the course of four years. Each is encased in a luxurious Connecticut wrapper for a captivating aroma and silky finish. Get these entrancing smokes today. Box of 20.', 100, 808),
(5, 'cigar', 'PADRON SERIE 1926 40TH ANNIVERSARY TORPEDO', 'The limited edition Padron 1926 40th Anniversary Torpedo Maduro is a breathtaking, box-pressed beauty with an all-5-year-aged blend of bold Nicaraguan filler tobaccos and mouthwatering, ebony wrappers. An aficionado\'s dream cigar. Box of 20.', 100, 87),
(6, 'cigar', 'ARTURO FUENTE DOUBLE CHATEAU', 'Arturo Fuente Double Chateau Fuente Natural cigars are handmade with smooth-smoking, aromatic Connecticut Shade wrappers and presented in cedar sleeves. Often hard to find, these flavorful Arturo Fuente cigars offer a memorable, medium-bodied smoke. Get \'em while you can. Box of 20.', 100, 542),
(7, 'cigar', 'ASHTON ESTATE SUN GROWN 24 YEAR SALUTE', 'Ashton Estate Sun Grown 24 Year Salute cigars (Ashton ESG) feature a unique Dominican wrapper grown on the Chateau de la Fuente farm in the D.R. that has never been used on any other cigar. Released in 2006 to commemorate Ashton\'s 20th anniversary, a new \'Salute\' will be released annually through 2010. Due to the rare tobaccos used in these full-bodied and spicy cigars, only 50,000 are made each year. Ashton ESG Salute cigars should be part of every ardent cigar lover\'s private collection. Box of 25.', 100, 496),
(8, 'cigar', 'LA AURORA PREFERIDOS SAPPHIRE CONNECTICUT SHADE #2 TUBES', 'La Aurora Preferido Sapphfire cigars are patiently handmade with robust Dominican tobaccos draped in dark, 7 yr-aged Connecticut wrappers that smoke incredibly smooth with no trace of bitterness. A true aficionado\'s cigar, perfectly-balanced, right down to the nub. Among La Aurora\'s finest cigars! Box of 24.', 100, 493),
(9, 'cigar', 'LA AURORA PREFERIDOS RUBY BRAZILIAN MADURO #2 TUBES', 'La Aurora Preferido #2 Ruby cigars contain a sophisticated blend of choice Dominican binders nestled in a Piloto Cubano binder, then finished in a chocolaty brown Brazilian sun grown Maduro wrapper. Its soft white smoke reveals a long ash and sweet cedary undertones in a medium to full-bodied smoke. Box of 24.', 100, 493),
(10, 'cigar', 'MONTECRISTO WHITE NO. 2', 'Montecristo White cigars are reminiscent of the original Montecristo except Montecristo White boasts a hand selected Ecuadorian Connecticut Shade wrapper. Montecristo White cigars continue Montecristo\'s fine tradition of being the world\'s most sought after cigars. Box of 20.', 100, 392),
(11, 'pipe', 'Tsuge Ikebana QQR 147/18 Tobacco Pipe - TP8335', 'pipe1.png', 5, 160),
(12, 'pipe', 'Ardor Christmas 6 Tobacco Pipe - CH01', 'pipe2.png', 4, 1000),
(13, 'pipe', 'Gamboni Squat Tomato Tobacco Pipe - Smooth', 'pipe3.png', 5, 700),
(14, 'pipe', 'Heinemann Blowfish Smooth Tobacco Pipe', 'pipe4.png', 5, 700),
(15, 'pipe', 'Savinelli Autograph Panel Tobacco Pipe - TP4889', 'pipe5.png', 5, 560),
(16, 'pipe', 'Rinaldo Traide YYY SL Tobacco Pipe - RT3Y075', 'pipe6.png', 5, 452),
(17, 'pipe', 'Gamboni Fancy Brandy Tobacco Pipe - Sandblast', 'pipe7.png', 5, 450),
(18, 'pipe', 'Daniel Mustran Freehand Tobacco Pipe - TP7316', 'pipe8.png', 5, 440),
(19, 'pipe', 'Brandon Heath Briars Prince Bamboo Shank Tobacco Pipe - 17008', 'pipe9.png', 5, 425),
(20, 'pipe', 'Vauen Diamond 3D Printer Made Tobacco Pipe - Blue', 'pipe10.png', 5, 376),
(21, 'accessory', 'Xikar HP Black Humidor - 75ct', 'accessory1.png', 2, 255),
(22, 'accessory', 'Brigham Solstice Cherry Matte Finish Humidor - 75ct', 'accessory2.png', 3, 123),
(23, 'accessory', 'Xikar HP4 Quad Cigar Lighter - Sandstone', 'accessory3.png', 25, 102),
(24, 'accessory', 'Xikar HP3 Cigar Lighter - Matte Black', 'accessory4.png', 25, 85),
(25, 'accessory', 'Xikar XO 403 Cigar Cutter - Black on Black', 'accessory5.png', 25, 102),
(26, 'accessory', 'Xikar XO 403SL Cigar Cutter - Silver', 'accessory6.png', 25, 102),
(27, 'accessory', 'Redeemer Cigar Tool - Black', 'accessory7.png', 25, 80),
(28, 'accessory', 'Redeemer Cigar Tool - Gray', 'accessory8.png', 25, 81);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `total` int(25) NOT NULL,
  `purchasedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
