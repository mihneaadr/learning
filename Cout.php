<?php
$nume[0]  = $_POST['nume1'];
$notam[0] = $_POST['notam1'];
$notal[0] = $_POST['notal1'];
$notaf[0] = $_POST['notaf1'];

$nume[1]  = $_POST['nume2'];
$notam[1] = $_POST['notam2'];
$notal[1] = $_POST['notal2'];
$notaf[1] = $_POST['notaf2'];

$nume[2]  = $_POST['nume3'];
$notam[2] = $_POST['notam3'];
$notal[2] = $_POST['notal3'];
$notaf[2] = $_POST['notaf3'];
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, 'mihneatest');



echo "<br/><br/><br/><table border = 1 align = 'center'>";
	echo "<tr>";
	echo "<th>Nume</th>";
	echo "<th>Nota Matematica</th>";
	echo "<th>Nota Romana</th>";
	echo "<th>Nota Fizica</th>";
	echo "<th>Medie Generala</th>";
	for ($j=0; $j <3 ; $j++) { 
		echo "<tr align='center'>";
	    
	    	echo '<td >'.$nume[$j];
	    	echo "</td>";

	    	echo "<td>".$notam[$j];
	    	echo "</td>";

	    	echo "<td>".$notal[$j];
	    	echo "</td>";
		
	    	echo "<td>".$notaf[$j];
	    	echo "</td>";
		
	    	echo "<td>".round(($notam[$j]+$notal[$j]+$notaf[$j])/3, 2);
	    	echo "</td>";

	 	echo "</tr>";
	 	$sSQL = "INSERT INTO 'medii' (Nume, Nota_Matematica, Nota_Romana, Nota_Fizica) VALUES ('$nume[$j]', '$notam[$j]', '$notal[$j]', '$notaf[$j]')";
	 	mysqli_query($con, $sSQL);
	 	echo $sSQL."<br/>";
	}

?>