<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href=<?=('user');?>>
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Inventarisir Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventarisir"
                    aria-expanded="true" aria-controls="collapseInventarisir">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Inventarisir</span>
                </a>
                <div id="collapseInventarisir" class="collapse" aria-labelledby="headingInventarisir" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <a class="collapse-item" href=<?=('barangmasuk');?>>Barang Masuk</a>
                        <a class="collapse-item" href=<?=('barangkeluar');?>>Barang Keluar</a> -->
                        <a class="collapse-item" href=<?=('databarang');?>>Data Barang</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Prasat Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePrasat"
                    aria-expanded="true" aria-controls="collapsePrasat">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Prasat</span>
                </a>
            </li>

            <!-- Nav Item - Layanan Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayanan"
                    aria-expanded="true" aria-controls="collapseLayanan">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Layanan Laboratorium</span>
                </a>
                <div id="collapseLayanan" class="collapse" aria-labelledby="headingLayanan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <a class="collapse-item" href=<?=('pengembalian');?>>Pengembalian</a> -->
                        <a class="collapse-item" href=<?=('peminjaman');?>>Peminjaman</a>
                        <a class="collapse-item" href=<?=('laporan');?>>Laporan</a>
                </div>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href=<?=('antrianpeminjaman');?>>
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Antrian Peminjaman</span></a>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href=<?=('riwayatpeminjaman');?>>
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Riwayat Peminjaman</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=<?=('kontak');?>>
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Kontak</span></a>
            </li>

            <!-- Nav Item - Pengaturan Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting"
                    aria-expanded="true" aria-controls="collapseSetting">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapseSetting" class="collapse" aria-labelledby="headingSetting" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href=<?=('Profil');?>>Profil</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=<?=('keluar');?>>
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