<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
*/
session_start();
ob_start();
require('../quantri_hethong/xuly_ketnoi.php');
$tieudetrang = 'NẠP TIỀN VÀO TÀI KHOẢN';
require('../quantri_hethong/danhmuc_phantren.php');
?>
    <script src="<?php echo $trangchu; ?>/danhmuc_giaodien/javascript/core/jquery.min.js" type="text/javascript"></script>   
	<script src="/danhmuc_giaodien/javascript/thongbao.hopthoai.js"></script>
<script>
$(document).ready(function () {
	$('#xuly_napthe').click(function () {
		$('#xuly_napthe').text('Đang xử lý...');
		$('#xuly_napthe').prop('disabled', true);
		var napthe = {
			'loaithe': $('select[name=loaithe]').val(),
			'menhgia': $('select[name=menhgia]').val(),
			'loainap': $('select[name=loainap]').val(),			
			'serial': $('input[name=serial]').val(),
			'mathe': $('input[name=mathe]').val()
		};
		$.post("/xuly_taikhoan/xuly_napthe.php", napthe,
			function (dulieu) {
				swal({
					title: dulieu.tieude,
					text: dulieu.noidung,
					icon: dulieu.icon,
					button: dulieu.button
				});
				if (dulieu.thanhcong == 1) {
				    			setTimeout(function () {
								window.location.assign('/dichvu/nap-tien');
							}, 3000);
				}
				$('#xuly_napthe').text('Nạp thẻ');
				$('#xuly_napthe').prop('disabled', false);
			}, "json");
	});
});
</script>

<div class="testimonials-1 section-image" style="background-image: url('/danhmuc_hinhanh/bg19.jpg')">
<div class="container">
<div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
                <h2 class="title">NẠP TIỀN VÀO TÀI KHOẢN</h2>
            </div>
        </div>
    </div> 
</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 ml-auto col-xl-12 mr-auto">
						<div style="border: 0;border-radius: .1875rem;display: inline-block;position: relative;width: 100%;margin-bottom: 30px;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;">
								<ul class="nav nav-tabs justify-content-center" role="tablist">
								  <li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#thecao" role="tab" aria-selected="true">
										<i class="now-ui-icons shopping_credit-card"></i>NẠP BẰNG THẺ CÀO</a>
								  </li>
								  <li class="nav-item">
									<a type="button" class="nav-link active" data-toggle="modal" data-target="#thongtinATM">
										<i class="now-ui-icons shopping_cart-simple"></i>NẠP BẰNG ATM</a>
								  </li>
								</ul>
							<div class="card-body">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="thecao" role="tabpanel">
									        <p class="blockquote blockquote-primary text-primary" style="margin-left: 60px;margin-right: 60px;">*Chú ý: Nạp thẻ sai mệnh giá mất 100% giá trị thẻ</p>
										<form method="POST" action="">
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
                  <option value="zing">Zing (Nạp Chậm)</option>
                  <option value="vcoin">VCOIN (Nạp Chậm)</option>
                  <option value="gate">GATE (Nạp Chậm)</option>
                  
               </select>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-6 ml-auto mr-auto">
               <select class="form-control" name="loainap">
                  <option value="napcham">Nạp chậm</option>
                  <option value="napnhanh">Nạp nhanh</option>
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
               <input class="form-control" name="mathe" type="text" maxlength="16" required="" placeholder="Nhập mã thẻ" autofocus="">
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-6 ml-auto mr-auto">
               <input class="form-control" name="serial" type="text" maxlength="16" required="" placeholder="Nhập số serial">
            </div>
         </div>
         <div class="form-group c-margin-t-40">
            <div class="col-md-6 ml-auto mr-auto">
               <button id="xuly_napthe" class="btn btn-info  c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block" data-loading-text="<i class='now-ui-icons loader_refresh spin'></i>">Nạp thẻ</button>
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
<!-- Thông tin ATM -->
<div class="modal fade show" id="thongtinATM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" style="padding-right: 17px; display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header justify-content-center">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<i class="now-ui-icons ui-1_simple-remove"></i>
					</button>
					<h4 class="title title-up">THÔNG TIN ATM</h4>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
                                    <table class="table">
    <thead class="">
        <tr><th class="text-center">#</th>
        <th class="text-center">Ngân hàng</th>
        <th class="text-center">Số tài khoản</th>
        <th class="text-center">Chủ tài khoản</th>
        <th class="text-center">Chi nhánh</th>
        <th class="text-center">Nội dung</th>
    </tr></thead>
    <tbody>
            <?php
            $i=1;
            $ATM = mysqli_query($ketnoi, "SELECT * FROM `dulieu_ATM` order by id desc");
            if (mysqli_num_rows($ATM) == 0){
            ?>
            <tr><td colspan="6" class="text-center"><p>Chưa có thông tin.</p></td></tr>
            <?php }else{ while ($dulieu_ATM = mysqli_fetch_array($ATM)){ ?>            
                    <tr>            
            <td class="text-center"><?php echo $dulieu_ATM['id']; ?></td>
            <td class="text-center"><?php echo $dulieu_ATM['nganhang']; ?></td>
            <td class="text-center"><?php echo $dulieu_ATM['sotaikhoan']; ?></td>
            <td class="text-center"><?php echo $dulieu_ATM['chutaikhoan']; ?></td>
            <td class="text-center"><?php echo $dulieu_ATM['chinhanh']; ?></td>
            <td class="text-center">Ghi số điện thoại hoặc Email để nhận tiền.</td>
        </tr>
        <?php $i++; } } ?>        
            </tbody>
</table>

                                  </div>
				</div>
				<div class="modal-footer">
					
					
				</div>
			</div>
		</div>
	</div>
<!-- Kết thúc -->
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