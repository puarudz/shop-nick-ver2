<?php
/**
* @Mã Nguồn    Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
* @Điện thoại  0856617819
* @Zalo        0856617819
* @Email       hoanganh18595@gmail.com
*/
require('../../quantri_hethong/xuly_ketnoi.php');

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    
    $tieude = htmlspecialchars(addslashes($_POST['tieude']));
    $tenmien = htmlspecialchars(addslashes($_POST['tenmien']));
    $logo = htmlspecialchars(addslashes($_POST['logo']));
    $mota_logo = htmlspecialchars(addslashes($_POST['mota_logo']));
    $icon = htmlspecialchars(addslashes($_POST['icon']));
    $tukhoa = htmlspecialchars(addslashes($_POST['tukhoa']));
    $thongbao = htmlspecialchars(addslashes($_POST['thongbao']));
    $facebook = htmlspecialchars(addslashes($_POST['facebook']));
    $youtube = htmlspecialchars(addslashes($_POST['youtube']));
    $sodienthoai = htmlspecialchars(addslashes($_POST['sodienthoai']));
    $email = htmlspecialchars(addslashes($_POST['email']));
    $diachi = htmlspecialchars(addslashes($_POST['diachi']));
    $baotri = htmlspecialchars(addslashes($_POST['baotri']));

    mysqli_query($ketnoi, "UPDATE hethong_quantri SET
    tieude = '$tieude',
    tenmien = '$tenmien',
    logo = '$logo',
    mota_logo = '$mota_logo',
    icon = '$icon',
    tukhoa = '$tukhoa',
    thongbao = '$thongbao',
    facebook = '$facebook',
    youtube = '$youtube',
    sodienthoai = '$sodienthoai',
    Email = '$email',
    diachi = '$diachi',
    baotri = '$baotri'
    ");
    
    echo json_encode(array('icon' => "success", 'tieude' => "Thành công", 'noidung' => "Lưu cài đặt thành công"));
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}

?>
