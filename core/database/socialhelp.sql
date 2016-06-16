-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Giu 16, 2016 alle 12:42
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
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `annuncio`
--
ALTER TABLE `annuncio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_utente` (`email_utente`);

--
-- Indici per le tabelle `esperienza`
--
ALTER TABLE `esperienza`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_utente` (`email_utente`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `esperienza`
--
ALTER TABLE `esperienza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `annuncio`
--
ALTER TABLE `annuncio`
  ADD CONSTRAINT `annuncio_utente` FOREIGN KEY (`email_utente`) REFERENCES `utente` (`e-mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `esperienza`
--
ALTER TABLE `esperienza`
  ADD CONSTRAINT `esperienza_utente` FOREIGN KEY (`email_utente`) REFERENCES `utente` (`e-mail`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
