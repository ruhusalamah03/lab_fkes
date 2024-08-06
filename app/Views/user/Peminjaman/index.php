<?=$this->extend('user/template/index')?>
<?=$this->section('page-content')?>

<h2>Data Peminjaman Saya</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Barang</th>
      <th>Status</th>
      <th>Dikembalikan</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($peminjamanbarang as $item) : ?>
      <tr>
        <td><?= $item['barangId']; ?></td>
        <td><?= $item['status']; ?></td>
        <td>
          <?php if ($item['status'] === 'accept' && !$item['isDikembalikan']) : ?>
            <form action="<?= site_url('user/peminjaman/kembalikan/' . $item['id']); ?>" method="post">
              <button type="submit">Kembalikan</button>
            </form>
          <?php else : ?>
            <?= $item['isDikembalikan'] ? 'Sudah dikembalikan' : 'Belum di-ACC'; ?>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
