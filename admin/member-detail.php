<?php
$page_name = 'สมาชิก';
$page_active = 'member';
$page_current = 'member';
require_once 'includes/header.php';

$id = decryptId($_GET['id']);
$sql = "SELECT * FROM tbl_user 
        LEFT JOIN ref_role ON tbl_user.role_id = ref_role.r_id
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

if ($data['status_user'] == 0) {
  $status_user = '<span class="badge badge-danger">ระงับ</span>';
} else if ($data['status_user'] == 1) {
  $status_user = '<span class="badge badge-success">ใช้งาน</span>';
} else if ($data['status_user'] == 2) {
  $status_user = '<span class="badge badge-warning">รออนุมัติ</span>';
} else {
  $status_user = '<span class="badge badge-secondary">-</span>';
}

$user_id = encryptId($data['user_id']);
$csrf_token = $_SESSION['csrf_token'];
$name_user = $data['prefix_name'] . $data['first_name'] . ' ' . $data['last_name'];
?>
<!-- page content -->
<div class="right_col" role="main">

  <div class="row">


    <div class="x_content">

      <h4><i class="fa fa-user"></i> Member</h4>
      <div class="card">
        <div class="card-body">
          <div class="mb-2">
            <h4> <b><i class="fa fa-table "></i> ข้อมูลสมาชิก</b></h4>
          </div>
          <table class="table table-sm">
            <tbody>
              <tr>
                <td class="table-active" style="text-align: right; width: 30%;">ชื่อผู้ใช้งาน</td>
                <td><?= $data['username'] ?></td>
              </tr>
              <tr>
                <td class="table-active" style="text-align: right;">ชื่อ-นามสกุล</td>
                <td>
                  <?php
                  echo $name_user ?>
                </td>
              </tr>
              <tr>
                <td class="table-active" style="text-align: right;">บทบาท</td>
                <td><?= $data['r_name'] ?></td>
              </tr>
              <tr>
                <td class="table-active" style="text-align: right;">สถานะ</td>
                <td><?= $status_user ?></td>
              </tr>
              
            </tbody>
          </table>

          <a href="member" class="btn btn-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> ย้อนกลับ</a>

            <a href="member-edit?id=<?= encryptId($data['user_id']) ?>" class="btn btn-warning text-dark"><i class="fa fa-pencil"></i> แก้ไข</a>



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
    $('#btnApprove').on('click', function(e) {
      e.preventDefault()

      $(".form-control").removeClass("is-invalid")

      let user_id = "<?= $user_id ?>";
      let csrf_token = "<?= $csrf_token ?>";
      let name_user = "<?= $name_user ?>";

      Swal.fire({
        title: 'ยืนยัน',
        html: "ต้องการอนุมัติผู้ใช้งาน " + name_user + " หรือไม่?",
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'ต้องการ',
        cancelButtonText: 'ยกเลิก'
      }).then((result) => {
        if (result.isConfirmed) {

          let formData = new FormData();
          formData.append('csrf_token', csrf_token);
          formData.append('user_id', user_id);

          $.ajax({
            url: 'services/member_approve.php',
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

    })
  })
</script>