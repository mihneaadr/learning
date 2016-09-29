<?php
$a=10;
echo $a."<br/>"; 
echo "Hello world!";

$db = @mysql_connect('localhost', 'root', '') or die("nu se poate conecta la mysql");
	mysql_select_db("Mihneatest", $db) or die("nu se poate conecta la baza de date");
	$b = mysql_query("SELECT nume FROM tabel1");
	$c = mysql_result($b, 1); 
	echo $c;

?>
<br/> <b>Hello $a world!</b>