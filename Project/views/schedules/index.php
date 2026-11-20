<?php require_once "views/layout/header.php"; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Jadwal Mengajar (Teaching Schedules)</h2>
  <a class="btn btn-primary" href="index.php?controller=schedule&action=create">+ Add Schedule</a>
</div>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Mata Kuliah</th>
      <th>Dosen</th>
      <th>Hari</th>
      <th>Jam</th>
      <th>Ruangan</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $schedules->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['id']) ?></td>
      <td><?= htmlspecialchars($row['course_code']) ?> - <?= htmlspecialchars($row['course_name']) ?></td>
      <td><?= htmlspecialchars($row['lecturer_name']) ?></td>
      <td><?= htmlspecialchars($row['day_of_week']) ?></td>
      <td><?= htmlspecialchars(substr($row['start_time'], 0, 5)) ?> - <?= htmlspecialchars(substr($row['end_time'], 0, 5)) ?></td>
      <td><?= htmlspecialchars($row['room']) ?></td>
      <td>
        <a class="btn btn-sm btn-success" href="index.php?controller=schedule&action=edit&id=<?= $row['id'] ?>">Edit</a>
        <a class="btn btn-sm btn-danger" href="index.php?controller=schedule&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus jadwal ini?')">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<?php require_once "views/layout/footer.php"; ?>