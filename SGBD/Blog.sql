-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `Blog` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Blog`;

DROP TABLE IF EXISTS `Articles`;
CREATE TABLE `Articles` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `UpLike` tinyint(4) DEFAULT '0',
  `DnLike` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Commentaires`;
CREATE TABLE `Commentaires` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `dateCreation` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2019-03-17 09:38:02
