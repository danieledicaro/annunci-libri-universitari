<?php

class EUtente {
    private $username;
    private $password;
    private $tipologia_utente;
    private $nome;
    private $cognome;
    private $mail;
    private $stato;
    //private $annunciOsservati;
    
    // public function creaAnnuncio($isbn,)
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function getTipologia() {
        return $this->tipologia_utente;
    }
    
    public function getNome() {
        return $this->nome;
    }
    
    public function getCognome() {
        return $this->cognome;
    }
    
    public function getMail() {
        return $this->mail;
    }
    
    public function getStato() {
        return $this->stato;
    }

    public function getObjectVars() {
        return get_object_vars($this);
    }
}
?>