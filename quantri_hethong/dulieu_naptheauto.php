<?php
    require('../quantri_hethong/xuly_ketnoi.php');
	$url = 'https://thesieure.com/chargingws/v2';
	$partner_id = "4676395951";
	$partner_key = "0b33059661caf4cecc93d5062bf16ed6";
	
    function creatSign($partner_key, $params)
    {
        $data = array();
        $data['request_id'] = $params['request_id'];
        $data['code'] = $params['code'];
        $data['partner_id'] = $params['partner_id'];
        $data['serial'] = $params['serial'];
        $data['telco'] = $params['telco'];
        $data['command'] = $params['command'];
        ksort($data);
        $sign = $partner_key;
        foreach ($data as $item) {
            $sign .= $item;
        }
		
		//return $sign;

        return md5($sign);
    }
?>