<?php

class ELibro {

    private $isbn;
    private $titolo;
    private $autore;
    private $casaeditrice;
    private $anno_stampa;
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

    public function getCasaeditrice() {
        return $this->casaeditrice;
    }

    public function getAnno_stampa() {
        return $this->anno_stampa;
    }

    public function getAmbito() {
        return $this->ambito;
    }

    public function getObjectVars() {
        return get_object_vars($this);
    }

}


?>