<?php
require('../quantri_hethong/xuly_ketnoi.php');

$baoloi = '0';
$matkhau = htmlentities(strtolower(trim(addslashes($_POST['matkhau']))));
$matkhaumoi = htmlentities(strtolower(trim(addslashes($_POST['matkhaumoi']))));
$nhaplaimatkhaumoi = htmlentities(strtolower(trim(addslashes($_POST['nhaplaimatkhaumoi']))));
$kiemtra_matkhau = md5(md5($matkhau));
$dulieu_matkhaumoi = md5(md5($matkhaumoi));


if (!$taikhoan_id) {
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Bạn chưa đăng nhập vui lòng đăng nhập để đổi mật khẩu!!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if ($kiemtra_matkhau != $dulieu_taikhoan['matkhau']){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Mật khẩu cũ không chính xác!!", 'icon' => "warning", 'button' => "Đồng ý"));
    exit();
}

if (strlen($matkhaumoi) < 6){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Mật khẩu không được nhỏ hơn 6 kí tự.", 'icon' => "warning", 'button' => "Đồng ý"));
    exit();
}

if ($matkhaumoi == $matkhau){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Mật khẩu mới không được giống mật khẩu cũ.", 'icon' => "warning", 'button' => "Đồng ý"));
    exit();
}

if ($matkhaumoi != $nhaplaimatkhaumoi){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Nhập lại mật khẩu không giống nhau.", 'icon' => "warning", 'button' => "Đồng ý"));
    exit();
}

if($baoloi == 0){
    mysqli_query($ketnoi, "UPDATE `nguoidung` SET `matkhau` = '$dulieu_matkhaumoi' WHERE `id` = '$taikhoan_id'");
    echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'noidung' => "Mật khẩu mới đã được cập nhật!!", 'icon' => "success", 'button' => "Đồng ý"));
}else{
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Đổi mật khẩu thất bại, có thể do một số lỗi nào đó!!", 'icon' => "error", 'button' => "Đồng ý"));
}
?>
