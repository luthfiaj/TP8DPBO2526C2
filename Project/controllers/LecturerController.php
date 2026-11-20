<?php
require_once "models/Lecturer.php";

class LecturerController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new Lecturer($db);
    }

    public function index()
    {
        $lecturers = $this->model->getAll();
        require_once "views/lecturers/index.php";
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create([
                'name'       => $_POST['name'],
                'nidn'       => $_POST['nidn'],
                'email'      => $_POST['email'],
                'department' => $_POST['department'],
                'phone'      => $_POST['phone'],
                'join_date'  => $_POST['join_date'],
                'status'     => $_POST['status'],
            ]);
            header("Location: index.php?controller=lecturer&action=index");
            exit;
        }
        require_once "views/lecturers/create.php";
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $lecturer = $this->model->getById($id);
        if (!$lecturer) {
            header("Location: index.php?controller=lecturer&action=index");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, [
                'name'       => $_POST['name'],
                'nidn'       => $_POST['nidn'],
                'email'      => $_POST['email'],
                'department' => $_POST['department'],
                'phone'      => $_POST['phone'],
                'join_date'  => $_POST['join_date'],
                'status'     => $_POST['status'],
            ]);
            header("Location: index.php?controller=lecturer&action=index");
            exit;
        }
        require_once "views/lecturers/edit.php";
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->model->delete((int)$_GET['id']);
        }
        header("Location: index.php?controller=lecturer&action=index");
        exit;
    }
}