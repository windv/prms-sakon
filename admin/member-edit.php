<?php
$page_name = 'สมาชิก';
$page_active = 'member';
$page_current = 'member';
require_once 'includes/header.php';

$id = decryptId($_GET['id']);
$sql = "SELECT * FROM tbl_user 
        WHERE tbl_user.user_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([
  'id' => $id
]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
  echo "<script>
        alert('ไม่พบข้อมูล หรือคุณไม่มีสิทธิ์เข้าถึง');
        window.location.href = './';
      </script>";
  exit;
}

?>
<!-- page content -->
<div class="right_col" role="main">

  <div class="row">


    <div class="x_content">


      <div class="card">
        <div class="card-body">
          <div class="mb-2">
            <h4> <b><i class="fa fa-pencil-square-o"></i> แก้ไขข้อมูลสมาชิก</b><i class="fa fa-window-close-o" aria-hidden="true"></i></h4>
            <hr>
            <form action="">
              <input type="hidden" id="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
              <input type="hidden" id="user_id" value="<?= htmlspecialchars($data['user_id']) ?>">
              <div class="form-group">
                <label for="prefix_name" class="mb-0">คำนำหน้าชื่อ</label>
                <input type="text" name="prefix_name" class="form-control" id="prefix_name" placeholder="ระบุชื่อ" value="<?= $data['prefix_name'] ?>">
              </div>
              <div class="form-group">
                <label for="first_name" class="mb-0">ชื่อ</label>
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="ระบุชื่อ" value="<?= $data['first_name'] ?>">
              </div>
              <div class="form-group">
                <label for="last_name" class="mb-0">นามสกุล</label>
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="ระบุนามสกุล" value="<?= $data['last_name'] ?>">
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
                    $selected = ($data['role_id'] == $role['r_id']) ? 'selected' : '';
                    echo "<option value='" . htmlspecialchars($role['r_id']) . "' $selected>" . htmlspecialchars($role['r_name']) . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="status_user" class="mb-0">สถานะ</label>
                <select name="status_user" id="status_user" class="form-control">
                  <option value="" selected disabled>-เลือกสถานะ-</option>
                  <option value="0" <?php if ($data['status_user'] === '0') echo 'selected'; ?>>ระงับ</option>
                  <option value="1" <?php if ($data['status_user'] === '1') echo 'selected'; ?>>ใช้งาน</option>
                </select>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <button class="btn btn-primary" type="submit" id="btnSave" name="btnSave"><i class="fa fa-save"></i> บันทึก</button>
                  <a class="btn btn-secondary" href="member-detail?id=<?= encryptId($data['user_id']) ?>" role="button"><i class="fa fa-times"></i> ยกเลิก</a>
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
        toastr.error('กรุณาระบุคำนำหน้าชื่อ', toastr.options = {
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
        toastr.error('กรุณาระบุบทบาท', toastr.options = {
          "closeButton": true,
          "timeOut": "3000"
        })
        return;
      } 

      if ($('#status_user').val() === '') {
        $('#status_user').addClass('is-invalid')
        toastr.error('กรุณาระบุสถานะ', toastr.options = {
          "closeButton": true,
          "timeOut": "3000"
        })
        return;
      }

     
      let formData = new FormData();
      formData.append('csrf_token', $('#csrf_token').val());
      formData.append('user_id', $('#user_id').val());
      formData.append('prefix_name', $('#prefix_name').val());
      formData.append('first_name', $('#first_name').val());
      formData.append('last_name', $('#last_name').val());
      formData.append('role', $('#role').val());
      formData.append('status_user', $('#status_user').val());

      Swal.fire({
        title: 'ยืนยัน?',
        text: "ต้องการแก้ไขข้อมูลสมาชิกหรือไม่",
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
            url: 'services/member_edit.php',
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