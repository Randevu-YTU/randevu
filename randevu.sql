-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Nis 2016, 14:48:33
-- Sunucu sürümü: 5.7.9
-- PHP Sürümü: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `randevu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `communication`
--

DROP TABLE IF EXISTS `communication`;
CREATE TABLE IF NOT EXISTS `communication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `communication`
--

INSERT INTO `communication` (`id`, `value`) VALUES
(1, 'mobil'),
(2, 'skype');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

DROP TABLE IF EXISTS `randevu`;
CREATE TABLE IF NOT EXISTS `randevu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `duration` int(11) NOT NULL,
  `hoca_id` int(11) NOT NULL,
  `ogr_id` int(11) NOT NULL,
  `konu` longtext COLLATE utf8_turkish_ci NOT NULL,
  `kisi_sayisi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `ek` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `next` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`id`, `date`, `duration`, `hoca_id`, `ogr_id`, `konu`, `kisi_sayisi`, `status`, `ek`, `next`) VALUES
(1, '2016-04-25 09:30:00', 30, 3, 1, 'deneme konusu proje görüşmeleri', 2, 2, '1.pdf', 0),
(2, '2016-04-26 09:00:00', 30, 3, 2, 'deneme', 1, 2, '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `status`
--

INSERT INTO `status` (`id`, `value`) VALUES
(1, 'geçmiş'),
(2, 'atanmış'),
(3, 'atanmamış');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `tc` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `bdate` date NOT NULL,
  `sex` varchar(1) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `fname`, `lname`, `tc`, `bdate`, `sex`, `image`, `yetki`) VALUES
(1, 'selimsirac@gmail.com', '123456', 'selim sirac', 'güler', '12345678910', '1995-05-05', 'E', '1.jpg', 3),
(2, 'brkkrky60@outlook.com', 'hatsafada', 'burak', 'karakaya', '10987654321', '1995-10-18', 'E', '2.jpg', 3),
(3, 'tevfik@ce.yildiz.edu.tr', '654321', 'ahmet tevfik', 'inan', '43457845981', '1971-10-09', 'E', '', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_to_com`
--

DROP TABLE IF EXISTS `user_to_com`;
CREATE TABLE IF NOT EXISTS `user_to_com` (
  `user_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `value` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user_to_com`
--

INSERT INTO `user_to_com` (`user_id`, `com_id`, `value`) VALUES
(1, 1, '5057341293'),
(1, 2, 'ssg.34'),
(2, 1, '5070532422'),
(2, 2, 'brkkrky.60'),
(1, 1, '5414161995');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
