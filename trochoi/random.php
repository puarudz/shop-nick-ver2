<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
*/
session_start();
require('../quantri_hethong/xuly_ketnoi.php');
$tieudetrang = 'THỬ VẬN MAY';
require('../quantri_hethong/danhmuc_phantren.php');
?>
<script>
    page = 1;
    maso = "";
    gia = "";
    sapxepgia = "";    
    loai_random = "";    
</script>    
<div class="wrapper">
<div class="features-1" style="background-image: url(/danhmuc_hinhanh/background.jpg);background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title" style="color:white;">THỬ VẬN MAY</h2>
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
                    <label>Loại random</label>
                    <select id="loai_random" class="form-control">
                        <option value="">Chọn loại</option>
                        <option value="1">RANDOM Liên Minh</option>                        
                        <option value="2">RANDOM Liên Quân</option>
                        <option value="3">RANDOM Ngọc Rồng</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-6 col-lg-2">
                <div class="form-group">
                    <label>Tìm theo giá</label>
                    <select id="gia" class="form-control">
                        <option value="">Giá tiền</option>
                        <option value="1">RANDOM 15.000</option>
                        <option value="2">RANDOM 30.000</option>
                        <option value="3">RANDOM 60.000</option>
                    </select>
                </div>
            </div>
            
            <div class="col-sm-6 col-lg-2">
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
                    <br/>
                    <button class="btn-round btn btn-outline-info" type="button" onclick="boloc_random();">Tìm kiếm</button>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="form-group">
                    <br/>
                    <button class="btn-round btn btn-outline-danger" type="button" onclick="xoa_boloc_random();">Xóa tìm kiếm</button>
                </div>
            </div>            

        </div>
    </div>
</div>

<div class="section related-products" data-background-color="white">
    <div class="container">
                    <div style="display: block;" class="tatca_taikhoan_random"></div>
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
    function danhsach_random() {
        $(".tatca_taikhoan_random").hide();
        $("#taidulieu").show();
        $.post("/trochoi/danhmuc/random.php", {
                page: page,
                maso: maso,
                gia: gia,
                sapxepgia: sapxepgia,                
                loai_random : loai_random
            })
            .done(function(data) {
                $(".tatca_taikhoan_random").html('');
                $('.tatca_taikhoan_random').empty().append(data);
                $("#taidulieu").hide();
                $(".tatca_taikhoan_random").show();
            });
    }

    function boloc_random() {
        maso = $("#maso").val();
        gia = $("#gia").val();
        sapxepgia = $("#sapxepgia").val();        
        loai_random = $("#loai_random").val();        
        danhsach_random();
    }

    function xoa_boloc_random() {
    maso = "";
    gia = "";
    sapxepgia = "";    
    loai_random = "";
    danhsach_random();    
    }

    danhsach_random();
</script> 
    </body>
</html>