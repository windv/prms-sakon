<?php

header('Content-Type: application/json');
require_once '../../includes/connect_db.php';
require_once '../includes/authen.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    session_start();
    unset($_SESSION["session_id"]);
    unset($_SESSION["userAunQA"]);
    echo json_encode(['status' => 1, 'message' => 'login complete']);
    exit;
}
