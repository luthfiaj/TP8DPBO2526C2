<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Akademik MVC</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?controller=lecturer&action=index">TP MVC 25</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=lecturer&action=index">Lecturers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=course&action=index">Courses (CRUD Baru)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=schedule&action=index">Schedules (CRUD Baru)</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container my-4">