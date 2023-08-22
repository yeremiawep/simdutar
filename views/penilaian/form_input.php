<?php
include '../config/database.php';

$query = mysqli_query($conn, "SELECT * FROM kriteria");

?>

<div class="container-fluid">


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Input Penilaian</h5>
    </div>
    <div class="card-body">
      <form action="../views/penilaian/func/hitung_nilai.php" method="post">
        <div class="input-group mb-3 col-lg-6">
          <div class="input-group-prepend">
            <span class="input-group-text">Nama</span>
          </div>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 col-lg-6">
          <div class="input-group-prepend">
            <span class="input-group-text">Jabatan</span>
          </div>
          <input type="text" class="form-control" placeholder="Jabatan" aria-label="Jabatan" aria-describedby="basic-addon1">
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