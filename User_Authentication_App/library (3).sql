-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2022 at 01:48 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookauthors`
--

CREATE TABLE `bookauthors` (
  `author_id` int(10) UNSIGNED NOT NULL,
  `Author_name` varchar(80) NOT NULL,
  `Age` text NOT NULL,
  `Genre` varchar(80) NOT NULL,
  `bookID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookauthors`
--

INSERT INTO `bookauthors` (`author_id`, `Author_name`, `Age`, `Genre`, `bookID`) VALUES
(13, 'Vikram Seth', '68yrs', 'Genre', 1),
(14, 'Abu\'l-Fazi ibn Mubarak', 'deceased', 'Biography', 4),
(15, 'Philip Zimbardo', '87yrs', 'Psychology', 5),
(16, 'Jane Austen', 'deceased', 'Novel', 8),
(17, 'J.M. Coetzee', '81yrs', 'Novel', 15);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `BookName` varchar(150) NOT NULL,
  `BookYear` int(11) NOT NULL,
  `Genre` varchar(80) NOT NULL,
  `AgeGroup` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `BookName`, `BookYear`, `Genre`, `AgeGroup`) VALUES
(1, 'The Tale Of Melon City', 1981, 'Poetry', '16 year olds and above'),
(2, 'The Humble Administrator\'s Garden', 1985, 'Poetry', '18 year olds and above'),
(3, 'All You Who Sleep Tonight', 1990, 'Poetry', '18 year olds and above'),
(4, 'Akbamama', 2011, 'Biography', '18 year olds and above'),
(5, 'The Cognitive Control of Motivation', 1969, 'Psychology', '18 year olds and above'),
(6, 'Stanford prison experiment: A stimulation study of the psychology of imprisonment', 1972, 'Psychology', '18 year olds and above'),
(7, 'Influencing Attitudes and Changing Behavior', 1969, 'Psychology', '18 year olds and above'),
(8, 'Sense and Sensibility', 1811, 'Novel', '12 year olds and above'),
(9, 'Pride and Prejudice', 1813, 'Novel', '14 year olds and above'),
(10, 'Mansfield Park', 1814, 'Novel', 'Adult Fiction'),
(11, 'Emma', 1815, 'Novel', 'Children Fiction'),
(12, 'Northanger Abbey', 1818, 'Novel', 'Teenage Fiction'),
(13, 'Persuasion', 1818, 'Novel', 'Adult Fiction'),
(14, 'Lady Susan', 1871, 'Novel', 'Adult Fiction'),
(15, 'The Childhood of Jesus', 2013, 'Novel', '12 to 15 year olds'),
(16, 'The Schooldays of Jesus', 2016, 'Novel', '8 to 10 year olds'),
(17, 'The Death of Jesus', 2019, 'Novel', '12 to 17 year olds'),
(18, 'Sunrise', 2017, 'Novel', '20 year olds and above'),
(19, 'The Journey', 2017, 'Novel', '18 years and above'),
(20, 'Life lessons', 2015, 'Novel', '18 years and above');

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`id`, `email`, `code`, `expire`) VALUES
(1, 'simangaalapha@gmail.com', '75610', 1667833153);

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `id` int(5) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `firstname` varchar(80) DEFAULT NULL,
  `surname` varchar(80) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `surname`, `password`, `date_created`) VALUES
(4, 'simangaalapha@gmail.com', 'Alapha', 'Simanga', '$2y$10$000xUF6sw8kauGKoStyb7uKdOqv2ZCovYZdmD5.4qVGWM/0DGT/e.', '2022-11-07 12:48:53'),
(6, 'simangaalapha@gmail.com', '', '', '$2y$10$j6ecllI/d9ZvMZYNLpLhSePNgosPp6CO2t8n8XGMzBdggJxhnvkeu', '2022-11-07 12:08:04'),
(7, 'simangaalapha@gmail.com', 'Alapha', 'Simanga', '$2y$10$j6ecllI/d9ZvMZYNLpLhSePNgosPp6CO2t8n8XGMzBdggJxhnvkeu', '2022-11-07 12:08:04'),
(8, 'simangaalapha@gmail.com', 'Alapha', 'Simanga', 'e1348acde28b28836ab16b4497846669', '2022-11-07 12:40:14'),
(9, 'simangaalapha@gmail.com', 'Alapha', 'Simanga', 'c13367945d5d4c91047b3b50234aa7ab', '2022-11-07 15:07:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookauthors`
--
ALTER TABLE `bookauthors`
  ADD PRIMARY KEY (`author_id`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookauthors`
--
ALTER TABLE `bookauthors`
  MODIFY `author_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `librarians`
--
ALTER TABLE `librarians`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookauthors`
--
ALTER TABLE `bookauthors`
  ADD CONSTRAINT `bookauthors_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `books` (`bookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
