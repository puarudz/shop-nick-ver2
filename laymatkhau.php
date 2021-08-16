<?php
session_start();
require('quantri_hethong/xuly_ketnoi.php');
$hethong = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `hethong_quantri`"));
$tieudetrang = 'Khôi phục mật khẩu - '.$hethong['mota_logo'];
if($taikhoan_id){
    header('location: /');
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $hethong['icon']; ?>">
<link rel="icon" type="image/png" href="<?php echo $hethong['icon']; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo isset($tieudetrang) ? ''.$tieudetrang.'' : ''.$hethong['tieude'].''; ?></title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<link rel="canonical" href="<?php echo $trangchu; ?>" />

<!--  SEO Google -->
<meta name="keywords" content="<?php echo $hethong['tukhoa']; ?>">
<meta name="description" content="<?php echo $hethong['mota']; ?>">

<!-- Dữ liệu tìm kiếm trên FACEBOOK -->
<meta property="fb:app_id" content="<?php echo $hethong['facebook_id']; ?>">
<meta property="og:title" content="<?php echo $hethong['tieude']; ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo $trangchu; ?>" />
<meta property="og:image" content="<?php echo $hethong['anh_mota']; ?>"/>
<meta property="og:description" content="<?php echo $hethong['mota']; ?>" />
<meta property="og:site_name" content="<?php echo $hethong['chu_trangweb']; ?>" />

<!-- Phông chữ và icon -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200|Open+Sans+Condensed:700" rel="stylesheet">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- Nhúng giao diện -->
    <link href="<?php echo $trangchu; ?>/danhmuc_giaodien/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $trangchu; ?>/danhmuc_giaodien/giaodien.css" rel="stylesheet" />
    <link href="<?php echo $trangchu; ?>/danhmuc_giaodien/danhmuc/giaodien.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js"></script>
	<script src="/danhmuc_giaodien/javascript/thongbao.hopthoai.js"></script>
    <body class="login-page sidebar-collapse">
      
<nav class="navbar navbar-expand-lg bg-white fixed-top navbar-transparent" color-on-scroll="500">
	<div class="container">
		<div class="navbar-translate">
			<a class="navbar-brand" href="<?php echo $trangchu; ?>" rel="tooltip" title="<?php echo $hethong['mota_logo']; ?> HỆ THỐNG CHUYÊN CUNG CẤP TÀI KHOẢN GAME" data-placement="bottom">
				<?php echo $hethong['mota_logo']; ?>
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
		   		<span class="navbar-toggler-bar top-bar"></span>
				<span class="navbar-toggler-bar middle-bar"></span>
				<span class="navbar-toggler-bar bottom-bar"></span>
		 	</button>
		</div>

	    <div class="collapse navbar-collapse" data-nav-image="/danhmuc_hinhanh/blurred-image-1.jpg" data-color="orange">
			<ul class="navbar-nav ml-auto" id="ceva">
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
						<i class="now-ui-icons users_circle-08"></i>
						<p>Trò chơi</p>
					</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
						<a class="dropdown-item" href="/trochoi/lien-minh-huyen-thoai">
							<i class="now-ui-icons tech_laptop"></i>
							Liên Minh Huyền Thoại
						</a>
						<a class="dropdown-item" target="_blank" href="/trochoi/lien-quan-mobile">
							<i class="now-ui-icons tech_mobile"></i>
							Liên Quân Mobile
						</a>
						<a class="dropdown-item" target="_blank" href="/trochoi/ngoc-rong-online">
							<i class="now-ui-icons tech_mobile"></i>
							Ngọc Rồng Online
						</a>						
					</div>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
						<i class="now-ui-icons files_paper" aria-hidden="true"></i>
						<p>Dịch Vụ</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="/dichvu/nap-tien">
							<i class="now-ui-icons shopping_credit-card"></i>
							Nạp Tiền
						</a>
						<a class="dropdown-item" href="/dichvu/mua-the">
							<i class="now-ui-icons education_agenda-bookmark"></i>
							Mua Thẻ
						</a>
						<a class="dropdown-item" href="/dichvu/cay-thue">
							<i class="now-ui-icons shopping_delivery-fast"></i>
							Cày thuê
						</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
						<i class="now-ui-icons text_align-left" aria-hidden="true"></i>
						<p>Tiện ích</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="/tienich/tin-tuc">
							<i class="now-ui-icons business_bulb-63"></i>
							Tin tức
						</a>
						<a class="dropdown-item" href="/tienich/doi-mat-khau">
							<i class="now-ui-icons text_align-left"></i>
							Đổi mật khẩu
						</a>
						<a class="dropdown-item" href="/tienich/lien-he">
							<i class="now-ui-icons design_bullet-list-67"></i>
							Liên Hệ
						</a>
					</div>
				</li>
                <?php if(!$taikhoan_id){ ?>
				<li class="nav-item">
					<a class="nav-link btn btn-primary btn-round" href="/taikhoan/dangnhap">
						<p>Đăng nhập</p>
					</a>
				</li>
                <?php }else{ ?>
                <li class="nav-item">
									<div class="dropdown">
										<button class="nav-link btn btn-primary btn-round dropdown-toggle btn-block" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="now-ui-icons users_circle-08"></i> <?php echo $dulieu_taikhoan['hovaten']; ?>
										</button>
										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1px, 38px, 0px);">
											<a class="dropdown-item" href="/taikhoan/thongtin">Thông tin</a>
											<a class="dropdown-item" href="/taikhoan/doi-mat-khau">Đổi mật khẩu</a>
											<a class="dropdown-item" href="/taikhoan/dangxuat">Thoát</a></a>
										</div>
								  </div>
								</li>
                <?php } ?>		
			</ul>
	    </div>
	</div>
</nav>
	
<script>
$(document).ready(function () {
			$("#xuly_laymatkhau").ajaxForm({
					dataType: 'json',
					url: '/xuly_taikhoan/xuly_laymatkhau.php',
					success: function (dulieu) {
							swal({
							title: dulieu.tieude,
							text: dulieu.noidung,
							icon: dulieu.icon,
							button:	dulieu.button
							});
							if(dulieu.thanhcong == 1) {
							setTimeout(function () {
								window.location.assign('/taikhoan/laymatkhau');
							}, 2000);
						}
					},
					});
			});
</script>
<div class="page-header header-filter" filter-color="blue">
        <div class="page-header-image" style="background-image:url(/danhmuc_hinhanh/taikhoan/login.jpg)"></div>
        <div class="content">
            <div class="container">
                <div class="col-md-5 ml-auto mr-auto">
                    <div class="card card-login card-plain">
                        <form class="form" action="#" method="post" id="xuly_laymatkhau">
                            <div class="card-header text-center">
                                <div class="logo-container">
                                    <img src="/danhmuc_hinhanh/taikhoan/now-logo.png" alt="">
                                </div>
                            </div>
                            <div class="card-body" style="margin-bottom: -60px;">
                              <div class="input-group no-border input-lg">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="now-ui-icons users_circle-08"></i></span>
                                </div>
                                <input type="text" name="email" class="form-control" placeholder="Địa Chỉ Email">
                              </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Xác nhận</button>
                            </div>
                            <div class="pull-left">
                                <h6><a href="/taikhoan/dangki" class="link footer-link">Tạo tài khoản</a></h6>
                            </div>

                            <div class="pull-right">
                                <h6><a href="/taikhoan/dangki" class="link footer-link">Đăng nhập tài khoản</a></h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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