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
        $risultato = $FBoxmail->search()->getConversazioni();
        $view->setLayout('default');
        $view->impostaDati('task', 'mostra');
        $view->impostaDati('dati', $risultato);
    }

}