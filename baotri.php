<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   tuoitre4v.com
* @Liên Hệ     https://facebook.com/hoanganh.180599
*/
session_start();
ob_start();
require('quantri_hethong/xuly_ketnoi.php');
$tieudetrang = 'BẢO TRÌ TRANG WEB';
$hethong = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `hethong_quantri`"));
$tieudetrang = 'BẢO TRÌ WEBSITE!!!';
    if($hethong['baotri'] == 0){
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
                <?php if($dulieu_taikhoan['chucvu'] == 'quantri'){ ?>
                <li class="nav-item">
					<a class="nav-link btn btn-primary" href="/hethong_quantri/">
						<p><i class="now-ui-icons design_palette"></i> Quản lí trang</p>
					</a>
				</li>
                <?php } ?>		
			</ul>
	    </div>
	</div>
</nav>
<style>
.error-page>.container .title {
    font-size: 12em;
    color: #fff;
    letter-spacing: 14px;
    font-weight: 700;
}
</style>
<div class="wrapper">
    <div class="page-header error-page header-filter" style="background-image: url('/danhmuc_hinhanh/braden-collum.jpg');background-size: cover;">
      <div class="page-header-image"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="title">BẢO TRÌ!</h1>
            <h2 class="description">Trang web hiện tại đang trong quá trình hoàn thiện, dự kiến chạy vào ngày 15/10/2019 </h2>
            <h4 class="description">hệ thống đang chạy thử nghiệm và bảo trì nâng cấp chức năng cao cấp vui lòng quay lại sau.</h4>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>