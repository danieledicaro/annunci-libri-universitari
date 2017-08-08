<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 08/08/17
 * Time: 12.57
 */

class VRicerca {

    /**
     * @var string _layout
     */
    private $_layout='default';

    /**
     * restituisce il numero della pagina (utilizzato nella visualizzazione dei libri) passato per GET o POST
     * @return int
     */
    public function getPage() {
        if (isset($_REQUEST['page'])) {
            return $_REQUEST['page'];
        } else
            return 0;
    }

    /**
     * Processa il layout scelto nella variabile _layout
     *
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('ricerca_'.$this->_layout.'.tpl');
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
     * Ritorna l'id del libro passato tramite GET o POST
     *
     * @return mixed
     */
    public function getIdAnnuncio() {
        if (isset($_REQUEST['id_annuncio'])) {
            return $_REQUEST['id_annuncio'];
        } else
            return false;
    }

    /**
     * @param string $layout
     */
    public function setLayout($layout) {
        $this->_layout=$layout;
    }

    /**
     * restituisce il voto passato tramite GET o POST
     *
     * @return mixed
     */
    /*public function getVoto() {
        if (isset($_REQUEST['voto'])) {
            return $_REQUEST['voto'];
        } else
            return false;
    }*/

    /**
     * Restituisce il commento
     *
     * @return mixed
     */
    /*public function getCommento() {
        if (isset($_REQUEST['commento'])) {
            return $_REQUEST['commento'];
        } else
            return false;
    }*/

    /**
     * Restituisce categoria
     *
     * @return mixed
     */
    /*public function getCategoria() {
        if (isset($_REQUEST['categoria']))
            return $_REQUEST['categoria'];
        else
            return false;
    }*/

    /**
     * restituisce la stringa di ricerca
     *
     * @return mixed
     */
    public function getParola() {
        if (isset($_REQUEST['stringa']))
            return $_REQUEST['stringa'];
        else
            return false;
    }

}