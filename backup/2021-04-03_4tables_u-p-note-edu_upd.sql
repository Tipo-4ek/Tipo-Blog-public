-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 03 2021 г., 14:31
-- Версия сервера: 5.7.30-33
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tipo4ek_tipoblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `edu`
--

CREATE TABLE IF NOT EXISTS `edu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `summary` varchar(100) NOT NULL,
  `type_of_work` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `prepod` varchar(40) NOT NULL,
  `department` varchar(100) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `edu`
--

INSERT INTO `edu` (`id`, `summary`, `type_of_work`, `subject`, `prepod`, `department`, `user_email`, `file_path`) VALUES
(26, 'Выпадающая список при :hover на кнопку', 'Контрольная работа', 'Алгоритмы и структура данных', 'Бугаков Петр Юрьевич', 'Кафедра прикладной информатики и информационных систем', 'admin@m.ru', '');

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL COMMENT 'email пользователя по которому будем выводить',
  `summary` text NOT NULL COMMENT 'Название работы',
  `tags` varchar(100) NOT NULL COMMENT 'Ключевые слова',
  `note` text COMMENT 'Статья/работа',
  `url` varchar(100) DEFAULT NULL COMMENT 'Если загрузили статью ссылкой, то линк сюда',
  `file_path` varchar(100) DEFAULT NULL COMMENT 'Если загрузили статью файлом, то сюда путь к фалй',
  `leader_email` varchar(20) DEFAULT NULL COMMENT 'Научный руководитель',
  `note_perk` int(11) NOT NULL DEFAULT '1' COMMENT 'По дефолту 1 - открыто всем пользователям',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата и время добавления статьи',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COMMENT='Статьи пользователей';

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`id`, `user_email`, `summary`, `tags`, `note`, `url`, `file_path`, `leader_email`, `note_perk`, `timestamp`) VALUES
(44, 'gaga@mail.ru', 'Создал сам статью', 'цирк', '<h1>Моя тема в заголовке</h1>\r\n<p>&nbsp;</p>\r\n<p>А это <strong>жирный&nbsp;</strong>и <em>курсив.</em></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"background-color: #e03e2d; color: #f1c40f;\">А этот скучный текст написан на красном фоне желтым текстом.</span></p>\r\n<p>&nbsp;</p>\r\n<p>Я дизайнер. - <a title=\"Вк\" href=\"vk.com/tipo_4ek\" target=\"_blank\" rel=\"noopener\">ссылка на вк</a></p>', NULL, NULL, 'bugakov@sgugit.ru', 1, '2021-03-26 10:58:28'),
(45, 'admin@m.ru', 'Система уведомлений', 'новый год', NULL, 'vk.com', NULL, 'zhdanov.2002@yandex.', 1, '2021-03-26 12:02:53'),
(46, 'gaga@mail.ru', 'тест статьи', 'Тег1, Тег2', NULL, 'tipoblog.ru', NULL, 'Tipo_4ek@sgugit.ru', 1, '2021-03-26 12:04:56'),
(47, 'tas200226@gmail.com', 'test1', 'дрономания, Кноль, ЦИиР', NULL, 'dronomania.ru/top/cheap-beginner.html', NULL, 'lyubim04kaa@gmail.co', 1, '2021-03-30 02:24:47'),
(48, 'tas200226@gmail.com', 'test3', 'АиСД, Бугаков', NULL, 'https://www.youtube.com/watch?v=bZ-XHdJJcR4&ab_channel=Boroda4Live', NULL, 'lyubim04kaa@gmail.co', 1, '2021-03-30 02:26:43'),
(49, 'tas200226@gmail.com', '213уцккрцпйе3кцеркуп', 'Кноль', '<p><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a><a href=\"https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live\">https://www.youtube.com/watch?v=bZ-XHdJJcR4&amp;ab_channel=Boroda4Live</a></p>', NULL, NULL, 'lyubim04kaa@gmail.co', 1, '2021-03-30 02:28:30'),
(50, 'tas200226@gmail.com', '213уцккрцпйе3кцеркуп2', 'Геодезия и менеджмент, Цифровое моделирование', '<p>цуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицкихцуукцтицгцетигцихткецикетицких</p>', NULL, NULL, 'lyubim04kaa@gmail.co', 1, '2021-03-30 02:29:43'),
(51, 'gaga@mail.ru', 'Тестоваяя статья, создал сам', 'Робототехника, Кноль, ЦИиР', '<p>уи</p>\r\n<ul class=\"tox-checklist\">\r\n<li>1</li>\r\n<li>2</li>\r\n<li>3</li>\r\n<li>4</li>\r\n<li>5</li>\r\n<li>6</li>\r\n</ul>', NULL, NULL, 'lyubim.off@mail.ru', 40, '2021-04-03 04:58:01'),
(52, 'gaga@mail.ru', 'Новая', 'Бугаков, аисд', '<p>Новая</p>', NULL, NULL, 'bugakov@sgugit.ru', 40, '2021-04-03 11:22:32');

-- --------------------------------------------------------

--
-- Структура таблицы `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_ava` varchar(255) NOT NULL,
  `person_status` varchar(60) NOT NULL DEFAULT 'Нету времени на заполнение профиля. БАЛДЕЮ!!!',
  `person_status_about` varchar(60) NOT NULL,
  `person_countnotes` int(9) NOT NULL DEFAULT '0',
  `person_subscriptions` int(9) NOT NULL DEFAULT '0',
  `person_subscribers` int(9) NOT NULL DEFAULT '0',
  `person_karma` int(5) NOT NULL DEFAULT '0',
  `person_tags` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `persons`
--

INSERT INTO `persons` (`person_id`, `person_ava`, `person_status`, `person_status_about`, `person_countnotes`, `person_subscriptions`, `person_subscribers`, `person_karma`, `person_tags`) VALUES
(16, '/public/user_data/avatars/default1.jpg', 'pidor', 'shmara', 0, 0, 0, 0, NULL),
(17, '/public/user_data/avatars/default3.jpg', 'Юра, я главный 100', '', 0, 0, 0, 0, NULL),
(62, '/public/user_data/avatars/default4.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(64, '/public/user_data/avatars/default1.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(66, '/public/user_data/avatars/default2.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(67, '/public/user_data/avatars/default3.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_perk` varchar(11) NOT NULL DEFAULT '20' COMMENT 'Права доступа DEV-4. По умолчанию 20 - студент',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_email`, `user_perk`) VALUES
(16, 'silon', 'd9b1d7db4cd6e70935368a1efb10e377', 'cda641d22ebd282a18bf71b187861203', 'admin@m.ru', '20'),
(17, 'tipo-4ek', '07939862543bb55c7be4de91b467a2ec', '20aaaa2ea8cbf3dfc748771aba1c210e', 'tipo-4ek@inbox.ru', '100'),
(62, 'owzhyker', '115f7570d8641bbffecbd9602fdf3a1e', '4ba89de730cdd7ee180d92f33f6a9648', 'owzhyker@ya.ru', '20'),
(64, 'gaga', '9e00d0d971e4623bfd202051b08e4417', '7cf7a6533c7ea0ababf8e473ac31047f', 'gaga@mail.ru', '20'),
(66, 'owzhyker123', 'd9b1d7db4cd6e70935368a1efb10e377', 'fa8de511b6cdf1c3ee733afd84315463', 'kolhoznik123456@yandex.ru', '20'),
(67, 'artem', '1927e85494119391ade1b6b2a011a262', 'e1edb03e70c54c18df48ca3dfbb770ba', 'tas200226@gmail.com', '20');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
