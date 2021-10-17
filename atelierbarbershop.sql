-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 17 oct. 2021 à 16:22
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `atelierbarbershop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `roles`, `password`) VALUES
(1, 'az', '[\"ROLE_ADMIN\",\"ROLE_SUPER_ADMIN\"]', '$2y$13$iM1RCWhHStxK1ZA2tGUkP.eEkFaDkJwa8x7cP0KqZLf5auA1ATUre'),
(6, 'azeryy', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$ajZ9sn0qOllSTv7NyWGsR.hgxMtyQtKCXizpf7ubTJrHudx3notXa'),
(21, 'G1jjjjjjjjj', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$9oBO8oRDuEdB.lj3yM5BIehHVEBN9x.4eH8afKxJZl.L62EGLB2dC'),
(22, 'dsfqdfqsdfsdfsdfsdfdsf', '[\"ROLE_USER\",\"ROLE_ADMIN\",\"ROLE_SUPER_ADMIN\"]', '$2y$13$3HZFEQkg4tm1STJf9oNG0ud27RDZYReZTKndN8OnkaeuHAjiNvw1a');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Barbe'),
(2, 'Coupe Homme'),
(3, 'Coupe Femme'),
(4, 'Les Marques'),
(5, 'Devanture'),
(6, 'Logo Header'),
(8, 'Logo Footer');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210828125859', '2021-08-28 14:59:24', 707),
('DoctrineMigrations\\Version20210903085313', '2021-09-03 10:54:34', 192),
('DoctrineMigrations\\Version20210907120708', '2021-09-07 14:09:00', 118),
('DoctrineMigrations\\Version20210910191219', '2021-09-10 21:12:35', 436),
('DoctrineMigrations\\Version20210912140205', '2021-09-12 16:02:32', 851),
('DoctrineMigrations\\Version20210912191835', '2021-09-12 21:18:48', 419),
('DoctrineMigrations\\Version20210912193740', '2021-09-12 21:38:13', 953),
('DoctrineMigrations\\Version20210914071520', '2021-09-17 22:22:28', 120),
('DoctrineMigrations\\Version20210914072050', '2021-09-14 09:21:09', 108),
('DoctrineMigrations\\Version20210919085628', '2021-09-19 11:10:07', 1642),
('DoctrineMigrations\\Version20210921071318', '2021-09-21 09:35:56', 917),
('DoctrineMigrations\\Version20210923123801', '2021-09-23 14:38:19', 994),
('DoctrineMigrations\\Version20210926210227', '2021-09-26 23:02:50', 6554),
('DoctrineMigrations\\Version20210929144447', '2021-09-29 16:45:13', 2017),
('DoctrineMigrations\\Version20210930105522', '2021-09-30 12:56:23', 372),
('DoctrineMigrations\\Version20210930121228', '2021-09-30 14:12:49', 83),
('DoctrineMigrations\\Version20210930130208', '2021-09-30 15:13:47', 1487),
('DoctrineMigrations\\Version20210930194029', '2021-09-30 21:43:46', 305),
('DoctrineMigrations\\Version20211004071446', '2021-10-04 09:31:16', 1619),
('DoctrineMigrations\\Version20211015063228', '2021-10-15 12:23:35', 30),
('DoctrineMigrations\\Version20211015101821', '2021-10-15 16:04:08', 655);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_size` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `image_name`, `image_size`, `updated_at`, `image_alt`, `category_id`, `admin_id`) VALUES
(33, 'logo-615ac51dbb7c3883561314.png', 110018, '2021-10-04 11:10:53', 'Logo du salon l\'Atelier Rouen', 6, 1),
(34, 'devanture-615ac5f25e786853074211.jpg', 94057, '2021-10-04 11:14:26', '18 rue Sainte Croix des Pelletiers Rouen', 5, 1),
(35, 'logo-keune-615ac66e8b239737587752.png', 85274, '2021-10-04 11:16:30', 'Logo Keune', 4, 1),
(36, 'logo-davines-615ac6a566166524670994.png', 27221, '2021-10-04 11:17:25', 'Logo Davines', 4, 1),
(37, 'logo-reuzel-615ac6b99fcad177125316.png', 13605, '2021-10-04 11:17:45', 'Logo Reuzel', 4, 1),
(38, 'capture1-615adf3651076961319174.jpg', 81509, '2021-10-04 13:02:14', 'Coupe', 3, 1),
(39, 'capture2-615adf4800bb7045733282.jpg', 60617, '2021-10-04 13:02:32', 'Coupe', 3, 1),
(40, 'capture3-615adf57c267c254421503.jpg', 76313, '2021-10-04 13:02:47', 'Coupe', 3, 1),
(45, 'capture4-615bf3ffd63c5891500103.jpg', 89172, '2021-10-05 08:43:11', 'Coupe', 3, 6),
(46, 'capture5-615bf40f70fef919557213.jpg', 100366, '2021-10-05 08:43:27', 'Coupe', 3, 6),
(47, 'capture6-615bf41a70965263971106.jpg', 70851, '2021-10-05 08:43:38', 'Coupe', 3, 1),
(48, 'capture7-615bf42604f11794091446.jpg', 89093, '2021-10-05 08:43:50', 'Coupe', 3, 1),
(54, 'exemple-coupe-cheveux2-coifman-coiffeur-barbier-barbersh-61649dfdb4aa2705574034.jpg', 48297, '2021-10-11 22:26:37', 'Coupe Homme', 2, 6),
(55, 'coupe-61649e15d1f54980875122.jpg', 59083, '2021-10-11 22:27:01', 'Coupe Homme', 2, 6),
(61, 'logofooterwhite-616ad85b66318760893714.png', 21719, '2021-10-16 15:49:15', 'Logo du salon l\'Atelier Rouen', 8, 1),
(62, 'exemple-coupe-cheveux-barbe-coifman-coiffeur-barbier-barbershop-616c02442d1ae134718994.jpg', 49588, '2021-10-17 13:00:20', 'Coupe Homme', 2, 1),
(63, 'coiffeur-barbier-barbershop-616c0261b31da702147411.jpg', 49614, '2021-10-17 13:00:49', 'Photo taille de barbe', 1, 1),
(64, 'exemple-taille-barbe-moustachop-616c027027bf4576287757.jpg', 69016, '2021-10-17 13:01:04', 'Photo taille de barbe', 1, 1),
(65, 'exemple-taille-b-barbier-barbershop-616c027d518f0358114342.jpg', 59963, '2021-10-17 13:01:17', 'Photo taille de barbe', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`id`, `postal_code`, `phone_number`, `siret`, `name`, `city`, `address`, `phone_number_link`, `admin_id`) VALUES
(1, '76000', '02 35 14 91 30', '837 800 242 00013', 'l\'Atelier', 'Rouen', '18 Rue Sainte Croix des Pelletiers', '+33235149130', 6);

-- --------------------------------------------------------

--
-- Structure de la table `opening_hours`
--

CREATE TABLE `opening_hours` (
  `id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `opening_hours`
--

INSERT INTO `opening_hours` (`id`, `day`, `open`, `close`, `admin_id`) VALUES
(1, 'Lundi', NULL, 'Fermé', 1),
(2, 'Mardi', '10h00 -', '19h30', 1),
(3, 'Mercredi', '10h00 -', '19h30', 1),
(4, 'Jeudi', '10h00 -', '19h30', 1),
(5, 'Vendredi', '10h00 -', '19h30', 6),
(6, 'Samedi', '10h00 -', '18h00', 6),
(7, 'Dimanche', 'Fermé', NULL, 6),
(8, 'Jours fériés', NULL, 'Fermé', 6);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `title`, `text`, `price`, `type`, `admin_id`) VALUES
(12, 'COUPE TRADITIONNELLE', NULL, '23€', 'Coupe', 1),
(13, 'Coupe traditionnelle', 'de près', '20€', 'Coupe', 1),
(14, 'Coupe traditionnelle', '- de 10 ans', '15€', 'Coupe', 1),
(15, 'Couronne', NULL, '15€', 'Coupe', 1),
(16, 'Coupe dégradée', NULL, '27€', 'Coupe', 1),
(17, 'Coupe dégradée', '- de 20 ans', '24€', 'Coupe', 1),
(18, 'Rasage crâne à l’ancienne', NULL, '25€', 'Coupe', 1),
(19, 'Taille de barbe express', NULL, '16€', 'Barbe', 1),
(20, 'Taille de barbe traditionnelle', NULL, '21€', 'Barbe', 1),
(21, 'Rasage complet à l’ancienne', NULL, '30€', 'Barbe', 6),
(22, 'Rasage collier bouc', NULL, '30€', 'Barbe', 6),
(23, 'Barbe traditionnelle + soin visage', NULL, '29€', 'Barbe', 6),
(24, 'Entretien moustache', NULL, '10€', 'Barbe', 6),
(25, 'Blend effet naturel', NULL, 'Sur devis', 'Coloration / Défrisage', 6),
(26, 'Blend cheveux + barbe', NULL, '29€', 'Coloration / Défrisage', 6),
(27, 'Mèches flash', NULL, 'Sur devis', 'Coloration / Défrisage', 6),
(28, 'Réduction de volume 1/2 tête', NULL, '35€', 'Coloration / Défrisage', 6),
(29, 'Réduction de volume tête entière', NULL, '45€', 'Coloration / Défrisage', 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_880E0D76F85E0677` (`username`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C53D045F12469DE2` (`category_id`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045F12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
