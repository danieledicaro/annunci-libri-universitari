<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EAnnuncio {

    private $id_annuncio;
    private $data;
    private $libro;
    private $venditore;
    private $corso;
    private $citta_consegna;
    private $se_spedisce;
    private $descrizione;
    private $condizione;
    private $foto;
    private $foto_tipo;
    private $prezzo;

    public function getObjectVars() {
        return get_object_vars($this);
    }

    public function getVenditore() {
        return $this->venditore;
    }

    public function getIdAnnuncio() {
        return $this->id_annuncio;
}
    public function getData() {
        return $this->data;
    }
    public function getLibro() {
        return $this->libro;
    }
    public function getCorso() {
        return $this->corso;
    }
    public function getCittaConsegna() {
        return $this->citta_consegna;
    }
    public function getSeSpedisce() {
        return $this->se_spedisce;
    }
    public function getDescrizione() {
        return $this->descrizione;
    }
    public function getCondizione() {
        return $this->condizione;
    }
    public function getFoto() {
        return $this->foto;
    }
    public function getFotoTipo() {
        return $this->foto_tipo;
    }
    public function getPrezzo() {
        return $this->prezzo;
    }


}
?>