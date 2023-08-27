<?php
include '../config/database.php';

$query = mysqli_query($conn, "SELECT * FROM users JOIN jabatan ON users.jabatan=jabatan.id_jabatan");

?>

<div class="container">


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Input Penilaian</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="5%">No.</th>
              <th width="20%">Nama</th>
              <th width="20%">NIP</th>
              <th>Jabatan</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($query as $q) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $q['nama']; ?></td>
                <td><?= $q['nip']; ?></td>
                <td><?= $q['jabatan']; ?></td>
                <td class="text-center">
                  <a href="index.php?page=input-nilai&&id=<?= $q['id_users']; ?>" class="btn btn-sm rounded btn-primary"><i class="nav-icon fas fa-plus"></i> Input Nilai</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>