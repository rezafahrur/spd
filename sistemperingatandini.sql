-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2016 pada 15.04
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `sistemperingatandini`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontraktidakperpanjang`
--

CREATE TABLE IF NOT EXISTS `kontraktidakperpanjang` (
  `nrp` int(30) NOT NULL,
  `Nama` varchar(60) NOT NULL,
  `Enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `liburnasional`
--

CREATE TABLE IF NOT EXISTS `liburnasional` (
  `id_libur` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_libur` date NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_libur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `liburnasional`
--

INSERT INTO `liburnasional` (`id_libur`, `tanggal_libur`, `keterangan`) VALUES
(1, '2016-12-25', 'Libur Natal'),
(2, '2016-12-26', 'Cuti Bersama Natal'),
(3, '2017-01-01', 'Libur Tahun Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaperingatan`
--

CREATE TABLE IF NOT EXISTS `penerimaperingatan` (
  `idPenerimaPeringatan` int(30) NOT NULL AUTO_INCREMENT,
  `NamaPenerimaPeringatan` varchar(50) NOT NULL,
  `EmailPenerimaPeringatan` varchar(50) NOT NULL,
  `PeringatanKontrak` int(3) NOT NULL,
  `PeringatanJamKeluar` int(3) NOT NULL,
  PRIMARY KEY (`idPenerimaPeringatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `penerimaperingatan`
--

INSERT INTO `penerimaperingatan` (`idPenerimaPeringatan`, `NamaPenerimaPeringatan`, `EmailPenerimaPeringatan`, `PeringatanKontrak`, `PeringatanJamKeluar`) VALUES
(13, 'Reza Fahrur R', 'garudareza24@gmail.com', 1, 1),
(14, 'Fahrur', 'rezafahrurrasyid@gmail.com', 1, 0),
(15, 'Rasyid', 'rezafahrurrasyid@yahoo.com', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `idPengguna` int(30) NOT NULL AUTO_INCREMENT,
  `NamaPengguna` varchar(60) NOT NULL,
  `Username` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `nrp` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `HakAkses` varchar(60) NOT NULL,
  PRIMARY KEY (`idPengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `NamaPengguna`, `Username`, `Password`, `nrp`, `Email`, `HakAkses`) VALUES
(44, 'Reza', 'adminn', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1234567', 'garudareza24@gmail.com', 'Manager HRD'),
(46, 'Fahrur', '123789', 'd8578edf8458ce06fbc5bb76a58c5ca4', '123789', 'rezafahrurrasyid@gmail.com', 'Staff HRD');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
