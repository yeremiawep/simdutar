<?php
include '../config/database.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM users JOIN jabatan ON users.jabatan=jabatan.id_jabatan WHERE id_users=$id");
$jab = mysqli_query($conn, "SELECT * FROM jabatan");
$q = mysqli_fetch_array($query);

?>

<div class="container">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-wight-bold text-primary">Edit Data Pegawai</h6>
    </div>
    <div class="card-body">
      <form method="POST" action="../views/pegawai/func/update.php">
        <input type="hidden" name="id_users" value="<?= $_GET['id']; ?>">
        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="text" class="form-control" id="nip" name="nip" value="<?= $q['nip']; ?>">
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= $q['nama']; ?>">
        </div>
        <div class="form-group">
          <label for="jabatan">Jabatan</label>
          <select class="custom-select" name="jabatan" id="jabatan" required>
            <option selected="<?= $q['jabatan']; ?>"><?= $q['jabatan']; ?></option>
            <?php foreach ($jab as $j) : ?>
              <option value="<?= $j['jabatan']; ?>"><?= $j['jabatan']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="<?= $q['password']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit Change</button>
      </form>
    </div>
  </div>
</div>