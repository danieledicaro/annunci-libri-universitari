<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 11/08/17
 * Time: 16.39
 */

class CUtente {
    private $_errore = '';

    public function mostra() {
        $view = USingleton::getInstance('VUtente');
        $FUtente = new FUtente();
        $utente = $FUtente->load($view->getUsername());
        $view->setLayout('default');
        $view->impostaDati('username', $utente->getUsername());
        $view->impostaDati('password', $utente->getPassword());
        $view->impostaDati('nome', $utente->getNome());
        $view->impostaDati('cognome', $utente->getCognome());
        $view->impostaDati('mail', $utente->getMail());
        $view->impostaDati('stato', $utente->getStato());
        return $view->processaTemplate();
    }

    public function modificaPassword () {
        $view = USingleton::getInstance('VUtente');
        $modifiche = $view->getModifiche();
        $FUtente = new FUtente();
        $utente = $FUtente->load($view->getUsername());
        if ($modifiche['old'] == $utente->getPassword()){
            if ($modifiche['new'] == $modifiche['new_1']){
                $FUtente->update(array('username' => $utente->getUsername(), 'password' => $modifiche['new'], 'tipologia_utente' => $utente->getTipologia(), 'nome' => $utente->getNome(),
                    'cognome' => $utente->getCognome(), 'mail' => $utente->getMail(), 'stato' => $utente->getStato()));
            }
            else $this->_errore = 'Le password non coincidono';
        }
        else $this->_errore = 'Password attuale errata';

        if ($this->_errore != '') {
            $view->impostaErrore($this->_errore);
            $this->_errore='';
            $view->setLayout('problemi');
            $result=$view->processaTemplate();
            $view->setLayout('modifica');
            $view->impostaDati('modifica', 'password');
            $result.=$view->processaTemplate();
            $view->impostaErrore('');
            return $result;
        }
        else {
            $view->setLayout('conferma');
            return $view->processaTemplate();
        }

    }

    public function modificaMail () {
        $view = USingleton::getInstance('VUtente');
        $modifiche = $view->getModifiche();
        $FUtente = new FUtente();
        $utente = $FUtente->load($view->getUsername());
        if ($modifiche['new'] == $modifiche['new_1']){
            $FUtente->update(array('username' => $utente->getUsername(), 'password' => $utente->getPassword(), 'tipologia_utente' => $utente->getTipologia(), 'nome' => $utente->getNome(),
                'cognome' => $utente->getCognome(), 'mail' => $modifiche['new'], 'stato' => $utente->getStato()));
        }
        else $this->_errore = 'Le mail non coincidono';

        if ($this->_errore != '') {
            $view->impostaErrore($this->_errore);
            $this->_errore='';
            $view->setLayout('problemi');
            $result=$view->processaTemplate();
            $view->setLayout('modifica');
            $view->impostaDati('mail', $utente->getMail());
            $view->impostaDati('modifica', 'mail');
            $result.=$view->processaTemplate();
            $view->impostaErrore('');
            return $result;
        }
        else {
            $view->setLayout('conferma');
            return $view->processaTemplate();
        }
    }

    public function moduloModifica() {
        $view = USingleton::getInstance('VUtente');
        $FUtente = new FUtente();
        $utente = $FUtente->load($view->getUsername());
        $view->setLayout('modifica');
        $view->impostaDati('mail', $utente->getMail());
        $view->impostaDati('modifica', $view->getModifica());
        return $view->processaTemplate();
    }


    public function smista() {
        $view=USingleton::getInstance('VUtente');
        switch ($view->getTask()) {
            case 'modifica':
                return $this->moduloModifica();
            case 'mostra':
                return $this->mostra();
            case 'modifica_password':
                return $this->modificaPassword();
            case 'modifica_mail':
                return $this->modificaMail();
        }
    }

}