<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 29/07/17
 * Time: 11.58
 */

class FAnnuncio extends Fdb {

    public function __construct() {
        parent::__construct();
        $this->_table='Annuncio';
        $this->_key= 'id_annuncio';
        $this->_return_class='EAnnuncio';
        $this->_auto_increment=true;
        //USingleton::getInstance('Fdb');
    }

}