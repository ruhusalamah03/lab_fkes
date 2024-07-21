
<?=$this->extend('layout')?>
<?=$this->section('bodycontent')?>

<!-- Begin Page Content -->
<div class="container-fluid">
    

<!-- tabel -->
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen User</h6>
    <div class="button-group">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#modaladd">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data</span>
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
                            Pencarian:
                            <input type="search" class="from-control from-control-sm" placeholder aria-controls="dataTable">
                        </label>
                    </div> 
                </div> 
            </div>

                 <thead>
                     <tr>
                        <th>No</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Opsi</th>
                        </tr>
                        </thead>
                 <tbody>
                     <tr>
                        <td>1</td>
                        <td>Admin</td>
                        <td>Sarah</td>
                        <td>@sarah123</td>
                            <td>
                            <button class="btn btn-success btn-circle btn-sm modalviewid">
                                <i class="fa fa-eye"></i></button>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mahasiawa</td>
                        <td>Azizah</td>
                        <td>@azizah123</td>
                            <td>
                            <button class="btn btn-success btn-circle btn-sm modalviewid">
                                <i class="fa fa-eye"></i></button>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mahasiswa</td>
                        <td>nana</td>
                        <td>@nana123</td>
                            <td>
                            <button class="btn btn-success btn-circle btn-sm modalviewid">
                                <i class="fa fa-eye"></i></button>
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


<!-- Add Modal-->
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-light bg-primary">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Mahasiswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="/admin/addMhs">
                        <div class="form-group">
                            <label>NIM Mahasiswa*</label>
                            <input type="number" name="amhs_nim" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap*</label>
                            <input type="text" name="amhs_nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir*</label>
                            <input type="date" name="amhs_dob" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin*</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="amhs_jk" value="L">
                                <label class="form-check-label">Laki-laki</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="amhs_jk" value="P">
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat*</label>
                            <textarea class="form-control" name="amhs_alamat" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="amhs_email" class="form-control" required>
                        </div>
                
                        <div class="form-group">
                            <label>Pas Foto (.jpg / .png)</label>
                            <input type="file" name="amhs_photo" accept=".jpg,.png" onchange="ImgFile(this);" class="form-control-file">
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


</div>
<!-- End of Main Content -->

<?=$this->endSection()?>