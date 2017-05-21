<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

public class EMessaggio {
    
    private $data;
    private $testo;
    private $orario;
    private $daAcquirente;
    
    public function __construct($testo, $orario, $daAcquirente){
        $this->testo = $testo;
        $this->orario = $orario;
        $this->daAcquirente = $daAcquirente;
    }
    
    public function getData(){
        return $this->data;
    }
    
    public function getTesto(){    
        return $this->testo; 
    }
    
    public function getOrario(){    
        return $this->orario; 
    }
    
    public function getDaAcquirente(){    
        return $this->daAcquirente; 
    }
}
?>
