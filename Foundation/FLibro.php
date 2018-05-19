<?php

class FLibro extends Fdb {

    public function __construct() {
        $this->_table='Libro';
        $this->_key='isbn';
        $this->_return_class='ELibro';
        parent::__construct();
        //USingleton::getInstance(Fdb::class);
    }

    public function getCategorie(){
        $query='SELECT DISTINCT `Ambito` ' .
            'FROM `'.$this->_table.'` ';
        $this->doQuery($query);
        return $this->getResultAssoc();
    }
    
    public function getNomeCasaEditrice($id){
        $query = 'SELECT `nome` ' .
                    'FROM `CasaEditrice` WHERE `id_casaeditrice` = '.$id;
            $this->doQuery($query);
            return $this->getResultAssoc()[0]['nome'];
    }
    
    public function getNomeAmbito($id){
        $query = 'SELECT `nome` ' .
                    'FROM `Ambito` WHERE `id_ambito` = '.$id;
            $this->doQuery($query);
            return $this->getResultAssoc()[0]['nome'];
    }
    

    public function load ($key) {
        $query='SELECT `isbn`, `titolo`, NULL AS `autore`, `CasaEditrice`.`nome` AS `casaeditrice`, `anno_stampa`, `ambito` ' .
            'FROM `CasaEditrice`, `'.$this->_table.'` ' .
            'WHERE `casaeditrice` = `CasaEditrice`.`id_casaeditrice` AND `'.$this->_key.'` = \''.$key.'\'';
        $this->doQuery($query);
        return $this->getObject();
    }

}
?>