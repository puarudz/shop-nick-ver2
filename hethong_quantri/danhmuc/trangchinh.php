<?php
/**
* @Mã Nguồn    Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
* @Điện thoại  0856617819
* @Zalo        0856617819
* @Email       hoanganh18595@gmail.com
*/

// bộ đếm người dùng
$thanhvien = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM nguoidung"));
$thanhvien_homnay = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT COUNT(*) FROM nguoidung WHERE thoigian >= DATE_ADD(CURDATE(), INTERVAL 0 DAY)"));
$thanhvien_6ngaytruoc = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT COUNT(*) FROM nguoidung WHERE thoigian >= DATE_ADD(CURDATE(), INTERVAL -6 DAY)"));
$thanhvien_thangnay = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT COUNT(*) FROM nguoidung WHERE thoigian >= DATE_ADD(CURDATE(), INTERVAL -30 DAY)"));

// Thống kê tài khoản
$taikhoan = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang"));
$taikhoan_daban = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `trangthai`='daban'"));

// Bảng thống kê thu nhập thành công
$tongso_naptien_homnay = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT count(*) FROM lichsu_naptien WHERE thoigian >= DATE_ADD(CURDATE(), INTERVAL 0 DAY)"));
$tongso_naptien_thunhap_homnay = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT SUM(thucnhan) FROM lichsu_naptien WHERE thoigian >= DATE_ADD(CURDATE(), INTERVAL 0 DAY)"));
$tongso_naptien_thunhap_6ngaytruoc = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT SUM(thucnhan) FROM lichsu_naptien WHERE thoigian >= DATE_ADD(CURDATE(), INTERVAL -6 DAY)"));
$tongso_naptien_thunhap_thangnay = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT SUM(thucnhan) FROM lichsu_naptien WHERE thoigian >= DATE_ADD(CURDATE(), INTERVAL -30 DAY)"));

// Thống kê nạp tiền
$tongso_naptien = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT count(*) FROM lichsu_naptien"));
$tongso_naptien_choduyet = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT count(*) FROM lichsu_naptien WHERE `trangthai`='0'"));
$tongso_naptien_thanhcong = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT count(*) FROM lichsu_naptien WHERE `trangthai`='1'"));
$tongso_naptien_dahuy = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT count(*) FROM lichsu_naptien WHERE `trangthai`='2'"));

// Thống kê mua thẻ
$tongso_muathe = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT count(*) FROM muathe"));
$tongso_muathe_choduyet = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT count(*) FROM muathe WHERE `trangthai`='0'"));
$tongso_muathe_thanhcong = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT count(*) FROM muathe WHERE `trangthai`='1'"));
$tongso_muathe_dahuy = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT count(*) FROM muathe WHERE `trangthai`='2'"));

// Thống kê thu nhập
$tong_naptien = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT SUM(menhgia) FROM lichsu_naptien WHERE `trangthai`='1'"));
$thunhap_taikhoan = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT SUM(gia) FROM baidang WHERE `trangthai`='daban'"));
$tong_thunhap = $tong_naptien['0']+$thunhap_taikhoan['0'];

?>
<div class="bg-image overflow-hidden push" style="background-image: url('/danhmuc_hinhanh/admintrations.jpg');">
<div class="bg-black-op">
<div class="content content-full text-center">
<h1 class="h1 font-w700 text-white animated fadeInDown push-50-t push-5">Quản Trị Website</h1>
<h2 class="h3 font-w600 text-white-op animated fadeInDown">Chào mừng bạn đến với trang quản trị</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-6 col-lg-3">
<a class="block block-link-hover1">
<div class="block-content block-content-full clearfix">
<div class="pull-right push-15-t push-15">
<i class="fa fa-users fa-2x text-primary"></i>
</div>
<div class="h2 text-primary" data-toggle="countTo" data-to="<?php echo $thanhvien; ?>"><?php echo $thanhvien; ?></div>
<div class="text-uppercase font-w600 font-s12 text-muted">Thành viên</div>
</div>
</a>
</div>
<div class="col-xs-6 col-lg-3">
<a class="block block-link-hover1">
<div class="block-content block-content-full clearfix">
<div class="pull-right push-15-t push-15">
<i class="fa fa-briefcase fa-2x text-smooth"></i>
</div>
<div class="h2 text-smooth" data-toggle="countTo" data-to="<?php echo $taikhoan; ?>"><?php echo $taikhoan; ?></div>
<div class="text-uppercase font-w600 font-s12 text-muted">Tài khoản</div>
</div>
</a>
</div>
<div class="col-xs-6 col-lg-3">
<a class="block block-link-hover1">
<div class="block-content block-content-full clearfix">
<div class="pull-right push-15-t push-15">
<i class="fa fa-bar-chart-o fa-2x text-amethyst"></i>
</div>
<div class="h2 text-amethyst" data-toggle="countTo" data-to="<?php echo $taikhoan_daban; ?>"><?php echo $taikhoan_daban; ?></div>
<div class="text-uppercase font-w600 font-s12 text-muted">Tài khoản đã bán</div>
</div>
</a>
</div>
<div class="col-xs-6 col-lg-3">
<a class="block block-link-hover1">
<div class="block-content block-content-full clearfix">
<div class="pull-right push-15-t push-15">
<i class="fa fa-line-chart fa-2x text-success"></i>
</div>
<div class="h2 text-success" data-toggle="countTo" data-to="<?php echo number_format($tong_thunhap); ?> " data-before="VNĐ"><?php echo number_format($tong_thunhap); ?> VNĐ</div>
<div class="text-uppercase font-w600 font-s12 text-muted">Thu nhập</div>
</div>
</a>
</div>
<div class="col-xs-6 col-sm-3">
<div class="block block-rounded">
<div class="block-content block-content-full">
<div class="text-muted">
<small><i class="si si-calendar"></i> Giao dịch nạp tiền</small>
</div>
<a class="h2 font-w300 text-primary" data-toggle="countTo" data-to="<?php echo $tongso_naptien['0']; ?>"><?php echo $tongso_naptien['0']; ?> giao dịch</a>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-3">
<div class="block block-rounded">
<div class="block-content block-content-full">
<div class="text-muted">
<small><i class="si si-calendar"></i> Giao dịch chờ duyệt</small>
</div>
<a class="h2 font-w300 text-warning" data-toggle="countTo" data-to="<?php echo $tongso_naptien_choduyet['0']; ?>"><?php echo $tongso_naptien_choduyet['0']; ?> giao dịch</a>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-3">
<div class="block block-rounded">
<div class="block-content block-content-full">
<div class="text-muted">
<small><i class="si si-calendar"></i> Giao dịch thành công</small>
</div>
<a class="h2 font-w300 text-success" data-toggle="countTo" data-to="<?php echo $tongso_naptien_thanhcong['0']; ?>"><?php echo $tongso_naptien_thanhcong['0']; ?> giao dịch</a>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-3">
<div class="block block-rounded">
<div class="block-content block-content-full">
<div class="text-muted">
<small><i class="si si-calendar"></i> Giao dịch đã hủy</small>
</div>
<a class="h2 font-w300 text-danger" data-toggle="countTo" data-to="<?php echo $tongso_naptien_dahuy['0']; ?>"><?php echo $tongso_naptien_dahuy['0']; ?> giao dịch</a>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-3">
<div class="block block-rounded">
<div class="block-content block-content-full">
<div class="text-muted">
<small><i class="si si-calendar"></i> Giao dịch mua thẻ</small>
</div>
<a class="h2 font-w300 text-primary" data-toggle="countTo" data-to="<?php echo $tongso_muathe['0']; ?>"><?php echo $tongso_muathe['0']; ?> giao dịch</a>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-3">
<div class="block block-rounded">
<div class="block-content block-content-full">
<div class="text-muted">
<small><i class="si si-calendar"></i> Giao dịch chờ duyệt</small>
</div>
<a class="h2 font-w300 text-warning" data-toggle="countTo" data-to="<?php echo $tongso_muathe_choduyet['0']; ?>"><?php echo $tongso_muathe_choduyet['0']; ?> giao dịch</a>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-3">
<div class="block block-rounded">
<div class="block-content block-content-full">
<div class="text-muted">
<small><i class="si si-calendar"></i> Giao dịch thành công</small>
</div>
<a class="h2 font-w300 text-success" data-toggle="countTo" data-to="<?php echo $tongso_muathe_thanhcong['0']; ?>"><?php echo $tongso_muathe_thanhcong['0']; ?> giao dịch</a>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-3">
<div class="block block-rounded">
<div class="block-content block-content-full">
<div class="text-muted">
<small><i class="si si-calendar"></i> Giao dịch đã hủy</small>
</div>
<a class="h2 font-w300 text-danger" data-toggle="countTo" data-to="<?php echo $tongso_muathe_dahuy['0']; ?>"><?php echo $tongso_muathe_dahuy['0']; ?> giao dịch</a>
</div>
</div>
</div>



<div class="col-lg-6">
<div class="block">
<div class="block-header">
<h3 class="block-title">Người dùng <b data-toggle="tooltip" data-placement="right" title="hôm nay, 6 ngày trước, 30 ngày trước"><i class="fa fa-question-circle"></i></b></h3>
</div>
<div class="block-content block-content-full text-center bg-gray-lighter">
<span class="js-widget-line1"><?=$thanhvien_homnay['0']?>,<?=$thanhvien_6ngaytruoc['0']?>,<?=$thanhvien_thangnay['0']?></span>
</div>
<div class="block-content">
<div class="row items-push text-center">
<div class="col-xs-6">
<div class="push-5"><i class="si si-graph fa-2x"></i></div>
<div class="h5 font-w300 text-muted"><?=$thanhvien?> Người</div>
</div>
<div class="col-xs-6">
<div class="push-5"><i class="si si-users fa-2x"></i></div>
<div class="h5 font-w300 text-muted" data-toggle="countTo" data-to="<?=$thanhvien_thangnay['0']?>">+ <?=$thanhvien_homnay['0']?> Tháng này</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-lg-6">
<div class="block">
<div class="block-header">
<h3 class="block-title">Nạp thẻ thành công <b data-toggle="tooltip" data-placement="right" title="hôm nay, 6 ngày trước, 30 ngày trước"><i class="fa fa-question-circle"></i></b></h3>
</div>
<div class="block-content block-content-full text-center bg-gray-lighter">
<span class="js-widget-line3"><?php echo $tongso_naptien_thunhap_homnay['0']; ?>,<?=$tongso_naptien_thunhap_6ngaytruoc['0']?>,<?=$tongso_naptien_thunhap_thangnay['0']?></span>
</div>
<div class="block-content">
<div class="row items-push text-center">
<div class="col-xs-6">
<div class="push-5"><i class="si si-wallet fa-2x" data-toggle="tooltip" data-placement="right" title="Hôm nay"></i></div>
<div class="h5 font-w300 text-muted"><?php echo $tongso_naptien_homnay['0']; ?></div>
</div>
<div class="col-xs-6">
<div class="push-5"><i class="si si-graph fa-2x" data-toggle="tooltip" data-placement="right" title="Hôm nay"></i></div>
<div class="h5 font-w300 text-muted">+<?php echo number_format($tongso_naptien_thunhap_homnay['0'], 0, '.', '.'); ?>đ</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-6">
<div class="block block-opt-refresh-icon4">
<div class="block-header bg-gray-lighter">
<ul class="block-options">
<li>
<button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
</li>
</ul>
<h3 class="block-title">TOP NẠP TIỀN</h3>
</div>
<div class="block-content">
<table class="table table-borderless table-striped table-vcenter">
<thead>
<tr>
<th class="text-center">UID</th>
<th class="text-center">Họ và tên</th>
<th class="text-center">Email</th>
<th class="text-center">Số điện thoại</th>
<th class="text-center">Số tiền</th>
</tr>
</thead>    
<tbody>
<?php
$kiemtra_top_naptien = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM lichsu_naptien"));
$top_naptien = mysqli_query($ketnoi, "SELECT * FROM lichsu_naptien WHERE `trangthai` = '1' ORDER BY menhgia DESC LIMIT 10");
    if ($kiemtra_top_naptien == 0){
?>
<tr>
<td colspan="5" class="text-center">Chưa có giao dịch nào
</td>
</tr>
<?php 
}else{ 
while ($dulieu_top_naptien = mysqli_fetch_array($top_naptien)){ 
$dulieu_top_naptien_nguoidung = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM nguoidung WHERE `id`='".$dulieu_top_naptien['taikhoan_id']."'"));
$top_sotien = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT SUM(menhgia) FROM lichsu_naptien WHERE `taikhoan_id`='".$dulieu_top_naptien['taikhoan_id']."' AND `trangthai` = '1'"));
?>
<tr>
<td class="text-center"><?php echo $dulieu_top_naptien['taikhoan_id']; ?></td>
<td class="text-center"><?php echo $dulieu_top_naptien['hovaten']; ?></td>
<td class="text-center"><?php echo $dulieu_top_naptien_nguoidung['email']; ?></td>
<td class="text-center"><?php echo $dulieu_top_naptien_nguoidung['sodienthoai']; ?></td>
<td class="text-center"><?php echo $top_sotien['0']; ?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="block block-opt-refresh-icon4">
<div class="block-header bg-gray-lighter">
<ul class="block-options">
<li>
<button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
</li>
</ul>
<h3 class="block-title">TOP MUA TÀI KHOẢN</h3>
</div>
<div class="block-content">
<table class="table table-borderless table-striped table-vcenter">
<thead>
<tr>
<th class="text-center">UID</th>
<th class="text-center">Họ và tên</th>
<th class="text-center">Tài khoản</th>
<th class="text-center">ID tài khoản</th>
<th class="text-center">Số tiền</th>
</tr>
</thead>    
<tbody>
<?php
$kiemtra_top_muatk = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM lichsu_muanick"));
$top_muatk = mysqli_query($ketnoi, "SELECT * FROM lichsu_muanick WHERE `id` != '0' ORDER BY id DESC LIMIT 10");
    if ($kiemtra_top_muatk == 0){
?>
<tr>
<td colspan="5" class="text-center">Chưa có giao dịch nào</td>
</tr>
<?php 
}else{ 
while ($dulieu_top_muatk = mysqli_fetch_array($top_muatk)){ 
$dulieu_top_muatk_nguoidung = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM nguoidung WHERE `id`='".$dulieu_top_muatk['taikhoan_id']."'"));
$top_sotiennick = mysqli_fetch_row(mysqli_query($ketnoi, "SELECT SUM(gia) FROM lichsu_muanick WHERE `taikhoan_id`='".$dulieu_top_muatk['taikhoan_id']."'"));
?>
<tr>
<td class="text-center"><?php echo $dulieu_top_muatk['taikhoan_id']; ?></td>
<td class="text-center"><?php echo $dulieu_top_muatk_nguoidung['hovaten']; ?></td>
<td class="text-center"><?php echo $dulieu_top_muatk['loai_taikhoan']; ?></td>
<td class="text-center"><?php echo $dulieu_top_muatk['taikhoan_nick_id']; ?></td>
<td class="text-center"><?php echo $top_sotiennick['0']; ?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>