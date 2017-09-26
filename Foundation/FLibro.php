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

    public function load ($key) {
        $query='SELECT `isbn`, `titolo`, NULL AS `autore`, `CasaEditrice`.`nome` AS `casaeditrice`, `anno_stampa`, `ambito` ' .
            'FROM `CasaEditrice`, `'.$this->_table.'` ' .
            'WHERE `casaeditrice` = `CasaEditrice`.`id_casaeditrice` AND `'.$this->_key.'` = \''.$key.'\'';
        $this->doQuery($query);
        return $this->getObject();
    }

}
?>