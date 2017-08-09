<?php

class EConversazione {

    private $messaggio;
    private $idAnnuncio;

    public function aggiungiMessaggio($messaggio) {
        $this->messaggio[] = $messaggio;
    }

    public function getMessaggi() {
        return $this->messaggio;
    }

    public function getIdAnnuncio() {
        return $this->idAnnuncio;
    }

    public function setIdAnnuncio($idAnnuncio) {
        $this->idAnnuncio = $idAnnuncio;
    }

    public function getObjectVars() {
        return get_object_vars($this);
    }

}

?>