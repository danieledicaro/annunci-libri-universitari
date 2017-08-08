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
        $registrato=$CRegistrazione->getUtenteRegistrato();
        $VHome = USingleton::getInstance('VHome');
        $contenuto = $this->smista();
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
     * QUANDO E DA CHI VIENE RICHIAMATA?
     *
     * @return mixed
     */
    public function smista() {
        $view = USingleton::getInstance('VHome');
        switch ($view->getController()) {
            case 'registrazione':
                $CRegistrazione=USingleton::getInstance('CRegistrazione');
                return $CRegistrazione->smista();
            case 'ricerca':
                $CRicerca=USingleton::getInstance('CRicerca');
                return $CRicerca->smista();
            case 'profilo':
                $CUtente=USingleton::getInstance('CUtente');
                return $CUtente->smista();
            default:
                return NULL; //schermata iniziale del sito
        }
    }

}