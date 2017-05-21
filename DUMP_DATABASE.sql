-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2017 at 12:56 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annunci-libri-universitari`
--

-- --------------------------------------------------------

--
-- Table structure for table `Ambito`
--

CREATE TABLE `Ambito` (
  `id_ambito` int(10) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ambito`
--

INSERT INTO `Ambito` (`id_ambito`, `nome`) VALUES
(1, 'Scientifico');

-- --------------------------------------------------------

--
-- Table structure for table `Annuncio`
--

CREATE TABLE `Annuncio` (
  `id_annuncio` int(10) NOT NULL,
  `isbn_libro` varchar(13) DEFAULT NULL,
  `id_persona` varchar(20) DEFAULT NULL,
  `corso` int(10) DEFAULT NULL,
  `citta_consegna` int(10) DEFAULT NULL,
  `se_spedisce` tinyint(1) NOT NULL,
  `descrizione` varchar(200) NOT NULL,
  `condizione` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Annuncio`
--

INSERT INTO `Annuncio` (`id_annuncio`, `isbn_libro`, `id_persona`, `corso`, `citta_consegna`, `se_spedisce`, `descrizione`, `condizione`) VALUES
(1, '9788879591379', 'enrico', 1, 1, 1, 'è proprio un libro carino :)', '5');

-- --------------------------------------------------------

--
-- Table structure for table `AnnunciOsservati`
--

CREATE TABLE `AnnunciOsservati` (
  `id` int(10) NOT NULL,
  `utente` varchar(20) DEFAULT NULL,
  `annuncio` int(10) DEFAULT NULL,
  `data_aggiunta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AnnunciOsservati`
--

INSERT INTO `AnnunciOsservati` (`id`, `utente`, `annuncio`, `data_aggiunta`) VALUES
(1, 'ilaria', 1, '2017-05-20'),
(2, 'daniele', 1, '2017-05-19'),
(3, 'rajan', 1, '2017-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `Autore`
--

CREATE TABLE `Autore` (
  `id_autore` int(10) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Autore`
--

INSERT INTO `Autore` (`id_autore`, `nome`) VALUES
(1, 'Mazzoldi'),
(2, 'Nigro'),
(3, 'Voci');

-- --------------------------------------------------------

--
-- Table structure for table `AutoriLibri`
--

CREATE TABLE `AutoriLibri` (
  `id` int(10) NOT NULL,
  `autore` int(10) NOT NULL,
  `libro` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AutoriLibri`
--

INSERT INTO `AutoriLibri` (`id`, `autore`, `libro`) VALUES
(1, 1, '9788879591379'),
(2, 2, '9788879591379'),
(3, 3, '9788879591379');

-- --------------------------------------------------------

--
-- Table structure for table `CasaEditrice`
--

CREATE TABLE `CasaEditrice` (
  `id_casaeditrice` int(10) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CasaEditrice`
--

INSERT INTO `CasaEditrice` (`id_casaeditrice`, `nome`) VALUES
(1, 'Edises');

-- --------------------------------------------------------

--
-- Table structure for table `Citta`
--

CREATE TABLE `Citta` (
  `id_citta` int(10) NOT NULL,
  `comune` varchar(60) NOT NULL,
  `provincia` varchar(60) NOT NULL,
  `id_stato` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Citta`
--

INSERT INTO `Citta` (`id_citta`, `comune`, `provincia`, `id_stato`) VALUES
(1, 'L\'Aquila', 'L\'Aquila', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `Corso`
--

CREATE TABLE `Corso` (
  `id_corso` int(10) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `universita` int(10) NOT NULL,
  `professore` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Corso`
--

INSERT INTO `Corso` (`id_corso`, `nome`, `universita`, `professore`) VALUES
(1, 'Fisica 1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Libro`
--

CREATE TABLE `Libro` (
  `isbn` varchar(13) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `anno_stampa` year(4) NOT NULL,
  `id_casaeditrice` int(10) DEFAULT NULL,
  `id_ambito` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Libro`
--

INSERT INTO `Libro` (`isbn`, `titolo`, `anno_stampa`, `id_casaeditrice`, `id_ambito`) VALUES
('9788879591379', 'Fisica Generale I', 2001, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Messaggio`
--

CREATE TABLE `Messaggio` (
  `acquirente` varchar(20) NOT NULL,
  `id_annuncio` int(10) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `testo` varchar(200) DEFAULT NULL,
  `da_acquirente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Messaggio`
--

INSERT INTO `Messaggio` (`acquirente`, `id_annuncio`, `data`, `ora`, `testo`, `da_acquirente`) VALUES
('daniele', 1, '2017-05-19', '20:47:26', 'Ciao, bel libro carino. è lavato con perlana?', 1),
('daniele', 1, '2017-05-20', '14:31:34', 'si, perlana black', 0),
('ilaria', 1, '2017-05-20', '10:27:19', 'ciao, sono interessata al libro', 1),
('ilaria', 1, '2017-05-20', '16:35:46', 'addaver?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Persona`
--

CREATE TABLE `Persona` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipologia_utente` int(1) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `cognome` varchar(20) DEFAULT NULL,
  `mail` varchar(40) NOT NULL,
  `id_stato` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Persona`
--

INSERT INTO `Persona` (`username`, `password`, `tipologia_utente`, `nome`, `cognome`, `mail`, `id_stato`) VALUES
('daniele', 'daniele', 0, NULL, NULL, 'daniele@daniele.com', NULL),
('enrico', 'enrico', 0, NULL, NULL, 'enrico@enrico.com', NULL),
('ilaria', 'ilaria', 0, NULL, NULL, 'ilaria@ilaria.com', NULL),
('rajan', 'rajan', 0, NULL, NULL, 'rajan@rajan.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Professore`
--

CREATE TABLE `Professore` (
  `id_professore` int(10) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Professore`
--

INSERT INTO `Professore` (`id_professore`, `nome`) VALUES
(1, 'Mecozzi');

-- --------------------------------------------------------

--
-- Table structure for table `Stato`
--

CREATE TABLE `Stato` (
  `id_stato` varchar(2) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Stato`
--

INSERT INTO `Stato` (`id_stato`, `nome`) VALUES
('IT', 'Italia');

-- --------------------------------------------------------

--
-- Table structure for table `Universita`
--

CREATE TABLE `Universita` (
  `id_universita` int(10) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `citta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Universita`
--

INSERT INTO `Universita` (`id_universita`, `nome`, `citta`) VALUES
(1, 'Università degli Studi dell\'Aquila', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Ambito`
--
ALTER TABLE `Ambito`
  ADD PRIMARY KEY (`id_ambito`);

--
-- Indexes for table `Annuncio`
--
ALTER TABLE `Annuncio`
  ADD PRIMARY KEY (`id_annuncio`),
  ADD KEY `fk_annuncio_libro` (`isbn_libro`),
  ADD KEY `fk_annuncio_persona` (`id_persona`),
  ADD KEY `fk_annuncio_citta` (`citta_consegna`),
  ADD KEY `fk_annuncio_corso` (`corso`);

--
-- Indexes for table `AnnunciOsservati`
--
ALTER TABLE `AnnunciOsservati`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_annunciOsservati_utente` (`utente`),
  ADD KEY `fk_annunciOsservati_annuncio` (`annuncio`);

--
-- Indexes for table `Autore`
--
ALTER TABLE `Autore`
  ADD PRIMARY KEY (`id_autore`);

--
-- Indexes for table `AutoriLibri`
--
ALTER TABLE `AutoriLibri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_autorilibri_autore` (`autore`),
  ADD KEY `fk_autorilibri_libro` (`libro`);

--
-- Indexes for table `CasaEditrice`
--
ALTER TABLE `CasaEditrice`
  ADD PRIMARY KEY (`id_casaeditrice`);

--
-- Indexes for table `Citta`
--
ALTER TABLE `Citta`
  ADD PRIMARY KEY (`id_citta`),
  ADD KEY `fk_citta_stato` (`id_stato`);

--
-- Indexes for table `Corso`
--
ALTER TABLE `Corso`
  ADD PRIMARY KEY (`id_corso`),
  ADD KEY `fk_corso_universita` (`universita`),
  ADD KEY `fk_corso_professore` (`professore`);

--
-- Indexes for table `Libro`
--
ALTER TABLE `Libro`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `fk_libro_casaeditrice` (`id_casaeditrice`),
  ADD KEY `fk_libro_ambito` (`id_ambito`);

--
-- Indexes for table `Messaggio`
--
ALTER TABLE `Messaggio`
  ADD PRIMARY KEY (`acquirente`,`id_annuncio`,`data`,`ora`),
  ADD KEY `fk_messaggio_persona` (`acquirente`),
  ADD KEY `fk_messaggio_annuncio` (`id_annuncio`);

--
-- Indexes for table `Persona`
--
ALTER TABLE `Persona`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_persona_stato` (`id_stato`);

--
-- Indexes for table `Professore`
--
ALTER TABLE `Professore`
  ADD PRIMARY KEY (`id_professore`);

--
-- Indexes for table `Stato`
--
ALTER TABLE `Stato`
  ADD PRIMARY KEY (`id_stato`);

--
-- Indexes for table `Universita`
--
ALTER TABLE `Universita`
  ADD PRIMARY KEY (`id_universita`),
  ADD KEY `citta` (`citta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ambito`
--
ALTER TABLE `Ambito`
  MODIFY `id_ambito` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Annuncio`
--
ALTER TABLE `Annuncio`
  MODIFY `id_annuncio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `AnnunciOsservati`
--
ALTER TABLE `AnnunciOsservati`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Autore`
--
ALTER TABLE `Autore`
  MODIFY `id_autore` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `AutoriLibri`
--
ALTER TABLE `AutoriLibri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `CasaEditrice`
--
ALTER TABLE `CasaEditrice`
  MODIFY `id_casaeditrice` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Citta`
--
ALTER TABLE `Citta`
  MODIFY `id_citta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Corso`
--
ALTER TABLE `Corso`
  MODIFY `id_corso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Professore`
--
ALTER TABLE `Professore`
  MODIFY `id_professore` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Universita`
--
ALTER TABLE `Universita`
  MODIFY `id_universita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Annuncio`
--
ALTER TABLE `Annuncio`
  ADD CONSTRAINT `fk_annuncio_citta` FOREIGN KEY (`citta_consegna`) REFERENCES `Citta` (`id_citta`),
  ADD CONSTRAINT `fk_annuncio_corso` FOREIGN KEY (`corso`) REFERENCES `Corso` (`id_corso`),
  ADD CONSTRAINT `fk_annuncio_libro` FOREIGN KEY (`isbn_libro`) REFERENCES `Libro` (`isbn`),
  ADD CONSTRAINT `fk_annuncio_persona` FOREIGN KEY (`id_persona`) REFERENCES `Persona` (`username`);

--
-- Constraints for table `AnnunciOsservati`
--
ALTER TABLE `AnnunciOsservati`
  ADD CONSTRAINT `fk_annunciOsservati_annuncio` FOREIGN KEY (`annuncio`) REFERENCES `Annuncio` (`id_annuncio`),
  ADD CONSTRAINT `fk_annunciOsservati_utente` FOREIGN KEY (`utente`) REFERENCES `Persona` (`username`);

--
-- Constraints for table `Citta`
--
ALTER TABLE `Citta`
  ADD CONSTRAINT `fk_citta_stato` FOREIGN KEY (`id_stato`) REFERENCES `Stato` (`id_stato`);

--
-- Constraints for table `Corso`
--
ALTER TABLE `Corso`
  ADD CONSTRAINT `fk_corso_professore` FOREIGN KEY (`professore`) REFERENCES `Professore` (`id_professore`),
  ADD CONSTRAINT `fk_corso_universita` FOREIGN KEY (`universita`) REFERENCES `Universita` (`id_universita`);

--
-- Constraints for table `Libro`
--
ALTER TABLE `Libro`
  ADD CONSTRAINT `fk_libro_ambito` FOREIGN KEY (`id_ambito`) REFERENCES `Ambito` (`id_ambito`),
  ADD CONSTRAINT `fk_libro_casaeditrice` FOREIGN KEY (`id_casaeditrice`) REFERENCES `CasaEditrice` (`id_casaeditrice`);

--
-- Constraints for table `Messaggio`
--
ALTER TABLE `Messaggio`
  ADD CONSTRAINT `fk_messaggio_annuncio` FOREIGN KEY (`id_annuncio`) REFERENCES `Annuncio` (`id_annuncio`),
  ADD CONSTRAINT `fk_messaggio_persona` FOREIGN KEY (`acquirente`) REFERENCES `Persona` (`username`);

--
-- Constraints for table `Persona`
--
ALTER TABLE `Persona`
  ADD CONSTRAINT `fk_persona_stato` FOREIGN KEY (`id_stato`) REFERENCES `Stato` (`id_stato`);

--
-- Constraints for table `Universita`
--
ALTER TABLE `Universita`
  ADD CONSTRAINT `fk_universita_citta` FOREIGN KEY (`citta`) REFERENCES `Citta` (`id_citta`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
