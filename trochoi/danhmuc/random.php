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
					window.location.assign('/trochoi/random');
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
    $loai_random = !empty($_POST['loai_random']) ? $_POST['loai_random'] : "";
        
    if ($maso) {
        $dulieu_maso = "AND `id` = '$maso'";
    }

    switch ($gia) {
    case '1':
        $dulieu_gia = "AND `gia` = 15000";
    break;
    case '2':
        $dulieu_gia = "AND `gia` = 30000";
    break;
    case '3':  
        $dulieu_gia = "AND `gia` = 60000";
    break;
    default:
        $dulieu_gia = "";
    break;
    }
    
    switch ($loai_random) {
    case '1':
        $dulieu_random = "AND `loai_random` = 'LIENMINH'";
    break;
    case '2':
        $dulieu_random = "AND `loai_random` = 'LIENQUAN'";
    break;
    case '3':  
        $dulieu_random = "AND `loai_random` = 'NGOCRONG'";
    break;    
    default:
        $dulieu_random = "";
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
    
    $tong_taikhoan = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE loai_taikhoan = 'RANDOM' AND `trangthai` = 'chuaban' $dulieu_maso $dulieu_gia $dulieu_random"));

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
$ketnoi_taikhoan = mysqli_query($ketnoi, "SELECT * FROM `baidang` WHERE loai_taikhoan = 'RANDOM' AND `trangthai` = 'chuaban' $dulieu_maso $dulieu_gia $dulieu_random $dulieu_sapxepgia LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");
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
                        <a href="/taikhoan/random-ma-so-<?php echo $dulieu_taikhoan['id']; ?>">
                            <img class="img rounded" src="<?php echo $dulieu_taikhoan['hinhanh_gioithieu']; ?>">
                        </a>
                    </div>

                    <div class="card-body">
                        <h6 class="category text-danger"><?php echo $loairandom; ?><?php echo $taikhoan_vip; ?></h6>
                        <h4 class="card-title">
                            <a href="/taikhoan/random-ma-so-<?php echo $dulieu_taikhoan['id']; ?>" class="card-link"><?php echo $loai_taikhoan; ?> MS<?php echo $dulieu_taikhoan['id']; ?></a>
                        </h4>

                        <ul>
                        <?php if($dulieu_taikhoan['loai_taikhoan'] == 'RD_NRO'){ ?>
                        <li style="color:#333;">Hành tinh: <b>Không rõ</b></li>
                        <li style="color:#333;">Máy chủ: <b>Không rõ</b></li>
                        <li style="color:#333;">Đăng ký: <b>Không rõ</b></li>
                        <li style="color:#333;">Bông tai: <b>Không rõ</b></li>
                        <li style="color:#333;">Sơ sinh có đệ: <b>Không rõ</b></li>
                        <?php }else{ ?>
                        <li style="color:#333;">Tướng: <b>Không rõ</b></li>
                        <li style="color:#333;">Trang phục: <b>Không rõ</b></li>
                        <li style="color:#333;">Xếp hạng: <b>Không rõ</b></li>
                        <li style="color:#333;">Bảng ngọc: <b>Không rõ</b></li>
                        <?php } ?>
                        </ul>


                        <div class="card-footer" style="padding-top:20px;">
                                <a href="/taikhoan/random-ma-so-<?php echo $dulieu_taikhoan['id']; ?>" class="btn btn-primary btn-outline-primary" style="color: #2ca8ff;border: 1px solid #2ca8ff;"><?php echo number_format($dulieu_taikhoan['gia']); ?> VNĐ</a>
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
<?php echo $phantrang->phantrang_random(); ?>