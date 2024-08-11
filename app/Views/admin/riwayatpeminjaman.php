<?= $this->extend('admin/layout') ?>
<?= $this->section('bodycontent') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('admin/labfkes'); ?>">Beranda</a></li>
      <li class="breadcrumb-item">Riwayat Peminjaman</li>
    </ol>
  </nav>


  <!-- tabel -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Riwayat Peminjaman</h6>

      <a href="riwayatprint" target="_blank" class="btn btn-info btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fas fa-print"></i>
        </span>
        <span class="text">Print Laporan</span>
      </a>
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
            <tr class="text-center">
              <th>No</th>
              <th>Peminjam</th>
              <th>Nama Barang</th>
              <th>Tanggal meminjam</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 1 + ($riwayat['pager']->getCurrentPage() - 1) * $riwayat['pager']->getPerPage() ?>
            <?php foreach ($riwayat['data'] as $row) : ?>
              <tr class="text-center">
                <td><?= $i++ ?></td>
                <td><?= $row['nama_user'] ?></td>
                <td><?= $row['nama_brg'] ?></td>
                <td><?= $row['tgl_pinjam'] ?></td>
                <td><?= $row['tgl_kembali'] ?></td>
                <td>
                  <?php if (isset($row['status'])) : ?>
                    <?php if ($row['status'] == 'approve' && $row['updated_at'] <= $row['tgl_kembali']) : ?>
                      <button class="btn btn-success btn-sm" style="cursor: default;">Telah Kembali</button>
                    <?php elseif ($row['status'] == 'approve' && $row['updated_at'] > $row['tgl_kembali']) : ?>
                      <button class="btn btn-danger btn-sm" style="cursor: default;">Terlambat</button>
                    <?php else : ?>
                      <button class="btn btn-danger btn-sm" style="cursor: default;">Ditolak</button>
                    <?php endif ?>
                  <?php endif ?>
                </td>
                <td>
                  <button class="btn btn-info btn-icon-split btn-sm detail-button" data-toggle="modal" data-target="#modaldetail" data-id="<?= $row['id'] ?>">
                    <span class="icon text-white-50">
                      <i class="fas fa-eye"></i>
                    </span>
                    <span class="text">Detail</span>
                  </button>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

      <div class="mt-4">
        <?= $riwayat['pager']->links('bootstrap_pagination') ?>
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
            $('#detail_catatan').val(data.catatan ? data.catatan : '-');

            const updatedAt = data.updated_at ? new Date(data.updated_at) : null;
            const tglKembali = new Date(data.tgl_kembali);

            if (data.status == 'approve' && updatedAt <= tglKembali) {
              $('#status').html('<div class="form-group"><label>Status</label><div><input type="text" name="status" id="detail_status" class="form-control" value="Telah Kembali" readonly></div></div>');
            } else if (data.status == 'approve' && updatedAt > tglKembali) {
              $('#status').html('<div class="form-group"><label>Status</label><div><input type="text" name="status" id="detail_status" class="form-control" value="Terlambat" readonly></div></div>');
            } else {
              $('#status').html('<div class="form-group"><label>Status</label><div><input type="text" name="status" id="detail_status" class="form-control" value="Ditolak" readonly></div></div>');
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
          <div class="form-group">
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
          <div id="status"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- End of Main Content -->

<?= $this->endSection() ?>
