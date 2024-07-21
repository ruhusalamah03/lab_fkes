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
