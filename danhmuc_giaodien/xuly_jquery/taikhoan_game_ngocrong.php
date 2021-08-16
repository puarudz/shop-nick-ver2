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
    function xoataikhoanngocrong(id) {
	$.post("/xuly_taikhoan/ngocrong/xoa.php", {id: id},
			function (dulieusua) {
		        swal(
			        dulieusua.tieude, 
			        dulieusua.noidung, 
			        dulieusua.icon
		            );
		if(dulieusua.thanhcong == 1) {
			setTimeout(function () {
				window.location.assign('/hethong_quantri/?xuly=taikhoan');
				}, 2000);
	        }
		}, "json");		    
	}
	
    function suataikhoanngocrong(id) {
	$.post("/hethong_quantri/danhmuc/ngocrong/chinhsua.php", {id: id},
        function (dulieusua) {
            $("#o_chinhsua_ngocrong").html(dulieusua);
        });
	} 
	
$(document).ready(function () {
	$("#dang-ngocrong").ajaxForm({
		dataType: 'json',
		url: '/xuly_taikhoan/ngocrong/dangban.php',
		success: function (dulieu) {
			swal(
				dulieu.tieude, 
				dulieu.noidung, 
				dulieu.icon
				);
		if(dulieu.thanhcong == 1) {
			setTimeout(function () {
				window.location.assign('/hethong_quantri/?xuly=taikhoan');
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

    $page = $_POST['page2'];
    $trangthai = $_POST['trangthai2'];

if (!empty($trangthai)) {
    $dulieu_trangthai = "AND `trangthai` = '$trangthai'";
}

$tong_ngocrong = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan` = 'NRO' $dulieu_trangthai"));

$phantrang_ngocrong = array(
    "current_page" => $page,
    "total_record" => $tong_ngocrong,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page2={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_ngocrong);
$ketnoi_ngocrong = mysqli_query($ketnoi, "SELECT * FROM `baidang` WHERE `loai_taikhoan` = 'NRO' $dulieu_trangthai ORDER BY `id` DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");

if ($tong_ngocrong){
?>
        <div class="table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">Mã số</th>
                        <th class="text-center">Tài khoản</th>
                        <th class="text-center">Mật khẩu</th>
                        <th class="text-center">Hành tinh</th>
                        <th class="text-center">Máy chủ</th>
                        <th class="text-center">Đăng ký</th>
                        <th class="text-center">Bông tai</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        while($dulieu_ngocrong = mysqli_fetch_array($ketnoi_ngocrong)){
                        if($dulieu_ngocrong['trangthai'] == 'chuaban'){
                            $trangthai = '<span class="label label-primary">Chưa bán</span>';
                        }else{
                            $trangthai = '<span class="label label-danger">Đã bán</span>';
                        }
                    ?>
                    <tr>
                        <td class="text-center">MS<?php echo $dulieu_ngocrong['id']; ?></td>
                        <td class="text-center"><?php echo $dulieu_ngocrong['taikhoan']; ?></td>
                        <td class="text-center"><?php echo $dulieu_ngocrong['matkhau']; ?></td>
                        <td class="text-center"><?php echo hanhtinh_ngocrong($dulieu_ngocrong['nro_hanhtinh']); ?></td>
                        <td class="text-center"><?php echo maychu_ngocrong($dulieu_ngocrong['nro_maychu']); ?></td>
                        <td class="text-center"><?php echo dangky_ngocrong($dulieu_ngocrong['nro_dangky']); ?></td>
                        <td class="text-center"><?php echo bongtai_ngocrong($dulieu_ngocrong['nro_bongtai']); ?></td>
                        <td class="text-center"><?php echo $trangthai; ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#sua-ngocrong" type="button" onclick="suataikhoanngocrong(<?php echo $dulieu_ngocrong['id']; ?>);"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-xs btn-default" onclick="xoataikhoanngocrong(<?php echo $dulieu_ngocrong['id']; ?>);"><i class="fa fa-times"></i></a>
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
<?php
echo $phantrang->phantrang_taikhoanngocrong();
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Không tìm thấy tài khoản</p>
<?php
}
?>
<!--Đăng tài khoản-->
<div class="modal in" id="dang-ngocrong" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">ĐĂNG NGỌC RỒNG ONLINE</h3>
                </div>
                <div class="block-content">
                    <form action="" method="post" class="form-horizontal" id="dang-ngocrong">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input class="form-control" type="text" name="taikhoan" placeholder="Tài khoản">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <input class="form-control" type="password" name="matkhau" placeholder="Mật khẩu">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <input class="form-control" type="number" name="sotien" placeholder="Số tiền">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <select class="form-control" name="nro_hanhtinh">
                                <?php
                                    for($i = 1; $i < 4; $i++){
                                        echo '<option value="'.$i.'">'.hanhtinh_ngocrong($i).'</option>';
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
                                    <select class="form-control" name="nro_maychu">
                                <?php
                                    for($i = 1; $i < 8; $i++){
                                        echo '<option value="'.$i.'">'.maychu_ngocrong($i).'</option>';
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
                                    <select class="form-control" name="nro_dangky">
                                <?php
                                    for($i = 1; $i < 3; $i++){
                                        echo '<option value="'.$i.'">'.dangky_ngocrong($i).'</option>';
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
                                    <select class="form-control" name="nro_bongtai">
                                <?php
                                    for($i = 1; $i < 3; $i++){
                                        echo '<option value="'.$i.'">'.bongtai_ngocrong($i).'</option>';
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
                                    <select class="form-control" name="nro_sosinhcode">
                                <?php
                                    for($i = 1; $i < 3; $i++){
                                        echo '<option value="'.$i.'">'.sosinhcode_ngocrong($i).'</option>';
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
                                    <textarea class="form-control" type="text" name="hinhanh_gioithieu" placeholder="Hình ảnh giới thiệu"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <textarea class="form-control" type="text" name="hinhanh" placeholder="Hình ảnh thông tin tài khoản ngăn cách mỗi ảnh bằng xuống hàng"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <textarea class="form-control" type="text" name="noidung" placeholder="Nội dung về tài khoản"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <textarea class="form-control" type="text" name="noibat" placeholder="Nổi bật"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <select class="form-control" name="taikhoan_vip">
                                        <option value="0">NICK THƯỜNG</option>
                                        <option value="1">NICK VIP</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-primary" type="submit">Đăng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Kết thúc đăng tài khoản-->
<!--Chỉnh sửa tài khoản-->
<div class="modal in" id="sua-ngocrong" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button" style="color:black;"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <div id="o_chinhsua_ngocrong"></div>
                </div>
            </div>
        </div>
    </div>
</div>