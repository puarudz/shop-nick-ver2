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
    function xoataikhoanrandom(id) {
	$.post("/xuly_taikhoan/random/xoa.php", {id: id},
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
	
    function suataikhoanrandom(id) {
	$.post("/hethong_quantri/danhmuc/random/chinhsua.php", {id: id},
        function (dulieusua) {
            $("#o_chinhsua_random").html(dulieusua);
        });
	} 
	
$(document).ready(function () {
	$("#dang-random").ajaxForm({
		dataType: 'json',
		url: '/xuly_taikhoan/random/dangban.php',
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

    $page = $_POST['page3'];
    $trangthai = $_POST['trangthai3'];

if (!empty($trangthai)) {
    $dulieu_trangthai = "AND `trangthai` = '$trangthai'";
}

$tong_random = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan` = 'RANDOM' $dulieu_trangthai"));

$phantrang_random = array(
    "current_page" => $page,
    "total_record" => $tong_random,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page3={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_random);
$ketnoi_random = mysqli_query($ketnoi, "SELECT * FROM `baidang` WHERE `loai_taikhoan` = 'RANDOM' $dulieu_trangthai ORDER BY `id` DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");

if ($tong_random){
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
                        <th class="text-center">Xếp hạng</th>
                        <th class="text-center">Khung</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        while($dulieu_random = mysqli_fetch_array($ketnoi_random)){
                        if($dulieu_random['trangthai'] == 'chuaban'){
                            $trangthai = '<span class="label label-primary">Chưa bán</span>';
                        }else{
                            $trangthai = '<span class="label label-danger">Đã bán</span>';
                        }
                    ?>
                    <tr>
                        <td class="text-center">MS<?php echo $dulieu_random['id']; ?></td>
                        <td class="text-center"><?php echo $dulieu_random['taikhoan']; ?></td>
                        <td class="text-center"><?php echo $dulieu_random['matkhau']; ?></td>
                        <td class="text-center">Không có thông tin</td>
                        <td class="text-center">Không có thông tin</td>
                        <td class="text-center">Không có thông tin</td>
                        <td class="text-center">Không có thông tin</td>
                        <td class="text-center"><?php echo $trangthai; ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#sua-random" type="button" onclick="suataikhoanrandom(<?php echo $dulieu_random['id']; ?>);"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-xs btn-default" onclick="xoataikhoanrandom(<?php echo $dulieu_random['id']; ?>);"><i class="fa fa-times"></i></a>
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
echo $phantrang->phantrang_taikhoanrandom();
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Không tìm thấy tài khoản</p>
<?php
}
?>
<!--Đăng tài khoản-->
<div class="modal in" id="dang-random" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">ĐĂNG TÀI KHOẢN RANDOM</h3>
                </div>
                <div class="block-content">
                    <form action="" method="post" class="form-horizontal" id="dang-random">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <select class="form-control" name="loai_random">
                                        <option value="NGORONG">RANDOM NGỌC RỒNG</option>
                                        <option value="LIENMINH">RANDOM LIÊN MINH</option>
                                        <option value="LIENQUAN">RANDOM LIÊN QUÂN</option>                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        
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
                                    <select class="form-control" name="sotien">
                                        <option value="15000">15.000 VNĐ</option>
                                        <option value="30000">30.000 VNĐ</option>
                                        <option value="60000">60.000 VNĐ</option>                                        
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
<div class="modal in" id="sua-random" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button" style="color:black;"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <div id="o_chinhsua_random"></div>
                </div>
            </div>
        </div>
    </div>
</div>