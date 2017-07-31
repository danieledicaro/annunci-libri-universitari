<?php

class EMessaggio {

    private $acquirente;
    private $annuncio;
    private $data;
    private $ora;
    private $testo;
    private $da_acquirente;

    public function getAcquirente()
    {
        return $this->acquirente;
    }

    public function getAnnuncio()
    {
        return $this->annuncio;
    }

    public function getData(){
        return $this->data;
    }
    
    public function getTesto(){    
        return $this->testo; 
    }
    
    public function getOra(){
        return $this->ora;
    }
    
    public function getDaAcquirente(){    
        return $this->da_acquirente;
    }

    public function getObjectVars() {
        return get_object_vars($this);
    }
}
?>
