<?php
$m = $_GET['m'];
$d = strtotime("1st $m");				//getting the unix timestamp of the first day of the month
$day = date("l", $d);					//transforming it into something readable
$firstday = array('Monday'    => '1',
				  'Tuesday'   => '2', 
				  'Wednesday' => '3',
				  'Thursday'  => '4', 	//Attributing numeral values to the weekday, for the "for" loop
				  'Friday'    => '5', 
				  'Saturday'  => '6', 
				  'Sunday'    => '7' );

echo "<tr> 
		<th align = center>&nbsp;&nbsp;Luni&nbsp;&nbsp;</th> 
		<th align = center>&nbsp;&nbsp;Marti&nbsp;</th> 
		<th align = center>Miercuri</th> 
		<th align = center>&nbsp;&nbsp;&nbsp;Joi&nbsp;&nbsp;</th> 
		<th align = center>&nbsp;Vineri&nbsp;</th> 
		<th align = center>&nbsp;Sambata</th> 
		<th align = center>Duminica</th> 
	 </tr>";
echo "<tr>";
for ($i=1; $i < cal_days_in_month(CAL_GREGORIAN, $m, 2016) + $firstday[$day]; $i++) {
	if ($i < $firstday[$day]) {
		echo "\n<td>&nbsp;</td>";			//when the first day of the month isn't Monday, creates blank cells untill the first day
	} else {
		$output = $i - $firstday[$day] + 1; 	//Creates the date in itself
		echo "\n<td id = \"".$output."\" onclick = changecol($output)> $output </button> </td>"; //then writes it
	}
	if (($i % 7) == 0) {
				echo "\n</tr> <tr>";		//linebreaks every week
	}
}
echo "</tr>";
//echo "Aici";
?>