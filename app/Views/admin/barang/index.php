<?= $this->extend('admin/layout') ?>
<?= $this->section('bodycontent') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
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

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/labfkes'); ?>">Beranda</a></li>
            <li class="breadcrumb-item">Barang</li>
        </ol>
    </nav>

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
                <a href="barang/data-print" target="_blank" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print Data</span>
                </a>
                <a href="barang/export" target="_blank" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-download"></i>
                    </span>
                    <span class="text">Export Excel</span>
                </a>
                <a href="admin/barang/import" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#modal-import-barang">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-upload"></i>
                    </span>
                    <span class="text">Upload File</span>
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
                        <?php $i = ($currentPage - 1) * $perPage + 1; ?>
                        <?php foreach ($barang as $dbarang) : ?>
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
                                    <button class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#modaledit" data-id="<?= esc($dbarang->id); ?>" data-kode_brg="<?= esc($dbarang->kode_brg); ?>" data-nama_brg="<?= esc($dbarang->nama_brg); ?>" data-spesifikasi="<?= esc($dbarang->spesifikasi); ?>" data-thn_pembelian="<?= esc($dbarang->thn_pembelian); ?>" data-kategori="<?= esc($dbarang->kategori); ?>" data-kondisi_baik="<?= esc($dbarang->kondisi_baik); ?>" data-kondisi_rusak="<?= esc($dbarang->kondisi_rusak); ?>" data-jml_akhir="<?= esc($dbarang->jml_akhir); ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#modaldel" data-id="<?= esc($dbarang->id); ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <?= $pager->links('barang', 'bootstrap_pagination'); ?>
        </div>
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
                <form method="post" action="/admin/barang/new">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Kode Barang*</label>
                        <input type="text" name="kode_brg" class="form-control" required>
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
                        <input type="number" name="thn_pembelian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="ASET" required>
                            <label class="form-check-label">Aset</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="ALAT" required>
                            <label class="form-check-label">Alat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="ALAT_BAHAN" required>
                            <label class="form-check-label">Alat dan Bahan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="HIBAH" required>
                            <label class="form-check-label">BHP</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" value="PERALATAN" required>
                            <label class="form-check-label">Hibah</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kondisi Baik</label>
                        <input type="number" name="kondisi_baik" class="form-control" value="0">
                    </div>
                    <div class="form-group">
                        <label>Kondisi Rusak</label>
                        <input type="number" name="kondisi_rusak" class="form-control" value="0">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Akhir</label>
                        <input type="number" name="jml_akhir" class="form-control" value="0">
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

<!-- Modal Edit -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-light bg-primary">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="editForm" action="">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="post">
                    <div class="form-group">
                        <label>Kode Barang*</label>
                        <input type="text" name="kode_brg" id="edit_kode_brg" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang*</label>
                        <input type="text" name="brg_nama" id="edit_nama_brg" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Spesifikasi*</label>
                        <input type="text" name="spesifikasi" id="edit_spesifikasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun Pembelian (yyyy)*</label>
                        <input type="number" name="thn_pembelian" id="edit_thn_pembelian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="edit_kategori_aset" value="ASET">
                            <label class="form-check-label">Aset</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="edit_kategori_alat" value="ALAT">
                            <label class="form-check-label">Alat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="edit_kategori_alat_bahan" value="ALAT_BAHAN">
                            <label class="form-check-label">Alat dan Bahan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="edit_kategori_bhp" value="BHP">
                            <label class="form-check-label">BHP</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="edit_kategori_hibah" value="HIBAH">
                            <label class="form-check-label">Hibah</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kondisi Baik</label>
                        <input type="number" name="kondisi_baik" id="edit_kondisi_baik" class="form-control" value="0">
                    </div>
                    <div class="form-group">
                        <label>Kondisi Rusak</label>
                        <input type="number" name="kondisi_rusak" id="edit_kondisi_rusak" class="form-control" value="0">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Akhir</label>
                        <input type="number" name="jml_akhir" id="edit_jml_akhir" class="form-control" value="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modaldel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-light bg-danger">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data barang ini?</p>
            </div>
            <div class="modal-footer">
                <form method="post" id="deleteForm" action="/barang/delete/">
                    <?= csrf_field() ?>
                    <button class="btn btn-light" type="submit">Hapus</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    // JavaScript for populating edit modal
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                const form = document.getElementById('editForm');
                form.action = `barang/update/${this.dataset.id}`;
                document.getElementById('edit_kode_brg').value = this.dataset.kode_brg;
                document.getElementById('edit_nama_brg').value = this.dataset.nama_brg;
                document.getElementById('edit_spesifikasi').value = this.dataset.spesifikasi;
                document.getElementById('edit_thn_pembelian').value = this.dataset.thn_pembelian;
                document.querySelector(`input[name="kategori"][value="${this.dataset.kategori}"]`).checked = true;
                document.getElementById('edit_kondisi_baik').value = this.dataset.kondisi_baik;
                document.getElementById('edit_kondisi_rusak').value = this.dataset.kondisi_rusak;
                document.getElementById('edit_jml_akhir').value = this.dataset.jml_akhir;
            });
        });

        // JavaScript for populating delete modal
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const form = document.getElementById('deleteForm');
                form.action = `barang/delete/${this.dataset.id}`;
            });
        });
    });
</script>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-import-barang">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('admin/barang/import') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>File Excel</label>
                    <div class="custom-file">
                        <?= csrf_field() ?>
                        <input type="file" name="file_excel" class="custom-file-input" id="file_excel" required />
                        <label for="file_excel" class="custom-file-label">Pilih File</label>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        vertical-align: middle;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
        justify-content: center;
        align-items: center;
    }

    thead {
        position: sticky;
        top: 0;
        background-color: #fff;
    }
</style>

<?= $this->endSection() ?>