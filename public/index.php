<?php
require_once "../core/Database.php";
require_once "../core/Controller.php";
require_once "../core/Model.php";

// Routeur simple
$controllerName = "MainController";
$action = "index";
$params = [];

// Traiter la requête pour déterminer l'action et les paramètres
$request = $_SERVER['REQUEST_URI'];
if ($request != "/" && $request != "") {
    $url = explode('/', trim($request, '/'));
    if (isset($url[0]) && strtolower($url[0]) === 'main') {
        if (isset($url[1])) {
            $action = $url[1];
        }
        $params = array_slice($url, 2);
    }
}

$controllerFile = "../controllers/" . $controllerName . ".php";
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName;
    if (method_exists($controller, $action)) {
        call_user_func_array([$controller, $action], $params);
    } else {
        echo "Action $action not found in controller $controllerName.";
    }
} else {
    echo "Controller file not found: " . $controllerFile;
}
?>
