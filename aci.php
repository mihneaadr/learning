<?php
$str = $_POST['alfa'];
$zile = explode("," , $str);
$luna = $_POST['beta'];
echo $luna." ";
$j = 0;
settype($str2, "string");
for ($i=0; $i <32 ; $i++) { 
	if ($zile[$i] == 1) {
		echo "$i ";
		$zile2[$j] = $i;
		$j++;
	}
}
$str2 = implode(',', $zile2);
echo "<form action = 'luna.php' method = 'get'>
		<input type = 'hidden' name = 'luna' value = '$luna'>
	  	<input type = 'hidden' name = 'zile' value = '$str2'>
	  	<input type = 'submit'>
	 ";
?>