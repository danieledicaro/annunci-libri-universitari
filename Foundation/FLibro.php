<?php

class FLibro extends Fdb {

    public function __construct() {
        $this->_table='Libro';
        $this->_key='isbn';
        $this->_return_class='ELibro';
        USingleton::getInstance('Fdb');
    }

    public function store( $libro) {
        parent::store($libro);
    }

    public function load ($key) {
        $libro=parent::load($key);
        return $libro;
    }

    public function delete( & $libro) {
        parent::delete($libro);
    }

    public function getCategorie(){
        $query='SELECT DISTINCT `ambito` ' .
            'FROM `'.$this->_table.'` ';
        $this->doQuery($query);
        return $this->getResultAssoc();
    }

}
?>