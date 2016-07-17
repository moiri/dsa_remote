-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2016 at 06:49 PM
-- Server version: 5.6.30-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsa_sheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis`
--

CREATE TABLE IF NOT EXISTS `basis` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `short_name` varchar(3) COLLATE utf8_bin NOT NULL,
  `wert_def` varchar(20) COLLATE utf8_bin NOT NULL,
  `wert_def_alt` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `max_kauf_def` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `basis`
--

INSERT INTO `basis` (`id`, `name`, `short_name`, `wert_def`, `wert_def_alt`, `max_kauf_def`) VALUES
(00000000001, 'Lebensenergie', 'LE', '(KO+KO+KK)/2', NULL, 'KO/2'),
(00000000002, 'Ausdauer', 'AU', '(MU+GE+KO)/2', NULL, '2*KO'),
(00000000003, 'Astralenergie', 'AE', '(MU+IN+CH)/2', '(MU+MU+IN+CH)/2', 'CH'),
(00000000004, 'Magieresistenz', 'MR', '(MU+KL+KO)/5', NULL, 'MU/2');

-- --------------------------------------------------------

--
-- Table structure for table `eigenschaft`
--

CREATE TABLE IF NOT EXISTS `eigenschaft` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `short_name` varchar(2) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `eigenschaft`
--

INSERT INTO `eigenschaft` (`id`, `name`, `short_name`) VALUES
(00000000001, 'Mut', 'MU'),
(00000000002, 'Klugheit', 'KL'),
(00000000003, 'Charisma', 'CH'),
(00000000004, 'Intuition', 'IN'),
(00000000005, 'Fingerfertigkeit', 'FF'),
(00000000006, 'Gewandtheit', 'GE'),
(00000000007, 'Körperkraft', 'KK'),
(00000000008, 'Konstitution', 'KO'),
(00000000009, 'Geschwindigkeit', 'GS'),
(00000000010, 'Sozialstatus', 'SO');

-- --------------------------------------------------------

--
-- Table structure for table `gruppe`
--

CREATE TABLE IF NOT EXISTS `gruppe` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `owner` int(10) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `gruppe`
--

INSERT INTO `gruppe` (`id`, `name`, `description`, `owner`) VALUES
(00000000001, 'G7 Hauptgruppe', 'Kampagne der sieben Gezeichneten', 0000000002),
(00000000002, 'G7 Nebengruppe', 'Kampagne der sieben Gezeichneten aus Sicht von Neben-Charakteren', 0000000002),
(00000000003, 'Phileason Kampagne', '', 0000000003);

-- --------------------------------------------------------

--
-- Table structure for table `held`
--

CREATE TABLE IF NOT EXISTS `held` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_user` int(11) unsigned zerofill NOT NULL,
  `chatname` varchar(20) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `beschrieb` text COLLATE utf8_bin NOT NULL,
  `titel` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `geschlecht` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `rasse` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `kultur` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `profession` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `geburtsdatum` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `haarfarbe` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `augenfarbe` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `groesse` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `gewicht` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `held`
--

INSERT INTO `held` (`id`, `id_user`, `chatname`, `name`, `beschrieb`, `titel`, `geschlecht`, `rasse`, `kultur`, `profession`, `geburtsdatum`, `haarfarbe`, `augenfarbe`, `groesse`, `gewicht`) VALUES
(00000000001, 00000000001, 'Yendan', 'Yendan aus Perricum zu Nimra', 'Yendan ist ein Magier wie man sie aus düsteren Märchen kennt. Seine Person ist von vielen geheimnisvollen Geschichten umrankt, Geschichten die ihn in der gorische Wüste den Theclador-Effekt entdecken lassen, ihn als gestaltenwandelnder weisser Drache beschreiben oder gar als dunkler Genosse des Dämonenmeisters Borbarad.\r\n\r\nSein dumpf glimmendes linkes Rubin-Auge, die langen weissen Haare und die fremdländischen Gesichtszüge machen es schwer sein Alter zu schätzen.', 'Edler von Nimra', 'männlich', 'Nivese', 'Garetien', 'Magier', '8. Boron 976 BF (17 v. Hal)', 'weiss', 'rot/bernstein', '87 Finger', '61 Stein'),
(00000000002, 00000000001, 'Connar', 'Connar', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(00000000003, 00000000005, '', 'Falaris', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `held_basis`
--

CREATE TABLE IF NOT EXISTS `held_basis` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_held` int(11) unsigned zerofill NOT NULL,
  `id_basis` int(11) unsigned zerofill NOT NULL,
  `wert` int(2) NOT NULL,
  `start` int(2) NOT NULL,
  `modifikator` int(2) DEFAULT NULL,
  `kauf` int(2) DEFAULT NULL,
  `kauf_max` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `held_basis`
--

INSERT INTO `held_basis` (`id`, `id_held`, `id_basis`, `wert`, `start`, `modifikator`, `kauf`, `kauf_max`) VALUES
(00000000001, 00000000001, 00000000001, 26, 19, 6, 1, 7),
(00000000002, 00000000001, 00000000002, 34, 21, 10, 3, 28),
(00000000003, 00000000001, 00000000003, 68, 33, 30, 5, 15),
(00000000004, 00000000001, 00000000004, 9, 10, -3, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `held_eigenschaft`
--

CREATE TABLE IF NOT EXISTS `held_eigenschaft` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_held` int(11) unsigned zerofill NOT NULL,
  `id_eigenschaft` int(11) unsigned zerofill NOT NULL,
  `wert` int(2) NOT NULL,
  `start` int(2) NOT NULL,
  `modifikator` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `held_eigenschaft`
--

INSERT INTO `held_eigenschaft` (`id`, `id_held`, `id_eigenschaft`, `wert`, `start`, `modifikator`) VALUES
(00000000001, 00000000001, 00000000001, 17, 14, NULL),
(00000000002, 00000000001, 00000000002, 18, 14, NULL),
(00000000003, 00000000001, 00000000003, 15, 14, NULL),
(00000000004, 00000000001, 00000000004, 18, 14, 1),
(00000000005, 00000000001, 00000000005, 12, 12, NULL),
(00000000006, 00000000001, 00000000006, 12, 11, NULL),
(00000000007, 00000000001, 00000000007, 10, 10, NULL),
(00000000008, 00000000001, 00000000008, 14, 11, 1),
(00000000009, 00000000001, 00000000009, 8, 8, NULL),
(00000000010, 00000000002, 00000000002, 11, 11, NULL),
(00000000011, 00000000001, 00000000010, 11, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `held_gruppe`
--

CREATE TABLE IF NOT EXISTS `held_gruppe` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_held` int(11) unsigned zerofill NOT NULL,
  `id_gruppe` int(11) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `held_gruppe`
--

INSERT INTO `held_gruppe` (`id`, `id_held`, `id_gruppe`) VALUES
(00000000001, 00000000001, 00000000001),
(00000000002, 00000000002, 00000000002),
(00000000003, 00000000003, 00000000003),
(00000000004, 00000000002, 00000000001);

-- --------------------------------------------------------

--
-- Table structure for table `held_kampf`
--

CREATE TABLE IF NOT EXISTS `held_kampf` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_held` int(11) unsigned zerofill NOT NULL,
  `id_kampf` int(11) unsigned zerofill NOT NULL,
  `wert` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `held_kampf`
--

INSERT INTO `held_kampf` (`id`, `id_held`, `id_kampf`, `wert`) VALUES
(00000000005, 00000000001, 00000000005, 13),
(00000000006, 00000000001, 00000000006, 8),
(00000000007, 00000000001, 00000000007, 8),
(00000000008, 00000000001, 00000000008, 8);

-- --------------------------------------------------------

--
-- Table structure for table `held_nachteil`
--

CREATE TABLE IF NOT EXISTS `held_nachteil` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_held` int(11) unsigned zerofill NOT NULL,
  `nachteil` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `held_nachteil`
--

INSERT INTO `held_nachteil` (`id`, `id_held`, `nachteil`) VALUES
(00000000001, 00000000001, 'Neugier 8'),
(00000000003, 00000000001, 'Verpflichtungen (Gegenüber der Akademie, der Gilde und dem Reich)'),
(00000000004, 00000000001, 'Prinzipienteue (Zwölfgötterglaube, Dämonnenvernichtung und Wahrheitsliebe)'),
(00000000005, 00000000001, 'Kurzatmig (-2)'),
(00000000006, 00000000001, 'Niedere Lebenskraft (-3)'),
(00000000007, 00000000001, 'Einbildungen (Verfolgungswahn)');

-- --------------------------------------------------------

--
-- Table structure for table `held_talent`
--

CREATE TABLE IF NOT EXISTS `held_talent` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_held` int(11) unsigned zerofill NOT NULL,
  `id_talent` int(11) unsigned zerofill NOT NULL,
  `wert` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `held_talent`
--

INSERT INTO `held_talent` (`id`, `id_held`, `id_talent`, `wert`) VALUES
(00000000001, 00000000001, 00000000004, 2),
(00000000002, 00000000001, 00000000003, 5),
(00000000003, 00000000001, 00000000005, 6),
(00000000004, 00000000001, 00000000006, 2),
(00000000005, 00000000001, 00000000007, 3),
(00000000006, 00000000001, 00000000009, 10),
(00000000007, 00000000001, 00000000008, 3),
(00000000008, 00000000001, 00000000010, 0),
(00000000009, 00000000001, 00000000001, 13),
(00000000010, 00000000001, 00000000012, 3),
(00000000011, 00000000001, 00000000013, 1);

-- --------------------------------------------------------

--
-- Table structure for table `held_vorteil`
--

CREATE TABLE IF NOT EXISTS `held_vorteil` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_held` int(11) unsigned zerofill NOT NULL,
  `vorteil` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `held_vorteil`
--

INSERT INTO `held_vorteil` (`id`, `id_held`, `vorteil`) VALUES
(00000000001, 00000000001, 'Begabung für Antimagie'),
(00000000002, 00000000001, 'Begabung für Hellsicht'),
(00000000003, 00000000001, 'Akademische Ausbildung (Magier)'),
(00000000004, 00000000001, 'Vollzauberer'),
(00000000005, 00000000001, 'Astralmacht (+2 +3)');

-- --------------------------------------------------------

--
-- Table structure for table `held_waffe`
--

CREATE TABLE IF NOT EXISTS `held_waffe` (
  `id` int(11) unsigned zerofill NOT NULL,
  `held_id` int(11) unsigned zerofill NOT NULL,
  `waffe_id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `TP` varchar(7) COLLATE utf8_bin DEFAULT NULL,
  `TP_KK` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `BF` int(2) DEFAULT NULL,
  `BF_aktuell` int(2) DEFAULT NULL,
  `INI` int(1) DEFAULT NULL,
  `WM` varchar(5) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `held_waffe`
--

INSERT INTO `held_waffe` (`id`, `held_id`, `waffe_id`, `name`, `TP`, `TP_KK`, `BF`, `BF_aktuell`, `INI`, `WM`) VALUES
(00000000001, 00000000001, 00000000003, 'Bannschwert', '1W6+4', NULL, NULL, NULL, NULL, '0/0');

-- --------------------------------------------------------

--
-- Table structure for table `kampf`
--

CREATE TABLE IF NOT EXISTS `kampf` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `short_name` varchar(3) COLLATE utf8_bin NOT NULL,
  `wert_def` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kampf`
--

INSERT INTO `kampf` (`id`, `name`, `short_name`, `wert_def`) VALUES
(00000000005, 'Initative', 'INI', '(MU+MU+IN+GE)/5'),
(00000000006, 'Attacke', 'AT', '(MU+GE+KK)/5'),
(00000000007, 'Parade', 'PA', '(IN+GE+KK)/5'),
(00000000008, 'Fernkampf', 'FK', '(IN+FF+KK)/5');

-- --------------------------------------------------------

--
-- Table structure for table `ls`
--

CREATE TABLE IF NOT EXISTS `ls` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(1) COLLATE utf8_bin NOT NULL,
  `AF` float NOT NULL COMMENT 'Aktivierungsfaktor',
  `number` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Lernschwierigkeit, Komplexität';

--
-- Dumping data for table `ls`
--

INSERT INTO `ls` (`id`, `name`, `AF`, `number`) VALUES
(00000000001, 'A', 1, 1),
(00000000002, 'B', 2, 2),
(00000000003, 'C', 3, 3),
(00000000004, 'D', 4, 4),
(00000000005, 'E', 5, 5),
(00000000006, 'F', 7.5, 6),
(00000000007, 'G', 10, 7),
(00000000008, 'H', 20, 8);

-- --------------------------------------------------------

--
-- Table structure for table `merkmal`
--

CREATE TABLE IF NOT EXISTS `merkmal` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `stufe` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `merkmal`
--

INSERT INTO `merkmal` (`id`, `name`, `stufe`) VALUES
(00000000001, 'Antimagie', 2),
(00000000002, 'Beschwörung', 2),
(00000000003, 'Dämonisch', 3),
(00000000004, 'Dämonisch (Agrimoth / Widharcal)', 1),
(00000000005, 'Dämonisch (Amazeroth / Iribaar)', 1),
(00000000006, 'Dämonisch (Asfaloth / Calijnaar)', 1),
(00000000007, 'Dämonisch (Belhalhar / Xarfai)', 1),
(00000000008, 'Dämonisch (Blakharaz / Tyakra''man)', 1),
(00000000009, 'Dämonisch (Lolgramoth / Thezzaphai)', 1),
(00000000010, 'Dämonisch (Belzhorash / Mishkara)', 1),
(00000000011, 'Dämonisch (Thargunitoth / Tijakool)', 1),
(00000000012, 'Eigenschaften', 2),
(00000000013, 'Einfluss', 2),
(00000000014, 'Elementar', 3),
(00000000015, 'Elementar (Eis)', 1),
(00000000016, 'Elementar (Erz)', 1),
(00000000017, 'Elementar (Feuer)', 1),
(00000000018, 'Elementar (Humus)', 1),
(00000000019, 'Elementar (Luft)', 1),
(00000000020, 'Elementar (Wasser)', 1),
(00000000021, 'Form', 2),
(00000000022, 'Geisterwesen', 1),
(00000000023, 'Heilung', 1),
(00000000024, 'Hellsicht', 2),
(00000000025, 'Herbeirufung', 1),
(00000000026, 'Herrschaft', 2),
(00000000027, 'Illusion', 1),
(00000000028, 'Kraft', 2),
(00000000029, 'Limbus', 3),
(00000000030, 'Metamagie', 3),
(00000000031, 'Objekt', 2),
(00000000032, 'Schaden', 1),
(00000000033, 'Telekinese', 1),
(00000000034, 'Temporal', 3),
(00000000035, 'Umwelt', 2),
(00000000036, 'Verständigung', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spomo`
--

CREATE TABLE IF NOT EXISTS `spomo` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `kosten` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mod` varchar(30) CHARACTER SET utf8 NOT NULL,
  `zauberdauer` varchar(30) CHARACTER SET utf8 NOT NULL,
  `beschreibung` mediumtext CHARACTER SET utf8,
  `id_spomoKurz` int(11) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `spomo`
--

INSERT INTO `spomo` (`id`, `name`, `kosten`, `mod`, `zauberdauer`, `beschreibung`, `id_spomoKurz`) VALUES
(00000000001, 'Veränderte Technik', '7 ZfP / Komponente', '0', '+3 Aktionen', '', 00000000001),
(00000000002, 'Veränderte Technik, zentral', '12 ZfP / Komponente', '0', '+3 Aktionen', '', 00000000001),
(00000000003, 'Halbierte Zauberdauer', '5 ZfP / Halbierung', '0', '-50%', NULL, 00000000002),
(00000000004, 'Verdoppelte Zauberdauer', '0', '-3', '+100%', NULL, 00000000002),
(00000000005, 'Erzwingen', '0', 'je -1 pro 1/2/4/8 ... AsP', '+1 Aktion / Erleichterung', NULL, 00000000003),
(00000000006, 'Kosten einsparen', '3 ZfP / -10% AsP', '-', '+1 Aktion / -10% AsP', NULL, 00000000004),
(00000000007, 'Unfreiwillig statt freiwilliges Zielobjekt', '5 ZfP', '+MR', '+1 Aktion', NULL, 00000000006),
(00000000008, 'Freiwillig statt unfreiwillig', '2 ZfP', '- 50% MR', '+1 Aktion', NULL, 00000000007),
(00000000009, 'Mehrere Gefährten verzaubern (freiwillig)', '3 ZfP', '+1 / Person', '+1 Aktion', NULL, 00000000008),
(00000000010, 'Mehrere Gegner verzaubern (unfreiwillig)', '0', '+MR_MAX + Anzahl', '+1 Aktion', NULL, 00000000008),
(00000000011, 'Vergrösserung von Reichweite oder Wirkungsradius', '5 ZfP / Stufe', '0', '+1 Aktion / Stufe', NULL, 00000000009),
(00000000012, 'Verkleinerung von Reichweite oder Wirkungsradius', '3 ZfP / Stufe', '0', '+1 Aktion / Stufe', NULL, 00000000009),
(00000000013, 'Verdoppelung der Wirkungsdauer', '7 ZfP / Verdoppelung', '0', '+1 Aktion / Verdoppelung', NULL, 00000000010),
(00000000014, 'Halbierung der Wirkungsdauer', '3 ZfP / Halbierung', '0', '+1 Aktion / Halbierung', NULL, 00000000010),
(00000000015, 'Änderung von Aufrechterhalten auf feste Dauer', '7 ZfP', '0', '+1 Aktion', NULL, 00000000010);

-- --------------------------------------------------------

--
-- Table structure for table `spomoKurz`
--

CREATE TABLE IF NOT EXISTS `spomoKurz` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `spomoKurz`
--

INSERT INTO `spomoKurz` (`id`, `name`) VALUES
(00000000001, 'Technik'),
(00000000002, 'Zauberdauer'),
(00000000003, 'Erzwingen'),
(00000000004, 'Kosten'),
(00000000005, 'Zielobjekt'),
(00000000006, 'Zielobjekt (freiwillig)'),
(00000000007, 'Zielobjekt (unfreiwillig)'),
(00000000008, 'Zielobjekt (mehrere)'),
(00000000009, 'Reichweite'),
(00000000010, 'Wirkungsdauer'),
(00000000011, 'Reichweite (Berührung)'),
(00000000012, 'Reichweite (selbst)');

-- --------------------------------------------------------

--
-- Table structure for table `talent`
--

CREATE TABLE IF NOT EXISTS `talent` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_eigenschaft1` int(11) unsigned zerofill DEFAULT NULL,
  `id_eigenschaft2` int(11) unsigned zerofill DEFAULT NULL,
  `id_eigenschaft3` int(11) unsigned zerofill DEFAULT NULL,
  `id_eigenschaft3_alt` int(11) unsigned zerofill DEFAULT NULL COMMENT 'alternative for eigenschaft3',
  `eBE` int(1) DEFAULT NULL,
  `id_ls` int(11) unsigned zerofill NOT NULL,
  `basis` tinyint(1) DEFAULT NULL,
  `id_talentgruppe` int(11) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `talent`
--

INSERT INTO `talent` (`id`, `name`, `id_eigenschaft1`, `id_eigenschaft2`, `id_eigenschaft3`, `id_eigenschaft3_alt`, `eBE`, `id_ls`, `basis`, `id_talentgruppe`) VALUES
(00000000001, 'Sinnenschärfe', 00000000002, 00000000004, 00000000004, 00000000005, NULL, 00000000004, 1, 00000000001),
(00000000003, 'Klettern', 00000000001, 00000000006, 00000000007, NULL, 2, 00000000004, 1, 00000000001),
(00000000004, 'Athletik', 00000000006, 00000000008, 00000000007, NULL, 2, 00000000004, 1, 00000000001),
(00000000005, 'Körperbeherrschung', 00000000001, 00000000004, 00000000006, NULL, 2, 00000000004, 1, 00000000001),
(00000000006, 'Schleichen', 00000000001, 00000000004, 00000000006, NULL, 1, 00000000004, 1, 00000000001),
(00000000007, 'Schwimmen', 00000000006, 00000000008, 00000000007, NULL, 2, 00000000004, 1, 00000000001),
(00000000008, 'Sich Verstecken', 00000000001, 00000000004, 00000000006, NULL, -2, 00000000004, 1, 00000000001),
(00000000009, 'Selbstbeherrschung', 00000000001, 00000000008, 00000000007, NULL, NULL, 00000000004, 1, 00000000001),
(00000000010, 'Singen', 00000000004, 00000000003, 00000000003, 00000000008, -3, 00000000004, 1, 00000000001),
(00000000012, 'Tanzen', 00000000003, 00000000006, 00000000006, NULL, 2, 00000000004, 1, 00000000001),
(00000000013, 'Zechen', 00000000004, 00000000008, 00000000007, NULL, NULL, 00000000004, 1, 00000000001),
(00000000014, 'Menschenkenntnis', 00000000002, 00000000004, 00000000003, NULL, NULL, 00000000002, 1, 00000000002),
(00000000015, 'Überreden', 00000000001, 00000000004, 00000000003, NULL, NULL, 00000000002, 1, 00000000002),
(00000000016, 'Fährtensuchen', 00000000002, 00000000004, 00000000004, 00000000008, NULL, 00000000002, 1, 00000000004),
(00000000017, 'Orientierung', 00000000002, 00000000004, 00000000004, NULL, NULL, 00000000002, 1, 00000000004),
(00000000018, 'Wildnisleben', 00000000004, 00000000006, 00000000008, NULL, NULL, 00000000002, 1, 00000000004),
(00000000019, 'Götter / Kulte', 00000000002, 00000000002, 00000000004, NULL, NULL, 00000000002, 1, 00000000005),
(00000000020, 'Rechnen', 00000000002, 00000000002, 00000000004, NULL, NULL, 00000000002, 1, 00000000005),
(00000000021, 'Sagen / Legenden', 00000000002, 00000000004, 00000000003, NULL, NULL, 00000000002, 1, 00000000005),
(00000000022, 'Heilkunde Wunden', 00000000002, 00000000003, 00000000005, NULL, NULL, 00000000002, 1, 00000000003),
(00000000023, 'Holzbearbeitung', 00000000002, 00000000005, 00000000007, NULL, NULL, 00000000002, 1, 00000000003),
(00000000024, 'Kochen', 00000000002, 00000000004, 00000000005, NULL, NULL, 00000000002, 1, 00000000003),
(00000000025, 'Lederarbeiten', 00000000002, 00000000005, 00000000005, NULL, NULL, 00000000002, 1, 00000000003),
(00000000026, 'Malen / Zeichnen', 00000000002, 00000000004, 00000000005, NULL, NULL, 00000000002, 1, 00000000003),
(00000000027, 'Schneidern', 00000000002, 00000000005, 00000000005, NULL, NULL, 00000000002, 1, 00000000003),
(00000000028, 'Dolche', NULL, NULL, NULL, NULL, -1, 00000000004, 1, 00000000009),
(00000000029, 'Hiebwaffen', NULL, NULL, NULL, NULL, -4, 00000000004, 1, 00000000009),
(00000000030, 'Raufen', NULL, NULL, NULL, NULL, 1, 00000000003, 1, 00000000009),
(00000000031, 'Ringen', NULL, NULL, NULL, NULL, 1, 00000000004, 1, 00000000009),
(00000000032, 'Säbel', NULL, NULL, NULL, NULL, -2, 00000000004, 1, 00000000009),
(00000000033, 'Wurfmesser', NULL, NULL, NULL, NULL, -3, 00000000003, 1, 00000000010),
(00000000034, 'Anderthalbhänder', NULL, NULL, NULL, NULL, -2, 00000000005, NULL, 00000000009),
(00000000035, 'Armbrust', NULL, NULL, NULL, NULL, -5, 00000000003, NULL, 00000000010),
(00000000036, 'Belagerungswaffen', NULL, NULL, NULL, NULL, NULL, 00000000004, NULL, 00000000010),
(00000000037, 'Blasrohr', NULL, NULL, NULL, NULL, -5, 00000000004, NULL, 00000000010),
(00000000038, 'Bogen', NULL, NULL, NULL, NULL, -3, 00000000005, NULL, 00000000010),
(00000000039, 'Diskus', NULL, NULL, NULL, NULL, -2, 00000000004, NULL, 00000000010),
(00000000040, 'Fechtwaffen', NULL, NULL, NULL, NULL, -1, 00000000005, NULL, 00000000009),
(00000000041, 'Infantriewaffen', NULL, NULL, NULL, NULL, -3, 00000000004, NULL, 00000000009),
(00000000042, 'Kettenstäbe', NULL, NULL, NULL, NULL, -1, 00000000005, NULL, 00000000009),
(00000000043, 'Kettenwaffen', NULL, NULL, NULL, NULL, -3, 00000000004, NULL, 00000000009),
(00000000044, 'Lanzenreiten', NULL, NULL, NULL, NULL, NULL, 00000000005, NULL, 00000000000),
(00000000045, 'Peitsche', NULL, NULL, NULL, NULL, -1, 00000000005, NULL, 00000000000),
(00000000046, 'Schleuder', NULL, NULL, NULL, NULL, -2, 00000000005, NULL, 00000000010),
(00000000047, 'Schwerter', NULL, NULL, NULL, NULL, -2, 00000000005, NULL, 00000000009),
(00000000048, 'Speere', NULL, NULL, NULL, NULL, -3, 00000000004, NULL, 00000000009),
(00000000049, 'Stäbe', NULL, NULL, NULL, NULL, -2, 00000000004, NULL, 00000000009),
(00000000050, 'Wurfbeile', NULL, NULL, NULL, NULL, -2, 00000000004, NULL, 00000000010),
(00000000051, 'Wurfspeere', NULL, NULL, NULL, NULL, -2, 00000000003, NULL, 00000000010),
(00000000052, 'Zweihandflegel', NULL, NULL, NULL, NULL, -3, 00000000004, NULL, 00000000009),
(00000000053, 'Zweihand-Hiebwaffen', NULL, NULL, NULL, NULL, -3, 00000000004, NULL, 00000000009),
(00000000054, 'Zweihandschwerter / -säbel', NULL, NULL, NULL, NULL, -2, 00000000005, NULL, 00000000009);

-- --------------------------------------------------------

--
-- Table structure for table `talentgruppe`
--

CREATE TABLE IF NOT EXISTS `talentgruppe` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `talentgruppe`
--

INSERT INTO `talentgruppe` (`id`, `name`) VALUES
(00000000001, 'Körperliche Talente'),
(00000000002, 'Gesellschaftliche Talente'),
(00000000003, 'Handwerkliche Talente'),
(00000000004, 'Naturtalente'),
(00000000005, 'Wissenstalente'),
(00000000006, 'Gaben'),
(00000000007, 'Sprachen'),
(00000000008, 'Schriften'),
(00000000009, 'Nahkampftalente'),
(00000000010, 'Fernkampftalente'),
(00000000011, 'Zauber'),
(00000000012, 'Rituale');

-- --------------------------------------------------------

--
-- Table structure for table `talent_waffe`
--

CREATE TABLE IF NOT EXISTS `talent_waffe` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_talent` int(11) unsigned zerofill NOT NULL,
  `id_waffe` int(11) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `talent_waffe`
--

INSERT INTO `talent_waffe` (`id`, `id_talent`, `id_waffe`) VALUES
(00000000001, 00000000028, 00000000003),
(00000000002, 00000000047, 00000000003),
(00000000003, 00000000032, 00000000003);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned zerofill NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='user data';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_password_hash`, `user_email`) VALUES
(00000000001, 'moiri', '$2y$10$GWO91u/me7hbhx6N7BwxF.F4pfFE9JiIp0G3T0EhEglwEmYfX5wz2', 'moirelein@gmail.com'),
(00000000002, 'wuff', '$2y$10$J/nJAlDE0zME9TK.X7nC6ez1nym.y6ncDVlhWtcHksvS5vq04Ppma', 'asdjakl@ads.com'),
(00000000003, 'hhj', '$2y$10$CGikRLTStZ7sXJuVY28UpuyoRNvVxL9pdNqL415OERBkp8YdcXAdK', 'hjd@assdas.com'),
(00000000004, 'fsdfs', '$2y$10$cet6Sm6.xMGYoIfCZMubsuHod4X4aZG3OxBU3/g694lmRUK4PLkAq', 'asda@ads.com'),
(00000000005, 'hanuele', '$2y$10$y/TQfUcPOOFQzvkICAUagOv0zIHfkF4bHW6LYfzM1JT7j3wm3Nkqm', 'sad@dal.com');

-- --------------------------------------------------------

--
-- Table structure for table `variante`
--

CREATE TABLE IF NOT EXISTS `variante` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mod` int(2) NOT NULL,
  `voraussetzung` int(2) NOT NULL,
  `beschreibung` mediumtext CHARACTER SET utf8 NOT NULL,
  `id_zauber` int(11) unsigned zerofill NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `waffe`
--

CREATE TABLE IF NOT EXISTS `waffe` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `TP` varchar(7) COLLATE utf8_bin NOT NULL,
  `TP_KK` varchar(5) COLLATE utf8_bin NOT NULL,
  `BF` int(2) NOT NULL,
  `INI` int(1) NOT NULL,
  `WM` varchar(5) COLLATE utf8_bin NOT NULL,
  `DK` varchar(3) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `waffe`
--

INSERT INTO `waffe` (`id`, `name`, `TP`, `TP_KK`, `BF`, `INI`, `WM`, `DK`) VALUES
(00000000001, 'Knüppel', '1W6+1', '11/4', 6, 0, '0/-2', 'N'),
(00000000002, 'Schwert', '1W6+4', '11/4', 1, 0, '0/0', 'N'),
(00000000003, 'Kurzschwert', '1W6+2', '11/4', 0, 1, '0/-1', 'HN');

-- --------------------------------------------------------

--
-- Table structure for table `zauber`
--

CREATE TABLE IF NOT EXISTS `zauber` (
  `id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nameLatein` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `id_eigenschaft1` int(11) unsigned zerofill NOT NULL,
  `id_eigenschaft2` int(11) unsigned zerofill NOT NULL,
  `id_eigenschaft3` int(11) unsigned zerofill NOT NULL,
  `mr` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Modifikation der Probe durch die Magieresistenz?',
  `mod` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Weitere Modifikation der Probe?',
  `technik` tinytext CHARACTER SET utf8,
  `zauberdauer` varchar(150) CHARACTER SET utf8 NOT NULL,
  `wirkung` mediumtext CHARACTER SET utf8,
  `kosten` varchar(150) CHARACTER SET utf8 NOT NULL,
  `reichweite` varchar(150) CHARACTER SET utf8 NOT NULL,
  `wirkungsdauer` varchar(150) CHARACTER SET utf8 NOT NULL,
  `a` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Muss der Zauber aufrecht erhalten werden?',
  `reversalis` tinytext CHARACTER SET utf8,
  `antimagie` tinytext CHARACTER SET utf8,
  `komplexitaet` varchar(1) CHARACTER SET utf8 NOT NULL,
  `verbreitung` mediumtext CHARACTER SET utf8
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `zauber`
--

INSERT INTO `zauber` (`id`, `name`, `nameLatein`, `id_eigenschaft1`, `id_eigenschaft2`, `id_eigenschaft3`, `mr`, `mod`, `technik`, `zauberdauer`, `wirkung`, `kosten`, `reichweite`, `wirkungsdauer`, `a`, `reversalis`, `antimagie`, `komplexitaet`, `verbreitung`) VALUES
(00000000001, 'Pentagramma Sphärenbann', NULL, 00000000001, 00000000001, 00000000004, 0, 1, NULL, '20 Aktionen', NULL, '7 AsP pro Geist, 11 AsP pro Niederem Dämon, 17 AsP pro Gehörntem Dämon, 35 pro Erzdämon', '7 Schritt Radius um das Pentagramm', 'augenblicklich', 0, NULL, NULL, 'D', NULL),
(00000000002, 'Abvenenum reine Speise', NULL, 00000000003, 00000000003, 00000000005, 0, 1, NULL, 'mindestens 15 Aktionen', NULL, '4 AsP pro Mahlzeit, die für etwa 10 Personen reicht (Sch: 3 AsP)', '1 Schritt', 'augenblicklich', 0, NULL, NULL, 'C', NULL),
(00000000003, 'Analy Arcanstuktur', NULL, 00000000003, 00000000003, 00000000002, 0, 1, NULL, 'mindestens 1 Spielrunde', NULL, '6 AsP + 3 AsP für jede angefangene halbe Stunde, die die Analyse dauert', '1 Schritt', 'identisch mit Zauberdauer, nach AsP-Aufwand. Während der Wirkungs-/Zauberdauer kann der Magier keine anderen Aktionen unternehmen', 0, NULL, NULL, 'D', NULL),
(00000000004, 'Ängste lindern', NULL, 00000000001, 00000000002, 00000000004, 0, 0, NULL, '20 Aktionen', NULL, '5 AsP', 'Berührung', 'augenblicklich, die motivierende Kraft des Zaubers hält so lange an, wie die direkt auf den Zauber folgende Aktion dauert', 0, NULL, NULL, 'C', NULL),
(00000000005, 'Applicatus Zauberspeicher', NULL, 00000000003, 00000000005, 00000000005, 0, 0, NULL, '40 Aktionen', NULL, '2W6 AsP (+ Kosten des Wirkenden Spruches)', 'Berührung', 'längstens bis zum nächsten Sonnenaufgang, dann bauen sich die Muster des APPLICATUS ab und der fixierte Zauberspruch wird automatisch ausgelöst', 0, NULL, NULL, 'C', NULL),
(00000000006, 'Arcanovi Artefakt', NULL, 00000000003, 00000000003, 00000000005, 0, 0, NULL, 'ein bis mehrere Stunden', NULL, '10 AsP (+ Kosten der Wirkenden Sprüche). Jedes Artefakt erfordert zudem den Aufwand von permanenten AsP zur Schaffung einer dauerhaften Matrix', 'Berührung', 'variabel; je nach Art des Artefakts bleibt der ARCANOVI mindestens bis zur Auslösung der Wirkenden Sprüche intakt', 0, NULL, NULL, 'E', NULL),
(00000000007, 'Armatrutz', NULL, 00000000002, 00000000006, 00000000007, 0, 0, NULL, '3 Aktionen', NULL, 'zusätzlicher RS mal zusätzlicher RS minus ZfP*/2 in AsP, mindestens aber 4 AsP', 'selbst', 'maximal eine Spielrunde', 1, NULL, NULL, 'B', NULL),
(00000000008, 'Attributo', NULL, 00000000003, 00000000004, 00000000009, 0, 0, NULL, '30 Aktionen', NULL, '7 AsP (Sch: 5 AsP)', 'Berührung', '1 Stunde', 0, NULL, NULL, 'B', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zauber_merkmal`
--

CREATE TABLE IF NOT EXISTS `zauber_merkmal` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_zauber` int(11) unsigned zerofill NOT NULL,
  `id_merkmal` int(11) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `zauber_merkmal`
--

INSERT INTO `zauber_merkmal` (`id`, `id_zauber`, `id_merkmal`) VALUES
(00000000001, 00000000001, 00000000001),
(00000000002, 00000000001, 00000000002),
(00000000003, 00000000001, 00000000003),
(00000000004, 00000000001, 00000000001),
(00000000005, 00000000002, 00000000031),
(00000000006, 00000000003, 00000000024),
(00000000007, 00000000003, 00000000030),
(00000000008, 00000000004, 00000000013),
(00000000009, 00000000005, 00000000031),
(00000000010, 00000000005, 00000000030),
(00000000011, 00000000006, 00000000031),
(00000000012, 00000000006, 00000000030),
(00000000013, 00000000007, 00000000012),
(00000000014, 00000000007, 00000000016),
(00000000015, 00000000008, 00000000012);

-- --------------------------------------------------------

--
-- Table structure for table `zauber_spomoKurz`
--

CREATE TABLE IF NOT EXISTS `zauber_spomoKurz` (
  `id` int(11) unsigned zerofill NOT NULL,
  `id_zauber` int(11) unsigned zerofill NOT NULL,
  `id_spomoKurz` int(11) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `zauber_spomoKurz`
--

INSERT INTO `zauber_spomoKurz` (`id`, `id_zauber`, `id_spomoKurz`) VALUES
(00000000001, 00000000001, 00000000002),
(00000000002, 00000000001, 00000000008),
(00000000003, 00000000001, 00000000003),
(00000000004, 00000000001, 00000000009),
(00000000005, 00000000002, 00000000002),
(00000000006, 00000000002, 00000000009),
(00000000007, 00000000003, 00000000002),
(00000000008, 00000000003, 00000000004),
(00000000009, 00000000003, 00000000009),
(00000000010, 00000000004, 00000000002),
(00000000011, 00000000004, 00000000003),
(00000000012, 00000000004, 00000000004),
(00000000013, 00000000004, 00000000009),
(00000000014, 00000000005, 00000000002),
(00000000015, 00000000005, 00000000004),
(00000000016, 00000000005, 00000000010),
(00000000017, 00000000007, 00000000002),
(00000000018, 00000000007, 00000000004),
(00000000019, 00000000007, 00000000011),
(00000000020, 00000000007, 00000000010),
(00000000021, 00000000008, 00000000002),
(00000000022, 00000000008, 00000000010),
(00000000023, 00000000008, 00000000012);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis`
--
ALTER TABLE `basis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eigenschaft`
--
ALTER TABLE `eigenschaft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gruppe`
--
ALTER TABLE `gruppe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`owner`);

--
-- Indexes for table `held`
--
ALTER TABLE `held`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `held_basis`
--
ALTER TABLE `held_basis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_held` (`id_held`),
  ADD KEY `id_basis` (`id_basis`);

--
-- Indexes for table `held_eigenschaft`
--
ALTER TABLE `held_eigenschaft`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_held` (`id_held`,`id_eigenschaft`),
  ADD KEY `id_wert` (`id_eigenschaft`);

--
-- Indexes for table `held_gruppe`
--
ALTER TABLE `held_gruppe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_held` (`id_held`),
  ADD KEY `id_gruppe` (`id_gruppe`);

--
-- Indexes for table `held_kampf`
--
ALTER TABLE `held_kampf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_held` (`id_held`),
  ADD KEY `id_kampf` (`id_kampf`);

--
-- Indexes for table `held_nachteil`
--
ALTER TABLE `held_nachteil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_held` (`id_held`);

--
-- Indexes for table `held_talent`
--
ALTER TABLE `held_talent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_held` (`id_held`),
  ADD KEY `id_talent` (`id_talent`);

--
-- Indexes for table `held_vorteil`
--
ALTER TABLE `held_vorteil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_held` (`id_held`);

--
-- Indexes for table `held_waffe`
--
ALTER TABLE `held_waffe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `held_id` (`held_id`),
  ADD KEY `waffe_id` (`waffe_id`);

--
-- Indexes for table `kampf`
--
ALTER TABLE `kampf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ls`
--
ALTER TABLE `ls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merkmal`
--
ALTER TABLE `merkmal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spomo`
--
ALTER TABLE `spomo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorie` (`id_spomoKurz`);

--
-- Indexes for table `spomoKurz`
--
ALTER TABLE `spomoKurz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent`
--
ALTER TABLE `talent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eigenschaft1` (`id_eigenschaft1`),
  ADD KEY `id_eigenschaft2` (`id_eigenschaft2`),
  ADD KEY `id_eigenschaft3` (`id_eigenschaft3`),
  ADD KEY `id_eigenschaft3_alt` (`id_eigenschaft3_alt`),
  ADD KEY `id_talentgruppe` (`id_talentgruppe`),
  ADD KEY `id_ls` (`id_ls`);

--
-- Indexes for table `talentgruppe`
--
ALTER TABLE `talentgruppe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_waffe`
--
ALTER TABLE `talent_waffe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_talent` (`id_talent`),
  ADD KEY `id_waffe` (`id_waffe`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `variante`
--
ALTER TABLE `variante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_zauber` (`id_zauber`);

--
-- Indexes for table `waffe`
--
ALTER TABLE `waffe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zauber`
--
ALTER TABLE `zauber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `probe` (`id_eigenschaft1`,`id_eigenschaft2`,`id_eigenschaft3`),
  ADD KEY `zauber_ibfk_2` (`id_eigenschaft2`),
  ADD KEY `zauber_ibfk_3` (`id_eigenschaft3`);

--
-- Indexes for table `zauber_merkmal`
--
ALTER TABLE `zauber_merkmal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_zauber` (`id_zauber`),
  ADD KEY `id_merkmale` (`id_merkmal`);

--
-- Indexes for table `zauber_spomoKurz`
--
ALTER TABLE `zauber_spomoKurz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_zauber` (`id_zauber`),
  ADD KEY `id_spomoKurz` (`id_spomoKurz`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis`
--
ALTER TABLE `basis`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `eigenschaft`
--
ALTER TABLE `eigenschaft`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gruppe`
--
ALTER TABLE `gruppe`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `held`
--
ALTER TABLE `held`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `held_basis`
--
ALTER TABLE `held_basis`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `held_eigenschaft`
--
ALTER TABLE `held_eigenschaft`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `held_gruppe`
--
ALTER TABLE `held_gruppe`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `held_kampf`
--
ALTER TABLE `held_kampf`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `held_nachteil`
--
ALTER TABLE `held_nachteil`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `held_talent`
--
ALTER TABLE `held_talent`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `held_vorteil`
--
ALTER TABLE `held_vorteil`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `held_waffe`
--
ALTER TABLE `held_waffe`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kampf`
--
ALTER TABLE `kampf`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ls`
--
ALTER TABLE `ls`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `merkmal`
--
ALTER TABLE `merkmal`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `spomo`
--
ALTER TABLE `spomo`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `spomoKurz`
--
ALTER TABLE `spomoKurz`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `talent`
--
ALTER TABLE `talent`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `talentgruppe`
--
ALTER TABLE `talentgruppe`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `talent_waffe`
--
ALTER TABLE `talent_waffe`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `variante`
--
ALTER TABLE `variante`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `waffe`
--
ALTER TABLE `waffe`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `zauber`
--
ALTER TABLE `zauber`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `zauber_merkmal`
--
ALTER TABLE `zauber_merkmal`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `zauber_spomoKurz`
--
ALTER TABLE `zauber_spomoKurz`
  MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gruppe`
--
ALTER TABLE `gruppe`
  ADD CONSTRAINT `gruppe_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `held`
--
ALTER TABLE `held`
  ADD CONSTRAINT `held_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `held_basis`
--
ALTER TABLE `held_basis`
  ADD CONSTRAINT `held_basis_ibfk_1` FOREIGN KEY (`id_held`) REFERENCES `held` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `held_basis_ibfk_2` FOREIGN KEY (`id_basis`) REFERENCES `basis` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `held_eigenschaft`
--
ALTER TABLE `held_eigenschaft`
  ADD CONSTRAINT `held_eigenschaft_ibfk_1` FOREIGN KEY (`id_held`) REFERENCES `held` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `held_eigenschaft_ibfk_2` FOREIGN KEY (`id_eigenschaft`) REFERENCES `eigenschaft` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `held_gruppe`
--
ALTER TABLE `held_gruppe`
  ADD CONSTRAINT `held_gruppe_ibfk_1` FOREIGN KEY (`id_gruppe`) REFERENCES `gruppe` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `held_gruppe_ibfk_2` FOREIGN KEY (`id_held`) REFERENCES `held` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `held_kampf`
--
ALTER TABLE `held_kampf`
  ADD CONSTRAINT `held_kampf_ibfk_1` FOREIGN KEY (`id_held`) REFERENCES `held` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `held_kampf_ibfk_2` FOREIGN KEY (`id_kampf`) REFERENCES `kampf` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `held_nachteil`
--
ALTER TABLE `held_nachteil`
  ADD CONSTRAINT `held_nachteil_ibfk_1` FOREIGN KEY (`id_held`) REFERENCES `held` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `held_talent`
--
ALTER TABLE `held_talent`
  ADD CONSTRAINT `held_talent_ibfk_1` FOREIGN KEY (`id_held`) REFERENCES `held` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `held_talent_ibfk_2` FOREIGN KEY (`id_talent`) REFERENCES `talent` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `held_vorteil`
--
ALTER TABLE `held_vorteil`
  ADD CONSTRAINT `held_vorteil_ibfk_1` FOREIGN KEY (`id_held`) REFERENCES `held` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `held_waffe`
--
ALTER TABLE `held_waffe`
  ADD CONSTRAINT `held_waffe_ibfk_1` FOREIGN KEY (`held_id`) REFERENCES `held` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `held_waffe_ibfk_2` FOREIGN KEY (`waffe_id`) REFERENCES `waffe` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `spomo`
--
ALTER TABLE `spomo`
  ADD CONSTRAINT `spomo_ibfk_1` FOREIGN KEY (`id_spomoKurz`) REFERENCES `spomoKurz` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `talent`
--
ALTER TABLE `talent`
  ADD CONSTRAINT `talent_ibfk_1` FOREIGN KEY (`id_eigenschaft1`) REFERENCES `eigenschaft` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `talent_ibfk_2` FOREIGN KEY (`id_eigenschaft2`) REFERENCES `eigenschaft` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `talent_ibfk_3` FOREIGN KEY (`id_eigenschaft3`) REFERENCES `eigenschaft` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `talent_ibfk_4` FOREIGN KEY (`id_eigenschaft3_alt`) REFERENCES `eigenschaft` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `talent_ibfk_5` FOREIGN KEY (`id_ls`) REFERENCES `ls` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `talent_waffe`
--
ALTER TABLE `talent_waffe`
  ADD CONSTRAINT `talent_waffe_ibfk_1` FOREIGN KEY (`id_talent`) REFERENCES `talent` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `talent_waffe_ibfk_2` FOREIGN KEY (`id_waffe`) REFERENCES `waffe` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `variante`
--
ALTER TABLE `variante`
  ADD CONSTRAINT `variante_ibfk_1` FOREIGN KEY (`id_zauber`) REFERENCES `zauber` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `zauber`
--
ALTER TABLE `zauber`
  ADD CONSTRAINT `zauber_ibfk_1` FOREIGN KEY (`id_eigenschaft1`) REFERENCES `eigenschaft` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `zauber_ibfk_2` FOREIGN KEY (`id_eigenschaft2`) REFERENCES `eigenschaft` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `zauber_ibfk_3` FOREIGN KEY (`id_eigenschaft3`) REFERENCES `eigenschaft` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `zauber_merkmal`
--
ALTER TABLE `zauber_merkmal`
  ADD CONSTRAINT `zauber_merkmal_ibfk_1` FOREIGN KEY (`id_zauber`) REFERENCES `zauber` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `zauber_merkmal_ibfk_2` FOREIGN KEY (`id_merkmal`) REFERENCES `merkmal` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `zauber_spomoKurz`
--
ALTER TABLE `zauber_spomoKurz`
  ADD CONSTRAINT `zauber_spomoKurz_ibfk_1` FOREIGN KEY (`id_zauber`) REFERENCES `zauber` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `zauber_spomoKurz_ibfk_2` FOREIGN KEY (`id_spomoKurz`) REFERENCES `spomoKurz` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
