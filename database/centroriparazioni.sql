-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 25, 2021 alle 09:54
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `centroriparazioni`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`username`, `password`, `nome`, `cognome`, `telefono`, `email`) VALUES
('alberto_verdi', 'alberto', 'Alberto', 'Verdi', '7478585896', 'albertoverdi@email.it'),
('cristian_signoretti', 'cristian', 'Cristian', 'Signoretti', '58478455656', 'Cristian135@outlook.it'),
('leonardo_cannarella', 'leonardo', 'Leonardo', 'Cannarella', '3412548963', 'leonardocannarella@prova.it'),
('luigi_bianchi', 'luigi', 'Luigi', 'Bianchi', '25479648885', 'luigibianchi@email.it'),
('mario_rossi', 'mario', 'Mario', 'Rossi', '1237548296', 'mariorossi@email.it'),
('matteo_baldaccioni', 'matteo', 'Matteo', 'Baldaccioni', '145266325544', 'matteo.baldaccioni@gmail.com'),
('matteo_ciaroni', 'matteo', 'Matteo', 'Ciaroni', '123456789', 'matteociaroni@gmail.com'),
('nuriel_crescentini', 'nuriel', 'Nuriel', 'Crescentini', '3665047724', 'nuriel.crescentini02@gmail.com'),
('stefano_viola', 'stefano', 'Stefano', 'Viola', '4242868685', 'stefanoviola@email.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id` int(5) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modello` varchar(30) NOT NULL,
  `id_tipologia_dispositivo` int(5) NOT NULL,
  `id_cliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dispositivo`
--

INSERT INTO `dispositivo` (`id`, `marca`, `modello`, `id_tipologia_dispositivo`, `id_cliente`) VALUES
(27, 'Apple', 'Pencil 1', 1, 'nuriel_crescentini'),
(28, 'iPhone 12', 'Pro Max', 1, 'leonardo_cannarella'),
(30, 'Samsung', 'Galaxy Note9', 1, 'leonardo_cannarella'),
(31, 'Huawei', 'P Smart', 1, 'matteo_baldaccioni'),
(33, 'iPad', 'Air', 1, 'leonardo_cannarella'),
(34, 'Google', 'Nest Hub', 1, 'leonardo_cannarella'),
(35, 'LG QLED', '48', 2, 'leonardo_cannarella'),
(36, 'Samsung', 'Galaxy S21+', 1, 'leonardo_cannarella'),
(37, 'Laptop', 'HP 15.6', 1, 'nuriel_crescentini');

-- --------------------------------------------------------

--
-- Struttura della tabella `pda`
--

CREATE TABLE `pda` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `nome` varchar(30) NOT NULL,
  `citta` varchar(30) NOT NULL,
  `attivo` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `pda`
--

INSERT INTO `pda` (`username`, `password`, `nome`, `citta`, `attivo`) VALUES
('pda_ancona', 'ancona', 'C.A. Ancona', 'Ancona', 1),
('pda_bologna', 'bologna', 'C.A. Bologna', 'Bologna', 1),
('pda_cattolica', 'cattolica', 'C.A. Cattolica', 'Cattolica', 0),
('pda_fano', 'fano', 'C.A. Fano', 'Fano', 1),
('pda_frontino', 'frontino', 'C.A. Frontino', 'Frontino', 1),
('pda_pesaro', 'pesaro', 'C.A. Pesaro', 'Pesaro', 1),
('pda_rimini', 'rimini', 'C.A. Rimini', 'Rimini', 1),
('pda_urbino', 'urbino', 'C.A. Urbino', 'Urbino', 1),
('pda_vallefoglia', 'vallefoglia', 'C.A. Vallefoglia', 'Vallefoglia', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `stato_intervento`
--

CREATE TABLE `stato_intervento` (
  `id` int(5) NOT NULL,
  `titolo` varchar(30) NOT NULL,
  `descrizione` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `stato_intervento`
--

INSERT INTO `stato_intervento` (`id`, `titolo`, `descrizione`) VALUES
(0, 'IN CODA', 'Nessuno ha preso a carico'),
(1, 'APERTO', 'Intervento a carico'),
(2, 'IN_RIPARAZIONE', 'Intervento in corso'),
(3, 'CHIUSO', 'Intervento concluso');

-- --------------------------------------------------------

--
-- Struttura della tabella `ticket_intervento`
--

CREATE TABLE `ticket_intervento` (
  `id` int(5) NOT NULL,
  `descrizione_problema` varchar(30) NOT NULL,
  `data_invio_richiesta` date NOT NULL,
  `data_fine_stimata` date NOT NULL,
  `prezzo` double(6,2) NOT NULL,
  `id_pda` varchar(20) NOT NULL,
  `id_dispositivo` int(5) NOT NULL,
  `id_stato_intervento` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ticket_intervento`
--

INSERT INTO `ticket_intervento` (`id`, `descrizione_problema`, `data_invio_richiesta`, `data_fine_stimata`, `prezzo`, `id_pda`, `id_dispositivo`, `id_stato_intervento`) VALUES
(21, 'Connettore lightning non va', '2021-05-04', '2021-05-14', 50.00, 'pda_pesaro', 27, 1),
(22, 'Schermo rotto', '2021-05-10', '2021-05-31', 50.00, 'pda_pesaro', 28, 3),
(24, 'Schermo rotto', '2021-05-13', '2021-05-31', 50.00, 'pda_pesaro', 30, 2),
(25, 'Bolle nello schermo', '2021-05-14', '2021-05-22', 10.00, 'pda_frontino', 31, 3),
(27, 'Connettore non va', '2021-05-17', '0000-00-00', 0.00, 'pda_fano', 33, 0),
(28, 'Burn in problema', '2021-05-17', '0000-00-00', 0.00, 'pda_rimini', 34, 0),
(29, 'Schermo crinato', '2021-05-17', '2021-05-30', 30.00, 'pda_ancona', 35, 1),
(30, 'Touch rotto', '2021-05-17', '2021-05-31', 50.00, 'pda_pesaro', 36, 2),
(31, 'Tastiera non funzionante', '2021-05-17', '0000-00-00', 0.00, 'pda_frontino', 37, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `tipologia_dispositivo`
--

CREATE TABLE `tipologia_dispositivo` (
  `id` int(5) NOT NULL,
  `descrizione` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tipologia_dispositivo`
--

INSERT INTO `tipologia_dispositivo` (`id`, `descrizione`) VALUES
(1, 'Telefonico'),
(2, 'Televisivo');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipologia_dispositivo` (`id_tipologia_dispositivo`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indici per le tabelle `pda`
--
ALTER TABLE `pda`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `stato_intervento`
--
ALTER TABLE `stato_intervento`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ticket_intervento`
--
ALTER TABLE `ticket_intervento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pda` (`id_pda`),
  ADD KEY `id_dispositivo` (`id_dispositivo`),
  ADD KEY `id_stato_intervento` (`id_stato_intervento`);

--
-- Indici per le tabelle `tipologia_dispositivo`
--
ALTER TABLE `tipologia_dispositivo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT per la tabella `ticket_intervento`
--
ALTER TABLE `ticket_intervento`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `dispositivo_ibfk_1` FOREIGN KEY (`id_tipologia_dispositivo`) REFERENCES `tipologia_dispositivo` (`id`),
  ADD CONSTRAINT `dispositivo_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`username`);

--
-- Limiti per la tabella `ticket_intervento`
--
ALTER TABLE `ticket_intervento`
  ADD CONSTRAINT `ticket_intervento_ibfk_1` FOREIGN KEY (`id_pda`) REFERENCES `pda` (`username`),
  ADD CONSTRAINT `ticket_intervento_ibfk_2` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivo` (`id`),
  ADD CONSTRAINT `ticket_intervento_ibfk_3` FOREIGN KEY (`id_stato_intervento`) REFERENCES `stato_intervento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
