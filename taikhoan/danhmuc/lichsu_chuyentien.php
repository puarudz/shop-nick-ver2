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
    $page = !empty($_POST['page2']) ? $_POST['page2'] : "";
        
    $tong_lichsuchuyentien = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `lichsu_giaodich` WHERE `id_nguoichuyen`='$taikhoan_id'"));

$phantrang_lichsuchuyentien = array(
    "current_page" => $page,
    "total_record" => $tong_lichsuchuyentien,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page2={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_lichsuchuyentien);
$ketnoi_lichsuchuyentien = mysqli_query($ketnoi, "SELECT * FROM `lichsu_giaodich` WHERE `id_nguoichuyen`='$taikhoan_id' ORDER BY id DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");
?>
    <h4 class="m-y-2">Lịch sử chuyển tiền</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Người chuyển</th>
                    <th class="text-center">Người nhận</th>
                    <th class="text-center">Số tiền</th>
                    <th class="text-center">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $i=1;
            if ($tong_lichsuchuyentien == 0){
            ?>
                    <tr>
                        <td colspan="5" class="text-center">
                            <p>Bạn chưa có giao dịch nào.</p>
                        </td>
                    </tr>
                    <?php }else{ while ($dulieu_chuyentien = mysqli_fetch_array($ketnoi_lichsuchuyentien)){ ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $dulieu_chuyentien['id']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_chuyentien['nguoi_chuyen']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_chuyentien['nguoi_nhan']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_chuyentien['sotien']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_chuyentien['thoigian']; ?>
                            </td>
                        </tr>
                        <?php $i++; } } ?>
            </tbody>
        </table>
    </div>
<?php echo $phantrang->phantrang_lichsuchuyentien(); ?>