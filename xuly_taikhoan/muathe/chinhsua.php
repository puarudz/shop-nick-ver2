<?php
require('../../quantri_hethong/xuly_ketnoi.php');

$id = $_POST['id'];
$id_taikhoan = $_POST['taikhoan_id'];
$menhgia = $_POST['menhgia'];
$mathe = $_POST['mathe'];
$serial = $_POST['serial'];
$trangthai = $_POST['trangthai'];

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    if($trangthai == 1){
    mysqli_query($ketnoi, "UPDATE `muathe` SET 
    `trangthai` = '$trangthai',
    `mathe` = '$mathe',    
    `serial` = '$serial'
    WHERE `id`= '$id'
    ");
    }elseif($trangthai == 2){
    mysqli_query($ketnoi, "UPDATE `muathe` SET 
    `trangthai` = '$trangthai',
    `mathe` = 'Không có',    
    `serial` = 'Không có'     
    WHERE `id`= '$id'
    ");
    mysqli_query($ketnoi, "UPDATE `nguoidung` SET 
    `tien` =`tien` + '$menhgia'
    WHERE `id`= '$id_taikhoan'
    ");     
    }
    echo json_encode(array('thanhcong' => "1", 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Lưu thông tin thành công."));    
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>