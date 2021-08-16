<?php
require('../../../quantri_hethong/xuly_ketnoi.php');
$id = $_POST['id'];
$dulieu = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM muathe WHERE `id`='$id'"));
?>
<script>
$(document).ready(function () {
	$("#chinhsua-muathe").ajaxForm({
		dataType: 'json',
		url: '/xuly_taikhoan/muathe/chinhsua.php',
		success: function (dulieu) {
			swal(
				dulieu.tieude, 
				dulieu.noidung, 
				dulieu.icon
				);
		if(dulieu.thanhcong == 1) {
			setTimeout(function () {
				window.location.assign('/hethong_quantri/?xuly=giaodich');
				}, 2000);
		    }
	    },
	});
});
</script>
        <h3 class="block-title">SỬA THÔNG TIN THẺ ID <?php echo $id; ?></h3>
    <br/>
    <form action="" method="post" class="form-horizontal" id="chinhsua-muathe">
        <input type="text" name="id" value="<?php echo $id; ?>" style="display:none;">
        <input type="text" name="taikhoan_id" value="<?php echo $dulieu['taikhoan_id']; ?>" style="display:none;">        
        <input type="text" name="menhgia" value="<?php echo $dulieu['menhgia']; ?>" style="display:none;">             
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input class="form-control" type="text" value="<?php echo $dulieu['hovaten']; ?>" disabled>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" value="<?php echo $dulieu['loaithe']; ?>" disabled>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" value="<?php echo $dulieu['menhgia']; ?>" disabled>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="serial" value="<?php echo $dulieu['serial']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="mathe" value="<?php echo $dulieu['mathe']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" value="<?php echo $dulieu['noidung']; ?>" disabled>
                </div>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <select class="form-control" name="trangthai">
                        <option value="0" <?php echo ($dulieu['trangthai']=='0' ? 'selected="selected"': ''); ?>>Chờ duyệt</option>
                        <option value="1" <?php echo ($dulieu['trangthai']=='1' ? 'selected="selected"': ''); ?>>Đã duyệt</option>
                        <option value="2" <?php echo ($dulieu['trangthai']=='2' ? 'selected="selected"': ''); ?>>Từ chối</option>                        
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
