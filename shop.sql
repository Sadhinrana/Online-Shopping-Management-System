-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 12:32 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`, `level`) VALUES
(1, 'S M Sadhin Rana', 'sadhin', 'smsadhin123@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brandname` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brandname`) VALUES
(1, 'IPHONE'),
(2, 'SAMSUNG'),
(3, 'ACER'),
(4, 'CANON'),
(5, 'Walton');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(255) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` float(10,3) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`) VALUES
(1, 'Mobile Phones'),
(2, 'Desktop'),
(3, 'Laptop'),
(4, 'Accessories'),
(5, 'Software'),
(6, 'Sports &amp; Fitness'),
(7, 'Footware'),
(8, 'Jewellery'),
(9, 'Clothing'),
(10, 'Home Decor &amp; Kitchen'),
(11, 'Beauty &amp; Healthcare'),
(12, 'Toys, Kids &amp; Babies');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE IF NOT EXISTS `compare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmrid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(32) NOT NULL,
  `price` double(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(32) NOT NULL,
  `country` varchar(32) NOT NULL,
  `zipcode` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(3, 'S M Sadhin Rana', 'Village : Sonpur, Post : Aksi, Thana : Magura, District : Magura', 'Dhaka', 'Bangladesh', '1200', '01738797379', 'smsadhin123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmrid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(32) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(32) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `catid`, `brandid`, `body`, `price`, `image`, `type`) VALUES
(9, 'Lorem Ipsum is simply', 4, 3, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></p>', 415.540, 'uploads/b65b2dcd48.png', 0),
(10, 'Air cooler', 4, 5, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></p>', 220.970, 'uploads/e6d8f5d46b.jpg', 0),
(11, 'Lorem Ipsum is simply', 4, 5, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></p>', 620.870, 'uploads/8e059869fb.jpg', 0),
(12, 'Iron machine', 4, 5, '>Lorem ipsum dolor sit amet, consectetur a>Lorem ipsum dolor sit amet, consectetur a>Lorem ipsum dolor sit amet, consectetur a>Lorem ipsum dolor sit amet, consectetur a>Lorem ipsum dolor sit amet, consectetur a>Lorem ipsum dolor sit amet, consectetur a', 505.220, 'uploads/de795aadb1.png', 0),
(13, 'IPHONE', 1, 1, '<p><span>Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet sed do eiusmod.<br /></span></p>', 500.000, 'uploads/68f6462315.png', 1),
(14, 'SAMSUNG', 10, 2, '<p><span>Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;<span>Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.&nbsp;</span></span></p>', 220.970, 'uploads/6e96e8e040.png', 1),
(15, 'ACER', 2, 3, '<p><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span></p>', 324.000, 'uploads/8a3a3cfd9a.jpg', 1),
(16, 'CANON', 5, 4, '<p><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span></p>', 423.000, 'uploads/78a1a67b7b.png', 1),
(17, 'SAMSUNG', 10, 2, '<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>\r\n<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>', 524.000, 'uploads/4b15b04c7b.jpg', 1),
(18, 'SAMSUNG', 3, 2, '<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>\r\n<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>', 456.000, 'uploads/eea35a94e9.jpg', 1),
(19, 'Lorem ipsum dolor sit amet, sed ', 2, 2, '<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>\r\n<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>', 872.000, 'uploads/769fc1d6e4.jpg', 1),
(20, 'ACER', 4, 3, '<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>\r\n<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>', 546.000, 'uploads/fc55cd2d75.jpg', 1),
(21, 'Lorem ipsum dolor sit amet, sed ', 10, 3, '<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>\r\n<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>', 369.000, 'uploads/903cd0543f.jpg', 1),
(22, 'CANON', 4, 4, '<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>\r\n<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>', 456.000, 'uploads/c0e53b5dc7.jpg', 1),
(23, 'Lorem ipsum dolor sit amet, sed ', 4, 4, '<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>\r\n<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>', 478.000, 'uploads/ecdaa178ec.jpg', 1),
(24, 'CANON', 4, 4, '<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>\r\n<p>Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;Lorem ipsomsimply.&nbsp;</p>', 678.000, 'uploads/a61278307e.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmrid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(32) NOT NULL,
  `price` double(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
