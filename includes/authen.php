<?php

session_start();


$session_id = session_id();


date_default_timezone_set('Asia/Bangkok');

@$usertenant = $_SESSION["usertenant"];

$sqlUser = "SELECT * FROM tbl_user WHERE user_id = '" . $usertenant . "' ";
$rsUser = mysqli_query($link, $sqlUser);
$userNum = mysqli_num_rows($rsUser);
@$dataUser = mysqli_fetch_array($rsUser);

// echo $_SESSION["session_id"]."<br>".$session_id;
// echo  "HIII".$link;
// exit;
// echo  $rsAdmin['user_type'];exit;


if (@$session_id != @$_SESSION["session_id"] || empty($_SESSION["usertenant"]) || $userNum == 0 || $dataUser['status_user'] != '1') {

    header("Location: ./login");

    die();
}
