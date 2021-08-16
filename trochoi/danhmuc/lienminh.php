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
?>
	<script src="/danhmuc_giaodien/javascript/thongbao.hopthoai.js"></script>
<script>
    function themgiohang(id) {
	$.post("/xuly_taikhoan/xuly_themgiohang.php", {id: id},
			function (dulieu) {
				swal({
					title: dulieu.tieude,
					text: dulieu.noidung,
					button: dulieu.button
				});
			if (dulieu.thanhcong == 1) {
				setTimeout(function () {
					window.location.assign('/trochoi/lien-minh-huyen-thoai');
				}, 500);
			}				
		}, "json");		    
	}
</script>
<?php
    $page = !empty($_POST['page']) ? $_POST['page'] : "";
    $maso = !empty($_POST['maso']) ? $_POST['maso'] : "";
    $gia = !empty($_POST['gia']) ? $_POST['gia'] : "";
    $sapxepgia = !empty($_POST['sapxepgia']) ? $_POST['sapxepgia'] : "";    
    $taikhoan_vip = !empty($_POST['taikhoan_vip']) ? $_POST['taikhoan_vip'] : "";
    $xephang = !empty($_POST['xephang']) ? $_POST['xephang'] : "";
        
    if ($maso) {
        $dulieu_maso = "AND `id` = '$maso'";
    }

    switch ($taikhoan_vip) {
    case '1':
        $dulieu_taikhoan_vip = "AND `taikhoan_vip` = '1'";
    break;
    case '2':
        $dulieu_taikhoan_vip = "AND `taikhoan_vip` = '0'";        
    break;
    default:
        $dulieu_taikhoan_vip = "";
    break;
    }

    switch ($gia) {
    case '1':
        $dulieu_gia = "AND `gia` < 50000";
    break;
    case '2':
        $dulieu_gia = "AND `gia` < 100000";
    break;
    case '3':  
        $dulieu_gia = "AND `gia` < 200000";
    break;
    case '4':
        $dulieu_gia = "AND `gia` > 500000";
    break;
    default:
        $dulieu_gia = "";
    break;
    }
    
    switch ($xephang) {
    case '1':
        $dulieu_xephang = "AND `xephang` = 1";
    break;
    case '2':
        $dulieu_xephang = "AND `xephang` >= 2 AND `xephang` <= 4";
    break;
    case '3':  
        $dulieu_xephang = "AND `xephang` >= 5 AND `xephang` <= 7";
    break;
    case '4':
        $dulieu_xephang = "AND `xephang` >= 8 AND `xephang` <= 11";
    break;
    case '5':
        $dulieu_xephang = "AND `xephang` >= 12 AND `xephang` <= 16";
    break;        
    case '6':         
        $dulieu_xephang = "AND `xephang` >= 17 AND `xephang` <= 21";
    break;        
    case '7':         
        $dulieu_xephang = "AND `xephang` = 22";
    break;        
    case '8':         
        $dulieu_xephang = "AND `xephang` = 23";
    break;        
    case '9':         
        $dulieu_xephang = "AND `xephang` = 24";
    break;    
    default:
        $dulieu_xephang = "";
    break;
    }
    
    switch ($sapxepgia) {
    case '1':
        $dulieu_sapxepgia = "ORDER BY gia ASC";
    break;
    case '2':
        $dulieu_sapxepgia = "ORDER BY gia DESC";
    break;    
    default:
        $dulieu_sapxepgia = "ORDER BY id DESC";
    break;
    }
    
    $tong_taikhoan = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE loai_taikhoan = 'LMHT' AND `trangthai` = 'chuaban' $dulieu_maso $dulieu_taikhoan_vip $dulieu_gia $dulieu_xephang"));

$phantrang_taikhoan = array(
    "current_page" => $page,
    "total_record" => $tong_taikhoan,
    "limit" => "12",
    "range" => "6",
    "link_first" => "",
    "link_full" => "?page={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_taikhoan);
$ketnoi_taikhoan = mysqli_query($ketnoi, "SELECT * FROM `baidang` WHERE loai_taikhoan = 'LMHT' AND `trangthai` = 'chuaban' $dulieu_maso $dulieu_taikhoan_vip $dulieu_gia $dulieu_xephang $dulieu_sapxepgia LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");
?>
        <div class="row">
            <?php
            if ($tong_taikhoan == 0){
            ?>
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h3 class="title" style="color: #888;">Hiện tại chưa có tài khoản nào được đăng bán</h3>        
            </div>
            <?php }else{ 
                $i = 1;
                while ($dulieu_taikhoan = mysqli_fetch_array($ketnoi_taikhoan)){ 
            if($dulieu_taikhoan['taikhoan_vip'] == 1){
                $taikhoan_vip = '<h6 class="category text-danger">TÀI KHOẢN VIP</h6>';
            }else{
                $taikhoan_vip = '<h6 class="category text-muted">TÀI KHOẢN THƯỜNG</h6>';
            }
            
            if($dulieu_taikhoan['loai_taikhoan'] == 'LMHT'){
                 $loai_taikhoan = 'LIÊN MINH';
            }elseif($dulieu_taikhoan['loai_taikhoan'] == 'LQM'){
                $loai_taikhoan = 'LIÊN QUÂN';    
            }elseif($dulieu_taikhoan['loai_taikhoan'] == 'NRO'){
                $loai_taikhoan = 'NGỌC RỒNG';    
            }else{
                $loai_taikhoan = 'RANDOM';     
            }
            ?>
            <div class="col-sm-6 col-md-3">
                <div class="card card-product">
                    <div class="card-image">
                        <a href="/taikhoan/lien-minh-huyen-thoai-ma-so-<?php echo $dulieu_taikhoan['id']; ?>">
                            <img class="img rounded" src="<?php echo $dulieu_taikhoan['hinhanh_gioithieu']; ?>">
                        </a>
                    </div>

                    <div class="card-body">
                        <h6 class="category text-danger"><?php echo $taikhoan_vip; ?></h6>
                        <h4 class="card-title">
                            <a href="/taikhoan/lien-minh-huyen-thoai-ma-so-<?php echo $dulieu_taikhoan['id']; ?>" class="card-link"><?php echo $loai_taikhoan; ?> MS<?php echo $dulieu_taikhoan['id']; ?></a>
                        </h4>

                        <ul>
                        <li style="color:#333;">Tướng: <b><?php echo $dulieu_taikhoan['tuong']; ?></b></li>
                        <li style="color:#333;">Trang phục: <b><?php echo $dulieu_taikhoan['trangphuc']; ?></b></li>
                        <li style="color:#333;">Xếp hạng: <b><?php echo xephanglienminh($dulieu_taikhoan['xephang']); ?></b></li>
                        <li style="color:#333;">Bảng ngọc: <b><?php echo $dulieu_taikhoan['bangngoc']; ?></b></li>
                        </ul>


                        <div class="card-footer" style="padding-top:20px;">
                                <a href="/taikhoan/lien-minh-huyen-thoai-ma-so-<?php echo $dulieu_taikhoan['id']; ?>" class="btn btn-primary btn-outline-primary" style="color: #2ca8ff;border: 1px solid #2ca8ff;"><?php echo number_format($dulieu_taikhoan['gia']); ?> VNĐ</a>
                                <a class="btn btn-primary btn-outline-primary btn-round pull-right" onclick="themgiohang(<?php echo $dulieu_taikhoan['id']; ?>);" style="color: #dc3545;border: 1px solid #dc3545;" title="Thêm vào giỏ hàng">
                                 <i class="now-ui-icons shopping_cart-simple"></i>
                             </a>
                         </div>
                    </div>
                </div>
            </div>
            <?php 
            $i++; 
            }
            }
            ?>
        </div>
<?php echo $phantrang->phantrang_lienminh(); ?>