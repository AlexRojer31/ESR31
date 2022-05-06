-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 06 2022 г., 09:58
-- Версия сервера: 8.0.23
-- Версия PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `esr31`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE `cards` (
  `id` int NOT NULL,
  `card_name` varchar(300) NOT NULL,
  `itog_i` varchar(300) NOT NULL,
  `itog_i_start` varchar(300) NOT NULL,
  `itog_i_start_end` varchar(300) NOT NULL,
  `itog_i_normal_start` varchar(300) NOT NULL,
  `itog_i_normal_end` varchar(300) NOT NULL,
  `itog_i_normal_start_st` varchar(300) NOT NULL,
  `itog_i_normal_start_end` varchar(300) NOT NULL,
  `itog_u` varchar(300) NOT NULL,
  `itog_u_min` varchar(300) NOT NULL,
  `itog_u_max` varchar(300) NOT NULL,
  `itog_casting` varchar(300) NOT NULL,
  `itog_d_el` varchar(300) NOT NULL,
  `itog_q_el` varchar(300) NOT NULL,
  `itog_len_el` varchar(300) NOT NULL,
  `itog_r_slag` varchar(300) NOT NULL,
  `itog_doz_slag` varchar(300) NOT NULL,
  `itog_alum` varchar(300) NOT NULL,
  `itog_dorn` varchar(300) NOT NULL,
  `itog_dorn_num` varchar(300) NOT NULL,
  `itog_crist` varchar(300) NOT NULL,
  `itog_crist_num` varchar(300) NOT NULL,
  `itog_slag_remelt` varchar(300) NOT NULL,
  `itog_slag_remelt_num` varchar(300) NOT NULL,
  `itog_doza` varchar(300) NOT NULL,
  `itog_v_start` varchar(300) NOT NULL,
  `itog_v` varchar(300) NOT NULL,
  `itog_user` varchar(300) NOT NULL,
  `card_name_bottom` varchar(300) NOT NULL,
  `itog_steel` varchar(300) NOT NULL,
  `itog_horda` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `text` varchar(5000) NOT NULL,
  `autor` varchar(500) NOT NULL,
  `topic_id` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments_update`
--

CREATE TABLE `comments_update` (
  `id` int NOT NULL,
  `text` varchar(5000) NOT NULL,
  `autor` varchar(500) NOT NULL,
  `topic_id` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `launch_orders`
--

CREATE TABLE `launch_orders` (
  `id` int NOT NULL,
  `new_order` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `id` int NOT NULL,
  `material` varchar(1000) NOT NULL,
  `standart` varchar(1000) NOT NULL,
  `norma` varchar(1000) NOT NULL,
  `unit` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `new_users`
--

CREATE TABLE `new_users` (
  `user_id` int NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_surname` varchar(100) NOT NULL,
  `user_patronymic` varchar(100) NOT NULL,
  `user_place_of_work` varchar(300) NOT NULL,
  `user_position` varchar(300) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(1000) NOT NULL,
  `overview` varchar(3000) NOT NULL,
  `text` mediumtext NOT NULL,
  `today` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pt_snap`
--

CREATE TABLE `pt_snap` (
  `id` int NOT NULL,
  `inventory` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `drawing` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `diameter` varchar(100) NOT NULL,
  `diameter_fact` varchar(100) NOT NULL,
  `melting_num` varchar(100) NOT NULL,
  `flushing_count` varchar(100) NOT NULL,
  `damage` varchar(1000) NOT NULL,
  `durability` varchar(100) NOT NULL,
  `position` varchar(1000) NOT NULL,
  `user` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pt_snap_remove`
--

CREATE TABLE `pt_snap_remove` (
  `id` int NOT NULL,
  `inventory` varchar(100) NOT NULL,
  `drawing` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `melting_num` varchar(500) NOT NULL,
  `user` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `remelting_modes`
--

CREATE TABLE `remelting_modes` (
  `id` int NOT NULL,
  `real_casting_number` varchar(300) NOT NULL,
  `real_time` varchar(300) NOT NULL,
  `i_casting` varchar(300) NOT NULL,
  `u_casting` varchar(300) NOT NULL,
  `psn_casting` varchar(300) NOT NULL,
  `notes` varchar(300) NOT NULL,
  `speed_casting` varchar(300) NOT NULL,
  `user` varchar(300) NOT NULL,
  `length_casting` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `smelting`
--

CREATE TABLE `smelting` (
  `id` int NOT NULL,
  `num_order` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `steel` varchar(100) NOT NULL,
  `weight_tube` varchar(100) NOT NULL,
  `casting_number` varchar(100) NOT NULL,
  `size_casting_plan` varchar(100) NOT NULL,
  `weight_casting_plan` varchar(100) NOT NULL,
  `d_max_casting` varchar(100) NOT NULL,
  `d_min_casting` varchar(100) NOT NULL,
  `s_max_casting` varchar(100) NOT NULL,
  `s_min_casting` varchar(100) NOT NULL,
  `l_casting` varchar(100) NOT NULL,
  `curvature_casting` varchar(100) NOT NULL,
  `size_casting_fact` varchar(100) NOT NULL,
  `weight_casting_fact` varchar(100) NOT NULL,
  `i_average` varchar(100) NOT NULL,
  `u_average` varchar(100) NOT NULL,
  `r_average` varchar(100) NOT NULL,
  `p_average` varchar(100) NOT NULL,
  `p_w_average` varchar(100) NOT NULL,
  `start_smelting` varchar(100) NOT NULL,
  `end_smelting` varchar(100) NOT NULL,
  `notes` varchar(5000) NOT NULL,
  `furnace_num` varchar(1000) NOT NULL,
  `d_electrod` varchar(100) NOT NULL,
  `q_electrod` varchar(100) NOT NULL,
  `l_electrod` varchar(100) NOT NULL,
  `electrod_config` varchar(100) NOT NULL,
  `slag_start` varchar(100) NOT NULL,
  `slag_doz` varchar(100) NOT NULL,
  `alumin` varchar(100) NOT NULL,
  `year_num` varchar(1000) NOT NULL,
  `inventory_dorn` varchar(100) NOT NULL,
  `inventory_crist` varchar(100) NOT NULL,
  `inventory_slag` varchar(100) NOT NULL,
  `user` varchar(300) NOT NULL,
  `is_card` varchar(1000) NOT NULL,
  `is_pt_snap` varchar(2000) NOT NULL,
  `real_casting_number` varchar(300) NOT NULL,
  `time_casting` varchar(1000) NOT NULL,
  `casting_date` varchar(500) NOT NULL,
  `worker` varchar(300) NOT NULL,
  `v_average` varchar(300) NOT NULL,
  `kz_casting` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `snap`
--

CREATE TABLE `snap` (
  `id` int NOT NULL,
  `size` varchar(100) NOT NULL,
  `drawing` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `diameter` varchar(100) NOT NULL,
  `user` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `updates`
--

CREATE TABLE `updates` (
  `id` int NOT NULL,
  `title` varchar(1000) NOT NULL,
  `overview` varchar(3000) NOT NULL,
  `text` mediumtext NOT NULL,
  `today` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_date_of_registration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(100) NOT NULL,
  `user_surname` varchar(100) NOT NULL,
  `user_patronymic` varchar(100) NOT NULL,
  `user_place_of_work` varchar(100) NOT NULL,
  `user_position` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_pages`
--

CREATE TABLE `user_pages` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `href` varchar(1000) NOT NULL,
  `access` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_questions`
--

CREATE TABLE `user_questions` (
  `id` int NOT NULL,
  `user_question` varchar(3000) NOT NULL,
  `user_question_date` varchar(3000) NOT NULL,
  `answer_to_user` varchar(3000) NOT NULL,
  `answer_to_user_date` varchar(3000) NOT NULL,
  `user_id` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments_update`
--
ALTER TABLE `comments_update`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `launch_orders`
--
ALTER TABLE `launch_orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `new_users`
--
ALTER TABLE `new_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pt_snap`
--
ALTER TABLE `pt_snap`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pt_snap_remove`
--
ALTER TABLE `pt_snap_remove`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `remelting_modes`
--
ALTER TABLE `remelting_modes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `smelting`
--
ALTER TABLE `smelting`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `snap`
--
ALTER TABLE `snap`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user_pages`
--
ALTER TABLE `user_pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_questions`
--
ALTER TABLE `user_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `comments_update`
--
ALTER TABLE `comments_update`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `launch_orders`
--
ALTER TABLE `launch_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `new_users`
--
ALTER TABLE `new_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pt_snap`
--
ALTER TABLE `pt_snap`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pt_snap_remove`
--
ALTER TABLE `pt_snap_remove`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `remelting_modes`
--
ALTER TABLE `remelting_modes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `smelting`
--
ALTER TABLE `smelting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `snap`
--
ALTER TABLE `snap`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_pages`
--
ALTER TABLE `user_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_questions`
--
ALTER TABLE `user_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
