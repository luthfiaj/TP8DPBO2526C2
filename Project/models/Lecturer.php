<?php
class Lecturer
{
    private $conn;
    private $table = "lecturers";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
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
            "INSERT INTO {$this->table} (name, nidn, email, department, phone, join_date, status) VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "sssssss",
            $data['name'],
            $data['nidn'],
            $data['email'],
            $data['department'],
            $data['phone'],
            $data['join_date'],
            $data['status']
        );
        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare(
            "UPDATE {$this->table} SET name = ?, nidn = ?, email = ?, department = ?, phone = ?, join_date = ?, status = ? WHERE id = ?"
        );
        $stmt->bind_param(
            "sssssssi",
            $data['name'],
            $data['nidn'],
            $data['email'],
            $data['department'],
            $data['phone'],
            $data['join_date'],
            $data['status'],
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