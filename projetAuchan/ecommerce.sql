-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 31 Décembre 2015 à 13:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name_brand` text NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `brands`
--

INSERT INTO `brands` (`id_brand`, `name_brand`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'SAMSUNG'),
(4, 'SONY'),
(5, 'ASUS');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id_product` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `adresse_cl` varchar(255) NOT NULL,
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `cart`
--

INSERT INTO `cart` (`id_product`, `quantite`, `adresse_cl`, `id_cart`) VALUES
(3, 0, '::1', 24),
(4, 0, '::1', 25),
(2, 0, '::1', 26);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `name_categorie` text NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `name_categorie`) VALUES
(1, 'mobiles'),
(2, 'PC'),
(3, 'tablettes'),
(4, 'objets connectés'),
(5, 'Accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL,
  `name_client` varchar(255) NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `password_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `name_client`, `email_client`, `password_client`) VALUES
(0, 'anass', 'admin', '');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) NOT NULL,
  `category_product` int(11) NOT NULL,
  `brand_product` int(11) NOT NULL,
  `price_product` int(11) NOT NULL,
  `description_product` text NOT NULL,
  `image_product` text NOT NULL,
  `keywords_product` text NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `category_product`, `brand_product`, `price_product`, `description_product`, `image_product`, `keywords_product`) VALUES
(2, 'AllTouch', 2, 1, 549, 'non fournie pas l''administrateur', 'hpalltouch.jpg', 'touch tactile tablette'),
(3, 'Galaxy Tab 4 10.1', 3, 3, 214, 'La SAMSUNG Galaxy Tab 4 (T530) est un savant mÃ©lange entre design, praticitÃ© et puissance.', '9188529242142.jpg', 'galaxy tactile '),
(4, 'Asus G551JW-XO143H', 2, 5, 999, 'Ecran 15 pouces - Processeur Core i7-4710HQ - 8Go - 1To - Windows 8.1', '9351566065694.jpg', 'asus pc'),
(5, 'WESTERN DIGITAL Disque dur externe WD', 5, 4, 139, 'Type de produit :  Disque dur externe  \r\nCapacitÃ© de stockage :  2 To  ', 'westerndigital.jpg', 'western digital disque dur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
