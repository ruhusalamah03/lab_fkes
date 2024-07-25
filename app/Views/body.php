<?=$this->extend('layout')?>
<?=$this->section('bodycontent')?>


            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-4">
                                        <a href="<?=site_url('barang');?>">
                                            <div class="h5 mb-0 font-weight-bold text-primary text-uppercase">
                                                Data Barang</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-4">
                                        <a href="<?=site_url('prasats');?>">
                                            <div class="h5 mb-0 font-weight-bold text-info text-uppercase">
                                                Prasat</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-medkit fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-4">
                                        <a href=<?=site_url('informasi');?>>
                                            <div class="h5 mb-0 font-weight-bold text-warning text-uppercase" >
                                                informasi</div>
                                        </div>
                                        <div class="col-auto" >
                                            <i class="fas fa-newspaper fa-2x text-gray-300" ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Lab Keperawatan Universitas Muhammadiyah Sukabumi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                    <img src="<?= base_url('img/leb.jpeg') ?>" alt="Logo2" class="img-fluid your-custom-logo ml-3"style="width: 25rem;">
                                    </div>
                                    <p><a>Fakultas kesehatan yaitu salah satu dari 7 fakultas yang ada di universitas Muhammadiyah Sukabumi,memiliki Leb Kesehatan
                                         yang baik.Laboratorium kesehatan adalah fasilitas yang dirancang untuk menunjang kegiatan mahasiswa </a></p>
                                    <a target="_blank" rel="nofollow" href="https://ummi.ac.id/id/fakultas/kesehatan">Lihat Lebih Rinci &rarr;</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?=$this->endSection()?>