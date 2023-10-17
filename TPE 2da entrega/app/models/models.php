<?php

    require_once './config.php';


    class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
            $this->deploy();
        }

        function deploy() {
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll();
            if(count($tables)==0) {
                $sql =<<<END
                --
                -- Base de datos: `db_tpe`
                --

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `periferico`
                --

                CREATE TABLE `periferico` (
                `id` int(11) NOT NULL,
                `marca` varchar(45) NOT NULL,
                `precio` int(11) NOT NULL,
                `color` varchar(45) NOT NULL,
                `id_periferico` varchar(45) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                --
                -- Volcado de datos para la tabla `periferico`
                --

                INSERT INTO `periferico` (`id`, `marca`, `precio`, `color`, `id_periferico`) VALUES
                (4, 'HyperX', 1233, 'rojo', 'teclado'),
                (5, 'Logitech', 75000, 'blanco', 'mouse');

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `tipo_periferico`
                --

                CREATE TABLE `tipo_periferico` (
                `id` int(11) NOT NULL,
                `id_periferico` varchar(45) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                --
                -- Volcado de datos para la tabla `tipo_periferico`
                --

                INSERT INTO `tipo_periferico` (`id`, `id_periferico`) VALUES
                (1, 'mouse'),
                (2, 'teclado');

                --
                -- Índices para tablas volcadas
                --

                --
                -- Indices de la tabla `periferico`
                --
                ALTER TABLE `periferico`
                ADD PRIMARY KEY (`id`),
                ADD KEY `id_periferico` (`id_periferico`);

                --
                -- Indices de la tabla `tipo_periferico`
                --
                ALTER TABLE `tipo_periferico`
                ADD PRIMARY KEY (`id`),
                ADD KEY `id_periferico` (`id_periferico`);

                --
                -- AUTO_INCREMENT de las tablas volcadas
                --

                --
                -- AUTO_INCREMENT de la tabla `periferico`
                --
                ALTER TABLE `periferico`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

                --
                -- AUTO_INCREMENT de la tabla `tipo_periferico`
                --
                ALTER TABLE `tipo_periferico`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

                --
                -- Restricciones para tablas volcadas
                --

                --
                -- Filtros para la tabla `periferico`
                --
                ALTER TABLE `periferico`
                ADD CONSTRAINT `periferico_ibfk_1` FOREIGN KEY (`id_periferico`) REFERENCES `tipo_periferico` (`id_periferico`);
                COMMIT;
                END;
                $this->db->query($sql);

            }
            
        }
    }