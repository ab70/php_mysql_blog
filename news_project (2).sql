-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 01:43 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nmae` varchar(200) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nmae`, `admin_email`, `admin_pass`) VALUES
(1, 'admin', 'abrar@gmail.com', 'abrar123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `parent_id`) VALUES
(1, 'National', '', 0),
(2, 'International', '', 0),
(3, 'Sports', '', 0),
(4, 'Technology', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `news_id`, `comment_body`, `user_id`, `user_name`) VALUES
(1, 0, 'This is belong to west Bengal news.', 7, 'ab4'),
(2, 23, 'This news belongs to Bengal news!', 7, 'ab4'),
(3, 27, 'Thats whta world class player does.', 8, 'ab5'),
(4, 27, 'I would be happy if I Was there to see it.', 8, 'ab5'),
(5, 27, 'I wish I was there too see it.', 7, 'ab4'),
(6, 22, 'Some How it seems to be fair enough for the long fight.\r\n', 7, 'ab4'),
(7, 29, 'Yeah boy', 7, 'ab4'),
(8, 28, 'Good to see him as a RED DEVil player again!', 10, 'ab7'),
(9, 27, 'hi there', 7, 'ab4'),
(10, 27, 'oka!', 7, 'ab4'),
(11, 29, 'ok boy', 11, 'ab8'),
(12, 29, 'nice techhh', 7, 'ab4'),
(13, 29, 'hellow', 12, 'ab9'),
(14, 29, '1234', 10, 'ab7');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `news_body` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `news_body`, `cat_id`, `img`, `created_at`) VALUES
(22, 'Home World  Afghans with ties to US who could not get out now live in fear', '                                    Armed Taliban militants were looking for Shah. They knew he worked as an interpreter for the US government, and came to his provincial home at night. “Someone inside worked for the US Army!” they shouted, threatening to shoot down the door.\r\nShah had already left for Kabul, where he is now in hiding. But he believes he is a hunted man. “I’m not feeling safe here anymore,” said Shah, whose application for a special immigrant visa to the United States is still in the works.\r\n\r\n“The Taliban say they are not taking revenge, and they are forgiving everybody,” he said. “But I can’t believe them. Why did they come to my house looking for me?”\r\n\r\nThere are thousands like Shah, stuck in Afghanistan under a capricious and unpredictable Taliban rule, who did not make it onto US military evacuation flights — those who worked for the US Army or the government, and their families, and who were eligible for US humanitarian visas. They know they are potential targets as the Taliban tighten their grip since taking over Kabul fully this week.\r\n\r\nTaliban leaders have pledged to allow those with visas to leave once they reopen the main airport, which remained closed to commercial flights Friday.\r\n\r\nBut those like Shah doubt the pledges of a group that they feel they cannot trust and that has ruled Afghanistan ruthlessly before. Trying to leave — or showing a special immigrant visa — could itself expose them to danger if the Taliban renege on their promises.\r\n\r\nSo with the Taliban firmly in control on the street, they have gone into hiding. One US government contractor and humanitarian visa applicant said he had gone underground — literally — with his pregnant wife and 1-year-old daughter in a system of tunnels. He said he didn’t believe Taliban promises and didn’t plan to risk leaving his hiding place.\r\n\r\nThere are also potentially hundreds of thousands of other Afghans — aid agency workers, officials from the defunct government, media employees, prominent women — who are fearful and laying low.\r\n\r\nThey are also eager to leave. This week, after evacuation flights from Kabul ended, there were reports of hundreds of people massing at border crossings with Iran and Pakistan.\r\n\r\n“It’s because the country is collapsing,” said Astrid Sletten, a foreign aid worker who has remained in Kabul. “And everybody has a sister or daughter, and wondering what it is going to be like to be living under a Taliban regime.”\r\n\r\nShe added: “I think some people are literally saying I’d rather die than live in a Taliban regime.”\r\n\r\nDespite Taliban pledges that no punishment would be exacted on anyone, many Afghans question the ability of the Taliban leadership to control their battle-hardened fighters.\r\n\r\nFormer government officials, aid workers and diplomats say Taliban leaders have barely managed to keep their well-armed rank and file in check. And there is deep uncertainty about when even that relative restraint will end.\r\n\r\nOn Friday, an uneasy calm settled on Kabul, four days after the Taliban took over and the last US forces left. Afghans waited for the Taliban to announce their new government.\r\n\r\nIn Kabul, the few women venturing out have been able to wear headscarves, rather than the face-covering burqa the Taliban imposed during their previous rule, and several dozen protested outside the palace, demanding the inclusion of women in a new government.\r\n\r\nThe Taliban’s leaders are still talking about showing inclusiveness. But they have made clear in filling lower-ranking positions so far that they are choosing from among their own.\r\n\r\nKabul residents interviewed by phone described a pervasive fear as Taliban rule steadily changed life around them.                              ', 1, '447357.jpg', '2021-09-01 17:29:38'),
(23, 'Bangladesh plans in-person class once a week for now', 'All schools are reopening on Sept 12, but the government is thinking about limiting in-person classes initially to one day per week, Deputy Minister for Education Mohibul Hassan Chowdhoury Nowfel has said.\r\nSpeaking to the media after inaugurating Chattogram Medical College Hospital’s One Stop Emergency Care on Saturday, the deputy minister said they are hopeful about reopening the schools as per Education Minister Dipu Moni’s announcement.\r\n\r\n“Initially we are thinking about holding classes one day per week. This is the plan for now. Our initial plan is to keep the infection rate under control.”\r\n\r\nThe educational institutions have been closed for one and a half years due to the coronavirus pandemic.\r\n\r\nMohibul said the plan to hold the SSC and HSC exams in person and continue the assignments has remained unchanged.\r\n\r\nHe said reforms to the educational institutions for recovery from the infrastructural losses to the long shutdown will be an ongoing process. “This will be possible while keeping the institutions open.”', 1, 'ctg-noufel-at-cmch-040921-01.jpg', '2021-09-02 14:07:02'),
(27, 'Ronaldo claims world record with late late show', '               When Manchester City loanee Gavin Bazunu saved Cristiano Ronaldo\'s first-half penalty to deny the Manchester United forward a record 110th international goal for Portugal, the headlines wrote themselves.\r\nIreland looked to be holding on for a famous World Cup qualifying victory in Portugal, but, as he so often does, the 36-year-old Ronaldo had the last word with two late goals to break Irish hearts - and the world record.\r\n\r\n\"I\'m so happy, not only for the record but for the special moments with two goals at the end,\" Ronaldo said.\r\n\r\n\"It was so tough, but we have to appreciate what the team did, they and the fans believed until the end of the game.\"\r\n\r\nIt had been a frustrating night for Ronaldo and his compatriots as Ireland defended resolutely after taking the lead and largely restricted the hosts to pot-shots from distance.\r\n\r\nIn the 89th minute, Ronaldo lined up a free kick on the edge of the box but the 19-year-old Bazunu again repelled his effort.\r\n\r\nRonaldo, however, simply refused to be denied.\r\n\r\nHis movement was impeccable, darting this way and that to free himself from the attentions of the defence and get on the end of substitute Goncalo Guedes\'s cross to power in a headed equaliser.\r\n\r\nThat took him past Iranian Ali Daei\'s total of 109 international goals and he repeated the feat in the 96th minute with another header to move on to 111.\r\n\r\nWhile Ronaldo\'s night was almost perfect, there was one blot on his copybook.\r\n\r\nHe was booked for taking his shirt off while celebrating the winning goal, meaning he will miss Portugal\'s trip to Azerbaijan on Tuesday.\r\n\r\nThat may be good news for Manchester United, however, as Ronaldo is expected to play the first match of his second spell at the Premier League club against Newcastle United next Saturday.', 3, 'ronaldo-world-record-020921-01.jpg', '2021-09-04 17:54:40'),
(28, 'Ronaldo dedicates Manchester United move to former boss Ferguson', '  United announced that they had agreed a deal with Juventus to bring the 36-year-old back to Manchester last week, with the transfer now complete after the Portuguese forward passed a medical, secured a visa and agreed personal terms.\r\n\r\n\"Everyone who knows me, knows about my never ending love for Manchester United. The years I spent in this club where absolutely amazing and the path we\'ve made together is written in gold letters in the history of this great and amazing institution,\" he wrote on Instagram.\r\n\r\n\"It\'s like a dream come true, after all the times that I went back to play against Man. United, and even as an opponent, to have always felt such love and respect from the supporters in the stands.\"\r\n\r\nJuve said the transfer fee agreed was 15 million euros ($17.74 million) plus eight million euros in performance-related add-ons as Ronaldo returns to the club where he won eight major trophies from 2003-2009.\r\n\r\n\"My first domestic League, my first Cup, my first call to the Portuguese National team, my first Champions League, my first Golden Boot and my first Ballon d’Or, they were all born from this special connection between me and the Red Devils,\" added Ronaldo, who spent the last 12 years winning a glut of trophies at Real Madrid and Juventus.\r\n\r\n\"History has been written in the past and history will be written once again! You have my word!\r\n\r\n\"I\'m back where I belong. Let\'s make it happen once again... Sir Alex, this one is for you.\"\r\n\r\nFerguson signed Ronaldo when he was a teenager in 2003 and British media had reported last week that the Scot convinced Ronaldo to return to United.\r\n\r\nRonaldo has often spoken in glowing terms of his time at the club and has previously described Ferguson as his \"father in football\".\r\n\r\nThe club responded to the post, saying: \"Welcome home, Cristiano.\"\r\n\r\nRonaldo is set to join up with the squad after the international break and could make his first start on Sept 11 when they host Newcastle United, if he returns unscathed from his duties with Portugal.\r\n\r\nHe spent six seasons at Old Trafford between 2003 and 2009, where he won the Ballon d\'Or as the world\'s best player in 2008 alongside his team accolades, before sealing a then world record 80 million pounds ($110 million) move to Real Madrid.\r\n\r\nDuring his first spell in Manchester he scored 118 goals and won the Premier League Golden Boot in the 2007-08 season, the year Ronaldo helped United claim their last Champions League title.\r\n\r\nHe then went on to capture two LaLiga and four Champions League titles with Real Madrid, as well as four further Ballon d\'Or awards, ending his stint at the Spanish club as their all-time top scorer with 451 goals.\r\n\r\nJUVE\'S 100 MILLION EURO SIGNING             ', 3, 'ronaldo-ferguson-010921-01.jpg', '2021-09-04 17:59:25'),
(29, 'Fertility app maker Flo Health faces consolidated privacy lawsuit', '               Flo Health Inc is facing a consolidated class action complaint accusing the period and fertility-tracking app developer of sharing users\' sensitive health information with third parties without app users\' knowledge.\r\nThe lawsuit, filed on Thursday in California federal court, also named the alleged third parties - Facebook Inc, Alphabet Inc\'s Google, and data analytics companies Flurry Inc and AppsFlyer Inc - as defendants.\r\n\r\nFlo Health, through its counsel from Dechert, declined on Friday to comment on the pending litigation. Lawyers for Facebook, Google, Flurry and AppsFlyer, of the law firms Gibson, Dunn & Crutcher, Willkie Farr & Gallagher, Hunton Andrews Kurth and Latham & Watkins, respectively, didn\'t immediately respond to requests for comment.\r\n\r\nThe newly filed action brings together plaintiffs from seven proposed class actions filed against Flo Health earlier this year. The first complaint stemming from the alleged unlawful data disclosure came after the US Federal Trade Commission announced a settlement with Flo Health in January.\r\n\r\nUsers of the women\'s health app hand over personal information to Flo Health, including \"intimate details\" about sexual health and menstrual cycles, among other things, to use the app, the complaint said.\r\n\r\nFlo Health allegedly violated users\' privacy by disclosing that information to third parties through software development kits (SDKs) incorporated into its app, despite the company\'s privacy policies and \"public assurances\" that it would not share data, the complaint said. In using the third parties\' SDKs, Flo Health transmitted the personal information back to other defendants, which allegedly \"knew that the data collected and received from Flo Health included intimate health data\" but didn\'t stop that because the data is \"vital to their business,\" such as for marketing and data analytics purposes, according to the complaint.\r\n\r\nThe lawsuit asserts several claims against Flo Health, including invasion of privacy, breach of contract, and violation of the federal Stored Communications Act. The plaintiffs accuse the other companies of \"aiding and abetting\" Flo Health\'s alleged practices, among other claims, including a Federal Wiretap Act claim against Facebook, Google and Flurry.\r\n\r\nPlaintiffs\' counsel filed a separate motion Thursday seeking the appointment of lawyers from three firms as interim co-lead counsel. The filing touts the data privacy, consumer protection and complex class action experience of the proposed leaders, and highlights the proposed structure as reflecting a \"diverse slate of attorneys.\"', 4, 'smartphone-flo-health-040921-01.jpg', '2021-09-04 18:17:30'),
(36, 'here is the title25', '               What the fuck is happending buddy??\r\n', 2, 'wp8733563-islamic-warrior-wallpapers.jpg', '2021-11-22 15:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `pass`, `created_at`) VALUES
(1, 'abrar1', 'ab1@gmail.com', 'ad aw da ', '2021-08-29 01:42:06'),
(5, 'ab2', 'ab2@gmail.com', '123456', '2021-08-29 01:51:43'),
(6, 'ab3', 'ab3@gmail.com', '123456', '2021-08-29 02:11:18'),
(7, 'ab4', 'ab4@gmail.com', '1234', '2021-08-30 20:24:32'),
(8, 'ab5', 'ab5@gmail.com', '1234', '2021-08-30 20:26:01'),
(9, 'ab6', 'ab6@gmail.com', '1234', '2021-09-02 20:08:45'),
(10, 'ab7', 'ab7@gmail.com', '1234', '2021-09-05 13:34:23'),
(11, 'ab8', 'ab8@gmail.com', '1234', '2021-09-06 16:06:07'),
(12, 'ab9', 'ab9@gmail.com', '1234', '2021-09-08 16:21:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);
ALTER TABLE `news` ADD FULLTEXT KEY `news_body` (`news_body`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
