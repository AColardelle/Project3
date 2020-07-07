-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 07 juil. 2020 à 15:15
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gbaf`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

DROP TABLE IF EXISTS `acteur`;
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `acteur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`id_acteur`, `acteur`, `description`, `logo`) VALUES
(1, 'Formation&co\r\n', 'Formation&co est une association française présente sur tout le territoire. <br/>\r\nNous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.\r\nNotre proposition : <br/>\r\n- un financement jusqu’à 30 000€ ;<br/>\r\n- un suivi personnalisé et gratuit ;<br/>\r\n- une lutte acharnée contre les freins sociétaux et les stéréotypes.<br/><br/>\r\n\r\nLe financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.<br/>\r\nVous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.\r\n', 'img/formation_co.png'),
(2, 'Protectpeople\r\n', 'Protectpeople finance la solidarité nationale.<br/>\r\nNous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.<br/><br/>\r\n\r\nChez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.<br/>\r\nProectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.<br/>\r\nNous garantissons un accès aux soins et une retraite.\r\nChaque année, nous collectons et répartissons 300 milliards d’euros.<br/>\r\nNotre mission est double :<br/>\r\nsociale : nous garantissons la fiabilité des données sociales ;<br/>\r\néconomique : nous apportons une contribution aux activités économiques.', 'img/protectpeople.png'),
(3, 'Dsa France\r\n', 'Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales. <br/>\r\nNous accompagnons les entreprises dans les étapes clés de leur évolution.<br/>\r\nNotre philosophie : s’adapter à chaque entreprise.<br/>\r\nNous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises.', 'img/Dsa_france.png'),
(4, 'CDE\r\n', 'La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. <br/>\r\nSon président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.', 'img/CDE.png\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `membre_gbaf`
--

DROP TABLE IF EXISTS `membre_gbaf`;
CREATE TABLE IF NOT EXISTS `membre_gbaf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `question` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass_question` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre_gbaf`
--

INSERT INTO `membre_gbaf` (`id`, `nom`, `prenom`, `pseudo`, `pass`, `question`, `pass_question`) VALUES
(8, 'colardelle', 'Allan', 'Allanou', '$2y$10$GdiWpcTRUiQr.pjM6HxOqOlU81Ff2fQFYVlwMS/PeOy/rK3vMnt.C', 'Premiere voiture?', '$2y$10$aruC5uD96ADP3nwdB1kttu3Nl2eWgF0mntHil.uQ2laMAX94UK1sy'),
(1, 'Guineheuc', 'Jeremy', 'grossuceur', '$2y$10$GR4AOyTwBj7il8E9vg3gBuebBhdQmpgKmSRupAVv1O9nAskba9/iy', 'Combien de mec j\'ai suce', '$2y$10$WGvdRQ7ofCCKWolut1vJZ.aAkPT67WjOBAr30eY6Lnpc/ZXbctQz6'),
(17, 'Dupont', 'Jean', 'Jdupont', '$2y$10$n6.NwBdePXxxlnXsKfOKaO0w8UiPiKkRyz3Eqc6Jbdik0dRDafHXa', 'Premier animal de compagnie ?', '$2y$10$qnTpjJTxKMgeFHCz6dbgge4EAy3SVSoqeh/rGt3bt6rfBRL5.BseO'),
(18, 'Zeubio', 'Amine', 'Amine Zeubio', '$2y$10$.hHrfNs2FFZvRP46DoxFm.iSMlh75JBHC7cWEOowsenF2pguLh8b.', 'Le nom de votre premier animal de compagnie ?', '$2y$10$8bdgmJ4zG.fA2cqefskI2eo3L3oAtmEMTYPsMXlNHG/2pj.E6hrfS'),
(20, 'Allan', 'Colardelle', 'Allan.c', '$2y$10$HfQsus0wh5./edNKOsLCc.6.kre0VS8KpsLWNEcU8GWC5MpwXXxiC', 'mon premier animal de compagnie', '$2y$10$dy.d53N4KMz7qNCNKFn/j.PLVqZuzpiu5k7Wg5nzFWCQqV..sxFp6'),
(21, 'John', 'Doe', 'invisible', '$2y$10$86eXJw982ifH6yJzA56uO.MN8lYswUkYrrq7cCAN5V6/pBupaTc8m', 'voiture', '$2y$10$DmvSzBwlauTnjikr2uND7eT49NJAW8AQVi5OLpIv6DXOt64NhjuEK'),
(25, 'Berrada', 'Rayane', 'Cofec', '$2y$10$MYQ/UoZQFLzbpwbyQ/ox7uZ8jDGS9cmQbEOVV5qKquhk3B0IFsBGa', 'Dans quelle ville &amp;ecirc;tes vous n&amp;eacute;e ?', '$2y$10$l/wIlogjo//jp/sy1n.zYOb/cTqZ1c/v1sQ3UUO2UEHb3Eq46QLq6'),
(26, 'Pierre', 'maurice', 'pmaurice', '$2y$10$/vKnexCIn/cDiNMYROKvxufwUk4WmpelkJs7k/rcvlTH03TY/tVHC', 'Votre premiere voiture ?', '$2y$10$VXnkSz45E/0VcEZRJBJvP.D1WFl6m1Qijqz9gSy7HcstlnnKtZ76e'),
(27, 'qwertyuiop', 'qwertyuiop', 'qwertyuiop', '$2y$10$N372gHFF3XiM91ZTkjVvs.V8EGSOyLtiGlHE1jvFAfUKrO0r.PCgC', 'Votre premiere voiture ?', '$2y$10$9K6keyXeOB2Ju4ecVTAAGuiJZF6qVXnXV2oxa2EiQO/7y5jaObVmm');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `post` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `id_acteur`, `date_add`, `post`) VALUES
(75, 8, 3, '2020-07-04 12:53:01', 'Le meilleur !'),
(74, 8, 1, '2020-07-03 15:21:35', 'Bof bof'),
(68, 8, 1, '2020-07-03 15:20:00', 'Bof bof'),
(67, 8, 1, '2020-07-03 14:27:57', 'test'),
(64, 18, 3, '2020-07-02 14:19:06', 'Bon partenaire'),
(62, 18, 2, '2020-07-02 13:20:43', 'Je ne recommande pas ce partenaire.'),
(61, 18, 1, '2020-07-02 12:44:46', 'Trés bon partenaire.');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id_user` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `fe` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`fe`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`id_user`, `id_acteur`, `vote`, `fe`) VALUES
(8, 4, 1, 200),
(22, 1, -1, 184),
(8, 1, -1, 205),
(8, 3, 1, 207),
(18, 2, 1, 196),
(18, 1, 1, 185);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
