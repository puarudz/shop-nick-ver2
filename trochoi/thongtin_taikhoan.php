<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   tuoitre4v.com
* @Liên Hệ     https://facebook.com/hoanganh.180599
*/
session_start();
require('../quantri_hethong/xuly_ketnoi.php');
$id = htmlspecialchars(strip_tags($_GET['id']));
$dulieu_baidang = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `baidang` WHERE `id`='$id'"));

if($dulieu_baidang['loai_taikhoan'] == 'LMHT'){
    $loai_taikhoan = 'LIÊN MINH HUYỀN THOẠI';
}elseif($dulieu_baidang['loai_taikhoan'] == 'LQM'){
    $loai_taikhoan = 'LIÊN QUÂN MOBILE';    
}elseif($dulieu_baidang['loai_taikhoan'] == 'NRO'){
    $loai_taikhoan = 'NGỌC RỒNG ONLINE';    
}elseif($dulieu_baidang['loai_taikhoan'] == 'RANDOM'){
    if($dulieu_baidang['loai_random'] == 'NGOCRONG'){
        $loai_taikhoan = 'RANDOM NGỌC RỒNG';     
    }elseif($dulieu_baidang['loai_random'] == 'LIENMINH'){
        $loai_taikhoan = 'RANDOM LIÊN MINH';
    }else{
        $loai_taikhoan = 'RANDOM LIÊN QUÂN';    
}
}
$tieudetrang = $loai_taikhoan.' Mã Số '.$dulieu_baidang['id'];
require('../quantri_hethong/danhmuc_phantren.php');
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
					window.location.assign('/taikhoan/tai-khoan-ma-so-<?php echo $dulieu_baidang['id']; ?>');
				}, 500);
			}				
		}, "json");		    
	}
</script>
<div class="wrapper">
<div class="features-1" style="background-image: url(/danhmuc_hinhanh/background.jpg);background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title" style="color:white;"><?php echo $loai_taikhoan; ?></h2>
                </div>
            </div>
        </div>
    </div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-5">

                <div id="chuyencanh" class="carousel slide" data-ride="carousel" data-interval="8000">
                    <ol class="carousel-indicators">
                        <?php
                        $hinhanh = explode(PHP_EOL,$dulieu_baidang['hinhanh']);
                        $hinhanh_dem = count(explode(PHP_EOL,$dulieu_baidang['hinhanh']));
                        while($hinhanh_dem > 0){
                            if($dem == 0){
                        ?>
                        <li data-target="#chuyencanh" data-slide-to="0" class="active"></li>
                        <? }else{ ?>
                        <li data-target="#chuyencanh" data-slide-to="<?php echo $dem; ?>" class=""></li>
                        <?php
                        }
                        $dem++;
                        $hinhanh_dem--;
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
						<?php 
						foreach($hinhanh as $hinhanh_taikhoan){
						if($i == 1){
						?>
                        <div class="carousel-item active">
                        <?php }else{ ?>
                        <div class="carousel-item">
                        <?php } ?>
                        <img class="d-block img-raised" src="<?php echo $hinhanh_taikhoan; ?>">
                        </div>
						<?php 
						$i++;
						} ?>                            
                    </div>
                    <a class="carousel-control-prev" href="#chuyencanh" role="button" data-slide="prev">
                        <button type="button" class="btn btn-primary btn-icon btn-round btn-sm" name="button">
                            <i class="now-ui-icons arrows-1_minimal-left"></i>
                        </button>
                    </a>
                    <a class="carousel-control-next" href="#chuyencanh" role="button" data-slide="next">
                        <button type="button" class="btn btn-primary btn-icon btn-round btn-sm" name="button">
                            <i class="now-ui-icons arrows-1_minimal-right"></i>
                        </button>
                    </a>
                </div>

                <p class="blockquote blockquote-primary"><?php echo $dulieu_baidang['noidung']; ?>
                    <br><small><?php echo $dulieu_baidang['nguoidang']; ?></small>
                </p>

            </div>
            <div class="col-md-6 ml-auto mr-auto">
                <h2 class="title"><?php echo $loai_taikhoan; ?> MS<?php echo $dulieu_baidang['id']; ?></h2>
                <?php
                if($dulieu_baidang['taikhoan_vip'] == 1){
                    $taikhoan_vip = 'TÀI KHOẢN VIP';
                }else{
                    $taikhoan_vip = 'TÀI KHOẢN THƯỜNG';
                }
                ?>
                <h5 class="category"><?php echo $taikhoan_vip; ?></h5>
                <h2 class="main-price"><?php echo number_format($dulieu_baidang['gia']); ?> VNĐ</h2>

                <div id="morong" role="tablist" aria-multiselectable="true" class="card-collapse">
                    <div class="card card-plain">
                        <div class="card-header" role="tab" id="headingOne">
                            <a data-toggle="collapse" data-parent="#morong" href="#thongtinchung" aria-expanded="false" aria-controls="thongtinchung" class="collapsed">Thông tin chung<i class="now-ui-icons arrows-1_minimal-down"></i>
                        </a>
                        </div>

                        <div id="thongtinchung" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                            <div class="card-body">
                                <ul>
                                    <?php if($loai_taikhoan == 'LIÊN MINH HUYỀN THOẠI' || $loai_taikhoan == 'LIÊN QUÂN MOBILE'){ ?>
                                    <li>Tướng: <?php echo $dulieu_baidang['tuong']; ?> Tướng</li>
                                    <li>Trang phục: <?php echo $dulieu_baidang['trangphuc']; ?> Trang phục</li>
                                    <li>Bảng ngọc: <?php echo $dulieu_baidang['bangngoc']; ?> Bảng ngọc</li>
                                    <?php if($loai_taikhoan == 'LIÊN MINH HUYỀN THOẠI'){ ?>
                                    <li>Xếp hạng: <?php echo xephanglienminh($dulieu_baidang['xephang']); ?></li>
                                    <?php }elseif($loai_taikhoan == 'LIÊN QUÂN MOBILE'){ ?>
                                    <li>Xếp hạng: <?php echo xephanglienquan($dulieu_baidang['xephang']); ?></li>
                                    <?php } ?>
                                    <?php }elseif($loai_taikhoan == 'NGỌC RỒNG ONLINE'){ ?>
                                    <li>Hành tinh: <?php echo hanhtinh_ngocrong($dulieu_baidang['nro_hanhtinh']); ?></li>
                                    <li>Máy chủ: <?php echo maychu_ngocrong($dulieu_baidang['nro_maychu']); ?></li>
                                    <li>Đăng ký: <?php echo dangky_ngocrong($dulieu_baidang['nro_dangky']); ?></li>
                                    <li>Bông tai: <?php echo bongtai_ngocrong($dulieu_baidang['nro_bongtai']); ?></li>
                                    <?php }else{ ?>
                                    <li>Không có thông tin gì</li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card card-plain">
                        <div class="card-header" role="tab" id="headingTwo">
                            <a class="collapsed" data-toggle="collapse" data-parent="#morong" href="#thongtinthem" aria-expanded="false" aria-controls="thongtinthem">Thông tin thêm<i class="now-ui-icons arrows-1_minimal-down"></i>
                        </a>
                        </div>
                        <div id="thongtinthem" class="collapse" role="tabpanel" aria-labelledby="headingTwo" style="">
                            <div class="card-body">
                                <ul>
                                    <?php if($loai_taikhoan == 'LIÊN MINH HUYỀN THOẠI' || $loai_taikhoan == 'LIÊN QUÂN MOBILE'){ ?>
                                    <?php if($loai_taikhoan == 'LIÊN MINH HUYỀN THOẠI'){ ?>
                                    <li>Khung hiện tại: <?php echo khung_xephanglienminh($dulieu_baidang['khung']); ?></li>
                                    <?php }elseif($loai_taikhoan == 'LIÊN QUÂN MOBILE'){ ?>
                                    <li>Khung hiện tại: <?php echo khung_xephanglienquan($dulieu_baidang['khung']); ?></li>
                                    <?php } ?>
                                    <li>Email: <?php echo kiemtra($dulieu_baidang['email']); ?></li>
                                    <li>Số điện thoại: <?php echo kiemtra($dulieu_baidang['sodienthoai']); ?></li>
                                    <li>Facebook: <?php echo kiemtra($dulieu_baidang['facebook']); ?></li>
                                    <?php }elseif($loai_taikhoan == 'NGỌC RỒNG ONLINE'){ ?>
                                    <li>Sơ sinh có đệ: <?php echo sosinhcode_ngocrong($dulieu_baidang['nro_sosinhcode']); ?></li>
                                    <?php }else{ ?>
                                    <li>Không có thông tin gì</li>
                                    <?php } ?>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card card-plain">
                        <div class="card-header" role="tab" id="headingThree">
                            <a class="collapsed" data-toggle="collapse" data-parent="#morong" href="#chedobaohanh" aria-expanded="false" aria-controls="chedobaohanh">Thông tin nổi bật<i class="now-ui-icons arrows-1_minimal-down"></i>
                        </a>
                        </div>
                        <div id="chedobaohanh" class="collapse" role="tabpanel" aria-labelledby="headingThree" style="">
                            <div class="card-body">
                                <ul>
                                    <li><?php echo $dulieu_baidang['noibat']; ?></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <button class="btn btn-primary mr-3" onclick="themgiohang(<?php echo $dulieu_baidang['id']; ?>);">Thêm vào giỏ hàng<i class="now-ui-icons shopping_cart-simple"></i></button>
                </div>
            </div>
        </div>

    </div>
</div>
<hr/>
<footer class="footer">
    <div class=" container ">
        <nav>
            <ul>
                <li>
                    <a href="<?php echo $hethong['facebook']; ?>">
                        Facebook
                    </a>
                </li>
                <li>
                    <a href="tel:<?php echo $hethong['sodienthoai']; ?>">
                       <?php echo $hethong['sodienthoai']; ?>
                    </a>
                </li>
                <li>
                    <a href="mail:<?php echo $hethong['Email']; ?>">
                       <?php echo $hethong['Email']; ?>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright" id="copyright">
        Bản quyền thuộc về <?php echo $hethong['mota_logo']; ?>
        </div>
    </div>
</footer>
    </div>
         	
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/core/jquery.min.js" type="text/javascript"></script>            	
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/core/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/plugins/bootstrap-switch.js"></script>
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/plugins/nouislider.min.js" type="text/javascript"></script>
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/plugins/moment.min.js"></script>
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/plugins/bootstrap-tagsinput.js"></script>
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/now-ui-kit.min.js" type="text/javascript"></script>
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/danhmuc/jquery.sharrre.js"></script>
<script>
    $(document).ready(function(){
        nowuiKit.initSliders();
    });

    function scrollToDownload(){
        if($('.section-download').length != 0){
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            },1000);
        }
    }
</script>
    </body>
</html>
