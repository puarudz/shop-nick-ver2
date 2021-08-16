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
    function xoathe(id) {
	$.post("/xuly_taikhoan/napthe/xoa.php", {id: id},
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
	
    function suanapthe(id) {
	$.post("/hethong_quantri/danhmuc/napthe/chinhsua.php", {id: id},
        function (dulieusua) {
            $("#o_chinhsua_napthe").html(dulieusua);
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

    $page = $_POST['page'];
    $trangthai = $_POST['trangthai'];

if (!empty($trangthai)) {
    $dulieu_trangthai = "AND `trangthai` = '$trangthai'";
}

$tong_napthe = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM lichsu_naptien WHERE `id` != '0' $dulieu_trangthai"));

$phantrang_napthe = array(
    "current_page" => $page,
    "total_record" => $tong_napthe,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_napthe);
$ketnoi_napthe = mysqli_query($ketnoi, "SELECT * FROM `lichsu_naptien` WHERE `id` != '0' $dulieu_trangthai ORDER BY `id` DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");

if ($tong_napthe){
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
                        <th class="text-center">Thực nhận</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Thời gian</th>                        
                        <th class="text-center">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        while($dulieu_napthe = mysqli_fetch_array($ketnoi_napthe)){
                        if($dulieu_napthe['trangthai'] == '0'){
                            $trangthai = '<span class="label label-warning">Chờ duyệt</span>';
                        }elseif($dulieu_napthe['trangthai'] == '1'){
                            $trangthai = '<span class="label label-success">Đã duyệt</span>';
                        }else{
                            $trangthai = '<span class="label label-danger">Từ chối</span>';
                        }
                    ?>
                    <tr>
                        <td class="text-center">MS<?php echo $dulieu_napthe['id']; ?></td>
                        <td class="text-center"><?php echo $dulieu_napthe['hovaten']; ?></td>
                        <td class="text-center"><?php echo $dulieu_napthe['loaithe']; ?></td>
                        <td class="text-center"><?php echo $dulieu_napthe['menhgia']; ?></td>
                        <td class="text-center"><?php echo $dulieu_napthe['serial']; ?></td>
                        <td class="text-center"><?php echo $dulieu_napthe['mathe']; ?></td>
                        <td class="text-center"><?php echo $dulieu_napthe['thucnhan']; ?></td>
                        <td class="text-center"><?php echo $trangthai; ?></td>
                        <td class="text-center"><?php echo $dulieu_napthe['thoigian']; ?></td>                        
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#chinhsua-napthe" type="button" onclick="suanapthe(<?php echo $dulieu_napthe['id']; ?>);"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-xs btn-default" onclick="xoathe(<?php echo $dulieu_napthe['id']; ?>);"><i class="fa fa-times"></i></a>
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
echo $phantrang->phantrang_napthe();
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Chưa có dữ liệu nạp thẻ.</p>
<?php
}
?>
<!--Chỉnh sửa nạp thẻ-->
<div class="modal in" id="chinhsua-napthe" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button" style="color:black;"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <div id="o_chinhsua_napthe"></div>
                </div>
            </div>
        </div>
    </div>
</div>