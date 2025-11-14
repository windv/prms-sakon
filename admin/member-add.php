<?php
$page_name = 'สมาชิก';
$page_active = 'member';
$page_current = 'member';
require_once 'includes/header.php';


?>
<!-- page content -->
<div class="right_col" role="main">

  <div class="row">


    <div class="x_content">

      <h4> <b><i class="fa fa-user"></i> เพิ่มข้อมูลสมาชิก</b></h4>

      <div class="card">
        <div class="card-body">
          <div class="mb-2">
            <form action="">
              <input type="hidden" id="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
              <i>ข้อมูลผู้ใช้งาน</i>
              <hr class="mt-0">

              <div class="form-group">
                <label for="prefix_name" class="mb-0">ชื่อ</label>
                <input type="text" name="prefix_name" class="form-control" id="prefix_name" placeholder="ระบุชื่อ">
              </div>
              <div class="form-group">
                <label for="first_name" class="mb-0">ชื่อ</label>
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="ระบุชื่อ">
              </div>
              <div class="form-group">
                <label for="last_name" class="mb-0">นามสกุล</label>
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="ระบุนามสกุล">
              </div>
              <div class="form-group">
                <label for="role" class="mb-0">บทบาท</label>
                <select name="role" id="role" class="form-control">
                  <option value="" selected disabled>-เลือกบทบาท-</option>
                  <?php
                  $stmt = $conn->prepare("SELECT * FROM ref_role ORDER BY r_id ASC");
                  $stmt->execute();
                  $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($roles as $role) {
                    
                    echo "<option value='" . htmlspecialchars($role['r_id']) . "'>" . htmlspecialchars($role['r_name']) . "</option>";
                  }
                  ?>
                </select>
              </div>

              <i>ข้อมูลการเข้าใช้งานระบบ</i>
              <hr class="mt-0">
              <div class="form-group">
                <label for="username" class="mb-0">ชื่อผู้ใช้งาน</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="ระบุชื่อผู้ใช้งาน">
              </div>
              <div class="form-group">
                <label for="password" class="mb-0">รหัสผ่าน</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="ระบุรหัสผ่าน">
              </div>
              <div class="form-group">
                <label for="confirmpassword" class="mb-0">ยืนยันรหัสผ่าน</label>
                <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" placeholder="ยืนยันรหัสผ่าน">
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <button class="btn btn-primary" type="submit" id="btnSave" name="btnSave"><i class="fa fa-save"></i> บันทึก</button>
                  <a class="btn btn-secondary" href="member" role="button"><i class="fa fa-times"></i> ยกเลิก</a>
                </div>
              </div>
            </form>
          </div>



        </div>
      </div>




    </div>
  </div>

</div>





<?php
require_once 'includes/footer.php'
?>

<script>

  $(document).ready(function() {
    $('#btnSave').on('click', function(e) {
      e.preventDefault()

      $(".form-control").removeClass("is-invalid")

      if ($('#prefix_name').val() === null) {
        $('#prefix_name').addClass('is-invalid')
        toastr.error('เลือกประเภทหนังสือรับเข้า', toastr.options = {
          "closeButton": true,
          "timeOut": "3000"
        })
        return;
      }

      if ($('#first_name').val() === '') {
        $('#first_name').addClass('is-invalid')
        toastr.error('กรุณาระบุชื่อ', toastr.options = {
          "closeButton": true,
          "timeOut": "3000"
        })
        return;
      }

      if ($('#last_name').val() === '') {
        $('#last_name').addClass('is-invalid')
        toastr.error('กรุณาระบุนามสกุล', toastr.options = {
          "closeButton": true,
          "timeOut": "3000"
        })
        return;
      }

      if ($('#role').val() === '') {
        $('#role').addClass('is-invalid')
        toastr.error('ระบุบทบาท', toastr.options = {
          "closeButton": true,
          "timeOut": "3000"
        })
        return;
      }

      let username = $('#username').val().trim();
      if (username === '') {
        $('#username').addClass('is-invalid');
        toastr.error('กรุณาระบุชื่อผู้ใช้งาน');
        return;
      } else if (!/^[a-zA-Z0-9_]+$/.test(username)) {
        $('#username').addClass('is-invalid');
        toastr.error('ชื่อผู้ใช้งานต้องเป็นภาษาอังกฤษหรือตัวเลขเท่านั้น');
        return;
      }

      // ตรวจสอบ password
      let password = $('#password').val();
      let confirmPassword = $('#confirmpassword').val();

      if (password === '') {
        $('#password').addClass('is-invalid');
        toastr.error('กรุณาระบุรหัสผ่าน');
        return;
      } else if (password.length < 6) {
        $('#password').addClass('is-invalid');
        toastr.error('รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร');
        return;
      }

      if (confirmPassword === '') {
        $('#confirmpassword').addClass('is-invalid');
        toastr.error('กรุณายืนยันรหัสผ่าน');
        return;
      }

      if (password !== confirmPassword) {
        $('#confirmpassword').addClass('is-invalid');
        toastr.error('รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน');
        return;
      }

      let formData = new FormData();
      formData.append('csrf_token', $('#csrf_token').val());
      formData.append('prefix_name', $('#prefix_name').val());
      formData.append('first_name', $('#first_name').val());
      formData.append('last_name', $('#last_name').val());
      formData.append('role', $('#role').val());
      formData.append('username', username);
      formData.append('password', password);

      Swal.fire({
        title: 'ยืนยัน?',
        text: "ต้องการเพิ่มสมาชิกหรือไม่",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก'
      }).then((result) => {
        if (result.isConfirmed) {
          // ✅ ส่งข้อมูลผ่าน AJAX
          $.ajax({
            url: 'services/member_add.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              if (response.status === 'success') {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  html: response.message,
                  confirmButtonText: 'ตกลง'
                }).then(() => {
                  location.href = "member-detail?id=" + response.id
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  html: response.message,
                  confirmButtonText: 'ตกลง'
                });
              }
            },
            error: function() {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้',
                confirmButtonText: 'ตกลง'
              });
            }
          });
        }
      });
    });
  });
</script>