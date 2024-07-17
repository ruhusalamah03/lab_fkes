<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>lebfkes Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">

    <div class="container">

                <div class="row justify-content-center gradient-bg">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="img/logo.png" alt="Login" class="img-fluid custom-logo">
                                <span class="align-self-center ml-1 small-text">Sistem Laboratorium Kesehatan UMMI </title>
                                </span>
                                
                                <img src="img/logo3.png" alt="Logo3" class="img-fluid your-custom-logo ml-3">
                                <hr class="align-self-center ml-1 small-text">Log in untuk mendapatkan barang yang dibutuhkan
                                </hr>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Selamat datang</h1>
                            </div>
                            <form class="user">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Nama...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Kata Sandi">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">ingatkan saya</label>
                                    </div>
                                </div>
                                <a href="<?=('labfkes');?>" class="btn btn-primary btn-user btn-block">
                                    masuk
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>COPYRIGHT © 2024 Leb Fkes</p>
    </footer>
</div>

<style>
    .custom-logo{
        width: 60px; /* Adjust the width as needed */
        height: auto;
        
    }
    .bg-login-image {
        display: flex;
        align-items: center; /* Align items vertically centered */
        justify-content: flex-start; /* Align items to the left */
        padding: 50px; /* Adjust padding as needed */
        width: 70px; /* Adjust the width as needed */
        height: auto;
    }
    .small-text {
        margin-left: 10px; /* Space between image and text */
        font-size: 0.9em; /* Adjust font size to make it smaller */
        line-height: 1; /* Adjust line height for better spacing */
        color: black; /* Set the text color to black */
        font-family: 'Arial', sans-serif; /* Change the font family */
        font-weight: 600; /* Slightly bold the text */
    }
    .gradient-bg {
        background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);
        /* Adjust the angle and colors as needed */
        padding: 20px;
        border-radius: 10px;
    }
</style>

