<?php

class VErrore extends View {
    /**
     * @var string $_layout
     */
    private $_layout='404';

    /**
     * restituisce la password passata tramite GET o POST
     *
     * @return mixed
     */


    /**
     * @return string
     */
    public function processaTemplate() {
        $contenuto=$this->fetch('errore_'.$this->_layout.'.tpl');
        return $contenuto;
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

    public function impostaDati($key,$valore) {
        $this->assign($key,$valore);
    }


}