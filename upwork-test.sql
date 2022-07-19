-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2022 at 07:43 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upwork-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `description` text,
  `price` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `image`, `status`, `description`, `price`, `updated_at`, `created_at`) VALUES
(5, 'Iphone 7', 'Iphone-7', 'iphone-12-family-select-2021.jpg', 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '10', '2022-07-17 16:13:47', '2022-07-17 13:56:15'),
(12, 'Iphone Max', 'Iphone-Max', 'Apple_iPhone_14_Pro_and_14_Pro_Max_clownfish_alpine_green_unofficial_concept_image_drdNBC.jpg', 1, '<p><strong>Lorem ipsum</strong> dolor sit amet, consectetur adipiscing elit. Nam condimentum lectus sed magna commodo sollicitudin. Phasellus aliquam varius enim, eu efficitur dolor. Aliquam venenatis tellus hendrerit ante pharetra tristique. Duis urna tellus, eleifend nec tincidunt volutpat, sodales a nisi. Pellentesque fermentum enim in diam vestibulum vulputate. Curabitur fermentum, neque nec ultrices cursus, lectus est tincidunt arcu, sit amet pulvinar mi ligula eu magna. Donec vel magna id tortor accumsan feugiat. Cras fringilla nulla ex. In ut risus vitae libero congue dapibus eget quis augue. Mauris dictum risus ac elementum pretium. In vitae sollicitudin eros. Suspendisse congue magna sit amet vehicula tincidunt. Aliquam non dolor semper magna pulvinar bibendum.</p>\r\n\r\n<p>Ut sit amet erat at enim commodo molestie. Etiam sodales sapien felis, id tincidunt urna egestas ac. Sed faucibus laoreet facilisis. Praesent placerat blandit enim, sed consectetur felis feugiat et. Aenean porttitor lorem augue, eget varius ligula condimentum non. Ut at sem tempor, rhoncus nulla sed, feugiat neque. Aliquam dignissim lorem at eleifend maximus. Morbi bibendum lacus sed dapibus laoreet.</p>\r\n\r\n<p>Ut ligula purus, vulputate sit amet nunc in, vulputate consequat risus. Pellentesque at sollicitudin eros. Aenean placerat nulla eros, quis consectetur diam dictum id. Praesent tempor sollicitudin elit, et tincidunt libero tempor volutpat. Phasellus tempus eget diam at dapibus. Aenean lacinia dignissim urna id blandit. Integer eleifend lobortis augue id ultricies. Maecenas ornare risus risus, et bibendum ipsum porttitor vel. Donec maximus nulla ac ante euismod, eu lacinia arcu elementum. Nunc in lacinia turpis, id congue ipsum. Nulla justo nisi, feugiat dignissim odio et, laoreet posuere massa. In nisi velit, ultricies ac quam nec, porta finibus eros. Etiam dignissim magna eu risus gravida, sit amet ullamcorper nisi ultricies. Nulla facilisi.</p>\r\n', '10', NULL, '2022-07-18 08:53:48'),
(13, 'Nokia', 'Nokia', 'huawei_enjoy_9_plus-11_6.jpg', 0, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '10', NULL, '2022-07-18 13:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` double NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `quantity`, `user_id`, `price`, `updated_at`, `created_at`) VALUES
(1, 5, 20, 1, 200, '2022-07-18 18:01:19', '2022-07-18 18:01:20'),
(2, 12, 30, 2, 300, '2022-07-18 18:02:04', '2022-07-18 18:02:05'),
(3, 13, 20, NULL, 800, '2022-07-18 18:02:36', '2022-07-18 18:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `token`, `password`, `updated_at`, `created_at`) VALUES
(1, 'feras.el.souri@gmail.com', 'Feras AlSouri', 'fkadjsl;kfdsaj', 'toor', '2022-07-15 16:32:42', '2022-07-15 16:32:42'),
(2, 'Robiul@gmail.com', 'Robiul Robiul', 'fsdfsd', 'Robiul', '2022-07-15 16:35:04', '2022-07-15 16:35:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_stocks_products` (`product_id`),
  ADD KEY `FK_stocks_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `FK_stocks_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_stocks_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
