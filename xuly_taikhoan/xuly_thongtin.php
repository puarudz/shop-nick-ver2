<?php
require('../quantri_hethong/xuly_ketnoi.php');

$baoloi = '0';
$hovaten = addslashes($_POST['hovaten']);
$email = htmlentities(strtolower(trim(addslashes($_POST['email']))));
$sodienthoai = htmlentities(strtolower(trim(addslashes($_POST['sodienthoai']))));
$matkhau2 = htmlentities(strtolower(trim(addslashes($_POST['matkhau2']))));
$kiemtra_matkhau2 = md5(md5($matkhau2));
$thongtin = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `nguoidung` WHERE `email`='$email'"));
$thongtin2 = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `nguoidung` WHERE `sodienthoai`='$sodienthoai'"));


if (!$taikhoan_id) {
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Bạn chưa đăng nhập vui lòng đăng nhập để cập nhật thông tin!!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if ($kiemtra_matkhau2 != $dulieu_taikhoan['matkhau2']){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Mật khẩu cấp 2 không chính xác!!", 'icon' => "warning", 'button' => "Đồng ý"));
    exit();
}

if ($hovaten != $dulieu_taikhoan['hovaten']){
    mysqli_query($ketnoi, "UPDATE `nguoidung` SET `hovaten` = '$hovaten' WHERE `id` = '$taikhoan_id'");
}

if($email != $dulieu_taikhoan['email']){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $noidung_email = "Email không hợp lệ,";
        $baoloi = '1';
    }elseif($thongtin > 0){     
        $noidung_email = "Email đã có người sử dụng,";
        $baoloi = '1';        
    }else{
        mysqli_query($ketnoi, "UPDATE `nguoidung` SET `email` = '$email' WHERE `id` = '$taikhoan_id'");
    }
}

if($sodienthoai != $dulieu_taikhoan['sodienthoai']){
    if(!preg_match('/^[0-9]+$/', $sodienthoai) || strlen($sodienthoai) < 10 || strlen($sodienthoai) > 10){
        $noidung_sodienthoai = "Số điện thoại không hợp lệ";
        $baoloi = '1';
    }elseif($thongtin2 > 0){
        $noidung_sodienthoai = "Số điện thoại đã có người sử dụng";
        $baoloi = '1';    
    }else{
        mysqli_query($ketnoi, "UPDATE `nguoidung` SET `sodienthoai` = '$sodienthoai' WHERE `id` = '$taikhoan_id'");
    }
}

if($baoloi == 0){
    echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'noidung' => "Thông tin đã được cập nhật!!", 'icon' => "success", 'button' => "Đồng ý"));
}else{
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "$noidung_email $noidung_sodienthoai", 'icon' => "warning", 'button' => "Đồng ý"));
}
?>
