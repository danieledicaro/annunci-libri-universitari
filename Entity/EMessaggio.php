<?php

class EMessaggio {

    private $data;
    private $testo;
    private $orario;
    private $daAcquirente;

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
