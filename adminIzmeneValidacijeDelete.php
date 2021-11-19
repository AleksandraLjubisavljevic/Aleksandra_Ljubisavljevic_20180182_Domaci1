<?php

if (!isset ($_GET["idBrisanje"])){
echo "Parametar id nije prosleđen!";
} else {
$id=$_GET["idBrisanje"];
include "konekcijaProizvodi.php";

$sql="SELECT * FROM proizvod WHERE id='".$id."'";
$rezultat = $mysqli->query($sql);
if ($rezultat->num_rows!=0){
echo "0";
} else {
echo "1";
}
$mysqli->close();
}



?>
