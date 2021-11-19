<?php

if (!isset ($_GET["nazivDodavanje"])){
echo "Parametar Naziv nije prosleđen!";
} else {
$naziv=$_GET["nazivDodavanje"];
include "konekcijaProizvodi.php";

$sql="SELECT * FROM proizvod WHERE naziv='".$naziv."'";
$rezultat = $mysqli->query($sql);
if ($rezultat->num_rows!=0){
echo "0";
} else {
echo "1";
}
$mysqli->close();
}



?>
