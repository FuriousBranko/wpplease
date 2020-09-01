<?php
$myArr = array("John", "Mary", "Peter", "Sally");

$myJSON = json_encode($myArr);

var_dump($myJSON);

$test = implode(" ", json_decode($myJSON));

var_dump($test);
echo "hi";

?>