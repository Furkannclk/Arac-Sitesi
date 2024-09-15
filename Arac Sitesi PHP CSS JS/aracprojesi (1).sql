-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Haz 2022, 07:58:20
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `aracprojesi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `araclar`
--

CREATE TABLE `araclar` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori` int(11) NOT NULL,
  `aciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `carPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `araclar`
--

INSERT INTO `araclar` (`id`, `name`, `image`, `kategori`, `aciklama`, `carPrice`) VALUES
(9, 'Bmw 116d', 'img/cars/car-2870021796-.png', 11, '<p>Bmw 116d - 2022</p>\r\n', 500),
(10, 'Volvo XC90', 'img/cars/car-3016131274-.png', 8, '<p>Volvo XC90 - 2022</p>\r\n', 3452342),
(11, 'Toyota land cruiser', 'img/cars/car-2732922805-.png', 13, '<p>Toyota Land Cruiser - 2022</p>\r\n', 456456),
(12, 'Renault Clio', 'img/cars/car-2920621948-.png', 9, '<p>Renault Clio - 2022</p>\r\n', 4564564),
(13, 'Volkswagen polo', 'img/cars/car-2958024400-.png', 12, '<p>Volkswagen Polo - 2022</p>\r\n', 87899),
(14, 'Mercedes a serisi', 'img/cars/car-2389729410-.png', 10, '<p>Mercedes A serisi - 2022</p>\r\n', 9975464),
(15, 'Bmw m235i', 'img/cars/car-2460829738-.png', 11, '<p>BMW M235i - 2022</p>\r\n', 56445321),
(16, 'Volvo s90', 'img/cars/car-2814721998-.png', 8, '<p>Volvo S90 - 2022</p>\r\n', 4564646),
(17, 'Toyota chr', 'img/cars/car-2875723871-.png', 13, '<p>Toyota CHR - 2022</p>\r\n', 56323),
(18, 'Renault talisman', 'img/cars/car-2626323485-.png', 9, '<p>Renault Talisman - 2022</p>\r\n', 5462131),
(19, 'Volkswagen passat', 'img/cars/car-2495423292-.png', 12, '<p>Volkswagen Passat - 2022</p>\r\n', 0),
(20, 'Mercedes b serisi', 'img/cars/car-2234520475-.png', 10, '<p>Mercedes B serisi - 2022</p>\r\n', 0),
(21, 'BMW M3', 'img/cars/car-3065330572-.png', 11, '<p>BMW M3 - 2022</p>\r\n', 0),
(22, 'Volvo s60', 'img/cars/car-3128228127-.png', 8, '<p>Volvo S60 - 2022</p>\r\n', 0),
(23, 'Toyota corolla hybrid', 'img/cars/car-3142022788-.png', 13, '<p>Toyota Corolla Hybrid - 2022</p>\r\n', 0),
(24, 'Renault taliant', 'img/cars/car-3155326504-.png', 9, '<p>Renault Taliant - 2022</p>\r\n', 0),
(25, 'Volkswagen tiguan', 'img/cars/car-3129525176-.png', 12, '<p>Volkswagen Tiguan - 2022</p>\r\n', 0),
(26, 'Mercedes c serisi', 'img/cars/car-3044122844-.png', 10, '<p>Mercedes C serisi - 2022</p>\r\n', 0),
(27, 'Bmw m4', 'img/cars/car-2350726561-.png', 11, '<p>BMW M4 - 2022</p>\r\n', 0),
(28, 'Volvo v90', 'img/cars/car-2394623220-.png', 8, '<p>Volvo V90 - 2022</p>\r\n', 0),
(29, 'Toyota corolla hatchback', 'img/cars/car-2609823111-.png', 13, '<p>Toyota Corolla Hatchback - 2022</p>\r\n', 0),
(30, 'Renault megane', 'img/cars/car-2482131742-.png', 9, '<p>Renault Megane - 2022</p>\r\n', 0),
(31, 'Volkswagen troc', 'img/cars/car-2537821381-.png', 12, '<p>Volkswagen T-ROC - 2022</p>\r\n', 0),
(32, 'Mercedes cla', 'img/cars/car-2969221116-.png', 10, '<p>Mercedes CLA - 2022</p>\r\n', 0),
(33, 'Bmw m5', 'img/cars/car-3072122824-.png', 11, '<p>BMW M5 - 2022</p>\r\n', 0),
(34, 'Volvo v60', 'img/cars/car-2387930716-.png', 8, '<p>Volvo V60 - 2022</p>\r\n', 0),
(35, 'toyota proace', 'img/cars/car-3184731222-.png', 13, '<p>Toyota Proace - 2022</p>\r\n', 0),
(36, 'renault captur', 'img/cars/car-2803025994-.png', 9, '<p>Renault Captur - 2022</p>\r\n', 0),
(37, 'Volkswagen golf', 'img/cars/car-3023920500-.png', 12, '<p>Volkswagen Golf - 2022</p>\r\n', 0),
(38, 'Mercedes S serisi', 'img/cars/car-2679425310-.png', 10, '<p>Mercedes S serisi - 2022</p>\r\n', 0),
(39, 'ffff', 'img/cars/car-2790826003-.png', 10, '<p>mercedess ffff</p>\r\n', 213123123);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(8, 'Volvo', 'img/categories/cat-2288629558-.png'),
(9, 'Renault', 'img/categories/cat-2870922243-.png'),
(10, 'Mercedes', 'img/categories/cat-2647428314-.png'),
(11, 'BMW', 'img/categories/cat-2448527855-.png'),
(12, 'Volkswagen', 'img/categories/cat-2465322499-.png'),
(13, 'Toyota', 'img/categories/cat-2193922497-.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkinda`
--

CREATE TABLE `hakkinda` (
  `id` int(11) NOT NULL,
  `yazi` text COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hakkinda`
--

INSERT INTO `hakkinda` (`id`, `yazi`) VALUES
(1, '<p>2022 yılında kar amacı g&uuml;tmeden tamamen kullanıcılara y&ouml;nelik oluşturduğumuz oto galeri kuruluşudur.</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `intro`
--

CREATE TABLE `intro` (
  `id` int(11) NOT NULL,
  `yazi` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `intro`
--

INSERT INTO `intro` (`id`, `yazi`, `image`) VALUES
(1, '<p>Otomotiv Sergiliyoruz..</p>\r\n', ''),
(26, '', 'img/intro/intro-629c9d29eb783-.png'),
(27, '', 'img/intro/intro-629c9d2e30e48-.png'),
(28, '', 'img/intro/intro-629c9d3204055-.png'),
(29, '', 'img/intro/intro-629c9d3711a41-.png'),
(30, '', 'img/intro/intro-629c9d3a81034-.png'),
(31, '', 'img/intro/intro-629ca1f50f2a4-.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `login`
--

INSERT INTO `login` (`id`, `name`, `pass`) VALUES
(1, 'furkan', '1234');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `araclar`
--
ALTER TABLE `araclar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkinda`
--
ALTER TABLE `hakkinda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `araclar`
--
ALTER TABLE `araclar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `hakkinda`
--
ALTER TABLE `hakkinda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `intro`
--
ALTER TABLE `intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
