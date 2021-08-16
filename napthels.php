<?php
// Đạo nhái từ nhiều nguồn bởi to9xvn
// trang web: https://dailysieure.com
// facebook: https://dailysieure.com/to9xvn

include 'quantri_hethong/xuly_ketnoi.php';

function get_string_tinhtrangthe($tinhtrangthe) {
switch ($tinhtrangthe) {
case 0:
$str = '<span class="btn btn-warning form-fontrol">Chờ xử lý</span>';
break;
case 1:
$str = '<span class="btn btn-success form-fontrol">Nạp Thành Công</span>';
break;
case 2:
$str = '<div class="btn" style="background-color:red;color:#fff; ">Thẻ Sai</div>';
break;
default:
$str = '<span class="btn btn-danger form-fontrol">Lỗi Chưa Xác Định</span>';
break;
}
return $str;
}

?><div class="col-md-12">
<div class="sa-mainsa">
<div class="container">
<div class="sa-lprod">
<div class="sa-lpmain">
<div class="sa-lsnmain clearfix">Lịch sử 30 thẻ đã nạp gần nhất
<div class="sa-ls-table table-responsive">
<table class="table">
<thead>
   <tr>
	   <th>ID</th>
	 
	   <th>Mệnh giá</th>
	 
	   <th>Serial</th>
	   <th>Mã Thẻ</th>
	   <th>Loại thẻ</th>
	     <th>Tình Trạng</th>
	   <th>Thời gian</th>
   </tr>
</thead>
<tbody>
<?php
$idtk =  $dulieu_taikhoan['id'];
$kq_result = mysqli_query($ketnoi, "SELECT * FROM `to9xvn_napthenhanh` WHERE uid = '".$idtk."' ORDER by ID DESC LIMIT 30");
while($get = mysqli_fetch_assoc($kq_result)){
?>
<tr>
   <th scope="row">#<?php echo $get['ID']; ?></th>
   <td><?php echo number_format($get['sotien']); ?><sup>vnđ</sub></td>
   
   <td><?php echo $get['seri']; ?></td>
   <td><?php echo $get['code']; ?></td>
   <td><?php echo $get['loaithe']; ?></td>
   <td style="color:orange;font-weight: 900;" ><?php echo get_string_tinhtrangthe($get['tinhtrang']); ?></td>
   <td><?php echo date("d/m/Y H:i", $get['time']); ?></td>
</tr> 
<?php } ?>
</tbody>
</table>