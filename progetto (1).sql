-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 07, 2024 alle 13:42
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
-- Database: `progetto`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `num_productos` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `description`) VALUES
(1, 'Guitarras', ''),
(2, 'Teclados', ''),
(3, 'Percusión', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `description`, `precio`, `imagen`, `id_categoria`) VALUES
(2, 'Yamaha CGX122 MC', '... descripcion ...', 369, 'chitarra_yamahaCGX122MC.jpg', 1),
(3, 'Yamaha C40 BLACK', '...descripcion...', 145, 'chitarra_yamahaC40BLACK.jpg', 1),
(4, 'Yamaha NP-15', '... descripcion ...', 268, 'tastiera_yamahaNP15.jpg', 2),
(5, 'Yamaha PSR-EW320', '...descripcion...', 426, 'tastiera_yamahaPSREW320.jpg', 2),
(6, 'Yamaha Stage Custom Birch', '...descripcion...', 640, 'batteria_yamahaStageCustomBirch.jpg', 3),
(7, 'Yamaha DTX10K-X', '...descripcion...', 488, 'batteria_yamahaDTX10K-X.jpg', 3),
(8, 'Yamaha SG 1820', '...descripcion...', 2590, 'chitarra_yamahaSG.jpg', 1),
(9, 'Yamaha RGX121Z', '...descripcion...', 384, 'chitarra_yamahaRGX121Z.jpg', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `appellidos` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id_user`, `username`, `password_hash`, `nombre`, `appellidos`, `direccion`, `email`, `created_at`) VALUES
(1, 'fraschio', '$2y$10$WDb8MQN/XvljZ0GhnVjyYunBA1S1OJCWJA93g18m.67Bg0WK9Pi4e', 'Francesco', 'Fratello', 'via stocazzo', 'francesco.fratello02@gmail.com', '2024-12-07 11:07:38'),
(2, 'pippo', '$2y$10$k0NEbT.5qtqMYFrLZirj2OxuFrXJ.Lu7Lsp6Hy76aQRRxwJUSOb6O', 'pippo', 'pluto', 'via topo', 'topo@gmail.com', '2024-12-07 11:32:33'),
(3, 'bisione', '$2y$10$0tmyGMEAvtGamton8Wu4GOjiWhwwqGFF.u4Wjuw0M1NVdDIjdbPmu', 'claudio', 'bisio', 'via claudiobisio', 'claudiobisio@gmail.com', '2024-12-07 11:48:28'),
(4, 'tottirediroma', '$2y$10$zqOWggakhhLM2c/X2OlTTOCqr3bR5LQDtSOWJIBJ98kPLZ8G54tp6', 'Francesco', 'Totti', 'asroma', 'totti@gmail.com', '2024-12-07 12:34:22');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indici per le tabelle `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_producto_categoria` (`id_categoria`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
