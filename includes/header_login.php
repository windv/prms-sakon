<?php
session_start();
@$session_id = session_id();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $page_name ?> || PRMS SAKON</title>
    <meta content="ระบบกองทุนฟื้นฟูสมรรถภาพ สกลนคร" name="description">
    <meta content="ระบบกองทุนฟื้นฟูสมรรถภาพ, สกลนคร" name="keywords">

    <link href="imgs/favicon.png" rel="icon">

    <link href='https://fonts.googleapis.com/css?family=Kanit:300&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/all.min.css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <!-- Template Main CSS File -->
    <link href="assets/main/style.css?v=<?= rand(10000, 99999) ?>" rel="stylesheet">
    <style>
        body,
        .sweet-alert , h2 {
            font-family: 'Kanit', sans-serif;
        }
    </style>


</head>

<div id="preloader"></div>

<body style="background-image: url(imgs/bg_1900.png);height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">


    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
            <small><i class="icofont-cubes"></i> ระบบบริหารจัดการกองทุนฟื้นฟูสมรรถภาพ-สกลนคร</small>
            </div>
        </div>
    </div>
    <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
    <a href="./" class="logo me-auto"><i class="icofont-cubes"></i> <small><small>ระบบบริหารจัดการกองทุนฟื้นฟูสมรรถภาพ-สกลนคร</small></small></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="./"><i class="icofont-ui-home"></i> Home</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header>