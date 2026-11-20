<?php
class Course
{
    private $conn;
    private $table = "courses";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllWithLecturer()
    {
        $sql = "SELECT c.*, l.name AS lecturer_name, l.nidn
                FROM {$this->table} c
                JOIN lecturers l ON c.lecturer_id = l.id
                ORDER BY c.id DESC";
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
            "INSERT INTO {$this->table} (course_code, course_name, credits, semester, lecturer_id) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "ssisi",
            $data['course_code'],
            $data['course_name'],
            $data['credits'],
            $data['semester'],
            $data['lecturer_id']
        );
        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare(
            "UPDATE {$this->table} SET course_code = ?, course_name = ?, credits = ?, semester = ?, lecturer_id = ? WHERE id = ?"
        );
        $stmt->bind_param(
            "ssiiii",
            $data['course_code'],
            $data['course_name'],
            $data['credits'],
            $data['semester'],
            $data['lecturer_id'],
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