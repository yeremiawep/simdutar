<?php
include '../config/database.php';

$query = mysqli_query($conn, "SELECT * FROM periode");

?>

<div class="container">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Periode</h5>
    </div>
    <div class="card-body">
      <a href="index.php?page=add-pegawai" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPeriode"><i class=" fas fa-fw fa-plus"></i> Add Periode</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tahun</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($query as $q) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $q['tahun']; ?></td>
                <td>
                  <?php if ($q['status'] == 1) { ?>
                    <a class="badge badge-lg badge-success text-white">Aktif</a>
                  <?php } else if ($q['status'] != 1) { ?>
                    <a class="badge badge-lg badge-danger text-white">Tidak Aktif</a>
                  <?php } ?>
                </td>
                <td>
                  <a href="index.php?page=setting-periode&&id=<?= $q['id_periode']; ?>" class="badge badge-lg badge-primary"><i class="fas fa-cog"></i> Settings</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<!-- Modal Add Periode -->
<div class="modal fade" id="addPeriode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Periode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../views/periode/func/add_periode.php">
          <div class="form-group">
            <label for="exampleFormControlInput1">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- start nofit -->
<?php if (@$_SESSION['sukses']) { ?>
  <script>
    Swal.fire({
      text: "<?php echo $_SESSION['sukses']; ?>",
      icon: "success",
      customClass: {
        confirmButton: "btn fw-bold btn-primary",
        cancelButton: "btn fw-bold btn-active-light-primary"
      }
    })
  </script>
<?php unset($_SESSION['sukses']);
} ?>

<?php if (@$_SESSION['gagal']) { ?>
  <script>
    Swal.fire({
      text: "<?php echo $_SESSION['gagal']; ?>",
      icon: "error",
      customClass: {
        confirmButton: "btn fw-bold btn-primary",
        cancelButton: "btn fw-bold btn-active-light-primary"
      }
    })
  </script>
<?php unset($_SESSION['gagal']);
} ?>
<!-- end notif -->