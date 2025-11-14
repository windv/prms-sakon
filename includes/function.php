<?php
function thai_date($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[1];
	}
	return $date . "  " . $th_months[$month] . "  " . ($d[0] + 543) . "  " . $t;
}
function thai_date_buddit($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[1];
	}
	return $date . "  " . $th_months[$month] . "  พ.ศ. " . ($d[0] + 543) . "  " . $t;
}
function thai_date_shot($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "ม.ค.",
		"ก.พ.",
		"มี.ค.",
		"เม.ย.",
		"พ.ค.",
		"มิ.ย.",
		"ก.ค.",
		"ส.ค.",
		"ก.ย.",
		"ต.ค.",
		"พ.ย.",
		"ธ.ค."
	);

	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[1];
	}
	return $date . "  " . $th_months[$month] . "  " . substr(($d[0] + 543), 2, 2) . "  " . $t;
}
function thai_time($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[0];
	}
	return $date . "  " . $th_months[$month] . "  " . ($d[0] + 543) .  " เวลา " . $dt[1] . " น.";
	//return $datetime;
}
function thai_time_shot($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "ม.ค.",
		"ก.พ.",
		"มี.ค.",
		"เม.ย.",
		"พ.ค.",
		"มิ.ย.",
		"ก.ค.",
		"ส.ค.",
		"ก.ย.",
		"ต.ค.",
		"พ.ย.",
		"ธ.ค."
	);

	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[0];
	}
	return $date . "  " . $th_months[$month] . "  " . ($d[0] + 543) .  " เวลา " . $dt[1] . " น.";
	//return $datetime;
}

function thai_time_br($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[0];
	}
	return $date . "  " . $th_months[$month] . "  " . ($d[0] + 543) .  " <br>เวลา " . $dt[1] . " น.";
	//return $datetime;
}

function thai_date1($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[1];
	}
	return $d[2] . "-" . $d[1] . "-" . ($d[0] + 543);
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;
}

function date_conv($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[1];
	}
	return ($d[2] - 543) . "-" . $d[1] . "-" . $d[0];
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;

}

function date_conv1($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[1];
	}
	return $d[2] . "-" . $d[1] . "-" . ($d[0] + 543);
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;

}

function year($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	@$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	@$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[1];
	}
	return $d[0];
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;

}
function year_th($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	@$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	@$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[1];
	}
	return $d[0] + 543;
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;

}
function thai_date_m($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[1];
	}
	return $date . "  " . $th_months[$month] . "  " . ($d[0] + 543);
}
function thai_date_m_notday($datetime, $include_time = false)
{
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	$month = ltrim($d[1], "0");
	$t = "";
	if ($include_time) {
		$t = $dt[1];
	}
	return $th_months[$month] . " " . ($d[0] + 543);
}
function thai_month($m, $include_time = false)
{

	$th_months = array(
		1 => "มกราคม",
		"กุมภาพันธ์",
		"มีนาคม",
		"เมษายน",
		"พฤษภาคม",
		"มิถุนายน",
		"กรกฎาคม",
		"สิงหาคม",
		"กันยายน",
		"ตุลาคม",
		"พฤศจิกายน",
		"ธันวาคม"
	);

	$month = $m;

	return  $th_months[$month];
}

function minute($datetime, $include_time = false)
{
	$dt = $datetime;
	$d = explode(":", $datetime);
	$t = "";
	if ($include_time) {
		$t = $dt[0];
	}
	return  $d[0] . ":" . $d[1];
	//return $datetime;
}

function PersonIDFormat($text = '', $pattern = '', $ex = '')
{
	$cid = ($text == '') ? '0000000000000' : $text;
	$pattern = ($pattern == '') ? '_-____-_____-__-_' : $pattern;
	$p = explode('-', $pattern);
	$ex = ($ex == '') ? '-' : $ex;
	$first = 0;
	$last = 0;
	for ($i = 0; $i <= count($p) - 1; $i++) {
		$first = $first + $last;
		$last = strlen($p[$i]);
		$returnText[$i] = substr($cid, $first, $last);
	}

	return implode($ex, $returnText);
}

function Convert($amount_number)
{
	$amount_number = number_format($amount_number, 2, ".", "");
	$pt = strpos($amount_number, ".");
	$number = $fraction = "";
	if ($pt === false)
		$number = $amount_number;
	else {
		$number = substr($amount_number, 0, $pt);
		$fraction = substr($amount_number, $pt + 1);
	}

	$ret = "";
	$baht = ReadNumber($number);
	if ($baht != "")
		$ret .= $baht . "บาท";

	$satang = ReadNumber($fraction);
	if ($satang != "")
		$ret .=  $satang . "สตางค์";
	else
		$ret .= "ถ้วน";
	return $ret;
}

function ReadNumber($number)
{
	$position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
	$number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
	$number = $number + 0;
	$ret = "";
	if ($number == 0) return $ret;
	if ($number > 1000000) {
		$ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
		$number = intval(fmod($number, 1000000));
	}

	$divider = 100000;
	$pos = 0;
	while ($number > 0) {
		$d = intval($number / $divider);
		$ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : ((($divider == 10) && ($d == 1)) ? "" : ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
		$ret .= ($d ? $position_call[$pos] : "");
		$number = $number % $divider;
		$divider = $divider / 10;
		$pos++;
	}
	return $ret;
}

function thainumDigit($num)
{
	return str_replace(
		array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),
		array("o", "๑", "๒", "๓", "๔", "๕", "๖", "๗", "๘", "๙"),
		$num
	);
};

function encryptId($id)
{
	$key = 'phuphanplace'; // เปลี่ยนเป็นคีย์ของคุณ
	return bin2hex(openssl_encrypt($id, 'aes-256-cbc', $key, 0, '1234567890123456'));
}

function decryptId($encryptedId)
{
	$key = 'phuphanplace';
	return openssl_decrypt(hex2bin($encryptedId), 'aes-256-cbc', $key, 0, '1234567890123456');
}