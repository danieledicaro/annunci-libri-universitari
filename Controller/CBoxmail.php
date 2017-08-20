<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 08/08/17
 * Time: 17.23
 */

class CBoxmail {

    public function lista() {
        $view = USingleton::getInstance('CBoxmail');
        $FBoxmail = new FBoxmail();
        $risultato = $FBoxmail->pop()->getConversazioni();
        $view->setLayout('default');
        $view->impostaDati('task', 'mostra');
        $view->impostaDati('dati', $risultato);
        return $view->processaTemplate();
    }

    public function dettagli() {
        $view = USingleton::getInstance('VBoxmail');
        $conversazione = $view->getConversazione();
        $FConversazione = new FConversazione();
        $dati = $FConversazione->load($conversazione)->getObjectVars();
        $view->setLayout('chat');
        $view->impostaDati('dati',$dati);
        return $view->processaTemplate();
    }

    public function nuovaConversazione() {
        $view = USingleton::getInstance('VBoxmail');
        if($view->getMessaggio() != false) {
            $messaggio = array ($view->getUsername(), $view->getAnnuncio(), date("d-m-y"), date("H:i:s"), $view->getMessaggio(), 1);
            $FMessaggio = new FMessaggio();
            $FMessaggio->store($messaggio);
            return $view->processaTemplate();
        }
        else {
            $view->impostaErrore('Devi scrivere un messaggio');
            $view->setLayout('problemi');
            return $view->processaTemplate();
        }
    }

    public function nuovoMessaggio() {
        $view = USingleton::getInstance('VBoxmail');
        if($view->getMessaggio() != false) {
            $id_annuncio = $view->getDati()['idAnnuncio'];
            $FAnnuncio = new FAnnuncio();
            $annuncio = $FAnnuncio->load($id_annuncio);
            if ($annuncio->getVenditore() == $view->getUsername()) $a = 0;
            else $a = 1;
            $messaggio = array ($annuncio->getVenditore(), $id_annuncio, date("d-m-y"), date("H:i:s"), $view->getMessaggio(), $a);
            $FMessaggio = new FMessaggio();
            $FMessaggio->store($messaggio);
            return $view->processaTemplate();
        }
    }

    public function smista() {
        $view = USingleton::getInstance('VBoxmail');
        switch ($view->getTask()) {
            case 'mostra':
                return $this->lista();
            case 'dettagli':
                return $this->dettagli();
            case 'nuovo_messaggio':
                return $this->nuovoMessaggio();
            case 'contatta_venditore':
                $VBoxmail = USingleton::getInstance('VBoxmail');
                return $VBoxmail->nuovaConversazione();
        }
    }

}
