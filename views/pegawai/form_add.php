<?php
include '../config/database.php';

$query = mysqli_query($conn, "SELECT * FROM jabatan");

?>

<div class="container">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-wight-bold text-primary">Tambah Data Pegawai</h6>
    </div>
    <div class="card-body">
      <form method="POST" action="../views/pegawai/func/add.php">
        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="text" class="form-control" id="nip" name="nip">
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
          <label for="jabatan">Jabatan</label>
          <select class="custom-select" name="jabatan" id="jabatan" required>
            <?php foreach ($query as $q) : ?>
              <option value="<?= $q['id_jabatan']; ?>"><?= $q['jabatan']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>