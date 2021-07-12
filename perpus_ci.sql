-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for perpus_ci
CREATE DATABASE IF NOT EXISTS `perpus_ci` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `perpus_ci`;

-- Dumping structure for table perpus_ci.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_ci.admin: 2 rows
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
	(1, 'Nawawi', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
	(2, 'Imam Nawawi', 'imam', '200ceb26807d6bf99fd6f4f0d1ca54d4');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table perpus_ci.anggota
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(5) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(45) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_ci.anggota: 10 rows
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `gender`, `no_telp`, `alamat`, `email`, `password`) VALUES
	(1, 'Irfan Maulana', 'Laki-Laki', '02144445566', 'BSD', 'irfan@gmail.com', '123'),
	(2, 'Nur Kumalasari', 'Perempuan', '02133335555', 'Ciledug', 'nur@gmail.com', '123'),
	(3, 'Sanjaya Wijaya', 'Laki-Laki', '02111115555', 'Cimone', 'sanjaya@gmail.com', '123'),
	(4, 'Eva Irfianingsih', 'Perempuan', '02166665555', 'Tangerang', 'eva@gmail.com', '123'),
	(5, 'Ifqoh Permatasari', 'Perempuan', '02177775555', 'Cengkareng', 'ifqoh@gmail.com', '123'),
	(6, 'Indah Riana', 'Perempuan', '02188885555', 'Fatmawati', 'indah@gmail.com', '123'),
	(7, 'Tiwie Andrawati', 'Perempuan', '02199995555', 'Warung Jati', 'tiwie@gmail.com', '123'),
	(11, 'Imam Nawawi', 'Laki-Laki', '087829398630', 'jl H Isa no 1 Rengas Ciputat Timur', 'imam.imw@bsi.ac.id', '54321'),
	(9, 'Hisbu Utomo', 'Laki-Laki', '02133336666', 'Salemba', 'hisbu@gmail.com', '123'),
	(10, 'Zaenal Abidin', 'Laki-Laki', '02133337777', 'Bekasi', 'Zaenal@gmail.com', '123');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;

-- Dumping structure for table perpus_ci.buku
CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang` varchar(35) NOT NULL,
  `thn_terbit` int(11) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('1','2','3','4','5') NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tgl_input` date NOT NULL,
  `status_buku` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_ci.buku: 2 rows
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul_buku`, `pengarang`, `thn_terbit`, `penerbit`, `isbn`, `jumlah_buku`, `lokasi`, `gambar`, `tgl_input`, `status_buku`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 8, 'Syiar Sastra di Bumi Cenderawasih dalam Novel Tana', 'Borobudur Agency\r\n\r\nArtikel ini tel', 2010, 'Anvil Publishing\r\n\r\nArtikel ini telah tayang di Ko', '123456', 15, '3', '', '0000-00-00', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
	(3, 0, 'Selulosa: Karakteristik dan Pemanfaatannya', 'Sastri Sunarti', 2008, 'Pembinaan Bahasa', '2121212', 0, '1', '', '0000-00-00', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;

-- Dumping structure for table perpus_ci.detail_pinjam
CREATE TABLE IF NOT EXISTS `detail_pinjam` (
  `id_pinjam` int(5) NOT NULL,
  `id_buku` int(5) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `denda` double NOT NULL,
  `status_kembali` enum('0','1') NOT NULL,
  UNIQUE KEY `id_buku` (`id_buku`),
  KEY `id_pinjam` (`id_pinjam`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_ci.detail_pinjam: 1 rows
/*!40000 ALTER TABLE `detail_pinjam` DISABLE KEYS */;
INSERT INTO `detail_pinjam` (`id_pinjam`, `id_buku`, `tgl_pengembalian`, `denda`, `status_kembali`) VALUES
	(6, 3, '0000-00-00', 20000, '0');
/*!40000 ALTER TABLE `detail_pinjam` ENABLE KEYS */;

-- Dumping structure for table perpus_ci.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(45) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_ci.kategori: 2 rows
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deleted_at`) VALUES
	(1, 'Fiksi', NULL),
	(2, 'Ilmiah', NULL);
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table perpus_ci.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_pinjam` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `totaldenda` double NOT NULL DEFAULT '0',
  `status_pinjam` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id_pinjam`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_ci.peminjaman: 1 rows
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id_pinjam`, `tanggal`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `totaldenda`, `status_pinjam`) VALUES
	(6, '2018-07-25 07:53:20', 2, '2018-07-23', '2018-07-25', 0, '0');
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping structure for table perpus_ci.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pencatatan` datetime NOT NULL,
  `id_anggota` int(4) NOT NULL,
  `id_buku` int(4) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` double NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `total_denda` double NOT NULL,
  `status_pengembalian` varchar(15) NOT NULL,
  `status_peminjaman` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_ci.transaksi: ~4 rows (approximately)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id_pinjam`, `tgl_pencatatan`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `denda`, `tgl_pengembalian`, `total_denda`, `status_pengembalian`, `status_peminjaman`) VALUES
	(1, '2018-07-25 08:19:44', 4, 6, '2018-07-16', '2018-07-18', 25000, '2018-07-20', 50000, '1', '1'),
	(3, '2018-07-25 08:35:35', 7, 14, '2018-07-23', '2018-07-27', 100000, '0000-00-00', 0, '0', '0'),
	(4, '2018-07-25 08:41:12', 4, 5, '2018-07-10', '2018-07-13', 100000, '2018-07-13', 0, '1', '1'),
	(5, '2018-07-25 08:41:32', 5, 12, '2018-07-16', '2018-07-19', 100000, '0000-00-00', 0, '0', '0');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
