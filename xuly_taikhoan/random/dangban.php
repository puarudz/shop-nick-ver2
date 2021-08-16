<?php
require('../../quantri_hethong/xuly_ketnoi.php');

$loai_taikhoan = 'RANDOM';
$nguoidang = $dulieu_taikhoan['hovaten'];
$loai_random = $_POST['loai_random'];
$taikhoan = $_POST['taikhoan'];
$matkhau = $_POST['matkhau'];
$sotien = $_POST['sotien'];
$hinhanh_gioithieu = $_POST['hinhanh_gioithieu'];
$hinhanh = $_POST['hinhanh'];
$noidung = $_POST['noidung'];
$noibat = $_POST['noibat'];
$trangthai = 'chuaban';

if (!$taikhoan || !$matkhau || !$sotien || !$hinhanh_gioithieu || !$hinhanh){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng nhập đầy đủ thông tin.", 'icon' => "error"));
    exit();
}

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    mysqli_query($ketnoi, "INSERT INTO `baidang` 
    (nguoidang,loai_taikhoan,loai_random,taikhoan,matkhau,gia,hinhanh_gioithieu,hinhanh,noidung,noibat,trangthai,thoigian)
    VALUES
    ('$nguoidang','$loai_taikhoan','$loai_random','$taikhoan','$matkhau','$sotien','$hinhanh_gioithieu','$hinhanh','$noidung','$noibat','$trangthai','$thoigian')
    ");
    echo json_encode(array('thanhcong' => "1", 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Đăng bán tài khoản thành công."));
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}