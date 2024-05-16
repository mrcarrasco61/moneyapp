-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                10.4.14-MariaDB - mariadb.org binary distribution
-- Sunucu İşletim Sistemi:       Win64
-- HeidiSQL Sürüm:               11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- mmoney için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `mmoney` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `mmoney`;

-- tablo yapısı dökülüyor mmoney.harcamahareketleri
CREATE TABLE IF NOT EXISTS `harcamahareketleri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `harcamaYapilanHesap` int(11) DEFAULT NULL,
  `harcamaTutari` decimal(10,0) DEFAULT NULL,
  `harcamaKategori` varchar(50) DEFAULT NULL,
  `harcamaTarihi` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

-- Veri çıktısı seçilmemişti

-- tablo yapısı dökülüyor mmoney.hesap
CREATE TABLE IF NOT EXISTS `hesap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(50) NOT NULL DEFAULT '0',
  `bakiye` decimal(13,2) DEFAULT NULL,
  `tur` varchar(50) DEFAULT NULL,
  `parabirimi` varchar(50) NOT NULL DEFAULT '0',
  `olusturmaTarihi` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Veri çıktısı seçilmemişti

-- tablo yapısı dökülüyor mmoney.hesaphareketleri
CREATE TABLE IF NOT EXISTS `hesaphareketleri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anaHesap` int(11) NOT NULL DEFAULT 0,
  `aktarilanHesap` int(11) NOT NULL DEFAULT 0,
  `islemTutarı` decimal(10,0) NOT NULL DEFAULT 0,
  `islemKategori` varchar(50) NOT NULL DEFAULT '0',
  `islemTarihi` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

-- Veri çıktısı seçilmemişti

-- tablo yapısı dökülüyor mmoney.kullanici
CREATE TABLE IF NOT EXISTS `kullanici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '',
  `kullaniciadi` varchar(50) NOT NULL DEFAULT '',
  `sifre` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Veri çıktısı seçilmemişti

-- tablo yapısı dökülüyor mmoney.log
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici` text DEFAULT NULL,
  `is` varchar(50) DEFAULT NULL,
  `tarih` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4;

-- Veri çıktısı seçilmemişti

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
