-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2014 at 04:32 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usercake`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `courf` varchar(500) NOT NULL,
  `instf` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `stud_id`, `prof_id`, `course_id`, `courf`, `instf`) VALUES
(8, 34, 14, 10, '"This course has been great for me to improve my comfort working physically with another person and gave me important foundations for theatre.  I have become much more sensitive and and aware of my safety as an actor and in terms of moving myself physically in combat."', 'Text'),
(9, 34, 20, 1, 'I am so thrilled that I decided to take this course - definitely my favorite of the semester.', 'He has a very concise and clear way of explaining difficult concepts. '),
(10, 34, 20, 1, 'Taught very fast today', 'Text'),
(11, 34, 20, 1, 'Clear explanation of a difficult chapter', 'Text'),
(12, 34, 20, 1, 'the topic could not be followed', ''),
(13, 34, 20, 1, 'very hard topic to understand. please explain section 4.3 again.', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id` int(5) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Type` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `cid`, `name`, `Type`) VALUES
(1, 'CS201', 'Computer Science', 1),
(2, 'CS221', 'Digital Design', 1),
(3, 'CS202', 'Data Structures', 1),
(4, 'MA201', 'MATHS', 1),
(6, 'HS230', 'Economics', 1),
(7, 'HS235', 'History', 1),
(10, 'ME111', 'Mechanical Workshop', 2),
(11, 'EE111', 'Electronics Lab', 2),
(12, 'CS111', 'Data Structure Lab', 2),
(15, 'CS228', 'Discrete maths', 1),
(16, 'CS333', 'Hardware Lab', 2),
(17, 'CS344', 'Databases', 1),
(18, 'CS204', 'Algorithms', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profcourses`
--

CREATE TABLE IF NOT EXISTS `profcourses` (
`id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `profcourses`
--

INSERT INTO `profcourses` (`id`, `course_id`, `prof_id`) VALUES
(6, 12, 17),
(7, 10, 14),
(8, 10, 15),
(9, 11, 16),
(10, 1, 1),
(11, 2, 21),
(12, 4, 19),
(13, 6, 22),
(14, 7, 23),
(15, 15, 18),
(16, 15, 24),
(17, 16, 20),
(18, 17, 20),
(19, 18, 20),
(20, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `qans`
--

CREATE TABLE IF NOT EXISTS `qans` (
`id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `Topic` varchar(100) NOT NULL DEFAULT 'Thermodynamics',
  `q1` varchar(100) NOT NULL DEFAULT 'How much you understood this topic?',
  `q2` varchar(100) NOT NULL DEFAULT 'Preparation level of instructor?',
  `q3` varchar(100) NOT NULL DEFAULT 'Quality of lecture slides/content?',
  `q4` varchar(100) NOT NULL DEFAULT 'Your views?'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `qans`
--

INSERT INTO `qans` (`id`, `prof_id`, `course_id`, `Topic`, `q1`, `q2`, `q3`, `q4`) VALUES
(5, 20, 1, 'B trees', 'How much you understood this topic?', 'Preparation level of instructor?', 'Quality of lecture slides/content?', 'Your views?'),
(6, 20, 1, 'B+ trees', 'How much you understood this topic?', 'Preparation level of instructor?', 'Quality of lecture slides/content?', 'Your views?'),
(7, 20, 1, 'Hashing', 'Coudn''t understand this topic', 'Preparation level of instructor?', 'Quality of lecture slides/content?', 'Your views?'),
(8, 20, 1, 'Hashing', 'Can you please teach this topic next class?', 'Preparation level of instructor?', 'Quality of lecture slides/content?', 'Your views?');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
`id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `Topic` varchar(100) NOT NULL DEFAULT 'Thermodynamics',
  `q1` varchar(100) NOT NULL DEFAULT 'How much you understood this topic?',
  `q2` varchar(100) NOT NULL DEFAULT 'Preparation level of instructor?',
  `q3` varchar(100) NOT NULL DEFAULT 'Quality of lecture slides/content?',
  `q4` varchar(100) NOT NULL DEFAULT 'Your views?'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `prof_id`, `course_id`, `Topic`, `q1`, `q2`, `q3`, `q4`) VALUES
(7, 20, 1, 'Hashing', 'How much you understood this topic?', 'Preparation level of instructor?', 'Quality of lecture slides/content?', 'Your views?'),
(8, 20, 1, 'Binarytrees', 'How much you understood this topic?', 'Preparation level of instructor?', 'Quality of lecture slides/content?', 'Your views?'),
(9, 20, 18, 'Graphs', 'How much you understood this topic?', 'Preparation level of instructor?', 'Quality of lecture slides/content?', 'Your views?'),
(10, 20, 17, 'mysql', 'How much you understood this topic?', 'Preparation level of instructor?', 'Quality of lecture slides/content?', 'Your views?'),
(11, 20, 16, 'Mircoporcessor', 'How much you understood this topic?', 'Preparation level of instructor?', 'Quality of lecture slides/content?', 'Your views?'),
(12, 20, 16, 'cpu', 'How much you understood this topic?', 'Preparation level of instructor?', 'Quality of lecture slides/content?', 'Your views?');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE IF NOT EXISTS `response` (
`id` int(11) NOT NULL,
  `week_id` tinyint(4) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `week_id`, `stud_id`, `course_id`, `prof_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`) VALUES
(27, 1, 34, 1, 20, 2, 3, 5, 5, 1, 4, 3),
(28, 2, 34, 1, 20, 4, 1, 2, 5, 2, 1, 5),
(29, 3, 34, 1, 20, 2, 5, 5, 5, 5, 3, 3),
(30, 4, 34, 1, 20, 3, 4, 4, 1, 3, 4, 5),
(31, 5, 34, 1, 20, 4, 3, 5, 2, 1, 1, 5),
(32, 6, 34, 1, 20, 5, 5, 5, 5, 5, 1, 1),
(33, 7, 34, 1, 20, 3, 4, 5, 3, 3, 5, 3),
(34, 8, 34, 1, 20, 3, 3, 3, 3, 3, 3, 3),
(36, 0, 34, 1, 20, 1, 5, 4, 3, 3, 3, 2),
(38, 9, 34, 10, 14, 5, 3, 5, 1, 4, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `studcourse`
--

CREATE TABLE IF NOT EXISTS `studcourse` (
`id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `studcourse`
--

INSERT INTO `studcourse` (`id`, `student_id`, `course_id`, `prof_id`) VALUES
(11, 34, 10, 14),
(12, 34, 4, 19),
(13, 34, 7, 23),
(14, 34, 1, 20),
(15, 33, 11, 16),
(16, 33, 2, 21),
(17, 33, 4, 19),
(18, 33, 10, 14),
(19, 25, 1, 20),
(20, 26, 1, 20),
(21, 27, 1, 20),
(22, 27, 1, 20),
(23, 28, 1, 20),
(24, 29, 1, 20),
(25, 30, 1, 20),
(26, 31, 1, 20),
(27, 37, 1, 20),
(28, 35, 11, 16);

-- --------------------------------------------------------

--
-- Table structure for table `uc_configuration`
--

CREATE TABLE IF NOT EXISTS `uc_configuration` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `uc_configuration`
--

INSERT INTO `uc_configuration` (`id`, `name`, `value`) VALUES
(1, 'website_name', 'Student Feedback Portal'),
(2, 'website_url', 'localhost/'),
(3, 'email', 'kunaalus@gmail.com'),
(4, 'activation', 'false'),
(5, 'resend_activation_threshold', '0'),
(6, 'language', 'models/languages/en.php'),
(7, 'template', 'models/site-templates/default.css');

-- --------------------------------------------------------

--
-- Table structure for table `uc_pages`
--

CREATE TABLE IF NOT EXISTS `uc_pages` (
`id` int(11) NOT NULL,
  `page` varchar(150) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `uc_pages`
--

INSERT INTO `uc_pages` (`id`, `page`, `private`) VALUES
(1, 'account.php', 1),
(2, 'activate-account.php', 0),
(3, 'admin_configuration.php', 1),
(4, 'admin_page.php', 1),
(5, 'admin_pages.php', 1),
(6, 'admin_permission.php', 1),
(7, 'admin_permissions.php', 1),
(8, 'admin_user.php', 1),
(9, 'admin_users.php', 1),
(10, 'forgot-password.php', 0),
(11, 'index.php', 0),
(12, 'left-nav.php', 0),
(13, 'login.php', 0),
(14, 'logout.php', 1),
(15, 'register.php', 0),
(16, 'resend-activation.php', 0),
(17, 'user_settings.php', 1),
(18, 'admin_addusers.php', 0),
(19, 'feedback.php', 0),
(20, 'insert.php', 0),
(21, 'feedparent.php', 1),
(22, 'left.php', 0),
(23, 'login_pg.php', 0),
(24, 'main.php', 0),
(25, 'profcourse.php', 0),
(26, 'profparent.php', 0),
(27, 'top.php', 0),
(28, 'account_pg.php', 1),
(29, 'comment.php', 0),
(30, 'addcomment.php', 0),
(31, 'commentparent.php', 0),
(32, 'commentsshow.php', 0),
(33, 'deletecomment.php', 0),
(34, 'insertcomment.php', 0),
(35, 'insertprofquestion.php', 0),
(36, 'profquestion.php', 0),
(37, 'profquestionparent.php', 1),
(38, 'table.php', 0),
(39, 'addcourse.php', 0),
(40, 'insertcourse.php', 0),
(41, 'registerfaculty.php', 0),
(42, 'registerstudent.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uc_permissions`
--

CREATE TABLE IF NOT EXISTS `uc_permissions` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `uc_permissions`
--

INSERT INTO `uc_permissions` (`id`, `name`) VALUES
(1, 'Student'),
(2, 'Administrator'),
(3, 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `uc_permission_page_matches`
--

CREATE TABLE IF NOT EXISTS `uc_permission_page_matches` (
`id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `uc_permission_page_matches`
--

INSERT INTO `uc_permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
(1, 1, 1),
(2, 1, 14),
(3, 1, 17),
(4, 2, 1),
(5, 2, 3),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 2, 8),
(11, 2, 9),
(12, 2, 14),
(13, 2, 17),
(14, 3, 1),
(15, 3, 14),
(16, 3, 17),
(17, 1, 21),
(18, 1, 19),
(19, 1, 3),
(20, 1, 28),
(21, 2, 28),
(22, 3, 28),
(23, 3, 37);

-- --------------------------------------------------------

--
-- Table structure for table `uc_users`
--

CREATE TABLE IF NOT EXISTS `uc_users` (
`id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(150) NOT NULL,
  `activation_token` varchar(225) NOT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `uc_users`
--

INSERT INTO `uc_users` (`id`, `user_name`, `display_name`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`) VALUES
(1, 'admin', 'admin', '656f8c29cb069bc8774fd7e29eec2e57ca2404a92c74bd6ad2bf2191d62c98854', 'kunaalus@gmail.com', '17364d893632dcd1083b5251d431605f', 1415084679, 0, 1, 'New Member', 1415084679, 1417573811),
(14, 'manasdas', 'manasdas', '5b795a70ab685fb426b179330d75a3d5e7f80dd0a5950cdba84b65cf75d6b3aa3', 'manasdas@gmail.com', 'db329f6ed982013af9f3e1b9e66c9e3c', 1417519890, 0, 1, 'New Member', 1417519890, 1417521535),
(15, 'poonamkumari', 'Poonam', '09a185ac2efeab3514945080e67b5c3fd2f5289097caf6005ee62340c1092dfb7', 'poonam@gmail.com', 'cf4b43da8e1e8c40dfaca78abd69076e', 1417520235, 0, 1, 'New Member', 1417520235, 0),
(16, 'rajeshjain', 'Rajeshjain', '25408804fa150fdc822898e67284453713108669773f0daa0e5fe414ceb5a5d45', 'rajeshjain@gmail.com', '808296abe81ab7e7b47318dde8ea46e1', 1417520342, 0, 1, 'New Member', 1417520342, 0),
(17, 'rashmidutta', 'Rashmidutta', '7e70e811041e6f38ec80fc344a1018f90b9632ff37ad3a2e9930c7d3fcd8dfe7d', 'rashmidutta@gmail.com', '33502a60d10cb3cad9af59e88fde72f5', 1417520388, 0, 1, 'New Member', 1417520388, 0),
(18, 'ashishanand', 'ashishanand', '69ab0caecbaab6ee6fdc5f66a2d017b18b0424d04b1aeaeb349b37a0c15028783', 'ashishanand@gmail.com', 'fb3906dc6fb77014d0a89df4d43c2156', 1417520630, 0, 1, 'New Member', 1417520630, 0),
(19, 'rafikulalam', 'rafikulalam', '49fe7f38fb3159362fcba3f27ac9870739cfcdb549188ed7d9d491ba4162eeb6d', 'rafikulalam@gmail.com', 'ac64090c1f8b16d829a05a168ce57921', 1417521031, 0, 1, 'New Member', 1417521031, 0),
(20, 'saswatashani', 'saswatashani', 'e10137e082cdb11b90b2bcd1b3be3ce19ef3aa9a76360cc4a9e21284a0f259cbb', 'saswatashani@gmail.com', '964f90e9f296364acbeb2227b62cc3b8', 1417521516, 0, 1, 'New Member', 1417521516, 1417576693),
(21, 'hemangik', 'hemangik', 'de66e9d9335dc599a04e3216f8495a44a0a803d02ff7449d70cc991fda191e13b', 'hemangik@gmail.com', '8108c2088c9b76ecfc47583295be5e1d', 1417521538, 0, 1, 'New Member', 1417521538, 0),
(22, 'rameshkumar', 'rameshkumar', 'ea3c100ffcc367091997388c83d89980ccf6eb0db431d1085a8a5ff95ccc775c4', 'rameshkumar@gmail.com', 'bd84269bec9b43e6ccda62d5e04bba9b', 1417521559, 0, 1, 'New Member', 1417521559, 0),
(23, 'thomasjoel', 'thomasjoel', '14a5f33ad6784ca01eef905a8573811a66df22485eadfbf6d78ad5a18480ad48c', 'thomasjoel@gmail.com', 'ec1de35c7af16e5a5ae1fed8364cc7ed', 1417521580, 0, 1, 'New Member', 1417521580, 0),
(24, 'gsajith2014', 'Sajith', '777fa83e63e476e77cfcd892cfe9d2cf19e14394886f8c52a02077a78fae953ee', 'gsajith2014@gmail.com', '102be4bc044fa69c796d368f9a440a89', 1417521626, 0, 1, 'New Member', 1417521626, 0),
(25, 'mrinaltak', 'mrinaltak', '69b004b73157ae9b6ba610d6d926b86c82299d97c42c77cdc0ff8c548890af473', 'mrinaltak@gmail.com', '20de74b902dc3e9a9372e5994343ab30', 1417521726, 0, 1, 'New Member', 1417521726, 0),
(26, 'ankitkal', 'Ankit', 'a9b30cd5e586d0d8d6c4e4870b81eec2351311a100707da41efa6e75a10cd3039', 'ankitkal@gmail.com', 'af0f685e0d4c2beb2fd4f3b40c24135e', 1417521761, 0, 1, 'New Member', 1417521761, 1417532374),
(27, 'rahulnag', 'rahulnag', '542fa1e95e8b3249fef3fdc65e67bbbcb0c6cb9327d6df2055da6eefd969fe74f', 'rahulnag@gmail.com', '420e9b75ad5fc6ae5cf53b13aef790eb', 1417521798, 0, 1, 'New Member', 1417521798, 0),
(28, 'abhijeet', 'abhijeet', '660bdbc5418703f429209602a380ec7601c9fea41e1eba2bf2fb961c9c91d9f4c', 'abhijeet@gmail.com', '20093bfdeec23cbb06275e4751cad154', 1417521824, 0, 1, 'New Member', 1417521824, 0),
(29, 'nileshraj', 'Nilesh', '99ef40fc674054cd7fa8cd2a8b15df9b75a328227a29e033d314ac02f8c4ecccf', 'nileshraj@gmail.com', 'f4fb306690243f580e5b27f3f2e6ecc3', 1417521855, 0, 1, 'New Member', 1417521855, 0),
(30, 'tarunsharma', 'Tarun', '252b96a2257ab0a026fc62a0f44a030ed1d296cd8a5f03a767cce91942db7f940', 'tarunsharma@gmail.com', '3615f4deaa6cfb435aa42d5298dc119d', 1417521887, 0, 1, 'New Member', 1417521887, 0),
(31, 'mohitkumar', 'mohitkumar', 'ff94cd2477f7189af835bff55cdce497cc8a49f1dd90a0bd3c57d291124e7453b', 'mohitkumar@gmail.com', 'c4f89be1f759c55859e7400297ecf8ba', 1417521991, 0, 1, 'New Member', 1417521991, 0),
(32, 'namanjain', 'Naman', '91673fc4382341b9d664cec5d6a15de239628e29df7f91164b6fb0d4265b4bf62', 'namanjain@gmail.com', '1f3d3c0d6eacd59bccab01f77a192277', 1417522013, 0, 1, 'New Member', 1417522013, 0),
(33, 'karannahar', 'karannahar', '477e7984fd0ace311ec999f3274c67c219ca80d2515756c91e1ea2fb4dcff7b24', 'karannahar@gmail.com', '37065fecf0664b109450a2bf6d47adb4', 1417522054, 0, 1, 'New Member', 1417522054, 0),
(34, 'hunarjain', 'hunarjain', '0e58dd50757f4e8fe44c356006bcf443dd2956d02783b9802d13275ded78b857d', 'hunarjain@gmail.com', '5872d3262dba223649e43b62a4f25259', 1417522066, 0, 1, 'New Member', 1417522066, 1417576614),
(35, 'saikrishna', 'saikrishna', 'c9c64afaa5a3383b47c6b9ab6cb1885e42d67c5c45cc289bd4eb4e4c21a5d8a96', 'saikrishna@gmail.com', '7b7ba353a4d1852f0b45edc68b071031', 1417522113, 0, 1, 'New Member', 1417522113, 0),
(36, 'saicharan', 'saicharan', '1cff4aad22a875b59cd262b57cb494fe1e8f211a46924e6d46b781214123e7ca1', 'saicharan@gmail.com', '71b9e2c661d6131fcb4083d9d0be517e', 1417522145, 0, 1, 'New Member', 1417522145, 0),
(37, 'mohanjain', 'mohanjain', 'efe7f366038f03dcc6c1aba61a778077d9e3b48af8261fe6c8ddab4cd8f802a5f', 'mohanjain@gmail.com', '32c082db71da915006bbf42d1e16cb45', 1417522190, 0, 1, 'New Member', 1417522190, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uc_user_permission_matches`
--

CREATE TABLE IF NOT EXISTS `uc_user_permission_matches` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `uc_user_permission_matches`
--

INSERT INTO `uc_user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(5, 1, 3),
(13, 14, 3),
(14, 15, 3),
(15, 16, 3),
(16, 17, 3),
(17, 18, 3),
(18, 19, 3),
(19, 20, 3),
(20, 21, 3),
(21, 22, 3),
(22, 23, 3),
(23, 24, 3),
(24, 25, 1),
(25, 26, 1),
(26, 27, 1),
(27, 28, 1),
(28, 29, 1),
(29, 30, 1),
(30, 31, 1),
(31, 32, 1),
(32, 33, 1),
(33, 34, 1),
(34, 35, 1),
(35, 36, 1),
(36, 37, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cid` (`cid`);

--
-- Indexes for table `profcourses`
--
ALTER TABLE `profcourses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qans`
--
ALTER TABLE `qans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studcourse`
--
ALTER TABLE `studcourse`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_configuration`
--
ALTER TABLE `uc_configuration`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_pages`
--
ALTER TABLE `uc_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_permissions`
--
ALTER TABLE `uc_permissions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_permission_page_matches`
--
ALTER TABLE `uc_permission_page_matches`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_users`
--
ALTER TABLE `uc_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_user_permission_matches`
--
ALTER TABLE `uc_user_permission_matches`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `profcourses`
--
ALTER TABLE `profcourses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `qans`
--
ALTER TABLE `qans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `studcourse`
--
ALTER TABLE `studcourse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `uc_configuration`
--
ALTER TABLE `uc_configuration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `uc_pages`
--
ALTER TABLE `uc_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `uc_permissions`
--
ALTER TABLE `uc_permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uc_permission_page_matches`
--
ALTER TABLE `uc_permission_page_matches`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `uc_users`
--
ALTER TABLE `uc_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `uc_user_permission_matches`
--
ALTER TABLE `uc_user_permission_matches`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
