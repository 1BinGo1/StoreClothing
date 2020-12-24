-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 25 2020 г., 01:30
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `clothing_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 2, '2020-12-05 05:26:02', '2020-12-05 05:26:02');

-- --------------------------------------------------------

--
-- Структура таблицы `basket_product`
--

CREATE TABLE `basket_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `basket_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `title`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', '/storage/brands/Adidas.png', '2020-12-01 11:42:41', '2020-12-01 11:42:43'),
(2, 'Nike', '/storage/brands/Nike.png', '2020-12-01 11:42:54', '2020-12-01 11:42:55'),
(3, 'Puma', '/storage/brands/Puma.png', '2020-12-01 11:43:04', '2020-12-01 11:43:06');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `section_id`, `title`, `created_at`, `updated_at`) VALUES
(2, 2, 'Кросовки', NULL, NULL),
(3, 1, 'Куртки', NULL, NULL),
(5, 3, 'Ремни', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2014_10_12_000000_create_users_table', 2),
(17, '2020_11_30_183043_create_brands_table', 2),
(18, '2020_11_30_183202_create_categories_table', 2),
(19, '2020_11_30_183252_create_products_table', 2),
(20, '2020_12_04_110005_alter_users_table', 3),
(25, '2020_12_04_203151_create_baskets_table', 4),
(26, '2020_12_04_204409_create_basket_product_table', 5),
(27, '2020_12_05_082704_alter_baskets_table', 6),
(28, '2020_12_05_155911_create_sections_table', 7),
(29, '2020_12_05_160451_add_section_to_categories_table', 8),
(30, '2020_12_10_173741_create_roles_table', 9),
(31, '2020_12_10_174132_add_roles_to_users_table', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `price` double(8,2) NOT NULL,
  `text` longtext NOT NULL,
  `img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `brand_id`, `title`, `excerpt`, `price`, `text`, `img`, `created_at`, `updated_at`) VALUES
(15, 2, 2, 2, 'Кроссовки мужские Nike Quest 3', 'Оптимальный вариант для длинных забегов — кроссовки Nike Quest 3. Функциональный дизайн и многослойная конструкция для максимального комфорта.', 5799.00, 'Оптимальный вариант для длинных забегов — кроссовки Nike Quest 3. Функциональный дизайн и многослойная конструкция для максимального комфорта. \r\n\r\n    АМОРТИЗАЦИЯ\r\n    Увеличенная промежуточная подошва из пеноматериала гасит ударные нагрузки. Амортизирующая вставка в сочетании с выступами в передней части подошвы обеспечивает комфорт.\r\n    СЦЕПЛЕНИЕ С ПОВЕРХНОСТЬЮ\r\n    Прочная резиновая подметка для усиленного сцепления. \r\n    СТАБИЛИЗАЦИЯ И ПОДДЕРЖКА СТОПЫ\r\n    Задник плотно облегает стопу и поддерживает пятку.\r\n    ВЕНТИЛЯЦИЯ\r\n    Слой сетки для легкости и воздухообмена.  \r\n\r\nОбратите внимание: на сайте указан российский размер. Размеры производителя на упаковке могут отличаться.', '/storage/products/hM1qYc4EyspT8LiDaUVJoBzi7dK8rXvJJ87U8GmT.jpg', '2020-12-05 14:29:44', '2020-12-05 14:33:59'),
(16, 2, 2, 1, 'Кроссовки мужские adidas Duramo 9', 'Универсальные кроссовки adidas Duramo 9 подойдут как для беговой дорожки, так и для пробежки на природе.', 3999.00, 'Универсальные кроссовки adidas Duramo 9 подойдут как для беговой дорожки, так и для пробежки на природе.\r\n\r\n    АМОРТИЗАЦИЯ\r\n    Промежуточная подошва Cloudfoam поглощает ударные нагрузки.\r\n    СТАБИЛИЗАЦИЯ И ПОДДЕРЖКА СТОПЫ\r\n    Бесшовная вставка для поддержки стопы.\r\n    ВЕНТИЛЯЦИЯ\r\n    Двуслойный сетчатый верх для оптимального воздухообмена.\r\n    АНТИБАКТЕРИАЛЬНАЯ ПРОПИТКА\r\n    Стелька OrthoLite с антимикробным покрытием защищает от появления запаха.\r\n    УСТОЙЧИВОСТЬ К ИЗНОСУ\r\n    Подошва Adiwear выполнена из долговечных материалов.\r\n\r\nОбратите внимание: на сайте указан российский размер. Размеры производителя на упаковке могут отличаться.', '/storage/products/SPO1A5FrnZiDlff7DyHBKTSvakzYYDfyQxRD80jb.jpg', '2020-12-05 14:36:16', '2020-12-05 14:36:57'),
(17, 2, 3, 1, 'Пуховик мужской adidas Essentials', 'Теплая пуховая парка adidas Essentials завершит твой спортивный образ в холодные дни.', 8999.00, 'Теплая пуховая парка adidas Essentials завершит твой спортивный образ в холодные дни.\r\n\r\n    СОХРАНЕНИЕ ТЕПЛА\r\n    Стратегически расположенный синтетический утеплитель для дополнительной защиты от холода.\r\n    НАТУРАЛЬНЫЙ ПУХ\r\n    Утеплитель на 80 % состоит из утиного пуха.\r\n    ЗАЩИТА ОТ ВЛАГИ\r\n    Водоотталкивающая пропитка не содержит перфторированные соединения.\r\n    ЗАЩИТА ОТ НЕПОГОДЫ\r\n    Капюшон с эластичной окантовкой, высокий воротник и удлиненный низ помогут лучше сохранить тепло.\r\n    КОМФОРТНАЯ ПОСАДКА\r\n    Зауженный крой гарантирует удобную посадку.\r\n    ЭКОЛОГИЧНОСТЬ\r\n    Ткань куртки полностью выполнена из переработанных материалов.', '/storage/products/YSqVuN0gDoREiXvDARvoHd0zaoSKNWzdIRF56eWp.jpg', '2020-12-05 14:48:13', '2020-12-05 14:48:13'),
(18, 2, 3, 1, 'Куртка утепленная мужская adidas', 'Парка в спортивном стиле adidas XPLORIC. Удлиненный фасон и современный утеплитель гарантируют комфорт в холодную погоду.', 12999.00, 'Парка в спортивном стиле adidas XPLORIC. Удлиненный фасон и современный утеплитель гарантируют комфорт в холодную погоду.\r\n\r\n    ЗАЩИТА ОТ НЕПОГОДЫ\r\n    Регулируемые манжеты на липучках и капюшон с опушкой из искусственного меха помогут лучше сохранить тепло.\r\n    ПРАКТИЧНОСТЬ\r\n    Передние накладные карманы с клапанами и выходом для наушников и нагрудный карман на молнии.\r\n    УСТОЙЧИВОСТЬ К ИЗНОСУ\r\n    Модель выполнена из прочных современных материалов.', '/storage/products/8DkIpQsfFslc9URxFzNobG78RmJZsztfYnR2DcUF.jpg', '2020-12-05 14:55:16', '2020-12-05 14:55:56'),
(19, 2, 5, 1, 'Ремень Y-3 Classic Logo', 'Повседневный ремень от Y-3', 5499.00, 'Минималистичный ремень от Y-3. Плетеная модель из прочного материала украшена аккуратной металлической пряжкой.', '/storage/products/TiX5teD29TInsmAQq5U8EXKxPgMAlSyhmfNnUczz.jpg', '2020-12-11 14:50:56', '2020-12-11 14:50:56');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Одежда', NULL, NULL),
(2, 'Обувь', NULL, NULL),
(3, 'Аксессуары', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'admin', 'aleksey_7300@mail.ru', NULL, '$2y$10$sY5H74NqJhKFlkVtbWadLuoXmME7CtQgy6o2UR4cSP6QjwNOnYeIO', 'A2VmVQAF7H6OQvhqtyO3oMd5H9qM36Iqbo9HwebLZqgX1KN8g6K9mqGvJTQz', '2020-12-03 18:51:56', '2020-12-03 18:51:56'),
(4, 2, 'aleksey', 'prizrac73@yandex.ru', NULL, '$2y$10$Z7FoL02kHnA1iVzqUJ1cMuswLB9GV7vcmpA5TsZsP.klxCDRVK3Si', NULL, '2020-12-11 04:28:43', '2020-12-11 04:28:43');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baskets_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `basket_product`
--
ALTER TABLE `basket_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basket_product_basket_id_foreign` (`basket_id`),
  ADD KEY `basket_product_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_section_id_foreign` (`section_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `basket_product`
--
ALTER TABLE `basket_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `baskets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `basket_product`
--
ALTER TABLE `basket_product`
  ADD CONSTRAINT `basket_product_basket_id_foreign` FOREIGN KEY (`basket_id`) REFERENCES `baskets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
