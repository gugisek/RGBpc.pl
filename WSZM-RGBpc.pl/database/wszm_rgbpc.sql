-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 15, 2023 at 07:56 PM
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
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `sur_name` text NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `mail` text DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `sur_name`, `pswd`, `mail`, `role_id`, `create_date`, `update_date`, `status_id`) VALUES
(1, '58c4258120c2663e502468794f3e3aa314bf966f837200e1aa3e9c50b428f870', 'Gustaw', 'Sołdecki', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'gugisek@gmail.com', 1, '2023-06-15 14:33:21', '2023-06-15 12:42:07', 1),
(2, 'c77f0e9e17b362249ecf5924db1d033a8e3eeb215c667dd91851d6d5a2cd26ad', 'Kacper', 'Korus', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '123kakor56@gmail.com', 1, '2023-06-15 13:32:41', '2023-06-15 11:32:41', 1),
(3, '03f03be21462b76ccb5fb7e5319ef1e6f44ac328cf1750b581fcb7710aec3d8a', 'Jakub', 'Strzelczak', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'kubastrzelczak@gmail.com', 1, '2023-06-14 20:01:07', '2023-06-14 18:01:07', 1),
(4, 'gu', 'gustaw', 'sldecki', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'gug@', 2, '2023-06-15 15:06:37', '2023-06-15 16:28:24', 1),
(5, 'asd', 'asd', 'asd', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'asd', 1, '2023-06-15 15:07:14', '2023-06-15 13:07:14', 1),
(6, 'gustaw', 'rtg', 'dg', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'dfg', 1, '2023-06-15 15:07:52', '2023-06-15 13:07:52', 1),
(7, '6152d43caa491abea69c0001c468166366618867baf85f1f5fc9b26e00966a24', 'gu', 'gu', '6152d43caa491abea69c0001c468166366618867baf85f1f5fc9b26e00966a24', 'gu', 2, '2023-06-15 18:21:32', '2023-06-15 16:24:26', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL,
  `description` varchar(100) DEFAULT NULL
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
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'unactive'),
(3, 'disabled'),
(4, 'banned');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeksy dla tabeli `user_roles`
--
ALTER TABLE `user_roles`
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `user_status` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
