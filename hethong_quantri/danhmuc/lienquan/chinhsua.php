<?php
require('../../../quantri_hethong/xuly_ketnoi.php');
$id = $_POST['id'];
$dulieu = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `id`='$id'"));
?>
<script>
$(document).ready(function () {
	$("#chinhsua-lienquan").ajaxForm({
		dataType: 'json',
		url: '/xuly_taikhoan/lienquan/chinhsua.php',
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
        <h3 class="block-title">SỬA LIÊN QUÂN MOBILE MS <?php echo $id; ?></h3>
    <br/>
    <form action="" method="post" class="form-horizontal" id="chinhsua-lienquan">
        <input type="text" name="id" value="<?php echo $id; ?>" style="display:none;">
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <select class="form-control" name="loai_taikhoan">
                        <option value="LMHT" <?php echo ($dulieu['loai_taikhoan']=='LMHT' ? 'selected="selected"': ''); ?>>Liên Minh</option>
                        <option value="LQM" <?php echo ($dulieu['loai_taikhoan']=='LQM' ? 'selected="selected"': ''); ?>>Liên Quân</option>
                        <option value="NRO" <?php echo ($dulieu['loai_taikhoan']=='NRO' ? 'selected="selected"': ''); ?>>Ngọc Rồng</option>                        
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
                    <input class="form-control" type="number" name="sotien" placeholder="Số tiền" value="<?php echo $dulieu['gia']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="tuong" placeholder="Số tướng" value="<?php echo $dulieu['tuong']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="trangphuc" placeholder="Số trang phục" value="<?php echo $dulieu['trangphuc']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="bangngoc" placeholder="Số bảng ngọc" value="<?php echo $dulieu['bangngoc']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                        <select class="form-control" name="xephang">
                     <?php
                        for($i = 1; $i < 25; $i++){
                        echo '<option value="'.$i.'" '.($dulieu['xephang']==$i ? 'selected="selected"': '').'>'.xephanglienquan($i).'</option>';
                        }
                    ?>
                        </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                        <select class="form-control" name="khung">
                     <?php
                        for($i = 1; $i < 25; $i++){
                        echo '<option value="'.$i.'" '.($dulieu['khung']==$i ? 'selected="selected"': '').'>'.khung_xephanglienquan($i).'</option>';
                        }
                    ?>
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
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                    <select class="form-control" name="email">
                        <option value="dalienket" <?php echo ($dulieu['email']=='dalienket' ? 'selected="selected"': ''); ?>>Đã liên kết</option>
                        <option value="chualienket" <?php echo ($dulieu['email']=='chualienket' ? 'selected="selected"': ''); ?>>Chưa liên kết</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="si si-call-end"></i></span>
                    <select class="form-control" name="sodienthoai">
                        <option value="dalienket" <?php echo ($dulieu['sodienthoai']=='dalienket' ? 'selected="selected"': ''); ?>>Đã liên kết</option>
                        <option value="chualienket" <?php echo ($dulieu['sodienthoai']=='chualienket' ? 'selected="selected"': ''); ?>>Chưa liên kết</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="si si-social-facebook"></i></span>
                    <select class="form-control" name="facebook">
                        <option value="dalienket" <?php echo ($dulieu['facebook']=='dalienket' ? 'selected="selected"': ''); ?>>Đã liên kết</option>
                        <option value="chualienket" <?php echo ($dulieu['facebook']=='chualienket' ? 'selected="selected"': ''); ?>>Chưa liên kết</option>
                    </select>
                </div>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <select class="form-control" name="taikhoan_vip">
                        <option value="0" <?php echo ($dulieu['taikhoan_vip']=='0' ? 'selected="selected"': ''); ?>>NICK THƯỜNG</option>
                        <option value="1" <?php echo ($dulieu['taikhoan_vip']=='1' ? 'selected="selected"': ''); ?>>NICK VIP</option>
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
