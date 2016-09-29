<?php
$month = "January";
$d = strtotime("$month");
$day = date("d-m-y", $d);
echo "$day";
?>