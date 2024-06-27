-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2024 pada 14.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig_map4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(8) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_tiket` varchar(255) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `alamat`, `deskripsi`, `harga_tiket`, `latitude`, `longitude`) VALUES
(53, 'Pantai Sanur', 'Jalan Cemara, Desa Sanur, Denpasar Selatan, Kota Denpasar, Bali ', 'Perahu nelayan penuh warna menghiasi pantai di kota resor ini, dengan galeri, restoran & kuil tua. Pantai Sanur juga dikenal sebagai sunrise beach (pantai untuk melihat matahari terbit)', 'Gratis', '-8.7066771258313', ' 115.26253287771515'),
(54, 'Monumen Bajra Sandhi', 'Jl. Raya Puputan No.142, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80234', 'Monumen terkenal yang penuh dengan ornamen mengenai sejarah rakyat bali dari jaman ke jaman, dengan taman berumput di sekitarnya.', '50.000', '-8.67169', '115.23393'),
(55, 'Taman Werdhi Budaya Art Centre', 'Jl. Nusa Indah No.1, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80236', 'Galeri kerajinan & panggung outdoor untuk pertunjukan tari Bali di tengah gerbang tradisional & paviliun.', 'Gratis', '-8.65503', '115.23387'),
(56, 'Museum Bali', 'Jl. Mayor Wisnu No.1, Dangin Puri, Kec. Denpasar Tim., Kota Denpasar, Bali 80232', 'Pameran seni & sejarah Bali yang menampilkan patung, tekstil, temuan arkeologi & artefak lain.', '10.000', '-8.65742', '115.21860'),
(57, 'Taman Festival Bali, Padang Galak', 'Jl. Padang Galak No.3, Kesiman, Kec. Denpasar Tim., Kota Denpasar, Bali', 'Taman hiburan terbengkalai sejak 1990-an, dikelilingi hutan dan dengan grafiti menghiasi bangunannya.', '10.000', '-8.65565', '115.26643'),
(60, 'Taman Kumbasari', '86V6+FPH, Jl. Ps. Kumbasari, Pemecutan, Kec. Denpasar Bar., Kota Denpasar, Bali', 'Taman yang dirancang dengan indah dan terletak di pusat kota Denpasar, Bali. Taman ini meniru sungai Cheonggyecheon di Seoul dan telah menjadi tempat yang populer bagi penduduk lokal dan wisatawan, berkat lanskap yang indah dan fitur uniknya.', '5.000', '-8.65608', '115.21193'),
(61, 'Taman Lumintang Denpasar', 'Dauh Puri Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80233', 'Taman indah di sekitar danau, dengan jalur joging, taman bermain, dan pertunjukan air mancur tiap akhir pekan.', '5.000', '-8.63570', '115.21289'),
(62, 'Pantai Mertasari', 'Jl. Tirta Empul, Desa Intaran, Kelurahan Sanur, Kecamatan Denpasar', 'Tempat liburan pantai sejuk dengan rekreasi berenang, naik perahu, selancar angin & festival layang-layang.', '20.000', '-8.71248', '115.25178'),
(63, 'Big Garden Corner', 'Sanur, Jl. Bypass Ngurah Rai, Kesiman, Denpasar Selatan, Kota Denpasar, Bali 80237, Indonesia', 'Aneka koleksi patung batu yang dipajang di luar ruangan, dilengkapi taman bermain & restoran.', '75.000', '-8.65364', '115.25348'),
(64, 'Pantai Karang', '8748+HJC, Jl. Pantai Karang, Sanur, Denpasar Selatan, Kota Denpasar, Bali 80225, Indonesia', 'Pantai pasir putih dengan penjaja makanan serta aneka kegiatan & pulau buatan dengan gazebo di lepas pantai.', '20.000', '-8.69309', '115.26649'),
(65, 'Pantai Sindhu', 'Sanur, Denpasar Selatan, Kota Denpasar, Bali, Indonesia', 'Pantai santai untuk berenang & menikmati matahari terbit dengan pertokoan, kafe & penjual makanan di dekatnya.', 'Gratis', '-8.68433', '115.26459'),
(66, 'Pantai Segara Ayu', 'Jl. Segara Ayu No.8, Sanur Kaja, Denpasar Selatan, Kota Denpasar, Bali 80227, Indonesia', 'Pantai ini menawarkan pesona alam yang memesona dengan pasir putihnya yang lembut, air laut yang jernih, dan langit biru yang cerah. Terletak di sebelah timur dari pusat kota Denpasar, Pantai Sagara Ayu menawarkan kedamaian dan ketenangan yang berbeda dari keramaian pantai-pantai populer di sekitarnya.', 'Gratis', '-8.68245', '115.26429'),
(67, 'Bali Camel Ride', 'Jl. Pengembak, Sanur Kauh, Denpasar Selatan, Kota Denpasar, Bali, Indonesia', 'Bali Camel Adventure menawarkan pengalaman berkeliling pantai dengan menaiki unta. Nikmati pemandangan pantai yang indah dari sudut pandang yang berbeda.', '250.000', '-8.71232', '115.24631'),
(68, 'Museum Le Mayeur', '87G7+2FV, Jl. Hang Tuah, Sanur Kaja, Denpasar Selatan, Kota Denpasar, Bali', 'Museum yang intim berisi karya seni Adrien-Jean Le Mayeur, serta koleksi artefak khas Bali miliknya.', '10.000', '-8.67472', '115.26367'),
(69, 'Museum Bung Karno', 'Jl. Raya Puputan No.80, Dangin Puri Klod, Kec. Denpasar Tim., Kota Denpasar, Bali 80234', 'Tempat bersejarah, museum bung karno terletak di daerah blitar yang menyuguhkan potret bapak presiden pertama di indonesia. Tempatnya bersih, indah, dan nyaman. Di luar museum terdapat banyak pedagang kaki lima yang menawarkan pernak pernik dan baju untuk oleh-oleh bagi wisatawan asing maupun lokal.', '50.000', '-8.67225', '115.22552'),
(70, 'Taman Janggan Renon', 'Jl. Raya Puputan No.10, Sumerta Kelod, Kec. Denpasar Tim., Kota Denpasar, Bali 80239', 'Ruang terbuka ramah anak, taman tempat bermain anak-anak dengan banyak pilihan, cocok untuk rehat dan olahraga bersama keluarga.', 'Gratis', '-8.67295', '115.23742'),
(71, 'Upside Down World ', 'Jl. Bypass Ngurah Rai No.762, Pemogan, Denpasar Selatan, Kota Denpasar, Bali 80221', 'Atraksi menyenangkan dan unik yang sempurna untuk kunjungan singkat. Hanya membutuhkan waktu sekitar 20 menit untuk menjelajah, menawarkan banyak kesempatan untuk mengambil beberapa gambar gila yang menantang gravitasi. Tempat yang bagus bagi mereka yang ingin menambahkan sentuhan imajinasi pada petualangan mereka di Bali.', '100.000', '-8.71649', '115.20516'),
(72, 'Bali Wake Park & Aqualand', 'Jl. Raya Pelabuhan Benoa No.7X, Pedungan, Denpasar Selatan, Kota Denpasar, Bali 80222, Indonesia', 'Area wakeboarding di danau seluas 5 hektare, plus infinity pool dengan bar, restoran & toko peralatan.', '200.000', '-8.72387', '115.21483'),
(73, 'Bali Exotic Marine Park', 'Jl. Bali Eksotik No.8, Pedungan, Denpasar Selatan, Kota Denpasar, Bali 80222, Indonesia', ' Dengan kolam lumba-lumba terbesar di Indonesia, tempat ini memberikan pengalaman berinteraksi langsung dengan teman laut cerdas ini, menciptakan hubungan yang berarti.', '330.000', '-8.72386', '115.21649'),
(74, 'Pantai Muntig Siokan Sidakarya', '76MQ+5F8, Sidakarya, Denpasar Selatan, Kota Denpasar, Bali, Indonesia', 'Pantai di Bali ini dikemas bak taman. Di taman ini terdapat pohon cemara dan gazebo sehingga wisatawan dapat menikmati kesejukan meskipun berkunjung ketika cuaca sedang panas terik.', '15.000', '-8.71704', '115.23885');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
