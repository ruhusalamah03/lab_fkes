
<?=$this->extend('layout')?>
<?=$this->section('bodycontent')?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('labfkes'); ?>">Beranda</a></li>
            <li class="breadcrumb-item">Manajemen User</li>
        </ol>
    </nav>

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
                     <tr class="text-center">
                        <th>No</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Opsi</th>
                        </tr>
                        </thead>
                 <tbody>
                     <tr class="text-center">
                        <td>1</td>
                        <td>Admin</td>
                        <td>Sarah</td>
                        <td>@sarah123</td>
                         <td>
                            <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#modalview">
                                <i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit">
                                <i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldel">
                                <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>2</td>
                        <td>Mahasiawa</td>
                        <td>Azizah</td>
                        <td>@azizah123</td>
                        <td>
                        <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#modalview">
                        <i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit">
                                <i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldel">
                                <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>3</td>
                        <td>Mahasiswa</td>
                        <td>nana</td>
                        <td>@nana123</td>
                        <td>   
                        <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#modalview">
                        <i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit">
                                <i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldel">
                                <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
                
            </table>
        </div>
    </div>
</div>


<!-- Add Modal-->
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                            <label>Status*</label>
                            <input type="text" name="amhs_nama" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label>Nama Lengkap*</label>
                            <input type="text" name="amhs_nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="amhs_email" class="form-control" required>
                        </div>

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

    <div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content text-light bg-success">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Data Mahasiswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="#" enctype="multipart/form-data" action="#">
                         
                    <div class="form-group">
                            <label>Status*</label>
                            <input type="text" name="amhs_nama" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label>Nama Lengkap*</label>
                            <input type="text" name="amhs_nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="amhs_email" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content text-light bg-primary">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data Mahasiswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="/admin/editMhs">
                    <div class="form-group">
                            <label>Status*</label>
                            <input type="text" name="amhs_nama" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label>Nama Lengkap*</label>
                            <input type="text" name="amhs_nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="amhs_email" class="form-control" required>
                        </div>

                        <br>
                        *Required
                        
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

    <div class="modal fade" id="modaldel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-light bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Mahasiswa Berikut?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="/admin/delMhs">
                        
                        <div class="form-group">
                            <label>Status*</label>
                            <input type="text" name="amhs_nama" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label>Nama Lengkap*</label>
                            <input type="text" name="amhs_nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="amhs_email" class="form-control" required>
                        </div>

                        <input type="number" id="dmhsid" name="dmhs_id" hidden required>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->

<?=$this->endSection()?>