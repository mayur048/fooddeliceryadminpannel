-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 01:32 PM
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

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userId`, `email`, `password`, `phone`, `role`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 'Shadow@walker.com', 'dhX97@#dfkj', 9192599959, 'admin', 1, '2021-02-04 18:00:34', '2021-02-04 18:00:54');

--
-- Dumping data for table `ordereditems`
--

INSERT INTO `ordereditems` (`productId`, `orderId`, `quantity`) VALUES
(1, 2, 6),
(1, 1, 3);

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `shopId`, `ProductDesc`, `ProductSummary`, `Price`, `DiscountPrice`, `ProductCategoryId`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 1, 'SomeThing', 'wow', 5000, 10000, 1, 1, '2021-02-10 18:02:31', '2021-02-10 18:02:31');

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`ProductCategoryID`, `Name`, `userId`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 'sweets', 1, 1, '2021-02-10 18:02:31', '2021-02-25 18:02:31');

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`OrderId`, `shopId`, `userId`, `totalAmount`, `paymentMethod`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 1, 1, 100000, 'cod', 1, '2021-02-10 18:02:31', '2021-02-25 18:02:31');

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ShopId`, `userId`, `ShopeName`, `PhomeNo`, `Address`, `street`, `pinCode`, `createDate`, `updataDate`, `isActive`) VALUES
(1, 1, 'Shadownet', 91937999959, 'room no 13 t48, old barrack', 'chembur camp', 400075, '2021-02-10 18:02:31', '2021-02-25 18:02:31', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
