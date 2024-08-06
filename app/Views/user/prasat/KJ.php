<?=$this->extend('user/template/index')?>
<?=$this->section('page-content')?>

<!-- Begin Page Content -->
<nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('user/prasats'); ?>">Prasat</a></li>
      <li class="breadcrumb-item">Keperawatan Jiwa</li>
    </ol>
  </nav>

<!-- tabel -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Data Barang Keperawatan Jiwa</h6>
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
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($prasats as $kj) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= esc($kj['nama_brg']); ?></td>
                <td><?= esc($kj['spesifikasi']); ?></td>
                <td><?= esc($kj['thn_pembelian']); ?></td>
                <td><?= esc($kj['kategori']); ?></td>
                <td><?= esc($kj['kondisi_baik']); ?></td>
                <td><?= esc($kj['kondisi_rusak']); ?></td>
                <td><?= esc($kj['jml_akhir']); ?></td>
                <td><?= esc($kj['kode_brg']); ?></td>
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
<!-- </div> -->

<!-- End of Main Content -->

<?= $this->endSection() ?>