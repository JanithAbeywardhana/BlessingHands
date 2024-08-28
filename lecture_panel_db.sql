-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 11:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lecture_panel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminregisterform`
--

CREATE TABLE `adminregisterform` (
  `id` int(11) NOT NULL,
  `Admin_Name` varchar(255) NOT NULL,
  `Admin_Phone_Number` varchar(20) NOT NULL,
  `Admin_Email` varchar(30) NOT NULL,
  `Admin_Password` varchar(20) NOT NULL,
  `admin_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adminregisterform`
--

INSERT INTO `adminregisterform` (`id`, `Admin_Name`, `Admin_Phone_Number`, `Admin_Email`, `Admin_Password`, `admin_option`) VALUES
(2, 'Chameera Kavinda', '0753997655', 'chameera145@gmail.com', '145', 'Admin for Management'),
(5, 'Jeewanthi Samaranayaka', '0812361534', 'blessinghands@gmail.com', 'blessing1', 'Admin for Academy');

-- --------------------------------------------------------

--
-- Table structure for table `caregivers`
--

CREATE TABLE `caregivers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `availability` varchar(10) DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caregivers`
--

INSERT INTO `caregivers` (`id`, `name`, `expertise`, `description`, `image`, `availability`) VALUES
(1, 'Namal Kumara', 'Pediatrics', 'Expert in child healthcare with over 15 years of experience.', 'IMG_5994.jpg', 'Not Availa'),
(2, 'Niluma Kumari', 'Geriatrics', 'Specialist in elderly care, focused on improving the quality of life for seniors.', 'IMG_5990.jpg', 'Avilable'),
(3, 'Lakshitha Wikramasinghe', 'Mental Health', 'Licensed therapist specializing in cognitive behavioral therapy.', 'IMG_5998.jpg', 'Avilable');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `image`) VALUES
(1, 'Blood Cannula', 'The blood cannulation course teaches safe IV insertion techniques In the world.', 'blood.jpg'),
(2, 'Nurse Assisters', 'The Nurse Assisters course trains individuals to support nurses...', 'nurse.jpg'),
(3, 'Pharmacy', 'The pharmacy course focuses on medication management...', 'pharmarcy.jpg'),
(4, 'Dementia', 'Care strategies for those affected, including understanding and...', 'dementia.jpg'),
(5, 'Clinical Nurse Leader', 'The Clinical Nurse Leader course improves nursing leadership...', 'nurseleader.jpg\r\n'),
(6, 'Chronic disease management', 'Strategies for prevention, treatment, and care...', 'charonic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackform`
--

CREATE TABLE `feedbackform` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedbackform`
--

INSERT INTO `feedbackform` (`id`, `full_name`, `email`, `message`) VALUES
(1, 'chameera', 'chameer@gmail.com', 'very good'),
(3, 'jeewa', 'jeewa@gmail.com', 'Good Work'),
(4, 'Blessing Hand Admin', 'admin11@gmail.com', 'Great work'),
(5, 'Blessing Hand Admin', 'admin11@gmail.com', 'there good');

-- --------------------------------------------------------

--
-- Table structure for table `findcareerform`
--

CREATE TABLE `findcareerform` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `findcareerform`
--

INSERT INTO `findcareerform` (`id`, `name`, `birth`, `address`, `email`, `phone`, `gender`, `filename`) VALUES
(2, 'cvcvvc', '2004-10-05', 'no:33', 'aaa@gmail.com', '11', 'male', '222.png'),
(3, 'Samidi Wikramasingha', '2004-06-15', 'No:122 C,Sigiriya rd,Sigiriya', 'samididulsha@gmail.com', '0771234567', 'female', 'DuEn.jpg'),
(4, 'vandersay', '2000-07-09', 'No:122 C,Sigiriya rd,Sigiriya', 'samididulsha@gmail.com', '0771234567', 'female', 'chaleEn.jpg'),
(5, 'kamal', '0200-09-12', 'No:122 C, Kandy rd,Kandy', 'kamal@gmail.com', '0771234567', 'male', '1Md.jpg'),
(6, 'Sunila', '2001-07-14', 'No:8,gannoruwa,colombo', 'sunilasunila@gmail.com', '07123456', 'female', 'GkEn.jpg'),
(7, 'Amara Jyarathna', '1997-09-12', 'No:87/2, Gampaha', 'Amara13@gmail.com', '0812342626', 'male', 'figter.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `index`
--

CREATE TABLE `index` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `index`
--

INSERT INTO `index` (`id`, `name`, `birth`, `address`, `email`, `phone`, `gender`, `filename`) VALUES
(1, 'new cha', '0000-00-00', 'bodood', 'van@gmail.com', '636663', 'male', 'chaleEn.jpg'),
(2, 'chameera', '0200-05-13', 'No:33/2, pilalawala south,Kandy', 'chameer513@gmail.com', '071431245', 'male', 'adpercent.png');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `name`, `expertise`, `description`, `image`) VALUES
(1, 'Dr. Janith Rangana', 'Advanced Nursing Practices', 'Dr. Smith specializes in the latest advancements in nursing practices...', 'janith.jpg'),
(2, 'Dr. John Doe', 'Healthcare Technology', 'Dr. Doe focuses on cutting-edge healthcare technologies...', 'lecturer2.jpg'),
(3, 'Dr. Emily Johnson', 'Patient-Centered Care', 'Dr. Johnson explores strategies for delivering patient-centered care...', 'lecturer3.jpg'),
(4, 'Dr.Bhanuka', '10 years', 'zX zhxbzhxhzxbhxbjzxbzhjbxjzzzx', 'img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registerform`
--

CREATE TABLE `registerform` (
  `id` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registerform`
--

INSERT INTO `registerform` (`id`, `UserName`, `PhoneNumber`, `Email`, `Password`) VALUES
(2, 'chameera', '07812347', 'chameer@gmail.com', '11'),
(3, 'chameera', '07812347', 'chameer@gmail.com', '11'),
(9, 'cahlith', '0789556666', 'chaliyababa2@gmail.com', '12'),
(10, 'cahlith', '0789556666', 'chaliyababa2@gmail.com', '12'),
(11, 'hasjan bandara', '075234567', 'hashan@gmail.com', 'hashan'),
(12, 'ban', '075399234', 'cga1m@gmail.com', '1'),
(13, 'Umesh', '078123425', 'umeesh@gmail.com', 'umesh'),
(14, 'amal jayawikrama', '07231415', 'amal12@gmail.com', 'amal12');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `firstname`, `lastname`, `email`, `course_id`, `registration_date`) VALUES
(1, 'janith', 'rangana', 'janithrangana@gmail.com', 1, '2024-07-16 11:32:43'),
(2, 'chamodi', 'nipunika', 'chamodi@gmail.com', 4, '2024-07-16 11:38:39'),
(3, 'bhanuka', 'kaveesh', 'bhanukakaveesh@gmail.com', 6, '2024-07-16 13:38:40'),
(4, 'Dilum', 'Kalhara', 'dilum@gmail.com', 1, '2024-07-16 14:08:39'),
(5, 'vinupa', 'mandinu', 'vinua@gmail.com', 6, '2024-07-16 14:10:47'),
(6, 'Sunil', 'Abeywardhana', 'sunil@gmail.com', 4, '2024-07-16 14:16:16'),
(7, 'Chameera', 'Kavinda', 'chameera@gmail.com', 4, '2024-07-16 14:20:08'),
(8, 'manisha', 'jayathilaka', 'manisha@gmail.com', 5, '2024-07-16 14:26:07'),
(9, 'waruni', 'wijesinghe', 'waruni@gmail.com', 4, '2024-07-16 14:33:31'),
(10, 'Nimnadi', 'Abeysinghe', 'Nimmi@gmail.com', 5, '2024-07-16 14:46:36'),
(11, 'Buddi', 'Abeysinghe', 'Buddi@gmail.com', 5, '2024-07-16 15:06:05'),
(12, 'Buddi', 'Abeysinghe', 'Buddi@gmail.com', 5, '2024-07-16 15:06:09'),
(13, 'Buddi', 'Abeysinghe', 'Buddi@gmail.com', 5, '2024-07-16 15:06:13'),
(14, 'Buddi', 'Abeysinghe', 'Buddi@gmail.com', 5, '2024-07-16 15:06:14'),
(15, 'Buddi', 'Abeysinghe', 'Buddi@gmail.com', 5, '2024-07-16 15:06:15'),
(16, 'Buddika', 'Abenayana', 'Buddika@gmail.com', 5, '2024-07-16 15:06:59'),
(17, 'Kveesha', 'maduhansi', 'kaveesha@gmail.com', 4, '2024-07-16 15:08:33'),
(18, 'Rangana', 'Abey', 'Rangan@gmail.com', 4, '2024-07-16 15:19:46'),
(19, 'Nimashi', 'nethra', 'Nimashi@gmail.com', 6, '2024-07-16 15:25:12'),
(20, 'Ravindu', 'Wickramasinghe', 'ravindu@gmail.com', 4, '2024-07-16 16:00:40'),
(21, 'maneesha', 'jayathilaka', 'maneesah@gmail.com', 1, '2024-07-18 08:35:06'),
(22, 'Ahen', 'BOss', 'ashen@gmail.com', 4, '2024-07-18 08:45:17'),
(23, 'chalith', 'wikramasinghe', 'chalith@gmail.com', 1, '2024-07-18 08:51:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminregisterform`
--
ALTER TABLE `adminregisterform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caregivers`
--
ALTER TABLE `caregivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbackform`
--
ALTER TABLE `feedbackform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `findcareerform`
--
ALTER TABLE `findcareerform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index`
--
ALTER TABLE `index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registerform`
--
ALTER TABLE `registerform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminregisterform`
--
ALTER TABLE `adminregisterform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `caregivers`
--
ALTER TABLE `caregivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbackform`
--
ALTER TABLE `feedbackform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `findcareerform`
--
ALTER TABLE `findcareerform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `index`
--
ALTER TABLE `index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registerform`
--
ALTER TABLE `registerform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
