<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 06/08/17
 * Time: 10.01
 */

class CHome {
    /**
     * Imposta la pagina, controlla l'autenticazione
     */
    public function impostaPagina () {
        $CRegistrazione = USingleton::getInstance('CRegistrazione');
        $VHome = USingleton::getInstance('VHome');
        $session = USingleton::getInstance('USession');
        if( $session->controlloInattivita() ) {
            $CRegistrazione->setErrore("Sessione scaduta. Effettuare di nuovo il login.");
            $contenuto = $CRegistrazione->moduloLogin();
        } else {
            $contenuto = $this->smista();
        }
        $registrato=$CRegistrazione->getUtenteRegistrato();
        // se il login è stato reindirizzato dal tentativo di invio messaggio dalla visualizzazione di un annuncio
        if ( $registrato && isset($_REQUEST['oldIdAnnuncio']) ) {
            if ( $_REQUEST['oldIdAnnuncio'] != '' )
                $VHome->impostaContenuto($this->reindirizzaAnnuncio());
            else
                $VHome->impostaContenuto($contenuto);
        }
        else
            $VHome->impostaContenuto($contenuto);
        if ($registrato) {
            $VHome->impostaPaginaRegistrato();
        } else {
            $VHome->impostaPaginaGuest();
        }
        $VHome->mostraPagina();
    }
    /**
     * Smista le richieste ai vari controller
     *
     * @return mixed
     */
    public function smista() {
        $view = USingleton::getInstance('VHome');
        switch ($view->getController()) {
            case 'registrazione':
                $CRegistrazione = USingleton::getInstance('CRegistrazione');
                return $CRegistrazione->smista();
            case 'ricerca':
                $CRicerca = USingleton::getInstance('CRicerca');
                return $CRicerca->smista();
            case 'profile':
                $CUtente = USingleton::getInstance('CUtente');
                return $CUtente->smista();
            case 'boxmail':
                $CBoxmail = USingleton::getInstance('CBoxmail');
                return $CBoxmail->smista();
            default:
                $VRicerca = USingleton::getInstance('VRicerca');
                $VRicerca->setLayout('default');
                return $VRicerca->processaTemplate();
        }
    }

    public function reindirizzaAnnuncio() {
            $CRicerca = USingleton::getInstance('CRicerca');
            return $CRicerca->dettagli($_REQUEST['oldIdAnnuncio']);
    }
}