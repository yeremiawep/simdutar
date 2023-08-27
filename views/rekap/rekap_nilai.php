<?php
include '../config/database.php';

$query = mysqli_query($conn, "SELECT * FROM penilaian JOIN users ON penilaian.id_user=users.id_users JOIN periode ON penilaian.periode=periode.id_periode LEFT JOIN jabatan ON users.jabatan=jabatan.id_jabatan");

?>

<div class="container">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Rekap Nilai</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Total Nilai</th>
              <th>Nilai Akhir</th>
              <th>Tahun</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($query as $q) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $q['nama']; ?></td>
                <td><?= $q['jabatan']; ?></td>
                <td><?= $q['nilai']; ?></td>
                <td><?= $q['nilai_akhir']; ?></td>
                <td><?= $q['tahun']; ?></td>
                <td class="text-center">
                  <a href="index.php?page=detail-nilai&&id=<?= $q['id_nilai']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i> Detail</a>
                  <button class="btn btn-sm btn-danger" onClick="hapusData(<?= $q['id_nilai']; ?>)"><i class="fas fa-fw fa-trash"></i> Delete</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function hapusData(data_id) {
    // alert('Yakin Hapus ?');
    // window.location=("../views/delete/delete_data_pegawai.php?id="+data_id);
    Swal.fire({
      title: 'Are you sure ?',
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Yes',
      denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location = ("../views/rekap/func/delete.php?id=" + data_id);
        // Swal.fire('Saved!', '', 'success')
      }
    })
  }
</script>
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