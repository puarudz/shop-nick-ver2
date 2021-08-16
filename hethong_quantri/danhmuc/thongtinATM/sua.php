<?php
require('../../../quantri_hethong/xuly_ketnoi.php');
$id = $_POST['id'];
$dulieu_thongtinATM = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM dulieu_ATM WHERE `id`='$id'"));
?>
<script>
$(document).ready(function () {
	$("#chinhsua-thongtinATM").ajaxForm({
		dataType: 'json',
		url: '/danhmuc_giaodien/xuly_jquery/sua_thongtinATM.php',
		success: function (dulieu) {
			swal(
				dulieu.tieude, 
				dulieu.noidung, 
				dulieu.icon
				);
		if(dulieu.thanhcong == 1) {
			setTimeout(function () {
				window.location.assign('/hethong_quantri/?xuly=thongtinATM');
				}, 2000);
		    }
	    },
	});
});
</script>
        <h3 class="block-title">Sửa thông tin ATM <?php echo $dulieu_thongtinATM['id']; ?></h3>
    <br/>
    <form action="" method="post" class="form-horizontal" id="chinhsua-thongtinATM">
        <input type="text" name="id" value="<?php echo $dulieu_thongtinATM['id']; ?>" style="display:none;">
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input class="form-control" type="text" name="nganhang" placeholder="Ngân hàng" value="<?php echo $dulieu_thongtinATM['nganhang']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="sotaikhoan" placeholder="Số tài khoản" value="<?php echo $dulieu_thongtinATM['sotaikhoan']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="chutaikhoan" placeholder="Chủ tài khoản" value="<?php echo $dulieu_thongtinATM['chutaikhoan']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                    <input class="form-control" type="text" name="chinhanh" placeholder="Chi nhánh" value="<?php echo $dulieu_thongtinATM['chinhanh']; ?>">
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