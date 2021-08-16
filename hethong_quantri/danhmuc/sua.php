<?php
require('../../quantri_hethong/xuly_ketnoi.php');
$id = $_POST['id'];
$dulieu_thanhvien = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM nguoidung WHERE `id`='$id'"));
?>
<script>
$(document).ready(function () {
	$("#chinhsua-thanhvien").ajaxForm({
		dataType: 'json',
		url: '/danhmuc_giaodien/xuly_jquery/sua_thanhvien.php',
		success: function (dulieu) {
			swal(
				dulieu.tieude, 
				dulieu.noidung, 
				dulieu.icon
				);
		if(dulieu.thanhcong == 1) {
			setTimeout(function () {
				window.location.assign('/hethong_quantri/?xuly=thanhvien');
				}, 2000);
		    }
	    },
	});
});
</script>
        <h3 class="block-title">Sửa thông tin tài khoản <?php echo $dulieu_thanhvien['hovaten']; ?></h3>
    <br/>
    <form action="" method="post" class="form-horizontal" id="chinhsua-thanhvien">
        <input type="text" name="id" value="<?php echo $dulieu_thanhvien['id']; ?>" style="display:none;">
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input class="form-control" type="text" name="taikhoan_id" placeholder="Facebook ID" value="<?php echo $dulieu_thanhvien['taikhoan_id']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="hovaten" placeholder="Họ và tên" value="<?php echo $dulieu_thanhvien['hovaten']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="number" name="sodienthoai" placeholder="Số điện thoại" value="<?php echo $dulieu_thanhvien['sodienthoai']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo $dulieu_thanhvien['email']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="tien" placeholder="Số tiền" value="<?php echo $dulieu_thanhvien['tien']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <select class="form-control" name="khoa">
                        <option value="0" <?php echo ($dulieu_thanhvien['khoa']=='0' ? 'selected="selected"': ''); ?>>Không khóa</option>
                        <option value="1" <?php echo ($dulieu_thanhvien['khoa']=='1' ? 'selected="selected"': ''); ?>>Khóa</option>
                    </select>
                </div>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="thoigian" placeholder="Thời gian" value="<?php echo $dulieu_thanhvien['thoigian']; ?>" readonly>
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