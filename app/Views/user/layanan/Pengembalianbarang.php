<?=$this->extend('user/template/index')?>
<?=$this->section('page-content')?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
            <li class="breadcrumb-item">Pengembalian Barang</li>
        </ol>
    </nav>
    

<!-- tabel -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Pengembalian Barang</h6>

        <a href="riwayatprint" target="_blank" class="btn btn-info btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                </span>
                <span class="text">Print Laporan</span>
            </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <!-- menu cari -->
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="dataTable_length">
                            <label> Show
                                <select name ="dataTable_length" aria-controls="dataTable" class="custom-select-sm from-control from-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6 text-right">
                    <div id="dataTable_filter" class="dataTable_filter">
                        <label>
                            Pencarian:
                            <input type="search" class="from-control from-control-sm" placeholder aria-controls="dataTable">
                        </label>
                    </div> 
                </div> 
            </div>

                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal meminjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status Peminjaman</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr class="text-center">
                        <td>1</td>
                        <td>Dinda Putri</td>
                        <td>KMB001</td>
                        <td>Phantom Full Body Multipurpose</td>
                        <td>15-03-2024</td>
                        <td>17-03-2024</td>
                        <td><a class="btn btn-success btn-sm">Telah Kembali</a></td>
                        
                    </tr>
                    <tr class="text-center">
                        <td>2</td>
                        <td>Dinda Putri</td>
                        <td>KA001</td>
                        <td>Termos/Vaksin Carrier</td>
                        <td>15-03-2024</td>
                        <td>17-03-2024</td>
                        <td><a class="btn btn-danger btn-sm">Terlambat</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->

<?=$this->endSection()?>