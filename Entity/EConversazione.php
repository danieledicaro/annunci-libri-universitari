<?php

class EConversazione {

    private $messaggio;

    public function aggiungiMessaggio($messaggio) {
        $this->messaggio[] = $messaggio;
    }

    public function getMessaggi() {
        return $this->messaggio;
    }

    public function getIdAnnuncio() {
        return $this->messaggio[0]->getAnnuncio();
    }

    public function getLibro() {
        return $this->messaggio[0]->getLibro();
    }

    public function getAcquirente() {
        return $this->messaggio[0]->getAcquirente();
    }

    public function getNumeroMessaggi() {
        return sizeof($this->messaggio);
    }

    public function setIdAnnuncio($idAnnuncio) {
        $this->idAnnuncio = $idAnnuncio;
    }

    public function getObjectVars() {
        return get_object_vars($this);
    }

}

?>