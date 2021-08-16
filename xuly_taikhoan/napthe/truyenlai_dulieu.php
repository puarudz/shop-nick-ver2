<?php
	if(isset($_POST)) {
		if(isset($_POST['callback_sign'])) {
			require_once('../../quantri_hethong/dulieu_naptheauto.php');
			$callback_sign = md5($partner_key.$_POST['code'].$_POST['serial']);
			if($_POST['callback_sign'] == $callback_sign) { 
				$getdata['status'] = $_POST['status'];
				$getdata['message'] = $_POST['message'];
				$getdata['request_id'] = $_POST['request_id'];
				$getdata['trans_id'] = $_POST['trans_id'];
				$getdata['declared_value'] = $_POST['declared_value'];
				$getdata['value'] = $_POST['value'];
				$getdata['amount'] = $_POST['amount'];
				$getdata['code'] = $_POST['code'];
				$getdata['serial'] = $_POST['serial'];
				$getdata['telco'] = $_POST['telco'];
				print_r($getdata);
			}		
		}
	}
	
?>