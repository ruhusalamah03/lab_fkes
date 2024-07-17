<?=$this->extend('layout')?>
<?=$this->section('bodycontent')?>

<!-- Begin Page Content -->
<div class="container-fluid">
    

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> -->
<!-- tabel -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">data barang</h6>
        <button class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Tambah Data
        </button>
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
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi</th>
                        <th>Tahun Pembelian</th>
                        <th>Kategori</th>
                        <th>Kondisi Rusak</th>
                        <th>Kondisi Baik</th>
                        <th>Jumlah akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi</th>
                        <th>Tahun Pembelian</th>
                        <th>Kategori</th>
                        <th>Kondisi Rusak</th>
                        <th>Kondisi Baik</th>
                        <th>Jumlah akhir</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Selang NGT</td>
                        <td>General Care</td>
                        <td>2021</td>
                        <td>BHP</td>
                        <td>0</td>
                        <td>2</td>
                        <td>2</td>

                        <td>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <<td>2</td>
                        <td>Pisah Bedah</td>
                        <td>Stainless</td>
                        <td>2017</td>
                        <td>Alat</td>
                        <td>1</td>
                        <td>0</td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->

<?=$this->endSection()?>