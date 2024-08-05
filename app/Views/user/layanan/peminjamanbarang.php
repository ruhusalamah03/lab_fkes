<?=$this->extend('user/template/index')?>
<?=$this->section('page-content')?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peminjaman Barang</title>
  
</head>
<body>
  <div class="container">
    <h1>Peminjaman Barang</h1>
    <form>
      <div>
        <label for="nama_peminjam">Nama Peminjam:</label>
        <input type="text" id="nama_peminjam" name="nama_peminjam" value="Siti Nurazizah">
      </div>
      <div>
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="2130511022">
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="sitinuraziah22@gmail.com">
      </div>
      <div>
        <label for="kode_barang">Kode Barang:</label>
        <input type="text" id="kode_barang" name="kode_barang" value="FM001">
      </div>
      <div>
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" value="Obat Tetes Mata">
      </div>
      <div>
        <label for="tanggal_peminjam">Tanggal Pinjam:</label>
        <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="2024-07-18">
      </div>
      <div>
        <label for="tanggal">Tanggal Kembali:</label>
        <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="2024-07-20">
      </div>
      <!-- <div>
        <label for="unit">Unit:</label>
        <input type="text" id="unit" name="unit" value="Unit">
      </div> -->
      <div>
        <label for="keterangan">Catatan:</label>
        <textarea id="keterangan" name="keterangan"></textarea>
      </div>
      <div class="form-actions">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#modaladd">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </a>
      </div>
    </form>
    <h2>Barang Pinjaman</h2>
    <table>
      <thead>
        <tr>
          <th>Nama Peminjam</th>
          <th>NIM</th>
          <th>Email</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
          <th>Catatan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Siti Nurazizah</td>
          <td>2130511022</td>
          <td>sitinuraziah22@gmail.com</td>
          <td>FM001</td>
          <td>Obat Tetes Mata</td>
          <td>18-07-2024</td>
          <td>20-07-2024</td>
          <td> meminjam obat tetes mata sebanyak 2 mili</td>
          <td><a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldel">
          <i class="fas fa-trash"></i></td>
        </tr>
      </tbody>
    </table>
    <div class="form-actions">
      <button type="button" class="button">Selesai</button>
      <button type="button" class="button red-button">Batal</button>
      
    </div>
  </div>
</body>
</html>

<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      color: #333;
    }
    form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    input[type="text"], input[type="date"], textarea {
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    textarea {
      height: 100px;
      resize: none;
    }
    .form-actions {
      grid-column: span 2;
      display: flex;
      justify-content: flex-end;
    }
    .button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      margin-left: 10px;
    }
    .button:hover {
      background-color: #45a049;
    }
    .red-button {
      background-color: #f44336;
    }
    .red-button:hover {
      background-color: #e53935;
    }
    h2 {
      margin-top: 40px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 10px;
      text-align: left;
      border: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>


<?=$this->endSection()?>