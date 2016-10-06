<!DOCTYPE html>
<?php
	$dbserver = "localhost";
	require '/home/mihnea/.php_secure/db_auth.php';
	$dbname = "agenda";
	$conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
	if ($conn -> connect_error) {
		die("Connection failed: " . $conn -> connect_error);
	}
?>
<html>
<head>
	<title>Agenda</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src = "modifications.js"></script>
</head>
<body>
	<table border="1px">
		<tr>
			<th>Data/Timp</th>
			<th>Tema</th>
			<th>Descriere</th>
			<th>Initiator</th>
			<th>Gestionata de</th>
			<th>Stare</th>
		</tr>
		<?php
		$sql = "SELECT * FROM teme ORDER BY Timp DESC";
		$result = $conn -> query($sql);
		while ($row = $result -> fetch_assoc()) {
			echo "
			<tr>
				<td>".$row['Timp']."</td>
				<td>".$row['Tema']."</td>
				<td>".$row['Descriere']."</td>
				<td>".$row['Initiator']."</td>
				<td>".$row['Gestionata_de']."</td>
				<td>".$row['Stare']."</td>
			</tr>";
			$sql2 = "SELECT * FROM actiuni WHERE ID_tema = " . $row['ID'];
			echo "<div class = 'dropdown'>";
			$result2 = $conn -> query($sql2);
			echo "<tr>
					<th>Timp</th>
					<th>Descriere</th>
					<th>Comentarii</th>
					<th>Link Convorbire</th>
				</tr>";
			while ($row2 = $result2 -> fetch_assoc()) {
				echo "
				<tr>
					<td>".$row2['Timp']."</td>
					<td>".$row2['Descriere']."</td>
					<td>".$row2['Comentarii']."</td>
					<td>".$row2['Link_conv']."</td>
				</tr>";
			}
			echo "</div>";
		}
		?>
	</table>
</body>
</html>
