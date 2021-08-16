<?php
require('../../quantri_hethong/xuly_ketnoi.php');

$loai_taikhoan = 'LQM';
$nguoidang = $dulieu_taikhoan['hovaten'];
$taikhoan = $_POST['taikhoan'];
$matkhau = $_POST['matkhau'];
$sotien = $_POST['sotien'];
$tuong = $_POST['tuong'];
$trangphuc = $_POST['trangphuc'];
$bangngoc = $_POST['bangngoc'];
$xephang = $_POST['xephang'];
$khung = $_POST['khung'];
$email = $_POST['email'];
$sodienthoai = $_POST['sodienthoai'];
$facebook = $_POST['facebook'];
$hinhanh_gioithieu = $_POST['hinhanh_gioithieu'];
$hinhanh = $_POST['hinhanh'];
$taikhoan_vip = $_POST['taikhoan_vip'];
$noidung = $_POST['noidung'];
$noibat = $_POST['noibat'];
$trangthai = 'chuaban';

if (!$taikhoan || !$matkhau || !$sotien || !$hinhanh_gioithieu || !$hinhanh){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng nhập đầy đủ thông tin.", 'icon' => "error"));
    exit();
}

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    mysqli_query($ketnoi, "INSERT INTO `baidang` 
    (nguoidang,loai_taikhoan,taikhoan,matkhau,gia,tuong,trangphuc,bangngoc,xephang,khung,email,sodienthoai,facebook,hinhanh_gioithieu,hinhanh,taikhoan_vip,noidung,noibat,trangthai,thoigian)
    VALUES
    ('$nguoidang','$loai_taikhoan','$taikhoan','$matkhau','$sotien','$tuong','$trangphuc','$bangngoc','$xephang','$khung','$email','$sodienthoai','$facebook','$hinhanh_gioithieu','$hinhanh','$taikhoan_vip','$noidung','$noibat','$trangthai','$thoigian')
    ");
    echo json_encode(array('thanhcong' => "1", 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Đăng bán tài khoản thành công."));
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}