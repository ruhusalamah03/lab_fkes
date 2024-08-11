<?= $this->extend('user/template/index') ?>
<?= $this->section('page-content') ?>

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
      <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
      <li class="breadcrumb-item">Peminjaman Barang</li>
    </ol>
  </nav>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman Saya</h6>
      <div class="button-group">
        <button class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#modaladd">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Pinjam Barang</span>
        </button>

        <a href="#" target="_blank" class="btn btn-info btn-icon-split btn-sm">
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
          <div class="row justify-content-end">
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
              <th>No</th>
              <th>Nama Barang</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Catatan</th>
              <th>Status</th>
              <th>Pengembalian</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 + ($peminjaman['pager']->getCurrentPage() - 1) * $peminjaman['pager']->getPerPage() ?>
            <?php foreach ($peminjaman['data'] as $row) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $row['nama_brg'] ?></td>
                <td><?= $row['tgl_pinjam'] ?></td>
                <td><?= $row['tgl_kembali'] ?></td>
                <td class="text-left">
                  <?php if (empty($row['catatan'])) : ?>
                    -
                  <?php else : ?>
                    <?= strlen($row['catatan']) > 100 ? substr($row['catatan'], 0, 100) . '...' : $row['catatan'] ?>
                  <?php endif ?>
                </td>
                <td>
                  <?php if (isset($row['status'])) : ?>
                    <?php if ($row['status'] == 'pending') : ?>
                      <button type="button" class="btn btn-warning" style="cursor: default;">Menunggu Persetujuan</button>
                    <?php elseif ($row['status'] == 'review') : ?>
                      <button type="button" class="btn btn-info" style="cursor: default;">Sedang Direview</button>
                    <?php elseif ($row['status'] == 'approve') : ?>
                      <button type="button" class="btn btn-success" style="cursor: default;">Disetujui</button>
                    <?php elseif ($row['status'] == 'reject') : ?>
                      <button type="button" class="btn btn-danger" style="cursor: default;">Ditolak</button>
                    <?php endif ?>
                  <?php endif ?>
                </td>
                <td>
                  <?php if (isset($row['status'])) : ?>
                    <?php
                    $updatedAt = $row['updated_at'] ? new DateTime($row['updated_at']) : null;
                    $tglKembali = new DateTime($row['tgl_kembali']);
                    ?>
                    <?php if ($row['status'] == 'approve' && ($row['is_dikembalikan'] == "0" || $updatedAt == null)) : ?>
                      <button type="button" class="btn btn-warning" style="cursor: default;">Belum Dikembalikan</button>
                    <?php elseif ($row['status'] == 'approve' && $row['is_dikembalikan'] == "1") : ?>
                      <?php if ($updatedAt <= $tglKembali) : ?>
                        <button type="button" class="btn btn-success" style="cursor: default;">Sudah Dikembalikan</button>
                      <?php else : ?>
                        <button type="button" class="btn btn-danger" style="cursor: default;">Terlambat</button>
                      <?php endif ?>
                    <?php else : ?>
                      <button type="button" class="btn btn-secondary" style="cursor: default;">-</button>
                    <?php endif ?>
                  <?php endif ?>
                </td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <button class="dropdown-item detail-button" data-toggle="modal" data-target="#modaldetail" data-id="<?= $row['id'] ?>">Detail</button>

                      <?php if (isset($row['status'])) : ?>
                        <?php if ($row['status'] == 'pending') : ?>
                          <button class="dropdown-item edit-button" data-toggle="modal" data-target="#modaledit" data-id="<?= $row['id'] ?>">Edit</button>
                        <?php endif ?>
                      <?php endif ?>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="mt-4">
        <?= $peminjaman['pager']->links() ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content text-light bg-primary">
      <div class="modal-header">
        <h5 class="modal-title">Pinjam Barang</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/peminjaman/store') ?>" method="post">
          <?= csrf_field() ?>
          <div class="form-group">
            <label for="kode_brg">Barang</label>
            <select name="kode_brg" id="kode_brg" class="form-control">
              <option value="">Pilih Barang</option>
              <?php if (isset($databarang)) : ?>
                <?php foreach ($databarang as $row) : ?>
                  <option value="<?= $row['kode_brg'] ?>"><?= "{$row['kode_brg']} - {$row['nama_brg']}" ?></option>
                <?php endforeach; ?>
              <?php else : ?>
                <option value="">Data barang kosong</option>
              <?php endif; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="tgl_kembali">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="catatan">
              Catatan
              <span class="badge badge-secondary">Optional</span>
            </label>
            <textarea name="catatan" id="catatan" class="form-control"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  $(document).ready(function() {
    $('.detail-button').on('click', function() {
      const id = $(this).data('id');
      $.ajax({
        url: '/user/peminjaman/detail/' + id,
        type: 'get',
        dataType: 'json',
        success: function(data) {
          $('#detail_nama_user').val(data.nama_user);
          $('#detail_nama_brg').val(data.nama_brg);
          $('#detail_tgl_pinjam').val(data.tgl_pinjam);
          $('#detail_tgl_kembali').val(data.tgl_kembali);
          $('#detail_catatan').val(data.catatan);

          if (data.status == 'pending') {
            $('#status').html('<button type="button" class="btn btn-warning" style="cursor: default;">Menunggu Persetujuan</button>');
          } else if (data.status == 'review') {
            $('#status').html('<button type="button" class="btn btn-info" style="cursor: default;">Sedang Direview</button>');
          } else if (data.status == 'approve') {
            $('#status').html('<button type="button" class="btn btn-success" style="cursor: default;">Disetujui</button>');
          } else if (data.status == 'reject') {
            $('#status').html('<button type="button" class="btn btn-danger" style="cursor: default;">Ditolak</button>');
          }

          const updatedAt = data.updated_at ? new Date(data.updated_at) : null;
          const tglKembali = new Date(data.tgl_kembali);

          if (data.status == 'approve' && (data.is_dikembalikan == "0" || $updatedAt == null)) {
            $('#pengembalian').html('<button type="button" class="btn btn-warning" style="cursor: default;">Belum Dikembalikan</button>');
          } else if (data.status == 'approve' && data.is_dikembalikan == "1") {
            if ($updatedAt <= tglKembali) {
              $('#pengembalian').html('<button type="button" class="btn btn-success" style="cursor: default;">Sudah Dikembalikan</button>');
            } else {
              $('#pengembalian').html('<button type="button" class="btn btn-danger" style="cursor: default;">Terlambat</button>');
            }
          } else {
            $('#pengembalian').html('<button type="button" class="btn btn-secondary" style="cursor: default;">-</button>');
          }
        }
      });
    });
  });
</script>

<!-- Modal Detail -->
<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content text-light bg-primary">
      <div class="modal-header">
        <h5 class="modal-title">Detail Peminjaman</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group
        <label>Nama User</label>
        <input type="text" name="nama_user" id="detail_nama_user" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label>Nama Barang</label>
          <input type="text" name="nama_brg" id="detail_nama_brg" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label>Tanggal Pinjam</label>
          <input type="text" name="tgl_pinjam" id="detail_tgl_pinjam" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label>Tanggal Kembali</label>
          <input type="text" name="tgl_kembali" id="detail_tgl_kembali" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label>Catatan</label>
          <textarea name="catatan" id="detail_catatan" class="form-control" readonly></textarea>
        </div>
        <div class="form-group">
          <label>Status</label>
          <div id="status">
          </div>
        </div>
        <div class="form-group">
          <label>Pengembalian</label>
          <div id="pengembalian"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.edit-button').on('click', function() {
      const id = $(this).data('id');
      $.ajax({
        url: '/user/peminjaman/detail/' + id,
        type: 'get',
        dataType: 'json',
        success: function(data) {
          $('form').attr('action', '<?= base_url('user/peminjaman/update/') ?>' + data.id);
          $('#edit_id').val(data.id);
          $('#edit_nama_brg').val(data.kode_brg);
          $('#edit_tgl_pinjam').val(data.tgl_pinjam);
          $('#edit_tgl_kembali').val(data.tgl_kembali);
          $('#edit_catatan').val(data.catatan);
        }
      });
    });
  });
</script>

<!-- Modal Edit -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content text-light bg-primary">
      <div class="modal-header">
        <h5 class="modal-title">Edit Peminjaman</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <?= csrf_field() ?>
          <input type="hidden" name="id" id="edit_id">
          <div class="form-group">
            <label for="edit_nama_brg">Barang</label>
            <select name="kode_brg" id="edit_nama_brg" class="form-control">
              <option value="">Pilih Barang</option>
              <?php if (isset($databarang)) : ?>
                <?php foreach ($databarang as $row) : ?>
                  <option value="<?= $row['kode_brg'] ?>"><?= "{$row['kode_brg']} - {$row['nama_brg']}" ?></option>
                <?php endforeach; ?>
              <?php else : ?>
                <option value="">Data barang kosong</option>
              <?php endif; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="edit_tgl_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" id="edit_tgl_pinjam" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_tgl_kembali">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" id="edit_tgl_kembali" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_catatan">
              Catatan
              <span class="badge badge-secondary">Optional</span>
            </label>
            <textarea name="catatan" id="edit_catatan" class="form-control"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Perbarui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
