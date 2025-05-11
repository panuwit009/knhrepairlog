-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: fdb1030.awardspace.net
-- Generation Time: May 11, 2025 at 12:38 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4551327_knhrepairsystem`
--
CREATE DATABASE IF NOT EXISTS `4551327_knhrepairsystem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `4551327_knhrepairsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int NOT NULL,
  `name_detail` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `equipment` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `name_detail`, `equipment`) VALUES
(1, 'เปิดไม่ติด', 1),
(2, 'ปุ่มค้าง', 1),
(3, 'เครื่องช้า', 2),
(4, 'เปิดไม่ติด', 2),
(5, 'พัง', 3),
(6, 'ลูกกลิ้งเสีย', 3),
(7, 'กดไม่ติด', 4),
(8, 'ปุ่มเสีย', 4),
(9, 'เปิดไม่ติด', 5),
(10, 'ปุ่มเสีย', 5),
(11, 'ปริ้นไม่ออก', 6),
(12, 'สีจาง', 6);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int NOT NULL,
  `equipment_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equipment_name`) VALUES
(1, 'UPS'),
(2, 'คอมพิวเตอร์'),
(3, 'เมาส์'),
(4, 'คีย์บอร์ด'),
(5, 'หน้าจอ'),
(6, 'เครื่องพิมพ์');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `name`, `type`) VALUES
(1, 'รู้สึกตัวดี', 1),
(2, 'ทำตามคำสั่งได้ / รับรู้ วัน เวลา สถานที่ บุคคล', 1),
(3, 'ไม่มีภาวะหายใจลำบาก / หายใจปกติ', 2),
(4, 'ไม่มีอาการเจ็บหน้าอก', 3),
(5, 'ไม่ซีด', 4),
(6, 'ไม่อ่อนเพลีย', 4),
(7, 'น้ำหนักตามเกณฑ์', 4),
(8, 'ปัสสาวะได้เองไม่แสบขัด', 5),
(9, 'อุจจาระเองปกติ', 5),
(10, 'ไม่มีไข้', 6),
(11, 'ไม่ติดเชื้อ', 6),
(12, 'สีหน้าสดชื่น / ไม่เครียด', 7),
(13, 'ซึมเศร้า', 8),
(14, 'ก้าวร้าว', 8),
(15, 'แยกตัว', 8),
(16, 'แผลซึม', 9),
(17, 'ไม่มีแผล', 9),
(18, 'ไม่มีอาการปวด', 10),
(19, 'ทารกดิ้นดี', 11),
(20, 'ปกติ', 12),
(21, 'ปกติ', 13),
(22, 'ปกติ', 14),
(23, 'ผิดปกติ', 14),
(24, 'ดูดนมได้', 14),
(25, 'ไม่เหลือง', 14),
(26, 'ตาไม่แฉะ', 14),
(27, 'สะดือไม่แฉะ', 14),
(28, 'Foley\'s cath.', 15),
(29, 'NG Tube', 15),
(30, 'ไม่มีปัญหา', 16),
(31, 'ส่งปรึกษาสังคมส่งเคราะห์', 16),
(32, 'พร้อม', 17),
(33, 'ความรู้เกี่ยวกับโรค/อาการที่เป็น', 18),
(34, 'ยาและการใช้ยา', 18),
(35, 'อาหารที่เหมาะสม/การให้นมมารดา/การให้อาหารเสริม', 18),
(36, 'การพักผ่อน', 18),
(37, 'การออกกำลังกาย', 18),
(38, 'การจัดสิ่งแวดล้อมที่บ้านที่เหมาะสม', 18),
(39, 'อาการผิดปกติที่ต้องเฝ้าระวัง/ที่ควรมา รพ.ก่อนวันนัด', 18),
(42, 'ไม่นัด', 19),
(43, 'รถยนต์', 20),
(44, 'รถนั่ง', 20),
(45, 'เดินกลับ', 20),
(46, 'มารดารับกลับ', 20),
(47, 'บัตรประชาชน/บัตรข้าราชการ', 21),
(48, 'แพทย์อนุญาติ', 22),
(49, 'ไม่สมัครอยู่', 22),
(50, 'Refer', 22),
(51, 'หนีกลับ', 22),
(52, 'อื่นๆ', 22),
(53, 'ไม่จำเป็น', 23),
(54, 'จำเป็น', 23),
(55, 'ดูแลตนเองได้', 24),
(56, 'ต้องการผู้ดูแลบางส่วน', 24),
(57, 'ต้องการดูแลทั้งหมด', 24),
(58, 'ไม่มี', 25),
(59, 'มี', 25);

-- --------------------------------------------------------

--
-- Table structure for table `patient_records`
--

CREATE TABLE `patient_records` (
  `id` int NOT NULL,
  `HN` int DEFAULT NULL,
  `AN` int DEFAULT NULL,
  `heart_rate` int DEFAULT NULL,
  `pulse` int DEFAULT NULL,
  `respiration` int DEFAULT NULL,
  `blood_pressure` int DEFAULT NULL,
  `fetal_heart_rate` int DEFAULT NULL,
  `feeling_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `breathing_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hearting_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nutrition_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `urination_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `complications_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anxiety_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adjustment_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wound_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pain_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `labor_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lochia_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `breast_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `treatment_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `economy_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `home_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `returnhome_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activity_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `discharge_info` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `discharge_details` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `patient_care_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `self_care_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caregiver_data` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `internal_agency` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `external_agency` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_records`
--

INSERT INTO `patient_records` (`id`, `HN`, `AN`, `heart_rate`, `pulse`, `respiration`, `blood_pressure`, `fetal_heart_rate`, `feeling_id`, `breathing_id`, `hearting_id`, `nutrition_id`, `urination_id`, `complications_id`, `anxiety_id`, `adjustment_id`, `wound_id`, `pain_id`, `labor_id`, `lochia_id`, `breast_id`, `baby_id`, `treatment_id`, `economy_id`, `home_id`, `returnhome_id`, `activity_id`, `discharge_info`, `discharge_details`, `patient_care_id`, `self_care_id`, `caregiver_data`, `internal_agency`, `external_agency`) VALUES
(1, 12321515, 15182615, 55, 50, 55, 100, 50, '2', 'หายใจเหนื่อย', 'เจ็บที่หัวใจบางครั้ง', '5,6,7', '8,9', '10,11', '12', 'ปกติ', '17', '18', '19', '20', '21', '22,24,25', '29', '30', '32', '33,34,35,38,39', 'สิงหื', '20,12.00,43', '47,225,หมอ,48', '53', '1', 'มารดา, พร้อมให้การดูแล', 'โรคทั่วไป,แม่และเด็ก', 'คลีนิคเด็ก,คลีนิคโรคทั่วไป'),
(12, 51555111, 5515154, 40, 50, 70, 80, 19, '1', '3', 'เจ็บที่หัวใจบางครั้ง', '6,7', '8,9', '10,ติดเชื้อ', 'เครียด', '15', '18/10/2565', 'หน้าอก', '19', '20', '21', '23,24', '28,29', 'ดี', '32', '33,34,35,37,กินยาให้ตรงเวลา', '18/10/2002,18.00 โมง,ติน,อย.,งดข้าว', '20/12/2004,18.00,44', '47,1160101764925,อำเภอ,48', 'พารา,ยาแก้ปวดหัว', '56', 'แม่, ไม่มีเวลา', 'โรคทั่วไป,อย.', 'คลีนิคเด็ก');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int NOT NULL,
  `name_place` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name_place`) VALUES
(1, 'อย.'),
(2, 'สงฆ์ล่าง'),
(3, 'ตรวจโรคทั่วไป'),
(4, 'ER'),
(5, 'OPD MED'),
(6, 'ศูนย์คอม');

-- --------------------------------------------------------

--
-- Table structure for table `repairlist`
--

CREATE TABLE `repairlist` (
  `id` int NOT NULL,
  `repair_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sender_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อผู้แจ้งซ่อม',
  `ward` varchar(30) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'วอร์ด',
  `place` varchar(30) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'สถานที่ของสิ่งของ',
  `equipment` varchar(30) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ประเภทครุภัณฑ์',
  `eq_no` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'เลขครุภัณฑ์',
  `eq_status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'สถานะ',
  `eq_status_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สถานะอัพเดทล่าสุด',
  `detail` longtext COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รายละเอียด',
  `detail2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'รายละเอียดการแจ้งซ่อมจากเจ้าหน้าที่',
  `res_depart` varchar(30) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'หน่วยรับผิดชอบ',
  `rtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แจ้งซ่อม',
  `eq_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ประเภท',
  `eq_com` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'บริษัท',
  `doctor_opinion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `doctor_id_sign` int DEFAULT NULL,
  `doctor_sign_timestamp` timestamp NULL DEFAULT NULL,
  `eq_recieved_timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repairlist`
--

INSERT INTO `repairlist` (`id`, `repair_id`, `sender_name`, `ward`, `place`, `equipment`, `eq_no`, `eq_status`, `eq_status_timestamp`, `detail`, `detail2`, `res_depart`, `rtimestamp`, `eq_type`, `eq_com`, `doctor_opinion`, `doctor_id_sign`, `doctor_sign_timestamp`, `eq_recieved_timestamp`) VALUES
(1, '24ห้องประชุม1-1', 'test', '4', 'ห้องประชุม', '2', 'com-000001', '4', '2025-03-03 01:58:12', '-', NULL, '1', '2025-03-03 01:57:05', '1', '0', NULL, NULL, NULL, NULL),
(2, '12บ้าน1-2', 'ทดสอบ', '2', 'บ้าน', '1', '64722', '4', '2025-03-03 02:00:29', 'พัง', NULL, '1', '2025-03-03 01:59:26', '1', '0', NULL, NULL, NULL, NULL),
(3, '26สำนักงาน3-3', 'ทดสอบ', '6', 'สำนักงาน', '2', '100', '5', '2025-03-03 02:07:33', '100', NULL, '3', '2025-03-03 02:03:01', '2', '1', NULL, NULL, NULL, '2025-03-03 02:08:03'),
(4, '33ห้องปฏิบัติการ2-4', 'ทดสอบ', '3', 'ห้องปฏิบัติการ', '3', '64723', '3', '2025-03-03 02:11:15', 'พัง', NULL, '2', '2025-03-03 02:10:56', '2', '1', 'test', 5, '2025-03-03 02:11:43', NULL),
(5, '26สำนักงาน3-5', 'test', '6', 'สำนักงาน', '2', '100', '0', '2025-03-03 02:36:04', '100', NULL, '3', '2025-03-03 02:36:04', '2', '1', NULL, NULL, NULL, NULL),
(6, '12สำนักงาน2-6', 'ทดสอบ', '2', 'สำนักงาน', '1', 'repair-000001', '0', '2025-03-03 02:37:03', '-', NULL, '2', '2025-03-03 02:37:03', '1', '0', NULL, NULL, NULL, NULL),
(7, '26สำนักงาน3-7', 'test', '6', 'สำนักงาน', '2', '100', '0', '2025-03-03 02:39:25', '100', NULL, '3', '2025-03-03 02:39:25', '2', '1', NULL, NULL, NULL, NULL),
(8, '26สำนักงาน3-8', 'test', '6', 'สำนักงาน', '2', '100', '1', '2025-03-04 02:50:34', '100', NULL, '3', '2025-03-03 02:40:26', '2', '1', NULL, NULL, NULL, NULL),
(9, '33ห้องปฏิบัติการ2-9', 'ทดสอบ', '3', 'ห้องปฏิบัติการ', '3', '555', '1', '2025-03-03 23:41:40', 'พัง', NULL, '2', '2025-03-03 02:41:13', '2', '1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `res_depart`
--

CREATE TABLE `res_depart` (
  `id` int NOT NULL,
  `name_depart` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `res_depart`
--

INSERT INTO `res_depart` (`id`, `name_depart`) VALUES
(1, 'อย.'),
(2, 'สงฆ์ล่าง'),
(3, 'ตรวจโรคทั่วไป'),
(4, 'ER'),
(5, 'OPD MED'),
(6, 'ศูนย์คอม');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `sale_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `amount`, `created_at`, `updated_at`) VALUES
(1, '2024-01-01', 1500.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(2, '2024-01-15', 2000.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(3, '2024-02-01', 1800.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(4, '2024-02-15', 2200.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(5, '2024-03-01', 2500.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(6, '2024-03-15', 2700.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(7, '2023-01-01', 1200.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(8, '2023-01-15', 1800.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(9, '2023-02-01', 1600.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(10, '2023-02-15', 1900.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(11, '2023-03-01', 2100.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50'),
(12, '2023-03-15', 2400.00, '2025-01-17 02:06:50', '2025-01-17 02:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `name_status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name_status`, `type`) VALUES
(0, 'รอการยืนยัน', '0'),
(1, 'กำลังดำเนินการ', '1'),
(2, 'ส่งซ่อมภายใน', '2'),
(3, 'ส่งซ่อมภายนอก', '2'),
(4, 'ซ่อมเสร็จแล้ว', '3'),
(5, 'รับของแล้ว', '3');

-- --------------------------------------------------------

--
-- Table structure for table `status_log`
--

CREATE TABLE `status_log` (
  `id` int NOT NULL,
  `repair_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `eq_no` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `eq_status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `eq_status_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `res_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_log`
--

INSERT INTO `status_log` (`id`, `repair_id`, `eq_no`, `eq_status`, `eq_status_timestamp`, `res_name`) VALUES
(1, '1111-1', '7441-009-001-610/45', '0', '2025-02-06 08:35:32', ''),
(2, '1111-2', '7441-009-001-610/45', '0', '2025-02-06 08:35:32', ''),
(3, '1111-3', '7441-009-001-610/45', '0', '2025-02-06 08:35:33', ''),
(4, '1111-4', '7441-009-001-610/45', '0', '2025-02-06 08:35:33', ''),
(5, '1111-3', '7441-009-001-610/45', '1', '2025-02-06 08:42:30', 'admin'),
(6, '1111-4', '7441-009-001-610/45', '2', '2025-02-06 08:44:25', 'admin'),
(7, '1111-2', '7441-009-001-610/45', '3', '2025-02-07 02:50:59', 'admin'),
(8, '3321-5', '7441-009-001-610/46', '0', '2025-02-07 02:59:45', ''),
(9, '23test2-6', 'repair-000001', '0', '2025-02-07 06:09:23', ''),
(10, '34ทดสอบ2-7', 'repair-000001', '0', '2025-02-07 06:15:37', ''),
(11, '1111-1', '7441-009-0001-610/45', '2', '2025-02-07 06:43:14', 'admin'),
(12, '1111-1', '7441-009-0001-610/45', '5', '2025-02-07 06:43:30', 'admin'),
(13, '24สำนักงาน2-8', '369', '0', '2025-02-10 01:45:24', ''),
(14, '23สำนักงาน3-9', 'medical-000001', '0', '2025-02-10 01:46:25', ''),
(15, '22ทดสอบ1-10', '4444', '0', '2025-02-10 02:36:31', ''),
(16, '3321-11', '7441-009-001-610/46', '0', '2025-02-10 04:45:02', ''),
(17, '22บ้าน3-12', 'medical-000001', '0', '2025-02-10 06:48:38', ''),
(18, '3321-11', '7441-009-001-610/46', '1', '2025-02-11 02:18:58', 'admin'),
(19, '3321-11', '7441-009-001-610/46', '2', '2025-02-11 02:19:22', 'admin'),
(20, '3321-11', '7441-009-001-610/46', '4', '2025-02-11 02:20:21', 'admin'),
(21, '3321-5', '7441-009-0001-610/46', '1', '2025-02-11 02:21:00', 'admin'),
(22, '1111-13', '7441-009-001-610/4987', '0', '2025-02-11 02:26:12', ''),
(23, '1111-13', '7441-009-001-610/4987', '1', '2025-02-11 02:30:59', 'admin'),
(24, '1111-13', '7441-009-001-610/4987', '2', '2025-02-11 02:31:08', 'admin'),
(25, '1111-14', '7441-009-001-610/99', '0', '2025-02-11 02:31:53', ''),
(26, '1111-15', '7441-009-001-610/100', '0', '2025-02-11 02:32:04', ''),
(27, '1111-16', '7441-009-001-610/101', '0', '2025-02-11 02:32:19', ''),
(28, '3321-17', '7441-009-001-610/46', '0', '2025-02-11 04:11:01', ''),
(29, '5321-18', '7441-009-001-610/46', '0', '2025-02-11 04:11:17', ''),
(30, '6321-19', '7441-009-001-610/46', '0', '2025-02-11 04:11:50', ''),
(31, '4321-20', '7441-009-001-610/46', '0', '2025-02-11 04:11:57', ''),
(32, '4321-20', '7441-009-001-610/46', '', '2025-02-11 05:01:02', 'admin'),
(33, '6321-19', '7441-009-001-610/46', '1', '2025-02-11 05:01:23', 'admin'),
(34, '5321-18', '7441-009-001-610/46', '', '2025-02-13 01:06:33', 'admin'),
(35, '3321-17', '7441-009-001-610/46', '', '2025-02-13 02:04:45', 'อุฟุฟวยฟวยฟวย อันเยนทวยววยฟวย อุกเวมุเวม โอซาส'),
(36, '1111-21', '7441-009-001-610/101', '0', '2025-02-13 02:26:09', ''),
(37, '1111-21', '7441-009-001-610/101', '1', '2025-02-13 02:26:37', 'อุฟุฟวยฟวยฟวย อันเยนทวยววยฟวย อุกเวมุเวม โอซาส'),
(38, '1111-22', '7441-009-001-610/101', '0', '2025-02-13 02:27:05', ''),
(39, '1111-22', '7441-009-001-610/101', '', '2025-02-13 02:27:10', 'อุฟุฟวยฟวยฟวย อันเยนทวยววยฟวย อุกเวมุเวม โอซาส'),
(40, '1111-23', '7441-009-001-610/101', '0', '2025-02-13 02:28:21', ''),
(41, '1111-23', '7441-009-001-610/101', '', '2025-02-13 02:29:02', 'อุฟุฟวยฟวยฟวย อันเยนทวยววยฟวย อุกเวมุเวม โอซาส'),
(42, '1111-24', '7441-009-001-610/101', '0', '2025-02-13 02:29:13', ''),
(43, '1111-25', '7441-009-001-610/101', '0', '2025-02-13 02:29:14', ''),
(44, '1111-26', '7441-009-001-610/101', '0', '2025-02-13 02:29:15', ''),
(45, '1111-26', '7441-009-001-610/101', '1', '2025-02-13 02:29:22', 'อุฟุฟวยฟวยฟวย อันเยนทวยววยฟวย อุกเวมุเวม โอซาส'),
(46, '110001-27', 'com-000001', '0', '2025-02-14 03:55:48', ''),
(47, '210001-28', 'com-000002', '0', '2025-02-14 03:56:52', ''),
(48, '120002-29', 'repair-000001', '0', '2025-02-14 03:57:42', ''),
(49, '33ห้องปฏิบัติการ2-30', '555', '0', '2025-02-17 03:54:46', ''),
(50, '12ห้องประชุม1-31', '64725', '0', '2025-02-18 02:58:36', ''),
(51, '12ห้องประชุม1-32', '666', '0', '2025-02-18 02:59:17', ''),
(52, '34สำนักงาน3-33', 'medical-000001', '0', '2025-02-18 03:00:00', ''),
(53, '24บ้าน2-34', 'repair-000001', '0', '2025-02-18 03:00:59', ''),
(54, '22test1-35', 'com-000001', '0', '2025-02-18 03:01:34', ''),
(55, '12บ้าน1-36', '123', '0', '2025-02-18 03:31:57', ''),
(56, '12บ้าน1-37', '123', '0', '2025-02-18 03:35:53', ''),
(57, '12บ้าน1-38', '123', '0', '2025-02-18 03:47:47', ''),
(58, '12บ้าน1-39', '123', '0', '2025-02-18 03:58:44', ''),
(59, '12บ้าน1-40', '123', '0', '2025-02-18 03:59:22', ''),
(60, '12บ้าน1-41', '123', '0', '2025-02-18 04:03:35', ''),
(61, '12บ้าน1-42', '123', '0', '2025-02-18 04:05:59', ''),
(62, '12บ้าน1-43', '123', '0', '2025-02-18 04:10:27', ''),
(63, '33ห้องปฏิบัติการ2-44', '555', '0', '2025-02-18 04:10:43', ''),
(64, '21คลังสินค้า3-45', '0909', '0', '2025-02-18 04:10:50', ''),
(65, '21คลังสินค้า3-46', '64724', '0', '2025-02-18 05:06:16', ''),
(66, '33ห้องปฏิบัติการ2-47', '64723', '0', '2025-02-18 06:27:22', ''),
(67, '12บ้าน1-48', '64722', '0', '2025-02-18 06:28:38', ''),
(68, '21คลังสินค้า3-49', '64724', '0', '2025-02-18 06:29:04', ''),
(69, '12ห้องประชุม1-50', '666', '0', '2025-02-18 07:06:33', ''),
(70, '22บ้าน1-51', 'com-000001', '0', '2025-02-19 03:57:13', ''),
(71, '12บ้าน1-52', '64722', '0', '2025-02-19 03:58:30', ''),
(72, '26สำนักงาน3-26', '100', '0', '2025-02-19 06:19:46', ''),
(73, '35ห้องประชุม3-27', '999', '0', '2025-02-19 07:54:07', ''),
(74, '23สำนักงาน2-28', '64726', '0', '2025-02-19 07:58:16', ''),
(75, '23สำนักงาน2-29', '64726', '0', '2025-02-19 08:01:55', ''),
(76, '35ห้องประชุม3-30', '999', '0', '2025-02-19 08:04:00', ''),
(77, '12สำนักงาน1-31', 'com-000001', '0', '2025-02-19 08:26:10', ''),
(78, '12บ้าน1-32', '64722', '0', '2025-02-19 08:34:20', ''),
(79, '21ห้องประชุม1-33', 'com-000001', '0', '2025-02-19 08:52:13', ''),
(80, '110001-34', 'com-000001', '0', '2025-02-19 08:57:13', ''),
(81, '320002-35', 'repair-000001', '0', '2025-02-19 08:58:16', ''),
(82, '23ห้องประชุม2-36', 'repair-000001', '0', '2025-02-20 03:25:13', ''),
(83, '12ห้องประชุม1-37', 'com-000001', '0', '2025-02-20 03:26:12', ''),
(84, '11สำนักงาน1-38', 'com-000001', '0', '2025-02-21 02:06:47', ''),
(85, '23ห้องประชุม1-39', 'com-000001', '0', '2025-02-21 02:50:10', ''),
(86, '12บ้าน1-40', '64722', '0', '2025-02-21 03:17:16', ''),
(87, '34ห้องประชุม3-41', 'medical-000001', '0', '2025-02-21 03:29:15', ''),
(88, '24สำนักงาน2-42', 'repair-000001', '0', '2025-02-21 03:29:51', ''),
(89, '11ห้องประชุม2-43', 'repair-000002', '0', '2025-02-21 03:30:24', ''),
(90, '11ห้องประชุม1-44', 'com-000001', '0', '2025-02-21 03:30:56', ''),
(91, '33ห้องปฏิบัติการ2-45', '64723', '0', '2025-02-21 03:34:34', ''),
(92, '26สำนักงาน3-46', '100', '0', '2025-02-21 04:09:21', ''),
(93, '26สำนักงาน3-47', '100', '0', '2025-02-21 04:13:18', ''),
(94, '26สำนักงาน3-48', '100', '0', '2025-02-21 04:28:20', ''),
(95, '26สำนักงาน3-49', '100', '0', '2025-02-21 04:28:55', ''),
(96, '35ห้องประชุม3-50', '999', '0', '2025-02-21 04:29:41', ''),
(97, '26สำนักงาน3-51', '100', '0', '2025-02-21 04:29:44', ''),
(98, '24บ้าน3-52', '200', '0', '2025-02-21 04:29:47', ''),
(99, '12ห้องประชุม1-53', '666', '0', '2025-02-21 04:31:53', ''),
(100, '23สำนักงาน2-54', 'repair-000001', '0', '2025-02-21 04:37:16', ''),
(101, '24สำนักงาน3-55', 'medical-000001', '0', '2025-02-21 04:40:59', ''),
(102, '12สำนักงาน2-56', 'repair-000001', '0', '2025-02-21 06:29:57', ''),
(103, '23ห้องประชุม2-57', 'repair-000001', '0', '2025-02-21 06:50:29', ''),
(104, '11สำนักงาน1-58', 'com-000001', '0', '2025-02-21 06:54:29', ''),
(105, '36ห้องประชุม3-59', 'medical-000001', '0', '2025-02-21 07:29:56', ''),
(106, '12ห้องประชุม1-60', 'com-000002', '0', '2025-02-21 07:31:08', ''),
(107, '13สำนักงาน1-61', 'com-000003', '0', '2025-02-21 07:31:52', ''),
(108, '12สำนักงาน2-62', 'repair-000001', '0', '2025-02-21 08:00:38', ''),
(109, '22สำนักงาน2-63', 'repair-000001', '0', '2025-02-21 08:01:53', ''),
(110, '21test2-64', 'repair-000001', '0', '2025-02-21 08:05:35', ''),
(111, '22ห้องประชุม2-65', 'repair-000001', '0', '2025-02-21 08:09:33', ''),
(112, '22ห้องประชุม2-66', 'repair-000002', '0', '2025-02-21 08:10:12', ''),
(113, '22ห้องประชุม2-67', 'repair-000001', '0', '2025-02-21 08:14:01', ''),
(114, '12ห้องประชุม1-68', 'com-000001', '0', '2025-02-21 08:24:34', ''),
(115, '26สำนักงาน3-69', '100', '0', '2025-02-21 08:25:45', ''),
(116, '35ห้องประชุม3-70', 'medical-000001', '0', '2025-02-21 08:37:36', ''),
(117, '12test2-71', 'repair-000001', '0', '2025-02-21 08:38:25', ''),
(118, '23test2-72', 'repair-000002', '0', '2025-02-21 08:39:01', ''),
(119, '12ห้องประชุม1-73', '666', '0', '2025-02-26 03:27:22', ''),
(120, '1111-24', '7441-009-001-610/101', '1', '2025-02-26 07:29:23', 'admin'),
(121, '12ห้องประชุม1-74', '666', '0', '2025-02-27 04:09:08', ''),
(122, '24ห้องประชุม3-75', 'medical-000001', '0', '2025-03-03 01:56:08', ''),
(123, '24ห้องประชุม1-1', 'com-000001', '0', '2025-03-03 01:57:05', ''),
(124, '24ห้องประชุม1-1', 'com-000001', '1', '2025-03-03 01:57:40', 'admin'),
(125, '24ห้องประชุม1-1', 'com-000001', '4', '2025-03-03 01:58:12', 'admin'),
(126, '12บ้าน1-2', '64722', '0', '2025-03-03 01:59:26', ''),
(127, '12บ้าน1-2', '64722', '1', '2025-03-03 02:00:08', 'admin'),
(128, '12บ้าน1-2', '64722', '2', '2025-03-03 02:00:16', 'admin'),
(129, '12บ้าน1-2', '64722', '4', '2025-03-03 02:00:29', 'admin'),
(130, '26สำนักงาน3-3', '100', '0', '2025-03-03 02:03:01', ''),
(131, '26สำนักงาน3-3', '100', '3', '2025-03-03 02:03:07', 'admin'),
(132, '26สำนักงาน3-3', '100', '5', '2025-03-03 02:07:33', 'พัสดุ'),
(133, '33ห้องปฏิบัติการ2-4', '64723', '0', '2025-03-03 02:10:56', ''),
(134, '33ห้องปฏิบัติการ2-4', '64723', '3', '2025-03-03 02:11:15', 'admin'),
(135, '26สำนักงาน3-5', '100', '0', '2025-03-03 02:36:04', ''),
(136, '12สำนักงาน2-6', 'repair-000001', '0', '2025-03-03 02:37:03', ''),
(137, '26สำนักงาน3-7', '100', '0', '2025-03-03 02:39:25', ''),
(138, '26สำนักงาน3-8', '100', '0', '2025-03-03 02:40:26', ''),
(139, '33ห้องปฏิบัติการ2-9', '555', '0', '2025-03-03 02:41:13', ''),
(140, '33ห้องปฏิบัติการ2-9', '555', '1', '2025-03-03 23:41:40', 'admin'),
(141, '26สำนักงาน3-8', '100', '1', '2025-03-04 02:50:34', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `role_menu` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `ward_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `role_menu`, `ward_id`, `name`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 1, 'admin'),
(2, 'user1', 'user1', 'user', 'user', 1, 'วอร์ด อย.'),
(3, 'passadu', 'passadu', 'passadu', 'passadu', 0, 'พัสดุ'),
(4, 'user2', 'user2', 'user', 'user', 2, 'วอร์ด สงฆ์ล่าง'),
(5, 'tin', 'tin', 'doctor', 'admin', 1, 'อุฟุฟวยฟวยฟวย อันเยนทวยววยฟวย อุกเวมุเวม โอซาส');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `id` int NOT NULL,
  `name_ward` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`id`, `name_ward`) VALUES
(1, 'อย.'),
(2, 'สงฆ์ล่าง'),
(3, 'ตรวจโรคทั่วไป'),
(4, 'ER'),
(5, 'OPD MED'),
(6, 'ศูนย์คอม');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_records`
--
ALTER TABLE `patient_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repairlist`
--
ALTER TABLE `repairlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_depart`
--
ALTER TABLE `res_depart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_log`
--
ALTER TABLE `status_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `patient_records`
--
ALTER TABLE `patient_records`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `repairlist`
--
ALTER TABLE `repairlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `res_depart`
--
ALTER TABLE `res_depart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `status_log`
--
ALTER TABLE `status_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
