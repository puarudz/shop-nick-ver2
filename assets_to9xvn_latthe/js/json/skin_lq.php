<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$data_skin = '';   
$list_skin = $db->fetch_assoc("SELECT * FROM lq_skin ORDER BY name DESC",0);
    foreach ($list_skin as $item) { 
        $data_skin .= '"'.$item['name'].'",';
    }
    $data_skin = "[".substr($data_skin, 0, -1)."]";
echo $data_skin;
?>