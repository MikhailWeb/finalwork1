--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.2.280.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 03.03.2020 15:28:29
-- Версия сервера: 5.5.5-10.3.13-MariaDB-log
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE burger;

--
-- Описание для таблицы tbl_orders
--
DROP TABLE IF EXISTS tbl_orders;
CREATE TABLE tbl_orders (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) NOT NULL,
  address VARCHAR(255) DEFAULT 'NULL',
  items TEXT DEFAULT NULL,
  notes VARCHAR(255) DEFAULT 'NULL',
  options VARCHAR(255) DEFAULT 'NULL',
  dt DATETIME NOT NULL DEFAULT 'current_timestamp()' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 14
AVG_ROW_LENGTH = 2340
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы tbl_users
--
DROP TABLE IF EXISTS tbl_users;
CREATE TABLE tbl_users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(100) NOT NULL,
  email VARCHAR(50) NOT NULL,
  phone VARCHAR(20) DEFAULT 'NULL',
  PRIMARY KEY (id),
  UNIQUE INDEX tbl_User_email_uindex (email)
)
ENGINE = INNODB
AUTO_INCREMENT = 22
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci
ROW_FORMAT = DYNAMIC;

-- 
-- Вывод данных для таблицы tbl_orders
--
INSERT INTO tbl_orders VALUES
(1, 13, 'ул. Ленина, д. 12, кв. 4, этаж 2', 'DarkBeefBurger - 1 шт.; Сумма = 500 * 1 = 500 руб.\r\n\r\nИтог: 500 руб.', 'Звонить трижды и не стучать', 'Оплата: оплата картой\r\nОбратная связь: не перезванивать', '2020-03-03 14:23:12'),
(2, 14, 'ул. Ворошилова, д. 3, кв. 15, этаж 2', 'DarkBeefBurger - 1 шт.; Сумма = 500 * 1 = 500 руб.\r\n\r\nИтог: 500 руб.', 'тихо, спит ребенок', 'Оплата: оплата картой', '2020-03-03 14:24:57'),
(3, 15, 'ул. Московская, д. 5, кв. 12, этаж 3', 'DarkBeefBurger - 1 шт.; Сумма = 500 * 1 = 500 руб.\r\n\r\nИтог: 500 руб.', '+ двойной кетчуп', 'Оплата: оплата картой\r\nОбратная связь: не перезванивать', '2020-03-03 14:36:45'),
(4, 17, 'ул. 3-я ул. Строителей, д. 5, кв. 25, этаж 5', 'DarkBeefBurger - 1 шт.; Сумма = 500 * 1 = 500 руб.\r\n\r\nИтог: 500 руб.', 'г. Ленинград', 'Оплата: оплата картой\r\nОбратная связь: не перезванивать', '2020-03-03 14:50:29'),
(10, 20, 'ул. Бастионная, д. 1', 'DarkBeefBurger - 1 шт.; Сумма = 500 * 1 = 500 руб.\r\n\r\nИтог: 500 руб.', 'йцукен', 'Оплата: требуется сдача\r\nОбратная связь: не перезванивать', '2020-03-03 15:07:07'),
(12, 21, 'ул. Железная, д. 17, кв. 10, этаж 3', 'DarkBeefBurger - 1 шт.; Сумма = 500 * 1 = 500 руб.\r\n\r\nИтог: 500 руб.', 'два комплекта приборов', 'Оплата: оплата картой\r\nОбратная связь: не перезванивать', '2020-03-03 15:11:06'),
(13, 15, 'ул. Рабочая, д. 3', 'DarkBeefBurger - 1 шт.; Сумма = 500 * 1 = 500 руб.\r\n\r\nИтог: 500 руб.', 'побыстрее', 'Оплата: оплата картой\r\n\r\nОбратная связь: не перезванивать', '2020-03-03 15:19:26');

-- 
-- Вывод данных для таблицы tbl_users
--
INSERT INTO tbl_users VALUES
(13, 'Сергей Пхпшкин', 'qwerty12345@mail.ru', '+7 (111) 111 11 11'),
(14, 'Иван Васильевич', 'qwerty77@mail.ru', '+7 (555) 555 55 55'),
(15, 'Снежанна', 'snezha@mail.ru', '+7 (777) 777 77 77'),
(17, 'Василий Иванович', 'chapayev@mail.ru', '+7 (888) 888 88 88'),
(20, 'БАСТА', 'баста@mail.ru', '+7 (123) 456 78 91'),
(21, 'Элеонора', 'alya@mail.ru', '+7 (353) 535 35 35');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;