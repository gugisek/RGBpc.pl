-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 14, 2025 at 06:02 PM
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
-- Struktura tabeli dla tabeli `dom_status`
--

CREATE TABLE `dom_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dom_status`
--

INSERT INTO `dom_status` (`id`, `name`) VALUES
(1, 'Zamówiony'),
(2, 'W magazynie'),
(3, 'Sprzedany'),
(4, 'Wewnętrzny użytek'),
(5, 'Zwrócony do hurtowni'),
(6, 'Uszkodzony w transporcie'),
(7, 'Produkt wadliwy'),
(8, 'Zwrócony do RGBpc'),
(9, 'Używany - outlet');

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
(803, 1, '2024-11-08 13:30:17', 10, 'settings', 'Nazwa: test <br/>Nadrzędna kategoria: 0', '', 3, 'Usunięto kategorię produktu'),
(804, 1, '2024-11-15 07:35:14', 50, 'products', '', 'Nazwa: esz, SKU: pn-1024, Opis: esz, Kategoria: 3, Warianty: main_single', 2, 'Dodano produkt'),
(805, 1, '2024-11-15 07:36:05', 51, 'products', '', 'Nazwa: teste img, SKU: pn-1025img, Opis: test img, Kategoria: 2, Warianty: main_single', 2, 'Dodano produkt'),
(806, 1, '2024-11-17 13:15:07', 52, 'products', '', 'Nazwa: Testcik, SKU: pn-1025, Opis: to jest test mordko, Kategoria: 3, Warianty: main_single', 2, 'Dodano produkt'),
(807, 1, '2024-11-17 13:18:54', 7, 'users', 'Imię: test test <br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: test<br/> Status: 1', 'Imię: test test<br/> Email: test@test.pl<br/> Rola: 1<br/> Opis: test<br/> Status: 3', 1, 'Edytowano użytkownika'),
(808, 1, '2024-11-17 13:20:59', 53, 'products', '', 'Nazwa: Teścik Wariantów <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Warianty: main_variants', 2, 'Dodano produkt'),
(809, 1, '2024-11-24 12:27:59', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr: <br/>Wartość: 2 lata', 2, 'Dodano parametr'),
(810, 1, '2024-11-24 12:28:09', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr: <br/>Wartość: 2 lata', 2, 'Dodano parametr'),
(811, 1, '2024-11-24 12:29:04', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 2<br/>Wartość: 2 lata', 2, 'Dodano parametr'),
(812, 1, '2024-11-24 12:29:11', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 2<br/>Wartość: 2 lata', 2, 'Dodano parametr'),
(813, 1, '2024-11-24 12:31:48', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: esa', 2, 'Dodano parametr'),
(814, 1, '2024-11-24 12:31:49', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: esa', 2, 'Dodano parametr'),
(815, 1, '2024-11-24 12:31:50', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: esa', 2, 'Dodano parametr'),
(816, 1, '2024-11-24 12:31:50', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: esa', 2, 'Dodano parametr'),
(817, 1, '2024-11-24 12:31:51', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: esa', 2, 'Dodano parametr'),
(818, 1, '2024-11-24 12:31:52', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: esa', 2, 'Dodano parametr'),
(819, 1, '2024-11-24 12:36:41', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 2<br/>Wartość: 2 lata', 2, 'Dodano parametr'),
(820, 1, '2024-11-24 12:36:53', 4, 'product_specs', 'Produkt: 4 <br/>Parametr_id: 2<br/>Wartość: 2 lata', 'Produkt: 4 <br/>Parametr_id: 2<br/>Wartość: 3 lata', 1, 'Zaktualizowano parametr'),
(821, 1, '2024-11-24 13:52:14', 4, 'product_specs', 'Produkt: 4 <br/>Parametr_id: 1<br/>Wartość: 12 miesięcy', 'Produkt: 4 <br/>Parametr_id: 1<br/>Wartość: 12 miesięcys', 1, 'Zaktualizowano parametr'),
(822, 1, '2024-11-24 13:55:01', 4, 'product_specs', 'Produkt: 4 <br/>Parametr_id: 1<br/>Wartość: 12 miesięcys', 'Produkt: 4 <br/>Parametr_id: 1<br/>Wartość: 12 miesięcy', 1, 'Zaktualizowano parametr'),
(823, 1, '2024-11-24 13:57:48', 4, 'product_specs', 'Produkt: 4 <br/>Parametr_id: 1<br/>Wartość: 12 miesięcy', 'Produkt: 4 <br/>Parametr_id: 1<br/>Wartość: 12 miesięcys', 1, 'Zaktualizowano parametr'),
(824, 1, '2024-11-24 13:57:55', 4, 'product_specs', 'Produkt: 4 <br/>Parametr_id: 1<br/>Wartość: 12 miesięcys', 'Produkt: 4 <br/>Parametr_id: 1<br/>Wartość: 12 miesięcy', 1, 'Zaktualizowano parametr'),
(825, 1, '2024-11-24 14:06:33', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: 12345', 2, 'Dodano parametr'),
(826, 1, '2024-11-24 14:06:40', 4, 'product_specs', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: 12345', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: 123456', 1, 'Zaktualizowano parametr'),
(827, 1, '2024-11-24 14:09:03', 4, 'product_specs', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: 123456', 'Produkt: 4 <br/>Parametr_id: 3<br/>Wartość: 12345678', 1, 'Zaktualizowano parametr'),
(828, 1, '2024-11-24 15:13:03', 5, 'settings', '', 'Nazwa: Przeznaczenie <br/>Kategoria filtra: 2', 2, 'Dodano parametr produktu'),
(829, 1, '2024-11-24 15:14:14', 6, 'settings', '', 'Nazwa: Typ <br/>Kategoria filtra: 2', 2, 'Dodano parametr produktu'),
(830, 1, '2024-11-24 15:14:47', 7, 'settings', '', 'Nazwa: Materiał <br/>Kategoria filtra: 2', 2, 'Dodano parametr produktu'),
(831, 1, '2024-11-24 15:26:16', 11, 'settings', '', 'Nazwa: Procesory <br/>Nadrzędna kategoria: 4', 2, 'Dodano kategorię produktu'),
(832, 1, '2024-11-24 15:27:06', 12, 'settings', '', 'Nazwa: Pamięci RAM <br/>Nadrzędna kategoria: 4', 2, 'Dodano kategorię produktu'),
(833, 1, '2024-11-24 15:27:32', 8, 'Categories_parameters', '', 'Nazwa: Typ pamięci <br/>Kategoria filtra: 12', 2, 'Dodano parametr produktu'),
(834, 1, '2024-11-24 15:29:56', 9, 'Categories_parameters', '', 'Nazwa: Taktowanie <br/>Kategoria filtra: 12', 2, 'Dodano parametr produktu'),
(835, 1, '2024-11-24 15:41:28', 10, 'Categories_parameters', '', 'Nazwa: Producent <br/>Kategoria filtra: 2 <br/>Priorytet: 1', 2, 'Dodano parametr produktu'),
(836, 1, '2024-11-24 15:50:50', 11, 'Categories_parameters', '', 'Nazwa: Producent <br/>Kategoria filtra: 12 <br/>Priorytet: ', 2, 'Dodano parametr produktu'),
(837, 1, '2024-11-24 15:51:20', 12, 'Categories_parameters', '', 'Nazwa: Model <br/>Kategoria filtra: 12 <br/>Priorytet: ', 2, 'Dodano parametr produktu'),
(838, 1, '2024-11-24 15:52:30', 13, 'Categories_parameters', '', 'Nazwa: Test <br/>Kategoria filtra: 12 <br/>Priorytet: ', 2, 'Dodano parametr produktu'),
(839, 1, '2024-11-24 15:54:01', 14, 'Categories_parameters', '', 'Nazwa: Test2 <br/>Kategoria filtra: 12 <br/>Priorytet: ', 2, 'Dodano parametr produktu'),
(840, 1, '2024-11-24 22:15:37', 15, 'Categories_parameters', '', 'Nazwa: Test2 <br/>Kategoria filtra: 14 <br/>Priorytet: 1', 2, 'Dodano parametr produktu'),
(841, 1, '2024-11-25 10:45:47', 11, 'Categories_parameters', 'Nazwa: Producent <br/>Priorytet: 0', 'Nazwa: Producent <br/>Priorytet: 1', 1, 'Zaktualizowano parametr produktu'),
(842, 1, '2024-11-25 10:45:57', 12, 'Categories_parameters', 'Nazwa: Model <br/>Priorytet: 0', 'Nazwa: Model <br/>Priorytet: 2', 1, 'Zaktualizowano parametr produktu'),
(843, 1, '2024-11-25 10:53:54', 16, 'Categories_parameters', '', 'Nazwa: test3 <br/>Kategoria filtra: 12 <br/>Priorytet: ', 2, 'Dodano parametr produktu'),
(844, 1, '2024-11-25 10:55:03', 17, 'Categories_parameters', '', 'Nazwa: test4 <br/>Kategoria filtra: 12 <br/>Priorytet: ', 2, 'Dodano parametr produktu'),
(845, 1, '2024-11-25 10:56:22', 18, 'Categories_parameters', '', 'Nazwa: test5 <br/>Kategoria filtra: 12 <br/>Priorytet: ', 2, 'Dodano parametr produktu'),
(846, 1, '2024-11-25 10:57:05', 19, 'Categories_parameters', '', 'Nazwa: test6 <br/>Kategoria filtra: 12 <br/>Priorytet: ', 2, 'Dodano parametr produktu'),
(847, 1, '2024-11-25 10:58:39', 20, 'Categories_parameters', '', 'Nazwa: test7 <br/>Kategoria filtra: 12 <br/>Priorytet: NULL', 2, 'Dodano parametr produktu'),
(848, 1, '2024-11-25 10:59:08', 21, 'Categories_parameters', '', 'Nazwa: test8 <br/>Kategoria filtra: 12 <br/>Priorytet: NULL', 2, 'Dodano parametr produktu'),
(849, 1, '2024-11-25 10:59:21', 22, 'Categories_parameters', '', 'Nazwa: test9 <br/>Kategoria filtra: 12 <br/>Priorytet: 9', 2, 'Dodano parametr produktu'),
(850, 1, '2024-11-25 10:59:41', 19, 'Categories_parameters', 'Nazwa: test6 <br/>Priorytet: ', 'Nazwa: test6 <br/>Priorytet: 1', 1, 'Zaktualizowano parametr produktu'),
(851, 1, '2024-11-25 10:59:50', 19, 'Categories_parameters', 'Nazwa: test6 <br/>Priorytet: 1', 'Nazwa: test6 <br/>Priorytet: ', 1, 'Zaktualizowano parametr produktu'),
(852, 1, '2024-11-25 11:00:46', 19, 'Categories_parameters', 'Nazwa: test6 <br/>Priorytet: ', 'Nazwa: test6 <br/>Priorytet: 1', 1, 'Zaktualizowano parametr produktu'),
(853, 1, '2024-11-25 11:00:53', 19, 'Categories_parameters', 'Nazwa: test6 <br/>Priorytet: 1', 'Nazwa: test6 <br/>Priorytet: NULL', 1, 'Zaktualizowano parametr produktu'),
(854, 1, '2024-11-25 11:06:36', 22, 'Categories_parameters', 'Nazwa: test9 <br/>Priorytet: 9', '', 3, 'Usunięto parametr kategorii'),
(855, 1, '2024-11-25 11:08:02', 13, 'Categories_parameters', 'Nazwa: Test <br/>Priorytet: 0 <br/>Kategoria filtra: 12', '', 3, 'Usunięto parametr kategorii'),
(856, 1, '2024-11-25 11:08:21', 14, 'Categories_parameters', 'Nazwa: Test2 <br/>Priorytet: 0 <br/>Kategoria filtra: 12', '', 3, 'Usunięto parametr kategorii'),
(857, 1, '2024-11-25 11:08:31', 16, 'Categories_parameters', 'Nazwa: test3 <br/>Priorytet: 0 <br/>Kategoria filtra: 12', '', 3, 'Usunięto parametr kategorii'),
(858, 1, '2024-11-25 11:08:55', 17, 'Categories_parameters', 'Nazwa: test4 <br/>Priorytet: 0 <br/>Kategoria filtra: 12', '', 3, 'Usunięto parametr kategorii'),
(859, 1, '2024-11-25 11:09:01', 18, 'Categories_parameters', 'Nazwa: test5 <br/>Priorytet: 0 <br/>Kategoria filtra: 12', '', 3, 'Usunięto parametr kategorii'),
(860, 1, '2024-11-25 11:09:09', 19, 'Categories_parameters', 'Nazwa: test6 <br/>Priorytet:  <br/>Kategoria filtra: 12', '', 3, 'Usunięto parametr kategorii'),
(861, 1, '2024-11-25 11:09:38', 20, 'Categories_parameters', 'Nazwa: test7 <br/>Priorytet:  <br/>Kategoria filtra: 12', '', 3, 'Usunięto parametr kategorii'),
(862, 1, '2024-11-25 11:09:48', 21, 'Categories_parameters', 'Nazwa: test8 <br/>Priorytet:  <br/>Kategoria filtra: 12', '', 3, 'Usunięto parametr kategorii'),
(863, 1, '2024-11-25 11:16:33', 6, 'Categories_parameters', 'Nazwa: Typ <br/>Priorytet: ', 'Nazwa: Typ <br/>Priorytet: 2', 1, 'Zaktualizowano parametr produktu'),
(864, 1, '2024-11-25 11:17:31', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 5<br/>Wartość: iPhone 12', 2, 'Dodano parametr'),
(865, 1, '2024-11-25 11:17:32', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 7<br/>Wartość: Szkło hartowane', 2, 'Dodano parametr'),
(866, 1, '2024-11-25 11:17:33', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 6<br/>Wartość: Ochrona ekranu', 2, 'Dodano parametr'),
(867, 1, '2024-11-25 11:17:34', 4, 'product_specs', '', 'Produkt: 4 <br/>Parametr_id: 10<br/>Wartość: SinChang', 2, 'Dodano parametr'),
(868, 1, '2024-11-25 12:13:32', 4, 'products', 'Nazwa: Szkło hartowane 9H do iPhone 12 z czarnymi ramkami <br/>SKU: pn-1004<br/>Opis: Pełen zestaw, wraz ze specjalnymi prowadnicami<br/>Kategoria: 2<br/>Typ: <br/>Status: 1<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: https://www.aliexpress.us/item/3256805424784115.html', 'Nazwa: Szkło hartowane 9H do iPhone 12 z czarnymi ramkami <br/>SKU: pn-1004<br/>Opis: Pełen zestaw, wraz ze specjalnymi prowadnicami<br/>Kategoria: 1<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: https://www.aliexpress.us/item/3256805424784115.html', 1, 'Edytowano produkt'),
(869, 1, '2024-11-26 21:55:10', 4, 'products', 'Nazwa: Szkło hartowane 9H do iPhone 12 z czarnymi ramkami <br/>SKU: pn-1004<br/>Opis: Pełen zestaw, wraz ze specjalnymi prowadnicami<br/>Kategoria: 1<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: https://www.aliexpress.us/item/3256805424784115.html', 'Nazwa: Szkło hartowane 9H do iPhone 12 z czarnymi ramkami <br/>SKU: pn-1004<br/>Opis: Pełen zestaw, wraz ze specjalnymi prowadnicami<br/>Kategoria: 5<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: https://www.aliexpress.us/item/3256805424784115.html', 1, 'Edytowano produkt'),
(870, 1, '2024-11-26 22:00:03', 53, 'products', 'Nazwa: Teścik Wariantów <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 5<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: ', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 5<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: ', 1, 'Edytowano produkt'),
(871, 1, '2024-11-26 22:01:25', 53, 'products', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 5<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: ', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: ', 1, 'Edytowano produkt'),
(872, 1, '2024-11-26 22:04:17', 53, 'products', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: ', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_single<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: ', 1, 'Edytowano produkt'),
(873, 1, '2024-11-26 22:22:53', 53, 'products', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_single<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: ', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_single<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 1, 'Edytowano produkt'),
(874, 1, '2024-11-27 08:57:57', 53, 'products', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_single<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 1, 'Edytowano produkt'),
(875, 1, '2024-11-27 09:02:32', 53, 'products', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 1, 'Edytowano produkt'),
(876, 1, '2024-11-27 09:02:41', 53, 'products', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: Warianty to jest to<br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: <p>Warianty to jest to asd</p><br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 1, 'Edytowano produkt'),
(877, 1, '2024-11-27 09:02:51', 53, 'products', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: <p>Warianty to jest to asd</p><br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: <p>Warianty to jest to asd</p><br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 20.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 1, 'Edytowano produkt'),
(878, 1, '2024-11-27 10:29:09', 53, 'products', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: <p>Warianty to jest to asd</p><br/>Kategoria: 4<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 20.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: <p>Warianty to jest to asd</p><br/>Kategoria: 5<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 20.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 1, 'Edytowano produkt'),
(879, 1, '2024-11-27 10:29:33', 53, 'products', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: <p>Warianty to jest to asd</p><br/>Kategoria: 5<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 20.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 'Nazwa: Teścik Wariantów test <br/>SKU: pn-1026<br/>Opis: <p>Warianty to jest to asd</p><br/>Kategoria: 2<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 20.00<br/>Allegro: allegro<br/>OLX: olx<br/>Źródło: alie', 1, 'Edytowano produkt'),
(880, 1, '2024-11-27 10:30:24', 53, 'product_specs', '', 'Produkt: 53 <br/>Parametr_id: 1<br/>Wartość: do bramy i sie nie znamy', 2, 'Dodano parametr'),
(881, 1, '2024-11-27 10:30:58', 53, 'product_specs', '', 'Produkt: 53 <br/>Parametr_id: 10<br/>Wartość: Aliebabe', 2, 'Dodano parametr'),
(882, 1, '2024-11-27 10:31:07', 53, 'product_specs', '', 'Produkt: 53 <br/>Parametr_id: 7<br/>Wartość: PLA', 2, 'Dodano parametr'),
(883, 1, '2024-11-27 10:31:08', 53, 'product_specs', '', 'Produkt: 53 <br/>Parametr_id: 6<br/>Wartość: Test', 2, 'Dodano parametr'),
(884, 1, '2024-11-30 19:40:49', 50, 'Products', 'Nazwa:  <br/>SKU:  <br/>Kategoria:  <br/>Opis:  <br/>Status:  <br/>Cena:  <br/>Ilość:  <br/>Typ:  <br/>Źródło:  <br/>OLX:  <br/>Allegro:  <br/>Zdjęcie:  <br/>Kategoria ID:  <br/>Status ID: ', '', 3, 'Usunięto produkt'),
(885, 1, '2024-11-30 19:44:24', 47, 'Products', 'Nazwa: img <br/>SKU: pn-1022 <br/>Kategoria: akcesoria komputerowe <br/>Opis: img <br/>Status: szkic <br/>Cena: 0.00 <br/>Ilość: 0 <br/>Typ: main_single <br/>Źródło:  <br/>OLX:  <br/>Allegro:  <br/>Zdjęcie: default.png <br/>Kategoria ID: 1 <br/>Status ID: 5', '', 3, 'Usunięto produkt'),
(886, 1, '2024-11-30 19:48:41', 44, 'Products', 'Nazwa: tst <br/>SKU: pn-1020 <br/>Kategoria: ochrony ekranu <br/>Opis: stst <br/>Status: szkic <br/>Cena: 0.00 <br/>Ilość: 0 <br/>Typ: main_single <br/>Źródło:  <br/>OLX:  <br/>Allegro:  <br/>Zdjęcie: default.png <br/>Kategoria ID: 7 <br/>Status ID: 5', '', 3, 'Usunięto produkt'),
(887, 1, '2024-11-30 19:51:22', 45, 'Products', 'Nazwa: test <br/>SKU: test <br/>Kategoria: akcesoria do czyszczenia <br/>Opis: test <br/>Status: szkic <br/>Cena: 0.00 <br/>Ilość: 0 <br/>Typ: main_single <br/>Źródło:  <br/>OLX:  <br/>Allegro:  <br/>Zdjęcie: default.png <br/>Kategoria ID: 3 <br/>Status ID: 5', '', 3, 'Usunięto produkt'),
(888, 1, '2024-11-30 19:55:01', 43, 'Products', 'Nazwa: test variant <br/>SKU: pn-1019 <br/>Kategoria: etui i pokrowce <br/>Opis: test z waroantami <br/>Status: szkic <br/>Cena: 0.00 <br/>Ilość: 0 <br/>Typ: main_variants <br/>Źródło:  <br/>OLX:  <br/>Allegro:  <br/>Zdjęcie: default.png <br/>Kategoria ID: 2 <br/>Status ID: 5', '', 3, 'Usunięto produkt'),
(889, 1, '2024-12-02 12:07:43', 4, 'products', 'Nazwa: Szkło hartowane 9H do iPhone 12 z czarnymi ramkami <br/>SKU: pn-1004<br/>Opis: Pełen zestaw, wraz ze specjalnymi prowadnicami<br/>Kategoria: 5<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: https://www.aliexpress.us/item/3256805424784115.html', 'Nazwa: Szkło hartowane 9H do iPhone 12 z czarnymi ramkami <br/>SKU: pn-1004<br/>Opis: Pełen zestaw, wraz ze specjalnymi prowadnicami<br/>Kategoria: 5<br/>Typ: main_variants<br/>Status: 1<br/>Cena: 12.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://www.aliexpress.us/item/3256805424784115.html', 1, 'Edytowano produkt'),
(890, 1, '2024-12-09 16:04:36', 4, 'producta', 'Produkt: 4 <br/>Status_id: 1', 'Produkt: 4 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(891, 1, '2024-12-09 16:04:59', 4, 'producta', 'Produkt: 4 <br/>Status_id: 3', 'Produkt: 4 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(892, 1, '2024-12-09 16:09:28', 4, 'producta', 'Produkt: 4 <br/>Status_id: 1', 'Produkt: 4 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(893, 1, '2024-12-09 16:12:00', 4, 'producta', 'Produkt: 4 <br/>Status_id: 3', 'Produkt: 4 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(894, 1, '2024-12-09 16:12:57', 4, 'producta', 'Produkt: 4 <br/>Status_id: 1', 'Produkt: 4 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(895, 1, '2024-12-09 16:13:25', 4, 'producta', 'Produkt: 4 <br/>Status_id: 3', 'Produkt: 4 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(896, 1, '2024-12-09 16:13:41', 4, 'producta', 'Produkt: 4 <br/>Status_id: 1', 'Produkt: 4 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(897, 1, '2024-12-09 16:14:02', 4, 'producta', 'Produkt: 4 <br/>Status_id: 3', 'Produkt: 4 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(898, 1, '2024-12-09 16:15:12', 4, 'producta', 'Produkt: 4 <br/>Status_id: 1', 'Produkt: 4 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(899, 1, '2024-12-09 16:16:08', 4, 'producta', 'Produkt: 4 <br/>Status_id: 3', 'Produkt: 4 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(900, 1, '2024-12-09 16:18:59', 5, 'producta', 'Produkt: 5 <br/>Status_id: 1', 'Produkt: 5 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(901, 1, '2024-12-09 16:19:09', 31, 'producta', 'Produkt: 31 <br/>Status_id: 3', 'Produkt: 31 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(902, 1, '2024-12-09 16:19:55', 31, 'producta', 'Produkt: 31 <br/>Status_id: 1', 'Produkt: 31 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(903, 1, '2024-12-09 16:20:02', 5, 'producta', 'Produkt: 5 <br/>Status_id: 3', 'Produkt: 5 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(904, 1, '2024-12-09 16:20:06', 5, 'producta', 'Produkt: 5 <br/>Status_id: 1', 'Produkt: 5 <br/>Status_id: 4', 1, 'Zaktualizowano status'),
(905, 1, '2024-12-09 16:20:24', 5, 'producta', 'Produkt: 5 <br/>Status_id: 4', 'Produkt: 5 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(906, 1, '2024-12-09 16:21:45', 31, 'producta', 'Produkt: 31 <br/>Status_id: 3', 'Produkt: 31 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(907, 1, '2024-12-09 16:21:58', 4, 'producta', 'Produkt: 4 <br/>Status_id: 1', 'Produkt: 4 <br/>Status_id: 4', 1, 'Zaktualizowano status'),
(908, 1, '2024-12-09 16:22:23', 4, 'producta', 'Produkt: 4 <br/>Status_id: 4', 'Produkt: 4 <br/>Status_id: 5', 1, 'Zaktualizowano status'),
(909, 1, '2024-12-09 16:22:35', 4, 'producta', 'Produkt: 4 <br/>Status_id: 5', 'Produkt: 4 <br/>Status_id: 4', 1, 'Zaktualizowano status'),
(910, 1, '2024-12-09 16:23:05', 4, 'producta', 'Produkt: 4 <br/>Status_id: 4', 'Produkt: 4 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(911, 1, '2024-12-09 16:23:08', 4, 'producta', 'Produkt: 4 <br/>Status_id: 3', 'Produkt: 4 <br/>Status_id: 5', 1, 'Zaktualizowano status'),
(912, 1, '2024-12-09 16:23:15', 4, 'producta', 'Produkt: 4 <br/>Status_id: 5', 'Produkt: 4 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(913, 1, '2024-12-09 16:24:59', 53, 'products', 'Produkt: 53 <br/>Status_id: 1', 'Produkt: 53 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(914, 1, '2024-12-09 16:42:43', 4, 'products', 'Produkt: 4 <br/>Status_id: 1', 'Produkt: 4 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(915, 1, '2024-12-09 16:42:47', 4, 'products', 'Produkt: 4 <br/>Status_id: 3', 'Produkt: 4 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(916, 1, '2024-12-16 10:58:50', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(917, 1, '2024-12-16 11:02:32', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(918, 1, '2024-12-16 11:02:53', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(919, 1, '2024-12-16 11:03:19', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(920, 1, '2024-12-16 11:12:28', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(921, 1, '2024-12-16 11:12:39', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 3', 'DOM: 1 <br/>Status_id: 6', 1, 'Zaktualizowano status'),
(922, 1, '2024-12-16 11:13:01', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 6', 'DOM: 1 <br/>Status_id: 7', 1, 'Zaktualizowano status'),
(923, 1, '2024-12-16 11:13:04', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 7', 'DOM: 1 <br/>Status_id: 8', 1, 'Zaktualizowano status'),
(924, 1, '2024-12-16 11:13:15', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 8', 'DOM: 1 <br/>Status_id: 9', 1, 'Zaktualizowano status'),
(925, 1, '2024-12-16 11:14:49', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 9', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(926, 1, '2024-12-16 11:16:06', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(927, 1, '2024-12-16 11:16:10', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 3', 'DOM: 1 <br/>Status_id: 4', 1, 'Zaktualizowano status'),
(928, 1, '2024-12-16 11:16:13', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 4', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(929, 1, '2024-12-16 11:17:06', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(930, 1, '2024-12-16 11:17:22', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(931, 1, '2024-12-16 11:18:59', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(932, 1, '2024-12-16 11:19:27', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 6', 1, 'Zaktualizowano status'),
(933, 1, '2024-12-16 11:19:38', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 6', 'DOM: 1 <br/>Status_id: 4', 1, 'Zaktualizowano status'),
(934, 1, '2024-12-16 11:45:20', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 4', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(935, 1, '2024-12-16 11:45:34', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(936, 1, '2024-12-16 11:45:45', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(937, 1, '2024-12-16 11:46:44', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 3', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(938, 1, '2024-12-16 11:47:19', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 5', 1, 'Zaktualizowano status'),
(939, 1, '2024-12-16 11:48:48', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 5', 'DOM: 1 <br/>Status_id: 8', 1, 'Zaktualizowano status'),
(940, 1, '2024-12-16 11:49:09', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 8', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(941, 1, '2024-12-16 11:49:38', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(942, 1, '2024-12-16 11:50:34', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 3', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(943, 1, '2024-12-16 11:51:38', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 4', 1, 'Zaktualizowano status'),
(944, 1, '2024-12-16 11:53:48', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 4', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(945, 1, '2024-12-16 11:54:12', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(946, 1, '2024-12-16 11:56:24', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(947, 1, '2024-12-16 12:08:25', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 7', 1, 'Zaktualizowano status'),
(948, 1, '2024-12-17 12:19:55', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 7', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(949, 1, '2024-12-17 12:31:18', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 3', 1, 'Zaktualizowano status'),
(950, 1, '2024-12-17 12:35:37', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 3', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(951, 1, '2024-12-17 12:41:38', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(952, 1, '2024-12-17 12:41:53', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(953, 1, '2024-12-17 12:44:10', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 1', 'DOM: 1 <br/>Status_id: 2', 1, 'Zaktualizowano status'),
(954, 1, '2024-12-17 12:44:30', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 2', 'DOM: 1 <br/>Status_id: 5', 1, 'Zaktualizowano status'),
(955, 1, '2024-12-17 13:32:11', 1, 'products_doms', 'DOM: 1 <br/>Status_id: 5', 'DOM: 1 <br/>Status_id: 1', 1, 'Zaktualizowano status'),
(956, 1, '2024-12-18 19:34:34', 54, 'products', '', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single', 2, 'Dodano produkt'),
(957, 1, '2024-12-18 19:37:45', 54, 'product_specs', '', 'Produkt: 54 <br/>Parametr_id: 3<br/>Wartość: US288/ED017', 2, 'Dodano parametr'),
(958, 1, '2024-12-18 19:37:45', 54, 'products', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 5<br/>Cena: 0.00<br/>Allegro: <br/>OLX: <br/>Źródło: ', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 5<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 1, 'Edytowano produkt'),
(959, 1, '2024-12-18 19:38:02', 54, 'product_specs', '', 'Produkt: 54 <br/>Parametr_id: 1<br/>Wartość: brak', 2, 'Dodano parametr'),
(960, 1, '2024-12-18 19:38:02', 54, 'products', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 5<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 5<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 1, 'Edytowano produkt'),
(961, 1, '2024-12-18 19:38:36', 54, 'products', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 5<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 5<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 1, 'Edytowano produkt'),
(962, 1, '2024-12-18 19:38:46', 54, 'product_specs', '', 'Produkt: 54 <br/>Parametr_id: 2<br/>Wartość: 24 miesiące', 2, 'Dodano parametr'),
(963, 1, '2024-12-18 19:40:07', 54, 'product_specs', 'Produkt: 54 <br/>Parametr_id: 1<br/>Wartość: brak', 'Produkt: 54 <br/>Parametr_id: 1<br/>Wartość: brakk', 1, 'Zaktualizowano parametr'),
(964, 1, '2024-12-18 19:40:18', 54, 'product_specs', 'Produkt: 54 <br/>Parametr_id: 1<br/>Wartość: brakk', 'Produkt: 54 <br/>Parametr_id: 1<br/>Wartość: brak', 1, 'Zaktualizowano parametr'),
(965, 1, '2024-12-18 19:42:11', 54, 'product_specs', 'Produkt: 54 <br/>Parametr_id: 1<br/>Wartość: brak', 'Produkt: 54 <br/>Parametr_id: 1<br/>Wartość: brakk', 1, 'Zaktualizowano parametr'),
(966, 1, '2024-12-18 19:42:57', 23, 'Categories_parameters', '', 'Nazwa: Marka <br/>Kategoria filtra: 5 <br/>Priorytet: NULL', 2, 'Dodano parametr produktu'),
(967, 1, '2024-12-18 19:43:11', 23, 'Categories_parameters', 'Nazwa: Marka <br/>Priorytet: ', 'Nazwa: Producent <br/>Priorytet: NULL', 1, 'Zaktualizowano parametr produktu'),
(968, 1, '2024-12-18 19:43:25', 24, 'Categories_parameters', '', 'Nazwa: Dystrybutor <br/>Kategoria filtra: 5 <br/>Priorytet: NULL', 2, 'Dodano parametr produktu'),
(969, 1, '2024-12-18 19:43:42', 25, 'Categories_parameters', '', 'Nazwa: Przeznaczenie <br/>Kategoria filtra: 5 <br/>Priorytet: NULL', 2, 'Dodano parametr produktu'),
(970, 1, '2024-12-18 19:43:52', 25, 'Categories_parameters', 'Nazwa: Przeznaczenie <br/>Priorytet: ', 'Nazwa: Przeznaczenie <br/>Priorytet: 1', 1, 'Zaktualizowano parametr produktu'),
(971, 1, '2024-12-18 19:44:04', 23, 'Categories_parameters', 'Nazwa: Producent <br/>Priorytet: ', 'Nazwa: Producent <br/>Priorytet: 2', 1, 'Zaktualizowano parametr produktu'),
(972, 1, '2024-12-18 19:44:40', 54, 'product_specs', '', 'Produkt: 54 <br/>Parametr_id: 24<br/>Wartość: RGBpc.pl', 2, 'Dodano parametr'),
(973, 1, '2024-12-18 19:44:40', 54, 'product_specs', '', 'Produkt: 54 <br/>Parametr_id: 23<br/>Wartość: URGREEN', 2, 'Dodano parametr'),
(974, 1, '2024-12-18 19:44:41', 54, 'product_specs', '', 'Produkt: 54 <br/>Parametr_id: 25<br/>Wartość: Ładowanie', 2, 'Dodano parametr'),
(975, 1, '2024-12-18 19:44:49', 54, 'product_specs', 'Produkt: 54 <br/>Parametr_id: 1<br/>Wartość: brakk', 'Produkt: 54 <br/>Parametr_id: 1<br/>Wartość: brak', 1, 'Zaktualizowano parametr'),
(976, 1, '2024-12-18 19:46:07', 54, 'products', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 5<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 1<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 1, 'Edytowano produkt'),
(977, 1, '2024-12-18 19:48:41', 54, 'products', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 1<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 1<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 1, 'Edytowano produkt'),
(978, 1, '2024-12-18 19:49:19', 54, 'products', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 1<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 1<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 1, 'Edytowano produkt'),
(979, 1, '2024-12-18 19:50:21', 54, 'products', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 1<br/>Cena: 15.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 'Nazwa: Przewód USB C do USB A 3A 1m URGREEN <br/>SKU: pn-1027<br/>Opis: Złącze USB C do USB A, długość 1m, kolor czarny.<br/>Kategoria: 5<br/>Typ: main_single<br/>Status: 1<br/>Cena: 18.99<br/>Allegro: <br/>OLX: <br/>Źródło: https://pl.aliexpress.com/item/1005006471612403.html', 1, 'Edytowano produkt'),
(980, 1, '2024-12-24 18:54:27', 1, 'users', 'Imię: Gustaw Sołdecki <br/> Email: <br/> Opis: gugisek@gmail.com', 'Imię: Gustaw Sołdecki<br/> Email: gugisek@gmail.com<br/> Opis: debil (main)', 1, 'Edytowano profil użytkownika'),
(981, 1, '2024-12-24 18:55:07', 1, 'users', 'Imię: Gustaw Sołdecki <br/> Email: gugisek@gmail.com<br/> Opis: debil (main)', 'Imię: Gustaw Sołdecki<br/> Email: gugisek@gmail.com<br/> Opis: debil (main) essa', 1, 'Edytowano profil użytkownika'),
(982, 1, '2025-01-14 08:25:36', 1, 'supplayers', 'Nazwa: Aliexpress <br/>Opis: ', 'Nazwa: Aliexpressss <br/>Opis: ', 1, 'Edytowano dostawcę'),
(983, 1, '2025-01-14 08:26:43', 1, 'supplayers', 'Nazwa: Aliexpressss <br/>Opis: ', 'Nazwa: Aliexpress <br/>Opis: ', 1, 'Edytowano dostawcę'),
(984, 1, '2025-01-14 08:29:44', 1, 'supplayers', 'Nazwa: Aliexpress <br/>Opis: ', 'Nazwa: Aliexpressaa <br/>Opis: ', 1, 'Edytowano dostawcę'),
(985, 1, '2025-01-14 09:02:39', 1, 'supplayers', 'Nazwa: Aliexpressaa <br/>Opis: ', 'Nazwa: Aliexpress <br/>Opis: ', 1, 'Edytowano dostawcę'),
(986, 1, '2025-01-14 09:03:17', 1, 'supplayers', 'Nazwa: Aliexpress <br/>Opis: ', 'Nazwa: Aliexpressasd <br/>Opis: ', 1, 'Edytowano dostawcę'),
(987, 1, '2025-01-14 09:04:03', 1, 'supplayers', 'Nazwa: Aliexpressasd <br/>Opis: ', 'Nazwa: Aliexpress <br/>Opis: ', 1, 'Edytowano dostawcę'),
(988, 1, '2025-01-14 09:04:27', 1, 'supplayers', 'Nazwa: Aliexpress <br/>Opis: ', 'Nazwa: Aliexpressasdasdasd <br/>Opis: ', 1, 'Edytowano dostawcę'),
(989, 1, '2025-01-14 09:08:11', 1, 'supplayers', 'Nazwa: Aliexpressasdasdasd <br/>Opis: ', 'Nazwa: Aliexpress <br/>Opis: ', 1, 'Edytowano dostawcę'),
(990, 1, '2025-01-14 09:08:26', 1, 'supplayers', 'Nazwa: Aliexpress <br/>Opis: ', 'Nazwa: Aliexpressasd <br/>Opis: ', 1, 'Edytowano dostawcę'),
(991, 1, '2025-01-14 09:08:38', 1, 'supplayers', 'Nazwa: Aliexpressasd <br/>Opis: ', 'Nazwa: Aliexpress <br/>Opis: ', 1, 'Edytowano dostawcę'),
(992, 1, '2025-01-14 10:20:13', 1, 'supplayers', 'Nazwa: Aliexpress <br/>Opis: ', 'Nazwa: Aliexpressasd <br/>Opis: ', 1, 'Edytowano dostawcę'),
(993, 1, '2025-01-14 10:27:10', 1, 'supplayers', 'Nazwa: Aliexpressasd <br/>Opis: ', 'Nazwa: Aliexpress <br/>Opis: ', 1, 'Edytowano dostawcę'),
(994, 1, '2025-01-14 10:28:06', 1, 'supplayers', 'Nazwa: Aliexpress <br/>Opis: ', 'Nazwa: Aliexpresssdf <br/>Opis: ', 1, 'Edytowano dostawcę'),
(995, 1, '2025-01-14 10:28:26', 1, 'supplayers', 'Nazwa: Aliexpresssdf <br/>Opis: ', 'Nazwa: Aliexpress <br/>Opis: ', 1, 'Edytowano dostawcę'),
(996, 1, '2025-01-14 10:29:04', 1, 'supplayers', 'Nazwa: Aliexpress <br/>Opis: ', 'Nazwa: Aliexpressdf <br/>Opis: ', 1, 'Edytowano dostawcę'),
(997, 1, '2025-01-14 10:29:49', 1, 'supplayers', 'Nazwa: Aliexpressdf <br/>Opis: ', 'Nazwa: Aliexpress <br/>Opis: ', 1, 'Edytowano dostawcę'),
(998, 1, '2025-01-14 10:31:54', 1, 'supplayers', 'Nazwa: Aliexpress <br/>Opis: ', 'Nazwa: Aliexpressad <br/>Opis: ', 1, 'Edytowano dostawcę'),
(999, 1, '2025-01-14 10:32:18', 1, 'supplayers', 'Nazwa: Aliexpressad <br/>Opis: ', 'Nazwa: Aliexpress <br/>Opis: ', 1, 'Edytowano dostawcę'),
(1000, 1, '2025-01-14 10:33:48', 1, 'supplayers', 'Nazwa: Aliexpress <br/>Opis: ', 'Nazwa: Aliexpress <br/>Opis: Chińczyk', 1, 'Edytowano dostawcę');

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
  `order_number` varchar(100) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `client` varchar(200) NOT NULL,
  `client_addres` varchar(200) NOT NULL,
  `client_addres_details` varchar(400) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `invoice_vat` varchar(10) NOT NULL,
  `products_count` int(11) NOT NULL,
  `products_value` int(11) NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `shipping_number` varchar(400) DEFAULT NULL,
  `og_invoice_print_date` datetime DEFAULT NULL,
  `og_invoice_file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `platforms`
--

CREATE TABLE `platforms` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `sku` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `img2` varchar(50) DEFAULT NULL,
  `img3` varchar(50) DEFAULT NULL,
  `img4` varchar(50) DEFAULT NULL,
  `sell_price_brutto` decimal(11,2) NOT NULL,
  `source` text DEFAULT NULL,
  `our_olx` text DEFAULT NULL,
  `our_allegro` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `full_description` text DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `parent_variant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `img`, `img2`, `img3`, `img4`, `sell_price_brutto`, `source`, `our_olx`, `our_allegro`, `category_id`, `description`, `full_description`, `status_id`, `type`, `parent_variant_id`) VALUES
(1, 'Etui różowe na iPhone 14 Plus', 'pn-1001', 'pn-1001.jpg', NULL, NULL, NULL, 29.99, 'https://www.aliexpress.us/item/3256805477811430.html', '', '', 5, '', NULL, 1, '', NULL),
(2, 'Radiator M.2 SSD 5V 3PIN ARGB ', 'pn-1002', 'pn-1002.png', NULL, NULL, NULL, 0.00, 'https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt', NULL, NULL, 1, 'joł', NULL, 1, '', NULL),
(3, 'Etui przezroczyste iPhone 11 slim', 'pn-1003', 'pn-1003.jpg', NULL, NULL, NULL, 0.00, 'https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK', '', '', 1, 'chińczyk XD', NULL, 1, '', NULL),
(4, 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami', 'pn-1004', 'pn-1004.jpg', NULL, NULL, NULL, 12.99, 'https://www.aliexpress.us/item/3256805424784115.html', '', '', 5, 'Pełen zestaw, wraz ze specjalnymi prowadnicami', '', 1, 'main_variants', NULL),
(5, 'Etui przezroczyste iPhone 11', 'pn-1005', 'pn-1005.jpg', NULL, NULL, NULL, 0.00, 'https://www.aliexpress.us/item/3256804512972566.html', NULL, NULL, 1, '', NULL, 1, '', NULL),
(30, 'test', 'pn-1006', '', NULL, NULL, NULL, 0.00, 'ali', NULL, NULL, 1, 'xd', NULL, 1, '', NULL),
(31, 'tescik', 'pn-1007', 'pn-1007.jpg', NULL, NULL, NULL, 0.00, 'test', NULL, NULL, 1, 'test', NULL, 1, '', NULL),
(32, 'op', 'pn-1008', 'pn-1008.jpg', NULL, NULL, NULL, 0.00, 'op', NULL, NULL, 1, 'op', NULL, 3, '', NULL),
(33, 'pl', 'pn-1009', '', NULL, NULL, NULL, 0.00, 'pl', NULL, NULL, 1, 'pl', NULL, 3, '', NULL),
(34, 'ty', 'pn-1010', 'pn-1010.jpg', NULL, NULL, NULL, 0.00, 'ty', NULL, NULL, 1, 'ty', NULL, 1, '', NULL),
(35, 'rf', 'pn-1011', 'pn-1011.jpg', NULL, NULL, NULL, 0.00, 'rf', NULL, NULL, 1, 'rf', NULL, 3, '', NULL),
(36, 'td', 'pn-1012', '', NULL, NULL, NULL, 0.00, '6', NULL, NULL, 1, '5', NULL, 3, '', NULL),
(37, 'oil', 'pn-1013', '', NULL, NULL, NULL, 0.00, '99', NULL, NULL, 1, '99', NULL, 3, '', NULL),
(38, 'ftgyhb', 'pn-1014', '', NULL, NULL, NULL, 0.00, '99', NULL, NULL, 1, '99', NULL, 3, '', NULL),
(39, 'fcghvbjug', 'pn-1015', '', NULL, NULL, NULL, 0.00, 'ty', NULL, NULL, 1, 'ty', NULL, 3, '', NULL),
(40, 'Dobry', 'pn-1016', 'pn-1016.jpg', NULL, NULL, NULL, 0.00, 'fghj', 'ghkj', 'gjhk', 1, 'fghj', NULL, 1, '', NULL),
(41, 'asd', 'pn-1017', '', NULL, NULL, NULL, 0.00, 'asd', 'asd', 'sda', 1, 'asd', NULL, 3, '', NULL),
(42, 'test', 'pn-1018', 'default.png', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 2, 'test', NULL, 5, 'main_single', NULL),
(46, 'imgtest', 'pn-1021', 'default.png', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 2, 'img test', NULL, 5, 'main_single', NULL),
(48, 'tse', 'pn-1023', 'default.png', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 1, 'tse', NULL, 5, 'main_single', NULL),
(49, 'esz', 'pn-1024', 'user_profile.png', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 3, 'esz', NULL, 5, 'main_single', NULL),
(51, 'teste img', 'pn-1025img', 'pn-1025img.png', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 2, 'test img', NULL, 5, 'main_single', NULL),
(52, 'Testcik', 'pn-1025', 'pn-1025.png', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 3, 'to jest test mordko', NULL, 5, 'main_single', NULL),
(53, 'Teścik Wariantów test', 'pn-1026', 'pn-1026_1733315676.png', 'pn-1026.png', 'pn-1026_3_1733316312.png', 'pn-1026_4_1733316379.png', 20.00, 'alie', 'olx', 'allegro', 2, '<p>Warianty to jest to asd</p>', '<p>asd</p>', 3, 'main_variants', NULL),
(54, 'Przewód USB C do USB A 3A 1m URGREEN', 'pn-1027', 'pn-1027.png', NULL, NULL, NULL, 18.99, 'https://pl.aliexpress.com/item/1005006471612403.html', '', '', 5, 'Złącze USB C do USB A, długość 1m, kolor czarny.', '<p><strong>►Fast Charge Protocol</strong></p><p>Charging current up to 3A and support <strong>Quick Charge 3.0/2.0 Huawei FCP/AFC/BC1.2 </strong>charging</p><p>protocol.</p><p><strong>►Enhanced Durability</strong></p><p>Unique aluminum alloy case with the reinforced connector withstand 10000+ plugging and unplugging tests.</p><p>Durable nylon braided cable not only stay tangling-free but also flexible enough to be wrapped up and put in a bag.</p><p><strong>►Fast Data Transfer</strong></p><p>This USB-C to USB A 2.0 fast-charging Cable supports syncing speed up to 480 Mbps.</p><p><strong>►NOTE:</strong></p><p>1.To reach fast charging speed, please ensure your devices support QC3.0/2.0 Huawei FCP/AFC/BC1.2</p><p>fast charging protocol.</p><p>2.The cable doesn\'t support DASH/VOOC/Flash/TURBO fast charging protocol, if your device\'s</p><p>charging protocol is supported as mentioned above and it only can reach normal charging.</p><p>3.This cable is USB-A to USB-C, NOT USB-C to USB-C</p>', 1, 'main_single', NULL);

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
(7, 'ochrony ekranu', 5, NULL),
(11, 'Procesory', 4, NULL),
(12, 'Pamięci RAM', 4, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_doms`
--

CREATE TABLE `product_doms` (
  `id` int(11) NOT NULL,
  `dom_code` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bought_price_brutto` int(11) NOT NULL,
  `sell_price_brutto` int(11) DEFAULT NULL,
  `bought_date` datetime NOT NULL,
  `sell_date` datetime DEFAULT NULL,
  `bought_source_id` int(11) DEFAULT NULL,
  `sell_source_id` int(11) DEFAULT NULL,
  `bought_order_id` int(11) DEFAULT NULL,
  `sell_order_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_doms`
--

INSERT INTO `product_doms` (`id`, `dom_code`, `product_id`, `bought_price_brutto`, `sell_price_brutto`, `bought_date`, `sell_date`, `bought_source_id`, `sell_source_id`, `bought_order_id`, `sell_order_id`, `status_id`) VALUES
(1, 'PN-1004-0001', 4, 20, NULL, '2024-12-04 14:54:08', NULL, 1, NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_parameters`
--

CREATE TABLE `product_parameters` (
  `id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `filter_category_id` int(11) DEFAULT NULL,
  `priority` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_parameters`
--

INSERT INTO `product_parameters` (`id`, `value`, `filter_category_id`, `priority`) VALUES
(1, 'Gwarancja', 0, NULL),
(2, 'Rękojmia', 0, NULL),
(3, 'Kod producenta', 0, NULL),
(5, 'Przeznaczenie', 2, NULL),
(6, 'Typ', 2, '2'),
(7, 'Materiał', 2, NULL),
(8, 'Typ pamięci', 12, NULL),
(9, 'Taktowanie', 12, NULL),
(10, 'Producent', 2, '1'),
(11, 'Producent', 12, '1'),
(12, 'Model', 12, '2'),
(15, 'Test2', 14, '1'),
(23, 'Producent', 5, '2'),
(24, 'Dystrybutor', 5, NULL),
(25, 'Przeznaczenie', 5, '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_specs`
--

CREATE TABLE `product_specs` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `parameter_id` int(11) NOT NULL,
  `value` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_specs`
--

INSERT INTO `product_specs` (`id`, `product_id`, `parameter_id`, `value`) VALUES
(1, 1, 1, '3 miesiące'),
(2, 4, 1, '12 miesięcy'),
(13, 4, 2, '3 lata'),
(14, 4, 3, '12345678'),
(15, 4, 5, 'iPhone 12'),
(16, 4, 7, 'Szkło hartowane'),
(17, 4, 6, 'Ochrona ekranu'),
(18, 4, 10, 'SinChang'),
(19, 53, 1, 'do bramy i sie nie znamy'),
(20, 53, 10, 'Aliebabe'),
(21, 53, 7, 'PLA'),
(22, 53, 6, 'Test'),
(23, 54, 3, 'US288/ED017'),
(24, 54, 1, 'brak'),
(25, 54, 2, '24 miesiące'),
(26, 54, 24, 'RGBpc.pl'),
(27, 54, 23, 'URGREEN'),
(28, 54, 25, 'Ładowanie');

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
(1, 'Dostępne'),
(3, 'Niedostępne'),
(4, 'Wycofane'),
(5, 'Szkic');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc_short` varchar(200) DEFAULT NULL,
  `nip` int(30) NOT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `building` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'quantity_warn_red', '2'),
(2, 'quantity_warn_yellow', '4');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shippings`
--

CREATE TABLE `shippings` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Struktura tabeli dla tabeli `supplayers`
--

CREATE TABLE `supplayers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplayers`
--

INSERT INTO `supplayers` (`id`, `name`, `description`) VALUES
(1, 'Aliexpress', 'Chińczyk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `time_lines`
--

CREATE TABLE `time_lines` (
  `id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `message` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_lines`
--

INSERT INTO `time_lines` (`id`, `object_id`, `object_type`, `create_date`, `user_id`, `type_id`, `message`) VALUES
(1, 1, '0', '2024-12-16 12:49:38', 1, 2, '<b>Zamówiony</b> - zmieniono status'),
(2, 1, 'products_doms', '2024-12-16 12:50:34', 1, 2, '<b>Sprzedany</b> - zmieniono status'),
(3, 1, 'products_doms', '2024-12-16 12:51:38', 1, 2, '<b>W magazynie</b> - zmieniono status'),
(4, 1, 'products_doms', '2024-12-16 12:53:48', 1, 2, '<span class=\"\"><b>Wewnętrzny użytek</b></span> - zmieniono status'),
(5, 1, 'products_doms', '2024-12-16 12:54:12', 1, 2, '<span class=\"text-green-500\"><b>Zamówiony</b></span> - zmieniono status'),
(6, 1, 'products_doms', '2024-12-16 12:56:24', 1, 2, '<span class=\"text-violet-500\"><b>Zamówiony</b></span> - zmieniono status'),
(7, 1, 'products_doms', '2024-12-16 13:08:25', 1, 2, '<span class=\"text-red-500\"><b>Produkt wadliwy</b></span> - zmieniono status'),
(8, 1, 'products_doms', '2024-12-17 13:19:55', 1, 2, '<span class=\"text-green-500\"><b>W magazynie</b></span> - zmieniono status'),
(9, 1, 'products_doms', '2024-12-17 13:31:18', 1, 4, '<span class=\"text-gray-500\"><b>Sprzedany</b></span> - zmieniono status'),
(10, 1, 'products_doms', '2024-12-17 13:35:37', 1, 1, '<span class=\"text-violet-500\"><b>Zamówiony</b></span> - zmieniono status'),
(11, 1, 'products_doms', '2024-12-17 13:41:38', 1, 2, '<span class=\"text-green-500\"><b>W magazynie</b></span> - zmieniono status'),
(12, 1, 'products_doms', '2024-12-17 13:41:53', 1, 1, '<span class=\"text-violet-500\"><b>Zamówiony</b></span> - zmieniono status'),
(13, 1, 'products_doms', '2024-12-17 13:44:10', 1, 2, '<span class=\"text-green-500\"><b>W magazynie</b></span> - zmieniono status'),
(14, 1, 'products_doms', '2024-12-17 13:44:30', 1, 2, '<span class=\"text-orange-500\"><b>Zwrócony do hurtowni</b></span> - zmieniono status'),
(15, 1, 'products_doms', '0000-00-00 00:00:00', 0, 3, 'Test'),
(16, 1, 'products_doms', '0000-00-00 00:00:00', 0, 3, 'Co'),
(17, 1, 'products_doms', '2024-12-17 14:25:33', 0, 3, 'esz'),
(18, 1, 'products_doms', '2024-12-17 14:25:47', 0, 3, 'esz'),
(19, 1, 'products_doms', '2024-12-17 14:26:42', 1, 3, 'esz'),
(20, 1, 'products_doms', '2024-12-17 14:32:00', 1, 3, 'nigaczu'),
(21, 1, 'products_doms', '2024-12-17 14:32:11', 1, 1, '<span class=\"text-violet-500\"><b>Zamówiony</b></span> - zmieniono status'),
(22, 1, 'products_doms', '2024-12-18 09:09:28', 1, 3, 'nigaczu wybieram cie'),
(23, 1, 'products_doms', '2024-12-18 09:39:27', 1, 3, 'pozdro');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `time_line_types`
--

CREATE TABLE `time_line_types` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_line_types`
--

INSERT INTO `time_line_types` (`id`, `name`) VALUES
(1, 'create'),
(2, 'status'),
(3, 'comment'),
(4, 'sell');

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
(1, 'gugisek@gmail.com', 'Gustaw', 'Jerzy', 'Sołdecki', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'gugisek@gmail.com', 2, '2023-06-15 20:55:07', '2024-12-24 18:55:07', 1, 'debil (main) essa', 'Płochociń 16', 'pp-1_1734508643.png', '2024-12-18 09:04:09'),
(7, 'test@test.pl', 'test', NULL, 'test', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'test@test.pl', 1, '2024-11-01 18:13:34', '2024-11-17 13:18:54', 3, 'test', NULL, NULL, '2024-11-01 18:22:40');

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
-- Indeksy dla tabeli `dom_status`
--
ALTER TABLE `dom_status`
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
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `platforms`
--
ALTER TABLE `platforms`
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
-- Indeksy dla tabeli `product_parameters`
--
ALTER TABLE `product_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `product_specs`
--
ALTER TABLE `product_specs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `status_privileges`
--
ALTER TABLE `status_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `supplayers`
--
ALTER TABLE `supplayers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `time_lines`
--
ALTER TABLE `time_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `time_line_types`
--
ALTER TABLE `time_line_types`
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
-- AUTO_INCREMENT for table `dom_status`
--
ALTER TABLE `dom_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

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
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_doms`
--
ALTER TABLE `product_doms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_parameters`
--
ALTER TABLE `product_parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_specs`
--
ALTER TABLE `product_specs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_status`
--
ALTER TABLE `product_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_privileges`
--
ALTER TABLE `status_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplayers`
--
ALTER TABLE `supplayers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `time_lines`
--
ALTER TABLE `time_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `time_line_types`
--
ALTER TABLE `time_line_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
