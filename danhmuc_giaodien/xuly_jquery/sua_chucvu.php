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
    $chucvu = htmlspecialchars(addslashes($_POST['chucvu']));
    $matkhau = md5(md5($_POST['matkhau']));
    
    $dulieu_quantri = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `hethong_quantri`"));
    $kiemtra_matkhau = $dulieu_quantri['matkhau'];

if ($matkhau != $kiemtra_matkhau){
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Mật khẩu quản trị không hợp lệ"));
    exit();
}

if ($id == $taikhoan_id){
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Không thể thay đổi thông tin chính bản thân"));
    exit();
}


if ($taikhoan_id && $dulieu_taikhoan['chucvu'] == 'quantri'){
    
    mysqli_query($ketnoi, "UPDATE nguoidung SET
    chucvu = '$chucvu'
    WHERE `id`='$id'
    ");
    
    echo json_encode(array('thanhcong' => "1", 'icon' => "success", 'tieude' => "Thành công", 'noidung' => "Lưu cài đặt thành công"));
}else{
    echo json_encode(array('icon' => "error", 'tieude' => "Lỗi", 'noidung' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}

?>
