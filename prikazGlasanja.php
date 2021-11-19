
<?php
if (!isset ($_GET["glas"])){
echo "Parametar Glas nije prosleđen!";
} else {
$vote = $_GET['glas'];
include "oceneKonekcija.php";

$sql1 = "SELECT brojGlasova FROM ocene WHERE id='".$vote."'";
$upit1 = $mysqli->query($sql1);
$rezultat1 = $upit1->fetch_object();
$novi_rezultat = $rezultat1->brojGlasova + 1;

$sql2 = "UPDATE ocene SET brojGlasova=".$novi_rezultat." WHERE id='".$vote."'";
$rezultat2 = $mysqli->query($sql2);

$sql3 = "SELECT SUM( brojGlasova ) as br FROM ocene";
$ukupanbroj = $mysqli->query($sql3);
$objekat = $ukupanbroj->fetch_object();
$ukupan_broj_glasova = $objekat->br;

$sql4 = "SELECT naziv, brojGlasova FROM ocene";
$konacni=$mysqli->query($sql4);

echo "<table>";
while($red = $konacni->fetch_object()){
$naziv = $red->naziv;
$brojGlasova = $red->brojGlasova;
$procenat_glasova = 100*round($brojGlasova/$ukupan_broj_glasova,2);
?>
<tr>
<td><b><?php echo $naziv; ?>:</b></td>
<td>
<img src="img/pink.jpg" width="<?php echo($procenat_glasova); ?>" height="20">
<b><?php echo($procenat_glasova); ?>%</b>  
</tr>
<?php
}
echo "</table>";
$mysqli->close();
}
?>