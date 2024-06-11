-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2024 at 04:37 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acteur`
--

DROP TABLE IF EXISTS `acteur`;
CREATE TABLE IF NOT EXISTS `acteur` (
  `ID_Acteur` int NOT NULL AUTO_INCREMENT,
  `Nom_Acteur` varchar(255) NOT NULL,
  `Prenom_Acteur` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Acteur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aimer`
--

DROP TABLE IF EXISTS `aimer`;
CREATE TABLE IF NOT EXISTS `aimer` (
  `ID_User` int NOT NULL,
  `ID_Film` int NOT NULL,
  PRIMARY KEY (`ID_User`,`ID_Film`),
  KEY `ID_Film` (`ID_Film`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aimer`
--

INSERT INTO `aimer` (`ID_User`, `ID_Film`) VALUES
(2, 1),
(2, 3),
(2, 4),
(2, 10),
(2, 21),
(2, 23),
(3, 2),
(3, 5),
(3, 6),
(3, 8),
(3, 10),
(3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `ID_Film` int NOT NULL AUTO_INCREMENT,
  `Nom_film` varchar(255) NOT NULL,
  `Annee_film` year NOT NULL,
  `Genre` varchar(100) DEFAULT NULL,
  `Rating` float DEFAULT NULL,
  `Pays` varchar(100) DEFAULT NULL,
  `Production_company` varchar(255) DEFAULT NULL,
  `ID_Realisateur` int DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Film`),
  KEY `ID_Realisateur` (`ID_Realisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`ID_Film`, `Nom_film`, `Annee_film`, `Genre`, `Rating`, `Pays`, `Production_company`, `ID_Realisateur`, `duration`, `description`) VALUES
(1, 'Interstellar', '2014', 'Sci-Fi', 8.6, 'USA', 'Legendary Entertainment', 1, 169, 'Interstellar chronicles the experiences of a bunch of explorers that make usage of a newly detected wormhole overcome the vast spaces and to surpass the limitations.'),
(2, 'Titanic', '1997', 'Drama', 7.9, 'USA', 'Paramount', 2, 194, '101-year-old Rose DeWitt Bukater informs the narrative of her own life aboard the Titanic. A young Rose planks the boat with fiancé and her mum. Meanwhile, the Fabrizio De Rossi and Jack Dawson triumph tickets. Rose informs the story from Titanic\'s passin'),
(3, 'Forrest Gump', '1994', 'Comedy', 8.8, 'USA', 'Paramount', 3, 142, 'A man with a low IQ been present throughout significant historical events -- in each case, far surpassing what anyone guessed he can do and has accomplished great things. But despite his one true love eludes him.'),
(4, 'The Garfield Movie', '2024', 'Animation', 6, 'Hong Kong', 'Alcon Entertainment', 4, 101, 'Garfield, the world-famous, Monday-hating, lasagna-loving indoor cat, is about to have a wild outdoor adventure! After an unexpected reunion with his long-lost father – scruffy street cat Vic – Garfield and his canine friend Odie are forced from their per'),
(5, 'The Pianist', '2002', 'True Story', 8.5, 'France', 'Canal+', 5, 150, 'The story of pianist Wladyslaw Szpilman\'s adventures during the Nazi occupation in Warsaw. Szpilman uncovers work playing in a café If the city\'s Jews end up pushed into a ghetto. And if his family is deported in 1942, he stays below, works for some time '),
(6, 'The Lives of Others', '2006', 'Drama', 8.4, 'Germany', 'Creado Film', 6, 137, 'A love story set in East Berlin using the background of an Stasi culture that was controlled. Stasi captain Wieler is arranged to accompany author Dreyman and plunges deeper and deeper into his own life until he reaches the brink of doubting the system.'),
(7, 'Inception', '2010', 'Sci-Fi', 8.8, 'United Kingdom', 'Legendary Entertainment', 1, 148, 'Cobb, a skilled thief who devotes corporate espionage by infiltrating the subconscious of his targets emerges a opportunity to regain his previous life as payment for some task regarded as impossible:\"inception\", the implantation of some other person\'s id'),
(8, 'Oppenheimer', '2023', 'True Story', 8.8, 'United Kingdom', 'Syncopy', 1, 181, 'The story of J. Robert Oppenheimer’s role in the development of the atomic bomb during World War II.'),
(9, 'The Dark Knight', '2008', 'Action', 9, 'United Kingdom', 'DC Entertainment', 1, 152, 'The stakes are raised by Bat man in his war on crime. With the help of Lt. Jim Gordon and District Attorney Harvey Dent, Batman sets out to dismantle the rest criminal associations that plague the roads. They soon are prey to your reign of insanity unleas'),
(10, '12 Angry Men', '1957', 'Drama', 9, 'USA', 'United Artists', 7, 97, 'The defense and the prosecution have rested and the jury is filing to determine if a is innocent or guilty of murdering his father. What begins as an open and closed case becomes a mini-drama of every one of the jurors\' prejudices and preconceptions about'),
(11, 'Avatar', '2009', 'Sci-Fi', 7.8, 'USA', '20th Century Fox', 2, 162, 'From the 22nd century, there is a paraplegic Marine dispatched to the moon Pandora to some mission that was special, however becomes protecting a alien civilization and torn between following orders.'),
(12, 'The Shawshank Redemption', '1994', 'Drama', 9.3, 'USA', 'Warner Bros. Pictures', 8, 142, 'Framed from the 1940s for its dual murder of his wife and her lover, upstanding banker Andy Dufresne begins a new life at the Shawshank prison, where he places his bookkeeping skills to make use of an amoral warden. Throughout his long stretch in prison, '),
(13, 'The Last King of Scotland', '2006', 'Drama', 7.6, 'Uganda', 'Fox Searchlight Pictures', 9, 121, 'The filming of a hit reality TV show goes horribly wrong when a group of small town cops respond to a telephone which brings an entirely new meaning to the term disturbance.'),
(14, 'Schindler\'s List', '1993', 'True Story', 9, 'USA', 'Universal Pictures', 10, 195, 'The story of businessman Oskar Schindler saved over a million lives from the Nazis while they worked as slaves from his own factory during World War II.'),
(15, 'A Beautiful Mind', '2001', 'True Story', 8.6, 'USA', 'Universal Pictures', 11, 135, 'John Nash is a brilliant but asocial mathematician fighting schizophrenia. After he accepts secret work in cryptography, his life requires a turn for your nightmarish.'),
(16, 'Dune: Part Two', '2024', 'Action', 8.6, 'USA', 'Legendary Pictures', 12, 167, 'Follow the mythic journey of Paul Atreides as he unites with Chani and the Fremen while on a path of revenge against the conspirators who destroyed his family. Facing a choice between the love of his life and the fate of the known universe, Paul endeavors'),
(17, 'Inside Out 2', '2024', 'Animation', 8, 'USA', 'Pixar', 13, 95, 'Growing up may be a rough road, and it\'s no exception when her dad starts a brand new project at San Francisco, for Riley, who is uprooted from her Midwest lifetime. Riley\'s guiding emotions-- Joy, Stress, Anger, Disgust and Sadness--live in Headquarters,'),
(18, 'Barbie', '2023', 'Comedy', 6.8, 'USA', 'Warner Bros. Entertainment', 14, 114, 'Barbie and Ken are having the time of their lives in the colorful and seemingly perfect world of Barbie Land. However, when they get a chance to go to the real world, they soon discover the joys and perils of living among humans.'),
(19, 'The Seventh Seal', '1957', 'Drama', 8.1, 'Sweden', 'Svensk Filmindustri', 15, 96, 'When Letting Swedish knight Antonius Block returns home from the Crusades to find his country he challenges Death. Block puts off meeting up with traveling players Jof and his wife, Mia, also becoming decided to dodge Death long enough to commit one redem'),
(20, 'The Good, the Bad and the Ugly', '1966', 'Western', 8.8, 'USA', 'United Artists', 16, 161, 'While the Civil War rages between the Confederacy and the Union, three men -- a callous hit man, a silent loner and a bandit -- reunite that the American Southwest looking for a strongbox containing $200,000 in stone.'),
(21, 'The Lighthouse', '2019', 'Drama', 7.4, 'USA', 'RT Features', 17, 110, 'The hallucinatory and hypnotic story of 2 lighthouse keepers on a remote and mystical New England island at the 1890s.'),
(22, 'Taxi Driver', '1976', 'Crime', 8.2, 'USA', ' Columbia Pictures', 18, 114, 'A mentally unstable Vietnam War veteran works as a night time taxi driver in New York City where the perceived decadence and sleaze feeds his urge for action, attempting to save a prostitute .'),
(23, 'The GodFather', '1972', 'Crime', 9.2, 'USA', 'Paramount', 19, 175, 'Spanning the years 1945 to 1955, a chronicle of this literary Corleone crime family that is Italian-American. Vito Corleone survives an attempt on his own life, his youngest child, when crime family patriarch, Michael steps in to care for the prospective ');

-- --------------------------------------------------------

--
-- Table structure for table `joue`
--

DROP TABLE IF EXISTS `joue`;
CREATE TABLE IF NOT EXISTS `joue` (
  `ID_Film` int NOT NULL,
  `ID_Acteur` int NOT NULL,
  `Role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Film`,`ID_Acteur`),
  KEY `ID_Acteur` (`ID_Acteur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realisateur`
--

DROP TABLE IF EXISTS `realisateur`;
CREATE TABLE IF NOT EXISTS `realisateur` (
  `ID_Realisateur` int NOT NULL AUTO_INCREMENT,
  `Nom_Realisateur` varchar(255) NOT NULL,
  `Prenom_Realisateur` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Realisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `realisateur`
--

INSERT INTO `realisateur` (`ID_Realisateur`, `Nom_Realisateur`, `Prenom_Realisateur`) VALUES
(1, 'Nolan', 'Christopher'),
(2, 'Cameron', 'James'),
(3, 'Zemeckis', 'Robert'),
(4, 'Dindal', 'Mark'),
(5, 'Polanski', 'Roman'),
(6, 'Henckel von Donnersmarck', 'Florian'),
(7, 'Lumet', 'Sidney'),
(8, 'Darabont', 'Frank'),
(9, 'Macdonald', 'Kevin'),
(10, 'Spielberg', 'Steven'),
(11, 'Howard', 'Ron'),
(12, 'Villeneuve', 'Denis'),
(13, 'Mann', 'Kelsey'),
(14, 'Gerwig', 'Greta'),
(15, 'Bergman', 'Ingmar'),
(16, 'Leone', 'Sergio'),
(17, 'Robert', 'Eggers'),
(18, 'Martin', 'Scorsese'),
(19, 'Mitchell Rubin', 'Peter');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_User` int NOT NULL AUTO_INCREMENT,
  `Nom_User` varchar(255) NOT NULL,
  `Prenom_User` varchar(255) NOT NULL,
  `Date_naiss` date NOT NULL,
  `Email_User` varchar(255) NOT NULL,
  `mdp_User` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_User`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_User`, `Nom_User`, `Prenom_User`, `Date_naiss`, `Email_User`, `mdp_User`) VALUES
(1, 'Jamali', 'Hassan', '0000-00-00', 'hassan.jamali@gmail.com', '1234'),
(2, 'Tahereddine', 'Tahereddine', '2002-04-28', 'tahereddine2002@gmail.com', '1234'),
(3, 'Salah', 'Ibrahim', '2003-04-04', 'salah.ibrahim@gmail.com', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
