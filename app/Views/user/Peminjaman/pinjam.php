<?=$this->extend('user/template/index')?>
<?=$this->section('page-content')?>

<h2>Pinjam Barang</h2>
<form action="<?= site_url('user/peminjaman/pinjam'); ?>" method="post">
    <label for="barangId">Pilih Barang:</label>
    <select name="barangId[]" multiple>
        <?php foreach ($barang as $item): ?>
            <option value="<?= $item['id']; ?>"><?= $item['namaBrg']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Pinjam</button>
</form>

<?= $this->endSection() ?>
