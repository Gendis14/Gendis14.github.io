-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2024 pada 06.43
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasweb2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `nim` int(15) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `tahun` int(9) NOT NULL,
  `semester` int(6) NOT NULL,
  `kelas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs2`
--

CREATE TABLE `krs2` (
  `kode_mk` int(100) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` int(100) NOT NULL,
  `kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `krs2`
--

INSERT INTO `krs2` (`kode_mk`, `nama_mk`, `sks`, `kelas`) VALUES
(41010001, 'Logika dan Algoritma', 3, 'A'),
(41010002, 'Agama', 2, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Aktif','Pasif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `password`, `status`) VALUES
(1222, 'gendis', '$2y$10$IfzW7dTFlLVG4.A2VIEFQeXxbvxH1M/pDpd.ASzgZqKupjCBpRLv6', 'Aktif'),
(171235120, 'Surti', '$2y$10$50.2REhdDoBP.J/a/FMQUu3U7OzCJxATO7ZVDKKKIK3C6MMzMABlO', 'Aktif'),
(171235121, 'Jaenudin', '$2y$10$jlWw5ISwla0GmE2FgzEsF.Or0BXPDgwltAgm0KC8BrXPMBb0mo5ye', 'Aktif'),
(171235122, 'Tejo', '$2y$10$Xlp77wSVfHXTsTkZJWrfQeYmhoqByCbHPHXY3BTlHRGU4URewuyMC', 'Pasif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mk` int(10) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `semester`, `sks`) VALUES
(41010001, 'Logika dan Algoritma', 1, 3),
(41010002, 'Agama', 1, 2),
(41010003, 'Bahasa Inggris', 1, 2),
(41010004, 'Bahasa pemrograman', 2, 3),
(41010005, 'pemrograman web', 3, 3),
(41010006, 'pemrograman web Lanjut', 5, 3),
(41010007, 'Testing Implementasi', 5, 2),
(41010008, 'Pemrograman Basis Data', 4, 3),
(41010009, 'Rekayasa Perangkat Lunak', 4, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `tahun` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`tahun`, `semester`, `status`) VALUES
('2017/2018', 'Ganjil', 'Pasif'),
('2017/2018', 'Genap', 'Pasif'),
('2018/2019', 'Ganjil', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `krs2`
--
ALTER TABLE `krs2`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `krs2`
--
ALTER TABLE `krs2`
  MODIFY `kode_mk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41010003;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `kode_mk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41010010;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
