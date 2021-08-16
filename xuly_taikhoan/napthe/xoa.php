<?php

require('../../quantri_hethong/xuly_ketnoi.php');

$id = $_POST['id'];
$kiemtra = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `lichsu_naptien` WHERE `id`='$id'"));

if ($kiemtra <= 0){
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Thẻ này không tồn tại trong hệ thống"));
    exit();
}

if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    
    mysqli_query($ketnoi, "DELETE FROM `lichsu_naptien` WHERE `id`='$id'");

    echo json_encode(array('thanhcong' => '1', 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Xóa thẻ thành công!"));
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}    