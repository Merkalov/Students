-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 29 2017 г., 05:56
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `students`
--
CREATE DATABASE IF NOT EXISTS `students` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `students`;

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE `info` (
  `id` int(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `gender` varchar(11) NOT NULL,
  `numberGroup` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `countEge` int(11) NOT NULL,
  `yearOfBirth` year(4) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `info`
--

INSERT INTO `info` (`id`, `userID`, `name`, `surname`, `gender`, `numberGroup`, `email`, `countEge`, `yearOfBirth`, `location`) VALUES
(1, '3', 'Андрей', 'Меркалов', 'male', '212', 'email@ru.ru', 166, 1992, 'urban'),
(2, '4', 'Олег', 'Чуждинова', 'female', '331г', '123123@maui3.ru', 176, 1992, 'urban'),
(3, '5', 'Светлана', 'Есенина', 'male', '331г', '123123@maui33.ru', 123, 1992, 'urban'),
(6, '6', 'Ольга', 'Романова', 'female', '331г', '1233123@maui3.ru', 178, 1992, 'urban'),
(7, '7', 'Роман', 'Сомов', 'male', '331г', '123123@maui3.ru33', 188, 1992, 'urban'),
(8, '8', 'Алексей', 'Лопаев', 'male', '331г', '123343123@maui3.ru', 189, 1992, 'nonresident'),
(9, '9', 'Родион', 'Коломойский', 'male', '1929а', '12333123@maui3.ru', 156, 1992, 'urban'),
(10, '10', 'Лидия', 'Достоевкая', 'female', '1929а', '13423123@maui3.ru', 178, 1992, 'urban'),
(11, '11', 'Виктория', 'Виноградова', 'female', '1929а', 'emai3l@ru.ru', 176, 1992, 'nonresident'),
(12, '12', 'Михаил', 'Горбатов', 'male', '1929а', 'em3ail@ru.ru', 166, 1992, 'urban'),
(13, '13', 'Евгений', 'Шошин', 'male', '1929а', 'em4ail@ru.ru', 155, 1992, 'nonresident'),
(14, '14', 'Елена', 'Абитаева', 'female', '1112', 'emai5l@ru.ru', 199, 1992, 'urban'),
(15, '15', 'Павел', 'Фалинский', 'male', '1112', 'email@ru.ru6', 189, 1992, 'nonresident'),
(16, '16', 'Анатолий', 'Дикарски', 'male', '1112', 'ema4il@ru.ru', 188, 1992, 'urban'),
(17, '17', 'Дарья', 'Бесстужева', 'female', '1112', 'emai45l@ru.ru', 189, 1992, 'urban'),
(18, '18', 'Игорь', 'Фадеев', 'male', '9119', 'e234mail@ru.ru', 154, 1992, 'urban'),
(19, '19', 'Григорий', 'Летов', 'male', '9119', 'ema3434il@ru.ru', 133, 1992, 'nonresident'),
(20, '20', 'Алина', 'Подсолнечная', 'female', '9119', 'e3434mail@ru.ru', 165, 1992, 'urban'),
(21, '21', 'Леонид', 'Жуков', 'male', '9119', 'e3434l@ru.ru', 189, 1992, 'nonresident'),
(22, '22', 'Ксения', 'Лебедева', 'female', '9119', 'emai33434434l@ru.ru', 198, 1992, 'urban'),
(23, '23', 'Тарас', 'Бульба', 'male', '5252е', '3434@ru.ru', 178, 1992, 'nonresident'),
(26, '24', 'Сергей', 'Баженов', 'male', '5252е', '3434@ru.ru', 169, 1992, 'urban'),
(27, '25', 'Кирилл', 'Грохов', 'male', '5252е', 'em34ail@ru.ru', 168, 1992, 'nonresident'),
(28, '26', 'Яна', 'Романова', 'female', '5252е', '444email@ru.ru', 176, 1992, 'urban'),
(29, '27', 'Дмитрий', 'Шолохов', 'male', '5252е', 'emai3434l@ru.ru', 167, 1992, 'nonresident'),
(30, '28', 'Ирина', 'Донская', 'female', '664н', 'e3434mail@ru.ru', 166, 1992, 'urban'),
(31, '29', 'Александ', 'Домодедов', 'male', '664н', '3434@ru.ru', 145, 1992, 'urban'),
(32, '30', 'Валентина', 'Тихонова', 'female', '664н', 'ema333il@ru.ru', 148, 1992, 'urban'),
(33, '31', 'Ульяна', 'Ленина', 'female', '777ис', '333@ru.ru', 165, 1992, 'nonresident'),
(34, '32', 'Абдула', 'Имбрачмхимов', 'male', '777ис', 'ema443il@ru.ru', 145, 1992, 'urban'),
(35, '33', 'Анна', 'Носова', 'female', '777ис', 'em657ail@ru.ru', 146, 1992, 'nonresident'),
(36, '34', 'Ян', 'Н', 'male', '777ис', 'em666ail@ru.ru', 148, 1992, 'nonresident'),
(38, '35', 'Петр', 'Щербатов', 'male', '777ис', 'ema6767il@ru.ru', 154, 1992, 'nonresident'),
(39, '36', 'Валерий', 'Корпатов', 'male', '777ис', 'em676ail@ru.ru', 166, 1992, 'urban'),
(40, '37', 'Виктор', 'Зуев', 'male', '777ис', 'email666@ru.ru', 156, 1992, 'nonresident'),
(41, '40', 'Семен', 'Мельников', 'male', '1599г', 'asdasasdasdd@mail.ru', 155, 1990, 'urban'),
(42, '41', 'Артемий', 'Лебедева', 'male', '121а', 'asd222asd@mail.ru', 123, 1992, 'nonresident'),
(43, '42', 'Елена', 'Шолохова', 'female', '121а', 'fo22go11t@ru.ru', 167, 1992, 'urban');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash_cookie` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `hash_cookie`, `user_ip`) VALUES
(3, 'email@', '$2y$10$b.6Psp0lflIC5plBHPLQXeuZOTp8xpZ55FOPJxbVqVbOyuzCUGyIW', '6343eee9e3107c259258548ffe22154a', '127.0.0.1'),
(4, '123123@maui3.ru', '$2y$10$yVFOkIQ2t9zzNVq0H3zrPuh5Ek8r.jKjbbCclB1SyeWfuSjOvTioy', 'a238cf6cd01d3aa6269d90ac8b9f2a01', '127.0.0.1'),
(5, 'gloria@lisr.ru', '$2y$10$w1Hpgvd03zXalDmY5T8b5u2lqHAyr5/SBYOtEjZMEN/kBB6S8Rkhe', 'b16ea59fe9034b1c699d2ac80564a5e8', '127.0.0.1'),
(6, 'r3@', '$2y$10$wdOnKsl91xHOUdQGOwN6XO7rT00GHuMdI1LfiCGCXEoT4B8qxO5La', 'ed483396523f01e2ccb6e4ecd0f9a53c', '127.0.0.1'),
(7, 'sobaka@123.ru', '$2y$10$Y.LZBQ0kBP4WrI84fZFFLeXVO0Wustx/Y/kgzLOdF8Xcq440ZHznO', '7a7377fc6017b7c305ce8f9a925435b3', '127.0.0.1'),
(8, 'hodor@mail.ru', '$2y$10$BKm3s4qESGIimYVIKoM6uedpBo63CSYKG37BUnpQF.BtjE.Gk.jKC', '7bd78587f0740e53afec7d2541db286b', '127.0.0.1'),
(9, '112@', '$2y$10$GkHZ00f7KF2G2xOwtscMr.B5AX6hQAHJvEYc7nNE0nJeay.8FfIii', '4e9c45dcf451a0169102c77718e15d0b', '127.0.0.1'),
(10, 'god@ra.ru', '$2y$10$UFqEPohRFTU4KsOyOrv7/egNLlxOWSJCCkpCWuG7vLX6j.B8/NYGC', '7cba799f455bf03f93ffac46e1d41a20', '127.0.0.1'),
(11, 'gosposha@lidia.ru', '$2y$10$7HPtCC.ypnjZ/9b07v3IdenToqAi7TIPcyxqsMCQAWfpCE5wycMRW', '86322948a3e220f69366cdc2404d7be5', '127.0.0.1'),
(12, 'r3@mail.ru', '$2y$10$lX6P61NQhP9B2vmbBmiWrejZslYjaGWf6GzMB6Rbca2b8qqmcaFEG', 'b35caa1ecd4bc2b984abb25243abdc03', '127.0.0.1'),
(13, 'dagestan@mail.ru', '$2y$10$ggGH9lSeDTTqBSB66kQDh.tA6725085qZrWq4xiG9wPCl4LRpzwXu', 'b80bc0b3975694845465963cbdb54406', '127.0.0.1'),
(14, 'ololo@ram.ru', '$2y$10$yHB6mHSNrlOqnZedJi4G6ec0ThOgOU2W.EnYVACbJXPhR99z7IHlS', '7fe37f9bd839293fd9ff7c790807aff6', '127.0.0.1'),
(15, 'totarin@r.ru', '$2y$10$lPpLXmsaU5wE2djzGb4Z7.CGvE8qdvjCVeLIaFZIURrH7TrBVRome', '2110ac398767f975ce7e893b4dcfea1f', '127.0.0.1'),
(16, 'popal@ru.ru', '$2y$10$qLE8l.bd99FlL9VMx26yqeGbMKeMenHHsRD9CgT4/7eiHrgFwsGuq', '6ed51c7e14cbfdb71bee09ad2d8bbd8b', '127.0.0.1'),
(17, 'khal@k.ru', '$2y$10$W9QZ7jvq2iI7z9x/MlZf2eZJWxQ2L7cIQwM8/NuYS4jzKn3KCnCFS', '381758f17c5cca8eca477b35dce60273', '127.0.0.1'),
(18, 'fogot@ru.ru', '$2y$10$fBT1rtJkEfZO62EtaKyDvOngRwUmc2r8Ca7rBHBsWRdyi1WJYSbYa', '22aa22434b331b3c5f94785020b0ac1b', '127.0.0.1'),
(19, 'ggs@ru.ru', '$2y$10$uDjrJChCWm0AIg/m0z2KlukPYANTlSfiEHu/FEpZ7oeU7YVpKIzsC', 'a372097b5fde2601f8355eebd2033d7a', '127.0.0.1'),
(20, 'totu@r.ru', '$2y$10$tN3A5/Pi6SW6fVFfJAb22OLR7xV3c31NMz3SA87dWpL.uakNpgsEO', '232b863035fbf815b44a551d7d354081', '127.0.0.1'),
(21, 'jorahob@li.ru', '$2y$10$cg6jMxD22LySBrVhjuCXj.jD/oagFQe.4td3xjuvEUAGqljRHv31u', '7a9fab0d7e3b00346464ca68b2a426e0', '127.0.0.1'),
(22, 'horoh@ru.ru', '$2y$10$IqkZzMbZsvIYGJCEXOUqiu0oHXp9DBCqXJX91ILqEqxPpRjnaX27i', 'ce4608759e6f25817f4b114825a7b373', '127.0.0.1'),
(23, 'hor1oh@ru.ru', '$2y$10$U89ZrF2hGhLAIEb6X12HYeInlpI/UNtp0Z3p0fPlfCXxGE1QOdOoG', '07de88005bb29dc36a14cc5d9ccd6765', '127.0.0.1'),
(24, 'trtr@ru.ru', '$2y$10$XRM.sEJ.rm..viDGcNkXQetqerqHReXkq89Vrn/bViphiNEYT0itS', '90d390ea69f1510a9d754edb204282cb', '127.0.0.1'),
(25, 'gogog@1.ru', '$2y$10$Q1gUxO4MJx7FOztO58S8KOOJf733TkbMaQzaK05uDQkQbpH8ndKOG', 'fdbddf7b521541664c8ac825150de79c', '127.0.0.1'),
(26, 'fogo11t@ru.ru', '$2y$10$ZJlRTJKmtLhj7K1xfAaub..s5Vh5PJhMn8YhFsI4jAAv6KtsN4tTi', 'a1d038ca4ec78e25b37d89b4d4a68820', '127.0.0.1'),
(27, 'fsadas2@ru.ru', '$2y$10$BgI.xbnYoY7NImlwLULMwuiDyqTMsi/uqIl1oxS/kZsXHTOsHeWpa', '6f57b3c4c239e1b7304965425e8eaa6b', '127.0.0.1'),
(28, 'fsad33as2@ru.ru', '$2y$10$qSIND26rKJ7gWzEqSzXSmOKBW1Mt5Z77u6LeD1UFk2xjPmh2qRvXK', 'e2879631df0cf9d4f8c0f80fd4c6873d', '127.0.0.1'),
(29, 'email@11ee1.ru', '$2y$10$rK9s6vsFsPz.NIJp.lkRsOJObMLJv0KFNfYz9nrz9O8c2AT1mDnka', 'a5af93fea77252144f5c9c72b84f4312', '127.0.0.1'),
(30, 'asdasda@mail.ru', '$2y$10$VvHjidAXGPi5lmRllPq1heXqihk/aQs0QidKwFP3K/aFuFFrphFfW', 'd087f5d16c44ec5aba4228f2b5b85a17', '127.0.0.1'),
(31, 'ggg@', '$2y$10$7aidqZ55xyNKWogOymu6sO0iHRZYYle4burVcKBeKBCsYedQPuj5C', '6ca1db70ba74085af0164a2f27683f12', '127.0.0.1'),
(32, 'ggg@11', '$2y$10$aLg3MNajLuXEvHFIlaf25ehJC6hoIqaxCJez8ItjRbeUAZdrvxcDm', '2ee0d7f512676a0656d0137a8c40d0a7', '127.0.0.1'),
(33, 'goga@asdru.ru', '$2y$10$SU3RRCws2digOMXdGJRLMOQegjXJpvpJc52Gsia7pUMuNAWV4qo32', 'd5e1d9697e83e2a226ca5571dd3c1817', '127.0.0.1'),
(34, 'email@111.ru', '$2y$10$Xv9ZPB4YH/.DCbju4fh36OjO9RnUQiRJFz2vPoWZkbKsqj36fN52G', 'e7c1233393faa4729023c3d3ac55551a', '127.0.0.1'),
(35, 'gogogo@ru.ru', '$2y$10$6JKjXgy0Opp3fCfbIg3W5.FQwMERfGnwgSmYPzKQ5NLUZFDTmArp6', '2018d7ed1f9c0c74ece2bb0bfc0850b5', '127.0.0.1'),
(36, 'dfdfdf@mail.ru', '$2y$10$EFuKOzbTcekpDdcOB.1c8OKfRSOIIN6JzfEP0LAFazEKPrdGXyGGq', '161dfb331ff4e595e934d70cfa73a293', '127.0.0.1'),
(37, 'asdasd@mail.ru', '$2y$10$HILyQUG.7zbZ0Xs3l8q5H.GaSJeONPcJwRTxzrSC6tOu3s95pFcm6', 'bb74b1fe061e6f88f2caff15e60bba25', '127.0.0.1'),
(38, 'asdasd1111@mail.ru', '$2y$10$uTkqtqv/vhggahZhrktzVe13MrMDtJREi2vNcAzbyIo7/x54M1uqu', '0a6498c1777090bca614e309ca01487a', '127.0.0.1'),
(39, 'eeee@mail.ru', '$2y$10$8vCba0Vyn/xX4uXsZafw.uI0TMndhzUrvNlvJ/HGLoKy3zLK8pzfy', '1c115f962c9f25d629b77ab0ab620807', '127.0.0.1'),
(40, 'asdasasdasdd@mail.ru', '$2y$10$Neh5r0N6fttMO4XwQqgZJ.cs0bnF1YClriR.L9/FNoGQZTBM.eAk6', 'aa6d0bcf1f215a3c0ec6451e1662f170', '127.0.0.1'),
(41, 'dfsdfdf@ru.ru', '$2y$10$iOTtmtAXrE8Ki32Xy/ZNqemmjkKwGcXMcXkFvffY6tHPbWbxst.6C', '4c310c7573e5a0b90cd81517db361ec5', '127.0.0.1'),
(42, 'fo22go11t@ru.ru', '$2y$10$s7YCHVPXbiEHOHqnvEy.Qe.mbRE6jL0nIW9amJaSOSVGMPrZKeVZm', '5cf5fcb929b0a6cbebeb58e21c194658', '127.0.0.1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_3` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `info`
--
ALTER TABLE `info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
