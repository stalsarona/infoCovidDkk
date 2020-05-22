-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2020 pada 04.16
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `covidreport`
--

CREATE TABLE `covidreport` (
  `ID` int(11) NOT NULL,
  `TGLINPUT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USER_INPUT` varchar(50) DEFAULT NULL,
  `ODP_DWS_SMB` smallint(6) NOT NULL,
  `ODP_DWS_RWT` smallint(6) NOT NULL,
  `ODP_DWS_MNG` smallint(6) NOT NULL,
  `ODP_ANK_SMB` smallint(6) NOT NULL,
  `ODP_ANK_RWT` smallint(6) NOT NULL,
  `ODP_ANK_MNG` smallint(6) NOT NULL,
  `PDP_DWS_SMB` smallint(6) NOT NULL,
  `PDP_DWS_RWT` smallint(6) NOT NULL,
  `PDP_DWS_MNG` smallint(6) NOT NULL,
  `PDP_ANK_SMB` smallint(6) NOT NULL,
  `PDP_ANK_RWT` smallint(6) NOT NULL,
  `PDP_ANK_MNG` smallint(6) NOT NULL,
  `COV_DWS_SMB` smallint(6) NOT NULL,
  `COV_DWS_RWT` smallint(6) NOT NULL,
  `COV_DWS_MNG` smallint(6) NOT NULL,
  `COV_ANK_SMB` smallint(6) NOT NULL,
  `COV_ANK_RWT` smallint(6) NOT NULL,
  `COV_ANK_MNG` smallint(6) NOT NULL,
  `COV_DWS_ISO` smallint(6) NOT NULL,
  `COV_ANK_ISO` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `covidreport`
--

INSERT INTO `covidreport` (`ID`, `TGLINPUT`, `USER_INPUT`, `ODP_DWS_SMB`, `ODP_DWS_RWT`, `ODP_DWS_MNG`, `ODP_ANK_SMB`, `ODP_ANK_RWT`, `ODP_ANK_MNG`, `PDP_DWS_SMB`, `PDP_DWS_RWT`, `PDP_DWS_MNG`, `PDP_ANK_SMB`, `PDP_ANK_RWT`, `PDP_ANK_MNG`, `COV_DWS_SMB`, `COV_DWS_RWT`, `COV_DWS_MNG`, `COV_ANK_SMB`, `COV_ANK_RWT`, `COV_ANK_MNG`, `COV_DWS_ISO`, `COV_ANK_ISO`) VALUES
(1, '2020-05-22 01:07:42', 'Admin', 0, 0, 0, 0, 0, 0, 40, 5, 13, 11, 0, 0, 4, 1, 0, 0, 0, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `covidreport`
--
ALTER TABLE `covidreport`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `covidreport`
--
ALTER TABLE `covidreport`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
