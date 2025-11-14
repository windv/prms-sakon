<?php
$page_name = 'สมาชิก';
$page_active = 'member';
$page_current = 'member';
require_once 'includes/header.php';
?>

<div class="right_col" role="main">

  <div class="row">
    <div class="x_content">
      <input type="hidden" id="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0"><i class="fa fa-users"></i> สมาชิก</h4>
        <a href="member-add" class="btn btn-primary"><i class="fa fa-plus-circle"></i> เพิ่มสมาชิก</a>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover w-100" id="dataTable">
              <thead>
                <tr>
                  <th>ชื่อผู้ใช้งาน</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>บทบาท</th>
                  <th>สถานะ</th>
                  <th>จัดการ</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?php
require_once 'includes/footer.php'
?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable({
      'serverSide': true,
      'processing': true,
      'paging': true,
      'order': [],
      "ordering": false,
      "autoWidth": false,
      'ajax': {
        'url': 'services/member_data.php', // ไฟล์นี้ต้องมีอยู่จริง
        'type': 'post',
        data: {
          csrf_token: $('#csrf_token').val()
        }
      },
      columnDefs: [{
        className: 'text-center',
        // ⭐️ หมายเหตุ: ถ้าคุณอยากให้ text-center
        // ใช้แค่บางคอลัมน์ ให้ระบุ targets
        // เช่น targets: [ 2, 3, 4 ] (บทบาท, สถานะ, จัดการ)
        targets: '_all' // ใช้ '_all' ถ้าต้องการทุกคอลัมน์
      }, ],
      "language": {
        "processing": '<i class="icofont-spinner-alt-3 rotate"></i> กำลังโหลดข้อมูล...',
        "emptyTable": "- ไม่พบข้อมูล -",
        "paginate": {
          "previous": "ก่อนหน้า",
          "next": "ถัดไป"
        }
      },
      search: {
        return: true,
      },
      "renderer": "bootstrap"
    });
  });
</script>