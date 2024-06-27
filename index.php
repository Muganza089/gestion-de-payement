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
    case 'updateTranche':
        $controller->updateTranche();
        break;
    case 'enregistrerPayement':
        $controller->enregistrerPayement();
    case 'payement_effectue':
        $controller->payement_effectue();
    case 'createStudent':
        $controller->createEtudiant();
    case 'connectStudent':
        $controller->connectStudent();
        break;
    case 'createPayment':
        $controller->createPayment();
        break;
    case 'loginStudent':
        $controller->loginStudent();
        break;
    case 'admin':
        $controller->admin();
        break;
    case 'searchStudent':
        $controller->searchStudent();
        break;
    case 'searchBar':
        $controller->searchByMatricule();
    case 'listStudentsPaid':
        $controller->listStudentsPaid();
        break;
    case 'listStudentsUnpaid':
        $controller->listStudentsUnpaid();
        break;
    case 'loginAdmin':
        $controller->loginAdmin();
        break;
    case 'connectAdmin':
        $controller->connectAdmin();
        break;
    case 'createAdmin':
        $controller->createAdmin();
        break;
    case 'deleteAdmin':
        $controller->deleteAdmin();
        break;
    case 'adminDashboard':
        $controller->adminDashboard();
        break;
    case 'portemonnaie':
        $controller->portemonnaie();
        break;
     case 'addMoney':
        $controller->addMoney();
        break;
    default:
        $controller->home();
        break;
    
}
?>
