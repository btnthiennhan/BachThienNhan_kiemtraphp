<?php
session_start(); // Khởi động session một lần duy nhất ở đây

require_once 'config/Database.php';
require_once 'controllers/SinhVienController.php';
require_once 'controllers/HocPhanController.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

$database = new Database();
$conn = $database->getConnection();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'sinhvien';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'sinhvien':
        $controller = new SinhVienController();
        if ($action == 'index') $controller->index();
        elseif ($action == 'create') $controller->create();
        elseif ($action == 'edit') $controller->edit($_GET['MaSV']);
        elseif ($action == 'delete') $controller->delete($_GET['MaSV']);
        elseif ($action == 'details') $controller->details($_GET['MaSV']);
        break;
}
?>