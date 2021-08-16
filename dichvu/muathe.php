<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
*/
session_start();
ob_start();
require('../quantri_hethong/xuly_ketnoi.php');
$tieudetrang = 'MUA MÃ THẺ ĐIỆN THOẠI';
require('../quantri_hethong/danhmuc_phantren.php');
?>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js"></script>
	<script src="/danhmuc_giaodien/javascript/thongbao.hopthoai.js"></script>
	<script>
$(document).ready(function () {
			$("#xuly_muathe").ajaxForm({
					dataType: 'json',
					url: '/xuly_taikhoan/xuly_muathe.php',
					success: function (dulieu) {
							swal({
							title: dulieu.tieude,
							text: dulieu.noidung,
							icon: dulieu.icon,
							button:	dulieu.button
							});
							if(dulieu.thanhcong == 1) {
							setTimeout(function () {
								window.location.assign('/taikhoan/lich-su-giao-dich');
							}, 3000);
						}
					},
					});
			});
</script>

<div class="testimonials-1 section-image" style="background-image: url('/danhmuc_hinhanh/bg19.jpg')">
<div class="container">
<div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
                <h2 class="title">MUA MÃ THẺ ĐIỆN THOẠI</h2>
            </div>
        </div>
    </div> 
</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 ml-auto col-xl-12 mr-auto">
						<div style="border: 0;border-radius: .1875rem;display: inline-block;position: relative;width: 100%;margin-bottom: 30px;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;">
							<div class="card-body">
								<div class="tab-content text-center">
									<div class="tab-pane active" role="tabpanel">
									    <p class="blockquote blockquote-primary text-primary" style="margin-left: 60px;margin-right: 60px;">*Chú ý: Mua thẻ cào sẽ được trừ tiền lập tức và chờ quản trị viên duyệt thẻ vào lịch sử</p>
									    <form class="form" action="" method="post" id="xuly_muathe">
         <div class="form-group">
            <div class="col-md-6 ml-auto mr-auto">
               <input class="form-control" type="text" value="<?php echo $dulieu_taikhoan['hovaten']; ?>" readonly="">
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-6 ml-auto mr-auto">
               <select class="form-control" name="loaithe">
                  <option value="">Chọn loại thẻ</option>                   
                  <option value="VIETTEL">Viettel</option>
                  <option value="VINAPHONE">Vinaphone</option>
                  <option value="MOBIFONE">Mobifone</option>
               </select>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-6 ml-auto mr-auto">
               <select class="form-control" name="menhgia" required="">
                  <option value="">Chọn mệnh giá</option>
                  <option r-default="0" value="10000" rel-ratio="64.0">10,000 VNĐ</option>
                  <option r-default="0" value="20000" rel-ratio="64.0">20,000 VNĐ</option>
                  <option r-default="0" value="30000" rel-ratio="64.0">30,000 VNĐ</option>
                  <option r-default="0" value="50000" rel-ratio="64.0">50,000 VNĐ</option>
                  <option r-default="0" value="100000" rel-ratio="64.0">100,000 VNĐ</option>
                  <option r-default="0" value="200000" rel-ratio="64.0">200,000 VNĐ</option>
                  <option r-default="0" value="300000" rel-ratio="64.0">300,000 VNĐ</option>
                  <option r-default="0" value="500000" rel-ratio="64.0">500,000 VNĐ</option>
                  <option r-default="0" value="1000000" rel-ratio="64.0">1,000,000 VNĐ</option>
               </select>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-6 ml-auto mr-auto">
               <input class="form-control" name="matkhaucap2" type="password" maxlength="16" required="" placeholder="Nhập mật khẩu cấp 2" autofocus="">
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-6 ml-auto mr-auto">
                <textarea class="form-control" name="noidung" rows="4" cols="80" placeholder="Nội dung..."></textarea>
            </div>
         </div>
         <div class="form-group c-margin-t-40">
            <div class="col-md-6 ml-auto mr-auto">
               <button class="btn btn-info  c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block" data-loading-text="<i class='now-ui-icons loader_refresh spin'></i>">Mua thẻ</button>
            </div>
         </div>
      </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<hr/>
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
            		<div/>
            	</footer>		
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