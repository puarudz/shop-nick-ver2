<?php
session_start();
require_once 'Facebook/autoload.php';
$fb = new Facebook\Facebook([
'app_id' => '295658765079652',
'app_secret' => 'e8d0f2a6e493b433fc5befd94cc9b032',
'default_graph_version' => 'v2.9',
]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://shopaccc.com/dangnhap_facebook.php', $permissions);
?>
<script type="text/javascript">
window.location.replace("<?=$loginUrl?>");
</script>

