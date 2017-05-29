<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Annuncio {
    private $id;
    private $seSpedisce;
    private $condizione;
    private $descrizione;
    private $libro;
    private $venditore;
    private $corso;
    private $cittaConsegna;
    
    public function __construct($id, $utente, $seSpedice, $condizione, $descrizione, $libro, $venditore, $corso, $cittaConsegna) {
        $this->id = id;
        $this->seSpedisce = seSpedisce;
        $this->condizione = condizione;
        $this->descrizione = descrizione;
        $this->libro = libro;
        $this->venditore = venditore;
        $this->corso = corso;
        $this->cittaConsegna=cittaConsegna;
    }
    public function getId() {
        return $this->id;
    }
    public function getSeSpedisce() {
        return $this->seSpedisce;
    }
    public function getCondizione() {
        return $this->condizione;
    }
    public function getDescrizione() {
        return $this->descrizione;
    }
    public function getLibro() {
        return $this->libro;
    }
    public function getVenditore() {
        return $this->venditore;
    }
    public function getCorso() {
        return $this->corso;
    }
    public function getCittaConsegna() {
        return $this->cittaConsegna;
    }
    public function setSeSpedisce($nuovoSeSpedisce){
        $this->seSpedisce = $nuovoSeSpedisce;
    }
    public function setCondizione($nuovoCondizione){
        $this->condizione = $nuovoCondizione;
    }
    public function setDescrizione($nuovoDescrizione){
        $this->descrizione = $nuovoDescrizione;
    }
    public function setCorso($nuovoCorso){
        $this->corso = $nuovoCorso;
    }
    public function setCittaConsegna($nuovoCittaConsegna){
        $this->cittaConsegna = $nuovoCittaConsegna;
    }
}
?>