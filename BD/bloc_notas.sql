-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 05:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloc_notas`
--

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `notaID` int(11) NOT NULL,
  `tituloNota` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nota` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaNota` timestamp NULL DEFAULT NULL,
  `usuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`notaID`, `tituloNota`, `nota`, `fechaNota`, `usuarioID`) VALUES
(4, 'programas_que_hacer', 'app bloc de notas\r\nprograma de laboratorio\r\npracticar javascript', '2022-04-03 06:33:49', 1),
(7, 'cedula', '27.847.021\r\n28.443.554', '2022-04-08 03:10:20', 1),
(9, 'recordar', 'comprar pan y leche', '2022-04-09 01:31:25', 5),
(15, 'hola', 'mundo como estas?', '2022-04-11 02:35:09', 5),
(16, 'cosas_que_hacer', 'aprender javascript', '2022-04-11 15:37:56', 5),
(17, 'contra de la bd del host2', 'admin\r\n8bjK{u{wR1y]K&so', '2022-04-11 15:38:17', 5);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `usuarioID` int(11) NOT NULL,
  `nombreUsuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usuarioID`, `nombreUsuario`, `password`) VALUES
(5, 'Andrea', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`notaID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuarioID`),
  ADD UNIQUE KEY `nombreUsuario` (`nombreUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `notaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
