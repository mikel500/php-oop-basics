<?php
require_once 'config/parameters.php';
require_once 'views/layout/head.php';
require_once 'views/layout/header.php';
require_once 'views/users/login-modal.php';
require_once 'autoload.php';

if (isset($_GET['controller'])) {
    $controller_name = ucfirst($_GET['controller'] . 'Controller');
} else if (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $controller_name = controller_default;
} else {
    $error = new ErrorController();
    $error->showError();
    exit();
}

if (class_exists($controller_name)) {
    $controller = new $controller_name();

    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    } else if ($controller && !isset($_GET['action'])) {
        $action = action_default;
        $controller->$action();
    } else {
        $error = new ErrorController();
        $error->showError();
        exit();
    }
} else {
    $error = new ErrorController();
    $error->showError();
    exit();
}

require_once 'views/layout/footer.php';
session_destroy();
