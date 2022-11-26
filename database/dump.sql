/* Création de la table `User` */
DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users`(
    `id` integer(11) NOT NULL AUTO_INCREMENT,
    `lastname` varchar(40),
    `firstname` varchar(40),
    `login` varchar(30) NOT NULL UNIQUE,
    `password` varchar(60) NOT NULL,
    `role` varchar(12),
    check (`role` in ('user', 'admin')),
    PRIMARY KEY (`id`)
);

/* Insertion d'un utilisateur avec le role admin dans la table `User`*/
INSERT INTO `Users` (`id`, `lastname`, `firstname`,`login`, `password`, `role`) VALUES
('1', 'Admin', 'Admin', 'admin', '$2y$10$OgGilVcpTrARPRsrx8YZf.GRCGW3EAugei7htlwYaGDdbROVRY2pu', 'admin');
INSERT INTO `Users` (`id`, `lastname`, `firstname`,`login`, `password`, `role`) VALUES
    ('2', 'ROMAIN', 'ROMAIN', 'ROMAIN', '$2y$10$OgGilVcpTrARPRsrx8YZf.GRCGW3EAugei7htlwYaGDdbROVRY2pu', 'user');

/* Création de la table `Post` */
DROP TABLE IF EXISTS `Post`;
CREATE TABLE IF NOT EXISTS `Post` (
    `id` integer NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `authorId` int NOT NULL,
    `image` varchar (50),
    `created_at` datetime,
    `updated_at` datetime,
    PRIMARY KEY (`id`),
    FOREIGN KEY(`authorId`) REFERENCES `Users`(`id`)
);

/* Insertion de deux post du compte Admin dans la table `Post` */
INSERT INTO `Post` (`id`,`title`, `content`, `authorId`,`created_at`,`updated_at`) VALUES
(1,'Premier Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pharetra massa sit amet gravida tempus. Etiam mattis varius ipsum et viverra. Fusce sit amet bibendum eros, vel varius quam. Maecenas.',1, '2022-11-16 16:15:24', '2022-11-16 16:15:24'),
(2,'Second Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pharetra massa sit amet gravida tempus. Etiam mattis varius ipsum et viverra. Fusce sit amet bibendum eros, vel varius quam. Maecenas.',1, '2022-11-17 08:35:42', '2022-11-17 08:35:42');


/* Création de la table `Comment` */
DROP TABLE IF EXISTS `Comment`;
CREATE TABLE IF NOT EXISTS `Comment` (
    `id` integer NOT NULL AUTO_INCREMENT,
    `content` text NOT NULL,
    `authorId` int NOT NULL,
    `created_at` datetime,
    `updated_at` datetime,
    `postId` int NOT NULL,
    `commentId` int,
    PRIMARY KEY (`id`),
    FOREIGN KEY(`authorId`) REFERENCES `Users`(`id`),
    FOREIGN KEY(`postId`) REFERENCES `Post`(`id`),
    FOREIGN KEY(`commentId`) REFERENCES `Comment`(`id`)
);

/* Insertion d'un commentaire dans la table `Comment` */
INSERT INTO `Comment` (`id`,`content`, `authorId`,`created_at`,`updated_at`,`postId`) VALUES
(1, 'Lorem ipsum dolor sit amet, Fusce pharetra massa sit amet gravida temp Fusce sit amet bibendum eros, vel varius quam. Maecenas.',1, '2022-11-16 16:15:24', '2022-11-16 16:15:24',1);




