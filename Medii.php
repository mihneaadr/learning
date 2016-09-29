<?php
$conn   = mysqli_connect('localhost', 'root', '', 'mihneatest');
//$dbselect = mysqli_select_db($conn, 'mihneatest');
if (isset($_POST['nume'])) {
	$nume  = $_POST['nume'];
	$notam = $_POST['notam'];
	$notal = $_POST['notal'];
	$notaf = $_POST['notaf'];
	if ($_GET['init'] == 1) {
		$sql = "UPDATE `medii` SET Nume='$nume',Nota_Matematica='$notam', Nota_Romana='$notal', Nota_Fizica='$notaf', Medie=".round(($notam+$notal+$notaf)/3, 2)." WHERE ID =".$_GET['ID'];
	}
	else {
		$sql = "INSERT INTO `medii` (Nume, Nota_Matematica, Nota_Romana, Nota_Fizica, Medie) VALUES ('$nume', '$notam', '$notal', '$notaf', round(($notam+$notal+$notaf)/3, 2))";
	}
	mysqli_query($conn, $sql);
 }	


//if (mysqli_num_rows($result) > 0) {
  //  while($row = mysqli_fetch_assoc($result)) {
    //    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
if (isset ($_GET['act'])) { 
	$ID = (int)$_GET['ID'];
	if ($_GET['act'] == 'S') {
		if ($ID >= 1) {
			$sql = "DELETE FROM medii WHERE ID=".$ID;
			mysqli_query($conn, $sql);
		}
	}	
}



$sql = "SELECT * FROM medii WHERE 1";
$result = mysqli_query($conn, $sql);

echo "<br/><br/><br/><table border = 1 align = 'center'>";
  echo "<tr>";
  	echo "<th>&nbsp;&nbsp;ID&nbsp;&nbsp;</th>";
    echo "<th>Nume</th>";
    echo "<th>Nota Matematica</th>";
    echo "<th>Nota Romana</th>";
    echo "<th>Nota Fizica</th>";
    echo "<th>Medie Generala</th>";
    echo "<th colspan = '2'>&nbsp;</th>";
    echo "</tr>";
 //echo "<form>";
 while($row = mysqli_fetch_assoc($result)) { 
  
   echo "<tr align='center'>";
    if (isset ($_GET['act']) and $_GET['act'] == 'M' and (int)$_GET['ID'] == $row['ID'] ) {
    	echo "<form action = 'medii.php?init=1&ID=".$ID."' method = 'post'> 
		<tr> 
			<td>&nbsp;</td>
			<td> <input type = 'text' name = 'nume' value = '".$row['Nume']."'> </td>
			<td> <input type = 'text' name = 'notam' value = '".$row['Nota_Matematica']."'>  </td>
			<td> <input type = 'text' name = 'notal' value = '".$row['Nota_Romana']."'>  </td>
			<td> <input type = 'text' name = 'notaf' value = '".$row['Nota_Fizica']."'>  </td>
			<td> &nbsp; </td>
			<td colspan = '2' align = 'center'> <input type = 'submit' value = 'Modifica'> </td>
		</tr>
		</form>";

    }
    else {
    	echo '<td>'.$row['ID'];
    	echo '</td>';
	
    	echo '<td >'.$row['Nume'];
    	echo "</td>";
	
    	echo "<td>".$row['Nota_Matematica'];
    	echo "</td>";
	
    	echo "<td>".$row['Nota_Romana'];
    	echo "</td>";
	
    	echo "<td>".$row['Nota_Fizica'];
    	echo "</td>";
	
    	echo "<td>".round(($row['Nota_Matematica']+$row['Nota_Romana']+$row['Nota_Fizica'])/3, 2);
    	echo "</td>";
//$s = "<td> <a href = 'medie.php?act=M&ID= '>Modifica</a> </td>"
//$s1 = "<td> <a href = 'medie.php?act=M&ID=";
//$s2 = $row['ID'];
//$s3 = " '>Modifica</a> </td>";
//$s = $s1 . $s2 .  $s3;

    echo "<td><form><input type= 'button' value='Modifica' onclick=\"window.location.href='medii.php?act=M&ID=".$row['ID']."'\"></form></td>";
    //<a href = 'medii.php?act=M&ID=".$row['ID']."'>Modifica</a>
    echo "<td><form><input type= 'button' value='Sterge' onclick=\"window.location.href='medii.php?act=S&ID=".$row['ID']."'\"></form></td>";
	}

  //echo "</tr>";

 }
 echo "</form>";
if (!isset($_GET['act']) or $_GET['act']!='M'){
	echo "<form action = 'medii.php?init=0' method = 'post'> 
			<tr> 
				<td>&nbsp;</td>
				<td> <input type = 'text' name = 'nume'> </td>
				<td> <input type = 'text' name = 'notam'>  </td>
				<td> <input type = 'text' name = 'notal'>  </td>
				<td> <input type = 'text' name = 'notaf'>  </td>
				<td> &nbsp; </td>
				<td colspan = '2' align = 'center'> <input type = 'submit' value = 'Adauga'> </td>
			</tr>
		 </form>";
	
	 echo "</table>";
	}


	/*echo "<form action = '' method = 'post'> 
					 Nume: <input type = 'text' name = 'nume'> 
					 Nota mate: <input type = 'text' name = 'notam'> 
					 Nota lit: <input type = 'text' name = 'notal'> 
					 Nota fizica: <input type = 'text' name = 'notaf'>  
					 
					 <input type = 'submit' value = 'Go fuck yourself with a jagged 12-inch long rusty iron dildo'>
				</form>";*/
?>