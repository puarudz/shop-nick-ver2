<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
*/
session_start();
ob_start();
require('../quantri_hethong/xuly_ketnoi.php');
$tieudetrang = 'Liên hệ';
require('../quantri_hethong/danhmuc_phantren.php');
?>
<div class="cd-section" id="contactus">
<div class="contactus-1 section-image" style="background-image: url('/danhmuc_hinhanh/contact1.jpg')">

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h2 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Liên Hệ</font></font></h2>
                <h4 class="description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bạn cần thêm thông tin? </font><font style="vertical-align: inherit;">Kiểm tra những gì người khác đang nói về sản phẩm của chúng tôi. </font><font style="vertical-align: inherit;">Họ rất hài lòng với mua hàng của họ.</font></font></h4>
                <div class="info info-horizontal">
                    <div class="icon icon-primary">
                        <i class="now-ui-icons location_pin"></i>
                    </div>
                    <div class="description">
                        <h4 class="info-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Địa chỉ liên hệ</font></font></h4>
                        <p class="description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $hethong['diachi']; ?></font></p>
                    </div>
                </div>
                <div class="info info-horizontal">
                    <div class="icon icon-primary">
                        <i class="now-ui-icons tech_mobile"></i>
                    </div>
                    <div class="description">
                        <h4 class="info-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email và số điện thoại</font></font></h4>
                        <p class="description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $hethong['Email']; ?></font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            <?php echo $hethong['sodienthoai']; ?></font></font></font></p>
                    </div>
                </div>

            </div>
            <div class="col-md-5 ml-auto mr-auto">
                <div class="card card-contact card-raised">
                    <form role="form" id="contact-form1" method="post">
                        <div class="card-header text-center">
                            <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Liên hệ chúng tôi</font></font></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 pr-2">
                                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Họ & tên đệm</font></font></label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="now-ui-icons users_circle-08"></i></span>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Họ và tên đệm..." aria-label="Họ và tên đệm..." autocomplete="given-name">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-2">
                                    <div class="form-group">
                                        <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tên</font></font></label>
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="now-ui-icons text_caps-small"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Tên" aria-label="Họ ..." autocomplete="family-name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Địa chỉ email</font></font></label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="now-ui-icons ui-1_email-85"></i></span>
                                  </div>
                                  <input type="email" class="form-control" placeholder="Email của bạn..." autocomplete="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tin nhắn của bạn</font></font></label>
                                <textarea name="message" class="form-control" id="message" rows="6"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox">
                                      <span class="form-check-sign"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                      Tôi không phải là người máy
                                    </font></font></label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-round pull-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Gửi liên hệ</font></font></button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
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
    </body>
</html>    