<?php
require('../../quantri_hethong/xuly_ketnoi.php');

$loai_taikhoan = 'NRO';
$nguoidang = $dulieu_taikhoan['hovaten'];
$taikhoan = $_POST['taikhoan'];
$matkhau = $_POST['matkhau'];
$sotien = $_POST['sotien'];
$nro_hanhtinh = $_POST['nro_hanhtinh'];
$nro_maychu = $_POST['nro_maychu'];
$nro_dangky = $_POST['nro_dangky'];
$nro_bongtai = $_POST['nro_bongtai'];
$nro_sosinhcode = $_POST['nro_sosinhcode'];
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
    (nguoidang,loai_taikhoan,taikhoan,matkhau,gia,nro_hanhtinh,nro_maychu,nro_dangky,nro_bongtai,nro_sosinhcode,hinhanh_gioithieu,hinhanh,taikhoan_vip,noidung,noibat,trangthai,thoigian)
    VALUES
    ('$nguoidang','$loai_taikhoan','$taikhoan','$matkhau','$sotien','$nro_hanhtinh','$nro_maychu','$nro_dangky','$nro_bongtai','$nro_sosinhcode','$hinhanh_gioithieu','$hinhanh','$taikhoan_vip','$noidung','$noibat','$trangthai','$thoigian')
    ");
    echo json_encode(array('thanhcong' => "1", 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Đăng bán tài khoản thành công."));
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}