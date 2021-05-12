-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 28 2019 г., 12:31
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `persons`
--

CREATE TABLE `persons` (
  `person_id` int(11) NOT NULL,
  `person_ava` varchar(255) NOT NULL,
  `person_status` varchar(60) NOT NULL DEFAULT 'Нету времени на заполнение профиля. БАЛДЕЮ!!!',
  `person_countnotes` int(9) NOT NULL DEFAULT 0,
  `person_subscriptions` int(9) NOT NULL DEFAULT 0,
  `person_subscribers` int(9) NOT NULL DEFAULT 0,
  `person_karma` int(5) NOT NULL DEFAULT 0,
  `person_tags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `persons`
--

INSERT INTO `persons` (`person_id`, `person_ava`, `person_status`, `person_countnotes`, `person_subscriptions`, `person_subscribers`, `person_karma`, `person_tags`) VALUES
(1, '/Tipo-Blog/public/user_data/avatars/default1.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', 0, 0, 0, 0, 'php, mysql, bad-trip, pascal, c#'),
(2, '/Tipo-Blog/public/user_data/avatars/default4.jpg', 'Нету времени на заполнение профиля. БАЛДЕЮ!!!', 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_activation` int(1) NOT NULL DEFAULT 0,
  `user_perk` varchar(3) NOT NULL DEFAULT 'MUP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_email`, `user_activation`, `user_perk`) VALUES
(1, 'Tipo_4ek', '1bc75400823bb9942adb3681021e8ecb', '1304211d5ed5345e341c2786cc0c5659', 'Tipo_4ek@inbox.ru', 0, 'MUP'),
(2, 'Test1', '418d89a45edadb8ce4da17e07f72536c', '09cabcdd140b8b92bc631ed8547b792b', 'Test1@mail.ru', 0, 'MUP');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`person_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `persons`
--
ALTER TABLE `persons`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
