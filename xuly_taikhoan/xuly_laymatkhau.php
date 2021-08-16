<?php
/**
* @Mã Nguồn    Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
* @Điện thoại  0856617819
* @Zalo        0856617819
* @Email       hoanganh18595@gmail.com
*/
require('../quantri_hethong/xuly_ketnoi.php');

$email = htmlentities(strtolower(trim(addslashes($_POST['email']))));
$kiemtra_email = mysqli_num_rows(mysqli_query($ketnoi,"SELECT email FROM nguoidung WHERE `email` = '$email'"));

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Email không đúng định dạng!!", 'icon' => "error", 'button' => "Đồng ý"));
}elseif($kiemtra_email < 1){
    echo json_encode(array('tieude' => "Thất bại", 'noidung' => "Email không tồn tại trong hệ thống.", 'icon' => "error", 'button' => "Đồng ý"));    
}else{
$matkhau_tuychon = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
mysqli_query($ketnoi, "UPDATE `nguoidung` SET `matkhau`='".md5(md5($matkhau_tuychon))."' WHERE `email`='".$email."'");

$noidung = "Mật Khẩu Mới Của Bạn Là: $matkhau_tuychon
Vui Lòng Đăng Nhập Và Đổi Mật Khẩu Tại WebSite $trangchu";
$tieude = "KHÔI PHỤC MẬT KHẨU";
$chude = "KHÔI PHỤC MẬT KHẨU THÀNH CÔNG";

    if(mail($email, $chude, $noidung, $tieude) == true){
        echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'noidung' => "Mật khẩu của bạn đã được thay đổi, vui lòng kiểm tra Email để nhận mật khẩu mới!!", 'icon' => "success", 'button' => "Đồng ý"));
    }else{
        echo json_encode(array('thanhcong' => "1", 'tieude' => "Thất bại", 'noidung' => "Máy chủ gửi Email hiện đang bận không thể gửi Email", 'icon' => "error", 'button' => "Đồng ý"));   
    }
}