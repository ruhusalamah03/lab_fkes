<?= $this->extend('layout') ?>
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
                <button class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#modaledit"
                    data-id="<?= esc($dbarang->id); ?>"
                    data-kode_brg="<?= esc($dbarang->kode_brg); ?>"
                    data-nama_brg="<?= esc($dbarang->nama_brg); ?>"
                    data-spesifikasi="<?= esc($dbarang->spesifikasi); ?>"
                    data-thn_pembelian="<?= esc($dbarang->thn_pembelian); ?>"
                    data-kategori="<?= esc($dbarang->kategori); ?>"
                    data-kondisi_baik="<?= esc($dbarang->kondisi_baik); ?>"
                    data-kondisi_rusak="<?= esc($dbarang->kondisi_rusak); ?>"
                    data-jml_akhir="<?= esc($dbarang->jml_akhir); ?>">
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#modaldel"
                    data-id="<?= esc($dbarang->id); ?>">
                    <i class="fas fa-trash"></i>
                </button>
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

<!-- Modal Edit -->
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
                <form method="post" enctype="multipart/form-data" action="/barang/update/">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Kode Barang*</label>
                        <input type="text" name="kode_brg" id="kode_brg" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang*</label>
                        <input type="text" name="nama_brg" id="nama_brg" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Spesifikasi*</label>
                        <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal pembelian (yyyy)*</label>
                        <input type="text" name="thn_pembelian" id="thn_pembelian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="kategori_aset" value="ASET">
                            <label class="form-check-label" for="kategori_aset">Aset</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="kategori_alat" value="ALAT">
                            <label class="form-check-label" for="kategori_alat">Alat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="kategori_alat_bahan" value="ALAT_DAN_BAHAN">
                            <label class="form-check-label" for="kategori_alat_bahan">Alat dan Bahan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="kategori_bhp" value="BHP">
                            <label class="form-check-label" for="kategori_bhp">BHP</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="kategori_hibah" value="HIBAH">
                            <label class="form-check-label" for="kategori_hibah">Hibah</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kondisi Baik*</label>
                        <input type="number" name="kondisi_baik" id="kondisi_baik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kondisi Rusak*</label>
                        <input type="number" name="kondisi_rusak" id="kondisi_rusak" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah*</label>
                        <input type="number" name="jml_akhir" id="jml_akhir" class="form-control" required>
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

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const kode_brg = button.getAttribute('data-kode_brg');
                const nama_brg = button.getAttribute('data-nama_brg');
                const spesifikasi = button.getAttribute('data-spesifikasi');
                const thn_pembelian = button.getAttribute('data-thn_pembelian');
                const kategori = button.getAttribute('data-kategori');
                const kondisi_baik = button.getAttribute('data-kondisi_baik');
                const kondisi_rusak = button.getAttribute('data-kondisi_rusak');
                const jml_akhir = button.getAttribute('data-jml_akhir');

                document.getElementById('id').value = id;
                document.getElementById('kode_brg').value = kode_brg;
                document.getElementById('nama_brg').value = nama_brg;
                document.getElementById('spesifikasi').value = spesifikasi;
                document.getElementById('thn_pembelian').value = thn_pembelian;
                document.querySelector(`input[name="kategori"][value="${kategori}"]`).checked = true;
                document.getElementById('kondisi_baik').value = kondisi_baik;
                document.getElementById('kondisi_rusak').value = kondisi_rusak;
                document.getElementById('jml_akhir').value = jml_akhir;
            });
        });
    });
</script>

<?= $this->endSection() ?>