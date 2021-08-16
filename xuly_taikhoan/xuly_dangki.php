<?php
require('../quantri_hethong/xuly_ketnoi.php');

$baoloi = "0";
$email = htmlentities(strtolower(trim(addslashes($_POST['email']))));
$sodienthoai = htmlentities(strtolower(trim(addslashes($_POST['sodienthoai']))));
$hovaten = htmlentities(trim(addslashes($_POST['hovaten'])));
$matkhau = htmlentities(strtolower(trim(addslashes($_POST['matkhau']))));
$matkhau2 = htmlentities(strtolower(trim(addslashes($_POST['matkhau2']))));

if ($taikhoan_id) {
    echo json_encode(array('kiemtra' => "2", 'tieude' => "Lỗi!", 'noidung' => "Bạn đã đăng nhập rồi, vui lòng đăng xuất để tiến hành đăng kí!!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if (!$sodienthoai || !$hovaten || !$matkhau2 || !$email || !$matkhau){
    echo json_encode(array('kiemtra' => "1", 'tieude' => "Lỗi!", 'noidung' => "Vui lòng nhập đầy đủ thông tin!!", 'icon' => "warning", 'button' => "Đồng ý"));
    exit();
}

if (strlen($sodienthoai) > 10 || strlen($sodienthoai) < 10){
    echo json_encode(array('kiemtra' => "1", 'tieude' => "Lỗi!", 'noidung' => "Số điện thoại không hợp lệ!!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if ($matkhau2 == $matkhau){
    echo json_encode(array('kiemtra' => "1", 'tieude' => "Lỗi!", 'noidung' => "Mật khẩu cấp 2 không được giống mật khẩu tài khoản!!", 'icon' => "warning", 'button' => "Đồng ý"));
    exit();
}

$dulieu_matkhau = md5(md5($matkhau));
$dulieu_matkhau2 = md5(md5($matkhau2));
$thongtin = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `nguoidung` WHERE `email`='$email'"));
$thongtin2 = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `nguoidung` WHERE `sodienthoai`='$$sodienthoai'"));

if($thongtin2) {
    echo json_encode(array('kiemtra' => "1", 'tieude' => "Lỗi!", 'noidung' => "Số điện thoại đã có người sử dụng!!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if($thongtin) {
    echo json_encode(array('kiemtra' => "1", 'tieude' => "Lỗi!", 'noidung' => "Email đã có người sử dụng!!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if($baoloi == 0){
    mysqli_query($ketnoi, "INSERT INTO nguoidung (hovaten, sodienthoai, matkhau, matkhau2, email, chucvu, tien, thoigian) VALUES ('$hovaten', '$sodienthoai', '$dulieu_matkhau', '$dulieu_matkhau2', '$email', '0', '0', '$thoigian')");
    echo json_encode(array('kiemtra' => "0", 'tieude' => "Thành Công!", 'noidung' => "Đăng kí thành công, đang chuyển hướng tới đăng nhập!!", 'icon' => "success", 'button' => "Đồng ý"));
}else{
    echo json_encode(array('kiemtra' => "1", 'tieude' => "Lỗi!", 'noidung' => "Đăng kí thất bại, có thể do một số lỗi nào đó!!", 'icon' => "error", 'button' => "Đồng ý"));
}
?>
