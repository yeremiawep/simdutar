<ul class="navbar-nav ml-auto">
  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
  </li>
  <div class="topbar-divider d-none d-sm-block"></div>
  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small">
        <?= $_SESSION['user'] . '<br>' . $_SESSION['jabatan']; ?>
      </span>
      <img class="img-profile rounded-circle" src="../app/img/ava.jpg">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <!-- <a class="dropdown-item" href="#">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
      </a>
      <a class="dropdown-item" href="#">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Settings
      </a>
      <div class="dropdown-divider"></div> -->
      <!-- <a class="dropdown-item" onclick="logout()">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a> -->
      <button class="btn btn-sm btn-block" onClick="logout()"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</button>
    </div>
  </li>
</ul>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function logout() {
    // alert('Yakin Hapus ?');
    // window.location=("../views/delete/delete_data_pegawai.php?id="+data_id);
    Swal.fire({
      title: 'Anda Yakin ?',
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Yes',
      denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location = ("../config/logout.php");
        // Swal.fire('Saved!', '', 'success')
      }
    })
  }
</script>