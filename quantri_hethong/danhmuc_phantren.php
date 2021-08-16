<?php
$hethong = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `hethong_quantri`"));
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200|Open+Sans+Condensed:700">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.7.1/css/all.css" crossorigin="anonymous">

<!-- Nhúng giao diện -->
<link href="<?php echo $trangchu; ?>/danhmuc_giaodien/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo $trangchu; ?>/danhmuc_giaodien/giaodien.css" rel="stylesheet" />
<link href="<?php echo $trangchu; ?>/danhmuc_giaodien/danhmuc/giaodien.css" rel="stylesheet" />
</head>
<body class="index-page sidebar-collapse">
<script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/core/jquery.min.js" type="text/javascript"></script>        
<!-- Khởi tạo nav bar -->
<nav class="navbar navbar-expand-lg bg-white fixed-top navbar-transparent" color-on-scroll="500">
	<div class="container">
		<div class="navbar-translate">
			<a class="navbar-brand" href="<?php echo $trangchu; ?>" rel="tooltip" title="HỆ THỐNG CHUYÊN CUNG CẤP TÀI KHOẢN GAME" data-placement="bottom"><?php echo $hethong['mota_logo']; ?></a>
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
						<!--<a class="dropdown-item" href="/dichvu/cay-thue">-->
						<!--	<i class="now-ui-icons shopping_delivery-fast"></i>-->
						<!--	Cày thuê-->
						<!--</a>-->
					</div>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
						<i class="now-ui-icons text_align-left" aria-hidden="true"></i>
						<p>Tiện ích</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<!--<a class="dropdown-item" href="/tienich/tin-tuc">-->
						<!--	<i class="now-ui-icons business_bulb-63"></i>-->
						<!--	Tin tức-->
						<!--</a>-->
						<a class="dropdown-item" href="/tienich/doi-mat-khau">
							<i class="now-ui-icons text_align-left"></i>
							Đổi mật khẩu
						</a>
						<!--<a class="dropdown-item" href="/tienich/lien-he">-->
						<!--	<i class="now-ui-icons design_bullet-list-67"></i>-->
						<!--	Liên Hệ-->
						<!--</a>-->
					</div>
				</li>
				<?php
				    $giohang = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `giohang` WHERE `id_taikhoan`='$taikhoan_id'"));

                    if($giohang == 0){
                        echo'<li class="nav-item dropdown">
			            <a href="/taikhoan/giohang" class="nav-link">
		            	<i class="now-ui-icons shopping_bag-16" aria-hidden="true"></i>
			            <p>Giỏ hàng</p>
		            	</a>
			            </li>';
                    }else{
                        echo'<li class="nav-item dropdown">
			            <a href="/taikhoan/giohang" class="nav-link">
			            <i class="now-ui-icons shopping_bag-16" aria-hidden="true"></i>
			            <p>Giỏ hàng <span style="border: 1px solid #ff3636;background-color: transparent;color: #ff3636;border-radius: 4px;font-size: 10px;padding: 2px;">'.$giohang.'</span></p>
			            </a>
			            </li>';        
                    }
                ?>
                <?php if(!$taikhoan_id){ ?>
				<li class="nav-item">
					<a class="nav-link btn btn-primary" href="/taikhoan/dangnhap">
						<p>Đăng nhập</p>
					</a>
				</li>
                <?php }else{ ?>
                <li class="nav-item">
									<div class="dropdown">
										<a class="nav-link btn btn-primary dropdown-toggle" style="color:white;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="now-ui-icons users_circle-08"></i> <?php echo $dulieu_taikhoan['hovaten']; ?>
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" x-placement="bottom-start" style="height:auto;position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1px, 38px, 0px);">
											<a class="dropdown-item" href="/taikhoan/thongtin"><i class="now-ui-icons travel_info"></i> Thông tin tài khoản</a>
											<a class="dropdown-item" href="/taikhoan/lich-su-giao-dich"><i class="now-ui-icons education_paper"></i> Lịch sử giao dịch</a>											
											<a class="dropdown-item" href="#tien"><i class="now-ui-icons business_money-coins"></i> Số dư: <?php echo $dulieu_taikhoan['tien']; ?> VNĐ</a>
											<?php if($dulieu_taikhoan['chucvu'] == 'quantri'){ ?>
											<a class="dropdown-item" href="/hethong_quantri/" style="color:red;"><i class="now-ui-icons design_palette"></i> Quản lí trang</a>
											<?php } ?>
											<a class="dropdown-item" href="/taikhoan/dangxuat"><i class="now-ui-icons ui-1_lock-circle-open"></i> Thoát</a></a>
										</div>
								  </div>
								</li>
                <?php } ?>		
			</ul>
	    </div>
	</div>
</nav>
<?php if($taikhoan_id){
    if($dulieu_taikhoan['matkhau2'] == ''){
        header('location: /taikhoan/matkhaucap2');
    }
}
    if($hethong['baotri'] == 1){
        header('location: /baotri');
    }
?>