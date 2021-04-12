<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('vendor/sblanding/') ?>assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('vendor/sblanding/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('/vendor/sblanding/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('/vendor/sblanding/') ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url('/vendor/sblanding/') ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url('/vendor/sblanding/') ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('vendor/sblanding/') ?>assets/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container">

            <div class="logo float-left">
                <h1 class="text-light"><a href="<?= base_url('landing') ?>"><span>Toko Online</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?= base_url('landing') ?>">Home</a></li>
                    <li><a href="#team">Our Product</a></li>
                    <li class="drop-down"><a href="#team">Category</a>
                        <ul>
                            <li><a href="<?=base_url('kategori/elektronik')?>">Elektronik</a></li>
                            <li><a href="<?=base_url('kategori/accessories')?>">Accessories</a></li>
                            <li><a href="<?=base_url('kategori/pakaian_anak')?>">Pakaian Anak</a></li>
                            <li><a href="<?=base_url('kategori/olahraga')?>">Olahraga</a></li>
                        </ul>
                    </li>
                    <li style=" margin-right: 10px;"><a href="#contact"> <i class="icofont-headphone-alt"></i>&nbsp;TokoBantuan</a></li>
                    <li style=" margin-left: 20px;"><a href="<?= base_url('Auth/register/') ?>" class="btn btn-success mr-2 mb-2" style="border-radius: 15px;">Register</a></li>
                    <li style=" margin-right: 10px;"><a href="<?= base_url('Auth/index/') ?>" class="btn btn-primary mr-2" style="border-radius: 15px;">Login</a></li>

                    
                    
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End #header -->