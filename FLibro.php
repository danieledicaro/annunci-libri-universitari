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

}
?>