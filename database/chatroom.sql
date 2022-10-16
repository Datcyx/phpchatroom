-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 02:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `countmessage`
--

CREATE TABLE `countmessage` (
  `id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL,
  `value` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countmessage`
--

INSERT INTO `countmessage` (`id`, `room`, `value`) VALUES
(176, 'IT ROOM', 156),
(177, 'NERD ROOM', 0),
(178, 'NERD ROOM1', 0),
(179, 'Lobby', 24),
(180, 'Troll', 1),
(181, 'Troll2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`, `password`) VALUES
(1, 'IT ROOM', 'THIS IS FOR IT PEOPLE', ''),
(2, 'NERD ROOM', 'FOR NERD PEOPLE', ''),
(3, 'NERD ROOM1', 'FOR NERD PEOPLE', ''),
(4, 'Lobby', 'Website Lobby', ''),
(5, 'Troll', 'Website Lobby', ''),
(7, 'Troll2', 'Website Lobby', '');

-- --------------------------------------------------------

--
-- Table structure for table `room_member`
--

CREATE TABLE `room_member` (
  `id` int(11) NOT NULL,
  `members_username` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_member`
--

INSERT INTO `room_member` (`id`, `members_username`, `room`) VALUES
(4, 'datzine', 'IT ROOM'),
(67, 'test user', 'Lobby'),
(68, 'test user', 'NERD ROOM1'),
(70, 'test user', 'NERD ROOM'),
(73, 'test user', 'Troll2'),
(77, 'test user', 'IT ROOM'),
(78, '', 'LOBBY'),
(80, 'cyberz', 'LOBBY'),
(81, 'cyberz', 'NERD ROOM'),
(82, 'cyberz', 'IT ROOM'),
(83, 'datzine', 'NERD ROOM'),
(84, 'john', 'LOBBY'),
(85, 'datzine', 'Troll'),
(86, 'test user', 'Troll'),
(87, 'john', 'Troll'),
(90, 'datzine', 'LOBBY'),
(91, 'datzine', 'NERD ROOM1'),
(92, 'john', 'Troll2'),
(103, 'kekenboduts1', 'NERD ROOM'),
(105, 'kekenboduts1', 'Lobby'),
(106, 'kekenboduts1', 'IT ROOM'),
(107, 'ahmer', 'LOBBY'),
(108, 'ahmer', 'NERD ROOM'),
(109, 'ahmer', 'NERD ROOM1'),
(110, 'ahmer', 'IT ROOM'),
(111, 'ahmer1', 'LOBBY'),
(116, 'ahmer1', 'NERD ROOM'),
(123, 'ahmer1', 'IT ROOM'),
(124, 'ahmer1', 'Troll2'),
(125, 'ahmer1', 'NERD ROOM1'),
(126, 'ahmer1', 'Troll'),
(128, 'kekenboduts1', 'Troll2');

-- --------------------------------------------------------

--
-- Table structure for table `seem`
--

CREATE TABLE `seem` (
  `id` int(11) NOT NULL,
  `messages_id` int(255) NOT NULL DEFAULT 0,
  `who` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'datzine', '$2y$10$xVQS0.OJ/fUzxhg00Fqv.uJwzmniBlw0r1w8XJo8vmve1XMAMj6N.', '2022-10-02 03:05:39'),
(2, 'cyberz', '$2y$10$doa.SzztlAVKj1pQCyf5reVap4hlcUgg9I6QL5tnwfqOdExEleu/m', '2022-10-02 03:20:47'),
(3, 'john', '$2y$10$s16iWlkrwWB7pXJ1MtNBseCixncUEIMxvxTuYGjqrEbE3TaO/G4Aq', '2022-10-02 11:57:32'),
(4, 'kekenboduts1', '$2y$10$SKg6g3PoKlcsWmKIQEEYqOEGcsh4RiS7zuV7mblEi90OfKeq9wYgG', '2022-10-15 13:14:55'),
(5, 'ahmer', '$2y$10$LF29fkLr0W9u7ZKN/rFHm.Q3ga5ZuFPMnkfo9fo2E/bdT8RTVMnqC', '2022-10-15 20:12:28'),
(6, 'ahmer1', '$2y$10$kG0EKD8mvYHteeu.ke5LV.yChSOCwR0.54xEGCyCC3skeJhcSJ4sG', '2022-10-15 20:58:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countmessage`
--
ALTER TABLE `countmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_member`
--
ALTER TABLE `room_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seem`
--
ALTER TABLE `seem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countmessage`
--
ALTER TABLE `countmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room_member`
--
ALTER TABLE `room_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `seem`
--
ALTER TABLE `seem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6422;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
