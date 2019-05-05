-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 00:27
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecom_store`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'Mathilde', 'mathilde.moloux@hotmail.fr', 'mdp', 'P8.PNG', 'France', 'Description', '0606060606', 'Engineer')
;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, ' Hommes', 'Articles pour hommes '),
(2, 'Femmes', 'Articles pour femmes'),
(3, 'Autres', 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(5, 'Coline', 'coco@gmail.com', 'mdp', 'France', 'Paris', '0707070707', 'Rueil', 'P10.PNG', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE IF NOT EXISTS `customer_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(11, 5, 300, 206863956, 1, 'Small', '2019-02-06', 'Complete');


-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `adresse` text NOT NULL,
  `ville` text NOT NULL,
  `code_postal` text NOT NULL,
  `pays` text NOT NULL,
  `telephone` text NOT NULL,
  `type_paiement` text NOT NULL,
  `numero_carte` text NOT NULL,
  `nom_carte` text NOT NULL,
  `date` text NOT NULL,
  `code_securité` text NOT NULL,
  `prix` text NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `payments`
--

INSERT INTO `payments` (`payment_id`, `adresse`, `ville`, `code_postal`, `pays`, `telephone`, `type_paiement`, `numero_carte`, `nom_carte`, `date`, `code_securité`, `prix`) VALUES
(1, '98 boulevard Gallieni', 'Issy les moulineaux', '92130', 'france', '00889', 'PayPal', '1233', 'ALEX', '1233', '21', '13333');

-- --------------------------------------------------------

--
-- Structure de la table `pending_orders`
--

DROP TABLE IF EXISTS `pending_orders`;
CREATE TABLE IF NOT EXISTS `pending_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(9, 5, 206863956, '10', 1, 'Small', 'pending'),
(10, 5, 206863956, '15', 1, 'Small', 'pending'),
(11, 5, 426714173, '2', 1, 'Small', 'pending'),
(12, 5, 1236679411, '16', 1, 'Medium', 'Complete');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_video` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL,
  `nb_vente` int(10) NOT NULL,
  `email_vendeur` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_video`, `product_price`, `product_keywords`, `product_desc`, `nb_vente`, `email_vendeur`) VALUES
(1, 3, 2, '2019-05-04 22:19:50', 'Top', 'top1.PNG', 'top1.PNG', 'top1.PNG', '', 66, 'top', '<p>top beige</p>', 0, 'coco@gmail.com'),

(2, 3, 2, '2019-05-03 16:15:34', 'Top', 'top2.PNG', 'top2.PNG', 'top2.PNG', '', 55, 'top', '<p>top rouge </p>', 3, '0'),


(3, 3, 2, '2019-05-03 16:15:34', 'top', 'top3.PNG', 'top3.PNG', 'top3.PNG', '', 103, 'top', '<p>top bleu</p>', 5, '0'),

(4, 1, 3, '2019-05-03 14:32:15', 'HarryPotter', 'HarryPotter1.PNG', 'HP.PNG', 'HP2.PNG', '', 20, 'livre', 'vol 1', 120, '0'),

(5, 1, 3, '2019-05-03 14:32:15', 'HarryPotter', 'HarryPotter2.PNG', 'HP.PNG', 'HP2.PNG', '', 20, 'livre', 'vol 2', 120, '0'),

(6, 1, 3, '2019-05-03 14:32:15', 'HarryPotter', 'HarryPotter3.PNG', 'HP.PNG', 'HP2.PNG', '', 20, 'livre', 'vol 3', 120, '0'),

(7, 1, 3, '2019-05-03 14:32:15', 'HarryPotter', 'HarryPotter4.PNG', 'HP.PNG', 'HP2.PNG', '', 20, 'livre', 'vol 4', 120, '0'),

(8, 1, 3, '2019-05-03 14:32:15', 'HarryPotter', 'HarryPotter5.PNG', 'HP.PNG', 'HP2.PNG', '', 20, 'livre', 'vol 5', 120, '0'),

(9, 1, 3, '2019-05-03 14:32:15', 'HarryPotter', 'HarryPotter6.PNG', 'HP.PNG', 'HP2.PNG', '', 20, 'livre', 'vol 6', 120, '0'),

(10, 1, 3, '2019-05-03 14:32:15', 'HarryPotter', 'HarryPotter7.PNG', 'HP.PNG', 'HP2.PNG', '', 20, 'livre', 'vol 6', 120, '0'),

(11, 1, 3, '2019-05-03 14:32:15', 'Game of Thrones', 'game.jpg', '', 'game.mp4', '', 20, 'game', 'vol 1', 110, '0'),

(12, 2, 3, '2019-05-01 15:18:07', 'Charles Aznavour - Emmenez moi', 'emmenez_moi.jpg', '', '', 'https://www.youtube.com/embed/rmaBeo1M6vg', 10, 'aznavour', 'auteur: Charles Aznavour\r\n\r\netc', 0, '0'),
(13, 4, 3, '2019-05-03 14:28:25', 'DVD - Bruce lee- La fureur du dragon', 'bruce.png', '', '', 'https://www.youtube.com/embed/h-MxfVfRkZg', 10, 'fureur', 'realisé par :\r\n\r\nDate: ', 200, '0'),

(14, 4, 3, '2019-05-03 14:32:15', 'Equitation', 'casque.PNG', 'casque.PNG', 'casque.PNG', '', 20, 'Equitation', 'Equitation', 110, '0'),

(15, 4, 3, '2019-05-03 14:32:15', 'Equitation', 'filet.PNG', 'filet.PNG', 'filet.PNG', '', 20, 'Equitation', 'Equitation', 110, '0'),
(16, 4, 3, '2019-05-03 14:32:15', 'Boxe', 'gants.jpg', 'gants.jpg', 'gant.jpg', '', 20, 'boxe', 'boxe', 110, '0'),

(17, 3, 1, '2019-05-03 14:32:15', 'chaussette', 'chaussette.PNG', 'chaussette.PNG', 'chaussette.PNG', '', 20, 'chaussette', 'chaussette', 110, '0')
;

-- --------------------------------------------------------

--
-- Structure de la table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `p_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Livres', 'Il y a tous les livres que vous souhaitez ici'),
(2, 'Musique', 'Il y a toutes les musiques que vous souhaitez'),
(3, 'Vetements', 'Il y a pleins de vetements ici'),
(4, 'Sports et loisirs', 'Films et pleins d\'autres produits');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `slide_id` int(10) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(8, 'Slide1', 'slide-1.PNG'),
(9, 'Slide2', 'slide-2.PNG'),
(10, 'Slide3', 'slide-3.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `vendeur_id` int(10) NOT NULL AUTO_INCREMENT,
  `vendeur_name` varchar(255) NOT NULL,
  `vendeur_email` varchar(255) NOT NULL,
  `vendeur_pass` varchar(255) NOT NULL,
  `vendeur_country` text NOT NULL,
  `vendeur_city` text NOT NULL,
  `vendeur_contact` varchar(255) NOT NULL,
  `vendeur_address` text NOT NULL,
  `vendeur_image` text NOT NULL,
  `vendeur_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`vendeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
