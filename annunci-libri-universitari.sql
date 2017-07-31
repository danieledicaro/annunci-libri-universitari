-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Lug 31, 2017 alle 13:22
-- Versione del server: 10.1.21-MariaDB
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Unibookstore`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Ambito`
--

CREATE TABLE `Ambito` (
  `id_ambito` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Ambito`
--

INSERT INTO `Ambito` (`id_ambito`, `nome`) VALUES
(1, 'Scientifico');

-- --------------------------------------------------------

--
-- Struttura della tabella `Annuncio`
--

CREATE TABLE `Annuncio` (
  `id_annuncio` int(10) NOT NULL,
  `libro` varchar(13) NOT NULL,
  `venditore` varchar(20) NOT NULL,
  `corso` int(10) DEFAULT NULL,
  `citta_consegna` int(10) DEFAULT NULL,
  `se_spedisce` tinyint(1) NOT NULL,
  `descrizione` varchar(200) DEFAULT NULL,
  `condizione` enum('1','2','3','4','5') NOT NULL,
  `foto` blob NOT NULL,
  `data` date NOT NULL,
  `prezzo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Annuncio`
--

INSERT INTO `Annuncio` (`id_annuncio`, `libro`, `venditore`, `corso`, `citta_consegna`, `se_spedisce`, `descrizione`, `condizione`, `foto`, `data`, `prezzo`) VALUES
(1, '9788879591379', 'enrico', 1, 1, 1, 'è proprio un libro carino :)', '5', '', '2017-07-31', 0),
(9, '9788879591379', 'ciao', 1, 1, 0, '', '', '', '2017-08-23', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `AnnunciOsservati`
--

CREATE TABLE `AnnunciOsservati` (
  `id` int(10) NOT NULL,
  `utente` varchar(20) NOT NULL,
  `annuncio` int(10) NOT NULL,
  `data_aggiunta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `AnnunciOsservati`
--

INSERT INTO `AnnunciOsservati` (`id`, `utente`, `annuncio`, `data_aggiunta`) VALUES
(1, 'ilaria', 1, '2017-05-20'),
(2, 'daniele', 1, '2017-05-19'),
(3, 'rajan', 1, '2017-05-20');

-- --------------------------------------------------------

--
-- Struttura della tabella `Autore`
--

CREATE TABLE `Autore` (
  `id_autore` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Autore`
--

INSERT INTO `Autore` (`id_autore`, `nome`) VALUES
(1, 'Mazzoldi'),
(2, 'Nigro'),
(3, 'Voci');

-- --------------------------------------------------------

--
-- Struttura della tabella `AutoreLibro`
--

CREATE TABLE `AutoreLibro` (
  `id` int(10) NOT NULL,
  `autore` int(10) NOT NULL,
  `libro` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `AutoreLibro`
--

INSERT INTO `AutoreLibro` (`id`, `autore`, `libro`) VALUES
(1, 1, '9788879591379'),
(2, 2, '9788879591379'),
(3, 3, '9788879591379');

-- --------------------------------------------------------

--
-- Struttura della tabella `CasaEditrice`
--

CREATE TABLE `CasaEditrice` (
  `id_casaeditrice` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `CasaEditrice`
--

INSERT INTO `CasaEditrice` (`id_casaeditrice`, `nome`) VALUES
(1, 'Edises');

-- --------------------------------------------------------

--
-- Struttura della tabella `Citta`
--

CREATE TABLE `Citta` (
  `id_citta` int(10) NOT NULL,
  `comune` varchar(60) NOT NULL,
  `provincia` varchar(60) NOT NULL,
  `stato` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Citta`
--

INSERT INTO `Citta` (`id_citta`, `comune`, `provincia`, `stato`) VALUES
(1, 'L\'Aquila', 'L\'Aquila', 'IT');

-- --------------------------------------------------------

--
-- Struttura della tabella `Corso`
--

CREATE TABLE `Corso` (
  `id_corso` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `universita` int(10) NOT NULL,
  `professore` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Corso`
--

INSERT INTO `Corso` (`id_corso`, `nome`, `universita`, `professore`) VALUES
(1, 'Fisica 1', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `Libro`
--

CREATE TABLE `Libro` (
  `isbn` varchar(13) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `anno_stampa` date NOT NULL,
  `casaeditrice` int(10) DEFAULT NULL,
  `ambito` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Libro`
--

INSERT INTO `Libro` (`isbn`, `titolo`, `anno_stampa`, `casaeditrice`, `ambito`) VALUES
('9788879591379', 'Fisica Generale I', '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `Messaggio`
--

CREATE TABLE `Messaggio` (
  `acquirente` varchar(20) NOT NULL,
  `annuncio` int(10) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `testo` varchar(200) NOT NULL,
  `da_acquirente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Messaggio`
--

INSERT INTO `Messaggio` (`acquirente`, `annuncio`, `data`, `ora`, `testo`, `da_acquirente`) VALUES
('daniele', 1, '2017-05-19', '20:47:26', 'Ciao, bel libro carino. è lavato con perlana?', 1),
('daniele', 1, '2017-05-20', '14:31:34', 'si, perlana black', 0),
('ilaria', 1, '2017-05-20', '10:27:19', 'ciao, sono interessata al libro', 1),
('ilaria', 1, '2017-05-20', '16:35:46', 'addaver?', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `Professore`
--

CREATE TABLE `Professore` (
  `id_professore` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Professore`
--

INSERT INTO `Professore` (`id_professore`, `nome`) VALUES
(1, 'Mecozzi');

-- --------------------------------------------------------

--
-- Struttura della tabella `Stato`
--

CREATE TABLE `Stato` (
  `id_stato` varchar(2) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Stato`
--

INSERT INTO `Stato` (`id_stato`, `nome`) VALUES
('IT', 'Italia');

-- --------------------------------------------------------

--
-- Struttura della tabella `Universita`
--

CREATE TABLE `Universita` (
  `id_universita` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `citta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Universita`
--

INSERT INTO `Universita` (`id_universita`, `nome`, `citta`) VALUES
(1, 'Università degli Studi dell\'Aquila', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipologia_utente` int(1) NOT NULL DEFAULT '0',
  `nome` varchar(20) DEFAULT NULL,
  `cognome` varchar(20) DEFAULT NULL,
  `mail` varchar(40) NOT NULL,
  `stato` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Utente`
--

INSERT INTO `Utente` (`username`, `password`, `tipologia_utente`, `nome`, `cognome`, `mail`, `stato`) VALUES
('ciao', 'ciao', 0, '', '', 'ciao@ciao.com', 'IT'),
('daniele', 'daniele', 0, NULL, NULL, 'daniele@daniele.com', 'IT'),
('enrico', 'enrico', 0, NULL, NULL, 'enrico@enrico.com', 'IT'),
('ilaria', 'ilaria', 0, NULL, NULL, 'ilaria@ilaria.com', 'IT'),
('rajan', 'rajan', 0, NULL, NULL, 'rajan@rajan.com', 'IT');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Ambito`
--
ALTER TABLE `Ambito`
  ADD PRIMARY KEY (`id_ambito`);

--
-- Indici per le tabelle `Annuncio`
--
ALTER TABLE `Annuncio`
  ADD PRIMARY KEY (`id_annuncio`),
  ADD KEY `fk_annuncio_libro` (`libro`),
  ADD KEY `fk_annuncio_persona` (`venditore`),
  ADD KEY `fk_annuncio_citta` (`citta_consegna`),
  ADD KEY `fk_annuncio_corso` (`corso`);

--
-- Indici per le tabelle `AnnunciOsservati`
--
ALTER TABLE `AnnunciOsservati`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_annunciOsservati_utente` (`utente`),
  ADD KEY `fk_annunciOsservati_annuncio` (`annuncio`);

--
-- Indici per le tabelle `Autore`
--
ALTER TABLE `Autore`
  ADD PRIMARY KEY (`id_autore`);

--
-- Indici per le tabelle `AutoreLibro`
--
ALTER TABLE `AutoreLibro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_autorilibri_autore` (`autore`),
  ADD KEY `fk_autorilibri_libro` (`libro`);

--
-- Indici per le tabelle `CasaEditrice`
--
ALTER TABLE `CasaEditrice`
  ADD PRIMARY KEY (`id_casaeditrice`);

--
-- Indici per le tabelle `Citta`
--
ALTER TABLE `Citta`
  ADD PRIMARY KEY (`id_citta`),
  ADD KEY `fk_citta_stato` (`stato`);

--
-- Indici per le tabelle `Corso`
--
ALTER TABLE `Corso`
  ADD PRIMARY KEY (`id_corso`),
  ADD KEY `fk_corso_universita` (`universita`),
  ADD KEY `fk_corso_professore` (`professore`);

--
-- Indici per le tabelle `Libro`
--
ALTER TABLE `Libro`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `fk_libro_casaeditrice` (`casaeditrice`),
  ADD KEY `fk_libro_ambito` (`ambito`);

--
-- Indici per le tabelle `Messaggio`
--
ALTER TABLE `Messaggio`
  ADD PRIMARY KEY (`acquirente`,`annuncio`,`data`,`ora`),
  ADD KEY `fk_messaggio_persona` (`acquirente`),
  ADD KEY `fk_messaggio_annuncio` (`annuncio`);

--
-- Indici per le tabelle `Professore`
--
ALTER TABLE `Professore`
  ADD PRIMARY KEY (`id_professore`);

--
-- Indici per le tabelle `Stato`
--
ALTER TABLE `Stato`
  ADD PRIMARY KEY (`id_stato`);

--
-- Indici per le tabelle `Universita`
--
ALTER TABLE `Universita`
  ADD PRIMARY KEY (`id_universita`),
  ADD KEY `citta` (`citta`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_persona_stato` (`stato`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Ambito`
--
ALTER TABLE `Ambito`
  MODIFY `id_ambito` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `Annuncio`
--
ALTER TABLE `Annuncio`
  MODIFY `id_annuncio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT per la tabella `AnnunciOsservati`
--
ALTER TABLE `AnnunciOsservati`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `Autore`
--
ALTER TABLE `Autore`
  MODIFY `id_autore` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `AutoreLibro`
--
ALTER TABLE `AutoreLibro`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `CasaEditrice`
--
ALTER TABLE `CasaEditrice`
  MODIFY `id_casaeditrice` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `Citta`
--
ALTER TABLE `Citta`
  MODIFY `id_citta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `Corso`
--
ALTER TABLE `Corso`
  MODIFY `id_corso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `Professore`
--
ALTER TABLE `Professore`
  MODIFY `id_professore` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `Universita`
--
ALTER TABLE `Universita`
  MODIFY `id_universita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Annuncio`
--
ALTER TABLE `Annuncio`
  ADD CONSTRAINT `fk_annuncio_citta` FOREIGN KEY (`citta_consegna`) REFERENCES `Citta` (`id_citta`),
  ADD CONSTRAINT `fk_annuncio_corso` FOREIGN KEY (`corso`) REFERENCES `Corso` (`id_corso`),
  ADD CONSTRAINT `fk_annuncio_libro` FOREIGN KEY (`libro`) REFERENCES `Libro` (`isbn`),
  ADD CONSTRAINT `fk_annuncio_persona` FOREIGN KEY (`venditore`) REFERENCES `Utente` (`username`);

--
-- Limiti per la tabella `AnnunciOsservati`
--
ALTER TABLE `AnnunciOsservati`
  ADD CONSTRAINT `fk_annunciOsservati_annuncio` FOREIGN KEY (`annuncio`) REFERENCES `Annuncio` (`id_annuncio`),
  ADD CONSTRAINT `fk_annunciOsservati_utente` FOREIGN KEY (`utente`) REFERENCES `Utente` (`username`);

--
-- Limiti per la tabella `Citta`
--
ALTER TABLE `Citta`
  ADD CONSTRAINT `fk_citta_stato` FOREIGN KEY (`stato`) REFERENCES `Stato` (`id_stato`);

--
-- Limiti per la tabella `Corso`
--
ALTER TABLE `Corso`
  ADD CONSTRAINT `fk_corso_professore` FOREIGN KEY (`professore`) REFERENCES `Professore` (`id_professore`),
  ADD CONSTRAINT `fk_corso_universita` FOREIGN KEY (`universita`) REFERENCES `Universita` (`id_universita`);

--
-- Limiti per la tabella `Libro`
--
ALTER TABLE `Libro`
  ADD CONSTRAINT `fk_libro_ambito` FOREIGN KEY (`ambito`) REFERENCES `Ambito` (`id_ambito`),
  ADD CONSTRAINT `fk_libro_casaeditrice` FOREIGN KEY (`casaeditrice`) REFERENCES `CasaEditrice` (`id_casaeditrice`);

--
-- Limiti per la tabella `Messaggio`
--
ALTER TABLE `Messaggio`
  ADD CONSTRAINT `fk_messaggio_annuncio` FOREIGN KEY (`annuncio`) REFERENCES `Annuncio` (`id_annuncio`),
  ADD CONSTRAINT `fk_messaggio_persona` FOREIGN KEY (`acquirente`) REFERENCES `Utente` (`username`);

--
-- Limiti per la tabella `Universita`
--
ALTER TABLE `Universita`
  ADD CONSTRAINT `fk_universita_citta` FOREIGN KEY (`citta`) REFERENCES `Citta` (`id_citta`);

--
-- Limiti per la tabella `Utente`
--
ALTER TABLE `Utente`
  ADD CONSTRAINT `fk_persona_stato` FOREIGN KEY (`stato`) REFERENCES `Stato` (`id_stato`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
