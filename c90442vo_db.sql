-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 18 2024 г., 11:05
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `c90442vo_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `doctorId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `patronymic` varchar(30) NOT NULL,
  `specializationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`doctorId`, `name`, `surname`, `patronymic`, `specializationId`) VALUES
(1, 'Вячеслав', 'Беленков', 'Апполонович', 1),
(9, 'Дмитрий', 'Соболев', 'Станиславович', 1),
(10, 'Лев', 'Комиссаров', 'Александрович', 1),
(11, 'Вальтер', 'Смирнов ', 'Вадимович', 1),
(12, 'Иван', 'Одинцов', 'Ефимович', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `managers`
--

CREATE TABLE `managers` (
  `managerId` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `managers`
--

INSERT INTO `managers` (`managerId`, `login`, `password`) VALUES
(1, 'manager1', 'e807f1fcf82d132f9bb018ca6738a19f'),
(3, 'manager2', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `patientId` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `patronymic` varchar(30) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `birthdayDate` date NOT NULL,
  `permanentResidence` varchar(100) NOT NULL,
  `actualResidence` varchar(100) DEFAULT NULL,
  `passport` varchar(12) NOT NULL,
  `mio` varchar(120) NOT NULL,
  `policyCMI` varchar(16) NOT NULL,
  `policyPIP` varchar(14) NOT NULL,
  `disability` varchar(20) NOT NULL,
  `phoneNumber` varchar(16) NOT NULL,
  `job` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`patientId`, `login`, `password`, `email`, `name`, `surname`, `patronymic`, `gender`, `birthdayDate`, `permanentResidence`, `actualResidence`, `passport`, `mio`, `policyCMI`, `policyPIP`, `disability`, `phoneNumber`, `job`) VALUES
(3, 'login', '81dc9bdb52d04dc20036dbd8313ed055', 'email@email.com', 'Имя1', 'Фамилия1', 'Отчество', '', '2024-05-17', 'Прописка', NULL, '1818 123123', 'ОАО \'Эокехмерец\'', '123123123', '123123', 'none', '71234567890', NULL),
(4, 'og104', '66066134ea7a1ad8191234a8f17fa579', 'og104@tadbox.com', 'Олег', 'Горбатов', 'Анатолиевич', 'male', '1968-12-04', 'Г. Калач-на-Дону, ул. Карла Маркса 37', NULL, '18 18 240480', 'АО \'\'СК \'\'СОГАЗ-Мед\'\' Волгоградской области', '2132165535', '2313250225', 'none', '8904047643', NULL),
(5, 'kharitonovia', 'e807f1fcf82d132f9bb018ca6738a19f', 'iharitonov889@gmail.com', 'Иван', 'Харитонов', 'Альбертович', 'male', '2004-09-16', 'Г. Калач-на-Дону, пер. Буденного 26', NULL, '18 18 450900', 'АО \'\'СК \'\'СОГАЗ-Мед\'\' Волгоградской области', '3490599800300250', '170-400-600 25', 'none', '+79044246728', NULL),
(12, 'login', '7363a0d0604902af7b70b271a0b96480', 'Почт', 'Имя', 'ФЫ', 'Отчество', 'male', '1212-12-12', 'прпо', NULL, 'Пасп', 'СМО ', 'ОМС', 'СНИЛС', 'none', '+7904424', NULL),
(13, 'ivan1', '202cb962ac59075b964b07152d234b70', 'email@email', 'Иван', 'Харитонов', 'Васильевич', 'male', '2004-09-16', 'г. Калач-на-Дону', NULL, '18 18 400500', 'АО \'\'СК СОГАЗ-Мед\'\'', '182931291290', '128-129-390 25', 'none', '+79044424320', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `schedules`
--

CREATE TABLE `schedules` (
  `scheduleId` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `datetimeOfReception` datetime NOT NULL,
  `patientId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `schedules`
--

INSERT INTO `schedules` (`scheduleId`, `doctorId`, `datetimeOfReception`, `patientId`) VALUES
(34, 1, '2024-06-06 14:42:00', NULL),
(36, 1, '2024-06-06 14:55:00', NULL),
(38, 1, '2024-06-06 15:10:00', NULL),
(39, 1, '2024-06-06 15:30:00', NULL),
(40, 1, '2024-06-06 15:45:00', NULL),
(41, 1, '2024-06-09 16:10:00', NULL),
(42, 1, '2024-06-08 18:10:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `specializations`
--

CREATE TABLE `specializations` (
  `specializationId` int(11) NOT NULL,
  `specializationTitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `specializations`
--

INSERT INTO `specializations` (`specializationId`, `specializationTitle`) VALUES
(1, 'Терапевт'),
(2, 'Офтальмолог'),
(4, 'Гастроэнтеролог'),
(5, 'Психиатр');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctorId`),
  ADD KEY `doctors_ibfk_1` (`specializationId`);

--
-- Индексы таблицы `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`managerId`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patientId`);

--
-- Индексы таблицы `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`scheduleId`),
  ADD KEY `patientId` (`patientId`),
  ADD KEY `doctorId` (`doctorId`);

--
-- Индексы таблицы `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`specializationId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `managers`
--
ALTER TABLE `managers`
  MODIFY `managerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `patientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `schedules`
--
ALTER TABLE `schedules`
  MODIFY `scheduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `specializations`
--
ALTER TABLE `specializations`
  MODIFY `specializationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`specializationId`) REFERENCES `specializations` (`specializationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`doctorId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
