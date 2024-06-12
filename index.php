<?php
require_once 'core/Controller.php';
require_once 'core/Database.php';
require_once 'core/Model.php';
require_once 'controllers/MainController.php';


$controller = new MainController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}


switch ($action) {
    case 'connectStudent':
        $controller->connectStudent();
        break;
    case 'createPayment':
        $controller->createPayment();
    case 'loginStudent':
        $controller->loginStudent();
        break;
    case 'admin':
        $controller->admin();
        break;
    case 'searchStudent':
        $controller->searchStudent();
        break;
    case 'listStudentsPaid':
        $controller->listStudentsPaid();
        break;
    case 'listStudentsUnpaid':
        $controller->listStudentsUnpaid();
        break;
    default:
        $controller->home();
        break;
}
?>
