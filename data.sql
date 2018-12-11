-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 11:32 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-fp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Story', 'story', NULL, NULL),
(2, 'Hobby', 'hobby', NULL, NULL),
(3, 'Games', 'games', NULL, NULL),
(4, 'Entertainment', 'entertainment', NULL, NULL),
(5, 'Female', 'female', NULL, NULL),
(6, 'Tech', 'tech', NULL, NULL),
(7, 'Automotive', 'automotive', NULL, NULL),
(8, 'Sports', 'sports', NULL, NULL),
(9, 'Food & Drink', 'food_drink', NULL, NULL),
(10, 'Travel', 'travel', NULL, NULL),
(11, 'News', 'news', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'waw update', '2018-11-23 22:17:04', '2018-11-23 22:17:04'),
(2, 9, 1, 'Yok viralkan!!!', '2018-11-23 22:21:21', '2018-11-23 22:21:21'),
(3, 10, 2, 'jadi pingin kesana nih', '2018-11-24 04:04:09', '2018-11-24 04:04:09'),
(4, 10, 2, 'kapan bisa kesana????', '2018-11-24 04:04:36', '2018-11-24 04:04:36'),
(5, 9, 2, 'Neymar tukang diving', '2018-11-24 04:07:21', '2018-11-24 04:07:21'),
(6, 9, 1, 'test', '2018-11-25 02:37:28', '2018-11-25 02:37:28'),
(7, 11, 1, 'tes', '2018-11-29 20:32:18', '2018-11-29 20:32:18'),
(8, 11, 1, 'tes', '2018-11-29 20:32:35', '2018-11-29 20:32:35'),
(9, 9, 1, 'asklxasnx', '2018-12-03 14:35:29', '2018-12-03 14:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_11_08_121717_create_categories_table', 1),
(2, '2018_11_08_122514_create_comments_table', 2),
(3, '2018_11_18_072530_comments', 3),
(4, '2018_11_18_072942_create_comments_table', 4),
(5, '2018_11_18_151800_create_comments_table', 5),
(6, '2018_11_19_235157_create_comments_table', 6),
(7, '2018_11_21_232146_add_user_id_to_posts', 7),
(8, '2018_11_21_233237_create_comments_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `content`, `avatar`, `created_at`, `updated_at`, `user_id`) VALUES
(9, 8, 'Neymar dan Mbappe akan Fit Menghadapi Liverpool test', 'Neymar dan Mbappe akan Fit Menghadapi Liverpool', 'Bintang Paris Saint-Germain (PSG) Neymar Jr dan Kylian Mbappe tidak akan bermain saat mengahadapi Touluse dalam lanjutan Ligue 1 pada Sabtu (24/11). Keduanya kemungkinan akan kembali bermain saat pertandingan Liga Champions melawan Liverpool. \r\nNamun sang pelatih Thomas Tuchel belum bisa memastikan kedua pemain bintangnya itu sudah benar-benar fit saat nanti bertemu Liverpool. “Mereka tidak akan bermain melawan Toulouse, tetapi ada kemungkinan bahwa mereka bermain melawan Liverpool, itu mungkin. Ini pendapat saya, saya berbicara dengan dokter dan para pemain, saya pikir mereka bisa bermain,\" kata Tuchel, dikutip dari Four Four Two, Jumat (23/11).\r\nNeymar menderita cedera pangkal paha saat Brasil meraih kemenangan 1-0 atas Kamerun. Saat itu Neymar ditarik keluar dan digantikan pemain muda Richarlison yang berhasil mencetak gol kemenangan Brasil.\r\nSementara itu Mbappe mendapatkan cedera pada bahunya saat Prancis berhadapan dengan Uruguay. Ia ditarik keluar pada awal babak kedua karena tidak bisa melanjutkan permainan setelah berduel bola dengan kiper Uruguay. Namun untungnya Prancis berhasil memenangkan laga berkat gol tunggal Oliver Giroud dari titik penalti.\r\nCederanya Neymar dan Mbappe setidaknya membuat para pendukung PSG khawatir, karena keduanya merupakan pemain penting untuk tim. Namun Tuchel bisa bernafas lega setelah ia mendapatkan kabar dari tim dokter kalau cedera kedua pemainnya itu tidak terlalu parah. Ia pun berharap kalau keduanya bisa kembali saat mengahadi Liverpool nanti.\r\n\"Dengan Ney dan Kylian, saat ini, hal baiknya adalah itu tidak sangat, sangat serius,\" kata Tuchel.\r\n\r\nIa pun tidak terlalu khawatir jika nantinya Neymar dan Mbappe tidak bisa dimainkan. Ia yakin memiliki skuat yang mampu menggantikan dua pemain kuncinya tersebut.\r\n\"Saya tidak akan mengatakan apa yang akan kami lakukan, tetapi ini bukan pertama kalinya kami bermain tanpa Neymar atau Kylian dan kami menemukan solusi. Kami memiliki banyak pemain top, mereka harus menunjukkan bahwa mereka siap,\" ujarnya.\r\nTuchel pun harus segera membuat keputusan tentang siapa yang akan menjadi penjaga gawang utama PSG setelah Gianluigi Buffon kembali dari hukaman larangan bermain. Ia harus memilih akan tetap memakai Alphonse Areola atau Buffon di bawah mistar gawang PSG.\r\n\"Kedua kiper benar-benar berbeda tetapi pada tingkat yang sama, mereka hebat sampai sekarang. Saya harus berbicara dengan Gigi dan Alphonse dan kami harus menunggu untuk mengetahui siapa yang akan bermain melawan Toulouse,” ujar dia.', 'wireless charger_1543139010.png', '2018-11-23 17:55:07', '2018-11-25 02:43:30', 1),
(10, 6, '5 Hal Menarik yang Bisa Kamu Lakukan di Pulau Palawan, Filipina', '5 Hal Menarik yang Bisa Kamu Lakukan di Pulau Palawan, Filipina', 'Jika berkunjung ke Filipina, jangan hanya mampir ke Pulau Cebu saja. Karena negara kepulauan yang terletak di Lingkar Pasifik Barat itu juga memiliki deretan pulau cantik lainnya, seperti Pulau Palawan.\r\nYa, pulau terbesar kelima di Filipina itu menyimpan banyak spot-spot menarik yang bisa kamu eksplorasi. Air biru kehijauan yang jernih, tebing-tebing nan indah, hingga deretan pohon rindang akan menyambut kamu di Pulau Palawan.\r\nNamun, tak hanya pemandangan indah saja yang bisa kamu temukan di Pulau Palawan. Banyak juga beragam aktivitas menarik yang bisa kamu rasakan di sana. \r\nDilansir Trip Savvy, berikut lima hal menarik yang dapat kamu lakukan di Pulau Palawan:\r\n\r\n1. Mengunjungi Pantai Tersembunyi di El Nido\r\nSebagai pulau terbesar di Filipina, Palawan memiliki banyak sekali pantai cantik. Salah satu pantai cantik itu adalah El Nido.\r\nPantai yang belum dijamah banyak orang dan tersembunyi ini sangat cocok bagi kamu yang ingin mencari ketenangan. Selain itu, di El Nido juga terdapat banyak resor yang dapat disewa.\r\nJika ingin berkunjung ke El Nido, terdapat beberapa pilihan paket tur island hopping yang bisa kamu pilih. Tur ini dibanderol mulai harga 23 dolar Amerika atau sekitar Rp 300 ribu.\r\n\r\n2. Menyusuri Indahnya Sungai Cabayugan\r\nTerletak di Taman Nasional Subterranean Sungai Puerto Princesa, Sungai Cabayugan mengalir sepanjang pegunungan Saint Paul. Sungai yang memiliki panjang 5 mil atau 8 kilometer itu hanya setengahnya saja yang dapat dilayari dengan perahu. \r\nSaat menyusuri Sungai Cabayugan, wisatawan dapat melewati salah satu gua yang terdapat di aliran sungai tersebut. Wisatawan juga dapat melihat formasi batu kapur indah yang terdapat di dalam gua.\r\n\r\n3. Menyelami Bangkai Kapal di Coron\r\nKapal-kapal Jepang yang karam pada tahun 1944 saat perang di masa lampau saat ini menjadi salah satu spot diving di Coron. Sekitar enam bangkai kapal tersebut terdapat di dasar perairan Coron, Filipina.\r\nBangkai-bangkai kapal ini terletak sekitar 10 kaki hingga 140 kaki atau sekitar 3 meter hingga 42 meter di bawah laut. Biasanya para penyelam yang ingin ke tempat ini harus menyewa sebuah kapal dari Pulau Busuanga.\r\nDi bawah laut, para penyelam dapat melihat indahnya terumbu karang, serta biota laut, seperti ikan tuna, kerapu, dan penyu laut.\r\n\r\n4. Bersafari di Pulau Calauit\r\nWisata safari tak hanya dapat kamu lakukan di benua Afrika saja. Kamu juga bisa melakukannya di Filipina, seperti di Pulau Calauit yang teretak di bagian utara Palawan.\r\nDi sana dapat menemukan berbagai macam hewan, seperti jerapah, zebra, hingga antelop. Jika kamu ingin bersafari ke Calauit, terdapat beberapa tur-tur wisata yang dapai diikuti.\r\nTur-tur wisata tersebut juga terletak di kota Coron ataupun sekitar Teluk Busuanga yang akan mengarahkan kamu ke agen tur mitra mereka.\r\n\r\n5. Melihat Kunang-kunang di Sungai Iwahig\r\nHal menarik terakhir yang dapat kamu lakukan di Palawan adalah melihat kunang-kunang yang ada di sekitar Sungai Iwahig. Para wisatawan dapat melihat kunang-kunang melalui perahu-perahu kecil yang ada di sana.\r\nDi sepanjang Sungai Iwahig, wisatawan akan dibawa oleh pemandu lokal yang ada di sana untuk melihat kunang-kunang yang berterbangan di sekitar hutan bakau. Tur ini dimulai setelah pukul 20.00 waktu setempat.\r\n\r\n\r\nSiap untuk berlibur di Pulau Palawan, Filipina?', 'wireless charger_1543138746.png', '2018-11-23 17:59:48', '2018-11-25 02:39:06', 1),
(11, 8, 'Hasil Eibar Vs Real Madrid 3-0', 'Hasil Eibar Vs Real Madrid 3-0', 'SD Eibar berhasil mengalahkan Real Madrid dengan skor telak 3-0 pada pekan ke-13 Liga Spanyol di Stadion Municipal de Ipurua, Sabtu (24/11/2018).\r\nGol Eibar dicetak oleh Gonzalo Escalante pada menit ke-16, Sergi Enrich (53\'), dan Kike (57\').\r\nKekalahan yang dialami Real Madrid ini adalah kekalahan pertama mereka setelah dilatih oleh Santiago Solari.\r\nPada babak pertama, Real Madrid tampil lebih menekan dengan serangan cepat.\r\nNamun, Real Madrid malah hampir kebobolan terlebih dahulu pada menit ketiga setelah tendangan voli Kike cuma membentur mistar.\r\nTak tinggal diam, Real Madrid juga sempat mengancam gawang Eibar melalui akselerasi Marco Asensio.\r\nNamun, kerja sama Asensio dan Karim Benzema masih bisa dihentikan oleh bek tuan rumah.\r\nHingga akhirnya, Eibar berhasil mencetak gol pada menit ke-16 melalui Gonzalo Escalante.\r\nWalaupun sempat dianulir wasit, setelah menengok video assistant referee (VAR), wasit akhirnya mengesahkan gol itu.\r\nBabak pertama berakhir dengan skor 1-0 untuk keunggulan Eibar.\r\nPada babak kedua, Eibar menambah keunggulan pada menit ke-52 melalui Sergi Enrich yang memanfaatkan umpan dari Marc Cucurella.\r\nSetelah unggul 2-0, Eibar kembali mencetak gol melalui Kike yang berhasil menerima umpan dari Sergi Enrich pada menit ke-57.\r\nWalaupun sudah tertinggal 3-0, Real Madrid terus mencoba membobol gawang Eibar. Namun, hingga peluit panjang ditiupkan oleh wasit, pasukan Santiago Solari gagal mengatasi ketertinggalan. Laga berakhir dengan skor 3-0 untuk keunggulan Eibar.\r\nDengan hasil ini, Eibar berada di posisi ketujuh dengan raihan 18 poin. Sementara itu, Real Madrid berada di posisi keenam dengan koleksi 20 poin.', 'kalah_1543101470.jpg', '2018-11-24 16:17:51', '2018-11-24 16:17:51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'avatars/default.png',
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`, `username`) VALUES
(1, 'Andhika', 'andhikay24@gmail.com', '2018-11-21 16:40:54', 'avatars/default.png', '$2y$10$v9dqSagPa6zQjocK7ZF9NOIzC7Nk7BlSMnVok8sB/Zw6wd9ytvqn6', 'UY477BUgBYlYSoL6uDrIUseQOM4u4Rgaew6pxS6NlfOkEZdzwKMKS3enpAZF', '2018-11-21 16:39:53', '2018-12-03 14:39:12', 'andhikayp'),
(2, 'perdana', 'andhika@yoga.com', '2018-11-22 00:18:42', 'avatars/default.png', '$2y$10$Qzu.0O6g/9Srv77jp4ksY.k0u/FcB54Q4SD3zTr2pZToXz/vk7gmq', 'klFxsaeg1G9awBTeoOxmWuZdOw47oO2LA8UVrjNrktEDVQE2b2qbo82sWMyk', '2018-11-22 00:17:05', '2018-11-24 23:28:38', 'mantappu'),
(3, 'rey', 'rey@gmail.com', NULL, 'avatars/default.png', '$2y$10$AJYCOcwQYgUOpa0Ouf7EAep/UyMfJB0dVaGrQNMdcujzPi600s7Ky', 'ZXyTMzaSfvaVmxVbzoEnZtYUgaREsPKMsSGMwNMtrdhYUoT5pxvvZUXe9rU6', '2018-11-22 16:30:10', '2018-11-22 16:30:10', 'rey'),
(4, 'and', 'an@hika.com', '2018-11-25 02:35:20', 'avatars/default.png', '$2y$10$ABm6l27CKRyl4CqKJeEl1.qWyTTJepld7AiQDpT44dnesKgXH7D5K', 'Up4sBK62ONsfSd7lkKVxry7bhb8NTyinlE2HNcKebURIPsN9nHhhVmp2xxsz', '2018-11-25 02:34:18', '2018-11-25 02:36:09', 'and'),
(5, 'Bayu', 'test@mail.com', NULL, 'avatars/default.png', '$2y$10$US3jbT/7Aut15y35Pg6Ra.ZFYpY4aEsbiYdOIf1l7m2On/NaSuG2a', NULL, '2018-12-11 02:51:10', '2018-12-11 02:51:10', 'bayulaxana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
