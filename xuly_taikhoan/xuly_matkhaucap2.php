<?php
require('../quantri_hethong/xuly_ketnoi.php');

$baoloi = "0";
$matkhau2 = htmlentities(strtolower(trim(addslashes($_POST['matkhau2']))));

if (!$taikhoan_id) {
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Bạn chưa đăng nhập vui lòng đăng nhập để khởi tạo mật khẩu cấp 2!!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if (!$matkhau2){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng nhập đầy đủ thông tin!!", 'icon' => "warning", 'button' => "Đồng ý"));
    exit();
}

if (strlen($matkhau2) < 6){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Mật khẩu cấp 2 không được bé hơn 6 kí tự!!", 'icon' => "warning", 'button' => "Đồng ý"));
    exit();
}

$dulieu_matkhau2 = md5(md5($matkhau2));

if($baoloi == 0){
    mysqli_query($ketnoi, "UPDATE `nguoidung` SET `matkhau2` = '$dulieu_matkhau2' WHERE `id` = '$taikhoan_id'");
    echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'noidung' => "Mật khẩu cấp 2 đã được cập nhật!!", 'icon' => "success", 'button' => "Đồng ý"));
}else{
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Mật khẩu cấp 2 chưa được khởi tạo do một số lỗi nào đó!!", 'icon' => "error", 'button' => "Đồng ý"));
}
?>
