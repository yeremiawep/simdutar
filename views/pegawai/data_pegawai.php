<?php
include '../config/database.php';

$query = mysqli_query($conn, "SELECT * FROM users");

?>

<div class="container-fluid">


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Data Pegawai</h5>
    </div>
    <div class="card-body">
      <a href="index.php?page=add-pegawai" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Add Pegawai</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>NIP</th>
              <th>Jabatan</th>
              <th>Action</th>
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
                <td>
                  <a href="index.php?page=edit-pegawai&&id=<?= $q['id_users']; ?>" class="badge badge-sm badge-primary">Edit</a>
                  <a href="../views/pegawai/func/delete.php?id=<?= $q['id_users']; ?>" class="badge badge-sm badge-danger" onclick="alert('Anda Yakin ?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>