-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 06:52 PM
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
-- Table structure for table `about_tab`
--

CREATE TABLE `about_tab` (
  `id` int(11) NOT NULL,
  `about_tab` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_tab`
--

INSERT INTO `about_tab` (`id`, `about_tab`, `description`, `image`, `date_posted`) VALUES
(1, 'History', '<p>there is no such thng</p>\r\n', 'http://localhost/isu/assets/uploads/images8.jpghttp://localhost/isu/assets/uploads/11.jpg', '2020-02-01'),
(2, 'Misson', '<p>there is no such thng asuchcva sdf asdf asdf asddf asdf adf asdfa sdfa sdf asdf asdf asdf asdf&nbsp;</p>\r\n', 'http://localhost/isu/assets/uploads/images8.jpg', '2020-02-01'),
(4, 'Vision', 'this is the vision', '', '2020-02-13'),
(5, 'GOals and Objectives', 'this is the vision', '', '2020-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `alumnus`
--

CREATE TABLE `alumnus` (
  `id` int(11) NOT NULL,
  `year_graduated` year(4) NOT NULL,
  `course_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `attachment` varchar(200) NOT NULL,
  `date_posted` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `attachment`, `date_posted`, `description`) VALUES
(1, 'asdasd', '', '2020-02-12', '<p>asdadasd</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `date_posted` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `answer`, `date_posted`, `user_id`, `question_id`) VALUES
(2, 'saample answer for forum 2', '2020-02-11', 10, 1),
(3, 'gfhjkl ghjkl;\';kljhvbkl;kjhgghjkl;kjhg', '2020-02-13', 13, 1),
(4, 'gfhjkl ghjkl;\';kljhvbkl;kjhgghjkl;kjhg', '2020-02-13', 13, 1),
(5, 'gfhjkl ghjkl;\';kljhvbkl;kjhgghjkl;kjhg', '2020-02-13', 13, 1),
(6, 'gfhjkl ghjkl;\';kljhvbkl;kjhgghjkl;kjhg', '2020-02-13', 13, 1),
(7, '<p>sample answer</p>\r\n', '2020-02-12', 10, 1),
(8, '<p>sample answer</p>\r\n', '2020-02-12', 10, 1),
(9, '<p>sample na sagot ewan ko ba</p>\r\n', '2020-02-12', 10, 1),
(10, '<p>sampal</p>\r\n', '2020-02-12', 11, 1),
(11, '<p>test</p>\r\n', '2020-02-12', 10, 2),
(12, '<h1>gjgjgjgjgjgj</h1>\r\n', '2020-02-12', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course`, `image`, `description`, `date_posted`) VALUES
(1, 'BSIT-Bachelor of Science in', 'http://localhost/isu/assets/image/knife.jpg', 'asd fasdf asdf asdf asdf asdf sdf ', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `element`
--

CREATE TABLE `element` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(200) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `element`
--

INSERT INTO `element` (`id`, `name`, `image`, `description`, `attachment`, `date_posted`) VALUES
(3, 'banner', 'http://localhost/isu/assets/img/11.jpg', '<p>aaaaaaaaaaaaaa</p>\r\n', '', '2020-02-01'),
(4, 'banner', 'http://localhost/isu/assets/uploads/images9.jpg', '<p>asdasd</p>\r\n', '', '2020-02-01'),
(5, 'element14', 'http://localhost/isu/assets/uploads/1.jpg', '<p>area51</p>\r\n', '', '2020-02-02'),
(6, 'asd asd', 'http://localhost/isu/assets/uploads/1.jpg', '<p>asd asd&nbsp;</p>\r\n', '', '2020-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `image` varchar(200) DEFAULT NULL,
  `attachment` varchar(300) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `image`, `attachment`, `status`, `date_posted`) VALUES
(1, 'ghjkl', '<p>asd asd</p>\r\n', 'http://localhost/isu/assets/uploads/des.PNG', NULL, 'active', '2020-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `date_posted` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `date_posted`, `user_id`) VALUES
(1, '<p>this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question this is a sample question x asd asd&nbsp;</p>\r\n', '2020-02-12', 11),
(2, '<p>sample question 2s</p>\r\n', '2020-02-11', 10),
(3, '<p>this is another sample</p>\r\n', '2020-02-12', 0),
(4, '<p>this is another sample</p>\r\n', '2020-02-12', 0),
(5, '<p>wlang kwen</p>\r\n', '2020-02-12', 0),
(6, '<p>sampling</p>\r\n', '2020-02-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `author` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `reference_type_id` int(11) NOT NULL,
  `attachment` varchar(200) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference_type`
--

CREATE TABLE `reference_type` (
  `id` int(11) NOT NULL,
  `reference_type` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_type`
--

INSERT INTO `reference_type` (`id`, `reference_type`, `description`) VALUES
(1, 'E- Books', ''),
(2, 'Journals', '');

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE `stat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stat`
--

INSERT INTO `stat` (`id`, `user_id`, `user_ip`, `date_posted`) VALUES
(1, 10, '::1', '2020-02-13'),
(2, 0, '::1', '2020-02-13'),
(3, 11, '::1', '2020-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `traccer`
--

CREATE TABLE `traccer` (
  `id` int(11) NOT NULL,
  `item` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(200) NOT NULL,
  `traccer_type_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `traccer_type`
--

CREATE TABLE `traccer_type` (
  `id` int(11) NOT NULL,
  `traccer_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traccer_type`
--

INSERT INTO `traccer_type` (`id`, `traccer_type`) VALUES
(1, 'RESEARCH'),
(2, 'EXTENSION'),
(3, 'TRAINING AND CERTIFICATION'),
(4, 'PARTNERS');

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
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `image`, `date_posted`, `user_type_id`) VALUES
(10, 'admin', '$2y$10$kTWXVgwamPNJov/eC9QfieUmiolPcckjrtqp/rXv90dXCKmVeu5v.', 'dfghjk ghjk', '', '2020-02-02', 1),
(11, 'zandro', '$2y$10$hUY0iejHqjjdreonTTkBHu65C4rQbiNLid2gcOzFLyvRLr856Tz9e', 'fghjkl ghjkl;', '', '2020-02-12', 2),
(12, 'excusme', '$2y$10$sWvOCzIuuttLPqqNiF/cEO7kWdRTU6fbA0HKbIRQdCRq/.oLojBma', 'excus me', '', '2020-02-12', 2),
(13, 'sampler', '$2y$10$3Hxq9zJrbYmEF.d0SWNEvejgsRGJgeAJLnLOoazvLEqEOa3o2a5LC', 'asd asd asda s asd ', '', '2020-02-12', 3),
(14, 'sampler', '$2y$10$r1ybvDoGHUs5KevclujsSO3WtyaH/oLGJOxDePCOVwUWk9HCGTbJG', 'asd asd asda s asd ', '', '2020-02-12', 3),
(15, 'asdasd', '$2y$10$p6QAD3VkOaqF4nXDBgVNTOeXVnIZXB71aT8A3NWog2slAXzilXwvm', 'asdasd', '', '2020-02-12', 1),
(16, 'asdasd', '$2y$10$HxFIGDncXOXQZEnqHD7YWe5NXklW/csMOleu.XeQUMGHGeAAd00m.', 'asdasd', '', '2020-02-12', 1),
(17, 'ssssssssss', '$2y$10$aoB4dw4xGv/bEAEBNRReRezvbw82fmCPx7zkA.lGuEQi7UG/6q1hG', 'asdadasdasd a asda', '', '2020-02-12', 3),
(18, 'ssssssssss', '$2y$10$DpuoFRY94X0.7fVwgOwCo.8uk9mJUe8JIZ1.Ktl3Eq3CoxAAKWf/6', 'asdadasdasd a asda', '', '2020-02-12', 3),
(19, 'putangna', '$2y$10$GYPuwBd4db3vjF3ErnT5ne3c2kmLc8tA58vGe4wLF33Ey1t8DGPEq', 'asdfas d', '', '2020-02-12', 3),
(20, 'alvinmarayag', '$2y$10$HExcI6st.HVOJ9gb1asmNOI3DPFAD4TRjFmjvuj/x0KivtcnjtlZa', 'this is a test', '', '2020-02-12', 1),
(21, 'qqqqqqqqq', '$2y$10$nYjwmw14Z9Qh5xQQbeDcWu0ZL3ADxpnHdu190N.KX9lrJUeu4c.By', 'qqqqqqqqq qqqqqqqqq', '', '2020-02-12', 3),
(22, 'qqqqqqqqq', '$2y$10$3V/s./wZFws1hqzyPi8Nq.ChIKgQC6Kfu1utVkLLSbQynBlFJnuha', 'qqqqqqqqq qqqqqqqqq', '', '2020-02-12', 3),
(23, 'apppp', '$2y$10$gHvjHMJIPv/Zn0MGLwdlC.XYdFdvJKK797vQzDS17Y4vqIx02TXMu', 'asdassdasd', '', '2020-02-12', 3),
(24, 'apppp', '$2y$10$eXdkyFdxPxwb.O1U2mMv9ewPg2U3401ysu3vDoUL1JrhAvmtjYqbO', 'asdassdasd', '', '2020-02-12', 3),
(25, 'apppp', '$2y$10$u.cdEPBJuyu0mChxHUuJReSzFfw5DYr5Fsh4VcGNrs1NDjca5uqnK', 'fghjklkjh', '', '2020-02-12', 3),
(26, 'oooooooooo', '$2y$10$FuHcVghrnJZcOnOQxTQUYuy/eTy/ZfMT1IGqRqE094wXIuva2BYv6', 'iiiiiiiiiii', '', '2020-02-12', 3),
(27, 'oooooooooo', '$2y$10$Ih.6UAodV7HiUn6fEvyA4.SIpih160sezAgpeS..5/ZK7ma4kTOly', 'iiiiiiiiiii', '', '2020-02-12', 3),
(28, 'kkkkkk', '$2y$10$QypsKr7MDBfp3MTMvcYE9e.yDaVXA0f3xuU1h8LnAsadnEPgTi4QK', 'awer wer wer ', '', '2020-02-12', 3),
(29, 'kkkkkk', '$2y$10$P3gz5UCuTXe0cLXHrjZIUeMSxwZxM7rcLFrGthmyJd/pUu8WJqC8K', 'awer wer wer ', '', '2020-02-12', 3),
(30, 'hhhhhhhh', '$2y$10$9vKlBQA3UzPaKHDDcxVu/.M.5C/YXiFYb1IOog1HDa5Q8Tn/kj482', 'hhhhhhhhhh', '', '2020-02-12', 3),
(31, 'hhhhhhhh', '$2y$10$AM94hCMfSIvy6wfHjxWaQuGYxVeHaw8PtwFYSmayZFhuFGtZUUQ7y', 'hhhhhhhhhh', '', '2020-02-12', 3),
(32, 'qqerrer', '$2y$10$Ru7kt31vTam8JTMquxHQCeG0bZdNCnhlunEjbgKXKrumsofr98FfW', 'asdasdasd', '', '2020-02-12', 3),
(33, 'qqerrer', '$2y$10$hlcaVglauDBKnt9LC1OQ3u2lJ4eKV/ISlwy7SJzhnnVr9nIKFQQJW', 'asdasdasd', '', '2020-02-12', 3),
(34, 'nextpls', '$2y$10$cAAKejWyFIONAc5yLdsgSOyFP0lTp7lYoYIdm4boKGwlgyBNHaRwG', 'adasdasd', '', '2020-02-12', 3),
(35, 'putanginangyan', '$2y$10$OhxMpMNzsdQ/4PpKBPSqAebxQfdNpWC8.EltdvELE3lx5BwzhAnBe', 'asdadassdassd a', '', '2020-02-12', 3),
(36, 'sa asd ', '$2y$10$v4LnpR/l.owmGLLueQ1mC.LnhnhrcpWkrCcqqPY89l/8kMO.NfglW', 'asda', '', '2020-02-12', 3),
(37, '8888', '$2y$10$iDEvP5C43AYmlbWfm/R0lOJE3Daf9fTjmSD9Pb6HBLhI63wEqP8FK', 'asdasdd', '', '2020-02-12', 3),
(38, '8888', '$2y$10$vmfgY683zKpFUxS9kDWCy.GwTIDvByUj0/wu6FEv9hDt/cMkKJytG', 'asdasdd', '', '2020-02-12', 3),
(39, 'lastnato', '$2y$10$TE0CcSrxFj6ExNgfm.pslOBdy9buPojTQYjRq82UQFf/bE0.mBNci', 'asdasdasd', '', '2020-02-12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`, `date_posted`) VALUES
(1, 'admin', '2020-02-01'),
(2, 'student', '2020-02-01'),
(3, 'teacher', '2020-02-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_tab`
--
ALTER TABLE `about_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumnus`
--
ALTER TABLE `alumnus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `element`
--
ALTER TABLE `element`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_type`
--
ALTER TABLE `reference_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traccer`
--
ALTER TABLE `traccer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traccer_type`
--
ALTER TABLE `traccer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_tab`
--
ALTER TABLE `about_tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alumnus`
--
ALTER TABLE `alumnus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `element`
--
ALTER TABLE `element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reference_type`
--
ALTER TABLE `reference_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stat`
--
ALTER TABLE `stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `traccer`
--
ALTER TABLE `traccer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `traccer_type`
--
ALTER TABLE `traccer_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
