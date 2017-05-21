<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
public class EConversazione {
    private $messaggio;
    private $idAnnuncio;

    public function __construct($messaggio, $idAnnuncio){
        $this->messaggio = $messaggio;
        $this->idAnnuncio = $annuncio;
    }
    
    public function getMessaggi(){
        return $this->messaggio;
    }
    
    public function getIdAnnuncio(){
        return $this->idAnnuncio;
    }
}
?>