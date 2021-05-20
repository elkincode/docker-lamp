-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 29, 2020 at 09:58 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patients`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_medical` int(11) UNSIGNED NOT NULL,
  `card` int(11) UNSIGNED NOT NULL,
  `NameF` varchar(30) NOT NULL,
  `NameI` varchar(20) DEFAULT NULL,
  `NameO` varchar(20) DEFAULT NULL,
  `birth_day_pat` date DEFAULT NULL,
  `insurance_company` varchar(20) DEFAULT NULL,
  `passport_series` int(11) DEFAULT NULL,
  `passport_number` int(11) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `room` int(11) NOT NULL,
  `diag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_medical`, `card`, `NameF`, `NameI`, `NameO`, `birth_day_pat`, `insurance_company`, `passport_series`, `passport_number`, `mobile_number`, `room`, `diag`) VALUES
(1, 638374, 'Иванов', 'Иван', 'Иванович', '1994-02-19', 'Росгосстрах', 4637, 638492, '+7 (947) 253-73-85', 2, 'Аллергические осложнения'),
(2, 734924, 'Федоров', 'Дмитрий', 'Михайлович', '1997-02-19', 'СОГАЗ', 4612, 674937, '+7 (925) 647-38-56', 5, 'Перелом ноги'),
(3, 362384, 'Каспаров', 'Валентин', 'Владимирович', '1981-02-11', 'Ингосстрах', 4748, 638294, '+7 (999) 637-28-56', 3, 'Воспаление лёгких'),
(4, 468428, 'Александров', 'Михаил', 'Георгиевич', '1995-12-24', 'Ингосстрах', 4537, 645262, '+7 (956) 375-83-65', 7, 'Травма головы');

-- --------------------------------------------------------

--
-- Table structure for table `otz`
--

CREATE TABLE `otz` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `review` text NOT NULL,
  `mark` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otz`
--

INSERT INTO `otz` (`id`, `name`, `review`, `mark`) VALUES
(1, 'Андрей', 'Прекрасная больница и доктора приятные!', 5),
(3, 'Аркадий', 'Спасибо врачам!', 5),
(4, 'Илья', 'Неплохая больница.', 4),
(5, 'Василий', 'Высокая квалификация врачей.', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_medical`);

--
-- Indexes for table `otz`
--
ALTER TABLE `otz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_medical` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `otz`
--
ALTER TABLE `otz`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
