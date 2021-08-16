<?php
require('../quantri_hethong/xuly_ketnoi.php');

$id_nick = $_POST['id'];
$dulieu_baidang = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `baidang` WHERE `id`='$id_nick'"));
$sotien = $dulieu_baidang['gia'];
$kiemtra_daban = $dulieu_baidang['trangthai'];
$kiemtra_sanpham_dangban = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `id`='$id_nick'"));
$kiemtra_sanpham_tontai = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM giohang WHERE `id_nick`='$id_nick' AND `id_taikhoan`='$taikhoan_id'"));

if (!$taikhoan_id) {
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng đăng nhập để tiến hành mua tài khoản!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if ($kiemtra_sanpham_dangban <= 0) {
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Sản phẩm không tồn tại trong hệ thống", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if ($kiemtra_sanpham_tontai > 0) {
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Sản phẩm này đã tồn tại trong giỏ hàng của bạn.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if ($kiemtra_daban == 'daban') {
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Sản phẩm này đã được bán hết.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}
    
if($dulieu_taikhoan['khoa'] > 0){    
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Tài khoản của bạn đã bị khóa không thể tiến hành nạp thẻ vui lòng liên hệ quản trị viên để biết thêm chi tiết.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}    
    
mysqli_query($ketnoi, "INSERT INTO giohang (id_nick, id_taikhoan, sotien, thoigian) VALUES ('$id_nick', '$taikhoan_id', '$sotien','$thoigian')");
echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'noidung' => "Đã thêm sản phẩm vào giỏ hàng, vui lòng kiểm tra giỏ hàng để thanh toán.", 'icon' => "success", 'button' => "Đồng ý"));

?>