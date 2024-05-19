-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 19, 2024 alle 11:18
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiclothes`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) DEFAULT NULL,
  `data_ordine` timestamp NOT NULL DEFAULT current_timestamp(),
  `stato` varchar(50) DEFAULT 'in attesa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descrizione` text DEFAULT NULL,
  `prezzo` decimal(10,2) NOT NULL,
  `quantita_disponibile` int(11) NOT NULL DEFAULT 0,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `descrizione`, `prezzo`, `quantita_disponibile`, `img_url`) VALUES
(1, 'cappello da mago', 'cappello da mago grigio, stagione autunno/inverno, ma anche primavera/estate.', 120.00, 2, 'https://m.media-amazon.com/images/I/81gt0zSjvTL._AC_SX679_.jpg'),
(3, 'Bastone magico', 'Bastone magico stupendo e molto potente che puoi comprare solo se sei potentissimo e se la tua barba arriva almeno all\'ombelico.', 90.00, 1, 'https://m.media-amazon.com/images/I/61eevdSSyZS._AC_SL1500_.jpg'),
(4, 'Tunica da mago', 'Stupenda tunica di alta sartoria con corda intrecciata a mano con crine di unicorno. Non va lavata per non togliere la magia. Potrebbe odorare un pÃ² di cipollina nel tempo,ma in confronto all\'odore dell\'erba pipa e di mordor cosa vuoi che sia.', 170.00, 10, 'https://m.media-amazon.com/images/I/51xkJP3+GEL._AC_SY606_.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cognome` varchar(100) DEFAULT NULL,
  `indirizzo` varchar(255) DEFAULT NULL,
  `ruolo` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`, `nome`, `cognome`, `indirizzo`, `ruolo`) VALUES
(1, 'admin', '$2y$10$sc88pohucM0L4vrg0DDx1eRBX9JtTxGNb3cPq6AQqRLj1LVDxNWk.', 'gandalf', 'il grigio', 'erba pipa, 3', 'admin'),
(2, 'frodo', '$2y$10$jFQdihJsBhowruVqIDFPH.JwwCYfwYx9PW5Mi.jiUOZF/cU5c433G', 'Frodo', 'Baggins', 'Casa Baggins, Vicolo Cieco, Sottocolle', 'user');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
