<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 08/08/17
 * Time: 17.23
 */

class CBoxmail {

    public function lista() {
        $view = USingleton::getInstance('VBoxmail');
        $FBoxmail = new FBoxmail();
        $risultato = $FBoxmail->pop($view->getUsername())->getConversazioni();
        $view->setLayout('default');
        $view->impostaDati('username', $view->getUsername());
        $view->impostaDati('task', 'mostra');
        $view->impostaDati('dati', $risultato);
        return $view->processaTemplate();
    }

    public function dettagli($acquirente = false) {
        $view = USingleton::getInstance('VBoxmail');
        $conversazione = $view->getConversazione();
        if ( $acquirente )
            $conversazione[0] = $acquirente;
        $FConversazione = new FConversazione();
        $dati = $FConversazione->load($conversazione)->getObjectVars();
        $view->setLayout('chat');
        $view->impostaDati('dati',$dati);
        return $view->processaTemplate();
    }

    public function primoMessaggio() {  // da chiamare dal form del primo messaggio (dopo click "contatta venditore")
        $view = USingleton::getInstance('VBoxmail');
        if($view->getMessaggio() != '') {
            $messaggio = array ('acquirente' => $view->getUsername(), "annuncio" => $view->getAnnuncio(), 'data' => date("y-m-d"), 'ora' => date("H:i:s"), 'testo' => $view->getMessaggio(), 'da_acquirente' => 1);
            $FMessaggio = new FMessaggio();
            $view->impostaDati('annuncio', $view->getAnnuncio());
            if ( $FMessaggio->store($messaggio) ) {
                $this->dettagli($view->getUsername());
            } else {
                $view->impostaErrore('Invio messaggio fallito.');
                $view->setLayout('problemi');
            }
        }
        else {
            $view->impostaDati('annuncio', $view->getAnnuncio());
            $view->impostaErrore('Devi scrivere un messaggio');
            $view->setLayout('problemi');
        }
        return $view->processaTemplate();
    }

    public function nuovoMessaggio() { // da chiamare dal form di un messaggio scritto da una conversazione esistente
        $view = USingleton::getInstance('VBoxmail');
        if($view->getMessaggio() != '') {
            $id_annuncio = $view->getAnnuncio();
            $FAnnuncio = new FAnnuncio();
            $annuncio = $FAnnuncio->load($id_annuncio);
            if ($annuncio->getVenditore() == $view->getUsername()) $a = 0;
            else $a = 1;
            $messaggio = array ('acquirente' => $view->getAcquirente(), "annuncio" => $id_annuncio, 'data' => date("y-m-d"), 'ora' => date("H:i:s"), 'testo' => $view->getMessaggio(), 'da_acquirente' => $a);
            $FMessaggio = new FMessaggio();
            $FMessaggio->store($messaggio);
            return $this->dettagli();
        }
        else {
            $view->impostaErrore('Devi scrivere un messaggio');
            return $this->dettagli();
        }
    }

    public function smista() {
        $view = USingleton::getInstance('VBoxmail');
        switch ($view->getTask()) {
            case 'mostra':
                return $this->lista();
            case 'dettagli':
                return $this->dettagli();
            case 'nuovo_messaggio': // form da conversazione
                return $this->nuovoMessaggio();
            case 'contatta_venditore':  // form da click contatta venditore
                $VBoxmail = USingleton::getInstance('VBoxmail');
                if( $VBoxmail->nuovaConversazione() )
                    return $this->primoMessaggio();
                else {
                    $view->setLayout('problemi');
                    return $view->processaTemplate();
                }
        }
    }

}
