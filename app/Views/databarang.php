<?=$this->extend('layout')?>
<?=$this->section('bodycontent')?>

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

            <a href="data-print" target="_blank" class="btn btn-info btn-icon-split btn-sm">
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
                            pencarian:
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
                        <th>Tanggal Pembelian</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Selang NGT</td>
                        <td>General Care</td>
                        <td>2021</td>
                        <td>BHP</td>
                        <td>5</td>
                        <td>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit">
                                <i class="fas fa-pencil-alt"></i>
                            
                         <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldel">
                                <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pisah Bedah</td>
                        <td>Stainless</td>
                        <td>2017</td>
                        <td>Alat</td>
                        <td>1</td>
                        <td>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldel">
                                <i class="fas fa-trash"></i>
                        </td>
                    </tr>
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
                    <form method="post" enctype="multipart/form-data" action="/admin/addMhs">
                        
                        <div class="form-group">
                            <label>Nama Barang*</label>
                            <input type="text" name="brg_nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Spesifikasi*</label>
                            <input type="text" name="spes_ifi" class="form-control" required>
                            </div>

                        <div class="form-group">
                            <label>Tanggal pembelian (dd/mm/yyyy)*</label>
                            <input type="date" id="tglbeli" name="tgl_beli" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Kategori*</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="amhs_jk" value="L">
                                <label class="form-check-label">BHP</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="amhs_jk" value="P">
                                <label class="form-check-label">Plastik</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Jumlah*</label>
                            <input type="number" name="amhs_nim" class="form-control" required>
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

    <!-- View Modal-->
    <!-- <div class="modal fade " id="modalview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content text-light bg-primary">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Data Mahasiswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"> */jequary pindahkan ke haed
                    <form method="#" enctype="multipart/form-data" action="#">
                         <div class="form-group" style="text-align:center;">
                            <img id="vmhsphoto" src="" style="width: 200px;">
                        </div>

                        <div class="form-group">
                            <label>NIM</label>
                            <input type="number" id="vmhsnim" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" id="vmhsnama" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir (dd/mm/yyyy)</label>
                            <input type="date" id="vmhsdob" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" id="vmhsjk" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="vmhsalamat" rows="3" disabled></textarea>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="vmhsemail" class="form-control" disabled>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    
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
                <form method="post" enctype="multipart/form-data" action="/admin/editMhs">
                    <div class="form-group">
                        <label>Nama Barang*</label>
                        <input type="text" id="brgnama" name="brgnama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Spesifikasi*</label>
                        <input type="text" id="spesifi" name="spesifi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal pembelian (dd/mm/yyyy)*</label>
                        <input type="date" id="tglbeli" name="tglbeli" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="BHP" required>
                            <label class="form-check-label">BHP</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="Alat" required>
                            <label class="form-check-label">Alat</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kondisi*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kondisi" value="Baik" required>
                            <label class="form-check-label">Baik</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kondisi" value="Rusak" required>
                            <label class="form-check-label">Rusak</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jumlah*</label>
                        <input type="number" id="emhsnim" name="emhs_nim" class="form-control" required>
                    </div>
                    <input type="number" id="emhsid" name="emhs_id" hidden>
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
<?=$this->endSection()?>