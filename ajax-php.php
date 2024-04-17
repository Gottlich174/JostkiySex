<?php
$arr['company'] = $_POST['company'];
$arr['hardware_name'] = $_POST['hardware_name'];
$arr['country'] = $_POST['country'];
$arr = json_encode($arr, JSON_UNESCAPED_UNICODE);
$file = fopen('filter.json', 'w+');
fwrite($file,$arr);
fclose($file);
echo $arr;
?>
