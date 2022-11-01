-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2022 年 11 月 01 日 06:26
-- 伺服器版本： 10.5.15-MariaDB-cll-lve
-- PHP 版本： 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `u463986136_colorfuledu`
--

-- --------------------------------------------------------

--
-- 資料表結構 `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastdate` datetime NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `about`
--

INSERT INTO `about` (`id`, `intro`, `service`, `lastdate`, `user`) VALUES
(1, '位於新竹市東區的冰芬文教補習班。色彩一直是療癒人心的良藥，繽紛=冰芬 意旨戒掉呆板的學習方式，透過多元教學經驗，讓學習更多 \"冰芬\" 色彩，並套用國外 「更高的自由度」、「更強的互動性」和「更深的參與感」的學習模式，讓學習更加放鬆、快樂，同時讓學生走進世界，開拓視野。 我們也提供「留遊學諮詢」的服務，希望優秀及想往國際發展的學生，能有更好的圓夢舞台。在「人才培育」方面也提供完善的課程規劃、實作教學及測驗，讓更多有志於多元教學的人才能被看見。選擇冰芬，使你的未來繽紛。讓學生在學習的領域紛紛享受五彩斑斕的美麗世界。', '我們提供了安全的環境、還有常態課程幫助孩子升學、另開特色課程挖掘孩子們的興趣、此外還有師培課程，培訓每個想要成為專業教師的人才。且冰芬文教的教師皆是受過專業受訓認證的，還有完善的設備提供給大家，能讓學習更加專心舒適。', '2022-10-21 17:22:14', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `cooperate_img`
--

CREATE TABLE `cooperate_img` (
  `id` int(11) NOT NULL,
  `imgsrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `cooperate_img`
--

INSERT INTO `cooperate_img` (`id`, `imgsrc`, `user`, `lastdate`, `url`) VALUES
(1, '725816evone.png', '帥哥', '2022-08-24 05:33:04', 'https://www.evoneic.com/'),
(2, '924125esol.png', '帥哥', '2022-08-24 05:33:53', 'https://www.esoleducation.com/'),
(3, '356885caves.png', '帥哥', '2022-08-24 05:34:21', 'https://www.cavesbooks.com.tw/');

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgsrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_age` int(5) NOT NULL,
  `end_age` int(5) NOT NULL,
  `start_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-1',
  `start_day` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` int(5) NOT NULL,
  `course_type` int(5) NOT NULL,
  `isshow` int(5) NOT NULL,
  `focus` int(5) NOT NULL,
  `focus_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastdate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `course`
--

INSERT INTO `course` (`id`, `title`, `imgsrc`, `content`, `start_age`, `end_age`, `start_time`, `end_time`, `week`, `week_text`, `start_day`, `deadline`, `course_type`, `isshow`, `focus`, `focus_text`, `user`, `lastdate`) VALUES
(1, 'ESL國際班', '620862course1.png', '<p>Do you want to study abroad?</p>\r\n\r\n<p>Want the time to be ualuable?</p>\r\n\r\n<p>Don&#39;t let your dreams just be dreams !</p>\r\n\r\n<p><strong>ESL國際班</strong>每周一、三&middot;五，16:30 - 18:00</p>\r\n\r\n<p>☑Speaking</p>\r\n\r\n<p>☑Writing</p>\r\n\r\n<p>☑Listening</p>\r\n\r\n<p>☑Reading</p>\r\n\r\n<p>☑Vocabular</p>\r\n\r\n<p>☑Grammar</p>\r\n\r\n<p><strong>獨家特色:</strong></p>\r\n\r\n<p>精緻小班制教學,營造出讓孩子都能勇於開口的輕鬆學習環境</p>\r\n\r\n<p>使用英國三大品牌教材 PearsonordCambridge</p>\r\n\r\n<p>專為準備投考國際英文水平考試而設立的預備課程</p>\r\n\r\n<p>想讀名校不再只是遙不可及</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>冰芬美語補習班</p>\r\n\r\n<p>聯絡電話:03-5670018</p>\r\n\r\n<p>電子信箱:service@ice-finland.pro</p>\r\n\r\n<p>地址:新竹市東區光復路一段271號3樓</p>\r\n\r\n<p><img alt=\"\" src=\"../ckeditor_upload/1958059473.png\" style=\"height:354px; width:250px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>===================================</p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" /><a href=\"https://www.facebook.com/hashtag/%E7%B2%BE%E7%B7%BB%E5%B0%8F%E7%8F%AD%E6%95%99%E5%AD%B8?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#精緻小班教學</a>，<a href=\"https://www.facebook.com/hashtag/%E7%94%A8%E5%BF%83%E6%8C%87%E5%B0%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#用心指導</a>，冰芬的努力你會看見！</p>\r\n\r\n<p><img alt=\"🎉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f389.png\" style=\"height:16px; width:16px\" />更多課程內容資訊等你來詢問<img alt=\"🙂\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4c/1/16/1f642.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://www.ice-finland.club/\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/%E5%86%B0%E8%8A%AC%E7%BE%8E%E8%AA%9E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#冰芬美語</a> <a href=\"https://www.facebook.com/hashtag/%E6%88%90%E4%BA%BA?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#成人</a> <a href=\"https://www.facebook.com/hashtag/%E5%A4%96%E5%B8%AB?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#外師</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A8%E7%BE%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#全美</a> <a href=\"https://www.facebook.com/hashtag/%E7%94%9F%E6%B4%BB%E6%9C%83%E8%A9%B1?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#生活會話</a></p>\r\n', 6, 12, '16:30', '18:00', '1,3,5', '', '2022-09-15', 1, 1, 1, 0, 'ESL國際班', '管理者', '2022-11-01 12:49:36'),
(4, '日常會話班', '573439成人班.png', '<p>成人對話式主題課程來嘍 <img alt=\"🥰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tea/1/16/1f970.png\" style=\"height:16px; width:16px\" /><img alt=\"🥰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tea/1/16/1f970.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p>您是不是害羞不敢開口說英語?</p>\r\n\r\n<p>好消息，成人對話式主題課程讓您每週花少少的時間輕鬆開口說英語，由長年派駐各國的老師帶領您瞭解各國文化的差異，提早為駐外派各國及融入當地生活做準備</p>\r\n\r\n<p><img alt=\"\" src=\"../ckeditor_upload/578826031.png\" style=\"height:608px; width:430px\" /></p>\r\n\r\n<h2 style=\"font-style:italic\"><strong>試聽課預約</strong></h2>\r\n\r\n<h2 style=\"font-style:italic\"><strong>單堂優惠價300元</strong></h2>\r\n\r\n<h2 style=\"font-style:italic\"><strong>報名可折抵</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>立即聯絡: 03-567 0018</h2>\r\n\r\n<p>===================================</p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" /><a href=\"https://www.facebook.com/hashtag/%E7%B2%BE%E7%B7%BB%E5%B0%8F%E7%8F%AD%E6%95%99%E5%AD%B8?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#精緻小班教學</a>，<a href=\"https://www.facebook.com/hashtag/%E7%94%A8%E5%BF%83%E6%8C%87%E5%B0%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#用心指導</a>，冰芬的努力你會看見！</p>\r\n\r\n<p><img alt=\"🎉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f389.png\" style=\"height:16px; width:16px\" />更多課程內容資訊等你來詢問<img alt=\"🙂\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4c/1/16/1f642.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://www.ice-finland.club/\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/%E5%86%B0%E8%8A%AC%E7%BE%8E%E8%AA%9E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#冰芬美語</a> <a href=\"https://www.facebook.com/hashtag/%E6%88%90%E4%BA%BA?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#成人</a> <a href=\"https://www.facebook.com/hashtag/%E5%A4%96%E5%B8%AB?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#外師</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A8%E7%BE%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#全美</a> <a href=\"https://www.facebook.com/hashtag/%E7%94%9F%E6%B4%BB%E6%9C%83%E8%A9%B1?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#生活會話</a></p>\r\n', 18, 80, '09:30', '11:00', '1,2,3,4,5', '', '2022-11-01', 1, 1, 1, 0, '日常會話班\r\n\r\n試聽課預約\r\n單堂優惠價300元\r\n報名可折抵', '管理者', '2022-11-01 12:47:19'),
(5, '商用會話班', '270773LINE_ALBUM_老師班英文課_221021.jpg', '<p>成人對話式主題課程來嘍 <img alt=\"🥰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tea/1/16/1f970.png\" style=\"height:16px; width:16px\" /><img alt=\"🥰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tea/1/16/1f970.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p>您是不是害羞不敢開口說英語?</p>\r\n\r\n<p>好消息，成人對話式主題課程讓您每週花少少的時間輕鬆開口說英語，由長年派駐各國的老師帶領您瞭解各國文化的差異，提早為駐外派各國及融入當地生活做準備</p>\r\n\r\n<p><em><strong>提升業務談判競爭力</strong></em></p>\r\n\r\n<p><em><strong>商用書信掌握重點</strong></em></p>\r\n\r\n<p><img alt=\"\" src=\"../ckeditor_upload/578826031.png\" style=\"height:608px; width:430px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1><strong>試聽課預約</strong></h1>\r\n\r\n<h1><strong>單堂優惠價300元</strong></h1>\r\n\r\n<h1><strong>報名可折抵</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>立即聯絡: 03-567 0018</h2>\r\n\r\n<p>===================================</p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" /><a href=\"https://www.facebook.com/hashtag/%E7%B2%BE%E7%B7%BB%E5%B0%8F%E7%8F%AD%E6%95%99%E5%AD%B8?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#精緻小班教學</a>，<a href=\"https://www.facebook.com/hashtag/%E7%94%A8%E5%BF%83%E6%8C%87%E5%B0%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#用心指導</a>，冰芬的努力你會看見！</p>\r\n\r\n<p><img alt=\"🎉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f389.png\" style=\"height:16px; width:16px\" />更多課程內容資訊等你來詢問<img alt=\"🙂\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4c/1/16/1f642.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://www.ice-finland.club/\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/%E5%86%B0%E8%8A%AC%E7%BE%8E%E8%AA%9E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#冰芬美語</a> <a href=\"https://www.facebook.com/hashtag/%E6%88%90%E4%BA%BA?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#成人</a> <a href=\"https://www.facebook.com/hashtag/%E5%A4%96%E5%B8%AB?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#外師</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A8%E7%BE%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#全美</a> <a href=\"https://www.facebook.com/hashtag/%E7%94%9F%E6%B4%BB%E6%9C%83%E8%A9%B1?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#生活會話</a></p>\r\n', 15, 80, '21:30', '11:00', '1,2,3,4,5', '', '2022-11-01', 1, 1, 1, 0, '', '管理者', '2022-11-01 12:47:33'),
(6, '駐外文化班', '320617PFRK1570.JPG', '<p>成人對話式主題課程來嘍 <img alt=\"🥰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tea/1/16/1f970.png\" style=\"height:16px; width:16px\" /><img alt=\"🥰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tea/1/16/1f970.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p>您是不是害羞不敢開口說英語?</p>\r\n\r\n<p>好消息，成人對話式主題課程讓您每週花少少的時間輕鬆開口說英語，由長年派駐各國的老師帶領您瞭解各國文化的差異，提早為駐外派各國及融入當地生活做準備</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>試聽課預約</strong></p>\r\n\r\n<p><strong>單堂優惠價300元</strong></p>\r\n\r\n<p><strong>報名可折抵</strong></p>\r\n\r\n<p><img alt=\"\" src=\"../ckeditor_upload/578826031.png\" style=\"height:608px; width:430px\" /></p>\r\n\r\n<p>立即聯絡: 03-567 0018</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>===================================</p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" /><a href=\"https://www.facebook.com/hashtag/%E7%B2%BE%E7%B7%BB%E5%B0%8F%E7%8F%AD%E6%95%99%E5%AD%B8?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#精緻小班教學</a>，<a href=\"https://www.facebook.com/hashtag/%E7%94%A8%E5%BF%83%E6%8C%87%E5%B0%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#用心指導</a>，冰芬的努力你會看見！</p>\r\n\r\n<p><img alt=\"🎉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f389.png\" style=\"height:16px; width:16px\" />更多課程內容資訊等你來詢問<img alt=\"🙂\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4c/1/16/1f642.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://www.ice-finland.club/\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/%E5%86%B0%E8%8A%AC%E7%BE%8E%E8%AA%9E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#冰芬美語</a> <a href=\"https://www.facebook.com/hashtag/%E6%88%90%E4%BA%BA?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#成人</a> <a href=\"https://www.facebook.com/hashtag/%E5%A4%96%E5%B8%AB?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#外師</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A8%E7%BE%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#全美</a> <a href=\"https://www.facebook.com/hashtag/%E7%94%9F%E6%B4%BB%E6%9C%83%E8%A9%B1?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#生活會話</a></p>\r\n', 15, 80, '21:30', '23:00', '1,2,3,4,5', '', '2022-11-01', 1, 1, 1, 0, '', '管理者', '2022-11-01 12:47:44'),
(7, '葡萄酒英語會話班', '374121未命名設計 (3).png', '<p>全美語教學精緻小班</p>\r\n\r\n<p>認識葡萄酒</p>\r\n\r\n<p>文化</p>\r\n\r\n<p>歷史</p>\r\n\r\n<p>品味美味的葡萄酒</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>立即聯絡: 03-567 0018</p>\r\n\r\n<p>===================================</p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" /><a href=\"https://www.facebook.com/hashtag/%E7%B2%BE%E7%B7%BB%E5%B0%8F%E7%8F%AD%E6%95%99%E5%AD%B8?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#精緻小班教學</a>，<a href=\"https://www.facebook.com/hashtag/%E7%94%A8%E5%BF%83%E6%8C%87%E5%B0%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#用心指導</a>，冰芬的努力你會看見！</p>\r\n\r\n<p><img alt=\"🎉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f389.png\" style=\"height:16px; width:16px\" />更多課程內容資訊等你來詢問<img alt=\"🙂\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4c/1/16/1f642.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://www.ice-finland.club/\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/%E5%86%B0%E8%8A%AC%E7%BE%8E%E8%AA%9E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#冰芬美語</a> <a href=\"https://www.facebook.com/hashtag/%E6%88%90%E4%BA%BA?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#成人</a> <a href=\"https://www.facebook.com/hashtag/%E5%A4%96%E5%B8%AB?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#外師</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A8%E7%BE%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#全美</a> <a href=\"https://www.facebook.com/hashtag/%E7%94%9F%E6%B4%BB%E6%9C%83%E8%A9%B1?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#生活會話</a></p>\r\n', 18, 80, '13:30', '15:00', '1,2,3,4,5', '', '2022-11-01', 1, 2, 1, 0, '', '管理者', '2022-11-01 12:47:54'),
(8, '西餐禮儀會話班', '512228未命名設計 (4).png', '<p>全美語教學精緻小班</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>認識西餐文化</p>\r\n\r\n<p>西餐用餐禮儀教學</p>\r\n\r\n<p>親身體驗正餐過程</p>\r\n\r\n<p>老爺大酒店實地演練</p>\r\n\r\n<p>===================================</p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" /><a href=\"https://www.facebook.com/hashtag/%E7%B2%BE%E7%B7%BB%E5%B0%8F%E7%8F%AD%E6%95%99%E5%AD%B8?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#精緻小班教學</a>，<a href=\"https://www.facebook.com/hashtag/%E7%94%A8%E5%BF%83%E6%8C%87%E5%B0%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#用心指導</a>，冰芬的努力你會看見！</p>\r\n\r\n<p><img alt=\"🎉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f389.png\" style=\"height:16px; width:16px\" />更多課程內容資訊等你來詢問<img alt=\"🙂\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4c/1/16/1f642.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://www.ice-finland.club/\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/%E5%86%B0%E8%8A%AC%E7%BE%8E%E8%AA%9E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#冰芬美語</a> <a href=\"https://www.facebook.com/hashtag/%E6%88%90%E4%BA%BA?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#成人</a> <a href=\"https://www.facebook.com/hashtag/%E5%A4%96%E5%B8%AB?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#外師</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A8%E7%BE%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#全美</a> <a href=\"https://www.facebook.com/hashtag/%E7%94%9F%E6%B4%BB%E6%9C%83%E8%A9%B1?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#生活會話</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>立即聯絡: 03-567 0018</p>\r\n', 15, 80, '13:30', '16:00', '1,2,3,4', '', '2022-11-01', 1, 2, 1, 0, '', '管理者', '2022-11-01 12:49:17'),
(9, '2023 冬令營  兩天一夜旅宿親子活動', '514760130_210冬令營.png', '<p>【 冰芬文教&nbsp; 課程推薦&nbsp; 2023&nbsp; 冬令營&nbsp; 兩天一夜旅宿親子活動】</p>\r\n\r\n<p>噹噹噹 ~ 2023年的冬令營來嘍 (敲碗嘍)</p>\r\n\r\n<p>這次我們用全英語介紹世界各地文化，以及精采的手作實驗課程</p>\r\n\r\n<p>早鳥優惠，立即聯絡(聯絡資訊在下方) <img alt=\"😁\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta8/1.5/16/1f601.png\" style=\"height:16px; width:16px\" /><img alt=\"😁\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta8/1.5/16/1f601.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"../ckeditor_upload/1021604846.png\" style=\"height:608px; width:430px\" /></p>\r\n\r\n<p>===================================</p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1.5/16/1f449.png\" style=\"height:16px; width:16px\" /><a href=\"https://www.facebook.com/hashtag/%E7%B2%BE%E7%B7%BB%E5%B0%8F%E7%8F%AD%E6%95%99%E5%AD%B8?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#精緻小班教學</a>，<a href=\"https://www.facebook.com/hashtag/%E7%94%A8%E5%BF%83%E6%8C%87%E5%B0%8E?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#用心指導</a>，冰芬的努力你會看見！</p>\r\n\r\n<p><img alt=\"🎉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te5/1.5/16/1f389.png\" style=\"height:16px; width:16px\" />更多課程內容資訊等你來詢問<img alt=\"🙂\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta5/1.5/16/1f642.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://www.ice-finland.club/\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/%E5%86%B0%E8%8A%AC%E7%BE%8E%E8%AA%9E?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#冰芬美語</a> <a href=\"https://www.facebook.com/hashtag/%E5%86%AC%E4%BB%A4%E7%87%9F?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#冬令營</a> <a href=\"https://www.facebook.com/hashtag/%E5%A4%96%E5%B8%AB?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#外師</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A8%E7%BE%8E?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#全美</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A9%E5%A4%A9%E4%B8%80%E5%A4%9C%E6%88%B6%E5%A4%96%E6%97%85%E5%AE%BF%E8%A6%AA%E5%AD%90%E6%B4%BB%E5%8B%95?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#兩天一夜戶外旅宿親子活動</a></p>\r\n', 6, 12, '21:00', '16:30', '1,2,3,4,5,6,7', '', '2023-01-30', 1, 2, 1, 1, '2023  冬令營  兩天一夜旅宿親子活動\r\n全英語介紹世界各地文化\r\n動手玩創意\r\n科學STEAM\r\n馬斯克創業領航號\r\n手作食育\r\n森林探索', '管理者', '2022-10-31 17:22:19');

-- --------------------------------------------------------

--
-- 資料表結構 `home_banner`
--

CREATE TABLE `home_banner` (
  `id` int(11) NOT NULL,
  `seo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgsrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(5) NOT NULL,
  `isshow` int(5) NOT NULL,
  `lastdate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `home_banner`
--

INSERT INTO `home_banner` (`id`, `seo`, `imgsrc`, `link`, `sort`, `isshow`, `lastdate`, `user`) VALUES
(1, '新竹市冰芬文教', '47648banner.png', 'javascript:;', 1, 1, '2022-09-08 02:33:28', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `letter`
--

CREATE TABLE `letter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `lastdate` varchar(100) NOT NULL,
  `imgsrc` varchar(255) NOT NULL,
  `course` varchar(5) NOT NULL,
  `daily` varchar(5) NOT NULL,
  `train` varchar(5) NOT NULL,
  `isshow` varchar(5) NOT NULL,
  `focus` varchar(5) NOT NULL,
  `hot` varchar(5) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `lastdate`, `imgsrc`, `course`, `daily`, `train`, `isshow`, `focus`, `hot`, `user`) VALUES
(12, '從上週起，教室開始換穿拖鞋嘍 😉　', '<p>從上週起，教室開始換穿拖鞋嘍&nbsp;<img alt=\"😉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb0/1.5/16/1f609.png\" style=\"height:16px; width:16px\" />　<br />\r\n來上課的同學可以自己帶拖鞋來換穿，也可以穿準備好的拖鞋（穿過會噴酒精消毒）<br />\r\n在此提醒大家哦</p>\r\n', '2022-08-23 19:54:33', '5928936110346185.jpg', '0', '1', '0', '1', '0', '1', '帥哥'),
(13, '魚菜共生的課程，第一次聽說的硝化細菌', '<p>【<span class=\"marker\">#冰芬文教&nbsp;#歡樂時光夏令營&nbsp;#自然手作課</span>&nbsp;生活。日常】</p>\r\n\r\n<p>魚菜共生的課程，第一次聽說的硝化細菌<br />\r\n<br />\r\n讓小朋友瞭解 相生相依的自然界過程 及 對生命的負責任態度</p>\r\n', '2022-08-25 14:43:07', '94131493357183769959689.jpg', '0', '1', '0', '1', '0', '1', '帥哥'),
(14, '#古生物大展-生命的史詩與演化共舞', '<p>【<span class=\"marker\">#冰芬文教 #活動分享</span>】</p>\r\n\r\n<p><span class=\"marker\">#古生物大展</span>-生命的史詩與演化共舞</p>\r\n\r\n<p>活動期間：111/07/12 09:30 ~ 115/12/31 17:00</p>\r\n\r\n<p>活動地點：臺博館古生物館(臺北市中正區襄陽路25號)</p>\r\n\r\n<p>主辦單位：國立臺灣博物館</p>\r\n\r\n<p>地球至今已歷經過至少五次生物大滅絕，每次滅絕事件都導致環境驟變，許多物種在短時間內消失。然而，存活下來的少數生物，卻也發揮生命的韌性，隨著時間推演，造就現今繁盛而多樣的生命。國立臺灣博物館古生物館的主題常設展「古生物大展&mdash;生命的史詩．與演化共舞」，邀請大家一同透過豐富的化石，探索這段橫跨數十億年的生命演化史詩。</p>\r\n\r\n<p>更多資訊請參考活動官網</p>\r\n\r\n<p><a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fevent.culture.tw%2FNTM%2Fportal%2FRegistration%2FC0103MAction%3FactId%3D90081%26fbclid%3DIwAR1xGsz9G63TNFvQ8us9ppzrIR8OhoRTTm3wMUxeWqQk7HwBEI_Y5BTHakc&amp;h=AT04cKA2zN8cS2MTERzXsoVePZ145MaXKxXdu3GdYD9rAZvGbI9Bo6Fu0RM1aH_EPamhtOlhZCyjDzNH8gq0AaVgKgQ1XLsYK7An3jTlcP6hMFwXAnibTSiCIx3GyuMr-N3Q&amp;__tn__=-UK-R&amp;c[0]=AT1-oZnrwXFhwwTEVnBaklj_8_D2GBQXKIHPRz1kr6GOLBVriez9pX1modUPxB0Z70dUQc55Qd0U2nUVaWE_lPGIKzsObWU-71FkhXrsYz7G0sBbVTvi_uEUUE4NX4hr8wo4ykFwyzGLYKhKmMdwDwHqKFOYDzWRyF6r-CdomcYFDgZ2MLTKtAFVxV65akUydBIJrD5H\" target=\"_blank\">https://event.culture.tw/....../Reg....../C0103MAction......</a></p>\r\n\r\n<p>=================</p>\r\n\r\n<p>學習本是條漫長的路，不管你走得多慢，只要不停下腳步，相信一定可以迎來成功時刻，讓冰芬陪伴大家一起向前邁進 <img alt=\"👣\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te2/1.5/16/1f463.png\" style=\"height:16px; width:16px\" /><img alt=\"👣\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te2/1.5/16/1f463.png\" style=\"height:16px; width:16px\" /><img alt=\"👣\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te2/1.5/16/1f463.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p>我們的多元課程，包括讓孩子學習 <span class=\"marker\">#主動探索、#思考訓練、#解決問題的能力</span> 並鼓勵孩子<span class=\"marker\"> #勇於發言</span></p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1.5/16/1f449.png\" style=\"height:16px; width:16px\" /><span class=\"marker\">#精緻小班教學，#用心指導</span>，冰芬的努力你會看見！</p>\r\n\r\n<p><img alt=\"🎉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te5/1.5/16/1f389.png\" style=\"height:16px; width:16px\" />更多課程內容資訊等的就是你<img alt=\"🙂\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta5/1.5/16/1f642.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ice-finland.club%2F%3Ffbclid%3DIwAR0SdUXm6IGAY4R6IE055QmCFG_yJ7gXsMBOt__xEpOl2DyFqPnIrjdgGck&amp;h=AT2wX_XlKJVRyT-0FI5Br21EZRsSqo1tHRhg6obcpRbNP7BqihJqGbn8AJY5V00NfPV69S14G_PKDHAyJ5Z3fM8DVROL4lc85gDWJvywX0-W8mq-zsMzaxkvxuAy2CZHqVwe&amp;__tn__=-UK-R&amp;c[0]=AT1-oZnrwXFhwwTEVnBaklj_8_D2GBQXKIHPRz1kr6GOLBVriez9pX1modUPxB0Z70dUQc55Qd0U2nUVaWE_lPGIKzsObWU-71FkhXrsYz7G0sBbVTvi_uEUUE4NX4hr8wo4ykFwyzGLYKhKmMdwDwHqKFOYDzWRyF6r-CdomcYFDgZ2MLTKtAFVxV65akUydBIJrD5H\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n', '2022-08-25 14:42:59', '770003294497802.jpg', '1', '1', '0', '1', '0', '1', '帥哥'),
(15, '現在的同學們都有這麼強的創意思考力嗎？', '<p>【<span class=\"marker\">#冰芬文教&nbsp;#歡樂時光夏令營&nbsp;#手作課</span>&nbsp;生活。日常】<br />\r\n<br />\r\n現在的同學們都有這麼強的創意思考力嗎？(小編突感汗顏&nbsp;<img alt=\"🤣\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tab/1.5/16/1f923.png\" style=\"height:16px; width:16px\" /><img alt=\"🤣\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tab/1.5/16/1f923.png\" style=\"height:16px; width:16px\" /><br />\r\n<br />\r\n傢伙一拿出來，不需要任何說明書，咚咚咚，就完成了這麼多美妙的作品</p>\r\n', '2022-08-25 14:41:59', '2118429590960.jpg', '0', '1', '0', '1', '0', '1', '帥哥'),
(16, '2022 自然科秋季班 ', '<p>【<span class=\"marker\">#冰芬文教 #課程推薦 #小班制 #科技素養 #自己動手做</span>】</p>\r\n\r\n<p>讓不插電的環境下，建立程式邏輯及科技素養的知識脈絡，讓孩子往科技人才的道路大步邁進。</p>\r\n\r\n<p>2022 自然科秋季班 &quot;賈伯斯學程式&quot; 課程開班嘍～<img alt=\"✏️\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6b/1.5/16/270f.png\" style=\"height:16px; width:16px\" /><img alt=\"✏️\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6b/1.5/16/270f.png\" style=\"height:16px; width:16px\" />　</p>\r\n\r\n<p>上課日期：9/16, 9/23, 9/30, 10/14, 10/21, 10/28, 11/4, 11/11, 11/18, 11/25</p>\r\n\r\n<p>上課時間：星期五 16:30-18:00</p>\r\n\r\n<p>費用：10堂課 特價 5000 (原價 6000)</p>\r\n\r\n<p><img alt=\"✏️\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6b/1.5/16/270f.png\" style=\"height:16px; width:16px\" />為了鼓勵小朋友認真學習，上滿 9 堂課最後 1 堂課免費呦</p>\r\n\r\n<p>(提供 500元折價券給之後任一課程使用)<img alt=\"😄\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2b/1.5/16/1f604.png\" style=\"height:16px; width:16px\" /><img alt=\"😄\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2b/1.5/16/1f604.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p>================================</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />諮詢電話：03-567-0018</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.ice-finland.club%2F%3Ffbclid%3DIwAR0SdUXm6IGAY4R6IE055QmCFG_yJ7gXsMBOt__xEpOl2DyFqPnIrjdgGck&amp;h=AT2wX_XlKJVRyT-0FI5Br21EZRsSqo1tHRhg6obcpRbNP7BqihJqGbn8AJY5V00NfPV69S14G_PKDHAyJ5Z3fM8DVROL4lc85gDWJvywX0-W8mq-zsMzaxkvxuAy2CZHqVwe&amp;__tn__=-UK-R&amp;c[0]=AT2r7DvaIKpf__a3sODzqdMiLZJv0-phPOkBgPEs4WCUDrTJ94TmhFlCcvp-4NjkZBocvISHbJejr4Qlp5cX6p8hDXmcbXOwGhzJ30QotL916nyzf44XX5z2FVP1W9LJbI4zsXuQtvDH4uRVHgyYtXUQN2xZ6E83FH9iJHU-IfUjq-tUMN6rG0sW7oRqjErawDNyMuZA\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n\r\n<p><span class=\"marker\">#創新教育 #思維 #創新 #創意 #線上課程 #夏令營 #批判性思考</span></p>\r\n', '2022-10-20 15:16:51', '927564297616564n.jpg', '1', '0', '0', '1', '0', '1', '帥哥'),
(19, '【冰芬文教 歡樂時光夏令營 小班制 生活。日常】', '<p>【<span class=\"marker\">#冰芬文教&nbsp;#歡樂時光夏令營&nbsp;#小班制</span>&nbsp;生活。日常】<br />\r\n<br />\r\n不是只有手作課，不是只有實驗課，不是只有美術課，不是只有創意課。。。<img alt=\"🤣\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tab/1.5/16/1f923.png\" style=\"height:16px; width:16px\" /><img alt=\"🤣\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tab/1.5/16/1f923.png\" style=\"height:16px; width:16px\" /><br />\r\n<br />\r\n這個暑假，G2-G8 的小班課程持續進行中，新學期 SDGs 素養的 ESL 課程即將降落，敬請期待哦&nbsp;<img alt=\"🌞\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb8/1.5/16/1f31e.png\" style=\"height:16px; width:16px\" /><img alt=\"🌞\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb8/1.5/16/1f31e.png\" style=\"height:16px; width:16px\" /></p>\r\n', '2022-10-20 15:16:48', '983178299168793_3.jpg', '0', '1', '0', '1', '0', '1', '帥哥'),
(21, '成人對話式主題課程', '<p>【#冰芬文教 #課程推薦】</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>成人對話式主題課程來嘍 <img alt=\"🥰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tea/1/16/1f970.png\" style=\"height:16px; width:16px\" /><img alt=\"🥰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tea/1/16/1f970.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p>您是不是害羞不敢開口說英語?</p>\r\n\r\n<p>好消息!</p>\r\n\r\n<p>成人對話式主題課程讓您每週花少少的時間輕鬆開口說英語，</p>\r\n\r\n<p>由長年派駐各國的老師帶領您瞭解各國文化的差異，提早為</p>\r\n\r\n<p>駐外派各國及融入當地生活做準備</p>\r\n\r\n<p><img alt=\"\" src=\"../ckeditor_upload/578826031.png\" style=\"height:608px; width:430px\" /></p>\r\n\r\n<p>===================================</p>\r\n\r\n<p>#外師會話班 #中師會話班 #各級美語班</p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" />#精緻小班教學，#用心指導，冰芬的努力你會看見！</p>\r\n\r\n<p><img alt=\"🎉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f389.png\" style=\"height:16px; width:16px\" />更多課程內容資訊等你來詢問<img alt=\"🙂\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4c/1/16/1f642.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc0/1/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://www.ice-finland.club/\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/%E5%86%B0%E8%8A%AC%E7%BE%8E%E8%AA%9E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#冰芬美語</a> <a href=\"https://www.facebook.com/hashtag/%E6%88%90%E4%BA%BA?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#成人</a> <a href=\"https://www.facebook.com/hashtag/%E5%A4%96%E5%B8%AB?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#外師</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A8%E7%BE%8E?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#全美</a> <a href=\"https://www.facebook.com/hashtag/%E7%94%9F%E6%B4%BB%E6%9C%83%E8%A9%B1?__eep__=6&amp;__cft__[0]=AZUtsMwUvhNCqd4U_ddNRbaeDO7Y1UYUo2rMLGq56UW9JXZ76kSrsaT-bymXshsTN1S3NIej7VoxD6qAx7Klnh7QkILF-REl-n9S3EFLklTZG33CcTIyJWsMxRs5k3oTtYIu8tHdcCpeHpBhY_RAVc1hF14Ti7b8T0rvsvm59Gky9uxwH9lKIRRNUsiT0MQ1vM3IrQx_nBjDd322JhCux1wV&amp;__tn__=*NK-R\">#生活會話</a></p>\r\n', '2022-10-26 15:13:03', '726428成人班.png', '1', '0', '0', '1', '0', '1', '管理者'),
(22, '2023 世界之美冬令營  兩天一夜旅宿親子活動', '<p>【 冰芬文教&nbsp; &nbsp;課程推薦&nbsp; 2023&nbsp; 冬令營&nbsp; 兩天一夜旅宿親子活動】</p>\r\n\r\n<p>噹噹噹 ~ 2023年的冬令營來嘍 (敲碗嘍)</p>\r\n\r\n<p>這次我們用全英語介紹世界各地文化，以及精采的手作實驗課程</p>\r\n\r\n<p>早鳥優惠，立即聯絡(聯絡資訊在下方) <img alt=\"😁\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta8/1.5/16/1f601.png\" style=\"height:16px; width:16px\" /><img alt=\"😁\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta8/1.5/16/1f601.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>===================================</p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1.5/16/1f449.png\" style=\"height:16px; width:16px\" />#精緻小班教學，#用心指導，冰芬的努力你會看見！</p>\r\n\r\n<p><img alt=\"🎉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te5/1.5/16/1f389.png\" style=\"height:16px; width:16px\" />更多課程內容資訊等你來詢問<img alt=\"🙂\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta5/1.5/16/1f642.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />歡迎臉書粉絲團私訊詢問</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />電子信箱：service@ice-finland.pro</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />官方line：@516ttumg</p>\r\n\r\n<p><img alt=\"📩\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" />冰芬官網：<a href=\"https://www.ice-finland.club/\" target=\"_blank\">https://www.ice-finland.club</a></p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/%E5%86%B0%E8%8A%AC%E7%BE%8E%E8%AA%9E?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#冰芬美語</a> <a href=\"https://www.facebook.com/hashtag/%E5%86%AC%E4%BB%A4%E7%87%9F?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#冬令營</a> <a href=\"https://www.facebook.com/hashtag/%E5%A4%96%E5%B8%AB?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#外師</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A8%E7%BE%8E?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#全美</a> <a href=\"https://www.facebook.com/hashtag/%E5%85%A9%E5%A4%A9%E4%B8%80%E5%A4%9C%E6%88%B6%E5%A4%96%E6%97%85%E5%AE%BF%E8%A6%AA%E5%AD%90%E6%B4%BB%E5%8B%95?__eep__=6&amp;__cft__[0]=AZWTsnhMf3iIhqWdTeuR1nJ0tD6OOVYLG0MfEnVGLdLD-NMo8LuZckox-UfBLj56FqdmHNuO5lAvUZGg2aYuS4PjFX6d6duOEue-bTYaVNjJxC6L_v5KJ8mgS1Gy7OFfGjgsskgGEoXvBeGcuPMqxQ_Jpk73WfDZRKG9Mx4eNA4s1o6C40NuOC_W1WVBjeQ-FZEg4G2Hifmc6xszuA9vTP6p&amp;__tn__=*NK-R\">#兩天一夜戶外旅宿親子活動</a></p>\r\n', '2022-10-28 10:31:25', '37101130_210冬令營.png', '1', '0', '0', '1', '1', '1', '管理者');

-- --------------------------------------------------------

--
-- 資料表結構 `pagebg`
--

CREATE TABLE `pagebg` (
  `id` int(11) NOT NULL,
  `imgsrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isshow` int(5) NOT NULL,
  `lastdate` datetime NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `pagebg`
--

INSERT INTO `pagebg` (`id`, `imgsrc`, `pagename`, `isshow`, `lastdate`, `user`) VALUES
(1, '123', 'News', 0, '2022-10-21 09:18:54', 'admin'),
(2, 'course', 'Courses', 0, '2022-10-21 09:19:10', 'admin'),
(3, '6632090002.jpg', 'Cooperation', 1, '2022-10-21 17:21:48', 'admin'),
(4, '140893about.jpg', 'About US', 1, '2022-10-21 17:21:56', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastdate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`id`, `user`, `lastdate`, `type_name`, `action`) VALUES
(1, 'jenny', '2022-09-03 18:53:48', '最新消息', '編輯'),
(2, 'jenny', '2022-09-03 18:54:27', '最新消息', '編輯'),
(3, 'admin', '2022-09-08 02:33:28', '首頁輪播圖', '新增'),
(4, 'admin', '2022-09-12 10:32:33', '最新消息', '刪除'),
(5, 'admin', '2022-09-12 10:40:40', '最新消息', '編輯'),
(6, 'admin', '2022-10-20 15:15:28', '課程', '新增'),
(7, 'admin', '2022-10-20 15:15:54', '課程', '刪除'),
(8, 'admin', '2022-10-20 15:16:48', '最新消息焦點', '編輯'),
(9, 'admin', '2022-10-20 15:16:51', '最新消息焦點', '編輯'),
(10, 'admin', '2022-10-21 17:27:15', '課程', '編輯'),
(11, 'admin', '2022-10-21 17:31:41', '課程', '新增'),
(12, 'admin', '2022-10-21 17:31:49', '課程', '刪除'),
(13, 'admin', '2022-10-26 09:48:13', '課程', '新增'),
(14, 'admin', '2022-10-26 10:13:34', '課程焦點', '編輯'),
(15, 'admin', '2022-10-26 10:13:40', '課程焦點', '編輯'),
(16, 'admin', '2022-10-26 10:14:54', '課程', '編輯'),
(17, 'admin', '2022-10-26 10:15:06', '課程焦點', '編輯'),
(18, 'admin', '2022-10-26 14:11:27', '課程', '編輯'),
(19, 'admin', '2022-10-26 14:15:41', '課程', '新增'),
(20, 'admin', '2022-10-26 14:16:50', '使用者資料', '編輯'),
(21, 'admin', '2022-10-26 14:17:23', '使用者資料', '編輯'),
(22, 'admin', '2022-10-26 14:26:24', '課程', '新增'),
(23, 'admin', '2022-10-26 14:36:10', '課程焦點', '編輯'),
(24, 'admin', '2022-10-26 14:43:29', '課程', '新增'),
(25, 'admin', '2022-10-26 14:44:15', '課程', '編輯'),
(26, 'admin', '2022-10-26 14:49:15', '課程', '新增'),
(27, 'admin', '2022-10-26 14:49:46', '課程', '編輯'),
(28, 'admin', '2022-10-26 15:00:22', '課程', '編輯'),
(29, 'admin', '2022-10-26 15:01:08', '課程', '編輯'),
(30, 'admin', '2022-10-26 15:01:28', '課程', '編輯'),
(31, 'admin', '2022-10-26 15:01:46', '課程', '編輯'),
(32, 'admin', '2022-10-26 15:01:54', '課程', '編輯'),
(33, 'admin', '2022-10-26 15:02:04', '課程', '編輯'),
(34, 'admin', '2022-10-26 15:02:16', '課程', '編輯'),
(35, 'admin', '2022-10-26 15:02:25', '課程', '編輯'),
(36, 'admin', '2022-10-26 15:02:33', '課程', '編輯'),
(37, 'admin', '2022-10-26 15:06:22', '課程', '編輯'),
(38, 'admin', '2022-10-26 15:07:49', '課程', '編輯'),
(39, 'admin', '2022-10-26 15:08:12', '課程', '編輯'),
(40, 'admin', '2022-10-26 15:09:14', '最新消息', '新增'),
(41, 'admin', '2022-10-26 15:10:39', '最新消息', '編輯'),
(42, 'admin', '2022-10-26 15:11:01', '課程', '編輯'),
(43, 'admin', '2022-10-26 15:12:07', '最新消息', '編輯'),
(44, 'admin', '2022-10-26 15:13:03', '最新消息', '編輯'),
(45, 'admin', '2022-10-26 15:47:57', '最新消息', '新增'),
(46, 'admin', '2022-10-26 15:49:13', '最新消息', '編輯'),
(47, 'admin', '2022-10-26 15:52:31', '課程', '新增'),
(48, 'admin', '2022-10-28 10:31:17', '最新消息', '編輯'),
(49, 'admin', '2022-10-28 10:31:25', '最新消息', '編輯'),
(50, 'admin', '2022-10-28 10:31:53', '課程', '編輯'),
(51, 'admin', '2022-10-31 04:03:02', '課程', '編輯'),
(52, 'admin', '2022-10-31 04:05:33', '課程', '編輯'),
(53, 'admin', '2022-10-31 12:33:06', '課程', '編輯'),
(54, 'admin', '2022-10-31 12:33:53', '課程', '編輯'),
(55, 'admin', '2022-10-31 12:34:01', '課程', '編輯'),
(56, 'admin', '2022-10-31 12:34:33', '課程', '編輯'),
(57, 'admin', '2022-10-31 12:34:46', '課程', '編輯'),
(58, 'admin', '2022-10-31 12:34:52', '課程', '編輯'),
(59, 'admin', '2022-10-31 17:20:24', '課程', '編輯'),
(60, 'admin', '2022-10-31 17:20:37', '課程', '編輯'),
(61, 'admin', '2022-10-31 17:20:46', '課程', '編輯'),
(62, 'admin', '2022-10-31 17:20:52', '課程', '編輯'),
(63, 'admin', '2022-10-31 17:22:19', '課程', '編輯'),
(64, 'admin', '2022-11-01 12:47:18', '課程', '編輯'),
(65, 'admin', '2022-11-01 12:47:19', '課程', '編輯'),
(66, 'admin', '2022-11-01 12:47:33', '課程', '編輯'),
(67, 'admin', '2022-11-01 12:47:44', '課程', '編輯'),
(68, 'admin', '2022-11-01 12:47:54', '課程', '編輯'),
(69, 'admin', '2022-11-01 12:49:17', '課程', '編輯'),
(70, 'admin', '2022-11-01 12:49:26', '課程', '編輯'),
(71, 'admin', '2022-11-01 12:49:36', '課程', '編輯');

-- --------------------------------------------------------

--
-- 資料表結構 `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastdate` datetime NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `service`
--

INSERT INTO `service` (`id`, `title`, `content`, `icon`, `color`, `lastdate`, `user`) VALUES
(1, ' 安全第一', '位於新竹科學園區出入口處，新竹市中心，位在繁華的市中心，上課期間皆有警衛看管。', 'fa-solid fa-user-shield', '#1f97d4', '2022-10-21 17:23:37', 'admin'),
(2, '常態課程', '我們冰芬文教提供了英文、數學、自然等課程，幫助孩子奠定好基礎，並在未來升學方面更加順利。', 'fa-solid fa-user-tie', '#1f97d4', '2022-10-21 17:23:50', 'admin'),
(3, '特色課程', '透過多元跨領域教學,及加強互動性與參與感,創造沈浸式教學環境,提升孩子對於學習的興趣!', 'fa-solid fa-shuttle-space', '#fbce0f', '2022-10-21 17:24:11', 'admin'),
(4, '師培課程', '與TESOL合作，致力於培養專業的教師，以教學、教室訓練、管理課程為宗旨，針對實體課程進行實務受訓。', 'fa-solid fa-chalkboard-user', '#fbce0f', '2022-10-21 17:24:32', 'admin'),
(5, '認證教師', '所有的教師皆有合格的教師證照及其他專業證照，讓所有孩子能在專業中學習知識。', 'fa-solid fa-stamp', '#12d9df', '2022-10-21 17:24:52', 'admin'),
(6, '完善的設備', '具有完善的教材、教師、以及科學設備，並提供舒適乾淨的環境提供孩子及老師上課。', 'fa-solid fa-ethernet', '#12d9df', '2022-10-21 17:25:09', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` int(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` int(100) NOT NULL,
  `age` int(100) NOT NULL,
  `course` int(255) NOT NULL,
  `send_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `signup`
--

INSERT INTO `signup` (`id`, `name`, `phone`, `email`, `age`, `course`, `send_time`) VALUES
(1, 0, 912345678, 0, 1997, 0, '2022-11-01 14:18:53'),
(2, 0, 912345678, 0, 1997, 0, '2022-11-01 14:19:55'),
(3, 0, 912345678, 0, 1997, 0, '2022-11-01 14:20:39');

-- --------------------------------------------------------

--
-- 資料表結構 `store_img`
--

CREATE TABLE `store_img` (
  `id` int(11) NOT NULL,
  `imgsrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `store_img`
--

INSERT INTO `store_img` (`id`, `imgsrc`, `user`, `lastdate`) VALUES
(1, '1757093Kingston-LOGO.png', '帥哥', '2022-08-24 05:27:13'),
(2, '4474464Pouchen.png', '帥哥', '2022-08-24 05:27:13'),
(3, '8619508unizyx_logo.png', '帥哥', '2022-08-24 05:27:13'),
(4, '3981776工研院.png', '帥哥', '2022-08-24 05:27:13'),
(5, '5288527工研院院友會.png', '帥哥', '2022-08-24 05:27:13'),
(6, '3534684立錡科技股份有限公司.png', '帥哥', '2022-08-24 05:27:13'),
(7, '9283133合勤科技.png', '帥哥', '2022-08-24 05:27:13'),
(8, '4086080南茂科技股份有限公司.png', '帥哥', '2022-08-24 05:27:13'),
(9, '4602395虹光精密工業股份有限公司.png', '帥哥', '2022-08-24 05:27:13'),
(10, '4210215智邦科技股份有限公司.png', '帥哥', '2022-08-24 05:27:13'),
(11, '2002914智勤科技.png', '帥哥', '2022-08-24 05:27:13'),
(12, '8082197新竹市手工藝製品業職業工會.png', '帥哥', '2022-08-24 05:27:13'),
(13, '3143266新竹市褓姆業職業工會.png', '帥哥', '2022-08-24 05:27:13'),
(14, '4442盟創科技.png', '帥哥', '2022-08-24 05:27:13'),
(15, '4054781達發科技股份有限公司.png', '帥哥', '2022-08-24 05:27:13'),
(16, '8755263福委公司.png', '帥哥', '2022-08-24 05:27:13'),
(17, '3549617聯發科技股份有限公司.png', '帥哥', '2022-08-24 05:27:13'),
(18, '7718477聯華電子股份有限公司.png', '帥哥', '2022-08-24 05:27:13');

-- --------------------------------------------------------

--
-- 資料表結構 `store_text`
--

CREATE TABLE `store_text` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `store_text`
--

INSERT INTO `store_text` (`id`, `name`, `user`, `lastdate`) VALUES
(1, '台灣美光記憶體股份有限公司(授權福委股份有限公司開發管理)', '帥哥', '2022-08-24 05:20:27'),
(2, '新竹市褓姆業職業工會', '帥哥', '2022-08-24 05:42:17'),
(3, '新竹市手工藝製品職業工會', '帥哥', '2022-08-24 05:42:17'),
(4, '聯華電子股份有限公司', '帥哥', '2022-08-24 05:42:17'),
(5, '聯發科技股份有限公司 ', '帥哥', '2022-08-24 05:42:17'),
(6, '聯發科技股份有限公司職工福利委員會', '帥哥', '2022-08-24 05:42:17'),
(7, '立錡科技股份有限公司', '帥哥', '2022-08-24 05:42:17'),
(8, '立錡科技股份有限公司職工福利委員會', '帥哥', '2022-08-24 05:42:17'),
(9, '達發科技股份有限公司', '帥哥', '2022-08-24 05:42:17'),
(10, '達發科技股份有限公司職工福利委員會', '帥哥', '2022-08-24 05:42:17'),
(11, '香港商創發科技通訊股份有限公司台灣分公司職工福利委員會', '帥哥', '2022-08-24 05:42:17'),
(12, '智邦科技股份有限公司', '帥哥', '2022-08-24 05:42:17'),
(13, '南茂科技股份有限公司', '帥哥', '2022-08-24 05:42:17'),
(14, '虹光精密工業股份有限公司', '帥哥', '2022-08-24 05:42:17'),
(15, '福委股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(16, '合勤科技股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(17, '盟創科技股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(18, '合勤投資控股股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(19, '智勤科技股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(20, '勤紘科技股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(21, '兆勤科技股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(22, '黑貓資訊股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(23, '宇曜智能股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(24, '勤創資通股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(25, '遠東金士頓科技股份有限公司', '帥哥', '2022-08-24 05:43:16'),
(26, '財團法人工業技術研究院', '帥哥', '2022-08-24 05:43:16');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastdate` varchar(255) NOT NULL,
  `level` int(10) NOT NULL DEFAULT 1,
  `imgsrc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `lastdate`, `level`, `imgsrc`) VALUES
(1, 'admin', 'admin', '管理者', '2022-11-01 12:46:33', 10, '204883LOGO.png'),
(2, 'jenny', 'jenny', 'jenny', '2022-10-10 10:12:33', 9, 'jenny.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `web_contact`
--

CREATE TABLE `web_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastdate` datetime NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `web_contact`
--

INSERT INTO `web_contact` (`id`, `name`, `phone`, `email`, `address`, `line`, `fb`, `ig`, `lastdate`, `user`) VALUES
(1, '冰芬美語文理補習班', '03-567-0018', 'service@ice-finland.pro', '300新竹市東區光復路一段271號3樓(原聯合補習班址、台新銀行樓上)', 'https://lin.ee/7TPK9Fd', 'https://www.facebook.com/icefinland/', 'https://www.instagram.com/colorful.institute/', '2022-10-20 07:23:16', 'admin'),
(2, '冰芬美語文理補習班', '03-567-0018', 'service@ice-finland.pro', '300新竹市東區光復路一段271號3樓(原聯合補習班址、台新銀行樓上)', 'https://lin.ee/7TPK9Fd', 'https://www.facebook.com/icefinland/', 'https://www.instagram.com/colorful.institute/', '2022-10-20 15:27:10', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `web_information`
--

CREATE TABLE `web_information` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastdate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `web_information`
--

INSERT INTO `web_information` (`id`, `logo`, `seo`, `web_name`, `intro`, `lastdate`, `user`) VALUES
(1, '15622logo.png', '', '冰芬文教｜新竹市補習班', '新竹市冰芬美語文理短期補習班。位於新竹市東區的補習班，希望透過多元跨領域教學,及加強互動性與參與感,創造沈浸式教學環境,提升孩子對於學習的興趣!', '2022-10-10 06:37:24', 'admin');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `cooperate_img`
--
ALTER TABLE `cooperate_img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `pagebg`
--
ALTER TABLE `pagebg`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `store_img`
--
ALTER TABLE `store_img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `store_text`
--
ALTER TABLE `store_text`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `web_contact`
--
ALTER TABLE `web_contact`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `web_information`
--
ALTER TABLE `web_information`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cooperate_img`
--
ALTER TABLE `cooperate_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `letter`
--
ALTER TABLE `letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pagebg`
--
ALTER TABLE `pagebg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `store_img`
--
ALTER TABLE `store_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `store_text`
--
ALTER TABLE `store_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `web_contact`
--
ALTER TABLE `web_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `web_information`
--
ALTER TABLE `web_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
