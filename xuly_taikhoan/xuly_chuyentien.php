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

$nguoinhan = strtolower(trim(addslashes($_POST['nguoinhan'])));
$sotien = htmlentities(strtolower(trim(addslashes($_POST['sotien']))));
$matkhau = htmlentities(strtolower(trim(addslashes($_POST['matkhau']))));
$kiemtra_matkhau = md5(md5($matkhau));

if (!$taikhoan_id) {
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng đăng nhập để tiến hành nạp thẻ!", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if($dulieu_taikhoan['khoa'] > 0){    
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Tài khoản của bạn đã bị khóa không thể tiến hành nạp thẻ vui lòng liên hệ quản trị viên để biết thêm chi tiết.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
} 

if (!$nguoinhan || !$sotien || !$matkhau){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Vui lòng nhập đầy đủ thông tin.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if (!preg_match('/^[0-9]+$/', $sotien)){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Số tiền không hợp lệ vui lòng kiểm tra lại.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}

if($dulieu_taikhoan['tien'] < 10000){    
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Số tiền chuyển phải lớn hơn 10000 VNĐ.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
} 

if($dulieu_taikhoan['tien'] < $sotien){    
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Tài khoản của bạn không đủ để thực hiện giao dịch.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
} 

if ($kiemtra_matkhau != $dulieu_taikhoan['matkhau2']){
    echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Mật khẩu cấp 2 không đúng, vui lòng kiểm tra lại.", 'icon' => "error", 'button' => "Đồng ý"));
    exit();
}


if(preg_match('/^[0-9]+$/', $nguoinhan)){
    $kiemtra_dienthoai = mysqli_num_rows(mysqli_query($ketnoi, "SELECT sodienthoai FROM nguoidung WHERE `sodienthoai` = '$nguoinhan'"));
    if($kiemtra_dienthoai < 1){
        echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Số điện thoại không tồn tại, vui lòng kiểm tra lại", 'icon' => "error", 'button' => "Đồng ý"));
    }elseif($nguoinhan == $dulieu_taikhoan['sodienthoai']){
        echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Số điện thoại không thể là chính bạn", 'icon' => "error", 'button' => "Đồng ý"));
    }elseif(strlen($nguoinhan) < 10 || strlen($nguoinhan) > 10){
        echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Số điện thoại không hợp lệ hãy kiểm tra lại", 'icon' => "error", 'button' => "Đồng ý"));   
    }else{
        mysqli_query($ketnoi, "UPDATE `nguoidung` SET `tien` = `tien` - '$sotien' WHERE `id` = '$taikhoan_id'");
        mysqli_query($ketnoi, "UPDATE `nguoidung` SET `tien` = `tien` + '$sotien' WHERE `sodienthoai` = '$nguoinhan'");
        mysqli_query($ketnoi, "INSERT INTO `lichsu_giaodich` (id_nguoichuyen,nguoi_chuyen,nguoi_nhan,sotien,thoigian) VALUES ('$taikhoan_id','".$dulieu_taikhoan['hovaten']."','$nguoinhan','$sotien','$thoigian')");
        echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'noidung' => "Giao dịch chuyển tiền thành công, vui lòng kiểm tra lại!", 'icon' => "success", 'button' => "Đồng ý"));        
    }
}else{
    $kiemtra_email = mysqli_num_rows(mysqli_query($ketnoi, "SELECT email FROM nguoidung WHERE `email` = '$nguoinhan'"));
    if($kiemtra_email < 1){
        echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Email không tồn tại, vui lòng kiểm tra lại", 'icon' => "error", 'button' => "Đồng ý"));
    }elseif($nguoinhan == $dulieu_taikhoan['email']){
        echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Email không thể là chính bạn", 'icon' => "error", 'button' => "Đồng ý"));
    }elseif(!filter_var($nguoinhan, FILTER_VALIDATE_EMAIL)){
        echo json_encode(array('tieude' => "Lỗi!", 'noidung' => "Email không hợp lệ", 'icon' => "error", 'button' => "Đồng ý"));
    }else{
        mysqli_query($ketnoi, "UPDATE `nguoidung` SET `tien` = `tien` - '$sotien' WHERE `id` = '$taikhoan_id'");
        mysqli_query($ketnoi, "UPDATE `nguoidung` SET `tien` = `tien` + '$sotien' WHERE `email` = '$nguoinhan'");
        mysqli_query($ketnoi, "INSERT INTO `lichsu_giaodich`(id_nguoichuyen,nguoi_chuyen,nguoi_nhan,sotien,thoigian) VALUES ('$taikhoan_id','".$dulieu_taikhoan['hovaten']."','$nguoinhan','$sotien','$thoigian')");
        echo json_encode(array('thanhcong' => "1", 'tieude' => "Thành Công!", 'noidung' => "Giao dịch chuyển tiền thành công, vui lòng kiểm tra lại!", 'icon' => "success", 'button' => "Đồng ý"));        
    }
}
