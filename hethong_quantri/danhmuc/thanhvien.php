<?php
/**
* @Mã Nguồn    Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
* @Điện thoại  0856617819
* @Zalo        0856617819
* @Email       hoanganh18595@gmail.com
*/
?>
<script>
    page = 1;
    sodienthoai = "";
    taikhoan_id = "";
    email = "";
</script>
<div class="block block-themed">
    <div class="block-header bg-info">
        <h3 class="block-title">Danh sách thành viên</h3>
    </div>
        <div class="block-content tab-content">

            <div class="tab-pane active">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input class="form-control" placeholder="Số điện thoại" id="sodienthoai" value="">
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input class="form-control" placeholder="Facebook ID" id="taikhoan_id" value="">
                        </div>
                        <!-- /input-group -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Email thành viên" id="email" value="">
                            <span class="input-group-btn">
<button class="btn btn-default" type="button" onclick="boloc();"><i class="si si-magnifier"></i></button>
</span>
                        </div>
                        <!-- /input-group -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
                <hr/>

                <div style="display: block;" class="tatca_thanhvien"></div>
                <div id="taidulieu">
                    <img src="/danhmuc_hinhanh/loading.gif" />
                </div>
            </div>
        </div>
</div>
<script>
    function danhsach_thanhvien() {
        $(".tatca_thanhvien").hide();
        $("#taidulieu").show();
        $.post("../danhmuc_giaodien/xuly_jquery/thanhvien.php", {
                page: page,
                sodienthoai: sodienthoai,
                email: email,
                taikhoan_id: taikhoan_id
            })
            .done(function(data) {
                $(".tatca_thanhvien").html('');
                $('.tatca_thanhvien').empty().append(data);
                $("#taidulieu").hide();
                $(".tatca_thanhvien").show();
            });
    }

    function boloc() {
        email = $("#email").val();
        taikhoan_id = $("#taikhoan_id").val();
        sodienthoai = $("#sodienthoai").val();
        danhsach_thanhvien();
    }

    danhsach_thanhvien();
</script>

</div>
</div>
</div>