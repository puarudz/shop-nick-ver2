<?php
/**
* @Mã Nguồn    Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
* @Điện thoại  0856617819
* @Zalo        0856617819
* @Email       hoanganh18595@gmail.com
*/
require('../../quantri_hethong/xuly_ketnoi.php');
?>
    <script>
    function suathongtinATM(id) {
	$.post("/hethong_quantri/danhmuc/thongtinATM/sua.php", {id: id},
        function (dulieusua) {
            $("#o_chinhsua_atm").html(dulieusua);
        });
	}
	
    function xoathongtinATM(id) {
	$.post("/hethong_quantri/danhmuc/thongtinATM/xoa.php", {id: id},
			function (dulieusua) {
		        swal(
			        dulieusua.tieude, 
			        dulieusua.noidung, 
			        dulieusua.icon
		            );
		if(dulieusua.thanhcong == 1) {
			setTimeout(function () {
				window.location.assign('/hethong_quantri/?xuly=thongtinATM');
				}, 2000);
	        }
		}, "json");		    
	}

$(document).ready(function () {
	$("#them-atm").ajaxForm({
		dataType: 'json',
		url: '/hethong_quantri/danhmuc/thongtinATM/them.php',
		success: function (dulieu) {
			swal(
				dulieu.tieude, 
				dulieu.noidung, 
				dulieu.icon
				);
		if(dulieu.thanhcong == 1) {
			setTimeout(function () {
				window.location.assign('/hethong_quantri/?xuly=thongtinATM');
				}, 3000);
		    }
	    },
	});
});	
    </script>
<?php

if (!$taikhoan_id && $dulieu_taikhoan['chucvu'] != 'quantri'){ ?>
    <p class="content-mini content-mini-full bg-warning text-white">Bạn chưa đăng nhập, không thể lấy thông tin</p>
<?php
    exit;
}elseif(!$_POST){
    exit;
}

    $page = $_POST['page'];

$tong_thongtinATM = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM dulieu_ATM"));

$phantrang_thongtinATM = array(
    "current_page" => $page,
    "total_record" => $tong_thongtinATM,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_thongtinATM);
$ketnoi_thongtinATM = mysqli_query($ketnoi, "SELECT * FROM `dulieu_ATM` WHERE id != '0' ORDER BY `id` DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");

if ($tong_thongtinATM){
?>
<div class="row" style="margin-top: 5px; padding: 20px;">
<div class="sa-ls-table table-responsive">
<table  class="table table-bordered">
<thead><tr>
<th class="text-center" style="width: 50px;">#</th>
<th class="text-center">Ngân hàng</th>
<th class="text-center">Số tài khoản</th>
<th class="text-center">Chủ tài khoản</th>
<th class="text-center">Chi nhánh</th>
<th class="text-center" style="width: 100px;">Thao tác</th>
</tr></thead>
<tbody>
<?php
while($dulieu_thongtinATM = mysqli_fetch_array($ketnoi_thongtinATM)){
?>
<tr>
<td class="text-center"><?php echo $dulieu_thongtinATM['id']; ?></td>
<td class="text-center"><?php echo $dulieu_thongtinATM['nganhang']; ?></td>
<td class="text-center"><?php echo $dulieu_thongtinATM['sotaikhoan']; ?></td>
<td class="text-center"><?php echo $dulieu_thongtinATM['chutaikhoan']; ?></td>
<td class="text-center"><?php echo $dulieu_thongtinATM['chinhanh']; ?></td>
<td class="text-center">
<div class="btn-group">
<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#sua-thongtinatm" type="button" onclick="suathongtinATM(<?php echo $dulieu_thongtinATM['id']; ?>);"><i class="fa fa-pencil"></i></button>
<a class="btn btn-xs btn-default" onclick="xoathongtinATM(<?php echo $dulieu_thongtinATM['id']; ?>);"><i class="fa fa-times"></i></a>
</div>
</td>
</tr>

<?php
$i++;
}
?>
</tbody>

</table>
</div>
</div>

<?php
echo $phantrang->phantrang_thongtinATM();
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Chưa có thông tin thanh toán ATM nào</p>
<?php
}
?>
<!--Thêm mới ATM-->
<div class="modal in" id="them-ATM" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">THÊM THÔNG TIN ATM</h3>
                </div>
                <div class="block-content">
                    <form action="" method="post" class="form-horizontal" id="them-atm">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <input class="form-control" type="text" name="nganhang" placeholder="Loại ngân hàng">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <input class="form-control" type="text" name="sotaikhoan" placeholder="Số tài khoản">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <input class="form-control" type="text" name="chutaikhoan" placeholder="Chủ tài khoản">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <input class="form-control" type="text" name="chinhanh" placeholder="Chi nhánh">
                                </div>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-primary" type="submit">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Kết thúc thêm ATM-->
<!--Chỉnh sửa tài khoản-->
<div class="modal in" id="sua-thongtinatm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button" style="color:black;"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <div id="o_chinhsua_atm"></div>
                </div>
            </div>
        </div>
    </div>
</div>