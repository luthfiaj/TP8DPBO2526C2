CREATE DATABASE IF NOT EXISTS `tp_mvc25` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tp_mvc25`;

-- Tabel 1: lecturers (sudah ditambah atribut email, department, status)
CREATE TABLE IF NOT EXISTS `lecturers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `nidn` VARCHAR(30) NOT NULL UNIQUE,
  `email` VARCHAR(100) NOT NULL,
  `department` VARCHAR(80) NOT NULL DEFAULT 'Ilmu Komputer',
  `phone` VARCHAR(20) NOT NULL,
  `join_date` DATE NOT NULL,
  `status` ENUM('Active', 'Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel 2: courses (tabel baru 1 - berelasi dengan lecturers)
CREATE TABLE IF NOT EXISTS `courses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `course_code` VARCHAR(20) NOT NULL UNIQUE,
  `course_name` VARCHAR(120) NOT NULL,
  `credits` INT(2) NOT NULL DEFAULT 3,
  `semester` VARCHAR(20) NOT NULL,
  `lecturer_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_courses_lecturer` (`lecturer_id`),
  CONSTRAINT `fk_courses_lecturer` FOREIGN KEY (`lecturer_id`)
    REFERENCES `lecturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel 3: teaching_schedules (tabel baru 2 - berelasi dengan courses & lecturers)
CREATE TABLE IF NOT EXISTS `teaching_schedules` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `course_id` INT(11) NOT NULL,
  `lecturer_id` INT(11) NOT NULL,
  `day_of_week` ENUM('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu') NOT NULL,
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  `room` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_schedules_course` (`course_id`),
  KEY `fk_schedules_lecturer` (`lecturer_id`),
  CONSTRAINT `fk_schedules_course` FOREIGN KEY (`course_id`)
    REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_schedules_lecturer` FOREIGN KEY (`lecturer_id`)
    REFERENCES `lecturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data awal (Seed)
INSERT INTO `lecturers` (`name`, `nidn`, `email`, `department`, `phone`, `join_date`, `status`) VALUES
('Dr. Budi Santoso, M.Kom.', '0412058801', 'budi.santoso@kampus.ac.id', 'Ilmu Komputer', '081234567890', '2020-02-01', 'Active'),
('Siti Rahmawati, M.T.', '0425099102', 'siti.rahmawati@kampus.ac.id', 'Pendidikan Ilmu Komputer', '081398765432', '2022-08-15', 'Active');

INSERT INTO `courses` (`course_code`, `course_name`, `credits`, `semester`, `lecturer_id`) VALUES
('CS101', 'Pemrograman Web & MVC', 3, 'Ganjil 2026/2027', 1),
('CS204', 'Basis Data Lanjut', 4, 'Ganjil 2026/2027', 2);

INSERT INTO `teaching_schedules` (`course_id`, `lecturer_id`, `day_of_week`, `start_time`, `end_time`, `room`) VALUES
(1, 1, 'Senin', '08:00:00', '10:30:00', 'Lab RPL 2'),
(2, 2, 'Rabu', '13:00:00', '16:20:00', 'Ruang 304');