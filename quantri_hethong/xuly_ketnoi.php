<?php
/**
* @Mã Nguồn    Được Viết Bởi Hoàng Anh
* @Trang Web   hostingsieure.com
* @Liên Hệ     https://facebook.com/hoanganh.180599na
*/
    session_start();
    define('hoanganh_sever', 'localhost');
    define('hoanganh_taikhoan', 't6quayngocnro_cc');
    define('hoanganh_taikhoan_dulieu', 't6quayngocnro_cc');
    define('hoanganh_matkhau', 'i,0$ApZL.O#E');
    
    $ketnoi = mysqli_connect(hoanganh_sever,hoanganh_taikhoan,hoanganh_matkhau,hoanganh_taikhoan_dulieu) or die("HOÀNG ANH KẾT NỐI: THÔNG TIN KẾT NỐI CƠ SỞ DỮ LIỆU SAI");
    @mysqli_set_charset($ketnoi,"utf8");
    $buito = 'https://'.$_SERVER['HTTP_HOST']; 
  mysqli_query($ketnoi, "update `hethong_quantri` set `tenmien` = '$buito'");
    if(isset($_SESSION['taikhoan_id']) && $_SESSION['taikhoan_id']){
        $taikhoan_id = $_SESSION['taikhoan_id'];
        $dulieu_taikhoan = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `nguoidung` WHERE `id` = '".$taikhoan_id."'"));
    }else{
        $taikhoan_id = NULL;
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $hethong = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM `hethong_quantri`"));
    $trangchu = $hethong['tenmien'];
    $thoigian = '';
    $thoigian = date("Y-m-d H:i:sa");
    
// function xếp hạng liên quân
    function xephanglienquan($lienquan){
        switch($lienquan){
        case 1:
            $xephang_lienquan = "Chưa có";
        break;
        case 2:        
            $xephang_lienquan = "ĐỒNG III";
        break;
        case 3:
            $xephang_lienquan = "ĐỒNG II";
        break;
        case 4:
            $xephang_lienquan = "ĐỒNG I";
        break;
        case 5:
            $xephang_lienquan = "BẠC III";
        break;
        case 6:
            $xephang_lienquan = "BẠC II";
        break;
        case 7:
            $xephang_lienquan = "BẠC I";
        break;
        case 8:
            $xephang_lienquan = "VÀNG IV";
        break;
        case 9:
            $xephang_lienquan = "VÀNG III";
        break;
        case 10:
            $xephang_lienquan = "VÀNG II";
        break;
        case 11:
            $xephang_lienquan = "VÀNG I";
        break;
        case 12:
            $xephang_lienquan = "BẠCH KIM V";
        break;
        case 13:
            $xephang_lienquan = "BẠCH KIM IV";
        break;
        case 14:
            $xephang_lienquan = "BẠCH KIM III";
        break;
        case 15:
            $xephang_lienquan = "BẠCH KIM II";
        break;
        case 16:
            $xephang_lienquan = "BẠCH KIM I";
        break;
        case 17:
            $xephang_lienquan = "KIM CƯƠNG V";
        break;
        case 18:
            $xephang_lienquan = "KIM CƯƠNG IV";
        break;
        case 19:
            $xephang_lienquan = "KIM CƯƠNG III";
        break;
        case 20:
            $xephang_lienquan = "KIM CƯƠNG II";
        break;
        case 21:
            $xephang_lienquan = "KIM CƯƠNG I";
        break;
        case 22:
            $xephang_lienquan = "TINH ANH";
        break;
        case 23:            
            $xephang_lienquan = "CAO THỦ";
        break;
        case 24:
            $xephang_lienquan = "THÁCH ĐẤU";
        break;
        }
    return $xephang_lienquan;
    }

// Khung xếp hạng liên quân
    function khung_xephanglienquan($khung_lienquan){
        switch($khung_lienquan){
        case 1:
            $khung_xephang_lienquan = "Chưa khung";
        break;
        case 2:        
            $khung_xephang_lienquan = "ĐỒNG III";
        break;
        case 3:
            $khung_xephang_lienquan = "ĐỒNG II";
        break;
        case 4:
            $khung_xephang_lienquan = "ĐỒNG I";
        break;
        case 5:
            $khung_xephang_lienquan = "BẠC III";
        break;
        case 6:
            $khung_xephang_lienquan = "BẠC II";
        break;
        case 7:
            $khung_xephang_lienquan = "BẠC I";
        break;
        case 8:
            $khung_xephang_lienquan = "VÀNG IV";
        break;
        case 9:
            $khung_xephang_lienquan = "VÀNG III";
        break;
        case 10:
            $khung_xephang_lienquan = "VÀNG II";
        break;
        case 11:
            $khung_xephang_lienquan = "VÀNG I";
        break;
        case 12:
            $khung_xephang_lienquan = "BẠCH KIM V";
        break;
        case 13:
            $khung_xephang_lienquan = "BẠCH KIM IV";
        break;
        case 14:
            $khung_xephang_lienquan = "BẠCH KIM III";
        break;
        case 15:
            $khung_xephang_lienquan = "BẠCH KIM II";
        break;
        case 16:
            $khung_xephang_lienquan = "BẠCH KIM I";
        break;
        case 17:
            $khung_xephang_lienquan = "KIM CƯƠNG V";
        break;
        case 18:
            $khung_xephang_lienquan = "KIM CƯƠNG IV";
        break;
        case 19:
            $khung_xephang_lienquan = "KIM CƯƠNG III";
        break;
        case 20:
            $khung_xephang_lienquan = "KIM CƯƠNG II";
        break;
        case 21:
            $khung_xephang_lienquan = "KIM CƯƠNG I";
        break;
        case 22:
            $khung_xephang_lienquan = "KIM CƯƠNG I";
        break;
        case 23:            
            $khung_xephang_lienquan = "CAO THỦ";
        break;
        case 24:
            $khung_xephang_lienquan = "THÁCH ĐẤU";
        break;
        }
    return $khung_xephang_lienquan;
    }

// function xếp hạng liên minh
    function xephanglienminh($lienminh){
        switch($lienminh){
        case 1:
            $xephang_lienminh = "Chưa có";
        break;
        case 2:        
            $xephang_lienminh = "SẮT IV";
        break;
        case 3:
            $xephang_lienminh = "SẮT III";
        break;
        case 4:
            $xephang_lienminh = "SẮT II";
        break;
        case 5:
            $xephang_lienminh = "SẮT I";
        break;
        case 6:
            $xephang_lienminh = "ĐỒNG IV";
        break;
        case 7:
            $xephang_lienminh = "ĐỒNG III";
        break;
        case 8:
            $xephang_lienminh = "ĐỒNG II";
        break;            
        case 9:
            $xephang_lienminh = "ĐỒNG I";
        break;
        case 10:        
            $xephang_lienminh = "BẠC IV";
        break;
        case 11:
            $xephang_lienminh = "BẠC III";
        break;
        case 12:
            $xephang_lienminh = "BẠC II";
        break;
        case 13:
            $xephang_lienminh = "BẠC I";
        break;
        case 14:
            $xephang_lienminh = "VÀNG IV";
        break;
        case 15:
            $xephang_lienminh = "VÀNG III";
        break;
        case 16:
            $xephang_lienminh = "VÀNG II";
        break;
        case 17:
            $xephang_lienminh = "VÀNG I";
        break;
        case 18:
            $xephang_lienminh = "BẠCH KIM IV";
        break;
        case 19:
            $xephang_lienminh = "BẠCH KIM III";
        break;
        case 20:
            $xephang_lienminh = "BẠCH KIM II";
        break;
        case 21:
            $xephang_lienminh = "BẠCH KIM I";
        break;
        case 22:
            $xephang_lienminh = "KIM CƯƠNG IV";
        break;
        case 23:
            $xephang_lienminh = "KIM CƯƠNG III";
        break;
        case 24:
            $xephang_lienminh = "KIM CƯƠNG II";
        break;
        case 25:
            $xephang_lienminh = "KIM CƯƠNG I";
        break;
        case 26:
            $xephang_lienminh = "CAO THỦ";
        break;
        case 27:
            $xephang_lienminh = "ĐẠI CAO THỦ";
        break;
        case 28:
            $xephang_lienminh = "THÁCH ĐẤU";
        break;
        }
    return $xephang_lienminh;
    }

// Khung xếp hạng liên minh
    function khung_xephanglienminh($khung_lienminh){
        switch($khung_lienminh){
        case 1:
            $khung_xephang_lienminh = "Chưa khung";
        break;
        case 2:        
            $khung_xephang_lienminh = "SẮT";
        break;
        case 3:
            $khung_xephang_lienminh = "ĐỒNG";
        break;
        case 4:
            $khung_xephang_lienminh = "BẠC";
        break;
        case 5:
            $khung_xephang_lienminh = "VÀNG";
        break;
        case 6:
            $khung_xephang_lienminh = "BẠCH KIM";
        break;
        case 7:
            $khung_xephang_lienminh = "KIM CƯƠNG";
        break;
        case 8:
            $khung_xephang_lienminh = "CAO THỦ";
        break;
        case 9:
            $khung_xephang_lienminh = "ĐẠI CAO THỦ";
        break;
        }
    return $khung_xephang_lienminh;
    }

// Hành tinh ngọc rồng
    function hanhtinh_ngocrong($nro_hanhtinh){
        switch($nro_hanhtinh){
        case 1:
            $hanhtinh_ngocrong = "Xayda";
        break;
        case 2:        
            $hanhtinh_ngocrong = "Namek";
        break;
        case 3:
            $hanhtinh_ngocrong = "Trái đất";
        break;
        }
    return $hanhtinh_ngocrong;
    }

// Máy chủ ngọc rồng
    function maychu_ngocrong($nro_maychu){
        switch($nro_maychu){
        case 1:
            $dulieu_maychu_ngocrong = "Vũ trụ 1 sao";
        break;
        case 2:        
            $dulieu_maychu_ngocrong = "Vũ trụ 2 sao";
        break;
        case 3:
            $dulieu_maychu_ngocrong = "Vũ trụ 3 sao";
        break;
        case 4:
            $dulieu_maychu_ngocrong = "Vũ trụ 4 sao";
        break;
        case 5:
            $dulieu_maychu_ngocrong = "Vũ trụ 5 sao";
        break;
        case 6:
            $dulieu_maychu_ngocrong = "Vũ trụ 6 sao";
        break;
        case 7:
            $dulieu_maychu_ngocrong = "Vũ trụ 7 sao";
        break;
        }
    return $dulieu_maychu_ngocrong;
    }

// Đăng ký ngọc rồng
    function dangky_ngocrong($nro_dangky){
        switch($nro_dangky){
        case 1:
            $dangky_ngocrong = "Đăng ký ảo";
        break;
        case 2:        
            $dangky_ngocrong = "Đầy đủ gmail";
        break;
        }
    return $dangky_ngocrong;
    }

// Bông tai ngọc rồng
    function bongtai_ngocrong($nro_bongtai){
        switch($nro_bongtai){
        case 1:
            $bongtai_ngocrong = "Có";
        break;
        case 2:        
            $bongtai_ngocrong = "Không";
        break;
        }
    return $bongtai_ngocrong;
    }
    
// Sơ sinh có đệ
    function sosinhcode_ngocrong($nro_sosinhcode){
        switch($nro_sosinhcode){
        case 1:
            $sosinhcode_ngocrong = "Có";
        break;
        case 2:        
            $sosinhcode_ngocrong = "Không";
        break;
        }
    return $sosinhcode_ngocrong;
    }
    
// Kiểm tra liên kết hay chưa
    function kiemtra($kiemtra_lienket){
        switch($kiemtra_lienket){
        case dalienket:
            $dulieu_kiemtra_lienket = "Đã liên kết";
        break;
        case chualienket:        
            $dulieu_kiemtra_lienket = "Chưa liên kết";
        break;
        }
    return $dulieu_kiemtra_lienket;
    }
    
// Function phân trang            
    class phantrang{
    protected $_config = array(
        'current_page'  => 1,
        'total_record'  => 1,
        'total_page'    => 1,
        'limit'         => 9,
        'start'         => 9,
        'link_full'     => '',
        'link_first'    => '',
        'range'         => 5,
        'min'           => 0,
        'max'           => 0
    );
        function themvao($config = array()){
        foreach ($config as $key => $val) {
            if (isset($this->_config[$key])){
                $this->_config[$key] = $val;
            }
        }
        if ($this->_config['limit'] < 0) {
            $this->_config['limit'] = 0;
        }
        $this->_config['total_page'] = ceil($this->_config['total_record'] / $this->_config['limit']);
        if (!$this->_config['total_page']) {
            $this->_config['total_page'] = 1;
        }
        if ($this->_config['current_page'] < 1) {
            $this->_config['current_page'] = 1;
        }
         
        if ($this->_config['current_page'] > $this->_config['total_page']) {
            $this->_config['current_page'] = $this->_config['total_page'];
        }
        $this->_config['start'] = ($this->_config['current_page'] - 1) * $this->_config['limit'];
        $middle = ceil($this->_config['range'] / 2);
        if ($this->_config['total_page'] < $this->_config['range']) {
            $this->_config['min'] = 1;
            $this->_config['max'] = $this->_config['total_page'];
        } else {
            $this->_config['min'] = $this->_config['current_page'] - $middle + 1;
            $this->_config['max'] = $this->_config['current_page'] + $middle - 1;
            if ($this->_config['min'] < 1) {
                $this->_config['min'] = 1;
                $this->_config['max'] = $this->_config['range'];
            } else if ($this->_config['max'] > $this->_config['total_page']) {
                $this->_config['max'] = $this->_config['total_page'];
                $this->_config['min'] = $this->_config['total_page'] - $this->_config['range'] + 1;
            }
        }
    }
        private function __link($page){
        if ($page <= 1 && $this->_config['link_first']) {
            return $this->_config['link_first'];
        }
        return str_replace('{page}', $page, $this->_config['link_full']);
    }
    
        function phantrang_thanhvien(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="page_account"> ';
            if ($this->_config['current_page'] > 1) {
                $p .= ' <p onclick="page = 1;danhsach_thanhvien()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></p> ';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= ' <p onclick="page='.$i.';danhsach_thanhvien()" class="active">'.$i.'</p> ';
                } else {
                    $p .= ' <p onclick="page='.$i.';danhsach_thanhvien()">'.$i.'</p> ';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= ' <p onclick="page='.$this->_config['total_page'].';danhsach_thanhvien()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p> ';
            }
            $p .= '</div>';
        }
        return $p;
    }
        function phantrang_taikhoanlmht(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="page_account"> ';
            if ($this->_config['current_page'] > 1) {
                $p .= ' <p onclick="page = 1;danhsach_lmht()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></p> ';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= ' <p onclick="page='.$i.';danhsach_lmht()" class="active">'.$i.'</p> ';
                } else {
                    $p .= ' <p onclick="page='.$i.';danhsach_lmht()">'.$i.'</p> ';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= ' <p onclick="page='.$this->_config['total_page'].';danhsach_lmht()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p> ';
            }
            $p .= '</div>';
        }
        return $p;
    }

        function phantrang_taikhoanlienquan(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="page_account"> ';
            if ($this->_config['current_page'] > 1) {
                $p .= ' <p onclick="page1 = 1;danhsach_lienquan()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></p> ';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= ' <p onclick="page1='.$i.';danhsach_lienquan()" class="active">'.$i.'</p> ';
                } else {
                    $p .= ' <p onclick="page1='.$i.';danhsach_lienquan()">'.$i.'</p> ';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= ' <p onclick="page1='.$this->_config['total_page'].';danhsach_lienquan()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p> ';
            }
            $p .= '</div>';
        }
        return $p;
    }      
    
        function phantrang_taikhoanngocrong(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="page_account"> ';
            if ($this->_config['current_page'] > 1) {
                $p .= ' <p onclick="page2 = 1;danhsach_ngocrong()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></p> ';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= ' <p onclick="page2='.$i.';danhsach_ngocrong()" class="active">'.$i.'</p> ';
                } else {
                    $p .= ' <p onclick="page2='.$i.';danhsach_ngocrong()">'.$i.'</p> ';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= ' <p onclick="page2='.$this->_config['total_page'].';danhsach_ngocrong()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p> ';
            }
            $p .= '</div>';
        }
        return $p;
    }
    
        function phantrang_taikhoanrandom(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="page_account"> ';
            if ($this->_config['current_page'] > 1) {
                $p .= ' <p onclick="page3 = 1;danhsach_random()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></p> ';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= ' <p onclick="page3='.$i.';danhsach_random()" class="active">'.$i.'</p> ';
                } else {
                    $p .= ' <p onclick="page3='.$i.';danhsach_random()">'.$i.'</p> ';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= ' <p onclick="page3='.$this->_config['total_page'].';danhsach_random()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p> ';
            }
            $p .= '</div>';
        }
        return $p;
    }

        function phantrang_thongtinATM(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="page_account"> ';
            if ($this->_config['current_page'] > 1) {
                $p .= ' <p onclick="page = 1;danhsach_atm()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></p> ';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= ' <p onclick="page='.$i.';danhsach_atm()" class="active">'.$i.'</p> ';
                } else {
                    $p .= ' <p onclick="page='.$i.';danhsach_atm()">'.$i.'</p> ';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= ' <p onclick="page='.$this->_config['total_page'].';danhsach_atm()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p> ';
            }
            $p .= '</div>';
        }
        return $p;
    }    
    
        function phantrang_lienquan(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="pagination-container justify-content-center"><nav class="pagination pagination-info" aria-label="pagination"><ul class="pagination-info pagination">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="page-item"><a aria-label="Previous" onclick="page = 1;danhsach_lienquan()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-left"></i></span></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="active page-item"><a onclick="page='.$i.';danhsach_lienquan()" class="page-link">'.$i.'</a></li>';
                } else {
                    $p .= '<li class="page-item"><a onclick="page='.$i.';danhsach_lienquan()" class="page-link" style="color:#2c2c2c;">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li class="page-item"><a aria-label="Next" onclick="page='.$this->_config['total_page'].';danhsach_lienquan()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-right"></i></span></a></li>';
            }
            $p .= '</ul></nav></div>';
        }
        return $p;
    }   
    
        function phantrang_lienminh(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="pagination-container justify-content-center"><nav class="pagination pagination-info" aria-label="pagination"><ul class="pagination-info pagination">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="page-item"><a aria-label="Previous" onclick="page = 1;danhsach_lienminh()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-left"></i></span></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="active page-item"><a onclick="page='.$i.';danhsach_lienminh()" class="page-link">'.$i.'</a></li>';
                } else {
                    $p .= '<li class="page-item"><a onclick="page='.$i.';danhsach_lienminh()" class="page-link" style="color:#2c2c2c;">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li class="page-item"><a aria-label="Next" onclick="page='.$this->_config['total_page'].';danhsach_lienminh()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-right"></i></span></a></li>';
            }
            $p .= '</ul></nav></div>';
        }
        return $p;
    }  

        function phantrang_ngocrong(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="pagination-container justify-content-center"><nav class="pagination pagination-info" aria-label="pagination"><ul class="pagination-info pagination">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="page-item"><a aria-label="Previous" onclick="page = 1;danhsach_ngocrong()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-left"></i></span></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="active page-item"><a onclick="page='.$i.';danhsach_ngocrong()" class="page-link">'.$i.'</a></li>';
                } else {
                    $p .= '<li class="page-item"><a onclick="page='.$i.';danhsach_ngocrong()" class="page-link" style="color:#2c2c2c;">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li class="page-item"><a aria-label="Next" onclick="page='.$this->_config['total_page'].';danhsach_ngocrong()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-right"></i></span></a></li>';
            }
            $p .= '</ul></nav></div>';
        }
        return $p;
    } 
    
        function phantrang_random(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="pagination-container justify-content-center"><nav class="pagination pagination-info" aria-label="pagination"><ul class="pagination-info pagination">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="page-item"><a aria-label="Previous" onclick="page = 1;danhsach_random()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-left"></i></span></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="active page-item"><a onclick="page='.$i.';danhsach_random()" class="page-link">'.$i.'</a></li>';
                } else {
                    $p .= '<li class="page-item"><a onclick="page='.$i.';danhsach_random()" class="page-link" style="color:#2c2c2c;">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li class="page-item"><a aria-label="Next" onclick="page='.$this->_config['total_page'].';danhsach_random()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-right"></i></span></a></li>';
            }
            $p .= '</ul></nav></div>';
        }
        return $p;
    } 
    
        function phantrang_giohang(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="pagination-container justify-content-center"><nav class="pagination pagination-info" aria-label="pagination"><ul class="pagination-info pagination">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="page-item"><a aria-label="Previous" onclick="page = 1;danhsach_giohang()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-left"></i></span></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="active page-item"><a onclick="page='.$i.';danhsach_giohang()" class="page-link">'.$i.'</a></li>';
                } else {
                    $p .= '<li class="page-item"><a onclick="page='.$i.';danhsach_giohang()" class="page-link" style="color:#2c2c2c;">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li class="page-item"><a aria-label="Next" onclick="page='.$this->_config['total_page'].';danhsach_giohang()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-right"></i></span></a></li>';
            }
            $p .= '</ul></nav></div>';
        }
        return $p;
    }
    
        function phantrang_lichsumua(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="pagination-container justify-content-center"><nav class="pagination pagination-info" aria-label="pagination"><ul class="pagination-info pagination">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="page-item"><a aria-label="Previous" onclick="page = 1;danhsach_lichsumua()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-left"></i></span></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="active page-item"><a onclick="page='.$i.';danhsach_lichsumua()" class="page-link">'.$i.'</a></li>';
                } else {
                    $p .= '<li class="page-item"><a onclick="page='.$i.';danhsach_lichsumua()" class="page-link" style="color:#2c2c2c;">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li class="page-item"><a aria-label="Next" onclick="page='.$this->_config['total_page'].';danhsach_lichsumua()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-right"></i></span></a></li>';
            }
            $p .= '</ul></nav></div>';
        }
        return $p;
    }    
    
        function phantrang_lichsunap(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="pagination-container justify-content-center"><nav class="pagination pagination-info" aria-label="pagination"><ul class="pagination-info pagination">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="page-item"><a aria-label="Previous" onclick="page1 = 1;danhsach_lichsunap()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-left"></i></span></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="active page-item"><a onclick="page1='.$i.';danhsach_lichsunap()" class="page-link">'.$i.'</a></li>';
                } else {
                    $p .= '<li class="page-item"><a onclick="page1='.$i.';danhsach_lichsunap()" class="page-link" style="color:#2c2c2c;">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li class="page-item"><a aria-label="Next" onclick="page1='.$this->_config['total_page'].';danhsach_lichsunap()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-right"></i></span></a></li>';
            }
            $p .= '</ul></nav></div>';
        }
        return $p;
    }
    
        function phantrang_lichsuchuyentien(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="pagination-container justify-content-center"><nav class="pagination pagination-info" aria-label="pagination"><ul class="pagination-info pagination">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="page-item"><a aria-label="Previous" onclick="page2 = 1;danhsach_lichsuchuyentien()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-left"></i></span></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="active page-item"><a onclick="page2='.$i.';danhsach_lichsuchuyentien()" class="page-link">'.$i.'</a></li>';
                } else {
                    $p .= '<li class="page-item"><a onclick="page2='.$i.';danhsach_lichsuchuyentien()" class="page-link" style="color:#2c2c2c;">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li class="page-item"><a aria-label="Next" onclick="page2='.$this->_config['total_page'].';danhsach_lichsuchuyentien()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-right"></i></span></a></li>';
            }
            $p .= '</ul></nav></div>';
        }
        return $p;
    }   
    
        function phantrang_lichsumuathe(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="pagination-container justify-content-center"><nav class="pagination pagination-info" aria-label="pagination"><ul class="pagination-info pagination">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="page-item"><a aria-label="Previous" onclick="page3 = 1;danhsach_lichsumuathe()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-left"></i></span></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="active page-item"><a onclick="page3='.$i.';danhsach_lichsumuathe()" class="page-link">'.$i.'</a></li>';
                } else {
                    $p .= '<li class="page-item"><a onclick="page3='.$i.';danhsach_lichsumuathe()" class="page-link" style="color:#2c2c2c;">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li class="page-item"><a aria-label="Next" onclick="page3='.$this->_config['total_page'].';danhsach_lichsumuathe()" class="page-link" style="color:#2c2c2c;"><span aria-hidden="true"><i aria-hidden="true" class="fa fa-angle-double-right"></i></span></a></li>';
            }
            $p .= '</ul></nav></div>';
        }
        return $p;
    } 
    
        function phantrang_napthe(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="page_account"> ';
            if ($this->_config['current_page'] > 1) {
                $p .= ' <p onclick="page = 1;danhsach_napthe()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></p> ';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= ' <p onclick="page='.$i.';danhsach_napthe()" class="active">'.$i.'</p> ';
                } else {
                    $p .= ' <p onclick="page='.$i.';danhsach_napthe()">'.$i.'</p> ';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= ' <p onclick="page='.$this->_config['total_page'].';danhsach_napthe()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p> ';
            }
            $p .= '</div>';
        }
        return $p;
    }  
    
        function phantrang_muathe(){   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="page_account"> ';
            if ($this->_config['current_page'] > 1) {
                $p .= ' <p onclick="page1 = 1;danhsach_muathe()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></p> ';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= ' <p onclick="page1='.$i.';danhsach_muathe()" class="active">'.$i.'</p> ';
                } else {
                    $p .= ' <p onclick="page1='.$i.';danhsach_muathe()">'.$i.'</p> ';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= ' <p onclick="page1='.$this->_config['total_page'].';danhsach_muathe()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p> ';
            }
            $p .= '</div>';
        }
        return $p;
    }     
    
        function ketthuc_phantrang() {
    	return $this->_config;
    }
}
?>