-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2016 at 10:03 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_eventia`
--

-- --------------------------------------------------------

--
-- Table structure for table `me_events`
--

CREATE TABLE IF NOT EXISTS `me_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) NOT NULL,
  `event_description` text NOT NULL,
  `event_image` varchar(100) NOT NULL,
  `event_location` varchar(50) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `event_post_date` datetime NOT NULL,
  `event_updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_user_id` int(11) NOT NULL,
  `event_status` varchar(10) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `me_events`
--

INSERT INTO `me_events` (`event_id`, `event_name`, `event_description`, `event_image`, `event_location`, `event_start_date`, `event_end_date`, `event_post_date`, `event_updated_date`, `event_user_id`, `event_status`) VALUES
(1, 'AFAID 2015', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin justo et eleifend tempor. Vivamus dapibus in massa vitae pretium. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque pellentesque metus sed ante fermentum, at pretium diam semper. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'afaid2015.jpg', 'JIEXPO', '2016-03-15', '2016-03-17', '2016-03-01 00:00:00', '2016-06-14 19:21:36', 1, 'Approved'),
(2, 'Test Event', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin justo et eleifend tempor. Vivamus dapibus in massa vitae pretium. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque pellentesque metus sed ante fermentum, at pretium diam semper. Interdum et malesuada fames ac ante ipsum primis in faucibus. asdasdasda', 'business+logodesign.png', 'Plaza', '2016-04-02', '2016-04-02', '2016-04-01 00:00:00', '2016-06-14 19:21:48', 2, 'Approved'),
(3, 'Dota 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin justo et eleifend tempor. Vivamus dapibus in massa vitae pretium. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque pellentesque metus sed ante fermentum, at pretium diam semper. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'dota2wallpaper.jpg', 'Binus University', '2016-04-13', '2016-04-15', '2016-04-13 00:00:00', '2016-06-14 12:20:17', 4, 'Approved'),
(6, 'Pokemon Convention', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin justo et eleifend tempor. Vivamus dapibus in massa vitae pretium. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque pellentesque metus sed ante fermentum, at pretium diam semper. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'pokemon-20.jpg', 'Jakarta', '2016-05-27', '2016-05-30', '2016-05-27 07:48:04', '2016-06-14 19:16:46', 3, 'Approved'),
(10, 'Jakarta Kids Triathlon 2016', 'Kategori Kompetisi :\r\nSwimming\r\nBike\r\nRun\r\nMore Information :\r\nWeb : kios-tri.indoendurance.com\r\nFacebook : indoendurance\r\nEmail : kios-tri@indoendurance.com', 'AP-Jakarta-Kids-Triathlon-2016-Copy.jpg', 'Deutsche Schule Jakarta', '2016-09-25', '2016-09-25', '2016-06-14 07:13:05', '2016-06-14 21:51:55', 3, 'Approved'),
(11, 'Festival Kuliner Ngabuburit', 'Konten Event:\r\nFestival Kuliner : Es blewlah, Ketupat Rusmini, Martabak Mesir & Roti Pyramid, Sop Buah & Jus Abah Radja, Nasi Kebuli, Etc)\r\nSpecial Performance :\r\nAngklung\r\nBelly dance\r\nRempak Bedug\r\nEthnic Collaboration\r\nMusi Gambus\r\nOpick (18 Juni 2016 | 19.00)\r\nBazaar Ramadhan : Busana Muslim, Busana Batik, Aksesori, Aromaterapi & Kerajinan Tangan', 'AP-Festival-Kuliner-Ngabuburit-Copy.jpg', 'La Piazza, Mall Kelapa Gading', '2016-06-10', '2016-06-26', '2016-06-14 07:18:24', '2016-06-14 21:52:44', 2, 'Approved'),
(12, 'Fashion Show Competition - Fitri Gaya Ramadhan', 'Kategori :  \r\nPito Dito : 12 Juni 2016 | 13.00 - 16.00\r\nArjuna Weda : 18 Juni 2016 | 13.00 - 16.00\r\nExit Kids : 26 Juni 2016 | 13.00 - 16.00\r\nSyarat & Ketentuan :\r\nSyarat pendaftaran adalah pembelanjaan brand PitoDito, Arjuna Weda & Exit Kids minimal Rp 350.000,- di Mahaari Department Store Plaza blok M, sesuai dengan ketentuan lomba yang ingin diikuti', 'AP-Fashion-Show-Competition-Fitri-Gaya-Ramadhan-Copy.jpg', 'Atrium Pasar Plaza Blok M, Jakarta', '2016-06-12', '2016-06-26', '2016-06-14 07:23:52', '2016-06-14 21:53:25', 4, 'Approved'),
(13, 'Bee Fest 2016', 'BeeFest 2016 adalah serangkaian lomba-lomba yang terdiri dari beberapa bidang yaitu Programming, Mobile, dan Game yang diadakan oleh BINUS UNIVERSITY untuk terus meningkatkan penerapan dan perkembangan teknologi informasi di Indonesia.', 'AP-BeeFest-2016-BINUS-University-Copy.jpg', 'Jakarta', '2016-08-07', '2016-08-07', '2016-06-14 07:48:04', '2016-06-14 21:48:32', 4, 'Approved'),
(14, 'Food Truck Festival Ramadhan 2016', 'Deskripsi Event :\nBosen Ngabuburit dengang makanan yg itu2 aja? Kami hadir dengan berbagai jenis makanan yg unik dan pastinya lezat\nKonten Event :\nAccoustic Band\nFashion Show\nStand Up Comedy\nMore Information :\nHotline 1 : 081313609383\nHotline 2 : 087887867131', 'MP-FoodTruck-Festival-Ramadhan-2016-Artwok-production-Copy.jpg', 'Parkir Mal Blok M, Jakarta', '2016-06-25', '2016-07-04', '2016-06-14 07:33:32', '2016-06-14 19:21:36', 4, 'Approved'),
(15, 'LEGO City Adventure', 'I Love Weekdays!\r\nTanggal : 6 - 30 Juni 2016\r\nFree Parking 2 hours every min spend IDR 500.000\r\nFasting OASIS*\r\nTanggal : 6 - 30 Juni 2016\r\nGet IDR 50.000 F&B Voucher for every min, purchase IDR 1.000.000\r\nRamadhan Privilege*\r\nTanggal : 13 - 16 Juni 2016\r\nRedeem 20 stamp points and get MKG shopping voucher IDR 100.000\r\nMusic Performance : TULUS', 'AP-LEGO-CITY-Copy.jpg', 'Mall Kelapa Gading', '2016-06-06', '2016-07-17', '2016-06-14 07:36:33', '2016-06-14 22:04:16', 2, 'Approved'),
(16, 'The Addams Family LSPR PAC 17-1B', 'Pemain :\r\nDieko pridelko\r\nMirabeth Sonia\r\nNatasha Rosanie\r\nYosua Tan\r\nPendukung :\r\nProduction Manager : Riri Kumalasari\r\nProduction Manager : Aulia Trinovia\r\nDirectors : Fathie Busyra | Sonia Suki\r\nMusic Director : Mirabeth Sonia\r\nChoreographer : Bradley Valdemar\r\nLecturer : Andrew Trigg', 'MP-The-Addams-Family-LSPR-PAC-17-1B-Copy.jpg', 'Prof. Dr. Djajusman Auditorium and Performance Hal', '2016-07-17', '2016-07-18', '2016-06-14 07:39:40', '2016-06-14 22:07:14', 1, 'Approved'),
(17, 'Franchise & License Expo Indonesia (FLEI) 2016', 'Our Achievement :\r\n15% International Visitors\r\n096 Attendees\r\n302 Franchise Brands Local and International\r\nTotal Transaction 600 Billion Rupiah\r\n17 Countries Present\r\n165 Companeis Exhibitted', 'AP-Franchise-License-Expo-Indonesia-FLEI-2016-Copy.jpg', 'Jakarta Convention Center (JCC), Jakarta', '2016-09-02', '2016-09-04', '2016-06-14 08:03:04', '2016-06-14 22:04:45', 3, 'Approved'),
(18, 'National Roadshow : Toys and Kid Big Sale 2016 (Jakarta)', 'Kategori Pameran :\r\nDiecast\r\nAction Figure\r\nGundam\r\nMokit\r\nStatue\r\nLego\r\nRobotic\r\nConsole Games\r\nKids Apparel\r\nTamiiya\r\nVinyl\r\nBook\r\nDoll\r\nPOP\r\nShow Off Colection\r\nCustom\r\nCommunity\r\nGames Application\r\nCompetition\r\nRC\r\nEducational Toys\r\nGashapon\r\nWooden Toys', 'AP-National-Roadshow-Toys-and-Kids-Big-Sale-216-Copy.jpg', 'Karika Expo Center, Jl. Gatot Subroto Kav. 37, Jak', '2016-06-25', '2016-06-26', '2016-06-14 08:37:25', '2016-06-14 22:14:36', 4, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `me_users`
--

CREATE TABLE IF NOT EXISTS `me_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_control` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `me_users`
--

INSERT INTO `me_users` (`user_id`, `user_email`, `user_password`, `user_fname`, `user_lname`, `user_dob`, `user_gender`, `user_phone`, `user_address`, `user_control`) VALUES
(1, 'albertxto@gmail.com', 'admin', 'Albert', 'Prawono', '1995-09-17', 'Male', '085881858906', 'Citra 5', 'Admin'),
(2, 'andrianh@yahoo.com', 'test', 'Andrian', 'Harinata', '2016-03-28', 'Male', '08123456789', 'Binus', 'Admin'),
(3, 'mikasa@snk.com', 'eren', 'Mikasa', 'Ackerman', '1996-12-01', 'Female', '555', 'Trost', 'Member'),
(4, 'itachi@akatsuki.co.jp', 'Amaterasu', 'Itachi', 'Uchiha', '1995-06-09', 'Male', '1234567890', 'Konoha', 'Member');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
