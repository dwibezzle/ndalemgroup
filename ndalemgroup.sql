/*
SQLyog Ultimate v8.8 
MySQL - 5.6.17 : Database - endsrezw_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `acl_counter` */

DROP TABLE IF EXISTS `acl_counter`;

CREATE TABLE `acl_counter` (
  `nomor` int(10) NOT NULL AUTO_INCREMENT,
  `counter_project` varchar(10) DEFAULT NULL,
  `psjb` int(3) unsigned zerofill DEFAULT NULL,
  `ppjb` int(3) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `acl_counter` */

insert  into `acl_counter`(`nomor`,`counter_project`,`psjb`,`ppjb`) values (1,'1',001,001);

/*Table structure for table `adm_menu` */

DROP TABLE IF EXISTS `adm_menu`;

CREATE TABLE `adm_menu` (
  `idmenu` int(3) NOT NULL AUTO_INCREMENT,
  `main` varchar(1) DEFAULT '1',
  `root` varchar(1) DEFAULT '1',
  `urutan` int(4) DEFAULT NULL,
  `inimenu` enum('n','y') DEFAULT NULL,
  `judul` varchar(30) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `status` enum('active','delete') DEFAULT NULL,
  `idmain` varchar(3) DEFAULT 'x',
  `child1` varchar(3) DEFAULT 'y',
  `child2` varchar(3) DEFAULT 'z',
  `insertby` varchar(30) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(30) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idmenu`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

/*Data for the table `adm_menu` */

insert  into `adm_menu`(`idmenu`,`main`,`root`,`urutan`,`inimenu`,`judul`,`url`,`status`,`idmain`,`child1`,`child2`,`insertby`,`inserted`,`updateby`,`updated`) values (3,'0','1',1,'y','Operasional',NULL,'active','x','y','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(4,'1','0',12,'y','PSJB',NULL,'active','3','100','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(5,'1','1',123,'y','Create PSJB','operasional/perjanjian_sementara','active','x','y','100','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(6,'1','1',0,'n','Simulasi KPR','operasional/perjanjian_sementara_simulasi','active','x','y','100','admin','2013-12-16 09:50:18',NULL,'0000-00-00 00:00:00'),(7,'1','1',0,'n','Surat Penawaran Bank','operasional/perjanjian_sementara_bank','active','x','y','100','admin','2013-12-16 09:50:25',NULL,'0000-00-00 00:00:00'),(8,'1','1',13,'y','PPJB',NULL,'active','3','200','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(9,'1','1',131,'y','Create PPJB','operasional/perjanjian_pendahuluan','active','x','y','200','admin','2013-12-16 09:50:45','admin','2012-12-07 02:41:36'),(10,'1','0',14,'y','AJB',NULL,'active','3','300','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(11,'1','1',141,'y','Create AJB','operasional/akta_jualbeli','active','x','y','300','admin','2014-02-17 11:49:26',NULL,'0000-00-00 00:00:00'),(12,'1','1',0,'n','Srt Pernyataan Sert & IMB','operasional/surat_pernyataan_sertifikat_imb','delete','x','y','300','admin','2013-12-16 09:51:21',NULL,'0000-00-00 00:00:00'),(13,'1','1',0,'n','Srt Instruksi Transfer','operasional/surat_instruksi_transfer','delete','x','y','300','admin','2013-12-16 09:51:24',NULL,'0000-00-00 00:00:00'),(14,'1','0',16,'y','KBK & KBF',NULL,'active','3','400','z','admin','2013-12-17 16:53:16',NULL,'0000-00-00 00:00:00'),(15,'1','1',161,'y','Create KBK','operasional/kbk','active','x','y','400','admin','2013-12-17 16:53:18','admin','2012-12-31 13:02:01'),(16,'1','1',162,'y','Create KBF','operasional/kbf','active','x','y','400','admin','2013-12-17 16:53:19','admin','2012-12-31 17:18:22'),(17,'1','0',17,'y','STP',NULL,'active','3','500','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(18,'1','1',0,'n','Cek Lap 1','operasional/cek_laporan_1','delete','x','y','500','admin','2013-12-16 09:53:42',NULL,'0000-00-00 00:00:00'),(19,'1','1',0,'n','Cek Lap 2','operasional/cek_laporan_2','delete','x','y','500','admin','2013-12-16 09:53:45',NULL,'0000-00-00 00:00:00'),(20,'1','1',17,'y','Create STP','operasional/stp','active','x','y','500','admin','2013-12-16 09:49:35','admin','2012-12-31 18:02:07'),(21,'1','0',18,'y','BAST',NULL,'active','3','600','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(22,'1','1',181,'y','Create BAST','operasional/bast','active','x','y','600','admin','2013-12-16 09:53:55','admin','2012-12-31 20:14:33'),(23,'0','1',2,'y','Keuangan',NULL,'active','x','y','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(24,'1','0',21,'y','Penerimaan',NULL,'active','23','111','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(25,'1','1',211,'y','Penerimaan Cash/KPR','penerimaan/penerimaan_cash_kpr','active','x','y','111','admin','2014-08-06 14:34:01',NULL,'0000-00-00 00:00:00'),(28,'1','1',212,'y','Penerimaan Lain-Lain','penerimaan/lain_lain','active','x','y','111','admin','2013-12-16 09:54:05',NULL,'0000-00-00 00:00:00'),(29,'1','0',22,'y','Pengeluaran',NULL,'active','23','222','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(30,'1','1',221,'y','HPP Tanah','biayahpp/tanah','active','x','y','222','admin','2013-12-16 09:54:21',NULL,'0000-00-00 00:00:00'),(31,'1','1',222,'y','HPP Pengolahan Lahan','biayahpp/pengolahan_lahan','active','x','y','222','admin','2013-12-16 09:54:22',NULL,'0000-00-00 00:00:00'),(32,'1','1',223,'y','HPP Prasarana & Sarana','biayahpp/prasarana_sarana','active','x','y','222','admin','2013-12-16 09:54:24',NULL,'0000-00-00 00:00:00'),(33,'1','1',224,'y','HPP Konstruksi Rumah','biayahpp/konstruksi_rumah','active','x','y','222','admin','2013-12-16 09:54:27',NULL,'0000-00-00 00:00:00'),(34,'1','1',225,'y','HPP Perijinan Proyek','biayahpp/perijinan_proyek','active','x','y','222','admin','2013-12-16 09:54:29',NULL,'0000-00-00 00:00:00'),(35,'1','1',226,'y','HPP Legalitas Proyek','biayahpp/legalitas_proyek','active','x','y','222','admin','2013-12-16 09:54:31',NULL,'0000-00-00 00:00:00'),(36,'1','1',227,'y','HPP Legalitas Penjualan','biayahpp/legalitas_penjualan','active','x','y','222','admin','2013-12-16 09:54:33',NULL,'0000-00-00 00:00:00'),(37,'1','1',228,'y','HPP Manajemen','biayahpp/manajemen','active','x','y','222','admin','2013-12-16 09:54:35',NULL,'0000-00-00 00:00:00'),(38,'1','1',229,'y','HPP Administrasi Umum','biayahpp/administrasi_umum','active','x','y','222','admin','2013-12-16 09:54:40',NULL,'0000-00-00 00:00:00'),(39,'1','1',230,'y','HPP Lain','biayahpp/lain_lain','active','x','y','222','admin','2013-12-16 09:54:47',NULL,'0000-00-00 00:00:00'),(40,'0','0',3,'y','Laporan',NULL,'active','x','y','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(41,'1','1',31,'y','Laporan Operasional',NULL,'active','40','333','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(42,'1','1',311,'y','Lap. PSJB','laporan/psjb','active','x','y','333','admin','2013-12-16 09:54:59',NULL,'0000-00-00 00:00:00'),(43,'1','1',312,'y','Lap. PPJB','laporan/ppjb','active','x','y','333','admin','2013-12-16 09:55:01',NULL,'0000-00-00 00:00:00'),(44,'1','1',314,'y','Lap. SPMB','laporan/spmb','active','x','y','333','admin','2013-12-26 16:59:43','admin','2013-01-01 19:36:54'),(45,'1','1',313,'y','Lap. AJB','laporan/ajb','active','x','y','333','admin','2013-12-26 16:59:45',NULL,'0000-00-00 00:00:00'),(46,'1','1',317,'y','Lap. STP','laporan/stp','active','x','y','333','admin','2013-12-26 16:59:56',NULL,'0000-00-00 00:00:00'),(47,'1','1',318,'y','Lap. BAST','laporan/bast','active','x','y','333','admin','2013-12-26 16:59:58',NULL,'0000-00-00 00:00:00'),(48,'1','1',32,'y','Laporan Keuangan',NULL,'active','40','444','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(49,'1','1',321,'y','Lap. Pen Cash/Transfer','laporan/penerimaan_cash_bank','active','x','y','444','admin','2013-12-16 09:55:43',NULL,'0000-00-00 00:00:00'),(50,'1','1',322,'y','Lap. Pen KPR','laporan/penerimaan_kpr','active','x','y','444','admin','2013-12-16 09:55:48',NULL,'0000-00-00 00:00:00'),(51,'1','1',323,'y','Lap. Pen Lain-Lain','laporan/penerimaan_lain','active','x','y','444','admin','2013-12-16 09:55:53',NULL,'0000-00-00 00:00:00'),(52,'1','1',324,'y','Lap. HPP','laporan/hpp','active','x','y','444','admin','2013-12-16 09:56:00',NULL,'0000-00-00 00:00:00'),(53,'1','1',325,'y','Lap. Piutang','laporan/piutang2','active','x','y','444','admin','2014-08-08 10:19:58',NULL,'0000-00-00 00:00:00'),(54,'1','1',326,'y','Lap. Hutang','laporan/hutang_general','active','x','y','444','admin','2014-08-13 11:39:24','indouser','2014-08-13 06:39:24'),(55,'1','1',327,'y','Lap. Cash Flow','laporan/cash_flow','active','x','y','444','admin','2013-12-16 09:56:07',NULL,'0000-00-00 00:00:00'),(56,'1','1',328,'y','Lap. SKU','laporan/sku','active','x','y','444','admin','2013-12-16 09:56:09',NULL,'0000-00-00 00:00:00'),(57,'1','1',33,'y','Laporan Sales',NULL,'active','40','555','z','admin','2013-12-16 09:56:23',NULL,'0000-00-00 00:00:00'),(58,'1','1',331,'y','Lap. Penjualan','laporan/sales_penjualan','active','x','y','555','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(59,'1','1',332,'y','Lap. Konsumen','laporan/sales_konsumen','active','x','y','555','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(60,'1','1',333,'y','Pricelist','laporan/sales_pricelist','active','x','y','555','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(61,'0','0',4,'y','Master Data',NULL,'active','x','y','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(62,'1','1',41,'y','Daftar Role','setting/role','active','61','y','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(63,'1','1',42,'y','Daftar Menu','setting/menu','active','61','y','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(64,'1','1',43,'y','Atur Role & Menu','setting/menu_role','active','61','y','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(65,'1','1',44,'y','Management User','setting/user_management','active','61','y','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(66,'1','1',48,'y','Nama Perusahaan','setting/project_area','active','61','y','z','admin','2013-12-17 22:19:59',NULL,'0000-00-00 00:00:00'),(67,'1','1',47,'y','Nama Kota','setting/daftar_kota','active','61','y','z','admin','2013-12-17 13:04:07',NULL,'0000-00-00 00:00:00'),(68,'1','1',45,'y','Daftar Bank','setting/daftar_bank','active','61','y','z','admin','2013-12-17 13:21:18',NULL,'0000-00-00 00:00:00'),(69,'1','1',50,'y','Nama Kavling','setting/daftar_kavling','active','61','y','z','admin','2013-12-17 13:05:14',NULL,'0000-00-00 00:00:00'),(70,'1','1',49,'y','Nama Perumahan','setting/daftar_perumahan','active','61','y','z','admin','2013-12-17 13:22:11',NULL,'0000-00-00 00:00:00'),(71,'1','1',46,'y','Setting App','setting/setting_app','active','61','y','z','admin','2013-12-17 13:21:20',NULL,'0000-00-00 00:00:00'),(72,'1','1',51,'y','Pengumuman','setting/pengumuman','active','61','y','z','admin','2013-12-16 09:49:35',NULL,'0000-00-00 00:00:00'),(97,'1','1',NULL,'n','Edit PSJB','operasional/edit_perjanjian_sementara_informasi','active','x','y','z','admin','2013-12-16 09:56:35',NULL,'0000-00-00 00:00:00'),(98,'1','1',NULL,'n','Edit PPJB','operasional/edit_perjanjian_pendahuluan_informasi','active','x','y','z','admin','2013-12-16 09:56:37',NULL,'0000-00-00 00:00:00'),(99,'1','1',NULL,'n','Hutang ke proses','penerimaan/pembayaran_hutang_ke_proses','active','x','y','z','admin','2013-12-16 09:56:39',NULL,'0000-00-00 00:00:00'),(100,'1','1',NULL,'n','update psjb to ppjb','operasional/perjanjian_pendahuluan_pendaftaran','active','x','y','z','admin','2013-12-16 09:56:41',NULL,'0000-00-00 00:00:00'),(101,'1','1',NULL,'n','Pendaftaran AJB','operasional/akta_jualbeli_pendaftaran','active','x','y','z','admin','2013-12-16 09:57:06',NULL,'0000-00-00 00:00:00'),(102,'1','0',15,'y','SPMB','','active','3','666','z','admin','2013-12-17 16:53:08',NULL,'0000-00-00 00:00:00'),(103,'1','1',NULL,'n','Pendaftaran SPMB','operasional/spmb_pendaftaran','active','x','y','z','admin','2013-12-16 10:39:25',NULL,'0000-00-00 00:00:00'),(104,'1','1',NULL,'n','Pendaftaran KBK','operasional/kbk_pendaftaran','active','x','y','z','admin','2013-12-16 10:39:28',NULL,'0000-00-00 00:00:00'),(105,'1','1',NULL,'n','Pendaftaran KBF','operasional/kbf_pendaftaran','active','x','y','z','admin','2013-12-16 10:39:30',NULL,'0000-00-00 00:00:00'),(106,'1','1',NULL,'n','Pendaftaran STP','operasional/stp_pendaftaran','active','x','y','z','admin','2013-12-16 10:39:33',NULL,'0000-00-00 00:00:00'),(107,'1','1',NULL,'n','Pendaftaran BAST','operasional/bast_pendaftaran','active','x','y','z','admin','2013-12-16 10:39:39',NULL,'0000-00-00 00:00:00'),(108,'1','1',315,'y','Lap. KBK','laporan/kbk','active','x','y','333','admin','2013-12-26 17:00:08',NULL,'0000-00-00 00:00:00'),(109,'1','1',316,'y','Lap. KBF','laporan/kbf','active','x','y','333','admin','2013-12-26 17:00:10',NULL,'0000-00-00 00:00:00'),(110,'1','1',220,'y','Pembayaran Hutang','penerimaan/pembayaran_hutang_general','active','x','y','222','admin','2014-08-13 11:04:43','indouser','2014-08-13 06:04:43'),(124,'1','1',213,'y','Penerimaan Modal','penerimaan/modal_lain','active','x','y','111','indouser','2014-03-01 21:00:07',NULL,'0000-00-00 00:00:00'),(112,'1','1',151,'y','Create SPMB','operasional/spmb','active','x','y','666','admin','2013-12-17 16:53:10',NULL,'0000-00-00 00:00:00'),(113,'1','1',NULL,'n','Ambil Nama Perumahan','setting/get_user_perum_id','active','x','y','z',NULL,'2013-12-23 06:28:01',NULL,'0000-00-00 00:00:00'),(114,'1','1',124,'y','Informasi Data PSJB','operasional/perjanjian_sementara_informasi','active','x','y','100',NULL,'2014-02-17 11:47:44','admin','2013-12-24 00:03:18'),(121,'1','1',132,'y','Informasi Data PPJB','operasional/perjanjian_pendahuluan_informasi','active','x','y','200','admin','2014-02-17 11:48:30',NULL,'0000-00-00 00:00:00'),(115,'1','1',142,'y','Informasi Data AJB','operasional/akta_jualbeli_informasi','active','x','y','300','admin','2014-02-17 11:49:56',NULL,'0000-00-00 00:00:00'),(116,'1','1',152,'y','Informasi Data SPMB','operasional/spmb_informasi','active','x','y','666','admin','2014-02-17 11:51:05',NULL,'0000-00-00 00:00:00'),(117,'1','1',163,'y','Informasi Data KBK','operasional/kbk_informasi','active','x','y','400','admin','2014-02-17 11:51:49',NULL,'0000-00-00 00:00:00'),(118,'1','1',164,'y','Informasi Data KBF','operasional/kbf_informasi','active','x','y','400','admin','2014-02-17 11:51:58',NULL,'0000-00-00 00:00:00'),(119,'1','1',171,'y','Informasi Data STP','operasional/stp_informasi','active','x','y','500','admin','2014-02-17 11:52:28',NULL,'0000-00-00 00:00:00'),(120,'1','1',182,'y','Informasi Data BAST','operasional/bast_informasi','active','x','y','600','admin','2014-02-17 11:52:58',NULL,'0000-00-00 00:00:00'),(125,'1','1',23,'y','Create Nota Permintaan','penerimaan/nota_permintaan','active','x','y','222','indouser','2014-07-02 20:33:19',NULL,'0000-00-00 00:00:00'),(126,'1','1',329,'y','Lap. Penerimaan Modal','laporan/penerimaan_modal','active','x','y','444','indouser','2014-06-14 15:23:52','indouser','2014-06-14 15:24:16'),(127,'1','1',24,'y','Setting Anggaran Pengeluaran','penerimaan/setting_anggaran','active','x','y','222',NULL,'2014-07-07 17:09:20',NULL,'0000-00-00 00:00:00'),(128,'1','1',211,'y','Penerimaan Cash/KPR','penerimaan/penerimaan_cash_kpr','active','x','y','111','admin','2013-12-16 09:54:13',NULL,'0000-00-00 00:00:00'),(129,'1','1',211,'y','Penerimaan Cash/KPR','penerimaan/penerimaan_cash_kpr','active','x','y','111','admin','2013-12-16 09:54:13',NULL,'0000-00-00 00:00:00');

/*Table structure for table `adm_menurole` */

DROP TABLE IF EXISTS `adm_menurole`;

CREATE TABLE `adm_menurole` (
  `idmenurole` int(10) NOT NULL AUTO_INCREMENT,
  `auth` varchar(5) DEFAULT '1000',
  `idmenu` int(10) DEFAULT NULL,
  `idrole` int(3) DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmenurole`),
  UNIQUE KEY `idmenurole` (`idmenurole`),
  KEY `FK_adm_menurole` (`idmenu`),
  KEY `FK_adm_menurole_role` (`idrole`)
) ENGINE=MyISAM AUTO_INCREMENT=495 DEFAULT CHARSET=latin1;

/*Data for the table `adm_menurole` */

insert  into `adm_menurole`(`idmenurole`,`auth`,`idmenu`,`idrole`,`insertby`,`inserted`) values (444,'1000',53,2,'00000001','2014-02-17 18:50:17'),(311,'1000',46,4,'00000001','2013-05-17 02:00:20'),(310,'1000',41,4,'00000001','2013-05-17 01:59:24'),(31,'1000',3,5,'0','2012-12-07 16:07:54'),(479,'1000',42,5,'0','2014-03-01 14:19:57'),(33,'1000',4,5,'0','2012-12-07 16:09:11'),(34,'1000',8,5,'0','2012-12-07 16:09:23'),(474,'1000',11,3,'0','2014-02-23 23:36:05'),(473,'1000',10,3,'0','2014-02-23 23:36:05'),(37,'1000',97,5,'0','2012-12-08 00:22:24'),(461,'1000',40,3,'0','2014-02-17 23:48:35'),(468,'1000',43,3,'0','2014-02-23 23:26:45'),(83,'1000',17,5,'0','2013-01-01 13:12:23'),(82,'1000',102,5,'0','2013-01-01 13:12:06'),(81,'1000',10,5,'0','2013-01-01 13:11:48'),(452,'1000',120,2,'00000001','2014-02-17 18:50:17'),(143,'1000',24,5,'0','2013-01-27 06:32:01'),(49,'1000',4,1,'0','2012-12-08 03:51:25'),(50,'1000',5,1,'0','2012-12-08 03:51:36'),(51,'1000',97,1,'0','2012-12-08 03:52:00'),(446,'1000',55,2,'00000001','2014-02-17 18:50:17'),(443,'1000',52,2,'00000001','2014-02-17 18:50:17'),(442,'1000',49,2,'00000001','2014-02-17 18:50:17'),(75,'1000',104,4,'00000001','2012-12-31 20:04:14'),(74,'1000',3,4,'00000001','2012-12-31 19:30:09'),(73,'1000',16,4,'00000001','2012-12-31 19:29:44'),(72,'1000',15,4,'00000001','2012-12-31 19:29:32'),(71,'1000',14,4,'00000001','2012-12-31 19:29:20'),(66,'1000',21,2,'00000001','2012-12-30 02:16:15'),(67,'1000',22,2,'00000001','2012-12-30 02:16:37'),(451,'1000',116,2,'00000001','2014-02-17 18:50:17'),(69,'1000',102,2,'00000001','2012-12-30 19:00:24'),(450,'1000',111,2,'0','2014-02-17 18:50:17'),(76,'1000',105,4,'00000001','2012-12-31 20:04:27'),(77,'1000',106,4,'00000001','2012-12-31 20:04:37'),(78,'1000',17,4,'00000001','2013-01-01 01:01:02'),(79,'1000',20,4,'00000001','2013-01-01 01:01:18'),(80,'1000',107,2,'00000001','2013-01-01 03:19:56'),(84,'1000',21,5,'0','2013-01-01 13:12:34'),(467,'1000',9,3,'0','2014-02-23 23:26:45'),(86,'1000',14,5,'0','2013-01-01 13:13:49'),(482,'1000',124,6,'00000001','2014-03-01 21:05:38'),(481,'1000',124,2,'00000001','2014-03-01 21:03:15'),(90,'1000',40,5,'0','2013-01-01 13:28:15'),(91,'1000',41,5,'0','2013-01-01 13:28:35'),(92,'1000',48,5,'0','2013-01-01 13:28:51'),(93,'1000',57,5,'0','2013-01-01 13:29:13'),(94,'1000',24,5,'0','2013-01-01 13:31:05'),(95,'1000',29,5,'0','2013-01-01 13:31:20'),(470,'1000',100,3,'0','2014-02-23 23:26:45'),(463,'1000',7,3,'0','2014-02-17 23:56:51'),(98,'1000',44,5,'0','2013-01-01 13:34:05'),(99,'1000',45,5,'0','2013-01-01 13:34:17'),(100,'1000',46,5,'0','2013-01-01 13:34:36'),(101,'1000',47,5,'0','2013-01-01 13:34:50'),(466,'1000',8,3,'0','2014-02-23 23:26:45'),(454,'1000',3,1,'0','2014-02-17 23:05:03'),(309,'1000',40,4,'00000001','2013-05-17 01:59:09'),(476,'1000',60,1,'0','2014-02-23 23:41:28'),(308,'1000',47,2,'00000001','2013-05-17 01:57:28'),(307,'1000',44,2,'00000001','2013-05-17 01:57:08'),(304,'1000',40,2,'00000001','2013-05-17 01:56:00'),(475,'1000',45,3,'0','2014-02-23 23:36:05'),(471,'1000',121,3,'0','2014-02-23 23:26:45'),(459,'1000',101,3,'0','2014-02-17 23:08:50'),(469,'1000',98,3,'0','2014-02-23 23:26:45'),(457,'1000',6,3,'0','2014-02-17 23:08:50'),(456,'1000',100,1,'0','2014-02-17 23:05:03'),(478,'1000',123,2,'0','2014-03-01 13:27:44'),(453,'1000',119,4,'00000001','2014-02-17 18:51:47'),(449,'1000',60,2,'00000001','2014-02-17 18:50:17'),(448,'1000',59,2,'00000001','2014-02-17 18:50:17'),(441,'1000',48,2,'00000001','2014-02-17 18:50:17'),(305,'1000',41,2,'00000001','2013-05-17 01:56:25'),(126,'1000',25,2,'00000001','2013-01-20 17:33:57'),(144,'1000',25,5,'0','2013-01-27 06:32:18'),(128,'1000',28,2,'00000001','2013-01-20 17:34:59'),(139,'1000',24,2,'00000001','2013-01-20 17:38:26'),(140,'1000',29,2,'00000001','2013-01-20 17:38:38'),(141,'1000',23,2,'00000001','2013-01-20 17:38:55'),(414,'1000',114,5,'0','2014-02-17 11:44:36'),(413,'1000',114,6,'00000001','2013-12-24 05:36:38'),(147,'1000',28,5,'0','2013-01-27 06:32:23'),(148,'1000',29,5,'0','2013-01-27 06:32:24'),(149,'1000',30,5,'0','2013-01-27 06:32:25'),(150,'1000',31,5,'0','2013-01-27 06:32:27'),(151,'1000',32,5,'0','2013-01-27 06:32:28'),(152,'1000',33,5,'0','2013-01-27 06:32:28'),(153,'1000',34,5,'0','2013-01-27 06:32:29'),(154,'1000',35,5,'0','2013-01-27 06:32:30'),(155,'1000',36,5,'0','2013-01-27 06:32:32'),(156,'1000',37,5,'0','2013-01-27 06:32:33'),(157,'1000',38,5,'0','2013-01-27 06:32:34'),(158,'1000',39,5,'0','2013-01-27 06:32:36'),(159,'1000',40,5,'0','2013-01-27 06:32:37'),(160,'1000',41,5,'0','2013-01-27 06:32:38'),(464,'1000',72,3,'0','2014-02-17 23:56:51'),(462,'1000',41,3,'0','2014-02-17 23:48:35'),(163,'1000',44,5,'0','2013-01-27 06:32:42'),(164,'1000',45,5,'0','2013-01-27 06:32:43'),(165,'1000',46,5,'0','2013-01-27 06:32:44'),(166,'1000',47,5,'0','2013-01-27 06:32:46'),(167,'1000',48,5,'0','2013-01-27 06:32:47'),(168,'1000',49,5,'0','2013-01-27 06:32:48'),(169,'1000',50,5,'0','2013-01-27 06:32:50'),(170,'1000',51,5,'0','2013-01-27 06:32:51'),(171,'1000',52,5,'0','2013-01-27 06:32:53'),(172,'1000',53,5,'0','2013-01-27 06:32:54'),(173,'1000',54,5,'0','2013-01-27 06:32:55'),(174,'1000',55,5,'0','2013-01-27 06:32:56'),(175,'1000',56,5,'0','2013-01-27 06:32:57'),(176,'1000',57,5,'0','2013-01-27 06:32:57'),(177,'1000',58,5,'0','2013-01-27 06:32:58'),(178,'1000',59,5,'0','2013-01-27 06:32:59'),(179,'1000',60,5,'0','2013-01-27 06:43:04'),(428,'1000',121,6,'00000001','2014-02-17 11:44:55'),(427,'1000',120,6,'00000001','2014-02-17 11:44:55'),(426,'1000',119,6,'00000001','2014-02-17 11:44:55'),(425,'1000',118,6,'00000001','2014-02-17 11:44:55'),(424,'1000',117,6,'00000001','2014-02-17 11:44:55'),(423,'1000',116,6,'00000001','2014-02-17 11:44:55'),(422,'1000',115,6,'00000001','2014-02-17 11:44:55'),(421,'1000',121,5,'0','2014-02-17 11:44:36'),(420,'1000',120,5,'0','2014-02-17 11:44:36'),(419,'1000',119,5,'0','2014-02-17 11:44:36'),(418,'1000',118,5,'0','2014-02-17 11:44:36'),(417,'1000',117,5,'0','2014-02-17 11:44:36'),(416,'1000',116,5,'0','2014-02-17 11:44:36'),(415,'1000',115,5,'0','2014-02-17 11:44:36'),(412,'1000',113,6,'00000001','2013-12-23 17:35:56'),(411,'1000',112,6,'00000001','2013-12-23 17:35:56'),(410,'1000',111,6,'0','2013-12-23 17:35:56'),(408,'1000',109,6,'00000001','2013-12-23 17:35:56'),(407,'1000',108,6,'00000001','2013-12-23 17:35:56'),(406,'1000',107,6,'00000001','2013-12-23 17:35:56'),(405,'1000',106,6,'00000001','2013-12-23 17:35:56'),(404,'1000',105,6,'00000001','2013-12-23 17:35:56'),(403,'1000',104,6,'00000001','2013-12-23 17:35:56'),(402,'1000',103,6,'00000001','2013-12-23 17:35:56'),(401,'1000',102,6,'00000001','2013-12-23 17:35:56'),(400,'1000',101,6,'00000001','2013-12-23 17:35:56'),(399,'1000',100,6,'00000001','2013-12-23 17:35:56'),(398,'1000',99,6,'00000001','2013-12-23 17:35:56'),(397,'1000',98,6,'00000001','2013-12-23 17:35:56'),(396,'1000',97,6,'00000001','2013-12-23 17:35:56'),(395,'1000',72,6,'00000001','2013-12-23 17:35:56'),(394,'1000',71,6,'00000001','2013-12-23 17:35:56'),(393,'1000',70,6,'00000001','2013-12-23 17:35:56'),(392,'1000',69,6,'00000001','2013-12-23 17:35:56'),(391,'1000',68,6,'00000001','2013-12-23 17:35:56'),(390,'1000',67,6,'00000001','2013-12-23 17:35:56'),(389,'1000',66,6,'00000001','2013-12-23 17:35:56'),(388,'1000',65,6,'00000001','2013-12-23 17:35:56'),(387,'1000',63,6,'00000001','2013-12-23 17:35:56'),(386,'1000',62,6,'00000001','2013-12-23 17:35:56'),(385,'1000',60,6,'00000001','2013-12-23 17:35:56'),(384,'1000',59,6,'00000001','2013-12-23 17:35:56'),(383,'1000',58,6,'00000001','2013-12-23 17:35:56'),(382,'1000',57,6,'00000001','2013-12-23 17:35:56'),(380,'1000',55,6,'00000001','2013-12-23 17:35:56'),(379,'1000',54,6,'00000001','2013-12-23 17:35:56'),(378,'1000',53,6,'00000001','2013-12-23 17:35:56'),(377,'1000',52,6,'00000001','2013-12-23 17:35:56'),(376,'1000',51,6,'00000001','2013-12-23 17:35:56'),(375,'1000',50,6,'00000001','2013-12-23 17:35:56'),(374,'1000',49,6,'00000001','2013-12-23 17:35:56'),(373,'1000',48,6,'00000001','2013-12-23 17:35:56'),(372,'1000',47,6,'00000001','2013-12-23 17:35:56'),(371,'1000',46,6,'00000001','2013-12-23 17:35:56'),(370,'1000',45,6,'00000001','2013-12-23 17:35:56'),(369,'1000',44,6,'00000001','2013-12-23 17:35:56'),(368,'1000',43,6,'00000001','2013-12-23 17:35:56'),(367,'1000',42,6,'00000001','2013-12-23 17:35:56'),(366,'1000',41,6,'00000001','2013-12-23 17:35:56'),(365,'1000',40,6,'00000001','2013-12-23 17:35:56'),(354,'1000',29,6,'00000001','2013-12-23 17:35:56'),(353,'1000',28,6,'00000001','2013-12-23 17:35:56'),(352,'1000',25,6,'00000001','2013-12-23 17:35:56'),(351,'1000',24,6,'00000001','2013-12-23 17:35:56'),(350,'1000',23,6,'00000001','2013-12-23 17:35:56'),(349,'1000',22,6,'00000001','2013-12-23 17:35:56'),(348,'1000',21,6,'00000001','2013-12-23 17:35:56'),(347,'1000',20,6,'00000001','2013-12-23 17:35:56'),(346,'1000',17,6,'00000001','2013-12-23 17:35:56'),(345,'1000',16,6,'00000001','2013-12-23 17:35:56'),(344,'1000',15,6,'00000001','2013-12-23 17:35:56'),(343,'1000',14,6,'00000001','2013-12-23 17:35:56'),(342,'1000',11,6,'00000001','2013-12-23 17:35:56'),(341,'1000',10,6,'00000001','2013-12-23 17:35:56'),(340,'1000',9,6,'00000001','2013-12-23 17:35:56'),(339,'1000',8,6,'00000001','2013-12-23 17:35:56'),(445,'1000',54,2,'00000001','2014-02-17 18:50:17'),(312,'1000',108,4,'00000001','2013-05-17 02:00:33'),(313,'1000',109,4,'00000001','2013-05-17 02:00:48'),(314,'1000',40,1,'0','2013-05-17 02:01:57'),(315,'1000',41,1,'0','2013-05-17 02:02:10'),(316,'1000',42,1,'0','2013-05-17 02:02:25'),(317,'1000',108,5,'0','2013-05-24 04:10:44'),(318,'1000',109,5,'0','2013-05-24 04:10:59'),(319,'1000',110,5,'0','2013-05-24 04:11:35'),(440,'1000',115,3,'0','2014-02-17 18:43:14'),(321,'1000',111,5,'0','2013-06-06 06:43:14'),(338,'1000',7,6,'00000001','2013-12-23 17:35:56'),(323,'1000',112,2,'00000001','2013-10-28 03:31:11'),(460,'1000',3,3,'0','2014-02-17 23:48:35'),(337,'1000',6,6,'00000001','2013-12-23 17:35:56'),(336,'1000',5,6,'00000001','2013-12-23 17:35:56'),(335,'1000',4,6,'00000001','2013-12-23 17:35:56'),(334,'1000',3,6,'00000001','2013-12-23 17:35:56'),(333,'1000',64,6,'00000001','2013-12-23 17:34:16'),(332,'1000',61,6,'00000001','2013-12-23 17:34:11'),(480,'1000',43,5,'0','2014-03-01 14:19:57'),(432,'1000',51,1,'0','2014-02-17 18:39:50'),(433,'1000',57,1,'0','2014-02-17 18:39:50'),(434,'1000',58,1,'0','2014-02-17 18:39:50'),(435,'1000',114,1,'0','2014-02-17 18:39:50'),(477,'1000',3,2,'00000001','2014-03-01 13:27:44'),(483,'1000',125,6,'00000001','2014-06-13 11:13:45'),(484,'1000',126,6,'00000001','2014-06-14 15:22:32'),(485,'1000',125,2,'00000001','2014-06-21 22:54:35'),(486,'1000',126,2,'00000001','2014-06-23 10:25:13'),(487,'1000',127,6,'00000001','2014-07-07 17:09:45'),(489,'1000',110,6,'00000001','2014-08-11 09:58:12'),(490,'1000',110,2,'00000001','2014-08-16 10:12:21'),(491,'1000',50,2,'00000001','2014-08-16 11:33:02'),(492,'1000',51,2,'00000001','2014-08-16 11:33:02'),(493,'1000',117,4,'00000001','2014-12-27 16:30:47'),(494,'1000',118,4,'00000001','2014-12-27 16:30:47');

/*Table structure for table `adm_project` */

DROP TABLE IF EXISTS `adm_project`;

CREATE TABLE `adm_project` (
  `idkota` int(10) NOT NULL,
  `idproject` int(10) NOT NULL AUTO_INCREMENT,
  `kode_project` varchar(5) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `status` enum('active','delete','blocked','pending') DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idproject`),
  KEY `FK_adm_project_1` (`idkota`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `adm_project` */

insert  into `adm_project`(`idkota`,`idproject`,`kode_project`,`judul`,`status`,`insertby`,`inserted`) values (1,1,'KBS','PT Karya Bakti Saudara','active','indouser',NULL);

/*Table structure for table `adm_role` */

DROP TABLE IF EXISTS `adm_role`;

CREATE TABLE `adm_role` (
  `idrole` int(3) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `status` enum('active','delete') DEFAULT NULL,
  `insertby` varchar(30) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(30) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idrole`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `adm_role` */

insert  into `adm_role`(`idrole`,`judul`,`status`,`insertby`,`inserted`,`updateby`,`updated`) values (6,'Superuser (admin)','active','admin','2015-01-05 07:58:27','indouser','2015-01-05 00:58:27'),(1,'Marketing','active','admin','2013-12-16 09:11:57',NULL,'0000-00-00 00:00:00'),(2,'Akunting','active','admin','2013-12-16 09:11:58',NULL,'0000-00-00 00:00:00'),(3,'Administrasi','active','admin','2013-12-16 09:11:59',NULL,'0000-00-00 00:00:00'),(4,'Sipil Lapangan','active','admin','2013-12-16 09:12:00','admin','2012-12-31 12:28:09'),(5,'Pimpinan Proyek','active','admin','2013-12-16 09:12:00',NULL,'0000-00-00 00:00:00');

/*Table structure for table `adm_session` */

DROP TABLE IF EXISTS `adm_session`;

CREATE TABLE `adm_session` (
  `username` varchar(20) NOT NULL,
  `magic` varchar(110) DEFAULT NULL,
  `logout_status` enum('sign','x','YeS') DEFAULT NULL,
  `login_date` int(10) DEFAULT NULL,
  `ip` varchar(19) DEFAULT NULL,
  KEY `FK_adm_session` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `adm_session` */

insert  into `adm_session`(`username`,`magic`,`logout_status`,`login_date`,`ip`) values ('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('MarketingNHR','a5afff9bf1ad2c9f886cbe81856ed033','x',1419692263,'36.81.85.6'),('ManajerNHR','19af0102bbea37f02154fc41f4511688','x',1419692942,'36.81.85.6'),('MarketingNHR','7ace310e0e8f1a436959151fcddbc909','x',1419693072,'36.81.85.6'),('AdminNHR','0d439d99128946b0d08ef4978134ecee','x',1419693814,'36.81.85.6'),('AdminNHR','f6d294118a9b7efc5336a1bf1c5f662e','x',1419700975,'36.81.85.6'),('ManajerNHR','19af0102bbea37f02154fc41f4511688','x',1419692942,'36.81.85.6'),('AdminNHR','fa40d8b1675ea3f70096c24b5f38e6bb','x',1419701708,'36.81.85.6'),('AdminNHR','8448d50fe1258e823509272d906d8e9a','x',1419731902,'36.81.85.6'),('ManajerNHR','19af0102bbea37f02154fc41f4511688','x',1419692942,'36.81.85.6'),('AdminNHR','772aa95d402adf9018d0c316b10b1a07','x',1419732390,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('ManajerNHR','19af0102bbea37f02154fc41f4511688','x',1419692942,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('MarketingNHR','5b5bfa415fcc8cac75f5e90588cd06ee','x',1419778120,'36.81.85.6'),('AdminNHR','9a1b30f960cf514498d48faf34a782a5','x',1419778956,'36.81.85.6'),('SipilNHR','bf80a8c30fa903bc43442a8799078248','x',1419817468,'36.81.85.6'),('ManajerNHR','19af0102bbea37f02154fc41f4511688','x',1419692942,'36.81.85.6'),('SipilNHR','bf80a8c30fa903bc43442a8799078248','x',1419817468,'36.81.85.6'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('SipilNHR','bf80a8c30fa903bc43442a8799078248','x',1419817468,'36.81.85.6'),('SipilNHR','bf80a8c30fa903bc43442a8799078248','x',1419817468,'36.81.85.6'),('ManajerNHR','19af0102bbea37f02154fc41f4511688','x',1419692942,'36.81.85.6'),('SipilNHR','bf80a8c30fa903bc43442a8799078248','x',1419817468,'36.81.85.6'),('SipilNHR','bf80a8c30fa903bc43442a8799078248','x',1419817468,'36.81.85.6'),('ManajerNHR','19af0102bbea37f02154fc41f4511688','x',1419692942,'36.81.85.6'),('ManajerNHR','5a13ef97ffed6520d241e40b906482b4','x',1419889295,'36.81.85.6'),('SipilNHR','bf80a8c30fa903bc43442a8799078248','x',1419817468,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('ManajerNHR','8a6154514a3634069157a5cec65a5177','x',1419909347,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('SipilNHR','bf80a8c30fa903bc43442a8799078248','x',1419817468,'36.81.85.6'),('SipilNHR','bf80a8c30fa903bc43442a8799078248','x',1419817468,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','98d88810201754095ba604a4f9a0ace0','x',1419737303,'36.81.85.6'),('KeuanganNHR','25b865f04ee2883d33bfe1a9013881f0','x',1420034130,'180.254.84.161'),('KeuanganNHR','ff7195955c108a371300e20e2bb8fdbd','x',1420035342,'180.254.84.161'),('KeuanganNHR','1e4ea060b818c6ca7b1dfc2e0223d2e1','x',1420035860,'180.254.84.161'),('KeuanganNHR','52330168d97580f483f9c24171897b35','x',1420038582,'180.254.84.161'),('KeuanganNHR','a7f78b40a85fc2506ae48497358b9153','x',1420039273,'180.254.84.161'),('KeuanganNHR','076716980fe987c11a772de049bac2fb','x',1420039462,'180.254.84.161'),('KeuanganNHR','6b77a13496653f78fda93bbb71d20ce5','x',1420041339,'180.254.84.161'),('KeuanganNHR','8932bb5313125236a2b5659c566051ca','x',1420041747,'180.254.84.161'),('KeuanganNHR','882b4cf6965a94dee8b8989e68bffad1','x',1420042903,'180.254.84.161'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('AdminNHR','2ed0665d307bf0566f20c061c0428819','x',1421493941,'202.81.50.32'),('SipilNHR','c4085a7eb1070789b312af21cc544403','sign',1421494474,'202.81.50.32'),('indouser','cf4feeaede2628c54a1b2390fa67ebd2','x',1411003770,'::1'),('admin','6f2c4717bbddaa35e615230da0e84ac9','x',1422170857,'::1'),('admin','6f2c4717bbddaa35e615230da0e84ac9','x',1422170857,'::1'),('admin','0f176497709d1fd4d6aa0be5ff086583','x',1422240952,'::1');

/*Table structure for table `adm_user` */

DROP TABLE IF EXISTS `adm_user`;

CREATE TABLE `adm_user` (
  `iduser` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `realname` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('active','delete','blocked','pending') DEFAULT NULL,
  `insertby` varchar(30) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(30) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idperum` int(10) NOT NULL,
  `idrole` int(2) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `iduser` (`iduser`),
  KEY `idproject` (`idperum`),
  KEY `adm_user_ibfk_2` (`idrole`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

/*Data for the table `adm_user` */

insert  into `adm_user`(`iduser`,`username`,`password`,`realname`,`telp`,`alamat`,`email`,`status`,`insertby`,`inserted`,`updateby`,`updated`,`idperum`,`idrole`) values (00000001,'admin','21232f297a57a5a743894a0e4a801fc3','nDalem Superadmin','081904002709','Yogyakarta, Indonesia','ndalemgroup@yahoo.com','active','admin','2015-01-25 14:27:19','indouser','2015-01-05 01:00:22',0,6),(00000071,'MarketingNHR','66be8ae71eeb65f4126180a048f04f9e','Feroz Akusaro Sando','08995044620','Gg Belimbing, DN III/401, Ronodigdayan, Lempuyangan, Yogyakarta','Feroz_nDalem@yahoo.com','active','indouser','2015-01-05 08:06:53','indouser','2015-01-05 01:06:53',1,1),(00000072,'AdminNHR','66be8ae71eeb65f4126180a048f04f9e','Enzo Cadatra Abimana','081908783113','Perum Tugu Asri No. C-11, Sariharjo, Ngaglik, Sleman, Yogyakarta ','Enzo_nDalem@yahoo.com','active','indouser','2015-01-05 08:07:44','indouser','2015-01-05 01:07:44',1,3),(00000073,'KeuanganNHR','66be8ae71eeb65f4126180a048f04f9e','Alexandra Sando','085623986758','Jl. Nyiadisari, Gg. Menur No726A, Pilahan, Kotagede, Yogyakarta','Lexa_nDalem@yahoo.com','active','indouser','2015-01-05 08:08:44','indouser','2015-01-05 01:08:44',1,2),(00000074,'SipilNHR','66be8ae71eeb65f4126180a048f04f9e','Qianna Rafanda','081903713430','Casa Grande Blok C-34, Sleman, Yogyakarta','Qianna_nDalem@yahoo.com','active','indouser','2015-01-05 08:09:39','indouser','2015-01-05 01:09:39',1,4),(00000075,'ManajerNHR','66be8ae71eeb65f4126180a048f04f9e','Leonardo Di Caprio','087889542301','Jl. Godean 765b-2, Sleman, Yogyakarta','Dicaprio_nDalem@yahoo.com','active','indouser','2015-01-05 08:10:25','indouser','2015-01-05 01:10:25',1,5);

/*Table structure for table `ajb` */

DROP TABLE IF EXISTS `ajb`;

CREATE TABLE `ajb` (
  `idperum` int(10) NOT NULL,
  `idno` int(10) NOT NULL AUTO_INCREMENT,
  `kode_ajb` varchar(5) DEFAULT 'ajb',
  `idkavling` int(10) DEFAULT NULL,
  `idppjb` int(3) unsigned zerofill DEFAULT NULL,
  `idajb` int(3) unsigned zerofill NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `idbuku` char(1) DEFAULT '1',
  `tanggal` date DEFAULT NULL,
  `pemesan` varchar(100) DEFAULT NULL,
  `kondisibangunan` enum('selesai','belum') DEFAULT NULL,
  `catatan` text,
  `ppn` varchar(10) DEFAULT NULL,
  `bphtb` varchar(10) DEFAULT NULL,
  `pph` varchar(10) DEFAULT NULL,
  `bbn` varchar(10) DEFAULT NULL,
  `noshm` varchar(10) DEFAULT NULL,
  `luastanah` int(5) DEFAULT NULL,
  `luasbangunan` int(5) DEFAULT '0',
  `atasnama` varchar(100) DEFAULT NULL,
  `namanotaris` varchar(100) DEFAULT NULL,
  `namashm` varchar(100) DEFAULT NULL,
  `cashbackshm` bigint(20) DEFAULT NULL,
  `plafonkpr` bigint(20) DEFAULT '0',
  `idbank` int(5) DEFAULT NULL,
  `cashbackkpr` bigint(20) DEFAULT NULL,
  `cashbackbank` bigint(20) DEFAULT NULL,
  `norekening` varchar(30) DEFAULT NULL,
  `namarekening` varchar(100) DEFAULT NULL,
  `tglsetor` date DEFAULT NULL,
  `akunting` varchar(20) DEFAULT 'kosong',
  `pimpinan` varchar(20) DEFAULT 'menunggu',
  `status` varchar(10) DEFAULT 'proses',
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lanjut` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `idno` (`idno`),
  KEY `FK_psjb_perum` (`idperum`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ajb` */

insert  into `ajb`(`idperum`,`idno`,`kode_ajb`,`idkavling`,`idppjb`,`idajb`,`bulan`,`tahun`,`idbuku`,`tanggal`,`pemesan`,`kondisibangunan`,`catatan`,`ppn`,`bphtb`,`pph`,`bbn`,`noshm`,`luastanah`,`luasbangunan`,`atasnama`,`namanotaris`,`namashm`,`cashbackshm`,`plafonkpr`,`idbank`,`cashbackkpr`,`cashbackbank`,`norekening`,`namarekening`,`tglsetor`,`akunting`,`pimpinan`,`status`,`insertby`,`inserted`,`updateby`,`updated`,`lanjut`) values (1,1,'ajb',1,001,001,'12','2014','1','2014-12-28','Rosa Wariswara','belum','','15000000','10000000','10000000','5000000','2130',97,45,'Adi Haryadi','Muhammad Subarkah','Rosa wariswara',0,277000000,7,4000000,7,'0007830292','PT Karya Bakti Saudara','2015-02-28','AdminNHR','ManajerNHR','tutup',NULL,'2014-12-28 09:05:35','AdminNHR','2014-12-28 02:03:05','spmb');

/*Table structure for table `bast` */

DROP TABLE IF EXISTS `bast`;

CREATE TABLE `bast` (
  `idperum` int(10) NOT NULL,
  `idno` int(10) NOT NULL AUTO_INCREMENT,
  `kode_bast` varchar(5) DEFAULT 'bast',
  `idkavling` int(10) DEFAULT NULL,
  `idppjb` int(3) unsigned zerofill DEFAULT NULL,
  `idbast` int(3) unsigned zerofill NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `idbuku` char(1) DEFAULT '1',
  `pemesan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tglpemeriksaan` date DEFAULT NULL,
  `jenispekerjaan` varchar(100) DEFAULT NULL,
  `akhirpemeriksaan` date DEFAULT NULL,
  `catatan` text,
  `akunting` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT 'menunggu',
  `status` varchar(10) DEFAULT 'proses',
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lanjut` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `idno` (`idno`),
  KEY `FK_psjb_perum` (`idperum`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `bast` */

insert  into `bast`(`idperum`,`idno`,`kode_bast`,`idkavling`,`idppjb`,`idbast`,`bulan`,`tahun`,`idbuku`,`pemesan`,`tanggal`,`tglpemeriksaan`,`jenispekerjaan`,`akhirpemeriksaan`,`catatan`,`akunting`,`pimpinan`,`status`,`insertby`,`inserted`,`updateby`,`updated`,`lanjut`) values (1,1,'bast',1,001,001,'12','2014','1','Rosa Wariswara','2014-12-30','2015-05-08',NULL,'2015-05-25','','KeuanganNHR','ManajerNHR','selesai',NULL,'2014-12-30 10:16:46','KeuanganNHR','2014-12-30 03:15:04','dom');

/*Table structure for table `captcha` */

DROP TABLE IF EXISTS `captcha`;

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM AUTO_INCREMENT=1831 DEFAULT CHARSET=latin1;

/*Data for the table `captcha` */

insert  into `captcha`(`captcha_id`,`captcha_time`,`ip_address`,`word`) values (1826,1422240907,'::1','70002'),(1830,1422254174,'::1','58068'),(1829,1422241059,'::1','94145'),(1828,1422241046,'::1','16922'),(1827,1422240936,'::1','78011');

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `chat` */

/*Table structure for table `data_bank` */

DROP TABLE IF EXISTS `data_bank`;

CREATE TABLE `data_bank` (
  `idbank` int(5) NOT NULL AUTO_INCREMENT,
  `kodebank` varchar(10) NOT NULL,
  `namabank` varchar(100) DEFAULT NULL,
  `status` enum('active','delete') DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kodebank`),
  UNIQUE KEY `idbank` (`idbank`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `data_bank` */

insert  into `data_bank`(`idbank`,`kodebank`,`namabank`,`status`,`insertby`,`inserted`) values (2,'BCA','Bank Central Asia','active','admin','2012-12-02 11:01:34'),(3,'MDR','Bank Mandiri','active','admin','2013-12-24 07:04:31'),(4,'BRI','Bank BRI','active','admin','2013-12-24 07:05:04'),(5,'BNI46','Bank Negara Indonesia 46','active','admin','2013-01-13 06:26:01'),(1,'NO-BANK','NO-BANK','active','admin','2013-01-13 06:26:06'),(7,'CN01','CIMB NIAGA','active','admin','2013-04-23 18:32:26'),(8,'BRIS','BRI Syariah','active','indouser','2014-02-17 19:37:49'),(9,'PANIN','PANIN BANK','active','indouser','2014-02-18 00:12:10'),(10,'BSM','Bank Mandiri Syariah','active','indouser','2014-02-18 00:10:36'),(11,'BTN','Bank Tabungan Negara','active','indouser','2014-02-18 00:11:08'),(12,'DKI','BANK DKI','active','indouser','2014-02-18 00:13:09'),(13,'BTNs','Bank Tabungan Negara Syariah','active','indouser','2014-02-18 00:14:33'),(14,'BM01','Bank Muamalat','active','indouser','2014-02-18 00:15:58');

/*Table structure for table `data_kavling` */

DROP TABLE IF EXISTS `data_kavling`;

CREATE TABLE `data_kavling` (
  `idperum` int(10) NOT NULL,
  `idkavling` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `kode` varchar(5) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `luastanah` int(5) DEFAULT NULL,
  `luasbangunan` int(5) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `status` enum('Free','Dipesan','Building','Terjual','PPJB') DEFAULT NULL,
  `terjual` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `onstatus` varchar(10) DEFAULT 'Free',
  PRIMARY KEY (`idkavling`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `data_kavling` */

insert  into `data_kavling`(`idperum`,`idkavling`,`nama`,`kode`,`type`,`luastanah`,`luasbangunan`,`harga`,`status`,`terjual`,`insertby`,`inserted`,`onstatus`) values (1,1,'A-1','A-1','45/97',97,45,367000000,'PPJB','2014-12-27','indouser','2014-12-28 00:30:51','ONPPJB'),(1,2,'A-2','A-2','45/98',98,45,389500000,'Free',NULL,'indouser','2014-12-27 18:31:35','Free');

/*Table structure for table `data_kota` */

DROP TABLE IF EXISTS `data_kota`;

CREATE TABLE `data_kota` (
  `idkota` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kota` varchar(5) NOT NULL,
  `judul_kota` varchar(100) NOT NULL,
  `status` enum('active','delete') DEFAULT NULL,
  `insertby` varchar(30) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idkota`),
  UNIQUE KEY `idkota` (`idkota`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_kota` */

insert  into `data_kota`(`idkota`,`kode_kota`,`judul_kota`,`status`,`insertby`,`inserted`) values (1,'DIY','Yogyakarta','active','indouser','2014-12-27 18:26:01');

/*Table structure for table `data_perumahan` */

DROP TABLE IF EXISTS `data_perumahan`;

CREATE TABLE `data_perumahan` (
  `idproject` int(10) DEFAULT NULL,
  `kode_perum` varchar(5) NOT NULL,
  `idperum` int(10) NOT NULL AUTO_INCREMENT,
  `judul_perum` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `desa` varchar(100) DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `kecamatan` varchar(200) DEFAULT NULL,
  `kabupaten` varchar(200) DEFAULT NULL,
  `propinsi` varchar(200) DEFAULT NULL,
  `status` enum('active','delete') DEFAULT NULL,
  `insertby` varchar(30) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idperum`),
  UNIQUE KEY `id_perum` (`idperum`),
  KEY `FK_data_perumahan_project` (`idproject`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_perumahan` */

insert  into `data_perumahan`(`idproject`,`kode_perum`,`idperum`,`judul_perum`,`deskripsi`,`desa`,`rt`,`rw`,`kecamatan`,`kabupaten`,`propinsi`,`status`,`insertby`,`inserted`) values (1,'NHR',1,'nDalem Haryadi','-','Jl. Palagan Tentara Pelajar','RT 06','RT 05','Ngaglik','Sleman','Daerah Istimewa Yogyakarta','active','indouser','2014-12-27 18:29:23');

/*Table structure for table `hpp_administrasi_umum` */

DROP TABLE IF EXISTS `hpp_administrasi_umum`;

CREATE TABLE `hpp_administrasi_umum` (
  `idperum` int(10) NOT NULL,
  `idata` bigint(20) NOT NULL AUTO_INCREMENT,
  `noakun` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian` text,
  `nilaipembayaran` bigint(20) DEFAULT '0',
  `totalbayar` bigint(20) DEFAULT '0',
  `jatuhtempo` date DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT 'hpp9',
  `idkavling` int(10) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tempurl` char(30) DEFAULT NULL,
  PRIMARY KEY (`idata`),
  UNIQUE KEY `idadmum` (`idata`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `hpp_administrasi_umum` */

/*Table structure for table `hpp_konstruksi_rumah` */

DROP TABLE IF EXISTS `hpp_konstruksi_rumah`;

CREATE TABLE `hpp_konstruksi_rumah` (
  `idperum` int(10) NOT NULL,
  `idata` bigint(20) NOT NULL AUTO_INCREMENT,
  `noakun` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian` text,
  `nokontrak` varchar(100) DEFAULT NULL,
  `nilaipembayaran` bigint(20) DEFAULT '0',
  `totalbayar` bigint(20) DEFAULT '0',
  `jatuhtempo` date DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `sipil` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT 'hpp4',
  `idkavling` int(10) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tempurl` char(30) DEFAULT NULL,
  PRIMARY KEY (`idata`),
  UNIQUE KEY `idkonstruksi` (`idata`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `hpp_konstruksi_rumah` */

/*Table structure for table `hpp_lain_lain` */

DROP TABLE IF EXISTS `hpp_lain_lain`;

CREATE TABLE `hpp_lain_lain` (
  `idperum` int(10) NOT NULL,
  `idata` bigint(20) NOT NULL AUTO_INCREMENT,
  `noakun` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian` text,
  `nilaipembayaran` bigint(20) DEFAULT '0',
  `totalbayar` bigint(20) DEFAULT '0',
  `jatuhtempo` date DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT 'hpp10',
  `idkavling` int(10) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tempurl` char(30) DEFAULT NULL,
  PRIMARY KEY (`idata`),
  UNIQUE KEY `idlain` (`idata`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `hpp_lain_lain` */

/*Table structure for table `hpp_legalitas_penjualan` */

DROP TABLE IF EXISTS `hpp_legalitas_penjualan`;

CREATE TABLE `hpp_legalitas_penjualan` (
  `idperum` int(10) NOT NULL,
  `idata` bigint(20) NOT NULL AUTO_INCREMENT,
  `noakun` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian` text,
  `nilaipembayaran` bigint(20) DEFAULT '0',
  `totalbayar` bigint(20) DEFAULT '0',
  `jatuhtempo` date DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `legal` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT 'hpp7',
  `idkavling` int(10) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tempurl` char(30) DEFAULT NULL,
  PRIMARY KEY (`idata`),
  UNIQUE KEY `idjual` (`idata`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `hpp_legalitas_penjualan` */

/*Table structure for table `hpp_legalitas_proyek` */

DROP TABLE IF EXISTS `hpp_legalitas_proyek`;

CREATE TABLE `hpp_legalitas_proyek` (
  `idperum` int(10) NOT NULL,
  `idata` bigint(20) NOT NULL AUTO_INCREMENT,
  `noakun` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian` text,
  `nilaipembayaran` bigint(20) DEFAULT '0',
  `totalbayar` bigint(20) DEFAULT '0',
  `jatuhtempo` date DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `legal` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT 'hpp6',
  `idkavling` int(10) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tempurl` char(30) DEFAULT NULL,
  PRIMARY KEY (`idata`),
  UNIQUE KEY `idlegal` (`idata`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `hpp_legalitas_proyek` */

/*Table structure for table `hpp_manajemen` */

DROP TABLE IF EXISTS `hpp_manajemen`;

CREATE TABLE `hpp_manajemen` (
  `idperum` int(10) NOT NULL,
  `idata` bigint(20) NOT NULL AUTO_INCREMENT,
  `noakun` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian` text,
  `nilaipembayaran` bigint(20) DEFAULT '0',
  `totalbayar` bigint(20) DEFAULT '0',
  `jatuhtempo` date DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `legal` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT 'hpp8',
  `idkavling` int(10) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tempurl` char(30) DEFAULT NULL,
  PRIMARY KEY (`idata`),
  UNIQUE KEY `idmanage` (`idata`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `hpp_manajemen` */

/*Table structure for table `hpp_pengolahan_lahan` */

DROP TABLE IF EXISTS `hpp_pengolahan_lahan`;

CREATE TABLE `hpp_pengolahan_lahan` (
  `idperum` int(10) NOT NULL,
  `idata` bigint(20) NOT NULL AUTO_INCREMENT,
  `noakun` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `penanggungjawab` varchar(100) DEFAULT NULL,
  `uraian` text,
  `nilaipembayaran` bigint(20) DEFAULT '0',
  `totalbayar` bigint(20) DEFAULT '0',
  `jatuhtempo` date DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `sipil` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT 'hpp2',
  `idkavling` int(10) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tempurl` char(30) DEFAULT NULL,
  PRIMARY KEY (`idata`),
  UNIQUE KEY `idlahan` (`idata`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `hpp_pengolahan_lahan` */

/*Table structure for table `hpp_perijinan_proyek` */

DROP TABLE IF EXISTS `hpp_perijinan_proyek`;

CREATE TABLE `hpp_perijinan_proyek` (
  `idperum` int(10) NOT NULL,
  `idata` bigint(20) NOT NULL AUTO_INCREMENT,
  `noakun` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian` text,
  `nilaipembayaran` bigint(20) DEFAULT '0',
  `totalbayar` bigint(20) DEFAULT '0',
  `jatuhtempo` date DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `legal` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT 'hpp5',
  `idkavling` int(10) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tempurl` char(30) DEFAULT NULL,
  PRIMARY KEY (`idata`),
  UNIQUE KEY `idizin` (`idata`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hpp_perijinan_proyek` */

insert  into `hpp_perijinan_proyek`(`idperum`,`idata`,`noakun`,`tanggal`,`uraian`,`nilaipembayaran`,`totalbayar`,`jatuhtempo`,`komulatif`,`nokwitansi`,`akunting`,`legal`,`pimpinan`,`tglapprove`,`insertby`,`inserted`,`status`,`kode_hpp`,`idkavling`,`bulan`,`tahun`,`tempurl`) values (1,3,NULL,'2014-12-31','IMB ',0,5000000,'0000-00-00',0,'001','KeuanganNHR',NULL,NULL,NULL,'KeuanganNHR','2014-12-31 22:29:55','dom','hpp5',1,'12','2014',NULL);

/*Table structure for table `hpp_prasarana_sarana` */

DROP TABLE IF EXISTS `hpp_prasarana_sarana`;

CREATE TABLE `hpp_prasarana_sarana` (
  `idperum` int(10) NOT NULL,
  `idata` bigint(20) NOT NULL AUTO_INCREMENT,
  `noakun` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian` text,
  `nokontrak` varchar(100) DEFAULT NULL,
  `nilaipembayaran` bigint(20) DEFAULT '0',
  `totalbayar` bigint(20) DEFAULT '0',
  `jatuhtempo` date DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `sipil` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT 'hpp3',
  `idkavling` int(10) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tempurl` char(30) DEFAULT NULL,
  PRIMARY KEY (`idata`),
  UNIQUE KEY `idsarana` (`idata`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hpp_prasarana_sarana` */

insert  into `hpp_prasarana_sarana`(`idperum`,`idata`,`noakun`,`tanggal`,`uraian`,`nokontrak`,`nilaipembayaran`,`totalbayar`,`jatuhtempo`,`komulatif`,`nokwitansi`,`akunting`,`sipil`,`pimpinan`,`tglapprove`,`insertby`,`inserted`,`status`,`kode_hpp`,`idkavling`,`bulan`,`tahun`,`tempurl`) values (1,2,NULL,'2014-12-31','pekerjaan aspal jalan',NULL,0,30000000,'0000-00-00',0,'001','KeuanganNHR',NULL,NULL,NULL,'KeuanganNHR','2014-12-31 22:29:55','dom','hpp3',1,'12','2014',NULL);

/*Table structure for table `hpp_tanah` */

DROP TABLE IF EXISTS `hpp_tanah`;

CREATE TABLE `hpp_tanah` (
  `idperum` int(10) NOT NULL,
  `idata` bigint(20) NOT NULL AUTO_INCREMENT,
  `noakun` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian` text,
  `namapemilik` varchar(100) DEFAULT NULL,
  `nilaipembayaran` bigint(20) DEFAULT '0',
  `totalbayar` bigint(20) DEFAULT '0',
  `jatuhtempo` date DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `penjual` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT 'hpp1',
  `idkavling` int(10) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tempurl` char(30) DEFAULT NULL,
  PRIMARY KEY (`idata`),
  UNIQUE KEY `idtanah` (`idata`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hpp_tanah` */

insert  into `hpp_tanah`(`idperum`,`idata`,`noakun`,`tanggal`,`uraian`,`namapemilik`,`nilaipembayaran`,`totalbayar`,`jatuhtempo`,`komulatif`,`nokwitansi`,`akunting`,`penjual`,`pimpinan`,`tglapprove`,`insertby`,`inserted`,`status`,`kode_hpp`,`idkavling`,`bulan`,`tahun`,`tempurl`) values (1,1,NULL,'2014-12-31','bayar tanah termin I',NULL,0,50000000,'0000-00-00',0,'001','KeuanganNHR',NULL,NULL,NULL,'KeuanganNHR','2014-12-31 22:29:55','dom','hpp1',1,'12','2014',NULL);

/*Table structure for table `hutang_lain` */

DROP TABLE IF EXISTS `hutang_lain`;

CREATE TABLE `hutang_lain` (
  `id_hutang_lain` int(11) NOT NULL AUTO_INCREMENT,
  `id_perum` int(11) NOT NULL,
  `kode_biaya` varchar(100) NOT NULL,
  `ket_biaya` varchar(100) NOT NULL,
  `pen_jawab1` varchar(100) NOT NULL,
  `pem_hutang` varchar(100) NOT NULL,
  `pen_jawab2` varchar(100) NOT NULL,
  `total_nilai_hutang` varchar(100) NOT NULL,
  `periode_mulai` date NOT NULL,
  `periode_selesai` date NOT NULL,
  `tgl_transaksi` date NOT NULL,
  PRIMARY KEY (`id_hutang_lain`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hutang_lain` */

insert  into `hutang_lain`(`id_hutang_lain`,`id_perum`,`kode_biaya`,`ket_biaya`,`pen_jawab1`,`pem_hutang`,`pen_jawab2`,`total_nilai_hutang`,`periode_mulai`,`periode_selesai`,`tgl_transaksi`) values (1,1,'-','Pinjaman Perorangan','Komisaris','Tuan Sulaiman Rajib','Direksi','50000000','2015-01-01','2016-01-01','2014-12-31'),(2,1,'-','Pinjaman Perorangan','Komisaris','Hj. Badrodin Haiti','Direksi','75000000','2015-01-15','2015-07-15','2014-12-31');

/*Table structure for table `kbf` */

DROP TABLE IF EXISTS `kbf`;

CREATE TABLE `kbf` (
  `idperum` int(10) NOT NULL,
  `idno` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kbf` varchar(5) DEFAULT 'kbf',
  `idkavling` int(10) NOT NULL,
  `idppjb` int(3) unsigned zerofill NOT NULL,
  `idkbf` int(3) unsigned zerofill NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `idbuku` char(1) DEFAULT '1',
  `tanggal` date DEFAULT NULL,
  `pemesan` varchar(100) DEFAULT NULL,
  `jenispekerjaan` varchar(100) DEFAULT NULL,
  `subkontraktor` varchar(100) DEFAULT NULL,
  `hargaborongan` bigint(20) DEFAULT NULL,
  `luasborongan` int(5) DEFAULT NULL,
  `masapelaksanaan` int(3) DEFAULT NULL,
  `mulaipelaksanaan` date DEFAULT NULL,
  `akhirpelaksanaan` date DEFAULT NULL,
  `catatan` text,
  `pihakpertama` varchar(100) DEFAULT NULL,
  `alamat1` text,
  `telp1` varchar(20) DEFAULT NULL,
  `jabatan1` varchar(50) DEFAULT NULL,
  `pihakkedua` varchar(100) DEFAULT NULL,
  `alamat2` text,
  `telp2` varchar(20) DEFAULT NULL,
  `jabatan2` varchar(50) DEFAULT NULL,
  `sipil` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT 'menunggu',
  `status` varchar(10) DEFAULT 'proses',
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lanjut` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `idno` (`idno`),
  KEY `FK_psjb_perum` (`idperum`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kbf` */

insert  into `kbf`(`idperum`,`idno`,`kode_kbf`,`idkavling`,`idppjb`,`idkbf`,`bulan`,`tahun`,`idbuku`,`tanggal`,`pemesan`,`jenispekerjaan`,`subkontraktor`,`hargaborongan`,`luasborongan`,`masapelaksanaan`,`mulaipelaksanaan`,`akhirpelaksanaan`,`catatan`,`pihakpertama`,`alamat1`,`telp1`,`jabatan1`,`pihakkedua`,`alamat2`,`telp2`,`jabatan2`,`sipil`,`pimpinan`,`status`,`insertby`,`inserted`,`updateby`,`updated`,`lanjut`) values (1,1,'kbf',1,001,001,'12','2014','1','2014-12-29','Rosa Wariswara','Pekerjaan Jalan Aspal','H. Subadra',120000,250,30,'2015-01-15','2015-02-15','','Qianna Rafanda Haryadi','Jl. Nyi Adisari, Gg. Menur No.726A, Rejowinangun, Yogyakarta, DIY','081903713430','Quality Control','H. Subadra','Jl. Agus Salim No.35, Kuningan, Jawa Barat','089973872626','Subkontraktor','SipilNHR','ManajerNHR','tutup',NULL,'2014-12-29 09:45:12','SipilNHR','2014-12-29 02:42:45','stp');

/*Table structure for table `kbk` */

DROP TABLE IF EXISTS `kbk`;

CREATE TABLE `kbk` (
  `idperum` int(10) NOT NULL,
  `idno` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kbk` varchar(5) DEFAULT 'kbk',
  `idkavling` int(10) NOT NULL,
  `idppjb` int(3) unsigned zerofill NOT NULL,
  `idkbk` int(3) unsigned zerofill NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `idbuku` char(1) DEFAULT '1',
  `tanggal` date DEFAULT NULL,
  `pemesan` varchar(100) DEFAULT NULL,
  `subkontraktor` varchar(100) DEFAULT NULL,
  `hargaborongan` bigint(20) DEFAULT NULL,
  `masapelaksanaan` int(3) DEFAULT NULL,
  `mulaipelaksanaan` date DEFAULT NULL,
  `akhirpelaksanaan` date DEFAULT NULL,
  `catatan` text,
  `pihakpertama` varchar(100) DEFAULT NULL,
  `alamat1` text,
  `telp1` varchar(20) DEFAULT NULL,
  `jabatan1` varchar(50) DEFAULT NULL,
  `pihakkedua` varchar(100) DEFAULT NULL,
  `alamat2` text,
  `telp2` varchar(20) DEFAULT NULL,
  `jabatan2` varchar(50) DEFAULT NULL,
  `sipil` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT 'menunggu',
  `status` varchar(10) DEFAULT 'proses',
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lanjut` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `idno` (`idno`),
  KEY `FK_psjb_perum` (`idperum`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kbk` */

insert  into `kbk`(`idperum`,`idno`,`kode_kbk`,`idkavling`,`idppjb`,`idkbk`,`bulan`,`tahun`,`idbuku`,`tanggal`,`pemesan`,`subkontraktor`,`hargaborongan`,`masapelaksanaan`,`mulaipelaksanaan`,`akhirpelaksanaan`,`catatan`,`pihakpertama`,`alamat1`,`telp1`,`jabatan1`,`pihakkedua`,`alamat2`,`telp2`,`jabatan2`,`sipil`,`pimpinan`,`status`,`insertby`,`inserted`,`updateby`,`updated`,`lanjut`) values (1,1,'kbk',1,001,001,'12','2014','1','2014-12-29','Rosa Wariswara','H. Subadra',2500000,120,'2015-02-03','2015-06-03','','Qianna Rafanda Haryadi','Jl Nyi Adisari, Gg. Belimbing No.726A, Rejowinangun, Yogyakarta, DIY','081903713430','Quality Control','H. Subadra','Jl. Agus Salim No.45, Kuningan, Jawa Barat','089987625363','Subkontraktor','SipilNHR','ManajerNHR','tutup',NULL,'2014-12-29 08:56:25','SipilNHR','2014-12-29 01:54:02','stp');

/*Table structure for table `nota_permintaan` */

DROP TABLE IF EXISTS `nota_permintaan`;

CREATE TABLE `nota_permintaan` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `idperum` int(11) NOT NULL,
  `no_nota` varchar(255) NOT NULL,
  `tanggal_nota` date NOT NULL,
  `saldo_awal` varchar(20) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `jenis_pengeluaran` varchar(255) NOT NULL,
  `besarnya` varchar(255) NOT NULL,
  `nilai_cek` varchar(255) NOT NULL,
  `cek_ke` int(11) NOT NULL,
  `nomor_cek` varchar(255) NOT NULL,
  `idbank` int(11) NOT NULL,
  `tanggal_cek` date DEFAULT NULL,
  `atas_nama_cek` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `nota_permintaan` */

insert  into `nota_permintaan`(`id_nota`,`idperum`,`no_nota`,`tanggal_nota`,`saldo_awal`,`pekerjaan`,`jenis_pengeluaran`,`besarnya`,`nilai_cek`,`cek_ke`,`nomor_cek`,`idbank`,`tanggal_cek`,`atas_nama_cek`,`keterangan`) values (1,1,'001','2014-12-31','345000000','bayar tanah termin I','A','50000000','',0,'',2,'0000-00-00','Adi Haryadi','transfer'),(2,1,'001','2014-12-31','345000000','pekerjaan aspal jalan','B2','30000000','',0,'',2,'0000-00-00','Adi Haryadi','transfer'),(3,1,'001','2014-12-31','345000000','IMB ','C','5000000','85000000',1,'098TG35',2,'0000-00-00','Adi Haryadi','transfer');

/*Table structure for table `pembayaran_hpp` */

DROP TABLE IF EXISTS `pembayaran_hpp`;

CREATE TABLE `pembayaran_hpp` (
  `idperum` int(10) NOT NULL,
  `idbayar` bigint(20) NOT NULL AUTO_INCREMENT,
  `nokwitansi` varchar(20) DEFAULT NULL,
  `idata` bigint(20) DEFAULT NULL,
  `kode_hpp` varchar(5) DEFAULT NULL,
  `tanggalhpp` date DEFAULT NULL,
  `bayar` bigint(20) DEFAULT NULL,
  `jatuhtempohpp` date DEFAULT NULL,
  `catatan` text,
  `pekerja` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `hppstatus` enum('hutang','lunas','proses') DEFAULT NULL,
  `tglapprove` date DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idbayar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran_hpp` */

/*Table structure for table `pembayaran_hutang_lain` */

DROP TABLE IF EXISTS `pembayaran_hutang_lain`;

CREATE TABLE `pembayaran_hutang_lain` (
  `id_bayar` int(11) NOT NULL AUTO_INCREMENT,
  `id_hutang_lain` int(11) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `kekurangan` varchar(100) DEFAULT NULL,
  `tgl_rencana` date NOT NULL,
  `tgl_realisasi` date DEFAULT NULL,
  `keu` varchar(100) DEFAULT NULL,
  `mo` varchar(100) DEFAULT NULL,
  `id_bank` int(11) NOT NULL,
  `no_rek` varchar(100) DEFAULT NULL,
  `nama_rek` varchar(100) DEFAULT NULL,
  `no_kwi` varchar(100) DEFAULT NULL,
  `jenis_bayar` varchar(100) NOT NULL,
  `cara_bayar` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT 'Hutang',
  PRIMARY KEY (`id_bayar`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran_hutang_lain` */

insert  into `pembayaran_hutang_lain`(`id_bayar`,`id_hutang_lain`,`jumlah`,`kekurangan`,`tgl_rencana`,`tgl_realisasi`,`keu`,`mo`,`id_bank`,`no_rek`,`nama_rek`,`no_kwi`,`jenis_bayar`,`cara_bayar`,`status`) values (1,2,'45000000','0','2015-04-15','2014-12-31',NULL,NULL,2,'033776377','Mora Syahita','-','Termin I','Transfer','lunas'),(2,2,'45000000',NULL,'2015-07-15',NULL,NULL,NULL,0,NULL,NULL,NULL,'Termin II (Pelunasan)','transfer','Hutang');

/*Table structure for table `pembayaran_kbf` */

DROP TABLE IF EXISTS `pembayaran_kbf`;

CREATE TABLE `pembayaran_kbf` (
  `idperum` int(10) NOT NULL,
  `idbayar` bigint(20) NOT NULL AUTO_INCREMENT,
  `idkbf` int(3) unsigned zerofill NOT NULL,
  `tglapprove` date DEFAULT NULL,
  `nokwitansi` varchar(50) DEFAULT NULL,
  `target` int(3) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jenisbayar` varchar(20) DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('hutang','proses','lunas') DEFAULT 'hutang',
  `akunting` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `jenistransaksi` enum('Tunai','Transfer') DEFAULT NULL,
  `idbank` int(5) DEFAULT NULL,
  `norek` varchar(50) DEFAULT NULL,
  `namarek` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idbayar`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran_kbf` */

insert  into `pembayaran_kbf`(`idperum`,`idbayar`,`idkbf`,`tglapprove`,`nokwitansi`,`target`,`jumlah`,`tanggal`,`keterangan`,`jenisbayar`,`insertby`,`inserted`,`status`,`akunting`,`pimpinan`,`jenistransaksi`,`idbank`,`norek`,`namarek`) values (1,1,001,'2014-12-31','0',0,10000000,'2015-01-09',NULL,'termin','SipilNHR','2014-12-31 18:04:44','lunas','1','0','',2,'0373394413','Mora Syahita'),(1,2,001,NULL,NULL,100,17000000,'2015-02-15',NULL,'termin','SipilNHR','2014-12-29 09:42:45','hutang',NULL,NULL,NULL,NULL,NULL,NULL),(1,3,001,NULL,NULL,100,3000000,'2015-04-30',NULL,'pemeliharaan','SipilNHR','2014-12-29 09:42:45','hutang',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `pembayaran_kbk` */

DROP TABLE IF EXISTS `pembayaran_kbk`;

CREATE TABLE `pembayaran_kbk` (
  `idperum` int(10) NOT NULL,
  `idbayar` bigint(20) NOT NULL AUTO_INCREMENT,
  `idkbk` int(3) unsigned zerofill NOT NULL,
  `tglapprove` date DEFAULT NULL,
  `nokwitansi` varchar(50) DEFAULT NULL,
  `target` int(3) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jenisbayar` varchar(20) DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('hutang','proses','lunas') DEFAULT 'hutang',
  `akunting` int(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `jenistransaksi` enum('Tunai','Transfer') DEFAULT NULL,
  `idbank` int(5) DEFAULT NULL,
  `norek` varchar(50) DEFAULT NULL,
  `namarek` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idbayar`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran_kbk` */

insert  into `pembayaran_kbk`(`idperum`,`idbayar`,`idkbk`,`tglapprove`,`nokwitansi`,`target`,`jumlah`,`tanggal`,`keterangan`,`jenisbayar`,`insertby`,`inserted`,`status`,`akunting`,`pimpinan`,`jenistransaksi`,`idbank`,`norek`,`namarek`) values (1,1,001,'2014-12-31','-',0,16875000,'2015-01-30',NULL,'termin','SipilNHR','2014-12-29 08:54:02','lunas',1,'0','',2,'0784351','Mora Syahita'),(1,2,001,NULL,NULL,60,50625000,'2015-04-01',NULL,'termin','SipilNHR','2014-12-29 08:54:02','hutang',NULL,NULL,NULL,NULL,NULL,NULL),(1,3,001,NULL,NULL,100,39375000,'2015-06-03',NULL,'termin','SipilNHR','2014-12-29 08:54:02','hutang',NULL,NULL,NULL,NULL,NULL,NULL),(1,4,001,NULL,NULL,100,5625000,'2015-07-01',NULL,'pemeliharaan','SipilNHR','2014-12-29 08:54:02','hutang',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `pembayaran_ppjb` */

DROP TABLE IF EXISTS `pembayaran_ppjb`;

CREATE TABLE `pembayaran_ppjb` (
  `idperum` int(10) NOT NULL,
  `idbayar` bigint(20) NOT NULL AUTO_INCREMENT,
  `idppjb` int(3) unsigned zerofill NOT NULL,
  `nobayar` varchar(100) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jenisbayar` varchar(10) DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lunas` varchar(10) DEFAULT 'belum',
  PRIMARY KEY (`idbayar`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran_ppjb` */

insert  into `pembayaran_ppjb`(`idperum`,`idbayar`,`idppjb`,`nobayar`,`jumlah`,`tanggal`,`keterangan`,`jenisbayar`,`insertby`,`inserted`,`lunas`) values (1,1,001,NULL,40000000,'2015-01-05',NULL,'dp','AdminNHR','2014-12-30 21:02:55','lunas'),(1,2,001,NULL,40000000,'2015-02-05',NULL,'dp','AdminNHR','2014-12-28 00:27:58','belum'),(1,3,001,NULL,277000000,'2015-02-20',NULL,'kpr','AdminNHR','2014-12-28 00:27:58','belum');

/*Table structure for table `pembayaran_psjb` */

DROP TABLE IF EXISTS `pembayaran_psjb`;

CREATE TABLE `pembayaran_psjb` (
  `idperum` int(10) NOT NULL,
  `idbayar` bigint(20) NOT NULL AUTO_INCREMENT,
  `idpsjb` int(3) unsigned zerofill NOT NULL,
  `nobayar` varchar(100) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jenisbayar` varchar(10) DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idbayar`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran_psjb` */

insert  into `pembayaran_psjb`(`idperum`,`idbayar`,`idpsjb`,`nobayar`,`jumlah`,`tanggal`,`keterangan`,`jenisbayar`,`insertby`,`inserted`) values (1,1,001,NULL,40000000,'2015-01-05',NULL,'dp','MarketingNHR','2014-12-27 22:05:27'),(1,2,001,NULL,40000000,'2015-02-05',NULL,'dp','MarketingNHR','2014-12-27 22:05:27'),(1,3,001,NULL,277000000,'2015-02-20',NULL,'kpr','MarketingNHR','2014-12-27 22:05:27');

/*Table structure for table `penerimaan` */

DROP TABLE IF EXISTS `penerimaan`;

CREATE TABLE `penerimaan` (
  `idperum` int(10) NOT NULL,
  `idpenerimaan` bigint(22) NOT NULL AUTO_INCREMENT,
  `idbayar` int(11) NOT NULL,
  `namakonsumen` varchar(100) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `idppjb` int(3) unsigned zerofill NOT NULL,
  `idbank` int(5) DEFAULT '1',
  `norek` varchar(100) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `nilaipenerimaan` bigint(20) DEFAULT NULL,
  `kekurangan` bigint(20) DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT NULL,
  `keterangan` text,
  `jenis` varchar(50) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `penjual` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpenerimaan`),
  UNIQUE KEY `idpenerimaan` (`idpenerimaan`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `penerimaan` */

insert  into `penerimaan`(`idperum`,`idpenerimaan`,`idbayar`,`namakonsumen`,`tanggal_bayar`,`idppjb`,`idbank`,`norek`,`nokwitansi`,`nilaipenerimaan`,`kekurangan`,`komulatif`,`keterangan`,`jenis`,`akunting`,`penjual`,`pimpinan`,`status`,`insertby`,`inserted`) values (1,1,1,'Rosa Wariswara','2014-12-30',001,2,'07738272','-',40000000,0,NULL,NULL,'dp',NULL,NULL,NULL,NULL,NULL,'2014-12-30 21:02:55'),(1,2,3,'Rosa Wariswara','2014-12-31',001,7,'0008986875','-',100000000,177000000,NULL,NULL,'kpr',NULL,NULL,NULL,NULL,NULL,'2014-12-31 03:55:25');

/*Table structure for table `penerimaan_lain` */

DROP TABLE IF EXISTS `penerimaan_lain`;

CREATE TABLE `penerimaan_lain` (
  `idperum` int(10) NOT NULL,
  `idpenerimaan` bigint(20) NOT NULL AUTO_INCREMENT,
  `keterangan` text,
  `tanggal` date DEFAULT NULL,
  `idbank` int(5) DEFAULT '1',
  `norek` varchar(100) DEFAULT '0',
  `nokwitansi` varchar(100) DEFAULT NULL,
  `nilaipenerimaan` bigint(20) DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `akunting` varchar(20) DEFAULT NULL,
  `penjual` varchar(100) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT NULL,
  `status` enum('proses','edit','token','dom') DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpenerimaan`),
  UNIQUE KEY `idpenerimaan` (`idpenerimaan`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `penerimaan_lain` */

insert  into `penerimaan_lain`(`idperum`,`idpenerimaan`,`keterangan`,`tanggal`,`idbank`,`norek`,`nokwitansi`,`nilaipenerimaan`,`komulatif`,`jenis`,`akunting`,`penjual`,`pimpinan`,`status`,`insertby`,`inserted`) values (1,1,'Modal Awal','2014-12-30',7,'0008279281927','0',150000000,NULL,'modal','KeuanganNHR','-',NULL,'dom','KeuanganNHR','2014-12-30 20:36:14'),(1,2,'Kredit Usaha Rakyat BTN','2014-12-30',11,'0997181991828','-',50000000,NULL,'tunai','KeuanganNHR','',NULL,'dom','KeuanganNHR','2014-12-30 20:50:46');

/*Table structure for table `pengumuman` */

DROP TABLE IF EXISTS `pengumuman`;

CREATE TABLE `pengumuman` (
  `idumum` bigint(20) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `detail` text NOT NULL,
  `insertby` varchar(20) NOT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idperum` int(10) DEFAULT '0',
  PRIMARY KEY (`idumum`),
  UNIQUE KEY `idumum` (`idumum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pengumuman` */

/*Table structure for table `ppjb` */

DROP TABLE IF EXISTS `ppjb`;

CREATE TABLE `ppjb` (
  `idperum` int(10) NOT NULL,
  `idno` int(20) NOT NULL AUTO_INCREMENT,
  `kode_ppjb` varchar(5) DEFAULT 'ppjb',
  `idkavling` int(10) NOT NULL,
  `idpsjb` int(3) unsigned zerofill NOT NULL,
  `idppjb` int(3) unsigned zerofill NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `idbuku` char(1) DEFAULT '1',
  `tanggal` date DEFAULT NULL,
  `noppjb` varchar(100) DEFAULT NULL,
  `pemesan` varchar(100) DEFAULT NULL,
  `noktp` varchar(100) DEFAULT NULL,
  `tmptlahir` varchar(100) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `alamatktp` varchar(255) DEFAULT NULL,
  `alamatsurat` varchar(255) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `joinincome` enum('Ya','Tidak') DEFAULT NULL,
  `suami_jepend` varchar(100) DEFAULT NULL,
  `suami_prshn` varchar(100) DEFAULT NULL,
  `suami_alamat` text,
  `suami_telp` varchar(20) DEFAULT NULL,
  `suami_stspgw` varchar(50) DEFAULT NULL,
  `suami_lmakerja` int(5) DEFAULT NULL,
  `suami_gaji` bigint(20) DEFAULT '0',
  `suami_angsuran` int(10) DEFAULT '0',
  `istri_nama` varchar(100) DEFAULT NULL,
  `istri_jpend` varchar(100) DEFAULT NULL,
  `istri_prshn` varchar(100) DEFAULT NULL,
  `istri_alamat` text,
  `istri_telp` varchar(20) DEFAULT NULL,
  `istri_stspgw` varchar(50) DEFAULT NULL,
  `istri_lmakerja` int(5) DEFAULT NULL,
  `istri_gaji` bigint(20) DEFAULT '0',
  `istri_angsuran` int(10) DEFAULT '0',
  `pendapatan` bigint(20) DEFAULT NULL,
  `luasatanah_t` int(5) DEFAULT NULL,
  `harga_newlt` bigint(20) DEFAULT NULL,
  `luasbangunan_t` int(5) DEFAULT NULL,
  `harga_newlb` bigint(20) DEFAULT NULL,
  `carabayar` enum('Cash Keras','KPR','Cash Bertahap') DEFAULT NULL,
  `discount` bigint(20) DEFAULT NULL,
  `tandajadi` bigint(20) DEFAULT NULL,
  `tandajaditgl` date NOT NULL,
  `diskoninfo` text NOT NULL,
  `hargasepakat` bigint(20) DEFAULT NULL,
  `namasertifikat` varchar(100) DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT NULL,
  `idbank` int(5) DEFAULT '1',
  `totalkpr` bigint(20) DEFAULT '0',
  `sukubunga` float DEFAULT NULL,
  `jangkawaktu` int(5) DEFAULT NULL,
  `angsuran` bigint(20) DEFAULT NULL,
  `rithp` float DEFAULT NULL,
  `keterangan` text,
  `administrasi` varchar(20) DEFAULT 'kosong',
  `pimpinan` varchar(20) DEFAULT 'menunggu',
  `marketing` varchar(20) DEFAULT NULL,
  `bankpemesan` int(5) DEFAULT NULL,
  `norekening` varchar(30) DEFAULT NULL,
  `atasnama` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'menunggu',
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `approve_mng` date NOT NULL,
  `lanjut` varchar(10) DEFAULT NULL,
  `ajb` varchar(10) DEFAULT 'y',
  `spmb` varchar(10) DEFAULT 'y',
  `kbk` varchar(10) DEFAULT 'y',
  `kbf` varchar(10) DEFAULT 'y',
  `stp` varchar(10) DEFAULT 'y',
  `bast` varchar(10) DEFAULT 'y',
  UNIQUE KEY `idno` (`idno`),
  KEY `FK_psjb_perum` (`idperum`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ppjb` */

insert  into `ppjb`(`idperum`,`idno`,`kode_ppjb`,`idkavling`,`idpsjb`,`idppjb`,`bulan`,`tahun`,`idbuku`,`tanggal`,`noppjb`,`pemesan`,`noktp`,`tmptlahir`,`tgllahir`,`alamatktp`,`alamatsurat`,`hp`,`telp`,`joinincome`,`suami_jepend`,`suami_prshn`,`suami_alamat`,`suami_telp`,`suami_stspgw`,`suami_lmakerja`,`suami_gaji`,`suami_angsuran`,`istri_nama`,`istri_jpend`,`istri_prshn`,`istri_alamat`,`istri_telp`,`istri_stspgw`,`istri_lmakerja`,`istri_gaji`,`istri_angsuran`,`pendapatan`,`luasatanah_t`,`harga_newlt`,`luasbangunan_t`,`harga_newlb`,`carabayar`,`discount`,`tandajadi`,`tandajaditgl`,`diskoninfo`,`hargasepakat`,`namasertifikat`,`komulatif`,`idbank`,`totalkpr`,`sukubunga`,`jangkawaktu`,`angsuran`,`rithp`,`keterangan`,`administrasi`,`pimpinan`,`marketing`,`bankpemesan`,`norekening`,`atasnama`,`status`,`insertby`,`inserted`,`updateby`,`updated`,`approve_mng`,`lanjut`,`ajb`,`spmb`,`kbk`,`kbf`,`stp`,`bast`) values (1,1,'ppjb',1,001,001,'12','2014','1','2014-12-27',NULL,'Rosa Wariswara','00098392827','Yogyakarta','1988-12-14','Jalan Agus Salim 34B, Semarang','Jalan Agus Salim 34B, Semarang','08575729725','02839870654','Tidak','Pendapatan Tetap','PT Pertamina','Kuningan, Jakarta','02189765423','Pegawai Tetap',60,20000000,4500000,'','','','','','Pegawai Tetap',0,0,0,15500000,0,0,0,0,'KPR',5000000,5000000,'2014-12-27','',362000000,'Rosa wariswara',NULL,7,277000000,12,120,3974145,25.64,NULL,'AdminNHR','ManajerNHR','00000071',7,'000897659','PT Karya Bakti Saudara','dom',NULL,'2014-12-30 10:15:04','AdminNHR','2014-12-27 17:28:53','2014-12-27','ajb','dom','dom','dom','dom','dom','dom');

/*Table structure for table `psjb` */

DROP TABLE IF EXISTS `psjb`;

CREATE TABLE `psjb` (
  `idperum` int(10) NOT NULL,
  `idno` int(10) NOT NULL AUTO_INCREMENT,
  `kode_psjb` varchar(5) DEFAULT 'psjb',
  `idkavling` int(10) DEFAULT NULL,
  `idpsjb` int(3) unsigned zerofill NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `idbuku` char(1) DEFAULT '1',
  `tanggal` date DEFAULT NULL,
  `nopsjb` varchar(100) DEFAULT NULL,
  `pemesan` varchar(100) DEFAULT NULL,
  `noktp` varchar(100) DEFAULT NULL,
  `tmptlahir` varchar(100) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `alamatktp` varchar(255) DEFAULT NULL,
  `alamatsurat` varchar(255) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `joinincome` enum('Ya','Tidak') DEFAULT NULL,
  `suami_jepend` varchar(100) DEFAULT NULL,
  `suami_prshn` varchar(100) DEFAULT NULL,
  `suami_alamat` text,
  `suami_telp` varchar(20) DEFAULT NULL,
  `suami_stspgw` varchar(50) DEFAULT NULL,
  `suami_lmakerja` int(5) DEFAULT NULL,
  `suami_gaji` bigint(20) DEFAULT NULL,
  `suami_angsuran` int(10) DEFAULT NULL,
  `istri_nama` varchar(100) DEFAULT NULL,
  `istri_jpend` varchar(100) DEFAULT NULL,
  `istri_prshn` varchar(100) DEFAULT NULL,
  `istri_alamat` text,
  `istri_telp` varchar(20) DEFAULT NULL,
  `istri_stspgw` varchar(50) DEFAULT NULL,
  `istri_lmakerja` int(5) DEFAULT NULL,
  `istri_gaji` bigint(20) DEFAULT NULL,
  `istri_angsuran` int(10) DEFAULT NULL,
  `pendapatan` bigint(20) DEFAULT NULL,
  `luasatanah_t` int(5) DEFAULT NULL,
  `harga_newlt` bigint(20) DEFAULT NULL,
  `luasbangunan_t` int(5) DEFAULT NULL,
  `harga_newlb` bigint(20) DEFAULT NULL,
  `carabayar` enum('Cash Keras','KPR','Cash Bertahap') DEFAULT NULL,
  `discount` bigint(20) DEFAULT NULL,
  `tandajadi` bigint(20) DEFAULT NULL,
  `tandajaditgl` date NOT NULL,
  `diskoninfo` text NOT NULL,
  `hargasepakat` bigint(20) DEFAULT NULL,
  `namasertifikat` varchar(100) DEFAULT NULL,
  `komulatif` bigint(20) DEFAULT NULL,
  `idbank` int(5) DEFAULT '1',
  `totalkpr` bigint(20) DEFAULT NULL,
  `sukubunga` float DEFAULT NULL,
  `jangkawaktu` int(5) DEFAULT NULL,
  `angsuran` bigint(20) DEFAULT NULL,
  `rithp` float DEFAULT NULL,
  `keterangan` text,
  `marketing` varchar(20) NOT NULL,
  `pimpinan` varchar(20) DEFAULT 'menunggu',
  `status` varchar(10) DEFAULT 'menunggu',
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lanjut` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `idno` (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `psjb` */

insert  into `psjb`(`idperum`,`idno`,`kode_psjb`,`idkavling`,`idpsjb`,`bulan`,`tahun`,`idbuku`,`tanggal`,`nopsjb`,`pemesan`,`noktp`,`tmptlahir`,`tgllahir`,`alamatktp`,`alamatsurat`,`hp`,`telp`,`joinincome`,`suami_jepend`,`suami_prshn`,`suami_alamat`,`suami_telp`,`suami_stspgw`,`suami_lmakerja`,`suami_gaji`,`suami_angsuran`,`istri_nama`,`istri_jpend`,`istri_prshn`,`istri_alamat`,`istri_telp`,`istri_stspgw`,`istri_lmakerja`,`istri_gaji`,`istri_angsuran`,`pendapatan`,`luasatanah_t`,`harga_newlt`,`luasbangunan_t`,`harga_newlb`,`carabayar`,`discount`,`tandajadi`,`tandajaditgl`,`diskoninfo`,`hargasepakat`,`namasertifikat`,`komulatif`,`idbank`,`totalkpr`,`sukubunga`,`jangkawaktu`,`angsuran`,`rithp`,`keterangan`,`marketing`,`pimpinan`,`status`,`insertby`,`inserted`,`updateby`,`updated`,`lanjut`) values (1,1,'psjb',1,001,'12','2014','1','2014-12-27',NULL,'Rosa Wariswara','00098392827','Yogyakarta','1988-12-14','Jalan Agus Salim 34B, Semarang','Jalan Agus Salim 34B, Semarang','08575729725','02839870654','Tidak','Pendapatan Tetap','PT Pertamina','Kuningan, Jakarta','02189765423','Pegawai Tetap',60,20000000,4500000,'','','','','','Pegawai Tetap',0,0,0,15500000,0,0,0,0,'KPR',5000000,5000000,'2014-12-27','',362000000,'Rosa Wariswara',NULL,7,277000000,12,120,3974145,25.64,NULL,'MarketingNHR','ManajerNHR','psjb','MarketingNHR','2014-12-28 00:34:04','MarketingNHR','2014-12-27 15:06:31','selesai');

/*Table structure for table `serahterima` */

DROP TABLE IF EXISTS `serahterima`;

CREATE TABLE `serahterima` (
  `idserah` int(25) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(50) DEFAULT NULL,
  `serah_psjb` date DEFAULT NULL,
  `serah_ppjb` date DEFAULT NULL,
  `serah_spmb` date DEFAULT NULL,
  `serah_kbk` date DEFAULT NULL,
  `serah_pfr` date DEFAULT NULL,
  `serah_stpk` date DEFAULT NULL,
  `serah_rajb` date DEFAULT NULL,
  `serah_bast` date DEFAULT NULL,
  UNIQUE KEY `idserah` (`idserah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `serahterima` */

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `idsetting` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `setting` */

insert  into `setting`(`id`,`judul`,`detail`,`insertby`,`inserted`) values (1,'My Profile','Berikut informasi mengenai status kepegawaian Anda.','indouser','2014-09-14 20:59:43'),(2,'About Us','nDalem adalah perusahaan bisnis yang berbasis organisasi, yang mana pengetahuan telah menjadi basis mereka.','indouser','2014-09-14 07:34:01'),(3,'Our Service','tes','admin','2012-11-26 09:47:20'),(4,'Pengumuman','khusus tertentu','indouser','2014-09-13 23:41:15'),(5,'Contact Us','tes','admin','2012-11-26 09:47:46');

/*Table structure for table `setting_anggaran` */

DROP TABLE IF EXISTS `setting_anggaran`;

CREATE TABLE `setting_anggaran` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_setting` date NOT NULL,
  `perumahan` int(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `tanah` varchar(50) NOT NULL,
  `pengolahan_lahan` varchar(50) NOT NULL,
  `prasarana` varchar(50) NOT NULL,
  `konstruksi` varchar(50) NOT NULL,
  `perijinan` varchar(50) NOT NULL,
  `legalitas_proyek` varchar(50) NOT NULL,
  `legalitas_penjualan` varchar(50) NOT NULL,
  `royalty` varchar(50) NOT NULL,
  `inventaris` varchar(50) NOT NULL,
  `operasional_kantor` varchar(50) NOT NULL,
  `operasional_proyek` varchar(50) NOT NULL,
  `operasional_pemasaran` varchar(50) NOT NULL,
  `retur_penjualan` varchar(50) NOT NULL,
  `tarik_modal` varchar(50) NOT NULL,
  `mutasi_bank` varchar(50) NOT NULL,
  `lain_lain` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `setting_anggaran` */

insert  into `setting_anggaran`(`id_setting`,`tgl_setting`,`perumahan`,`lokasi`,`tanah`,`pengolahan_lahan`,`prasarana`,`konstruksi`,`perijinan`,`legalitas_proyek`,`legalitas_penjualan`,`royalty`,`inventaris`,`operasional_kantor`,`operasional_proyek`,`operasional_pemasaran`,`retur_penjualan`,`tarik_modal`,`mutasi_bank`,`lain_lain`,`total`,`user`,`status`) values (1,'2014-12-27',1,'Jalan Palagan Tentara Pelajar, Sleman, Yogyakarta','150000000','25000000','50000000','250000000','25000000','30000000','20000000','50000000','15000000','10000000','10000000','20000000','0','0','0','5000000','660000000','00000073','aktif');

/*Table structure for table `spmb` */

DROP TABLE IF EXISTS `spmb`;

CREATE TABLE `spmb` (
  `idperum` int(10) NOT NULL,
  `idno` int(10) NOT NULL AUTO_INCREMENT,
  `kode_spmb` varchar(5) DEFAULT 'spmb',
  `idkavling` int(10) DEFAULT NULL,
  `idppjb` int(3) unsigned zerofill NOT NULL,
  `idspmb` int(3) unsigned zerofill NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `idbuku` char(1) DEFAULT '1',
  `tanggal` date DEFAULT NULL,
  `pemesan` varchar(100) DEFAULT NULL,
  `catatan` text,
  `lamapembangunan` int(4) DEFAULT NULL,
  `terbayar` bigint(20) DEFAULT NULL,
  `sisauangmuka` bigint(20) DEFAULT NULL,
  `tgluangmuka` date DEFAULT NULL,
  `tglbank` date DEFAULT NULL,
  `nilaikbk` bigint(20) DEFAULT NULL,
  `tglbast` date DEFAULT NULL,
  `akunting` varchar(20) DEFAULT 'kosong',
  `pimpinan` varchar(20) DEFAULT 'menunggu',
  `status` varchar(10) DEFAULT 'proses',
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lanjut` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `idno` (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `spmb` */

insert  into `spmb`(`idperum`,`idno`,`kode_spmb`,`idkavling`,`idppjb`,`idspmb`,`bulan`,`tahun`,`idbuku`,`tanggal`,`pemesan`,`catatan`,`lamapembangunan`,`terbayar`,`sisauangmuka`,`tgluangmuka`,`tglbank`,`nilaikbk`,`tglbast`,`akunting`,`pimpinan`,`status`,`insertby`,`inserted`,`updateby`,`updated`,`lanjut`) values (1,1,'spmb',1,001,001,'12','2014','1','2014-12-28','Rosa Wariswara','',120,5000000,0,'2015-02-05','2015-01-20',112500000,'2015-06-02','KeuanganNHR','ManajerNHR','tutup',NULL,'2014-12-28 10:38:08','KeuanganNHR','2014-12-28 03:35:36','kbk');

/*Table structure for table `st_pembangunan` */

DROP TABLE IF EXISTS `st_pembangunan`;

CREATE TABLE `st_pembangunan` (
  `no_stp` varchar(100) DEFAULT NULL,
  `idpemeriksaan` int(22) NOT NULL AUTO_INCREMENT,
  `idketerangan` int(3) DEFAULT NULL,
  `status` enum('diterima','diperbaiki') DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `idpemeriksaan` (`idpemeriksaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `st_pembangunan` */

/*Table structure for table `stp` */

DROP TABLE IF EXISTS `stp`;

CREATE TABLE `stp` (
  `idperum` int(10) NOT NULL,
  `idno` int(10) NOT NULL AUTO_INCREMENT,
  `kode_stp` varchar(5) DEFAULT 'stp',
  `idkavling` int(10) DEFAULT NULL,
  `idppjb` int(3) unsigned zerofill NOT NULL,
  `idstp` int(3) unsigned zerofill NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `idbuku` char(1) DEFAULT '1',
  `pemesan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tglpemeriksaan` date DEFAULT NULL,
  `jenispekerjaan` varchar(100) DEFAULT NULL,
  `akhirpemeriksaan` date DEFAULT NULL,
  `catatan` text,
  `sipil` varchar(20) DEFAULT NULL,
  `pimpinan` varchar(20) DEFAULT 'menunggu',
  `status` varchar(10) DEFAULT 'proses',
  `insertby` varchar(20) DEFAULT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lanjut` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `idno` (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `stp` */

insert  into `stp`(`idperum`,`idno`,`kode_stp`,`idkavling`,`idppjb`,`idstp`,`bulan`,`tahun`,`idbuku`,`pemesan`,`tanggal`,`tglpemeriksaan`,`jenispekerjaan`,`akhirpemeriksaan`,`catatan`,`sipil`,`pimpinan`,`status`,`insertby`,`inserted`,`updateby`,`updated`,`lanjut`) values (1,1,'stp',1,001,001,'12','2014','1','Rosa Wariswara','2014-12-29','2015-05-01',NULL,'2015-05-25','','SipilNHR','ManajerNHR','selesai',NULL,'2014-12-30 04:42:38','SipilNHR','2014-12-29 21:39:48','bast');

/*Table structure for table `suratpernyataan` */

DROP TABLE IF EXISTS `suratpernyataan`;

CREATE TABLE `suratpernyataan` (
  `idsurat` int(22) NOT NULL AUTO_INCREMENT,
  `no_kbf` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `proyek` varchar(100) DEFAULT NULL,
  `kavling` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idsurat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `suratpernyataan` */

/*Table structure for table `transkasi_kbk` */

DROP TABLE IF EXISTS `transkasi_kbk`;

CREATE TABLE `transkasi_kbk` (
  `no_kbf` varchar(100) DEFAULT NULL,
  `termin` varchar(10) DEFAULT NULL,
  `uraian` varchar(200) DEFAULT NULL,
  `nilaibayar` int(22) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `transkasi_kbk` */

/*Table structure for table `var_umum` */

DROP TABLE IF EXISTS `var_umum`;

CREATE TABLE `var_umum` (
  `idvar` int(5) NOT NULL AUTO_INCREMENT,
  `name_var` varchar(20) DEFAULT NULL,
  `title_var` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idvar`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `var_umum` */

insert  into `var_umum`(`idvar`,`name_var`,`title_var`,`description`) values (1,'jenisbayar','termin',NULL),(2,'jenisbayar','pemeliharaan',NULL),(3,'statusperiksa','proses',NULL),(4,'statusperiksa','selesai',NULL),(6,'hpp','','- Semua -'),(7,'hpp','proses','Proses Persetujuan'),(8,'hpp','edit','Proses Editing'),(9,'hpp','token','Proses Perbaikan'),(10,'hpp','dom','Selesai/Lunas'),(11,'pricelist','','Semua Data'),(12,'pricelist','Dipesan','Telah Dipesan'),(13,'pricelist','Building','Proses Pembangunan'),(14,'pricelist','Terjual','Kavling Terjual'),(15,'pricelist','Free','Kavling Tersedia'),(16,'pricelist','PPJB','Tahap PPJB'),(17,'start_system_tgl','2011-01-01',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
