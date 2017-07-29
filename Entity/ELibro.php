<?php

class ELibro {

    private $isbn;
    private $titolo;
    private $autore;
    private $casaEditrice;
    private $annoStampa;
    private $ambito;


    public function setIsbn($nuovoIsbn) {
        // to Foundation
    }

    public function setTitolo($nuovoTitolo) {
        // to Foundation
    }

    public function setAutore($nuovoAutore) {
        // to Foundation
    }

    public function setCasaEditrice($nuovaCasaEditrice) {
        // to Foundation
    }

    public function setAnnoStampa($nuovoAnnoStampa) {
        // to Foundation
    }

    public function setAmbito($nuovoAmbito) {
        // to Foundation
    }

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