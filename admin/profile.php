<?php
$page_name = 'Profile';
$page_active = 'profile';
$page_current = 'profile';
require_once 'includes/header.php';


?>
<!-- page content -->
<div class="right_col" role="main">

  <div class="row">


    <div class="x_content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Profile</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong>ชื่อผู้ใช้งาน</strong>

          <p class="text-muted">
            <?= $dataUser['username'] ?> 
          </p>
          <hr>

          <strong>ชื่อ-นามสกุล</strong>
          <p class="text-muted">
            <?= $dataUser['prefix_name'].$dataUser['u_fname']. ' '.$dataUser['u_lname'] ?> 
          </p>

          <hr>
          <strong>หมายเลขโทรศัพท์</strong>
          <p class="text-muted"><?= $dataUser['u_tel'] ?></p>

          <hr>
          <strong>อีเมล</strong>
          <p class="text-muted"><?= $dataUser['u_email'] ?></p>
          





         
        </div>
        <!-- /.card-body -->
      </div>



    </div>
  </div>

</div>





<?php
require_once 'includes/footer.php'
?>