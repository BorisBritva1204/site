-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 11 2021 г., 16:52
-- Версия сервера: 10.4.20-MariaDB
-- Версия PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admORuser` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `admORuser`) VALUES
(0, 'user', '$2y$10$ulycc8NzkibkFiU3KtahCeNtHXzW.gA1VHbG4PIxU.lXFcXmUlfXq', 'user'),
(4, 'quuuq', '$2y$10$VQhiH3db7iKD7E55I4bJv.VcqZ.pPnaXeyPSUZQ6HKydQ4Pq6kqxq', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `newss`
--

CREATE TABLE `newss` (
  `id` int(11) NOT NULL,
  `Theme` text NOT NULL,
  `Text` text NOT NULL,
  `Photo` varchar(30) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `newss`
--

INSERT INTO `newss` (`id`, `Theme`, `Text`, `Photo`, `Date`) VALUES
(4, 'Женя потерял наушники', 'сегоня в 12 00 жека потерял уши, некит нашёл и забрал себе \r\nPs. сбк', '250.jpg', '2021-09-21'),
(5, 'Женя потерял наушники ч2', 'Женя выбил наушники у Никиты теперь он вернул их ', '250.jpg', '2021-09-21'),
(6, '123', '<?php \r\nSELECT * FROM `newss`\r\n?>', '250.jpg', '2021-09-21'),
(7, '', '', '', '2021-10-11'),
(8, '123', '123', '250.jpg', '2021-10-11'),
(9, 'Я не могу', 'выдать админку', '250.jpg', '2021-10-11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `newss`
--
ALTER TABLE `newss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `newss`
--
ALTER TABLE `newss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
