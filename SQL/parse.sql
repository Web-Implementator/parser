-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 06 2018 г., 05:43
-- Версия сервера: 5.7.20-0ubuntu0.16.04.1
-- Версия PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `parse`
--

-- --------------------------------------------------------

--
-- Структура таблицы `parse_query`
--

CREATE TABLE `parse_query` (
  `parse_id` int(11) NOT NULL,
  `parse_url` text NOT NULL,
  `parse_identifier` text NOT NULL,
  `parse_status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `parse_result`
--

CREATE TABLE `parse_result` (
  `parse_result_id` int(11) NOT NULL,
  `parse_id` int(11) NOT NULL,
  `parse_result_identifier` text NOT NULL,
  `parse_result_text` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `parse_query`
--
ALTER TABLE `parse_query`
  ADD PRIMARY KEY (`parse_id`);

--
-- Индексы таблицы `parse_result`
--
ALTER TABLE `parse_result`
  ADD PRIMARY KEY (`parse_result_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `parse_query`
--
ALTER TABLE `parse_query`
  MODIFY `parse_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `parse_result`
--
ALTER TABLE `parse_result`
  MODIFY `parse_result_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
