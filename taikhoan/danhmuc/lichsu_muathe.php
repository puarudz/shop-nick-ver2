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
    $page = !empty($_POST['page3']) ? $_POST['page3'] : "";
        
    $tong_lichsumuathe = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `muathe` WHERE `taikhoan_id`='$taikhoan_id'"));

$phantrang_lichsumuathe = array(
    "current_page" => $page,
    "total_record" => $tong_lichsumuathe,
    "limit" => "10",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page3={page}"
    );
    
$phantrang = new phantrang;
$phantrang->themvao($phantrang_lichsumuathe);
$ketnoi_lichsumuathe = mysqli_query($ketnoi, "SELECT * FROM `muathe` WHERE `taikhoan_id`='$taikhoan_id' ORDER BY id DESC LIMIT {$phantrang->ketthuc_phantrang()["start"]}, {$phantrang->ketthuc_phantrang()["limit"]}");
?>
    <h4 class="m-y-2">Lịch sử mua thẻ</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="">
                <tr>
                    <th class="text-center">#</th>
                    <th>Loại thẻ</th>
                    <th>Mệnh giá</th>
                    <th>Mã thẻ</th>
                    <th>Serial</th>
                    <th>Nội dung</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $i=1;
            if ($tong_lichsumuathe == 0){
            ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            <p>Bạn chưa có giao dịch nào.</p>
                        </td>
                    </tr>
                    <?php }else{ while ($dulieu_muathe = mysqli_fetch_array($ketnoi_lichsumuathe)){ ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $dulieu_muathe['id']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_muathe['loaithe']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_muathe['menhgia']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_muathe['mathe']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_muathe['serial']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $dulieu_muathe['noidung']; ?>
                            </td>
                            <?php if($dulieu_muathe['trangthai'] == 0){
                            $trangthai_muathe = '<span class="badge badge-warning">Chờ duyệt</span>';
                        }elseif($dulieu_muathe['trangthai'] == 1){
                            $trangthai_muathe = '<span class="badge badge-success">Thành công</span>';
                        }else{
                            $trangthai_muathe = '<span class="badge badge-danger">Từ chối</span>';
                        } ?>
                                <td class="text-center">
                                    <?php echo $trangthai_muathe; ?>
                                </td>
                        </tr>
                        <?php $i++; } } ?>
            </tbody>
        </table>
    </div>
<?php echo $phantrang->phantrang_lichsumuathe(); ?>