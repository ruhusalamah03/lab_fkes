<?= $this->extend('admin/layout') ?>
<?= $this->section('bodycontent') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('admin/labfkes'); ?>">Beranda</a></li>
      <li class="breadcrumb-item">Data Peminjaman</li>
    </ol>
  </nav>

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
      <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
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
              <th>Peminjam</th>
              <th>Nama Barang</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Catatan</th>
              <th>Status Persetujuan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 + ($peminjaman['pager']->getCurrentPage() - 1) * $peminjaman['pager']->getPerPage() ?>
            <?php foreach ($peminjaman['data'] as $row) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $row['nama_user'] ?></td>
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
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <button class="dropdown-item detail-button" data-toggle="modal" data-target="#modaldetail" data-id="<?= $row['id'] ?>">Detail</button>

                      <?php if (isset($row['status'])) : ?>
                        <?php if ($row['status'] == 'approve') : ?>
                          <form id="dikembalikan-form-<?= $row['id'] ?>" method="post" action="/admin/peminjaman/updatePengembalian">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="dropdown-item">Sudah Dikembalikan</button>
                          </form>
                        <?php endif ?>

                        <?php if ($row['status'] == 'pending') : ?>
                          <form id="review-form-<?= $row['id'] ?>" method="post" action="/admin/peminjaman/updateStatus">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="dropdown-item" name="status" value="review">Review</button>
                          </form>
                        <?php endif ?>

                        <?php if ($row['status'] == 'review') : ?>
                          <form id="approval-form-<?= $row['id'] ?>" method="post" action="/admin/peminjaman/updateStatus">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="dropdown-item" name="status" value="approve">Approve</button>
                            <button type="submit" class="dropdown-item" name="status" value="reject">Reject</button>
                          </form>
                        <?php endif ?>
                      <?php endif ?>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

      <div class="mt-4">
        <?= $peminjaman['pager']->links('bootstrap_pagination') ?>
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
        url: '/admin/peminjaman/detail/' + id,
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

          if (data.status == 'approve') {
            if (data.is_dikembalikan == '0') {
              $('#pengembalian').html('<div class="form-group"><label>Status Dikembalikan</label><div><input type="text" name="is_dikembalikan" id="detail_is_dikembalikan" class="form-control" value="Belum Dikembalikan" readonly></div></div>');
            } else if (data.is_dikembalikan == '1') {
              $('#pengembalian').html('<div class="form-group"><label>Status Dikembalikan</label><div><input type="text" name="is_dikembalikan" id="detail_is_dikembalikan" class="form-control" value="Sudah Dikembalikan" readonly></div></div>');
            }
          } else {
            $('#pengembalian').html('');
          }

          if (data.status == 'approve') {
            if (data.is_dikembalikan == '0') {
              $('#footer-action').html('<form id="dikembalikan-form-' + data.id + '" method="post" action="/admin/peminjaman/updatePengembalian">' +
                '<input type="hidden" name="id" value="' + data.id + '">' +
                '<button type="submit" class="btn btn-success">Sudah Dikembalikan</button>' +
                '</form>');
            }
          } else if (data.status == 'pending') {
            $('#footer-action').html('<form id="review-form-' + data.id + '" method="post" action="/admin/peminjaman/updateStatus">' +
              '<input type="hidden" name="id" value="' + data.id + '">' +
              '<button type="submit" class="btn btn-info" name="status" value="review">Review</button>' +
              '</form>');
          } else if (data.status == 'review') {
            $('#footer-action').html('<form id="approval-form-' + data.id + '" method="post" action="/admin/peminjaman/updateStatus">' +
              '<input type="hidden" name="id" value="' + data.id + '">' +
              '<button type="submit" class="btn btn-success" name="status" value="approve" style="margin-right: 0.5em">Approve</button>' +
              '<button type="submit" class="btn btn-danger" name="status" value="reject">Reject</button>' +
              '</form>');
          } else {
            $('#footer-action').html('');
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
        <input type=" text" name="nama_user" id="detail_nama_user" class="form-control" readonly>
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
          <label>Status Persetujuan</label>
          <div id="status">
          </div>
        </div>
        <div id="pengembalian"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>

          <div id="footer-action"></div>
        </div>
      </div>
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
