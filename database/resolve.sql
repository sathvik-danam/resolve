-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 07:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resolve`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Appliance Repair', '2019-02-18 09:31:13', '2019-02-18 09:31:13'),
(2, 'Beauty & Spa', '2019-02-18 09:31:24', '2019-02-18 09:31:24'),
(3, 'Home Cleaning & Repairs', '2019-02-18 09:31:39', '2019-02-18 09:31:39'),
(4, 'Business & Taxes', '2019-02-18 09:31:57', '2019-02-18 09:31:57'),
(5, 'Personal & More', '2019-02-18 09:32:16', '2019-02-18 09:32:16'),
(6, 'Wedding & Events', '2019-02-18 09:39:44', '2019-02-18 09:39:44'),
(7, 'Car Services', '2019-02-18 18:45:40', '2019-02-18 18:49:11'),
(8, 'Education Service', '2019-02-22 18:35:36', '2019-02-22 18:37:09'),
(9, 'Maid Service', '2019-02-22 18:35:47', '2019-02-22 18:35:47'),
(10, 'Pandit & Pooja Service', '2019-02-22 18:36:07', '2019-02-22 18:37:21'),
(11, 'IT Services', '2019-03-09 02:42:26', '2019-03-09 02:42:26'),
(12, 'Others', '2019-03-27 08:27:37', '2019-03-27 08:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `created_at`, `updated_at`) VALUES
(1, 'London', '2024-05-03 13:07:08', '2024-05-03 13:07:08'),
(2, 'Manchester', '2024-05-03 13:09:01', '2024-05-03 13:09:01'),
(3, 'Birmingham', '2024-05-03 13:09:01', '2024-05-03 13:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `subcategory_id` int(11) UNSIGNED NOT NULL,
  `city_id` int(11) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `approval_status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{}',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `user_id`, `email`, `address`, `phone`, `subcategory_id`, `city_id`, `description`, `approval_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'test@localhost', '123 Fake Street', '9995551212', 1, 1, 'I need your help', '{\n    \"1\": {\n        \"user_id\": 1,\n        \"status\": 1\n    },\n    \"2\": {\n        \"user_id\": 2,\n        \"status\": 0\n    },\n    \"3\": {\n        \"user_id\": 3,\n        \"status\": 1\n    } }', '2024-05-03 20:13:34', '2024-05-03 20:13:34'),
(3, 2, 'random@localhost', '456 Testing', '5455565689', 3, 2, 'Technical details', '{}', '2024-05-03 22:18:35', '2024-05-03 22:18:35'),
(4, 2, 'random@localhost', '456 Testing', '5455565689', 2, 2, 'Technical details', '{}', '2024-05-03 22:21:31', '2024-05-03 22:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'Not Listed',
  `about` varchar(191) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `city_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `category_id`, `subcategory_id`, `type`, `about`, `photo`, `state`, `city_id`, `name`, `phone`, `email`, `address`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 8, 52, 'Partner', 'B. Tech electronics & communication', NULL, NULL, 1, 'Giridhari Kumar', '2147483647', NULL, 'Kankerbag', 'others', 1, '2019-03-28 09:49:28', '2019-03-28 09:49:28'),
(2, 12, 52, 'Partner', 'Lic of India, Oriental insurance ( GIC), & Flights tickets booking ( 24×7 service)', NULL, NULL, 1, 'Vivek Kumar', '2147483647', NULL, 'Vivek OnLine,1st floor,Mahadev Market,near-shalimar Sweet,above Axis Bank ATM,kankarbagh, Patna - 20', 'others', 1, '2019-04-05 04:09:17', '2019-04-05 04:09:17'),
(3, 11, 25, 'Partner', 'Best Graphics Designer', '1557468607.jpeg', NULL, 1, 'TrickuWeb', '0', NULL, 'S/O PREM NATH PRASAD, BUDHIYAN KUAN NEAR MASJID', 'graphics-designer', 1, '2019-05-10 05:07:58', '2019-05-10 05:10:07'),
(6, 11, 25, 'Partner', 'hi', '11557514220.png', NULL, 1, 'Praveen', '0', NULL, 'Saguna More Danapur Cantt, Gas Godawn Near Aata Chakki, Budhiyan Kuan Masjid', 'graphics-designer', 1, '2019-05-10 17:50:21', '2019-05-10 17:50:21'),
(7, 11, 21, 'Partner', 'Best Website Designer', '11557514931.png', NULL, 1, 'TrickuWeb', '0', NULL, 'Saguna More Danapur Cantt, Gas Godawn Near Aata Chakki, Budhiyan Kuan Masjid', 'web-design-developer', 1, '2019-05-10 18:02:11', '2019-05-10 18:02:11'),
(8, 6, 35, '', 'sdfgdsfg', NULL, NULL, 1, '', '0', NULL, '123 fake street', '', 2, '2024-05-01 18:15:03', '2024-05-01 18:15:03'),
(11, 11, 52, '', 'sdfgdsfg', NULL, NULL, 1, '', '0', NULL, 'address', '', 2, '2024-05-01 20:32:39', NULL),
(14, 7, 44, '', 'about', NULL, NULL, 1, '', '0', NULL, 'new address', '', 2, '2024-05-01 21:05:12', NULL),
(15, 1, 1, 'Not Listed', 'sdfgsdfg', NULL, NULL, 1, 'random', '5551212', NULL, 'sdfgsdfg', '', 2, '2024-05-01 21:07:18', NULL),
(16, 1, 1, 'Not Listed', 'sdfgdfg', NULL, NULL, 1, 'random', '5551212', NULL, 'sdfgdfg', '', 2, '2024-05-01 21:07:24', NULL),
(17, 1, 1, 'Not Listed', 'asdf', NULL, NULL, 1, 'random', '5551212', NULL, 'asdf', '', 2, '2024-05-01 21:07:29', NULL),
(23, 1, 1, 'Not Listed', 'asdf', NULL, NULL, 1, 'random', '5551212', NULL, 'asdf', '', 2, '2024-05-01 21:13:30', NULL),
(28, 1, 12, 'sdfgdfgdsfg', 'dgdsfgdsg', NULL, NULL, 1, 'fgsfgdg', '2147483647', NULL, '', '', 2, '2024-05-03 16:23:06', NULL),
(29, 5, 5, 'Not Listed', 'dgfhdgfh', NULL, NULL, 2, NULL, NULL, NULL, 'ghdfghfgh', '', 2, '2024-05-03 17:10:40', NULL),
(30, 5, 5, 'Not Listed', 'dgfhdgfh', NULL, NULL, 2, NULL, NULL, NULL, 'ghdfghfgh', '', 1, '2024-05-03 17:11:16', NULL),
(31, 6, 3, 'Not Listed', 'dfghdfghfd', NULL, NULL, 2, NULL, NULL, NULL, 'hdfghdfgh', '', 3, '2024-05-03 17:11:30', NULL),
(32, 1, 1, 'Not Listed', '123 fake street', NULL, NULL, 2, 'sdgfdfg', '4254532356', NULL, '', '', 3, '2024-05-03 23:04:51', NULL),
(43, 1, 2, 'Partner', '', NULL, NULL, 1, NULL, '', NULL, '8147483647', '', 3, '2024-05-05 01:57:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) NOT NULL,
  `subcategory` varchar(191) NOT NULL,
  `about` mediumtext DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `photo1` varchar(191) DEFAULT NULL,
  `photo2` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `subcategory`, `about`, `city`, `photo1`, `photo2`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Home Cleaning & Repairs', 'Home Deep Cleaning', '<ul>\n <li>We provide all home cleaning services and we care of each and every corner of the house</li> \n<li> Our team will often start in this area of your home and will focus on your counters, cabinets, floors, dishwasher, stove, sinks etc. </li>\n<li> We use a careful system to deep clean each of your rooms on a rotation basis. </li> \n</ul>', NULL, '1550485319.jpeg', NULL, 'home-deep-cleaning', '2019-02-18 10:21:59', '2019-02-26 19:42:12'),
(2, 'Appliance Repair', 'Refrigerator Repair', '<ul>\n <li>We offer trained and professionals team are proficient in repairing any kind of refrigerator problem. </li> \n<li> We are dealing with any types of refrigerator services such as freeze repairing services. </li>\n<li> We can provide you the Quality & Quick service and faster than regular refrigerator service providers</li> \n</ul>', NULL, '1550486731.jpeg', NULL, 'refrigerator-repair', '2019-02-18 10:23:56', '2019-02-24 12:01:21'),
(3, 'Home Cleaning & Repairs', 'Plumbers', '<ul>\n <li>Arvice present their best in class Plumbing survives in India.</li> \n<li> We provide reasonable pricing; you can avail our Plumbing services anywhere in Bihar</li>\n<li> We serve best plumbing services all plumbing issues, whether it is related to bathroom, kitchen, drains, or toilet etc. </li> \n</ul>', NULL, '1550511449.jpeg', NULL, 'plumbers', '2019-02-18 17:37:29', '2019-02-24 11:52:44'),
(4, 'Beauty & Spa', 'Salon at Home for Women', '<ul>\n <li> Arvice provide best Salon and Beauty Services is an exclusive Salon around all over india</li> \n<li>Our aims to bring out your good looks and your personality</li>\n<li>We have been providing appointment salon service needs at your home. </li> \n</ul>', NULL, '1550511931.jpeg', NULL, 'salon-at-home-for-women', '2019-02-18 17:45:32', '2019-02-24 11:38:32'),
(5, 'Wedding & Events', 'Pre-Wedding Shoot', '<ul>\n <li> We provide best services for Wedding Photography, Pre Wedding Photo shoots, Kids & Family Portfolio, Conference Photography, Product Shoots etc</li> \n<li> We are one of the top wedding photographers in India and we also provide pre wedding photography service </li>\n<li> We are professionally qualified team and get best prices for the kind of services you get from us. </li> \n</ul>', NULL, '1550512064.jpeg', NULL, 'pre-wedding-shoot', '2019-02-18 17:47:44', '2019-02-24 12:19:05'),
(6, 'Beauty & Spa', 'Mehandi Artists', '<ul>\n <li>Arvice most talented Mehandi Artists an respected in this field</li> \n<li> We offer you a unique design bridal mehandi art and design service.</li> \n<li> We make your event impactful by filling the color and aroma of mehndi with best design\n</li> \n</ul>', NULL, '1550512206.jpeg', NULL, 'mehandi-artists', '2019-02-18 17:50:06', '2019-02-24 11:25:19'),
(7, 'Appliance Repair', 'Washing Machine Repair', '<ul> \n<li>we provide fast & reliable washing machine repair in india</li>\n<li>we have a very rigid hiring process which ensures only skilled, experienced take up your requirements.</li>\n<li>We repair all major brands of washing machine repair</li>\n</ul>', NULL, '1550512295.jpeg', NULL, 'washing-machine-repair', '2019-02-18 17:51:36', '2019-02-25 13:18:30'),
(8, 'Appliance Repair', 'RO & Water Purifier Repair', '<ul>\n <li>Arvice provides best experienced RO & Water Purifier Repair technicians.</li> \n<li> Our service costs are very competitive and our inspection charge is the lowest in the market</li> \n<li>We have technicians to fix all kind of water purifier models. </li> \n</ul>', NULL, '1550512388.jpeg', NULL, 'ro-water-purifier-repair', '2019-02-18 17:53:08', '2019-02-24 10:53:43'),
(9, 'Home Cleaning & Repairs', 'Carpet Cleaning', '<ul>\n<li>Keep your home looking and running great inside and out with our wide range of expert cleaning services.</li>\n<li> Eliminate dust mites, allergens and trapped-in soil</li>\n<li>Restore the natural, clean appearance and texture of the carpets</li>\n</ul>', NULL, '1550512479.jpeg', NULL, 'carpet-cleaning', '2019-02-18 17:54:39', '2019-02-24 10:46:37'),
(10, 'Home Cleaning & Repairs', 'Kitchen Deep Cleaning', '<ul><li>We have Well Equipped and Trained Team, who carries out Deep kitchen Cleaning and Sanitization with Non-Hazardous Chemicals</li><li>Get fast and efficient service</li><li> We offer the most affordable home cleaning services</li></ul>', NULL, '1550512522.jpeg', NULL, 'kitchen-deep-cleaning', '2019-02-18 17:55:22', '2019-02-23 09:32:41'),
(11, 'Beauty & Spa', 'Massage for Men', '<ul><li>Recharge yourself with body massage by senior male therapists at the comfort of your home.</li><li>Get highly trained and well hygined male therapist</li><li>We offer services like foot reflexology, swedish massage, deep tissue massage </li></ul>', NULL, '1550861257.jpeg', NULL, 'massage-for-men', '2019-02-18 18:00:15', '2019-02-26 19:38:54'),
(12, 'Beauty & Spa', 'Massage for women', '<ul><li>Recharge yourself with body massage by senior female therapists at the comfort of your home.</li><li>Get highly trained and well hygined female therapist</li><li>We offer services like foot reflexology, swedish massage, deep tissue massage </li></ul>', NULL, '11553936182.jpeg', NULL, 'massage-for-women', '2019-02-18 18:01:03', '2019-03-30 08:56:24'),
(13, 'Appliance Repair', 'AC Service & Repair', '<ul><li> Want a good spa facilty at your home?</li><li>Now select from various spa package and service</li><li>Choose your own time slot</li><li>  We provide trained & experienced female therapists who are hygiene friendly. They will recreate spa experience at home and it includes massage bed,oils, etc. To de-stress yourself book full body massage at home.</li></ul>', NULL, '1550512927.jpeg', NULL, 'ac-service-repair', '2019-02-18 18:02:07', '2019-02-23 09:29:30'),
(14, 'Wedding & Events', 'DJ', '<ul><li>Plannig for a DJ night in your  wedding reception?</li><li> We provide best DJ and sound facility</li><li>Get highly experienced and professional djs well equipped with backgroud music players and modern sound systems</li></ul>', NULL, '1550513022.jpeg', NULL, 'dj', '2019-02-18 18:03:42', '2019-02-23 09:28:15'),
(15, 'Wedding & Events', 'Bartender', '<ul><li>GET Nostalgic and full of variety drinks at your party</li><li>Get well dressed and highly trained waiters and bar tenders</li></ul>', NULL, '1550513092.jpeg', NULL, 'bartender', '2019-02-18 18:04:52', '2019-02-26 19:36:59'),
(16, 'Wedding & Events', 'Party Decoration', '<ul><li>Planning for big fat Indian wedding?</li><li> Get in touch with us</li><li>we provide best service for party decoration</li></ul>', NULL, '1550513148.jpeg', NULL, 'party-decoration', '2019-02-18 18:05:48', '2019-02-23 09:27:33'),
(17, 'Car Services', 'Car Wash', '<ul><li>Get the best car wash facility at your door steps</li><li>Complete indoor and out door car spa facility</li><li>Car interior decoration facility is also available</li></ul>', NULL, '1550515913.jpeg', NULL, 'car-wash', '2019-02-18 18:51:53', '2019-02-23 09:27:12'),
(18, 'Car Services', 'Car Rent', '<ul><li> We provide best car rent service </li> <li>Go anywhere in india with our expert chauffeurs </li>\n         <li>We also provide  self drive car facility</li>\n         <li>Our price are also reasonable</li>\n      </ul>', NULL, '1550516161.jpeg', NULL, 'car-rent', '2019-02-18 18:56:01', '2019-02-23 09:26:55'),
(19, 'Maid Service', 'Maid Service', '<ul><li>Want a domestic maid?</Li><li>Get well trained and registered domestic helper</li><li>Contact us and get highly trained and well behaved domestic maid at your home</li></ul>', NULL, '11553936280.jpeg', NULL, 'maid-service', '2019-02-22 18:40:03', '2019-03-30 08:58:01'),
(20, 'Maid Service', 'Microwave Repair', 'Microwave Repair', NULL, '11553936294.png', NULL, 'microwave-repair', '2019-03-04 19:24:50', '2019-03-30 08:58:15'),
(21, 'IT Services', 'Website Development', 'Get Your Website Developed with professionals', NULL, '11553936364.jpeg', NULL, 'website-development', '2019-03-09 02:44:27', '2019-03-30 08:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `belongs_to` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `belongs_to`, `created_at`, `updated_at`) VALUES
(1, 'AC Service & Repair', 'Home Cleaning & Repairs', '2019-02-18 09:40:50', '2019-03-28 14:07:37'),
(2, 'Refrigerator Repair', 'Home Cleaning & Repairs', '2019-02-18 09:41:05', '2019-03-28 14:07:26'),
(3, 'Washing Machine Repair', 'Home Cleaning & Repairs', '2019-02-18 09:41:25', '2019-03-28 14:07:16'),
(4, 'RO & Water Purifier Repair', 'Home Cleaning & Repairs', '2019-02-18 09:42:02', '2019-03-28 14:07:05'),
(5, 'Microwave Repair', 'Home Cleaning & Repairs', '2019-02-18 09:42:17', '2019-03-28 14:06:55'),
(6, 'Salon at Home for Women', 'Personal & More', '2019-02-18 09:42:35', '2019-03-28 14:06:45'),
(7, 'Massage for women', 'Personal & More', '2019-02-18 09:44:37', '2019-03-28 14:06:34'),
(8, 'Makeup & Hair Styling', 'Personal & More', '2019-02-18 09:44:55', '2019-03-28 14:06:00'),
(9, 'Mehandi Artists', 'Wedding & Events', '2019-02-18 09:45:27', '2019-03-28 14:05:45'),
(10, 'Massage for Men', 'Personal & More', '2019-02-18 09:45:50', '2019-03-28 14:05:33'),
(11, 'Men\'s Haircut & Grooming', 'Personal & More', '2019-02-18 09:46:09', '2019-03-28 14:05:09'),
(12, 'Electricians', 'Home Cleaning & Repairs', '2019-02-18 09:47:21', '2019-03-28 14:04:54'),
(13, 'Plumbers', 'Home Cleaning & Repairs', '2019-02-18 09:47:30', '2019-03-28 14:04:45'),
(14, 'Carpenters', 'Home Cleaning & Repairs', '2019-02-18 09:47:39', '2019-03-28 14:04:36'),
(15, 'Bathroom Deep Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:47:49', '2019-03-28 14:04:24'),
(16, 'Carpet Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:47:58', '2019-03-28 14:04:14'),
(17, 'Home Deep Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:48:09', '2019-03-28 14:04:05'),
(18, 'Kitchen Deep Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:48:22', '2019-03-28 14:03:53'),
(19, 'Car Cleaning', 'Car Services', '2019-02-18 09:48:35', '2019-03-28 14:03:43'),
(20, 'Pest Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:48:44', '2019-03-28 14:03:32'),
(21, 'Web Design & Developer', 'IT Services', '2019-02-18 09:48:59', '2019-03-28 14:03:23'),
(22, 'CA for Income Tax Filing', 'Business & Taxes', '2019-02-18 09:49:13', '2019-03-28 14:03:09'),
(23, 'CA for Small Business', 'Business & Taxes', '2019-02-18 09:49:29', '2019-03-28 14:02:57'),
(24, 'Lawer', 'Business & Taxes', '2019-02-18 09:49:36', '2019-03-28 14:02:47'),
(25, 'Graphics Designer', 'IT Services', '2019-02-18 09:49:51', '2019-03-28 14:02:37'),
(26, 'CA / CS for Company Registration', 'Business & Taxes', '2019-02-18 09:50:14', '2019-03-28 14:02:26'),
(27, 'Visa Agency', 'Business & Taxes', '2019-02-18 09:50:23', '2019-03-28 14:02:06'),
(28, 'Real Estate Lawyer', 'Business & Taxes', '2019-02-18 09:50:47', '2019-03-28 14:01:50'),
(29, 'Vastu Shastra Consultants', 'Pandit & Pooja Service', '2019-02-18 09:51:10', '2019-03-28 14:01:41'),
(30, 'Wedding Photography', 'Wedding & Events', '2019-02-18 09:51:38', '2019-03-28 14:01:22'),
(31, 'Wedding Choreographer', 'Wedding & Events', '2019-02-18 09:51:55', '2019-03-28 14:00:09'),
(32, 'Pre-Wedding Shoot', 'Wedding & Events', '2019-02-18 09:52:07', '2019-03-28 13:59:24'),
(33, 'Party Decoration', 'Wedding & Events', '2019-02-18 09:52:24', '2019-03-28 13:59:11'),
(34, 'Astrologer', 'Pandit & Pooja Service', '2019-02-18 09:52:34', '2019-03-28 13:58:56'),
(35, 'DJ', 'Wedding & Events', '2019-02-18 09:52:40', '2019-03-28 13:58:36'),
(36, 'Bartender', 'Wedding & Events', '2019-02-18 09:52:47', '2019-03-28 13:58:24'),
(37, 'Baby Portfolio Photographer', 'Personal & More', '2019-02-18 09:53:20', '2019-03-28 13:58:03'),
(38, 'Home Tutor', 'Education Service', '2019-02-18 09:53:30', '2019-03-28 13:57:43'),
(39, 'CCTV Camera & Installation', 'Personal & More', '2019-02-18 09:53:47', '2019-03-28 13:57:29'),
(40, 'Dry Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:53:58', '2019-03-28 13:57:11'),
(41, 'Maternity Photographer', 'Personal & More', '2019-02-18 09:54:21', '2019-03-28 14:01:06'),
(42, 'Packers & Movers', 'Personal & More', '2019-02-18 09:54:29', '2019-03-28 13:56:38'),
(43, 'Divorce Lawyer', 'Business & Taxes', '2019-02-18 09:54:41', '2019-03-28 13:56:25'),
(44, 'Car Wash', 'Car Services', '2019-02-18 18:49:54', '2019-03-28 13:56:16'),
(45, 'Car Rent', 'Car Services', '2019-02-18 18:54:21', '2019-03-28 13:56:09'),
(46, 'Maid Service', 'Home Cleaning & Repairs', '2019-02-22 18:36:33', '2019-03-28 13:56:00'),
(47, 'General Home Tutors', 'Education Service', '2019-02-22 18:38:04', '2019-03-28 13:55:36'),
(48, 'Website Development', 'IT Services', '2019-03-09 02:42:43', '2019-03-28 13:55:24'),
(50, 'Home Tutors for Specific Subjects', 'Education Service', '2019-03-27 10:10:44', '2019-03-28 13:55:17'),
(51, 'Professional Subject Tutors (E.g., Java, C++)', 'Education Service', '2019-03-27 10:12:12', '2019-03-28 13:55:08'),
(52, 'Others', 'Others', '2019-03-27 10:12:22', '2019-03-28 14:00:18'),
(53, 'Car Selling', 'Car Services', '2019-04-18 05:06:52', '2019-04-18 05:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `city_id` int(11) UNSIGNED NOT NULL,
  `type` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `phone`, `city_id`, `type`, `password`) VALUES
(1, 'admin', 'admin@localhost', '123 Fake Street', '1115551212', 1, 'Admin', '$2y$10$vx3Ir1Ka106MD5CVGQ9pXOGI4NnNpmfS2uJo2JGUBmyOi428JYKP6'),
(2, 'John', 'random@localhost', '456 Testing', NULL, 2, 'User', '$2y$10$9QkMMaulkqt1q1IS9gin9OcutfqJsoxFoY0Et2VZZbqKH0Xui5IaG'),
(3, 'Bob', 'partner@localhost', '123 fake street', '8147483647', 2, 'Partner', '$2y$10$9QkMMaulkqt1q1IS9gin9OcutfqJsoxFoY0Et2VZZbqKH0Xui5IaG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enquiries_subcategories_subcategory_id` (`subcategory_id`),
  ADD KEY `fk_enquiries_cities_city_id` (`city_id`),
  ADD KEY `fk_enquiries_users_user_id` (`user_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_partners_subcategories_subcategory_id` (`subcategory_id`),
  ADD KEY `fk_partners_categories_category_id` (`category_id`) USING BTREE,
  ADD KEY `fk_partners_cities_city_id` (`city_id`),
  ADD KEY `fk_partners_users_user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_profession_unique` (`subcategory`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_cities_city_id` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `fk_enquiries_cities_city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enquiries_subcategories_subcategory_id` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enquiries_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_partners_cities_city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_partners_subcategories_subcategory_id` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_partners_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_cities_city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
