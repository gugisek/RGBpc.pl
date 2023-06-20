-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 20, 2023 at 10:43 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wszm_rgbpc`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `finances`
--

CREATE TABLE `finances` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `invoice` varchar(40) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `when` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `object_id` int(11) NOT NULL,
  `object_type` text NOT NULL,
  `before` text DEFAULT NULL,
  `after` text NOT NULL,
  `type` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES
(3, 1, '2023-06-19 06:47:24', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, 2023-06-16 12:10:41, 1', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, current_timestamp(), 3', 1, 'Edytowano użytkownika'),
(4, 1, '2023-06-19 06:47:55', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 4, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, , 1', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, , 1', 1, 'Edycja produktu'),
(5, 1, '2023-06-19 06:48:21', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 5, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, , 1', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 1', 1, 'Edycja produktu'),
(6, 1, '2023-06-19 06:48:57', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 3, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 4', 1, 'Edycja produktu'),
(7, 1, '2023-06-19 06:49:11', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 5, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 1', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 3', 1, 'Edycja produktu'),
(8, 1, '2023-06-19 06:49:27', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 3', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 1', 1, 'Edycja produktu'),
(9, 1, '2023-06-19 06:49:36', 3, 'products', 'Etui przezroczyste iPhone 11 slim, PN-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 1', 'Etui przezroczyste iPhone 11 slim, PN-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 1, 'Edycja produktu'),
(10, 1, '2023-06-19 07:14:42', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 4', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 4', 1, 'Edycja produktu'),
(11, 1, '2023-06-19 07:14:54', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 4', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 1, 'Edycja produktu'),
(12, 1, '2023-06-19 07:16:07', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, 2023-06-19 08:47:24, 3', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(13, 1, '2023-06-19 07:16:25', 4, 'users', 'NULL', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6, asd, asd, 688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6, asd, 1, current_timestamp(), current_timestamp(), 1', 2, 'Dodano użytkownika'),
(14, 1, '2023-06-19 07:17:58', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-06-19 09:16:25, 1', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 3', 1, 'Edytowano użytkownika'),
(15, 1, '2023-06-19 09:40:09', 1, 'settings', '1, admin, Full privilages for all', '1, admin, Full privilages for all', 1, 'Zmodfikowano rolę użytkownika'),
(16, 1, '2023-06-19 09:41:30', 1, 'user_roles', '1, admin, Full privilages for all', '1, admin, Full privilages for all', 1, 'Zmodfikowano rolę użytkownika'),
(17, 1, '2023-06-19 09:47:00', 1, 'user_roles', '1, admin, Full privilages for all', '1, admin, Full privilages for alla', 1, 'Zmodfikowano rolę użytkownika'),
(18, 1, '2023-06-19 09:47:05', 1, 'user_roles', '1, admin, Full privilages for alla', '1, admin, Full privilages for all', 1, 'Zmodfikowano rolę użytkownika'),
(19, 1, '2023-06-19 16:26:21', 2, 'user_roles', '2, magazynier, Only for update products, orders', '2, magazynier, Only for update products, orders2', 1, 'Zmodfikowano rolę użytkownika'),
(20, 1, '2023-06-19 16:27:05', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 10, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 1, 'Edycja produktu'),
(21, 1, '2023-06-19 16:27:52', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 12, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 1, 'Edycja produktu'),
(22, 1, '2023-06-19 16:30:09', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 13, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 1, 'Edycja produktu'),
(23, 1, '2023-06-19 16:33:21', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 14, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 1, 'Edycja produktu'),
(24, 1, '2023-06-19 16:34:10', 6, 'products', 'NULL', 'esa, PN-1006, 12, 68.00, 1, pn-1006.png, esa, 3, esa, 1', 2, 'Dodano produkt'),
(25, 1, '2023-06-19 16:36:14', 2, 'user_roles', '2, magazynier, Only for update products, orders2', '2, magazynier, Only for update products, orders', 1, 'Zmodfikowano rolę użytkownika'),
(26, 1, '2023-06-19 16:41:08', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 1, 'Edycja produktu'),
(27, 1, '2023-06-19 16:42:50', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, 2023-06-19 09:16:07, 1', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, current_timestamp(), 4', 1, 'Edytowano użytkownika'),
(28, 1, '2023-06-19 16:44:06', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, 2023-06-19 18:42:50, 4', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(29, 1, '2023-06-19 16:44:13', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, 2023-06-19 18:44:06, 1', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(30, 1, '2023-06-19 16:45:19', 2, 'user_roles', '2, magazynier, Only for update products, orders', '2, magazynier2, Only for update products, orders', 1, 'Zmodfikowano rolę użytkownika'),
(31, 1, '2023-06-19 16:46:20', 2, 'user_roles', '2, magazynier2, Only for update products, orders', '2, magazynier, Only for update products, orders', 1, 'Zmodfikowano rolę użytkownika'),
(32, 1, '2023-06-20 07:05:30', 3, 'user_roles', ', , ', '3, wyłączone, ', 1, 'Zmodfikowano rolę użytkownika'),
(33, 1, '2023-06-20 07:10:06', 2, 'user_status', '2, nieaktywne', '2, ', 1, 'Zmodfikowano status użytkownika'),
(34, 1, '2023-06-20 07:10:49', 2, 'user_status', '2, nieaktywne2', '2, nieaktywne', 1, 'Zmodfikowano status użytkownika'),
(35, 1, '2023-06-20 07:39:52', 3, 'user_status', '3, wyłączone, 2', '3, wyłączone, 1', 1, 'Zmodfikowano status użytkownika'),
(36, 1, '2023-06-20 07:40:40', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, 2023-06-19 18:44:13, 1', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, current_timestamp(), 3', 1, 'Edytowano użytkownika'),
(37, 1, '2023-06-20 07:47:03', 3, 'user_status', '3, wyłączone, 1', '3, wyłączone, 2', 1, 'Zmodfikowano status użytkownika'),
(38, 1, '2023-06-20 07:49:17', 3, 'user_status', '3, wyłączone, 2', '3, wyłączone, 1', 1, 'Zmodfikowano status użytkownika'),
(39, 3, '2023-06-20 07:52:09', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, 2023-06-20 09:40:40, 3', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, current_timestamp(), 4', 1, 'Edytowano użytkownika'),
(40, 1, '2023-06-20 07:53:17', 3, 'user_status', '3, wyłączone, 1', '3, wyłączone, 2', 1, 'Zmodfikowano status użytkownika'),
(41, 1, '2023-06-20 07:53:34', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, 2023-06-20 09:52:09, 4', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(42, 1, '2023-06-20 08:10:17', 0, 'user_status', ', , ', ', Kakor, 1', 2, 'Dodano status użytkownika'),
(43, 1, '2023-06-20 08:11:39', 6, 'user_status', 'NULL', ', Kakor moment, 2', 2, 'Dodano status użytkownika'),
(44, 1, '2023-06-20 08:12:28', 7, 'user_status', 'NULL', '7, Kakor2, 1', 2, 'Dodano status użytkownika'),
(45, 1, '2023-06-20 08:19:28', 6, 'user_status', '6, Kakor moment, 2', '6, Kakor moment, 1', 1, 'Zmodfikowano status użytkownika'),
(46, 1, '2023-06-20 08:19:34', 6, 'user_status', '6, Kakor moment, 1', '6, Kakor moment, 2', 1, 'Zmodfikowano status użytkownika'),
(47, 1, '2023-06-20 08:34:27', 7, 'user_status', '7, Kakor2, 1', '', 3, 'Usunięto status użytkownika'),
(48, 1, '2023-06-20 08:40:40', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-06-19 09:17:58, 3', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 6', 1, 'Edytowano użytkownika'),
(49, 1, '2023-06-20 08:41:11', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-06-20 10:40:40, 6', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 2', 1, 'Edytowano użytkownika'),
(50, 1, '2023-06-20 08:41:36', 6, 'user_status', '6, Kakor moment, 2', '', 3, 'Usunięto status użytkownika');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `log_types`
--

CREATE TABLE `log_types` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_types`
--

INSERT INTO `log_types` (`id`, `type`) VALUES
(1, 'modify'),
(2, 'create'),
(3, 'delete');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `seller` text NOT NULL,
  `client` text NOT NULL,
  `cart_id` int(11) NOT NULL,
  `contact_line_1` text NOT NULL,
  `contact_line_2` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `value` decimal(10,0) NOT NULL,
  `status_id` int(11) NOT NULL,
  `platform` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `sku` varchar(50) NOT NULL,
  `bought` decimal(7,2) NOT NULL,
  `sold` decimal(7,2) NOT NULL,
  `quantity` decimal(6,0) NOT NULL,
  `img` text NOT NULL,
  `source` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `bought`, `sold`, `quantity`, `img`, `source`, `category_id`, `description`, `status_id`) VALUES
(1, 'Etui różowe na iPhone 14 Plus', 'PN-1001', 17.97, 34.99, 8, 'pn-1001.png', 'https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr', 5, '', 1),
(2, 'Radiator M.2 SSD 5V 3PIN ARGB ', 'PN-1002', 24.59, 79.99, 15, 'pn-1002.png', 'https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt', 1, 'joł', 1),
(3, 'Etui przezroczyste iPhone 11 slim', 'PN-1003', 8.87, 23.99, 0, 'pn-1003.png', 'https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK', 1, 'chińczyk XD', 2),
(4, 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami', 'PN-1004', 29.76, 57.99, 3, 'pn-1004.png', 'https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5', 2, 'Pełen zestaw, wraz ze specjalnymi prowadnicami', 1),
(5, 'Etui przezroczyste iPhone 11', 'PN-1005', 13.87, 23.99, 0, 'pn-1005.png', 'https://www.aliexpress.us/item/3256804512972566.html', 1, '', 2),
(6, 'esa', 'PN-1006', 12.00, 68.00, 1, 'pn-1006.png', 'esa', 3, 'esa', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category`) VALUES
(1, 'akcesoria komputerowe'),
(2, 'akcesoria do smartfonów'),
(3, 'akcesoria do czyszczenia'),
(4, 'części komputerowe'),
(5, 'etui i pokrowce');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_status`
--

CREATE TABLE `product_status` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_status`
--

INSERT INTO `product_status` (`id`, `status`) VALUES
(1, 'dostępne'),
(2, 'brak'),
(3, 'niedostępne'),
(4, 'wycofane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quantity_ranges`
--

CREATE TABLE `quantity_ranges` (
  `id` int(11) NOT NULL,
  `range` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quantity_ranges`
--

INSERT INTO `quantity_ranges` (`id`, `range`, `name`) VALUES
(1, 'between 0 and 1000', 'Wszystko'),
(2, 'between 0 and 2', '0-2'),
(3, 'between 3 and 4', '3-4'),
(4, 'between 5 and 9', '5-9'),
(5, '>=10', '10+');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_privileges`
--

CREATE TABLE `status_privileges` (
  `id` int(11) NOT NULL,
  `login` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_privileges`
--

INSERT INTO `status_privileges` (`id`, `login`, `description`) VALUES
(1, 1, 'Can log in'),
(2, 0, 'Can\'t log in');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `sur_name` text NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `mail` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `sur_name`, `pswd`, `mail`, `role_id`, `create_date`, `update_date`, `status_id`, `description`) VALUES
(1, '58c4258120c2663e502468794f3e3aa314bf966f837200e1aa3e9c50b428f870', 'Gustaw', 'Sołdecki', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'gugisek@gmail.com', 1, '2023-06-15 20:55:07', '2023-06-16 04:42:19', 1, 'XD'),
(2, '03f03be21462b76ccb5fb7e5319ef1e6f44ac328cf1750b581fcb7710aec3d8a', 'Jakub', 'Strzelczak', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'kubastrzelczak@gmail.com', 1, '2023-06-15 20:56:36', '2023-06-15 18:56:36', 1, NULL),
(3, 'c77f0e9e17b362249ecf5924db1d033a8e3eeb215c667dd91851d6d5a2cd26ad', 'Kacper', 'Korus', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '123kakor56@gmail.com', 2, '2023-06-15 20:56:58', '2023-06-20 07:53:34', 1, NULL),
(4, '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'asd', 'asd', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'asd', 1, '2023-06-19 09:16:25', '2023-06-20 08:41:11', 2, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `description`) VALUES
(1, 'admin', 'Full privilages for all'),
(2, 'magazynier', 'Only for update products, orders');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL,
  `privileges` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`, `privileges`) VALUES
(1, 'aktywne', 1),
(2, 'nieaktywne', 2),
(3, 'wyłączone', 2),
(4, 'zbanowane', 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_fk0` (`product_id`),
  ADD KEY `carts_fk1` (`order_id`);

--
-- Indeksy dla tabeli `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finances_fk0` (`order_id`);

--
-- Indeksy dla tabeli `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_fk0` (`user_id`),
  ADD KEY `logs_fk1` (`type`);

--
-- Indeksy dla tabeli `log_types`
--
ALTER TABLE `log_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_fk0` (`cart_id`),
  ADD KEY `orders_fk1` (`status_id`);

--
-- Indeksy dla tabeli `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_fk0` (`category_id`),
  ADD KEY `products_fk1` (`status_id`);

--
-- Indeksy dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `quantity_ranges`
--
ALTER TABLE `quantity_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `status_privileges`
--
ALTER TABLE `status_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `users_fk0` (`role_id`),
  ADD KEY `users_fk1` (`status_id`);

--
-- Indeksy dla tabeli `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`) USING HASH;

--
-- Indeksy dla tabeli `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `log_types`
--
ALTER TABLE `log_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_status`
--
ALTER TABLE `product_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quantity_ranges`
--
ALTER TABLE `quantity_ranges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_privileges`
--
ALTER TABLE `status_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_fk0` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `finances`
--
ALTER TABLE `finances`
  ADD CONSTRAINT `finances_fk0` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `logs_fk1` FOREIGN KEY (`type`) REFERENCES `log_types` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_fk1` FOREIGN KEY (`status_id`) REFERENCES `product_status` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`),
  ADD CONSTRAINT `users_fk1` FOREIGN KEY (`status_id`) REFERENCES `user_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
