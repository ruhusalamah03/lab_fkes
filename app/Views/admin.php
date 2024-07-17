<?=$this->extend('layout')?>
<?=$this->section('bodycontent')?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    
</head>
<body>
<main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=<?=('labfkes');?>>Beranda</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img class="img-profile rounded-circle"src="img/sarah.png"> 
                            <h2>Sarah Syakira Rambe</h2>
                            <h3>Laboran Fakultas Kesehatan</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a target="_blank" rel="nofollow" href="https://www.facebook.com/fauzanmakarim.rambe"><i class="bi bi-facebook"></i></a>
                                <a target="_blank" rel="nofollow" href="https://www.instagram.com/sarahrambe__/"><i class="bi bi-instagram"></i></a>
                                <a target="_blank" rel="nofollow" href="https://id.linkedin.com/in/sarah-syakira-rambe-117b81222"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Tentang</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ganti Kata Sandi</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    
                                    <h5 class="card-title">Detal Profil</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                        <div class="col-lg-9 col-md-8">Sarah Syakira Rambe</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Instansi</div>
                                        <div class="col-lg-9 col-md-8">Fakultas Kesehatan Univesitas Muhammadiyah Sukabumi</div>
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
                                        <div class="col-lg-9 col-md-8">Caringin,Sukabumi</div>
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

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <form>
                                    <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="assets/img/profile-img.jpg" alt="Profile">
                                        <div class="pt-2">
                                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="fullName" type="text" class="form-control" id="fullName" value="Sarah Syakira">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Instansi</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="company" type="text" class="form-control" id="company" value="Fakultas Kesehatan Universitas Muhammadiyah Sukabumi">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="job" type="text" class="form-control" id="Job" value="Laboran Fakultas Kesehatan">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Kota</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="country" type="text" class="form-control" id="Country" value="Sukabumi">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="address" type="text" class="form-control" id="Address" value="Caringin,Sukabumi">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Nomor Telpon</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/in/sarah-syakira-rambe-117b81222">
                                    </div>
                                    </div>

                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-change-password pt-3" id="profile-change-password">
                                <form>

                                    <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control" id="currentPassword">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                    </div>
                                    </div>

                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                    </from>
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

<style>
        body {
            background-color: #f4f5f7;
            font-family: Arial, sans-serif;
        }
        .pagetitle h1 {
            color: #333;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
        }
        .breadcrumb-item.active {
            color: #6c757d;
        }
        .profile-card {
            background: linear-gradient(to right, #BF4CB4, #2A63F4 86%);
            color: white;
            border-radius: .6rem;
            padding: 20px;
            text-align: center;
        }
        .profile-card img {
            border: 3px solid white;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .profile-card h2 {
            margin-top: 10px;
            font-size: 24px;
        }
        .profile-card h3 {
            font-size: 18px;
            color: #ffe5d9;
        }
        .social-links a {
            color: white;
            margin: 0 10px;
            font-size: 20px;
            transition: color 0.3s;
        }
        .social-links a:hover {
            color: #ffe5d9;
        }
        .card {
            border: none;
            border-radius: .5rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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

<?=$this->endSection()?>
