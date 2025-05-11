-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 25, 2024 at 08:45 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `name`, `type`) VALUES
(1, 'ผู้ป่วย', 1),
(2, 'ญาติผู้ป่วย', 1),
(3, 'ผู้นำส่ง', 1),
(4, 'ไม่มี', 2),
(5, 'มี ได้แก่ เบาหวาน โรคหัวใจ ความดันโลหิตสูง หอบหืด วัณโรค โรคเลือด โรคตับ โรคไต มะเร็ง ลมชัก', 2),
(6, 'อื่นๆ', 2),
(7, 'ไม่เคย', 3),
(8, 'เคย', 3),
(9, 'ไม่เคย', 4),
(10, 'เคย', 4),
(11, 'ไม่มี', 5),
(12, 'มี', 5),
(13, 'ไม่มี', 6),
(14, 'มี', 6),
(15, 'รู้สึกตัวดี', 7),
(16, 'สับสน', 7),
(17, 'ซึม', 7),
(18, 'ไม่รู้สึกตัว', 7),
(19, 'ปกติ', 8),
(20, 'ผิดปกติ', 8),
(21, 'ปกติ', 9),
(22, 'ผิดปกติ (ซีด ปลายมือเท้าเขียว รอบปากเขียว เขียวทั่วตัว)', 9),
(23, 'อื่นๆ', 9),
(24, 'ไม่มี', 10),
(25, 'มี', 10),
(26, 'ปกติ', 11),
(27, 'ผิดปกติ (แห้งแตก เขียวช้ำ ผื่นแดง ผื่นคัน เหลือง มีบาดแผล)', 11),
(28, 'อื่นๆ', 11),
(29, 'ได้ยินชัดเจน', 12),
(30, 'ได้ยินไม่ชัดเจน', 12),
(31, 'ใช้', 13),
(32, 'ไม่ได้ใช้', 13),
(33, 'เห็นชัดเจน', 14),
(34, 'เห็นไม่ชัดเจน', 14),
(35, 'สวม', 15),
(36, 'ไม่สวม', 15),
(37, 'ปกติ', 16),
(38, 'ผิดปกติ', 16),
(39, 'ผู้ป่วย', 17),
(40, 'บิดา/มารดา', 17),
(41, 'สามี/ภรรยา', 17),
(42, 'บุตร', 17),
(43, 'ญาติ', 17),
(44, 'ดี', 18),
(45, 'ไม่ดี', 18),
(46, 'ไป รพ./รพ.สต.', 19),
(47, 'ซื้อยารับประทานเอง', 19),
(48, 'อื่นๆ', 19),
(52, 'คาดว่าหาย', 20),
(53, 'ไม่แน่ใจ', 20),
(54, 'ไม่หาย', 20),
(55, 'ไม่เคย', 21),
(56, 'เคย', 21),
(57, 'ปัจจุบันเลิกเสพ', 21),
(58, 'ปัจจุบันยังไม่เลิกเสพ', 21),
(59, 'ข้าวสวย', 22),
(60, 'ข้าวต้ม', 22),
(61, 'ข้าวเหนียว', 22),
(62, 'อื่นๆ', 22),
(63, 'ไม่มี', 23),
(64, 'มี', 23),
(65, 'ปกติ', 24),
(66, 'ไม่ปกติ', 24),
(67, 'ปกติ', 25),
(68, 'ไม่ปกติ', 25),
(69, 'ช่วยเหลืแตัวเองได้ดี', 26),
(70, 'ช่วยเหลือตัวเองไม่ได้ในเรื่อง', 26),
(71, 'สม่ำเสมอ', 27),
(72, 'นานๆครั้ง', 27),
(73, 'ไม่เคย', 27),
(74, 'เพียงพอ', 28),
(75, 'ไม่เพียงพอ', 28),
(76, 'ไม่มี', 29),
(77, 'มี', 29),
(78, 'ไม่เคย', 30),
(79, 'ใช้ประจำ', 30),
(80, 'ใช้เป็นครั้งคราว', 30),
(81, 'ปกติ', 31),
(82, 'ไม่ปกติ', 31),
(83, 'ปกติ', 32),
(84, 'ไม่ปกติ', 32),
(85, 'ปกติ', 33),
(86, 'ไม่ปกติ', 33),
(87, 'ปกติ', 34),
(88, 'ไม่ปกติ', 34),
(89, 'ไม่มี', 35),
(90, 'มี', 35),
(91, 'เป็นครั้งคราว', 36),
(92, 'ตลอดเวลา', 36),
(93, 'ไม่มี', 37),
(94, 'มี', 37),
(95, 'ไม่มี', 38),
(96, 'มี', 38),
(97, 'ภาพลักษณ์', 39),
(98, 'อารมณ์และจิตใจ', 39),
(99, 'ความสามารถ', 39),
(100, 'ไม่มี', 40),
(101, 'มี', 40),
(102, 'ไม่มีปัญหา', 41),
(103, 'มี', 41),
(104, 'ตัดสินใจเอง', 42),
(105, 'ให้ผู้อื่นตัดสินใจ', 42),
(106, 'ปรึกษาผู้ไว้ใจ', 43),
(107, 'ทำงานอดิเรก', 43),
(108, 'แยกตัว', 43),
(109, 'ใช้ยา', 43),
(110, 'อื่นๆ', 43),
(111, 'ได้', 44),
(112, 'ไม่ได้', 44),
(113, 'ดูแลสุขภาพไม่ถูกต้อง', 45),
(114, 'ตามวัย', 45),
(115, 'เคราะห์กรรม', 45),
(116, 'อื่นๆ ', 45),
(117, 'ครอบครัว', 46),
(118, 'ศาสนา', 46),
(119, ' อื่นๆ ', 46),
(120, 'ไม่มี (ผู้ป่วยรู้สึกตัวดี พลิกตัว เดิน ลุกนั่งได้)', 47),
(121, 'มี', 47),
(122, 'ไม่มี', 48),
(123, 'มี', 48),
(124, 'มี', 49),
(125, 'ไม่มี', 49),
(126, 'มี', 50),
(127, 'ไม่มี', 50);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `admission_date` date NOT NULL COMMENT 'วันที่',
  `admission_time` time NOT NULL COMMENT 'เวลา',
  `information_provider` int(11) DEFAULT NULL COMMENT 'ผู้ให้ข้อมูล',
  `referrer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ผู้นำส่ง',
  `phone_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'โทร',
  `important_symptoms` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'อาการสำคัญ',
  `current_illness_history` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ประวัติการเจ็บป่วยปัจจุบัน',
  `respiratory_score` int(11) NOT NULL COMMENT 'ประวัติอาการทางเดินโรคหายใจ',
  `past_illness_history` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'การเจ็บป่วยในอดีต',
  `regular_medications` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ยาที่ใช้ประจำ',
  `hospital_stay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'การพักรักษาตัวในโรงพยาบาล',
  `surgical_history` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ประวัติการผ่าตัด',
  `allergy_details` varchar(255) NOT NULL COMMENT 'การแพ้ยา',
  `family_illness_history` varchar(255) NOT NULL COMMENT 'ประวัติการเจ็บป่วยในครอบครัว',
  `consciousness_level` int(11) NOT NULL COMMENT 'ระดับการรู้สึกตัว',
  `breathing_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'การหายใจ',
  `skin_color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `swelling` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `skin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ear` int(11) NOT NULL,
  `hearing_aid` int(11) NOT NULL,
  `eye` int(11) NOT NULL,
  `wearing_glasses` int(11) NOT NULL,
  `speech` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `health_plan_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `health_before_illness` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `health_care_when_ill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `expectations_today` int(11) NOT NULL,
  `substance_abuse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rice` varchar(255) DEFAULT NULL,
  `eating_issues` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `urination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `defecation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `activity_ability` varchar(255) DEFAULT NULL,
  `exercise` int(11) NOT NULL,
  `sleep_habits` varchar(255) NOT NULL,
  `sleep_problems` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sleep_medication` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Pre_morbid_memory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `First_memory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Pre_illness_sensory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `First_senses` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pain_characteristics` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `illness_effect` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stress_cause` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role_relationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `current_discomfort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `specify_sexual_relationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `important_decision` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Uneasy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `home_care` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `illness_cause` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Something` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Pressure_sores` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Fall_wound` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `two_weeks_sad` int(11) NOT NULL,
  `two_weeks_bored` int(11) DEFAULT NULL,
  `HN` int(11) DEFAULT NULL,
  `AN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `admission_date`, `admission_time`, `information_provider`, `referrer`, `phone_number`, `important_symptoms`, `current_illness_history`, `respiratory_score`, `past_illness_history`, `regular_medications`, `hospital_stay`, `surgical_history`, `allergy_details`, `family_illness_history`, `consciousness_level`, `breathing_status`, `skin_color`, `swelling`, `skin`, `ear`, `hearing_aid`, `eye`, `wearing_glasses`, `speech`, `health_plan_info`, `health_before_illness`, `health_care_when_ill`, `expectations_today`, `substance_abuse`, `rice`, `eating_issues`, `urination`, `defecation`, `activity_ability`, `exercise`, `sleep_habits`, `sleep_problems`, `sleep_medication`, `Pre_morbid_memory`, `First_memory`, `Pre_illness_sensory`, `First_senses`, `pain`, `pain_characteristics`, `illness_effect`, `stress_cause`, `role_relationship`, `current_discomfort`, `specify_sexual_relationship`, `important_decision`, `Uneasy`, `home_care`, `illness_cause`, `Something`, `Pressure_sores`, `Fall_wound`, `two_weeks_sad`, `two_weeks_bored`, `HN`, `AN`) VALUES
(42, '2024-11-20', '09:09:00', 1, 'ญาติ', '0887889855', 'โรคขาสั่น', 'เจอรักครั้งเก่า', 7, 'ป่วย', 'ยาลดความป่วย', '8, 5 ครั้ง, 23/04/2024, สิงห์, ปวดท้อง', '10 ครั้ง, นิ้ว', 'sunfa', '13', 18, 'หายใจไม่คล่อง', 'ดำ', 'ขา', 'แตก', 30, 32, 34, 36, 'ไม่ชัด', 'ดี', 'ไม่ดี', 'นอน', 54, 'สูบบุหรี่: 9 มวน/วัน, เป็นเวลา: 4 ปี, ดื่มสุรา: 5 วัน/สัปดาห์, เป็นเวลา: 10 ปี', '4, เตี๋ยว', 'หิวบ่อย', 'สีเหลือง', 'สีเขียว', 'ทำใจ', 73, '12 ชั่วโมง, 75', 'เลี้ยงลูก', 'ตอนง่วง', 'นานมาก', '84', 'เจ็บ', '88', 'นิ้ว', '92, 10', 'ภาพลักษณ์ ', 'ไม่สบายใจ', 'ใช้นิ้วได้ไม่ถนัดเหมือนเดิม', 'ความเครียด', '103, ดี, 2024-11-20', '105', 'นอน', 'ผู้ป่วย', 'นอนเยอะ', 'หมอนข้าง', '121', '123', 125, 126, 111131312, 1212312121),
(68, '2024-11-20', '10:39:00', 3, 'ญาติ', '0123456789', 'โรคขาสั่น', 'เจ็บขา', 8, 'ป่วย', 'ยาลดความป่วย', '2 ครั้ง, 23/04/2024, สิงห์, นอน', '10 ครั้ง , นิ้ว', 'sunfa', 'ไข้หวัด', 17, '19', '22', 'ขา', 'แตก', 30, 31, 34, 36, 'ไม่ชัด', 'ผู้ใหญ่บ้าน', 'ไม่ดี', 'นอน', 53, 'สูบบุหรี่ : 2 มวน/วัน, เป็นเวลา : 4 ปี, ดื่มสุรา : 5 วัน/สัปดาห์, เป็นเวลา : 10 ปี', '4 มื้อ,59', 'หิวบ่อย', 'สีเหลือง', 'สีเขียว', 'ทำใจ', 73, '5 ชั่วโมง, 75', 'เลี้ยงลูก', 'ตอนง่วง', 'นานมาก', '84', 'เจ็บ', '88', 'นิ้ว', '91, ระดับ 10', 'ภาพลักษณ์ ', 'ไม่สบายใจ', '98', '101', '103, ดี, 2024-11-20', '105', 'นอน', 'ผู้ป่วย', 'นอนเยอะ', 'หมอนข้าง', '121', '123', 124, 126, 84684, 3516546),
(77, '2024-11-20', '13:46:00', 1, 'ญาติ', '0887881079', 'ป่วย', 'รถชน', 7, '5', 'sanfa', '2 ครั้ง, 23/04/2024, สิงห์บุรี, ปวดท้อง', '10 ครั้ง , นิ้ว', '11', 'ไข้หวัด', 15, '19', '22', '24', '26', 29, 32, 33, 36, '37', '40', '44', '46', 52, 'สูบบุหรี่ : 9 มวน/วัน, เป็นเวลา : 4 ปี, ดื่มสุรา : 5 วัน/สัปดาห์, เป็นเวลา : 10 ปี', '3 มื้อ,59', '63', '65', '67', '69', 71, '16 ชั่วโมง, 74', 'เลี้ยงลูก', '78', '81', '83', 'เจ็บ', '88', 'นิ้ว', '91, ระดับ 10', '93', '95', '97', 'ความเครียด', '103, ดี, 2024-11-20', '104', '107', '112', '114', '117', '120', '122', 124, 126, 144548, 14485);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `first_received_date` date NOT NULL,
  `time` time NOT NULL,
  `informant` varchar(255) NOT NULL,
  `informant_responsible` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `key_symptoms` varchar(255) DEFAULT NULL,
  `current_illness_history` varchar(255) DEFAULT NULL,
  `respiratory_symptoms_history` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
