<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   tuoitre4v.com
* @Liên Hệ     https://facebook.com/hoanganh.180599
*/
session_start();
ob_start();
require('quantri_hethong/xuly_ketnoi.php');
$tieudetrang = 'ĐƯỜNG LINK KHÔNG TỒN TẠI';
require('quantri_hethong/danhmuc_phantren.php');
?>
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
            <h1 class="title">404</h1>
            <h2 class="description">Trang không tồn tại</h2>
            <h4 class="description">Lỗi! Bạn đã truy cập vào một đường dẫn không tồn tại trong hệ thống.</h4>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>