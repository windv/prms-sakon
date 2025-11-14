<?php
$page_name = 'Dashboard';
$page_active = 'Dashboard';
require_once 'includes/header.php';

/*
 * หมายเหตุ: 
 * ข้อมูลตัวเลขในหน้านี้ (เช่น 1,250, 350) เป็นเพียงตัวอย่าง (Mockup Data)
 * ในการใช้งานจริง คุณจะต้องเขียน PHP เพื่อดึงข้อมูลจริงจาก Database มาแสดงแทนที่
 */
$count_patients = 1250; // ตัวอย่าง: ดึงมาจาก DB
$count_requests = 350;  // ตัวอย่าง: ดึงมาจาก DB
$count_pending = 15;   // ตัวอย่าง: ดึงมาจาก DB
$total_budget = 5000000; // ตัวอย่าง: ดึงมาจาก DB
?>

<div class="right_col" role="main">

  <div class="page-title">
    <div class="title_left">
      <h3>PRMS SAKON NAKHON</h3>
      <h4>ระบบบริหารจัดการกองทุนฟื้นฟูสมรรถภาพ จังหวัดสกลนคร</h4>
    </div>
    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="ค้นหา...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <div class="count"><?php echo number_format($count_patients); ?></div>
        <h3>ผู้รับบริการทั้งหมด</h3>
        <p>จำนวนผู้ลงทะเบียนในระบบ</p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-file-text-o"></i></div>
        <div class="count"><?php echo number_format($count_requests); ?></div>
        <h3>คำขอทั้งหมด</h3>
        <p>จำนวนคำขอรับบริการ/โครงการ</p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-clock-o"></i></div>
        <div class="count"><?php echo number_format($count_pending); ?></div>
        <h3>รอการอนุมัติ</h3>
        <p>รายการที่รอการตรวจสอบ</p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-money"></i></div>
        <div class="count"><?php echo number_format($total_budget); ?></div>
        <h3>งบประมาณ (บาท)</h3>
        <p>งบประมาณรวมประจำปี</p>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">

    <div class="col-md-8 col-sm-8 col-xs-12">
      
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-list-alt"></i> รายการคำขอล่าสุด</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>ชื่อผู้ยื่นคำขอ</th>
                <th>ประเภทคำขอ</th>
                <th>วันที่</th>
                <th>สถานะ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>นายสมชาย ใจดี</td>
                <td>ขอรับอุปกรณ์</td>
                <td>10/11/2025</td>
                <td><span class="badge" style="background-color: #f0ad4e;">รอตรวจสอบ</span></td>
              </tr>
              <tr>
                <td>2</td>
                <td>นางสมหญิง อารี</td>
                <td>โครงการปรับสภาพบ้าน</td>
                <td>09/11/2025</td>
                <td><span class="badge" style="background-color: #5cb85c;">อนุมัติ</span></td>
              </tr>
              <tr>
                <td>3</td>
                <td>อบต. ดงมะไฟ</td>
                <td>โครงการชุมชน</td>
                <td>08/11/2025</td>
                <td><span class="badge" style="background-color: #5cb85c;">อนุมัติ</span></td>
              </tr>
              <tr>
                <td>4</td>
                <td>นายมีชัย สามารถ</td>
                <td>ขอรับอุปกรณ์</td>
                <td>08/11/2025</td>
                <td><span class="badge" style="background-color: #d9534f;">ไม่อนุมัติ</span></td>
              </tr>
            </tbody>
          </table>
          <div class="text-right">
            <a href="all_requests.php">ดูรายการคำขอทั้งหมด <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-bar-chart"></i> ภาพรวมงบประมาณ</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <h4 class="text-center" style="padding: 40px 0; color: #999;">
            [ พื้นที่สำหรับแสดงกราฟสรุปงบประมาณ ]
          </h4>
        </div>
      </div>

    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
      
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-rocket"></i> เมนูลัด (Quick Actions)</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="list-group">
            <a href="new_request.php" class="list-group-item">
              <i class="fa fa-plus-circle"></i> สร้างคำขอใหม่
            </a>
            <a href="approve_list.php" class="list-group-item">
              <i class="fa fa-check-square-o"></i> อนุมัติรายการ (<?php echo $count_pending; ?>)
            </a>
            <a href="search_patient.php" class="list-group-item">
              <i class="fa fa-user-plus"></i> ค้นหา/เพิ่ม ผู้รับบริการ
            </a>
            <a href="reports.php" class="list-group-item">
              <i class="fa fa-file-pdf-o"></i> ออกรายงาน
            </a>
          </div>
        </div>
      </div>

      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-bell"></i> การแจ้งเตือน</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <ul class="list-unstyled msg_list">
            <li>
              <a>
                <span class="image"><i class="fa fa-user fa-2x"></i></span>
                <span>
                  <span>นายสมชาย</span>
                  <span class="time">3 นาทีที่แล้ว</span>
                </span>
                <span class="message">
                  ส่งคำขอรับอุปกรณ์ใหม่...
                </span>
              </a>
            </li>
            </ul>
        </div>
      </div>

    </div>
  </div>
</div>
<?php
require_once 'includes/footer.php';
?>