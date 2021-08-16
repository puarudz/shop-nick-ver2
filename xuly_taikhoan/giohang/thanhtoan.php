<?php

require('../../quantri_hethong/xuly_ketnoi.php');

$thanhcong = '1';
$giohang = mysqli_query($ketnoi, "SELECT * FROM `giohang` WHERE `id_taikhoan`='$taikhoan_id'");
$kiemtra_giohang = mysqli_num_rows($giohang);

if ($kiemtra_giohang <= 0){
    echo json_encode(array('tieude' => "Lỗi", 'noidung' => "Giỏ hàng của bạn hiện tại đang trống"));
    exit();
}

while ($dulieu_giohang = mysqli_fetch_array($giohang)){
$kiemtra_taikhoan_daban = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `id`='".$dulieu_giohang['id_nick']."'"));

if ($kiemtra_taikhoan_daban['trangthai'] == 'daban'){
    echo json_encode(array('tieude' => "Lỗi", 'noidung' => "Giỏ hàng của bạn có sản phẩm đã được mua bởi người khác"));
    exit();
}

$tong_thanhtoan = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT SUM(sotien) FROM `giohang` WHERE `id_taikhoan`='$taikhoan_id'"));
$sotien_thanhtoan = $tong_thanhtoan['0'];
$dulieu_baidang = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `id`='".$dulieu_giohang['id_nick']."'"));
if($dulieu_baidang['loai_taikhoan'] == 'LMHT'){
    $loai_taikhoan = 'LIÊN MINH';
}elseif($dulieu_baidang['loai_taikhoan'] == 'LQM'){
    $loai_taikhoan = 'LIÊN QUÂN';
}elseif($dulieu_baidang['loai_taikhoan'] == 'NRO'){
    $loai_taikhoan = 'NGỌC RỒNG';
}else{
    if($dulieu_baidang['loai_random'] == 'RD_NRO'){
        $loai_taikhoan = 'RANDOM NGỌC RỒNG';
    }elseif($dulieu_baidang['loai_random'] == 'RD_LMHT'){
        $loai_taikhoan = 'RANDOM LIÊN MINH';
    }else{
        $loai_taikhoan = 'RANDOM LIÊN QUÂN';
    }
}  

if ($dulieu_taikhoan['tien'] < $sotien_thanhtoan){
    echo json_encode(array('tieude' => "Lỗi", 'noidung' => "Bạn không có đủ $sotien_thanhtoan VNĐ để thanh toán."));
    exit();
}

if ($taikhoan_id){
    mysqli_query($ketnoi, "DELETE FROM `giohang` WHERE `id_taikhoan` = '$taikhoan_id'");
    mysqli_query($ketnoi, "UPDATE baidang SET `trangthai`='daban' WHERE `id`='".$dulieu_giohang['id_nick']."'");
    mysqli_query($ketnoi, "UPDATE nguoidung SET `tien`=`tien` - '$sotien_thanhtoan' WHERE `id`='$taikhoan_id'");    
    mysqli_query($ketnoi, "INSERT INTO lichsu_muanick (loai_taikhoan, taikhoan_id, taikhoan_nick_id, taikhoan, matkhau, gia, thoigian) VALUES ('$loai_taikhoan','$taikhoan_id','".$dulieu_giohang['id_nick']."','".$kiemtra_taikhoan_daban['taikhoan']."','".$kiemtra_taikhoan_daban['matkhau']."','".$kiemtra_taikhoan_daban['gia']."','$thoigian')");
    $thanhcong = '1';
}else{
    $thanhcong = '0';
}    
}

if ($thanhcong == 1){
    echo json_encode(array('thanhcong' => '1', 'tieude' => "Thành công", 'noidung' => "Thanh toán đơn hàng thành công sản phẩm đã được lưu vào lịch sử giao dịch của bạn."));   
}else{
    echo json_encode(array('tieude' => "Lỗi", 'noidung' => "Có lỗi xảy ra khi thanh toán."));
}

?>