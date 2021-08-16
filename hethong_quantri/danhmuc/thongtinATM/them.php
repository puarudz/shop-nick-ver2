<?php
require('../../../quantri_hethong/xuly_ketnoi.php');

$nganhang = $_POST['nganhang'];
$sotaikhoan = $_POST['sotaikhoan'];
$chutaikhoan = $_POST['chutaikhoan'];
$chinhanh = $_POST['chinhanh'];

if (!$nganhang || !$sotaikhoan || !$chutaikhoan || !$chinhanh){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng nhập đầy đủ thông tin.", 'icon' => "error"));
    exit();
}

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    mysqli_query($ketnoi, "INSERT INTO `dulieu_ATM` 
    (nganhang,sotaikhoan,chutaikhoan,chinhanh)
    VALUES
    ('$nganhang','$sotaikhoan','$chutaikhoan','$chinhanh')
    ");
    echo json_encode(array('thanhcong' => "1", 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Thêm thông tin ATM thành công."));
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}