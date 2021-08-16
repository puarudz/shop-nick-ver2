<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$data_champ = '';
$list_champ = $db->fetch_assoc("SELECT * FROM `lq_champion` ORDER BY `name` ASC",0);
    foreach ($list_champ as $item) { 
        $data_champ .= '"'.$item['name'].'",';
    }
    $data_champ = "[".substr($data_champ, 0, -1)."]";
echo $data_champ;
?>