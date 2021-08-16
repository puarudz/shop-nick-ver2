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

if(!$taikhoan_id){
    header('location: /taikhoang/dangnhap');
}
?>
	<script src="/danhmuc_giaodien/javascript/thongbao.hopthoai.js"></script>
<script>
    function xoasanpham(id) {
	$.post("/xuly_taikhoan/giohang/xoa.php", {id: id},
			function (dulieusua) {
		        swal(
			        dulieusua.tieude, 
			        dulieusua.noidung
		            );
		if(dulieusua.thanhcong == 1) {
			setTimeout(function () {
				window.location.assign('/taikhoan/giohang');
				}, 1000);
	        }
		}, "json");		    
	}
	
    function thanhtoan_giohang() {
	$.post("/xuly_taikhoan/giohang/thanhtoan.php",
			function (dulieu) {
				swal({
					title: dulieu.tieude,
					text: dulieu.noidung,
					button: dulieu.button
				});
			if (dulieu.thanhcong == 1) {
				setTimeout(function () {
					window.location.assign('/taikhoan/giohang');
				}, 4000);
			}				
		}, "json");		    
	}
</script>
<?php
    $page = !empty($_POST['page']) ? $_POST['page'] : "";
        
    $tong_giohang = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM giohang WHERE `id_taikhoan`='$taikhoan_id'"));

$phantrang_giohang = array(
    "current_page" => $page,
    "total_record" => $tong_giohang,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_giohang);
$ketnoi_giohang = mysqli_query($ketnoi, "SELECT * FROM `giohang` WHERE `id_taikhoan`='$taikhoan_id' ORDER BY id DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");
?>
<div class="container">
    <div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
                <h3 class="title">GIỎ HÀNG CỦA BẠN</h3>
            </div>
        </div>
    <div class="col-md-12">
        <div class="card-plain card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-shopping table">
                        <thead>
                            <tr>
                                <th class="text-center">Hình ảnh</th>
                                <th class="text-center">Sản phẩm</th>
                                <th class="text-center">Mã số</th>
                                <th class="text-center">Người bán</th>                                
                                <th class="text-center">Giá tiền</th>
                                <th class="text-center">Thao tác</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($tong_giohang == 0){
                            ?>
                            <tr>
                                <td colspan="7" class="text-center">Giỏ hàng của bạn hiện đang trống.</td>
                            </tr>
                            <?php 
                                }else{ 
                                $i = 1;
                                while ($dulieu_giohang = mysqli_fetch_array($ketnoi_giohang)){
                                $dulieu_baidang = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM baidang WHERE `id`='".$dulieu_giohang['id_nick']."'"));
                                $dulieu_mua_sanpham = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM giohang WHERE `id_taikhoan`='$taikhoan_id'"));
                                $dulieu_tong_thanhtoan = mysqli_query($ketnoi, "SELECT * FROM `giohang` WHERE `id_taikhoan`='$taikhoan_id'");
                                if($dulieu_baidang['loai_taikhoan'] == 'LMHT'){
                                    $loai_taikhoan = 'LIÊN MINH';
                                }elseif($dulieu_baidang['loai_taikhoan'] == 'LQM'){
                                    $loai_taikhoan = 'LIÊN QUÂN';
                                }elseif($dulieu_baidang['loai_taikhoan'] == 'NRO'){
                                    $loai_taikhoan = 'NGỌC RỒNG';
                                }else{
                                    if($dulieu_baidang['loai_random'] == 'RD_NRO'){
                                        $loai_taikhoan = '<span style="font-size: 9px;">(RANDOM)</span> NGỌC RỒNG';
                                    }elseif($dulieu_baidang['loai_random'] == 'RD_LMHT'){
                                        $loai_taikhoan = '<span style="font-size: 9px;">(RANDOM)</span> LIÊN MINH';
                                    }else{
                                        $loai_taikhoan = '<span style="font-size: 9px;">(TAIKHOAN)</span> RANDOM';
                                    }
                                }    
                                $thanhtoan = '0';
                                while($tong_thanhtoan = mysqli_fetch_array($dulieu_tong_thanhtoan)){
                                    $thanhtoan += $tong_thanhtoan['sotien'];
                                }
                            ?>
                            <tr>
                                <td><div class="img-container"><img src="<?php echo $dulieu_baidang['hinhanh_gioithieu']; ?>"></div></td>
                                <td class="text-center td-name"><a href="/taikhoan/tai-khoan-ma-so-<?php echo $dulieu_giohang['id_nick']; ?>"><?php echo $loai_taikhoan; ?></a></td>
                                <td class="text-center">Mã số <?php echo $dulieu_giohang['id_nick']; ?></td>                                
                                <td class="text-center"><?php echo $dulieu_baidang['nguoidang']; ?></td>
                                <td class="text-center"><?php echo number_format($dulieu_giohang['sotien']); ?> VNĐ</td>
                                <td class="text-center"><button type="button" rel="tooltip" data-placement="left" onclick="xoasanpham(<?php echo $dulieu_giohang['id_nick']; ?>);" class="btn btn-neutral" title="Xóa sản phẩm"><i class="now-ui-icons ui-1_simple-remove"></i></button></td>
                            </tr>
                            <?php
                             $i++;
                             }
                            ?>
                            <tr>
                                <td><input id="magiamgia" placeholder="Mã giảm giá" type="text" class="form-control" value=""><button class="btn btn-outline-info" type="button" onclick="apdung_magiamgia();" style="padding: 3px 9px;border-radius: 3px;margin-top: 5px;">Áp dụng</button></td>
                                <td colspan="1"></td>
                                <td class="td-total">Tổng tiền</td>
                                <td class="td-price"><?php echo number_format($thanhtoan); ?> VNĐ</td>
                                <td class="text-right" colspan="3">
                                <button type="button" class="btn-round btn btn-info" onclick="thanhtoan_giohang();">Thanh toán <i class="now-ui-icons arrows-1_minimal-right"></i></button>
                                </td>
                            </tr>                            
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $phantrang->phantrang_giohang(); ?>