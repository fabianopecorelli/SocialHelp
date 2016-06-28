-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Giu 25, 2016 alle 00:44
-- Versione del server: 10.1.10-MariaDB
-- Versione PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialhelp`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `annuncio`
--

CREATE TABLE `annuncio` (
  `id` int(11) NOT NULL,
  `titolo` varchar(30) NOT NULL,
  `data` datetime NOT NULL,
  `descrizione` varchar(5000) NOT NULL,
  `luogo` varchar(30) NOT NULL,
  `data_pubblicazione` datetime NOT NULL,
  `tipologia` enum('Richiesta','Offerta') NOT NULL,
  `email_utente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `annuncio`
--

INSERT INTO `annuncio` (`id`, `titolo`, `data`, `descrizione`, `luogo`, `data_pubblicazione`, `tipologia`, `email_utente`) VALUES
(1, 'nuovo', '2016-06-10 00:00:00', 'cdcewwc', 'cwecwec', '2016-06-08 00:00:00', 'Offerta', 'fabianopecorelli@gmail.com'),
(12, 'Nuovo', '2016-06-15 00:00:00', 'Dec', 'ALIMINUSA', '2016-06-21 12:44:05', 'Offerta', 'fabianopecorelli@gmail.com'),
(13, 'Annuncio di baff', '2016-06-15 00:00:00', 'Vendo piaggio liberty', 'NOCERA INFERIORE', '2016-06-21 12:45:48', 'Richiesta', 'fabianopecorelli@gmail.com'),
(14, 'vwsv', '2016-06-22 00:00:00', 'vsvds', 'ABBADIA LARIANA', '2016-06-21 12:46:52', 'Offerta', 'fabianopecorelli@gmail.com'),
(15, 'vwsv', '2016-06-22 00:00:00', 'vsvds', 'ABBADIA LARIANA', '2016-06-21 12:51:24', 'Offerta', 'fabianopecorelli@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `esperienza`
--

CREATE TABLE `esperienza` (
  `id` int(11) NOT NULL,
  `titolo` varchar(50) NOT NULL,
  `data` datetime NOT NULL,
  `descrizione` varchar(5000) NOT NULL,
  `recensore` varchar(20) NOT NULL,
  `voto` enum('1','2','3','4','5') NOT NULL,
  `email_utente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `esperienza`
--

INSERT INTO `esperienza` (`id`, `titolo`, `data`, `descrizione`, `recensore`, `voto`, `email_utente`) VALUES
(1, 'cwe', '2016-06-21 15:38:07', 'wcdw', 'bafkaos@gmail.com', '3', 'fabianopecorelli@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `e-mail` varchar(50) NOT NULL,
  `citta` varchar(30) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `descrizione` varchar(150) DEFAULT NULL,
  `immagine` varchar(200) DEFAULT NULL,
  `tipologia` enum('Cliente','Offerente') NOT NULL,
  `data` datetime NOT NULL,
  `id` int(10) NOT NULL,
  `professione` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`nome`, `cognome`, `telefono`, `e-mail`, `citta`, `password`, `descrizione`, `immagine`, `tipologia`, `data`, `id`, `professione`) VALUES
('Baf', 'Kaos', '3450594401', 'bafkaos@gmail.com', 'NOCERA INFERIORE', '7bf1aa4cb46cdf090418df1b80680360', 'Descrizione', '/SocialHelp/uploads/images/profile/28.png', 'Cliente', '1991-09-17 00:00:00', 28, NULL),
('Fabiano', 'Pecorelli', '3450594401', 'fabianopecorelli@gmail.com', 'Nocera Inferiore', '6e14fc951f9952c71e9965dabac95eff', 'Ciao sono bafiano', '/SocialHelp/uploads/images/profile/27.png', 'Offerente', '2016-06-18 00:00:00', 27, NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `annuncio`
--
ALTER TABLE `annuncio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_utente` (`email_utente`);

--
-- Indici per le tabelle `esperienza`
--
ALTER TABLE `esperienza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_utente` (`email_utente`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`e-mail`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `annuncio`
--
ALTER TABLE `annuncio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT per la tabella `esperienza`
--
ALTER TABLE `esperienza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `annuncio`
--
ALTER TABLE `annuncio`
  ADD CONSTRAINT `utente_annuncio` FOREIGN KEY (`email_utente`) REFERENCES `utente` (`e-mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `esperienza`
--
ALTER TABLE `esperienza`
  ADD CONSTRAINT `utente_esperienza` FOREIGN KEY (`email_utente`) REFERENCES `utente` (`e-mail`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
