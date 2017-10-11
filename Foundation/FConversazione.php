<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 30/07/17
 * Time: 19.17
 */

class FConversazione extends Fdb {

    public function __construct() {

        parent::__construct();
        $this->_table = 'Messaggio';
        $this->_key = ['acquirente', 'annuncio'];
        $this->_return_class = 'EMessaggio';
    }

    /**
     * $key array [string acquirente, int annuncio]
     *
     * @param $key
     * @return EConversazione
     */
    public function load ($key) {
        $query='SELECT `Messaggio`.`acquirente`, `Messaggio`.`annuncio`, `Libro`.`titolo` AS libro, `Messaggio`.`data`, `Messaggio`.`ora`, `Messaggio`.`testo`, `Messaggio`.`da_acquirente` ' .
            'FROM `Messaggio`, `Libro`, `Annuncio` ' .
            'WHERE `Messaggio`.`annuncio` = `Annuncio`.`id_annuncio` AND `Annuncio`.`libro` = `Libro`.`isbn` AND '.
            '`'.$this->_key[0].'` = \''.$key[0].'\' AND `'.$this->_key[1].'` = \''.$key[1].'\'';
        $this->doQuery($query);
        $a = $this->getObjectArray(); //array di EMessaggio
        $b = new EConversazione(); //creo l'istanza di EConversazione
        foreach($a as $i){
            $b->aggiungiMessaggio($i);
        }
        //$b->setIdAnnuncio($a[0]->getAnnuncio());
        return $b;
    }

}