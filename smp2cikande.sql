-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2014 at 04:38 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smp2cikande`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(5) NOT NULL AUTO_INCREMENT,
  `tema_agenda` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `tempat` varchar(150) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `keterangan` tinytext NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tema_agenda`, `isi`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `tempat`, `jam`, `keterangan`) VALUES
(1, 'Pembagian Raport', 'Berakhirnya semester ganjil tahun pelajaran 2010-2011, ditandai dengan pembagian laporan hasil belajar.', '2014-01-25', '2014-01-25', '2014-01-25', 'SMP Negeri 2 Cikande', '07.30 WIB - 12.00 WIB', 'Untuk kelas XI dan XII, pembagian raport dimulai pukul 07.30 WIB.  Sedangkan untuk kelas X pada pukul 09.00 WIB. Raport diambil oleh orang  tua/wali murid masing-masing.');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(3) NOT NULL AUTO_INCREMENT,
  `judul_berita` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `author` int(10) NOT NULL,
  `counter` int(3) NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `isi`, `gambar`, `tanggal`, `waktu`, `author`, `counter`) VALUES
(50, 'Penerimaan Beasiswa TA 2013/2014', '<p>Info beasiswa tahun 2014 telah beredar, untuk yang menginginkan beasiswa tersebut harap menghubungi wali kelas masing-masing.</p>', 'BEASISWA.jpg', '2013-06-17', '07:38:00', 4247, 1),
(52, 'Mirko Vucinic Tak Menolak Peluang Gabung Arsenal', '<p><span style="color: #ff0000;"><span style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff; display: inline !important; float: none;">Striker Mirko Vucinic tak menolak kemungkinan memperkuat Arsenal di bursa transfer musim dingin ini.</span><br style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;" /><br style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;" /><span style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff; display: inline !important; float: none;">Penyerang milik Juventus ini telah dikaitkan dengan<span class="Apple-converted-space">&nbsp;</span></span><em style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;">The Gunners</em><span style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>setelah episode barternya dengan gelandang FC Internazionale Fredy Guarin baru-baru ini kolaps.</span><br style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;" /><br style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;" /><span style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff; display: inline !important; float: none;">Menurut<span class="Apple-converted-space">&nbsp;</span></span><em style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;">Gazzetta dello Sport</em><span style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff; display: inline !important; float: none;">, pemain 30 tahun ini berharap kepindahannya ke Giuseppe Meazza masih bisa terwujud, tapi dia juga tak menolak peluang menjajal karier di kompetisi Liga Primer Inggris.</span><br style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;" /><br style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;" /><span style="color: #081f2c; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20.736000061035156px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff; display: inline !important; float: none;">Vucinic mendapati dirinya jadi pemain nomor dua setelah jawara Italia itu mendatangkan Carlos Tevez dan Fernando Llorente pda musim panas lalu.</span></span></p>', '357215_heroa.jpg', '2013-06-21', '04:37:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `data_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id_data`),
  KEY `data_id` (`data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `content`, `data_id`) VALUES
(1, '<p><span style="font-size: small;"><strong>Visi Sekolah</strong></span><br /><br /></p>\r\n<p><span style="font-size: small;">&ldquo;Unggul dalam prestasi berdasarkan IMTAQ berbudaya dan berwawasan global&rdquo; </span></p>\r\n<p><br /><br /> <span style="font-size: small;"><strong>Misi Sekolah</strong></span><strong>&nbsp;</strong><strong></strong></p>\r\n<ul>\r\n<li><span style="font-size: small;">Meningkatkan wawasan pengetahuan keagamaan yang didasari keimanan dan ketaqwaan terhadap Tuhan Yang Maha Esa</span></li>\r\n</ul>\r\n<ol> </ol>\r\n<ul>\r\n<li><span style="font-size: small;">Unggul dalam perolehan nilai Ujian</span></li>\r\n</ul>\r\n<ol> </ol>\r\n<ul>\r\n<li><span style="font-size: small;">Mewujudkan pemahaman penghayatan dan pengamalan IMTAQ</span></li>\r\n</ul>\r\n<ol> </ol>\r\n<ul>\r\n<li><span style="font-size: small;">Berbudi pekerti luhur berdasarkan budaya nasional</span></li>\r\n</ul>\r\n<ul>\r\n<li><span style="font-size: small;">Pembelajaran mengarah berbasis &nbsp;ICT</span></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: medium;"><strong>Tujuan</strong></span></p>\r\n<ol> </ol>\r\n<ul>\r\n<li><span style="font-size: small;">Meningkatkan pengalaman ajaran agama yang dianut dengan benar </span></li>\r\n</ul>\r\n<ol> </ol>\r\n<ul>\r\n<li><span style="font-size: small;">Mempertahankan presentase kenaikan dan kelulusan mencapai 100%</span></li>\r\n</ul>\r\n<ol> </ol>\r\n<ul>\r\n<li><span style="font-size: small;">Melaksanakan tata tertib sekolah sesuai dengan ketentuan yang berlaku bagi seluruh warga sekolah</span></li>\r\n</ul>\r\n<ol> </ol>\r\n<ul>\r\n<li><span style="font-size: small;">Melahirkan generasi yang berprestasi</span></li>\r\n</ul>\r\n<ol> </ol>\r\n<ul>\r\n<li><span style="font-size: small;">Membekali siswa dengan teknologi informasi</span></li>\r\n</ul>\r\n<ol> </ol>', '1.2'),
(3, '211', 'counter'),
(4, '<p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAu4AAAI6CAIAAAD30FqkAAAgAElEQVR4nO3df2wc533n8WlayZatlRnZK8n0WqZFiqLDkJVDOjZlkRXNk6keeTKdiEeJqCW5ktzGjsu1bBdxpDu7hYW4VdzQqmu1yp2TKxEph0ZGheZOOKM5CWkNpICvcXBXpBZwEIIacdugSNOkcHsIwPvju3z24TMzuzva3XmeZ/b9wgNBuzs7O7vPPM98+MyvYBFI3dxTz3zs49solHD593t/yfbqCcAzge0FQCtat6HQPvLkxgePUyhGCQI6JQDJ0GvAgnUbCp2feKVn/1kKxShEGQBJ0WvAAqIMJa4QZQAkRa8BC4gylLhClAGQFL0GLCDKUOIKUQZAUvQasIAoQ4krRBkASdFrwAKiDCWuEGUAJEWvAQuIMpS4QpQBkBS9BiwgylDiClEGQFL0GrCAKEOJK0QZAEnRa8ACogwlrhBlACRFrwELUosym6Ze7pg4oT/TNf3apqmX1cPu2df1h6qod4Vf1Z+R+XdNvxY5h/BL3bOvd8++Hp7tpqmXN0293D37urwr7rvIe8OfYiyPXuRDw/OUZ+KmDy9eCpXVQ5QBcE3oNWBBalFm1botK9ds0PPEqnVbVq3boh7mNt6zcs2G8BtXrtkgm3Z9YkkA6hmZlZS1vZPGZEEQ6BNISsjfPZO/e0beq+JF+/bH5ePyd8+sXLNh1botslS5jfcYi9TWtUOPFzKxfMf27Y+r76s+VOaQv3smCAKZQMra3kn51nHT6z9a+EcgygBwCr0GLEgzyuQ23rP+3oPysGv6Ndlyq4cywcYHjyeNMuvvPagHi5VrNuhDFx0TJ/SE1L79cXlXOMrIS5Ib8nfP6B/X1rVDfUT79sfbunbo88xtvEelE/Vxq9ZtkfnrJX/3TG7jPXowkgRTYXoVa4gyANxHrwEL0owyKkZI/ljbO6keSrDY+OBxY/yjliijR5Ce0C4YI8qoGRpRRl+2cJSR4KWCy8YHj6/tnVSxTA86agHiookahpEpVSqKm17Sj3wWUQaA4+g1YEGaUUa2xJI5Vq3bsvHB4/oeInne2AlVS5TpWdoRI/t9jHGdcJSRJdGjjMQLPY4YUUYWo2dp9EhSiDFsI4NMa3sn1RfUdxjJzOVD27p2yCjO2t7JwujTkTuY9OklSHVNv0aUAeA4eg1YkHKUkcGMrunX2rp2qA3zxgePr1yzQTbb8p+kUUbKpqmXZQ56mqklyqxat6V79vVV67aogZa4KCPPq0UNxyZ9lGVt76Q6hleGaozBJ/m36vQ9+8+uv/dgbuM9RBkAjqPXgAUpRxkZ1ZDNudowt3XtWH/vQdmEy4G33bOvq1Qhx75UiDLGSIza/MdFGRnhCB8rI0fvqgyhf5waQFq1bkth9GlZ1LW9k3oiMb5phR1Gaj5yhHLVHUzy/9zGe9q6dhBlALiMXgMWpBxlerQTl1QWCY+aSKCRXSryqkysD1oYx8pImpH9PuFRGfXGtq4dEiAiz2Baf+9BdVCw+jjJMYXRp/U9YnoqkmNlZL9SYfRpFXr0URbjtCk5TkhiU+SojDF9T+hAaaIMAAfRa8CC1KJMW9cO2XLLAb89Swe9bnzwuH6QippAAopkCJVR9ENJ5O3yFplYtvQyvSrGG9WpRuvvPSgDP2rB1HLKS/p50ZKN8nfPqLEiNbF8nEQfOW1b5iYjKHrZNPWy+tBNUy+rsRz5T+Xp1dc0fiuiDACn0GvAAq72S4krRBkASdFrwAKiDCWuEGUAJEWvAQuIMpS4QpQBkBS9BiwgylDiClEGQFL0GrAgHGW6Z1+XE2fkBGl1SKycSiOvGtdTyd890z37+sYHj8sb27c/rt++UX+j8S71/40PHtePbzUe6udm60U+US5UE14e/aGUyPtNhg/mXX/vQXWcrz6f9fcelK9ZYdnCX8SYiVz8RuZm/CCF0acrzEqml2+h35NSlqow+rRxvPP6ew+qulPfKPLhxgePh+8XQZQBcA3oNWBBOMrI2cuy1ZTL4MpZP+qk6CAI9CuptG9/PAgCdQtGdUFbdY0W/Y36xls/B1vdikjFiyAI1PY18tJwch6TWki12VYX3NM/SP86xmZbLhOsHso5z/J2OYtb/0T5mvrCGMsW/iIr12zQE4l+DT3jdlHGudbGrORcKvki6oR2tVRyURwV1Izzxo07YhrXsDGuxEOUAXDN6DVgQVyU0YcK9Ku/yJbbuJmiuquRvvlc2zupAoH+RrXx1m9FJLlEnSktNx5ScwtHGUlLepxSD+XmjsaGvMJmWzbzKt/IadjXFmUiv4hxXbtV2v0j1UVuerSTxuNmZeQPiXE92nVx5EfTF1V9I7mMjQo6RBkATUKvAQuuLcoYm9jIbXxklFFz0xOGzE2/q5EaRJEtfTjKGCFDFXWPJD2d6F9HX3L1qp6E5FJ1VaOMupCdHpvivoiKEXIfShVl9F9DPrTCrIz8oV+AWC2k3HtBLb96smv6NXU5n57Q5fiM6YkyAK4ZvQYsiIwyQRCoC7WtXLNBDsLQE4m6i1D79sdlGEPtYNLfqO4Q2bP8PgN6xDH+Y9x7SD6r9iijNtjt2x9XQxQy7iLDPMY+HXm1e/Z1dbdItROnQpTRv6Y+lBL3RdRttOXOUyrKyPdSd9LWv2Z4VkaUURPrUUZ2M+m/lQpD+s29Vy2/dWX4vldEGQDXhl4DFsSNyuiXz9c3rsbdBiQuRA5XxL1RcoPaoss9CiRqqNtTqzAhYw+Rdwwwooy6H7UcUxLOUj3LB5mMxZNRHDketmqUidzBVOGLqDxh3D+yY+KEZK9NUy/LMEmFWdUyKqPCn3ooh+aoWcmIFDuYADQJvQYsqLqDKS6RyF6JcJSp+kaVJ1SGUKfeqJEDfeMqx3kYc1ZDO/oMjcSjjkQJH9UbXjy5f8KqpRsw6WNC+pRy/lFklKn8RSQ9yNiMHmV6lg6a0e8qFTmrqsfK6HlLX2Z1/pTaF0aUAdAk9Bqw4JqjjOzLUH/lJ4oyarQgHCxyG+9RZx3rm2djzjK0I2cmyxhGYfRpuX2SmkaWsEc7g0mWUPKNnMPcs3xXjjEmVBh9Wr6jEXTCUabqF1l/70FjlEhlDnWAc+VZrdLOYNIPJa4QZfS9bHoaI8oAaBJ6DVgQd12Z8IZNXR5GxQU1WeQFVyq8UT0vd0zUn9z44HGJDvpwSHgy9bmydVcHpuhXcFHPqByT166Io6KM/i1kPvqny4G6EibUM+HrylT9IuHfTS3AxgePyxhM5VmpYJS/e0Y/clnNJ/xQ7uZt/GJqP5o+f64rA6Ah6DVgAVf7pcQVogyApOg1YAFRhhJXiDIAkqLXgAVEGUpcIcoASIpeAxYQZShxhSgDICl6DVjgaZRZf+/BuEOM9RsayIk/UsK3jTQmNk7w1j+ia/o1OWlo1botxsWCw5+oP9w09bL+0K9ClAGQFL0GLPA0ysSdP6xfGa9n6cRpddW+tq4derAwJjauBaxfpk9OyZaZqNO54z5Rv39k5I0wfSlEGQBJ0WvAgixFGbmdgv5S+Bow6pIt4Ykloxi3T+pZulmSmkn37OsqD0V+orpkTg9RBkCLodeABVmKMnLzAXVHyZ6KozLhiWVKtZtJv31B3GJEfqLsyZJr0xFlALQUeg1YkKUoo98uUa75pt/60bhpYnhiiTJyHWG5QYFcTVhNKdfJlSL7oSI/UT5FrqpHlAHQUug1YEFmoozcGUDdAVsGRfQdTG1dO9RV/CMnVpf8lzs6RY7KyOiO3GYy7hPlXXL/gfDdKz0qRBkASdFrwILMRBk1UiJFjlYxjpVZtW6LHJAbObF+9yI53kU+wjhYWN3ZO+4T9TshyJiQ9Z/r2gpRBkBS9BqwwN8oo/YcSUAxjmiR22IbUUbORVK3mTQm1qOMul2lPMxtvGflmg1reycl4qztnYybiZGx1K0ifSxEGQBJ0WvAAk+jTPfs6+pgXjnARR8gkQk2Tb0cfj7ySXnGeLJr+jX9No2bpl6W20PKqUkVPtG4paUxmUeFKAMgKXoNWOBplKGkUIgyAJKi14AFRBlKXCHKAEiKXgMWEGUocYUoAyApeg1YQJShxBWiDICk6DVgAVGGEleIMgCSoteABUQZSlwhygBIil4DFhBlKHGFKAMgKXoNWECUocQVogyApOg1YAFRhhJXiDIAkqLXgAVEGUpcIcoASIpeAxYQZShxhSgDICl6DVhAlKHEFaIMgKToNWABUYYSV4gyAJKi14AFG+/sym/8yIZNP0/ZsOnnc2tvXX9nv/XFcKSsWHmd7dUTgGeIMrDg6tWrl7Bkw4YN586ds70Urvjud79re/UE4BmiDGBZR0fH1atXbS8FAPiKKANYRpQBgHoQZQDLiDIAUA+iDGAZUQYA6kGUASwjygBAPYgygGVEGQCoB1EGsIwoAwD1IMoAlhFlAKAeRBnAMqIMANSDKANYRpQBgHoQZQDLaokyZ/7kr/7l//00lcUBAM8QZQDLaokyY0cvvPeDn6SyOADgGaIMYBlRBgDqQZQBLCPKAEA9iDKAZUQZAKgHUQawjCgDAPUgygCWEWUAoB5EGcAyogwA1IMoA1hGlAGAehBlAMuIMgBQD6IMYBlRBgDqQZQBLCPKAEA9iDKAZUQZAKgHUQawjCgDAPUgygCWEWUAoB5EGcAyogwA1IMoA1hGlAGAehBlAMuIMgBQD6IMYBlRBgDqQZQBLCPKAEA9iDKAZUQZAKgHUQawjCgDAPUgygCWEWUAoB5EGcAyogwA1IMoA1hGlAGAehBlAMuIMgBQD6IMYBlRBgDqQZQBLCPKAEA9iDKAZUQZAKgHUQawjCgDAPUgygCWEWUAoB5EGcAyogwA1IMoA1hGlAGAehBlAMuIMgBQD6IMYBlRBgDqQZQBLCPKAEA9iDKAZUQZAKgHUQawjCgDAPUgygCWEWUAoB5EGcAyogwA1IMoA1hGlAGAehBlAMuIMgBQD6IMvPHrTz89MjRUf/lId/f2e+9tyKwaUm5Yteq+wcHK0/Tu+/37R8bTWZ7dExMffPCB7doGgFoRZeCNjbfd9oVDBxeeerLOsuaGG/7DzJ7659Oo8gePP1Z1mnsPfunVuWfSWZ51a9dWHSUCAHcQZeCNjbfddunFF66cPlVnWZvLnXu6WP980iwjRxb+fP730vms2zesJ8oA8EhNUeZ3Tp60PgjvcmFAPh1EGaIMAITVFGVGhoY+O/0J6+PwzhYG5NNBlCHKAEBYrVFm4aknrffmzha6/nQQZVifASCMKEPX7w2iDOszAIQRZej6veFalJHdi+rh6U8deX7v9MJTTx59aFIv78yffGf+pPz/+b3Tbzz37JsvHK8w25OPPiJTykN5792/9MVPPTwjM5EPPfrQpP6uow9NVp4t6zOArCLK0PV7w7UoI8FC/n/y0Uc61uXfeO7Zow9NdqzLG1HmjeeeVU8e2vlAx7r8yUcfiZznQNem6fuH1GRvvfSivDccZTrW5Y13sT4DaE1EGbp+bzgbZU4++shA16Z35k/KkwNdm4wpJY6oh6c/dSQ8jUymP39o5wMyitOxLh/ewaRmONC1KS4YsT4DaAVEGbp+b7gZZWQ8Rn/ymqPMldOnZPBG31VUIcq8M39yoGuT2hXF+gygNRFl6Pq94WCUGejaNNC1qWNdXoWPow9NBkHQsS6vypXTp9547tkgCGRimf70p45EzvOtl16cvn9I3ij7jOS9W6ZfvfOOLfL8G889e+X0qY51+YGuTTu39jdw1xLrMwAfEWXo+r3RqCizfu3a07/9W19f+MMK5b//ly//dbX5qAGY5/dOq1GWCqMybzz3rJRaFlIyzfT9Q/Lef/MrC39x6lV9AnXATcN3MLXnb/nKV77yjYq++c1v/vSnP7W9RgDA4iJRpiGFKJOORkWZW2+5+ZVXXjlbzf/5gyonP+uH/e7c2n9o5wNXatvBFFee3zutD7HIoTPy3m+/+rvGxGqGC089KQcIN2p9ruX3eeONN37yE+7UDcAJRJkGFKJMOlyOMu/Mn5TdRuEzmBaeejIuyhgnVF85fUr2K73x3LNyKPHpTx3Rz35SZ3RfWX4GU2R+aurvc+HCBaIMAEcQZRpQiDLpcC3KGNeVWXjqycjryiw89aRcGyY8h8gnZWzm0M4HZObqmjRGlGnedWWIMgD8QpRpQCHKpMO1KJPVQpQB4BeiTAMKUSYdRJl0ClEGgF+IMg0oRJl0EGXSKUQZAH6xFmUi718j/3/zheNyTIDa9y+HCxjLIJeEv7J00MDze6fDxyiEn2xG10+USQdRJp1ClAHgF2tRJvL+NVdOnzq084GBrk3yqrqzjFwlbOfWfvX2k48+EgSBulbYlaUoI3euUVFGriFGlMkGokw6hSgDwC/2o4x+/xoJH/pkcvkvucCGfvbpzq39+mVP1fPGWa+Siprd9RNl0kGUSacQZQD4xXKUMe5fI/cE1ic7+egjO7f2S5SZvn9IXdVULgBPlGkpRJl0ClEGgF9sRpnw/WvkmmD6ZOqCpwNdmxaeelL2MZ189BG5VHwtUUa/G46+i6qBhSiTDqJMOoUoA8AvlqPMleX3r4kclVFR5spSapFE4s6ozE251ffdd98ONNkNq1Y16naSd23e3HdXT+XSfsvNGz7c1oJlzQ03EGUAeMT+sTJXtPvXSHDRJ9u5tV8dK3Pl9KlDOx84+tCka1GmfV3+3Llzl9Bkt65f35Aos3rV9V84dFDOoaOEy9o1a4gyADziRJRR96+5cvrU9P1DO7f2y21rpu8fkgSjosybLxzXbwhcS5QxzmCS44sbW9jBlI5G7WBaver6hswnq4UdTAD84sp1ZeQaMPL/k48+cmjnA/pBvu/Mn1SvqgD0/N5p/boyakr9Yfi6MkQZfxFl0ilEGQB+4Wq/DShEmXQQZdIpRBkAfiHKNKAQZdJBlEmnEGUA+IUo04BClEkHUSadQpQB4BeiTAMKUSYdqUUZ43Ar/VpH6qW3XnpRn2zhqSfV8VhvPPesXCpJjtyKvAvYWy+9KAdyxbUsNcO3XnrReEkdJRa5hPUXogwAvxBlGlCIMulILcoYl21U58SpM+munD4ld/tS7eLoQ5Pq5l9yzSQ5xlweyuUZ9Zt1dKzLy5UF1Gl6ejm08wE1vTq5TxV17t6V06ci315nIcoA8AtRpgGFKJOO1KKMOnvuzReO79zaP9C1SYZG9GGVjnX55/dOy+1Or2iXfJRS+fpG6vZhUuR8PX0B9Pee/tQR4yrVKspM3z+kv/Gtl15UA0Ky8LIk8p83Xziuf2iFQpQB4BeiTAMKUSYdqUWZk48+IhHh+b3Tz++dPrTzAXUpI4kFagKVOYwo8/zeaT1/6FEmfB3It156Uc8uV06f2rm1f/r+objkIVHGyDEyWzUgdEW7qJLcv0wCUy337iDKAPALUaYBhSiTjjQP+5W0sXNrvwx1SAJQgUOu4njl9Knp+4fkikdHH5oMgkC/25caHbmyPMocfWhSrm2tFyPKXFnKRuFZXVm6l6oMF+lzkANo5IKTV7Q7mqkLZEd+ULgQZQD4hSjTgFJLlDnzJ3+1/3PfoNRTune/uPtX//P0k39YoRw5+qWq9VVjlHnrpRdVVpDDYiQQyCDKzq39EiZkGjUq8878yYGuTUZYSToqoxdjvEfmJuMxamDmzReO69Oo25bJuI6xX6zq73PrLTefOnXqXEVf/epXiTIAHEGUaUCpJcr84B8/+Ivv/h2lntLx0ZE/OPbb53/rdIXyP3+n+u2sa4kyh3Y+IEUeyh4f2c1kDKvIPdv1wCHjInqT0aOMBBf9vCQ5+Fc9NHLJlVD+UBlFv+OHcWiO5LBrjjJVR2XOnz9PlAHgCKJMAwo7mNKR5g6mhaeeDIJArfbP751W+UM/v+nK0mEx4WNljGES/bBfGZiR+6TKOUrGGdcy5CM395DDXK5o9/rQz2BaeOpJebuM0Lzx3LNy9pM+WTOiDDuYALiDKNOAQpRJR8qXyIu8t5dxky/1jH4TMSnP751Wief5vdNGC5KBnJ1b+413qRK+E5mKMnHXlZEL1agZqsn0+53VcqN4ogwAvxBlGlCIMungar/pFKIMAL8QZRpQiDLpIMqkU4gyAPxClGlAIcqkgyiTTiHKAPALUaYBhSiTDqJMOoUoA8AvRJkGFKJMOogy6RSiDAC/1BRlHnzggd477xz66EcpkeW6lSvff//9ZlcViDJEGQAIqynKvP/++5cQ79vf/naz6wmLRBmiDABEqSnKAC4gyhBlACCMKANvdHd2fmxLd+WdfYNbtgxu6a5cbrz++o/eeWfVyVIrG9au/Vj3ZuuLocrqG2547bXXiDIAfEGUgTeuXr1adWffiRMnjlfz2c9+tuo0aWpra/v0pz9teynKPv/5z1fOMUQZAE4hyiBTLly4UHUz7Jp8Pl91h45riDIA3EGUQaYQZdJBlAHgDqIMMoUokw6iDAB3EGWQKUSZdBBlALiDKINMIcqkgygDwB1EGWQKUSYdRBkA7iDKIFOIMukgygBwB1EGmUKUSQdRBoA7iDLIFKJMOogyANxBlEGmEGXSQZQB4A6iDDLl61//+tmzZ8/VTTbY9c+nFvl8/tSpU5WnOfwb5xa+ks7i1ORrX/vaBx98YLu2AWBxkSiDjPnJT37yd43wt3/7tw2ZTy1uv/32t99+u/I0O+be+M5ffy+d5anFj370I9tVDQAlRBnAso6OjqtXr1aeZuzohfd+wA4dAIhAlAEsI8oAQD2IMoBlRBkAqAdRBrCMKAMA9SDKAJYRZQCgHkQZwDKiDADUgygDWEaUAYB6EGUAy4gyAFAPogxgGVEGAOpBlAEsI8oAQD2IMoBlRBkAqAdRBrCMKAMA9SDKAJYRZQCgHkQZwDKiDADUgygDWEaUAYB6EGUAy4gyAFAPogxgGVEGAOpBlAEsI8oAQD2IMoBlRBkAqAdRBrCMKAMA9SDKAJYRZQCgHkQZwDKiDADUgygDWEaU8cvBgwd3NNrw8PCWLVvuQRPs3bvX9iqDpiPKAJYRZfwSBMGlRjt37lwulxtDEwQBm7nso44By4gyfmnGpvHq1atr1qzZhyYgyrQC6hiwjCjjF6KMX4gyrYA6BiwjyviFKOMXokwroI4By4gyfiHK+IUo0wqoY8AyooxfiDJ+Icq0AuoYsIwo4xd3oszg4OD09LT+cGRkRP4/NjY2ODgY+a7Jycn+/v7+/v6xsbHIiaenp+Xh4OCgmnJycjL86XGvRn761NSUTD80NBQ3K0XmoJZQ5qk/rB1RphVQx4BlRBm/uBNl8vn8+Pi4/L+zszOfz+sv5XK58FtGRkZyuZzEhXw+39PTs2/fPvm/mmZ8fFweygRq4v7+fuPT414Nf3pPT49M09/fbyzqvqUo09PTo5ZtbGzMmKc8n/Qn2keUaQ3UMWAZUcYvDkaZzs7Ozs5O9fzk5GQ+n+/s7AyPf+TzeTVyMz09LYGjQpRRUUk9Gf5049Xwp09OThrJprOzUy2G/rn6ZEQZ1I46BiwjyvjFtShj5Jh9+/ZJjJBIYbxFUouxp6aWKDM4OGh8Styr4U+XEZeqX4cog2tGHQOWEWX84lSUyefzhULBiCwqEORyufAxLkNDQ7IDSI3QVIgyav65XM4Y44l7NfzpeihRh8WED6YhyuCaUceAZUQZvzQpytx2221/Vc2FCxeMMCFjIfrAzNDQUC6XKxQKhUIhl8sZQyk6mXJqampwcLDqqMzU1JRMrH96+NXIT5dDamRKiTLh+LUvFGUKhQJRBjWijgHLiDJ+aVKU6ejoqDrZ3//93+sbaRUm5KgXGWIpFArqMBRJGPpbIuOIcRzM0NBQoVAwwoq8V38Y+Wrkp8sxvPpiGONAwogyxm6pzs7OuHOyKiPKtALqGLCMKOMXB6OMxAWJKUZ2KRQKcs625ADJEENDQ+Pj43JWkZpVZ2fn+Pj44OCgSkX6OUrqtCN1UnT41bhP37d0gtXg4KB8rpypJMsTF2Vkbv39/eoteggjykBHHQOWEWX84k6UibyujDF0MTY2NjQ0pKKMPCO7eIwpBwcHC4VCT0+POihYv9yLOhRGRZnwq5OTk5Gfbnxuf3+/CiV6lJmenjZ2IcmlaIy3JEWUaQXUMWAZUcYv7kQZ1IIo0wqoY8AyooxfiDJ+Icq0AuoYsIwo4xeijF+IMq2AOgYsI8r4hSjjF6JMK6COAcuIMn4hyviFKNMKqGPAMqKMX4gyfiHKtALqGLCMKOMXooxfiDKtgDoGLCPK+IUo4xeiTCugjgHL1qxZc9999+2o6MO3f3To/uHK0yAdzdg0fuc731m9evU91WzdunU1Err++usbXl9wDVEGsKxQKJw7d+5SRR+bPvFHf3yx8jRIRzOizJ/92Z+tXLlyDE3AqEwroI4By9jB5JcmRZlVq1bZ3hWTTUSZVkAdA5YRZfxClPELUaYVUMeAZUQZvxBl/EKUaQXUMWAZUcYvRBm/EGVaAXUMWEaU8QtRxi9EmVZAHQOWEWX8YjHKTE1NDQ4O9vf3Dw0NyTP9/f2Tk5P6NP39/dPT0+H/y8PBwUF94sHBwbGxMfn/0NCQPsH09HR/f78x53379slpQZGLJ2/RybvE0NDQ+Ph43FfTF1XmY3yK8V1k4Y1nIhFlWgF1DFhGlPGLrSgzNTWVy+V6enr6+/s7Ozvz+bxszuU/anvf2dkp/x8bG8vlcnocyeVyuVzOmKFMkM/nOzs7+/v7e3p6crnc1NTU+Pi4PrG8fd9SNIlcQnmLEWXUMsuyGfOMXNTx8fEgCAqFgppgaGgoCAIjCeXz+QrZSCHKtALqGLCMKOMXW1FGcoa+IZfxmEKhICFgcnJSjzWFQmFoaEh/JpfLFQoFNdohMai/v398fFyfrKenZ3Bw8NqijD4f9S49cOTzeTWkFLeoMh/90wuFgj6f8fFx+bJEGQjqGLCMKOMXW1FGhi6Ghoampqb052VwRTb/KqZMTU1JMtCzi7xdDdvk810OjPcAACAASURBVHkZL5GXjH1VzYgy09PTuVzO2HMUXlSZT2dnpwo9+XxeBRdZbBngIcpAUMeAZUQZv1g8VmZsbEzGJ4w9R4ODg7IfR39GHg4NDak9NblcTsKEBAgZzpH5TE1NSTjI5XKSda4tygRBkFuiQpIig0DGu8KLqmKZPBwaGpIBpPHxcTXxPnYwQUMdA5bVEmUGf+WPZn7zzf2f+wbFetk4/h+qTnP0tbcSrQNJz2AaGxsz9tQYsUOGMQqFguypkYEcmUYGP+SA33AukUzT2dk5OTnZ2FGZoaEhtSSVF1XNRy3wvqXgon+67Bqr+lsRZVoBdQxYVkuU2VH84//2re/9xXf/jmK93LDhI1Wn+b/f/1GidaCWKCMHlKiHRqTQY4cEHfWws7NTRjJkmrGxMXXUsMxkcHBQ7XXapyWS8DHC4c/VVd3B1N/frx/MG7eoaj6y/ysuynR2dhJlIKhjwDJ2MPnF7rEyMhQhO1z0EQ49dnR2duonXavxFTWN2oukn2ckyUAOvx0ZGZEkIUM48qTkIckW6hylsbGx6elp+bgaD/uVieVzIxdVzUceSoCTKCMH1oyMjIyMjHCsDBTqGLCMKOMXu9eVUUnC2FOjj5SEL8Eiz6hpBgcH5Qhf/SIxMjbT09OjH5YrhwnrR+Cq3VLhKKP+E/5o9XByclJdb6bCoqr56MssU8ocBgcHR0ZGuK4MBHUMWEaU8QtX+/ULUaYVUMeAZUQZvxBl/EKUaQXUMWAZUcYvRBm/EGVaAXUMWEaU8QtRxi9EmVZAHQOWEWX8QpTxC1GmFVDHgGVEGb8QZfxClGkF1DFgGVHGL0QZvxBlWgF1DFhGlPELUcYvRJlWQB0DlhFl/NLW1raj0QYGBj70oQ/diSZYvXq17VUGTUeUASwjyvjl6tWrl5rgT//0T5sxW1RtXMgAogxgGVEGAOpBlAEsI8oAQD2IMoBlRBkAqAdRBrCMKAMA9SDKAJYRZQCgHkQZwDKiDADUgygDWEaUAYB6EGUAy4gyAFAPogxgGVEGAOpBlAEsI8oAQD2IMmg5v/rY/h3bt7pTVt+4atvHeytP0zt7enjHL6SzPFP/buyDDz6wXUsAUCuiDFpOx+23nPuPwaV5V8r/OFl9mvsPv/K1386nszwbblnFbWsAeIQog5bTcfstV78aLF72qYw9/sp7X8+n81kdt60mygDwCFEGLYcoQ5QBkCVEGbQcogxRBkCWEGXQcogyRBkAWUKUQcshyhBlAGQJUQYthyhDlAGQJUQZtByiDFEGQJYQZdByiDJEGQBZQpRByyHKEGUAZAlRBi2HKEOUAZAlRBm0HB+jzMPFz/3gYhtRBgDCiDJoOc2OMnInI/n/jy8GJw5Hv/TqXPn/8vDHF5c9vHCi/K75uRWpxSaiDAC/EGXQcpodZRaOBQ8Pl/+/uRAsHCs93N5Xji+bC+XJ5KW3z5T+f2gi2N637KXNhZRyDFEGgHeIMmg5zY4y3z9fDiIPDwevzgWHJsrxRf7z6lzwzEywvS/4/nkzyhyaKE+/eDl4dyHY3hccmijnIaIMAOiIMmg5KRwrozLK9r7gxxdLyebtM+VhGJlAAo0eZYwcI8lm4Vgp0BBlACCMKIOWk0KUeWYmWDhWiiYSU95dCE4cDl6dCxYvl3PJ98+Xx2m29wXb+4KHh83IoibYXAjeXSDKAIAps1Hm+eef39EaRkZG1q5du2HDBtsL4o0bb7iu2VHm0nzwzEwp0CxeLoUYCTSLl4NDE6UDZR4eLh9JI3uRFpfvYJJDbdSUxoBNk8qa1Svuu+8+27XkrkKhYHsRcI127dr1wx/+0PbWCY2X2SizY8eOL3zhC5dawxe/+MUgCGwvhTdu2/DhFE7GllEW+f+7C8uGWzYXyicrLRwrPa+OlfnxxWBzoXT60sPD5fOY9CGcppbChhvOnTtnu5bcRVvz14YNGxhxzKQsR5lLly7ZXor0BEFmq7Lh0rmujB5lJL7ImIp+fpN6SXY5qTOYLs0HmwsR2UUOIm72krODqTLamr86OjpYtzMps22SKIM46USZCyfKAyqL2lVkLpxYdjkZ9VLkdWWM4HJpPo3zmIgyldHW/EWUyarMtkmiDOL4eLXfNAtRpjLamr+IMlmV2TZJlEEcogxRph60NX8RZbIqs22SKIM4RBmiTD1oa/4iymRVZtskUQZxiDJEmXrQ1vxFlMmqzLZJogziEGWIMvWgrfmLKJNVmW2TRBnEIcoQZepBW/MXUSarMtsmiTKIQ5QhytSDtuYvokxWZbZNEmUQhyhDlKkHbc1fRJmsymybrCXKfPqVb/bsP5uNEgRB5Qnu2n/2LtsL6VH5t09+/l++scJ6qnA2yjz3xW9ZryNbpWpbozhbVqzOd37ilcrTjB298E///K+N2hIhHS0dZcaOXnjvBz9JZXGarpa/FHv2n01hSdzHqEz9UaaV0db8VcuoTJa2C62DKJORVZbutXZEGaJMPWhr/iLKZBVRJiOrLN1r7YgyRJl60Nb8RZTJKqJMRlZZutfaEWWIMvWgrfmLKJNVRJmMrLJ0r7UjyhBl6kFb8xdRJquIMhlZZelea7e1f0uAeNdft+L999+3XUvuCmhr3iLKZBVRJiOrLN2rv7jWhV9oa/4iymQVUSYjqyzdq7+IMn6hrfmLKJNVRJmMrLJ0r/4iyviFtuYvokxWEWUyssrSvfqLKOMX2pq/iDJZRZTJyCpL9+ovooxfaGv+IspkFVEmI6ss3au/iDJ+oa35iyiTVUSZjKyydK/+Isr4hbbmL6JMVhFlMrLK0r36iyjjF9qav4gyWUWUycgqS/fqL6KMX2hr/iLKZBVRJiOrLN2rv4gyfqGt+Ysok1VEmYyssnSv/iLK+IW25i+iTFYRZTKyytK9+quW7vVzX/lf//TP/5rK4qAK2pq/iDJZRZTJyCpL9+ovule/0Nb8RVvLKqJMRlZZuld/0b36hbbmL9paVhFlMrLK0r36i+7VL7Q1f9HWsoook5FVlu7VX3SvfqGt+Yu2llVEmYyssnSv/qJ79QttzV+0tawiymRklaV79Rfdq19oa/6irWUVUSYjqyzdq7/oXv1CW/MXbS2riDIZWWXpXv1F9+oX2pq/aGtZRZTJyCpL9+ovule/0Nb8RVvLKqJMRlZZuld/0b36hbbmL9paVhFlMrLK0r36i+7VL7Q1f9HWsiooFotBI9xwww0NmU+aOj/xyorV+XQ+a1377T/84Q8rV8bU1FQzPvrDa9fKf3r2n23G/FtWmnW6ec/vprau+qjrrr6GdIhbt25tyPLQ1ipzrb50+nZh5cqVDZ8/khrdNVl1TQhqGb2oxcDAYPALnw6Klz0qnQf/64pf+0Y6n7U6f1vVvwaadIfkIAhkGXr2n7X+m2eppFmn3dOvrph5zfpXdrfUMFJSi0bNh7bmV33p9FGZvXv3Bh+dsP9ztXL55a/ecuvt1dcEokw6n0WUyV4hyjhUHNs00tb8qi8dUcatQpSpWogyFF/qlChTpTi2aaSt+VVfOqKMW4UoU7UQZSi+1ClRpkpxbNNIW/OrvnREGbcKUaZqIcpQfKlTokyV4timkbbmV33piDJuFaJM1UKUofhSp0SZKsWxTSNtza/60hFl3CoeRJnRueCJi8se7j4RjM4F2w4vK/LqgYXSwz3zpWeeuBiMzpX+f+R86Y27jpWeUW9Uc1YPl17qPHBuReQybztcXrAnLi6blTHnmkt2ooz+s6t6kV/JqM0nLgZ75sv1OHsmOLBQenXPfKke49YBVcv6xOFfPvJDZWH0OYSnbETxPsqo2jly3nxer2LVJPfMB7NnzPcaNRs5h2JU+21scWzTmFKUUVUze6ZcNZW7rF3HynWnV2hRa2gpFMfqS+dolDHalOqHK/SWRhs0pgx3iXEdgt3iQZRp7ys3pN6JoL2v9GTXsBlldp8I2gqlh+19wcBMULwczJ4pveXI+aCtEAzMBNsOl+fTVih3r+19QVuh9H/1ruLlzr3/aUV7n9l698yXPktNHwTL+gI1qyQlO1FG+wGD2TNBW6EUH9sKy7pFqdxth8sVJ3Unv6Sq2bh1QP/B1cThXz7yQ6XKuobLz+86FgTBsikbUfyOMgMz5YbWVliW9fX2UlzeJLuGS3UUV7ORc4hsv40tjm0aU4oyetW095WqRlqlPpne+0k/qaqja7jcVep/Oja7OFZfOkejjFSxeqj64Qq9pb4ayFZSTWls5ooVOwS7xaco0zsR9E6Unww3p/a+8i/7xMVSDam63HZ4WefY3hccWAh6J0qb2AMLpf5XkqbWXDv3/N6Knb9e/mgpXcPBrmPLttbSL6tgRJRRPaYeROKijNH85NcLR5kK68A1RBljUyr9NVHG+OnU/3efKCe/AwtBe1+5+YSro3LNxs0h3H4bWxzbNKYXZfSq6Z0ojdDERZmBmYi6G50r1T5RZnFxMUtRpmu4/If66NyyKY3NXDG+Q7BevIky+jYsXDF6LRrDJ6ouJWDuOrZsWGzXsdJsR+eC0blgYKbUsUrQKV4Odh3rnDmz4te+YUZXmadaCeRTdp8o1zpRRirOCAe1RJlwp1nLOnBtUcbYlOqpq0HF7yjTNRz0TkT8JvK7SRyJrI7KNRs5h8j229ji2KbRTpTZM19um/pk6qFqfXrdqQmIMouLi45HGenfZs+Ug0iF3lJtBGUyGZArRm3mivEdgvXiR5SRAVK9Xcnf06qo/lFqrq1Q/gtP39OxZ770l7c+aKZq68j5YPZMaVZaq+58ZGHFr30j6J0o71OU0CMfJ9OrT5G/eIpEmTOlWmjvK2eFYnyUCYJltWkMZcetA/VHGVklpCrlLxKijFGkc9TrRf+R1UikaneqyHsjazZyDsWo9tvY4tim0U6U0f/M0CeTh0fOE2Vq4W6UMZph1SijRkCl6tVL4c2cem+4Q7BeUo4yNc6n4ze/VV5E+dO5WMMOJr3sOha0FUrpxGiQxaW/S9QAjIqfUrVq83bkfNBWuOPhL/zcR8bL60Rx+ZbV+BRZLcLdRG3FbpSR/4wdvRA3zbff+3Gt30WNxxxYMPe7VRiVeeLisoMk9CgTXgek1UU2TmNhKkQZNb3UuKUos7i4+L3vfa/+Suye+q2//N9XKk9z9R8+aHvuz6/lu6hqksbVNVz6w0BqRCpOflhV3XE1GzmHyPbb0LpwbdPY+YlXqk6ToNHFlchRGWmYRjORX146RqJMRTO/8eYP/vED+f/Bgwe/9KUvVX3LfV/4y6b/YnE7mCr3ljLuIgf8Rv4BGdkYw2uIxeJmlNnx6jvlRVRbF0kJ8rdaZJQxfm5jiyW7/cJ1OTBTKvK8DKCpxmwcXiMHfuv11ztR6sHVk7KbydsoU2WyGr+L/oPoa7yxB0FSjj6B1LI6ut44VkZfB4zaUcNm4V8+8kPVEsqAqu0o8zd/8zf1VmFt68bVf/hg2Z8KFYq+90f9dNJG1JCJHCcY1yTjajZyDpHtt6F14dqmscGNLq5EHitjtBRVC70T5eMF9dpXf5oTZUJqjDIHz/5103+xuChTubfcM18+nWLb0mlr4c1cXIfgQvEpyhSXjneRQRTjDCY5t1DGWuQI/HbtsNOidjD27JnSrgRpsXvmgyBYdtyT6lL14YTi0p5+fU9T8XLpjxtj7Kd3giiz7AfpGi41JDlLRU711BuPcUSF3qji1gF1sL1Ut15r+ooR96FqCaUG1RAdUUYvMnAiCV66M7XN06cxjhZUJbJm4+YQ2X4bWxzbNKYXZVRvqdb/4tLZKHvmS/v1pIXqf4GopiTVwRlMMTyIMhV6S5lSDY6q9SS8mStGdQjprAlViwdRpsbrysg0Mj4mPaNMb1xXRl7dtvyceL1lqssthK+7IM9sC51nL88YZ+dfU2vPTpQxfhD55VUdSR+qJghfX2R0LjiwUOW6MnEVaqwY6iOMD9WXUE1mfFAjit9Rpng52HUsGJhZdq6fUVmyLTQuR1G5ZiPnUIxqv40tjm0aU4oyem+pj0wXl857UJUrDUpVinqXXh1cVybEoSgTd12ZYnxvqVYSiapSv3GbuWKoQ3CkeBBlWqlkJ8pQktTpostRJkvFsU0jjc6v+orjUJRp2UKUcaoQZbJXiDIOFcc2jTQ6v+orDlHGfiHKOFWIMtkrRBmHimObRhqdX/UVhyhjvxBlnCpEmewVooxDxbFNI43Or/qKQ5SxX4gyThWiTPYKUcah4timkUbnV33FIcrYL0QZpwpRJnuFKONQcWzTSKPzq77iEGXsF6KMU4Uok71ClHGoOLZppNH5VV9xiDL2C1HGqUKUyV4hyjhUHNs00uj8qq84RBn7JeUoc+sdnQEqWHH9u+++W/k3bFaUWbHK9pfPqBrqdLFBUeb6m262/W2d9qHrbqz/R15sYJSh0VXkWn3F+djHh2z/VAhuWLu++prQqCiz+uYN6V0p0sPiwp2xKenX6WKDoszPXr86+OWvWv/K7hbH/sqn0flVX3E6Nt8VPPgZ+z9XK5eUR2WIMpULUSZ7hSjjUHFs00ij86u+4hBl7BeijFOFKJO9QpRxqDi2aaTR+VVfcYgy9gtRxqlClMleIco4VBzbNNLo/KqvOEQZ+4Uo41QhymSvEGUcKo5tGml0ftVXHKKM/UKUcaoQZbJXiDIOFcc2jTQ6v+orDlHGfnEiymw7HIzOLXtmdK402bbDwRMXlz1vPNx2eFlRM98zv2yeaobqVXlozGHPfPDExdIb1TRSdp8wF/LI+dLbdx0zv9Ge+dIMdx0LZs8ER86bExhfZKk4F2XU77NnPpg9U+XHlPLExWDb4Yjn9en1XzLyt1JPbjsczJ4JDizEVtzsmfKChX9YY/3R5xyulMqv6sujf6L61sbqkaROF4ky6RTHNo3Vo4zR1ow1U9Z21eL0yYqhhmasompVj+yQ9Y/YfSL6JaMcOb/sVZm/3voOLES8vcIM3auvOLFRxtg8ye8f3oqpX1h+tNG5iP4nUT+p3lJ1m6XPQYqsJ+ENqzGr3SdqWuzIDzVWRVkxojaICYoTUaatELQVln3ztkJpFW8rLNtstPeZ261th4OBmdL0erNs71s2z/a+ZW1GJpbnB2aWVdjsmaC9b9k0xcvBrmPmkshCynt7J0pv0eevFql3ImgrmCuZ8UWWinNRpr0v6BoufZGu4dLXjPsxpcyeKf3yxvP6PPWqifyt9Ce3HS5/ol5xasHa+8q/v/7D7pkvr0hSBmbK72orLOujq76qqls+sXdi2atqtbmmOl0kyqRTHNs0Vo8ybYWgazj2oaztqsXpkxUvB9sOB0FQ7hL1VbRreFnzMVZmvb/SW2v8Sh4UL5f6YfVx0oj0LZa07vAX9Ke+4sRGGb3TUFFG76P0bYdeKW0F8y/kRP1kuO6KMdssYw56lDE2rO19y7KIWkkqL3bkh+orkqy94eGApMWVKNM1XH5+dK5cJZWjjP5b6M8cWCi1T/UDVYgyxgzDUWbXsaC9z8yMUtP6gulhRdYqvZGrT5fs7FGUMdqG/D7XHGXCVRP5WxlPhudpLEPvRESFdg2X6k5f09T/d59YtlWo5VU1Z2nJ6hvNnik19ag2RpRxqDi2aawSZUbngoGZoL2v/MeudJUqH1SNMurPj6LWs43OmdnF6N9U8zywUJqDLEDcHyfqQ/U5h//G07esR86XhhYyH2XC/bzqo3onzJ9LTSO/jD7IkaifLMb0tOFtljEHvRjrlfxlKOtJ70RpJaxlscMfqlZF+Y/+Exlj3k9cLK0q6lVjUEAVV6LMrmPlX0SNlKiX5OuFv3bkL66aotSlmue1RRkZjwn/cFKvu45FD6nFRRn5apKpWzPKhKumliY6OlcKFnFRRiUJVaFHzpee0VNy13DQOxH5y1d/NTLKqL+E9JGh5HW6SJRJpzi2aawSZSRDSKBRK+GBhfLWomqUkQ2JvF31bO19VQ5YVL3x6Fzp02VzaPzBFvkWtSSqFatdIfJXflEbLu0abt0oo+eYyClVXFC/Z+39ZDGqp43cZtUeZeRDeyeW/ZlXdbEjP1RtysNDFbK6SraWyXonSs/I36v6yJ9eXIkyattw5Hx5tEpeko2ElMg1I64lF7WR0gpRRnZvqZ1cepRRHxrZgPfMl5qisRejuDRqpy+20SV5NCpjVEGFH9OojsgoE66ayN9KxsZVvXQNlyeOjDJ6Ny0/rPq1dx1bNr4i1arP06i4uFeN30Fmrv5M2X2CKONBcWzTWCnKqI2QPnQh/1FbrFqiTHEpu6g2oveiareC0S2rPwPkb2L5uAqxQ/3BoP+9LkFKHsofCTKHruHS3lt9dNOH+opTKcroRVVHe9+yAbPI39boPxP1k8WonrYYtc0y5qAvRni9Kl4uf3SNix35oTJn+SJq0EjfPsqao++H0rcXkUODrkQZ1RjkMDc9yiTdwSTjKLIDr61QSr4Sj8I/d+VRGTUeG5dbVVXpVaLeqwaTwnW87bA3UUZWKX1kL+7HNKojvM5FVk3cbyW/+RMXy7mhGB9lwqMyen9hjHkaHxFZwq/qA4SRLdnYIZWkThcXF9977736K5EoU6U4tmmsFGVk7FY1Fule1Pomu5lkbZdxGmNdLWqNRVpHuI2oacJ/jMloir4hkQ1S5KJK2JJFVX/wyJxVINPDUPvyvcD+1FecxKMy0vXpAzORwxtGN1t7PxnZ0+pFbbMSjcoUQzuMqi525Ieq8RhZddUxN+rwRDVso6+B+hobnrlDUWbP/LJjka45yui/iPqDxqgA9adD1R1Map7624tLx2HoFRxe7cIrgZomZkeGi1EmvN5E/pi7jpV+0gpRJq5qIn8r9aT86abOaIuMMsaxMsaRKzJEqY+1Gs2jeLnKq+FV0ZhG7/eT1+kiozLpFMc2jZWijBrwK14uH/Klr2/yZ66sk/q6qrcs1UZkiF71bOFjZYymKuP8qpnLvte4YzO3hY6H0P8clZlL5xCOMpX/SnSsvuJc47Ey0rNJlyh9lJpGXqq6Jyiun4zsaSO3WdcQZYyOt/JiR36onlHUAuhzlv2VvkYZ+Y/6S71ylIkcBihejjiOTP58UWdFzZ4p7bLVdzYb9Rf+ZdU6p5+qrWYofx4dOV9+NXL9kK2dnMMWuYr7EmUif0zJ15JHjUqsXDVVm2hRGxjT+0e1I1I/urB9aT+0cbKfaswy+CfLKY1QnRsZ+ao6/TuyymTnsfwORBn3i2ObxtgoY+wVLWpHyahnRueCICitk3Ly3Z75UuiRVddogO3LT/STbYys6m2h4w/2zC87+2l0rtxnhq87YOyCl/1f6tP198ryy95Y6Tkzv4NJP4MpvCtAtiNqYySdifwlZvzxXHs/GdfTRm6ztoXOYNJPeatl/1HkYlfeUM4uPxVORgpk9d59ovQWfZdo0Zcoo5ZsdK7UJNT2Y1vMdWX0L6NfVuHAgtnMpHkXly57IG1Mxcbw9V3irisjO7+euFjuYsIz1N8beZUROWJcLiTgy3VlIo+xivwx5XAw9cWNHzCuaiJ/q/CTsm5EXhBIT/1SR9tCVylQz+w6Vsof+oH9qmcJvxq3KuqfKO0/5m9WooxDxbFNY2yUkQ7dWM1kqMN4Uh+5kb8iwquuFKMBqlU95npIsX2s3gcaL+nPqE/Xo4+acveJUsutfBauY/UVp9bryqhsF3ddGTkFbGAmotdN1E/WvhEMX1dGfXS4ZsMrVdxi17ih1Cd44mJp+6iWIXLNibtcmRNRxqNy5LwZlhtanIsyrVC2xVwuL8U6XSTKpFMc2zR62eia3Ae6XF9xuNqvzZVEClHGqUKUyV4hyjhUHNs00uj8qq84RBn7hSjjVCHKZK8QZRwqjm0aaXR+1Vccooz9QpRxqhBlsleIMg4VxzaNNDq/6isOUcZ+Ico4VYgy2StEGYeKY5tGGp1f9RWHKGO/EGWcKkSZ7BWijEPFsU0jjc6v+opDlLFfiDJOFaJM9gpRxqHi2KaRRudXfcUhytgvRBmnClEme4Uo41BxbNNIo/OrvuIQZeyXGqPM1NRU0BA/d31j5pNRK6677v33369cGVu3bm3GR//Mz/5cM2aLWup0cXGxo6Oj/s/6mRW0r0pWr7mp1q1TRW1tbQ1ZHhpdZa7VV6yfXdHc+aMGW3r7q64JzY20ADKpSSOIAHANiDIAEiPKAHAHUQZAYkQZAO4gygBIjCgDwB1EGQCJEWUAuIMoAyAxogwAdxBlACRGlAHgDqIMgMSIMgDcQZQBkBhRBoA7iDIAEiPKAHAHUQZAYkQZAO4gygBIrJYo89wXv5XKsgBodUQZAInVEmV69p9NZVkAtDqiDIDEiDIA3EGUAZAYUQaAO4gyABIjygBwB1EGQGJEGQDuIMoASIwoA8AdRBkAiRFlALiDKAMgMaIMAHcQZQAkRpQB4A6iDIDEiDIA3EGUAZAYUQaAO4gyABIjygBwB1EGQGJEGQDuIMoASIwoA8AdRBkAiRFlALiDKAMgMaIMAHcQZQAkRpQB4A6iDIDEiDIA3EGUAZAYUQaAO4gyABIjygBwB1EGQGJEGQDuIMoASIwoA8AdRBkAiRFlALiDKAMgMaIMAHcQZQAkRpQB4A6iDIDEiDIA3EGUAZAYUQaAO4gyABIjygBwB1EGQGJEGQDuIMoASIwoA8AdRBkAiRFlALiDKAMgMaIMAHcQZQAkRpQB4A6iDIDEiDIA3EGUAZAYUQaAO4gyABIjygBwB1EGQGJEGQDuIMoASIwoA8AdRBkAiRFlALiDKAMgMaIMAHcQZQAkRpQB4A6iDIDEiDIA3EGUAZAYUQaAO4gyABIjygBwB1EGQGJEGQDuIMoASIwoA8AdRBkAiRFlALiDKAMgMaIMAHcQZQAkRpQB4A6iDIDEiDIA3EGUAZAYUQaAO4gyABIjygBwB1EGQGJEGQDuIMoASIwoA8AdRBkAiRFlALiDKAMgMaIMAHcQZQAkRpQB4A6iDIDEiDIA3EGUb1OaGQAAB/NJREFUAZAYUQaAO4gygAeGPn5/4Jue/WdT+6zbbr3ddhUBsIYoA3jg1nW3/fJHPl/c+mWPSs/+s6l9VhDQlQGti/YPeIAoQ5QBEIf2D3iAKEOUARCH9g94gChDlAEQh/YPeIAoQ5QBEIf2D3iAKEOUARCH9g94gChDlAEQh/YPeIAoQ5QBEIf2D3iAKEOUARCH9g94gChDlAEQh/YPeIAoQ5QBEIf2D3jAxyjz8emvEGUApID2D3ggnShzpHe+9+aR9hu722/s3nXHY/Jk780jo4VH1DSjhUfkYddNAzJl780j22795J6uzxS3fvnAXS913TSgz9N4SJQB0HC0f8ADKUSZPV2fabtu/a47HpvtfmG2+4X2G7sH1v1iceuX22/s3nbrJ9Vk2279pDzUJ951x2Nt160/0js/2/1C23Xr9dkaD4kyABqO9g94IIUo035j9+4759TDJ/p/v/fmkcpRZrb7Bf3to4VHiDIA0kf7BzyQQpSJyxy1jMrsvnOOURkAttD+AQ80O8roEeTAXS/JQTDtN3bL/+OijEzTdt36rpsG5FgZogyA9NH+AQ+kPCojYy2yC0mO6o2MMrKDSaaUKHOkd54oAyBltH/AAylEmd6bR+TgGClP9P++hJXRwiP68103DcjJTfqxMrvueKz9xm6VXY70zsv/5VBiogyApqL9Ax5I52TsrpsG2q5bP7DuF3tvHpH/yPPtN3Z33TSw7dZPyh4lFVn0w367bhqQ6eVsJjUTdVI3UQZAk9D+AQ+kdom8A3e9tOuOx/Z0fUaNrEiZ7X5h262f1LOL/n/jmSO987vueGzXHY8ZMyHKAGgG2j/gAR+v9ptmIcoArYz2D3iAKEOUARCH9g94gChDlAEQh/YPeIAoQ5QBEIf2D3iAKEOUARCH9g94gChDlAEQh/YPeIAoQ5QBEIf2D3iAKEOUARCH9g94gChDlAEQh/YPeIAoQ5QBEIf2D3iAKEOUARCH9g94gChDlAEQh/YPeIAoQ5QBEIf2D3iAKEOUARCH9g94oPeuvgDx1uTW2K4iANYQZQAk1tHRcfXqVdtLAQCLi0QZANeAKAPAHUQZAIkRZQC4gygDIDGiDAB3EGUAJEaUAeAOogyAxIgyANxBlAGQGFEGgDuIMgASI8oAcAdRBkBiRBkA7iDKAEiMKAPAHUQZAIkRZQC4gygDILFaosynX/lmKssCoNURZQAkVkuU6dl/NpVlAdDqiDIAEiPKAHAHUQZAYkQZAO4gygBIjCgDwB1EGQCJEWUAuIMoAyAxogwAdxBlACRGlAHgDqIMgMSIMgDcQZQBkBhRBoA7iDIAEiPKAHAHUQZAYkQZAO4gygBIjCgDwB1EGQCJEWUAuIMoAyAxogwAdxBlACRGlAHgDqIMgMSIMgDcQZQBkBhRBoA7iDIAEiPKAHAHUQZAYkQZAO4gygBIjCgDwB1EGQCJEWUAuIMoAyAxogwAdxBlACRGlAHgDqIMgMSIMgDcQZQBkBhRBoA7iDIAEiPKAHAHUQZAYkQZAO4gygBIjCgDwB1EGQCJEWUAuIMoAyAxogwAdxBlACRGlAHgDqIMgMSIMgDcQZQBkBhRBoA7iDIAEiPKAHAHUQZAYkQZAO4gygAe2DE8GPimZ//Z1D6rY+MG21UEwBqiDOCBjttvufrVYPGyT6Vn/9nUPisI6MqA1kX7BzxAlCHKAIhD+wc8QJQhygCIQ/sHPECUIcoAiEP7BzxAlCHKAIhD+wc8QJQhygCIQ/sHPECUIcoAiEP7BzxAlCHKAIhD+wc8QJQhygCIQ/sHPECUIcoAiEP7BzxAlCHKAIhD+wc84GOUebj4OaIMgBTQ/gEPNDvKXDgRPDwcbO8LDk0E3z+/lEWGY189NBG8u1B69dW58pTGSw8Pl/9PlAHQJLR/wANNjTKX5oPNheDSfPD2meDVuWBzofS8/Cfy1WdmghOHy3llc6EcWdTbF46V0g9RBkBT0f4BDzQ1ypw4HDwzU36ohl4klES+emm+PBKzvS84cTh4da6Ue/TnL80H2/uIMgCai/YPeKCpUeb754PNheDQRLBwrLx3SUWZyq9emi/tUZIE88xMsHAsWLwcvLtQCjHyRqIMgOah/QMeSOGwXznkZXOhPKyidhVFvrq9L3h3IXhmJrg0X554e18p7qg9UBdOpDEwQ5QBWhntH/BAU6OMcWTuoYnS3iJJJ3GvnjhcOhpGnn94eNnuJAk9UuRQG6IMgCah/QMeaGqUOTRRPoZ38XLwzMyyKBP36ttnSklFnl84Fjw8XDqqRv6v3nLicNMP/iXKAK2M9g94oNnHymzvCx4eDk4cLp10vbg0slLhVZlApRw5pEZGXx4eXnZ8jLxElAHQJLR/wAMpHCsj51q/fWbZMxVeXQzte1KvGpNFPkOUAdAotH/AAz5e7TfNQpQBWhntH/AAUYYoAyAO7R/wAFGGKAMgDu0f8ABRhigDIA7tH/AAUYYoAyAO7R/wAFGGKAMgDu0f8ABRhigDIA7tH/AAUYYoAyAO7R/wAFGGKAMgDu0f8ABRhigDIA7tH/AAUYYoAyAO7R/wAFGGKAMgDu0f8ABRhigDIA7tH/AAUYYoAyAO7R/wwNb+LQHitd202nYVAbCGKAMAADxGlAEAAB4jygAAAI8RZQAAgMeIMgAAwGNEGQAA4DGiDAAA8BhRBgAAeIwoAwAAPEaUAQAAHiPKAAAAj/1/MP3IF4zBeBAAAAAASUVORK5CYII=" alt="" width="459" height="487" /></p>', '3.1'),
(5, '<p>Assalamualaikum Warrahmatullahi Wabarakatuh,</p>\r\n<p>Puji syukur kita panjatkan kehadirat Allah SWT, atas segala nikmat dan karuniaNya kepada kita semua sehingga kita masih dikasih kesempatan untuk berpartisipasi secara aktif untuk dunia pendidikan di indonesia.</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Di era modern dan globalisasi ini, kebutuhan akan informasi dan pemanfaatan sarana komunikasi ini sangatlah penting dalam bagian untuk menggerakan dunia pendidikan ini untuk program sekolah terutama di sekolah menengah pertama ini, mewujudkan iklim yang baik antar siswa maupun dewan guru di sekolah menengah pertama ini, serta membuka pintu komunikasi yang lebih dari sebelumnya, dan satu hal lagi sebagai media promosi atau publikasi sekolah kepada masyarakat luas.</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kami keluarga besar SMP 2 Cikande merasa bersyukur, karena atas izinNya kita telah menyediakan fasilitas website sekolah. Serta di desain semenarik mungkin agar para calon siswa tertarik untuk mendaftar di sekolah kami ini. Hal ini bertujuan agar semua masyarakat mengetahui secara rinci tentang pendidikan sekolah ini.</p>\r\n<p>Kesempatan kali ini, saya dan keluarga besar SMP 2 Cikande mengucapka rasa terima kasih terhadap semua orang yang terlibat dalam penyelesaian website ini, sebagaimana yang tadi saya sebutkan. Semoga website dapat di pergunakan dengan sebaik-baiknya oleh pihak sekolah dan admin di website ini.</p>\r\n<p style="text-align: justify;"><span><br /> <br /> Kepala </span><span>SMP Negeri 2 Cikande</span><br /><span> <br /> <br /> <br /><strong>&nbsp; <span style="text-decoration: underline;"><span></span></span></strong></span><span style="text-decoration: underline;"><strong>Riyadi Santosa, M.Pd</strong></span></p>', '1.1'),
(6, '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff; display: inline !important; float: none;">SMP Negeri 2 Cikande awal mulanya adalah kelas jauh dari SMP Negeri 1 Cikande. Lokasinya menumpang di SDN Baluk dan SDN Nambo Udik 1. Sekolah ini berdiri pada tahun 1999 dengan nama pada mulanya SLTPN 3 Cikande. Kemudian pada bulan Februari 2000 diangkat kepala sekolah pertama yaitu Bpk. Uus Ruhyadi, M.Pd.</span></p>\r\n<div style="color: #222222; font-family: arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;">Kemudian pada tahun 2002 berubah nama menjadi SMPN 2 Cikande setelah Kecamatan Cikande dimekarkan dengan Kecamatan Kibin yang pada saat itu nama SMPN 2 Cikande berada di wilayah Kecamatan Kibin berubah menjadi SMPN 1 Kibin, dan SMPN 3 Cikande yang semula adalah sekolah ini berubah menjadi SMPN 2 Cikande seperti sekarang ini.</div>\r\n<div style="color: #222222; font-family: arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;"></div>\r\n<div style="color: #222222; font-family: arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; background-color: #ffffff;">SMPN 2 Cikande adalah sekolah yang berlokasi di Jalan Otonom Cikande - Pamarayan Km. 6,5 Kp. Baluk Ds. Nambo Udik Kec. Cikande Kab. Serang terletak diantara SDN Nambo Udik 1 disebelah barat berada di Kp. Ampel dan SDN Baluk disebelah timur berada di Kp. Baluk Peusar.</div>', '1.3'),
(8, '<p><span> </span><span style="font-size: small; font-family: times new roman,times;">Berbagai fasilitas dimiliki SMP Negeri 2 Cikande untuk menunjang kegiatan belajar-mengajar. Fasilitas tersebut antara lain:</span></p>\r\n<p>1. Laboratorium Komputer</p>\r\n<p>2. Ruang Kelas Memadai</p>\r\n<p>3. Sarana Ibadah (Masjid)</p>\r\n<p>4. Sarana Olahraga</p>\r\n<p>5. Labotarium Fisika memadai</p>\r\n<p>6. Labotarium Biologi memadai</p>\r\n<p>7. Ruangan OSIS</p>\r\n<p>8. Ruangan Perpustakaan</p>', '2.1'),
(9, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '2.2'),
(11, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '3.3'),
(12, '<p><span style="font-size: large;"><strong>Penerimaan Siswa Baru TA 2013/2014</strong></span></p>\r\n<p><span style="font-weight: bold; font-size: medium;"><em>Syarat-Syarat untuk mendaftar di SMP Negeri 2 Cikande :</em></span></p>\r\n<ol>\r\n<li><span style="font-family: times new roman,times; font-size: small;">Menyerahkan fotokopi Ijazah SD/SDIT yang telah dilegalisir atau menyerahkan surat keterangan lulus dari <span style="font-family: times new roman,times; font-size: small;">SD/SDIT</span></span></li>\r\n<li><span style="font-family: times new roman,times; font-size: small;">Pas foto hitam putih/berwarna ukuran 3x4 cm sebanyak 4 lembar</span></li>\r\n<li><span style="font-family: times new roman,times; font-size: small;">Usia pada bulan juli 2014 <br /></span></li>\r\n<li><span style="font-family: times new roman,times; font-size: small;">Semua persyaratan di masukan dalam stopmap merah</span></li>\r\n<li><span style="font-family: times new roman,times; font-size: small;"><span style="font-family: times new roman,times; font-size: small;"><strong></strong>Membayar biaya sebesar Rp 150.000,00 pada saat daftar ulang</span><strong></strong></span></li>\r\n</ol>\r\n<p><strong><br /><span style="font-size: medium;">&nbsp; Informasi dan Tempat Pendaftaran</span></strong></p>\r\n<p><strong><span style="font-size: medium;"><span style="font-size: small;">&nbsp;&nbsp;&nbsp; Tempat Pendaftaran</span></span></strong></p>\r\n<p><span style="font-size: medium;"><span style="font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp; 1. SMP Negeri 2 Cikande<br /></span></span></p>\r\n<p><span style="font-size: medium;"><span style="font-size: small;"><strong>&nbsp;&nbsp;&nbsp;&nbsp; Waktu Pendaftaran</strong></span></span></p>\r\n<p><span style="font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. Gelombang 1 :</span></p>\r\n<p><span style="font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pendaftaran&nbsp;&nbsp; 20 April s.d. 20 Mei 2014</span></p>\r\n<p><span style="font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ujian Masuk&nbsp;&nbsp; 21 Mei 2014</span></p>\r\n<p><span style="font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Daftar Ulang&nbsp; 22 Mei s.d. 27 Mei 2014</span></p>\r\n<p><span style="font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp; 2. Gelombang 2 :</span></p>\r\n<p><span style="font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pendaftaran&nbsp;&nbsp; 28 Mei s.d. 22 Juni 2014</span></p>\r\n<p><span style="font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ujian Masuk&nbsp;&nbsp; 23 Juni 2014</span></p>\r\n<p><span style="font-size: medium;"><span style="font-size: small;"><span style="font-size: small;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Daftar Ulang&nbsp; 24 Juni s.d. 29 Juni 2014</span><strong><span style="font-size: x-small;"><br /></span></strong></span></span></p>', '4.2'),
(13, '<ol>\r\n<li><span style="font-size: small; color: #000080;">sepak bola</span></li>\r\n<li><span style="font-size: small; color: #000080;">volley ball</span></li>\r\n<li><span style="font-size: small; color: #000080;">futsal</span></li>\r\n<li><span style="font-size: small; color: #000080;">tenis meja</span></li>\r\n<li><span style="font-size: small; color: #000080;">basket ball</span></li>\r\n<li><span style="font-size: small; color: #000080;">bulu tangkis</span></li>\r\n</ol>', '5.1'),
(34, '<p>Konten belum tersedia, silahkan mengunjungi kembali.</p>', '5.3'),
(33, '<p>Konten belum tersedia, silahkan mengunjungi kembali.</p>', '5.2');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `judul_file` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `author` int(10) NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul_file`, `nama_file`, `tgl_posting`, `author`) VALUES
(32, 'JCI Banten', '210293073logo1.png', '2014-02-05', 4245),
(33, 'Belajar Modul', '115201127820120522_Modul7-8-9.pdf', '2014-02-13', 4245),
(31, 'Contoh Kata Sambutan', '130375769KATA_SAMBUTAN_new.docx', '2014-02-01', 4245);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_description` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  `image_size` varchar(20) NOT NULL,
  `uploaded_date` date NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_file`, `title`, `image_description`, `image_url`, `file_type`, `image_size`, `uploaded_date`) VALUES
(1, 'Workshop Jeni', 'Workshop program java', 'media/pdf/jeni-intro1-bab05-mendapatkan_input_dari_keyboard.pdf', 'pdf', '0', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(33, 'IX B'),
(32, 'IX A'),
(31, 'VIII C'),
(30, 'VIII B'),
(29, 'VIII A'),
(28, 'VII D'),
(27, 'VII C'),
(26, 'VII B'),
(25, 'VII A');

-- --------------------------------------------------------

--
-- Table structure for table `kepegawaian`
--

CREATE TABLE IF NOT EXISTS `kepegawaian` (
  `id_kepegawaian` int(10) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `kelahiran` varchar(150) NOT NULL,
  `matpel` varchar(100) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kepegawaian`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4248 ;

--
-- Dumping data for table `kepegawaian`
--

INSERT INTO `kepegawaian` (`id_kepegawaian`, `nip`, `nama_pegawai`, `kelahiran`, `matpel`, `jk`, `status`, `username`, `password`, `gambar`) VALUES
(1, '1031058 ', 'Sastra Prajat SH', 'Serang, 04 Oktober1986', 'Komputer', 'L', 'guru', 'user', '24c9e15e52afc47c225b757e7bee1f9d', 'Sastra.JPG'),
(4247, '1122344', 'Sujar Prihatini S.Pd', 'Jakarta, 23 November 1965', 'IPS', 'P', 'guru', 'sujar', '576edb38c1aa825de7ecbd7b0d05395d', 'Sujar.JPG'),
(4245, 'xxxxx', 'Hergi Priyambodo S.Kom', 'Jakarta, 26 Maret1992', 'Komputer', 'L', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '111111.jpg'),
(4243, '4243', 'Hudari S.Ag', 'Serang, 06 September 1972', 'Agama Islam', 'L', 'guru', 'hudari', 'f96ea7d22e27ccfb9920f1c7d0a06076', 'Hudari.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` char(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `id_parent` char(10) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `id_parent`, `level`) VALUES
('1', 'Profil', '0', 0),
('1.1', 'Sambutan Kepala Sekolah', '1', 1),
('1.2', 'Visi, Misi dan Tujuan', '1', 1),
('1.3', 'Sejarah Sekolah', '1', 1),
('2', 'Fasilitas ', '0', 0),
('2.1', 'Sarana dan Prasarana', '2', 1),
('2.2', 'Peta Lokasi Sekolah', '2', 1),
('3', 'Guru', '0', 0),
('3.1', 'Struktur Organisasi Sekolah', '3', 1),
('3.4', 'Data Guru ', '3', 1),
('3.3', 'Komite Sekolah', '3', 1),
('4', 'Siswa', '0', 0),
('4.1', 'Data Siswa', '4', 1),
('4.2', 'Info Penerimaan Siswa Baru', '4', 1),
('5', 'Ekstra Kurikuler', '0', 0),
('5.1', 'Olah Raga', '5', 1),
('5.3', 'Pramuka', '5', 1),
('5.2', 'Paskriba', '5', 1),
('8', 'PSB', '0', 10),
('6', 'Berita', '0', 10),
('7', 'Download Materi', '0', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE IF NOT EXISTS `pendaftar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `penghasilan` varchar(100) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `release` datetime NOT NULL,
  `status` enum('Pendaftar') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan`, `alamat_ortu`, `release`, `status`) VALUES
(19, 'Saepuloh', 'Laki-laki', 'Brebes', '12 Desember 1990', 'Abdul Puloh', 'Ani Puloh', 'Pengusaha', 'Ibu Rumah Tangga', 'Rp 2.000.000 >', 'Ketanggungan Brebes', '2014-02-01 03:23:00', 'Pendaftar'),
(20, 'Dea Putri Salsa Bella Ardenti', 'Perempuan', 'Yogyakarta', '17 Agustus 2000', 'Sukijo', 'Tri Susanti', 'Pegawai Negeri Sipil', 'Pedagang', 'Rp 1.000.000 - Rp 2.000.000', 'Panjatan', '2014-02-01 03:45:00', 'Pendaftar');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,
  `judul_pengumuman` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi`, `tanggal`, `penulis`) VALUES
(1, 'Peresmian dan Launching Website Perdana SMP Negeri 1 Cikande', '<p>Peresmian dan launching website resmi SMP Negeri 2 Cikande akan  diadakan pada hari 23 Desember 2014 pukul 10.00, bertepatan dengan  pembagian raport semester ganjil tahun ajaran 2014-2015</p>', '2014-01-25', 'admin'),
(2, 'Pembagian Raport', '<p><span>Menjelang berakhirnya proses belajar-mengajar di semester ganjil  tahun ajaran 2014-2015, maka akan diadakan pembagian hasil  belajar/raport pada tanggal 23 Desember 2014 pukul 07.30 WIB.<br /> Yang bertempat di SMP Negeri 2 Cikande. Raport diambil oleh orang tua/wali kelas murid masing-masing.</span></p>', '2014-01-25', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pesan` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'N',
  `tgl_posting` datetime NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `pesan`, `status`, `tgl_posting`) VALUES
(7, 'Ririn Indah Widiani', 'ririn@gmail.com', 'semangat yaa sayang, i love you so much', 'N', '2014-01-31 06:49:00'),
(6, 'wildan', 'sajhdfgjs@yahoo.com', 'ok', 'N', '2013-06-17 03:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int(10) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(10) NOT NULL,
  `nis` varchar(9) NOT NULL,
  `nama_siswa` varchar(150) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nis`, `nama_siswa`) VALUES
(31, 25, '12.1.0474', 'Budi Aryanto'),
(30, 25, '12.1.0473', 'Asih Pinastika'),
(29, 25, '12.1.0472', 'Ahmaf Fatuhroji'),
(28, 25, '12.1.0471', 'Abdul Kholil'),
(69, 32, '12.2....', 'Ade Epah Sriwahyuningsih'),
(33, 0, '13345', 'gfgfgfgf'),
(43, 26, '12.1.0507', 'Apriyanto Susilo'),
(47, 27, '12.1.0539', 'Ahmad Adi S'),
(36, 25, '12.1.0475', 'Daniah Kurniasih'),
(37, 25, '12.1.0476', 'Dewi Kartika Sari'),
(38, 26, '12.1.0505', 'Abdul Rohman'),
(39, 26, '12.1.0506', 'Ade Sofi M'),
(41, 26, '12.1.0508', 'Ardian Bangkit M'),
(42, 26, '12.1.0509', 'Asnah Kusnayani'),
(44, 26, '12.1.0510', 'Casripah'),
(45, 26, '12.1.0511', 'Darti'),
(46, 27, '12.1.0538', 'Agung Ma''arif P'),
(48, 27, '12.1.0540', 'Andi Priyanto'),
(49, 27, '12.1.0541', 'Asep Wahyudi'),
(50, 27, '12.1.0542', 'Cahyaningrum'),
(51, 27, '12.1.0543', 'Cici Afiyatun I'),
(52, 27, '12.1.0544', 'Devi Lutfiana'),
(53, 27, '12.1.0545', 'Diana'),
(54, 28, '12.2.0396', 'Adji Supriadi'),
(55, 28, '12.2.0397', 'Agung Prasetya'),
(56, 28, '12.2.0398', 'Ahmad Rifai'),
(57, 28, '12.2.0399', 'Ahmad Rozikin'),
(58, 28, '12.2.0340', 'Ahmad Saefulloh'),
(59, 29, '12.2.0430', 'Abdul Jaelani'),
(60, 29, '12.2.0431', 'Ahmad Wahidin'),
(61, 29, '12.2.0432', 'Ali Priadi'),
(62, 29, '12.2.0433', 'Andhika Panji Hartanto'),
(63, 29, '12.2.0434', 'Armada Sandra G'),
(64, 33, '12.13....', 'Akhmad Ghozali'),
(65, 33, '12.3....', 'Akhmad Faozan'),
(66, 33, '12.3....', 'Aris Supriyanto'),
(67, 33, '12.3...', 'Bahrul Ulum'),
(70, 32, '12.2....', 'Adi Tiyawan'),
(71, 32, '12.2..', 'Ahmad Ari Fauzan'),
(72, 32, '12.2.....', 'Ali Pujahidin'),
(73, 32, '12.2..', 'Anisa Rizki Hidayati'),
(74, 32, '12.2....', 'Anita Tati Purwanti'),
(75, 30, '12', 'Fathulloh'),
(76, 30, '12.1', 'Sofiyatun Nurma sari'),
(77, 30, '12.1', 'Bunga Cinta'),
(78, 30, '12.1', 'Cyntia Rosiansah'),
(79, 31, '12.2', 'Agus soleh'),
(80, 31, '12.1', 'Aninditya Putri'),
(81, 31, '12.2', 'Ema Nurmala');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
