-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 11, 2024 at 05:46 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgbpc`
--

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
(762, 0, '2024-11-01 16:30:47', 1, 'users', 'Imię: Gustaw Sołdecki <br/> Email: <br/> Rola: 2<br/> Opis: XD<br/> Status: 1', 'Imię: Gustaw Sołdecki<br/> Email: gugisek@gmail.com<br/> Rola: 2<br/> Opis: XD<br/> Status: 1', 1, 'Edytowano użytkownika'),
(763, 1, '2024-11-01 16:34:24', 1, 'users', 'Imię: Gustaw Sołdecki <br/> Email: <br/> Rola: 2<br/> Opis: XD<br/> Status: 1', 'Imię: Gustaw Sołdecki<br/> Email: gugisek@gmail.com<br/> Rola: 2<br/> Opis: XD<br/> Status: 1', 1, 'Edytowano użytkownika'),
(764, 1, '2024-11-01 16:40:29', 1, 'users', 'Imię: Gustaw Sołdecki <br/> Email: gugisek@gmail.com<br/> Rola: 2<br/> Opis: XD<br/> Status: 1', 'Imię: Gustaw Sołdecki<br/> Email: gugisek@gmail.com<br/> Rola: 2<br/> Opis: Kierownik<br/> Status: 1', 1, 'Edytowano użytkownika'),
(765, 1, '2024-11-01 16:41:22', 1, 'users', '', 'Hasło: 1234', 1, 'Edyctowano hasło użytkownika'),
(766, 1, '2024-11-01 16:48:17', 1, 'users', 'Imię: Gustaw Sołdecki <br/> Email: gugisek@gmail.com<br/> Rola: 2<br/> Opis: Kierownik<br/> Status: 1', 'Imię: Gustaw Sołdecki<br/> Email: gugisek@gmail.com<br/> Rola: 2<br/> Opis: debil<br/> Status: 1', 1, 'Edytowano użytkownika'),
(767, 1, '2024-11-01 17:09:49', 5, 'users', '', 'Imię: Kacper Korus<br/> Email: 123kakor56@gmail.com<br/> Rola: 1<br/> Opis: <br/> Status: 1', 2, 'Dodano użytkownika użytkownika'),
(768, 1, '2024-11-01 17:13:34', 7, 'users', '', 'Imię: test tet<br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: <br/> Status: 1', 2, 'Dodano użytkownika użytkownika'),
(769, 1, '2024-11-01 17:14:08', 7, 'users', 'Imię: test tet <br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: <br/> Status: 1', 'Imię: test test<br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: <br/> Status: 1', 1, 'Edytowano użytkownika'),
(770, 1, '2024-11-01 17:15:48', 1, 'users', 'Imię: Gustaw Sołdecki <br/> Email: gugisek@gmail.com<br/> Rola: 2<br/> Opis: debil<br/> Status: 1', 'Imię: Gustaw Sołdecki<br/> Email: gugisek@gmail.com<br/> Rola: 2<br/> Opis: debil (main)<br/> Status: 1', 1, 'Edytowano użytkownika'),
(771, 1, '2024-11-01 17:30:44', 8, 'users', '', 'Imię: usun mnie<br/> Email: usun@mnie.pl<br/> Rola: 1<br/> Opis: <br/> Status: 1', 2, 'Dodano użytkownika użytkownika'),
(772, 1, '2024-11-01 17:31:02', 8, 'users', 'Imię: usun mnie <br/> Email: <br/> Rola: 1<br/> Wspólnota: ', '', 3, 'Usunięto użytkownika'),
(773, 1, '2024-11-04 11:36:57', 3, 'settings', 'Nazwa: magazynier📦 <br/>Opis: Only for update products, orders <br/>Dashboard: 1 <br/>Użytkownicy: 1 <br/>Logi: 1 <br/>Ustawienia: 5', 'Nazwa: magazynier📦 <br/>Opis: Only for update products, orders <br/>Dashboard: 1 <br/>Użytkownicy: 1 <br/>Logi: 1 <br/>Ustawienia: 1', 1, 'Edytowano rolę użytkownika'),
(774, 1, '2024-11-04 11:56:26', 6, 'settings', 'Nazwa: test <br/>Opis: test <br/>Dashboard: 1 <br/>Użytkownicy: 3 <br/>Logi: 2 <br/>Ustawienia: 1', 'Nazwa: test <br/>Opis: test <br/>Dashboard: 5 <br/>Użytkownicy: 3 <br/>Logi: 2 <br/>Ustawienia: 1', 1, 'Edytowano rolę użytkownika'),
(775, 1, '2024-11-04 11:56:30', 6, 'settings', 'Role: test <br/>Opis: test <br/> Dashboard: 5<br/> Users: 3<br/> Logs: 2<br/> Settings: 1', '', 3, 'Usunięto rolę użytkownika'),
(776, 1, '2024-11-04 11:57:15', 7, 'settings', '', 'Nazwa: test <br/>Opis: test <br/>Dashboard: 2 <br/>Użytkownicy: 2 <br/>Logi: 2 <br/>Ustawienia: 2', 2, 'Dodano użytkownika rolę użytkownika'),
(777, 1, '2024-11-04 11:57:21', 7, 'settings', 'Nazwa: test <br/>Opis: test <br/>Dashboard: 2 <br/>Użytkownicy: 2 <br/>Logi: 2 <br/>Ustawienia: 2', 'Nazwa: test <br/>Opis: test <br/>Dashboard: 5 <br/>Użytkownicy: 2 <br/>Logi: 2 <br/>Ustawienia: 2', 1, 'Edytowano rolę użytkownika'),
(778, 1, '2024-11-04 11:57:26', 7, 'settings', 'Role: test <br/>Opis: test <br/> Dashboard: 5<br/> Users: 2<br/> Logs: 2<br/> Settings: 2', '', 3, 'Usunięto rolę użytkownika'),
(779, 1, '2024-11-04 11:58:32', 7, 'users', 'Imię: test test <br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: <br/> Status: 1', 'Imię: test test<br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: test<br/> Status: 1', 1, 'Edytowano użytkownika'),
(780, 1, '2024-11-06 18:35:07', 7, 'users', 'Imię: test test <br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: test<br/> Status: 1', 'Imię: test test<br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: test<br/> Status: 3', 1, 'Edytowano użytkownika'),
(781, 1, '2024-11-06 18:35:30', 7, 'users', 'Imię: test test <br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: test<br/> Status: 3', 'Imię: test test<br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: test<br/> Status: 1', 1, 'Edytowano użytkownika'),
(782, 1, '2024-11-08 12:47:35', 1, 'settings', 'Nazwa: akcesoria komputerowe <br/>Nadrzędna kategoria: ', 'Nazwa: akcesoria komputerowe <br/>Nadrzędna kategoria: 0', 1, 'Edytowano kategorię produktu'),
(783, 1, '2024-11-08 12:52:04', 1, 'settings', 'Nazwa: akcesoria komputerowe <br/>Nadrzędna kategoria: 0', 'Nazwa: akcesoria komputerowexc <br/>Nadrzędna kategoria: 0', 1, 'Edytowano kategorię produktu'),
(784, 1, '2024-11-08 13:00:49', 1, 'settings', 'Nazwa: akcesoria komputerowexc <br/>Nadrzędna kategoria: 0', 'Nazwa: akcesoria komputerowe <br/>Nadrzędna kategoria: 0', 1, 'Edytowano kategorię produktu'),
(785, 1, '2024-11-08 13:04:27', 2, 'settings', 'Nazwa: akcesoria do smartfonów <br/>Nadrzędna kategoria: ', 'Nazwa: etui i pokrowce <br/>Nadrzędna kategoria: 2', 1, 'Edytowano kategorię produktu'),
(786, 1, '2024-11-08 13:06:27', 5, 'settings', 'Nazwa: etui i pokrowce <br/>Nadrzędna kategoria: ', 'Nazwa: akcesoria do smartfonów <br/>Nadrzędna kategoria: 0', 1, 'Edytowano kategorię produktu'),
(787, 1, '2024-11-08 13:08:03', 2, 'settings', 'Nazwa: etui i pokrowce <br/>Nadrzędna kategoria: 0', 'Nazwa: etui i pokrowce <br/>Nadrzędna kategoria: 5', 1, 'Edytowano kategorię produktu'),
(788, 1, '2024-11-08 13:08:17', 7, 'settings', '', 'Nazwa: ochrony ekranu <br/>Nadrzędna kategoria: 5', 2, 'Dodano kategorię produktu'),
(789, 1, '2024-11-08 13:11:24', 8, 'settings', '', 'Nazwa: test <br/>Nadrzędna kategoria: 5', 2, 'Dodano kategorię produktu'),
(790, 1, '2024-11-08 13:12:12', 0, 'settings', 'Nazwa:  <br/>Nadrzędna kategoria: ', '', 3, 'Usunięto kategorię produktu'),
(791, 1, '2024-11-08 13:13:33', 0, 'settings', 'Nazwa:  <br/>Nadrzędna kategoria: ', '', 3, 'Usunięto kategorię produktu'),
(792, 1, '2024-11-08 13:14:43', 0, 'settings', 'Nazwa:  <br/>Nadrzędna kategoria: ', '', 3, 'Usunięto kategorię produktu'),
(793, 1, '2024-11-08 13:15:37', 8, 'settings', '', 'Nazwa: test <br/>Opis: tst <br/>Dashboard: 1 <br/>Użytkownicy: 1 <br/>Logi: 1 <br/>Ustawienia: 1', 2, 'Dodano użytkownika rolę użytkownika'),
(794, 1, '2024-11-08 13:15:42', 8, 'settings', 'Role: test <br/>Opis: tst <br/> Dashboard: 1<br/> Users: 1<br/> Logs: 1<br/> Settings: 1', '', 3, 'Usunięto rolę użytkownika'),
(795, 1, '2024-11-08 13:16:22', 0, 'settings', 'Nazwa:  <br/>Nadrzędna kategoria: ', '', 3, 'Usunięto kategorię produktu'),
(796, 1, '2024-11-08 13:17:07', 0, 'settings', 'Nazwa:  <br/>Nadrzędna kategoria: ', '', 3, 'Usunięto kategorię produktu'),
(797, 1, '2024-11-08 13:17:40', 0, 'settings', 'Nazwa:  <br/>Nadrzędna kategoria: ', '', 3, 'Usunięto kategorię produktu'),
(798, 1, '2024-11-08 13:26:50', 8, 'settings', 'Nazwa: test <br/>Nadrzędna kategoria: 5', '', 3, 'Usunięto kategorię produktu'),
(799, 1, '2024-11-08 13:27:55', 8, 'settings', 'Nazwa:  <br/>Nadrzędna kategoria: ', '', 3, 'Usunięto kategorię produktu'),
(800, 1, '2024-11-08 13:28:45', 9, 'settings', '', 'Nazwa: test <br/>Nadrzędna kategoria: 5', 2, 'Dodano kategorię produktu'),
(801, 1, '2024-11-08 13:28:50', 9, 'settings', 'Nazwa: test <br/>Nadrzędna kategoria: 5', '', 3, 'Usunięto kategorię produktu'),
(802, 1, '2024-11-08 13:30:08', 10, 'settings', '', 'Nazwa: test <br/>Nadrzędna kategoria: 0', 2, 'Dodano kategorię produktu'),
(803, 1, '2024-11-08 13:30:17', 10, 'settings', 'Nazwa: test <br/>Nadrzędna kategoria: 0', '', 3, 'Usunięto kategorię produktu');

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
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `sku` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `sell_price_brutto` decimal(11,2) NOT NULL,
  `source` text NOT NULL,
  `our_olx` text DEFAULT NULL,
  `our_allegro` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `parent_variant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `img`, `sell_price_brutto`, `source`, `our_olx`, `our_allegro`, `category_id`, `description`, `status_id`, `type`, `parent_variant_id`) VALUES
(1, 'Etui różowe na iPhone 14 Plus', 'pn-1001', 'pn-1001.jpg', 29.99, 'https://www.aliexpress.us/item/3256805477811430.html', '', '', 5, '', 1, '', NULL),
(2, 'Radiator M.2 SSD 5V 3PIN ARGB ', 'pn-1002', 'pn-1002.png', 0.00, 'https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt', NULL, NULL, 1, 'joł', 1, '', NULL),
(3, 'Etui przezroczyste iPhone 11 slim', 'pn-1003', 'pn-1003.jpg', 0.00, 'https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK', '', '', 1, 'chińczyk XD', 1, '', NULL),
(4, 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami', 'pn-1004', 'pn-1004.jpg', 0.00, 'https://www.aliexpress.us/item/3256805424784115.html', '', '', 2, 'Pełen zestaw, wraz ze specjalnymi prowadnicami', 1, '', NULL),
(5, 'Etui przezroczyste iPhone 11', 'pn-1005', 'pn-1005.jpg', 0.00, 'https://www.aliexpress.us/item/3256804512972566.html', NULL, NULL, 1, '', 1, '', NULL),
(30, 'test', 'pn-1006', '', 0.00, 'ali', NULL, NULL, 1, 'xd', 1, '', NULL),
(31, 'tescik', 'pn-1007', 'pn-1007.jpg', 0.00, 'test', NULL, NULL, 1, 'test', 3, '', NULL),
(32, 'op', 'pn-1008', 'pn-1008.jpg', 0.00, 'op', NULL, NULL, 1, 'op', 3, '', NULL),
(33, 'pl', 'pn-1009', '', 0.00, 'pl', NULL, NULL, 1, 'pl', 3, '', NULL),
(34, 'ty', 'pn-1010', 'pn-1010.jpg', 0.00, 'ty', NULL, NULL, 1, 'ty', 1, '', NULL),
(35, 'rf', 'pn-1011', 'pn-1011.jpg', 0.00, 'rf', NULL, NULL, 1, 'rf', 3, '', NULL),
(36, 'td', 'pn-1012', '', 0.00, '6', NULL, NULL, 1, '5', 3, '', NULL),
(37, 'oil', 'pn-1013', '', 0.00, '99', NULL, NULL, 1, '99', 3, '', NULL),
(38, 'ftgyhb', 'pn-1014', '', 0.00, '99', NULL, NULL, 1, '99', 3, '', NULL),
(39, 'fcghvbjug', 'pn-1015', '', 0.00, 'ty', NULL, NULL, 1, 'ty', 3, '', NULL),
(40, 'Dobry', 'pn-1016', 'pn-1016.jpg', 0.00, 'fghj', 'ghkj', 'gjhk', 1, 'fghj', 1, '', NULL),
(41, 'asd', 'pn-1017', '', 0.00, 'asd', 'asd', 'sda', 1, 'asd', 3, '', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sec_parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category`, `parent_id`, `sec_parent_id`) VALUES
(1, 'akcesoria komputerowe', 0, NULL),
(2, 'etui i pokrowce', 5, NULL),
(3, 'akcesoria do czyszczenia', NULL, NULL),
(4, 'części komputerowe', NULL, NULL),
(5, 'akcesoria do smartfonów', 0, NULL),
(6, 'wsporniki kart graficznych', 1, NULL),
(7, 'ochrony ekranu', 5, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_doms`
--

CREATE TABLE `product_doms` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bought_price_brutto` int(11) NOT NULL,
  `sell_price_brutto` int(11) DEFAULT NULL,
  `bought_date` datetime NOT NULL,
  `sell_date` datetime DEFAULT NULL,
  `bought_source_id` int(11) NOT NULL,
  `sell_source_id` int(11) DEFAULT NULL,
  `bought_order_id` int(11) NOT NULL,
  `sell_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'wycofane'),
(5, 'szkic');

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
  `profile_picture` varchar(50) DEFAULT NULL,
  `last_log` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `sec_name`, `sur_name`, `pswd`, `mail`, `role_id`, `create_date`, `update_date`, `status_id`, `description`, `addres`, `profile_picture`, `last_log`) VALUES
(1, 'gugisek@gmail.com', 'Gustaw', 'Jerzy', 'Sołdecki', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'gugisek@gmail.com', 2, '2023-06-15 20:55:07', '2024-11-06 18:33:49', 1, 'debil (main)', 'Płochociń 16', '1-pp.jpg', '2024-11-06 19:33:49'),
(7, 'test@test.pl', 'test', NULL, 'test', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'test@test.pl', 1, '2024-11-01 18:13:34', '2024-11-06 18:35:30', 1, 'test', NULL, NULL, '2024-11-01 18:22:40');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL,
  `description` text DEFAULT NULL,
  `dashboard` int(11) NOT NULL,
  `users` int(11) NOT NULL,
  `logs` int(11) NOT NULL,
  `settings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `description`, `dashboard`, `users`, `logs`, `settings`) VALUES
(1, 'user', 'for client only', 5, 5, 5, 5),
(2, 'admin👑', 'Full privilages for all', 4, 4, 4, 4),
(3, 'magazynier📦', 'Only for update products, orders', 1, 1, 1, 1);

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

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `colors`
--
ALTER TABLE `colors`
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
-- Indeksy dla tabeli `product_doms`
--
ALTER TABLE `product_doms`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `product_status`
--
ALTER TABLE `product_status`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=804;

--
-- AUTO_INCREMENT for table `log_types`
--
ALTER TABLE `log_types`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_doms`
--
ALTER TABLE `product_doms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_status`
--
ALTER TABLE `product_status`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_fk1` FOREIGN KEY (`status_id`) REFERENCES `product_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
