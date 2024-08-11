<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-3">Lab Fkes</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href=<?= ('/user'); ?>>
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Beranda</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href=<?= base_url('user/prasats'); ?>>
      <i class="fas fa-medkit contact__icon"></i>
      <span>Prasat</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href=<?= base_url('user/peminjaman'); ?>>
      <i class="fas fa-fw fa-box"></i>
      <span>Peminjaman Barang</span></a>
  </li>

  <!-- Nav Item - Pengaturan Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pengaturan</span>
    </a>
    <div id="collapseSetting" class="collapse" aria-labelledby="headingSetting" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <!-- <a class="collapse-item" href=<?= base_url('user/profile'); ?>>Profile</a> -->
        <a class="collapse-item" href=<?= base_url('user/informasi'); ?>>Informasi</a>
        <a class="collapse-item" href=<?= base_url('user/kontak'); ?>>Kontak</a>
      </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= site_url('auth/logout') ?>">
      <i class="fas fa-fw fa-arrow-right"></i>
      <span>Keluar</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
