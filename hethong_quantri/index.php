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
if($taikhoan_id){
    if(!$dulieu_taikhoan['chucvu'] == 'quantri'){
        header('location: /404');
        exit;
}
require('../quantri_hethong/danhmuc_phantren_quantri.php');
echo'<div class="content content-boxed"><div class="col-sm-5 col-sm-push-7 col-lg-4 col-lg-push-8">';
require_once 'danhmuc/danhmuc.php';
echo'</div><div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">';

    $xuly = isset($_GET['xuly']) ? $_GET['xuly'] : '';
    
    switch ($xuly) {
    case 'thanhvien':
    require_once 'danhmuc/thanhvien.php';
    break;
    case 'sua':
    require_once 'danhmuc/sua.php';
    break;
    case 'thongtinATM':
    require_once 'danhmuc/thongtinATM.php';
    break;    
    case 'taikhoan':
    require_once 'danhmuc/lienminh/trangchinh.php';
    break;     
    case 'caidat':
    require_once 'danhmuc/caidat.php';
    break;
    case 'giaodich':
    require_once 'danhmuc/giaodich.php';
    break;     
    default:
    require_once 'danhmuc/trangchinh.php';
    break;
    }
echo'</div></div>';
require('../quantri_hethong/danhmuc_phanduoi_quantri.php');
}else{
    header('location: /404');
}
?>