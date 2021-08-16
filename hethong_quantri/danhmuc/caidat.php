<?php
/**
* @Mã Nguồn    Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
* @Điện thoại  0856617819
* @Zalo        0856617819
* @Email       hoanganh18595@gmail.com
*/

$dulieu_hethong = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `hethong_quantri`"));
?>
<div class="block block-themed">
    <div class="block-header bg-info">
        <h3 class="block-title">Cài đặt chung</h3>
    </div>
    <div class="block-content">
        <form class="form-horizontal push-5-t" id="caidat-trangweb" novalidate="novalidate">

            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                    <input class="form-control" type="text" id="tieude" name="tieude" placeholder="Tiêu đề của trang web" value="<?php echo $dulieu_hethong['tieude']; ?>">
                    <span class="input-group-addon"><i class="si si-book-open"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <input class="form-control" type="text" id="tenmien" name="tenmien" placeholder="Tên miền của trang web" value="<?php echo $dulieu_hethong['tenmien']; ?>">
                    <span class="input-group-addon"><i class="si si-info"></i></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <input class="form-control" type="text" id="logo" name="logo" placeholder="Link logo của trang web" value="<?php echo $dulieu_hethong['logo']; ?>">
                    <span class="input-group-addon"><i class="si si-fire"></i></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <input class="form-control" type="text" id="mota_logo" name="mota_logo" placeholder="Mô tả nếu chưa có link logo" value="<?php echo $dulieu_hethong['mota_logo']; ?>">
                    <span class="input-group-addon"><i class="si si-share"></i></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <input class="form-control" type="text" id="icon" name="icon" placeholder="Link favicon của trang web" value="<?php echo $dulieu_hethong['icon']; ?>">
                    <span class="input-group-addon"><i class="si si-plane"></i></span>
                    </div>                    
                </div>
            </div>            
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <input class="form-control" type="text" id="tukhoa" name="tukhoa" placeholder="Từ khóa SEO google ngăn cách bằng dấu ," value="<?php echo $dulieu_hethong['tukhoa']; ?>">
                    <span class="input-group-addon"><i class="si si-magnifier-add"></i></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <textarea class="form-control" type="text" id="thongbao" name="thongbao" placeholder="Thông Báo"><?php echo $dulieu_hethong['thongbao']; ?></textarea>
                    <span class="input-group-addon"><i class="si si-bell"></i></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <input class="form-control" type="text" id="facebook_admin" name="facebook" placeholder="https://www.facebook.com/hoanganh180599na" value="<?php echo $dulieu_hethong['facebook']; ?>">
                    <span class="input-group-addon"><i class="si si-social-facebook"></i></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <input class="form-control" type="text" id="youtube" name="youtube" placeholder="Link youtube" value="<?php echo $dulieu_hethong['youtube']; ?>">
                    <span class="input-group-addon"><i class="si si-social-youtube"></i></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <input class="form-control" type="text" id="sodienthoai" name="sodienthoai" placeholder="Số điện thoại admin" value="<?php echo $dulieu_hethong['sodienthoai']; ?>">
                    <span class="input-group-addon"><i class="si si-call-end"></i></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <input class="form-control" type="text" id="email" name="email" placeholder="Email admin" value="<?php echo $dulieu_hethong['Email']; ?>">
                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">                    
                    <input class="form-control" type="text" id="diachi" name="diachi" placeholder="Địa chỉ admin" value="<?php echo $dulieu_hethong['diachi']; ?>">
                    <span class="input-group-addon"><i class="si si-pointer"></i></span>
                    </div>                    
                </div>
            </div>            
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group"> 
                    <select class="form-control" name="baotri" id="baotri">
                        <option value="<?php echo $dulieu_hethong['baotri']?>">
                            <?php if ($dulieu_hethong['baotri'] == '0'): ?>
                                Trạng thái mở
                                <?php else: ?>
                                    Trạng thái đóng
                                    <?php endif; ?>
                        </option>
                        <option value="0">Mở Website</option>
                        <option value="1">Bảo Trì Website</option>
                    </select>                         
                    <span class="input-group-addon"><i class="si si-power"></i></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" type="submit">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $("#caidat-trangweb").validate({
            rules: {
                tukhoa: {
                    required: true
                },
                tieude: {
                    required: true
                }
            },
            messages: {
                tukhoa: 'Vui lòng nhập từ khóa tìm kiếm',
                tieude: 'Vui lòng nhập tiêu đề trang web'
            },
            submitHandler: function(e) {
                $('button[type="submit"]').html("Đang lưu...");
                $.post("/danhmuc_giaodien/xuly_jquery/caidat.php", $('#caidat-trangweb').serialize(), function(dulieu) {
                    $('button[type="submit"]').html("Lưu lại");
                    swal(dulieu.tieude, dulieu.noidung, dulieu.icon);
                    setTimeout(function() {
                        window.location.href = "/hethong_quantri/?xuly=caidat";
                    }, 2000);
                }, "json");
                return false;
            }
        });
    });
</script>