-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2015 at 08:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kdumooc`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `allstudents`
--
CREATE TABLE IF NOT EXISTS `allstudents` (
`idSTUDENT` int(11)
,`first_name` varchar(100)
,`last_name` varchar(100)
,`registration_no` varchar(45)
,`dob` date
,`gender` varchar(10)
,`nic` varchar(12)
,`email` varchar(200)
,`username` varchar(200)
,`password` varchar(200)
,`deleted` tinyint(1)
,`activated` tinyint(1)
,`verified` tinyint(1)
);
-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `idANSWER` int(11) NOT NULL AUTO_INCREMENT,
  `answer` longtext COLLATE utf8_unicode_ci,
  `QUESTIONBANK_idQUESTIONBANK` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `correct_answer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idANSWER`),
  KEY `fk_ANSWER_QUESTIONBANK1_idx` (`QUESTIONBANK_idQUESTIONBANK`),
  KEY `PIndex` (`idANSWER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=296 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`idANSWER`, `answer`, `QUESTIONBANK_idQUESTIONBANK`, `deleted`, `correct_answer`) VALUES
(1, 'If Bill is Tom’s Brother, then Tom is Jane’s father and Jane is not Bill’s niece.', 1, 0, 0),
(4, 'sdfsd', 6, 0, 0),
(5, 'sfsd', 6, 0, 0),
(6, 'dsfsdgs', 6, 0, 0),
(7, 'erew', 6, 0, 1),
(8, 'If n is not divisible by 30 then n is divisible by 2 or divisible by 3 or divisible by 5.', 7, 0, 0),
(9, 'If n is not divisible by 30 then n is not divisible by 2 or not divisible by 3 or not divisible by 5.', 7, 0, 0),
(10, 'If n is divisible by 2 and divisible by 3 and divisible by 5 then n is divisible by 30.', 7, 0, 0),
(11, 'If n is not divisible by 2 or not divisible by 3 or not divisible by 5 then n is not divisible by 30.', 7, 0, 0),
(12, 'There exists a person who is a computer scientist and who knows both discrete math and Java or there exists a person who is a mathematician and who knows both discrete math and Java.', 8, 0, 0),
(13, 'There exists a person who is a computer scientist or there exists a person who is a mathematician who knows discrete math or who knows Java.', 8, 0, 1),
(14, 'There exists a person who is a computer scientist and who knows both discrete math and Java or there exists a mathematician who knows both discrete math and Java.', 8, 0, 0),
(15, 'There exists a computer scientist who knows both discrete math and Java or there exists a person who is a mathematician who knows both discrete math and Java.', 8, 0, 0),
(16, 'aaa', 9, 0, 0),
(17, 'bbb', 9, 0, 0),
(18, 'ccc', 9, 0, 1),
(19, 'ddd', 9, 0, 0),
(20, 'Relation', 10, 0, 0),
(21, 'Function', 10, 0, 0),
(22, 'Set', 10, 0, 1),
(23, 'Proposition', 10, 0, 0),
(24, '{1, 2, 3}', 11, 0, 0),
(25, '{1, 3, 5, 7, 9}', 11, 0, 1),
(26, '{1, 2, 5, 9}', 11, 0, 0),
(27, '{1, 5, 7, 9, 11}', 11, 0, 0),
(28, 'One', 12, 0, 1),
(29, 'Two', 12, 0, 0),
(30, 'Zero', 12, 0, 0),
(31, 'Three', 12, 0, 0),
(32, '{(1, a), (1, b), (2, a), (b, b)}', 13, 0, 0),
(33, '{(1, 1), (2, 2), (a, a), (b, b)}', 13, 0, 0),
(34, '{(1, a), (2, a), (1, b), (2, b)}', 13, 0, 1),
(35, '{(1, 1), (a, a), (2, a), (1, b)}', 13, 0, 0),
(36, '10', 14, 0, 0),
(37, '5', 14, 0, 1),
(38, '3', 14, 0, 0),
(39, '20', 14, 0, 0),
(40, 'A = {1, 2} and B = {1}', 15, 0, 0),
(41, 'A = {1, 2} and B = {1, 2, 3}', 15, 0, 0),
(42, 'A = {1, 2, 3} and B = {2, 1, 3}', 15, 0, 1),
(43, ' A = {1, 2, 4} and B = {1, 2, 3}', 15, 0, 0),
(44, 'Infinite', 16, 0, 1),
(45, 'Finite', 16, 0, 0),
(46, 'Subset', 16, 0, 0),
(47, 'Empty', 16, 0, 0),
(48, '8', 17, 0, 1),
(49, '6', 17, 0, 0),
(50, '7', 17, 0, 0),
(51, '9', 17, 0, 0),
(52, '{0, 2, 4, 5, 9, 58, 49, 56, 99, 12} ', 18, 0, 0),
(53, '{0, 1, 4, 9, 16, 25, 36, 49, 64, 81} ', 18, 0, 1),
(54, '{1, 4, 9, 16, 25, 36, 64, 81, 85, 99} ', 18, 0, 0),
(55, '{0, 1, 4, 9, 16, 25, 36, 49, 64, 121}', 18, 0, 0),
(56, '{1, 2, 6, 1}', 19, 0, 0),
(57, '{1, 2, 5, 6}', 19, 0, 1),
(58, '{1, 2, 1, 2}', 19, 0, 0),
(59, '{1, 5, 6, 3}', 19, 0, 0),
(60, '{1, 2}', 20, 0, 1),
(61, '{5, 6}', 20, 0, 0),
(62, '{2, 5}', 20, 0, 0),
(63, '{1, 6}', 20, 0, 0),
(64, 'Union', 21, 0, 0),
(65, 'Difference', 21, 0, 0),
(66, 'Intersection', 21, 0, 1),
(67, 'Complement', 21, 0, 0),
(68, '{1, 3, 5} and {1, 3, 6}', 22, 0, 0),
(69, '{1, 2, 3} and {1, 2, 3}', 22, 0, 0),
(70, '{1, 3, 5} and {2, 3, 4}', 22, 0, 0),
(71, '{1, 3, 5} and {2, 4, 6}', 22, 0, 1),
(72, '{1}', 23, 0, 0),
(73, '{5}', 23, 0, 0),
(74, '{3}', 23, 0, 1),
(75, '{2}', 23, 0, 0),
(76, 'A – B', 24, 0, 0),
(77, 'U – A', 24, 0, 1),
(78, 'A – U', 24, 0, 0),
(79, 'B – A', 24, 0, 0),
(80, '0101010101', 25, 0, 1),
(81, '1010101010', 25, 0, 0),
(82, '1010010101', 25, 0, 0),
(83, '0010010101', 25, 0, 0),
(84, 'Union', 26, 0, 0),
(85, 'Intersection', 26, 0, 1),
(86, 'Set Difference', 26, 0, 0),
(87, 'Disjoint', 26, 0, 0),
(88, '1010100000', 27, 0, 0),
(89, ' 1010101101', 27, 0, 0),
(90, '1111111100', 27, 0, 0),
(91, '1111101010', 27, 0, 1),
(92, 'A', 28, 0, 1),
(93, 'null', 28, 0, 0),
(94, 'U', 28, 0, 0),
(95, 'B', 28, 0, 0),
(96, 'One-to-many', 29, 0, 0),
(97, 'One-to-one', 29, 0, 0),
(98, 'Many-to-many', 29, 0, 0),
(99, 'Many-to-one', 29, 0, 1),
(100, '1', 30, 0, 1),
(101, '2', 30, 0, 0),
(102, '3', 30, 0, 0),
(103, '0.5', 30, 0, 0),
(104, 'f(a, b) = a + b', 31, 0, 0),
(105, 'f(a, b) = a', 31, 0, 0),
(106, 'f(a, b) = |b', 31, 0, 1),
(107, 'f(a, b) = a – b', 31, 0, 0),
(108, '6x + 9', 32, 0, 1),
(109, '6x + 7', 32, 0, 0),
(110, '6x + 6', 32, 0, 0),
(111, '6x + 8', 32, 0, 0),
(112, '1', 33, 0, 0),
(113, '2', 33, 0, 1),
(114, '3', 33, 0, 0),
(115, '8', 33, 0, 0),
(116, 'f^ -1 (y) = (y – 2) ^1/2 ', 34, 0, 0),
(117, 'f^ -1 (y) = (y – 2) ^1/3 ', 34, 0, 1),
(118, 'f ^-1 (y) = (y) ^1/3 ', 34, 0, 0),
(119, 'f^ -1 (y) = (y – 2)', 34, 0, 0),
(120, '{x | 0 &#8804; x < 1} ', 35, 0, 0),
(121, '{x | 0 < x &#8804; 1} ', 35, 0, 0),
(122, '{x | 0 < x &#8804; 1} ', 35, 0, 0),
(123, '{x | 0 &#8804; x &#8804; 1}', 35, 0, 1),
(124, '8', 36, 0, 0),
(125, '9', 36, 0, 0),
(126, '7', 36, 0, 1),
(127, '6', 36, 0, 0),
(128, '1829', 37, 0, 0),
(129, '1831', 37, 0, 1),
(130, '1830', 37, 0, 0),
(131, '1832', 37, 0, 0),
(132, '6', 38, 0, 0),
(133, '4', 38, 0, 1),
(134, '3', 38, 0, 0),
(135, '5', 38, 0, 0),
(136, '{2} &#8712; A and {3} &#8712; A implies that {2, 3} &#8838; A.', 39, 0, 1),
(137, 'A &#8722; B &#8839; {3} and {2} &#8838; B implies that {2, 3} &#8838; A &#8746; B.', 39, 0, 0),
(138, 'A &#8745; B &#8839; {2, 3} implies that {2, 3} &#8838; A and {2, 3} &#8838; B.', 39, 0, 0),
(139, '{2, 3} &#8838; A implies that 2 &#8712; A and 3 &#8712; A', 39, 0, 0),
(140, '((1, 0), a,(0, 0))', 40, 0, 0),
(141, '((1, 1), c,(0, 0))', 40, 0, 0),
(142, '((1, 1), a,(0, 0))', 40, 0, 1),
(143, ' ((1, 1), a,(1, 1))', 40, 0, 0),
(144, 'For all sets A, B, and C, A &#8722; (B &#8722; C) = (A &#8722; B) &#8722; C.', 41, 0, 0),
(145, 'For all sets A, B, and C, (A &#8722; B) &#8745; (C &#8722; B) = (A &#8745; C) &#8722; B', 41, 0, 1),
(146, 'For all sets A, B, and C, (A &#8722; B) &#8745; (C &#8722; B) = A &#8722; (B &#8746; C).', 41, 0, 0),
(147, ' For all sets A, B, and C, if A &#8745; C = B &#8745; C then A = B.', 41, 0, 0),
(148, '{2, 3, 4} &#8838; A implies that 2 &#8712; A and {3, 4} &#8838; A.', 42, 0, 0),
(149, '{2, 3, 4} &#8712; A and {2, 3} &#8712; B implies that {4} &#8838; A &#8722; B', 42, 0, 1),
(150, 'A &#8745; B &#8839; {2, 3, 4} implies that {2, 3, 4} &#8838; A and {2, 3, 4} &#8838; B.', 42, 0, 0),
(151, 'A &#8722; B &#8839; {3, 4} and {1, 2} &#8838; B implies that {1, 2, 3, 4} &#8838; A &#8746; B', 42, 0, 0),
(152, ' 2|A| &#8804; |B|', 43, 0, 1),
(153, ' 2|A| &#8805; |B|', 43, 0, 0),
(154, '2|A| < |B|', 43, 0, 0),
(155, ' 2|A| &#8805; 2 |B|', 43, 0, 0),
(156, 'Image(f) = {a, b, c, d, e}, Coimage(f) = {{6, 7, 9}, {2, 5, 8}, {3, 4}, {1}}', 44, 0, 0),
(157, 'Image(f) = {a, b, c, e}, Coimage(f) = {{6, 7, 9}, {2, 5, 8}, {3, 4}}', 44, 0, 0),
(158, ' Image(f) = {a, b, c, e}, Coimage(f) = {{6, 7, 9}, {2, 5, 8}, {3, 4}, {1}}', 44, 0, 1),
(159, 'Image(f) = {a, b, c, e}, Coimage(f) = {{6, 7, 9, 2, 5, 8}, {3, 4}, {1}}', 44, 0, 0),
(160, 'xxxxyxy', 45, 0, 0),
(161, 'xxxyxxx', 45, 0, 1),
(162, 'xxyxyxx', 45, 0, 0),
(163, 'xxyyyxx', 45, 0, 0),
(164, '(124957368)', 46, 0, 0),
(165, '(142597368)', 46, 0, 0),
(166, '(142953768)', 46, 0, 0),
(167, '(142957368)', 46, 0, 1),
(168, ' 0000111122222', 47, 0, 0),
(169, '001112223333', 47, 0, 0),
(170, '000111222333', 47, 0, 1),
(171, '0000011112222', 47, 0, 0),
(172, 'A = &#8709; or B = &#8709;', 48, 0, 0),
(173, ' B = &#8709; or A = B', 48, 0, 0),
(174, ' A = &#8709; or B = &#8709; or A = B', 48, 0, 1),
(175, 'A = &#8709; or B = &#8709; or A &#8745; B = &#8709;', 48, 0, 0),
(176, 'c &#8743; m &#8743; (g &#8744; (&#8764;h &#8744; &#8764;t))', 49, 0, 0),
(177, 'c &#8743; m &#8743; g &#8743; (&#8764;h &#8743; &#8764;t) ', 49, 0, 0),
(178, 'c &#8743; m &#8743; g &#8743; (&#8764;h &#8744; &#8764;t) ', 49, 0, 1),
(179, 'c &#8743; m &#8743; (g &#8744; (&#8764;h &#8743; &#8764;t)) ', 49, 0, 0),
(180, 'q &#8744; r ', 50, 0, 1),
(181, '((p &#8744; r) &#8744; q)) &#8743; (p &#8744; r) ', 50, 0, 0),
(182, '(p &#8743; q) &#8744; (p &#8743; r) ', 50, 0, 0),
(183, '(p &#8744; q) &#8743; &#8764;(p &#8744; r) ', 50, 0, 0),
(184, 'q &#8744; r ', 51, 0, 1),
(185, '((p &#8744; r) &#8744; q)) &#8743; (p &#8744; r) ', 51, 0, 0),
(186, '(p &#8743; q) &#8744; (p &#8743; r) ', 51, 0, 0),
(187, '(p &#8744; q) &#8743; &#8764;(p &#8744; r) ', 51, 0, 0),
(188, '(p &#8744; q) &#8743; (p &#8744; r) ', 52, 0, 0),
(189, '(p &#8744; q) &#8743; r ', 52, 0, 0),
(190, '(p &#8744; q) &#8743; (p &#8743; r) ', 52, 0, 0),
(191, 'p &#8744; q (e) (p &#8743; q) &#8744; p', 52, 0, 1),
(192, 'q', 53, 0, 0),
(193, 'p &#8743; r ', 53, 0, 0),
(194, 'p &#8744; q ', 53, 0, 0),
(195, 'p', 53, 0, 1),
(196, '(p &#8744; q) &#8743; (p &#8744; r) ', 54, 0, 0),
(197, '(p &#8744; q) &#8743; r ', 54, 0, 0),
(198, '(p &#8744; q) &#8743; (p &#8743; r) ', 54, 0, 0),
(199, 'p &#8744; q (e) (p &#8743; q) &#8744; p', 54, 0, 1),
(200, '&#8764;p &#8744; (p &#8743; q)', 55, 0, 0),
(201, '(p &#8743; q) &#8744; (&#8764;p &#8744; (p &#8743; &#8764;q)) ', 55, 0, 1),
(202, '((&#8764;p &#8743; q) &#8743; (q &#8743; r)) &#8743; &#8764;q ', 55, 0, 0),
(203, '(&#8764;p &#8744; q) &#8744; (p &#8743; q)', 55, 0, 0),
(204, 'x < &#8722;2 or 2 < x or &#8722;1 < x < 1 ', 56, 0, 1),
(205, 'x < &#8722;2 or 2 < x ', 56, 0, 0),
(206, '&#8722;1 < x < 1 ', 56, 0, 0),
(207, 'x &#8804; &#8722;2 or 2 &#8804; x or &#8722;1 < x < 1 ', 56, 0, 0),
(208, '[(&#8764;P &#8743; &#8764;Q) &#8744; Q] &#8744; R ', 57, 0, 0),
(209, '[(&#8764;P &#8743; &#8764;Q) &#8743; Q] &#8743; R ', 57, 0, 0),
(210, '[(&#8764;P &#8743; &#8764;Q) &#8744; Q] &#8743; R ', 57, 0, 1),
(211, '[(&#8764;P &#8744; &#8764;Q) &#8743; Q] &#8743; R ', 57, 0, 0),
(212, '(P &#8743; Q) &#8744; (&#8764;P &#8743; Q) &#8744; (P &#8743; &#8764;Q) is equal to &#8764;Q &#8743; &#8764;P ', 58, 0, 1),
(213, '(P &#8743; Q) &#8744; (&#8764;P &#8743; Q) &#8744; (P &#8743; &#8764;Q) is equal to Q &#8744; (P &#8743; &#8764;Q) ', 58, 0, 0),
(214, '(P &#8743; Q) &#8744; (&#8764;P &#8743; Q) &#8744; (P &#8743; &#8764;Q) is equal to [(P &#8744; &#8764;P) &#8743; Q] &#8744; (P &#8743; &#8764;Q) ', 58, 0, 0),
(215, '(P &#8743; Q) &#8744; (&#8764;P &#8743; Q) &#8744; (P &#8743; &#8764;Q) is equal to P &#8744; (Q &#8743; &#8764;P). ', 58, 0, 0),
(216, '(P &#8743; Q) &#8744; &#8764;R ', 59, 0, 0),
(217, 'P &#8744; (Q &#8743; R) ', 59, 0, 0),
(218, '&#8764;P &#8744; (Q &#8743; R) ', 59, 0, 1),
(219, '(P &#8743; &#8764;Q) &#8744; R ', 59, 0, 0),
(220, 'If Bill is Tom’s Brother, then Tom is Jane’s father and Jane is not Bill’s niece.', 60, 0, 0),
(221, 'If Bill is not Tom’s Brother, then Tom is Jane’s father and Jane is not Bill’s niece.', 60, 0, 1),
(222, 'If Bill is not Tom’s Brother, then Tom is Jane’s father or Jane is Bill’s niece.', 60, 0, 0),
(223, 'If Bill is Tom’s Brother, then Tom is Jane’s father and Jane is Bill’s niece.', 60, 0, 0),
(224, 'If n is not divisible by 30 then n is divisible by 2 or divisible by 3 or divisible by 5.', 61, 0, 0),
(225, 'If n is not divisible by 30 then n is not divisible by 2 or not divisible by 3 or not divisible by 5.', 61, 0, 0),
(226, 'If n is divisible by 2 and divisible by 3 and divisible by 5 then n is divisible by 30.', 61, 0, 0),
(227, 'If n is not divisible by 2 or not divisible by 3 or not divisible by 5 then n is not divisible by 30.', 61, 0, 1),
(228, 'If you lose the game then you don’t know the rules or you are overconfident.', 62, 0, 1),
(229, 'A sufficient condition that you win the game is that you know the rules or you are not overconfident.', 62, 0, 0),
(230, 'If you don’t know the rules or are overconfident you lose the game.', 62, 0, 0),
(231, 'If you know the rules and are overconfident then you win the game.', 62, 0, 0),
(232, '[(p _ r) ^ (p _ r)] _ [(q _ r) ^ (q _ r)]', 63, 0, 0),
(233, '_[(p _ r) ^ (p _ r)] ^ [(q _ r) ^ (q _ r)]', 63, 0, 0),
(234, '[(p _ r) ^ (p _ r)] ^ [(q _ r) ^ (q _ r)]', 63, 0, 0),
(235, '_[(p _ r) ^ (p _ r)] _ [(q _ r) ^ (q _ r)]', 63, 0, 1),
(236, 'People who are in need of refuge and consolation are not apt to do odd things.', 64, 0, 0),
(237, 'People are apt to do odd things if and only if they are in need of refuge and consolation.', 64, 0, 0),
(238, 'People who are apt to do odd things are in need of refuge and consolation.', 64, 0, 1),
(239, 'People who are in need of refuge and consolation are apt to do odd things.', 64, 0, 0),
(240, 'People who are in need of refuge and consolation are not apt to do odd things.', 65, 0, 0),
(241, 'People are apt to do odd things if and only if they are in need of refuge and consolation.', 65, 0, 0),
(242, 'People who are apt to do odd things are in need of refuge and consolation.', 65, 0, 1),
(243, 'People who are in need of refuge and consolation are apt to do odd things.', 65, 0, 0),
(244, 'If T is a right triangle then a2 + b2 = c2.', 66, 0, 0),
(245, 'If a2 + b2 = c2 then T is a right triangle.', 66, 0, 1),
(246, 'If a2 + b2 6= c2 then T is not a right triangle.', 66, 0, 0),
(247, 'T is a right triangle only if a2 + b2 = c2.', 66, 0, 0),
(248, 'There exists a person who is a computer scientist and who knows both discrete math and Java or there exists a person who is a mathematician and who knows both discrete math and Java.', 67, 0, 0),
(249, 'There exists a person who is a computer scientist or there exists a person who is a mathematician who knows discrete math or who knows Java.', 67, 0, 1),
(250, 'There exists a person who is a computer scientist and who knows both discrete math and Java or there exists a mathematician who knows both discrete math and Java.', 67, 0, 0),
(251, 'There exists a computer scientist who knows both discrete math and Java or there exists a person who is a mathematician who knows both discrete math and Java.', 67, 0, 0),
(252, 'For all odd primes p < q there exists positive non-primes r < s such that p2+q2 6= r2 + s2.', 68, 0, 0),
(253, 'There exists odd primes p < q such that for all positive non-primes r < s, p2+q2 = r2 + s2.', 68, 0, 0),
(254, 'There exists odd primes p < q such that for all positive non-primes r < s, p2+q2 6= r2 + s2.', 68, 0, 1),
(255, 'For all odd primes p < q and for all positive non-primes r < s, p2 + q2 6= r2 + s2.', 68, 0, 0),
(256, 'This assertion is false. A counterexample is D = N, P(x) = “x is divisible by 6,” Q(x) = “x is divisible by 3.”', 69, 0, 0),
(257, 'This assertion is true. The proof follows from the distributive law for ^.', 69, 0, 0),
(258, 'This assertion is false. A counterexample is D = Z, P(x) = “x < 0,” Q(x) = “x  0.”', 69, 0, 1),
(259, 'This assertion is false. A counterexample is D = N, P(x) = “x is a square,” Q(x) = “x is odd.”', 69, 0, 0),
(260, 'for all n', 70, 0, 0),
(261, 'for all n>1', 70, 0, 0),
(262, 'for all  n>m, m is some fixed positive integer', 70, 0, 0),
(263, 'nothing can be said', 70, 0, 1),
(264, 'all n', 71, 0, 0),
(265, 'all n>2', 71, 0, 0),
(266, 'all n>3', 71, 0, 1),
(267, 'None of them', 71, 0, 0),
(268, 'for all integers', 72, 0, 0),
(269, 'all n >1', 72, 0, 0),
(270, 'All n>1 and X not equal Zero', 72, 0, 1),
(271, 'Non of these', 72, 0, 0),
(272, '7', 73, 0, 0),
(273, '14', 73, 0, 0),
(274, '5', 73, 0, 1),
(275, '10', 73, 0, 0),
(276, '7', 74, 0, 0),
(277, '10', 74, 0, 1),
(278, '5', 74, 0, 0),
(279, '12', 74, 0, 0),
(280, '2', 75, 0, 0),
(281, '5', 75, 0, 0),
(282, '30', 75, 0, 0),
(283, '10', 75, 0, 1),
(284, 'P(3)', 76, 0, 1),
(285, 'P(2)', 76, 0, 0),
(286, 'P(4)', 76, 0, 0),
(287, 'P(6)', 76, 0, 0),
(288, 'P(1)', 77, 0, 0),
(289, 'P(4)', 77, 0, 0),
(290, 'P(3)', 77, 0, 0),
(291, 'P(n)', 77, 0, 1),
(292, 'P(1)', 78, 0, 0),
(293, 'P(2)', 78, 0, 0),
(294, 'P(4)', 78, 0, 0),
(295, 'P(n)', 78, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `idASSIGNMENT` int(11) NOT NULL AUTO_INCREMENT,
  `STUDENT_idSTUDENT` int(11) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`idASSIGNMENT`),
  KEY `fk_ASSIGNMENT_STUDENT1_idx` (`STUDENT_idSTUDENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`idASSIGNMENT`, `STUDENT_idSTUDENT`, `timestamp`) VALUES
(1, 1, '2015-11-29 00:00:00'),
(2, 1, '2015-11-29 00:00:00'),
(3, 5, '2015-11-29 00:00:00'),
(4, 6, '2015-11-29 21:53:17'),
(5, 6, '2015-11-29 23:44:39'),
(6, 6, '2015-11-29 23:45:26'),
(7, 6, '2015-11-29 23:48:43'),
(8, 6, '2015-11-29 23:50:01'),
(9, 6, '2015-11-30 00:26:36'),
(10, 6, '2015-11-30 00:42:15'),
(11, 6, '2015-11-30 01:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE IF NOT EXISTS `attempt` (
  `idATTEMPT` int(11) NOT NULL AUTO_INCREMENT,
  `validity` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ASSIGNMENT_idASSIGNMENT` int(11) NOT NULL,
  `QUESTIONBANK_idQUESTIONBANK` int(11) NOT NULL,
  PRIMARY KEY (`idATTEMPT`),
  KEY `fk_ATTEMPT_ASSIGNMENT1_idx` (`ASSIGNMENT_idASSIGNMENT`),
  KEY `fk_ATTEMPT_QUESTIONBANK1_idx` (`QUESTIONBANK_idQUESTIONBANK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `attempt`
--

INSERT INTO `attempt` (`idATTEMPT`, `validity`, `ASSIGNMENT_idASSIGNMENT`, `QUESTIONBANK_idQUESTIONBANK`) VALUES
(1, '1', 8, 31),
(5, '0', 10, 31),
(6, '0', 11, 31),
(7, '0', 11, 64),
(8, '0', 11, 29),
(9, '0', 11, 29),
(10, '0', 11, 29),
(11, '0', 11, 29),
(12, '1', 11, 29),
(13, '1', 11, 64),
(14, '1', 11, 31),
(15, '0', 11, 33),
(16, '0', 11, 31),
(17, '0', 11, 64),
(18, '0', 11, 50),
(19, '0', 11, 11),
(20, '1', 11, 29),
(21, '1', 11, 13),
(22, '1', 11, 28),
(23, '1', 11, 40),
(24, '0', 11, 38),
(25, '0', 11, 33),
(26, '0', 11, 22);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `idCONTENT` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `priority` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `MODULE_idMODULE` int(11) NOT NULL,
  PRIMARY KEY (`idCONTENT`),
  KEY `fk_CONTENT_MODULE1_idx` (`MODULE_idMODULE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `idCOURSE` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_students` int(11) DEFAULT NULL,
  `category` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LECTURER_idLECTURER` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `about` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idCOURSE`),
  KEY `fk_COURSE_LECTURER1_idx` (`LECTURER_idLECTURER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`idCOURSE`, `no_of_students`, `category`, `duration`, `title`, `LECTURER_idLECTURER`, `deleted`, `about`) VALUES
(1, 40, 'Mathematics', '6', 'Discrete Mathematics 1', 1, 0, 'The course gives an introduction to discrete mathematical techniques and their applications.'),
(2, 40, 'Mathematics', '6', 'Discrete Mathematics 2', 1, 0, ''),
(3, 40, 'Mathematics', '6', 'Algorithms 1', 1, 1, 'In this course you will learn several fundamental principles of advanced algorithm design. You''ll learn the greedy algorithm design paradigm, with applications to computing good network backbones (i.e., spanning trees) and good codes for data compression. You''ll learn the tricky yet widely applicable dynamic programming algorithm design paradigm, with applications to routing in the Internet and sequencing genome fragments.  You’ll learn what NP-completeness and the famous “P vs. NP” problem mean for the algorithm designer.  Finally, we’ll study several strategies for dealing with hard (i.e., NP-complete problems), including the design and analysis of heuristics.  Learn how shortest-path algorithms from the 1950s (i.e., pre-ARPANET!) govern the way that your Internet traffic gets routed today; why efficient algorithms are fundamental to modern genomics; and how to make a million bucks in prize money by “just” solving a math problem!'),
(4, 40, 'Mathematics', '6', 'Introduction to Interactive Programming in Python', 1, 1, 'This two-part course (part 2 is available here) is designed to help students with very little or no computing background learn the basics of building simple interactive applications. Our language of choice, Python, is an easy-to learn, high-level computer language that is used in many of the computational courses offered on Coursera. To make learning Python easy, we have developed a new browser-based programming environment that makes developing interactive applications in Python simple. These applications will involve windows whose contents are graphical and respond to buttons, the keyboard and the mouse.\n\nThe primary method for learning the course material will be to work through multiple "mini-projects" in Python. To make this class enjoyable, these projects will include building fun games such as Pong, Blackjack, and Asteroids. When you’ve finished our course, we can’t promise that you will be a professional programmer, but we think that you will learn a lot about programming in Python and have fun while you’re doing it.'),
(5, 40, 'Mathematics', '6', 'Principles of Computing ', 1, 1, 'This two-part course (part 2 is available here) introduces the basic mathematical and programming principles that underlie much of Computer Science. Understanding these principles is crucial to the process of creating efficient and well-structured solutions for computational problems.\n\nTo get hands-on experience working with these concepts, we will use the Python programming language. The main focus of the class will be weekly mini-projects that build upon the mathematical and programming principles that are taught in the class. To keep the class fun and engaging, many of the projects will involve working with strategy-based games.\n\nAfter completing this course, you will have a much stronger background in Computer Science and be capable of writing Python programs that are both efficient and well-structured. You will also have a better understanding of how to approach more complex computational problems. As always, our goal is to teach these principles of computing in a fun and exciting way. We look forward to seeing you in class!'),
(6, 40, 'Mathematics', '6', 'Algorithmic Thinking', 1, 1, 'When presented with a problem from a scientific domain, a Computer Scientist goes through a set of steps in order to provide a solution for the problem. These steps include: (1) understanding the problem; (2) formulating the problem mathematically; (3) designing an algorithm; (4) implementing the algorithm; and (5) solving the original scientific problem. This course will train students in how to employ algorithmic thinking by following these five steps to solve real-world problems. \n\nUnderstanding the problem entails holding conversations with domain experts to understand the parameters of the problem, what data they can provide to the computer program, what answers they expect, etc. Formulating the problem mathematically is basically the step of turning the problem from an English description to a mathematical description that is amenable to further computational analyses. \n\nWhile the course emphasizes implementing the algorithms and solving the original problems that gave rise to the need for these algorithms in the first place, much of this two-part course (part 1 is available here) will be devoted to the third step, namely, algorithm design. Here, the course will introduce students to different algorithm design strategies, as well as mathematical tools for reasoning about the correctness and efficiency of algorithms.  \n'),
(7, 50, 'Philosophy', '6', 'Buddhism and Modern Psychology', 5, 0, 'The Dalai Lama has said that Buddhism and science are deeply compatible and has encouraged Western scholars to critically examine both the meditative practice and Buddhist ideas about the human mind. A number of scientists and philosophers have taken up this challenge. There have been brain scans of meditators and philosophical examinations of Buddhist doctrines. There have even been discussions of Darwin and the Buddha: Do early Buddhist descriptions of the mind, and of the human condition, make particular sense in light of evolutionary psychology? \r\n\r\nThis course will examine how Buddhism is faring under this scrutiny. Are neuroscientists starting to understand how meditation “works”? Would such an understanding validate meditation—or might physical explanations of meditation undermine the spiritual significance attributed to it? And how are some of the basic Buddhist claims about the human mind holding up? We’ll pay special attention to some highly counterintuitive doctrines: that the self doesn’t exist, and that much of perceived reality is in some sense illusory. Do these claims, radical as they sound, make a certain kind of sense in light of modern psychology? And what are the implications of all this for how we should live our lives? Can meditation make us not just happier, but better people?'),
(8, 50, 'Arts', '10', 'The Ancient Greeks', 3, 0, 'This is a survey of ancient Greek history from the Bronze Age to the death of Socrates in 399 BCE. Along with studying the most important events and personalities, we will consider broader issues such as political and cultural values and methods of historical interpretation.');

-- --------------------------------------------------------

--
-- Table structure for table `forumanswer`
--

CREATE TABLE IF NOT EXISTS `forumanswer` (
  `idFORUMANSWER` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NULL DEFAULT NULL,
  `replier_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `FORUMQUESTION_idFORUMQUESTION` int(11) NOT NULL,
  PRIMARY KEY (`idFORUMANSWER`),
  KEY `fk_FORUMANSWER_FORUMQUESTION1_idx` (`FORUMQUESTION_idFORUMQUESTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forumquestion`
--

CREATE TABLE IF NOT EXISTS `forumquestion` (
  `idFORUMQUESTION` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NULL DEFAULT NULL,
  `inquirer_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `COURSE_idCOURSE` int(11) NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idFORUMQUESTION`,`COURSE_idCOURSE`),
  KEY `fk_FORUMQUESTION_COURSE1_idx` (`COURSE_idCOURSE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `idLECTURER` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualifications` varchar(245) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nic` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`idLECTURER`,`nic`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`idLECTURER`, `first_name`, `last_name`, `qualifications`, `nic`, `gender`, `email`, `username`, `password`, `deleted`, `activated`, `verified`) VALUES
(1, 'Neranjaka', 'Jayarathne', 'MSc. in Applied Electronics from the University of Colombo and \r\nBSc. (Hons) Special Degree in Business, Finance and Computational Mathematics.', '869586958V', 'Male', 'neranjake@gmail.com', 'neranjake@gmail.com', '594f803b380a41396ed63dca39503542', 0, 1, 1),
(2, 'Sidath', 'Gajanayaka', '', '942890370v', 'Male', 'sinhalokaya@gmail.com', 'sinhalokaya@gmail.co', '594f803b380a41396ed63dca39503542', 0, 1, 1),
(3, 'Tharindu', 'Weerawardane', 'BSc Eng (Moratuwa), MSc (Bremen, Germany),PhD (Bremen,Germany)\r\nDean -  Faculty of Engineering', '856568452v', 'Male', 'weere@gmail.com', 'weere@gmail.com', '594f803b380a41396ed63dca39503542', 0, 1, 1),
(4, 'Saman', 'Wijethunga', 'BSc', '942890370v', 'Male', 'scgcreations@gmail.com', 'scgcreations@gmail.c', '594f803b380a41396ed63dca39503542', 0, 1, 1),
(5, 'Maheshi', 'Ranaweera', '', '869586958V', 'Female', '4x8x12@gmail.com', '4x8x12@gmail.com', '594f803b380a41396ed63dca39503542', 0, 1, 1),
(6, 'Sidath', 'Gajanayaka', 'Bsc', '942890378v', 'Male', 'sgcreationsdigital@yahoo.co.uk', 'sgcreationsdigital@y', '594f803b380a41396ed63dca39503542', 0, 1, 1),
(7, 'Sudath', 'Kulathunga', 'BSc', '589698545V', 'Male', '4x8x12@gmail.coms', '4x8x12@gmail.coms', '594f803b380a41396ed63dca39503542', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `idMODULE` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COURSE_idCOURSE` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idMODULE`),
  KEY `fk_MODULE_COURSE1_idx` (`COURSE_idCOURSE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`idMODULE`, `module_name`, `COURSE_idCOURSE`, `deleted`) VALUES
(1, 'The Foundations: Logic and Proofs', 1, 0),
(2, 'Basic Structures: Sets, Functions, Sequences, Sums, and Matrices', 1, 0),
(3, 'Induction and Recursion', 1, 0),
(4, 'Prehistory to Homer', 8, 0),
(5, 'The Archaic Age (ca. 800-500 BCE)', 8, 0),
(6, 'Two City-States: Sparta and Athens', 8, 0),
(7, 'Democracy. The Persian Wars', 8, 0),
(8, '"The Great 50 Years" (ca. 480-431 BCE)', 8, 0),
(9, 'The Peloponnesian War I', 8, 0),
(10, 'The End of the War, the End of the Century', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE IF NOT EXISTS `questionbank` (
  `idQUESTIONBANK` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `deleted` tinyint(1) DEFAULT NULL,
  `MODULE_idMODULE` int(11) NOT NULL,
  PRIMARY KEY (`idQUESTIONBANK`),
  KEY `fk_QUESTIONBANK_MODULE1_idx` (`MODULE_idMODULE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=79 ;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`idQUESTIONBANK`, `level`, `type`, `content`, `deleted`, `MODULE_idMODULE`) VALUES
(1, '2', 'MCQ', 'Consider the statement form p ⇒ q where p =“If Tom is Jane’s father then Jane is Bill’s niece” and q =“Bill is Tom’s brother.” Which of the following statements is equivalent to this statement?', 0, 1),
(6, '3', 'MCQ', 'sdfds', 0, 2),
(7, '1', 'MCQ', 'Consider the statement, “If n is divisible by 30 then n is divisible by 2 and by 3 and by 5.” Which of the following statements is equivalent to this statement?', 0, 1),
(8, '2', 'MCQ', ' Which of the following statements is NOT equivalent to the statement, “There exists either a computer scientist or a mathematician who knows both discrete math and Java.”', 0, 1),
(9, '3', 'MCQ', 'test q', 0, 2),
(10, '1', 'MCQ', 'A _______ is an ordered collection of objects', 0, 2),
(11, '1', 'MCQ', 'The set O of odd positive integers less than 10 can be expressed by ', 0, 2),
(12, '1', 'MCQ', 'Power set of empty set has exactly _____ subset', 0, 2),
(13, '2', 'MCQ', 'What is the Cartesian product of A = {1, 2} and B = {a, b}?', 0, 2),
(14, '2', 'MCQ', 'What is the cardinality of the set of odd positive integers less than 10?', 0, 2),
(15, '2', 'MCQ', 'Which of the following two sets are equal?', 0, 2),
(16, '2', 'MCQ', 'The set of positive integers is ', 0, 2),
(17, '2', 'MCQ', 'What is the Cardinality of the Power set of the set {0, 1, 2}.', 0, 2),
(18, '3', 'MCQ', 'The members of the set S = {x | x is the square of an integer and x < 100} is _________________. ', 0, 2),
(19, '3', 'MCQ', '1.	The union of the sets {1, 2, 5} and {1, 2, 6} is the set _______________.', 0, 2),
(20, '3', 'MCQ', '2.	 The intersection of the sets {1, 2, 5} and {1, 2, 6} is the set ___________.', 0, 2),
(21, '3', 'MCQ', 'Two sets are called disjoint if there _____________ is the empty set', 0, 2),
(22, '3', 'MCQ', 'Which of the following two sets are disjoint?', 0, 2),
(23, '3', 'MCQ', 'The difference of {1, 2, 3} and {1, 2, 5} is the set _________.', 0, 2),
(24, '3', 'MCQ', 'The complement of the set A is _____________.', 0, 2),
(25, '4', 'MCQ', 'The bit string for the set {2, 4, 6, 8, 10} (with universal set of natural numbers less than or equal to 10) is ____________________.', 0, 2),
(26, '4', 'MCQ', '8.	 Let Ai = {i, i+1, i+2, …..}. Then set {n, n+1, n+2, n+3, …..} is the _________ of the set Ai.', 0, 2),
(27, '4', 'MCQ', '9.	 The bit strings for the sets are 1111100000 and 1010101010. The union of these sets is ', 0, 2),
(28, '3', 'MCQ', '10.	The set difference of the set A with null set is ________.', 0, 2),
(29, '1', 'MCQ', '1.	A function is said to be ______________, if and only if f(a) = f(b) implies that a = b for all a and b in the domain of f.', 0, 2),
(30, '3', 'MCQ', '2.	The value of &#8970;1/2.&#8970;5/2&#8971; &#8971; is _______________.', 0, 2),
(31, '3', 'MCQ', ' Which of the following function f: Z X Z &#8594; Z is not onto?', 0, 2),
(32, '4', 'MCQ', '5.	Let f and g be the function from the set of integers to itself, defined by f(x) = 2x + 1 and g(x) = 3x + 4. Then the composition of f and g is ________.', 0, 2),
(33, '4', 'MCQ', '__________ bytes are required to encode 2000 bits of data,', 0, 2),
(34, '5', 'MCQ', '7.	 The inverse of function f(x) = x3 + 2 is __________.', 0, 2),
(35, '5', 'MCQ', 'The g -1({0}) for the function g(x)= &#8970;x&#8971; is ________.', 0, 2),
(36, '5', 'MCQ', 'Let S = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9}. What is the smallest integer K such that any subset of S of size K contains two disjoint subsets of size two, {x1, x2} and {y1, y2}, such that x1 + x2 = y1 + y2 = 9?', 0, 2),
(37, '4', 'MCQ', 'There are K people in a room, each person picks a day of the year to get a free dinner at a fancy restaurant. K is such that there must be at least one group of six people who select the same day. What is the smallest such K if the year is a leap year (366 days)?', 0, 2),
(38, '5', 'MCQ', 'A mineral collection contains twelve samples of Calomel, seven samples of Magnesite, and N samples of Siderite. Suppose that the smallest K such that choosing K samples from the collection guarantees that you have six samples of the same type of mineral is K = 15. What is N?', 0, 2),
(39, '3', 'MCQ', 'Which of the following statements is FALSE?', 0, 2),
(40, '4', 'MCQ', 'Let A = {0, 1} × {0, 1} and B = {a, b, c}. Suppose A is listed in lexicographic order based on 0 < 1 and B is in alphabetic order. If A × B × A is listed in lexicographic order, then the next element after ((1, 0), c,(1, 1)) is', 0, 2),
(41, '3', 'MCQ', 'Which of the following statements is TRUE?', 0, 2),
(42, '4', 'MCQ', 'Which of the following statements is FALSE?', 0, 2),
(43, '5', 'MCQ', 'Let P(A) denote the power set of A. If P(A) &#8838; B then', 0, 2),
(44, '5', 'MCQ', '. Let f : {1, 2, 3, 4, 5, 6, 7, 8, 9} &#8594; {a, b, c, d, e}. In one-line notation, f = (e, a, b, b, a, c, c, a, c) (use number order on the domain). Which is correct?', 0, 2),
(45, '5', 'MCQ', '. Let &#931; = {x, y} be an alphabet. The strings of length seven over &#931; are listed in dictionary (lex) order. What is the first string after xxxxyxx that is a palindrome (same read forwards and backwards)?', 0, 2),
(46, '5', 'MCQ', 'Let &#963; = 681235947 and &#964; = 627184593 be permutations on {1, 2, 3, 4, 5, 6, 7, 8, 9} in one-line notation (based on the usual order on integers). Which of the following is a correct cycle notation for &#964; &#9702; &#963;?', 0, 2),
(47, '3', 'MCQ', 'Which of the following sequences is described, as far as it goes, by an explicit formula (n &#8805; 0) of the form gn = &#8970; n/ k &#8971;?', 0, 2),
(48, '4', 'MCQ', 'The power set P((A × B) &#8746; (B × A)) has the same number of elements as the power set P((A × B) &#8746; (A × B)) if and only if', 0, 2),
(49, '2', 'MCQ', '1.	Let  m = “Juan is a math major,”  c = “Juan is a computer science major,”  g = “Juan’s girlfriend is a literature major,”  h = “Juan’s girlfriend has read Hamlet,” and t = “Juan’s girlfriend has read The Tempest.” Which of the following expresses the statement “Juan is a computer science major and a math major, but his girlfriend is a literature major who hasn’t read both The Tempest and Hamlet.”', 0, 1),
(50, '1', 'MCQ', 'The function ((p &#8744; (r &#8744; q)) &#8743; &#8764;(&#8764;q &#8743; &#8764;r) is equal to the function ', 0, 2),
(51, '1', 'MCQ', 'The function ((p &#8744; (r &#8744; q)) &#8743; &#8764;(&#8764;q &#8743; &#8764;r) is equal to the function', 0, 1),
(52, '3', 'MCQ', 'The truth table for (p &#8744; q) &#8744; (p &#8743; r) is the same as the truth table for ', 0, 2),
(53, '3', 'MCQ', 'The Boolean function [&#8764;(&#8764;p&#8743;q)&#8743;&#8764;(&#8764;p&#8743;&#8764;q)]&#8744;(p&#8743;r) is equal to the Boolean function ', 0, 1),
(54, '3', 'MCQ', 'The truth table for (p &#8744; q) &#8744; (p &#8743; r) is the same as the truth table for ', 0, 1),
(55, '3', 'MCQ', 'Which of the following functions is the constant 1 function? ', 0, 1),
(56, '4', 'MCQ', 'Consider the statement, “Either &#8722;2 &#8804; x &#8804; &#8722;1 or 1 &#8804; x &#8804; 2.” The negation of this statement is ', 0, 1),
(57, '4', 'MCQ', ' The truth table for a Boolean expression is specified by the correspondence (P, Q, R) &#8594; S where (0, 0, 0) &#8594; 0, (0, 0, 1) &#8594; 1, (0, 1, 0) &#8594; 0, (0, 1, 1) &#8594; 1, (1, 0, 0) &#8594; 0, (1, 0, 1) &#8594; 0, (1, 1, 0) &#8594; 0, (1, 1, 1) &#8594; 1. A Boolean expression having this truth table is ', 0, 1),
(58, '3', 'MCQ', ' Which of the following statements is FALSE', 0, 1),
(59, '5', 'MCQ', 'To show that the circuit corresponding to the Boolean expression (P &#8743;Q)&#8744;(&#8764;P &#8743;Q)&#8744; (&#8764;P &#8743; &#8764;Q) can be represented using two logical gates, one shows that this Boolean expression is equal to &#8764;P &#8744; Q. The circuit corresponding to (P &#8743; Q &#8743; R) &#8744; (&#8764;P &#8743; Q &#8743; R) &#8744; (&#8764;P &#8743; (&#8764;Q &#8744; &#8764;R) computes the same function as the circuit corresponding to ', 0, 2),
(60, '1', 'MCQ', 'Consider the statement form p ) q where p =“If Tom is Jane’s father then Jane is Bill’s niece” and q =“Bill is Tom’s brother.” Which of the following statements is equivalent to this statement?', 0, 1),
(61, '1', 'MCQ', 'Consider the statement, “If n is divisible by 30 then n is divisible by 2 and by 3 and by 5.” Which of the following statements is equivalent to this statement?', 0, 1),
(62, '2', 'MCQ', 'Which of the following statements is the contrapositive of the statement, “You win the game if you know the rules but are not overconfident.”', 0, 2),
(63, '2', 'MCQ', 'The statement form (p , r) ) (q , r) is equivalent to', 0, 2),
(64, '2', 'MCQ', 'Consider the statement, “Given that people who are in need of refuge and consolation are apt to do odd things, it is clear that people who are apt to do odd things are in need of refuge and consolation.” This statement, of the form (P ) Q) ) (Q ) P), is logically equivalent to', 0, 2),
(65, '2', 'MCQ', 'Consider the statement, “Given that people who are in need of refuge and consolation are apt to do odd things, it is clear that people who are apt to do odd things are in need of refuge and consolation.” This statement, of the form (P ) Q) ) (Q ) P), is logically equivalent to', 0, 1),
(66, '3', 'MCQ', 'A sufficient condition that a triangle T be a right triangle is that a2 + b2 = c2. An equivalent statement is', 0, 1),
(67, '3', 'MCQ', 'Which of the following statements is NOT equivalent to the statement, “There exists either a computer scientist or a mathematician who knows both discrete math and Java.”', 0, 1),
(68, '4', 'MCQ', 'Which of the following is the negation of the statement, “For all odd primes p < q there exists positive non-primes r < s such that p2 + q2 = r2 + s2.”', 0, 2),
(69, '5', 'MCQ', 'Consider the following assertion: “The two statements (1) 9x 2 D, (P(x) ^ Q(x)) and (2) (9x 2 D, P(x)) ^ (9x 2 D,Q(x)) have the same', 0, 1),
(70, '1', 'MCQ', 'If P(n) is a statement such that truth of P(n) --->the truth of P(n+1) for N is a integers, then P(n) is true   ', 0, 3),
(71, '1', 'MCQ', 'If P(n):2^n < n!, n is a integer and then P(n) is true for', 0, 3),
(72, '2', 'MCQ', 'If x > -1, then the statement  P(n):(1+x)^n   >  1+nx  is', 0, 3),
(73, '3', 'MCQ', ' A polygon with 7 sides can be triangulated into', 0, 3),
(74, '3', 'MCQ', 'A polygon with 12 sides can be triangulated into', 0, 3),
(75, '3', 'MCQ', '5.	Which amount of postage can be formed using just 4-cent and 11-cent stamps?', 0, 2),
(76, '3', 'MCQ', 'Suppose that P(n) is a propositional function. Determine for which positive integers n the statement P(n) must be true if: P(1) is true; for all positive integers n, if P(n) is true then P(n+2) is true.', 0, 3),
(77, '1', 'MCQ', 'Suppose that P(n) is a propositional function. Determine for which positive integers n the statement P(n) must be true if: P(1) and P(2) is true; for all positive integers n, if P(n) and P(n+1) is true then P(n+2) is true.', 0, 3),
(78, '3', 'MCQ', 'Suppose that P(n) is a propositional function. Determine for which positive integers n the statement P(n) must be true if: P(1) and P(2) is true; for all positive integers n, if P(n) and P(n+1) is true then P(n+2) is true.', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE IF NOT EXISTS `registers` (
  `STUDENT_idSTUDENT` int(11) NOT NULL,
  `COURSE_idCOURSE` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`STUDENT_idSTUDENT`,`COURSE_idCOURSE`),
  KEY `fk_STUDENT_has_COURSE_COURSE1_idx` (`COURSE_idCOURSE`),
  KEY `fk_STUDENT_has_COURSE_STUDENT_idx` (`STUDENT_idSTUDENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`STUDENT_idSTUDENT`, `COURSE_idCOURSE`, `start_date`, `end_date`) VALUES
(1, 1, '2015-11-29 18:02:52', NULL),
(1, 7, '2015-11-29 16:28:32', NULL),
(1, 8, '2015-11-29 16:10:00', NULL),
(6, 1, '2015-11-29 23:44:03', NULL),
(6, 8, '2015-11-29 16:10:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `idSTUDENT` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `registration_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nic` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`idSTUDENT`,`nic`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`idSTUDENT`, `first_name`, `last_name`, `registration_no`, `dob`, `gender`, `nic`, `email`, `username`, `password`, `deleted`, `activated`, `verified`) VALUES
(1, 'Maheshi', 'Ranaweera', 'S0003', '2015-11-04', 'Female', '869586958V', '4x8x12@gmail.com', '4x8x12@gmail.com', '594f803b380a41396ed63dca39503542', 0, 1, 0),
(2, 'Sidath', 'Gajanayaka', 'sss', '2015-11-06', 'Male', '942890370v', 'amilarnb@gmail.com', 'amilarnb@gmail.com', '594f803b380a41396ed63dca39503542', 0, 1, 0),
(3, 'Sudath', 'Weerasinghe', 'S0002', '1997-11-05', 'Male', '895987456V', 'sudarh@gma.com', 'sudarh@gma.com', '594f803b380a41396ed63dca39503542', 1, 1, 0),
(4, 'Sarinda', 'Gamanayaka', 'S0005', '1994-10-15', 'Male', '942890358V', 'scgcreations@gmail.com', 'scgcreations@gmail.c', '594f803b380a41396ed63dca39503542', 0, 0, 0),
(5, 'Vasantha', 'GajanayakaKankanamalage', 'S0002', '1964-04-17', 'Male', '548569856X', 'vasanthagajanayaka@gmail.com', 'vasanthagajanayaka@g', '594f803b380a41396ed63dca39503542', 0, 1, 0),
(6, 'Saman', 'Wijethunga', 'S0002', '2015-11-17', 'Male', '942890371v', 'sgcreationsdigital@yahoo.co.uk', 'sgcreationsdigital@yahoo.co.uk', '594f803b380a41396ed63dca39503542', 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure for view `allstudents`
--
DROP TABLE IF EXISTS `allstudents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allstudents` AS select `student`.`idSTUDENT` AS `idSTUDENT`,`student`.`first_name` AS `first_name`,`student`.`last_name` AS `last_name`,`student`.`registration_no` AS `registration_no`,`student`.`dob` AS `dob`,`student`.`gender` AS `gender`,`student`.`nic` AS `nic`,`student`.`email` AS `email`,`student`.`username` AS `username`,`student`.`password` AS `password`,`student`.`deleted` AS `deleted`,`student`.`activated` AS `activated`,`student`.`verified` AS `verified` from `student`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_ANSWER_QUESTIONBANK1` FOREIGN KEY (`QUESTIONBANK_idQUESTIONBANK`) REFERENCES `questionbank` (`idQUESTIONBANK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attempt`
--
ALTER TABLE `attempt`
  ADD CONSTRAINT `fk_ATTEMPT_QUESTIONBANK1` FOREIGN KEY (`QUESTIONBANK_idQUESTIONBANK`) REFERENCES `questionbank` (`idQUESTIONBANK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `fk_CONTENT_MODULE1` FOREIGN KEY (`MODULE_idMODULE`) REFERENCES `module` (`idMODULE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_COURSE_LECTURER1` FOREIGN KEY (`LECTURER_idLECTURER`) REFERENCES `lecturer` (`idLECTURER`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `forumanswer`
--
ALTER TABLE `forumanswer`
  ADD CONSTRAINT `fk_FORUMANSWER_FORUMQUESTION1` FOREIGN KEY (`FORUMQUESTION_idFORUMQUESTION`) REFERENCES `forumquestion` (`idFORUMQUESTION`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `forumquestion`
--
ALTER TABLE `forumquestion`
  ADD CONSTRAINT `fk_FORUMQUESTION_COURSE1` FOREIGN KEY (`COURSE_idCOURSE`) REFERENCES `course` (`idCOURSE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `fk_MODULE_COURSE1` FOREIGN KEY (`COURSE_idCOURSE`) REFERENCES `course` (`idCOURSE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questionbank`
--
ALTER TABLE `questionbank`
  ADD CONSTRAINT `fk_QUESTIONBANK_MODULE1` FOREIGN KEY (`MODULE_idMODULE`) REFERENCES `module` (`idMODULE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registers`
--
ALTER TABLE `registers`
  ADD CONSTRAINT `fk_STUDENT_has_COURSE_COURSE1` FOREIGN KEY (`COURSE_idCOURSE`) REFERENCES `course` (`idCOURSE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_STUDENT_has_COURSE_STUDENT` FOREIGN KEY (`STUDENT_idSTUDENT`) REFERENCES `student` (`idSTUDENT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
