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
    function xoamuathe(id) {
	$.post("/xuly_taikhoan/muathe/xoa.php", {id: id},
			function (dulieuxoa) {
		        swal(
			        dulieuxoa.tieude, 
			        dulieuxoa.noidung, 
			        dulieuxoa.icon
		            );
		if(dulieuxoa.thanhcong == 1) {
			setTimeout(function () {
				window.location.assign('/hethong_quantri/?xuly=giaodich');
				}, 2000);
	        }
		}, "json");		    
	}
	
    function suamuathe(id) {
	$.post("/hethong_quantri/danhmuc/muathe/chinhsua.php", {id: id},
        function (dulieusua) {
            $("#o_chinhsua_muathe").html(dulieusua);
        });
	} 
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

$tong_muathe = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM muathe WHERE `id` != '0' $dulieu_trangthai"));

$phantrang_muathe = array(
    "current_page" => $page,
    "total_record" => $tong_muathe,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page1={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_muathe);
$ketnoi_muathe = mysqli_query($ketnoi, "SELECT * FROM `muathe` WHERE `id` != '0' $dulieu_trangthai ORDER BY `id` DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");

if ($tong_muathe){
?>
        <div class="table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Họ và tên</th>
                        <th class="text-center">Loại thẻ</th>
                        <th class="text-center">Mệnh giá</th>
                        <th class="text-center">Serial</th>
                        <th class="text-center">Mã thẻ</th>
                        <th class="text-center">Nội dung</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Thời gian</th>                        
                        <th class="text-center">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        while($dulieu_muathe = mysqli_fetch_array($ketnoi_muathe)){
                        if($dulieu_muathe['trangthai'] == '0'){
                            $trangthai = '<span class="label label-warning">Chờ duyệt</span>';
                        }elseif($dulieu_muathe['trangthai'] == '1'){
                            $trangthai = '<span class="label label-success">Đã duyệt</span>';
                        }else{
                            $trangthai = '<span class="label label-danger">Từ chối</span>';
                        }
                    ?>
                    <tr>
                        <td class="text-center">MS<?php echo $dulieu_muathe['id']; ?></td>
                        <td class="text-center"><?php echo $dulieu_muathe['hovaten']; ?></td>
                        <td class="text-center"><?php echo $dulieu_muathe['loaithe']; ?></td>
                        <td class="text-center"><?php echo $dulieu_muathe['menhgia']; ?></td>
                        <td class="text-center"><?php echo $dulieu_muathe['serial']; ?></td>
                        <td class="text-center"><?php echo $dulieu_muathe['mathe']; ?></td>
                        <td class="text-center"><?php echo $dulieu_muathe['noidung']; ?></td>
                        <td class="text-center"><?php echo $trangthai; ?></td>
                        <td class="text-center"><?php echo $dulieu_muathe['thoigian']; ?></td>                        
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#chinhsua-muathe" type="button" onclick="suamuathe(<?php echo $dulieu_muathe['id']; ?>);"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-xs btn-default" onclick="xoamuathe(<?php echo $dulieu_muathe['id']; ?>);"><i class="fa fa-times"></i></a>
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
echo $phantrang->phantrang_muathe();
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Chưa có dữ liệu mua thẻ.</p>
<?php
}
?>
<!--Chỉnh sửa mua thẻ-->
<div class="modal in" id="chinhsua-muathe" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button" style="color:black;"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <div id="o_chinhsua_muathe"></div>
                </div>
            </div>
        </div>
    </div>
</div>