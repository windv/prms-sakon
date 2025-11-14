<?php
if (!isset($conn)) {
    die("Database connection not established.");
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('Asia/Bangkok');

if (isset($_SESSION["session_id"], $_SESSION["usersakon"])) {
    $session_id = session_id();
    $user_id = $_SESSION["usersakon"];

    try {
        $stmt = $conn->prepare(
            "SELECT * FROM tbl_user 
             WHERE u_id = ? AND u_status = '1' AND u_type = '1'
             LIMIT 1");

        $stmt->execute([$user_id]);
        $dataUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dataUser || $session_id !== $_SESSION["session_id"]) {
            header("Location: ../");
            exit;
        }
    } catch (PDOException $e) {
        error_log("DB Error: " . $e->getMessage());
        die("เกิดข้อผิดพลาด กรุณาลองใหม่ภายหลัง");
    }
} else {
    header("Location: ../");
    exit;
}
