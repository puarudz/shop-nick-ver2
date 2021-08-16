<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
*/
session_start();
ob_start();
require('../quantri_hethong/xuly_ketnoi.php');
$tieudetrang = 'Lịch sử giao dịch của '.$dulieu_taikhoan['hovaten'];
require('../quantri_hethong/danhmuc_phantren.php');

if(!$taikhoan_id){
    header('location: /taikhoang/dangnhap');
}
?>
<script>
    page = 1;
    page1 = 1;
    page2 = 1;
    page3 = 1;
</script>
<div class="testimonials-1 section-image" style="background-image: url('/danhmuc_hinhanh/bg19.jpg')">
<div class="container">
<div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
                <h2 class="title">LỊCH SỬ GIAO DỊCH</h2>
            </div>
        </div>
    </div> 
</div>

<div class="container">
    <div class="row m-y-2">
<div class="col-lg-4 pull-lg-10" style="margin-top: 20px;">
            <?php if($dulieu_taikhoan['taikhoan_id'] != 0){ ?>
            <img src="https://graph.facebook.com/<?php echo $dulieu_taikhoan['taikhoan_id']; ?>/picture?width=500&amp;height=500" class="rounded" alt="<?php echo $dulieu_taikhoan['hovaten']; ?>">
            <?php }else{ ?>
            <img src="/danhmuc_hinhanh/avatar_macdinh.jpg" class="rounded" alt="<?php echo $dulieu_taikhoan['hovaten']; ?>">
            <?php } ?>
        </div>
        <div class="col-lg-8 push-lg-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#lichsumua" data-toggle="tab" class="nav-link active"><i class="now-ui-icons files_paper"></i>LS mua nick</a>
                </li>                
                <li class="nav-item">
                    <a href="" data-target="#lichsunap" data-toggle="tab" class="nav-link"><i class="now-ui-icons files_single-copy-04"></i>LS nạp tiền</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#lichsuchuyentien" data-toggle="tab" class="nav-link"><i class="now-ui-icons files_single-copy-04"></i>LS chuyển tiền</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#lichsumuathe" data-toggle="tab" class="nav-link"><i class="now-ui-icons files_single-copy-04"></i>LS mua thẻ</a>
                </li>                
            </ul>
            <div class="tab-content p-b-3">
<div class="tab-pane active" id="lichsumua">
                <div style="display: block;" class="tatca_lichsumua"></div>
            <div id="taidulieu" style="text-align:center;">
                <img src="/danhmuc_hinhanh/loading.gif" />
            </div>
</div>

<div class="tab-pane" id="lichsuchuyentien">
                <div style="display: block;" class="tatca_lichsuchuyentien"></div>
            <div id="taidulieu2" style="text-align:center;">
                <img src="/danhmuc_hinhanh/loading.gif" />
            </div>
</div>

<div class="tab-pane" id="lichsunap">
                <div style="display: block;" class="tatca_lichsunap"></div>
            <div id="taidulieu1" style="text-align:center;">
                <img src="/danhmuc_hinhanh/loading.gif" />
            </div>
</div>

<div class="tab-pane" id="lichsumuathe">
                <div style="display: block;" class="tatca_lichsumuathe"></div>
            <div id="taidulieu3" style="text-align:center;">
                <img src="/danhmuc_hinhanh/loading.gif" />
            </div>
</div>
</div>
</div>
</div>
</div>
</div>
<hr>     
<footer class="footer footer-white footer-big">
            		<div class="container">
            			<div class="content">
            				<div class="row">
            					<div class="col-md-4">
            						<a href="#pablo"><h5><?php echo $hethong['mota_logo']; ?></h5></a>
            						<p>SHOP cung cấp tài khoản game giá rẻ uy tín phục vụ tận tình chu đáo!</p>
            					</div>
            					<div class="col-md-4">
            						<h5>Liên hệ</h5>
            						<ul class="links-vertical">
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
            					</div>
            					<div class="col-md-4">
            						<h5>Chính sách</h5>
            						<ul class="links-vertical">
            							<li>
            								<a href="#pablo">
            								   Khiếu nại
            								</a>
            							</li>
            							<li>
            								<a href="#pablo">
            									Góp ý
            								</a>
            							</li>
            							<li>
            								<a href="#pablo">
            								   Chính sách
            								</a>
            							</li>
            						</ul>
            					</div>	
            				</div>
            			</div>
            		</div>
            	</footer>		
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
    function danhsach_lichsumua() {
        $(".tatca_lichsumua").hide();
        $("#taidulieu").show();
        $.post("/taikhoan/danhmuc/lichsu_mua.php", {
                page: page
            })
            .done(function(data) {
                $(".tatca_lichsumua").html('');
                $('.tatca_lichsumua').empty().append(data);
                $("#taidulieu").hide();
                $(".tatca_lichsumua").show();
            });
    }

    function danhsach_lichsunap() {
        $(".tatca_lichsunap").hide();
        $("#taidulieu1").show();
        $.post("/taikhoan/danhmuc/lichsu_nap.php", {
                page1: page1
            })
            .done(function(data) {
                $(".tatca_lichsunap").html('');
                $('.tatca_lichsunap').empty().append(data);
                $("#taidulieu1").hide();
                $(".tatca_lichsunap").show();
            });
    }    

    function danhsach_lichsuchuyentien() {
        $(".tatca_lichsuchuyentien").hide();
        $("#taidulieu2").show();
        $.post("/taikhoan/danhmuc/lichsu_chuyentien.php", {
                page2: page2
            })
            .done(function(data) {
                $(".tatca_lichsuchuyentien").html('');
                $('.tatca_lichsuchuyentien').empty().append(data);
                $("#taidulieu2").hide();
                $(".tatca_lichsuchuyentien").show();
            });
    }

    function danhsach_lichsumuathe() {
        $(".tatca_lichsumuathe").hide();
        $("#taidulieu3").show();
        $.post("/taikhoan/danhmuc/lichsu_muathe.php", {
                page3: page3
            })
            .done(function(data) {
                $(".tatca_lichsumuathe").html('');
                $('.tatca_lichsumuathe').empty().append(data);
                $("#taidulieu3").hide();
                $(".tatca_lichsumuathe").show();
            });
    }    
    
    danhsach_lichsumua();
    danhsach_lichsunap();    
    danhsach_lichsuchuyentien();
    danhsach_lichsumuathe();    
</script>
    </body>
</html>                            