-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 23 2023 г., 12:10
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `l2newage`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `shop_id`, `count`, `updated_at`, `created_at`) VALUES
(24, 4, 2, 2, '2022-10-06 20:07:20', '2022-10-06 20:05:27'),
(25, 4, 1, 2, '2022-10-06 20:09:09', '2022-10-06 20:05:30'),
(53, 2, 2, 2, '2022-10-07 18:17:50', '2022-10-07 17:52:40'),
(72, 1, 3, 3, '2022-10-27 09:06:03', '2022-10-10 09:56:12'),
(73, 1, 5, 1, '2022-10-11 12:27:12', '2022-10-10 09:56:17'),
(75, 1, 1, 8, '2022-10-27 09:06:09', '2022-10-10 12:13:22');

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `room_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `message`, `room_id`, `updated_at`, `created_at`) VALUES
(41, 1, '1', 1, '2022-11-06 19:03:11', '2022-11-06 19:03:11'),
(42, 2, '1', 1, '2022-11-06 19:03:29', '2022-11-06 19:03:29'),
(43, 2, '1', 1, '2022-11-06 19:03:47', '2022-11-06 19:03:47'),
(44, 2, '1', 1, '2022-11-06 19:07:00', '2022-11-06 19:07:00'),
(45, 2, '1', 1, '2022-11-06 19:07:09', '2022-11-06 19:07:09'),
(46, 3, '1', 1, '2022-11-06 19:07:21', '2022-11-06 19:07:21'),
(47, 2, 'привет', 1, '2022-11-06 19:13:20', '2022-11-06 19:13:20'),
(48, 3, 'пока', 1, '2022-11-06 19:13:27', '2022-11-06 19:13:27'),
(49, 2, '1', 1, '2022-11-07 05:27:32', '2022-11-07 05:27:32'),
(50, 2, '1', 3, '2022-11-07 05:28:23', '2022-11-07 05:28:23'),
(51, 2, 'ff', 1, '2022-11-07 05:28:48', '2022-11-07 05:28:48'),
(52, 2, '1', 1, '2022-11-07 05:38:09', '2022-11-07 05:38:09'),
(53, 2, '1', 1, '2022-11-07 05:41:26', '2022-11-07 05:41:26'),
(54, 2, '1', 3, '2022-11-07 05:41:32', '2022-11-07 05:41:32'),
(55, 2, '1', 3, '2022-11-07 05:44:57', '2022-11-07 05:44:57'),
(56, 2, 'привет', 3, '2022-11-07 07:09:12', '2022-11-07 07:09:12'),
(57, 2, 'привет', 3, '2022-11-07 07:09:36', '2022-11-07 07:09:36'),
(58, 2, 'hi', 1, '2022-11-07 07:17:10', '2022-11-07 07:17:10'),
(59, 2, 'привет', 3, '2022-11-07 07:19:18', '2022-11-07 07:19:18'),
(60, 2, 'hi', 3, '2022-11-07 07:21:03', '2022-11-07 07:21:03'),
(61, 2, '1', 3, '2022-11-07 07:42:29', '2022-11-07 07:42:29'),
(62, 2, '1', 3, '2022-11-07 07:42:45', '2022-11-07 07:42:45'),
(63, 2, '1', 3, '2022-11-07 07:43:48', '2022-11-07 07:43:48'),
(64, 2, 'hi', 3, '2022-11-07 07:43:52', '2022-11-07 07:43:52'),
(65, 2, 'hi', 3, '2022-11-07 07:48:17', '2022-11-07 07:48:17'),
(66, 2, 'hi', 3, '2022-11-07 07:48:40', '2022-11-07 07:48:40'),
(67, 2, 'hi', 3, '2022-11-07 08:06:05', '2022-11-07 08:06:05'),
(68, 2, 'hi', 3, '2022-11-07 08:25:21', '2022-11-07 08:25:21'),
(69, 2, 'привет из 3', 3, '2022-11-07 08:26:00', '2022-11-07 08:26:00'),
(70, 2, '1', 3, '2022-11-07 08:35:44', '2022-11-07 08:35:44'),
(71, 2, '1', 3, '2022-11-07 08:36:49', '2022-11-07 08:36:49'),
(72, 2, 'hi', 3, '2022-11-07 08:37:41', '2022-11-07 08:37:41'),
(73, 2, 'hi', 3, '2022-11-07 08:37:57', '2022-11-07 08:37:57'),
(74, 2, '1', 3, '2022-11-07 08:38:30', '2022-11-07 08:38:30'),
(75, 2, '1', 3, '2022-11-07 08:38:34', '2022-11-07 08:38:34'),
(76, 2, '1', 3, '2022-11-07 08:40:35', '2022-11-07 08:40:35'),
(77, 2, '1', 3, '2022-11-07 08:46:31', '2022-11-07 08:46:31'),
(78, 2, '3', 3, '2022-11-07 08:47:04', '2022-11-07 08:47:04'),
(79, 2, '1', 1, '2022-11-07 09:00:56', '2022-11-07 09:00:56'),
(80, 2, '33', 1, '2022-11-07 09:01:24', '2022-11-07 09:01:24'),
(81, 2, 'привет', 4, '2022-11-07 09:01:56', '2022-11-07 09:01:56'),
(82, 2, 'привет', 4, '2022-11-07 09:03:10', '2022-11-07 09:03:10'),
(83, 2, '1', 4, '2022-11-07 13:43:52', '2022-11-07 13:43:52'),
(84, 2, 'hi', 1, '2022-11-08 10:04:18', '2022-11-08 10:04:18'),
(85, 2, 'hi', 1, '2022-11-08 10:04:23', '2022-11-08 10:04:23'),
(86, 2, 'hi', 1, '2022-11-08 10:04:36', '2022-11-08 10:04:36'),
(87, 2, '1', 1, '2022-11-08 10:08:25', '2022-11-08 10:08:25'),
(88, 2, 'hi', 1, '2022-11-08 10:09:46', '2022-11-08 10:09:46'),
(89, 2, 'hi', 1, '2022-11-08 10:10:03', '2022-11-08 10:10:03'),
(90, 2, 'hi', 1, '2022-11-08 10:26:31', '2022-11-08 10:26:31'),
(91, 2, '1', 1, '2022-11-08 10:27:38', '2022-11-08 10:27:38'),
(92, 2, '1', 1, '2022-11-08 10:30:04', '2022-11-08 10:30:04'),
(93, 2, '1', 1, '2022-11-08 10:30:22', '2022-11-08 10:30:22'),
(94, 2, '1', 1, '2022-11-08 10:30:41', '2022-11-08 10:30:41'),
(95, 2, '1', 1, '2022-11-08 10:31:09', '2022-11-08 10:31:09'),
(96, 2, '1', 1, '2022-11-08 10:31:49', '2022-11-08 10:31:49'),
(97, 2, '1', 1, '2022-11-08 10:33:24', '2022-11-08 10:33:24'),
(98, 2, '1', 1, '2022-11-08 10:34:54', '2022-11-08 10:34:54'),
(99, 2, '1', 1, '2022-11-08 10:36:12', '2022-11-08 10:36:12'),
(100, 2, 'hhh', 1, '2022-11-08 10:36:19', '2022-11-08 10:36:19'),
(101, 2, 'hhh', 1, '2022-11-08 10:37:18', '2022-11-08 10:37:18'),
(102, 2, '1', 1, '2022-11-08 10:37:26', '2022-11-08 10:37:26'),
(103, 2, 'ho', 1, '2022-11-08 10:38:59', '2022-11-08 10:38:59'),
(104, 2, '1', 1, '2022-11-08 10:46:17', '2022-11-08 10:46:17'),
(105, 2, '1', 1, '2022-11-08 11:01:45', '2022-11-08 11:01:45'),
(106, 2, '1', 1, '2022-11-08 11:11:17', '2022-11-08 11:11:17'),
(107, 2, '1', 1, '2022-11-08 11:15:52', '2022-11-08 11:15:52'),
(108, 2, '1', 1, '2022-11-08 11:35:27', '2022-11-08 11:35:27'),
(109, 2, '1', 1, '2022-11-08 11:54:04', '2022-11-08 11:54:04'),
(110, 2, 'ggg', 1, '2022-11-08 11:57:28', '2022-11-08 11:57:28'),
(111, 2, 'ggg', 1, '2022-11-08 11:57:56', '2022-11-08 11:57:56'),
(112, 2, 'qqq', 1, '2022-11-08 11:59:26', '2022-11-08 11:59:26'),
(113, 2, 't', 1, '2022-11-08 12:17:14', '2022-11-08 12:17:14'),
(114, 2, '1', 1, '2022-11-08 16:02:13', '2022-11-08 16:02:13'),
(115, 2, '1', 1, '2022-11-08 16:54:09', '2022-11-08 16:54:09'),
(116, 2, 'g', 1, '2022-11-08 17:22:32', '2022-11-08 17:22:32'),
(117, 2, '1', 1, '2022-11-08 17:25:07', '2022-11-08 17:25:07'),
(118, 2, '1', 1, '2022-11-08 17:36:41', '2022-11-08 17:36:41'),
(119, 2, '1', 1, '2022-11-08 17:38:47', '2022-11-08 17:38:47'),
(120, 2, '1', 1, '2022-11-08 17:40:08', '2022-11-08 17:40:08'),
(121, 2, '1', 1, '2022-11-08 17:43:42', '2022-11-08 17:43:42'),
(122, 2, '1', 1, '2022-11-08 17:48:06', '2022-11-08 17:48:06'),
(123, 2, '1', 1, '2022-11-08 17:51:07', '2022-11-08 17:51:07'),
(124, 2, 'gh', 1, '2022-11-08 17:51:18', '2022-11-08 17:51:18'),
(125, 2, 'kk', 1, '2022-11-08 17:51:40', '2022-11-08 17:51:40');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `filter_name`
--

CREATE TABLE `filter_name` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `filter_name`
--

INSERT INTO `filter_name` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Наборы', '2022-10-03 10:06:29', '2022-10-03 10:06:29'),
(2, 'Руны', '2022-10-03 10:06:29', '2022-10-03 10:06:29'),
(3, 'Валюта', '2022-10-03 10:07:54', '2022-10-03 10:07:54'),
(4, 'Украшения', '2022-10-03 10:07:54', '2022-10-03 10:07:54'),
(5, 'Бесплатное', '2022-10-06 06:34:16', '2022-10-06 06:34:16'),
(6, 'Скидка', '2022-10-06 06:34:27', '2022-10-06 06:34:27');

-- --------------------------------------------------------

--
-- Структура таблицы `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tag_name_id` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forum`
--

INSERT INTO `forum` (`id`, `title`, `updated_at`, `created_at`, `description`, `user_id`, `tag_name_id`) VALUES
(1, 'О как', '2022-12-21 20:28:38', '2022-12-21 20:28:38', 'Есть о чем подумать', 12, ''),
(2, 'online casino', '2022-12-21 21:00:59', '2022-12-21 21:00:59', 'casino game \r\ncasino games', 13, ''),
(3, 'online casinos', '2022-12-25 11:42:48', '2022-12-25 11:42:48', 'casinos online \r\ncasinos online \r\nonline casinos \r\ncasino', 15, ''),
(4, 'casino game', '2022-12-25 16:10:48', '2022-12-25 16:10:48', 'slots \r\ncasinos \r\ncasinos online \r\nslots \r\nonline casino \r\ncasinos \r\ncasino \r\ncasino', 16, ''),
(5, 'loans online', '2023-01-15 00:36:15', '2023-01-15 00:36:15', 'cash advance \r\nloans \r\ncash advance \r\nloans \r\nloans online \r\nloan', 22, ''),
(6, 'casino games', '2023-01-16 04:47:07', '2023-01-16 04:47:07', 'casinos online \r\ncasino real money \r\ncasino online \r\nonline casinos', 23, ''),
(7, 'Find latest news about Online Casinos, New Slots Games and latest Sports Betting trends here At Jackpotbetgame.com.', '2023-02-05 17:20:07', '2023-02-05 17:20:07', 'At Jackpotbetgame.com you can find latest news about Online Casinos, New Slots Games and latest Sports Betting trends. \r\n \r\nPlease check https://www.jackpotbetgame.com/', 26, ''),
(8, 'NY Times News Today', '2023-02-05 17:20:11', '2023-02-05 17:20:11', 'The NY Times News Today for coverage of international news, politics, business, technology, science, health, arts, sports and more. \r\n \r\nFor more News Visit : https://www.nytimesnewstoday.com', 27, ''),
(9, 'the top knits', '2023-04-26 14:43:14', '2023-04-26 14:43:14', 'https://connect.svu.org/network/members/profile?UserKey=da3553c4-e967-40b3-bf2a-01876e689bbb', 45, ''),
(10, 'Top 10 Best Casinos', '2023-05-06 22:40:53', '2023-05-06 22:40:53', 'Welcome, https://true-shop.online/ Time Travel Slots', 51, ''),
(11, 'News 2023', '2023-05-23 08:30:54', '2023-05-23 08:30:54', ' Видео - Помогаем продавать Ваш товар в Etsy + Pinterest + SEO дают высокие результаты продаж. Также работаем с Shopify, ebay, amazon и др.', 59, ''),
(12, 'Выгодное предложение', '2023-05-30 10:58:11', '2023-05-30 10:58:11', 'https://propositive.ru/\r\nhttps://rainsycat.ru/\r\nhttps://gantbpm.ru/\r\nhttps://kingdia.com/\r\nhttps://quality21.ru/', 56, ''),
(13, 'Выгодное предложение', '2023-05-31 00:02:15', '2023-05-31 00:02:15', 'https://kmslife.ru/\r\nhttps://hydrograss.ru/\r\nhttps://pruslin.ru/\r\nhttps://pargames.ru/\r\nhttps://lugaland.com/', 56, ''),
(14, 'Спортивные игры', '2023-05-31 10:56:30', '2023-05-31 10:56:30', 'Если вы как и я мучаетесь в поисках зеркало оф сайтов для ставок и боитесь, что наткнетесь на фуфло всякое, то делюсь проверенными зеркалами) \r\nhttps://mostbet-links-1.top \r\nhttps://mostbet-links-2.top \r\nhttps://mostbet-links-3.top \r\nhttps://mostbet-links-4.top \r\nhttps://mostbet-links-5.top \r\nhttps://mostbet-links-6.top \r\nhttps://mostbet-links-7.top \r\nhttps://mostbet-links-8.top \r\nhttps://mostbet-links-9.top \r\nhttps://mostbet-links-10.top \r\nhttps://mostbet-links-11.top \r\nhttps://mostbet-links-12.top \r\nhttps://mostbet-links-13.top \r\nhttps://mostbet-links-14.top \r\nhttps://mostbet-links-15.top', 62, ''),
(15, 'Заказать прогон Хрумером и ГСА', '2023-06-27 02:00:09', '2023-06-27 02:00:09', 'Прогон сайта лиц.Заказать прогон Хрумером  и ГСА по Траст базам с гарантией. Беру за основу для продвижения Ваши ключевые слова и текст. \r\nЗаказать Прогон Хрумером и ГСА можно в телеграмм логин @pokras777 здесь наша группа в телеграмм https://t.me/+EYh48YzqWf00OTYy или в скайпе pokras7777 \r\nили по почте bikon777@yandex.ru', 70, ''),
(16, 'Печати отатизыв', '2023-07-09 07:58:20', '2023-07-09 07:58:20', 'Месяц назад , нужно было заказать Штампы . По совету знакомых по работе которые уже пользовались услугами фирмы \r\nruno-z.ru решил и я послушать совета. \r\nСразу скажу ребята своё дело знают крепко. \r\nСтоимость вышла та, что и обговаривали перед работами,  я остался очень доволен и теперь всем их рекомендую, да и в целом, цены в печатнике доступные. Вообщем, рекомендую!', 71, ''),
(17, 'quick cash payday loan', '2023-07-09 22:16:51', '2023-07-09 22:16:51', 'cash advance \r\nget loans online', 72, ''),
(18, 'Выгодное предложение', '2023-07-30 03:31:33', '2023-07-30 03:31:33', 'blackdesert.su\r\nhttps://mirledi.net/prichiny-oformit-strahovku-dlja-zanjatij-sportom/\r\nhttps://o-dns.ru/raznoe/poleznye-nyuansy-strahovaniya-sportsmenov\r\nhttps://howseptik.com/raznoe/kak-vybrat-kreditnuyu-kartu-dlya-samozanyatyh.html\r\nhttps://app.gitter.im/#/room/#google_material-design-lite:gitter.im', 56, ''),
(19, 'Выгодное предложение', '2023-07-30 13:44:14', '2023-07-30 13:44:14', 'https://noprost.com/news/gde-vygodno-oformit-osago-na-god.html\r\nspacesport.su\r\nhttps://100vagonov.com/osobennosti-strahovaniya-sportsmenov-na-banki-ru/\r\nhttps://telegra.ph/Pochemu-vazhno-proveryat-licenziyu-MFO-pri-oformlenii-zajma-07-17\r\nhttps://www.kiaplaw.ru/bitrix/components/bitrix/news/lang/ru/help/tips/3/4/news/9/590_krediti_kak_sravnit_usloviya.html', 56, ''),
(20, 'CSStore is specialized in reselling Discount IronCAD software.', '2023-08-12 09:54:31', '2023-08-12 09:54:31', 'Hi, I recently came to the CS Store. \r\nThey sell OEM Noodlesoft software, prices are actually low, I read reviews and decided to Buy OEM Navisworks Manage 2020, the price difference with the official site is 30%!!! Tell us, do you think this is a good buy? \r\nBuy Cheap Ableton Live 11 Suite', 76, ''),
(21, 'late-model', '2023-08-13 09:59:21', '2023-08-13 09:59:21', 'Hello.great ux, check ours,  online casino real money  casino online', 77, ''),
(22, 'гидроизоляция', '2023-09-24 19:58:54', '2023-09-24 19:58:54', 'Akson SC LLC offers services for applying SAP \"BIURS\", protegol,RPU-1001 and RPU1021,skochcoat and other polymers and mastics by airless spraying on shaped products, shut-off valves and pipes of various diameters for CS (DCS), NPS, re-insulation of the linear part of gas and oil pipelines, etc. \r\n \r\nYekaterinburg, \r\nhttp://ckanural.ru \r\n \r\nhttps://ckanural.ru/sap_biurs_nanesenie_rashod_materiala/ \r\n \r\nhttps://ckanural.ru/ppu/ \r\n \r\nhttps://youtu.be/tHbeyUpKHlw \r\n \r\nhttps://youtu.be/2oLz7_LW4Zs \r\n \r\nPerforms work on the device: \r\nmonolithic, reliable, durable and high-strength roof, as well as repair of old roofing /by sintering/; \r\nanti-icing system \"roof without icicles\", heating of drains; \r\nanti-corrosion treatment of any coatings. \r\nspraying \r\npolyurethane foam, \r\npolyurea, \r\nliquid rubber \r\nsandblasting of metal structures', 80, ''),
(23, 'Youtube to mp3', '2023-09-26 05:43:18', '2023-09-26 05:43:18', 'Eximious words! I couldn\'t reconcile more with your points. It\'s happy to get the drift such mindful insights shared here. \r\nYoutube to mp3 converter \r\nYoutube to mp3 converter', 81, ''),
(24, 'гидроизоляция', '2023-09-30 06:39:23', '2023-09-30 06:39:23', 'Akson SC LLC offers services for applying SAP \"BIURS\", protegol,RPU-1001 and RPU1021,skochcoat and other polymers and mastics by airless spraying on shaped products, shut-off valves and pipes of various diameters for CS (DCS), NPS, re-insulation of the linear part of gas and oil pipelines, etc. \r\n \r\nYekaterinburg, \r\nhttp://ckanural.ru \r\n \r\nhttps://ckanural.ru/sap_biurs_nanesenie_rashod_materiala/ \r\n \r\nhttps://ckanural.ru/ppu/ \r\n \r\nhttps://youtu.be/tHbeyUpKHlw \r\n \r\nhttps://youtu.be/2oLz7_LW4Zs \r\n \r\nPerforms work on the device: \r\nmonolithic, reliable, durable and high-strength roof, as well as repair of old roofing /by sintering/; \r\nanti-icing system \"roof without icicles\", heating of drains; \r\nanti-corrosion treatment of any coatings. \r\nspraying \r\npolyurethane foam, \r\npolyurea, \r\nliquid rubber \r\nsandblasting of metal structures', 80, ''),
(25, 'Titan publick game server', '2023-10-02 20:25:20', '2023-10-02 20:25:20', 'best server Conter strike source v34 https://vk.com/titan_publickcss', 84, ''),
(26, 'CheapSoftwareStore is specialized in reselling Inexpensive Avid software.', '2023-10-22 10:35:28', '2023-10-22 10:35:28', 'Hi, I recently came to the CSStore. \r\nThey sell OEM 3Ci software, prices are actually low, I read reviews and decided to Buy Cheap Edgecam R1, the price difference with the official online store is 20%!!! Tell us, do you think this is a good buy? \r\n \r\nBuy Luxion Keyshot 9', 76, ''),
(27, 'You made the point.', '2023-11-04 10:34:53', '2023-11-04 10:34:53', 'Really lots of superb data. buy tenormin online  \r\nMany thanks extremely valuable. Will certainly share site with my pals. buy tenormin  \r\nYour images look great !!!', 89, '');

-- --------------------------------------------------------

--
-- Структура таблицы `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forum_posts`
--

INSERT INTO `forum_posts` (`id`, `description`, `updated_at`, `created_at`, `user_id`, `forum_id`) VALUES
(1, 'Есть о чем подумать', '2022-12-21 20:28:38', '2022-12-21 20:28:38', 12, 1),
(2, 'casino game \r\ncasino games', '2022-12-21 21:00:59', '2022-12-21 21:00:59', 13, 2),
(3, 'casinos online \r\ncasinos online \r\nonline casinos \r\ncasino', '2022-12-25 11:42:48', '2022-12-25 11:42:48', 15, 3),
(4, 'slots \r\ncasinos \r\ncasinos online \r\nslots \r\nonline casino \r\ncasinos \r\ncasino \r\ncasino', '2022-12-25 16:10:48', '2022-12-25 16:10:48', 16, 4),
(5, 'cash advance \r\nloans \r\ncash advance \r\nloans \r\nloans online \r\nloan', '2023-01-15 00:36:15', '2023-01-15 00:36:15', 22, 5),
(6, 'casinos online \r\ncasino real money \r\ncasino online \r\nonline casinos', '2023-01-16 04:47:07', '2023-01-16 04:47:07', 23, 6),
(7, 'At Jackpotbetgame.com you can find latest news about Online Casinos, New Slots Games and latest Sports Betting trends. \r\n \r\nPlease check https://www.jackpotbetgame.com/', '2023-02-05 17:20:07', '2023-02-05 17:20:07', 26, 7),
(8, 'The NY Times News Today for coverage of international news, politics, business, technology, science, health, arts, sports and more. \r\n \r\nFor more News Visit : https://www.nytimesnewstoday.com', '2023-02-05 17:20:11', '2023-02-05 17:20:11', 27, 8),
(9, 'https://connect.svu.org/network/members/profile?UserKey=da3553c4-e967-40b3-bf2a-01876e689bbb', '2023-04-26 14:43:14', '2023-04-26 14:43:14', 45, 9),
(10, 'Welcome, https://true-shop.online/ Time Travel Slots', '2023-05-06 22:40:53', '2023-05-06 22:40:53', 51, 10),
(11, ' Видео - Помогаем продавать Ваш товар в Etsy + Pinterest + SEO дают высокие результаты продаж. Также работаем с Shopify, ebay, amazon и др.', '2023-05-23 08:30:54', '2023-05-23 08:30:54', 59, 11),
(12, 'https://propositive.ru/\r\nhttps://rainsycat.ru/\r\nhttps://gantbpm.ru/\r\nhttps://kingdia.com/\r\nhttps://quality21.ru/', '2023-05-30 10:58:11', '2023-05-30 10:58:11', 56, 12),
(13, 'https://kmslife.ru/\r\nhttps://hydrograss.ru/\r\nhttps://pruslin.ru/\r\nhttps://pargames.ru/\r\nhttps://lugaland.com/', '2023-05-31 00:02:15', '2023-05-31 00:02:15', 56, 13),
(14, 'Если вы как и я мучаетесь в поисках зеркало оф сайтов для ставок и боитесь, что наткнетесь на фуфло всякое, то делюсь проверенными зеркалами) \r\nhttps://mostbet-links-1.top \r\nhttps://mostbet-links-2.top \r\nhttps://mostbet-links-3.top \r\nhttps://mostbet-links-4.top \r\nhttps://mostbet-links-5.top \r\nhttps://mostbet-links-6.top \r\nhttps://mostbet-links-7.top \r\nhttps://mostbet-links-8.top \r\nhttps://mostbet-links-9.top \r\nhttps://mostbet-links-10.top \r\nhttps://mostbet-links-11.top \r\nhttps://mostbet-links-12.top \r\nhttps://mostbet-links-13.top \r\nhttps://mostbet-links-14.top \r\nhttps://mostbet-links-15.top', '2023-05-31 10:56:30', '2023-05-31 10:56:30', 62, 14),
(15, 'Прогон сайта лиц.Заказать прогон Хрумером  и ГСА по Траст базам с гарантией. Беру за основу для продвижения Ваши ключевые слова и текст. \r\nЗаказать Прогон Хрумером и ГСА можно в телеграмм логин @pokras777 здесь наша группа в телеграмм https://t.me/+EYh48YzqWf00OTYy или в скайпе pokras7777 \r\nили по почте bikon777@yandex.ru', '2023-06-27 02:00:09', '2023-06-27 02:00:09', 70, 15),
(16, 'Месяц назад , нужно было заказать Штампы . По совету знакомых по работе которые уже пользовались услугами фирмы \r\nruno-z.ru решил и я послушать совета. \r\nСразу скажу ребята своё дело знают крепко. \r\nСтоимость вышла та, что и обговаривали перед работами,  я остался очень доволен и теперь всем их рекомендую, да и в целом, цены в печатнике доступные. Вообщем, рекомендую!', '2023-07-09 07:58:20', '2023-07-09 07:58:20', 71, 16),
(17, 'cash advance \r\nget loans online', '2023-07-09 22:16:51', '2023-07-09 22:16:51', 72, 17),
(18, 'blackdesert.su\r\nhttps://mirledi.net/prichiny-oformit-strahovku-dlja-zanjatij-sportom/\r\nhttps://o-dns.ru/raznoe/poleznye-nyuansy-strahovaniya-sportsmenov\r\nhttps://howseptik.com/raznoe/kak-vybrat-kreditnuyu-kartu-dlya-samozanyatyh.html\r\nhttps://app.gitter.im/#/room/#google_material-design-lite:gitter.im', '2023-07-30 03:31:34', '2023-07-30 03:31:34', 56, 18),
(19, 'https://noprost.com/news/gde-vygodno-oformit-osago-na-god.html\r\nspacesport.su\r\nhttps://100vagonov.com/osobennosti-strahovaniya-sportsmenov-na-banki-ru/\r\nhttps://telegra.ph/Pochemu-vazhno-proveryat-licenziyu-MFO-pri-oformlenii-zajma-07-17\r\nhttps://www.kiaplaw.ru/bitrix/components/bitrix/news/lang/ru/help/tips/3/4/news/9/590_krediti_kak_sravnit_usloviya.html', '2023-07-30 13:44:14', '2023-07-30 13:44:14', 56, 19),
(20, 'Hi, I recently came to the CS Store. \r\nThey sell OEM Noodlesoft software, prices are actually low, I read reviews and decided to Buy OEM Navisworks Manage 2020, the price difference with the official site is 30%!!! Tell us, do you think this is a good buy? \r\nBuy Cheap Ableton Live 11 Suite', '2023-08-12 09:54:31', '2023-08-12 09:54:31', 76, 20),
(21, 'Hello.great ux, check ours,  online casino real money  casino online', '2023-08-13 09:59:21', '2023-08-13 09:59:21', 77, 21),
(22, 'Akson SC LLC offers services for applying SAP \"BIURS\", protegol,RPU-1001 and RPU1021,skochcoat and other polymers and mastics by airless spraying on shaped products, shut-off valves and pipes of various diameters for CS (DCS), NPS, re-insulation of the linear part of gas and oil pipelines, etc. \r\n \r\nYekaterinburg, \r\nhttp://ckanural.ru \r\n \r\nhttps://ckanural.ru/sap_biurs_nanesenie_rashod_materiala/ \r\n \r\nhttps://ckanural.ru/ppu/ \r\n \r\nhttps://youtu.be/tHbeyUpKHlw \r\n \r\nhttps://youtu.be/2oLz7_LW4Zs \r\n \r\nPerforms work on the device: \r\nmonolithic, reliable, durable and high-strength roof, as well as repair of old roofing /by sintering/; \r\nanti-icing system \"roof without icicles\", heating of drains; \r\nanti-corrosion treatment of any coatings. \r\nspraying \r\npolyurethane foam, \r\npolyurea, \r\nliquid rubber \r\nsandblasting of metal structures', '2023-09-24 19:58:54', '2023-09-24 19:58:54', 80, 22),
(23, 'Eximious words! I couldn\'t reconcile more with your points. It\'s happy to get the drift such mindful insights shared here. \r\nYoutube to mp3 converter \r\nYoutube to mp3 converter', '2023-09-26 05:43:18', '2023-09-26 05:43:18', 81, 23),
(24, 'Akson SC LLC offers services for applying SAP \"BIURS\", protegol,RPU-1001 and RPU1021,skochcoat and other polymers and mastics by airless spraying on shaped products, shut-off valves and pipes of various diameters for CS (DCS), NPS, re-insulation of the linear part of gas and oil pipelines, etc. \r\n \r\nYekaterinburg, \r\nhttp://ckanural.ru \r\n \r\nhttps://ckanural.ru/sap_biurs_nanesenie_rashod_materiala/ \r\n \r\nhttps://ckanural.ru/ppu/ \r\n \r\nhttps://youtu.be/tHbeyUpKHlw \r\n \r\nhttps://youtu.be/2oLz7_LW4Zs \r\n \r\nPerforms work on the device: \r\nmonolithic, reliable, durable and high-strength roof, as well as repair of old roofing /by sintering/; \r\nanti-icing system \"roof without icicles\", heating of drains; \r\nanti-corrosion treatment of any coatings. \r\nspraying \r\npolyurethane foam, \r\npolyurea, \r\nliquid rubber \r\nsandblasting of metal structures', '2023-09-30 06:39:23', '2023-09-30 06:39:23', 80, 24),
(25, 'best server Conter strike source v34 https://vk.com/titan_publickcss', '2023-10-02 20:25:20', '2023-10-02 20:25:20', 84, 25),
(26, 'Hi, I recently came to the CSStore. \r\nThey sell OEM 3Ci software, prices are actually low, I read reviews and decided to Buy Cheap Edgecam R1, the price difference with the official online store is 20%!!! Tell us, do you think this is a good buy? \r\n \r\nBuy Luxion Keyshot 9', '2023-10-22 10:35:28', '2023-10-22 10:35:28', 76, 26),
(27, 'Really lots of superb data. buy tenormin online  \r\nMany thanks extremely valuable. Will certainly share site with my pals. buy tenormin  \r\nYour images look great !!!', '2023-11-04 10:34:53', '2023-11-04 10:34:53', 89, 27);

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `type` smallint(6) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_game_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `name`, `img`, `type`, `updated_at`, `created_at`, `item_game_id`, `description`) VALUES
(1, 'Руна Опыта XP 50% на 7 дней', 'rune_xp.png', 1, '2022-10-24 06:11:08', '2022-10-01 19:22:27', 20340, 'Руна Опыта 50% на 7 дней. При переводе на аккаунт начинает действовать сразу и расходуется даже когда вы не играете.'),
(2, 'Руна Опыта SP 50% на 7 дней', 'rune_sp.png', NULL, '2022-10-17 07:56:01', '2022-10-01 19:22:27', 20346, 'Руна Очков навыков 50% на 7 дней. При переводе на аккаунт начинает действовать сразу и расходуется даже когда вы не играете.'),
(3, 'Агатион ездового животного или механизма на 30 дней', NULL, NULL, '2022-10-11 11:32:42', '2022-10-01 19:22:27', 1, 'Случайный агатион с трансформацией в ездовое животное или механизм.'),
(4, 'Middle-earth: Shadow of Mordor', NULL, NULL, '2022-10-01 20:00:46', '2022-10-01 19:22:27', 2, NULL),
(5, 'Soul Sacrifice', NULL, NULL, '2022-10-01 20:11:24', '2022-10-01 19:22:27', 1, NULL),
(6, 'Kingdoms of Amalur: Reckoning', NULL, NULL, '2022-10-01 20:11:20', '2022-10-01 19:22:27', 2, NULL),
(7, 'The Witcher: Rise of the White Wolf', NULL, NULL, '2022-10-01 20:00:51', '2022-10-01 19:22:27', 1, NULL),
(8, 'Diablo III: Reaper of Souls', NULL, NULL, '2022-10-01 20:00:53', '2022-10-01 19:22:27', 2, NULL),
(9, 'Dragons Dogma', NULL, NULL, '2022-10-01 20:11:17', '2022-10-01 19:22:27', 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_11_000000_create_yookassa', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` text COLLATE utf8mb4_unicode_ci,
  `likes` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `updated_at`, `created_at`, `description`, `img`, `tag_id`, `likes`) VALUES
(1, 'Первая новость', '2022-11-04 19:21:38', '2022-10-01 16:26:17', 'Первая новость', 'game-bloodborne-500x375.jpg;game-half-life-3-500x375.jpg', ',1,,', 0),
(2, 'Вторая новость', '2022-11-04 19:21:38', '2022-10-01 16:26:17', 'Вторая новость', 'game-half-life-3-500x375.jpg', ',1,,1,,', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news_comments`
--

CREATE TABLE `news_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shop_id`, `count`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, '2022-10-11 09:17:01', '2022-10-11 09:17:01');

-- --------------------------------------------------------

--
-- Структура таблицы `paid_item`
--

CREATE TABLE `paid_item` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `postponed` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `paid_item`
--

INSERT INTO `paid_item` (`id`, `user_id`, `item_id`, `count`, `postponed`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 2, 1, '2022-10-27 09:05:29', '2022-10-11 06:02:15'),
(2, 1, 2, 8, 1, '2022-10-24 11:29:34', '2022-10-11 06:02:15');

-- --------------------------------------------------------

--
-- Структура таблицы `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `kod` text COLLATE utf8mb4_unicode_ci,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `partner`
--

INSERT INTO `partner` (`id`, `kod`, `updated_at`, `created_at`) VALUES
(1, '<a style=\"z-index:99999;\" target=\"_blank\" href=\"https://l2-pick.ru/\"><img border=\"0\" height=\"70px\" title=\"Lineage 2 сервера\" alt=\"Lineage 2 сервера\" src=\"https://l2-pick.ru/l2pick2.jpg\"></a>', '2022-10-02 09:45:09', '2022-10-02 09:43:49'),
(2, '<a href=\"https://l2-top.ru/\" target=\"_blank\"><img src=\"https://l2-top.ru/img/button1.gif\" title=\"Анонсы серверов Lineage 2, Interlude, Gracia Final, High Five, Epilogue, Freya, GOD, Classic\" width=\"88\" height=\"70\" border=\"0\"></a>', '2022-10-02 09:45:09', '2022-10-02 09:44:03');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'admin', '2022-11-04 09:31:34', '2022-11-04 09:31:34');

-- --------------------------------------------------------

--
-- Структура таблицы `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `seo`
--

INSERT INTO `seo` (`id`, `title`, `updated_at`, `created_at`, `description`, `keywords`, `route_name`) VALUES
(1, 'L2NewAge - сервера игры Lineage2', '2022-10-01 17:02:56', '2022-10-01 17:01:54', '', '', 'front-index');

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` text COLLATE utf8mb4_unicode_ci,
  `price` float DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `type_game` int(11) DEFAULT NULL,
  `rate_1` int(11) DEFAULT '0',
  `rate_2` int(11) DEFAULT '0',
  `rate_3` int(11) DEFAULT '0',
  `rate_4` int(11) DEFAULT '0',
  `rate_5` int(11) DEFAULT '0',
  `purchased` tinyint(1) DEFAULT NULL,
  `sales` tinyint(1) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `filter_id` text COLLATE utf8mb4_unicode_ci,
  `new` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`id`, `title`, `item_id`, `price`, `img`, `type_game`, `rate_1`, `rate_2`, `rate_3`, `rate_4`, `rate_5`, `purchased`, `sales`, `percent`, `filter_id`, `new`, `updated_at`, `created_at`) VALUES
(1, 'Стартовый набор', '1,2,3', 1000, 'rune_sp.png||rune_xp.png||3.jpg', 0, 1, 0, 0, 0, 3, 1, 1, 30, '1', NULL, '2022-10-17 06:55:20', '2022-10-03 07:39:11'),
(2, 'Руна опыта XP', '2', 100, '2.jpg', 0, 0, 0, 2, 0, 2, 1, 1, NULL, '2', NULL, '2022-10-09 17:23:54', '2022-10-03 07:39:47'),
(3, 'Руна SP 50% на 7 дней', '3', 150, 'rune_sp.png', 0, 1, 0, 0, 1, 2, 1, 1, 15, '1,3', 1, '2022-10-17 06:50:26', '2022-10-03 07:39:11'),
(4, 'Руна опыта XP 50% на 7 дней', '4', 100, 'rune_xp.png', 0, 1, 0, 1, 0, 2, 1, 1, 20, '4', NULL, '2022-10-17 06:55:00', '2022-10-03 07:39:47'),
(5, 'Деньги', '5', 500, '4.jpg', 0, 1, 0, 0, 1, 1, 1, 1, 50, '4', 1, '2022-10-09 07:24:39', '2022-10-03 07:39:47');

-- --------------------------------------------------------

--
-- Структура таблицы `tag_name`
--

CREATE TABLE `tag_name` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_shop` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` smallint(6) DEFAULT NULL,
  `news_likes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `rate_shop`, `avatar`, `tel`, `role_id`, `news_likes`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.ru', NULL, '$2y$10$NiD7zsoh8eJCcpm3LaE58Ox4GUxMs8XwCNP1I20CNhQTbwVEMmONS', NULL, '2,3,5,4,1', NULL, NULL, 1, NULL, '2022-10-09 04:23:55', '2022-10-09 04:23:55'),
(2, 'Павел', '1@1.ru', NULL, '$2y$10$5H8ZoxpWJmp/qLAO2zkdC.q20cTKd1uzgJPg61KfSBwbnGSxeoASy', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-12 03:49:06', '2022-10-12 03:49:06'),
(3, 'ddd', '2@2.ru', NULL, '$2y$10$n.ySEvUms894VW2yylClTetP.1Vm3docZH4WyERxmQPvS5BTkC7ce', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-05 11:54:51', '2022-11-05 11:54:51'),
(4, 'Kaitlynpj', 'bakela2@bumss.fun', NULL, '$2y$10$4oPPCZQHrbF/sqKVk5bwAOV2kGOnCOwCGxHGJpEXG6jvG1YtrGO0S', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 06:34:09', '2022-12-08 06:34:09'),
(5, 'datafastproxiespx01', 'datafastpx@gmail.com', NULL, '$2y$10$wBae7aooIFQ2NgnGhtfb2eYDpkmVwl9PmYBdDdAFFIZLz.eXpByNO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 07:56:36', '2022-12-08 07:56:36'),
(6, 'maximlllox', 'm.ax.i.m.g.o.to.stei.ner.w.i.ll.iy.am4.636@gmail.com', NULL, '$2y$10$9ZbwdYGX0zlxDd.0Ug23n.5yM9mf3knObyduSe4xCIcHHDtMyimsC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 02:33:50', '2022-12-11 02:33:50'),
(7, 'ellcraft', 'ellcraft@yandex.ru', NULL, '$2y$10$munvCHtE7ZqbkwdU42tVTe2bkbsRBWEz.btqiqKglM9Pz1nGlBMDe', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 11:32:05', '2022-12-13 11:32:05'),
(8, 'Yvetteamoxy', 'iejilbyyc@gordpizza.ru', NULL, '$2y$10$AWsqZGC3.iAEMHzK0spCzeyXCBJFu3xYxH4/60945zQi5qeEF/aBi', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 16:34:39', '2022-12-13 16:34:39'),
(9, 'Samuelbd', 'bakela22@bumss.fun', NULL, '$2y$10$J.a6Bo/iuZh6K112AF7.du4YNFx1w11nLXbETZWlb9.KjF5r734bW', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-15 03:10:25', '2022-12-15 03:10:25'),
(10, 'Hannahqz', 'keirapritchard@bumss.fun', NULL, '$2y$10$PRWBCL7HzzwG.mDyqAi4UOOtHoTi5hGdmOs7meY6G0JunQB7cBCnK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-17 05:42:20', '2022-12-17 05:42:20'),
(11, 'Jamiecreaw', 'dom@leow.ru', NULL, '$2y$10$MFIJaRzPGcc1JI0TvcVqTu2rb97h8/Nj8KB9dbP/dNRbOhzHhyiLe', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-18 08:03:41', '2022-12-18 08:03:41'),
(12, 'Michalillic', 'info@ochki-rostov.ru', NULL, '$2y$10$3bS4zUmh5kOoswR9GL73a.z7sRtbDqZ3CEuLsrVwlevUybpu0va1e', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-21 17:28:30', '2022-12-21 17:28:30'),
(13, 'Andreashono', 'inregixkk@wowzilla.ru', NULL, '$2y$10$rooXxBnewld.SWJxRi3li.X0dCfnyuNog6jMYs/.t.cZiDwmSLqlm', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-21 18:00:56', '2022-12-21 18:00:56'),
(14, 'IrinaAccewlylenpal', 'ahmarlapin@yandex.ru', NULL, '$2y$10$LCq69mM1WRkSQ9i96z0i2.LeoNMvY6SUPwj3PfqQdyk2QERM.x7t6', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 21:16:06', '2022-12-24 21:16:06'),
(15, 'Jaymewax', 'brbsrmval@gordpizza.ru', NULL, '$2y$10$qIcRJDGSgZcV3XCZSSfeKutLHj/c9Mo3A3b6aGwLXpBLFxguGinMi', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 08:42:45', '2022-12-25 08:42:45'),
(16, 'KristenSof', 'twwjwiqir@wowzilla.ru', NULL, '$2y$10$6mYh/MSIzJxueKXeA1hxseY9GJnHKtPx5o0NI/13pdZN2GYzS/gOq', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 13:10:45', '2022-12-25 13:10:45'),
(17, 'TomunanI', 'tniklos@yandex.com', NULL, '$2y$10$dgTg2/gMevSWEYt5kgfNPO/p72VGm/PT1O6BnaZksJbc.H1Saf70u', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-26 08:45:43', '2022-12-26 08:45:43'),
(18, 'RickyVob', 'n3lKO5igyuv1@softdisc.site', NULL, '$2y$10$IGd56nA5DMq6C4/XhmGtGOziVWe7T/m1/0leb.N2puJuv54Bm7qyC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 10:42:23', '2023-01-12 10:42:23'),
(19, 'https://Okeygorandom.com/?poisk\r\n <<< HELLO FRIEND. =* THE PASSIVE INCOME IT\'S 789USD A DAY LET\'S DO IT -', 'nikolayvezdyk+44891@mail.ru', NULL, '$2y$10$DiVveQ/KlBuu5mVp096wHe7pvFMqgzcB9KZBGMj4adepKDpUSuIWq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 10:51:18', '2023-01-12 10:51:18'),
(20, 'https://Okeygorandom.com/?poisk\r\n <<< GOOD MORNINGMS.: )) THE EARNINGS IT\'S 959USD A DAY MAKE IT -', 'victorvyrehov+9295@mail.ru', NULL, '$2y$10$iGjG3cdoSIZ4fxORzk8E5Ok369uIn1m0ZUcy0ODPrSwSqwpMNS3aq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 18:02:52', '2023-01-12 18:02:52'),
(21, 'Brianquaph', 'leontinegreenlees389@zlot555.com', NULL, '$2y$10$PgBO0AgtwV/KwActZW0VgePWh5KDWt7iGn5hoBjsnkIihgO2Z4enG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 15:42:45', '2023-01-13 15:42:45'),
(22, 'KarenAgeta', 'jvbpprkwa@wowzilla.ru', NULL, '$2y$10$TlW9p4UQa6Sj0qzPQfyJqe9TDfWPU0mn4/jX6zrn/fbhEKW3WU6kW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-14 21:36:13', '2023-01-14 21:36:13'),
(23, 'Suzannedaw', 'ezzvptsoc@gordpizza.ru', NULL, '$2y$10$CIPznRph4ns0R54Jo/si6.iru0KCpExxvdNEAAWNXGNyZi.1oRHj6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-16 01:47:05', '2023-01-16 01:47:05'),
(24, 'AgustinZXNon', 'xr2022august@gmail.com', NULL, '$2y$10$xqmF3BuEnU0ylAzbaVZloupUGCTtLw3rYgD2EjFPAHD4keChI0uFm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 15:47:03', '2023-02-03 15:47:03'),
(25, 'Escortepiva', 'grigoriyleps@reg.pw', NULL, '$2y$10$PXg1dc04BhWxqphJB7sUQeXEJMV5gcadp5EuUNd2meoN6O3uN6f3a', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-05 12:07:52', '2023-02-05 12:07:52'),
(26, 'KevinMaymn', 'bablydesuza@gmail.com', NULL, '$2y$10$7fwoYgGPEwSoaS0y86EJU.lgRIezFqKbTwqBBSgcOPUOQZGTb5ipK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-05 14:20:03', '2023-02-05 14:20:03'),
(27, 'Davidthure', 'rahuladecosta@gmail.com', NULL, '$2y$10$VreVQWchZs6EEFZgwRCX2OZVmWGseBMDx5pcwCi9B0gOJbxPFS5Ri', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-05 14:20:07', '2023-02-05 14:20:07'),
(28, 'Masha_mi', 'serpetrov11111@yandex.ru', NULL, '$2y$10$04fQfBRFWm1cezgzh16vOe5uacx5xS371DeXJMMftKpncN4R72rSy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 05:30:37', '2023-03-17 05:30:37'),
(29, 'Anna_Sog', 'petrivaaanov@yandex.ru', NULL, '$2y$10$3VQJ2zb50cBN8kBZ2dijuOUvmzLfk9hq9VNB5dFE6/csUCly3OLQW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 18:21:29', '2023-03-18 18:21:29'),
(30, 'LucilleSpund', 'sigitszorin@yandex.ru', NULL, '$2y$10$iAslI/SQI34seLJXj6iMI.AA5n36TghReRUPRmX0bkfjdu5NvZy1y', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 00:17:54', '2023-03-19 00:17:54'),
(31, 'PatrickIdeds', 'adekunleayewumi@gmail.com', NULL, '$2y$10$DhjLl0WBlXrTLqWEKa1eI.Fa0KrIPWHP9sdc0pFsnPQ8QQJzK44dy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 04:11:11', '2023-03-20 04:11:11'),
(32, 'xammer', 'trikalor.stroi@mail.ru', NULL, '$2y$10$koZzlq81ezT2VY0hipQmgOMX7JzzGy/rVB6Ty30kTh.KAWCTGfKm6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-26 13:51:19', '2023-03-26 13:51:19'),
(33, 'Emilyrn', 'kim.adler@bk.ru', NULL, '$2y$10$XBHhNrJLgsNzZzdah0mQd.sAOMjsuLU2T9Lef.1ReN.8OaY36R3Cy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 03:06:50', '2023-03-27 03:06:50'),
(34, 'Albertinore', 'temptest516697271@gmail.com', NULL, '$2y$10$NmpBfCRg.NwrguM3tTeftuTxoTvyKEDn2/G1AZoaaJLNo.UeMnCPG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-30 01:51:06', '2023-03-30 01:51:06'),
(35, 'Raymondjat', 'first_of_all@rambler.ru', NULL, '$2y$10$Lhih/fkjZUoSbrqqsbSDS.rzm1LiyewvBqiQRAO5.mVgzaR7ZYBGK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-31 09:00:04', '2023-03-31 09:00:04'),
(36, 'ellth', 'ellth@yandex.ru', NULL, '$2y$10$JsGX8k7On1OKLgym0mtGaOHeU1AEKn.GB2KQVecgE8g5fMdfzlXFm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-02 02:40:27', '2023-04-02 02:40:27'),
(37, 'BDKBCCHFGTEH login2 Pl', '3yhvyqhbbsj@mail.ru', NULL, '$2y$10$A4QLlH6olcr3kdzUJ7qY3OltXT/27qnTBtBIzI0h/kzgKN7hCiSp6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-05 03:26:31', '2023-04-05 03:26:31'),
(38, 'Joshuajs', 'gusgirardi@bumss.fun', NULL, '$2y$10$.UVpJ.XCF49WR7HoZe.SneWExLTDwCIxBMDXAgqVoQt8BhTxPzDli', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-06 19:03:30', '2023-04-06 19:03:30'),
(39, 'Naslednik', 'Bondarenko.ors@mail.ru', NULL, '$2y$10$LaJDHEsE.EozO24iX.I4QOjFL59nhsuotKIxHsszBWX/jA2GgWG22', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-10 14:44:57', '2023-04-10 14:44:57'),
(40, 'EddieHic', 'PFf1NUOTSX4W@softdisc.site', NULL, '$2y$10$Uab1hStSk5BIRkxtuPcD6O9WwRBoSJUf9esgBpfsO36SQUS5bXPV6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-11 22:04:49', '2023-04-11 22:04:49'),
(41, 'Maxtormap', '28.351.sb9.xm@browndecorationlights.com', NULL, '$2y$10$aKj9aZxFIz4KqvrWiUJK2.AzfEkOvqrK8yKaqmlQD8vj.LpL0LKrm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-14 04:03:04', '2023-04-14 04:03:04'),
(42, 'WarrenNorse', 'masins@litaga.xyz', NULL, '$2y$10$linMBrCKkU.7JKW8fU1dX.L5sEPdJZKFgGVjEASvQBP.nZb9IuPXy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-14 18:35:14', '2023-04-14 18:35:14'),
(43, 'MalikasNorse', 'gitasa@litaga.xyz', NULL, '$2y$10$2WoIWZm1oi9nLFKJ4QYXauRib2UXpeqH7QfBCxRNFkIq5GL9kXLHS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-15 11:30:24', '2023-04-15 11:30:24'),
(44, 'Roberterazy', 'avtokat76ru@yandex.kz', NULL, '$2y$10$qNBJlEqgjGdFOCRxAuYSFOgvLoqRM/nelRzAQvM9G8iFD4lK/tEAK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:23:44', '2023-04-16 16:23:44'),
(45, 'linkingsadmap', 'outerlinking2023@outlook.com', NULL, '$2y$10$uCUPfemIx.9kssQmDJbeCuXU9o6VcOZOt/XwipRnJ7HL4Gf5yAjDy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-26 11:43:09', '2023-04-26 11:43:09'),
(46, 'Kristiesen', 'vikasanka@litaga.xyz', NULL, '$2y$10$i6kAXq2daO1Hm6YRtG6BYO8GuW6Q9nj7WyHFNAfEZtag943egPA9S', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-30 02:05:30', '2023-04-30 02:05:30'),
(47, 'Moskow2023', 'mockow2023@ro.ru', NULL, '$2y$10$ODVZQDOzYI8V/373ofgexOLUl2IPIsV7mY07XMzPnI4CrwuA3c4Ae', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-30 09:46:30', '2023-04-30 09:46:30'),
(48, 'CarlZXtonSpody', 'x.r.20.22.aug.ust@gmail.com', NULL, '$2y$10$HZN.nknu62VuuGufXeaY1.KdzybSskAake/kSQQt.fp/BnOMhkHAy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-30 12:32:37', '2023-04-30 12:32:37'),
(49, 'rfvbkm', 'kievro@bk.ru', NULL, '$2y$10$eVvijI/pYgY9HtHbX4kUX.vzOZFnKZBIZyt9hAFX3jH9eCo1FENVS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-30 17:34:00', '2023-04-30 17:34:00'),
(50, 'GamerWin', '2023legogame@rambler.ru', NULL, '$2y$10$y789z0ioyYm4ULwd2syrFuP.7dIT3tbxe2CSjIRTTz35QeLdE.haa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-03 09:13:22', '2023-05-03 09:13:22'),
(51, 'CSseroulcessike', 'annet@sosbook.online', NULL, '$2y$10$PNVj2uYAcNo8ays/b7Nhru4rSxPbHYsPCZTcinZqXE.ZtUP2wbf/S', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-06 19:40:48', '2023-05-06 19:40:48'),
(52, '23timsp1', 'click2014@yandex.ru', NULL, '$2y$10$7FQbE/nlVwIVsvpD6i2p6efAicPwkFUtP.bLaUZfH7I2qVV4a83eC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-08 07:41:30', '2023-05-08 07:41:30'),
(53, 'MedvedGIP', 'medved2023@myrambler.ru', NULL, '$2y$10$.KPkFlkLC0UNQOINohzE1eq2AUulHB2eAZlwQ4769u/ti2dC0KMZW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 01:48:43', '2023-05-09 01:48:43'),
(54, 'MichaelUnomy', 'b6gIDXd1iKgM@softdisc.site', NULL, '$2y$10$gD/DKEetTGoyIh9EwlE9oeBAtrFDLckF.BparGXzZWxDyyexPcft.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 16:20:06', '2023-05-09 16:20:06'),
(55, 'Davidetefs', 'gprof@free-private-mail.com', NULL, '$2y$10$v.iZbJ7F3ydD5W16NZ2OZuBdSCk4Mi2TX7SC2yhoUack.FIy937Ri', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-11 19:17:17', '2023-05-11 19:17:17'),
(56, 'JeffreyGlove', 'golubitskayabeatrisa@yandex.com', NULL, '$2y$10$VVwrBAh3MQeAACNc8YWaw.sGY3cc4qt5eSP6cafu/EkQnGMIn97IS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-16 10:37:19', '2023-05-16 10:37:19'),
(57, 'VikingRUS', 'freddy2023@rambler.ua', NULL, '$2y$10$WK/5.mN6mhLvJKIIH9bTQORvwinvUl.7Gqpw7nR50nxW48JUpGqkm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-18 11:08:01', '2023-05-18 11:08:01'),
(58, 'LolitaItacy', 'arsenii.voronkovshd@yandex.com', NULL, '$2y$10$7k6.M6l82cUxbAsQBqk6OeBgn5DQzhx5a8TrxYDcmfv3bHUVchZqq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-18 20:36:03', '2023-05-18 20:36:03'),
(59, 'Robertbar', 'fevgen708@gmail.com', NULL, '$2y$10$ngn6IWMWAc82hiX6vYESQ.0wC./HxwCdRFLyiAzx.gnFdEiLgFjMu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:30:52', '2023-05-23 05:30:52'),
(60, 'AzatLof', 'valentinellington@wwjmp.com', NULL, '$2y$10$YZ/w9C0q1yJkyuHyY7ZQcebbOdCFlUE6jnIdWhLH.85IFsmIl0/6W', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-26 16:55:08', '2023-05-26 16:55:08'),
(61, 'Irinaspobe', 'jgmaria304@yandex.ru', NULL, '$2y$10$3c1vzAOQslYVFmiGsC40iucS/RW5AEdWceqq8PdV0rHR/RNFj01yO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 05:02:03', '2023-05-31 05:02:03'),
(62, 'Hermanpic', 'voronctova@outlook.com', NULL, '$2y$10$s7DmffMAOKYgBwg8G9JNIepURM1Ys0zgIwY7YHnZxNp90MQR6gn2O', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 07:56:27', '2023-05-31 07:56:27'),
(63, 'DrozSax', 'frcites@yandex.com', NULL, '$2y$10$PTJcZBA5uJla/ZE2VzMq7.jMrR0Vh4Cp7xTxBnJXbWd4CCRDjKpx6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 10:26:10', '2023-05-31 10:26:10'),
(64, 'Jerrysex', 'gaymen@free-private-mail.com', NULL, '$2y$10$plLLYiwOf493/SLyKkn3vO9BIep2KP/SvHoVZx6YeUH7JRul8Er2u', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-06 09:37:57', '2023-06-06 09:37:57'),
(65, 'DavidErets', 'kat-service56ru@yandex.by', NULL, '$2y$10$c0Sz/CqUaLxFP8rtGO.ctOTXD0vuL7A9YnLHYkx5jzC/QZAkPXESO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-07 17:12:59', '2023-06-07 17:12:59'),
(66, 'Elijahlieri', 'mhros730227561@gmail.com', NULL, '$2y$10$xbUvWaQr5Ls5OWntq7RJK.NDUB/IH.esTomSJcLE5VETnIAtmtZji', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-09 01:53:22', '2023-06-09 01:53:22'),
(67, 'ThomBiobe', 'a.tremezow@gmail.com', NULL, '$2y$10$xShJxLXKmueqXHJpN8WXhOdOZeuk9K1jIdMvW1eYYUkujtJqcmZNe', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-11 06:55:28', '2023-06-11 06:55:28'),
(68, 'Josephvma', 'gr.emgrin61@gmail.com', NULL, '$2y$10$oOoPE5cv/IwxI8DZfRHlKurcSn1aLmpAJzrTxtvsx3P7xdcP37bQq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-22 06:20:24', '2023-06-22 06:20:24'),
(69, 'KURWA_BOBER', 'press@post.mil.gov.ua', NULL, '$2y$10$UAtB7el1E2II0DJgc05v6eV849yaFzUxTVXQMk2Y4P2BANYRANNOe', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-23 08:24:46', '2023-06-23 08:24:46'),
(70, 'Robertgor', 'p.okra.sse.reg.a.penz.a@gmail.com', NULL, '$2y$10$qjMzEHA0YPrmbt9hYQ7Og.fE3Dxz2JR5jaoxSZP.eaZaN25kzLtNe', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-26 22:59:49', '2023-06-26 22:59:49'),
(71, 'GruzVato', 'michaelrhodes@reg.pw', NULL, '$2y$10$tNKabv3p1CZsl/716kuAJe7nrzQ5Y1bUULMa0AYhau0h3EkX9.j2W', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-09 04:58:16', '2023-07-09 04:58:16'),
(72, 'TeresaSwomo', 'srjpmektb@tofzilla.ru', NULL, '$2y$10$VVC/8Rj.Oh0cAeq08Lxed.cGxznCsIGT4TbE1UffZ2.TTz5sUMag2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-09 19:16:49', '2023-07-09 19:16:49'),
(73, 'Micheloffex', 'Wabblella@aptekadvita.ru', NULL, '$2y$10$GmuRs3dRC4XGIMs2ksdS1u7kcX4Ql9vpslK52uB8V/D.zuGslTUc6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-25 18:00:17', '2023-07-25 18:00:17'),
(74, 'SamuelRah', 'vugar.leonidov@yandex.ru', NULL, '$2y$10$JQ6rcd.05o2hG/6DOIYtV.TfTkD14d5eSAwrV6cTisnSNGor4AL/O', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-28 06:14:33', '2023-07-28 06:14:33'),
(75, 'яюCamack', 'b.ennie.c.h.a.v.ez61.8.6@gmail.com', NULL, '$2y$10$YKi2gHBtRs9mW84HoPeyZelYPQC8.jxWb.5uGjUkB4vQOulcfdD5q', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-29 20:16:04', '2023-07-29 20:16:04'),
(76, 'Cheap-Soft-exold', 'john.mongolfier@gmail.com', NULL, '$2y$10$5AWbrMws2MgxFytMPiTgHevxNq6MZkFFBmERBSzD2BKkMMeWwAeb6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-31 07:42:55', '2023-07-31 07:42:55'),
(77, 'JesseLem', 'yogffsgkhfgfu2rmail@gmail.com', NULL, '$2y$10$N5vVi2hqI7WRRj9fDMqwV.tlypuvv7SPXtzCmE2/m7iIQGMcPVcKm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-13 06:59:16', '2023-08-13 06:59:16'),
(78, 'Kate#gxeannick[GowegcbszerfcfdycehjtizyvOJ,2,5]', 'support@aptekadvita.ru', NULL, '$2y$10$bhnme5LMi7AcsMJ3uezlDuxa77DkFeYcpVoIeRuvCKuHRiCEJW.7m', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-14 11:33:25', '2023-09-14 11:33:25'),
(79, 'Abusezet', 'huongdanban55h7@gmail.com', NULL, '$2y$10$pVKYgdEAuSoBONK4wNde6uOZ0RKnrayzrFcTMg837LL.oNGv/Gc.C', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 06:22:38', '2023-09-24 06:22:38'),
(80, 'Travisnak', 'leonardunnb@bk.ru', NULL, '$2y$10$VIAyiLFcwEfm2YxzSMUAyux/mY3/3Mv3odbhOdBvb1MpiqVJsq3sm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 16:58:36', '2023-09-24 16:58:36'),
(81, 'youtubemusic', 'youtube@ytmp3.to', NULL, '$2y$10$hOzIqSoRLnNhocE6fJ6PXOcYqQJdtnCNVDNXOyj3wNlA/6XPWuDDy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-26 02:43:14', '2023-09-26 02:43:14'),
(82, 'KartinaQuela', 'raposnori1961@mail.ru', NULL, '$2y$10$oCJ94Eg1dZzFy/V5KIRYZ.rRRLJrmbUw6Apbp5qElZXUdHduR9nWC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-28 21:09:46', '2023-09-28 21:09:46'),
(83, 'anime', 'animetv1@9-anime.com', NULL, '$2y$10$lqA0d9tqgaDBDmQRjUTHVumZWZr.G4k9GLncW0hLJLYCLIGJzO5w.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-29 05:44:19', '2023-09-29 05:44:19'),
(84, 'Charlespes', 'you1rmai5l@gmail.com', NULL, '$2y$10$qoUNPTjAYPXY/rIZDXUJV.zy2Z3TpvDua.lmdwnrkXADxF6jB4Vme', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-02 17:25:17', '2023-10-02 17:25:17'),
(85, 'linkin90', 'Linkin90@yandex.ru', NULL, '$2y$10$8EDkER5UMwGdL.R07uZHs.FlBIwHxnthDW5k89WWQQ7zFjb8yAOqu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-03 11:51:25', '2023-10-03 11:51:25'),
(86, 'JereSes', 'a.t.r.emezow@gmail.com', NULL, '$2y$10$3ifYGG9PH6TX2iWJwSr91OChBGgalIDZEBiHksts8dqaVYaLiUDBO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-11 00:35:19', '2023-10-11 00:35:19'),
(87, 'Youtube Wer', 'admsttrs@seo-web.com.pl', NULL, '$2y$10$CC61Sb9xHk0fr13DFEtqvegiOgCUhPodBn1T59y9kx0UG3TwPLbay', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-14 05:59:32', '2023-10-14 05:59:32'),
(88, 'Hubertinave', 'newneo2023@rambler.ru', NULL, '$2y$10$D3oTwlx2Ohh.fbkzL5c7hebh8k6hwvaaL.y23yHB5wjDV9l76urhm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-16 10:37:50', '2023-10-16 10:37:50'),
(89, 'Andrewgar', '3@prezzocomprare.com', NULL, '$2y$10$hwziaMJUOsZrUm1Efc5M5efyiNEtNctrsjDhjH7twDx8NKB0LnEzu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-20 02:51:50', '2023-10-20 02:51:50'),
(90, 'Recipies bet', 'pancakes@perfect-remont.kiev.ua', NULL, '$2y$10$9yCSDiSxAgvqp.mJ6Llz9ea7xFHRmSeIziW31acskrRrxsb3vQjcW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-22 00:25:04', '2023-10-22 00:25:04'),
(91, 'Bobwaf', 'nste.pann.o.w@gmail.com', NULL, '$2y$10$vgqOGSRQz7Y7x4RKoaLQn.JbM35dsIHpK378Bi1hEh4vsnX2zvH3K', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-23 23:00:21', '2023-10-23 23:00:21'),
(92, 'Samanthaori', 'posdrksy@bk.ru', NULL, '$2y$10$7UjXUh6/VOzX7pK0uZDTu.pEZRmbELC4jJBWpJ2onjJ5.koIlYXge', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-25 23:01:40', '2023-10-25 23:01:40'),
(93, 'Tylerbsb', 'dadu_98@bk.ru', NULL, '$2y$10$nF9KdbJKJBLvxH4T2g/YheW9zSaR1UafyvTh9WsTARawbW0Cjte5e', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-03 21:29:27', '2023-11-03 21:29:27'),
(94, 'Katarakta incog', 'lecheniegermanii@perfect-remont.kiev.ua', NULL, '$2y$10$w40cH881FsRdMH48qSXQROdm5uQqBQ0hD9fhxkstSIz4./CtWunw6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-04 09:16:50', '2023-11-04 09:16:50'),
(95, 'RaymondDop', 'xrumerfox@gmail.com', NULL, '$2y$10$QBILQTNY9lJ/jU0XSfPA6u4vID.iO53K0mgwp5hukXqYe0pX7djfi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-05 13:00:18', '2023-11-05 13:00:18'),
(96, 'Shawnkad', 'david_yan99@bk.ru', NULL, '$2y$10$/0lyrffnKBIgTewTxtZ1huN43ztZUYcGNeAGsnuYUUefynnD4uc5y', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-06 08:34:23', '2023-11-06 08:34:23'),
(97, 'wolt Dycle', 'admn@ochu.com.ua', NULL, '$2y$10$h6SIEjiOW1lgjrisdpSAl.8Htfc49tHaEBet3dSL/ff3UeX4icdXa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-09 16:16:49', '2023-11-09 16:16:49'),
(98, 'Floydjat', 'gugloff.444@gmail.com', NULL, '$2y$10$gNfTf3CzFMqeOWCqGaNCn.Z3Ukd.dhSUy8AxYu.xHe1wMJVrH2zyC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-10 06:37:20', '2023-11-10 06:37:20'),
(99, 'PVtTCVRjhrmUhp', 'bjLvbU.mpdpbp@virilia.life', NULL, '$2y$10$ncjfDCJ6S00A/MuSwox4KeZIo3NI9.ZwTCCf7SARqNjQAu9Xrd6m2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-11 13:48:33', '2023-11-11 13:48:33'),
(100, 'BreadBoy', 'maximbelov00@gmail.com', NULL, '$2y$10$eTt5VhJXK7oGzDxhWWv59.LRoKb1Vg.pDz48.NqyVrPcqO1H9Hq6.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-15 05:01:35', '2023-11-15 05:01:35'),
(104, 'Yvonnespuse', 'mbpmuuoov@gordpizza.ru', NULL, '$2y$10$bHGzw8hzYwwjQaHtJzRda.GPDSp.y2v6qmPilxTFf14lm5xbJfw9y', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-15 19:41:37', '2023-11-15 19:41:37'),
(105, 'SharonNeany', 'eaqqpbxat@totzilla.ru', NULL, '$2y$10$vmil6Xy8o/LnXs6KWB9j6Onllj9zeybzE/wG8BTfaTr8CpxMfQGUS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-16 15:55:31', '2023-11-16 15:55:31'),
(106, 'fenia', 'mjunkmailing3@gmail.com', NULL, '$2y$10$Mg7N9Je6SpzMJes518MCHeo.cskeZGkgt1oQB3rP9I7fQbRPdUDci', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-17 12:41:10', '2023-11-17 12:41:10'),
(107, 'Keithkal', 'alexanderalexanderov242@gmail.com', NULL, '$2y$10$ScILl7j8r4ZqusOM8gr8m.JDhHZhez828iftMJ1xj8XO5zzvHKmhy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-20 01:26:30', '2023-11-20 01:26:30'),
(108, 'Shanemomma', 'suhanovaegina19863357@mail.ru', NULL, '$2y$10$4DxuOFp/Zgia0n2PBA3a9OI9FGnRUengZ.JoDg4c9wx6pkRIfQ.wK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-21 00:12:01', '2023-11-21 00:12:01'),
(109, 'MelvinRef', 'sviloguzov83@mail.ru', NULL, '$2y$10$Tghl2erBYamonZRMKPunqeqkP7QNyLju/UhbQwHDjI70SjmyuTbPW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-21 01:43:50', '2023-11-21 01:43:50'),
(110, 'Shawnoeq', 'gorodwb@bk.ru', NULL, '$2y$10$5kiLbTZK9p1xYitNrAA9L.Oh3.0yfkKzEn23iegJ6PU61FA0pUEl2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-21 02:02:48', '2023-11-21 02:02:48');

-- --------------------------------------------------------

--
-- Структура таблицы `yookassa`
--

CREATE TABLE `yookassa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','waiting_for_capture','succeeded','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'RUB',
  `payment_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `uniq_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `yookassa`
--

INSERT INTO `yookassa` (`id`, `user_id`, `payment_id`, `status`, `paid`, `amount`, `currency`, `payment_link`, `description`, `paid_at`, `uniq_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2ad5048c-000f-5000-9000-13121501c4bc', 'succeeded', 1, '1257.5', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad5048c-000f-5000-9000-13121501c4bc', 'Заказ №1', NULL, NULL, '2022-10-09 13:03:25', '2022-10-09 13:03:25'),
(2, 1, '2ad505ae-000f-5000-9000-143123bda3f3', 'succeeded', 1, '1257.5', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad505ae-000f-5000-9000-143123bda3f3', 'Заказ №2', '2022-10-09 17:20:55', NULL, '2022-10-09 13:08:15', '2022-10-09 13:08:15'),
(3, 1, '2ad5f6d6-000f-5000-9000-1d250c1de7b2', 'pending', 0, '240', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad5f6d6-000f-5000-9000-1d250c1de7b2', 'Заказ №3', NULL, NULL, '2022-10-10 06:17:11', '2022-10-10 06:17:11'),
(4, 1, '2ad5f820-000f-5000-9000-12d6f0ca8526', 'pending', 0, '700', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad5f820-000f-5000-9000-12d6f0ca8526', 'Заказ №4', NULL, NULL, '2022-10-10 06:22:41', '2022-10-10 06:22:41'),
(5, 1, '2ad5f86e-000f-5000-9000-1b1009d2d926', 'pending', 0, '700', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad5f86e-000f-5000-9000-1b1009d2d926', 'Заказ №5', NULL, NULL, '2022-10-10 06:23:59', '2022-10-10 06:23:59'),
(6, 1, '2ad5f89f-000f-5000-8000-19954509b58f', 'pending', 0, '1400', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad5f89f-000f-5000-8000-19954509b58f', 'Заказ №6', NULL, NULL, '2022-10-10 06:24:48', '2022-10-10 06:24:48'),
(7, 1, '2ad5f902-000f-5000-9000-187e58592e51', 'pending', 0, '1400', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad5f902-000f-5000-9000-187e58592e51', 'Заказ №7', NULL, NULL, '2022-10-10 06:26:27', '2022-10-10 06:26:27'),
(8, 1, '2ad5f995-000f-5000-8000-14987d361c0a', 'pending', 0, '1400', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad5f995-000f-5000-8000-14987d361c0a', 'Заказ №8', NULL, NULL, '2022-10-10 06:28:54', '2022-10-10 06:28:54'),
(9, 1, '2ad5f9e1-000f-5000-a000-1fd360cc579c', 'pending', 0, '2117.5', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad5f9e1-000f-5000-a000-1fd360cc579c', 'Заказ №9', NULL, NULL, '2022-10-10 06:30:10', '2022-10-10 06:30:10'),
(10, 1, '2ad5fa0d-000f-5000-a000-13b780b6c89f', 'pending', 0, '2117.5', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad5fa0d-000f-5000-a000-13b780b6c89f', 'Заказ №10', NULL, NULL, '2022-10-10 06:30:54', '2022-10-10 06:30:54'),
(11, 1, '2ad5fa38-000f-5000-9000-1ab447253185', 'pending', 0, '2117.5', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad5fa38-000f-5000-9000-1ab447253185', 'Заказ №11', NULL, NULL, '2022-10-10 06:31:37', '2022-10-10 06:31:37'),
(12, 1, '2ad6000e-000f-5000-8000-11dcfeded6b6', 'pending', 0, '377.5', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad6000e-000f-5000-8000-11dcfeded6b6', 'Заказ №12', NULL, NULL, '2022-10-10 06:56:31', '2022-10-10 06:56:31'),
(13, 1, '2ad62a96-000f-5000-9000-1c17742e40ce', 'pending', 0, '3462.5', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad62a96-000f-5000-9000-1c17742e40ce', 'Заказ №13', NULL, NULL, '2022-10-10 09:57:59', '2022-10-10 09:57:59'),
(14, 1, '2ad745e0-000f-5000-9000-10ed65a728f0', 'pending', 0, '2962.5', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad745e0-000f-5000-9000-10ed65a728f0', 'Заказ №14', NULL, NULL, '2022-10-11 06:06:40', '2022-10-11 06:06:40'),
(15, 1, '2ad74607-000f-5000-a000-148517fdd9fb', 'pending', 0, '3090', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad74607-000f-5000-a000-148517fdd9fb', 'Заказ №15', NULL, NULL, '2022-10-11 06:07:19', '2022-10-11 06:07:19'),
(16, 1, '2ad746e6-000f-5000-8000-1ec0c738389e', 'pending', 0, '3245', 'RUB', 'https://yoomoney.ru/checkout/payments/v2/contract?orderId=2ad746e6-000f-5000-8000-1ec0c738389e', 'Заказ №16', NULL, NULL, '2022-10-11 06:11:01', '2022-10-11 06:11:01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `filter_name`
--
ALTER TABLE `filter_name`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_comments`
--
ALTER TABLE `news_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `paid_item`
--
ALTER TABLE `paid_item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tag_name`
--
ALTER TABLE `tag_name`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `yookassa`
--
ALTER TABLE `yookassa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yookassa_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `filter_name`
--
ALTER TABLE `filter_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news_comments`
--
ALTER TABLE `news_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `paid_item`
--
ALTER TABLE `paid_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tag_name`
--
ALTER TABLE `tag_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT для таблицы `yookassa`
--
ALTER TABLE `yookassa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `yookassa`
--
ALTER TABLE `yookassa`
  ADD CONSTRAINT `yookassa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
