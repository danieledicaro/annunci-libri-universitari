<?php






class EConversazione {
    private $messaggio;
    private $idAnnuncio;

    public function aggiungiMessaggio($testo, $orario, $daAcquirente) {
        $this->messaggio[] = new EMessaggio($testo, $orario, $daAcquirente);
        // to Foundation
    }

    public function getMessaggi() {
        return $this->messaggio;
    }

    public function getIdAnnuncio() {
        return $this->idAnnuncio;
    }

}

?>