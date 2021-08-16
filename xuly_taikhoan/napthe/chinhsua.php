<?php
require('../../quantri_hethong/xuly_ketnoi.php');

$id = $_POST['id'];
$id_taikhoan = $_POST['taikhoan_id'];
$thucnhan = $_POST['thucnhan'];
$trangthai = $_POST['trangthai'];

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    if($trangthai == 1){
    mysqli_query($ketnoi, "UPDATE `lichsu_naptien` SET 
    `trangthai` = '$trangthai',
    `thucnhan` = '$thucnhan'
    WHERE `id`= '$id'
    ");
    mysqli_query($ketnoi, "UPDATE `nguoidung` SET 
    `tien` = `tien` + '$thucnhan'
    WHERE `id`= '$id_taikhoan'
    ");    
    }elseif($trangthai == 2){
    mysqli_query($ketnoi, "UPDATE `lichsu_naptien` SET 
    `trangthai` = '$trangthai'
    WHERE `id`= '$id'
    ");    
    }
    echo json_encode(array('thanhcong' => "1", 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Lưu thông tin thành công."));    
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>