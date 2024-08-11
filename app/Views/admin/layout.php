<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab Fkes</title>
  <link href="<?= base_url('/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">Lab Fkes</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">



      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href=<?= ('/admin'); ?>>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventarisir" aria-expanded="true" aria-controls="collapseInventarisir">
          <i class="fas fa-fw fa-folder"></i>
          <span>Inventarisir</span>
        </a>
        <div id="collapseInventarisir" class="collapse" aria-labelledby="headingInventarisir" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href=<?= site_url('admin/barang'); ?>>Data Barang</a>
            <!-- <a class="collapse-item" href=<?= base_url('barangkeluar'); ?>>Barang keluar</a> -->
            <a class="collapse-item" href=<?= base_url('stokbarang'); ?>>Stok Barang</a>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href=<?= site_url('admin/prasats'); ?>>
          <i class="fas fa-medkit contact__icon"></i>
          <span>Prasat</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href=<?= site_url('admin/peminjaman'); ?>>
          <i class="fas fa-box contact__icon"></i>
          <span>Data Peminjaman</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href=<?= base_url('admin/manajemenuser'); ?>>
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Manajemen User</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href=<?= base_url('admin/riwayatpeminjaman'); ?>>
          <i class="fas fa-fw fa-clock"></i>
          <span>Riwayat Peminjaman</span></a>
      </li>

      <!-- <li class="nav-item">
                <a class="nav-link" href=<?= base_url('laporan'); ?>>
                    <i class="fas fa-fw fa-file"></i>
                    <span>Laporan</span></a>
            </li> -->

      <!-- <li class="nav-item">
                <a class="nav-link" href=<?= base_url('kontak'); ?>>
                    <i class="fas fa-fw fa-phone"></i>
                    <span>Kontak</span></a>
            </li> -->

      <li class="nav-item">
        <a class="nav-link" href=<?= site_url('auth/logout'); ?>>
          <i class="fas fa-fw fa-arrow-right"></i>
          <span>Keluar</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi, <?= userLogin()->name_user ?></span>
              <img class="img-profile rounded-circle" src="<?= base_url('img/Sarah.png') ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href=<?= ('admin/profile'); ?>>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= site_url('auth/logout') ?>" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Keluar
              </a>
            </div>
          </li>

        </ul>

      </nav>


      <?= $this->renderSection('bodycontent'); ?>


      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ruhu dan Sarah</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div><!-- End of Content Wrapper -->
  </div><!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">tekan "Keluar" jika anda ingin mengakhiri kegiatan.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href=<?= site_url('auth/logout'); ?>>Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
  <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>

</body>

</html>
