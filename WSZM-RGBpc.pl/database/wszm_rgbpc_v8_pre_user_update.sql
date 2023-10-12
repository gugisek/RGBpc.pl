-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 12, 2023 at 11:52 AM
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
  `quantity` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `order_id`, `quantity`) VALUES
(77, 35, 17, 5),
(78, 33, 17, 7),
(89, 2, 1, 3),
(90, 1, 1, 4),
(92, 1, 17, 9),
(98, 1, 19, 10),
(99, 2, 19, 10),
(100, 3, 19, 10),
(111, 5, 1, 1),
(112, 5, 31, 5),
(114, 1, 32, 1),
(115, 4, 32, 2),
(116, 1, 33, 3),
(117, 4, 33, 5),
(118, 2, 34, 10),
(119, 4, 34, 3),
(120, 3, 35, 10),
(121, 1, 36, 2),
(122, 2, 37, 1),
(123, 3, 38, 1),
(125, 1, 39, 1),
(126, 5, 39, 1),
(127, 2, 39, 2),
(128, 3, 39, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'red'),
(2, 'green'),
(3, 'blue'),
(4, 'gray'),
(5, 'yellow'),
(6, 'black');

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
-- Struktura tabeli dla tabeli `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `name`, `path`) VALUES
(1, 'default', 'default.png'),
(2, 'excel', 'excel.png'),
(3, 'aliexpress', 'alie.png'),
(4, 'olx', 'olx.png'),
(5, 'allegro', 'allegro_icon.png'),
(6, 'warning', 'warning.png'),
(7, 'gift', 'gift.png'),
(8, 'archive', 'archive.png'),
(9, 'clock', 'clock.png'),
(10, 'clock gray', 'clock_gray.png'),
(11, 'clock red', 'clock_red.png'),
(12, 'clock green', 'clock_green.png'),
(13, 'calculator', 'calc.png'),
(14, 'message', 'message.png'),
(15, 'message yellow', 'message_yellow.png'),
(16, 'money', 'money.png'),
(17, 'money red', 'money_red.png'),
(18, 'money green', 'money_green.png'),
(19, 'alert', 'alert.png'),
(20, 'warning yellow', 'warning_yellow.png'),
(21, 'education', 'education.png'),
(22, 'education gray', 'education_gray.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `opis` longtext DEFAULT NULL,
  `icon_id` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `nazwa`, `opis`, `icon_id`, `link`, `user_id`, `create_date`) VALUES
(1, 'Kalkulacja zarobków', 'Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.', 2, 'https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, '2023-08-04 19:12:15'),
(2, 'Dżapkowy', 'Kto gdzie i kiedy i czemu', 2, 'https://1drv.ms/x/s!AhFUBjjhPZ8_gohiiEiLCz3Hcm7wnA?e=bDpGLG', 1, '2023-07-30 10:49:02'),
(3, 'Bardzo ważna informacja dla pracowników wszystkich', 'Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.', 6, '', 1, '2023-07-31 16:50:24'),
(5, 'Nowy produkt w arkuszu', 'Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n', 22, 'https://onedrive.live.com/view.aspx?resid=3F9F3DE138065411%2127714', 1, '2023-07-31 16:49:40'),
(6, 'Ważne!!!!!!!!!', 'Tak jak w tytule', 3, 'https://ui.gugisek.pl/', 58, '2023-07-30 11:46:01'),
(7, 'que', 'que', 2, '', 58, '2023-07-30 11:47:18'),
(8, 'que', 'que', 2, '', 0, '2023-07-30 11:47:49'),
(9, 'que', 'que', 2, '', 58, '2023-07-30 11:47:57'),
(12, 'Dodawanie produktu', 'Dodaj produkt:\r\n- kliknij +\r\n- wpisz nazwę\r\n- wpisz opis\r\n- resztę sobie uzupełnij też\r\n\r\nFajny poradnik to jest,\r\nPozdrawiam', 21, '', 1, '2023-07-31 16:50:36');

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
(198, 2, '2023-06-27 14:12:17', 30, 'products', 'NULL', 'test, pn-1006, 55, 55, 1, pn-1006., ali, 1, xd, 1', 2, 'Dodano produkt'),
(199, 2, '2023-06-27 14:25:36', 31, 'products', 'NULL', 'tescik, pn-1007, 67, 77, 1, pn-1007.jpg, test, 1, test, 3', 2, 'Dodano produkt'),
(200, 2, '2023-06-27 14:28:30', 32, 'products', 'NULL', 'op, pn-1008, 66, 77, 0, pn-1008.jpg, op, 1, op, 3', 2, 'Dodano produkt'),
(201, 2, '2023-06-27 14:28:52', 33, 'products', 'NULL', 'pl, pn-1009, 99, 90, 0, pn-1009., pl, 1, pl, 3', 2, 'Dodano produkt'),
(202, 2, '2023-06-27 14:31:09', 34, 'products', 'NULL', 'ty, pn-1010, 88, 88, 1, pn-1010.jpg, ty, 1, ty, 1', 2, 'Dodano produkt'),
(203, 2, '2023-06-27 14:51:23', 35, 'products', 'NULL', 'rf, pn-1011, 55, 55, 0, pn-1011.jpg, rf, 1, rf, 3', 2, 'Dodano produkt'),
(204, 2, '2023-06-28 16:36:55', 36, 'products', 'NULL', 'td, pn-1012, 77, 77, 0, pn-1012., 6, 1, 5, 3', 2, 'Dodano produkt'),
(205, 2, '2023-06-28 16:38:55', 37, 'products', 'NULL', 'oil, pn-1013, 99, 99, 0, pn-1013., 99, 1, 99, 3', 2, 'Dodano produkt'),
(206, 2, '2023-06-28 16:52:06', 38, 'products', 'NULL', 'ftgyhb, pn-1014, 99, 99, 0, pn-1014., 99, 1, 99, 3', 2, 'Dodano produkt'),
(207, 2, '2023-06-28 16:56:42', 39, 'products', 'NULL', 'fcghvbjug, pn-1015, 77, 77, 0, pn-1015., ty, 1, ty, 3', 2, 'Dodano produkt');
INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES
(208, 2, '2023-07-01 12:10:13', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 0, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 0, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 2', 1, 'Edycja produktu'),
(209, 2, '2023-07-01 12:10:19', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 2', 1, 'Edycja produktu'),
(210, 2, '2023-07-01 16:34:00', 40, 'products', 'NULL', 'Nazwa: Dobry, <br>SKU:pn-1016, <br>Cena zakupu: 14.00, <br>Cena: 19.50, <br>Ilość: 1, pn-1016., <br>Źródło: fghj, <br>ID kategorii: 1, <br>Opis: fghj, <br>ID statusu: 1', 2, 'Dodano produkt'),
(211, 2, '2023-07-01 16:34:13', 40, 'products', 'Nazwa: Dobry, <br>SKU: pn-1016, <br>Cena zakupu: 14.00, <br>Cena: 19.50, <br>Ilość: 1, <br>, <br>źródło: fghj, <br>olx: ghkj, <br>allegro: gjhk, <br>ID kategorii: 1, <br>Opis: fghj, <br>ID statusu: 1', 'Name: Dobry, <br>SKU: pn-1016, <br>Cena zakupu: 14.00, <br>Cena: 19.50, <br>Ilość: 1, <br>, <br>źródło: fghj, <br>olx: ghkj, <br>allegro: gjhk, <br>ID kategorii: 1, <br>Opis: fghj, <br>ID statusu: 1', 1, 'Edycja produktu'),
(212, 1, '2023-07-01 16:45:30', 3, 'products', 'Nazwa: Etui przezroczyste iPhone 11 slim, <br>SKU: pn-1003, <br>Cena zakupu: 8.87, <br>Cena: 23.99, <br>Ilość: 10, <br>pn-1003.png, <br>źródło: https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, <br>olx: , <br>allegro: , <br>ID kategorii: 1, <br>Opis: chińczyk XD, <br>ID statusu: 1', 'Name: Etui przezroczyste iPhone 11 slim, <br>SKU: pn-1003, <br>Cena zakupu: 8.87, <br>Cena: 23.99, <br>Ilość: 10, <br>pn-1003.png, <br>źródło: https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, <br>olx: , <br>allegro: , <br>ID kategorii: 1, <br>Opis: chińczyk XD, <br>ID statusu: 1', 1, 'Edycja produktu'),
(213, 1, '2023-07-03 08:47:47', 4, 'products', 'Nazwa: Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, <br>SKU: pn-1004, <br>Cena zakupu: 29.76, <br>Cena: 57.99, <br>Ilość: 3, <br>pn-1004.jpg, <br>źródło: https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, <br>olx: , <br>allegro: , <br>ID kategorii: 2, <br>Opis: Pełen zestaw, wraz ze specjalnymi prowadnicami, <br>ID statusu: 1', 'Name: Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, <br>SKU: pn-1004, <br>Cena zakupu: 29.76, <br>Cena: 57.99, <br>Ilość: 3, <br>pn-1004.jpg, <br>źródło: https://www.aliexpress.us/item/3256805424784115.html, <br>olx: , <br>allegro: , <br>ID kategorii: 2, <br>Opis: Pełen zestaw, wraz ze specjalnymi prowadnicami, <br>ID statusu: 1', 1, 'Edycja produktu'),
(214, 1, '2023-07-03 08:52:24', 41, 'products', 'NULL', 'Nazwa: asd, <br>SKU:pn-1017, <br>Cena zakupu: asd, <br>Cena: asd, <br>Ilość: 0, pn-1017., <br>Źródło: asd, <br>ID kategorii: 1, <br>Opis: asd, <br>ID statusu: 3', 2, 'Dodano produkt'),
(215, 1, '2023-07-17 12:23:34', 1, 'products', 'Nazwa: Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 9, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, <br>olx: , <br>allegro: , <br>ID kategorii: 5, <br>Opis: , <br>ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 10, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, <br>olx: , <br>allegro: , <br>ID kategorii: 5, <br>Opis: , <br>ID statusu: 1', 1, 'Edycja produktu'),
(216, 1, '2023-07-17 12:24:11', 1, 'products', 'Nazwa: Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 10, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, <br>olx: , <br>allegro: , <br>ID kategorii: 5, <br>Opis: , <br>ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 10, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html, <br>olx: , <br>allegro: , <br>ID kategorii: 5, <br>Opis: , <br>ID statusu: 1', 1, 'Edycja produktu'),
(217, 1, '2023-07-30 08:13:18', 1, 'links', 'id: <br>nazwa: <br>opis: <br>icon_id: <br>link: ', 'id: 1<br>nazwa: <br>opis: <br>icon_id: <br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 2, 'Edytowano link'),
(218, 1, '2023-07-30 08:15:02', 1, 'links', 'id: 1<br>nazwa: <br>opis: <br>icon_id: 0<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: <br>opis: <br>icon_id: <br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 2, 'Edytowano link'),
(219, 1, '2023-07-30 08:15:24', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 2, 'Edytowano link'),
(220, 1, '2023-07-30 08:16:08', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(221, 1, '2023-07-30 08:17:37', 2, 'links', 'id: 2<br>nazwa: Dżapkowy<br>opis: Kto gdzie i kiedy<br>icon_id: 1<br>link: https://1drv.ms/x/s!AhFUBjjhPZ8_gohiiEiLCz3Hcm7wnA?e=bDpGLG', 'id: 2<br>nazwa: Dżapkowy<br>opis: Kto gdzie i kiedy i czemu<br>icon_id: 1<br>link: https://1drv.ms/x/s!AhFUBjjhPZ8_gohiiEiLCz3Hcm7wnA?e=bDpGLG', 1, 'Edytowano link'),
(222, 1, '2023-07-30 08:20:04', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(223, 1, '2023-07-30 08:20:41', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(224, 1, '2023-07-30 08:25:01', 4, 'user_status', '4, zbanowane, 2', '4, zbanowane, 1', 1, 'Zmodfikowano status użytkownika'),
(225, 1, '2023-07-30 08:25:17', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-06-20 10:41:11, 2', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 3', 1, 'Edytowano użytkownika'),
(226, 1, '2023-07-30 08:26:16', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-07-30 10:25:17, 3', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 2', 1, 'Edytowano użytkownika'),
(227, 1, '2023-07-30 08:27:53', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-07-30 10:26:16, 2', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 3', 1, 'Edytowano użytkownika'),
(228, 1, '2023-07-30 08:40:16', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(229, 1, '2023-07-30 08:48:45', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 1<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(230, 1, '2023-07-30 08:48:56', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 1<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(231, 1, '2023-07-30 08:49:02', 2, 'links', 'id: 2<br>nazwa: Dżapkowy<br>opis: Kto gdzie i kiedy i czemu<br>icon_id: 1<br>link: https://1drv.ms/x/s!AhFUBjjhPZ8_gohiiEiLCz3Hcm7wnA?e=bDpGLG', 'id: 2<br>nazwa: Dżapkowy<br>opis: Kto gdzie i kiedy i czemu<br>icon_id: 2<br>link: https://1drv.ms/x/s!AhFUBjjhPZ8_gohiiEiLCz3Hcm7wnA?e=bDpGLG', 1, 'Edytowano link'),
(232, 1, '2023-07-30 08:49:12', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 3<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 1<br>link: ', 1, 'Edytowano link'),
(233, 1, '2023-07-30 08:49:24', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 3<br>link: ', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 1<br>link: ', 1, 'Edytowano link'),
(234, 1, '2023-07-30 09:46:01', 6, 'links', 'NULL', 'id: 6<br>nazwa: Ważne!!!!!!!!!<br>opis: Tak jak w tytule<br>icon_id: 3<br>link: https://ui.gugisek.pl/', 2, 'Dodano link'),
(235, 1, '2023-07-30 09:47:18', 7, 'links', 'NULL', 'id: 7<br>nazwa: que<br>opis: que<br>icon_id: 2<br>link: ', 2, 'Dodano link'),
(236, 1, '2023-07-30 09:47:49', 8, 'links', 'NULL', 'id: 8<br>nazwa: que<br>opis: que<br>icon_id: 2<br>link: ', 2, 'Dodano link'),
(237, 1, '2023-07-30 09:47:57', 9, 'links', 'NULL', 'id: 9<br>nazwa: que<br>opis: que<br>icon_id: 2<br>link: ', 2, 'Dodano link'),
(238, 1, '2023-07-30 09:53:01', 10, 'links', 'NULL', 'id: 10<br>nazwa: es<br>opis: como<br>icon_id: 1<br>link: es', 2, 'Dodano link'),
(239, 1, '2023-07-30 09:55:46', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 1<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(240, 1, '2023-07-30 09:55:56', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 1<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(241, 1, '2023-07-31 12:26:55', 10, 'links', 'id: 10<br>nazwa: es<br>opis: como<br>icon_id: 1<br>link: es', 'NULL', 3, 'Usunięto link'),
(242, 1, '2023-07-31 12:44:12', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 1<br>link: ', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 3<br>link: ', 1, 'Edytowano link'),
(243, 1, '2023-07-31 12:45:21', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 3<br>link: ', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 3<br>link: https://youtube.com/', 1, 'Edytowano link'),
(244, 1, '2023-07-31 12:47:22', 11, 'links', 'NULL', 'id: 11<br>nazwa: Hej<br>opis: No hej<br>icon_id: 1<br>link: ', 2, 'Dodano link'),
(245, 1, '2023-07-31 12:57:41', 11, 'links', 'id: 11<br>nazwa: Hej<br>opis: No hej<br>icon_id: 1<br>link: ', 'NULL', 3, 'Usunięto link'),
(246, 1, '2023-07-31 13:22:51', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 4<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(247, 1, '2023-07-31 13:25:22', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 4<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 5<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(248, 1, '2023-07-31 13:34:08', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 3<br>link: https://youtube.com/', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(249, 1, '2023-07-31 13:37:44', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 5<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 7<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(250, 1, '2023-07-31 13:39:52', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 1<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 8<br>link: ', 1, 'Edytowano link'),
(251, 1, '2023-07-31 13:43:37', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 8<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 9<br>link: ', 1, 'Edytowano link'),
(252, 1, '2023-07-31 13:43:46', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 9<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 10<br>link: ', 1, 'Edytowano link'),
(253, 1, '2023-07-31 13:43:56', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 10<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 12<br>link: ', 1, 'Edytowano link'),
(254, 1, '2023-07-31 13:44:04', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 12<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 11<br>link: ', 1, 'Edytowano link'),
(255, 1, '2023-07-31 13:45:46', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 11<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 13<br>link: ', 1, 'Edytowano link'),
(256, 1, '2023-07-31 13:58:57', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 13<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 14<br>link: ', 1, 'Edytowano link'),
(257, 1, '2023-07-31 13:59:05', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 14<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 15<br>link: ', 1, 'Edytowano link'),
(258, 1, '2023-07-31 14:01:51', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 15<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 12<br>link: ', 1, 'Edytowano link'),
(259, 1, '2023-07-31 14:04:14', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 12<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 16<br>link: ', 1, 'Edytowano link'),
(260, 1, '2023-07-31 14:04:20', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 16<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 18<br>link: ', 1, 'Edytowano link'),
(261, 1, '2023-07-31 14:04:26', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 18<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 17<br>link: ', 1, 'Edytowano link'),
(262, 1, '2023-07-31 14:21:40', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 17<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 1, 'Edytowano link'),
(263, 1, '2023-07-31 14:28:39', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> \r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 1, 'Edytowano link'),
(264, 1, '2023-07-31 14:32:51', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> \r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 1, 'Edytowano link'),
(265, 1, '2023-07-31 14:34:23', 12, 'links', 'NULL', 'id: 12<br>nazwa: Dodawanie produktu<br>opis: Dodaj produkt:\r\n- kliknij +\r\n- wpisz nazwę\r\n- wpisz opis\r\n- resztę sobie uzupełnij też\r\n\r\nFajny poradnik to jest,\r\nPozdrawiam<br>icon_id: 8<br>link: ', 2, 'Dodano link'),
(266, 1, '2023-07-31 14:36:03', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 15<br>link: ', 1, 'Edytowano link'),
(267, 1, '2023-07-31 14:37:19', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 15<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 20<br>link: ', 1, 'Edytowano link');
INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES
(268, 1, '2023-07-31 14:38:38', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\n\r\nWypełnianie arkusza rób po kolei: \r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. \r\n\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: \r\n\r\n”Lampka LED aRGB na USB”\r\n\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\n\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(269, 1, '2023-07-31 14:40:52', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\n\r\nWypełnianie arkusza rób po kolei: \r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. \r\n\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: \r\n\r\n”Lampka LED aRGB na USB”\r\n\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\n\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(270, 1, '2023-07-31 14:41:48', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(271, 1, '2023-07-31 14:42:33', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(272, 1, '2023-07-31 14:43:46', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Dodawanie nowego produktu do arkusza<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(273, 1, '2023-07-31 14:44:22', 5, 'links', 'id: 5<br>nazwa: Dodawanie nowego produktu do arkusza<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Nowy produkt w arkuszu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 8<br>link: https://youtube.com/', 1, 'Edytowano link'),
(274, 1, '2023-07-31 14:44:51', 5, 'links', 'id: 5<br>nazwa: Nowy produkt w arkuszu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 8<br>link: https://youtube.com/', 'id: 5<br>nazwa: Nowy produkt w arkuszu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 8<br>link: https://onedrive.live.com/view.aspx?resid=3F9F3DE138065411%2127714', 1, 'Edytowano link'),
(275, 1, '2023-07-31 14:46:05', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 20<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 10<br>link: ', 1, 'Edytowano link'),
(276, 1, '2023-07-31 14:49:40', 5, 'links', 'id: 5<br>nazwa: Nowy produkt w arkuszu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 8<br>link: https://onedrive.live.com/view.aspx?resid=3F9F3DE138065411%2127714', 'id: 5<br>nazwa: Nowy produkt w arkuszu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 22<br>link: https://onedrive.live.com/view.aspx?resid=3F9F3DE138065411%2127714', 1, 'Edytowano link'),
(277, 1, '2023-07-31 14:50:18', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 10<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 20<br>link: ', 1, 'Edytowano link'),
(278, 1, '2023-07-31 14:50:24', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 20<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 6<br>link: ', 1, 'Edytowano link'),
(279, 1, '2023-07-31 14:50:36', 12, 'links', 'id: 12<br>nazwa: Dodawanie produktu<br>opis: Dodaj produkt:\r\n- kliknij +\r\n- wpisz nazwę\r\n- wpisz opis\r\n- resztę sobie uzupełnij też\r\n\r\nFajny poradnik to jest,\r\nPozdrawiam<br>icon_id: 8<br>link: ', 'id: 12<br>nazwa: Dodawanie produktu<br>opis: Dodaj produkt:\r\n- kliknij +\r\n- wpisz nazwę\r\n- wpisz opis\r\n- resztę sobie uzupełnij też\r\n\r\nFajny poradnik to jest,\r\nPozdrawiam<br>icon_id: 21<br>link: ', 1, 'Edytowano link'),
(280, 1, '2023-07-31 14:50:59', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 7<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(281, 1, '2023-08-04 17:11:52', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 18<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(282, 1, '2023-08-04 17:12:15', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 18<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(283, 1, '2023-08-04 17:12:29', 13, 'links', 'NULL', 'id: 13<br>nazwa: essa<br>opis: essa<br>icon_id: 7<br>link: ', 2, 'Dodano link'),
(284, 1, '2023-08-04 17:12:46', 13, 'links', 'id: 13<br>nazwa: essa<br>opis: essa<br>icon_id: 7<br>link: ', 'NULL', 3, 'Usunięto link'),
(285, 1, '2023-09-05 07:18:29', 14, 'links', 'NULL', 'id: 14<br>nazwa: esa<br>opis: es<br>icon_id: 5<br>link: ', 2, 'Dodano link'),
(286, 1, '2023-09-05 07:18:39', 14, 'links', 'id: 14<br>nazwa: esa<br>opis: es<br>icon_id: 5<br>link: ', 'NULL', 3, 'Usunięto link'),
(287, 1, '2023-10-01 10:33:38', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-07-30 10:27:53, 3', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 2', 1, 'Edytowano użytkownika'),
(288, 1, '2023-10-01 10:33:54', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, 2023-06-20 09:53:34, 1', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, current_timestamp(), 4', 1, 'Edytowano użytkownika'),
(289, 1, '2023-10-01 11:46:45', 1, 'user_roles', '1, admin, Full privilages for all', '1, 👑admin, Full privilages for all', 1, 'Zmodfikowano rolę użytkownika'),
(290, 1, '2023-10-01 11:47:11', 1, 'user_roles', '1, 👑admin, Full privilages for all', '1, admin👑, Full privilages for all', 1, 'Zmodfikowano rolę użytkownika'),
(291, 1, '2023-10-01 11:47:25', 2, 'user_roles', '2, magazynier, Only for update products, orders', '2, magazynier📦, Only for update products, orders', 1, 'Zmodfikowano rolę użytkownika'),
(292, 1, '2023-10-10 06:42:51', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Id roli: 1<br>, Data utworzenia: 2023-06-15 20:55:07<br>, Data modyfikacji: 2023-10-10 08:42:50<br>, Id status: 1', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: <br> Email: <br> Opis: XD<br> Adres: Płochociń 16<br> Id roli: <br>, Data utworzenia: <br>, Data modyfikacji: current_timestamp(), Id status: ', 1, 'Edytowano użytkownika'),
(293, 1, '2023-10-10 06:44:45', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxdxdxd<br> Adres: Płochociń 16<br> Id roli: 1<br>, Data utworzenia: 2023-06-15 20:55:07<br>, Data modyfikacji: 2023-10-10 08:44:45<br>, Id status: 1', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: <br> Email: <br> Opis: XDxdxdxd<br> Adres: Płochociń 16<br> Id roli: <br> Data utworzenia: <br> Data modyfikacji: current_timestamp() Id status: ', 1, 'Edytowano użytkownika'),
(294, 1, '2023-10-10 07:27:01', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxdxdxd<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 08:44:45', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxdxdxd<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano użytkownika'),
(295, 1, '2023-10-10 07:27:37', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 09:27:37', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano użytkownika'),
(296, 1, '2023-10-10 07:30:09', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 09:27:37', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxsxwsx<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano użytkownika'),
(297, 1, '2023-10-10 07:31:31', 3, 'users', 'Imię: Kacper<br> Drugie imię: <br> Nazwisko: Korus<br> Email: 123kakor56@gmail.com<br> Opis: <br> Adres: <br> Data modyfikacji: 2023-10-01 13:32:10', 'Imię: Kacper<br> Drugie imię: <br> Nazwisko: Korus<br> Email: 123kakor56@gmail.com<br> Opis: <br> Adres: Pod mostem XD<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(298, 1, '2023-10-10 08:06:17', 1, 'users', 'Rola: 1<br> Dział: 1<br> Stanowisko: 2<br> Data modyfikacji: ', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(299, 1, '2023-10-10 08:07:54', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 10:06:17', 'Rola: 1<br> Dział: 1<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(300, 1, '2023-10-10 08:53:41', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxsxwsx<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 10:07:54', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxsx<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(301, 1, '2023-10-10 09:06:06', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxsx<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 10:53:41', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxs<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika');
INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES
(302, 1, '2023-10-10 09:14:06', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxs<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 11:06:04', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsx<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(303, 1, '2023-10-10 09:35:22', 1, 'users', 'Rola: 1<br> Dział: 1<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 11:14:06', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(304, 1, '2023-10-10 09:39:48', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 11:35:22', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(305, 1, '2023-10-10 09:40:47', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsx<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 11:39:48', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsx<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(306, 1, '2023-10-10 09:41:41', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: 2023-10-10 11:39:48', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(307, 1, '2023-10-10 09:49:46', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 11:41:41', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(308, 1, '2023-10-10 10:02:54', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: 2023-10-10 11:49:46', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(309, 1, '2023-10-10 10:09:40', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 12:02:53', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(310, 1, '2023-10-10 10:10:42', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: 2023-10-10 12:09:40', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(311, 1, '2023-10-10 10:12:54', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 12:10:42', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(312, 1, '2023-10-10 10:13:43', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: 2023-10-10 12:12:54', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(313, 1, '2023-10-10 10:15:09', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 12:13:43', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(314, 1, '2023-10-10 10:16:03', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: 2023-10-10 12:15:09', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika');

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
  `order_number` text NOT NULL,
  `seller` text NOT NULL,
  `client` text NOT NULL,
  `contact_line_1` text NOT NULL,
  `contact_line_2` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `status_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `invoice` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `seller`, `client`, `contact_line_1`, `contact_line_2`, `date`, `value`, `status_id`, `platform_id`, `description`, `invoice`) VALUES
(1, 'on-1001', 'Chińczyk', 'RGBPC.PL', 'Aliexpress.us', 'Plac Chińskiej Republiki Ludowej w Pekinie', '2023-06-24 10:17:08', 321.55, 1, 4, 'xd', NULL),
(17, 'on-1002', 'RGBPC.PL', 'qwerty', 'qwerty', 'qwerty', '2023-06-28 17:50:08', 1234.00, 1, 1, 'qwerty', NULL),
(19, 'on-1003', 'Kacper', 'RGBPC.PL', 'Polska, Województwo Mazowieckie', 'Myśliborska 64B, 13-123 Warszawa', '2023-06-28 19:02:23', 100.01, 1, 5, 'Dał nam pod mostem!', 'on-1003.pdf'),
(31, 'on-1004', 'Aliebabe', 'RGBPC.PL', 'Chiny', '2', '2023-07-03 10:48:49', 100.00, 2, 4, 'Joł', ''),
(32, 'on-1005', 'RGBPC.PL', 'kakor', 'mysliborska 65 warszawa', '03-1012', '2023-07-03 10:59:51', 132.87, 1, 2, 'tak było', ''),
(33, 'on-1006', 'Alie', 'RGBPC.PL', 'Chini', 'tez', '2023-07-22 18:35:36', 201.99, 2, 4, '', ''),
(34, 'on-1007', 'RGBPC.PL', 'Kacper', 'Myśliborska', '10', '2023-07-24 10:25:51', 208.99, 2, 5, '', ''),
(35, 'on-1008', 'RGBPC.PL', 'ktos', '.', '.', '2023-07-24 10:44:16', 499.99, 2, 2, '', ''),
(36, 'on-1009', 'RGBPC.PL', 'Kakor', 'qwert', 'qweer', '2023-07-26 13:31:19', 20.00, 1, 1, '', ''),
(37, 'on-1010', 'RGBPC.PL', 'Kacper', 'Mysliborska 65', '32', '2023-07-26 14:08:52', 20.99, 1, 2, '', ''),
(38, 'on-1011', 'RGBPC.PL', 'Kacper Korus', '730427444', 'Mysliborska 65/52, 03-192, Warszawa', '2023-07-26 14:17:27', 49.99, 1, 2, '', ''),
(39, 'on-1012', 'RGBPC.PL', 'Grzegorz Brzęczyszczykiewicz', '375849439', 'Portowa 39/2 Warszawa', '2023-07-26 14:20:02', 87.93, 1, 1, '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_platforms`
--

CREATE TABLE `order_platforms` (
  `id` int(11) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_platforms`
--

INSERT INTO `order_platforms` (`id`, `platform`) VALUES
(1, 'olx'),
(2, 'allegro'),
(3, 'rgbpc.pl'),
(4, 'aliexpress'),
(5, 'inna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'zamówione'),
(2, 'odebrane'),
(3, 'anulowane');

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
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `bought`, `sold`, `quantity`, `img`, `source`, `our_olx`, `our_allegro`, `category_id`, `description`, `status_id`) VALUES
(1, 'Etui różowe na iPhone 14 Plus', 'pn-1001', 17.97, 34.99, 13, 'pn-1001.jpg', 'https://www.aliexpress.us/item/3256805477811430.html', '', '', 5, '', 1),
(2, 'Radiator M.2 SSD 5V 3PIN ARGB ', 'pn-1002', 24.59, 79.99, 9, 'pn-1002.png', 'https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt', NULL, NULL, 1, 'joł', 1),
(3, 'Etui przezroczyste iPhone 11 slim', 'pn-1003', 8.87, 23.99, 20, 'pn-1003.jpg', 'https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK', '', '', 1, 'chińczyk XD', 1),
(4, 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami', 'pn-1004', 29.76, 57.99, 11, 'pn-1004.jpg', 'https://www.aliexpress.us/item/3256805424784115.html', '', '', 2, 'Pełen zestaw, wraz ze specjalnymi prowadnicami', 1),
(5, 'Etui przezroczyste iPhone 11', 'pn-1005', 13.87, 23.99, 5, 'pn-1005.jpg', 'https://www.aliexpress.us/item/3256804512972566.html', NULL, NULL, 1, '', 1),
(30, 'test', 'pn-1006', 55.00, 55.00, 1, '', 'ali', NULL, NULL, 1, 'xd', 1),
(31, 'tescik', 'pn-1007', 67.00, 77.00, 1, 'pn-1007.jpg', 'test', NULL, NULL, 1, 'test', 3),
(32, 'op', 'pn-1008', 66.00, 77.00, 0, 'pn-1008.jpg', 'op', NULL, NULL, 1, 'op', 3),
(33, 'pl', 'pn-1009', 99.00, 90.00, 0, '', 'pl', NULL, NULL, 1, 'pl', 3),
(34, 'ty', 'pn-1010', 88.00, 88.00, 1, 'pn-1010.jpg', 'ty', NULL, NULL, 1, 'ty', 1),
(35, 'rf', 'pn-1011', 55.00, 55.00, 0, 'pn-1011.jpg', 'rf', NULL, NULL, 1, 'rf', 3),
(36, 'td', 'pn-1012', 77.00, 77.00, 0, '', '6', NULL, NULL, 1, '5', 3),
(37, 'oil', 'pn-1013', 99.00, 99.00, 0, '', '99', NULL, NULL, 1, '99', 3),
(38, 'ftgyhb', 'pn-1014', 99.00, 99.00, 0, '', '99', NULL, NULL, 1, '99', 3),
(39, 'fcghvbjug', 'pn-1015', 77.00, 77.00, 0, '', 'ty', NULL, NULL, 1, 'ty', 3),
(40, 'Dobry', 'pn-1016', 14.00, 19.50, 1, 'pn-1016.jpg', 'fghj', 'ghkj', 'gjhk', 1, 'fghj', 1),
(41, 'asd', 'pn-1017', 0.00, 0.00, 0, '', 'asd', 'asd', 'sda', 1, 'asd', 3);

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
  `sec_name` text DEFAULT NULL,
  `sur_name` text NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `mail` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `addres` varchar(100) DEFAULT NULL,
  `title_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `profile_picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `sec_name`, `sur_name`, `pswd`, `mail`, `role_id`, `create_date`, `update_date`, `status_id`, `description`, `addres`, `title_id`, `department_id`, `profile_picture`) VALUES
(1, '58c4258120c2663e502468794f3e3aa314bf966f837200e1aa3e9c50b428f870', 'Gustaw', 'Jerzy', 'Sołdecki', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'gugisek@gmail.com', 1, '2023-06-15 20:55:07', '2023-10-10 10:16:03', 1, 'XDxsx', 'Płochociń 16', 2, 2, 'pp-1.jpg'),
(2, '03f03be21462b76ccb5fb7e5319ef1e6f44ac328cf1750b581fcb7710aec3d8a', 'Jakub', NULL, 'Strzelczak', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'kubastrzelczak@gmail.com', 1, '2023-06-15 20:56:36', '2023-10-01 11:27:10', 1, NULL, NULL, 2, 1, NULL),
(3, 'c77f0e9e17b362249ecf5924db1d033a8e3eeb215c667dd91851d6d5a2cd26ad', 'Kacper', '', 'Korus', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '123kakor56@gmail.com', 2, '2023-06-15 20:56:58', '2023-10-10 07:31:31', 4, '', 'Pod mostem XD', 1, 2, NULL),
(4, '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'asd', NULL, 'asd', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'asd', 1, '2023-06-19 09:16:25', '2023-10-01 11:28:04', 2, NULL, NULL, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_departments`
--

CREATE TABLE `user_departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_departments`
--

INSERT INTO `user_departments` (`id`, `name`) VALUES
(1, 'zarządzanie'),
(2, 'wysyłka'),
(3, 'sprzedaż');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL,
  `description` text DEFAULT NULL,
  `dashboard` int(11) NOT NULL,
  `products` int(11) NOT NULL,
  `orders` int(11) NOT NULL,
  `outcome` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `accountancy` int(11) NOT NULL,
  `users` int(11) NOT NULL,
  `logs` int(11) NOT NULL,
  `settings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `description`, `dashboard`, `products`, `orders`, `outcome`, `income`, `accountancy`, `users`, `logs`, `settings`) VALUES
(1, 'admin👑', 'Full privilages for all', 4, 4, 4, 4, 4, 4, 4, 4, 4),
(2, 'magazynier📦', 'Only for update products, orders', 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_role_privileges`
--

CREATE TABLE `user_role_privileges` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role_privileges`
--

INSERT INTO `user_role_privileges` (`id`, `name`, `description`) VALUES
(1, 'read', 'only read'),
(2, 'edit', 'read and edit'),
(3, 'add', 'read, edit, add'),
(4, 'full', 'read, write, add, delete'),
(5, 'none', 'not allowed');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL,
  `privileges` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`, `privileges`, `color_id`) VALUES
(1, 'aktywne', 1, 2),
(2, 'nieaktywne', 2, 4),
(3, 'wyłączone', 2, 5),
(4, 'zbanowane', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_titles`
--

CREATE TABLE `user_titles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_titles`
--

INSERT INTO `user_titles` (`id`, `name`) VALUES
(1, 'Junior Seller'),
(2, 'junior project manager');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products` (`product_id`),
  ADD KEY `fk_orders` (`order_id`);

--
-- Indeksy dla tabeli `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finances_fk0` (`order_id`);

--
-- Indeksy dla tabeli `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `orders_fk1` (`status_id`),
  ADD KEY `fk_order_platform` (`platform_id`);

--
-- Indeksy dla tabeli `order_platforms`
--
ALTER TABLE `order_platforms`
  ADD PRIMARY KEY (`id`);

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
-- Indeksy dla tabeli `user_departments`
--
ALTER TABLE `user_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`) USING HASH;

--
-- Indeksy dla tabeli `user_role_privileges`
--
ALTER TABLE `user_role_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_titles`
--
ALTER TABLE `user_titles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `log_types`
--
ALTER TABLE `log_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_platforms`
--
ALTER TABLE `order_platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
-- AUTO_INCREMENT for table `user_departments`
--
ALTER TABLE `user_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role_privileges`
--
ALTER TABLE `user_role_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_titles`
--
ALTER TABLE `user_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

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
  ADD CONSTRAINT `fk_order_platform` FOREIGN KEY (`platform_id`) REFERENCES `order_platforms` (`id`),
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
