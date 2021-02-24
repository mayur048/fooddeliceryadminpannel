-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 09:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooddatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `AD_ID` int(11) NOT NULL,
  `AD_Name` varchar(90) NOT NULL,
  `AD_Email` varchar(50) NOT NULL,
  `AD_Contact` bigint(20) NOT NULL,
  `AD_CityID` varchar(50) NOT NULL,
  `AD_StateID` varchar(50) NOT NULL,
  `AD_Aadhar` varchar(12) NOT NULL,
  `Ad_PAN` varchar(10) NOT NULL,
  `AD_Address` varchar(500) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`AD_ID`, `AD_Name`, `AD_Email`, `AD_Contact`, `AD_CityID`, `AD_StateID`, `AD_Aadhar`, `Ad_PAN`, `AD_Address`, `isActive`) VALUES
(1, 'shadow__07', 'guru@raja.com', 2342343, 'Mumbai', 'Maharashtra', '432435652345', '435234fdgg', 'Addressdfsgfdagfdagcvx', 1),
(2, 'Anil Pandey', 'anilpandey@gmial.com', 1234567890, 'Chembur', 'Maharashtra', '123456789123', 'defrgf5gf2', 'Addressedededede', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityId` int(11) NOT NULL,
  `cityName` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `documentsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `GSTINregNO` bigint(20) NOT NULL,
  `businessType` varchar(100) NOT NULL,
  `tradeName` varchar(100) NOT NULL,
  `tradeNumber` bigint(20) NOT NULL,
  `registrationDate` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `GSTType` varchar(100) NOT NULL,
  `fassiName` varchar(50) NOT NULL,
  `fassiNumber` bigint(20) NOT NULL,
  `fassiExpiry` varchar(50) NOT NULL,
  `AddressOnFassi` varchar(200) NOT NULL,
  `businessAadharCard` varchar(100) NOT NULL,
  `businessPanCard` varchar(100) NOT NULL,
  `fassiCertificate` varchar(100) NOT NULL,
  `openOn` varchar(100) NOT NULL,
  `deliverType` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`documentsId`, `userId`, `GSTINregNO`, `businessType`, `tradeName`, `tradeNumber`, `registrationDate`, `GSTType`, `fassiName`, `fassiNumber`, `fassiExpiry`, `AddressOnFassi`, `businessAadharCard`, `businessPanCard`, `fassiCertificate`, `openOn`, `deliverType`) VALUES
(1, 3, 354, '$businessType', '$tradeName', 345, '0000-00-00 00:00:00', '$gstType', '$fassiName', 435, '0000-00-00', '$fassiAddress', '$aadharcardFile', '$panCardFile', '$fassiCertificateFile', '$openOn', '$deliveryType'),
(2, 1, 123456, 'eddedede', 'dededede', 1234556, '2021-02-19', 'ededed', 'dede', 1233445445, '2021-02-12', 'edrfrgftvcd', 'files/Document/Screenshot (161).png', 'files/Document/Screenshot (164).png', 'files/Document/Screenshot (168).png', 'on,on,on,on,,,', 'on,on'),
(3, 2, 1234567, 'chlothes', 'pawan trading', 98765, '2021-02-05', 'idk', 'idk', 123456789, '2021-02-01', 'chembur', 'files/Document/Screenshot (161).png', 'files/Document/Screenshot (162).png', 'files/Document/Screenshot (163).png', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', 'Shop Delivery,App Delivery'),
(4, 2, 1234567, 'chlothes', 'pawan trading', 98765, '2021-02-05', 'idk', 'idk', 123456789, '2021-02-01', 'chembur', 'files/Document/Screenshot (161).png', 'files/Document/Screenshot (162).png', 'files/Document/Screenshot (163).png', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', 'Shop Delivery,App Delivery'),
(5, 2, 1234567, 'chlothes', 'pawan trading', 98765, '2021-02-05', 'idk', 'idk', 123456789, '2021-02-01', 'chembur', 'files/Document/Screenshot (161).png', 'files/Document/Screenshot (162).png', 'files/Document/Screenshot (163).png', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', 'Shop Delivery,App Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userId` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roleId` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updataDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userId`, `email`, `password`, `roleId`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 'Shadow@walker.com', 'dhX97@#dfkj', 1, 1, '2021-02-04 18:00:34', '2021-02-04 18:00:54'),
(2, 'mayurshah@gmail.com', '12345', 2, 1, '2021-02-12 14:51:05', '2021-02-12 14:51:05'),
(4, 'anilpandey@gmial.com', '123456', 2, 1, '2021-02-25 01:34:46', '2021-02-25 01:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `ordereditems`
--

CREATE TABLE `ordereditems` (
  `productId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordereditems`
--

INSERT INTO `ordereditems` (`productId`, `orderId`, `quantity`) VALUES
(1, 2, 6),
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `shopId` int(11) NOT NULL,
  `ProductDesc` varchar(500) NOT NULL,
  `ProductSummary` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `DiscountPrice` int(11) NOT NULL,
  `ProductCategoryId` int(11) NOT NULL,
  `productImg` varchar(500) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updataDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `shopId`, `ProductDesc`, `ProductSummary`, `Price`, `DiscountPrice`, `ProductCategoryId`, `productImg`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 'something', 1, 'SomeThing', 'wow', 5000, 10000, 1, '', 1, '2021-02-10 18:02:31', '2021-02-10 18:02:31'),
(2, 'p_2', 1, 'fdr', 'hfg', 56, 23, 2, '', 1, '2021-02-15 01:29:59', '2021-02-15 01:29:59'),
(3, 'qwwqqe', 1, 'dsafsafsdfg', 'dsfafsd', 21334, 423, 1, 'files/productImg/Screenshot (160).png', 1, '2021-02-18 00:10:12', '2021-02-18 00:10:12'),
(4, 'asasa', 1, 'ghjghyjcyg', 'suhydrftgudyh', 34, 54, 8, 'files/productImg/Screenshot (165).png', 1, '2021-02-18 11:42:01', '2021-02-18 11:42:01'),
(5, 'qwwqqe', 1, 'sadas', 'asfdgads', 32, 43, 5, 'files/productImg/Screenshot (161).png', 1, '2021-02-18 15:12:36', '2021-02-18 15:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `ProductCategoryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `shopId` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updataDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`ProductCategoryID`, `Name`, `shopId`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 'sweets', 1, 1, '2021-02-10 18:02:31', '2021-02-25 18:02:31'),
(2, 'pc_2', 1, 1, '2021-02-15 01:25:45', '2021-02-15 01:25:45'),
(3, 'pc_3', 1, 1, '2021-02-15 01:25:51', '2021-02-15 01:25:51'),
(4, 'anihd', 2, 1, '2021-02-17 00:09:54', '2021-02-17 00:09:54'),
(5, 'samosa', 1, 1, '2021-02-17 00:34:21', '2021-02-17 00:34:21'),
(7, 'samosa', 1, 1, '2021-02-17 00:38:23', '2021-02-17 00:38:23'),
(8, 'shirt', 1, 1, '2021-02-18 11:41:16', '2021-02-18 11:41:16'),
(9, 'something', 1, 1, '2021-02-18 15:10:56', '2021-02-18 15:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `OrderId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updataDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`OrderId`, `shopId`, `userId`, `totalAmount`, `paymentMethod`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 1, 1, 100000, 'cod', 1, '2021-02-10 18:02:31', '2021-02-25 18:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleId`, `RoleName`, `isActive`, `createDate`) VALUES
(1, 'super Admin', 1, '2020-05-28 23:00:00'),
(2, 'admin', 1, '2021-02-05 20:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ShopId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ShopeName` varchar(200) NOT NULL,
  `shopType` varchar(50) NOT NULL,
  `shopEmail` varchar(50) DEFAULT NULL,
  `PhomeNo` bigint(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `street` varchar(50) NOT NULL,
  `pinCode` int(11) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `shopLiscence` varchar(100) NOT NULL,
  `services` varchar(100) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updataDate` datetime NOT NULL DEFAULT current_timestamp(),
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ShopId`, `userId`, `ShopeName`, `shopType`, `shopEmail`, `PhomeNo`, `state`, `city`, `Address`, `street`, `pinCode`, `landmark`, `shopLiscence`, `services`, `createDate`, `updataDate`, `isActive`) VALUES
(1, 2, 'Shadownet', '', NULL, 91937999959, '', '', 'room no 13 t48, old barrack', 'chembur camp', 400075, '', '', '', '2021-02-10 18:02:31', '2021-02-25 18:02:31', 1),
(2, 1, 'qwe', 'dsfaws', 'sdfasd@gfg.bfgds', 9820477315, 'Odisha', 'Mumbai', 'chembur', '', 400071, 'tyutg', 'files/Document/IMG_1004.jpg', 'on ,on ,on ,', '2021-02-24 01:23:36', '2021-02-24 01:23:36', 1),
(4, 2, 'Pawan clothing', 'chlothes', 'anilpandey@gmial.com', 1234567890, 'Maharashtra', 'Chembur', 'chembur', '', 400074, 'near my shop', 'files/Document/Screenshot (160).png', 'Sweets ,Bakery ,Juice ,', '2021-02-25 01:26:14', '2021-02-25 01:26:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateId` int(11) NOT NULL,
  `stateName` varchar(50) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateId`, `stateName`, `isActive`, `createDate`) VALUES
(1, 'maharastra', 1, '2021-02-05 20:30:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`AD_ID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityId`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`documentsId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userId`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`ProductCategoryID`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ShopId`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `AD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `documentsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `ProductCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ShopId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
