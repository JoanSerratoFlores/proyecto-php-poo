<?php
session_start();
require_once 'helpers/utils.php';
require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'config/db.php';

require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


function show_error() {
    $error = new errorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_Controlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_Controlador = controller_default;
} else {
    echo "La pagina que buscas no existe";
    exit();
}


if (class_exists($nombre_Controlador)) {
 
    $controlador = new $nombre_Controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        show_error();
    }
} else {
    show_error();
}


require_once 'views/layout/footer.php';
?>
