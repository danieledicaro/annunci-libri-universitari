<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

public class Annuncio {
    private $id;
    private $utente;
    private $seSpedisce;
    private $condizione;
    private $descrizione;
    private $libro;
    private $venditore;
    private $corso;
    private $cittaConsegna;
    
    public function __construct($id, $utente, $seSpedice, $condizione, $descrizione, $libro, $venditore, $corso, $cittaConsegna) {
        $this->id = id;
        $this->utente = utente;
        $this->seSpedisce = seSpedisce;
        $this->condizione = condizione;
        $this->descrizione = descrizione;
        $this->libro = libro;
        $this->venditore = venditore;
        $this->corso = corso;
        $this->cittaConsegna=cittaConsegna;
    }
}
?>