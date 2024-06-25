-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 02 2024 г., 19:52
-- Версия сервера: 5.5.62
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dbart`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_basket`
--

CREATE TABLE `admin_basket` (
  `Admin_Basket_ID` int(11) NOT NULL,
  `Assortment_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Count` int(6) NOT NULL,
  `Basket_ID` int(11) NOT NULL,
  `Ordered` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_basket`
--

INSERT INTO `admin_basket` (`Admin_Basket_ID`, `Assortment_ID`, `User_ID`, `Count`, `Basket_ID`, `Ordered`) VALUES
(16, 2, 2, 1, 5, 0),
(17, 1, 2, 1, 6, 1),
(18, 3, 2, 1, 7, 1),
(19, 6, 2, 1, 8, 1),
(20, 3, 4, 1, 10, 0),
(21, 1, 4, 6, 11, 0),
(22, 7, 4, 6, 12, 0),
(23, 3, 4, 8, 13, 0),
(24, 4, 4, 2, 20, 0),
(25, 5, 4, 5, 21, 0),
(26, 2, 4, 1, 22, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `assortment`
--

CREATE TABLE `assortment` (
  `Assortment_ID` int(11) NOT NULL,
  `Name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cash_price` double NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Parametr_1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image2` text CHARACTER SET utf8,
  `Guarante` date NOT NULL,
  `Model` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tesak` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Group_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `assortment`
--

INSERT INTO `assortment` (`Assortment_ID`, `Name`, `Image1`, `Cash_price`, `Description`, `Parametr_1`, `Image2`, `Guarante`, `Model`, `Tesak`, `Group_ID`) VALUES
(1, 'Արտե սալիկ', 'nkar6.jpg', 22400, 'Color Expert Ներկագլան. ներկի վալիկ 18սմ*12մմ*44մմ...', '', NULL, '2024-06-04', '', '', 1),
(2, 'Ներկագլան', 'nkar1.jpg', 2500, 'Color Expert Ներկագլան. ներկի վալիկ 18սմ*12մմ*44մմ 84661802 Color Expert Ներկագլան. ներկի վալիկ 18սմ', '', 'nkar2.jpg', '2024-06-29', '', '', 1),
(3, 'Հատակի լամինատ', 'nkar3.jpg', 5000, 'Color Expert Ներկագլան. ներկի վալիկ 18սմ*12մմ*44մմ 84661802 Color Expert Ներկագլան. ներկի վալիկ 18սմ', '', 'nkar2.jpg', '2024-08-20', '', '', 3),
(4, 'Հեռուստացույցի վարդակ', 'nkar2.jpg', 1100, 'Color Expert Ներկագլան. ներկի վալիկ 18սմ*12մմ*44մմ 84661802 Color Expert Ներկագլան. ներկի վալիկ 18սմ', '', 'nkar2.jpg', '2024-12-12', '', '', 1),
(5, 'Վինիլային պաստառ', 'nkar4.jpg', 45000, 'Color Expert Ներկագլան. ներկի վալիկ 18սմ*12մմ*44մմ 84661802 Color Expert Ներկագլան. ներկի վալիկ 18սմ', '', 'nkar2.jpg', '2029-09-22', '', '', 6),
(6, 'Արտե սալիկ', 'nkar6.jpg', 22400, 'Color Expert Ներկագլան. ներկի վալիկ 18սմ*12մմ*44մմ 84661802 Color Expert Ներկագլան. ներկի վալիկ 18սմ', '', 'nkar2.jpg', '2028-06-14', '', '', 1),
(7, 'Դեկո սթար քիվեր', 'nkar5.jpg', 550, 'Color Expert Ներկագլան. ներկի վալիկ 18սմ*12մմ*44մմ 84661802 Color Expert Ներկագլան. ներկի վալիկ 18սմ', '', 'nkar2.jpg', '2024-10-24', '', '', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `Basket_ID` int(11) NOT NULL,
  `Assortment_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Count` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`Basket_ID`, `Assortment_ID`, `User_ID`, `Count`) VALUES
(12, 7, 4, 6),
(13, 3, 4, 8),
(20, 4, 4, 2),
(21, 5, 4, 5),
(22, 2, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `Group_ID` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`Group_ID`, `Name`) VALUES
(1, 'Կերամիկա'),
(2, 'Գործիքներ'),
(3, 'Պաստառներ'),
(4, 'Ներկեր'),
(5, 'Լաքեր'),
(6, 'Քիվեր'),
(7, 'Այլ ապրանքներ '),
(8, 'Լամինատ'),
(9, 'Էլեկտրիկա'),
(10, 'Ջեռուցման համակարգեր'),
(11, 'Դռներ');

-- --------------------------------------------------------

--
-- Структура таблицы `saved`
--

CREATE TABLE `saved` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Assortment_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Surname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`User_ID`, `Name`, `Surname`, `email`, `Password`, `Gender`, `Phone`, `Address`) VALUES
(1, 'ARTUR', 'ANDIKYAN', 'admin2005@gmail.com', 'admin2005', 'male', '077365574', 'ԴԱՎԹԱՇԵՆ 4 ԹՂՄ. շ. 23,բն. 36'),
(2, 'user', 'user', 'user@gmail.com', 'user123', 'male', '099888888', 'ԴԱՎԹԱՇԵՆ'),
(4, 'ARTUR', 'ANDIKYAN', 'gg@gmail.com', 'dddddd', 'male', '077365574', 'gg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_basket`
--
ALTER TABLE `admin_basket`
  ADD PRIMARY KEY (`Admin_Basket_ID`);

--
-- Индексы таблицы `assortment`
--
ALTER TABLE `assortment`
  ADD PRIMARY KEY (`Assortment_ID`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`Basket_ID`),
  ADD KEY `relationship` (`Assortment_ID`),
  ADD KEY `secondRelationship` (`User_ID`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`Group_ID`);

--
-- Индексы таблицы `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_basket`
--
ALTER TABLE `admin_basket`
  MODIFY `Admin_Basket_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `assortment`
--
ALTER TABLE `assortment`
  MODIFY `Assortment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `Basket_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `Group_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `saved`
--
ALTER TABLE `saved`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `relationship` FOREIGN KEY (`Assortment_ID`) REFERENCES `assortment` (`Assortment_ID`),
  ADD CONSTRAINT `secondRelationship` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
