<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lab Fkes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/LOGO-BARU.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/welcome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1wZxUp/M5JqYmfL5t+SzJMCfgh84dIx0n0B+7N5qG250TqeCyABrAOq+IRcTxhgmZXt8+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <header class="header fixed-top d-flex align-items-center">
        <div class="logo d-flex align-item-center">
            <img src="/img/logo.png" alt="Logo " class="logo-img">
            <div class="logo-text d-flex flex-column text-center">
              <span class="d-none d-lg-block">Sistem Laboratorium Kesehatan </span>
              <span class="d-none d-lg-block">Universitas Muhammadiyah Sukabumi</span>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href=<?=('masuk');?>>BERANDA</a></li>
                <li><a href=<?=('tentang_kami');?>>TENTANG KAMI</a></li>
                <li><a href=<?=('kontak');?>>KONTAK</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="welcome-section">
            <div class="illustration">
                <img src="/img/masuk.png" alt="Illustration">
            </div>
            <div class="welcome-text">
                <h1>Selamat Datang di Layanan Laboratorium Fakultas Kesehatan UMMI</h1>
                <a href=<?=site_url('login')?> class="button">MASUK</a>
            </div>
        </div>
    </main>
    <footer>
        <p>COPYRIGHT © 2024 Lab Fkes</p>
    </footer>
</body>

</html>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Open Sans",sans-serif;
}

body {
    background: linear-gradient(to right, #6D93F7, #4173F2 86%);
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: rgba(29, 25, 25, 0);
    width: 100%;
    position: fixed;
    top: 0;
    z-index: 1000;
}

header .logo {
    display: flex;
    align-items: center;
}

header .logo .logo-img {
    width: 50px;
    margin-right: 10px;
}

header .logo .logo-text {
    line-height: 1.2;
}

header .logo .logo-text span {
    display: block;
    font-weight: bold;
    color: black;
}

header nav ul {
    list-style: none;
    display: flex;
    gap: 20px;
}

header nav ul li a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}

main {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 30px;
}

.welcome-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
    align-items: center;
    gap: 50px;
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
    padding: 20px;
}

.welcome-section .illustration img {
    width: 100%;
    height: auto;
}

.welcome-section .welcome-text {
    text-align: center;
}

.welcome-section .welcome-text h1 {
    font-size: 2.5em;
    color: black;
    margin-bottom: 20px;
    font-family: "Poppins", sans-serif;
}

.welcome-section .welcome-text .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #165072;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    font-family: "Poppins", sans-serif;
}

footer {
    text-align: center;
    padding: 10px;
    width: 100%;
    position: fixed;
    bottom: 0;
}

    </style>


