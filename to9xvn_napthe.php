<?php
// Đạo nhái từ nhiều nguồn bởi to9xvn
// trang web: https://dailysieure.com
// facebook: https://dailysieure.com/to9xvn

include 'quantri_hethong/xuly_ketnoi.php';
if($dulieu_taikhoan['id'] < 1){
 echo json_encode(array('status' => "error",'title' => "Lỗi", 'msg' =>$test."Bạn chưa đăng nhập!"));exit();   
}
/////////////////////////
//  Anti Bug hack by to9xvn //
// Xoá đi hoặc sửa nếu bị bug thì mình k chịu trách nhiệm //
///////////////////////// GET
 foreach($_GET as $var => $value) {
      if (preg_match('/[^\da-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéếêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ.\/\:\-\@\|\(\)\_\s]+/', $value)) {
  $_GET["$var"]= '';
}else{
    $_GET["$var"]= addslashes(mysqli_real_escape_string($ketnoi, $value));
}
}

// POST
foreach($_POST as $var => $value) {
 if (preg_match('/[^\da-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ.\/\:\-\@\|\(\)\_\s]+/', $value)) {
  $_POST["$var"]= '';
}else{
    $_POST["$var"] = addslashes(mysqli_real_escape_string($ketnoi, $value));
  
}
} 
$idtk = $dulieu_taikhoan['id'];
 $telco = $_POST['loaithe'];
        $amount = $_POST['menhgia'];
        $serial = $_POST['serial'];
        $code = $_POST['mathe'];
        
		$command = 'charging';  // Nap the

        require_once('to9xvn_tsr.php'); 

        $request_id = rand(100000000, 999999999); /// Order id của bạn, ví dụ này lấy ngẫu nhiên để test

            $dataPost = array();
			$dataPost['partner_id'] = $partner_id;
			$dataPost['request_id'] = $request_id;
			$dataPost['telco'] = $telco;
			$dataPost['amount'] = $amount;
			$dataPost['serial'] = $serial;
			$dataPost['code'] = $code;
			$dataPost['command'] = $command;
			$sign = creatSign($partner_key, $dataPost);
			$dataPost['sign'] = $sign;
			
            $data = http_build_query($dataPost);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            curl_setopt($ch, CURLOPT_REFERER, $actual_link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);

            $obj = json_decode($result);

            if ($obj->status == 99) {
                //Gửi thẻ thành công, đợi duyệt.
                //echo '<pre>';
                //print_r($obj);
                
                
              //  	 $db->query("INSERT INTO to9xvn_napthenhanh (uid,sotien,seri,code,loaithe,tinhtrang,noidung,time) VALUES 
//	('".$idtk."','".$amount."','".$serial."','".$code."','".$telco."','0','".$sign." nạp thẻ ".$tranid." ','".time()."') ");
                
       	mysqli_query($ketnoi, "INSERT INTO to9xvn_napthenhanh SET 
	`uid` = '".$idtk."',
	`sotien` = '".$amount."',
	`seri` = '".$serial."',
	`code` = '".$code."',
	`loaithe` = '".$telco."',
	`tinhtrang` = '0',
	`noidung` = '".$sign." nạp thẻ ".$tranid." ',
	`time` = '".time()."'");          
                
              //  echo '</pre>';
            } elseif($obj->status == 1) {
                //Thành công
             //   echo '<pre>';
                // print_r($obj);
                echo '</pre>';
            }elseif($obj->status == 2) {
                //Thành công nhưng sai mệnh giá
             //   echo '<pre>';
              //  print_r($obj);
                echo '</pre>';
            }elseif($obj->status == 3) {
                //Thẻ lỗi
            //    echo '<pre>';
              //  print_r($obj);
                echo '</pre>';
            }elseif($obj->status == 4) {
                //Bảo trì
            //    echo '<pre>';
              //  print_r($obj);
          //      echo '</pre>';
			}else{
				//Lỗi
             //   echo '<pre>';
              //  print_r($obj);
            //    echo '</pre>';
			}

        

  
$tbcmmm = $obj->message;

echo json_encode(array('status' => "success",'title' => "Thông báo", 'msg' =>$tbcmmm));exit();










//echo json_encode(array('status' => "error",'title' => "Lỗi", 'msg' =>$test."Thông tin đăng nhập không được để trống!"));exit();