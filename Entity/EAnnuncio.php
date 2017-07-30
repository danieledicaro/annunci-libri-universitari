<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EAnnuncio {

    private $id_annuncio;
    private $libro;
    private $venditore;
    private $corso;
    private $citta_consegna;
    private $se_spedisce;
    private $descrizione;
    private $condizione;

    public function getObjectVars() {
        return get_object_vars($this);
    }

}
?>