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

  $prefix_name = trim($_POST['prefix_name']);
  $first_name = $_POST['first_name'];
  $last_name = trim($_POST['last_name']);
  $role = $_POST['role'];
  $u_status = 1;

  $username = strtolower(trim($_POST['username']));

  $password = $_POST['password'];

  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  if (strlen($password) < 6) {
    echo json_encode(['status' => 'error', 'message' => 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร']);
    exit;
  }



  // ตรวจสอบ username ซ้ำ
  $stmt = $conn->prepare("SELECT COUNT(*) FROM tbl_user WHERE LOWER(username) = :username");
  $stmt->execute([':username' => $username]);
  if ($stmt->fetchColumn() > 0) {
    echo json_encode(['status' => 'error', 'message' => 'ชื่อผู้ใช้งานนี้ถูกใช้แล้ว']);
    exit;
  }

   if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
    echo json_encode(['status' => 'error', 'message' => 'ชื่อผู้ใช้งานต้องเป็นภาษาอังกฤษหรือตัวเลขเท่านั้น']);
    exit;
  }

  if (strlen($password) < 6) {
    echo json_encode(['status' => 'error', 'message' => 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร']);
    exit;
  }

  // Insert ลงฐานข้อมูล
  $sql = "INSERT INTO tbl_user (prefix_name, first_name, last_name, role_id, status_user, username, password, record_date)
          VALUES (:prefix_name, :first_name, :last_name, :role_id, :status_user, :username, :password, :current_date)";
  $stmt = $conn->prepare($sql);
  $result = $stmt->execute([
    ':prefix_name' => $prefix_name,
    ':first_name' => $first_name,
    ':last_name' => $last_name,
    ':role_id' => $role,
    ':status_user' => $u_status,
    ':username' => $username,
    ':password' => $password_hash,
    ':current_date' => date('Y-m-d H:i:s')
  ]);

  if ($result) {
    $newUserId = $conn->lastInsertId();
    echo json_encode([
      'status' => 'success',
      'message' => 'เพิ่มสมาชิกสำเร็จ',
      'id' => encryptId($newUserId)
    ]);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'ไม่สามารถเพิ่มสมาชิกได้']);
  }
}
