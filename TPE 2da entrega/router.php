<?php

require_once './app/controllers/items.controller.php';
require_once './app/controllers/category.controller.php';
require_once './app/controllers/auth.controller.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {

    case 'home':
        $itemsController = new ItemsController();
        $itemsController->showHome();
        break;
        // Casos relacionados a Categorias
    case 'categorias':
        $CategoryController = new CategoryController();
        $CategoryController->showCategorys();
        break;
    case 'agregarCategoria':
        $CategoryController = new CategoryController();
        $CategoryController->agregarCategoria();
        break;
    case 'eliminarCategoria':
        $CategoryController = new CategoryController();
        $CategoryController->eliminarCategoria($params[1]);
        break;
    case 'buttonEditCategoria':
        $CategoryController = new CategoryController();
        $CategoryController->showEditFormCategoria($params[1]);
        break;
    case 'editarCategoria':
        $CategoryController = new CategoryController();
        $CategoryController->editCategoria($params[1]);
        break;
    
        // Casos relacionados a Perifericos
    case 'agregarPeriferico':
        $itemsController = new ItemsController();
        $itemsController->agregarPeriferico();
        break;
    case 'eliminarPeriferico':
        $itemsController = new ItemsController();
        $itemsController->eliminarPeriferico($params[1]);
        break;
    case 'buttonEdit':
        $itemsController = new ItemsController();
        $itemsController->showEditForm($params[1]);
        break;
    case 'editarPeriferico':
        $itemsController = new ItemsController();
        $itemsController->editarPeriferico($params[1]);
        break;
    case 'showEspecifico':
        $itemsController = new ItemsController();
        $itemsController->showEspecifico($params[1]);
        break;
    case 'filtrarItemsCategoria':
        $itemsController = new ItemsController();
        $itemsController->showItemsByFiltro();
        break;

        // Casos relacionados al Login
    case 'login':
        $authController = new AuthController();
        $authController->showLogin();
        break;
    case 'auth':
        $authController = new AuthController();
        $authController->auth();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
    default:
        echo ('404 Page not found');
        break;
}
