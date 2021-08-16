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
    trangthai = "";
    page1 = 1;
    trangthai1 = "";
</script>
<div class="block block-themed">
    <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
        <li class="active">
            <a href="#napthe" role="tab" data-toggle="tab"><i class="fa fa-dedent"></i>NẠP THẺ</a>
        </li>
        <li class="">
            <a href="#muathe" role="tab" data-toggle="tab"><i class="fa fa-dedent"></i> MUA THẺ</a>
        </li>
    </ul>
    
            <div class="block-content tab-content">

            <div class="tab-pane active" id="napthe">
                <div class="row">
                    <div class="col-lg-3">
                <div class="input-group">
                <select class="form-control" name="trangthai" id="trangthai">
                    <option value="">Tất cả</option>                    
                    <option value="0">Đang chờ</option>
                    <option value="1">Đã duyệt</option>
                    <option value="2">Từ chối</option>                    
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="boloc();"><i class="si si-magnifier"></i></button>
                </span>
                    </div>
                </div>
            </div>
            <hr/>
            <div style="display: block;" class="tatca_napthe"></div>
            <div id="taidulieu" style="text-align:center;">
                <img src="/danhmuc_hinhanh/loading.gif" />
            </div>
        </div>
            
            <div class="tab-pane" id="muathe">
                <div class="row">
                    <div class="col-lg-3">
                <div class="input-group">
                <select class="form-control" name="trangthai1" id="trangthai1">
                    <option value="">Tất cả</option>                     
                    <option value="0">Đang chờ</option>
                    <option value="1">Đã duyệt</option>
                    <option value="2">Từ chối</option>   
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="boloc1();"><i class="si si-magnifier"></i></button>
                </span>
                    </div>
                </div>
            </div>
            <hr/>
            <div style="display: block;" class="tatca_muathe"></div>
            <div id="taidulieu1" style="text-align:center;">
                <img src="/danhmuc_hinhanh/loading.gif" />
            </div>
        </div>            

        </div>
</div>

<script>
    function danhsach_napthe() {
        $(".tatca_napthe").hide();
        $("#taidulieu").show();
        $.post("/danhmuc_giaodien/xuly_jquery/giaodich_napthe.php", {
                page: page,
                trangthai: trangthai
            })
            .done(function(data) {
                $(".tatca_napthe").html('');
                $('.tatca_napthe').empty().append(data);
                $("#taidulieu").hide();
                $(".tatca_napthe").show();
            });
    }

    function danhsach_muathe() {
        $(".tatca_muathe").hide();
        $("#taidulieu1").show();
        $.post("/danhmuc_giaodien/xuly_jquery/giaodich_muathe.php", {
                page1: page1,
                trangthai1: trangthai1
            })
            .done(function(data) {
                $(".tatca_muathe").html('');
                $('.tatca_muathe').empty().append(data);
                $("#taidulieu1").hide();
                $(".tatca_muathe").show();
            });
    }

    
    function boloc() {
        trangthai = $("#trangthai").val();
        danhsach_napthe();
    }
    
    function boloc1() {
        trangthai1 = $("#trangthai1").val();
        danhsach_muathe();
    }
    
    danhsach_napthe();    
    danhsach_muathe();
</script>