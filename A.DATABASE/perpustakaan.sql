-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2021 pada 13.16
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(255) NOT NULL,
  `nama_buku` varchar(20) NOT NULL,
  `jenis_buku` varchar(20) NOT NULL,
  `stok_buku` int(255) NOT NULL,
  `status_buku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `jenis_buku`, `stok_buku`, `status_buku`) VALUES
(1, 'BIOLOGI 1', 'SAINS', 201, 'TIDAKLENGKAP'),
(3, 'BIOLOGI 3', 'SAINS', 340, 'LENGKAP'),
(5, 'ATOM 1', ' SAINS', 120, 'TIDAK LENGKAP'),
(6, 'ATOM 2', 'SAINS', 250, 'TIDAK LENGKAP'),
(8, 'ATOM 4', 'SAINS', 180, 'TIDAK LENGKAP'),
(9, 'ATOM 5', 'SAINS', 200, 'LENGKAP'),
(10, 'MOLEKUL', 'SAINS', 200, 'LENGKAP'),
(12, 'HARRY POTHER 1', 'NOVEL', 210, 'FAVORIT'),
(13, 'HARRY POTHER 2', 'NOVEL', 220, 'LENGKAP'),
(14, 'HABIBIE DAN AINUN ', 'NOVEL', 230, 'FAVORIT'),
(15, 'HARRY POTHER 4', 'NOVEL', 240, 'LENGKAP'),
(16, 'THE HOOBIT', 'NOVEL', 250, 'FAVORIT'),
(17, 'TALE OF SEAKING', 'NOVEL', 260, 'FAVORIT'),
(18, 'SASUKE PUNDEN 1', 'NOVEL', 250, 'LENGKAP'),
(19, 'SASUKE PUNDEN 2', 'NOVEL', 250, 'LENGKAP'),
(20, 'SASUKE PUNDEN ', 'NOVEL', 250, 'LENGKAP'),
(21, 'DETECTIVE CONAN  ', 'KOMIK', 200, 'FAVORIT'),
(22, 'DETECTIVE CONAN 2', 'KOMIK', 210, 'FAVORIT'),
(23, 'CONAN 1', 'KOMIK', 220, 'LENGKAP'),
(24, 'CONAN 2', 'KOMIK', 230, 'LENGKAP'),
(25, 'CONAN', 'KOMIK', 240, 'LENGKAP'),
(26, 'RAGAM HIAS', 'SENI', 250, 'LENGKAP'),
(27, 'RAGAM HIAS 2', 'SENI', 260, 'LENGKAP'),
(28, 'RAGAM HIAS 3', 'SENI', 250, 'LENGKAP'),
(29, 'RAGAM HIAS 4', 'SENI', 250, 'LENGKAP'),
(30, 'RAGAM HIAS 5', 'SENI', 200, 'LENGKAP'),
(32, 'LIBERALISME', 'PANCASILA', 210, 'LENGKAP'),
(33, 'DASAR NEGARA', 'PANCASILA', 220, 'LENGKAP'),
(34, 'SILA 1', 'PANCASILA', 230, 'LENGKAP'),
(35, 'MATEMATIKA PROFESOR', 'MATEMATIKA', 240, 'LENGKAP'),
(38, 'DOA 3', 'AGAMA', 250, 'LENGKAP'),
(39, 'DOA 4', 'AGAMA', 250, 'LENGKAP'),
(40, 'DOA 5', 'AGAMA', 200, 'LENGKAP'),
(42, 'INGGRIS SEMESTER 2', 'INGGRIS', 210, 'LENGKAP'),
(43, 'INGGRIS SEMESTER 3', 'INGGRIS', 220, 'LENGKAP'),
(44, 'INGGRIS SEMESTER 4', 'INGGRIS', 220, 'LENGKAP'),
(45, 'INGGRIS SEMESTER 5', 'INGGRIS', 220, 'LENGKAP'),
(46, 'INGGRIS SEMESTER 6', 'INGGRIS', 220, 'LENGKAP'),
(47, 'SPEAKING 1', 'INGGRIS', 220, 'LENGKAP'),
(48, 'SPEAKING  2', 'INGGRIS', 220, 'LENGKAP'),
(49, 'SPEAKING  3', 'INGGRIS', 220, 'LENGKAP'),
(50, 'SPEAKING  4', 'INGGRIS', 220, 'LENGKAP'),
(51, 'SPEAKING  5', 'INGGRIS', 220, 'LENGKAP'),
(52, 'TENCES 1', 'INGGRIS', 220, 'LENGKAP'),
(53, 'TENCES 2', 'INGGRIS', 220, 'LENGKAP'),
(54, 'TENCES 3 ', 'INGGRIS', 220, 'LENGKAP'),
(55, 'PUBLIC SPEAKING', 'INGGRIS', 215, 'LENGKAP'),
(57, 'DIKSI 1', 'INDONESIA', 200, 'LENGKAP'),
(58, 'DIKSI 2', 'INDONESIA', 200, 'LENGKAP'),
(59, 'DIKSI 3', 'INDONESIA', 200, 'LENGKAP'),
(60, 'DIKSI 4', 'INDONESIA', 200, 'LENGKAP'),
(61, 'DPIDATO PROF 1', 'INDONESIA', 200, 'LENGKAP'),
(62, 'DPIDATO PROF 2', 'INDONESIA', 200, 'LENGKAP'),
(63, 'DPIDATO PROF 3', 'INDONESIA', 200, 'LENGKAP'),
(64, 'DPIDATO PROF 4', 'INDONESIA', 200, 'LENGKAP'),
(65, 'DPIDATO PROF 5', 'INDONESIA', 200, 'LENGKAP'),
(68, 'SEJARAH NUSANTARA 2', 'SEJARAH', 200, 'LENGKAP'),
(69, 'SEJARAH NUSANTARA 3', 'SEJARAH', 200, 'LENGKAP'),
(70, 'SEJARAH NUSANTARA 4', 'SEJARAH', 200, 'LENGKAP'),
(71, 'SEJARAH NUSANTARA 6', 'SEJARAH', 200, 'LENGKAP'),
(72, ' ', 'SEJARAH', 200, 'LENGKAP'),
(73, 'SEJARAH NUSANTARA 7', 'SEJARAH', 200, 'LENGKAP'),
(75, 'OTOMOTIF BERAT 2', 'TEKNOLOGI', 200, 'LENGKAP'),
(76, 'OTOMOTIF BERAT 3', 'TEKNOLOGI', 200, 'LENGKAP'),
(77, 'OTOMOTIF BERAT 4', 'TEKNOLOGI', 200, 'LENGKAP'),
(78, 'OTOMOTIF BERAT 5', 'TEKNOLOGI', 200, 'LENGKAP'),
(79, 'KELISTRIKAN 1', 'TEKNOLOGI', 200, 'LENGKAP'),
(80, 'KELISTRIKAN 2', 'TEKNOLOGI', 200, 'LENGKAP'),
(81, 'KELISTRIKAN 3', 'TEKNOLOGI', 200, 'LENGKAP'),
(82, 'KELISTRIKAN 4', 'TEKNOLOGI', 200, 'LENGKAP'),
(83, 'KELISTRIKAN OTOMOTIF', 'TEKNOLOGI', 200, 'LENGKAP'),
(85, 'BIOGRAFI SISWA 1', 'ALBUM ALUMNI', 200, 'LENGKAP'),
(86, 'BIOGRAFI SISWA 2', 'ALBUM ALUMNI', 200, 'LENGKAP'),
(87, 'BIOGRAFI SISWA TAHUN', 'ALBUM ALUMNI', 200, 'LENGKAP'),
(88, 'DOKUMENTASI 1', 'ARSIP SEKOLAH', 200, 'LENGKAP'),
(89, 'DOKUMENTASI 2', 'ARSIP SEKOLAH', 200, 'LENGKAP'),
(90, 'DOKUMENTASI 4', 'ARSIP SEKOLAH', 200, 'LENGKAP'),
(91, 'DOKUMENTASI 5', 'ARSIP SEKOLAH', 200, 'LENGKAP'),
(93, 'HEART BEAT', 'CERPEN', 50, 'LENGKAP'),
(94, 'TEH SENJA 1', 'CERPEN', 50, 'LENGKAP'),
(95, 'TEH SENJA 2', 'CERPEN', 50, 'LENGKAP'),
(97, 'MACAN PRAJURIT', 'CERITA RAKYAT', 50, 'LENGKAP'),
(98, 'RADJO LANGIT', 'CERITA RAKYAT', 50, 'LENGKAP'),
(99, 'BABAD TANAH JAWA', 'CERITA RAKYAT', 50, 'LENGKAP'),
(100, 'LEGENDA BANYUMAS', 'CERITA RAKYAT', 50, 'TIDAKLENGKAP'),
(105, 'HEART BEAT IV', 'NOVEL', 150, 'LENGKAP'),
(117, 'BIOLOGI 2', 'NOVEL', 200, 'LENGKAP'),
(118, 'BIOLOGI 6', 'SAINS', 12, 'TIDAK LENGKAP'),
(119, 'BIOLOGI 7', 'SAINS', 200, 'LENGKAP'),
(121, 'BIOLOGI 4', 'AGAMA', 150, 'TIDAK LENGKAP'),
(122, 'BIOLOGI 9', 'SAINS', 12, 'TIDAK LENGKAP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(100) NOT NULL,
  `ussername` varchar(20) NOT NULL,
  `isi_komentar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `ussername`, `isi_komentar`) VALUES
(1, 'ragil', 'bu kalo telat bagaimanA ?\r\n\r\n'),
(17, 'petugas_perpus', 'hore\r\n'),
(22, 'andri', 'okeoke\r\n'),
(26, 'petugas_perpus', 'ngga papa , yang penting ganti 100 ribu\r\nahahaha'),
(27, 'andri', 'betul tuh\r\n'),
(37, 'andri', 'oia'),
(45, 'petugas_perpus', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `isi_notifikasi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `isi_notifikasi`) VALUES
(1, 'Untuk Pengembalian Buku Semester 2 kelas 12 tgl 12 Desember 2021 wajib bawa kartu perpustakaan'),
(2, 'Para siwa yang meminjam buku Ensiklopedia islam harap segera dikembalikan \r\npaling lambat 15 Desember 2021\r\nkarena akan ada perhitungan ulang dan pengecekan'),
(4, 'Untuk Pengembalian Buku Semester 1 kelas 10  tgl 9 Desember 2021 wajib bawa kartu perpustakaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(225) NOT NULL,
  `ussername` varchar(20) NOT NULL,
  `id_buku` int(225) NOT NULL,
  `jumlah` int(225) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `ussername`, `id_buku`, `jumlah`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`) VALUES
(42, 'andri', 3, 50, '2021-10-01', '0000-00-00', 'belum dikonfirmasi'),
(43, 'ragil', 6, 20, '2021-10-07', '0000-00-00', 'belum dikonfirmasi'),
(44, 'beni', 3, 400, '2021-10-07', '0000-00-00', 'belum dikonfirmasi'),
(45, 'keysya', 55, 5, '2021-10-06', '2021-10-15', 'DI KONFIRMASI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `ussername` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `ussername`, `password`) VALUES
(13, 'admin2', '$2y$10$NjxDVBMAkitYms70kaMYze43p04YwUbJZnV6Ord97ZSPNzyzspj6y'),
(14, 'admin', '$2y$10$IZ/gZGdSIxuUopOpk0/DJ.4vVe.Dfq1hG9Eak.WgkbPzx9A8j44HG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usser`
--

CREATE TABLE `usser` (
  `id_usser` int(11) NOT NULL,
  `ussername` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_perpus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `usser`
--

INSERT INTO `usser` (`id_usser`, `ussername`, `password`, `status_perpus`) VALUES
(5, 'andri', '$2y$10$nUST06A1BEntQ9gIWSB5b.QC583eSsopSC..gi2p4HChnhXyXoqES', 'MENUNGGU KONFIRMASI'),
(7, 'ragil', '$2y$10$j.SrEP1R9NCANKMxucFIjOJhU.E47edjRm7F3/WSLkhet4NybcNsK', 'MENUNGGU KONFIRMASI'),
(10, 'keysya', '$2y$10$1HH7r0GMtsABQMuWofl.jeOoge//6.U9wyPO674tUapyi.vnEUxD.', 'MEMINJAM'),
(19, 'beni', '$2y$10$OH1SFY0S42/2ow5vqUpD2e2fV7ZVlAjosA9mn7trVZ9hSeZTVIwX6', 'MENUNGGU KONFIRMASI');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `usser`
--
ALTER TABLE `usser`
  ADD PRIMARY KEY (`id_usser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `usser`
--
ALTER TABLE `usser`
  MODIFY `id_usser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `id_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
