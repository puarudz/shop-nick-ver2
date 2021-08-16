<?php
require('../../quantri_hethong/xuly_ketnoi.php');

$id = $_POST['id'];
$loai_taikhoan = 'RANDOM';
$loai_random = $_POST['loai_random'];
$taikhoan = $_POST['taikhoan'];
$matkhau = $_POST['matkhau'];
$sotien = $_POST['sotien'];
$hinhanh_gioithieu = $_POST['hinhanh_gioithieu'];
$hinhanh = $_POST['hinhanh'];
$noidung = $_POST['noidung'];
$noibat = $_POST['noibat'];
$trangthai = $_POST['trangthai'];

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    mysqli_query($ketnoi, "UPDATE `baidang` SET 
    `loai_taikhoan` = '$loai_taikhoan',
    `loai_random` = '$loai_random',    
    `taikhoan` = '$taikhoan',
    `matkhau` = '$matkhau',
    `gia` = '$sotien',
    `hinhanh_gioithieu` = '$hinhanh_gioithieu',
    `hinhanh` = '$hinhanh',
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