-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 29, 2022 alle 21:29
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db360`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `dati_like`
--

CREATE TABLE `dati_like` (
  `ID` int(11) NOT NULL,
  `FK_piatto` int(11) DEFAULT NULL,
  `FK_utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dati_like`
--

INSERT INTO `dati_like` (`ID`, `FK_piatto`, `FK_utente`) VALUES
(1, 3, 1),
(2, 4, 1),
(3, 6, 1),
(4, 2, 1),
(5, 1, 28),
(6, 5, 28),
(7, 6, 28),
(8, 3, 28),
(9, 2, 28),
(10, 4, 28),
(11, 3, 29),
(12, 4, 29),
(13, 1, 29),
(15, 3, 30),
(16, 2, 30);

-- --------------------------------------------------------

--
-- Struttura della tabella `dati_recensioni`
--

CREATE TABLE `dati_recensioni` (
  `ID` int(11) NOT NULL,
  `FK_piatto` int(11) DEFAULT NULL,
  `FK_utente` int(11) DEFAULT NULL,
  `commento` varchar(255) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dati_recensioni`
--

INSERT INTO `dati_recensioni` (`ID`, `FK_piatto`, `FK_utente`, `commento`, `data`) VALUES
(1, 3, 1, 'La miglior pizza in assoluto! Complimenti.', '2022-05-29 21:14:13'),
(2, 6, 1, 'Ottima da mangiare, soprattutto nel periodo estivo.', '2022-05-29 21:14:35'),
(3, 1, 28, 'La mia preferita!', '2022-05-29 21:20:00'),
(4, 3, 28, 'Provata di recente, davvero una buona pizza!', '2022-05-29 21:20:33'),
(5, 5, 28, 'Ancora non l\'ho provata, ma sarà sicuramente buona.', '2022-05-29 21:21:00'),
(6, 4, 29, 'Una pizza particolare ma molto buona', '2022-05-29 21:23:25'),
(8, 6, 30, 'Consiglio assolutamente', '2022-05-29 21:27:43'),
(10, 3, 30, 'Un gusto molto strong, consiglio assolutamente', '2022-05-29 21:28:19');

-- --------------------------------------------------------

--
-- Struttura della tabella `direttore`
--

CREATE TABLE `direttore` (
  `CF` char(16) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Cognome` varchar(255) DEFAULT NULL,
  `DataNascita` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `direttore`
--

INSERT INTO `direttore` (`CF`, `Nome`, `Cognome`, `DataNascita`, `username`, `password`, `email`) VALUES
('GSPPSCHMBR031290', 'Giuseppe', 'Schembri', '1990-12-03', 'Giuseppe.Schembri', '$2y$10$D5liK.6/974GFjuD5vsfd.LxwJXw.BuHbYVdjH3SbzI/twnLPd4nG', 'Giuseppe.Schembri@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `piatto`
--

CREATE TABLE `piatto` (
  `ID` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `ingredienti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `piatto`
--

INSERT INTO `piatto` (`ID`, `img`, `nome`, `ingredienti`) VALUES
(1, './img/img1.jpg', 'Pantelleria', 'Pelato siccagno di Valledolmo saltato in padella, stracciatella, filetti di tonno al naturale pinna gialla, capperi di Pantelleria, olive Taggiasche, olio EVO, origano, basilico.'),
(2, './img/img2.jpg', 'Zucca', 'Vellutata di zucca, fior di latte, dadini di zucca panata, speck di montagna artemano Levoni, fonduta di blu di bufala Quattro Portoni, granella di castagne, germogli.'),
(3, './img/img3.jpg', 'Carbonara Sbagliata', 'Fior di latte, guanciale di suino Ragusano, tuorlo d\'uovo fritto, fonduta di pecorino romano, basilico, pepe nero.'),
(4, './img/img4.jpg', 'Aida', 'Bufala, blu di bufala Quattro Portoni, funghi tartufati, provola delle Madonie affumicata, salamino di suino nero piccante, vastedda della Valle del Belice DOP, olio EVO, Basilico.'),
(5, './img/img5.jpg', 'Boschetto', 'Vellutata di zucca, fior di latte, funghi chiodini saltati in padella, capocollo di suino nero dei Nebrodi, pistacchio di raffadali olio evo basilico.'),
(6, './img/img6.jpg', 'Bunaca', 'Crema di zucchine, stracciatella, prosciutto crudo di Parma 20 mesi, datterino semi dry gialli e rossi cotti a bassa temperatura, mandorle tostate.');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Cognome` varchar(255) DEFAULT NULL,
  `DataNascita` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID`, `Nome`, `Cognome`, `DataNascita`, `username`, `Password`, `email`) VALUES
(1, 'mario', 'rossi', '1999-03-15', 'm.rossi', '$2y$10$D5liK.6/974GFjuD5vsfd.LxwJXw.BuHbYVdjH3SbzI/twnLPd4nG', 'mariorossi@gmail.com'),
(28, 'Carlo', 'Burgio', '2003-04-07', 'carlito', '$2y$10$BlfsrJjxWVP07qHeDhZPUOsyLMRIZbO51V7eBBn2C2koNjAQCEhSq', 'carlitobg@libero.it'),
(29, 'Roberta', 'Castellano', '2000-02-25', 'casteroby', '$2y$10$VyMLJ.JTdBM01.YPfSc20eaFb9/0o2AoX4XHi/GC/cv.yzI39DMFe', 'CasteRoberta@gmail.com'),
(30, 'antonella', 'laplaca', '1997-11-14', 'laplaca14', '$2y$10$.C9bHtcCB2X4iWFpM0gFHecqWVQdQkOafZ0sJNfBKthABM4t8qKIi', 'la.placa@gmail.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dati_like`
--
ALTER TABLE `dati_like`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `l1` (`FK_piatto`),
  ADD KEY `l2` (`FK_utente`);

--
-- Indici per le tabelle `dati_recensioni`
--
ALTER TABLE `dati_recensioni`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `l1` (`FK_piatto`),
  ADD KEY `l2` (`FK_utente`);

--
-- Indici per le tabelle `piatto`
--
ALTER TABLE `piatto`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dati_like`
--
ALTER TABLE `dati_like`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `dati_recensioni`
--
ALTER TABLE `dati_recensioni`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `piatto`
--
ALTER TABLE `piatto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `dati_like`
--
ALTER TABLE `dati_like`
  ADD CONSTRAINT `dati_like_ibfk_1` FOREIGN KEY (`FK_piatto`) REFERENCES `piatto` (`ID`),
  ADD CONSTRAINT `dati_like_ibfk_2` FOREIGN KEY (`FK_utente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `dati_recensioni`
--
ALTER TABLE `dati_recensioni`
  ADD CONSTRAINT `dati_recensioni_ibfk_1` FOREIGN KEY (`FK_piatto`) REFERENCES `piatto` (`ID`),
  ADD CONSTRAINT `dati_recensioni_ibfk_2` FOREIGN KEY (`FK_utente`) REFERENCES `utenti` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
