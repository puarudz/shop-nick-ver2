<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   tuoitre4v.com
* @Liên Hệ     https://facebook.com/hoanganh.180599
*/
session_start();
ob_start();
require('quantri_hethong/xuly_ketnoi.php');
require('quantri_hethong/danhmuc_phantren.php');

// Thống kê liên minh huyền thoại
$tong_lienminh = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='LMHT'"));
$dangcon_lienminh = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='LMHT' AND `trangthai`='chuaban'"));
$daban_lienminh = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='LMHT' AND `trangthai`='daban'"));

// Thống kê liên quân mobile
$tong_lienquan = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='LQM'"));
$dangcon_lienquan = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='LQM' AND `trangthai`='chuaban'"));
$daban_lienquan = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='LQM' AND `trangthai`='daban'"));

// Thống kê ngọc rồng online
$tong_ngocrong = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='NRO'"));
$dangcon_ngocrong = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='NRO' AND `trangthai`='chuaban'"));
$daban_ngocrong = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='NRO' AND `trangthai`='daban'"));

// Thống kê random ngọc rồng online
$tong_random = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='RANDOM'"));
$dangcon_random = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='RANDOM' AND `trangthai`='chuaban'"));
$daban_random = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan`='RANDOM' AND `trangthai`='daban'"));


?>
	
<div class="wrapper">
<div class="features-1" style="background-image: url(/danhmuc_hinhanh/background.jpg);background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title" style="color:white;"><?php echo $hethong['mota_logo']; ?></h2>
                    <h4 class="description" style="margin-top: -30px;color: white;">Chuyên cung cấp tài khoản game.</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="info info-hover">
                        <div class="icon icon-primary">
                            <i class="now-ui-icons ui-2_chat-round"></i>
                        </div>
                        <h4 class="info-title" style="color: white;">Hỗ Trợ CSKH</h4>
                        <p class="description" style="margin-top: -20px;color: white;">Chức năng live chat trực tiếp trên web hỗ trợ CSKH chu đáo</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info info-hover">
                        <div class="icon icon-success">
                            <i class="now-ui-icons business_chart-pie-36"></i>
                        </div>
                        <h4 class="info-title" style="color: white;">Giao Dịch</h4>
                        <p class="description" style="margin-top: -20px;color: white;">Chức năng giao dịch nhanh chóng tiện lợi.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info info-hover">
                        <div class="icon icon-warning">
                            <i class="now-ui-icons design-2_ruler-pencil"></i>
                        </div>
                        <h4 class="info-title" style="color: white;">Uy Tín</h4>
                        <p class="description" style="margin-top: -20px;color: white;"><?php echo $hethong['mota_logo']; ?> là trang web cung cấp tài khoản game uy tín nhất</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="section section-pills">
    <div class="container">
<div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
                <h3 class="title">DANH MỤC TÀI KHOẢN GAME</h3>
            </div>
        </div>        

        <div class="row">
            <div class="col-md-3">
                <div class="card card-testimonial">
                    <div class="card-avatar">
                        <a href="/trochoi/lien-minh-huyen-thoai">
                            <img class="img img-raised" src="/danhmuc_hinhanh/trochoi/lienminh.png">
                        </a>
                    </div>
<div class="card-footer">
                        <h6 class="card-title" style="margin-bottom: -50px;">LIÊN MINH HUYỀN THOẠI
    <p class="category">@Garena</p>
</h6>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Tổng: <?php echo $tong_lienminh; ?><br>
							Đã bán: <?php echo $daban_lienminh; ?><br>
							Đang còn: <?php echo $dangcon_lienminh; ?>
                        </p>
<a href="/trochoi/lien-minh-huyen-thoai" class="btn btn-primary btn-outline-primary btn-round">Xem thông tin</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-testimonial">
                    <div class="card-avatar">
                        <a href="/trochoi/lien-quan-mobile">
                            <img class="img img-raised" src="/danhmuc_hinhanh/trochoi/lienquan.jpg">
                        </a>
                    </div>
<div class="card-footer">
                        <h6 class="card-title" style="margin-bottom: -50px;">LIÊN QUÂN MOBILE
    <p class="category">@Garena</p>
</h6>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Tổng: <?php echo $tong_lienquan; ?><br>
							Đã bán: <?php echo $daban_lienquan; ?><br>
							Đang còn: <?php echo $dangcon_lienquan; ?>
                        </p>
<a href="/trochoi/lien-quan-mobile" class="btn btn-primary btn-outline-primary btn-round">Xem thông tin</a>
                    </div>
                </div>
            </div>

            


<div class="col-md-3">
                <div class="card card-testimonial">
                    <div class="card-avatar">
                        <a href="/trochoi/ngoc-rong-online">
                            <img class="img img-raised" src="/danhmuc_hinhanh/trochoi/ngocrong.jpg">
                        </a>
                    </div>
<div class="card-footer">
                        <h6 class="card-title" style="margin-bottom: -50px;">NGỌC RỒNG ONLINE
    <p class="category">@Teamobi</p>
</h6>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Tổng: <?php echo $tong_ngocrong; ?><br>
							Đã bán: <?php echo $daban_ngocrong; ?><br>
							Đang còn: <?php echo $dangcon_ngocrong; ?>
                        </p>
<a href="/trochoi/ngoc-rong-online" class="btn btn-primary btn-outline-primary btn-round">Xem thông tin</a>
                    </div>
                    
                    
                </div>
            </div><div class="col-md-3">
                <div class="card card-testimonial">
                    <div class="card-avatar">
                        <a href="/trochoi/random">
                            <img class="img img-raised" src="/danhmuc_hinhanh/trochoi/random.png">
                        </a>
                    </div>
<div class="card-footer">
                        <h6 class="card-title" style="margin-bottom: -50px;">THỬ VẬN MAY RANDOM
    <p class="category">@SHOPACCC.COM</p>
</h6>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Tổng: <?php echo $tong_random; ?><br>
							Đã bán: <?php echo $daban_random; ?><br>
							Đang còn: <?php echo $dangcon_random; ?>
                        </p>
<a href="/trochoi/random" class="btn btn-primary btn-outline-primary btn-round">Xem thông tin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr/>
<?php
require('quantri_hethong/danhmuc_phanduoi.php');
?>