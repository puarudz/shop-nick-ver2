<?php
require('../quantri_hethong/xuly_ketnoi.php');

$trangthai = 0;
$hovaten = $dulieu_taikhoan['hovaten'];
$loaithe = htmlentities(strtolower(trim(addslashes($_POST['loaithe']))));
$menhgia = htmlentities(strtolower(trim(addslashes($_POST['menhgia']))));
$matkhaucap2 = htmlentities(strtolower(trim(addslashes($_POST['matkhaucap2']))));
$mathe = 'Đang xử lý';
$serial = 'Đang xử lý';
$noidung = htmlentities(addslashes($_POST['noidung']));

$kiemtra_matkhaucap2 = md5(md5($matkhaucap2));

if (!$taikhoan_id) {
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng đăng nhập để tiến hành nạp thẻ!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if (!$loaithe || !$matkhaucap2 || !$noidung || !$menhgia){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng nhập đầy đủ thông tin.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if ($kiemtra_matkhaucap2 != $dulieu_taikhoan['matkhau2']){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Mật khẩu cấp 2 không chính xác.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if (strlen($noidung) < 8){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Nội dung phải lớn hơn 8 kí tự.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if ($dulieu_taikhoan['tien'] < $menhgia){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Tài khoản của bạn không đủ để thanh toán thẻ này", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if (!preg_match('/^[0-9]+$/', $menhgia)){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Con nít con nôi đòi làm Hacker  à :v đủ trình chưa =))", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if (!preg_match('/^[a-zA-Z]*$/', $loaithe)){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Bạn đã đủ trình để đòi bugs code mình chưa =))", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}
    
if($dulieu_taikhoan['khoa'] > 0){    
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Tài khoản của bạn đã bị khóa không thể tiến hành mua thẻ vui lòng liên hệ quản trị viên để biết thêm chi tiết.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}    


mysqli_query($ketnoi, "UPDATE `nguoidung` SET `tien`=`tien` - '$menhgia' WHERE `id`='$taikhoan_id'");
mysqli_query($ketnoi, "INSERT INTO muathe (taikhoan_id, hovaten, loaithe, menhgia, serial, mathe, noidung, trangthai, thoigian) VALUES ('$taikhoan_id', '$hovaten', '$loaithe','$menhgia', '$serial','$mathe','$noidung','$trangthai','$thoigian')");
echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'noidung' => "Mua mã thẻ thành công mã thẻ sẽ được gửi vào lịch sử mua thẻ của bạn.", 'icon' => "success", 'button' => "Đồng ý"));

?>