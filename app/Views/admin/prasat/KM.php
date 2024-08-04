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
      <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('admin/prasats'); ?>">Prasat</a></li>
      <li class="breadcrumb-item">Keperawatan Maternitas</li>
    </ol>
  </nav>

  <!-- tabel -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Data Barang Keperawatan Maternitas</h6>
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
                  Pencarian:
                  <input type="search" class="from-control from-control-sm" placeholder aria-controls="dataTable">
                </label>
              </div>
            </div>
          </div>
          <thead>
            <tr>
              <th>Id</th>
              <th>Nama Barang</th>
              <th>Spesifikasi</th>
              <th>Tahun Pembelian</th>
              <th>Kategori</th>
              <th>Kondisi Baik</th>
              <th>Kondisi Rusak</th>
              <th>Jumlah Akhir</th>
              <th>Kode Barang</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($prasats as $km) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= esc($km['nama_brg']); ?></td>
                <td><?= esc($km['spesifikasi']); ?></td>
                <td><?= esc($km['thn_pembelian']); ?></td>
                <td><?= esc($km['kategori']); ?></td>
                <td><?= esc($km['kondisi_baik']); ?></td>
                <td><?= esc($km['kondisi_rusak']); ?></td>
                <td><?= esc($km['jml_akhir']); ?></td>
                <td><?= esc($km['kode_brg']); ?></td>
                <td>
                  <button class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#modaledit" data-id_prasat="<?= esc($km['id_prasat']); ?>" data-nama_brg="<?= esc($km['nama_brg']); ?>" data-spesifikasi="<?= esc($km['spesifikasi']); ?>" data-thn_pembelian="<?= esc($km['thn_pembelian']); ?>" data-kategori="<?= esc($km['kategori']); ?>" data-kondisi_baik="<?= esc($km['kondisi_baik']); ?>" data-kondisi_rusak="<?= esc($km['kondisi_rusak']); ?>" data-jml_akhir="<?= esc($km['jml_akhir']); ?>" data-id="<?= esc($km['kode_brg']); ?>">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#modaldel" data-id_prasat="<?= esc($km['id_prasat']); ?>">
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
        <!-- go to /admin/prasat/new -->
        <form method="post" action="/admin/prasat/km/new">
          <?= csrf_field() ?>
          <div class="form-group">
            <label for="kode_brg">Kode Barang*</label>
            <select id="kode_brg" name="kode_brg" class="form-control" required>
              <option value="" hidden></option>
              <?php foreach ($barang as $dbarang) : ?>
                <option value="<?= $dbarang['kode_brg'] ?>"><?= $dbarang['kode_brg'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" id="nama_brg" name="brg_nama" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Spesifikasi</label>
            <input type="text" id="spesifikasi" name="spesifikasi" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Tahun Pembelian (yyyy)</label>
            <input type="number" id="thn_pembelian" name="thn_pembelian" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="kategori" value="ASET" disabled style="background-color: white;">
              <label class="form-check-label text-white">Aset</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="kategori" value="ALAT" disabled>
              <label class="form-check-label text-white">Alat</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="kategori" value="ALAT_DAN_BAHAN" disabled>
              <label class="form-check-label text-white">Alat dan Bahan</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="kategori" value="BHP" disabled>
              <label class="form-check-label text-white">BHP</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="kategori" value="HIBAH" disabled>
              <label class="form-check-label text-white">Hibah</label>
            </div>
          </div>
          <div class="form-group">
            <label>Kondisi Baik</label>
            <input type="number" id="kondisi_baik" name="kondisi_baik" class="form-control" value="0" readonly>
          </div>
          <div class="form-group">
            <label>Kondisi Rusak</label>
            <input type="number" id="kondisi_rusak" name="kondisi_rusak" class="form-control" value="0" readonly>
          </div>
          <div class="form-group">
            <label>Jumlah Akhir</label>
            <input type="number" id="jml_akhir" name="jml_akhir" class="form-control" value="0" readonly>
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  $(document).ready(function() {
    $('#kode_brg').change(function() {
      var kode_brg = $(this).val();
      if (kode_brg) {
        $.ajax({
          url: '/admin/barang/detail',
          type: 'GET',
          data: {
            kode_brg: kode_brg
          },
          success: function(response) {
            $('#nama_brg').val(response.nama_brg);
            $('#spesifikasi').val(response.spesifikasi);
            $('#thn_pembelian').val(response.thn_pembelian);
            $('input[name=kategori]').prop('checked', false);
            if (response.kategori) {
              $('input[name=kategori][value=' + response.kategori.replace(/\s+/g, '_').toUpperCase() + ']').prop('checked', true);
            }
            $('#kondisi_baik').val(response.kondisi_baik);
            $('#kondisi_rusak').val(response.kondisi_rusak);
            $('#jml_akhir').val(response.jml_akhir);
          },
          error: function(xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
          }
        });
      } else {
        $('#nama_brg').val('');
        $('#spesifikasi').val('');
        $('#thn_pembelian').val('');
        $('input[name=kategori]').prop('checked', false);
        $('#kondisi_baik').val('');
        $('#kondisi_rusak').val('');
        $('#jml_akhir').val('');
      }
    });
  });
</script>

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

<script>
  $(document).ready(function() {
    $('.edit-button').click(function() {
      var kode_brg = $(this).data('id');

      $.ajax({
        url: '/admin/barang/detail',
        type: 'GET',
        data: {
          kode_brg: kode_brg
        },
        success: function(response) {
          $('#editForm').attr('action', '/admin/prasat/km/update/' + response.kode_brg);
          $('#old_code_brg').val(response.kode_brg);
          $('#edit_kode_brg').val(response.kode_brg);
          $('#edit_nama_brg').val(response.nama_brg);
          $('#edit_spesifikasi').val(response.spesifikasi);
          $('#edit_thn_pembelian').val(response.thn_pembelian);
          $('input[name=kategori]').prop('checked', false);
          if (response.kategori) {
            $('input[name=kategori][value=' + response.kategori.replace(/\s+/g, '_').toUpperCase() + ']').prop
            ('checked', true);
          }
          $('#edit_kondisi_baik').val(response.kondisi_baik);
          $('#edit_kondisi_rusak').val(response.kondisi_rusak);
          $('#edit_jml_akhir').val(response.jml_akhir);
        },
        error: function(xhr, status, error) {
          console.error('AJAX Error: ' + status + error);
        }
      });
    });
  });
</script>

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
        <form method="post" id="deleteForm" action="">
          <?= csrf_field() ?>
          <button class="btn btn-light" type="submit">Hapus</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.delete-button').click(function() {
      var id_prasat = $(this).data('id_prasat');
      $('#deleteForm').attr('action', '/admin/prasat/delete/' + id_prasat);
    });
  });
</script>

<!-- End of Main Content -->

<?= $this->endSection() ?>