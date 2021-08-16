<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
*/
session_start();
require('../quantri_hethong/xuly_ketnoi.php');
$tieudetrang = 'LIÊN QUÂN MOBILE';
require('../quantri_hethong/danhmuc_phantren.php');
?>
<script>
    page = 1;
    maso = "";
    gia = "";
    sapxepgia = "";    
    taikhoan_vip = "";    
    xephang = "";
</script>    
<div class="wrapper">
<div class="features-1" style="background-image: url(/danhmuc_hinhanh/background.jpg);background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title" style="color:white;">LIÊN QUÂN MOBILE</h2>
                </div>
            </div>
        </div>
    </div>
    
<div class="container">
    <div>
        <h4>Tìm kiếm tài khoản</h4>

        <div class="row">
            <div class="col-sm-6 col-lg-2">
                <div class="form-group">
                    <label>Tìm theo mã số</label>
                    <input id="maso" placeholder="Mã số" type="number" class="form-control" value="">
                </div>
            </div>

            <div class="col-sm-6 col-lg-2">
                <div class="form-group">
                    <label>Tìm theo rank</label>
                    <select id="xephang" class="form-control">
                        <option value="">Xếp hạng</option>
                        <option value="1">Chưa xếp hạng</option>                        
                        <option value="2">Đồng</option>
                        <option value="3">Bạc</option>
                        <option value="4">Vàng</option>
                        <option value="5">Bạch kim</option>
                        <option value="6">Kim cương</option>
                        <option value="7">Tinh anh</option>                        
                        <option value="8">Cao thủ</option>
                        <option value="9">Thách đấu</option>
                    </select>
                </div>

            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="form-group">
                    <label>Tìm theo mức độ</label>
                    <select id="taikhoan_vip" class="form-control">
                        <option value="">Chọn loại</option>
                        <option value="1">Tài khoản vip</option>
                        <option value="2">Tài khoản thường</option>
                    </select>
                </div>

            </div>

            <div class="col-sm-6 col-lg-2">
                <div class="form-group">
                    <label>Tìm theo giá</label>
                    <select id="gia" class="form-control">
                        <option value="">Giá tiền</option>
                        <option value="1">Dưới 50.000</option>
                        <option value="2">Dưới 100.000</option>
                        <option value="3">Dưới 200.000</option>
                        <option value="4">500.000 Trở lên</option>
                    </select>
                </div>
            </div>
            
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label>Sắp xếp theo</label>
                    <select id="sapxepgia" class="form-control">
                        <option value="">Sắp xếp giá</option>
                        <option value="1">Từ thấp đến cao</option>
                        <option value="2">Từ cao đến thấp</option>                        
                    </select>
                </div>
            </div>            
            <div class="col-sm-6 col-lg-2">
                <div class="form-group">
                    <button class="btn-round btn btn-outline-info" type="button" onclick="boloc_lienquan();">Tìm kiếm</button>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="form-group">
                    <button class="btn-round btn btn-outline-danger" type="button" onclick="xoa_boloc_lienquan();">Xóa tìm kiếm</button>
                </div>
            </div>            

        </div>
    </div>
</div>

<div class="section related-products" data-background-color="white">
    <div class="container">
                    <div style="display: block;" class="tatca_taikhoan_lienquan"></div>
                <div id="taidulieu" style="text-align:center;">
                    <img src="/danhmuc_hinhanh/loading.gif" />
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
<script>
    function danhsach_lienquan() {
        $(".tatca_taikhoan_lienquan").hide();
        $("#taidulieu").show();
        $.post("/trochoi/danhmuc/lienquan.php", {
                page: page,
                maso: maso,
                gia: gia,
                sapxepgia: sapxepgia,                
                taikhoan_vip: taikhoan_vip,                
                xephang: xephang
            })
            .done(function(data) {
                $(".tatca_taikhoan_lienquan").html('');
                $('.tatca_taikhoan_lienquan').empty().append(data);
                $("#taidulieu").hide();
                $(".tatca_taikhoan_lienquan").show();
            });
    }

    function boloc_lienquan() {
        maso = $("#maso").val();
        gia = $("#gia").val();
        sapxepgia = $("#sapxepgia").val();        
        taikhoan_vip = $("#taikhoan_vip").val();        
        xephang = $("#xephang").val();
        danhsach_lienquan();
    }

    function xoa_boloc_lienquan() {
    maso = "";
    gia = "";
    sapxepgia = "";    
    taikhoan_vip = "";    
    xephang = "";
    danhsach_lienquan();    
    }

    danhsach_lienquan();
</script> 
    </body>
</html>