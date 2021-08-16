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

    $id = htmlspecialchars(addslashes($_POST['id']));    
    $facebook_id = htmlspecialchars(addslashes($_POST['taikhoan_id']));
    $hovaten = htmlspecialchars(addslashes($_POST['hovaten']));
    $sodienthoai = htmlspecialchars(addslashes($_POST['sodienthoai']));
    $email = htmlspecialchars(addslashes($_POST['email']));
    $tien = htmlspecialchars(addslashes($_POST['tien']));
    $khoa = htmlspecialchars(addslashes($_POST['khoa']));

if (strlen($sodienthoai) < 10 || strlen($sodienthoai) > 10){
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Số điện thoại không hợp lệ"));
    exit();
}

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    
    mysqli_query($ketnoi, "UPDATE nguoidung SET
    taikhoan_id = '$facebook_id',
    hovaten = '$hovaten',
    sodienthoai = '$sodienthoai',
    email = '$email',
    tien = '$tien',
    khoa = '$khoa'
    WHERE `id`='$id'
    ");
    
    echo json_encode(array('thanhcong' => "1", 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Lưu cài đặt thành công"));
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}

?>
