<?php

class ELibro {

    private $isbn;
    private $titolo;
    private $autore;
    private $casaEditrice;
    private $annoStampa;
    private $ambito;



    public function getIsbn() {
        return $this->isbn;
    }

    public function getTitolo() {
        return $this->titolo;
    }

    public function getAutore() {
        return $this->autore;
    }

    public function getCasaEditrice() {
        return $this->casaEditrice;
    }

    public function getAnnoStampa() {
        return $this->annoStampa;
    }

    public function getAmbito() {
        return $this->ambito;
    }

    public function getObjectVars() {
        return get_object_vars($this);
    }

}


?>