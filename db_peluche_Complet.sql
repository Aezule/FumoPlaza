-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : ven. 31 mai 2024 à 17:35
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_peluche`
--

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

DROP TABLE IF EXISTS `authentification`;
CREATE TABLE IF NOT EXISTS `authentification` (
  `IdCompte` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `idRole` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`IdCompte`),
  KEY `idRole` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`IdCompte`, `login`, `mdp`, `nom`, `prenom`, `idRole`) VALUES
(1, 'pumkin@gmail.com', 'pumkin', 'pumkinale', 'pumkin', 1),
(2, 'danyAdmin@gmail.com', 'dany', 'Admin', 'danyy', 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCateg` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCateg`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCateg`, `libelle`) VALUES
(1, 'Ete'),
(2, 'Hiver'),
(3, 'Automne'),
(4, 'Printemps');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCmd` int(11) NOT NULL AUTO_INCREMENT,
  `dateCmd` date DEFAULT current_timestamp(),
  `idCompte` int(11) NOT NULL,
  PRIMARY KEY (`idCmd`),
  KEY `idCompte` (`idCompte`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

DROP TABLE IF EXISTS `concerner`;
CREATE TABLE IF NOT EXISTS `concerner` (
  `idProduit` int(11) NOT NULL,
  `idCmd` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`,`idCmd`),
  KEY `idCmd` (`idCmd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `memoriser_panier`
--

DROP TABLE IF EXISTS `memoriser_panier`;
CREATE TABLE IF NOT EXISTS `memoriser_panier` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `idCompte` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`,`idCompte`),
  KEY `idCompte` (`idCompte`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `ref_interne` varchar(50) DEFAULT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `resume_court` varchar(50) DEFAULT NULL,
  `description_long` varchar(500) DEFAULT NULL,
  `path_photo` varchar(128) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `qte_stock` int(11) DEFAULT NULL,
  `idCateg` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `idCateg` (`idCateg`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `ref_interne`, `libelle`, `resume_court`, `description_long`, `path_photo`, `prix`, `qte_stock`, `idCateg`) VALUES
(1, 'PL-1', 'Chika ', 'Fumo Chika', 'Chika est une peluche Fumo adorable aux couleurs de l\'automne. Sa fourrure douce et ses grands yeux captivants évoquent la chaleur de cette saison. Tenant fièrement une petite citrouille, elle est prête à ajouter une touche de magie automnale à votre quotidien.', 'Chika.jpg', 356, 23, 3),
(2, 'PL-2', 'Masuko ', 'Fumo Masuko', 'Masuko incarne le printemps avec sa tenue bleue ornée de fleurs délicates. Ses cheveux gris argenté ajoutent une touche de sophistication à son allure. Avec son regard et sa posture joyeuse, elle symbolise le renouveau printanier et est prête à apporter de la joie dans votre vie.', 'Masuko.jpg', 480, 18, 4),
(3, 'PL-3', 'Yuki', 'Fumo Yuki', 'Yuki incarne l\'hiver avec sa tenue blanche comme la neige et aux tons de bleu et de blanc. Avec ses grands yeux et ses cheveux argentés, elle évoque la magie de cette saison glacée.', 'Yuki.jpg', 201, 14, 2),
(4, 'PL-4', 'Mona', 'Fumo Mona', 'Mona Blacio incarne l\'été avec sa fourrure douce et sa tenue violette. Son regard pétillant et son sourire radieux captent l\'énergie ensoleillée de la saison estivale.', 'Mona.jpg', 25, 1, 1),
(5, 'PL-5', 'Enoki', 'Fumo Enoki', 'Enoki évoque l\'automne avec sa tenue aux tons chauds et ses cheveux blanc doux. Son sourire bienveillant et son regard curieux capturent l\'esprit accueillant de cette saison. Enoki est prêt à vous accompagner dans vos aventures automnales avec chaleur et réconfort.', 'Enoki.jpg', 39, 10, 4),
(6, 'PL-6', 'Miku', 'Fumo Miku', 'Miku incarne l\'automne avec sa tenue verte ornée de fleur de toutes les couleurs. Ses cheveux lavande clair ajoutent une touche colorée à son apparence. Avec son regard pétillant et son sourire doux, Miku symbolise la magie et la pureté de la saison, apportant une sensation de calme et de sérénité à votre quotidien.', 'Miku.jpg', 1456, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `libelle`) VALUES
(1, 'Admin'),
(2, 'Client');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD CONSTRAINT `authentification_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idCompte`) REFERENCES `authentification` (`IdCompte`);

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `concerner_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `concerner_ibfk_2` FOREIGN KEY (`idCmd`) REFERENCES `commande` (`idCmd`);

--
-- Contraintes pour la table `memoriser_panier`
--
ALTER TABLE `memoriser_panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`idCompte`) REFERENCES `authentification` (`IdCompte`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idCateg`) REFERENCES `categorie` (`idCateg`);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


DROP USER IF EXISTS 'UserFumo'@'localhost';
-- Create a new user with a password
CREATE USER 'UserFumo'@'localhost' IDENTIFIED BY 'm0Td3P@ss3';

-- Grant privileges to the user on specific tables in a specific database
GRANT SELECT, INSERT, UPDATE, DELETE ON db_peluche.authentification TO 'UserFumo'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON db_peluche.categorie TO 'UserFumo'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON db_peluche.commande TO 'UserFumo'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON db_peluche.concerner TO 'UserFumo'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON db_peluche.memoriser_panier TO 'UserFumo'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON db_peluche.produit TO 'UserFumo'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON db_peluche.role TO 'UserFumo'@'localhost';

-- Apply the changes
FLUSH PRIVILEGES;