<?php

class Proizvod{
    public $id;
    private $naziv;
    private $slika;
    private $cena;
    public $kategorija;

    function __construct($id, $naziv, $slika, $cena){
        $this->id = $id;
        $this->naziv = $naziv;
        $this->slika = $slika;
        $this->cena = $cena;
    }

    public function getId(){
        return $this->id;
    }

    public function getNaziv(){
        return $this->naziv;
    }

    public function setNaziv($naziv){
        $this->naziv = $naziv;
    }

    public function getSlika(){
        return $this->slika;
    }

    public function setSlika($slika){
        $this->slika = $slika;
    }

    public function getCena(){
        return $this->cena;
    }

    public function setCena($cena){
        $this->cena = $cena;
    }

}




?>