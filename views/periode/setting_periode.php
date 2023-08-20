<?php
include '../config/database.php';

$id = $_GET['id'];
$periode = mysqli_query($conn, "SELECT * FROM periode WHERE id_periode='$id'");

?>

<div class="container">
  <div class="card card-shadow-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Setting Periode</h5>
    </div>
    <div class="card-body">
      <form action="../views/periode/func/update_periode.php" method="POST">
        <?php foreach ($periode as $p) : ?>
          <div class="row">
            <input type="text" name="id_periode" value="<?= $id; ?>" hidden>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="periode">Periode</label>
                <input type="text" class="form-control" name="tahun" value="<?= $p['tahun']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="custom-select">
                  <option value="<?= $p['status']; ?>" selected><?php if ($p['status'] == 1) { ?>
                      <a class="badge badge-lg badge-success text-white">Aktif</a>
                    <?php } else if ($p['status'] != 1) { ?>
                      <a class="badge badge-lg badge-danger text-white">Tidak Aktif</a>
                    <?php } ?>
                  </option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
      </form>
    </div>
  </div>
</div