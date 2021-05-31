CREATE DATABASE web;
use web;

CREATE TABLE `pem_web` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pem_web` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'elias', '123', 'Elias'),
(2, 'john', 'abc', 'John');

ALTER TABLE `pem_web`
  ADD PRIMARY KEY (`id`);
  
 ALTER TABLE `pem_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3
COMMIT;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2021 at 02:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `tbadmin_3193111030` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbadmin_3193111030` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Bagas', 'Bagas9', '522747c269f671321621147a27a1828f');


CREATE TABLE `tbberita_3193111030` (
  `id_berita` varchar(15) NOT NULL,
  `judul_berita` varchar(500) NOT NULL,
  `user_berita` varchar(100) NOT NULL,
  `tanggal_berita` date NOT NULL,
  `isi_berita` text NOT NULL,
  `foto_berita` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbberita_3193111030` (`id_berita`, `judul_berita`, `user_berita`, `tanggal_berita`, `isi_berita`, `foto_berita`) VALUES
('1', 'Gatau', 'Gatau', '2021-01-02', '<p>gatau</p>\r\n', '1085421594_uty.png');


CREATE TABLE `tbkaryawan_3193111030` (
  `nik` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbkaryawan_3193111030` (`nik`, `nama`, `hp`, `email`, `alamat`) VALUES
(1, 'Bagas', '089997654321', 'bagas@gmail.com', 'Jakarta'),
(2, 'Golan', '087777779', 'golan@gmail.com', 'Yogyakarta'),
(3, 'Almar', '08777777911', 'almar@gmail', 'bandung');


CREATE TABLE `tbkategori_3193111030` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbkategori_3193111030` (`id_kategori`, `nama_kategori`) VALUES
(1, 'UMKM Kuliner'),
(2, 'UMKM Digital'),
(3, 'UMKM Agrobisnis');

DROP table tbprofil_3193111030;
CREATE TABLE `tbprofil_3193111030` (
  `id_profil` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbprofil_3193111030` (`id_profil`, `foto`, `profil`) VALUES
(1, '3193111030.jpg', '<p>Namanya adalah saya</p>\r\n');

CREATE TABLE `tbumkm_3193111030` (
  `id_umkm` varchar(11) NOT NULL,
  `nama_umkm` varchar(155) NOT NULL,
  `kategori_umkm` varchar(20) NOT NULL,
  `lokasi_umkm` varchar(200) NOT NULL,
  `latitude` varchar(500) NOT NULL,
  `longitude` varchar(500) NOT NULL,
  `foto_umkm` varchar(150) NOT NULL,
  `deskripsi_umkm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbumkm_3193111030` (`id_umkm`, `nama_umkm`, `kategori_umkm`, `lokasi_umkm`, `latitude`, `longitude`, `foto_umkm`, `deskripsi_umkm`) VALUES
('UMKM01', 'Bubur Ayam', '1', 'Yogyakarta', '-7.80558', '110.39688', 'Gembira-Loka-Zoo.jpg', '<p>Rasanya Mantap</p>\r\n'),
('UMKM02', 'Desain Website', '2', 'Bantul', '-8.02699', '110.33512', 'parangtritis.jpeg', '<p>Tampilan dijamin keren</p>\r\n'),
('UMKM03', 'Paha Domba Organik', '3', 'Yogyakarta', '-7.80995', '110.35887', 'tamansari.jpeg', '<p>Pokoknya enak</p>\r\n');


ALTER TABLE `tbadmin_3193111030`
  ADD PRIMARY KEY (`id_admin`);

ALTER TABLE `tbberita_3193111030`
  ADD PRIMARY KEY (`id_berita`);

ALTER TABLE `tbkaryawan_3193111030`
  ADD PRIMARY KEY (`nik`);

ALTER TABLE `tbkategori_3193111030`
  ADD PRIMARY KEY (`id_kategori`);

ALTER TABLE `tbprofil_3193111030`
  ADD PRIMARY KEY (`id_profil`);

ALTER TABLE `tbumkm_3193111030`
  ADD PRIMARY KEY (`id_umkm`);


ALTER TABLE `tbadmin_3193111030`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `tbkaryawan_3193111030`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `tbkategori_3193111030`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `tbprofil_3193111030`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

