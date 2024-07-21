<?= $this->extend('layout') ?>
<?= $this->section('bodycontent') ?>

<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            <div class="button-group">
                <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#modaladd">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
                </a>

                <a href="/admin/data-mhs-print" target="_blank" class="btn btn-info btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print Data</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <!-- menu cari -->
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <label> Show
                                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select-sm from-control from-control-sm">
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
                                    pencarian:
                                    <input type="search" class="from-control from-control-sm" placeholder aria-controls="dataTable">
                                </label>
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Spesifikasi</th>
                            <th>Tahun Pembelian</th>
                            <th>Kategori</th>
                            <th>Kondisi Baik</th>
                            <th>Kondisi Rusak</th>
                            <th>Jumlah Akhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($barang as $dbarang) :?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= esc($dbarang->kode_brg); ?></td>
                        <td><?= esc($dbarang->nama_brg); ?></td>
                        <td><?= esc($dbarang->spesifikasi); ?></td>
                        <td><?= esc($dbarang->thn_pembelian); ?></td>
                        <td><?= esc($dbarang->kategori); ?></td>
                        <td><?= esc($dbarang->kondisi_baik); ?></td>
                        <td><?= esc($dbarang->kondisi_rusak); ?></td>
                        <td><?= esc($dbarang->jml_akhir); ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>     
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

</div>
<!-- Modal Add -->

<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-light bg-primary">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="/barang/new">

                    <div class="form-group">
                        <label>Kode Barang*</label>
                        <input type="int" name="kode_brg" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Barang*</label>
                        <input type="text" name="brg_nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Spesifikasi*</label>
                        <input type="text" name="spesifikasi" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Tahun Pembelian (yyyy)*</label>
                        <input type="year" id="thn_pembelian" name="thn_pembelian" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="ASET">
                            <label class="form-check-label">Aset</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="ALAT">
                            <label class="form-check-label">Alat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="ALAT_DAN_BAHAN">
                            <label class="form-check-label">Alat dan Bahan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="BHP">
                            <label class="form-check-label">BHP</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="HIBAH">
                            <label class="form-check-label">Hibah</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kondisi Baik*</label>
                        <input type="int" name="kondisi_baik" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Kondisi Rusak*</label>
                        <input type="int" name="kondisi_rusak" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Akhir*</label>
                        <input type="number" name="jml_akhir" class="form-control" required>
                    </div>

                    <br>
                    *Required

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal-->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-light bg-primary">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="/barang/edit">
                    <div class="form-group">
                        <label>Kode Barang*</label>
                        <input type="int" id="kode_brg" name="kode_brg" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang*</label>
                        <input type="text" id="nama_brg" name="nama_brg" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Spesifikasi*</label>
                        <input type="text" id="spesifikasi" name="spesifikasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal pembelian (yyyy)*</label>
                        <input type="year" id="thn_pembelian" name="thn_pembelian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="ASET">
                            <label class="form-check-label">Aset</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="ALAT">
                            <label class="form-check-label">Alat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="ALAT_DAN_BAHAN">
                            <label class="form-check-label">Alat dan Bahan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="BHP">
                            <label class="form-check-label">BHP</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="HIBAH">
                            <label class="form-check-label">Hibah</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kondisi Baik*</label>
                        <input type="int" name="kondisi_baik" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Kondisi Rusak*</label>
                        <input type="int" name="kondisi_rusak" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah*</label>
                        <input type="number" id="jml_akhir" name="jml_akhir" class="form-control" required>
                    </div>
                    <input type="number" id="kode_brg" name="kode_brg" hidden>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Hapus Modal-->
<div class="modal fade" id="modaldel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-light bg-primary">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="/admin/delMhs">
                    <div class="form-group" style="text-align:center;">
                        <div class="form-group">
                            <img id="dmhsphoto" src="" style="width:200px;">
                        </div>
                    </div>

                    <!-- <div class="form-group">
                            <label>NIM Mahasiswa</label>
                            <input type="number" id="dmhsnim" class="form-control" disabled>
                        </div> -->

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" id="brgnama" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Spesifikasi</label>
                        <input type="text" id="spesifi" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Tanggal pembelian (dd/mm/yyyy)</label>
                        <input type="date" id="tglbeli" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" id="dmhsjk" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" id="dmhsnim" class="form-control" disabled>
                    </div>

                    <!-- <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="dmhsalamat" rows="3" disabled></textarea>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="dmhsemail" class="form-control" disabled>
                        </div> -->

                    <!-- <input type="text" id="dmhsoldphoto" name="dmhs_oldphoto" hidden required>
                        <input type="number" id="dmhsid" name="dmhs_id" hidden required> -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>