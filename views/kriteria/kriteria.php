<?php
include '../config/database.php';

$query = mysqli_query($conn, "SELECT * FROM kriteria");

?>

<div class="container-fluid">


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Kriteria Penilaian</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th width="20%">Indikator Penilaian</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
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
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>