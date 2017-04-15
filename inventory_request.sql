/*
SQLyog - Free MySQL GUI v5.15
Host - 5.7.14 : Database - request_inventory
*********************************************************************
Server version : 5.7.14
*/

SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `request_inventory`;

USE `request_inventory`;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

/*Table structure for table `manager` */

DROP TABLE IF EXISTS `manager`;

CREATE TABLE `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `managername` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `managerrepo` */

DROP TABLE IF EXISTS `managerrepo`;

CREATE TABLE `managerrepo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `dayte` text NOT NULL,
  `podayt` text NOT NULL,
  `tobedelivered` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `contactperson` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deliverydetail` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `requestedby` varchar(255) NOT NULL,
  `deliveryincharge` varchar(255) NOT NULL,
  `managername` varchar(255) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `managerrepo1` */

DROP TABLE IF EXISTS `managerrepo1`;

CREATE TABLE `managerrepo1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `too` varchar(255) NOT NULL,
  `fromm` varchar(255) NOT NULL,
  `dayte` text NOT NULL,
  `podate` text NOT NULL,
  `path` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `numfiles` varchar(255) NOT NULL,
  `requestedby` varchar(255) NOT NULL,
  `managername` varchar(255) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `requestdetails` */

DROP TABLE IF EXISTS `requestdetails`;

CREATE TABLE `requestdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `dayte` text NOT NULL,
  `podayt` text NOT NULL,
  `tobedelivered` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `contactperson` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deliverydetail` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `requestedby` varchar(255) NOT NULL,
  `deliveryincharge` varchar(255) NOT NULL,
  `managername` varchar(255) NOT NULL,
  `is_approved` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `requestdetails1` */

DROP TABLE IF EXISTS `requestdetails1`;

CREATE TABLE `requestdetails1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `too` varchar(255) NOT NULL,
  `fromm` varchar(255) NOT NULL,
  `dayte` text NOT NULL,
  `podate` text NOT NULL,
  `path` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `numfiles` varchar(255) NOT NULL,
  `requestedby` varchar(255) NOT NULL,
  `managername` varchar(255) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `userrepo` */

DROP TABLE IF EXISTS `userrepo`;

CREATE TABLE `userrepo` (
  `id` int(11) NOT NULL,
  `dayte` text NOT NULL,
  `podayt` text NOT NULL,
  `tobedelivered` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `contactperson` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deliverydetail` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `requestedby` varchar(255) NOT NULL,
  `deliveryincharge` varchar(255) NOT NULL,
  `managername` varchar(255) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

SET SQL_MODE=@OLD_SQL_MODE;