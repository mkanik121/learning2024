-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 mai 2024 à 00:26
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : mydb
--

-- --------------------------------------------------------

--
-- Structure de la table client
--

DROP TABLE IF EXISTS client;
CREATE TABLE IF NOT EXISTS client (
  Identifiant int NOT NULL AUTO_INCREMENT,
  Nom varchar(255) NOT NULL,
  Prenom varchar(255) NOT NULL,
  Email varchar(255) NOT NULL,
  PRIMARY KEY (Identifiant)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table detail_facture
--

DROP TABLE IF EXISTS detail_facture;
CREATE TABLE IF NOT EXISTS detail_facture (
  Identifiant int NOT NULL AUTO_INCREMENT,
  IdFacture int NOT NULL,
  IdProduit int NOT NULL,
  Quantite int NOT NULL,
  PrixHT decimal(10,0) NOT NULL,
  PRIMARY KEY (Identifiant)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table facture
--

DROP TABLE IF EXISTS facture;
CREATE TABLE IF NOT EXISTS facture (
  Identifiant int NOT NULL AUTO_INCREMENT,
  IdClient int NOT NULL,
  DateFacture datetime NOT NULL,
  PRIMARY KEY (Identifiant)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

