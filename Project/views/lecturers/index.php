<!-- views/lecturers/index.php -->
<?php require_once "views/layout/header.php"; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Daftar Dosen (Lecturers)</h2>
  <a class="btn btn-primary" href="index.php?controller=lecturer&action=create">+ Add Lecturer</a>
</div>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>NIDN</th>
      <th>Email</th>
      <th>Department</th>
      <th>Phone</th>
      <th>Join Date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $lecturers->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['id']) ?></td>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['nidn']) ?></td>
      <td><?= htmlspecialchars($row['email']) ?></td>
      <td><?= htmlspecialchars($row['department']) ?></td>
      <td><?= htmlspecialchars($row['phone']) ?></td>
      <td><?= htmlspecialchars($row['join_date']) ?></td>
      <td><?= htmlspecialchars($row['status']) ?></td>
      <td>
        <a class="btn btn-sm btn-success" href="index.php?controller=lecturer&action=edit&id=<?= $row['id'] ?>">Edit</a>
        <a class="btn btn-sm btn-danger" href="index.php?controller=lecturer&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus dosen ini?')">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<?php require_once "views/layout/footer.php"; ?>