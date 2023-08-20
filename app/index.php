<!DOCTYPE html>
<html lang="en">

<?php include '../template/header.php'; ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include '../template/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <?php include '../template/navbar.php'; ?>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <?php
            if (isset($_GET['page'])) {
              $hal = $_GET['page'];

              switch ($hal) {

                  // dashboard
                case 'dashboard':
                  include '../template/dashboard.php';
                  break;

                  //pegawai
                case 'data-pegawai':
                  include '../views/pegawai/data_pegawai.php';
                  break;
                case 'add-pegawai':
                  include '../views/pegawai/form_add.php';
                  break;
                case 'edit-pegawai':
                  include '../views/pegawai/form_edit.php';
                  break;

                  // jabatan
                case 'data-jabatan':
                  include '../views/jabatan/data_jabatan.php';
                  break;

                  // periode
                case 'periode':
                  include '../views/periode/periode.php';
                  break;
                case 'setting-periode':
                  include '../views/periode/setting_periode.php';
                  break;

                  // kriteria
                case 'kriteria':
                  include '../views/kriteria/kriteria.php';
                  break;
              }
            }

            ?>

          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- End of Footer -->
  </div>
  <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <?php include '../template/footer.php'; ?>


</body>

</html>