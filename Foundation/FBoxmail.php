<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 10/08/17
 * Time: 14.38
 */

class FBoxmail extends Fdb {

    public function __construct() {
        parent::__construct();
        $this->_table='Messaggio';
        $this->_key = ['acquirente', 'annuncio', 'titolo'];
        $this->_return_class = 'EMessaggio';
        $this->_auto_increment=true;
    }

    public function pop($utente) {
        $query = 'SELECT DISTINCT `Messaggio`.`acquirente`, `Messaggio`.`annuncio`, `Libro`.`titolo` AS libro '.
            'FROM `Messaggio`, `Annuncio`, `Libro` WHERE `Annuncio`.`libro` = `Libro`.`isbn` AND `Messaggio`.`annuncio`=`Annuncio`.`id_annuncio` AND (`Messaggio`.`acquirente`= \''.
            $utente.'\' OR `Annuncio`.`venditore` = \''.$utente.'\')';
        $this->doQuery($query);
        $result = $this->getObjectArray();
        $foo = array();
        foreach ($result as $key) {
            $foo = array_merge($foo, array('0' =>array($key->getAcquirente(), $key->getAnnuncio(), $key->getLibro())));
        }
        $FConversazione = new FConversazione();
        $EBoxmail = new EBoxmail();
        foreach ($foo as $key) {
            $conversazione = $FConversazione->load($key);
            $EBoxmail->setConversazioni($conversazione);
        }
        return $EBoxmail;
    }

}