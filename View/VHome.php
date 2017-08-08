<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 06/08/17
 * Time: 10.01
 */

class VHome {
    /**
     * @var string $_main_content
     */
    private $_main_content;

    /**
     * @var array $_main_button
     */
    private $_main_button=array();

    /**
     * @var string $_top_content
     */
    private $_top_content;

    /**
     * @var array $_top_button
     */
    private $_top_button=array();

    /**
     * @var string $_layout
     */
    private $_layout='default';

    /**
     * Aggiunge il modulo di login nella pagina principale, per gli utenti non autenticato
     */
    public function aggiungiModuloLogin() {
        $VRegistrazione=USingleton::getInstance('VRegistrazione');
        $VRegistrazione->setLayout('default');
        $modulo_login=$VRegistrazione->processaTemplate();
        $this->_top_content.=$modulo_login;

    }

    /**
     * Assegna il contenuto al template e lo manda in output
     */
    public function mostraPagina() {
        $this->assign('top_content',$this->_top_content);
        $this->assign('tasti_in_cima',$this->_top_button);
        $this->display('home_'.$this->_layout.'.tpl');
    }

    /**
     * imposta il contenuto principale alla variabile privata della classe
     */
    public function impostaContenuto($contenuto) {
        $this->_main_content=$contenuto;
    }

    /**
     * Restituisce il controller passato tramite richiesta GET o POST
     *
     * @return mixed
     */
    public function getController() {
        if (isset($_REQUEST['controller']))
            return $_REQUEST['controller'];
        else
            return false;
    }

    /**
     * Imposta la pagina per gli utenti registrati/autenticati
     */
    public function impostaPaginaRegistrato() {
        $session=USingleton::getInstance('USession');
        $this->assign('title','UniBookstore');
        $nickname=$session->leggi_valore('nickname');
        $this->assign('content_title','Benvenuto, '.$nickname);
        $this->assign('main_content',$this->_main_content);
        $this->assign('menu',$this->_main_button);
        $this->aggiungiTastoProfilo();
        $this->aggiungiTastoBoxmail();
        $this->aggiungiTastoLogout();
    }

    /*
     * imposta la pagina per gli utenti non registrati/autenticati
     */
    public function impostaPaginaGuest() {
        $this->assign('title','Bookstore');
        $this->assign('content_title','Benvenuto ospite');
        $this->assign('main_content',$this->_main_content);
        $this->assign('menu',$this->_main_button);
        $this->aggiungiModuloLogin();
        $this->aggiungiTastoRegistrazione();
    }

    /**
     * aggiunge il tasto logout al menu
     */
    public function aggiungiTastoLogout() {
        $tasto_logout=array();
        $tasto_logout[]=array('testo' => 'Logout', 'link' => '?controller=registrazione&task=esci');
        $this->_top_button=array_merge($tasto_logout,$this->_top_button);
    }

    /**
     * aggiunge il tasto per la registrazione nel menu (per gli utenti non autenticati)
     */
    public function aggiungiTastoRegistrazione() {
        $tasto_registrazione = array('testo' => 'Registrati', 'link' => '?controller=registrazione&task=registra');
        $this->_top_button[] = $tasto_registrazione;
    }

    public function aggiungiTastoBoxmail() {
        $tasto_boxmail []= array('testo' => 'I miei messaggi', 'link' => '?controller=boxmail&task=lista');
        $this->_top_button[] = array_merge($tasto_boxmail, $this->_top_button);

    }

    public function aggiungiTastoProfilo() {
        $tasto_profilo []= array('testo' => 'Il mio profilo', 'link' => '?controller=profile&task=mostra');
        $this->_top_button[] = array_merge($tasto_profilo, $this->_top_button);

    }

    /**
     * imposta i tasti per le categorie nel menu principale
     */
    /*public function impostaTastiCategorie($categorie){
        $sotto_tasti=array();
        $tasti=array();
        foreach ($categorie as $categoria){
            $sotto_tasti[]=array('testo' => $categoria['categoria'], 'link' => '?controller=ricerca&task=lista&categoria='.$categoria['categoria']);
        }
        $tasti[]=array('testo' => 'Categorie', 'link' => '#', 'submenu' => $sotto_tasti);
        $this->_main_button=$tasti;
    }*/

}