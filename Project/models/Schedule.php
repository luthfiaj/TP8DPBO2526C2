<?php
class Schedule
{
    private $conn;
    private $table = "teaching_schedules";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllWithDetails()
    {
        $sql = "SELECT s.*, c.course_code, c.course_name, l.name AS lecturer_name
                FROM {$this->table} s
                JOIN courses c ON s.course_id = c.id
                JOIN lecturers l ON s.lecturer_id = l.id
                ORDER BY s.id DESC";
        return $this->conn->query($sql);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO {$this->table} (course_id, lecturer_id, day_of_week, start_time, end_time, room) VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "iissss",
            $data['course_id'],
            $data['lecturer_id'],
            $data['day_of_week'],
            $data['start_time'],
            $data['end_time'],
            $data['room']
        );
        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare(
            "UPDATE {$this->table} SET course_id = ?, lecturer_id = ?, day_of_week = ?, start_time = ?, end_time = ?, room = ? WHERE id = ?"
        );
        $stmt->bind_param(
            "iissssi",
            $data['course_id'],
            $data['lecturer_id'],
            $data['day_of_week'],
            $data['start_time'],
            $data['end_time'],
            $data['room'],
            $id
        );
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}