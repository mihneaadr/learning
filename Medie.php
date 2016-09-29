<?php

/*
$nume = "Cutarescu Ionel";
$mediemate = 9.90;
$medieromana = 9.95;
$mediefizica = 9.87; 
$mediegenerala = ($mediemate+$medieromana+$mediefizica)/3;
*/
$nume = array("Cutarescu Ionel", "Gingirilescu Vasilicel", "Heinrich Himmler");
$notamate = array(9.90, 1.1, 7.5 );
$notaromana = array(9.95, 7, 2.5 );
$notafizica = array(9.87, 9.9, 8 );
$bold = $_GET["b"];
/*
for ($i=0; $i <=2 ; $i++) { 
	$mediegenerala = ($notamate[$i]+$notaromana[$i]+$notafizica[$i])/3;
	if ($i == $bold-1) {
		echo "<b>Media generala a elevului ".$nume[$i]." este ".round ($mediegenerala, 2).".</b><br/>";
	} 
	else {
		echo  "Media generala a elevului ".$nume[$i]." este ".round ($mediegenerala, 2).".<br/>";
	}
}
*/


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

    echo "<td>".$notamate[$j];
    echo "</td>";

    echo "<td>".$notaromana[$j];
    echo "</td>";

    echo "<td>".$notafizica[$j];
    echo "</td>";

    echo "<td>".round(($notamate[$j]+$notaromana[$j]+$notafizica[$j])/3, 2);
    echo "</td>";

  echo "</tr>";

  /*
  echo "<tr>";
    
    echo "<td> celula 3";
    echo "</td>";
    
    echo "<td> celula 3";
    echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
    echo "<td> ce-i aici";
     echo "</td>";
    echo "<td> dar aici";
     echo "</td>";
echo "</table>";*/
 }

?>