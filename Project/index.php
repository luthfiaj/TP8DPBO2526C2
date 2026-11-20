<?php
require_once "config/Database.php";

$database = new Database();
$db = $database->conn;

$controller = isset($_GET['controller']) ? strtolower($_GET['controller']) : 'lecturer';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'lecturer':
        require_once "controllers/LecturerController.php";
        $ctrl = new LecturerController($db);
        break;
    case 'course':
        require_once "controllers/CourseController.php";
        $ctrl = new CourseController($db);
        break;
    case 'schedule':
        require_once "controllers/ScheduleController.php";
        $ctrl = new ScheduleController($db);
        break;
    default:
        require_once "controllers/LecturerController.php";
        $ctrl = new LecturerController($db);
        $action = 'index';
        break;
}

if (method_exists($ctrl, $action)) {
    $ctrl->$action();
} else {
    $ctrl->index();
}