-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2013 at 09:35 AM
-- Server version: 5.1.70-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `npcom360_sstudioblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `ssb_global_configuration`
--

CREATE TABLE IF NOT EXISTS `ssb_global_configuration` (
  `site_title` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `meta_description` text NOT NULL,
  `admin_page_length` tinyint(3) NOT NULL DEFAULT '10',
  `user_page_length` tinyint(3) NOT NULL DEFAULT '10',
  `admin_email` varchar(255) NOT NULL,
  `delete_csv_days` tinyint(3) NOT NULL,
  `delimiter` varchar(5) NOT NULL DEFAULT ';'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ssb_global_configuration`
--

INSERT INTO `ssb_global_configuration` (`site_title`, `phonenumber`, `meta_keyword`, `meta_description`, `admin_page_length`, `user_page_length`, `admin_email`, `delete_csv_days`, `delimiter`) VALUES
('Lead Generation System', '9941222052', 'Lead Generation System', 'Lead Generation System', 10, 5, 'devsuresh2005@gmail.com', 50, ';');

-- --------------------------------------------------------

--
-- Table structure for table `ssb_posts`
--

CREATE TABLE IF NOT EXISTS `ssb_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `file_path` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `ssb_posts`
--

INSERT INTO `ssb_posts` (`id`, `title`, `description`, `file_path`, `is_active`, `date_created`, `date_updated`) VALUES
(1, 'Younger days', 'This is during my school days with my nephew and niece. After this cycling took me all the way in my cycling career. After this went to practice more in cycling from shenoy nagar to poonamalli every day riding at an average speed of 35 to 40 kms speed. This was done by riding behind the big trucks with loads going from one city to an another maintaining the same speed which was easy for me to keep pace with it all the way and return the same way.', '2068268879_251965490_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(2, 'Younger days', 'The fellow on the left of me is a close friend from Seramban, Malaysia who studied with me Aeronautical Engineering in Hindustan Engineering Training Center, Guindy Madras. I joined him during the vacation to Malaysia and stayed with his family for nearly 4 months. Am in the extreme right .', '''ysia 1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(3, 'Younger days', '1980 in ', '.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(4, 'Write up of myself in the Local Newspaper.', 'There was a write up about me in Mylapore Talk a local News paper. This is after my return to Chennai from the Middle East in the year 2009', '343192618_naraprize 1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(5, 'Had been one of the Judges in Minolta Photographic Competition', 'In Dubai had been one of the Judges for Minolta Photographic Competition and am in the far left in Red shirt in the year 2006. This is the second time that I had been invited to be a judge for the same competition that was in the year 2000.', '1169130963_mylatalk_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(6, 'Kumudam', '', '1371816397_kumdam 3_1.jpg', 1, '2010-11-14 01:09:11', '2013-10-01 14:33:56'),
(7, 'Kumudam', '', '1379146164_kumdam 4_1.jpg', 1, '2010-11-14 01:09:11', '2013-10-01 14:33:56'),
(8, 'The Adventures', 'A Professional Photographer by profession and with lot of other adventures as passion in Life. This is a cut out from the Times of India a small write up about me in the year 2010', '688980983_Narain Adventure Paper_1.jpg', 1, '2010-11-14 01:09:11', '2013-10-01 14:33:56'),
(9, 'In Bahrain arts center', 'In Bahrain arts center where I started my very basic of photography, processing and printing . Here I had won a prize in the year 1982 which came out in the local News paper.', '705205328_3_1.jpg', 1, '2010-11-14 01:09:11', '2013-10-01 14:33:56'),
(10, 'Kumudham write up', 'Kumudham write up of myself in the year 1986', '288515145_kumdam 2_1.jpg', 1, '2010-11-14 01:09:11', '2013-10-01 14:33:56'),
(11, 'This certificate is given to me after I had done my SOLO flight flying', 'This certificate is given to me after I had done my SOLO flight flying from Dubai to Sharjah Airport. After this flight was done and when I returned to Dubai Base all my colleges ripped my white uniform shirt in to pieces. When asked they said it’s the custom of Airlines private pilots trainings that they rip the shirt once a student passed his SOLO flight.', '1364854614_fly_1.jpg', 1, '2010-11-14 01:09:11', '2013-10-01 14:33:56'),
(12, 'Am proud of this picture which won and pushed me in to this profession.', 'Am proud of this picture which won and pushed me in to this profession. Yes! This the picture which won 1st prize in Bahrain Photographic competition which inspired me to photography as a hobby.', '596091026_naraprize_1.jpg', 1, '2010-11-14 01:09:11', '2013-10-01 14:33:56'),
(13, 'picture which won and pushed me in to this profession', 'The Tamil Magazine Kumudham had interviewed me in the year 1986 about my working experience in Bahrain. And this picture is shot before that and I too like this picture which looks like one of Arab sheikh. Very rarely I grow beard or mustache and this is one of my rare picture with them. And  the caption of this picture says it all.', '1904562966_kumdam 1_1.jpg', 1, '2010-11-14 01:09:11', '2013-10-01 14:33:56'),
(14, 'Tamil Magazine interview', 'In Tamil Photographic magazine they interviewed me and a special write up was given for that months issue.', '765143240_Photo mag1_1.jpg', 1, '2010-11-14 01:09:11', '2013-10-01 14:33:56'),
(15, 'In Bahrain we had lot of Two wheeler riders from different countries.', 'In Bahrain we had lot of Two wheeler riders from different countries. Then after we had formed a Group called as Bahrain Foreign Legion. We all meet on Fridays and ride in formation around the country and some times for some charity rides which was very interesting and the local newspaper Gulf News Today brought out this write up about our group.', '1836879797_MCycle Bahrain 4_1.jpg', 1, '2010-11-14 01:09:11', '2013-10-01 14:33:56'),
(16, 'Car Rally Winner', 'Receiving a Prize from the wife of then Governor Mrs.Akkama Alexender . This prize is for winning one of the car rally in Madras.', '1112957320_rally win_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(17, 'Photography competition Winner', 'Won 1st prize in Photographic competition in Bahrain organized by Bahrain Historical and Archeological Society. This inspired me to become what I am today. What started as a hobby Had pushed me in to a Professional Photographer. The person giving me the prize is the Minister of Interior Mr. Tariq Almayed which broadcasted on TV too.', '662300546_naraprize B&w_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(18, 'In the early 80', 'In the early 80', '1029122349_foto_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(19, '1984 and this is a old Rajdoot bike and completely modified by me.', '1984 and this is a old Rajdoot bike and completely modified by me. The tank, seat etc is done by me. The same design is coming out in Bajaj Pulsar etc now. Like pillion holding unit in side ways and the tank design also is copied ?. Had full face helmet at that time which is from England and always full dressed for riding in proper dress code.', '1544804445_Bike 83_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(20, '1975 may in Malaysia in Kuala Lumpur', '1975 may in Malaysia in Kuala Lumpur in one of the monument . I don', '319359384_m_ysia_2_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(21, 'In Sharjah 1994 a photographic competition', 'In Sharjah 1994 they had a photographic competition and in professional category I won second prize organized by the Ministry of information and Culture. And receiving the Prize from one of the Minister.', '1402811424_Naraprize sharjah_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(22, '1989 this is Enfield Fury where the company sponsored the bike with 3 engine', '1989 this is Enfield Fury where the company sponsored the bike with 3 engine and MRF gave the Tires. I like the combination of Yellow and Black and this shot before practice session.', '702326750_narabikerace done_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(23, 'Old Rajdoot bike - The design is made by me', 'The design is made by me on a Old Rajdoot bike. The Tank, seat and the side shields are modified. The electric plug has two condensers which never failed even if the water gets in to the engine.', '1813629908_Bike 83 a_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(24, 'On a sunday 2010 near Kovalam on the way to Mahabalipuram', '2010 near Kovalam on the way to Mahabalipuram on a Sunday. Every week we used to ride early in the morning to some distance like this just for fitness . I always wanted in touch with cycle ever since I won the Race to Bangalore. This cycle is pure aluminum and very light with no rust.', '1301293145_cycle_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(25, '1979 in Holiday inn Bahrain days in one of the Party', '1979 in Holiday inn Bahrain days in one of the Party organized by my friend in my room. These ladies are from House keeping, and other administrative departments.', '1466997134_Nara 79_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(26, '1995 and in Sharjah airport doing the helicopter shooting for Sharjah Tourism', '1995 and in Sharjah airport doing the helicopter shooting for Sharjah Tourism. The art director is Jovie from Goa who is also a good friend of mine and now settled in New Zealand.', '1263494119_helicopter_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(27, '2004 am with Ms. Yuktha Mukhi who was Ms. World', '2004 am with Ms. Yuktha Mukhi who was Ms. World and was shooting for Damas Jewellery in Dubai. We spent a day shooting in different fits etc.', '1324719718_yuktha_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(28, 'My son during my ride in 1991', 'The guy in this shot is my son during my ride in 1991. I had modified the rear brakes to Disc. Went to Singapore to bring in the disc set and also the slick Tires which gave me very good advantage during the race. This also is the Last Race in my life.', '927652690_New Race1_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(29, 'In Bahrain days ans the Bike is Suzuki GT 380', 'In Bahrain days ans the Bike is Suzuki GT 380 which is 3 cylinders with 4 exhaust pipes and two stroke engine. Very powerful bike where I learnt the speed and cornering . The shirt is designed by me. The front hood is brought from India and painted by me along with bike.', '323115060_Bahrain 2a_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(30, 'One of the riding days in Bahrain along with my Bike.', 'One of the riding days in Bahrain along with my Bike. The shirt is the Indonesian Lungi which is designed by me to be a shirt.', '685219909_Bahrain 2_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(31, 'Cornering in one of my practice session which is 1998 in Sholavaram', 'Cornering in one of my practice session which is 1998 in Sholavaram which is very famous those days for Motor racing people.', '2016290607_narabikerace1done_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-24 08:54:44'),
(32, 'One of the testing SAAB coupe car', 'One of the testing SAAB coupe car a convertible Turbo charged which can do 265kms power hour speed which is reached by me. But should accept that in Convertibles you always get the wind noise which is not good I mean at very high speeds.', '289950658_Test car saab_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-24 08:54:23'),
(33, 'With The worlds greatest Boxer Mr. Mohd. Ali', 'Am very Proud to meet The worlds greatest Boxer Mr. Mohd. Ali the Great in the year 1995 in Dubai. It really was very proud moment of my life to meet a person of this caliber. He was down to earth and at this time he had this Parkinson dieses and he didn', '751696359_Mohd Ali 1_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-24 04:28:51'),
(34, 'One the riding days in Bahrain with my bike', 'One the riding days in Bahrain with my bike before fully designed.', '1434747852_Bahrain 2c_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-24 04:28:11'),
(35, 'Sripermandur Race track. My first inaugural race', 'This is in Sripermandur Race track. The first inaugural race done by me and the Last race for me in 1990. In 1991 there was No race as the war had started in Kuwait and Iraq. This is because of the petrol shortage and they stopped the race just a week before which was very disappointing for me where I wanted to retire from racing after that. But that was not possible so I ended my Bike racing career in 1990. The Race dress is stitched to my body fit and I bought the leather , die it to my colour and then tailored to my style, the gloves and the shoes. Of course I pained the helmet also.', '235291466_Last Race_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-24 04:27:25'),
(36, 'My flight instructor Capt.Punith', '2003 and this with my flight instructor Capt.Punith giving me the solo certificate which I had passed before my final exams. Here I had been given the credit of Captain since I was able to pilot a plane by myself alone in the cockpit.', '468225920_6_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-24 04:26:46'),
(37, 'In my Emirates flight school', 'In my Emirates flight school with all my Instructors and students group[ shot done for that Batch again 2003', '1639975854_flight_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-24 04:26:10'),
(38, 'SAAB Test car', 'The SAAB car testing days with one of their New model car which was not yet introduced in the world in the year 1993. But this picture is shot in 1994 in some where in a desert in Sharjah. The white thing on my pant is the pager which is famous those days. My normal speed on this car is 180 to 220kms per hour. I need to do 400kms per day and so I try to do it at short time. Now in 2008 when I calculated the distance that I covered during the testing of this car time For almost 4 years I had circled the world around 80 times. Am really proud of testing this car as before the launch in this world and one of the best safety car from Sweden. This I did as a hobby apart from my professional Photography work as I like driving.', '1465318929_Test car red_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(39, 'Receiving Private Pilot License ', 'The owner of Emirates Airlines Sheikh is giving the Certificate and memento and am receiving the Private Pilot License from him in Dubai. He also owns the Emirates flying school. Again one of my achievement in my life as I can fly on my own which was one my dream when I was young. Now I came in from Running race to cycle race to Motor cycle race to Car rallys and testing to reaching very high speed in cars to Flying. My next race will be to go to space? if am still alive till then. Now I can be also called as Capt.Narayanaswamy.', '1031117008_4_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-01 20:03:56'),
(40, 'Padmashree Mr. A.R.Rahman', 'Padmashree Mr. A.R.Rahman who came to my studio in 2010 and got shot. He is very down to earth kinda person and I appreciate him for what he is. And no wonder he is doing so great.', '346252499_with ARR_1.jpg', 1, '2010-11-14 06:39:11', '2013-10-24 04:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `ssb_posts_comments`
--

CREATE TABLE IF NOT EXISTS `ssb_posts_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `comment` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ssb_settings`
--

CREATE TABLE IF NOT EXISTS `ssb_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ssb_users`
--

CREATE TABLE IF NOT EXISTS `ssb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date_last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ssb_users`
--

INSERT INTO `ssb_users` (`id`, `username`, `password`, `date_last_login`, `is_active`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2013-10-24 04:25:03', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ssb_posts_comments`
--
ALTER TABLE `ssb_posts_comments`
  ADD CONSTRAINT `FK_ssb_posts_comments` FOREIGN KEY (`post_id`) REFERENCES `ssb_posts` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
