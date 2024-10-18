-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Eki 2024, 18:31:08
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `seyahatun`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `biletler`
--

CREATE TABLE `biletler` (
  `Bilet_ID` int(11) NOT NULL,
  `Kalkis_Sehir` varchar(16) NOT NULL,
  `Varis_Sehir` varchar(16) NOT NULL,
  `Tarih` date NOT NULL,
  `Saat` time NOT NULL,
  `Fiyat` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `biletler`
--

INSERT INTO `biletler` (`Bilet_ID`, `Kalkis_Sehir`, `Varis_Sehir`, `Tarih`, `Saat`, `Fiyat`) VALUES
(1, 'ADANA', 'ARDAHAN', '2024-06-02', '19:00:00', 300.00),
(2, 'ADANA', 'ARDAHAN', '2024-06-02', '12:00:00', 250.00),
(3, 'ARTVİN', 'ARDAHAN', '2024-07-04', '12:00:00', 600.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kalkis_konumlari`
--

CREATE TABLE `kalkis_konumlari` (
  `Sehir_Kodu` int(11) NOT NULL,
  `Sehir_Adi` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kalkis_konumlari`
--

INSERT INTO `kalkis_konumlari` (`Sehir_Kodu`, `Sehir_Adi`) VALUES
(1, 'ADANA'),
(2, 'ADIYAMAN'),
(3, 'AFYONKARAHİSAR'),
(4, 'AĞRI'),
(5, 'AKSARAY'),
(6, 'AMASYA'),
(7, 'ANKARA'),
(8, 'ANTALYA'),
(9, 'ARDAHAN'),
(10, 'ARTVİN'),
(11, 'AYDIN'),
(12, 'BALIKESİR'),
(13, 'BARTIN'),
(14, 'BATMAN'),
(15, 'BAYBURT'),
(16, 'BİLECİK'),
(17, 'BİNGÖL'),
(18, 'BİTLİS'),
(19, 'BOLU'),
(20, 'BURDUR'),
(21, 'BURSA'),
(22, 'ÇANAKKALE'),
(23, 'ÇANKIRI'),
(24, 'ÇORUM'),
(25, 'DENİZLİ'),
(26, 'DİYARBAKIR'),
(27, 'DÜZCE'),
(28, 'EDİRNE'),
(29, 'ELAZIĞ'),
(30, 'ERZİNCAN'),
(31, 'ERZURUM'),
(32, 'ESKİŞEHİR'),
(33, 'GAZİANTEP'),
(34, 'GİRESUN'),
(35, 'GÜMÜŞHANE'),
(36, 'HAKKARİ'),
(37, 'HATAY'),
(38, 'IĞDIR'),
(39, 'ISPARTA'),
(40, 'İSTANBUL'),
(41, 'İZMİR'),
(42, 'KAHRAMANMARAŞ'),
(43, 'KARABÜK'),
(44, 'KARAMAN'),
(45, 'KARS'),
(46, 'KASTAMONU'),
(47, 'KAYSERİ'),
(48, 'KIRIKKALE'),
(49, 'KIRKLARELİ'),
(50, 'KIRŞEHİR'),
(51, 'KİLİS'),
(52, 'KOCAELİ'),
(53, 'KONYA'),
(54, 'KÜTAHYA'),
(55, 'MALATYA'),
(56, 'MANİSA'),
(57, 'MARDİN'),
(58, 'MERSİN'),
(59, 'MUĞLA'),
(60, 'MUŞ'),
(61, 'NEVŞEHİR'),
(62, 'NİĞDE'),
(63, 'ORDU'),
(64, 'OSMANİYE'),
(65, 'RİZE'),
(66, 'SAKARYA'),
(67, 'SAMSUN'),
(68, 'SİİRT'),
(69, 'SİNOP'),
(70, 'SİVAS'),
(71, 'ŞANLIURFA'),
(72, 'ŞIRNAK'),
(73, 'TEKİRDAĞ'),
(74, 'TOKAT'),
(75, 'TRABZON'),
(76, 'TUNCELİ'),
(77, 'UŞAK'),
(78, 'VAN'),
(79, 'YALOVA'),
(80, 'YOZGAT'),
(81, 'ZONGULDAK');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `Kullanici_ID` int(11) NOT NULL,
  `Kullanici_Adi` varchar(16) NOT NULL,
  `Kullanici_Soyadi` varchar(16) NOT NULL,
  `Kullanici_EPosta` varchar(30) NOT NULL,
  `Kullanici_Sifre` varchar(16) NOT NULL,
  `Kullanici_Rol` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`Kullanici_ID`, `Kullanici_Adi`, `Kullanici_Soyadi`, `Kullanici_EPosta`, `Kullanici_Sifre`, `Kullanici_Rol`) VALUES
(1, 'Hatun', 'Dinçer', 'hatundincer@gmail.com', 'hatundincer2005', 'yonetici'),
(2, 'Furkan', 'Kdzc', 'furkankdzc@gmail.com', 'furku123', 'standart'),
(3, 'soner', 'ele', 'soner@gmail.com', 'soner123', 'standart'),
(4, 'yelda', 'ele', 'yelda@gmail.com', 'yelda123', 'standart'),
(5, 'efe', 'kdzc', 'efe@gmail.com', 'efe123', 'standart'),
(6, 'selma', 'aldkja', 'selma@gmail.com', 'selma123', 'standart');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odemeler`
--

CREATE TABLE `odemeler` (
  `Odeme_ID` int(11) NOT NULL,
  `Kullanici_ID` int(11) NOT NULL,
  `Bilet_ID` int(11) NOT NULL,
  `Koltuk_ID` int(11) NOT NULL,
  `Cinsiyet` varchar(10) NOT NULL,
  `Odeme_Miktari` decimal(10,2) NOT NULL,
  `Odeme_Tarihi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `odemeler`
--

INSERT INTO `odemeler` (`Odeme_ID`, `Kullanici_ID`, `Bilet_ID`, `Koltuk_ID`, `Cinsiyet`, `Odeme_Miktari`, `Odeme_Tarihi`) VALUES
(1, 6, 1, 1, 'erkek', 300.00, '2024-06-11 13:26:00'),
(2, 6, 1, 2, 'kadin', 300.00, '2024-06-11 13:27:36'),
(3, 6, 2, 19, 'erkek', 250.00, '2024-06-11 13:28:02'),
(4, 6, 1, 11, 'erkek', 300.00, '2024-06-11 13:29:46'),
(5, 2, 1, 26, 'erkek', 300.00, '2024-06-11 13:30:59'),
(6, 2, 1, 19, 'kadin', 300.00, '2024-06-11 13:32:12'),
(7, 2, 1, 31, 'erkek', 300.00, '2024-06-11 13:33:29'),
(8, 2, 1, 30, 'erkek', 300.00, '2024-06-11 13:34:25'),
(9, 2, 2, 28, 'kadin', 250.00, '2024-06-11 13:35:27'),
(10, 4, 2, 29, 'kadin', 250.00, '2024-06-11 13:40:34'),
(11, 4, 1, 10, 'kadin', 300.00, '2024-06-11 13:47:27'),
(12, 4, 1, 13, 'erkek', 300.00, '2024-06-11 14:38:20'),
(13, 4, 3, 30, 'erkek', 600.00, '2024-06-11 14:38:43'),
(14, 2, 1, 14, 'erkek', 300.00, '2024-06-11 15:14:03'),
(15, 2, 1, 29, 'erkek', 300.00, '2024-06-12 22:54:39'),
(16, 2, 1, 22, 'erkek', 300.00, '2024-06-16 18:45:50'),
(17, 2, 1, 18, 'erkek', 300.00, '2024-06-17 13:26:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `varis_konumlari`
--

CREATE TABLE `varis_konumlari` (
  `Sehir_Kodu` int(11) NOT NULL,
  `Sehir_Adi` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `varis_konumlari`
--

INSERT INTO `varis_konumlari` (`Sehir_Kodu`, `Sehir_Adi`) VALUES
(1, 'ADANA'),
(2, 'ADIYAMAN'),
(3, 'AFYONKARAHİSAR'),
(4, 'AĞRI'),
(5, 'AKSARAY'),
(6, 'AMASYA'),
(7, 'ANKARA'),
(8, 'ANTALYA'),
(9, 'ARDAHAN'),
(10, 'ARTVİN'),
(11, 'AYDIN'),
(12, 'BALIKESİR'),
(13, 'BARTIN'),
(14, 'BATMAN'),
(15, 'BAYBURT'),
(16, 'BİLECİK'),
(17, 'BİNGÖL'),
(18, 'BİTLİS'),
(19, 'BOLU'),
(20, 'BURDUR'),
(21, 'BURSA'),
(22, 'ÇANAKKALE'),
(23, 'ÇANKIRI'),
(24, 'ÇORUM'),
(25, 'DENİZLİ'),
(26, 'DİYARBAKIR'),
(27, 'DÜZCE'),
(28, 'EDİRNE'),
(29, 'ELAZIĞ'),
(30, 'ERZİNCAN'),
(31, 'ERZURUM'),
(32, 'ESKİŞEHİR'),
(33, 'GAZİANTEP'),
(34, 'GİRESUN'),
(35, 'GÜMÜŞHANE'),
(36, 'HAKKARİ'),
(37, 'HATAY'),
(38, 'IĞDIR'),
(39, 'ISPARTA'),
(40, 'İSTANBUL'),
(41, 'İZMİR'),
(42, 'KAHRAMANMARAŞ'),
(43, 'KARABÜK'),
(44, 'KARAMAN'),
(45, 'KARS'),
(46, 'KASTAMONU'),
(47, 'KAYSERİ'),
(48, 'KIRIKKALE'),
(49, 'KIRKLARELİ'),
(50, 'KIRŞEHİR'),
(51, 'KİLİS'),
(52, 'KOCAELİ'),
(53, 'KONYA'),
(54, 'KÜTAHYA'),
(55, 'MALATYA'),
(56, 'MANİSA'),
(57, 'MARDİN'),
(58, 'MERSİN'),
(59, 'MUĞLA'),
(60, 'MUŞ'),
(61, 'NEVŞEHİR'),
(62, 'NİĞDE'),
(63, 'ORDU'),
(64, 'OSMANİYE'),
(65, 'RİZE'),
(66, 'SAKARYA'),
(67, 'SAMSUN'),
(68, 'SİİRT'),
(69, 'SİNOP'),
(70, 'SİVAS'),
(71, 'ŞANLIURFA'),
(72, 'ŞIRNAK'),
(73, 'TEKİRDAĞ'),
(74, 'TOKAT'),
(75, 'TRABZON'),
(76, 'TUNCELİ'),
(77, 'UŞAK'),
(78, 'VAN'),
(79, 'YALOVA'),
(80, 'YOZGAT'),
(81, 'ZONGULDAK');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `biletler`
--
ALTER TABLE `biletler`
  ADD PRIMARY KEY (`Bilet_ID`);

--
-- Tablo için indeksler `kalkis_konumlari`
--
ALTER TABLE `kalkis_konumlari`
  ADD PRIMARY KEY (`Sehir_Kodu`),
  ADD UNIQUE KEY `Sehir_Adi` (`Sehir_Adi`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`Kullanici_ID`);

--
-- Tablo için indeksler `odemeler`
--
ALTER TABLE `odemeler`
  ADD PRIMARY KEY (`Odeme_ID`);

--
-- Tablo için indeksler `varis_konumlari`
--
ALTER TABLE `varis_konumlari`
  ADD PRIMARY KEY (`Sehir_Kodu`),
  ADD UNIQUE KEY `Sehir_Adi` (`Sehir_Adi`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `biletler`
--
ALTER TABLE `biletler`
  MODIFY `Bilet_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kalkis_konumlari`
--
ALTER TABLE `kalkis_konumlari`
  MODIFY `Sehir_Kodu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `Kullanici_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `odemeler`
--
ALTER TABLE `odemeler`
  MODIFY `Odeme_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `varis_konumlari`
--
ALTER TABLE `varis_konumlari`
  MODIFY `Sehir_Kodu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
