-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2021 pada 14.52
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apoteksukunfarma_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `batch_obat`
--

CREATE TABLE `batch_obat` (
  `id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `kode_batch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `batch_obat`
--

INSERT INTO `batch_obat` (`id`, `obat_id`, `kode_batch`) VALUES
(9, 7, 'NO00210'),
(10, 6, 'PR440000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `nama_distributor` varchar(100) NOT NULL,
  `alamat_distributor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id`, `nama_distributor`, `alamat_distributor`) VALUES
(1, 'Kimia Farma', 'Jl. Jakarta No. 59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id` int(11) NOT NULL,
  `jenis_pengeluaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`id`, `jenis_pengeluaran`) VALUES
(3, 'Gaji Karyawan'),
(4, 'Listrik'),
(5, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(2, 'Sirup'),
(6, 'Tetes Telinga'),
(7, 'Tetes Mata'),
(8, 'Kapsul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komparasi_satuan_obat`
--

CREATE TABLE `komparasi_satuan_obat` (
  `id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `satuan_awal_id` int(11) NOT NULL,
  `satuan_akhir_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komparasi_satuan_obat`
--

INSERT INTO `komparasi_satuan_obat` (`id`, `obat_id`, `satuan_awal_id`, `satuan_akhir_id`, `jumlah`) VALUES
(2, 5, 1, 1, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `kode_obat`, `nama`, `harga_jual`, `kategori_id`) VALUES
(6, 'PRCTML8888', 'Paracetamol', 1040001, 2),
(7, 'DGNT4455', 'Digenta', 104000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_detail`
--

CREATE TABLE `obat_detail` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `waktu_expired` date NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat_detail`
--

INSERT INTO `obat_detail` (`id`, `batch_id`, `obat_id`, `distributor_id`, `waktu_expired`, `harga_beli`, `stock`) VALUES
(3, 9, 7, 1, '2021-06-30', 9600, 5),
(4, 10, 6, 1, '2021-04-16', 9600, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_resep`
--

CREATE TABLE `obat_resep` (
  `id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `resep_id` int(11) NOT NULL,
  `satuan_obat_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat_resep`
--

INSERT INTO `obat_resep` (`id`, `obat_id`, `resep_id`, `satuan_obat_id`, `qty`) VALUES
(1, 6, 7, 1, 9),
(2, 5, 7, 2, 88),
(3, 5, 8, 1, 4),
(4, 6, 8, 3, 3),
(5, 6, 7, 1, 2),
(6, 6, 9, 1, 88),
(9, 5, 10, 3, 7),
(10, 6, 11, 3, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_transaksi`
--

CREATE TABLE `obat_transaksi` (
  `id` int(11) NOT NULL,
  `tipe_transaksi` enum('non resep','resep') NOT NULL,
  `resep_id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `obat_detail_id` int(11) NOT NULL,
  `satuan_obat_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `jenis_pengeluaran_id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `waktu_pengeluaran` date NOT NULL,
  `jumlah_pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `jenis_pengeluaran_id`, `keterangan`, `waktu_pengeluaran`, `jumlah_pengeluaran`) VALUES
(2, 5, 'Sewa Kamar', '2021-05-20', 2100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `alamat_pasien` varchar(255) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `no_rekam_medis` varchar(100) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `nama_klinik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id`, `nama_pasien`, `alamat_pasien`, `no_telepon`, `no_rekam_medis`, `nama_dokter`, `nama_klinik`) VALUES
(11, 'Ibu Marfuah', 'hgytu', '0887765544', '13378', 'Dr. Cinta', 'klinik cinta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Kasir'),
(3, 'Superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_obat`
--

CREATE TABLE `satuan_obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan_obat`
--

INSERT INTO `satuan_obat` (`id`, `nama`) VALUES
(1, 'Strip'),
(2, 'Box'),
(3, 'Tablet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role_id`, `email`, `password`, `nama`, `no_hp`, `alamat`) VALUES
(2, 2, 'ngetest@kasir.com', '$2y$10$6VV0wGXUHD2.bNBDSVrGCuVhrFLeGg1CB2MC1Yl/CbbrP9OyO0x2W', 'dinda', '0888787787', 'tftrdres'),
(3, 1, 'ngetest@admin.com', '$2y$10$yv9xqjAwOAKfVC5zLfFPkut.m50xa9PMDDyURcODcxboFbHHNwKRy', 'FIRHAN ELEK', '0888787787', 'rrrrr'),
(4, 3, 'ngetest@superadmin.com', '$2y$10$D9/biZFpevUNvFmEFrRr8.mvCo.GaweTKlB20/QGdzsuPDqA.HhZ6', 'Dindut Cantik', '082233669635', 'Jl. Jalan Ke kota Batu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `batch_obat`
--
ALTER TABLE `batch_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obat - batchobat` (`obat_id`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komparasi_satuan_obat`
--
ALTER TABLE `komparasi_satuan_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obat - kategori` (`kategori_id`);

--
-- Indeks untuk tabel `obat_detail`
--
ALTER TABLE `obat_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail - batch` (`batch_id`),
  ADD KEY `detail - obat` (`obat_id`);

--
-- Indeks untuk tabel `obat_resep`
--
ALTER TABLE `obat_resep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat_transaksi`
--
ALTER TABLE `obat_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan_obat`
--
ALTER TABLE `satuan_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user - transaksi` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user - role` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `batch_obat`
--
ALTER TABLE `batch_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `komparasi_satuan_obat`
--
ALTER TABLE `komparasi_satuan_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `obat_detail`
--
ALTER TABLE `obat_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `obat_resep`
--
ALTER TABLE `obat_resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `obat_transaksi`
--
ALTER TABLE `obat_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `satuan_obat`
--
ALTER TABLE `satuan_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `batch_obat`
--
ALTER TABLE `batch_obat`
  ADD CONSTRAINT `obat - batchobat` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat - kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat_detail`
--
ALTER TABLE `obat_detail`
  ADD CONSTRAINT `detail - batch` FOREIGN KEY (`batch_id`) REFERENCES `batch_obat` (`id`),
  ADD CONSTRAINT `detail - obat` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `user - transaksi` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user - role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
