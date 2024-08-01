<?= $this->extend('admin/layout') ?>
<?= $this->section('bodycontent') ?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"> -->
    <style>
        /* Styling yang dibutuhkan */
        body {
            background-color: #f4f5f7;
            font-family: Arial, sans-serif;
        }

        .profile-card {
            background: linear-gradient(to right, #BF4CB4, #2A63F4 86%);
            color: white;
            border-radius: .6rem;
            padding: 23px;
            text-align: center;
            margin: 10px 20px;
        }

        .profile-card img {
            border: 3px solid white;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .profile-card h2 {
            margin-top: 23px;
            font-size: 24px;
        }

        .profile-card h3 {
            font-size: 18px;
            color: #ffe5d9;
        }

        .card {
            border: none;
            border-radius: .5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .nav-tabs .nav-link {
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .nav-tabs .nav-link:hover {
            background-color: #0056b3;
            color: white;
        }

        .profile-overview .row {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
            color: #333;
        }

        .profile-overview p {
            color: #6c757d;
        }

        .card-title {
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
<!-- </head> -->

<body>
    <main id="main" class="main">
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div>

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img class="img-profile rounded-circle" src="<?= base_url('img/Sarah.png') ?>">
                            <h2>Sarah Syakira Rambe</h2>
                            <h3>Laboran Fakultas Kesehatan</h3>
                            <!-- <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a target="_blank" rel="nofollow" href="https://www.facebook.com/fauzanmakarim.rambe"><i class="bi bi-facebook"></i></a>
                                <a target="_blank" rel="nofollow" href="https://www.instagram.com/sarahrambe__/"><i class="bi bi-instagram"></i></a>
                                <a target="_blank" rel="nofollow" href="https://id.linkedin.com/in/sarah-syakira-rambe-117b81222"><i class="bi bi-linkedin"></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Tentang</button>
                                </li>
                            </ul> -->
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                        <div class="col-lg-9 col-md-8">Sarah Syakira Rambe</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Instansi</div>
                                        <div class="col-lg-9 col-md-8">Fakultas Kesehatan Universitas Muhammadiyah Sukabumi</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Pekerjaan</div>
                                        <div class="col-lg-9 col-md-8">Laboran Fakultas Kesehatan</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Kota</div>
                                        <div class="col-lg-9 col-md-8">Sukabumi</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                                        <div class="col-lg-9 col-md-8">Caringin, Sukabumi</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nomor Telpon</div>
                                        <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">Sarahrambe@example.com</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?= $this->endSection() ?>
