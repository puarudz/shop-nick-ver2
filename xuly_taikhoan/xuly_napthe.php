<?php
require('../quantri_hethong/xuly_ketnoi.php');

$trangthai = 0;
$hovaten = $dulieu_taikhoan['hovaten'];
$loaithe = htmlentities(strtolower(trim(addslashes($_POST['loaithe']))));
$loainap = htmlentities(strtolower(trim(addslashes($_POST['loainap']))));
$serial = htmlentities(strtolower(trim(addslashes($_POST['serial']))));
$mathe = htmlentities(strtolower(trim(addslashes($_POST['mathe']))));
$menhgia = htmlentities(strtolower(trim(addslashes($_POST['menhgia']))));

if (!$taikhoan_id) {
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng đăng nhập để tiến hành nạp thẻ!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if(!$loaithe || !$serial || !$mathe || !$menhgia){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng nhập đầy đủ thông tin.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if($dulieu_taikhoan['khoa'] > 0){    
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Tài khoản của bạn đã bị khóa không thể tiến hành nạp thẻ vui lòng liên hệ quản trị viên để biết thêm chi tiết.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if($loainap == 'napcham'){
    $kiemtra_thenap = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `lichsu_naptien` WHERE `mathe` = '$mathe' AND `serial` = '$serial'"));

if(strlen($serial) < 8 || strlen($mathe) < 8 || strlen($serial) > 20 || strlen($mathe) > 20){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Độ dài mã thẻ hoặc số seri không hợp lệ.", 'icon' => "error", 'button' => "Đồng ý"));
}elseif(!preg_match('/^[0-9]+$/', $mathe)){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Mã thẻ chứa kí tự không hợp lệ.", 'icon' => "error", 'button' => "Đồng ý"));
}elseif(!preg_match('/^[0-9]+$/', $serial)){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Số serial chứa kí tự không hợp lệ.", 'icon' => "error", 'button' => "Đồng ý"));
}elseif(!preg_match('/^[0-9]+$/', $menhgia)){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Con nít con nôi đòi làm Hacker  à :v đủ trình chưa =))", 'icon' => "error", 'button' => "Đồng ý"));
}elseif(!preg_match('/^[a-zA-Z]*$/', $loaithe)){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Bạn đã đủ trình để đòi bugs code mình chưa =))", 'icon' => "error", 'button' => "Đồng ý"));
}elseif($kiemtra_thenap > 0){ 
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Thẻ này đã được nạp rồi hãy kiểm tra lại", 'icon' => "error", 'button' => "Đồng ý"));
}else{ 
    mysqli_query($ketnoi, "INSERT INTO lichsu_naptien (taikhoan_id, hovaten, loaithe, menhgia, serial, mathe, thucnhan, trangthai, thoigian) VALUES ('$taikhoan_id', '$hovaten', '$loaithe','$menhgia', '$serial','$mathe','$menhgia','$trangthai','$thoigian')");
    echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'noidung' => "Thẻ nạp đã được ghi nhận vui lòng chờ 1-24h để quản trị viên xử lý, thông tin thẻ nạp sẽ được lưu ở lịch sử nạp thẻ.", 'icon' => "success", 'button' => "Đồng ý"));
}
}else{
    require_once('../quantri_hethong/dulieu_naptheauto.php');

    $command = 'charging'; 
    $request_id = rand(100000000, 999999999);    
    
    $dataPost = array();
    $dataPost['partner_id'] = $partner_id;
    $dataPost['request_id'] = $request_id;
    $dataPost['telco'] = $loaithe;
    $dataPost['amount'] = $menhgia;
    $dataPost['serial'] = $serial;
    $dataPost['code'] = $mathe;
    $dataPost['command'] = $command;
    $sign = creatSign($partner_key, $dataPost);
    $dataPost['sign'] = $sign;

    $data = http_build_query($dataPost);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    curl_setopt($ch, CURLOPT_REFERER, $actual_link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    
    $obj = json_decode($result);
    $noidung = $obj->message;
    $solieu = $obj->status;
    
if ($solieu == 99) {
    mysqli_query($ketnoi, "INSERT INTO lichsu_naptien (taikhoan_id, hovaten, loaithe, menhgia, serial, mathe, thucnhan, trangthai, thoigian) VALUES ('$taikhoan_id', '$hovaten', '$loaithe','$menhgia', '$serial','$mathe','$menhgia','0','$thoigian')");
    echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'icon' => "success", 'button' => "Đồng ý", 'noidung' => $noidung));
}elseif($solieu == 1) {
    mysqli_query($ketnoi, "UPDATE `nguoidung` SET `tien` = `tien` + '$menhgia' WHERE `id`= '$taikhoan_id'"); 
    mysqli_query($ketnoi, "INSERT INTO lichsu_naptien (taikhoan_id, hovaten, loaithe, menhgia, serial, mathe, thucnhan, trangthai, thoigian) VALUES ('$taikhoan_id', '$hovaten', '$loaithe','$menhgia', '$serial','$mathe','$menhgia','1','$thoigian')");
    echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'icon' => "success", 'button' => "Đồng ý", 'noidung' => $noidung));
}elseif($solieu == 2) {
    mysqli_query($ketnoi, "UPDATE `nguoidung` SET `tien` = `tien` + '$menhgia' WHERE `id`= '$taikhoan_id'");    
    mysqli_query($ketnoi, "INSERT INTO lichsu_naptien (taikhoan_id, hovaten, loaithe, menhgia, serial, mathe, thucnhan, trangthai, thoigian) VALUES ('$taikhoan_id', '$hovaten', '$loaithe','$menhgia', '$serial','$mathe','$menhgia','1','$thoigian')");
    echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'icon' => "success", 'button' => "Đồng ý", 'noidung' => $noidung));
}elseif($solieu == 3) {
    mysqli_query($ketnoi, "INSERT INTO lichsu_naptien (taikhoan_id, hovaten, loaithe, menhgia, serial, mathe, thucnhan, trangthai, thoigian) VALUES ('$taikhoan_id', '$hovaten', '$loaithe','$menhgia', '$serial','$mathe','$menhgia','2','$thoigian')");
    echo json_encode(array('thanhcong' => "1", 'tieude' => "Lỗi!", 'icon' => "error", 'button' => "Đồng ý", 'noidung' => $noidung));    
}elseif($solieu == 4) {
    echo json_encode(array('thanhcong' => "1", 'tieude' => "Lỗi!", 'icon' => "error", 'button' => "Đồng ý", 'noidung' => $noidung));
}else{
    mysqli_query($ketnoi, "INSERT INTO lichsu_naptien (taikhoan_id, hovaten, loaithe, menhgia, serial, mathe, thucnhan, trangthai, thoigian) VALUES ('$taikhoan_id', '$hovaten', '$loaithe','$menhgia', '$serial','$mathe','$menhgia','2','$thoigian')");
    echo json_encode(array('thanhcong' => "1", 'tieude' => "Lỗi!", 'icon' => "error", 'button' => "Đồng ý", 'noidung' => $noidung));  
}    
}
?>