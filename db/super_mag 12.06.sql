-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 12 2017 г., 19:35
-- Версия сервера: 5.6.34
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `super_mag`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Футболки', 5, 1),
(3, 'Свитера', 3, 1),
(4, 'Носки', 4, 1),
(5, 'Куртки', 1, 1),
(6, 'Галстуки', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `is_new` int(11) DEFAULT '0',
  `is_recommended` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'Easy Polo Black Edition', 1, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(2, 'Easy Polo Black Edition', 1, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(3, 'Easy Polo Black Edition', 1, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 1, 0, 1),
(4, 'Easy Polo Black Edition', 1, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(5, 'Easy Polo Black Edition', 1, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 1, 0, 1),
(6, 'Easy Polo Black Edition', 1, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(7, 'Easy Polo Black Edition', 1, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 1, 0, 1),
(8, 'Easy Polo Black Edition', 1, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(9, 'Easy Polo Black Edition', 1, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 1, 0, 1),
(10, 'Easy Polo Black Edition', 2, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(11, 'Easy Polo Black Edition', 2, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(12, 'Easy Polo Black Edition', 2, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(13, 'Easy Polo Black Edition', 2, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 1, 0, 1),
(14, 'Easy Polo Black Edition', 2, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(15, 'Easy Polo Black Edition', 2, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(16, 'Easy Polo Black Edition', 2, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 1, 0, 1),
(17, 'Easy Polo Black Edition', 2, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(18, 'Easy Polo Black Edition', 2, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1),
(19, 'Easy Polo Black Edition', 4, 123123, 45.7, 1, 'Polo', '/template/images/shop/product7.jpg', NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'sergey', 'bayduzh89@gmail.com', NULL),
(5, 'Ivan', 'test@test.com', '2147483647'),
(10, 'Сергейqweq', 'modul.work@gmail.com', '$2y$10$VF.Zl81RuRlrJqqd.J22huMJ2GV9VKxdE6cXc0L4NdSJJ3rlXAhk.'),
(11, 'Сергейqweq', 'modul.work@gmail.com1', '$2y$10$vRUF3lukeRcJh61V7t1U1.jYAs8.rg4.BcJhxcdSnt0d2ZuGFNVYO'),
(12, 'qweqweqwe', 'qweqwe@qweqwe.qwe', '$2y$10$Mu4WikgbF0xvdXoJdGIzUO8zMvD3twbwJyZxUduCIhkgu7ZRze35W'),
(13, 'Ivan', 'modul.work@gmail.com11', '$2y$10$9bJnds/INbA4EuNsYRtfs.xW1dOboXabfHKCWWruZIG..6mMsMZaS'),
(14, 'Ivan', 'an.respectplus@gmail.com1', '$2y$10$lKrqfAKSjfUG6ShnT2n6We5NAkROeC3MiOWfvP061sQi3i0qfsara'),
(15, 'Сергей', 'bayduzh891@gmail.com', '$2y$10$GT8zwUd3rkqjb1WYpEhQM.ZNhb65q04UkabvdXM2IjmKSJfMnSZyC');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
