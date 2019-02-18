<?php
error_reporting(E_PARSE & E_WARNING);
header("Content-Type: application/json; charset=UTF-8");
include "pdo.php";

$db = new DB();
$tbl = 'tablom';
$data = $db->getRows($tbl, array('where'=>array('ilid'=>'9'), 'order_by'=>'id DESC'));

foreach ($data as $v) {
  	foreach ($v as $k1 => $v1) {
  		$v1 = mb_convert_encoding($v1, "UTF-8", "auto");
  		$a[] = "\"".$k1 ."\":\"". $v1 ."\"";
  	}
  	$sr .= "{". implode(',', array_values($a)) ."},";

}
$sr = rtrim($sr, ",");
// json
echo "[".$sr."]";

?>
