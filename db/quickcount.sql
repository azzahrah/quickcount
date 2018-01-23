/*
SQLyog Ultimate v12.4.3 (32 bit)
MySQL - 10.1.19-MariaDB : Database - quickcount
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`quickcount` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `quickcount`;

/*Table structure for table `calon` */

DROP TABLE IF EXISTS `calon`;

CREATE TABLE `calon` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_desa` int(4) DEFAULT '0',
  `no_urut` int(4) DEFAULT '0',
  `nama` varchar(50) DEFAULT NULL,
  `suara` int(6) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq` (`nama`,`id_desa`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `calon` */

insert  into `calon`(`id`,`id_desa`,`no_urut`,`nama`,`suara`) values 
(1,6,1,'ANTON',100),
(3,6,2,'SUKIMIN',102),
(4,6,4,'HERMAN',100),
(5,6,3,'KARTOLO',1000),
(6,11,2,'AGUNG',1000),
(7,11,1,'ANTON',333);

/*Table structure for table `desa` */

DROP TABLE IF EXISTS `desa`;

CREATE TABLE `desa` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_jajaran` int(4) DEFAULT '0',
  `desa` varchar(50) DEFAULT NULL,
  `jml_dpt` int(6) DEFAULT '0',
  `jml_dpt_tambahan` int(6) DEFAULT '0',
  `jml_dpt_total` int(6) DEFAULT '0',
  `jml_suara_sah` int(6) DEFAULT '0',
  `jml_suara_tdk_sah` int(6) DEFAULT '0',
  `jml_suara_golput` int(6) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq` (`desa`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `desa` */

insert  into `desa`(`id`,`id_jajaran`,`desa`,`jml_dpt`,`jml_dpt_tambahan`,`jml_dpt_total`,`jml_suara_sah`,`jml_suara_tdk_sah`,`jml_suara_golput`) values 
(7,2,'DESA TUNGGULREJO',10000,1333,11111,0,0,0),
(6,1,'LAMONGREJO',1000,3,1003,100,1,0),
(11,1,'DESA WATES',10000,2733,34,0,0,0);

/*Table structure for table `jajaran` */

DROP TABLE IF EXISTS `jajaran`;

CREATE TABLE `jajaran` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `jajaran` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jajaran` */

insert  into `jajaran`(`id`,`jajaran`) values 
(1,'POLRES LAMONGAN'),
(2,'POLSEK SUKODADI');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `real_name` varchar(50) DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  `id_jajaran` int(4) DEFAULT '0',
  `id_level` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`login`,`password`,`real_name`,`active`,`id_jajaran`,`id_level`) values 
(1,'admin','*6691484EA6B50DDDE1926A220DA01FA9E575C18A','Admin',1,1,1);

/*Table structure for table `user_level` */

DROP TABLE IF EXISTS `user_level`;

CREATE TABLE `user_level` (
  `id` int(4) NOT NULL,
  `level` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `user_level` */

insert  into `user_level`(`id`,`level`) values 
(0,'ADMINISTRATOR'),
(2,'OPERATOR');

/*Table structure for table `view_calon` */

DROP TABLE IF EXISTS `view_calon`;

/*!50001 DROP VIEW IF EXISTS `view_calon` */;
/*!50001 DROP TABLE IF EXISTS `view_calon` */;

/*!50001 CREATE TABLE  `view_calon`(
 `id` int(4) ,
 `id_desa` int(4) ,
 `no_urut` int(4) ,
 `nama` varchar(50) ,
 `suara` int(6) ,
 `desa` varchar(50) 
)*/;

/*Table structure for table `view_desa` */

DROP TABLE IF EXISTS `view_desa`;

/*!50001 DROP VIEW IF EXISTS `view_desa` */;
/*!50001 DROP TABLE IF EXISTS `view_desa` */;

/*!50001 CREATE TABLE  `view_desa`(
 `id` int(4) ,
 `id_jajaran` int(4) ,
 `desa` varchar(50) ,
 `jml_dpt` int(6) ,
 `jml_dpt_tambahan` int(6) ,
 `jml_dpt_total` int(6) ,
 `jml_suara_sah` int(6) ,
 `jml_suara_tdk_sah` int(6) ,
 `jml_suara_golput` int(6) ,
 `jajaran` varchar(30) 
)*/;

/*Table structure for table `view_hasil` */

DROP TABLE IF EXISTS `view_hasil`;

/*!50001 DROP VIEW IF EXISTS `view_hasil` */;
/*!50001 DROP TABLE IF EXISTS `view_hasil` */;

/*!50001 CREATE TABLE  `view_hasil`(
 `id` int(4) ,
 `id_jajaran` int(4) ,
 `desa` varchar(50) ,
 `jml_dpt` int(6) ,
 `jml_dpt_tambahan` int(6) ,
 `jml_dpt_total` int(6) ,
 `jml_suara_sah` int(6) ,
 `jml_suara_tdk_sah` int(6) ,
 `jml_suara_golput` int(6) ,
 `jajaran` varchar(30) ,
 `no_urut` int(4) ,
 `nama` varchar(50) ,
 `suara` int(6) 
)*/;

/*Table structure for table `view_user` */

DROP TABLE IF EXISTS `view_user`;

/*!50001 DROP VIEW IF EXISTS `view_user` */;
/*!50001 DROP TABLE IF EXISTS `view_user` */;

/*!50001 CREATE TABLE  `view_user`(
 `id` int(4) ,
 `login` varchar(50) ,
 `password` varchar(100) ,
 `real_name` varchar(50) ,
 `active` int(1) ,
 `id_jajaran` int(4) ,
 `id_level` int(2) ,
 `level` varchar(30) ,
 `jajaran` varchar(30) 
)*/;

/*View structure for view view_calon */

/*!50001 DROP TABLE IF EXISTS `view_calon` */;
/*!50001 DROP VIEW IF EXISTS `view_calon` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_calon` AS (select `c`.`id` AS `id`,`c`.`id_desa` AS `id_desa`,`c`.`no_urut` AS `no_urut`,`c`.`nama` AS `nama`,`c`.`suara` AS `suara`,`d`.`desa` AS `desa` from (`calon` `c` left join `desa` `d` on((`c`.`id_desa` = `d`.`id`)))) */;

/*View structure for view view_desa */

/*!50001 DROP TABLE IF EXISTS `view_desa` */;
/*!50001 DROP VIEW IF EXISTS `view_desa` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_desa` AS (select `d`.`id` AS `id`,`d`.`id_jajaran` AS `id_jajaran`,`d`.`desa` AS `desa`,`d`.`jml_dpt` AS `jml_dpt`,`d`.`jml_dpt_tambahan` AS `jml_dpt_tambahan`,`d`.`jml_dpt_total` AS `jml_dpt_total`,`d`.`jml_suara_sah` AS `jml_suara_sah`,`d`.`jml_suara_tdk_sah` AS `jml_suara_tdk_sah`,`d`.`jml_suara_golput` AS `jml_suara_golput`,`j`.`jajaran` AS `jajaran` from (`desa` `d` left join `jajaran` `j` on((`d`.`id_jajaran` = `j`.`id`)))) */;

/*View structure for view view_hasil */

/*!50001 DROP TABLE IF EXISTS `view_hasil` */;
/*!50001 DROP VIEW IF EXISTS `view_hasil` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hasil` AS (select `d`.`id` AS `id`,`d`.`id_jajaran` AS `id_jajaran`,`d`.`desa` AS `desa`,`d`.`jml_dpt` AS `jml_dpt`,`d`.`jml_dpt_tambahan` AS `jml_dpt_tambahan`,`d`.`jml_dpt_total` AS `jml_dpt_total`,`d`.`jml_suara_sah` AS `jml_suara_sah`,`d`.`jml_suara_tdk_sah` AS `jml_suara_tdk_sah`,`d`.`jml_suara_golput` AS `jml_suara_golput`,`j`.`jajaran` AS `jajaran`,`c`.`no_urut` AS `no_urut`,`c`.`nama` AS `nama`,`c`.`suara` AS `suara` from ((`desa` `d` left join `calon` `c` on((`d`.`id` = `c`.`id_desa`))) left join `jajaran` `j` on((`d`.`id_jajaran` = `j`.`id`)))) */;

/*View structure for view view_user */

/*!50001 DROP TABLE IF EXISTS `view_user` */;
/*!50001 DROP VIEW IF EXISTS `view_user` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS (select `u`.`id` AS `id`,`u`.`login` AS `login`,`u`.`password` AS `password`,`u`.`real_name` AS `real_name`,`u`.`active` AS `active`,`u`.`id_jajaran` AS `id_jajaran`,`u`.`id_level` AS `id_level`,`ul`.`level` AS `level`,`j`.`jajaran` AS `jajaran` from ((`user` `u` left join `user_level` `ul` on((`u`.`id_level` = `ul`.`id`))) left join `jajaran` `j` on((`u`.`id_jajaran` = `j`.`id`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
