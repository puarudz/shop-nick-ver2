<?php

require('../../quantri_hethong/xuly_ketnoi.php');

$id = $_POST['id'];
$kiemtra = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `giohang` WHERE `id_nick`='$id' AND `id_taikhoan` = '$taikhoan_id'"));

if ($kiemtra <= 0){
    echo json_encode(array('tieude' => "Lỗi", 'noidung' => "Sản phẩm không tồn tại trong giỏ hàng của bạn"));
    exit();
}

if ($taikhoan_id){
    
    mysqli_query($ketnoi, "DELETE FROM `giohang` WHERE `id_nick`='$id' AND `id_taikhoan` = '$taikhoan_id'");

    echo json_encode(array('thanhcong' => '1', 'tieude' => "Thành công", 'noidung' => "Xóa sản phẩm thành công!"));
}else{
    echo json_encode(array('tieude' => "Lỗi", 'noidung' => "Lỗi xóa sản phẩm giỏ hàng."));
}

?>