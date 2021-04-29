-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 29, 2021 alle 09:46
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
  `password` varchar(20) NOT NULL,
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
('luigi_bianchi', 'luigi', 'Luigi', 'Bianchi', '25479648885', 'luigibianchi@email.it'),
('mario_rossi', 'mario', 'Mario', 'Rossi', '1237548296', 'mariorossi@email.it'),
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
(1, 'Samsung', 'Galaxy S3', 1, 'alberto_verdi'),
(2, 'LG', 'Tv QLED 45\"', 2, 'luigi_bianchi'),
(3, 'Asus', 'Q2', 1, 'mario_rossi'),
(4, 'Samsung', 'Curved 50\"', 2, 'stefano_viola');

-- --------------------------------------------------------

--
-- Struttura della tabella `pda`
--

CREATE TABLE `pda` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `citta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `pda`
--

INSERT INTO `pda` (`username`, `password`, `nome`, `citta`) VALUES
('pda_fano', 'fano', 'C.A. Fano', 'Fano'),
('pda_pesaro', 'pesaro', 'C.A. Pesaro', 'Pesaro'),
('pda_urbino', 'urbino', 'C.A. Urbino', 'Urbino'),
('pda_vallefoglia', 'vallefoglia', 'C.A. Vallefoglia', 'Vallefoglia');

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
(1, 'Schermo rotto', '2021-04-12', '2021-04-27', 50.00, 'pda_fano', 1, 0),
(2, 'Burn-In', '2021-04-15', '2021-04-30', 100.00, 'pda_pesaro', 2, 0),
(3, 'Pixel bruciati', '2021-04-22', '2021-04-29', 20.99, 'pda_urbino', 3, 0),
(4, 'Connettore difettoso', '2021-04-24', '2021-04-29', 30.00, 'pda_vallefoglia', 4, 0);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `ticket_intervento`
--
ALTER TABLE `ticket_intervento`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
