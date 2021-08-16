<?php
require('../quantri_hethong/xuly_ketnoi.php');

$baoloi = "0";
$email = htmlentities(strtolower(trim(addslashes($_POST['email']))));
$matkhau = htmlentities(strtolower(trim(addslashes($_POST['matkhau']))));

if ($taikhoan_id) {
    echo json_encode(array('kiemtra' => "2", 'tieude' => "Lỗi!", 'noidung' => "Bạn đã đăng nhập rồi!!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if (!$email || !$matkhau){
    echo json_encode(array('kiemtra' => "1", 'tieude' => "Lỗi!", 'noidung' => "Vui lòng nhập đầy đủ thông tin!!", 'icon' => "warning", 'button' => "Đồng ý"));
    exit();
}

$dulieu_matkhau = md5(md5($matkhau));
$thongtin = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `nguoidung` WHERE `email`='$email'"));

if($thongtin['matkhau'] != $dulieu_matkhau) {
    echo json_encode(array('kiemtra' => "1", 'tieude' => "Lỗi!", 'noidung' => "Tài khoản hoặc mật khẩu không chính xác!!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if($baoloi == 0){
    $_SESSION['taikhoan_id'] = $thongtin['id'];
    echo json_encode(array('kiemtra' => "0", 'tieude' => "Thành Công!", 'noidung' => "Đăng nhập thành công, đang chuyển hướng tới trang chủ!!", 'icon' => "success", 'button' => "Đồng ý"));
}else{
    echo json_encode(array('kiemtra' => "1", 'tieude' => "Lỗi!", 'noidung' => "Đăng nhập thất bại, có thể do một số lỗi nào đó!!", 'icon' => "error", 'button' => "Đồng ý"));
}
?>
