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
    $page = !empty($_POST['page']) ? $_POST['page'] : "";
        
    $tong_lichsumua = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `lichsu_muanick` WHERE `taikhoan_id`='$taikhoan_id'"));

$phantrang_lichsumua = array(
    "current_page" => $page,
    "total_record" => $tong_lichsumua,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_lichsumua);
$ketnoi_lichsumua = mysqli_query($ketnoi, "SELECT * FROM `lichsu_muanick` WHERE `taikhoan_id`='$taikhoan_id' ORDER BY id DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");
?>
    <h4 class="m-y-2">Lịch sử mua tài khoản</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Loại nick</th>
                    <th class="text-center">Tài khoản</th>
                    <th class="text-center">Mật khẩu</th>
                    <th class="text-center">Giá tiền</th>
                    <th class="text-center">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $i=1;
            if ($tong_lichsumua == 0){
            ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            <p>Bạn chưa có giao dịch nào.</p>
                        </td>
                    </tr>
                    <?php }else{ while ($dulieu_muanick = mysqli_fetch_array($ketnoi_lichsumua)){ ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $dulieu_muanick['id']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_muanick['loai_taikhoan']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_muanick['taikhoan']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_muanick['matkhau']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_muanick['gia']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_muanick['thoigian']; ?>
                            </td>
                        </tr>
                        <?php $i++; } } ?>
            </tbody>
        </table>
    </div>
<?php echo $phantrang->phantrang_lichsumua(); ?>