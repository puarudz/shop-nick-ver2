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
    function suataikhoan(id) {
	$.post("/hethong_quantri/danhmuc/sua.php", {id: id},
        function (dulieusua) {
            $("#o_chinhsua").html(dulieusua);
        });
	}
	
    function chucvu(id) {
	$.post("/hethong_quantri/danhmuc/chucvu.php", {id: id},
        function (dulieu) {
            $("#o_thangcap").html(dulieu);
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
    $taikhoan_uid = $_POST['taikhoan_id'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];

if (!empty($taikhoan_uid)) {
    $dulieu_taikhoan_uid = "AND `taikhoan_id` = '$taikhoan_uid'";
}

if (!empty($sodienthoai)) {
    $dulieu_sodienthoai = "AND `sodienthoai` = '$sodienthoai'";
}

if (!empty($email)) {
    $dulieu_email = "AND `email` = '$email'";
}

$tong_thanhvien = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM nguoidung WHERE id != '0' $dulieu_taikhoan_uid $dulieu_sodienthoai $dulieu_email"));

$phantrang_thanhvien = array(
    "current_page" => $page,
    "total_record" => $tong_thanhvien,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_thanhvien);
$ketnoi_thanhvien = mysqli_query($ketnoi, "SELECT * FROM `nguoidung` WHERE id != '0' $dulieu_taikhoan_uid $dulieu_sodienthoai $dulieu_email ORDER BY `id` DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");

if ($tong_thanhvien){
?>
<div class="row" style="margin-top: 5px; padding: 20px;">
<div class="sa-ls-table table-responsive">
<table  class="table table-bordered">
<thead><tr>
<th class="text-center" style="width: 50px;">#</th>
<th>Facebook ID</th>
<th>Tên</th>
<th>SĐT</th>
<th>Email</th>
<th>Tiền</th>
<th>Tình trạng</th>
<th>Ngày tạo</th>
<th class="text-center" style="width: 100px;">Thao tác</th>
</tr></thead>
<tbody>
<?php
$i=1;
while($dulieu_thanhvien = mysqli_fetch_array($ketnoi_thanhvien)){
if($dulieu_thanhvien['khoa'] == 0){
$khoa = '<span class="label label-primary">Không khóa</span>';
}else{
$khoa = '<span class="label label-danger">Bị khóa</span>';
}

if($dulieu_thanhvien['chucvu']=='quantri'){
    $hovaten = '<a style="color: red;font-weight: bold;">'.$dulieu_thanhvien['hovaten'].'</a>';
}elseif($dulieu_thanhvien['chucvu']=='congtacvien'){
    $hovaten = '<a style="color: green;font-weight: bold;">'.$dulieu_thanhvien['hovaten'].'</a>';  
}else{
    $hovaten = '<a>'.$dulieu_thanhvien['hovaten'].'</a>';  
}
?>
<tr>
<td class="text-center"><?php echo $dulieu_thanhvien['id']; ?></td>
<td><?php echo $dulieu_thanhvien['taikhoan_id']; ?></td>
<td><?php echo $hovaten; ?></td>
<td><?php echo $dulieu_thanhvien['sodienthoai']; ?></td>
<td><?php echo $dulieu_thanhvien['email']; ?></td>
<td><?php echo number_format($dulieu_thanhvien['tien'], 0, '.', '.'); ?><sup>vnđ</sup></td>
<td><?php echo $khoa; ?></td>
<td><?php echo $dulieu_thanhvien['thoigian']; ?></td>
<td class="text-center">
<div class="btn-group">
<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#sua-thanhvien" type="button" onclick="suataikhoan(<?php echo $dulieu_thanhvien['id']; ?>);"><i class="fa fa-pencil"></i></button>
<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#sua-chucvu" type="button" onclick="chucvu(<?php echo $dulieu_thanhvien['id']; ?>);"><i class="si si-bar-chart"></i></button>
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
echo $phantrang->phantrang_thanhvien();
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Không tìm thấy thành viên</p>
<?php
}
?>
<!--Chỉnh sửa tài khoản-->
<div class="modal in" id="sua-thanhvien" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button" style="color:black;"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <div id="o_chinhsua"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Thăng cấp chức vụ-->
<div class="modal in" id="sua-chucvu" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button" style="color:black;"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <div id="o_thangcap"></div>
                </div>
            </div>
        </div>
    </div>
</div>