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

  $user_id   = trim($_POST['user_id'] ?? '');
  $userId = decryptId($user_id);

  $strSQL = "UPDATE tbl_user SET
              u_status = :u_status,
              dete_approve = :date_approve
            WHERE u_id = :user_id";

  $stmt = $conn->prepare($strSQL);
  $result = $stmt->execute([
    ':u_status' => 1,
    ':date_approve' => date("Y-m-d H:i:s"),
    ':user_id' => $userId
  ]);

  // echo '55'.$user_id;
  if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'อนุมัติผู้ใช้งานสำเร็จ', 'id' => encryptId($userId)]);
    exit;
  } else {
    echo json_encode(['status' => 'error', 'message' => 'บันทึกไม่สำเร็จ']);
    exit;
  }
}
