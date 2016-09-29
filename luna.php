<?php
echo "<html> \n<head> <title></title>
	  	<script>
	  		function changecol(index){
				var x = document.getElementById(index);
				if (x.style.color == 'black' || x.style.color == '') {					<!-- function to change color-->
					x.style.color = 'red';
					binar[index] = 1;
				} else {
					x.style.color = 'black';
					binar[index] = 0;
				}
			}
	  		

	  		var binar = [];
	  			for (j=0; j <32 ; j++) {					<!-- initializing the array in which we will save whether or not the day has been marked-->
	  				binar[j]=0;
	  			}
	  	
	  		
	  		function scrie(){
	  			document.getElementById('cruceamatii').value = binar;		<!--writing the array in the hidden form-->
	  		}
	  	</script>
	  </head>";

if (!$_POST && !$_GET) {											//on first launch, asks you to pick a month
	echo "\nSelectati luna";
	echo "\n<form action = 'luna.php' method = 'post'>
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
		</form>";													//after picking a month, relaunches the page, with the month in post
} else {
	

	if (!$_POST && isset($_GET['luna'])) {
		$m = $_GET['luna'];
	} elseif (!$_GET && isset($_POST['luna'])) {						//But it can also recieve the month as a get variable
		$m = $_POST['luna'];
	}
	
	
	$d = strtotime("1st $m");				//getting the unix timestamp of the first day of the month
	$day = date("l", $d);					//transforming it into something readable
	
	$firstday = array('Monday'    => '1',
					  'Tuesday'   => '2', 
					  'Wednesday' => '3',
					  'Thursday'  => '4', 	//Attributing numeral values to the weekday, for the "for" loop
					  'Friday'    => '5', 
					  'Saturday'  => '6', 
					  'Sunday'    => '7' );
	

	$month = array('January'   => '1', 
				   'February'  => '2', 
				   'March'     => '3', 
				   'April'     => '4', 
				   'May'       => '5', 
				   'June'      => '6', 		//The same with the months (for cal_days_in_month)
				   'July'      => '7', 
				   'August'    => '8', 
				   'September' => '9', 
				   'October'   => '10', 
				   'November'  => '11', 
				   'December'  => '12' );
	
	
	if (isset($_GET['zile'])) {	
		$zilem = $_GET['zile'];
		//echo $zilem; (testing purposes)
		$zilemarcate = explode(',', $zilem);   //Getting the marked days from get
	}
	

	echo "\n<table border = 1> 
			<tr> 
				<th align = center>&nbsp;&nbsp;Luni&nbsp;&nbsp;</th> 
				<th align = center>&nbsp;&nbsp;Marti&nbsp;</th> 
				<th align = center>Miercuri</th> 
				<th align = center>&nbsp;&nbsp;&nbsp;Joi&nbsp;&nbsp;</th> 
				<th align = center>&nbsp;Vineri&nbsp;</th> 
				<th align = center>&nbsp;Sambata</th> 
				<th align = center>Duminica</th> 
			</tr>";
		echo "\n<tr>";
			for ($i=1; $i < cal_days_in_month(CAL_GREGORIAN, $month[$m], 2016) + $firstday[$day]; $i++) {
				
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
		echo "\n</tr>";
	echo "\n</table>";
	if (isset($_GET['zile'])) {
		for ($p=0; $p < count($zilemarcate) ; $p++) { 					//should call the function changecol if there are some days in GET that need to be marked. (Except i doesn't)
			echo "<script>changecol(".$zilemarcate[$p].");</script>";
		}
	}
	echo "\n<form action = 'aci.php' onsubmit = 'scrie()' method = 'post'>
		  <input type = 'hidden' name = 'alfa' id = 'cruceamatii'>
		  <input type = 'hidden' name = 'beta' value = $m>
		  <input type = 'submit'>
		  </form>";
	//echo "\n<button onclick = 'alert(binar)'>Click me!</button>";
}
echo "<body></body></html>";
?>