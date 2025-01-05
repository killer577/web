-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2024 at 03:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `place` text NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT 'none',
  `viewed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `name`, `gender`, `age`, `address`, `phone`, `email`, `subject`, `date`, `place`, `description`, `image_path`, `viewed`) VALUES
(2, 'Madan', 'Male', 25, '45/B nethuryur road, puducherry, tamilnadu-612002.', '9042747877', 'someone@prathap.com', 'Product', '2024-08-31', 'In my streetlight shutdown daily night so i request you to grant me leave for two days.', 'hai of the define as thhe poewr of the union of thhe question of the accomoostion youth juior quesatioin jkmonitore.', 'none', 1),
(9, 'Prakash', 'Male', 20, '34/f anna nagar, puducherry, tamil nadu-612022', '98452245585', '11111@gmail.com', 'Other', '2024-08-31', 'nedutherula en vtu pakkathula.', 'continously dalily this problem come to disturb people so i request you grant me fix the issue.', 'none', 1),
(10, 'M.Dhanush', 'Male', 40, 'anna nagar, chennai', '9042747877', '11111@gmail.com', 'Product', '2024-09-01', 'swamaimalai main road, east kottaiyur, kumbakonam', 'daily this problem come to disturb common people so i request you to grant me solve the issue.', 'none', 1),
(14, '234234', 'Male', 34234234, '234234234', '234234234', '234234234@gmail.com', 'Product', '2024-09-01', '234234234', '234234234234', 'none', 1),
(18, 'M.prathap', 'Male', 2147483647, '123123123123kh12 3j132 1kl2j3 1j321k 32 1j32 1j32jj1 23 12 3 123 12 3 12j3u1 1 23', '97917022352', 'Prathghapstd@gmial.com', 'Service', '2024-09-01', '38/B, Swamimalai main Road, East kottaiyur, kumbakonam.', '234 23 42 34 23 4 234 we r we rw er werwe rw erwerw erwer werwe rwer wer  wer wer wer wer wer werwer mwer werwer wer wer wer wer we rwe rw erw er werwerwe rwe rwerw er werwe rwe rwer we rwerwerwer werwerwer werwerwe rwer werw erwer wer ewrw er wer w er wer w er wer  wer we r wer w er werwerfdf,jsdfof the rujnfionf qruwserion prawtha union monitor envieom .', 'none', 1),
(19, 'M.Dhanush', 'Male', 123123, '123123123', '123123', '123123@gmial.com', 'Product', '2024-09-01', '123123', '1231231', 'none', 1),
(20, 'Prakash MM', 'Male', 27, 'prathap swamimalai main road, east kottaiyur, kumbakonam.', '9042747877', 'prdathapstd@gmalil.com', 'Service', '2024-09-01', 'therkutheru en vtula.', 'daily this problem isue come to disturb people so i request you to grant solve the issue.', 'none', 1),
(21, 'M Subash', 'Male', 21, 'swer qwe r qwe rqwerqwerqwerqwre qwerqwre qwer qewr qwerq .', '9874562135', 'jkajdsfjla@gmauil.com', 'Product', '2024-09-01', 'prdaqthh asis a drfind fdof hte .', 'daily this issue faace preaple dauly so i quest you to grant me sove the issue.', 'none', 1),
(23, '1111111', 'Male', 1111111, '1111111', '111111', '1111@gmail.com', 'Product', '2024-09-01', 'prdathap is a define', 'jewellery.', 'uploads/66d45066deece.png', 1),
(24, '2', 'Female', 324, '43', '43', 'Prathapstd@gmail.com', 'Other', '2024-09-01', 'gfh', '45', 'uploads/66d454dbbf860.png', 1),
(25, '32', 'Female', 323, '232', '32', '11111@gmail.com', 'Product', '2024-08-31', '32', '32', 'uploads/66d455c0cf681.png', 1),
(26, '56', 'Male', 65, '56', '65', '11111@gmail.com', 'Other', '2024-08-30', '76', '567', 'uploads/66d4570d3cc28.png', 1),
(31, 'Vijay', 'Male', 30, 'sdf asd fa sdf asdfasdfas dfasdf asdfsd fsdf sdf sdf sdfs dfsdf sdf sdf sdf sdf.', '985245555', 'qwer@gmail.com', 'Product', '2024-09-03', 'nethru opposoie house .', 'this problem daily face peaple so i request you to grant me fix the problem.', 'none', 1),
(32, 'Vinoth', 'Other', 56, 'prathpais a define as the pwoer', '9042747877', 'qwe@gmail.com', 'Other', '2024-09-04', 'prathp is  ade fijna sof t so e3 quest of tthe power ', 'prathpa is a definas thie ', 'none', 1),
(35, 'Vikarm', 'Male', 40, 'anna nagar chennai vesarpadi pincode- 612002.', '9784562543', 'uiop@gmail.com', 'Other', '2024-09-04', 'Velacherry,main road, east street, chennai-200000302', 'daily this problem come to disturb peoples so i request you to grant me solve the issues.', 'none', 1),
(41, 'Sri Akash', 'Male', 23, 'prdatsdfjksd fasjdf sadjf asd fa sdklf asd f asd kfk as dfjjas df s f a sdf  asd f sad f a sdf  asdf  asd f asd f asd fs f a sdf  asdf a sdf as df as df as df sa df sa df asdf  sadf  asd f as df ', '1233455678', '324@gmail.com', 'Product', '2024-09-04', '789456123 123123123  1231231eqwsdre asdasd asd asd asd  asdasdasda sd asdasdasdasd asdasdasdasd asdasdasdas dasdasd asdasdasda sdasdasd asdasdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasdasd asdasdasd asdasdasda sdasdasdasd asdasdasdasd asdasdasd asdasdasdas dasdasdasdasd asdasdasda sdasdasdas dasdasdasd asdasdasda .', 'sdasdasd asdasd asd asdas dasdasdasd asdas dasdasd asdasdasd asdasdas d.', 'none', 1),
(42, 'Rani', 'Male', 23, 'dfsadfdf  f drfsadfasdfa gdsfgdsfgsd dfgdsfgsdef dfsgdsfgsdfgds erfgsdfgsdfg fdgsdfgdsfgsd fgsdfgdsfg sdfgsdfgsdefg dsfgsdfgds.', '234345456678', '324@gmail.com', 'Other', '2024-09-04', 'dfsadfasdf sadfsadfsadf sadf sadf  sadfs adf a sdfasdfsad fsadfas df as dfsa df.', 'fasdfasdfasdf  sadfasdfasdfas dfasdfasdf sadfasdfsa dfsadfasdf asdfasdfasdf asdfasdfasdfsa dfasdfasdfsadf.', 'none', 1),
(43, 'Palani', 'Female', 25, 'asdf asdfasdfasdf asdfasd  fsadfa sdfasdf asdf asdfa sdfa asdf sdfa dsf af swdf sadf asdf sadf asdf asdf asdf asdf asdf asd.', '12343545667', '324@gmail.com', 'Other', '2024-09-04', '2312312312312 31231 2312 3123 123 1231 3.', '1231231231231231231231 2312312 n3123 123123 12 31 23 123 1 23 123 12 312 3 123 12 3 123.', 'none', 1),
(44, 'Janani', 'Female', 23, 'pdrathapst sami malai main road, East kottaiyur, Kumbakonam.', '9791702235', '324@gmail.com', 'Other', '2024-09-05', 'prathap union junior question kingdom liright youtuh question juniion prathap is a define.', 'youtube is  a drigger register complaint Details.', 'none', 1),
(45, 'Praveen', 'Female', 24, '38/B swamimalai main road, East Kottaiyuyr, Kumbakonam-612002.', '9546821327', '324@gmail.com', 'Product', '2024-09-05', 'Anna nagay, puducherry main road, pomndicherry', 'pratha[ is adefinew ganesh juniotrnquestiokmn liom bhabnaa.', 'none', 1),
(46, 'Krishna', 'Male', 34, 'Prathpa is a define as the pwoer of the definity of the phopjne id.', '958465712', 'prathapstd2@gmail.com', 'Product', '2024-09-05', 'prathap is adefinekingfom lion question youtube heoghtn qi not pra.', 'prdathap is a defina S', 'none', 1),
(47, 'Dinesh', 'Other', 25, 'prathap is a derfina as the power of the define', '954846524154', 'prathapstd2@gmail.com', 'Product', '2024-09-05', 'kjhdsf aisdfasjhdjkfjhsadf sadfjhkasdfasd f.', 'pratha id i sdfjlkasjdf sld f.', 'none', 1),
(48, 'Kane Willison', 'Female', 23, 'prathgaoib si of defie junoir kindgo,', '97947155865', '12232@gmail.com', 'Product', '2024-09-05', 'pratrhap is adrefine jujniotr nqyestiom liomomitor education junior qusetion.', 'prathap is a define as the register fill your details.', 'none', 1),
(49, 'M.prathap', 'Male', 22, 'prathap swamimalai main road east kottaiyur, kumbakoanm', '9042747877', 'prathapstd2@gmail.com', 'Product', '2024-09-05', 'dsfsdafsad fasdfasdf sadfsadfsda fasdfasdf asdfasdfb  asdfasdf asdfasfd asdfsadf asdfasd f.', 'prathap is a define as tyhe definitiion of thgge power.', 'none', 1),
(50, 'Ifra', 'Male', 2131, '12312rewfd', '9458522', 'asredas@gmail.com', 'Product', '2024-09-12', 'prathap sinadefine', 'prayhapjkdhasj', 'uploads/66d992f392991.jpg', 1),
(51, 'Afris', 'Male', 23, 'dfsadfasd fasldfsad fsadf asdfasd fsadf asdfasd fasdf sdfa msdfas dfa sdf asdfsadf asdfasdf asdf asdf asdf asdf asdf .', '987585456', 'ret@gmial.com', 'Product', '2024-09-05', 'prdathgap is a define as the power of the generation.', 'prathap is adefunbenjuniore questiomn prstha[p is adefuinenjuniore quyestion.', 'none', 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_name`, `uploaded_on`) VALUES
(56, 'earrings.jpg', '2024-09-05 13:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_content`, `created_at`) VALUES
(1, 'tyhfd', '2024-09-02 10:41:36'),
(2, 'Hai..bro', '2024-09-02 10:51:11'),
(3, 'dei...', '2024-09-02 11:35:53'),
(4, 'azar', '2024-09-02 13:13:36'),
(5, 'ente5r\r\n', '2024-09-03 05:25:41'),
(6, 'dei kamneti....', '2024-09-03 05:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `news_updates`
--

CREATE TABLE `news_updates` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_updates`
--

INSERT INTO `news_updates` (`id`, `content`, `created_at`) VALUES
(44, 'prathap is a define as the power of the define as the backspace as the enter admin dashboard.', '2024-09-05 13:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'prathapstd2@gmail.com', '$2y$10$RIgGOvIJR12elviXAueT0uqj1fV.5815l1SemaSSvMgmc3RVtT/ue'),
(2, '234234234234', '$2y$10$8tdzXr82ERMw6xnFnHcFK.LEMRZ1D8wK2HdvcSiDsiXL7ODgBxd3S'),
(3, '2', '$2y$10$67Ae1Ybl.QiSWp32OoQnLOjn8IRkTkVRb29NNmMhp134ojUFGiZ6q'),
(4, 'prathap123@gmail.com', '$2y$10$kXcV4wxgKEWY5lovHoA0lOFqloEmLHM49BnLPgu5U2f7LGqK9psOa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_updates`
--
ALTER TABLE `news_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_updates`
--
ALTER TABLE `news_updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
