<?php

class EConversazione {

    private $messaggio;
    private $idAnnuncio;

    public function __construct(){}

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


}

?>