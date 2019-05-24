-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 mai 2019 à 19:56
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `equipevelizy2`
--
CREATE DATABASE IF NOT EXISTS `equipevelizy2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `equipevelizy2`;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NumRue` varchar(255) NOT NULL,
  `CodePostal` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `IdPays` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `NumRue`, `CodePostal`, `Ville`, `IdPays`) VALUES
(4, '10', '01010', 'Ville de User1', 1),
(5, '10', '02020', 'Ville de User2', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` int(11) NOT NULL,
  `Origine` int(11) NOT NULL,
  `QteCafe` int(11) NOT NULL,
  `Exportateur` int(11) NOT NULL,
  `Date` date NOT NULL,
  `etat` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `Type`, `Origine`, `QteCafe`, `Exportateur`, `Date`, `etat`) VALUES
(1, 1, 1, 100, 1, '2019-05-15', 'valide'),
(2, 1, 1, 1, 1, '2019-05-08', 'termine'),
(3, 1, 1, 1, 1, '2019-05-07', 'en cours');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NbrHab` int(11) NOT NULL,
  `Surface` varchar(255) NOT NULL,
  `QteCafeProd` varchar(255) NOT NULL,
  `PourcentageProdMondiale` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `CheminDrapeau` varchar(255) NOT NULL,
  `Capitale` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `NbrHab`, `Surface`, `QteCafeProd`, `PourcentageProdMondiale`, `Description`, `CheminDrapeau`, `Capitale`, `Nom`) VALUES
(1, 208846892, '8514876', '2 965.5', '33.2', 'La production de café au Brésil représente environ un tiers de la production mondiale de café, ce qui en fait le plus grand producteur au monde, devant le Viêt Nam et la Colombie. Les plantations couvrent environ 27 000 km2 de terrain, principalement dans les États du sud où l\'environnement et le climat offrent des conditions de croissance idéales.', 'images/brésil.png', 'Brasilia', 'Brésil'),
(3, 262787403, '1904569', '698.9', '16.4', 'L\'Indonésie présente un climat tropical, avec alternance de saison humide et de saison sèche, ou un climat équatorial, sans variation de température et d\'humidité. Elle possède également un des café les plus cher du monde: le Kopi Luwak.', 'images/indonésie.png', 'Jakarta', 'Indonésie'),
(4, 49100000, '1141748', '653.2', '7.3', 'Dans les zones caféières de la Colombie, le climat est tempéré et la température est en moyenne de 23 °C et varie légèrement entre le jour et la nuit. En plus de pluie régulière, l\'humidité est comprise entre 70 et 80 %.', 'images/colombie.png', 'Bogota', 'Colombie'),
(5, 1296834042, '3287263', '318.2', '3.6', 'Le café indien est principalement cultivé au sud du pays sous des conditions de mousson. Celui-ci offre un large panel de saveur de l\'arabica au robusta. Aujourd\'hui, la culture du café fait vivre de nombreux petit producteurs', 'images/inde.png', 'New Delhi', 'Inde'),
(6, 9182766, '112090', '273.5', '3.1', 'L\'Honduras est un pays a forte hydrométrie. Plus du tiers de sa population travaillent dans le domaine du café. Plus de 65 % du territoire est occupé par les montagnes.C\'est la plaine côtière au nord du pays qui est la zone agricole la plus productive.', 'images/honduras.png', 'Tegucigalpa', 'Honduras'),
(2, 92699227, '330967', '1461.5', '16.4', 'Situé dans la zone des moussons, le Vietnam bénéficie d\'un climat chaud et humide, du nord au sud. \r\nLa café a commencer à être produit durant la colonisation française et n\'a cessé de grandir. Aujourd\'hui, sa production représente 3% du PIB du pays.', 'images/viêt_nam.png', 'Hanoï', 'Viêt Nam'),
(7, 108386391, '1127127', '270.0', '3', 'La culture du café dans le pays occupe 400 000 hectares et dont plus de la moitie de la production totale est consommée au niveau local où la tradition du café est bien ancrée. Neuf variétés de café y sont cultivées.', 'images/éthiopie.png', 'Addis-Abeba', 'Ethiopie'),
(8, 32280640, '1285315', '256.2', '2.9', 'Cinquième exportateur d\'Arabica au monde, le perou est tropical à l\'est ,désertique et sec à l\'ouest. Le climat y est trés instable à cause du phénomène climatique el-nino. Pour cela, le café est cultivé en haute altitude de 1000 à 1800 m.', 'images/pérou.png', 'Lima', 'Pérou'),
(9, 16581273, '108890', '253.2', '2.8', 'Le Guatemala est un pays montagneux, sauf le long de côtes où se trouvent des plaines littorales. Le climat est à dominante tropical mais davantage tempéré en altitude.Sur les terrains situés en haute altitude. À partir de 1 500 mètres, les plantations doivent être mises à l\'abri des vents froid d\'altitude.', 'images/guatemala.png', 'Guatemala', 'Guatemala'),
(10, 125959205, '1964375', '231.6', '2.6', 'Le café produit est majoritairement de l\'arabica, qui pousse particulièrement bien dans les régions côtières de Soconusco, Chiapas, près de la frontière du Guatemala.', 'images/mexique.png', 'Mexico', 'Mexique'),
(11, 41487965, '241550', '190', '2.1', 'Le Ouaganda est situé sur le plateau Est-africain. Le centre du pays s’articule autour du lac Kyoga, entouré de zone marécageuses.Largement équatorial, le climat subit toutefois de larges variations selon l’altitude.\r\nLe sud du pays est plus humide et frais, avec des précipitations réparties sur toute l’année et une température moyenne de 20 °C.', 'images/ouaganda.png', 'Kampala', 'Ouaganda'),
(12, 1417913092, '9596961', '116.8', '1.3', 'En plus d\'être l\'uns des pays les plus peuplé au monde, la Chine possède un climat très diversifié. En effet, celui-ci change d\'une région à l\'autre: au nord, un climat sec avec de rudes hivers; au centre, un climat plus tempéré; au sud, un climat subtropical humide, marqué par la mousson.', 'images/chine.png', 'Pékin (Beijing)', 'Chine'),
(13, 26260582, '322462', '103.7', '1.2', 'La Cote d\'Ivoire est un pays au climat très diversifié. Équatorial le long des côtes, il est semi-aride à l\'extrême nord. Le pays connaît en général des variations importantes de température entre le nord et le sud, mais également le long de l’année en fonction des saisons.', 'images/cote_d_ivoire.png', 'Yamoussoukro', 'Côte d\'Ivoire'),
(14, 7234171, '236800', '89', '1', 'Le café du Laos a une consistance épaisse et a une amertume marquée.Le climat tropical où il est cultivé est caractérisé par les moussons. Il y a deux saisons : saison sèche d\'octobre à avril, saison des pluies de mai à septembre. les températures sont comprises entre 15 et 20°C de décembre à janvier, 30 °C de mars à avril. Les mois d\'octobre et novembre peuvent être pluvieux.', 'images/laos.png', 'Vientiane', 'Laos'),
(15, 6085213, '129494', '83.9', '0.9', 'Le Nicaragua est un pays relativement montagneux. Les plaines côtières  s\'élèvent progressivement vers la chaîne centrale. Les plus hauts sommets se situent au nord, près de la frontière du Honduras. Au Sud du pays, à la frontière du Costa Rica, est marécageux. Le climat est tropical dans les basses terres et plus frais sur les plateaux.La température globale varie entre 28 et 33 °C.', 'images/nicaragua.png', 'Managua', 'Nicaragua'),
(16, 104256076, '300400', '78.4', '0.9', 'Les Philippines sont un des quelques producteurs qui cultivent les quatre espèces de café qui existent: Robusta, Liberica, Excelsa et Arabica. L\'est du pays est presque constamment arrosé, tandis que l\'ouest connaît une saison sèche et des pluies de moussons en été.\r\nLe climat ne connaît pratiquement pas évolution avec l\'altitude.', 'images/philippines.png', 'Manille', 'Philippines'),
(17, 31689176, '916445', '77.2', '0.9', 'La production de café a démarré dans la chaîne côtière et l\'ouest de la région des Andes, profitant de la qualité du sol, de l\'altitude et de l\'humidité. Les plantations sont généralement à la frontière avec la Colombie. Les domaines dont les élévations dépassent 2000 mètres d\'altitude sont caractérisés par une moindre productivité. La région fertile dans les régions des hauts-plateaux.', 'images/venezuela.png', 'Caracas', 'Venezuela'),
(18, 5003402, '51100', '76.8', '0.9', 'Le gouvernement a offert aux agriculteurs des parcelles de terrain. Le système de la plantation de café s\'est donc développé en grande partie à la suite de la politique d\'ouverture, bien que les barons de café aient joué un rôle dans la croissance par la différenciation interne. Très vite, le café est devenu une source majeure de recettes.', 'images/costa_rica.png', 'San José', 'Costa Rica'),
(19, 57310019, '945087', '71.2', '0.8', 'L\'économie tanzanienne est fortement basée sur l\'agriculture, qui fournit 24 % du PIB national. En 2014, le café a représenté 3,3 % des exportations de la Tanzanie, pour un montant de 186 millions de dollars. Plus de 90 % de la production du pays provient de petits agriculteurs. Le café fournit de l\'emploi à 400 000 familles et concerne directement plus de 2,4 millions de personnes.\r\n', 'images/tanzanie.png', 'Dodoma', 'Tanzanie'),
(20, 24430325, '587041', '64', '0.7', 'le café constitue une des principales ressources du pays et occupe la troisième place des produits agricoles exportés en entrée de devises après la vanille et les crustacés. Les deux espèces arabica et robusta sont présentes à Madagascar, mais le robusta, cultivé dans les plaines, est de loin celui qui connaît la plus grosse production. L\'arabica est cultivé sur les hauts plateaux à 1 800 mètres d’altitude, l’arabica elita est considéré comme l\'un des meilleurs arabicas de Madagascar.', 'images/madagascar.png', 'Antananarivo', 'Madagascar');

-- --------------------------------------------------------

--
-- Structure de la table `typecafe`
--

DROP TABLE IF EXISTS `typecafe`;
CREATE TABLE IF NOT EXISTS `typecafe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TypeCafe` varchar(255) NOT NULL,
  `Provenance` int(11) NOT NULL,
  `QteStock` int(11) NOT NULL,
  `exportateur` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typecafe`
--

INSERT INTO `typecafe` (`id`, `TypeCafe`, `Provenance`, `QteStock`, `exportateur`) VALUES
(1, 'BIDULE', 1, 107, 1),
(2, 'Arabica', 1, 123, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TypeUtilisateur` varchar(255) NOT NULL,
  `Identifiant` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `NomEntreprise` varchar(255) NOT NULL,
  `NumTel` varchar(255) NOT NULL,
  `IdAdresse` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `TypeUtilisateur`, `Identifiant`, `Mdp`, `NomEntreprise`, `NumTel`, `IdAdresse`) VALUES
(1, 'Exportateur', 'Test', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 'Entreprise test', '0101010101', 0),
(2, 'Exportateur', 'user1', '9ec62c20118ff506dac139ec30a521d12b9883e55da92b7d9adeefe09ed4e0bd152e2a099339871424263784f8103391f83b781c432f45eccb03e18e28060d2f', 'Entreprise de User1', '0101010101', 4),
(3, 'Importateur', 'user2', 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a', 'Entreprise de User2', '0202020202', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
