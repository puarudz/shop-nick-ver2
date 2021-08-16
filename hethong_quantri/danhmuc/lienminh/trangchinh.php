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
    page2 = 1;
    trangthai2 = "";
    page3 = 1;
    trangthai3 = "";
</script>
<div class="block block-themed">
    <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
        <li class="active">
            <a href="#LMHT" role="tab" data-toggle="tab"><i class="fa fa-dedent"></i>Liên Minh Huyền Thoại</a>
        </li>
        <li class="">
            <a href="#LQM" role="tab" data-toggle="tab"><i class="fa fa-dedent"></i> Liên Quân Mobile</a>
        </li>
        <li class="">
            <a href="#NRO" role="tab" data-toggle="tab"><i class="fa fa-dedent"></i> Ngọc Rồng Online</a>
        </li>
        <li class="">
            <a href="#RANDOM" role="tab" data-toggle="tab"><i class="fa fa-dedent"></i> Tài khoản RANDOM</a>
        </li>
    </ul>
    
            <div class="block-content tab-content">

            <div class="tab-pane active" id="LMHT">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="input-group">
                    <button class="btn btn-default" data-toggle="modal" data-target="#dang-lmht" type="button">Đăng tài khoản</button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                <div class="input-group">
                <select class="form-control" name="trangthai" id="trangthai">
                    <option value="">Tất cả</option>                    
                    <option value="chuaban">Chưa bán</option>
                    <option value="daban">Đã bán</option>
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="boloc();"><i class="si si-magnifier"></i></button>
                </span>
                    </div>
                </div>
            </div>
            <hr/>
            <div style="display: block;" class="tatca_lmht"></div>
            <div id="taidulieu" style="text-align:center;">
                <img src="/danhmuc_hinhanh/loading.gif" />
            </div>
        </div>
            
            <div class="tab-pane" id="LQM">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="input-group">
                    <button class="btn btn-default" data-toggle="modal" data-target="#dang-lienquan" type="button">Đăng tài khoản</button>
                        </div>
                    </div>                    
                    <div class="col-lg-3">
                <div class="input-group">
                <select class="form-control" name="trangthai1" id="trangthai1">
                    <option value="">Tất cả</option>                    
                    <option value="chuaban">Chưa bán</option>
                    <option value="daban">Đã bán</option>
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="boloc1();"><i class="si si-magnifier"></i></button>
                </span>
                    </div>
                </div>
            </div>
            <hr/>
            <div style="display: block;" class="tatca_lienquan"></div>
            <div id="taidulieu1" style="text-align:center;">
                <img src="/danhmuc_hinhanh/loading.gif" />
            </div>
        </div>            
            
            <div class="tab-pane" id="NRO">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="input-group">
                    <button class="btn btn-default" data-toggle="modal" data-target="#dang-ngocrong" type="button">Đăng tài khoản</button>
                        </div>
                    </div>                    
                    <div class="col-lg-3">
                <div class="input-group">
                <select class="form-control" name="trangthai2" id="trangthai2">
                    <option value="">Tất cả</option>                    
                    <option value="chuaban">Chưa bán</option>
                    <option value="daban">Đã bán</option>
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="boloc2();"><i class="si si-magnifier"></i></button>
                </span>
                    </div>
                </div>
            </div>
            <hr/>
            <div style="display: block;" class="tatca_ngocrong"></div>
            <div id="taidulieu2" style="text-align:center;">
                <img src="/danhmuc_hinhanh/loading.gif" />
            </div>
        </div>
        
            <div class="tab-pane" id="RANDOM">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="input-group">
                    <button class="btn btn-default" data-toggle="modal" data-target="#dang-random" type="button">Đăng tài khoản</button>
                        </div>
                    </div>                    
                    <div class="col-lg-3">
                <div class="input-group">
                <select class="form-control" name="trangthai3" id="trangthai3">
                    <option value="">Tất cả</option>                    
                    <option value="chuaban">Chưa bán</option>
                    <option value="daban">Đã bán</option>
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="boloc3();"><i class="si si-magnifier"></i></button>
                </span>
                    </div>
                </div>
            </div>
            <hr/>
            <div style="display: block;" class="tatca_random"></div>
            <div id="taidulieu3" style="text-align:center;">
                <img src="/danhmuc_hinhanh/loading.gif" />
            </div>
        </div>         

        </div>
</div>

<script>
    function danhsach_lmht() {
        $(".tatca_lmht").hide();
        $("#taidulieu").show();
        $.post("/danhmuc_giaodien/xuly_jquery/taikhoan_game_lmht.php", {
                page: page,
                trangthai: trangthai
            })
            .done(function(data) {
                $(".tatca_lmht").html('');
                $('.tatca_lmht').empty().append(data);
                $("#taidulieu").hide();
                $(".tatca_lmht").show();
            });
    }

    function danhsach_lienquan() {
        $(".tatca_lienquan").hide();
        $("#taidulieu1").show();
        $.post("/danhmuc_giaodien/xuly_jquery/taikhoan_game_lienquan.php", {
                page1: page1,
                trangthai1: trangthai1
            })
            .done(function(data) {
                $(".tatca_lienquan").html('');
                $('.tatca_lienquan').empty().append(data);
                $("#taidulieu1").hide();
                $(".tatca_lienquan").show();
            });
    }

    function danhsach_ngocrong() {
        $(".tatca_ngocrong").hide();
        $("#taidulieu2").show();
        $.post("/danhmuc_giaodien/xuly_jquery/taikhoan_game_ngocrong.php", {
                page2: page2,
                trangthai2: trangthai2
            })
            .done(function(data) {
                $(".tatca_ngocrong").html('');
                $('.tatca_ngocrong').empty().append(data);
                $("#taidulieu2").hide();
                $(".tatca_ngocrong").show();
            });
    }    

    function danhsach_random() {
        $(".tatca_random").hide();
        $("#taidulieu3").show();
        $.post("/danhmuc_giaodien/xuly_jquery/taikhoan_game_random.php", {
                page3: page3,
                trangthai3: trangthai3
            })
            .done(function(data) {
                $(".tatca_random").html('');
                $('.tatca_random').empty().append(data);
                $("#taidulieu3").hide();
                $(".tatca_random").show();
            });
    }
    
    function boloc() {
        trangthai = $("#trangthai").val();
        danhsach_lmht();
    }
    
    function boloc1() {
        trangthai1 = $("#trangthai1").val();
        danhsach_lienquan();
    }
    
    function boloc2() {
        trangthai2 = $("#trangthai2").val();
        danhsach_ngocrong();
    }
    
    function boloc3() {
        trangthai3 = $("#trangthai3").val();
        danhsach_random();
    }    
    
    danhsach_lmht();    
    danhsach_lienquan();
    danhsach_ngocrong();
    danhsach_random();
</script>