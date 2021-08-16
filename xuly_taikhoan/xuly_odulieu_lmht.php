<?php
require('../quantri_hethong/xuly_ketnoi.php');
$kiemtra = $_POST['kiemtra'];

if($kiemtra == 'khong'){ ?>
    <div class="form-group">
    <div class="col-md-12">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-star"></i></span>
    <input class="form-control" type="text" name="tuong" placeholder="Số tướng">
    </div>
    </div>
    </div>
    
    <div class="form-group">
    <div class="col-md-12">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-star"></i></span>
    <input class="form-control" type="text" name="trangphuc" placeholder="Số trang phục">
    </div>
    </div>
    </div>    
    
    <div class="form-group">
    <div class="col-md-12">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-star"></i></span>
    <input class="form-control" type="text" name="bangngoc" placeholder="Số bảng ngọc">
    </div>
    </div>
    </div>

    <div class="form-group">
    <div class="col-md-12">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-star"></i></span>
    <select class="form-control" name="xephang">
        <?php
            for($i = 1; $i < 29; $i++){
                echo '<option value="'.$i.'">'.xephanglienminh($i).'</option>';
            }
        ?>
    </select>
    </div>
    </div>
    </div>
    
    <div class="form-group">
    <div class="col-md-12">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-star"></i></span>
    <select class="form-control" name="khung">
        <?php
            for($i = 1; $i < 10; $i++){
                echo '<option value="'.$i.'">'.khung_xephanglienminh($i).'</option>';
            }
        ?>
    </select>
    </div>
    </div>
    </div>  

    <div class="form-group">
    <div class="col-md-12">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
    <select class="form-control" name="email">
        <option value="chualienket">Chưa liên kết</option>
        <option value="dalienket">Đã liên kết</option>
    </select>
    </div>
    </div>
    </div>      
    
    <div class="form-group">
    <div class="col-md-12">
    <div class="input-group">
    <span class="input-group-addon"><i class="si si-call-end"></i></span>
    <select class="form-control" name="sodienthoai">
        <option value="chualienket">Chưa liên kết</option>
        <option value="dalienket">Đã liên kết</option>
    </select>
    </div>
    </div>
    </div>
    
    <div class="form-group">
    <div class="col-md-12">
    <div class="input-group">
    <span class="input-group-addon"><i class="si si-social-facebook"></i></span>
    <select class="form-control" name="facebook">
        <option value="chualienket">Chưa liên kết</option>
        <option value="dalienket">Đã liên kết</option>
    </select>
    </div>
    </div>    
<?php
}
?>