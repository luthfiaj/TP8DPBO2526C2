<?php require_once "views/layout/header.php"; ?>
<div class="col-lg-6 m-auto">
  <form method="post">
    <div class="card">
      <div class="card-header bg-warning text-dark text-center">
        <h3>Edit Mata Kuliah</h3>
      </div>
      <div class="card-body">
        <label class="form-label">Kode Mata Kuliah</label>
        <input type="text" name="course_code" value="<?= htmlspecialchars($course['course_code']) ?>" class="form-control mb-3" required>

        <label class="form-label">Nama Mata Kuliah</label>
        <input type="text" name="course_name" value="<?= htmlspecialchars($course['course_name']) ?>" class="form-control mb-3" required>

        <label class="form-label">SKS</label>
        <input type="number" name="credits" min="1" max="6" value="<?= htmlspecialchars($course['credits']) ?>" class="form-control mb-3" required>

        <label class="form-label">Semester</label>
        <input type="text" name="semester" value="<?= htmlspecialchars($course['semester']) ?>" class="form-control mb-3" required>

        <label class="form-label">Dosen Pengampu</label>
        <select name="lecturer_id" class="form-select mb-3" required>
          <?php while ($l = $lecturers->fetch_assoc()): ?>
            <option value="<?= $l['id'] ?>" <?= $l['id'] == $course['lecturer_id'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($l['name']) ?> (<?= htmlspecialchars($l['nidn']) ?>)
            </option>
          <?php endwhile; ?>
        </select>

        <button class="btn btn-success" type="submit">Update</button>
        <a class="btn btn-secondary" href="index.php?controller=course&action=index">Cancel</a>
      </div>
    </div>
  </form>
</div>
<?php require_once "views/layout/footer.php"; ?>