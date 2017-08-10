<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 08/08/17
 * Time: 17.23
 */

class VBoxmail {
    private $_layout;

    public function nuovaConversazione() {
        $CRegistrazione = USingleton::getInstance('CRegistrazione');
        $registrato = $CRegistrazione->getUtenteRegistrato();
        $view = USingleton::getInstance('VBoxmail');
        if ($registrato) {
            $view->setLayout('messaggio');
            return $view->processaTemplate();
        }
        else {
            $view->impostaErrore('Devi prima effettuare il login');
            $view->setLayout('problemi');
            return $view->processaTemplate();
        }
    }

    /**
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('registrazione_'.$this->_layout.'.tpl');
    }

    /**
     * Imposta l'eventuale errore nel template
     *
     * @param string $errore
     */
    public function impostaErrore($errore) {
        $this->assign('errore',$errore);
    }

    /**
     * imposta il layout
     *
     * @param string $layout
     */
    public function setLayout($layout) {
        $this->_layout=$layout;
    }

    /**
     * Imposta i dati nel template identificati da una chiave ed il relativo valore
     *
     * @param string $key
     * @param mixed $valore
     */
    public function impostaDati($key,$valore) {
        $this->assign($key,$valore);
    }

    /**
     * restituisce il messaggio
     *
     * @return mixed
     */
    public function getMessaggio() {
        if (isset($_REQUEST['messaggio']))
            return $_REQUEST['messaggio'];
        else
            return false;
    }

    /**
     * restituisce le chiavi della conversazione
     *
     * @return mixed
     */
    public function getConversazione() {
        if (isset($_REQUEST['acquirente'])) {
            $a = $_REQUEST['acquirente'];
            if (isset($_REQUEST['idAnnuncio'])){
                $a = array_merge($a, $_REQUEST['idAnnuncio']);
                return $a;
            }
            else return false;
        }else
            return false;
    }

    /**
     * restituisce il corpo (la conversazione sottoforma di array (messaggi[], idAnnuncio), come la classe EConversazione
     *
     * @return mixed
     */
    public function getDati() {
        if (isset($_REQUEST['dati']))
            return $_REQUEST['dati'];
        else
            return false;
    }

    /**
     * @return mixed
     */
    public function getTask() {
        if (isset($_REQUEST['task']))
            return $_REQUEST['task'];
        else
            return false;
    }

    /**
     * restituisce la username passata tramite GET o POST
     *
     * @return mixed
     */
    public function getUsername() {
        if (isset($_REQUEST['username']))
            return $_REQUEST['username'];
        else
            return false;
    }

}