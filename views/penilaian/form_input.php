<?php
include '../config/database.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM kriteria");
$nama = mysqli_query($conn, "SELECT * FROM users WHERE id_users='$id'");
$n = mysqli_fetch_array($nama);
$periode = mysqli_query($conn, "SELECT * FROM periode");
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
            <input type="text" id="" value="<?= $n['nama']; ?>" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Jabatan</label>
          <div class="col-sm-6">
            <input type="text" id="" value="<?= $n['jabatan']; ?>" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label for="periode" class="col-sm-2 col-form-label">Periode</label>
          <div class="col-sm-4">
            <select name="periode" id="periode" class="form-select rounded col-4 text-center" required>
              <option selected disabled value="">--</option>
              <?php foreach ($periode as $p) : ?>
                <option value="<?= $p['id_periode']; ?>" <?= $p['status'] == '0' ? 'disabled' : '' ?>><?= $p['tahun']; ?></option>
              <?php endforeach; ?>
            </select>
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
                  <td>
                    <input type="text" name="id_user[]" id="id_user[]" value="<?= $id; ?>" hidden>
                    <?= $no++; ?>
                  </td>
                  <td><?= $q['kriteria']; ?></td>
                  <td><?= $q['nilai_1']; ?></td>
                  <td><?= $q['nilai_2']; ?></td>
                  <td><?= $q['nilai_3']; ?></td>
                  <td><?= $q['nilai_4']; ?></td>
                  <td class="text-center">
                    <select name="nilai[]" id="nilai[]" class="form-select rounded" required>
                      <option selected disabled value="">--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </form>
    </div>
  </div>
</div>