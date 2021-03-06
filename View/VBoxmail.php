<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 08/08/17
 * Time: 17.23
 */

class VBoxmail extends View {
    private $_layout;

    public function nuovaConversazione() {  // form da click "contatta venditore" - controlla se autenticato e se venditore=acquirente
        $CRegistrazione = USingleton::getInstance('CRegistrazione');
        $registrato = $CRegistrazione->getUtenteRegistrato();
        $view = USingleton::getInstance('VBoxmail');
        if ($registrato) {
            /*$view->setLayout('primoMessaggio');
            return $view->processaTemplate();*/
            if ( $view->getUsername() == $view->getVenditore() ) {
                $view->impostaErrore('Sei tu il venditore');
                return false;
            }
            else
                return true;
        }
        else {
            $view->impostaErrore('Devi prima effettuare il login');
            return false;
        }
    }

    /**
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('boxmail_'.$this->_layout.'.tpl');
    }

    /**
     * Imposta l'eventuale errore nel template
     *
     * @param string $errore
     */
    public function impostaErrore($errore) {
        global $appPath;
        $this->assign('appPath', $appPath);
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
     * restituisce l'acquirente
     *
     * @return mixed
     */
    public function getAcquirente() {
        if (isset($_REQUEST['acquirente']))
            return $_REQUEST['acquirente'];
        else
            return false;
    }

    /**
     * restituisce il venditore
     *
     * @return mixed
     */
    public function getVenditore() {
        if (isset($_REQUEST['venditore']))
            return $_REQUEST['venditore'];
        else
            return false;
    }

    /**
     * restituisce l'id dell'annuncio
     *
     * @return mixed
     */
    public function getAnnuncio() {
        if (isset($_REQUEST['idAnnuncio']))
            return $_REQUEST['idAnnuncio'];
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
            $a = array();
            $a[0]= $_REQUEST['acquirente'];
            if (isset($_REQUEST['idAnnuncio'])){
                $a[1]=$_REQUEST['idAnnuncio'];
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
     * restituisce la username passata tramite GET o POST (modifica: prende dalla sessione)
     *
     * @return mixed
     */
    public function getUsername() {
        if (isset($_SESSION['username']))
            return $_SESSION['username'];
        else
            return false;
    }

}