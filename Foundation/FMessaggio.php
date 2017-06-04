<?php

/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 04/06/17
 * Time: 18.44
 */
class FMessaggio extends Fdb {

    public function __construct() {
        $this->_table = 'Messaggio';
        $this->_key = array('acquirente', 'annuncio', 'data', 'ora');
        $this->_return_class = 'EMessaggio';
        USingleton::getInstance('Fdb');
    }
    public function store($messaggio) {
        parent::store($messaggio);
    }

    public function load ($key) {
        $messaggio=parent::load($key);
        return $messaggio;
    }
/**  si possono o no cancellare messaggi?
 *
    public function delete( & $messaggio) {
        parent::delete($messaggio);
    }
*/
}