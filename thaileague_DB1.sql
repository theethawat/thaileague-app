-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 07:21 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thaileague`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubinfo`
--

CREATE TABLE `clubinfo` (
  `id` int(6) UNSIGNED NOT NULL,
  `englishname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thainame` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shortname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `homestadium` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `homestadiumphoto` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `websitename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebookname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `point` int(6) NOT NULL,
  `goalpoint` int(6) NOT NULL,
  `headcoach` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `history` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubinfo`
--

INSERT INTO `clubinfo` (`id`, `englishname`, `thainame`, `shortname`, `logo`, `homestadium`, `homestadiumphoto`, `website`, `facebook`, `websitename`, `facebookname`, `point`, `goalpoint`, `headcoach`, `history`, `created_at`, `updated_at`) VALUES
(2, 'Airforce Central FC', 'แอร์ฟอร์ซ เซ็นทรัล เอฟซี', 'afcfc', '/storage/teamlogo/T0nrjsVtkZRO4YkvZLMQCCYrtDKCa9jN5dt8jJeT.png', 'สนามกีฬาธูปะเตมีย์', '/storage/homestadium/leDsoYdgkgCGwFG09Zy5cj0BVr3azqqSEr9u7wxL.jpeg', 'https://www.facebook.com/AirForceUnitedFC2489/', 'https://www.facebook.com/AirForceUnitedFC2489/', 'No Site', 'Air Force United FC', 9, -31, 'เจสัน บราวน์', 'สโมสรแอร์ฟรอส เซ็นทรัล เอฟซี หรือ สโมสรทหารอากาศเก่า กลับเข้ามาเล่นในลีกสูงสุดของเมืองไทยอีกครั้ง จากการคว้ารองแชมป์ ไทยลีก 2 M-150 Championship ในปีที่แล้ว', '2018-07-26 08:20:34', '2018-07-28 05:49:55'),
(3, 'BGFC (Bangkok Glass FC)', 'บีจีเอฟซี (บางกอกกล๊าส เอฟซี)', 'bgfc', '/storage/teamlogo/UFcPNp56iyueozJKXKkkASK9WxpwP5qalaZ55Hfx.png', 'ลีโอ สเตเดี้ยม', '/storage/homestadium/R8c6MqAddsGD1QVLRCsI4VPPfZwcWWQoPd5EbhYA.jpeg', 'http://www.bangkokglassfc.com', 'https://www.facebook.com/BangkokGlassFC/', 'bangkokglassfc.com', 'Bangkok Glass FC - สโมสรฟุตบอลบางกอกกล๊าส', 27, 2, 'อนุรักษ์ ศรีเกิด', 'เดอะแรบบิทส์ บีจีเอฟซี มาในโทนสีฟ้า กับ สนามเก่าแต่หญ้าใหม่ เพรียบพร้อมด้วยนักเตะคุณภาพสูงทั้งไทย และต่างประเทศ แต่ผลงานปีนี้ไม่ดีนัก พวกเขา จะสามารถเอาตัวรอดในไทยลีกที่มีทีมที่ต้องตกชั้น 5 ทีมได้หรือไม่', '2018-07-26 08:54:48', '2018-07-28 05:49:55'),
(4, 'Buriram United', 'บุรีรัมย์ ยูไนเต็ด', 'brutd', '/storage/teamlogo/o1Bdmb9Aem5YE2amJGgkbW47N9aUdcwXt3oOD0G3.png', 'ช้าง อารีนา', '/storage/homestadium/Z4wtsxYPcAqLZJZCopBTOVTCUF8TGWAv01TvWqNG.jpeg', 'https://www.buriramunited.com/home', 'https://www.facebook.com/BuriramUnitedFC/', 'buriramunited.com', 'BURIRAM UNITED', 59, 33, 'Bozidar Bandovic', 'ปราสาทสายฟ้า บุรีรัมย์ ยูไนเต็ด แชมป์ไทยลีกในปีที่ผ่านมา และเจ้าของแชมป์ 5 สมัยไทยลีก ในปีนี้ฟอร์มของเขายังคงสุดยอดเหมือนเดิม มาดูซิว่าพวกเขาจะคว้าแชมป์ปีนี้ไปครองได้หรือไม่', '2018-07-26 09:11:30', '2018-07-28 05:49:55'),
(5, 'Chainat Hornbill', 'ชัยนาท ฮอร์นบิล', 'cnhb', '/storage/teamlogo/qYgp2epCeLUUR9fLj8QkhztpL9wSEi48hrquhdAV.png', 'เขาพลอง สเตเดี้ยม', '/storage/homestadium/wYZTVnZeAEpXVuxP9uRp3PyPnii3lMRk1HUiBaZg.jpeg', 'https://www.facebook.com/chainatfootballclub/', 'https://www.facebook.com/chainatfootballclub/', 'No Site', 'CHAINAT Football Club', 31, -4, 'เดนนิส อามาโต', 'นกใหญ่พิฆาต ชัยนาท ฮอร์นบิล หลังจากที่ฤดูการที่แล้วสามารถคว้าแชมป์ Thaileague 2 M150 Championship มาได้ เข้าสู่ปีนี้ถือว่าทำผลงานได้ดีทีเดียว เรามาดูกันว่านักสู้ภูธรทีมนี้จะจบอันดับที่เท่าไหร่ของไทยลีก', '2018-07-27 04:20:24', '2018-07-28 05:49:55'),
(6, 'Chonburi FC', 'ชลบุรี เอฟซี', 'chon', '/storage/teamlogo/xSY6pSAYjgoYuZVlFBj0WTwINmV2WdUDG7imcbmE.png', 'ชลบุรี สเตเดี้ยม', '/storage/homestadium/uLL7LwweMiYoNWhGnX7ZNkP2ZN9YCsaac801kZdB.jpeg', 'http://www.chonburifootballclub.com', 'https://www.facebook.com/chonburi.football.club/', 'chonburifootballclub.com', 'Chonburi Football Club', 34, -1, 'จักรพันธ์ ปั่นปี', 'ฉลามชล ชลบุรี เอฟซี หนึ่งสโมสรผู้สร้างลีกสูงสุดของไทยให้เป็นที่รู้จักกันถึงทุกวันนี้ ถือเป็นทีมที่มีฐานแฟนคลับหนาแน่นทีมหนึ่งในไทยลีก มาดูกันว่าชลบุรี เอฟซีในปีนี้จะโชว์ศักดิ์ศรีของลูกน้ำเค็มได้หรือไม่', '2018-07-27 04:30:13', '2018-07-28 05:49:55'),
(8, 'Nakhonratchasima Mazda FC', 'นครราชสีมา มาสด้า เอฟซี', 'nrmfc', '/storage/teamlogo/kPfjcu6siSpCKqMKMexOE80IOiw2lyS4qFihUHWg.png', 'สนามกีฬาเฉลิมพระเกียรติ 80 พรรษา 5 ธันวาคม 2550', '/storage/homestadium/RmPWnYzcN5Y4XpBAzJwTQgQBbb7jlAlCzwol41DL.jpeg', 'https://www.facebook.com/swatcatofficial', 'https://www.facebook.com/swatcatofficial', 'No Site', 'Nakhonratchasima FC', 35, -2, 'มิลอส โจซิค', 'สวาทแคทโฉมใหม่ กับเจ้าแมวพิฆาตที่พร้อมจะท้าชนทุกทีมในไทยลีก นครรารสีมาสามารถทำสถิติในบ้านได้อย่างดีมากๆ และมีแฟนบอลที่หนาแน่นอีกด้วย มาดูกันว่าปีนี้ทีมจากเมืองย่าโม จะสามารถเข้าสู่ท็อปเท็นของไทยลีกได้หรือไม่', '2018-07-27 10:07:04', '2018-07-28 05:49:55'),
(9, 'Navy FC', 'สโมสรฟุตบอลราชนาวี', 'navy fc', '/storage/teamlogo/MxB8iFb72NklXGYf2XVRMgJ8alsVJQRbpcoyJA8w.png', 'สนามกีฬาราชนาวี กม.5 สัตหีบ', '/storage/homestadium/rD2IWFCKHFcZWKNzfdAF7r4bTAJwNDMooFRULV3u.jpeg', 'http://www.navyfootballclub.com/', 'https://www.facebook.com/navyfootballclub/', 'Navyfootballclub.com', 'NAVY FC', 21, -32, 'ลูโบเมียร์ ริสตอฟสกี', 'ตะหานน้ำ ราชนาวีสโมสร หนึ่งในสโมสรเก่าแก่ที่อยู่คู่กับลีกฟุตบอลของประเทศไทยมาอย่างยาวนาน กลับต้องมาเจอปัญหาการตกชั้น 5 ทีมในปีนี้ พวกเขาจะสามารถอยู่ในลีกสูงสุดของประเทศไทยต่อไปได้หรือไม่', '2018-07-28 12:23:24', '2018-07-28 12:23:24'),
(10, 'Pattaya United', 'พัทยา ยูไนเต็ด', 'putd', '/storage/teamlogo/8Yzc1uvNZ59dGpNbmpGJo5ayy3s7H5gTQfwFqHTH.png', 'ดอลฟิน สเตเดี้ยม', '/storage/homestadium/YIIcycmdDmmmvdymKjBuLNzU8wRr2bRq1Zlo68Ma.jpeg', 'http://www.pattayaunited.com/', 'https://www.facebook.com/pattayautdfc/', 'pattayaunited.com', 'Pattaya United', 34, -6, 'สุรพงษ์ คงเทพ', 'โลมาสีน้ำเงิน สโมสรในเมืองท่องเที่ยวระดับโลกอย่างพัทยา ที่ทำผลงานได้ทีเดียวในฤดูกาลที่ผ่านมา และในฤดูกาลนี้ก็ยังอยู่ในครึ่งบนของตาราง มาดูกันสิวะ หลังจากจบฤดูการพวกเขาจะจบอันดับเลขตัวเดียวได้หรือไม่', '2018-07-28 12:32:09', '2018-07-28 12:32:09'),
(11, 'Police Tero FC', 'โปลิสเทโร เอฟซี', 'POLFC', '/storage/teamlogo/suwz0QDgzjxCrL3XTF3rKMTZpDkInqZG0ekzlZEu.png', 'สนามบุณยะจินดา', '/storage/homestadium/PpM54zwg1njgwMYKyfX275Dfyylyj7YKqE3oR25c.jpeg', 'http://www.policetero.com/', 'https://www.facebook.com/policeterofc/', 'policetero.com', 'Police Tero FC', 27, -3, 'ธชตวัน ศรีปาน', 'โปลิส เทโร หนึ่งทีมที่ประวัติศาสตร์ยาวนาน และเทโรยังคงเป็นทีมเดียวที่สามารถอยู่ในลีกสูงสุดของประเทศไทยมาได้ทุกครั้งที่ผ่านมา รวมถึงเคยได้รองแชมป์ฟุตบอลถ้วยใหญ่ของเอเชียด้วย จนมาถึงปีนี้ในฐานะมังกรโล่เงิน โปลิส เทโร อาจจะเป็นจุดเสี่ยง เพราะทีมของพวกเขาตกมาอยู่ในโซนอันตรายอีกครั้ง ด้วยโค้ชมากฝีมือ ซุปเปอร์สตาร์ระดับอาเซียนอย่างอ่อง ตู และ แฟนคลับชาวเมียนมาร์ จะพาทีมอยู่รอดในไทยลีก 1 ได้หรือไม่', '2018-07-28 13:48:06', '2018-07-28 13:48:06'),
(12, 'Port FC', 'การท่าเรือเอฟซี', 'tpfc', '/storage/teamlogo/uCTpSuJdA4I2hEVnx35CX9v0IoJhEiAK72ifrRwn.png', 'แพท สเตเดี้ยม', '/storage/homestadium/iDD437G9otWMNOaNPkFTfLy8dXoQC0Tt1FhMhx50.jpeg', 'http://http://portfootballclub.com//', 'https://www.facebook.com/portfootballclubofficial/', 'Portfootballclub.com/', 'การท่าเรือ FC Port FC', 47, 17, 'จเด็จ มีลาภ', 'สิงห์เจ้าท่า เราคือตำนาน คือคำพูดที่เรามักจะได้ยินจากแฟนบอลของทีมย่านคลองเตย ที่คล่ำบอร์ดอยู่ในฟุตบอลไทยมาตั้งแต่ก่อนการจัดตั้งไทยลีก ถึงแม้บางช่วงจะตกชั้นไปบ้าง แต่ตอนนี้พวกเขากลับมาแล้ว และอยู่ในอันดับที่มีลุ้นคว้าตั๋วไปเล่นศึกถ้วยใหญ่ของเอเชียอีกด้วย', '2018-07-28 13:54:11', '2018-07-28 13:54:11'),
(13, 'PT Prachuap FC', 'พีที ประจวบ เอฟซี', 'pt prchfc', '/storage/teamlogo/8CZYXXON6aLRXFygOEv3CCBPJFhYyQCevMerR2dN.png', 'สามอ่าว สเตเดี้ยม', '/storage/homestadium/Lv0QQvOXxM00OxNObcuF9ODuGgLZKELvctMl4eZC.jpeg', 'https://www.facebook.com/PrachuapFc2011/', 'https://www.facebook.com/PrachuapFc2011/', 'No Site', 'PT Prachuap FC', 41, 11, 'ธวัชชัย ดำรงค์อ่องตระกูล', 'ต่อพิฆาต พีที ประจวบ เอฟซี น้องใหม่ไฟแรงจาก Thail League 2 M150 Championship ในปีที่แล้ว ทำผลงานได้อย่างไม่เกรงใจรุ่นพี่รุ่นไหน จนขึ้นไปอยู่หัวตาราง และยังเป็นทีมที่ยังไม่มีการเปลี่ยนผู้จัดการทีมอีกด้วย หรือว่าปีนี้ทีมจากเมืองสามอ่าวจะพาตัวเองเข้าสู่ลีกระดับเอเชียได้', '2018-07-28 14:04:29', '2018-07-28 14:04:29'),
(14, 'Ratchaburi Mitr Phol FC', 'ราชบุรี มิตรผล เอฟซี', 'rbmfc', '/storage/teamlogo/j7r326ls0eyOAhG0oBsxWqlQL0qTQxyny3l4rPeH.png', 'มิตรผล สเตเดี้ยม', '/storage/homestadium/hRB3XbixgDAVdIqqMzLvzd82IJ002yQMl6Lt9SSC.jpeg', 'https://www.facebook.com/RBMFCOFFICIAL/', 'https://www.facebook.com/RBMFCOFFICIAL/', 'No Site', 'Ratchaburi Mitr Phol FC', 32, -2, 'สุประมิตร บุญมีมาก', 'ราชบุรี มิตรผล เอฟซี กับเราเหย้าใหม่ มาตรฐานระดับเอเชียสามารถทำแต้มได้อยู่ครึ่งบนของตารางมาตลอดในหลายปีที่ผ่านมา ปีนี้อาจจะมีการใช้โค้ชหลายคน และ อันดับยังอยู่กลางตาราง แต่อย่างไรก็ดีด้วยฝีเท้าของนักเตะราชบุรี ไม่แน่ปีนี้เขาอาจจะคว้าถ้วยติดมือกลับไปฝากชาวเมืองโอ่งก็เป็นได้', '2018-07-28 15:07:13', '2018-07-28 15:07:13'),
(15, 'SCG Muangthong United', 'เอสซีจี เมืองทอง ยูไนเต็ด', 'mtutd', '/storage/teamlogo/5Y65rPW5Q00QENN1jKrq9icoArvWOcREdJOvQJXA.png', 'เอสซีจี สเตเดียม', '/storage/homestadium/jh66EekACZyz8bbTRZ6qY0MjZIoWujAaNubPsJDM.jpeg', 'http://www.mtutd.tv/', 'https://www.facebook.com/SCGMuangthongUnited/', 'mtutd.tv', 'Muangthong United FC.', 41, 7, 'Radovan Curcic', 'สุดยอดทีมไทยลีก อย่าง เอสซีจี เมืองทอง ยูไนเต็ด เจ้าของแชมป์ไทยลีก 4 สมัย และแชมป์รายการอื่นๆ นับไม่ถ้วย ทีมที่สร้างสตาร์ให้กับทีมชาติไทยนับคนไม่ถ้วน และส่งออกนักเตะฝีเท้าดีของไทยไปยังต่างประเทศอีกด้วย แต่ด้วยนักเตะระดับพระกาลที่ยังเหลืออยู่ และโค้ชระดับโลก ถึงแม้ยังไม่อยู่ในอันดับลุ่นแชมป์ หรือ ลุ้นโควต้าเอเชีย ในตอนนี้ผลงานยังดีขึ้นเรื่อยๆ และพร้อมเอนเตอร์เทนแฟนบอลให้ทุกเกมคือเกมระดับพรีเมี่ยมอย่างแน่นอน', '2018-07-28 15:16:26', '2018-07-28 15:25:21'),
(16, 'Singha Chiangrai United', 'สิงห์ เชียงราย ยูไนเต็ด', 'crutd', '/storage/teamlogo/qnerXkckSqWCVcG9iruvc2Jx6P34HZZFcvifwAHB.png', 'สิงห์ สเตเดี้ยม', '/storage/homestadium/IMnJIa43XmZQdRuuLWFPtgAhDgeqiLAPOPnlgkNO.jpeg', 'http://singhachiangraiunited.com/', 'https://www.facebook.com/CRUTD/', 'singhachiangraiunited.com', 'Chiang Rai United FC', 40, 11, 'อะเล็กซานเดร กามา', 'มาถึงนาทีนี้คงไม่มีใครไม่รู้จัก ยอดทีมแห่งเมืองเหนือ สิงห์ เชียงราย ยูไนเต็ด เจ้าบุญทุ่มเงินหนาอีกหนึ่งทีมของไทยลีก แชมป์เก่าฟุตบอลช้าง เอฟเอคัพ 2017 ด้วยนักเตะยอดฝีมือ และโค้ชมากประสบการณ์ ปีนี้เชียงรายยังอยู่ในเส้นทางการลุ้นถ้วยทั้งสองใบของเมืองไทย พวกเขาจะสามารถคว้ามันมาได้ และสามารถนำทีมเข้าสู่ AFC Champion League อีกครั้งได้หรือไม่', '2018-07-28 15:28:40', '2018-07-28 15:28:40'),
(17, 'Sukhothai FC', 'สุโขทัย เอฟซี', 'sktfc', '/storage/teamlogo/TyoqwB9yWAB9hGj7V9Wv2mleinWjts1jHcWwA6SW.png', 'ทะเลหลวง สเตเดี้ยม', '/storage/homestadium/JLCJmgr2jzAledkc6RqCXKa8dsVFUGa4gqohMhCW.jpeg', 'http://sukhothaifootballclub.com/home/', 'https://www.facebook.com/STFC2009/', 'sukhaothaifootballclub.com', 'Sukhothai FC', 27, -10, 'เฉลิมวุฒิ สง่าพล', 'ค้างคาวไฟ สุโขทัย เอฟซี อีกหนึ่งสโมสรที่ฐานแฟนคลับแน่น ไม่ว่าจะนัดไหนก็ตามมาให้กำลังใจทีมที่เขารักเกือบเต็มสนามตลอด ถึงแม้ปีนี้จะเป็นอีกปีที่สุโขทัยอยู่ในโซนอันตรายอีกครั้ง แต่ด้วยความสามารถของโค้ช และ คีย์ เพลเยอร์ตัวฉกาจของทีม จะพาสุโขทัยอยู่รอดในลีกสูงสุดของเมืองไทย ได้หรือไม่', '2018-07-29 06:39:22', '2018-07-29 06:39:22'),
(18, 'Suphanburi FC', 'สุพรรณบุรี เอฟซี', 'spfc', '/storage/teamlogo/Ge6MLOC6vUiw2fSm7j3CQN3Wuo1LhrD5JuIukbmO.png', 'สนามกีฬากลางจังหวัดสุพรรณบุรี', '/storage/homestadium/jFvgVU6mCaKxmvsBY75zegwBzeG1MZPs8Um3f5Nw.jpeg', 'http://www.suphanburifootballclub.com/', 'https://www.facebook.com/SuphanburiFc/?rf=111924008825380', 'suphanburifootballclub.com', 'Suphanburi FC', 29, 3, 'ไพโรจน์ บวรรัตนดิลก', 'ช้างศึกยุทธหัตถี หนึ่งทีมไทยลีกที่เคยสามารถต่อกรกับทีมดังๆ ต่างๆ ได้มากมาย และไลน์อัพในมือของสุพรรณบุรีนี่ถือว่าไม่ธรรมดาจริงๆ ปีนี้กับสถานการณ์ตกชั้น 5 ทีม สุพรรณบุรียังอาจจะไม่พ้นจุดเสี่ยงภัย แต่ด้วยเสียงเชียร์ และกำลังใจ จะส่งให้สุพรรณบุรียังคงฟาดแข้งอยู่ในไทยลีก 1 ได้หรือไม่', '2018-07-29 06:48:46', '2018-07-29 06:48:46'),
(19, 'True Bangkok United', 'ทรู แบงค็อก ยูไนเต็ด', 'bufc', '/storage/teamlogo/zElGa8fC6tSB37yE41QOYxAwWlSiDocgbUChS0Wk.png', 'ทรู สเตเดี้ยม (เมนสเตเดี้ยม มหาวิทยาลัยธรรมศาสตร์ ศูนย์รังสิต)', '/storage/homestadium/T27zdt1haR3iVkzUsthW5LcjXrfGhZlK5fEmiMCa.jpeg', 'http://www.truebangkokunitedfc.com/', 'https://www.facebook.com/truebangkokunited/', 'truebangkokunitedfc.com', 'True Bangkok United', 50, 20, 'Mano Alexandre Polking', 'แข้งเทพ ทรู แบงค็อก ยูไนเต็ด หนึ่งในยอดทีมไทยลีก และเงินหนาอีกหนึ่งทีม ด้วยการเล่นเกมรุกอย่างดุดัน จึงทำให้ทีมนี้เป็นอีกทีมที่สามารถมัดใจแฟนบอลของตัวเองไว้ได้ ด้วยไลน์อัพอย่างเด็จ โค้ชที่เชี่ยวชาญในไทยลีกมานาน ปีนี้แบงค็อกก็คงปฏิเสธไม่ได้ว่าคืออีกทีมที่จะพร้อมแย่งแชมป์ และแย่งโควต้า AFC Champion League อย่างแน่นอน', '2018-07-29 06:56:53', '2018-07-29 07:32:40'),
(20, 'Ubon UMT United', 'อุบล ยูเอ็มที ยูไนเต็ด', 'ubumt', '/storage/teamlogo/inxOk2D8HfjuADPgnq1tGLfuW9DXiAZCkAHXwuA7.png', 'อุบล ยูเอ็มที สเตเดี้ยม', '/storage/homestadium/9b2Jg65MtQYmVeCYgWECAJVsraKYKQWLI8Lz5rGP.jpeg', 'http://www.ubonumtunited.com/', 'https://www.facebook.com/pg/ubonumtutd/', 'ubonumtunited.com', 'UBON UMT UNITED', 18, -13, 'Kambe Sugao', 'อุบล ยูเอ็มที ยูไนเต็ด พญาอินทรีที่ก้าวขึ้นมาจากลีกภูมิภาคในวันนั้น สู่ลีกสูงสุดในวันนี้ ได้สร้างผลงานเป็นที่น่าประทับใจในปีที่แล้ว รวมทั้งสร้างหนึ่งสตาร์ให้กับทีมชาติอย่าง ปีโป้ สิโรจน์ ฉัตรทอง แต่ปีนี้รู้สึกว่าผลงานจะไม่ค่อยสู้ดีนัก ต้องมาลุ้นอยู่โซนท้ายตาราง มาดูกันซิว่าทีมจากแดนอิสาน จะสามารถยืนหยัดอยู่บนไทยลีกหรือไม่ หรือจะต้องกลับไปพิสูจน์ฝีมือใน M-150 Championship อีกครั้ง', '2018-07-29 07:08:17', '2018-07-29 07:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `matchset`
--

CREATE TABLE `matchset` (
  `id` int(6) UNSIGNED NOT NULL,
  `matchweek` int(6) NOT NULL,
  `hometeam` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `awayteam` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `homescore` int(11) NOT NULL DEFAULT '0',
  `awayscore` int(11) NOT NULL DEFAULT '0',
  `homecode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `awaycode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stadium` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `referee1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `referee2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `referee3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `referee4` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `referee5` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticketprovide` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticketlink` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticketlessprice` int(10) DEFAULT NULL,
  `broadcastingfree` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `broadcastingsd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `broadcastinghd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `matchcomment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `manofthematch` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `homestadiumgps` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `true4ulink` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lineup` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matchset`
--

INSERT INTO `matchset` (`id`, `matchweek`, `hometeam`, `awayteam`, `homescore`, `awayscore`, `homecode`, `awaycode`, `stadium`, `datetime`, `referee1`, `referee2`, `referee3`, `referee4`, `referee5`, `ticketprovide`, `ticketlink`, `ticketlessprice`, `broadcastingfree`, `broadcastingsd`, `broadcastinghd`, `matchcomment`, `manofthematch`, `status`, `homestadiumgps`, `true4ulink`, `lineup`, `created_at`, `updated_at`) VALUES
(1, 24, 'test1', 'test2', 0, 0, 'tes1', 'tes2', 'virturl stadium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test', NULL, NULL, 0, '2018-07-29 08:41:12', '2018-07-29 08:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `member_afcfc`
--

CREATE TABLE `member_afcfc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_afcfc`
--

INSERT INTO `member_afcfc` (`id`, `name`, `number`, `nationality`, `goal`, `photo`, `position`, `created_at`, `updated_at`) VALUES
(1, 'พิศาล ดอกไม้แก้ว', 1, 'th', 0, '/storage/player/afcfc/4LLVISgHUxaVdK1Ki9TS0B7rNtT1qLACF07kouqK.jpeg', 'GK', '2018-07-28 08:11:25', '2018-07-28 08:11:25'),
(2, 'กิตติพงศ์ ปถมสุข', 2, 'th', 0, '/storage/player/afcfc/p4XXkoeJJquYleNorRAhCvhK7wBAGluLTi2PVPXn.jpeg', 'DF', '2018-07-28 09:10:09', '2018-07-28 09:10:09'),
(3, 'NGUYEN MICHAL', 4, 'vn', 0, '/storage/player/afcfc/ZBU1OHCJhEFMOoo2cIiAlVZfRqP7CvnZSH5g5RMm.jpeg', 'DF', '2018-07-28 09:15:57', '2018-07-28 09:15:57'),
(4, 'ALEKSANDAR KAPISODA', 5, 'hr', 1, '/storage/player/afcfc/WUCxPiMjTMyxO0qrQRgJz7bLE0em5vmK9ZuwM17v.jpeg', 'DF', '2018-07-28 09:17:37', '2018-07-28 09:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `member_bgfc`
--

CREATE TABLE `member_bgfc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_bgfc`
--

INSERT INTO `member_bgfc` (`id`, `name`, `number`, `nationality`, `goal`, `photo`, `position`, `created_at`, `updated_at`) VALUES
(1, 'นริศ ทวีกุล', 1, 'th', 0, '/storage/player/bgfc/OpXv9oB1MerHyXpBRvy4q0RwPq4QGIBcjMopAJJC.png', 'GK', '2018-07-28 09:12:06', '2018-07-28 09:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `member_brutd`
--

CREATE TABLE `member_brutd` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_bufc`
--

CREATE TABLE `member_bufc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_chon`
--

CREATE TABLE `member_chon` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_cnhb`
--

CREATE TABLE `member_cnhb` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_crutd`
--

CREATE TABLE `member_crutd` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_mtutd`
--

CREATE TABLE `member_mtutd` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_navy fc`
--

CREATE TABLE `member_navy fc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_nrmfc`
--

CREATE TABLE `member_nrmfc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_polfc`
--

CREATE TABLE `member_polfc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_pt prchfc`
--

CREATE TABLE `member_pt prchfc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_putd`
--

CREATE TABLE `member_putd` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_rbmfc`
--

CREATE TABLE `member_rbmfc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_sktfc`
--

CREATE TABLE `member_sktfc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_spfc`
--

CREATE TABLE `member_spfc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_tpfc`
--

CREATE TABLE `member_tpfc` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_ubumt`
--

CREATE TABLE `member_ubumt` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(6) NOT NULL,
  `nationality` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goal` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'theethawat.s@outlook.com', '$2y$10$yZ24VHX88ZoG6o4nHe4nl.B2WMA0.xqrj7syswTVZAJHjFVWMWGq6', 'Kx5wHtJ2OSWqEQCWxBOH6No0PxyXdvrhAdJGfBPa2mZmPulk3wBSRuW5DP0V', '2018-07-28 08:11:46', '2018-07-26 20:58:33'),
(3, 'Theethawat Savastham', 'tintin_2004@windowslive.com', '$2y$10$eeaacO5OCVzL87xcPP4DaeJnBvy3y5pcq8VSrQElQ1pDNdzpJuqgC', 'VfGfn1EgkYaoVo4unoeLDxCCZsyyfUHTqXHl2m70Fme6Of6gSDyhyEgCp2TB', '2018-07-28 08:12:09', '2018-07-28 01:12:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubinfo`
--
ALTER TABLE `clubinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matchset`
--
ALTER TABLE `matchset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_afcfc`
--
ALTER TABLE `member_afcfc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_bgfc`
--
ALTER TABLE `member_bgfc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_brutd`
--
ALTER TABLE `member_brutd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_bufc`
--
ALTER TABLE `member_bufc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_chon`
--
ALTER TABLE `member_chon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_cnhb`
--
ALTER TABLE `member_cnhb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_crutd`
--
ALTER TABLE `member_crutd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_mtutd`
--
ALTER TABLE `member_mtutd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_navy fc`
--
ALTER TABLE `member_navy fc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_nrmfc`
--
ALTER TABLE `member_nrmfc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_polfc`
--
ALTER TABLE `member_polfc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_pt prchfc`
--
ALTER TABLE `member_pt prchfc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_putd`
--
ALTER TABLE `member_putd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_rbmfc`
--
ALTER TABLE `member_rbmfc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_sktfc`
--
ALTER TABLE `member_sktfc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_spfc`
--
ALTER TABLE `member_spfc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_tpfc`
--
ALTER TABLE `member_tpfc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_ubumt`
--
ALTER TABLE `member_ubumt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubinfo`
--
ALTER TABLE `clubinfo`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `matchset`
--
ALTER TABLE `matchset`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_afcfc`
--
ALTER TABLE `member_afcfc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_bgfc`
--
ALTER TABLE `member_bgfc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_brutd`
--
ALTER TABLE `member_brutd`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_bufc`
--
ALTER TABLE `member_bufc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_chon`
--
ALTER TABLE `member_chon`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_cnhb`
--
ALTER TABLE `member_cnhb`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_crutd`
--
ALTER TABLE `member_crutd`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_mtutd`
--
ALTER TABLE `member_mtutd`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_navy fc`
--
ALTER TABLE `member_navy fc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_nrmfc`
--
ALTER TABLE `member_nrmfc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_polfc`
--
ALTER TABLE `member_polfc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_pt prchfc`
--
ALTER TABLE `member_pt prchfc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_putd`
--
ALTER TABLE `member_putd`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_rbmfc`
--
ALTER TABLE `member_rbmfc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_sktfc`
--
ALTER TABLE `member_sktfc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_spfc`
--
ALTER TABLE `member_spfc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_tpfc`
--
ALTER TABLE `member_tpfc`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_ubumt`
--
ALTER TABLE `member_ubumt`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
