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
    function xoataikhoanlienquan(id) {
	$.post("/xuly_taikhoan/lienquan/xoa.php", {id: id},
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
	
    function suataikhoanlienquan(id) {
	$.post("/hethong_quantri/danhmuc/lienquan/chinhsua.php", {id: id},
        function (dulieusua) {
            $("#o_chinhsua_lienquan").html(dulieusua);
        });
	} 
	
$(document).ready(function () {
	$('#xuly_othongtin_lienquan').change(function () {
		if (this.checked)
		    var thongtin = { 'kiemtra': 'co' };
        else 
            var thongtin = { 'kiemtra': 'khong' };
		$.post("/xuly_taikhoan/xuly_odulieu_lienquan.php", thongtin,
			function (dulieutt) {
		    $("#othong_tin_lienquan").html(dulieutt);
	});
	});
	
	$("#dang-lienquan").ajaxForm({
		dataType: 'json',
		url: '/xuly_taikhoan/lienquan/dangban.php',
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

    $page = $_POST['page1'];
    $trangthai = $_POST['trangthai1'];

if (!empty($trangthai)) {
    $dulieu_trangthai = "AND `trangthai` = '$trangthai'";
}

$tong_lienquan = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `loai_taikhoan` = 'LQM' $dulieu_trangthai"));

$phantrang_lienquan = array(
    "current_page" => $page,
    "total_record" => $tong_lienquan,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page1={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_lienquan);
$ketnoi_lienquan = mysqli_query($ketnoi, "SELECT * FROM `baidang` WHERE `loai_taikhoan` = 'LQM' $dulieu_trangthai ORDER BY `id` DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");

if ($tong_lienquan){
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
                        <th class="text-center">Khung</th>                        
                        <th class="text-center">Bảng Ngọc</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        while($dulieu_lienquan = mysqli_fetch_array($ketnoi_lienquan)){
                        if($dulieu_lienquan['trangthai'] == 'chuaban'){
                            $trangthai = '<span class="label label-primary">Chưa bán</span>';
                        }else{
                            $trangthai = '<span class="label label-danger">Đã bán</span>';
                        }
                    ?>
                    <tr>
                        <td class="text-center">MS<?php echo $dulieu_lienquan['id']; ?></td>
                        <td class="text-center"><?php echo $dulieu_lienquan['taikhoan']; ?></td>
                        <td class="text-center"><?php echo $dulieu_lienquan['matkhau']; ?></td>
                        <td class="text-center"><?php echo $dulieu_lienquan['tuong']; ?></td>
                        <td class="text-center"><?php echo $dulieu_lienquan['trangphuc']; ?></td>
                        <td class="text-center"><?php echo xephanglienquan($dulieu_lienquan['xephang']); ?></td>
                        <td class="text-center"><?php echo khung_xephanglienquan($dulieu_lienquan['khung']); ?></td>                        
                        <td class="text-center"><?php echo $dulieu_lienquan['bangngoc']; ?></td>
                        <td class="text-center"><?php echo $trangthai; ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#sua-lienquan" type="button" onclick="suataikhoanlienquan(<?php echo $dulieu_lienquan['id']; ?>);"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-xs btn-default" onclick="xoataikhoanlienquan(<?php echo $dulieu_lienquan['id']; ?>);"><i class="fa fa-times"></i></a>
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
echo $phantrang->phantrang_taikhoanlienquan();
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Không tìm thấy tài khoản</p>
<?php
}
?>
<!--Đăng tài khoản-->
<div class="modal in" id="dang-lienquan" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">ĐĂNG LIÊN QUÂN MOBILE</h3>
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

                        <div id="othong_tin_lienquan"></div>

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
                            <input type="checkbox" id="xuly_othongtin_lienquan" name="kiemtra" value="co" checked="true"><span></span> Auto check tài khoản
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
<div class="modal in" id="sua-lienquan" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button" style="color:black;"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <div id="o_chinhsua_lienquan"></div>
                </div>
            </div>
        </div>
    </div>
</div>