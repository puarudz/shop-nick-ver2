<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
*/
session_start();
ob_start();
require('../quantri_hethong/xuly_ketnoi.php');
$tieudetrang = 'Thông tin tài khoản của '.$dulieu_taikhoan['hovaten'];
require('../quantri_hethong/danhmuc_phantren.php');

if(!$taikhoan_id){
    header('location: /taikhoang/dangnhap');
}

if($dulieu_taikhoan['chucvu'] == 'quantri'){
    $chucvu = '<font color="red">Quản Trị Viên</font>';
}else{
    $chucvu = 'Thành viên';
}

if($dulieu_taikhoan['taikhoan_id'] != 0){
    $lienket_facebook = '<span class="badge badge-success">Đã liên kết</span>';
}else{
    $lienket_facebook = '<span class="badge badge-danger">Chưa liên kết</span>'; 
}
?>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js"></script>
	<script src="/danhmuc_giaodien/javascript/thongbao.hopthoai.js"></script>
    <script>
$(document).ready(function () {
			$("#xuly_chuyentien").ajaxForm({
					dataType: 'json',
					url: '/xuly_taikhoan/xuly_chuyentien.php',
					success: function (dulieu) {
						if (dulieu.thanhcong == 1) {
							swal({
							title: dulieu.tieude,
							text: dulieu.noidung,
							icon: dulieu.icon,
							button:	dulieu.button
							});
							setTimeout(function () {
								window.location.assign('/taikhoan/thongtin');
							}, 3000);
						} else {
							swal({
							title: dulieu.tieude,
							text: dulieu.noidung,
							icon: dulieu.icon,
							button:	dulieu.button
							});    
						}
					},
					});
			$("#xuly_thongtin").ajaxForm({
					dataType: 'json',
					url: '/xuly_taikhoan/xuly_thongtin.php',
					success: function (dulieu) {
						if (dulieu.thanhcong == 1) {
							swal({
							title: dulieu.tieude,
							text: dulieu.noidung,
							icon: dulieu.icon,
							button:	dulieu.button
							});
							setTimeout(function () {
								window.location.assign('/taikhoan/thongtin');
							}, 2000);
						} else {
							swal({
							title: dulieu.tieude,
							text: dulieu.noidung,
							icon: dulieu.icon,
							button:	dulieu.button
							});    
						}
					},
					});
			});
    </script>
    
<div class="testimonials-1 section-image" style="background-image: url('/danhmuc_hinhanh/bg19.jpg')">
<div class="container">
<div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
                <h2 class="title">THÔNG TIN TÀI KHOẢN</h2>
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
                    <a href="" data-target="#thongtin" data-toggle="tab" class="nav-link active"><i class="now-ui-icons travel_info"></i>Thông tin</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#thongbao" data-toggle="tab" class="nav-link"><i class="now-ui-icons ui-1_bell-53"></i>Thông báo</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#chinhsua" data-toggle="tab" class="nav-link"><i class="now-ui-icons ui-2_settings-90"></i>Chỉnh sửa</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#chuyentien" data-toggle="tab" class="nav-link"><i class="now-ui-icons shopping_delivery-fast"></i>Chuyển tiền</a>
                </li>                 
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="thongtin">
                    <h4 class="m-y-2">Thông tin của bạn</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <i class="now-ui-icons users_single-02"></i>Họ và tên: <h6><?php echo $dulieu_taikhoan['hovaten']; ?></h6>
                            <i class="now-ui-icons ui-1_email-85"></i>Địa chỉ Email: <h6><?php echo $dulieu_taikhoan['email']; ?></h6>
                            <i class="now-ui-icons tech_mobile"></i>Số điện thoại: <h6><?php echo $dulieu_taikhoan['sodienthoai']; ?></h6>
                            <i class="now-ui-icons shopping_credit-card"></i>Tài sản: <h6><?php echo $dulieu_taikhoan['tien']; ?> VNĐ</h6>   
                            <i class="now-ui-icons location_bookmark"></i>Ngày tham gia: <h6><?php echo $dulieu_taikhoan['thoigian']; ?></h6>
                            <i class="fab fa-facebook-square"></i>Facebook: <h6><?php echo $lienket_facebook; ?></h6>
                            <i class="now-ui-icons education_hat"></i>Chức vụ: <h6><?php echo $chucvu; ?></h6>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="thongbao">
                    <h4 class="m-y-2">Thông báo mới</h4>
                    <table class="table table-hover table-striped">
                        <tbody>                                    
                            <tr>
                                <td>
                                   <span class="pull-xs-right font-weight-bold">Hiện tại không có thông báo mới nào</span>
                                </td>
                            </tr>
                        </tbody> 
                    </table>
                </div>
                <div class="tab-pane" id="chinhsua">
                    <h4 class="m-y-2">Chỉnh sửa tài khoản</h4>
                    <form class="form" action="" method="post" id="xuly_thongtin">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Họ và tên</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="hovaten" value="<?php echo $dulieu_taikhoan['hovaten']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" name="email" value="<?php echo $dulieu_taikhoan['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Số điện thoại</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="number" name="sodienthoai" value="<?php echo $dulieu_taikhoan['sodienthoai']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mật khẩu cấp 2</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="matkhau2" placeholder="******">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-danger" value="Hủy bỏ">
                                <button class="btn btn-success">Lưu lại</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="chuyentien">
                    <h4 class="m-y-2">Chuyển tiền</h4>
                    <form class="form" action="" method="post" id="xuly_chuyentien">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Họ và tên</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $dulieu_taikhoan['hovaten']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email hoặc SĐT</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="nguoinhan" placeholder="Địa chỉ email hoặc số điện thoại nhận tiền">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Số tiền chuyển</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="number" name="sotien" placeholder="Số tiền muốn chuyển">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mật khẩu cấp 2</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="matkhau" placeholder="Nhập lại mật khẩu cấp 2 để tiến hành thanh toán">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-danger" value="Hủy bỏ">
                                <button  class="btn btn-success">Chuyển tiền</button>
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