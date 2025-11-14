<?php
header('Content-Type: application/json');

require '../../includes/connect_db.php';
require '../../includes/function.php';
require '../includes/authen.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo json_encode(['status' => 0, 'message' => 'Invalid CSRF token']);
        exit;
    }

    $requestData = $_POST;

    $search_value = '';
    $queryParams = [];

    $sql_base = "FROM tbl_user 
                
             ";

    // นับ total ทั้งหมด (ไม่กรอง)
    $stmt = $conn->prepare("SELECT COUNT(*) $sql_base");
    $stmt->execute();
    $totalData = $stmt->fetchColumn();

    // กรองคำค้น
    if (!empty($_POST['search']['value'])) {
        $search_value = "%" . $_POST['search']['value'] . "%";
        $sql_base .= " WHERE tbl_user.username LIKE :search_value OR tbl_user.first_name LIKE :search_value OR tbl_user.last_name LIKE :search_value";
        $queryParams[':search_value'] = $search_value;
    }

    // นับ recordsTotal
    $stmt = $conn->prepare("SELECT COUNT(*) $sql_base");
    foreach ($queryParams as $param => $value) {
        $stmt->bindValue($param, $value, PDO::PARAM_STR);
    }
    $stmt->execute();
    $totalFiltered = $stmt->fetchColumn(); // ใช้ fetchColumn() แทน rowCount()

    // ดึงข้อมูลจริงพร้อม limit
    $sql = "SELECT * $sql_base
        ORDER BY tbl_user.u_id DESC LIMIT :start, :length";
    $stmt = $conn->prepare($sql);
    // echo $sql;
    // bind parameters
    foreach ($queryParams as $param => $value) {
        $stmt->bindValue($param, $value, PDO::PARAM_STR);
    }
    $start = (int)$_POST['start'];
    $length = (int)$_POST['length'];
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
    $stmt->bindValue(':length', $length, PDO::PARAM_INT);
    $stmt->execute();

    $data = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    
        if ($row['u_status'] == 0) {
            $u_status = '<span class="badge badge-danger">ระงับ</span>';
        } else if ($row['u_status'] == 1) {
            $u_status = '<span class="badge badge-success">ใช้งาน</span>';
        } else if ($row['u_status'] == 2) {
            $u_status = '<span class="badge badge-warning">รออนุมัติ</span>';
        } else {
            $u_status = '<span class="badge badge-secondary">-</span>';
        }

        $role = '';
        if($row['u_type'] == 1){
            $role = 'Admin';
        }else if($row['u_type'] == 2){
            $role = 'Member';
        }



        $subarray = array();
        $subarray[] = $row['username'];
        $subarray[] = $row['prefix_id'] . $row['u_fname'] . ' ' . $row['u_lname'];
        $subarray[] = $role;
        $subarray[] = $u_status;


        $btn = '<a href="member-detail?id=' . encryptId($row['u_id']) . '" class="btn btn-primary btn-sm"><i class="fa fa-folder-open-o"></i> รายละเอียด</a>';
        $subarray[] = $btn;

        $data[] = $subarray;
    }



    $output = array(
        'draw' => intval($_POST['draw']),
        'recordsTotal' => $totalData,
        'recordsFiltered' => $totalFiltered,
        'data' => $data,
    );

    echo json_encode($output);
}
