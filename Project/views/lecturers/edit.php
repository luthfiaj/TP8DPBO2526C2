<!-- views/lecturers/create.php -->
<?php require_once "views/layout/header.php"; ?>
<div class="col-lg-6 m-auto">
  <form method="post">
    <div class="card">
      <div class="card-header bg-primary text-white text-center">
        <h3>Create Lecturer</h3>
      </div>
      <div class="card-body">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control mb-3" required>

        <label class="form-label">NIDN</label>
        <input type="text" name="nidn" class="form-control mb-3" required>

        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control mb-3" required>

        <label class="form-label">Department</label>
        <input type="text" name="department" value="Ilmu Komputer" class="form-control mb-3" required>

        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control mb-3" required>

        <label class="form-label">Join Date</label>
        <input type="date" name="join_date" class="form-control mb-3" required>

        <label class="form-label">Status</label>
        <select name="status" class="form-select mb-3" required>
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>

        <button class="btn btn-success" type="submit">Submit</button>
        <a class="btn btn-secondary" href="index.php?controller=lecturer&action=index">Cancel</a>
      </div>
    </div>
  </form>
</div>
<?php require_once "views/layout/footer.php"; ?>