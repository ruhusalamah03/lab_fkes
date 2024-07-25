<?php
    date_default_timezone_set("Asia/Jakarta");
?>
<div>
    <div>
        <h1 align="center">Data Barang</h1>
    </div>
    <div>a se
        <div>
            <table border="1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>spesifikasi</th>
                        <th>Tahun Pembelian</th>
                        <th>Kategori</th>
                        <th>Kondisi Baik</th>
                        <th>Kondisi Rusak</th>
                        <th>Jumlah Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $id = 1;
                        foreach ($barang as $row): ?>
                        <?php
                        // $path = 'mhs-foto/'.$row['mhs_photo'];
                        // $type = pathinfo($path, PATHINFO_EXTENSION);
                        // $data = file_get_contents($path);
                        // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        ?>
                        
                    <tr>
                        <td align="center"><?=$id;?></td>
                        <!-- <td align="center"><img src="/mhs-foto/" style="width:100px; height:100px; object-fit:cover"></td> -->
                        <td align="center"><?=$row['kode_brg']?></td>
                        <td><?=$row['nama_brg']?></td>
                        <td><?=$row['spesifikasi']?></td>
                        <td><?=date("d-M-Y", strtotime($row['thn_pembelian']))?></td>
                        <td><?=$row['kategori']?></td>
                        <td><?=$row['kondisi_baik']?></td>
                        <td><?=$row['kondisi_rusak']?></td>
                        <td><?=$row['jml_akhir']?></td>
                    </tr>
                        <?php 
                        $id++; 
                        endforeach; 
                    ?>
                </tbody>
            </table>
            <br>
            <p>Dicetak pada: <?=(date("d-m-Y H:i:s"));?> </p>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.print();
</script>