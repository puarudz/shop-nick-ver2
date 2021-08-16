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
    function xoataikhoan(id) {
	$.post("/xuly_taikhoan/lienminh/xoa.php", {id: id},
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
	
    function suataikhoan(id) {
	$.post("/hethong_quantri/danhmuc/lienminh/chinhsua.php", {id: id},
        function (dulieusua) {
            $("#o_chinhsua_lienminh").html(dulieusua);
        });
	} 
	
$(document).ready(function () {
	$('#xuly_othongtin').change(function () {
		if (this.checked)
		    var thongtin = { 'kiemtra': 'co' };
        else 
            var thongtin = { 'kiemtra': 'khong' };
		$.post("/xuly_taikhoan/xuly_odulieu_lmht.php", thongtin,
			function (dulieutt) {
		    $("#othong_tin").html(dulieutt);
	});
	});
	
	$("#dang-lmht").ajaxForm({
		dataType: 'json',
		url: '/xuly_taikhoan/lienminh/dangban.php',
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

    $page = $_POST['page'];
    $trangthai = $_POST['trangthai'];

if (!empty($trangthai)) {
    $dulieu_trangthai = "AND `trangthai` = '$trangthai'";
}

$tong_lmht = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan` = 'LMHT' $dulieu_trangthai"));

$phantrang_lmht = array(
    "current_page" => $page,
    "total_record" => $tong_lmht,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_lmht);
$ketnoi_lmht = mysqli_query($ketnoi, "SELECT * FROM `baidang` WHERE `loai_taikhoan` = 'LMHT' $dulieu_trangthai ORDER BY `id` DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");

if ($tong_lmht){
?>
        <div class="table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">Mã số</th>
                        <th class="text-center">Tài khoản</th>
                        <th class="text-center">Mật khẩu</th>
                        <th class="text-center">Tướng</th>
                        <th class="text-center">Trang phục</th>
                        <th class="text-center">Xếp hạng</th>
                        <th class="text-center">Bảng Ngọc</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        while($dulieu_lmht = mysqli_fetch_array($ketnoi_lmht)){
                        if($dulieu_lmht['trangthai'] == 'chuaban'){
                            $trangthai = '<span class="label label-primary">Chưa bán</span>';
                        }else{
                            $trangthai = '<span class="label label-danger">Đã bán</span>';
                        }
                    ?>
                    <tr>
                        <td class="text-center">MS<?php echo $dulieu_lmht['id']; ?></td>
                        <td class="text-center"><?php echo $dulieu_lmht['taikhoan']; ?></td>
                        <td class="text-center"><?php echo $dulieu_lmht['matkhau']; ?></td>
                        <td class="text-center"><?php echo $dulieu_lmht['tuong']; ?></td>
                        <td class="text-center"><?php echo $dulieu_lmht['trangphuc']; ?></td>
                        <td class="text-center"><?php echo $dulieu_lmht['xephang']; ?></td>
                        <td class="text-center"><?php echo $dulieu_lmht['bangngoc']; ?></td>
                        <td class="text-center"><?php echo $trangthai; ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#chinhsua-lmht" type="button" onclick="suataikhoan(<?php echo $dulieu_lmht['id']; ?>);"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-xs btn-default" onclick="xoataikhoan(<?php echo $dulieu_lmht['id']; ?>);"><i class="fa fa-times"></i></a>
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
echo $phantrang->phantrang_taikhoanlmht();
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Không tìm thấy tài khoản</p>
<?php
}
?>
<!--Đăng tài khoản-->
<div class="modal in" id="dang-lmht" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">ĐĂNG LIÊN MINH HUYỀN THOẠI</h3>
                </div>
                <div class="block-content">
                    <form action="" method="post" class="form-horizontal" id="dang-lmht">
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

                        <div id="othong_tin"></div>

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
                        <label class="css-input switch switch-primary">
                            <input type="checkbox" id="xuly_othongtin" name="kiemtra" value="co" checked="true"><span></span> Auto check tài khoản
                        </label>

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
<div class="modal in" id="chinhsua-lmht" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button" style="color:black;"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <div id="o_chinhsua_lienminh"></div>
                </div>
            </div>
        </div>
    </div>
</div>