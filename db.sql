-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for litbang
CREATE DATABASE IF NOT EXISTS `litbang` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `litbang`;

-- Dumping structure for table litbang.fisik_arsip
CREATE TABLE IF NOT EXISTS `fisik_arsip` (
  `id_arsip` int(11) NOT NULL AUTO_INCREMENT,
  `kode_arsip` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nomor_surat` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal_surat` text COLLATE latin1_general_ci NOT NULL,
  `ruang_simpan` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `kode_lemari` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `kode_ordner` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `kode_guide` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_arsip`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table litbang.fisik_arsip: 1 rows
/*!40000 ALTER TABLE `fisik_arsip` DISABLE KEYS */;
INSERT INTO `fisik_arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `tgl_surat`, `perihal_surat`, `ruang_simpan`, `kode_lemari`, `kode_ordner`, `kode_guide`) VALUES
	(5, '1', 'jj/78/2021', '2021-07-14', 'keter', 'lantai', '4', '1', '5');
/*!40000 ALTER TABLE `fisik_arsip` ENABLE KEYS */;

-- Dumping structure for table litbang.kode_arsip
CREATE TABLE IF NOT EXISTS `kode_arsip` (
  `id_kode` int(11) NOT NULL AUTO_INCREMENT,
  `kode_arsip` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kode`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table litbang.kode_arsip: 1 rows
/*!40000 ALTER TABLE `kode_arsip` DISABLE KEYS */;
INSERT INTO `kode_arsip` (`id_kode`, `kode_arsip`, `keterangan`) VALUES
	(1, '001-ARSIP1', 'Kerja Sama');
/*!40000 ALTER TABLE `kode_arsip` ENABLE KEYS */;

-- Dumping structure for table litbang.pinjam_arsip
CREATE TABLE IF NOT EXISTS `pinjam_arsip` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `kode_arsip` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `no_surat` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `nama_peminjam` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `keperluan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_pengembalian` int(11) NOT NULL DEFAULT 0,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table litbang.pinjam_arsip: 1 rows
/*!40000 ALTER TABLE `pinjam_arsip` DISABLE KEYS */;
INSERT INTO `pinjam_arsip` (`id_pinjam`, `kode_arsip`, `no_surat`, `nama_peminjam`, `keperluan`, `tgl_pinjam`, `tgl_kembali`, `status_pengembalian`, `keterangan`) VALUES
	(6, '1', '7', 'Ammar', 'Iseeng', '2021-07-31', '2021-07-20', 2, 'Astaga');
/*!40000 ALTER TABLE `pinjam_arsip` ENABLE KEYS */;

-- Dumping structure for table litbang.ref_guide
CREATE TABLE IF NOT EXISTS `ref_guide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_guide` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table litbang.ref_guide: ~11 rows (approximately)
/*!40000 ALTER TABLE `ref_guide` DISABLE KEYS */;
INSERT INTO `ref_guide` (`id`, `kode_guide`) VALUES
	(1, 'Januari'),
	(2, 'Februari'),
	(3, 'Maret'),
	(4, 'April'),
	(5, 'Mei'),
	(6, 'Juni'),
	(7, 'Juli'),
	(8, 'Agustus'),
	(9, 'September'),
	(10, 'Oktober'),
	(11, 'November'),
	(12, 'Desember');
/*!40000 ALTER TABLE `ref_guide` ENABLE KEYS */;

-- Dumping structure for table litbang.ref_lemari
CREATE TABLE IF NOT EXISTS `ref_lemari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_lemari` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table litbang.ref_lemari: ~1 rows (approximately)
/*!40000 ALTER TABLE `ref_lemari` DISABLE KEYS */;
INSERT INTO `ref_lemari` (`id`, `kode_lemari`) VALUES
	(2, '001'),
	(4, 'LM-07');
/*!40000 ALTER TABLE `ref_lemari` ENABLE KEYS */;

-- Dumping structure for table litbang.ref_ordner
CREATE TABLE IF NOT EXISTS `ref_ordner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ordner` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table litbang.ref_ordner: ~2 rows (approximately)
/*!40000 ALTER TABLE `ref_ordner` DISABLE KEYS */;
INSERT INTO `ref_ordner` (`id`, `kode_ordner`) VALUES
	(1, 'O-001'),
	(5, 'O-003');
/*!40000 ALTER TABLE `ref_ordner` ENABLE KEYS */;

-- Dumping structure for table litbang.ref_ruangan
CREATE TABLE IF NOT EXISTS `ref_ruangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table litbang.ref_ruangan: ~0 rows (approximately)
/*!40000 ALTER TABLE `ref_ruangan` DISABLE KEYS */;
INSERT INTO `ref_ruangan` (`id`, `kode`, `nama`) VALUES
	(2, 'PS', 'Persuratan');
/*!40000 ALTER TABLE `ref_ruangan` ENABLE KEYS */;

-- Dumping structure for table litbang.riwayat_pinjam_arsip
CREATE TABLE IF NOT EXISTS `riwayat_pinjam_arsip` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `kode_arsip` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `no_surat` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `nama_peminjam` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `keperluan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_pengembalian` int(11) NOT NULL DEFAULT 0,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table litbang.riwayat_pinjam_arsip: 5 rows
/*!40000 ALTER TABLE `riwayat_pinjam_arsip` DISABLE KEYS */;
INSERT INTO `riwayat_pinjam_arsip` (`id_pinjam`, `kode_arsip`, `no_surat`, `nama_peminjam`, `keperluan`, `tgl_pinjam`, `tgl_kembali`, `status_pengembalian`, `keterangan`) VALUES
	(1, '', '', 'Amru', 'Tes', '2021-07-19', '2021-07-19', 0, ''),
	(2, '1', '3', 'Amru Fauzi ', 'Tess 123', '2021-07-12', '2021-07-30', 3, 'Asik Hilang'),
	(4, '1', '3', 'Ammar', 'Makan Makan', '2021-07-13', '2021-07-13', 3, 'Astaga'),
	(3, '1', '3', 'Amru', 'Tess', '2021-07-19', '2021-07-23', 1, 'Mantap'),
	(5, '1', '3', 'Ikki', 'Nda tau', '2021-07-19', '2021-07-28', 1, 'Mantap');
/*!40000 ALTER TABLE `riwayat_pinjam_arsip` ENABLE KEYS */;

-- Dumping structure for table litbang.skeluar
CREATE TABLE IF NOT EXISTS `skeluar` (
  `id_surat` int(6) NOT NULL AUTO_INCREMENT,
  `kode_arsip` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `nomor_surat` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `tujuan_surat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `isi_perihal` text COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pdf_file` text COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table litbang.skeluar: 1 rows
/*!40000 ALTER TABLE `skeluar` DISABLE KEYS */;
INSERT INTO `skeluar` (`id_surat`, `kode_arsip`, `nomor_surat`, `tujuan_surat`, `tgl_surat`, `isi_perihal`, `keterangan`, `pdf_file`) VALUES
	(8, 'PS/LM-07/O-001(6.2/4)/1', '22/ATIM/III/2021', 'Dipa', '2021-07-28', 'Undangan Makan', 'Tess', 'assets/pdf/surat-keluar/file-2021-07-28 17-00-29-surat-keluar.pdf');
/*!40000 ALTER TABLE `skeluar` ENABLE KEYS */;

-- Dumping structure for table litbang.smasuk
CREATE TABLE IF NOT EXISTS `smasuk` (
  `id_surat` int(6) NOT NULL AUTO_INCREMENT,
  `no_urut` int(11) NOT NULL,
  `kode_arsip` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `asal_surat` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `isi_surat` text COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `file_disposisi` text COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `file_surat` text COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table litbang.smasuk: 2 rows
/*!40000 ALTER TABLE `smasuk` DISABLE KEYS */;
INSERT INTO `smasuk` (`id_surat`, `no_urut`, `kode_arsip`, `asal_surat`, `tgl_surat`, `no_surat`, `isi_surat`, `keterangan`, `file_disposisi`, `file_surat`) VALUES
	(8, 2, 'PS/001/O-001(10.4/4)/2', 'Makassar', '2021-07-28', '230/VR/SA', 'Tes1', 'Mantap', 'assets/pdf/disposisi/file-2021-07-28 16-28-43-disposisi.pdf', 'assets/pdf/surat/file-2021-07-28 16-28-43-surat.pdf'),
	(7, 1, 'PS/001/O-001(1.1/4)/1', 'Makassar', '2021-07-28', '00/V/2/DDDD', 'Tes1', 'Astaga', 'assets/pdf/disposisi/file-2021-07-28 16-21-58-disposisi.pdf', 'assets/pdf/surat/file-2021-07-28 16-21-58-surat.pdf');
/*!40000 ALTER TABLE `smasuk` ENABLE KEYS */;

-- Dumping structure for table litbang.tb_hitung
CREATE TABLE IF NOT EXISTS `tb_hitung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smasuk` int(11) DEFAULT NULL,
  `skeluar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table litbang.tb_hitung: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_hitung` DISABLE KEYS */;
INSERT INTO `tb_hitung` (`id`, `smasuk`, `skeluar`) VALUES
	(1, 2, 1);
/*!40000 ALTER TABLE `tb_hitung` ENABLE KEYS */;

-- Dumping structure for table litbang.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table litbang.tb_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id`, `nama`, `username`, `password`, `email`, `status`) VALUES
	(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 2),
	(3, 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 1),
	(4, 'User1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'ss', 1);
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;

-- Dumping structure for trigger litbang.xttrg_riwayat_pinjam
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `xttrg_riwayat_pinjam` BEFORE DELETE ON `pinjam_arsip` FOR EACH ROW BEGIN
  INSERT INTO riwayat_pinjam_arsip
  SELECT * FROM pinjam_arsip WHERE id_pinjam = OLD.id_pinjam;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
