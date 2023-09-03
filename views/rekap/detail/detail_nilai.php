<?php

include '../config/database.php';

$id = $_GET['id'];
// var_dump($id);
$query = mysqli_query($conn, "SELECT * FROM detail_nilai JOIN users ON detail_nilai.id_user=users.id_users LEFT JOIN jabatan ON users.jabatan=jabatan.id_jabatan JOIN kriteria ON detail_nilai.id_kriteria=kriteria.id_kriteria JOIN periode ON detail_nilai.id_periode=periode.id_periode WHERE id_users='$id'");
$n = mysqli_fetch_array($query);
$total = mysqli_query($conn, "SELECT * FROM penilaian WHERE id_user='$id'");
$t = mysqli_fetch_array($total);

?>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Input Penilaian</h5>
    </div>
    <div class="card-body">
      <form action="../views/penilaian/func/hitung_nilai.php" method="post">
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-6">
            <input type="text" id="" value="<?= @$n['nama']; ?>" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Jabatan</label>
          <div class="col-sm-6">
            <input type="text" id="" value="<?= @$n['jabatan']; ?>" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label for="periode" class="col-sm-2 col-form-label">Periode</label>
          <div class="col-sm-6">
            <input type="text" id="" value="<?= @$n['tahun']; ?>" disabled>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th width="2%">No.</th>
                <th width="5%">Indikator Penilaian</th>
                <th width="15%">1</th>
                <th width="15%">2</th>
                <th width="15%">3</th>
                <th width="15%">4</th>
                <th width="10%">Input Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($query as $q) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $q['kriteria']; ?></td>
                  <td><?= $q['nilai_1']; ?></td>
                  <td><?= $q['nilai_2']; ?></td>
                  <td><?= $q['nilai_3']; ?></td>
                  <td><?= $q['nilai_4']; ?></td>
                  <td class="text-center"><?= $q['nilai']; ?></td>
                </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="6" class="text-center font-weight-bold">Total</td>
                <td class="text-center"><?= @$t['nilai']; ?></td>
              </tr>
              <tr>
                <td colspan="6" class="text-center font-weight-bold">Nilai Akhir</td>
                <td class="text-center"><?= @$t['nilai_akhir']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <a href="index.php?page=rekap-nilai" class="btn btn-md btn-danger rounded">Close</a>
      </form>
    </div>
  </div>
</div>