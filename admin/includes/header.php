<?php
require_once '../includes/connect_db.php';
require_once '../includes/function.php';
require_once 'includes/authen.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/x-icon" href="../images/favicon.png" />

   <title><?= @$page_name ?> || PRMS</title>

   <!-- Bootstrap -->
   <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Font Awesome -->
   <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <!-- NProgress -->
   <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
   <!-- iCheck -->
   <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

   <!-- bootstrap-progressbar -->
   <link href="../assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
   <!-- JQVMap -->
   <link href="../assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
   <!-- bootstrap-daterangepicker -->
   <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

   <!-- Custom Theme Style -->
   <link href="../assets/build/css/custom.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="../assets/vendors/datatable/jquery.dataTables.min.css">
   <link href="../assets/vendors/toastr/toastr.css" rel="stylesheet" media="all">
   <link href="../assets/vendors/datepicker/datepicker.css" rel="stylesheet" media="screen">
   <link href="../assets/vendors/selectpicker/bootstrap-select.css" rel="stylesheet">
   <link href="../assets/custom.css" rel="stylesheet">

   <style>
      @keyframes bounce {

         0%,
         100% {
            transform: translateY(0);
         }

         50% {
            transform: translateY(-5px);
         }
      }

      .badge-bounce {
         animation: bounce 1s infinite;
      }
   </style>

</head>

<body class="nav-md">
   <div class="container body">
      <div class="main_container">
         <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
               <div class="navbar nav_title text-center" style="border: 0;">
                  <a href="./" class="site_title">PRMS SAKON</a>
               </div>

               <div class="clearfix"></div>

               <!-- menu profile quick info -->
               <div class="profile clearfix">
                  <div class="profile_pic">
                     <img src="../images/user_bank.png" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                     <span>สวัสดี,</span>
                     <h2><?= $dataUser['first_name'] . ' ' . $dataUser['last_name'] ?></h2>
                  </div>
               </div>

               <!-- sidebar menu <i class="fas fa-sort-amount-up-alt"></i> -->
               <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                     <ul class="nav side-menu">
                        <li class="<?php if ($page_active == 'dashboard') echo 'current-page'; ?>">
                           <a href="./">
                              <i class="fa fa-tachometer"></i> Dashboard
                           </a>
                        </li>



                        <li class="<?php if ($page_active == 'equipment') echo 'current-page'; ?>">
                           <a href="equipment">
                              <i class="fa fa-wheelchair-alt"></i> อุปกรณ์ช่วยเหลือ
                           </a>
                        </li>
                        <li class="<?php if ($page_active == 'durable') echo 'current-page'; ?>">
                           <a href="durable">
                              <i class="fa fa-list-alt"></i> รายการครุภัณฑ์
                           </a>
                        </li>
                        <li class="<?php if ($page_active == 'member') echo 'current-page'; ?>">
                           <a href="member">
                              <i class="fa fa-users"></i> สมาชิก
                           </a>
                        </li>

                        <li>
                           <a href="javascript:void(0);" onclick="logoutConfirm();">
                              <i class="fa fa-sign-out"></i> ออกจากระบบ
                           </a>
                        </li>

                     </ul>
                  </div>


               </div>
               <!-- /sidebar menu -->

            </div>
         </div>

         <!-- top navigation -->
         <div class="top_nav">
            <div class="nav_menu">
               <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i> </a>
               </div>

               <nav class="nav navbar-nav">
                  <ul class=" navbar-right">
                     <li class="nav-item dropdown open" style="padding-left: 15px;">

                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                           <img src="../images/user_bank.png" alt=""><?= $dataUser['first_name'] . ' ' . $dataUser['last_name'] ?>
                        </a>
                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="profile"><i class="fa fa-user"></i> โปรไฟล์</a>


                           <button class="dropdown-item" href="javascript:void(0);" onclick="logoutConfirm();"><i class="fa fa-sign-out"></i> ออกจากระบบ</button>
                        </div>
                     </li>



                  </ul>
               </nav>
            </div>
         </div>
         <!-- /top navigation -->