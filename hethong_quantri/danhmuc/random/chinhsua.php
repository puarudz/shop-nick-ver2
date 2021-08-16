<?php
require('../../../quantri_hethong/xuly_ketnoi.php');
$id = $_POST['id'];
$dulieu = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `id`='$id'"));
?>
<script>
$(document).ready(function () {
	$("#chinhsua-ngocrong").ajaxForm({
		dataType: 'json',
		url: '/xuly_taikhoan/random/chinhsua.php',
		success: function (dulieu) {
			swal(
				dulieu.tieude, 
				dulieu.noidung, 
				dulieu.icon
				);
		if(dulieu.thanhcong == 1) {
			setTimeout(function () {
				window.location.assign('/hethong_quantri/?xuly=taikhoan');
				}, 2000);
		    }
	    },
	});
});
</script>
        <h3 class="block-title">SỬA TÀI KHOẢN RANDOM MS <?php echo $id; ?></h3>
    <br/>
    <form action="" method="post" class="form-horizontal" id="chinhsua-ngocrong">
        <input type="text" name="id" value="<?php echo $id; ?>" style="display:none;">
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <select class="form-control" name="loai_random">
                        <option value="NGOCRONG" <?php echo ($dulieu['loai_random']=='NGOCRONG' ? 'selected="selected"': ''); ?>>RANDOM NGỌC RỒNG</option>
                        <option value="LIENMINH" <?php echo ($dulieu['loai_random']=='LIENMINH' ? 'selected="selected"': ''); ?>>RANDOM LIÊN MINH</option>
                        <option value="LIENQUAN" <?php echo ($dulieu['loai_random']=='LIENQUAN' ? 'selected="selected"': ''); ?>>RANDOM LIÊN QUÂN</option>                        
                    </select>
                </div>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input class="form-control" type="text" name="taikhoan" placeholder="Tài khoản" value="<?php echo $dulieu['taikhoan']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="matkhau" placeholder="Mật khẩu" value="<?php echo $dulieu['matkhau']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <select class="form-control" name="sotien">
                        <option value="15000" <?php echo ($dulieu['gia']=='15000' ? 'selected="selected"': ''); ?>>15.000 VNĐ</option>
                        <option value="30000" <?php echo ($dulieu['gia']=='30000' ? 'selected="selected"': ''); ?>>30.000 VNĐ</option>
                        <option value="60000" <?php echo ($dulieu['gia']=='60000' ? 'selected="selected"': ''); ?>>60.000 VNĐ</option>                        
                    </select>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <textarea class="form-control" type="text" name="hinhanh_gioithieu" placeholder="Hình ảnh giới thiệu"><?php echo $dulieu['hinhanh_gioithieu']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <textarea class="form-control" type="text" name="hinhanh" placeholder="Hình ảnh thông tin tài khoản ngăn cách mỗi ảnh bằng xuống hàng"><?php echo $dulieu['hinhanh']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <textarea class="form-control" type="text" name="noidung" placeholder="Nội dung về tài khoản"><?php echo $dulieu['noidung']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <textarea class="form-control" type="text" name="noibat" placeholder="Nổi bật"><?php echo $dulieu['noibat']; ?></textarea>
                </div>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <select class="form-control" name="trangthai">
                        <option value="chuaban" <?php echo ($dulieu['trangthai']=='chuaban' ? 'selected="selected"': ''); ?>>Chưa bán</option>
                        <option value="daban" <?php echo ($dulieu['trangthai']=='daban' ? 'selected="selected"': ''); ?>>Đã bán</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <button class="btn btn-sm btn-primary" type="submit">Lưu lại!</button>
                <button class="btn btn-sm btn-danger" data-dismiss="modal" type="button">Đóng!</button>
            </div>
        </div>
    </form>
