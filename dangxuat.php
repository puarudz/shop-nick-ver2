<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   tuoitre4v.com
* @Liên Hệ     https://facebook.com/hoanganh.180599
*/
    session_start();
    session_unset();
    
if (isset($_SESSION['taikhoan_id'])){
    unset($_SESSION['taikhoan_id']);
    }
    header("Location: /");
?>
