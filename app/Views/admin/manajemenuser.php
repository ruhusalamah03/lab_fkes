<?= $this->extend('admin/layout') ?>
<?= $this->section('bodycontent') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
            <li class="breadcrumb-item">Manajemen User</li>
        </ol>
    </nav>

    <!-- tabel -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen User</h6>
            <div class="button-group">
                <a id="addBarang" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#modaladd">
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
                                    Pencarian:
                                    <input type="search" class="from-control from-control-sm" placeholder aria-controls="dataTable">
                                </label>
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data_user as $row) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row['nim'] ?></td>
                                <td><?= $row['nama_user'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-warning edit" data-toggle="modal" data-target="#modal-default" data-id_user="<?= $row['id_user']; ?>" data-nama_user="<?= $row['nama_user']; ?>" data-email="<?= $row['email']; ?>"><i class="fa fa-edit"></i></button>
                                    <a href="<?= base_url('admin/manajemenuser/delete/' . $row['id_user']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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
                    <h5 class="modal-title">Tambah Data User</h5>
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> -->
                </div>
                <form id="form" action="<?= base_url('admin/manajemenuser/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="int" name="nim" id="nim" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input type="text" name="nama_user" id="nim" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-hidden="true">
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
    </div> -->
                        <!-- Update modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content text-light bg-primary">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data Mahasiswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="form" action="<?= base_url('admin/manajemenuser/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="unim" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap*</label>
                            <input type="text" name="unama_user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="uemail" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="upassword" id="password" class="form-control" required>
                        </div>
                        <input type="number" id="eid_user" name="eid_user" hidden>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- <div class="modal fade" id="modaldel" tabindex="-1" role="dialog" aria-hidden="true">
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
    </div> -->
</div>
<!-- End of Main Content -->

<?= $this->endSection() ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle click on Add button
        $('#addBarang').on('click', function() {
            $('.modal-title').html('Tambah Data User');
            $('#form').attr('action', '<?= base_url('admin/manajemenuser/add') ?>');
            $('#nim').val('');
            $('#nama_user').val('');
            $('#email').val('');
            $('#password').val('');
        });

        // Handle click on Edit button
        $(document).on('click', '.edit', function() {
            let id = $(this).data('id_user');
            $('.modal-title').html('Edit Data User');
            $('#form').attr('action', '<?= base_url('admin/manajemenuser/update/') ?>' + id);
            $.ajax({
                url: '<?= base_url('admin/manajemenuser/getdata/'); ?>' + id,
                method: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    $('#nim').val(data.nim);
                    $('#nama_user').val(data.nama_user);
                    $('#email').val(data.email);
                    $('#password').val(''); // Password should be empty for edit
                }
            });
        });
    });
</script>
