<?=$this->extend('layout')?>
<?=$this->section('bodycontent')?>

    <body>
            
        <div class="category-name">INFORMASI</div> <br/>
            
        <div class="card-category-1">
            
            <div class="basic-card basic-card-aqua">
                <div class="card-content">
                    <span class="card-title">VISI</span>
                    <p class="card-text">
                    Terwujudnya Fakultas Kesehatan yang unggul dalam keilmuan kesehatan dan keislaman pada tahun 2042.
                    </p>
                </div>
            </div>

            <div class="basic-card basic-card-lips">
                <div class="card-content">
                    <span class="card-title">MISI</span>
                    <p class="card-text">
                    1. Menyelenggarakan pendidikan tinggi  kesehatan yang terbuka, mandiri  berdasarkan Al-Islam dan Kemuhammadiyahan.
                    </p>
                </div>

                <div class="card-link">
               <a target="_blank" rel="nofollow" href="https://ummi.ac.id/id/fakultas/kesehatan">lihat lebih detail</a>
                </div>
            </div>

            <div class="basic-card basic-card-aqua">
                <div class="card-content">
                    <span class="card-title">Tujuan</span>
                    <p class="card-text">
                    Terselenggaranya layanan akademik yang berkualitas serta proses pembelajaran yang bermutu berdasarkan hasil-hasil penelitian ilmiah yang akurat dan mutakhir.
                    </p>
                </div>

                <div class="card-link">
                <a target="_blank" rel="nofollow" href="https://fkes.ummi.ac.id/p/1-visi-misi-dan-tujuan">lihat lebih detail</a>
                </div>
            </div>

            <div class="basic-card basic-card-lips">
                <div class="card-content">
                    <span class="card-title">Sejarah</span>
                    <p class="card-text">
                    Fakultas Kesehatan UMMI didirikan untuk merespon kebutuhan masyarakat terhadap pendidikan khususnya dalam bidang kesehatan. 
                    Fakultas Kesehatan UMMI lahir pada tanggal 16 Mei 2019 sesuai SK Rektor No. 753/KEP/I.0/C/2019 yang terdiri dari dua Program Studi yaitu Program Studi Diploma-III Keperawatan, dan Program Studi Pendidikan Profesi Ners..
                    </p>
                </div>

                <div class="card-link">
                <a target="_blank" rel="nofollow" href="https://fkes.ummi.ac.id/p/4-sejarah">lihat lebih detail</a>
                </div>
            </div>
        </div>
        
        <br/>
 <style>
        @keyframes down-btn {
    0% { bottom:20px; }    
    100% { bottom:0px; }

    0% { opacity:0; }    
    100% { opaicty:1; }
}

@-webkit-keyframes down-btn {
    0% { bottom:20px; }    
    100% { bottom:0px; }

    0% { opacity:0; }    
    100% { opaicty:1; }
}

@-moz-keyframes down-btn {
    0% { bottom:20px; }    
    100% { bottom:0px; }

    0% { opacity:0; }    
    100% { opaicty:1; }
}

@-o-keyframes down-btn {
    0% { bottom:20px; }    
    100% { bottom:0px; }

    0% { opacity:0; }    
    100% { opaicty:1; }
}

body {
    margin:0;
}

.category-name {
    font-family: sans-serif;
    width: -webkit-fill-available;
    text-align: center;
    font-size: 40px;
}

.card-category-2 ul, .card-category-3 ul, .card-category-4 ul, .card-category-5 ul  .card-category-6 ul {
    padding: 0;
}
    
.card-category-2 ul li, .card-category-3 ul li, .card-category-4 ul li, .card-category-5 ul li, .card-category-6 ul li {
    list-style-type: none;
    display: inline-block;
    vertical-align: top;
}

.card-category-2 ul li, .card-category-3 ul li {
    margin: 10px 5px;
}

.card-category-1, .card-category-2, .card-category-3, .card-category-4, .card-category-5, .card-category-6 {
    font-family: sans-serif;
    margin-bottom: 45px;
    text-align: center;
}
    .card-category-1 div, .card-category-2 div {
        display:inline-block;
    }

    .card-category-1 > div, .card-category-2 > div:not(:last-child) {
        margin: 10px 5px;
        text-align: left;
    }

    /* Basic Card */
    .basic-card {
        width:300px;
        position: relative;
        
        -webkit-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.3);
        -o-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.3);
        box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.3);
    }
    
        .basic-card .card-content {
            padding: 30px;
        }

        .basic-card .card-title {
            font-size: 25px;
            font-family: 'Open Sans', sans-serif;
        }

        .basic-card .card-text {
            line-height: 1.6;
        }

        .basic-card .card-link {
            padding: 25px;
            width: -webkit-fill-available;
        }

            .basic-card .card-link a {
                text-decoration: none;
                position: relative;
                padding: 10px 0px;
            }

            .basic-card .card-link a:after {
                top: 30px;
                content: "";
                display: block;
                height: 2px;
                left: 50%;
                position: absolute;
                width: 0;

                -webkit-transition: width 0.3s ease 0s, left 0.3s ease 0s;
                -moz-transition: width 0.3s ease 0s, left 0.3s ease 0s;
                -o-transition: width 0.3s ease 0s, left 0.3s ease 0s;
                transition: width 0.3s ease 0s, left 0.3s ease 0s;
            }

            .basic-card .card-link a:hover:after { 
                width: 100%; 
                left: 0; 
            }
    
    
    .basic-card-aqua {
        background-image: linear-gradient(to bottom right, #6D93F7, #99a3d4);
    }

        .basic-card-aqua .card-content, .basic-card .card-link a {
            color: #fff;
        }
        
        .basic-card-aqua .card-link {
            border-top:1px solid #82c1bb;
        }

            .basic-card-aqua .card-link a:after {
                background:#fff;
            }

    .basic-card-lips {
        background-image: linear-gradient(to bottom right, #6D93F7, #99a3d4);
    }

        .basic-card-lips .card-content {
            color: #fff;
        }

        .basic-card-lips .card-link {
            border-top: 1px solid #ff97ba;
        }

            .basic-card-lips .card-link a:after {
                background:#fff;
            }
    
        </style>

<?=$this->endSection()?>