<?php
require_once "models/Course.php";
require_once "models/Lecturer.php";

class CourseController
{
    private $courseModel;
    private $lecturerModel;

    public function __construct($db)
    {
        $this->courseModel = new Course($db);
        $this->lecturerModel = new Lecturer($db);
    }

    public function index()
    {
        $courses = $this->courseModel->getAllWithLecturer();
        require_once "views/courses/index.php";
    }

    public function create()
    {
        $lecturers = $this->lecturerModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->courseModel->create([
                'course_code' => $_POST['course_code'],
                'course_name' => $_POST['course_name'],
                'credits'      => (int)$_POST['credits'],
                'semester'    => $_POST['semester'],
                'lecturer_id' => (int)$_POST['lecturer_id'],
            ]);
            header("Location: index.php?controller=course&action=index");
            exit;
        }
        require_once "views/courses/create.php";
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $course = $this->courseModel->getById($id);
        if (!$course) {
            header("Location: index.php?controller=course&action=index");
            exit;
        }
        $lecturers = $this->lecturerModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->courseModel->update($id, [
                'course_code' => $_POST['course_code'],
                'course_name' => $_POST['course_name'],
                'credits'      => (int)$_POST['credits'],
                'semester'    => $_POST['semester'],
                'lecturer_id' => (int)$_POST['lecturer_id'],
            ]);
            header("Location: index.php?controller=course&action=index");
            exit;
        }
        require_once "views/courses/edit.php";
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->courseModel->delete((int)$_GET['id']);
        }
        header("Location: index.php?controller=course&action=index");
        exit;
    }
}