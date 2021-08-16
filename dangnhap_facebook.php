<?php
    session_start();
    require_once('Facebook/autoload.php');
    require_once('quantri_hethong/xuly_ketnoi.php');
    $fb = new Facebook\Facebook([
    'app_id' => '295658765079652',
    'app_secret' => 'e8d0f2a6e493b433fc5befd94cc9b032',
    'default_graph_version' => 'v2.9',
    ]);
    $helper = $fb->getRedirectLoginHelper();
    try {
    $accessToken = $helper->getAccessToken();
    $response = $fb->get('/me?fields=id,name,email', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (! isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
    }
    exit;
}

    $_SESSION['facebook_access_token'] = (string) $accessToken;
    if(!empty($accessToken)){
    $me = $response->getGraphUser();
    $name = $me->getName();
    $email = $me->getEmail();
    $fb_ID = $me->getId();
    $user = strtolower($name);
    $dulieu_facebook = mysqli_fetch_array(mysqli_query($ketnoi, "SELECT * FROM nguoidung WHERE `taikhoan_id`='$fb_ID'"));
    $_SESSION['user_profile'] = array('id'=>$fb_ID,'name'=>$name,'email'=>$email);
    $_SESSION['taikhoan_id'] = $dulieu_facebook['id'];
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

    $kiemtra_taikhoan = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM nguoidung WHERE taikhoan_id = '$fb_ID'"));

    if($kiemtra_taikhoan == 0){
        mysqli_query($ketnoi, "INSERT INTO nguoidung (taikhoan_id,hovaten,email,tien,chucvu,thoigian) VALUES ('$fb_ID','".addslashes($name)."','$email','0','0','$thoigian')");
    }
    header('Location: /');
    }
?>