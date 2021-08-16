<?php
require('../../quantri_hethong/xuly_ketnoi.php');

$id = $_POST['id'];
$loai_taikhoan = $_POST['loai_taikhoan'];
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
$trangthai = $_POST['trangthai'];

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    mysqli_query($ketnoi, "UPDATE `baidang` SET 
    `loai_taikhoan` = '$loai_taikhoan',
    `taikhoan` = '$taikhoan',
    `matkhau` = '$matkhau',
    `gia` = '$sotien',
    `nro_hanhtinh` = '$nro_hanhtinh',
    `nro_maychu` = '$nro_maychu',
    `nro_dangky` = '$nro_dangky',
    `nro_bongtai` = '$nro_bongtai',
    `nro_sosinhcode` = '$nro_sosinhcode',
    `hinhanh_gioithieu` = '$hinhanh_gioithieu',
    `hinhanh` = '$hinhanh',
    `taikhoan_vip` = '$taikhoan_vip',
    `noidung` = '$noidung',
    `noibat` = '$noibat',
    `trangthai` = '$trangthai',
    `thoigian` = '$thoigian'
    WHERE `id`= '$id'
    ");
    echo json_encode(array('thanhcong' => "1", 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Lưu tài khoản thành công."));    
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>