-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 13 Φεβ 2019 στις 16:41:14
-- Έκδοση διακομιστή: 10.1.25-MariaDB
-- Έκδοση PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `e-classesdb`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `semester` int(4) NOT NULL,
  `img_course` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `courses`
--

INSERT INTO `courses` (`ID`, `name`, `semester`, `img_course`) VALUES
(1, 'Ασφάλεια Πληροφοριακών Συστημάτων', 6, 'img/Greekchapterlogo.gif'),
(2, 'Δίκτυα Η/Υ', 5, 'img/Diktia_Hlektronikon_1.jpg'),
(3, 'Γραφικά Υπολογιστών', 7, 'img/grafika.png'),
(4, 'Αλγοριθμική και Προγραμματισμός', 1, 'img/algorithmiki_kai_programmatismos_img.png'),
(5, 'Εισαγωγή στην Πληροφορική', 1, 'img/eisagwgi_stin_pliroforiki.jpg'),
(6, 'Ψηφιακά Συστήματα', 1, 'img/psifiaka_sistimata.jpg'),
(7, 'Αντικειμενοστρεφής Προγραμματισμός', 2, 'img/OOP.png'),
(8, 'Διακριτά Μαθηματικά', 2, 'img/diakrita_mathimatika.jpg'),
(9, 'Αριθμητική Ανάλυση', 3, 'img/arithmitiki_analisi.jpg'),
(10, 'Συστήματα Διαχείρισης Βάσεων Δεδομένων', 3, 'img/sistimata_diaxeirisis_basewn_dedomenwn.jpg'),
(11, 'Δεξιότητες Επικοινωνίας/Κοινωνικά Δίκτυα', 1, 'img/deksiotites_kai_koinwnikaDiktia.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `grades`
--

CREATE TABLE `grades` (
  `studentID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `grade` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `grades`
--

INSERT INTO `grades` (`studentID`, `courseID`, `grade`) VALUES
(124006, 4, 7),
(124006, 7, 9),
(124006, 8, 5),
(124007, 4, 9),
(134003, 4, 6),
(144002, 4, 8),
(144002, 5, 9),
(144002, 6, 6);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `students`
--

CREATE TABLE `students` (
  `AM` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(30) COLLATE utf8_bin NOT NULL,
  `curr_sem` int(11) DEFAULT NULL,
  `is_teacher` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `have_chosen_teaching_lessons` int(11) NOT NULL,
  `gender` varchar(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `students`
--

INSERT INTO `students` (`AM`, `firstname`, `lastname`, `curr_sem`, `is_teacher`, `username`, `password`, `email`, `have_chosen_teaching_lessons`, `gender`) VALUES
(124005, 'Panos', 'Pente', 5, 0, 'panos', '123', 'panos@gmail.com', 0, 'M'),
(124006, 'Nikos', 'Eksi', 6, 1, 'nikos', '123', 'nikos@gmail.com', 1, 'M'),
(124007, 'Georgia', 'Efta', 7, 1, 'georgia', '123', 'georgia@gmail.com', 1, 'F'),
(134003, 'Takis', 'Tria', 3, 1, 'takis', '123', 'takis@gmail.com', 1, 'M'),
(134004, 'Sakis', 'Tessera', 2, 0, 'sakis', '123', 'sakis@gmail.com', 0, 'M'),
(144002, 'Makis', 'Dyo', 1, 1, 'mpampis', '1234', 'nerodantetm@gmail.com', 1, 'M');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `teaches`
--

CREATE TABLE `teaches` (
  `courseID` int(11) NOT NULL,
  `studentID` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `teaches`
--

INSERT INTO `teaches` (`courseID`, `studentID`) VALUES
(4, 'georgia'),
(4, 'mpampis'),
(4, 'nikos'),
(5, 'mpampis'),
(7, 'nikos');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`studentID`,`courseID`);

--
-- Ευρετήρια για πίνακα `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`AM`);

--
-- Ευρετήρια για πίνακα `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`courseID`,`studentID`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
