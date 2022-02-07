-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2022 at 12:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitfam-gta-dummy`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `accessory_id` int(11) NOT NULL,
  `accessory_name` varchar(255) NOT NULL,
  `accessory_stock` int(11) NOT NULL,
  `accessory_price` int(11) NOT NULL,
  `accessory_stars` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`accessory_id`, `accessory_name`, `accessory_stock`, `accessory_price`, `accessory_stars`) VALUES
(4, 'Accessory 1', 5, 10, 0.2),
(8, 'Accessory 2', 5, 10, 0.2),
(12, 'Accessory 3', 5, 10, 0.2),
(16, 'Accessory 4', 5, 10, 0.2),
(20, 'Accessory 5', 5, 10, 0.2),
(24, 'Accessory 6', 5, 10, 0.2),
(28, 'Accessory 7', 5, 10, 0.2),
(32, 'Accessory 8', 5, 10, 0.2),
(36, 'Accessory 9', 5, 10, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `current_price` int(11) NOT NULL,
  `current_stars` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `type` varchar(255) NOT NULL,
  `depreciation` int(11) NOT NULL,
  `stars` float NOT NULL,
  `round_check` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`type`, `depreciation`, `stars`, `round_check`) VALUES
('HATCHBACK', 8, 0.95, 1),
('SEDAN', 11, 1.1, 1),
('SPORT', 14, 1.25, 1),
('SUV', 5, 0.8, 1),
('VINTAGE', -28, -1.35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `transaction_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `mileage` float NOT NULL,
  `engine` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  `torque` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `stars` float NOT NULL,
  `price` int(11) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model_name`, `mileage`, `engine`, `power`, `torque`, `type`, `stars`, `price`, `image`) VALUES
(1, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1Uojce4ooQM5esifxamFdzQrCGjbNJstS/view?usp=sharing'),
(2, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/19UVaHdkpg_EKBydycHAXu-Vj7n0eHaHw/view?usp=sharing'),
(3, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1KvlYPQ-SQHFTEj5qttWVHkwq4vAq57vK/view?usp=sharing'),
(4, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1vEdbs5WMe6_EQokOKwtOM3T7LIpX7tWy/view?usp=sharing'),
(5, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1v7TpDahsSfQwynG5SnvULBgXgtoeG5UJ/view?usp=sharing'),
(6, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1v9POv0MT8fsaCmpJog8xJTJzuJ4Bdg9m/view?usp=sharing'),
(7, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1v4i5O_6NOAo561vqphK_K97jgd9NxuJr/view?usp=sharing'),
(8, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1vC41BoN8evWZr_Y8FeGqrrv6SgVEkBAG/view?usp=sharing'),
(9, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1vAH_qudddmI-ieyRs5rm7f1Z561k8sbS/view?usp=sharing'),
(10, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1qQwXe6eYUctCU9q1yLd3N9yInz70Ejde/view?usp=sharing'),
(11, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1ApzBg0yJSzeRiFavhpo3kIsrgHGHq4lx/view?usp=sharing'),
(12, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1KovCofIST5vYq5nI0R_HrOulqrmD7N7T/view?usp=sharing'),
(13, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/18ZGCqT2cvd2hICejs5prxKmXf8Nx1qlW/view?usp=sharing'),
(14, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/13M58N0kXadrLt9qXbdOKlB-81sDsFpNC/view?usp=sharing'),
(15, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1NXrGDzOrxs3JADVClpF2sLQaEV28fYim/view?usp=sharing'),
(16, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1MTqkAHP11Ke2a3jGstkinyvQaty1HM9M/view?usp=sharing'),
(17, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1KbdtdHUOBvQlcd3iZQB-lEmzI3v7Wv4e/view?usp=sharing'),
(18, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1VueG8ugllXRlIPHTbaB9w6gfSOn3U3TK/view?usp=sharing'),
(19, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1Bwcw7IA7celiYyCHxyeNrnYHu6PlrqAV/view?usp=sharing'),
(20, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1c3_EZ1lutDwaL-6RjwUuwlhs-5qQxsqW/view?usp=sharing'),
(21, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1i5ET1tktWmQmuQhVwR_sA2zXyKbEwPSL/view?usp=sharing'),
(22, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/143NfhvIK3kWm-gDa3S2A9t_nyxTB8wSU/view?usp=sharing'),
(23, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/15-h-aSylrvrYnq_RAngBN_E_ld5VXHny/view?usp=sharing'),
(24, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1OKoA03MgLyw3wQtvwQ2A2dFg8lG6y6sH/view?usp=sharing'),
(25, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1WHkhR-D7szkPp3e78UOyHWTLW7suOpJ5/view?usp=sharing'),
(26, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1sr0I_6KaBj4NK40UD-AZ0LOKSoD0z45v/view?usp=sharing'),
(27, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1eMf0oKRLoZopiq5eK7TPE3FhA1uNIj0N/view?usp=sharing'),
(28, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1arcq852Ygz-7aLHS8tjve86x-jiRG8aI/view?usp=sharing'),
(29, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1tJSgfhk3ERsxighDGb9Gjm5_ouEJ_k3x/view?usp=sharing'),
(30, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1yXhMS7yWVyWgJjdt757V5ocpoMW7-VaM/view?usp=sharing'),
(31, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1-vgoF0f3r4lDmPwzD1DrDpnJc9XHBuur/view?usp=sharing'),
(32, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1Eg8seQoxMqSIo5aC0QhEdc1_JWpDQ722/view?usp=sharing'),
(33, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1IJRsjMs1PRVNlTwkO04zzMY5NTLhJRfy/view?usp=sharing'),
(34, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/16QojPaV61kSx18CF2E8EOWXjva0digLz/view?usp=sharing'),
(35, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1nDj0oBK2n1rWqvU9ZcmYQXM9FdFnPkk1/view?usp=sharing'),
(36, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1CLaakZeyPcR0b9beJFCIifEj5mQrc3VR/view?usp=sharing'),
(37, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/11xwHT2oKyeLc4wUW7ElITEdV9hdoGIl9/view?usp=sharing'),
(38, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1rYGOomVlagncaZfnw6E0OzKvwCWc8BP2/view?usp=sharing'),
(39, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1LdeB2T_bgM0FTKYOXRRXYBvgtXbZUH2s/view?usp=sharing'),
(40, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1SU7UPJ1pOUKTRa6ZYF9I4wBrOpO0Pvp-/view?usp=sharing'),
(41, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1zk-MBo9F2pVeAKfW0MoCNeIkHazr4qUC/view?usp=sharing'),
(42, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1Mkel3yQHE4Fe3EYJIyP3rXbQRV2sTyT2/view?usp=sharing'),
(43, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1deMKoIs42qARrQihuOZg4ENV8HMlfl98/view?usp=sharing'),
(44, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1p1PanOAq92jpOdhsQktMEgD1YpUm3NFv/view?usp=sharing'),
(45, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/16QojPaV61kSx18CF2E8EOWXjva0digLz/view?usp=sharing'),
(46, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1GNxBJ0tzZUx4MxnqrO578J2R2cq6tC20/view?usp=sharing'),
(47, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/15fhrnjrbWX_QVjN3XhAvcAKgo2RIEibg/view?usp=sharing'),
(48, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1RvOTW4Q4wm5QtbB2XHrKbGmiTYxgJHmC/view?usp=sharing'),
(49, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1kawvWNyhmauIllbEopI7NifrE1VmrLht/view?usp=sharing'),
(50, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1NuF-e_DHsa7sH1F1sQD1JbWFJGM4luvI/view?usp=sharing'),
(51, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1U5k7tLw-KZL0nnbCcg1o3TjC1SBxA5le/view?usp=sharing'),
(52, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1_CZOlEIbeKpdTjvuA0TeGV2UiVuh3smJ/view?usp=sharing'),
(53, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1QCjECwV9jSEW-6W9DLiMuwUT_3stG9UN/view?usp=sharing'),
(54, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1X5WFfZ0kx43cCsKo4r9fTxcq_F-_f-R3/view?usp=sharing'),
(55, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1aceO4Du98TNWRzUq56Tg-hf2Y5_c07q8/view?usp=sharing'),
(56, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1GrHgTVnnkrmQayYglraqOIe4_MYJ7h5q/view?usp=sharing'),
(57, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1YyBjIjhvJLCWQ5kZ-suNZKRSE4d5_eKK/view?usp=sharing'),
(58, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/16OG8cz77yFYkGpflRB5jxeIot3imiUbj/view?usp=sharing'),
(59, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1TWaAGJz8MuW5wdlCaMqwlitIb3valD_I/view?usp=sharing'),
(60, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1-vgoF0f3r4lDmPwzD1DrDpnJc9XHBuur/view?usp=sharing'),
(61, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/11wr_OQkE17a0kAOEEzC8tRJPJYMh_JxU/view?usp=sharing'),
(62, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1yr5HEI7lc5o1e6ENPHNIAfhLvtFyXN-O/view?usp=sharing'),
(63, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1AtK7a6Vu4WQAhzYEH2cdFHTqEEpkeI61/view?usp=sharing'),
(64, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1-fIu73cGZaOCBux13BVGa-y0KA7NkSuj/view?usp=sharing'),
(65, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1zLNiMVdYnAI-5G31jTe0SOGFFUFaCtU_/view?usp=sharing'),
(66, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1GTREX7C4JTqK27uv-F9gSp51-Uw96aSf/view?usp=sharing'),
(67, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/16cUgJ7LYRRI_FcRR3c_kVAcER0lEgFTx/view?usp=sharing'),
(68, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1rdpZo7wTFHqNxgEQzwn3C6abIkFoq4Q7/view?usp=sharing'),
(69, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1XwHUpIBkGm66rkYmUFbG46ofgM5hjwzg/view?usp=sharing'),
(70, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1bXt9flDA_mvKLpX4DgmI_mEZGv6bLkOT/view?usp=sharing'),
(71, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/10N_RN98JzRlQFNtwWm8YajahXxQ4xlql/view?usp=sharing'),
(72, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1jFhx-N79lraDcmACFFtFAH5lDCx0WWat/view?usp=sharing'),
(73, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1t6U9_kPsmE4hvoasyZv26dRKac0io2qr/view?usp=sharing'),
(74, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/17neUo59rxxMJ09lAu_mhLDyHPEu2Whxz/view?usp=sharing'),
(75, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1chBtfvifJ5l1_WQ-NZAWzjG34GeSnpFJ/view?usp=sharing'),
(76, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/16eg8QQG3wuZo60W_mrefx8JmJtS9jmdE/view?usp=sharing'),
(77, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1nT9fEWWG7nybTvCHFZ1D5RhMtberUWgV/view?usp=sharing'),
(78, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1vGSaK0Dbo7iWwaWUoTyhX_w6U_lLImMI/view?usp=sharing'),
(79, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1jiTqRlZFq8lwv-hB9Tvgiq6DObVLpc3X/view?usp=sharing'),
(80, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1_KQzOD9sIspqzwV0uZg7yTCdtEvcZ8j7/view?usp=sharing'),
(81, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1EJIiJs0EdemB1opSSGpRbU2PAEvIt6Y9/view?usp=sharing'),
(82, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1llWiwrpmg7IOeebpiDfgrH-hPBo4Z6BP/view?usp=sharing'),
(83, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1rrJqt7MeVv7yZavjWhWJXLH7E0uQElgH/view?usp=sharing'),
(84, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/12M3uK3APqktucbmOIlzvc_YcHKy1f5UO/view?usp=sharing'),
(85, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1vS3m8Zb6K-K7cTuzm2O1vMsW7hGy2V5J/view?usp=sharing'),
(86, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/121WTspERj-d-1Ha1c8qvHka4w_g3LP_y/view?usp=sharing'),
(87, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1Gfi7xzx2-gLiGrJoMvk6PZ2RmD0o7EeS/view?usp=sharing'),
(88, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1NgojhHPKC9xE4jKw_ZKpnf6h4alOcom5/view?usp=sharing'),
(89, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1_G1oyPZOKMWqEwqKT9viUmKVdkJ7AqlY/view?usp=sharing'),
(90, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1dhtE6upuGIblysqjLslNRC_Ngu8EmF-F/view?usp=sharing'),
(91, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1rcyMK27hHqN6s6fGp6wJhJurr4OeR-Mk/view?usp=sharing'),
(92, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1rYYv8rbX82y0WngRCTU_n8w7j4XBQq6v/view?usp=sharing'),
(93, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1sL2BMey_CPFsR-WkCKT-wxzdKXZvzbW2/view?usp=sharing'),
(94, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1sOZpjhkiZonzosY0JfnNbA3YQfW-uZmR/view?usp=sharing'),
(95, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1s7xzOWdKr-U5eIBcWeMVHhU_A7juaHCe/view?usp=sharing'),
(96, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1sOLtCHlUPpIHAX4HudWIYcYGwosuE1wh/view?usp=sharing'),
(97, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1sIwWFG336-WdJVxsHLizM9KNgG5tNaaq/view?usp=sharing'),
(98, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1sGTUr4atnEi1G_5kn4tShxcr6HnfvBWH/view?usp=sharing'),
(99, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1sRO6suKd68fKHfjIiQ-9mAieIZLQ6tUA/view?usp=sharing'),
(100, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1rbfftZB8Xw5fTc2muSKV9Pk6qkxlB1Ch/view?usp=sharing'),
(101, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1s5ARNCC9KJpyLrJ1XJvCMUQfEx_h5hHj/view?usp=sharing'),
(102, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1ruufH-7vEjK1-LxtUh9LRK6TyhT1oHL6/view?usp=sharing'),
(103, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1W4F_lOGVbkVoM9WPt4qKFlDr_UecvyWf/view?usp=sharing'),
(104, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1NfJ0X3YUQJda9GI2n5bCvLDKKAN8UsBT/view?usp=sharing'),
(105, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1cXfqg4mAJl2kHbroUsuE2B9vY5xXWeoH/view?usp=sharing'),
(106, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1Bf-Qvt4I4EsPiAASrBodUpLMdQnvqYf5/view?usp=sharing'),
(107, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/14rts-oloe83JGqRFKgz9EeLH13GTqBsE/view?usp=sharing'),
(108, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1x4Kxkdh4wvVOYftZQ-cqiR_aOVbCGlvC/view?usp=sharing'),
(109, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1GZrNjQVY-sZWCr_fdtEzZVODQBU6qjUH/view?usp=sharing'),
(110, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1rXGGmasIDl442bVIS7KfUiwtbzhW7k4Q/view?usp=sharing'),
(111, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1-k-OAl0A8ikYbQicer5G2dw9QxWOPuSh/view?usp=sharing'),
(112, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1qEHyeqn8Nsh6eEl97ci7_ZAmwJRwZ_lB/view?usp=sharing'),
(113, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1oCj6XVzSoy4OjeBsNwCKvQmP4tjlktXR/view?usp=sharing'),
(114, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1ncf4PaFRHXSzD3_58W83RocVT4KFkglv/view?usp=sharing'),
(115, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1EVyiq3gHschj5ynVVKe9U0sffBA89Cai/view?usp=sharing'),
(116, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/199LtLH1DUCyVdmKig6oHZqZfDW9EdHuZ/view?usp=sharing'),
(117, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1LV7gaHXljmHSERNkR4JC6YrFvysyEQWi/view?usp=sharing'),
(118, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/19v4wKQacctidhrrbkmb_jvRizgrvRUDN/view?usp=sharing'),
(119, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1zZDH3Oxvg6HlG5sDmyv9K_uGYEJh4Bwn/view?usp=sharing'),
(120, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1Mia7gb0jTrd9jjWdciUzQYR4VItTcjxd/view?usp=sharing'),
(121, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1Khxrq7MrUJIVKaR4okUdLiUkpRjcq_Yw/view?usp=sharing'),
(122, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1HS8LnbadSuDXnp4JoWGs8g_ix5DOWrDU/view?usp=sharing'),
(123, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/19BTdmphydhUHXD3PDINbuhpI5QfVVuDu/view?usp=sharing'),
(124, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1U2EmtCoKuA3YlZMSkeOsdzHik4C7mEdG/view?usp=sharing'),
(125, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1jRKDb_HJkQKHMbUbDtbrR6UGAWQZ1ox8/view?usp=sharing'),
(126, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/12HGdV21VcviQumyJKVO2B2NpvtOdnsaf/view?usp=sharing'),
(127, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1WYmg2j2wvtNZyZ27FNV8BGw8o8s6fMhK/view?usp=sharing'),
(128, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1HPlEcNlzmEamy0sfTEnWUo1xFxcICQVP/view?usp=sharing'),
(129, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1zw8_Pw4ewe7aupMolf6Yi7PmbHhXvO-X/view?usp=sharing'),
(130, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1WqnadqxWZ61wg-gI13xUf-sgCzZAYt03/view?usp=sharing'),
(131, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1VkKGpnMJxhbu7dayr_tCfVxsAlp8yNvj/view?usp=sharing'),
(132, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1UzsW0staFve2j7CJ5EMHGVSnndidXmru/view?usp=sharing'),
(133, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1I6p1qjALx8wfPVqEwuRETqJmwtqdSTcC/view?usp=sharing'),
(134, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1MeRZfjRqPJgbzLQZHlTbo6wWJcoCHe9x/view?usp=sharing'),
(135, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1YNy0kW6wVuAFedOrQxa6fT-LNYcaMhpK/view?usp=sharing'),
(136, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1RmAD64bO8DedPusgTRbZkaIsEtoPVhoa/view?usp=sharing'),
(137, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/15zNY7X5pWEguHU6_3Xm9YbOTGLXLR9mO/view?usp=sharing'),
(138, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/16z7C6h6o9vLKntHh5mgFizg48UYbM0TW/view?usp=sharing'),
(139, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1nkXj4MsmnLgiT3COGrSGp8fXq2-7M-qC/view?usp=sharing'),
(140, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1YLwj1EeHaWKU8BqS3FHgvBDsrrC0ZSU-/view?usp=sharing'),
(141, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1CdUbsF32X80bWuY2Z3_GmdX-O22Dbotg/view?usp=sharing'),
(142, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1E0p95S6pRq_uZDqzD_MuOfDfbYTPLKbJ/view?usp=sharing'),
(143, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/116-o84XbAFyHMWr4LdV9bIsW6ZKADR__/view?usp=sharing'),
(144, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1-iRVquQcSiSWJAZOsrwriXKFioUFtvGf/view?usp=sharing'),
(145, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1aiUE5MXOROBrEyY51zrA5eJngPHMfA-3/view?usp=sharing'),
(146, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1-mRIWhBl3flcOrbPxKaL4JhC5gQ9FxS5/view?usp=sharing'),
(147, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1KR5ngYjk1xeNmDLse_OxJu_K6KEOMqK0/view?usp=sharing'),
(148, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1Yp-f6kfYz8OBmBDAvnjK57RbsDY6xP8N/view?usp=sharing'),
(149, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1E5ifc5ojHq5iqxPrcJFie_mxd_S_CAv8/view?usp=sharing'),
(150, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1-ESMMvs2OyiAgaRyRNXQqZYoUKO6VqYx/view?usp=sharing'),
(151, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1qwxkPM3aEGs7vqnsKiRJpW8xurJ9f6hI/view?usp=sharing'),
(152, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1M0Q2ALVzH3BNF1K0ywekIPE32hlOvsLx/view?usp=sharing'),
(153, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1J96e93QYT1P3JtxrSI7ZwolV7ICJ7I8Y/view?usp=sharing'),
(154, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/16zBsLduRr1GqLohgl4DA0iWFYis4lW-s/view?usp=sharing'),
(155, 'Car', 10, 10, 10, 10, 'SUV', 5, 20, 'https://drive.google.com/file/d/1uynPeWL56cTGndjMvx1CLMarwfPFxO3R/view?usp=sharing'),
(156, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1Opv0-GOw-7AHSgcdGORxgQkWXkMDmM4w/view?usp=sharing'),
(157, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1y30K4C-lmeKo8u0-2fIoCBrj0VudvURL/view?usp=sharing'),
(158, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1QhnqnpzOKuQQJtGWE6YjspEe_BPDsB-Q/view?usp=sharing'),
(159, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1coccXWC4jTyK0raRjcmbfCD-1SPyba-v/view?usp=sharing'),
(160, 'Car', 10, 10, 10, 10, 'HATCHBACK', 5, 20, 'https://drive.google.com/file/d/1FbxJogHfzvQNj55le3FjOMUFvxlIruMY/view?usp=sharing'),
(161, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1NWujfbvUzMw8jHWqjtDdWhkgSX0BjaPO/view?usp=sharing'),
(162, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1Rqj4NFlAE5XtCGiF1hjmjQuh5uPVXf1v/view?usp=sharing'),
(163, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1l2Hc3judL3CmxC3o4_dmDVrEVD3OMRW7/view?usp=sharing'),
(164, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1fdJh9ORAE9TVv5ATBn4y-8meRKTLOGSG/view?usp=sharing'),
(165, 'Car', 10, 10, 10, 10, 'SEDAN', 5, 20, 'https://drive.google.com/file/d/1sB9ATxXCPwM-CggjULYaTnVYjkdLLut8/view?usp=sharing'),
(166, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1x0Fga8Fc2puv1-DT4s_pHiIU1G3ss_Tv/view?usp=sharing'),
(167, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1WfdNqE19zHbmZITbsTMY01Py-qm0CkIn/view?usp=sharing'),
(168, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1gO-tVi2LwtmKmhgt5gb6yb-KQo1A-yzU/view?usp=sharing'),
(169, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1N9JjQ-RIrhQGUxsWOclm565En5TOyOJ_/view?usp=sharing'),
(170, 'Car', 10, 10, 10, 10, 'SPORT', 5, 20, 'https://drive.google.com/file/d/1sdJ9hCKO8dtX-DItznQR2bvzJ-hYVhS-/view?usp=sharing'),
(171, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1SiN4gnUHB3hdogLtze_YsFEjcUd56PHw/view?usp=sharing'),
(172, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1YU07u_nZSxQWPXYuzVqSyk9bEAi8HX08/view?usp=sharing'),
(173, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1MSuGTRc7LHoBYLxWlWxDpAy8O49WeWAZ/view?usp=sharing'),
(174, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1FCwjwsrgJAbIAKq1GLnCAprY1k7ok6ov/view?usp=sharing'),
(175, 'Car', 10, 10, 10, 10, 'VINTAGE', 5, 20, 'https://drive.google.com/file/d/1X8iC5QrGpj3TcD1N6MulwrgvDK0GymDh/view?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `superuser`
--

CREATE TABLE `superuser` (
  `sno` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superuser`
--

INSERT INTO `superuser` (`sno`, `username`, `email`, `password`) VALUES
(1, 'Admin', 'admin@vitfam.com', 'superuser123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `stars` float NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 200,
  `loggedin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `pass`, `stars`, `amount`, `loggedin`) VALUES
(1, 'Player', 'player@vitfam.com', 'player123', 0, 200, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`accessory_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`,`model_id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `accessory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superuser`
--
ALTER TABLE `superuser`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`type`) REFERENCES `car_type` (`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
