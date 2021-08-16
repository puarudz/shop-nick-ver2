<?php

require('../../../quantri_hethong/xuly_ketnoi.php');

$id = $_POST['id'];
$kiemtra = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `dulieu_ATM` WHERE `id`='$id'"));

if ($kiemtra <= 0){
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Thông tin ATM không tồn tại."));
    exit();
}

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    
    mysqli_query($ketnoi, "DELETE FROM `dulieu_ATM` WHERE `id`='$id'");

    echo json_encode(array('thanhcong' => '1', 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Xóa thông tin ATM thành công!"));
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}    