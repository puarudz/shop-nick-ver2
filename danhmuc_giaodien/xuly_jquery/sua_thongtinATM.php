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
    $nganhang = $_POST['nganhang'];
    $sotaikhoan = $_POST['sotaikhoan'];
    $chutaikhoan = $_POST['chutaikhoan'];
    $chinhanh = $_POST['chinhanh'];    
    

if (!$nganhang || !$sotaikhoan || !$chutaikhoan || !$chinhanh){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng nhập đầy đủ thông tin.", 'icon' => "error"));
    exit();
}


if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    
    mysqli_query($ketnoi, "UPDATE dulieu_ATM SET
    nganhang = '$nganhang',
    sotaikhoan = '$sotaikhoan',
    chutaikhoan = '$chutaikhoan',     
    chinhanh = '$chinhanh'
    WHERE `id`='$id'
    ");
    
    echo json_encode(array('thanhcong' => "1", 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Lưu cài đặt thành công"));
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}

?>
