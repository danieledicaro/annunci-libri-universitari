<?php
class FUtente extends Fdb{
    public function __construct() {
        $this->_table='Utente';
        $this->_key='username';
        $this->_return_class='EUtente';
        parent::__construct();
        //USingleton::getInstance('Fdb');
    }
}

?>
