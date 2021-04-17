-- Adminer 4.8.1-dev MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL AUTO_INCREMENT,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1,	'Jam Tangan Casio',	'Jam Tangan Casio Warna Hitam Ukuran Tangan Orang Dewasa. Beli dan Pamerkan',	'Accessories',	150000,	50,	'jamtangan.jpg'),
(2,	'ASUS ROG Strix - BG65X',	'Asus ROG Strix - BG65X merupakan laptop gaming andalan keluarga cemara dan trendy ditahun 2021. Beli dan Rasakan Khasiatnya Seperti menjadi Seorang Sultan Gaming',	'Elektronik',	16000000,	90,	'rog_2.png'),
(3,	'Sepatu Adidas V8',	'Sepatu Adidas V8 ini merupakan sepatu olahraga yang didesign untuk memenuhi kecepatan anda layaknya ferrari 458 dengan mesin V8. Beli Sekarang',	'Olahraga',	2500000,	18,	'sepatu.jpg'),
(4,	'Jaket Bulu Domba Anak XL',	'Jaket anak ukuran xl berbahan bulu domba import singapore, Cocok digunakan ketika musim panas buat pamer, dan hadiah untuk anak orang. Beli Sekarang',	'Pakaian Anak',	85000,	35,	'jaketanak.png');

DROP TABLE IF EXISTS `tb_invoice`;
CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(205) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1,	'superuser01',	'Jalan Blitar Timur No.177 Surabaya',	'2021-04-14 18:01:07',	'2021-04-15 18:01:07');

DROP TABLE IF EXISTS `tb_pesanan`;
CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(60) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(11) NOT NULL,
  `pilihan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1,	1,	1,	'Jam Tangan Casio',	1,	150000,	'');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1,	'superuser01',	'superuser01@gmail.com',	'team-3.jpg',	'$2y$10$bMdFdt5kq2V.5sSTbwzTjObqBTDUwkz0JXH21tlH2wBsgbkkA9fj2',	2,	1,	1614609035),
(2,	'superadmin01',	'superadmin01@gmail.com',	'superadmin1.jpg',	'$2y$10$JBQHhAIcP3Ph66CsLKnlv.InaRNxTEeil828dlyYTZyJdlTPKk/n.',	1,	1,	1614615323),
(3,	'Anon Visitor',	'anonnonx@gmail.com',	'default.png',	'$2y$10$7nnf.0GvYCdej49gx8mufObhlKAgvG00wDDJ03CL.LFzX1O.pwX1m',	2,	1,	1615482411),
(4,	'Dimas Cloud',	'dimas.xcloud@gmail.com',	'default.png',	'$2y$10$W8ouljgRqdp/jqlZuK//IuaBV/0XAGhm/aFkWN8PkAx3q6mwUhvc2',	2,	1,	1615484044),
(5,	'Tarbaynal Online',	'jhonny.ocnr@gmail.com',	'default.png',	'$2y$10$Or.WOMun.ySrL9i0OWIM0.3llUV0ngS./3X4ETAQ1Sl9DpAL9w0ei',	2,	1,	1615564868),
(6,	'Servatius Adhi',	'servatiusadhi1@gmail.com',	'team-11.jpg',	'$2y$10$DD6zDK5isyBOeWxG/ILAuOgsBHkSDSWV58jbz2t/8Ej9ckfvBQ5iu',	2,	1,	1618402473);

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1,	1,	1),
(2,	1,	2),
(3,	2,	2),
(4,	1,	3),
(6,	2,	4);

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1,	'Admin'),
(2,	'User'),
(3,	'Menu'),
(4,	'Cart'),
(5,	'Pengesahan');

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_role` (`id`, `role`) VALUES
(1,	'Administrator'),
(2,	'Member');

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1,	1,	'Dashboard',	'admin',	'fas fa-fw fa-tachometer-alt',	1),
(2,	2,	'Account Setting',	'user',	'fas fa-fw fa-user',	1),
(3,	2,	'Edit Profile',	'user/edit',	'fas fa-fw fa-user-edit',	1),
(4,	3,	'Menu Controller',	'menu',	'fas fa-fw fa-folder-minus',	1),
(5,	3,	'Submenu Controller',	'menu/submenu',	'fas fa-fw fa-folder-open',	1),
(7,	1,	'Role Management',	'admin/role',	'fas fa-fw fa-users-cog',	0),
(8,	2,	'Change Password',	'user/changePass',	'fas fa-fw fa-unlock-alt',	0),
(9,	4,	'Shopping Cart',	'carting/detail_keranjang',	'fas fa-fw fa-shopping-cart',	1),
(10,	1,	'Product Management',	'data_barang/index',	'fas fa-fw fa-gifts',	1),
(11,	1,	'Invoice Track',	'invoice',	'fas fa-fw fa-file-invoice-dollar',	1);

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3,	'servatiusadhi1@gmail.com',	'2XKoDp/SPEE=',	1618403628);

-- 2021-04-16 18:09:00
