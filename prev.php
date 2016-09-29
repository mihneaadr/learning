<?php
if (!$_POST) {
	echo "Selectati luna";
	echo "<form action = 'prev.php' method = 'post'>
			<select name='luna'>
			<option value=''> &nbsp; ---------
			<option value='January' > &nbsp; Ianuarie
			<option value='February' > &nbsp; Februarie
			<option value='March' > &nbsp; Martie
			<option value='April' > &nbsp; Aprilie
			<option value='May' > &nbsp; Mai
			<option value='June' > &nbsp; Iunie
			<option value='July' > &nbsp; Iulie
			<option value='August' > &nbsp; August
			<option value='September' > &nbsp; Septembrie
			<option value='October' > &nbsp; Octombrie
			<option value='November' > &nbsp; Noiembrie
			<option value='December' > &nbsp; Decembrie
			</select>
			<input type = 'submit'>
		</form>";
}
else {
	$month = $_POST['luna'];
	$d = strtotime("1st $month");
	$day = date("l", $d);
	$firstday = array('Monday' => '1', 'Tuesday' => '2', 'Wednsday' => '3' , 'Thursday' => '4' , 'Friday' => '5' , 'Saturday' => '6' , 'Sunday' => '7' );
	
	$dayofm = date("d-m-y", $d);
	echo "$firstday[$day]"." $dayofm";
}



/*echo "<table>";
for ($i=0; $i < ; $i++) { 
	
}
echo "</table>";*/
?>