-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 20 2021 г., 14:01
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
-- Структура таблицы `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_ava` varchar(255) NOT NULL,
  `person_status` varchar(60) NOT NULL DEFAULT 'Нету времени на заполнение профиля. БАЛДЕЮ!!!',
  `person_countnotes` int(9) NOT NULL DEFAULT '0',
  `person_subscriptions` int(9) NOT NULL DEFAULT '0',
  `person_subscribers` int(9) NOT NULL DEFAULT '0',
  `person_karma` int(5) NOT NULL DEFAULT '0',
  `person_tags` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `persons`
--

INSERT INTO `persons` (`person_id`, `person_ava`, `person_status`, `person_countnotes`, `person_subscriptions`, `person_subscribers`, `person_karma`, `person_tags`) VALUES
(16, '/public/user_data/avatars/default1.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', 0, 0, 0, 0, NULL),
(17, '/public/user_data/avatars/default3.jpg', 'Юра, я главный 100', 0, 0, 0, 0, NULL),
(54, '/public/user_data/avatars/default5.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', 0, 0, 0, 0, NULL),
(55, '/public/user_data/avatars/default5.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', 0, 0, 0, 0, NULL);

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
  `user_activation` int(1) NOT NULL DEFAULT '0',
  `user_perk` varchar(11) NOT NULL DEFAULT '20' COMMENT 'Права доступа DEV-4',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_email`, `user_activation`, `user_perk`) VALUES
(16, 'zhdanov', '7934044a15ea31bed28ad88b00e06725', '93dd6cb8612a9321ce9626be451ec754', 'admin@m.ru', 0, '20'),
(17, 'tipo-4ek', '07939862543bb55c7be4de91b467a2ec', '20aaaa2ea8cbf3dfc748771aba1c210e', 'tipo-4ek@inbox.ru', 0, '100'),
(54, 'qll', '695aaca3ac4d38027991633b20fe3e69', 'e7564e7340ddf2cfb6f1bf0a7aceca6f', 'qll@ma.q', 0, '20'),
(55, 'kka', '03c1518fe7afa582df90d6963e45b942', '31471eee46811040c8bfea3699ee9b26', 'kka@maq.q', 0, '20');

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
