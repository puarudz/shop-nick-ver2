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
</script>
<div class="block block-themed">
    <div class="block-header bg-info">
        <h3 class="block-title">Danh sách ATM</h3>
    </div>
        <div class="block-content tab-content">
            <div class="tab-pane active">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="input-group">
                    <button class="btn btn-default" data-toggle="modal" data-target="#them-ATM" type="button">Thêm mới</button>
                        </div>
                    </div>
            </div>  
            <hr/>
                <div style="display: block;" class="tatca_thongtinatm"></div>
                <div id="taidulieu">
                    <img src="/danhmuc_hinhanh/loading.gif" />
                </div>
            </div>
        </div>
</div>
<script>
    function danhsach_atm() {
        $(".tatca_thongtinatm").hide();
        $("#taidulieu").show();
        $.post("../danhmuc_giaodien/xuly_jquery/thongtinATM.php", {
                page: page
            })
            .done(function(data) {
                $(".tatca_thongtinatm").html('');
                $('.tatca_thongtinatm').empty().append(data);
                $("#taidulieu").hide();
                $(".tatca_thongtinatm").show();
            });
    }

    danhsach_atm();
</script>

</div>
</div>
</div>