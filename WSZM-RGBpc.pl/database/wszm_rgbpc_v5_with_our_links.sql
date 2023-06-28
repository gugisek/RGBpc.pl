-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Cze 2023, 20:09
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wszm_rgbpc`
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
-- Zrzut danych tabeli `logs`
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
(50, 1, '2023-06-20 08:41:36', 6, 'user_status', '6, Kakor moment, 2', '', 3, 'Usunięto status użytkownika'),
(51, 2, '2023-06-20 11:50:39', 7, 'products', 'NULL', 'xdd, PN-1007, 31, 67, 1, pn-1007, asd, 1, asd, 1', 2, 'Dodano produkt'),
(52, 2, '2023-06-20 11:55:37', 7, 'products', 'xdd, PN-1007, 31.00, 67.00, 1, pn-1007, asd, 1, asd, 1', 'xdd, PN-1007, 31.00, 67.00, 1, pn-1007, asd, 1, asd, 1', 1, 'Edycja produktu'),
(53, 2, '2023-06-20 11:55:55', 8, 'products', 'NULL', 'das, PN-1008, 56, 88, 1, pn-1008, hhjhj, 1, hvgbh, 1', 2, 'Dodano produkt'),
(54, 2, '2023-06-20 11:56:55', 9, 'products', 'NULL', 'bjksadjn, PN-1009, 77, 77, 1, pn-1009jpg, bhbh, 1, hgvjbh, 1', 2, 'Dodano produkt'),
(55, 2, '2023-06-20 11:57:33', 10, 'products', 'NULL', 'fasdfs, PN-1010, 66, 66, 1, pn-1010.jpg, bhjbhjbjh, 1, hjbhjb, 1', 2, 'Dodano produkt'),
(56, 2, '2023-06-20 11:57:56', 11, 'products', 'NULL', 'jhsdfb, PN-1011, 66, 8, 1, pn-1011.png, hbjhbhbj, 1, ughbjhbj, 1', 2, 'Dodano produkt'),
(57, 2, '2023-06-20 11:59:47', 12, 'products', 'NULL', 'jksa, PN-1012, 89, 99, 1, pn-1012.png, bhbh, 1, hb, 1', 2, 'Dodano produkt'),
(58, 2, '2023-06-20 12:02:49', 13, 'products', 'NULL', 'adsfasd, PN-1013, 567, 879, 1, Uzupełniany automatycznie.png, fsdaf, 1, dasd, 1', 2, 'Dodano produkt'),
(59, 2, '2023-06-20 12:04:06', 14, 'products', 'NULL', 'ghvjbk, PN-1014, 68, 89, 1, PN-1014.png, jbjbk, 1, jbh, 1', 2, 'Dodano produkt'),
(60, 2, '2023-06-20 12:08:32', 15, 'products', 'NULL', 'has, pn-1015, 67, 889, 1, pn-1015.png, bhbh, 1, bbh, 1', 2, 'Dodano produkt'),
(61, 2, '2023-06-20 12:09:32', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(62, 2, '2023-06-20 12:09:44', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(63, 2, '2023-06-20 12:15:21', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(64, 2, '2023-06-20 12:16:06', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(65, 2, '2023-06-20 12:20:38', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(66, 2, '2023-06-20 12:20:46', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(67, 2, '2023-06-20 12:22:26', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(68, 2, '2023-06-20 12:22:45', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(69, 2, '2023-06-20 12:23:08', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(70, 2, '2023-06-20 12:23:36', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(71, 2, '2023-06-20 12:23:40', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(72, 2, '2023-06-20 12:24:01', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(73, 2, '2023-06-20 12:24:57', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(74, 2, '2023-06-20 12:25:49', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(75, 2, '2023-06-20 12:26:12', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(76, 2, '2023-06-20 12:26:58', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(77, 2, '2023-06-20 12:27:43', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(78, 2, '2023-06-20 12:29:12', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(79, 2, '2023-06-20 12:29:14', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(80, 2, '2023-06-20 12:30:42', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(81, 2, '2023-06-20 12:30:52', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(82, 2, '2023-06-20 12:31:56', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(83, 2, '2023-06-20 12:32:33', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(84, 2, '2023-06-20 12:34:06', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(85, 2, '2023-06-20 12:34:16', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(86, 2, '2023-06-20 12:34:36', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(87, 2, '2023-06-20 12:35:34', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(88, 2, '2023-06-20 12:36:49', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(89, 2, '2023-06-20 12:37:06', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(90, 2, '2023-06-20 12:37:36', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(91, 2, '2023-06-20 12:37:52', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(92, 2, '2023-06-20 12:38:17', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(93, 2, '2023-06-20 12:38:53', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(94, 2, '2023-06-20 12:40:12', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(95, 2, '2023-06-20 12:40:49', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(96, 2, '2023-06-20 12:41:54', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(97, 2, '2023-06-20 12:42:33', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(98, 2, '2023-06-20 12:43:56', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(99, 2, '2023-06-20 12:44:18', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(100, 2, '2023-06-20 12:45:27', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(101, 2, '2023-06-20 12:45:42', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(102, 2, '2023-06-20 12:47:00', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(103, 2, '2023-06-20 12:47:56', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(104, 2, '2023-06-20 12:48:20', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(105, 2, '2023-06-20 12:48:35', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(106, 2, '2023-06-20 12:48:54', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(107, 2, '2023-06-20 12:49:17', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, $pn-1012..jpg, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, $pn-1012..jpg, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(108, 2, '2023-06-20 12:49:45', 11, 'products', 'jhsdfb, PN-1011, 66.00, 8.00, 1, pn-1011.png, hbjhbhbj, 1, ughbjhbj, 1', 'jhsdfb, PN-1011, 66.00, 8.00, 1, pn-1011.png, hbjhbhbj, 1, ughbjhbj, 1', 1, 'Edycja produktu'),
(109, 2, '2023-06-20 12:50:35', 11, 'products', 'jhsdfb, PN-1011, 66.00, 8.00, 1, pn-1011..jpg, hbjhbhbj, 1, ughbjhbj, 1', 'jhsdfb, PN-1011, 66.00, 8.00, 1, pn-1011..jpg, hbjhbhbj, 1, ughbjhbj, 1', 1, 'Edycja produktu'),
(110, 2, '2023-06-20 12:50:45', 10, 'products', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.jpg, bhjbhjbjh, 1, hjbhjb, 1', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.jpg, bhjbhjbjh, 1, hjbhjb, 1', 1, 'Edycja produktu'),
(111, 2, '2023-06-20 12:51:07', 10, 'products', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.jpg, bhjbhjbjh, 1, hjbhjb, 1', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.jpg, bhjbhjbjh, 1, hjbhjb, 1', 1, 'Edycja produktu'),
(112, 2, '2023-06-20 12:51:32', 10, 'products', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.png, bhjbhjbjh, 1, hjbhjb, 1', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.png, bhjbhjbjh, 1, hjbhjb, 1', 1, 'Edycja produktu'),
(113, 2, '2023-06-20 12:52:45', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 4', 1, 'Edycja produktu'),
(114, 2, '2023-06-20 12:53:19', 16, 'products', 'NULL', 'jkbsdfbj, pn-1016, 87, 898, 1, pn-1016.jpg, kjjkn, 1, jkjbkjk, 1', 2, 'Dodano produkt'),
(115, 2, '2023-06-20 12:53:53', 16, 'products', 'jkbsdfbj, pn-1016, 87.00, 898.00, 1, pn-1016.jpg, kjjkn, 1, jkjbkjk, 1', 'jkbsdfbj, pn-1016, 87.00, 898.00, 1, pn-1016.jpg, kjjkn, 1, jkjbkjk, 1', 1, 'Edycja produktu'),
(116, 2, '2023-06-20 13:12:59', 20, 'products', 'NULL', 'fast, pn-1020, 99, 99, 1, pn-1020., kbjbj, 1, kbjjk, 1', 2, 'Dodano produkt'),
(117, 2, '2023-06-20 13:14:09', 21, 'products', 'NULL', 'ads, pn-1021, 88, 88, 1, pn-1021., bhp, 1, bjh, 1', 2, 'Dodano produkt'),
(118, 2, '2023-06-20 13:15:15', 21, 'products', 'ads, pn-1021, 88.00, 88.00, 1, , bhp, 1, bjh, 1', 'ads, pn-1021, 88.00, 88.00, 1, , bhp, 1, bjh, 1', 1, 'Edycja produktu'),
(119, 2, '2023-06-20 13:16:44', 21, 'products', 'ads, pn-1021, 88.00, 88.00, 1, .jpg, bhp, 1, bjh, 1', 'ads, pn-1021, 88.00, 88.00, 1, .jpg, bhp, 1, bjh, 1', 1, 'Edycja produktu'),
(120, 2, '2023-06-20 13:16:57', 22, 'products', 'NULL', 'sfd, pn-1022, 77, 77, 1, pn-1022., jbh, 1, bhj, 1', 2, 'Dodano produkt'),
(121, 2, '2023-06-20 13:17:03', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, , jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, , jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(122, 2, '2023-06-20 13:17:25', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(123, 2, '2023-06-20 13:17:31', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(124, 2, '2023-06-20 13:17:38', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(125, 2, '2023-06-20 13:17:49', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, .jpg, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, .jpg, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(126, 2, '2023-06-20 13:18:16', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, .jpg, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, .jpg, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(127, 2, '2023-06-20 13:18:50', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(128, 2, '2023-06-20 13:19:29', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, .png, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, .png, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(129, 2, '2023-06-20 13:19:48', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.jpg, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.jpg, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(130, 2, '2023-06-20 13:20:01', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.png, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.png, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(131, 2, '2023-06-20 13:21:20', 23, 'products', 'NULL', 'dsfas, pn-1023, 99, 789, 1, pn-1023., bhjbhj, 1, bjbh, 1', 2, 'Dodano produkt'),
(132, 2, '2023-06-20 13:25:43', 23, 'products', 'dsfas, pn-1023, 99.00, 789.00, 1, , bhjbhj, 1, bjbh, 1', 'dsfas, pn-1023, 99.00, 789.00, 1, , bhjbhj, 1, bjbh, 1', 1, 'Edycja produktu'),
(133, 2, '2023-06-20 13:27:18', 23, 'products', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 1, 'Edycja produktu'),
(134, 2, '2023-06-20 13:27:25', 23, 'products', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 1, 'Edycja produktu'),
(135, 2, '2023-06-20 13:27:29', 23, 'products', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023.jpg, bhjbhj, 1, bjbh, 1', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023.jpg, bhjbhj, 1, bjbh, 1', 1, 'Edycja produktu'),
(136, 2, '2023-06-20 13:27:38', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.sql, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.sql, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(137, 2, '2023-06-20 13:39:45', 24, 'products', 'NULL', 'dsfasgdfsgsdfh, pn-1024, 66, 66, 1, pn-1024., bbbhj, 1, hjbh, 1', 2, 'Dodano produkt'),
(138, 2, '2023-06-20 13:39:56', 24, 'products', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, , bbbhj, 1, hjbh, 1', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, , bbbhj, 1, hjbh, 1', 1, 'Edycja produktu'),
(139, 2, '2023-06-20 13:43:30', 24, 'products', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 1, 'Edycja produktu'),
(140, 2, '2023-06-20 13:44:29', 24, 'products', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 1, 'Edycja produktu'),
(141, 2, '2023-06-20 13:53:22', 25, 'products', 'NULL', 'hgj, pn-1025, 788, 9999, 1, pn-1025., hjbhj, 1, bhbhj, 1', 2, 'Dodano produkt'),
(142, 2, '2023-06-20 13:53:28', 25, 'products', 'hgj, pn-1025, 788.00, 9999.00, 1, , hjbhj, 1, bhbhj, 1', 'hgj, pn-1025, 788.00, 9999.00, 1, , hjbhj, 1, bhbhj, 1', 1, 'Edycja produktu'),
(143, 2, '2023-06-20 13:55:40', 26, 'products', 'NULL', 'ghvjb, pn-1026, 65789, 56789, 1, pn-1026., hbjbhj, 1, jbhbhj, 1', 2, 'Dodano produkt'),
(144, 2, '2023-06-20 13:59:15', 26, 'products', 'ghvjb, pn-1026, 65789.00, 56789.00, 1, , hbjbhj, 1, jbhbhj, 1', 'ghvjb, pn-1026, 65789.00, 56789.00, 1, , hbjbhj, 1, jbhbhj, 1', 1, 'Edycja produktu'),
(145, 2, '2023-06-20 14:00:14', 27, 'products', 'NULL', 'fadsfsdfadsgfdsgsd, pn-1027, 56565, 76556, 1, pn-1027., bjhbj, 1, bjhhbj, 1', 2, 'Dodano produkt'),
(146, 2, '2023-06-20 14:00:20', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(147, 2, '2023-06-20 14:00:25', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(148, 2, '2023-06-20 14:02:12', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(149, 2, '2023-06-20 14:04:04', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(150, 2, '2023-06-20 14:04:26', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(151, 2, '2023-06-20 14:05:34', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.jpg, bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.jpg, bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(152, 2, '2023-06-20 14:05:44', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.jpg, bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.jpg, bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(153, 2, '2023-06-20 14:05:56', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.png, bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.png, bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(154, 2, '2023-06-20 14:12:17', 28, 'products', 'NULL', 'fdsgafsdasg, pn-1028, 789, 6789, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 2, 'Dodano produkt'),
(155, 2, '2023-06-20 14:12:23', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(156, 2, '2023-06-20 14:14:00', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(157, 2, '2023-06-20 14:14:04', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(158, 2, '2023-06-20 14:14:12', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(159, 2, '2023-06-20 14:14:18', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(160, 2, '2023-06-20 14:15:16', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(161, 2, '2023-06-20 14:15:23', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(162, 2, '2023-06-20 14:15:27', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(163, 2, '2023-06-20 14:15:47', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(164, 2, '2023-06-20 14:15:59', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.jpg, jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.jpg, jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(165, 2, '2023-06-20 14:16:34', 29, 'products', 'NULL', 'asdfsadf, pn-1029, 6789, 999, 1, pn-1029.jpg, bhjbh, 1, bjbhj, 1', 2, 'Dodano produkt'),
(166, 2, '2023-06-20 14:50:52', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 1, 'Edycja produktu'),
(167, 2, '2023-06-20 14:50:59', 1, 'products', 'Etui różowe na iPhone 14 Plus, PN-1001, 17.97, 34.99, 8, pn-1001.png, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 'Etui różowe na iPhone 14 Plus, PN-1001, 17.97, 34.99, 8, pn-1001.png, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 1, 'Edycja produktu'),
(168, 2, '2023-06-20 14:51:04', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, pn-1004.png, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, pn-1004.png, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(169, 2, '2023-06-20 14:51:09', 6, 'products', 'esa, PN-1006, 12.00, 68.00, 1, pn-1006.png, esa, 3, esa, 1', 'esa, PN-1006, 12.00, 68.00, 1, pn-1006.png, esa, 3, esa, 1', 1, 'Edycja produktu'),
(170, 2, '2023-06-20 14:51:13', 7, 'products', 'xdd, PN-1007, 31.00, 67.00, 1, pn-1007, asd, 1, asd, 1', 'xdd, PN-1007, 31.00, 67.00, 1, pn-1007, asd, 1, asd, 1', 1, 'Edycja produktu'),
(171, 2, '2023-06-20 14:51:17', 8, 'products', 'das, PN-1008, 56.00, 88.00, 1, pn-1008, hhjhj, 1, hvgbh, 1', 'das, PN-1008, 56.00, 88.00, 1, pn-1008, hhjhj, 1, hvgbh, 1', 1, 'Edycja produktu'),
(172, 2, '2023-06-20 14:51:22', 9, 'products', 'bjksadjn, PN-1009, 77.00, 77.00, 1, pn-1009jpg, bhbh, 1, hgvjbh, 1', 'bjksadjn, PN-1009, 77.00, 77.00, 1, pn-1009jpg, bhbh, 1, hgvjbh, 1', 1, 'Edycja produktu'),
(173, 2, '2023-06-20 14:51:31', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, $pn-1012...jpg, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, $pn-1012...jpg, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(174, 2, '2023-06-20 14:51:37', 13, 'products', 'adsfasd, PN-1013, 567.00, 879.00, 1, Uzupełniany automatycznie.png, fsdaf, 1, dasd, 1', 'adsfasd, PN-1013, 567.00, 879.00, 1, Uzupełniany automatycznie.png, fsdaf, 1, dasd, 1', 1, 'Edycja produktu'),
(175, 2, '2023-06-20 14:51:43', 17, 'products', 'fsdf, pn-1017, 78.00, 78.00, 1, pn-1017., jbbj, 1, bjbj, 1', 'fsdf, pn-1017, 78.00, 78.00, 1, pn-1017., jbbj, 1, bjbj, 1', 1, 'Edycja produktu'),
(176, 2, '2023-06-20 14:51:48', 18, 'products', 'fads, pn-1018, 99.00, 99.00, 1, pn-1018., bhhb, 1, bhb, 1', 'fads, pn-1018, 99.00, 99.00, 1, pn-1018., bhhb, 1, bhb, 1', 1, 'Edycja produktu'),
(177, 2, '2023-06-20 14:51:54', 19, 'products', 'deaf, pn-1019, 99.00, 78.00, 1, pn-1019., bjhb, 1, bjhbh, 1', 'deaf, pn-1019, 99.00, 78.00, 1, pn-1019., bjhb, 1, bjhbh, 1', 1, 'Edycja produktu'),
(178, 2, '2023-06-20 14:52:02', 13, 'products', 'adsfasd, PN-1013, 567.00, 879.00, 1, PN-1013.jpg, fsdaf, 1, dasd, 1', 'adsfasd, PN-1013, 567.00, 879.00, 1, PN-1013.jpg, fsdaf, 1, dasd, 1', 1, 'Edycja produktu'),
(179, 2, '2023-06-20 14:52:13', 20, 'products', 'fast, pn-1020, 99.00, 99.00, 1, NULL, kbjbj, 1, kbjjk, 1', 'fast, pn-1020, 99.00, 99.00, 1, NULL, kbjbj, 1, kbjjk, 1', 1, 'Edycja produktu'),
(180, 2, '2023-06-20 14:52:22', 21, 'products', 'ads, pn-1021, 88.00, 88.00, 1, .jpg, bhp, 1, bjh, 1', 'ads, pn-1021, 88.00, 88.00, 1, .jpg, bhp, 1, bjh, 1', 1, 'Edycja produktu'),
(181, 2, '2023-06-20 14:52:31', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.sql, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.sql, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(182, 2, '2023-06-20 14:52:38', 23, 'products', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 1, 'Edycja produktu'),
(183, 2, '2023-06-20 14:52:45', 24, 'products', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 1, 'Edycja produktu'),
(184, 2, '2023-06-20 14:52:52', 25, 'products', 'hgj, pn-1025, 788.00, 9999.00, 1, pn-1025., hjbhj, 1, bhbhj, 1', 'hgj, pn-1025, 788.00, 9999.00, 1, pn-1025., hjbhj, 1, bhbhj, 1', 1, 'Edycja produktu'),
(185, 2, '2023-06-20 14:52:59', 26, 'products', 'ghvjb, pn-1026, 65789.00, 56789.00, 1, pn-1026., hbjbhj, 1, jbhbhj, 1', 'ghvjb, pn-1026, 65789.00, 56789.00, 1, pn-1026., hbjbhj, 1, jbhbhj, 1', 1, 'Edycja produktu'),
(186, 2, '2023-06-20 14:53:05', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(187, 2, '2023-06-20 14:54:03', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, PN-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, PN-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(188, 2, '2023-06-20 14:54:07', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, PN-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, PN-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(189, 2, '2023-06-20 14:54:12', 6, 'products', 'esa, PN-1006, 12.00, 68.00, 1, PN-1006.jpg, esa, 3, esa, 1', 'esa, PN-1006, 12.00, 68.00, 1, PN-1006.jpg, esa, 3, esa, 1', 1, 'Edycja produktu'),
(190, 2, '2023-06-20 14:54:17', 9, 'products', 'bjksadjn, PN-1009, 77.00, 77.00, 1, PN-1009.jpg, bhbh, 1, hgvjbh, 1', 'bjksadjn, PN-1009, 77.00, 77.00, 1, PN-1009.jpg, bhbh, 1, hgvjbh, 1', 1, 'Edycja produktu'),
(191, 2, '2023-06-20 14:54:22', 13, 'products', 'adsfasd, PN-1013, 567.00, 879.00, 1, PN-1013.jpg, fsdaf, 1, dasd, 1', 'adsfasd, PN-1013, 567.00, 879.00, 1, PN-1013.jpg, fsdaf, 1, dasd, 1', 1, 'Edycja produktu'),
(192, 2, '2023-06-20 14:54:30', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, PN-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, PN-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(193, 2, '2023-06-20 14:57:34', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 1, 'Edycja produktu'),
(194, 2, '2023-06-20 14:57:42', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 1, 'Edycja produktu'),
(195, 2, '2023-06-20 14:57:48', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(196, 2, '2023-06-20 14:57:54', 5, 'products', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(197, 2, '2023-06-20 14:58:10', 3, 'products', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 1, 'Edycja produktu'),
(198, 1, '2023-06-22 08:34:44', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasd, 1', 1, 'Edycja produktu'),
(199, 1, '2023-06-22 08:36:32', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(200, 1, '2023-06-22 08:36:35', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(201, 1, '2023-06-22 08:36:37', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(202, 1, '2023-06-24 12:18:02', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu');
INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES
(203, 1, '2023-06-24 13:57:16', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(204, 1, '2023-06-24 13:57:40', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.JPG, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.JPG, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(205, 1, '2023-06-24 14:03:02', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(206, 1, '2023-06-24 14:03:16', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(207, 1, '2023-06-24 14:03:31', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.JPG, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.JPG, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(208, 1, '2023-06-24 14:03:48', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(209, 1, '2023-06-24 14:03:57', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(210, 1, '2023-06-24 14:04:40', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 1, 'Edycja produktu'),
(211, 1, '2023-06-24 14:05:03', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(212, 1, '2023-06-24 14:05:18', 5, 'products', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(213, 1, '2023-06-24 14:05:29', 5, 'products', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(214, 1, '2023-06-24 14:05:46', 5, 'products', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(215, 1, '2023-06-24 14:05:58', 5, 'products', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(216, 1, '2023-06-24 14:06:51', 5, 'products', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.JPG, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.JPG, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(217, 1, '2023-06-24 14:07:04', 5, 'products', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(218, 1, '2023-06-24 14:07:18', 5, 'products', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpeg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpeg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(219, 1, '2023-06-24 14:07:37', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(220, 1, '2023-06-24 14:07:44', 3, 'products', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 1, 'Edycja produktu'),
(221, 1, '2023-06-24 14:07:54', 3, 'products', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 1, 'Edycja produktu'),
(222, 1, '2023-06-24 14:08:10', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.JPG, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.JPG, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 1, 'Edycja produktu'),
(223, 1, '2023-06-24 14:08:16', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.png, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.png, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 1, 'Edycja produktu'),
(224, 1, '2023-06-24 14:08:23', 3, 'products', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 1, 'Edycja produktu'),
(225, 1, '2023-06-24 14:08:30', 3, 'products', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.JPG, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.JPG, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 1, 'Edycja produktu'),
(226, 1, '2023-06-24 17:59:54', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(227, 1, '2023-06-24 18:01:09', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(228, 1, '2023-06-24 18:01:31', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(229, 1, '2023-06-24 18:01:38', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(230, 1, '2023-06-24 18:01:52', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(231, 1, '2023-06-24 18:02:43', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(232, 1, '2023-06-24 18:19:43', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(233, 1, '2023-06-24 18:19:50', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(234, 1, '2023-06-24 18:20:11', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 1, 'Edycja produktu'),
(235, 1, '2023-06-24 18:20:21', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdasd, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 1', 1, 'Edycja produktu'),
(236, 1, '2023-06-24 18:20:29', 3, 'products', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, , https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XDXD, 2', 1, 'Edycja produktu'),
(237, 1, '2023-06-24 18:23:50', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, , https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 1', 1, 'Edycja produktu'),
(238, 1, '2023-06-24 18:23:55', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 1', 1, 'Edycja produktu'),
(239, 1, '2023-06-24 18:23:57', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 1', 1, 'Edycja produktu'),
(240, 1, '2023-06-24 18:24:12', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 2', 1, 'Edycja produktu'),
(241, 1, '2023-06-24 18:24:17', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 2', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 3', 1, 'Edycja produktu'),
(242, 1, '2023-06-24 18:24:22', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 0, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 3', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 0, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 4', 1, 'Edycja produktu'),
(243, 1, '2023-06-24 18:24:37', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 0, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 4', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 4', 1, 'Edycja produktu'),
(244, 1, '2023-06-24 18:24:43', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 0, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 4', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, jołasdas, 1', 1, 'Edycja produktu'),
(245, 1, '2023-06-24 18:25:02', 3, 'products', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, , https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XDXD, 2', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, , https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XDXD, 2', 1, 'Edycja produktu'),
(246, 1, '2023-06-24 18:28:09', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.JPG, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.JPG, https://www.aliexpress.us/item/3256805477811430.html, 5, , 1', 1, 'Edycja produktu'),
(247, 1, '2023-06-24 18:31:02', 30, 'products', 'NULL', 'Szkło hartowane GOPRO HERO 10, pn-1006, 5,96, 12,99, 2, pn-1006.jpg, https://pl.aliexpress.com/item/1005004837715913.html, 2, Takie fajne szkiełka w 3 paku (obiektyw, główny wyświetlacz, drugi wyświetlacz), 1', 2, 'Dodano produkt'),
(248, 1, '2023-06-24 18:31:45', 30, 'products', 'Szkło hartowane GOPRO HERO 10, pn-1006, 5.00, 12.00, 2, pn-1006.jpg, https://pl.aliexpress.com/item/1005004837715913.html, 2, Takie fajne szkiełka w 3 paku (obiektyw, główny wyświetlacz, drugi wyświetlacz), 1', 'Szkło hartowane GOPRO HERO 10, pn-1006, 5.97, 12.99, 2, pn-1006.jpg, https://pl.aliexpress.com/item/1005004837715913.html, 2, Takie fajne szkiełka w 3 paku (obiektyw, główny wyświetlacz, drugi wyświetlacz), 1', 1, 'Edycja produktu'),
(249, 1, '2023-06-24 18:37:09', 30, 'products', 'Szkło hartowane GOPRO HERO 10, pn-1006, 5.97, 12.99, 2, pn-1006.jpg, https://pl.aliexpress.com/item/1005004837715913.html, 2, Takie fajne szkiełka w 3 paku (obiektyw, główny wyświetlacz, drugi wyświetlacz), 1', 'Szkło hartowane GOPRO HERO 10, pn-1006, 5.97, 12.99, 2, pn-1006.jpg, https://pl.aliexpress.com/item/1005004837715913.html, 2, Takie fajne szkiełka w 3 paku (obiektyw, główny wyświetlacz, drugi wyświetlacz), 1', 1, 'Edycja produktu'),
(250, 1, '2023-06-24 18:38:05', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.JPG, https://www.aliexpress.us/item/3256805477811430.html, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.JPG, https://www.aliexpress.us/item/3256805477811430.html, 5, , 1', 1, 'Edycja produktu'),
(251, 1, '2023-06-24 18:38:14', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html, 5, , 1', 1, 'Edycja produktu'),
(252, 1, '2023-06-24 21:11:41', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.png, https://www.aliexpress.us/item/3256805477811430.html, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.png, https://www.aliexpress.us/item/3256805477811430.html, 5, , 1', 1, 'Edycja produktu'),
(253, 1, '2023-06-24 21:13:03', 3, 'products', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XDXD, 2', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XDXD, 2', 1, 'Edycja produktu'),
(254, 1, '2023-06-24 21:13:57', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.png, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.png, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(255, 1, '2023-06-24 21:14:36', 5, 'products', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(256, 1, '2023-06-24 21:28:00', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(257, 1, '2023-06-26 07:39:23', 8, 'user_status', 'NULL', '8, Kakor, 1', 2, 'Dodano status użytkownika'),
(258, 1, '2023-06-26 07:39:36', 8, 'user_status', '8, Kakor, 1', '', 3, 'Usunięto status użytkownika'),
(259, 1, '2023-06-28 12:23:29', 1, 'products', 'Name: Etui różowe na iPhone 14 Plus, SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://www.aliexpress.us/item/3256805477811430.html, olx: https://olx.pl, allegro: https://allegro.pl, ID kategorii: 5, Opis: , ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://allegro.pl, olx: , allegro: , ID kategorii: 5, Opis: , ID statusu: 1', 1, 'Edycja produktu'),
(260, 1, '2023-06-28 12:26:19', 1, 'products', 'Name: Etui różowe na iPhone 14 Plus, SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://allegro.pl, olx: , allegro: , ID kategorii: 5, Opis: , ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://www.aliexpress.us/item/3256805477811430.html, olx: olx, allegro: allegro, ID kategorii: 5, Opis: , ID statusu: 1', 1, 'Edycja produktu'),
(261, 1, '2023-06-28 12:27:24', 1, 'products', 'Name: Etui różowe na iPhone 14 Plus, SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://www.aliexpress.us/item/3256805477811430.html, olx: olx, allegro: allegro, ID kategorii: 5, Opis: , ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://www.aliexpress.us/item/3256805477811430.html, olx: https://olx.pl, allegro: allegro, ID kategorii: 5, Opis: , ID statusu: 1', 1, 'Edycja produktu'),
(262, 1, '2023-06-28 12:30:26', 1, 'products', '<span class=&quot;text-xl&quot;>Name:</span> Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://www.aliexpress.us/item/3256805477811430.html, olx: https://olx.pl, allegro: https://allegro.pl, ID kategorii: 5, Opis: , ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://www.aliexpress.us/item/3256805477811430.html, olx: https://olx.pl, allegro: https://allegro.pl, ID kategorii: 5, Opis: , ID statusu: 1', 1, 'Edycja produktu'),
(263, 1, '2023-06-28 12:35:04', 1, 'products', '<span class=&quot;text-xl&quot;>Name:</span> Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://www.aliexpress.us/item/3256805477811430.html, olx: https://olx.pl, allegro: https://allegro.pl, ID kategorii: 5, Opis: , ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://www.aliexpress.us/item/3256805477811430.html, olx: https://olx.pl, allegro: https://allegro.pl/joł, ID kategorii: 5, Opis: , ID statusu: 1', 1, 'Edycja produktu'),
(264, 1, '2023-06-28 12:35:34', 1, 'products', 'Name:Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 8, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html, <br>olx: https://olx.pl, <br>allegro: https://allegro.pl/joł, <br>ID kategorii: 5, <br>Opis: , <br>ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, SKU: pn-1001, Cena zakupu: 17.97, Cena: 34.99, Ilość: 8, pn-1001.jpg, źródło: https://www.aliexpress.us/item/3256805477811430.html, olx: https://olx.pl/joł, allegro: https://allegro.pl/joł, ID kategorii: 5, Opis: , ID statusu: 1', 1, 'Edycja produktu'),
(265, 1, '2023-06-28 12:38:02', 5, 'products', 'Nazwa: Etui przezroczyste iPhone 11, <br>SKU: pn-1005, <br>Cena zakupu: 13.87, <br>Cena: 23.99, <br>Ilość: 0, <br>pn-1005.jpg, <br>źródło: https://www.aliexpress.us/item/3256804512972566.html, <br>olx: , <br>allegro: , <br>ID kategorii: 1, <br>Opis: , <br>ID statusu: 2', 'Name: Etui przezroczyste iPhone 11, <br>SKU: pn-1005, <br>Cena zakupu: 13.87, <br>Cena: 23.99, <br>Ilość: 0, <br>pn-1005.jpg, <br>źródło: https://www.aliexpress.us/item/3256804512972566.html, <br>olx: , <br>allegro: , <br>ID kategorii: 1, <br>Opis: Fajne jest chyba, <br>ID statusu: 2', 1, 'Edycja produktu'),
(266, 1, '2023-06-28 12:44:14', 1, 'products', 'Nazwa: Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 8, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html, <br>olx: https://olx.pl/joł, <br>allegro: https://allegro.pl/joł, <br>ID kategorii: 5, <br>Opis: , <br>ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 8, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html, <br>olx: https://olx.pl/joł, <br>allegro: https://allegro.pl/joł, <br>ID kategorii: 5, <br>Opis: Fajne kupił bym, <br>ID statusu: 1', 1, 'Edycja produktu'),
(267, 1, '2023-06-28 12:45:24', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, 2023-06-20 09:53:34, 1', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(268, 1, '2023-06-28 13:40:51', 31, 'products', 'NULL', 'Nazwa: Klawiatura, <br>SKU:pn-1007, <br>Cena zakupu: 12, <br>Cena: 123, <br>Ilość: 1, pn-1007., <br>Źródło: https://z_dupy, <br>ID kategorii: 4, <br>Opis: fajny jest, <br>ID statusu: 1', 2, 'Dodano produkt'),
(269, 1, '2023-06-28 17:29:06', 1, 'users', 'Gustaw, Sołdecki, gugisek@gmail.com, 1, 2023-06-15 20:55:07, 2023-06-16 06:42:19, 1', 'Gustaw, Sołdecki, gugisek@gmail.com;DROP DATABASE wszm_rgbpc;, 1, 2023-06-15 20:55:07, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(270, 1, '2023-06-28 17:29:46', 1, 'users', 'Gustaw, Sołdecki, gugisek@gmail.com;DROP DATABASE wszm_rgbpc;, 1, 2023-06-15 20:55:07, 2023-06-28 19:29:06, 1', 'Gustaw, Sołdecki, gugisek@gmail.com, 1, 2023-06-15 20:55:07, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(271, 1, '2023-06-28 17:29:58', 1, 'users', 'Gustaw, Sołdecki, gugisek@gmail.com, 1, 2023-06-15 20:55:07, 2023-06-28 19:29:46, 1', 'Gustaw;DROP DATABASE wszm_rgbpc;, Sołdecki, gugisek@gmail.com, 1, 2023-06-15 20:55:07, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(272, 1, '2023-06-28 17:30:04', 1, 'users', 'Gustaw;DROP DATABASE wszm_rgbpc;, Sołdecki, gugisek@gmail.com, 1, 2023-06-15 20:55:07, 2023-06-28 19:29:58, 1', 'Gustaw, Sołdecki, gugisek@gmail.com, 1, 2023-06-15 20:55:07, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(273, 1, '2023-06-28 17:30:28', 30, 'products', 'Nazwa: Szkło hartowane GOPRO HERO 10, <br>SKU: pn-1006, <br>Cena zakupu: 5.97, <br>Cena: 12.99, <br>Ilość: 2, <br>pn-1006.jpg, <br>źródło: https://pl.aliexpress.com/item/1005004837715913.html, <br>olx: , <br>allegro: , <br>ID kategorii: 2, <br>Opis: Takie fajne szkiełka w 3 paku (obiektyw, główny wyświetlacz, drugi wyświetlacz), <br>ID statusu: 1', 'Name: Szkło hartowane GOPRO HERO 10;DROP DATABASE wszm_rgbpc;, <br>SKU: pn-1006, <br>Cena zakupu: 5.97;DROP DATABASE wszm_rgbpc;, <br>Cena: 12.99;DROP DATABASE wszm_rgbpc;, <br>Ilość: 2, <br>pn-1006.jpg, <br>źródło: https://pl.aliexpress.com/item/1005004837715913.html, <br>olx: DROP ;DATABASE wszm_rgbpc;, <br>allegro: ;DROP DATABASE wszm_rgbpc;, <br>ID kategorii: 2, <br>Opis: Takie fajne szkiełka w 3 paku (obiektyw, główny wyświetlacz, drugi wyświetlacz);DROP DATABASE wszm_rgbpc;, <br>ID statusu: 1', 1, 'Edycja produktu'),
(274, 1, '2023-06-28 17:30:53', 32, 'products', 'NULL', 'Nazwa: ; DROP DATABASE wszm_rgbpc;, <br>SKU:pn-1008, <br>Cena zakupu: ; DROP DATABASE wszm_rgbpc;, <br>Cena: ; DROP DATABASE wszm_rgbpc;, <br>Ilość: 1, pn-1008., <br>Źródło: ; DROP DATABASE wszm_rgbpc;, <br>ID kategorii: 1, <br>Opis: ; DROP DATABASE wszm_rgbpc;, <br>ID statusu: 1', 2, 'Dodano produkt'),
(275, 1, '2023-06-28 17:31:34', 30, 'products', 'Nazwa: Szkło hartowane GOPRO HERO 10;DROP DATABASE wszm_rgbpc;, <br>SKU: pn-1006, <br>Cena zakupu: 5.97, <br>Cena: 12.99, <br>Ilość: 2, <br>pn-1006.jpg, <br>źródło: https://pl.aliexpress.com/item/1005004837715913.html, <br>olx: DROP ;DATABASE wszm_rgbpc;, <br>allegro: ;DROP DATABASE wszm_rgbpc;, <br>ID kategorii: 2, <br>Opis: Takie fajne szkiełka w 3 paku (obiektyw, główny wyświetlacz, drugi wyświetlacz);DROP DATABASE wszm_rgbpc;, <br>ID statusu: 1', 'Name: Szkło hartowane GOPRO HERO 10, <br>SKU: pn-1006, <br>Cena zakupu: 5.97, <br>Cena: 12.99, <br>Ilość: 2, <br>pn-1006.jpg, <br>źródło: https://pl.aliexpress.com/item/1005004837715913.html, <br>olx: , <br>allegro: , <br>ID kategorii: 2, <br>Opis: Takie fajne szkiełka w 3 paku (obiektyw, główny wyświetlacz, drugi wyświetlacz), <br>ID statusu: 1', 1, 'Edycja produktu'),
(276, 1, '2023-06-28 17:31:42', 1, 'users', 'Gustaw, Sołdecki, gugisek@gmail.com, 1, 2023-06-15 20:55:07, 2023-06-28 19:30:04, 1', 'Gustaw; DROP DATABASE wszm_rgbpc;, Sołdecki, gugisek@gmail.com, 1, 2023-06-15 20:55:07, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(277, 1, '2023-06-28 17:32:06', 1, 'users', 'Gustaw; DROP DATABASE wszm_rgbpc;, Sołdecki, gugisek@gmail.com, 1, 2023-06-15 20:55:07, 2023-06-28 19:31:42, 1', 'Gustaw, Sołdecki, gugisek@gmail.com, 1, 2023-06-15 20:55:07, current_timestamp(), 1', 1, 'Edytowano użytkownika');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `log_types`
--

CREATE TABLE `log_types` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `log_types`
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
  `our_olx` text DEFAULT NULL,
  `our_allegro` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `bought`, `sold`, `quantity`, `img`, `source`, `our_olx`, `our_allegro`, `category_id`, `description`, `status_id`) VALUES
(1, 'Etui różowe na iPhone 14 Plus', 'pn-1001', '17.97', '34.99', '8', 'pn-1001.jpg', 'https://www.aliexpress.us/item/3256805477811430.html', 'https://olx.pl/joł', 'https://allegro.pl/joł', 5, 'Fajne kupił bym', 1),
(2, 'Radiator M.2 SSD 5V 3PIN ARGB ', 'pn-1002', '24.59', '79.99', '15', 'pn-1002.jpg', 'https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt', NULL, NULL, 1, 'jołasdas', 1),
(3, 'Etui przezroczyste iPhone 11 slim', 'pn-1003', '8.87', '23.99', '0', 'pn-1003.jpg', 'https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK', NULL, NULL, 1, 'chińczyk XDXD', 2),
(4, 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami', 'pn-1004', '29.76', '57.99', '3', 'pn-1004.jpg', 'https://www.aliexpress.us/item/3256805424784115.html', NULL, NULL, 2, 'Pełen zestaw, wraz ze specjalnymi prowadnicami', 1),
(5, 'Etui przezroczyste iPhone 11', 'pn-1005', '13.87', '23.99', '0', 'pn-1005.jpg', 'https://www.aliexpress.us/item/3256804512972566.html', '', '', 1, 'Fajne jest chyba', 2),
(30, 'Szkło hartowane GOPRO HERO 10', 'pn-1006', '5.97', '12.99', '2', 'pn-1006.jpg', 'https://pl.aliexpress.com/item/1005004837715913.html', '', '', 2, 'Takie fajne szkiełka w 3 paku (obiektyw, główny wyświetlacz, drugi wyświetlacz)', 1),
(31, 'Klawiatura', 'pn-1007', '12.00', '123.00', '1', '', 'https://z_dupy', 'https://olx.pl', 'https://allegro.pl', 4, 'fajny jest', 1),
(32, '; DROP DATABASE wszm_rgbpc;', 'pn-1008', '0.00', '0.00', '1', '', '; DROP DATABASE wszm_rgbpc;', '; DROP DATABASE wszm_rgbpc;', '; DROP DATABASE wszm_rgbpc;', 1, '; DROP DATABASE wszm_rgbpc;', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `product_categories`
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
-- Zrzut danych tabeli `product_status`
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
-- Zrzut danych tabeli `quantity_ranges`
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
-- Zrzut danych tabeli `status_privileges`
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
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `sur_name`, `pswd`, `mail`, `role_id`, `create_date`, `update_date`, `status_id`, `description`) VALUES
(1, '58c4258120c2663e502468794f3e3aa314bf966f837200e1aa3e9c50b428f870', 'Gustaw', 'Sołdecki', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'gugisek@gmail.com', 1, '2023-06-15 20:55:07', '2023-06-28 17:32:06', 1, 'XD'),
(2, '03f03be21462b76ccb5fb7e5319ef1e6f44ac328cf1750b581fcb7710aec3d8a', 'Jakub', 'Strzelczak', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'kubastrzelczak@gmail.com', 1, '2023-06-15 20:56:36', '2023-06-15 18:56:36', 1, NULL),
(3, 'c77f0e9e17b362249ecf5924db1d033a8e3eeb215c667dd91851d6d5a2cd26ad', 'Kacper', 'Korus', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '123kakor56@gmail.com', 1, '2023-06-15 20:56:58', '2023-06-28 12:45:24', 1, NULL),
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
-- Zrzut danych tabeli `user_roles`
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
-- Zrzut danych tabeli `user_status`
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
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `finances`
--
ALTER TABLE `finances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT dla tabeli `log_types`
--
ALTER TABLE `log_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `product_status`
--
ALTER TABLE `product_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `quantity_ranges`
--
ALTER TABLE `quantity_ranges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `status_privileges`
--
ALTER TABLE `status_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_fk0` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Ograniczenia dla tabeli `finances`
--
ALTER TABLE `finances`
  ADD CONSTRAINT `finances_fk0` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Ograniczenia dla tabeli `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `logs_fk1` FOREIGN KEY (`type`) REFERENCES `log_types` (`id`);

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`);

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_fk1` FOREIGN KEY (`status_id`) REFERENCES `product_status` (`id`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`),
  ADD CONSTRAINT `users_fk1` FOREIGN KEY (`status_id`) REFERENCES `user_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
