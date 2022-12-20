-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Oca 2021, 12:47:43
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kitap`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kutuphane`
--

CREATE TABLE `kutuphane` (
  `kitap_id` int(11) NOT NULL,
  `yazar` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `eser` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kutuphane`
--

INSERT INTO `kutuphane` (`kitap_id`, `yazar`, `eser`) VALUES
(8, 'Oğuz Atay', 'Tutunamayanlar'),
(10, 'Lev Tolstoy', 'Savaş ve Barış'),
(17, 'Halide Edib Adıvar', 'Ateşten Gömlek'),
(22, 'Ayşe Kulin', 'Sevdalinka'),
(23, 'Platon', 'Devlet'),
(24, 'Hasan Ali Yücel', 'İyi Vatandaş İyi İnsan'),
(25, 'Aristoteles', 'Retorik'),
(26, 'Farabi', 'İlimlerin Sayımı'),
(27, 'Cemal Süreya', 'Üvercinka'),
(28, 'Nâzım Hikmet', 'Yaşamak Güzel Şey Be Kardeşim'),
(29, 'Jean-Jacques Rousseau', 'Yalnız Gezenin Düşleri');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `raflar`
--

CREATE TABLE `raflar` (
  `raf_id` int(11) NOT NULL,
  `yazaradi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `eseradi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tur` varchar(11) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `raflar`
--

INSERT INTO `raflar` (`raf_id`, `yazaradi`, `eseradi`, `tur`) VALUES
(6, 'Oğuz Atay', 'Tutunamayanlar', 'Roman'),
(7, 'Nazım Hikmet', 'Sesini Kaybeden Şehir', 'Şiir'),
(8, 'Cemal süreya', 'Üvercinka ', 'Şiir'),
(9, 'Fyodor Dostoyevski', 'Yeraltından Notlar', 'Roman');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kutuphane`
--
ALTER TABLE `kutuphane`
  ADD PRIMARY KEY (`kitap_id`);

--
-- Tablo için indeksler `raflar`
--
ALTER TABLE `raflar`
  ADD PRIMARY KEY (`raf_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kutuphane`
--
ALTER TABLE `kutuphane`
  MODIFY `kitap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `raflar`
--
ALTER TABLE `raflar`
  MODIFY `raf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
