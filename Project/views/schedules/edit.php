<?php require_once "views/layout/header.php"; ?>
<div class="col-lg-6 m-auto">
  <form method="post">
    <div class="card">
      <div class="card-header bg-warning text-dark text-center">
        <h3>Edit Jadwal Mengajar</h3>
      </div>
      <div class="card-body">
        <label class="form-label">Mata Kuliah</label>
        <select name="course_id" class="form-select mb-3" required>
          <?php while ($c = $courses->fetch_assoc()): ?>
            <option value="<?= $c['id'] ?>" <?= $c['id'] == $schedule['course_id'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($c['course_code']) ?> - <?= htmlspecialchars($c['course_name']) ?>
            </option>
          <?php endwhile; ?>
        </select>

        <label class="form-label">Dosen</label>
        <select name="lecturer_id" class="form-select mb-3" required>
          <?php while ($l = $lecturers->fetch_assoc()): ?>
            <option value="<?= $l['id'] ?>" <?= $l['id'] == $schedule['lecturer_id'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($l['name']) ?>
            </option>
          <?php endwhile; ?>
        </select>

        <label class="form-label">Hari</label>
        <select name="day_of_week" class="form-select mb-3" required>
          <?php foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day): ?>
            <option value="<?= $day ?>" <?= $schedule['day_of_week'] == $day ? 'selected' : '' ?>><?= $day ?></option>
          <?php endforeach; ?>
        </select>

        <label class="form-label">Jam Mulai</label>
        <input type="time" name="start_time" value="<?= htmlspecialchars($schedule['start_time']) ?>" class="form-control mb-3" required>

        <label class="form-label">Jam Selesai</label>
        <input type="time" name="end_time" value="<?= htmlspecialchars($schedule['end_time']) ?>" class="form-control mb-3" required>

        <label class="form-label">Ruangan</label>
        <input type="text" name="room" value="<?= htmlspecialchars($schedule['room']) ?>" class="form-control mb-3" required>

        <button class="btn btn-success" type="submit">Update</button>
        <a class="btn btn-secondary" href="index.php?controller=schedule&action=index">Cancel</a>
      </div>
    </div>
  </form>
</div>
<?php require_once "views/layout/footer.php"; ?>