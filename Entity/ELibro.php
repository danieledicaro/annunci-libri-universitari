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

    public function getCasaeditrice($getNome = null) {
        if ($getNome == 'nome' && is_int($this->casaeditrice) ) {
            $FLibro = new FLibro();
            return $FLibro->getNomeCasaEditrice($this->casaeditrice);
        } else {
            return $this->casaeditrice;
        }
    }

    public function getAnno_stampa() {
        return $this->anno_stampa;
    }

    public function getAmbito($getNome = null) {
        if ($getNome === 'nome') {
            $FLibro = new FLibro();
            return $FLibro->getNomeAmbito($this->ambito);
            }
        else {
            return $this->ambito;
        }
    }

    public function getObjectVars() {
        return get_object_vars($this);
    }

}

?>