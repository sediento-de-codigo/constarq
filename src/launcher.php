<?php

require './src/Roots.php';
require './config/config.php';
require './src/utils/SessionManager.php';
require PATH_SRC . 'lib/Autoloader.php';

Autoloader::registrar();

//inicializamos las sesiones
SessionManager::start();

$rutas = scandir(PATH_ROUTES);

foreach ($rutas as $archivo) {
    $rutaArchivo = realpath(PATH_ROUTES . $archivo);
    if (is_file($rutaArchivo)) {
        require $rutaArchivo;
    }
}

Route::submit();
