<?php
header('Content-Type: application/json');
require_once '../includes/connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

   $username = $_POST['username'];
   $password = $_POST['password'];

   $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE username = :username AND u_status = '1' LIMIT 1");
   $stmt->execute(['username' => $username]);
   $dataUser = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($dataUser && password_verify($password, $dataUser['u_password'])) {

      session_start();
      $_SESSION["session_id"] = session_id();
      $_SESSION["usersakon"] = $dataUser['u_id'];
      $_SESSION["last_active"] = $dataUser["last_active"];

      $currentDate = date("Y-m-d H:i:s");
      $sessionToken = MD5(date("Y-m-d H:i:s")); // More secure SID
      $stmt = $conn->prepare("UPDATE tbl_user SET last_active = :dateactive WHERE u_id = :user_id");
      $stmt->execute([
         'dateactive' => $currentDate,
         'user_id' => $dataUser['u_id']
      ]);
      
      $stmt->execute();

      $response = array(
         'status' => 'true',
         'message' => 'successful',
         'utype' => $dataUser['u_type']
      );
   } else {
      http_response_code(401);
      $response = array(
         'status' => 'false',
         'message' => 'Unauthorized'
      );
   }
   echo json_encode($response);
   exit();
} else {
   http_response_code(405);
}
