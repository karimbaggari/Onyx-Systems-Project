

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(32) NOT NULL,
  `productBrand` varchar(32) NOT NULL,
  `productCpu` varchar(32) NOT NULL,
  `productRam` varchar(32) NOT NULL,
  `productGpu` varchar(32) NOT NULL,
  `productHdd` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `products` (`productId`, `productName`, `productBrand`, `productCpu`, `productRam`, `productGpu`, `productHdd`) VALUES
(1, 'HP Pavilion G4', 'HP (Hewlett-Packard)', '2.5GHz AMD Dual-Core', '8GB', 'AMD Radeon 6480', '320GB'),
(2, 'Dell Latitude 5140', 'Dell', '2.8GHz Intel Quad-Core', '16GB', 'Nvidia GTX 2070', '1024GB'),
(4, 'Lenovo IdeaPad Z450', 'Lenovo', '2.5GHz AMD Dual-Core', '8GB', 'nvidia GTX 2020', '320GB');

-- --------------------------------------------------------



CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersUsername` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usersPassword` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`usersId`, `usersUsername`, `usersPassword`) VALUES
(1, 'admin', 'admin123**');


ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);


ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
