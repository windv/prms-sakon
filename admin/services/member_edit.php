<?php

header('Content-Type: application/json');

require_once '../../includes/connect_db.php';
require_once '../../includes/function.php';
require_once '../includes/authen.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    echo json_encode(['status' => 0, 'message' => 'Invalid CSRF token']);
    exit;
  }

  $user_id = $_POST['user_id'];
  $prefix_name = $_POST['prefix_name'];
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);
  $role = $_POST['role'];
  $status_user = $_POST['status_user'];
  
  // อัปเดตข้อมูล
  $strSQL = "UPDATE tbl_user SET
              prefix_name = :prefix_name,
              first_name = :first_name,
              last_name = :last_name,
              role_id = :role_id,
              status_user = :status_user
            WHERE user_id = :user_id";

$stmt = $conn->prepare($strSQL);
$result = $stmt->execute([
  ':prefix_name' => $prefix_name,
  ':first_name' => $first_name,
  ':last_name' => $last_name,
  ':role_id' => $role,
  ':status_user' => $status_user,
  ':user_id' => $user_id
]);

// echo '55'.$user_id;
  if ($result ) {
    echo json_encode(['status' => 'success', 'message' => 'แก้ไขข้อมูลสำเร็จ', 'id' => encryptId($user_id)]);
    exit;
  } else {
    echo json_encode(['status' => 'error', 'message' => 'บันทึกไม่สำเร็จ']);
    exit;
  }
}
