-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 May 2016, 06:39:43
-- Sunucu sürümü: 5.7.11
-- PHP Sürümü: 5.6.19

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

CREATE TABLE `communication` (
  `id` int(11) NOT NULL,
  `value` varchar(32) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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

CREATE TABLE `randevu` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `duration` int(11) NOT NULL,
  `hoca_id` int(11) NOT NULL,
  `ogr_id` int(11) NOT NULL,
  `konu` longtext COLLATE utf8_turkish_ci NOT NULL,
  `kisi_sayisi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `ek` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`id`, `date`, `duration`, `hoca_id`, `ogr_id`, `konu`, `kisi_sayisi`, `status`, `ek`, `p_id`) VALUES
(1, '2016-04-25 09:30:00', 30, 3, 1, 'deneme konusu proje görüşmeleri', 2, 2, '1.pdf', 0),
(2, '2016-04-26 09:00:00', 30, 3, 2, 'deneme', 1, 2, '', 0),
(3, '2016-05-23 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(4, '2016-05-30 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(5, '2016-06-06 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(6, '2016-06-13 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(7, '2016-06-20 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(8, '2016-06-27 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(9, '2016-07-04 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(10, '2016-07-11 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(11, '2016-07-18 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(12, '2016-07-25 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(13, '2016-08-01 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(14, '2016-08-08 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(15, '2016-08-15 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(16, '2016-08-22 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(17, '2016-08-29 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(18, '2016-09-05 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(19, '2016-09-12 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(20, '2016-09-19 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(21, '2016-09-26 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(22, '2016-10-03 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(23, '2016-10-10 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(24, '2016-10-17 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(25, '2016-10-24 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(26, '2016-10-31 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(27, '2016-11-07 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(28, '2016-11-14 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(29, '2016-11-21 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(30, '2016-11-28 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(31, '2016-12-05 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(32, '2016-12-12 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(33, '2016-12-19 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(34, '2016-12-26 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(35, '2017-01-02 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(36, '2017-01-09 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(37, '2017-01-16 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(38, '2017-01-23 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(39, '2017-01-30 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(40, '2017-02-06 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(41, '2017-02-13 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(42, '2017-02-20 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(43, '2017-02-27 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(44, '2017-03-06 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(45, '2017-03-13 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(46, '2017-03-20 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(47, '2017-03-27 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(48, '2017-04-03 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(49, '2017-04-10 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(50, '2017-04-17 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(51, '2017-04-24 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(52, '2017-05-01 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(53, '2017-05-08 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(54, '2017-05-15 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 1),
(55, '2016-05-23 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 2),
(56, '2016-05-30 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 2),
(57, '2016-06-06 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 2),
(58, '2016-06-13 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 2),
(59, '2016-05-23 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 3),
(60, '2016-05-23 08:30:00', 30, 1, 0, ' ', 0, 3, ' ', 3),
(61, '2016-05-23 09:00:00', 30, 1, 0, ' ', 0, 3, ' ', 3),
(62, '2016-05-25 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 3),
(63, '2016-05-25 08:30:00', 30, 1, 0, ' ', 0, 3, ' ', 3),
(64, '2016-05-25 09:00:00', 30, 1, 0, ' ', 0, 3, ' ', 3),
(65, '2016-05-22 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 4),
(66, '2016-05-22 08:30:00', 30, 1, 0, ' ', 0, 3, ' ', 4),
(67, '2016-05-22 09:00:00', 30, 1, 0, ' ', 0, 3, ' ', 4),
(68, '2016-05-23 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 4),
(69, '2016-05-23 08:30:00', 30, 1, 0, ' ', 0, 3, ' ', 4),
(70, '2016-05-23 09:00:00', 30, 1, 0, ' ', 0, 3, ' ', 4),
(71, '2016-05-22 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 5),
(72, '2016-05-22 08:30:00', 30, 1, 0, ' ', 0, 3, ' ', 5),
(73, '2016-05-22 09:00:00', 30, 1, 0, ' ', 0, 3, ' ', 5),
(74, '2016-05-23 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 5),
(75, '2016-05-23 08:30:00', 30, 1, 0, ' ', 0, 3, ' ', 5),
(76, '2016-05-23 09:00:00', 30, 1, 0, ' ', 0, 3, ' ', 5),
(77, '2016-05-26 08:00:00', 30, 1, 0, ' ', 0, 3, ' ', 5),
(78, '2016-05-26 08:30:00', 30, 1, 0, ' ', 0, 3, ' ', 5),
(79, '2016-05-26 09:00:00', 30, 1, 0, ' ', 0, 3, ' ', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu_package`
--

CREATE TABLE `randevu_package` (
  `id` int(11) NOT NULL,
  `hoca_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `randevu_package`
--

INSERT INTO `randevu_package` (`id`, `hoca_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `value` varchar(10) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `mail` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `tc` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `bdate` date NOT NULL,
  `sex` varchar(1) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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

CREATE TABLE `user_to_com` (
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

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `communication`
--
ALTER TABLE `communication`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `randevu`
--
ALTER TABLE `randevu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `randevu_package`
--
ALTER TABLE `randevu_package`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `communication`
--
ALTER TABLE `communication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `randevu`
--
ALTER TABLE `randevu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- Tablo için AUTO_INCREMENT değeri `randevu_package`
--
ALTER TABLE `randevu_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
