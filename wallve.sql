-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 06:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallve`
--
CREATE DATABASE IF NOT EXISTS `wallve` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wallve`;

-- --------------------------------------------------------

--
-- Table structure for table `tauditorias`
--

DROP TABLE IF EXISTS `tauditorias`;
CREATE TABLE `tauditorias` (
  `idAudit` int(11) NOT NULL,
  `tipoProceso` varchar(50) NOT NULL,
  `descAudit` varchar(50) NOT NULL,
  `idEmp` int(11) NOT NULL,
  `fechaAudit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tproducto`
--

DROP TABLE IF EXISTS `tproducto`;
CREATE TABLE `tproducto` (
  `idProd` int(11) NOT NULL,
  `idEstacion` int(11) NOT NULL,
  `precioProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tpruebausuario`
--

DROP TABLE IF EXISTS `tpruebausuario`;
CREATE TABLE `tpruebausuario` (
  `idEmp` int(11) NOT NULL,
  `nombreEmp` varchar(60) NOT NULL,
  `apellidoPEmp` varchar(60) DEFAULT NULL,
  `apellidoMEmp` varchar(60) NOT NULL,
  `fechaNacEmp` date NOT NULL,
  `telEmp` int(10) NOT NULL,
  `generoEmp` varchar(6) NOT NULL,
  `emailEmp` varchar(50) NOT NULL,
  `direccionEmp` varchar(60) NOT NULL,
  `ciudadEmp` varchar(60) NOT NULL,
  `turnoEmp` varchar(10) NOT NULL,
  `rolEmp` varchar(20) NOT NULL,
  `idloginEmp` int(11) NOT NULL,
  `passEmp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tusuario`
--

DROP TABLE IF EXISTS `tusuario`;
CREATE TABLE `tusuario` (
  `idEmp` int(11) NOT NULL,
  `nombreEmp` varchar(60) NOT NULL,
  `apellidoPEmp` varchar(60) DEFAULT NULL,
  `apellidoMEmp` varchar(60) DEFAULT NULL,
  `fechaNacEmp` date NOT NULL,
  `telEmp` bigint(20) NOT NULL,
  `generoEmp` varchar(12) NOT NULL,
  `emailEmp` varchar(50) NOT NULL,
  `direccionEmp` varchar(60) NOT NULL,
  `ciudadEmp` varchar(60) NOT NULL,
  `turnoEmp` varchar(10) NOT NULL,
  `rolEmp` varchar(20) NOT NULL,
  `idloginEmp` varchar(15) NOT NULL,
  `passEmp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tusuario`
--

INSERT INTO `tusuario` (`idEmp`, `nombreEmp`, `apellidoPEmp`, `apellidoMEmp`, `fechaNacEmp`, `telEmp`, `generoEmp`, `emailEmp`, `direccionEmp`, `ciudadEmp`, `turnoEmp`, `rolEmp`, `idloginEmp`, `passEmp`) VALUES
(2, 'Brayan', 'Moran', 'Rivera', '2001-01-29', 6333503037, 'Masculino', 'ejemplo@gmail.com', 'C 33 Ave 36 y 37', 'Agua Prieta', 'Vespertino', 'Administrador', 'anmor', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tventa`
--

DROP TABLE IF EXISTS `tventa`;
CREATE TABLE `tventa` (
  `folioVenta` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `idEstacion` int(11) NOT NULL,
  `idEmp` int(11) NOT NULL,
  `fechaVenta` datetime NOT NULL,
  `cantWatts` double NOT NULL,
  `efectivoVenta` double NOT NULL,
  `cambioVenta` double NOT NULL,
  `totalVenta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tauditorias`
--
ALTER TABLE `tauditorias`
  ADD PRIMARY KEY (`idAudit`),
  ADD KEY `idEmp` (`idEmp`);

--
-- Indexes for table `tproducto`
--
ALTER TABLE `tproducto`
  ADD PRIMARY KEY (`idProd`);

--
-- Indexes for table `tpruebausuario`
--
ALTER TABLE `tpruebausuario`
  ADD PRIMARY KEY (`idEmp`);

--
-- Indexes for table `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`idEmp`);

--
-- Indexes for table `tventa`
--
ALTER TABLE `tventa`
  ADD PRIMARY KEY (`folioVenta`),
  ADD KEY `idProd` (`idProd`),
  ADD KEY `idEmp` (`idEmp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `idEmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tauditorias`
--
ALTER TABLE `tauditorias`
  ADD CONSTRAINT `tauditorias_ibfk_1` FOREIGN KEY (`idEmp`) REFERENCES `tusuario` (`idEmp`) ON UPDATE CASCADE;

--
-- Constraints for table `tventa`
--
ALTER TABLE `tventa`
  ADD CONSTRAINT `tventa_ibfk_1` FOREIGN KEY (`idProd`) REFERENCES `tproducto` (`idProd`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tventa_ibfk_2` FOREIGN KEY (`idEmp`) REFERENCES `tusuario` (`idEmp`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
