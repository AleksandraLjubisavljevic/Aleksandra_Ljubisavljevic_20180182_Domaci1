<?php

include("database.php");
include("model/proizvod.php");

$crud = new Database("aurabaza");

$proizvodi = array();

if (!isset ($_GET["id"])){
    echo "Parametar ID nije prosleđen!";
    } else {
    $pomocna=$_GET["id"];
    
    if($pomocna=="8"){
        $crud->select();
        while($red=$crud->getResult()->fetch_object()){
            $proizvodi[] = new Proizvod($red->id, $red->naziv, $red->slika, $red->cena);
        }
    }else{
        $crud->select("*", "proizvod", "kategorija=$pomocna");
        while($red=$crud->getResult()->fetch_object()){
            $proizvodi[] = new Proizvod($red->id, $red->naziv, $red->slika, $red->cena);
        }
    }
    
}

include("prikazProizvodaTabela.php");

?>