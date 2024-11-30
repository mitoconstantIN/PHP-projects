<?php
class clienti_fideli{
    public $nume;
    public $prenume;


public function getNume(){
    return $this->nume;
}
public function getPrenume(){
    return $this->prenume;
}
public function setNume($var){
     $this->nume = $var;
}
public function setPrenume($var){
     $this->prenume=$var;
}

public function afisareNume(){
    echo $this->nume;
}

public function afisarePrenume(){
    echo $this->prenume;
}
}
?>