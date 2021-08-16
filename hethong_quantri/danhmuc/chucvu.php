<?php
require('../../quantri_hethong/xuly_ketnoi.php');
$id = $_POST['id'];
$dulieu_thanhvien = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM nguoidung WHERE `id`='$id'"));
?>
<script>
$(document).ready(function () {
	$("#chinhsua-chucvu").ajaxForm({
		dataType: 'json',
		url: '/danhmuc_giaodien/xuly_jquery/sua_chucvu.php',
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
        <h3 class="block-title">Sửa chức vụ <?php echo $dulieu_thanhvien['hovaten']; ?></h3>
    <br/>
    <form action="" method="post" class="form-horizontal" id="chinhsua-chucvu">
        <input type="text" name="id" value="<?php echo $dulieu_thanhvien['id']; ?>" style="display:none;">
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <select class="form-control" name="chucvu">
                        <option value="quantri" <?php echo ($dulieu_thanhvien['chucvu']=='quantri' ? 'selected="selected"': ''); ?>>Quản trị viên</option>
                        <option value="congtacvien" <?php echo ($dulieu_thanhvien['chucvu']=='congtacvien' ? 'selected="selected"': ''); ?>>Cộng tác viên</option>                        
                        <option value="0" <?php echo ($dulieu_thanhvien['chucvu']=='0' ? 'selected="selected"': ''); ?>>Thành viên</option>
                    </select>
                </div>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="password" name="matkhau" placeholder="Mật khẩu quản trị">
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