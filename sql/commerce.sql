-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2025 a las 01:55:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `commerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`) VALUES
(1, 'pizza'),
(2, 'gaseosa'),
(3, 'empanadas'),
(4, 'promo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `price`, `start_date`, `image`, `id_category`) VALUES
(1, 'fugazzeta', 12400.00, '2025-08-22 23:35:15', 'img/enhanced_fugazzeta_cleanup.png', 1),
(2, 'Pizza cuatro Quesos', 15000.00, '2025-08-22 23:37:05', 'img/enhanced_pizza-4-quesos.png', 1),
(3, 'Pizza de albahaca', 17000.00, '2025-08-22 23:37:50', 'img/enhanced_pizza-de-albahaca.png', 1),
(4, 'Pizza de muzzarella', 17000.00, '2025-08-22 23:38:30', 'img/enhanced_pizza-muzzarella.png', 1),
(5, 'Pizza napolitana', 15000.00, '2025-08-22 23:39:01', 'img/enhanced_pizza-napolitana.png', 1),
(6, 'Pizza de rúcula y jamón crudo', 13500.00, '2025-08-22 23:39:37', 'img/enhanced_pizza-rucula-y-jamon-crudo.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `products_categories` (`id_category`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


# Listado de productos con sus correspondientes categorias.
select products.image,products.price,products.product_name,products.start_date,categories.category_name from products inner join categories on products.id_category=categories.id_category;
