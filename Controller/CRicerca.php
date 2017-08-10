<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 07/08/17
 * Time: 16.48
 */

class CRicerca {
    /**
     * @var int
     */
    private $_annunci_per_pagina=10;

    /**
     * Seleziona sul database i libri con id più alto e li mostra nella pagina principale
     *
     * @return string contenuto del template processato
     */
    /*public function ultimiArrivi() {
        $view = USingleton::getInstance('VRicerca');
        $this->_annunci_per_pagina=4;
        $FLibro=new FLibro();
        $limit=$view->getPage()*$this->_annunci_per_pagina.','.$this->_annunci_per_pagina;
        $num_risultati=count($FLibro->search());
        $pagine = ceil($num_risultati/$this->_annunci_per_pagina);
        $risultato=$FLibro->search(array(), '`ISBN` DESC', $limit);
        if ($risultato!=false) {
            $array_risultato=array();
            foreach ($risultato as $item) {
                $tmpLibro=$FLibro->load($item->ISBN);
                $array_risultato[]=array_merge(get_object_vars($tmpLibro),array('media_voti'=>$tmpLibro->getMediaVoti()));
            }
        }
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','ultimi_arrivi');
        $view->impostaDati('dati',$array_risultato);
        return $view->processaTemplate();
    }*/

    /**
     * Seleziona sul database i libri per mostrarli all'utente e li filtra
     * in base alle variabili passate
     * es categorie o stringhe di ricerca
     *
     * @return string
     */
    public function lista(){
        $view = USingleton::getInstance('VRicerca');
        $FCatalogo = new FCatalogo();
        $parametri = array($view->getParola());
        $limit = $view->getPage()*$this->_annunci_per_pagina.','.$this->_annunci_per_pagina;
        $num_risultati=count($FCatalogo->search(array($parametri, '', '')));
        $pagine = ceil($num_risultati/$this->_annunci_per_pagina);
        $foo = array ($parametri, 'data', $limit);
        $risultato = $FCatalogo->search($foo)->getCatalogo(); //array di EAnnunci
        $view->setLayout('catalogo');
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','cerca');
        $view->impostaDati('parametri','keyword='.$parametri);
        $view->impostaDati('dati',$risultato);
        return $view->processaTemplate();
    }

    /**
     * Mostra i dettagli di un libro, con la descrizione completa, i commenti e il form per l'invio di commenti, solo per utenti registrati
     *
     * @return string
     */
    public function dettagli() {
        $view = USingleton::getInstance('VRicerca');
        $id_annuncio = $view->getIdAnnuncio();
        $FAnnuncio = new FAnnuncio();
        $dati = $FAnnuncio->load($id_annuncio)->getObjectVars();
        $view->setLayout('annuncio');
        $view->impostaDati('dati',$dati);
        return $view->processaTemplate();
    }

    /**
     * Inserisce un commento nel database collegandolo al relativo libro
     *
     * @return string
     */
    /*public function inserisciCommento() {
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view = USingleton::getInstance('VRicerca');
            $ECommento = new ECommento();
            $ECommento->libroISBN=$view->getIdLibro();
            $ECommento->voto=$view->getVoto();
            $ECommento->testo=$view->getCommento();
            $FCommento=new FCommento();
            $FCommento->store($ECommento);
            return $this->dettagli();
        }
    }*/

    /**
     * Smista le richieste ai vari metodi
     *
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VRicerca');
        switch ($view->getTask()) {
            case 'nuovo':
                return $this->nuovoAnnuncio();
            case 'dettagli':
                return $this->dettagli();
            case 'cerca':
                return $this->lista();
        }
    }

}