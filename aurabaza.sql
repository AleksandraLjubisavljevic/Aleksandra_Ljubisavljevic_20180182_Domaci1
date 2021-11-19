-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 11:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aurabaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorijeproizvoda`
--

CREATE TABLE `kategorijeproizvoda` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorijeproizvoda`
--

INSERT INTO `kategorijeproizvoda` (`id`, `naziv`) VALUES
(1, 'Make up-TEN'),
(2, 'Make up-OCI'),
(3, 'Make up-USNE'),
(4, 'Nega ruku'),
(5, 'Nega kose'),
(6, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `korisnickoIme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `korisnickoIme`, `lozinka`) VALUES
(1, 'aleksandralj', 'aleksandralj');

-- --------------------------------------------------------

--
-- Table structure for table `ocene`
--

CREATE TABLE `ocene` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brojGlasova` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ocene`
--

INSERT INTO `ocene` (`id`, `naziv`, `brojGlasova`) VALUES
(1, 'Odlicno', 48),
(2, 'Vrlo dobro', 10),
(5, 'Dobro', 3),
(6, 'Nisam zadovoljan/na', 1),
(9, 'Uzasno', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` double NOT NULL,
  `kategorija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id`, `naziv`, `slika`, `cena`, `kategorija`) VALUES
(0, 'Aura karmin', 'img/karmin.jpg', 350, 3),
(1, 'Aura all year bronze', 'img/auraBronzer.jpg', 950, 1),
(2, 'Aura paleta za konturisanje', 'img/auraKonture.jpg', 795, 1),
(4, 'Aura senke', 'img/auraSenke.jpg', 999, 2),
(5, 'Divine eyes', 'img/auraDivine.jpg', 399, 2),
(6, 'Aura senka u olovci', 'img/auraSenkaUOlovci.jpg', 449, 2),
(7, 'Puder', 'img/auraPuder.jpg', 999, 1),
(8, 'Cetke 3u1', 'img/auraCetkice.jpg', 899, 6),
(9, 'Bronzer contour brush', 'img/auraCetkica.jpg', 505, 6),
(10, 'Hair Color Forever Blonde', 'img/auraForeverBlonde.jpg', 359, 5),
(11, 'Hair Color Explicit', 'img/auraCrnaKosa.jpg', 359, 5),
(12, 'Amazingly resistant', 'img/auraLak.jpg', 319, 4),
(13, 'Like a pro', 'img/auraLak1.jpg', 279, 4),
(14, 'Star gloss', 'img/auraSjaj.jpg', 299, 3),
(15, 'Olovka za usne', 'img/auraOlovka.jpg', 294, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
