<?php require_once "views/layout/header.php"; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Daftar Mata Kuliah (Courses)</h2>
  <a class="btn btn-primary" href="index.php?controller=course&action=create">+ Add Course</a>
</div>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Kode</th>
      <th>Nama Mata Kuliah</th>
      <th>SKS</th>
      <th>Semester</th>
      <th>Dosen Pengampu</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $courses->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['id']) ?></td>
      <td><?= htmlspecialchars($row['course_code']) ?></td>
      <td><?= htmlspecialchars($row['course_name']) ?></td>
      <td><?= htmlspecialchars($row['credits']) ?></td>
      <td><?= htmlspecialchars($row['semester']) ?></td>
      <td><?= htmlspecialchars($row['lecturer_name']) ?> (<?= htmlspecialchars($row['nidn']) ?>)</td>
      <td>
        <a class="btn btn-sm btn-success" href="index.php?controller=course&action=edit&id=<?= $row['id'] ?>">Edit</a>
        <a class="btn btn-sm btn-danger" href="index.php?controller=course&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus mata kuliah ini?')">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<?php require_once "views/layout/footer.php"; ?>