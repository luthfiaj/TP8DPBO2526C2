<?php
require_once "models/Schedule.php";
require_once "models/Course.php";
require_once "models/Lecturer.php";

class ScheduleController
{
    private $scheduleModel;
    private $courseModel;
    private $lecturerModel;

    public function __construct($db)
    {
        $this->scheduleModel = new Schedule($db);
        $this->courseModel = new Course($db);
        $this->lecturerModel = new Lecturer($db);
    }

    public function index()
    {
        $schedules = $this->scheduleModel->getAllWithDetails();
        require_once "views/schedules/index.php";
    }

    public function create()
    {
        $courses = $this->courseModel->getAllWithLecturer();
        $lecturers = $this->lecturerModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->scheduleModel->create([
                'course_id'   => (int)$_POST['course_id'],
                'lecturer_id' => (int)$_POST['lecturer_id'],
                'day_of_week' => $_POST['day_of_week'],
                'start_time'  => $_POST['start_time'],
                'end_time'    => $_POST['end_time'],
                'room'        => $_POST['room'],
            ]);
            header("Location: index.php?controller=schedule&action=index");
            exit;
        }
        require_once "views/schedules/create.php";
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $schedule = $this->scheduleModel->getById($id);
        if (!$schedule) {
            header("Location: index.php?controller=schedule&action=index");
            exit;
        }
        $courses = $this->courseModel->getAllWithLecturer();
        $lecturers = $this->lecturerModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->scheduleModel->update($id, [
                'course_id'   => (int)$_POST['course_id'],
                'lecturer_id' => (int)$_POST['lecturer_id'],
                'day_of_week' => $_POST['day_of_week'],
                'start_time'  => $_POST['start_time'],
                'end_time'    => $_POST['end_time'],
                'room'        => $_POST['room'],
            ]);
            header("Location: index.php?controller=schedule&action=index");
            exit;
        }
        require_once "views/schedules/edit.php";
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->scheduleModel->delete((int)$_GET['id']);
        }
        header("Location: index.php?controller=schedule&action=index");
        exit;
    }
}