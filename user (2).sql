-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 04:30 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isu`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `image` varchar(300) NOT NULL,
  `date_posted` date NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `image`, `date_posted`, `user_type_id`, `mobile`, `email`, `approved`, `status`) VALUES
(10, 'admin', '$2y$10$kTWXVgwamPNJov/eC9QfieUmiolPcckjrtqp/rXv90dXCKmVeu5v.', 'dfghjk ghjk', '', '2020-02-02', 1, 0, '', 1, 1),
(11, 'zandro', '$2y$10$kTWXVgwamPNJov/eC9QfieUmiolPcckjrtqp/rXv90dXCKmVeu5v.', 'fghjkl ghjkl;', '', '2020-02-12', 2, 0, '', 1, 1),
(12, 'excusme', '$2y$10$sWvOCzIuuttLPqqNiF/cEO7kWdRTU6fbA0HKbIRQdCRq/.oLojBma', 'excus me', '', '2020-02-12', 2, 0, '', 1, 1),
(13, 'sampler', '$2y$10$3Hxq9zJrbYmEF.d0SWNEvejgsRGJgeAJLnLOoazvLEqEOa3o2a5LC', 'asd asd asda s asd ', '', '2020-02-12', 3, 0, '', 1, 0),
(14, 'sampler', '$2y$10$r1ybvDoGHUs5KevclujsSO3WtyaH/oLGJOxDePCOVwUWk9HCGTbJG', 'asd asd asda s asd ', '', '2020-02-12', 3, 0, '', 1, 1),
(15, 'asdasd', '$2y$10$p6QAD3VkOaqF4nXDBgVNTOeXVnIZXB71aT8A3NWog2slAXzilXwvm', 'asdasd', '', '2020-02-12', 1, 0, '', 1, 1),
(16, 'asdasd', '$2y$10$HxFIGDncXOXQZEnqHD7YWe5NXklW/csMOleu.XeQUMGHGeAAd00m.', 'asdasd', '', '2020-02-12', 1, 0, '', 1, 1),
(17, 'ssssssssss', '$2y$10$aoB4dw4xGv/bEAEBNRReRezvbw82fmCPx7zkA.lGuEQi7UG/6q1hG', 'asdadasdasd a asda', '', '2020-02-12', 3, 0, '', 1, 1),
(18, 'ssssssssss', '$2y$10$DpuoFRY94X0.7fVwgOwCo.8uk9mJUe8JIZ1.Ktl3Eq3CoxAAKWf/6', 'asdadasdasd a asda', '', '2020-02-12', 3, 0, '', 1, 1),
(20, 'alvinmarayag', '$2y$10$HExcI6st.HVOJ9gb1asmNOI3DPFAD4TRjFmjvuj/x0KivtcnjtlZa', 'this is a test', '', '2020-02-12', 1, 0, '', 1, 0),
(21, 'qqqqqqqqq', '$2y$10$nYjwmw14Z9Qh5xQQbeDcWu0ZL3ADxpnHdu190N.KX9lrJUeu4c.By', 'qqqqqqqqq qqqqqqqqq', '', '2020-02-12', 3, 0, '', 1, 1),
(22, 'qqqqqqqqq', '$2y$10$3V/s./wZFws1hqzyPi8Nq.ChIKgQC6Kfu1utVkLLSbQynBlFJnuha', 'qqqqqqqqq qqqqqqqqq', '', '2020-02-12', 3, 0, '', 1, 1),
(23, 'apppp', '$2y$10$gHvjHMJIPv/Zn0MGLwdlC.XYdFdvJKK797vQzDS17Y4vqIx02TXMu', 'asdassdasd', '', '2020-02-12', 3, 0, '', 1, 1),
(24, 'apppp', '$2y$10$eXdkyFdxPxwb.O1U2mMv9ewPg2U3401ysu3vDoUL1JrhAvmtjYqbO', 'asdassdasd', '', '2020-02-12', 3, 0, '', 1, 1),
(25, 'apppp', '$2y$10$u.cdEPBJuyu0mChxHUuJReSzFfw5DYr5Fsh4VcGNrs1NDjca5uqnK', 'fghjklkjh', '', '2020-02-12', 3, 0, '', 1, 1),
(26, 'oooooooooo', '$2y$10$FuHcVghrnJZcOnOQxTQUYuy/eTy/ZfMT1IGqRqE094wXIuva2BYv6', 'iiiiiiiiiii', '', '2020-02-12', 3, 0, '', 1, 1),
(27, 'oooooooooo', '$2y$10$Ih.6UAodV7HiUn6fEvyA4.SIpih160sezAgpeS..5/ZK7ma4kTOly', 'iiiiiiiiiii', '', '2020-02-12', 3, 0, '', 1, 1),
(28, 'kkkkkk', '$2y$10$QypsKr7MDBfp3MTMvcYE9e.yDaVXA0f3xuU1h8LnAsadnEPgTi4QK', 'awer wer wer ', '', '2020-02-12', 3, 0, '', 1, 1),
(29, 'kkkkkk', '$2y$10$P3gz5UCuTXe0cLXHrjZIUeMSxwZxM7rcLFrGthmyJd/pUu8WJqC8K', 'awer wer wer ', '', '2020-02-12', 3, 0, '', 1, 1),
(30, 'hhhhhhhh', '$2y$10$9vKlBQA3UzPaKHDDcxVu/.M.5C/YXiFYb1IOog1HDa5Q8Tn/kj482', 'hhhhhhhhhh', '', '2020-02-12', 3, 0, '', 1, 1),
(31, 'hhhhhhhh', '$2y$10$AM94hCMfSIvy6wfHjxWaQuGYxVeHaw8PtwFYSmayZFhuFGtZUUQ7y', 'hhhhhhhhhh', '', '2020-02-12', 3, 0, '', 1, 1),
(32, 'qqerrer', '$2y$10$Ru7kt31vTam8JTMquxHQCeG0bZdNCnhlunEjbgKXKrumsofr98FfW', 'asdasdasd', '', '2020-02-12', 3, 0, '', 1, 1),
(33, 'qqerrer', '$2y$10$hlcaVglauDBKnt9LC1OQ3u2lJ4eKV/ISlwy7SJzhnnVr9nIKFQQJW', 'asdasdasd', '', '2020-02-12', 3, 0, '', 1, 1),
(34, 'nextpls', '$2y$10$cAAKejWyFIONAc5yLdsgSOyFP0lTp7lYoYIdm4boKGwlgyBNHaRwG', 'adasdasd', '', '2020-02-12', 3, 0, '', 1, 1),
(36, 'sa asd ', '$2y$10$v4LnpR/l.owmGLLueQ1mC.LnhnhrcpWkrCcqqPY89l/8kMO.NfglW', 'asda', '', '2020-02-12', 3, 0, '', 1, 1),
(37, '8888', '$2y$10$iDEvP5C43AYmlbWfm/R0lOJE3Daf9fTjmSD9Pb6HBLhI63wEqP8FK', 'asdasdd', '', '2020-02-12', 3, 0, '', 1, 1),
(38, '8888', '$2y$10$vmfgY683zKpFUxS9kDWCy.GwTIDvByUj0/wu6FEv9hDt/cMkKJytG', 'asdasdd', '', '2020-02-12', 3, 0, '', 1, 1),
(39, 'lastnato', '$2y$10$TE0CcSrxFj6ExNgfm.pslOBdy9buPojTQYjRq82UQFf/bE0.mBNci', 'asdasdasd', '', '2020-02-12', 3, 0, '', 1, 1),
(42, 'alvinm', '$2y$10$kTWXVgwamPNJov/eC9QfieUmiolPcckjrtqp/rXv90dXCKmVeu5v.', 'alvin marayag', '', '2020-02-25', 3, 9978941473, 'avmarayag@gmail.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
