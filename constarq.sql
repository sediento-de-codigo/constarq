-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2024 a las 17:58:58
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
-- Base de datos: `constarq`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma_compra`
--

CREATE TABLE `proforma_compra` (
  `PROCO_id` int(11) NOT NULL,
  `PROCO_nombre_esposo` varchar(250) NOT NULL,
  `PROCO_cedula_esposo` varchar(250) NOT NULL,
  `PROCO_nombre_esposa` varchar(250) NOT NULL,
  `PROCO_cedula_esposa` varchar(250) NOT NULL,
  `PROCO_tel01` varchar(250) NOT NULL,
  `PROCO_email01` varchar(250) NOT NULL,
  `PROCO_tel02` varchar(250) NOT NULL,
  `PROCO_email02` varchar(250) NOT NULL,
  `PROCO_conjunto01` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `PROCO_conjunto02` varchar(10) NOT NULL,
  `PROCO_tiempo_entrega` varchar(250) NOT NULL,
  `PROCO_num_casa` varchar(100) NOT NULL,
  `PROCO_financiera` varchar(250) NOT NULL,
  `PROCO_valor_inmueble` decimal(10,2) NOT NULL,
  `PROCO_area` decimal(10,2) NOT NULL,
  `PROCO_patio` decimal(10,2) NOT NULL,
  `PROCO_parqueadero` decimal(10,2) NOT NULL,
  `PROCO_terraza` decimal(10,2) NOT NULL,
  `PROCO_valor_entrada` decimal(10,2) NOT NULL,
  `PROCO_credito_bancario` decimal(10,2) NOT NULL,
  `PROCO_tiempo_financiamiento` varchar(100) NOT NULL,
  `PROCO_interes_preferencial` varchar(100) NOT NULL,
  `PROCO_cuota_aprox` decimal(10,2) NOT NULL,
  `PROCO_finaciamiento_entrada` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`PROCO_finaciamiento_entrada`)),
  `PROCO_ingresos_egresos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`PROCO_ingresos_egresos`)),
  `PROCO_estado_visita` varchar(50) DEFAULT NULL,
  `PROCO_sub_estado` varchar(50) DEFAULT NULL,
  `PROCO_estado` tinyint(4) NOT NULL DEFAULT 1,
  `PROCO_observacion` text DEFAULT NULL,
  `USU_id01` int(11) DEFAULT NULL,
  `EMPR_id01` int(11) NOT NULL DEFAULT 1,
  `PROCO_fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proforma_compra`
--

INSERT INTO `proforma_compra` (`PROCO_id`, `PROCO_nombre_esposo`, `PROCO_cedula_esposo`, `PROCO_nombre_esposa`, `PROCO_cedula_esposa`, `PROCO_tel01`, `PROCO_email01`, `PROCO_tel02`, `PROCO_email02`, `PROCO_conjunto01`, `PROCO_conjunto02`, `PROCO_tiempo_entrega`, `PROCO_num_casa`, `PROCO_financiera`, `PROCO_valor_inmueble`, `PROCO_area`, `PROCO_patio`, `PROCO_parqueadero`, `PROCO_terraza`, `PROCO_valor_entrada`, `PROCO_credito_bancario`, `PROCO_tiempo_financiamiento`, `PROCO_interes_preferencial`, `PROCO_cuota_aprox`, `PROCO_finaciamiento_entrada`, `PROCO_ingresos_egresos`, `PROCO_estado_visita`, `PROCO_sub_estado`, `PROCO_estado`, `PROCO_observacion`, `USU_id01`, `EMPR_id01`, `PROCO_fecha_registro`) VALUES
(7, 'esposo', 'cedula espóso', 'esposa', 'cedula esposa', 'tel01', 'email01', 'tel02', 'email02', '1', '0', 'email02', 'email02', 'email02', 15000.00, 12.00, 12.00, 45.00, 24.00, 10000.00, 2000.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"2024-04-25\",\"valor\":10,\"saldo\":100,\"descripcion\":\"-\",\"banco\":\"bcp\"},{\"tipo\":\"RESERVA\",\"fecha\":\"2024-04-18\",\"valor\":34,\"saldo\":65,\"descripcion\":\"-\",\"banco\":\"-\"},{\"tipo\":\"CUOTA 1\",\"fecha\":\"2024-04-12\",\"valor\":54,\"saldo\":54,\"descripcion\":\"-\",\"banco\":\"-\"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":10,\"ingresoExtra\":52,\"ingresoTotal\":62,\"egresoFijo\":1,\"rolPago\":2,\"egresoTotal\":3},{\"tipo\":\"Esposa\",\"ingresoFijo\":5,\"ingresoExtra\":6,\"ingresoTotal\":11,\"egresoFijo\":8,\"rolPago\":6,\"egresoTotal\":14}]', 'Visitó', 'No Calificado', 1, 'holis 02', 1, 1, '2024-04-23 10:21:18'),
(8, 'Sint quo ad laborio', 'Laboriosam molestia', 'In ut non quia volup', 'Consequuntur facilis', 'Eligendi ut aliquip ', 'vemegive@mailinator.com', 'Possimus omnis veli', 'fedy@mailinator.com', '', '1', 'Repellendus Mollit ', 'Aut eos ipsum est', 'Est totam ab tempor', 456.00, 21.00, 93.00, 34.00, 24.00, 654.00, 6.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"2019-03-27\",\"valor\":5345,\"saldo\":5345,\"descripcion\":\"Quam laudantium cor\",\"banco\":\"Ratione in rerum off\"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":5345,\"ingresoExtra\":34535,\"ingresoTotal\":39880,\"egresoFijo\":345345,\"rolPago\":34543,\"egresoTotal\":379888},{\"tipo\":\"Esposa\",\"ingresoFijo\":34534,\"ingresoExtra\":5345,\"ingresoTotal\":39879,\"egresoFijo\":5435,\"rolPago\":34534,\"egresoTotal\":39969}]', NULL, NULL, 0, NULL, 1, 1, '2024-05-20 15:52:37'),
(9, 'Asperiores pariatur', 'Non nemo laudantium', 'Fuga Nihil qui comm', 'Elit id quos est lo', 'Qui quidem ad est su', 'rovojo@mailinator.com', 'Ea Nam quo a dolores', 'home@mailinator.com', '1', '', 'Atque nihil est fugi', 'Rem veritatis archit', 'Reprehenderit sed m', 645.80, 54.00, 100.00, 12.00, 88.00, 65.00, 456.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"2001-04-22\",\"valor\":5345,\"saldo\":53455345,\"descripcion\":\"Lorem eveniet sit i\",\"banco\":\"Molestiae maiores ex\"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":5435,\"ingresoExtra\":34534545,\"ingresoTotal\":34539980,\"egresoFijo\":53453,\"rolPago\":5345,\"egresoTotal\":58798},{\"tipo\":\"Esposa\",\"ingresoFijo\":53453,\"ingresoExtra\":53453,\"ingresoTotal\":106906,\"egresoFijo\":534,\"rolPago\":5345,\"egresoTotal\":5879}]', NULL, NULL, 0, NULL, 1, 1, '2024-05-20 15:55:11'),
(10, 'Officia dicta volupt', 'Et sint nostrud quis', 'Impedit quam exerci', 'Rerum sint ipsum su', 'Error consequuntur p', 'fetivorab@mailinator.com', 'Ab commodo et eos re', 'zizenid@mailinator.com', '1', '1', 'Irure pariatur Qui ', 'Aut magni dolores su', 'Quia numquam quo rep', 100.80, 35.00, 13.00, 50.00, 64.00, 101.00, 645.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"1987-09-26\",\"valor\":645,\"saldo\":465,\"descripcion\":\"Vel molestiae nostru\",\"banco\":\"Provident eius tene\"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":5435,\"ingresoExtra\":5345,\"ingresoTotal\":10780,\"egresoFijo\":534345,\"rolPago\":345,\"egresoTotal\":534690},{\"tipo\":\"Esposa\",\"ingresoFijo\":345,\"ingresoExtra\":345,\"ingresoTotal\":690,\"egresoFijo\":345,\"rolPago\":34534,\"egresoTotal\":34879}]', NULL, NULL, 0, NULL, 1, 1, '2024-05-20 15:59:22'),
(11, 'Provident assumenda', 'Aperiam necessitatib', 'Provident duis beat', 'Voluptatem aspernat', 'Amet qui est distin', 'mazeti@mailinator.com', 'Vitae esse ut enim n', 'pugevijira@mailinator.com', '', '1', 'Qui error optio tem', 'Qui velit odio sapi', 'Quidem do dicta dolo', 10.52, 50.00, 71.00, 40.00, 6.00, 1.00, 5.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"1980-10-15\",\"valor\":534,\"saldo\":5345,\"descripcion\":\"Ut sunt qui et recu\",\"banco\":\"Ea commodi reprehend\"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":534,\"ingresoExtra\":345,\"ingresoTotal\":879,\"egresoFijo\":534,\"rolPago\":345,\"egresoTotal\":879},{\"tipo\":\"Esposa\",\"ingresoFijo\":345,\"ingresoExtra\":345534,\"ingresoTotal\":345879,\"egresoFijo\":534,\"rolPago\":345534,\"egresoTotal\":346068}]', NULL, NULL, 0, NULL, 1, 1, '2024-05-20 16:03:36'),
(12, 'Aut sit atque id eu', 'Provident sunt nece', 'Est sit quaerat re', 'Commodi laudantium ', 'Dolor quam dolor dol', 'hihyca@mailinator.com', 'Sed qui incidunt vi', 'cedufydo@mailinator.com', '0', '1', 'cedufydo@mailinator.com', 'cedufydo@mailinator.com', 'cedufydo@mailinator.com', 1000.50, 93.00, 41.00, 78.00, 67.00, 2455.40, 645.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"1982-04-20\",\"valor\":645,\"saldo\":465,\"descripcion\":\"Temporibus tenetur a\",\"banco\":\"Excepturi aliquid oc\"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":465,\"ingresoExtra\":465,\"ingresoTotal\":930,\"egresoFijo\":645,\"rolPago\":465,\"egresoTotal\":10110},{\"tipo\":\"Esposa\",\"ingresoFijo\":465,\"ingresoExtra\":465,\"ingresoTotal\":930,\"egresoFijo\":45,\"rolPago\":4650465,\"egresoTotal\":4650510}]', NULL, NULL, 1, NULL, 11, 1, '2024-05-20 16:15:36'),
(13, 'Exercitation volupta', 'Dolore dolore vitae ', 'Provident ullam mol', 'Harum tenetur est c', 'Laborum nostrud anim', 'gyqupy@mailinator.com', 'Similique labore per', 'karuduho@mailinator.com', '', '1', 'Nostrum non aliquip ', 'Hic quis labore libe', 'Architecto lorem dol', 465.00, 46.00, 94.00, 21.00, 69.00, 534.00, 3465.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"1996-05-06\",\"valor\":345,\"saldo\":345,\"descripcion\":\"Perferendis rem sequ\",\"banco\":\"Eos consequatur Aut\"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":534,\"ingresoExtra\":345,\"ingresoTotal\":879,\"egresoFijo\":345,\"rolPago\":534,\"egresoTotal\":879},{\"tipo\":\"Esposa\",\"ingresoFijo\":345,\"ingresoExtra\":345345,\"ingresoTotal\":345690,\"egresoFijo\":5456,\"rolPago\":345345,\"egresoTotal\":350801}]', NULL, NULL, 0, NULL, 1, 1, '2024-05-20 17:28:52'),
(14, 'Labore distinctio A', 'Quia ipsum assumenda', 'Non et ipsum ullamc', 'Ullamco voluptate ad', 'Est sapiente esse s', 'fimonu@mailinator.com', 'Cumque nostrum offic', 'xihapevi@mailinator.com', '1', '0', 'xihapevi@mailinator.com', 'xihapevi@mailinator.com', 'xihapevi@mailinator.com', 6.00, 28.00, 26.00, 3.00, 65.00, 534465.00, 45.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"2001-11-05\",\"valor\":765,\"saldo\":675,\"descripcion\":\"Id reprehenderit ull\",\"banco\":\"Asperiores in natus \"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":675,\"ingresoExtra\":765,\"ingresoTotal\":1440,\"egresoFijo\":675,\"rolPago\":675,\"egresoTotal\":1350},{\"tipo\":\"Esposa\",\"ingresoFijo\":6756,\"ingresoExtra\":675,\"ingresoTotal\":7431,\"egresoFijo\":534,\"rolPago\":54,\"egresoTotal\":588}]', 'Visitó', 'No Calificado', 0, NULL, 1, 1, '2024-05-20 17:32:57'),
(15, 'Illo eveniet omnis ', 'Molestiae mollitia s', 'Voluptate amet null', 'Adipisicing laudanti', 'Et temporibus quia o', 'jubex@mailinator.com', 'Aspernatur atque ut ', 'pafopih@mailinator.com', '1', '1', 'Sint veritatis modi', 'Id occaecat eaque to', 'Eum recusandae Aut ', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"2004-05-18\",\"valor\":3,\"saldo\":3,\"descripcion\":\"Perferendis dolo3ribu\",\"banco\":\"Quaer3at perferendis \"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":3,\"ingresoExtra\":3,\"ingresoTotal\":6,\"egresoFijo\":534534,\"rolPago\":4,\"egresoTotal\":534538},{\"tipo\":\"Esposa\",\"ingresoFijo\":534,\"ingresoExtra\":4,\"ingresoTotal\":538,\"egresoFijo\":55,\"rolPago\":3,\"egresoTotal\":3}]', 'Visitó', 'Venta Futuro', 0, 'Iure aliquam nostrud', 1, 1, '2024-07-04 11:15:41'),
(16, 'Amet esse eaque ea', 'Facere sed ipsum te', 'Perferendis elit id', 'Magnam debitis conse', 'Accusamus suscipit a', 'kozadiri@mailinator.com', 'Voluptatem aut et qu', 'pozozev@mailinator.com', '1', '', 'Fugit in eiusmod ip', 'A ipsum dolor sed i', 'Nam sed ullamco veri', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"2008-07-28\",\"valor\":2,\"saldo\":3,\"descripcion\":\"4\",\"banco\":\"Ducimus reiciendis \"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":5,\"ingresoExtra\":200,\"ingresoTotal\":205,\"egresoFijo\":78,\"rolPago\":6,\"egresoTotal\":84},{\"tipo\":\"Esposa\",\"ingresoFijo\":6,\"ingresoExtra\":6,\"ingresoTotal\":12,\"egresoFijo\":6,\"rolPago\":6,\"egresoTotal\":12}]', 'Visitó', 'No Calificado', 1, 'Officia perferendis xd', 1, 1, '2024-07-05 10:57:13'),
(17, 'Eius perferendis dol', 'Et at qui assumenda ', 'Nostrud tenetur beat', 'Qui delectus ea lor', 'Aut inventore aliqua', 'buje@mailinator.com', 'Commodo deserunt asp', 'datiw@mailinator.com', '1', '', 'Molestiae similique ', 'Laboris numquam ut q', 'Est sapiente et in n', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"2015-09-26\",\"valor\":5,\"saldo\":6,\"descripcion\":\"Dolores sunt ad offi\",\"banco\":\"Impedit qui deserun\"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":65,\"ingresoExtra\":8900,\"ingresoTotal\":8965,\"egresoFijo\":65,\"rolPago\":665,\"egresoTotal\":730},{\"tipo\":\"Esposa\",\"ingresoFijo\":65,\"ingresoExtra\":56,\"ingresoTotal\":121,\"egresoFijo\":56,\"rolPago\":65,\"egresoTotal\":121}]', 'Visitó', 'Compra', 1, 'Aliquid rerum quidem jiiii', 1, 1, '2024-07-05 10:58:34'),
(18, '654', '6456', '6456', '6456', '6456', '654', '645', '664', '1', '', '465', '465', '465', 645.00, 6456.00, 46.00, 45645.00, 6546.00, 465.00, 645.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"2024-07-03\",\"valor\":45,\"saldo\":465,\"descripcion\":\"65\",\"banco\":\"465\"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":465,\"ingresoExtra\":666,\"ingresoTotal\":1131,\"egresoFijo\":645,\"rolPago\":465,\"egresoTotal\":1110},{\"tipo\":\"Esposa\",\"ingresoFijo\":465,\"ingresoExtra\":645,\"ingresoTotal\":1110,\"egresoFijo\":465,\"rolPago\":440,\"egresoTotal\":905}]', 'Visitó', 'No Calificado', 1, 'observacion', 11, 1, '2024-07-05 11:05:28'),
(19, '23', '534', '543', '543', '543', '534', '534', 'fd@gmail.com', '1', '0', 'fd@gmail.com', 'fd@gmail.com', 'fd@gmail.com', 645.00, 654.00, 645.00, 580.00, 645.00, 645.00, 645.00, '', '', 0.00, '[{\"tipo\":\"ENTRADA\",\"fecha\":\"2024-07-09\",\"valor\":45,\"saldo\":465,\"descripcion\":\"654\",\"banco\":\"64\"}]', '[{\"tipo\":\"Esposo\",\"ingresoFijo\":645,\"ingresoExtra\":465,\"ingresoTotal\":1110,\"egresoFijo\":645,\"rolPago\":645,\"egresoTotal\":1290},{\"tipo\":\"Esposa\",\"ingresoFijo\":5666,\"ingresoExtra\":6,\"ingresoTotal\":5672,\"egresoFijo\":465,\"rolPago\":465,\"egresoTotal\":930}]', 'No visitó', 'No Calificado', 1, 'observaciones 2', 15, 1, '2024-07-08 10:52:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `USU_id` int(11) NOT NULL,
  `USU_user` varchar(250) NOT NULL,
  `USU_password` varchar(250) NOT NULL,
  `USU_rol` varchar(50) DEFAULT NULL,
  `USU_permisos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`USU_permisos`)),
  `USU_nombres` varchar(250) DEFAULT NULL,
  `USU_apellidos` varchar(250) DEFAULT NULL,
  `USU_correo` varchar(250) DEFAULT NULL,
  `USU_telefono` varchar(250) DEFAULT NULL,
  `USU_id01` int(11) DEFAULT NULL COMMENT 'id del usuario que hace el registro ',
  `EMPR_id01` int(11) NOT NULL DEFAULT 1,
  `USU_estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`USU_id`, `USU_user`, `USU_password`, `USU_rol`, `USU_permisos`, `USU_nombres`, `USU_apellidos`, `USU_correo`, `USU_telefono`, `USU_id01`, `EMPR_id01`, `USU_estado`) VALUES
(1, 'administrador', '$2y$12$DPFboT8cpzIvKhv3vLRgMOAacEomhyDOCnDgKcDdoHaLUWwA9/tSO', 'ADMINISTRADOR', NULL, 'Administrador', 'apellidos', 'admin@gmail.com', 'telefono', 1, 1, 1),
(2, 'vendedor', '$2y$12$DPFboT8cpzIvKhv3vLRgMOAacEomhyDOCnDgKcDdoHaLUWwA9/tSO', 'VENDEDOR', NULL, 'Vendedor', '-', 'correo@vendedor.com', '3455345', 1, 1, 1),
(10, 'Quis et beatae place', '$2y$12$0iHfT95GpCRuMx0sIfJjZupAFb5yLc6O8sXzbsQrnlPjJk3YkvMS2', 'Administrador', NULL, 'Voluptas ex consecte', 'Quo dolore elit eu ', 'Voluptas anim maxime', 'Rem quis ipsa dolor', 1, 1, 1),
(11, 'holi', '$2y$12$RCOB2lnrFcM/VqcgQYWVSOLFQ6zAXjvY3AoAngMS9AqgsyFVO4Lvy', 'VENDEDOR', NULL, 'Quia illo reprehende', 'Alias voluptas labor', 'holi@gmail.com', 'Aut velit consectetu', 1, 1, 1),
(12, 'Irure rerum quia rer', '$2y$12$QFAwJ9TkysMOs3K3wd4w0Osue2/99UHT4nMAGig9bL4EvrEn9FzvW', 'Administrador', NULL, 'Et et excepturi sint', 'Facere sint rerum nu', 'Sed aut rerum irure ', 'Odit non quia id id ', 1, 1, 0),
(13, 'Ipsa sit ut nisi su', '$2y$12$vETPVeM2rmd0V/q/SZ7.ou4NO5N8mUnHCnCnKD4krzDIuin5vOXdK', 'ADMINISTRADOR', NULL, 'Fuga Ipsum nostrud', 'Excepturi placeat m', 'Dolor fugiat sunt e', 'Dolor provident ull', 1, 1, 0),
(14, 'usuario', '$2y$12$DUAYbtOCEV3W3BksYxp8Oe3KvoaEKZV1iKp0.R5n2rcJso40FcGOq', 'VENDEDOR', NULL, 'nombres completos', 'apellidos', 'correo@fgds.com', 'telefono', 1, 1, 0),
(15, 'luis', '$2y$12$fLG2v1FT1hIcD2itlNeEB.EMHYFRf0Qu8EOgecJasKmCiwoh8SQ1i', 'VENDEDOR', NULL, 'luis', 'apellido 2', 'luis@gmail.com', '5345634553', 1, 1, 1),
(16, 'Officia assumenda de', '$2y$12$nl8v9fC7dSoiGzOyH4n2s.PRy7pESKUscBDo27ZfqAhsOr9xKrYQq', 'VENDEDOR', NULL, 'Laudantium molestia', 'Dolorem numquam iust', 'vawilip@mailinator.com', 'In dolor aute libero', 1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proforma_compra`
--
ALTER TABLE `proforma_compra`
  ADD PRIMARY KEY (`PROCO_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USU_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proforma_compra`
--
ALTER TABLE `proforma_compra`
  MODIFY `PROCO_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USU_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
