-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 04:33 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `id_buy` int(11) UNSIGNED NOT NULL,
  `tgl_buy` date NOT NULL,
  `supplier_id` int(11) UNSIGNED NOT NULL,
  `item_buy` int(3) UNSIGNED NOT NULL,
  `total_buy` double NOT NULL,
  `disk_buy` int(3) NOT NULL,
  `bayar_buy` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buy_details`
--

CREATE TABLE `buy_details` (
  `id_bdet` int(11) UNSIGNED NOT NULL,
  `buy_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id_cart` int(11) UNSIGNED NOT NULL,
  `session_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `carts`
--
DELIMITER $$
CREATE TRIGGER `stok_product_change_buy_delete` AFTER DELETE ON `carts` FOR EACH ROW BEGIN    
    UPDATE products SET stok_product = stok_product - OLD.product_qty
    WHERE id_product = OLD.product_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_product_change_buy_update` AFTER UPDATE ON `carts` FOR EACH ROW BEGIN    
    UPDATE products SET stok_product = stok_product - OLD.product_qty
    WHERE id_product = OLD.product_id;
    
    UPDATE products SET stok_product = stok_product + NEW.product_qty
    WHERE id_product = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cart_sell`
--

CREATE TABLE `cart_sell` (
  `id_scart` int(11) UNSIGNED NOT NULL,
  `session_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `cart_sell`
--
DELIMITER $$
CREATE TRIGGER `stok_product_change_sell_delete` AFTER DELETE ON `cart_sell` FOR EACH ROW BEGIN    
    UPDATE products SET stok_product = stok_product + OLD.product_qty
    WHERE id_product = OLD.product_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_product_change_sell_update` AFTER UPDATE ON `cart_sell` FOR EACH ROW BEGIN    
    UPDATE products SET stok_product = stok_product + OLD.product_qty
    WHERE id_product = OLD.product_id;
    
    UPDATE products SET stok_product = stok_product - NEW.product_qty
    WHERE id_product = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(12);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) UNSIGNED NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `beli_product` double NOT NULL,
  `jual_product` double NOT NULL,
  `stok_product` int(5) NOT NULL,
  `satuan_id` int(11) UNSIGNED NOT NULL,
  `ket_product` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `name_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `name_role`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `satuans`
--

CREATE TABLE `satuans` (
  `id_satuan` int(11) UNSIGNED NOT NULL,
  `name_satuan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id_sell` int(11) UNSIGNED NOT NULL,
  `tgl_sell` date NOT NULL,
  `name_customer` varchar(150) NOT NULL,
  `item_sell` int(3) UNSIGNED NOT NULL,
  `total_sell` double NOT NULL,
  `disk_sell` int(3) NOT NULL,
  `bayar_sell` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sell_detail`
--

CREATE TABLE `sell_detail` (
  `id_sdet` int(11) UNSIGNED NOT NULL,
  `sell_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `spendings`
--

CREATE TABLE `spendings` (
  `id_spend` int(11) UNSIGNED NOT NULL,
  `tgl_spend` date NOT NULL,
  `name_spend` varchar(255) NOT NULL,
  `total_spend` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` int(11) UNSIGNED NOT NULL,
  `name_supplier` varchar(255) NOT NULL,
  `address_supplier` text DEFAULT NULL,
  `telp_supplier` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `name_user` varchar(150) NOT NULL,
  `email_user` varchar(150) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `img_user` varchar(255) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `email_user`, `pass_user`, `img_user`, `role_id`) VALUES
(1, 'Muhammad Irfan Permana', 'irfanthejoelax@gmail.com', '$2y$10$96NBfsYBrwN2Y35OvqlaJOzGRj1R/8hAcsgurluZvAUNuLyOxgroq', 'ketum_ke_31.png', 1),
(2, 'Operator', 'opt@opt.com', '$2y$10$AgMQR.xsepv71ihTrObUVutvftqetIwGcOKF4YRibR2gDVkJbgCbS', 'default.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`id_buy`);

--
-- Indexes for table `buy_details`
--
ALTER TABLE `buy_details`
  ADD PRIMARY KEY (`id_bdet`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `cart_sell`
--
ALTER TABLE `cart_sell`
  ADD PRIMARY KEY (`id_scart`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id_sell`);

--
-- Indexes for table `sell_detail`
--
ALTER TABLE `sell_detail`
  ADD PRIMARY KEY (`id_sdet`);

--
-- Indexes for table `spendings`
--
ALTER TABLE `spendings`
  ADD PRIMARY KEY (`id_spend`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buys`
--
ALTER TABLE `buys`
  MODIFY `id_buy` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buy_details`
--
ALTER TABLE `buy_details`
  MODIFY `id_bdet` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id_cart` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_sell`
--
ALTER TABLE `cart_sell`
  MODIFY `id_scart` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id_satuan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id_sell` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sell_detail`
--
ALTER TABLE `sell_detail`
  MODIFY `id_sdet` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spendings`
--
ALTER TABLE `spendings`
  MODIFY `id_spend` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
