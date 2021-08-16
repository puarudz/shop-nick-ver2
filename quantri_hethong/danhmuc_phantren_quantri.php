<?php
/**
* @Mã Nguồn    Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
* @Điện thoại  0856617819
* @Zalo        0856617819
* @Email       hoanganh18595@gmail.com
*/
require_once('../quantri_hethong/xuly_ketnoi.php');
?>
<!DOCTYPE html>
<html lang="vi">
<link rel="shortcut icon" href="/danhmuc_hinhanh/icon.png" />
<head>
    <body style="padding-top: 0;">
        <meta charset="UTF-8" />
        <title>Quản Trị Hệ Thống</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <!--Phần Css-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" href="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/css/oneui.css">
        <link rel="stylesheet" href="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/css/core.css">
        <link rel="stylesheet" href="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/css/livechat.css">
        <link rel="stylesheet" href="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/css/style.css">
        <link rel="stylesheet" href="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/css/freshslider.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/css/magnific-popup.min.css">
        <!--Phần Javascript-->
        <script src="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/javascript/jquery.min.js"></script>
        <script src="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/javascript/jquery.validate.min.js"></script>
        <script src="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/javascript/freshslider.min.js"></script>
        <script src="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/javascript/jquery.base64.js" type="text/javascript"></script>
        <script src="<?php echo $trangchu; ?>/danhmuc_giaodien/quantri/javascript/jquery-ui.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
        <script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/thongbao.hopthoai.js"></script>
    <header id="header-navbar" class="content-mini content-mini-full" style="background-color: #fff;border-bottom: 1px solid #70b9eb;">
    <ul class="nav-header pull-right">
        <li>
            <div class="btn-group">
                <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                    <img src="https://graph.facebook.com/<?php echo $dulieu_taikhoan['taikhoan_id']; ?>/picture?width=500&amp;height=500" alt="Avatar">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">Thông tin</li>
                    <li>
                        <a tabindex="-1" href="#">
                            <i class="si si-envelope-open pull-right"></i>
                            <span class="badge badge-primary pull-right">3</span>Thông báo
                        </a>
                    </li>
                    <li>
                        <a tabindex="-1" href="#">
                            <i class="si si-user pull-right"></i>
                            <span class="badge badge-success pull-right">1</span>Thông tin
                        </a>
                    </li>
                    <li>
                        <a tabindex="-1" href="#">
                            <i class="si si-settings pull-right"></i>Cài đặt
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Tùy chọn</li>
                    <li>
                        <a tabindex="-1" href="#">
                            <i class="si si-lock pull-right"></i>Khóa tài khoản
                        </a>
                    </li>
                    <li>
                        <a tabindex="-1" href="#">
                            <i class="si si-logout pull-right"></i>Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                <i class="fa fa-tasks"></i>
            </button>
        </li>
    </ul>
    </header>        
        <main id="main-container" style="min-height: 877px;">
