-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-22 08:46:07
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `ID` int(10) NOT NULL,
  `userName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `realName` text COLLATE utf8_unicode_ci NOT NULL,
  `nickname` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`ID`, `userName`, `email`, `password`, `salt`, `realName`, `nickname`, `photo`, `intro`) VALUES
(1, 'ppQb8IbJ5t', 'ming@mail.com', '4d2e0b18761d0dbd6dac9be328f9d1817a761efdb913e2a2bf2e299c5d1c0a30', 'g063nq2u', '王小明', '小明', 'site/default_photo.png', '小明的自我介紹');

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `ID` int(10) NOT NULL,
  `authorID` text COLLATE utf8_unicode_ci NOT NULL,
  `hideName` tinyint(1) NOT NULL,
  `boardID` int(10) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `tagIDs` text COLLATE utf8_unicode_ci NOT NULL,
  `postTime` datetime NOT NULL,
  `goodPoint` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `article`
--

INSERT INTO `article` (`ID`, `authorID`, `hideName`, `boardID`, `title`, `content`, `tagIDs`, `postTime`, `goodPoint`) VALUES
(1, 'ppQb8IbJ5t', 1, 4, '標題', '內容文字內容文字內容文字內容文字內容文字', '1', '2020-07-22 12:53:56', 0),
(2, 'ppQb8IbJ5t', 0, 1, '標題', '內容文字內容文字內容文字內容文字內容文字', '2', '2020-07-22 12:54:40', 0),
(3, 'ppQb8IbJ5t', 1, 3, '標題', '內容文字內容文字內容文字內容文字內容文字', '1 ', '2020-07-22 13:39:11', 0),
(4, 'ppQb8IbJ5t', 1, 2, '標題', '內容文字內容文字內容文字內容文字', '2 3 ', '2020-07-22 13:40:17', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `board`
--

CREATE TABLE `board` (
  `ID` int(10) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `moderatorList` text COLLATE utf8_unicode_ci NOT NULL,
  `boardRule` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `articlesPerDay` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `board`
--

INSERT INTO `board` (`ID`, `name`, `intro`, `picture`, `moderatorList`, `boardRule`, `articlesPerDay`) VALUES
(1, '醫療甘苦談', '這是醫療甘苦談的看板介紹......', '', '', '', 5),
(2, '健康檢查', '這是健康檢查的看板介紹......', '', '', '', 5),
(3, '醫療議題', '這是醫療議題的看板介紹......', '', '', '', 5),
(4, '飲食控制', '這是飲食控制的看板介紹......', '', '', '', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `followinguser`
--

CREATE TABLE `followinguser` (
  `userName` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `followUserID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `keptarticle`
--

CREATE TABLE `keptarticle` (
  `userName` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `articleID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `postedtag`
--

CREATE TABLE `postedtag` (
  `userName` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `postedTagID` int(10) NOT NULL,
  `num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `postedtag`
--

INSERT INTO `postedtag` (`userName`, `postedTagID`, `num`) VALUES
('ppQb8IbJ5t', 1, 2),
('ppQb8IbJ5t', 2, 2),
('ppQb8IbJ5t', 3, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `reply`
--

CREATE TABLE `reply` (
  `ID` int(10) NOT NULL,
  `articleID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `authorID` text COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `goodPoint` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `site`
--

CREATE TABLE `site` (
  `ruleFile` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'rule.txt',
  `ruleUpdatedTime` date NOT NULL,
  `titleCharMaximum` tinyint(4) NOT NULL DEFAULT 20,
  `contentCharMinimum` tinyint(4) NOT NULL DEFAULT 15,
  `contentCharMaximum` smallint(6) NOT NULL DEFAULT 5000,
  `tagCountMaximum` tinyint(4) NOT NULL DEFAULT 8,
  `MasterAccount` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `tag`
--

CREATE TABLE `tag` (
  `ID` int(10) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `tag`
--

INSERT INTO `tag` (`ID`, `name`) VALUES
(1, '心情'),
(2, '身體'),
(3, '生死'),
(4, '急診');

-- --------------------------------------------------------

--
-- 資料表結構 `viewedtag`
--

CREATE TABLE `viewedtag` (
  `userName` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `viewedTagID` int(10) NOT NULL,
  `num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `viewedtag`
--

INSERT INTO `viewedtag` (`userName`, `viewedTagID`, `num`) VALUES
('ppQb8IbJ5t', 1, 10),
('ppQb8IbJ5t', 2, 10),
('ppQb8IbJ5t', 3, 0),
('ppQb8IbJ5t', 4, 10);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article`
--
ALTER TABLE `article`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `board`
--
ALTER TABLE `board`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reply`
--
ALTER TABLE `reply`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tag`
--
ALTER TABLE `tag`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
