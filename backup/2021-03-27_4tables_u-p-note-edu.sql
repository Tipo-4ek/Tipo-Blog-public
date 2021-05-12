-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 27 2021 г., 13:18
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `edu`
--

INSERT INTO `edu` (`id`, `summary`, `type_of_work`, `subject`, `prepod`, `department`, `user_email`, `file_path`) VALUES
(2, 'ag', '', '', '', '', 'admin@m.ru', ''),
(3, 'age', '', '', '', '', 'admin@m.ru', ''),
(4, 'КК', '', '', '', '', 'admin@m.ru', '');

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL COMMENT 'email пользователя по которому будем выводить',
  `summary` text NOT NULL COMMENT 'Название работы',
  `tags` varchar(10) NOT NULL COMMENT 'Ключевые слова',
  `note` text COMMENT 'Статья/работа',
  `url` varchar(100) DEFAULT NULL COMMENT 'Если загрузили статью ссылкой, то линк сюда',
  `file_path` varchar(100) DEFAULT NULL COMMENT 'Если загрузили статью файлом, то сюда путь к фалй',
  `leader_email` varchar(20) DEFAULT NULL COMMENT 'Научный руководитель',
  `note_perk` int(11) NOT NULL DEFAULT '99' COMMENT 'По дефолту 99 - открыто всем пользователям',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата и время добавления статьи',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COMMENT='Статьи пользователей';

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`id`, `user_email`, `summary`, `tags`, `note`, `url`, `file_path`, `leader_email`, `note_perk`, `timestamp`) VALUES
(44, 'gaga@mail.ru', 'Создал сам статью', 'Ключ1, Клю', '<h1>Моя тема в заголовке</h1>\r\n<p>&nbsp;</p>\r\n<p>А это <strong>жирный&nbsp;</strong>и <em>курсив.</em></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"background-color: #e03e2d; color: #f1c40f;\">А этот скучный текст написан на красном фоне желтым текстом.</span></p>\r\n<p>&nbsp;</p>\r\n<p>Я дизайнер. - <a title=\"Вк\" href=\"vk.com/tipo_4ek\" target=\"_blank\" rel=\"noopener\">ссылка на вк</a></p>', NULL, NULL, 'bugakov@sgugit.ru', 99, '2021-03-26 10:58:28'),
(45, 'admin@m.ru', 'Система уведомлений', 'Ключ1, Клю', NULL, 'vk.com', NULL, 'zhdanov.2002@yandex.', 99, '2021-03-26 12:02:53'),
(46, 'gaga@mail.ru', 'тест статьи', 'Тег1, Тег2', NULL, 'tipoblog.ru', NULL, 'Tipo_4ek@sgugit.ru', 99, '2021-03-26 12:04:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `persons`
--

INSERT INTO `persons` (`person_id`, `person_ava`, `person_status`, `person_status_about`, `person_countnotes`, `person_subscriptions`, `person_subscribers`, `person_karma`, `person_tags`) VALUES
(16, '/public/user_data/avatars/default1.jpg', 'pidor', 'shmara', 0, 0, 0, 0, NULL),
(17, '/public/user_data/avatars/default3.jpg', 'Юра, я главный 100', '', 0, 0, 0, 0, NULL),
(54, '/public/user_data/avatars/default5.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(55, '/public/user_data/avatars/default5.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(56, '/public/user_data/avatars/default1.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(57, '/public/user_data/avatars/default2.jpg', 'я дурачок', '', 0, 0, 0, 0, NULL),
(58, '/public/user_data/avatars/default3.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(59, '/public/user_data/avatars/default3.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(60, '/public/user_data/avatars/default5.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(61, '/public/user_data/avatars/default2.jpg', 'uiui', 'uiui', 0, 0, 0, 0, NULL),
(62, '/public/user_data/avatars/default4.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(63, '/public/user_data/avatars/default3.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(64, '/public/user_data/avatars/default1.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(65, '/public/user_data/avatars/default3.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL),
(66, '/public/user_data/avatars/default2.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', '', 0, 0, 0, 0, NULL);

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
  `user_perk` varchar(11) NOT NULL DEFAULT '20' COMMENT 'Права доступа DEV-4',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_email`, `user_perk`) VALUES
(16, 'silon', 'd9b1d7db4cd6e70935368a1efb10e377', '22385f246b443ff93368bc1c1ccd5d97', 'admin@m.ru', '20'),
(17, 'tipo-4ek', '07939862543bb55c7be4de91b467a2ec', '20aaaa2ea8cbf3dfc748771aba1c210e', 'tipo-4ek@inbox.ru', '100'),
(54, 'qll', '695aaca3ac4d38027991633b20fe3e69', 'e7564e7340ddf2cfb6f1bf0a7aceca6f', 'qll@ma.q', '20'),
(55, 'kka', '03c1518fe7afa582df90d6963e45b942', '94e8670fda7eb13ad1795d0ff18713f3', 'kka@maq.q', '20'),
(56, 'keki4', 'd9b1d7db4cd6e70935368a1efb10e377', 'f3af345ef4d6dacd514098d9ca2f909e', 'pisor@ya.ru', '20'),
(57, 'loli4', 'a64f58a07d5c523b29fc55d6a00f38cc', 'b746f00532cc1b6178f0dd1b57c2ee5d', 'loli4@mail.ru', '20'),
(58, 'kkkk', '79855427e82fdfa9c6cd75d33b7284b0', '4621c9e79cb2affb1c5e0820aeec0752', 'kkkk@mail.ru', '20'),
(59, 'kkk', 'b08e15246079bcc12c1201bcdbe70b71', '33536ae3fbfbc2624370d15f137b2b60', 'kkk@ma.ru', '20'),
(60, 'kaki4', 'd9b1d7db4cd6e70935368a1efb10e377', '9fce6c7d55daca1778789fda6e4fe16d', 'kaki4@shma.ra', '20'),
(61, 'uiui', '8a473337da5cf1175164a23dc39a6538', '508727ef8eceac97cd34d65ab9793b78', 'uuuu@ma.ru', '20'),
(62, 'owzhyker', '115f7570d8641bbffecbd9602fdf3a1e', '4ba89de730cdd7ee180d92f33f6a9648', 'owzhyker@ya.ru', '20'),
(63, 'lolek', 'f7f62ea0db150e32ea883fa882f388a5', '797d78c17f83bd25d9dbef78daa91051', 'lolek@m.ru', '20'),
(64, 'gaga', '9e00d0d971e4623bfd202051b08e4417', 'b33c070483a772903056a60b55f3fb13', 'gaga@mail.ru', '20'),
(65, 'kek', '9b17ca2fccf07b42a29909ce990c1acf', '891d36e90c18cc19ca684997e9c543c5', 'kek@m.ru', '20'),
(66, 'owzhyker123', 'd9b1d7db4cd6e70935368a1efb10e377', 'fa8de511b6cdf1c3ee733afd84315463', 'kolhoznik123456@yandex.ru', '20');

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
