-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Фев 26 2023 г., 18:50
-- Версия сервера: 5.7.38
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_karaz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(6000) NOT NULL,
  `datetime` date NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `datetime`, `ip`) VALUES
(144, '\"дддддддддддддд\"', '\"дддддддддд\"', '2023-02-26', '127.0.0.1'),
(149, '\"ййййййййййй\"', '\"йййййййййййййй\"', '2023-02-26', '127.0.0.1'),
(150, '\"ффффффффф\"', '\"аааааааа ффффффффф ф ффффффффффф ффффф фффффффффффф  ффффффффффффффф\"', '2023-02-26', '127.0.0.1'),
(154, '\"фффффффффф\"', '\"ффффффффффффф\"', '2023-02-26', '127.0.0.1'),
(155, '\"ццццццццц\"', '\"цццццццц\"', '2023-02-26', '127.0.0.1'),
(156, '\"ммммммммм\"', '\"ммммммм\"', '2023-02-26', '127.0.0.1'),
(158, '\"ыфвфа ппарап паат\"', '\"впвапвап вапвпр прарао роро раоро\"', '2023-02-26', '127.0.0.1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
