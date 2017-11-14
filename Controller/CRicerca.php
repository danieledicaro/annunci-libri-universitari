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
    private $_annunci_per_pagina=2;

    private $_errore = '';

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

    public function setErrore($stringa) {
        $this->_errore = $stringa;
    }

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
        $parametri = $view->getParola();
        if ( strlen($parametri[0]) > 3 ) {
            $limit = $view->getPage() * $this->_annunci_per_pagina . ',' . $this->_annunci_per_pagina;
            $num_risultati = count($FCatalogo->search(array($parametri, '', ''))->getCatalogo());
            $pagine = ceil($num_risultati / $this->_annunci_per_pagina);
            if( isset($parametri['ordinamento']) ) $ordinamento = $parametri['ordinamento']; else $ordinamento = '';
            $foo = array($parametri, $ordinamento, $limit);
            $risultato = $FCatalogo->search($foo)->getCatalogo(); //array di EAnnunci
            $view->impostaDati('pagine', $pagine);
            $view->impostaDati('task', 'cerca');
            $param = implode(",^,", $parametri); //stringa che verrà passata tra le pagine dei risultati
            $view->impostaDati('parametri', 'stringa=' . $param);
            $view->impostaDati('dati', $risultato);
            $strumenti = $view->aggiungiStrumenti();
            $view->setLayout('lista');
            return $strumenti.$view->processaTemplate();
        }
        else {
            $view->impostaErrore("inserisci più di 3 caratteri");
            $this->_errore='';
            $view->setLayout('problemi');
            $result=$view->processaTemplate();
            $view->setLayout('default');
            return $result.$view->processaTemplate();;
        }

    }

    public function foto() {
        $view = USingleton::getInstance('VRicerca');
        $FAnnuncio = new FAnnuncio();
        $dati = $FAnnuncio->load($view->getIdAnnuncio())->getObjectVars();
        header('Content-Type: '.$dati['foto_tipo']);
        /*$view->setLayout('foto');
        $view->impostaDati('dati',$dati['foto']);
        $immagine = $view->processaTemplate();
        echo $immagine;*/
        echo $dati['foto'];
    }


    /**
     * Mostra i dettagli di un libro, con la descrizione completa, i commenti e il form per l'invio di commenti, solo per utenti registrati
     *
     * @return string
     */
    public function dettagli($oldAnnuncioID = null) {
        $view = USingleton::getInstance('VRicerca');
        if( !is_null($oldAnnuncioID))
            $id_annuncio = $oldAnnuncioID;
        else
            $id_annuncio = $view->getIdAnnuncio();
        $FAnnuncio = new FAnnuncio();
        $dati = $FAnnuncio->load($id_annuncio)->getObjectVars();
        $dati['acquirente'] = $view->getUsername();
        $view->setLayout('dettagli');
        $view->impostaDati('dati',$dati);
        return $view->processaTemplate();
    }

    public function cancellaAnnuncio() {
        $view = USingleton::getInstance('VRicerca');
        $id_annuncio = $view->getIdAnnuncio();
        $FAnnuncio = new FAnnuncio();
        $dati = $FAnnuncio->load($id_annuncio);
        $FAnnuncio->delete($dati);
        return $this->mieiAnnunci();
    }

    /**
     * Mostra gli annunci dell'utente registrato
     * @return mixed
     */
    public function mieiAnnunci() {
        $view = USingleton::getInstance('VRicerca');
        $FCatalogo = new FCatalogo();
        $dati = $FCatalogo->iMieiAnnunci($view->getUsername())->getCatalogo();
        $view->setLayout('mieiAnnunci');
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


    public function creaAnnuncio() {
        $view = USingleton::getInstance('VRicerca');
        $FAnnuncio = new FAnnuncio();
        $annuncio = array('id_annuncio' => '', 'data' => date("y-m-d"), 'libro' => $view->getIsbn(),
            'venditore' => $view->getUsername(), 'se_spedisce' => $view->getSpedisce(), 'descrizione' => $view->getDescrizione(),
            'condizione' => $view->getCondizione(), 'prezzo' => $view->getPrezzo());
        $foto = $view->uploadFoto();
            if ($foto != false) {
                $annuncio['foto'] = $foto['dati'];
                $annuncio['foto_tipo'] = $foto['tipo'];
            }
            if ( $view->getCorso() != false)
                $annuncio['corso'] = $view->getCorso();
            if ( $view->getCittà() != false )
                $annuncio['città'] = $view->getCittà();
            $FAnnuncio->store($annuncio);
        if ( $this->_errore == '' ){
            $view->setLayout('confermaCreazione');
        } else {
            $view->impostaErrore($this->_errore);
            $this->_errore = '';
            $view->setLayout('moduloISBN');
        }
        return $view->processaTemplate();
    }


    /**
     * Smista le richieste ai vari metodi
     *
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VRicerca');
        switch ($view->getTask()) {
            case 'nuovo_annuncio':
                $x = $view -> nuovoAnnuncioDaISBN();
                if ( $this->_errore == '' ){
                    return $x;
                } else {
                    $view->impostaErrore($this->_errore);
                    $this->_errore = '';
                    $view->setLayout('moduloISBN');
                    return $view->processaTemplate();
                }
            case 'salva':
                return $this->creaAnnuncio();
            case 'cancella':
                return $this->cancellaAnnuncio();
            case 'dettagli':
                return $this->dettagli();
            case 'cerca':
                return $this->lista();
            case 'miei_annunci':
                return $this->mieiAnnunci();
            case 'foto':
                $this->foto();
            default:
                $VErrore = new VErrore();
                $VErrore->setLayout('404');
                $VErrore->impostaDati('url',"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                return $VErrore->processaTemplate();
        }
    }

}