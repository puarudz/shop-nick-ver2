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
    $page = !empty($_POST['page1']) ? $_POST['page1'] : "";
        
    $tong_lichsunap = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `lichsu_naptien` WHERE `taikhoan_id`='$taikhoan_id'"));

$phantrang_lichsunap = array(
    "current_page" => $page,
    "total_record" => $tong_lichsunap,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page1={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_lichsunap);
$ketnoi_lichsunap = mysqli_query($ketnoi, "SELECT * FROM `lichsu_naptien` WHERE `taikhoan_id`='$taikhoan_id' ORDER BY id DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");
?>
    <h4 class="m-y-2">Lịch sử nạp tiền</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="">
                <tr>
                    <th class="text-center">#</th>
                    <th>Loại thẻ</th>
                    <th>Mệnh giá</th>
                    <th>Mã thẻ</th>
                    <th>Serial</th>
                    <th>Thực nhận</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $i=1;
            if ($tong_lichsunap == 0){
            ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            <p>Bạn chưa có giao dịch nào.</p>
                        </td>
                    </tr>
                    <?php }else{ while ($dulieu_naptien = mysqli_fetch_array($ketnoi_lichsunap)){ ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $dulieu_naptien['id']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_naptien['loaithe']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_naptien['menhgia']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_naptien['mathe']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_naptien['serial']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_naptien['thucnhan']; ?>
                            </td>
                            <?php if($dulieu_naptien['trangthai'] == 0){
                            $trangthai_naptien = '<span class="badge badge-warning">Chờ duyệt</span>';
                        }elseif($dulieu_naptien['trangthai'] == 1){
                            $trangthai_naptien = '<span class="badge badge-success">Thành công</span>';
                        }else{
                            $trangthai_naptien = '<span class="badge badge-danger">Từ chối</span>';
                        } ?>
                                <td class="text-center">
                                    <?php echo $trangthai_naptien; ?>
                                </td>
                        </tr>
                        <?php $i++; } } ?>
            </tbody>
        </table>
    </div>
<?php echo $phantrang->phantrang_lichsunap(); ?>