<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 31/07/17
 * Time: 10.14
 */

class FCatalogo extends Fdb {

    public function __construct() {
        parent::__construct();
        $this->_table='Annuncio';
        $this->_key= 'id_annuncio';
        $this->_return_class='EAnnuncio';
        $this->_auto_increment=true;
    }

    /**
     * Funziona, l'array $a è un array con parametri di ricerca del tipo array(array(valori), ordinamento, limite)
     * array(valori)=[parola chiave (stringa), anno_stampa (int), citta_consegna (string), se_spedisce (0 o 1), condizione (da 0 a 5), prezzo (int)]
     * inserendo la condizione mostra solo condizioni uguali o migliori
     * inserendo un prezzo cercherà in un range di +/- 10 dal prezzo inserito
     *
     * @param array $a
     * @return ECatalogo
     */
    public function search (array $a) {
        $filtro='';
        $b=$a[0];
        if (count($b)==1) {
            $query = "SELECT DISTINCT `Annuncio`.`id_annuncio`, `Annuncio`.`data` , `Libro`.`titolo`, `Annuncio`.`venditore`,".
                " `Annuncio`.`corso`, `Annuncio`.`citta_consegna`, `Annuncio`.`se_spedisce`, `Annuncio`.`descrizione`,".
                " `Annuncio`.`condizione`, `Annuncio`.`prezzo` ".
                "FROM `Annuncio`, `Libro`, `CasaEditrice`, `Autore`, `AutoreLibro`, `Corso`, `Professore`, `Universita` ".
                "WHERE `Annuncio`.descrizione LIKE '%".$b[0]."%' OR `Libro`.titolo LIKE '%".$b[0]."%' OR `Libro`.isbn LIKE '%".$b[0].
                "%' OR `CasaEditrice`.nome LIKE "."'%".$b[0]."%' OR `Autore`.nome LIKE '%".$b[0]."%' OR `Universita`.nome LIKE '%".$b[0].
                "%' OR `Professore`.nome LIKE '%".$b[0]."%' OR `Corso`.nome LIKE '%".$b[0]."%' AND `Libro`.isbn = `Annuncio`.libro ";
        }
        else {
            if ( $b[0]!=''){
                $query="SELECT DISTINCT `Annuncio`.`id_annuncio`, `Annuncio`.`data` , `Libro`.`titolo`, `Annuncio`.`venditore`,".
                    " `Annuncio`.`corso`, `Annuncio`.`citta_consegna`, `Annuncio`.`se_spedisce`, `Annuncio`.`descrizione`,".
                    " `Annuncio`.`condizione`, `Annuncio`.`prezzo` ".
                    "FROM `Annuncio`, `Libro`, `CasaEditrice`, `Autore`, `AutoreLibro`, `Corso`, `Professore`, `Universita`, `Citta` ".
                    "WHERE (`Annuncio`.descrizione LIKE '%".$b[0]."%' OR `Libro`.titolo LIKE '%".$b[0]."%' OR `Libro`.isbn LIKE '%".$b[0].
                    "%' OR `CasaEditrice`.nome LIKE "."'%".$b[0]."%' OR `Autore`.nome LIKE '%".$b[0]."%' OR `Universita`.nome LIKE '%".$b[0].
                    "%' OR `Professore`.nome LIKE '%".$b[0]."%' OR `Corso`.nome LIKE '%".$b[0]."%') AND `Libro`.isbn = `Annuncio`.libro AND ";
            }
            else $query="SELECT DISTINCT `Annuncio`.`id_annuncio`, `Annuncio`.`data` , `Libro`.`titolo`, `Annuncio`.`venditore`,".
                " `Annuncio`.`corso`, `Annuncio`.`citta_consegna`, `Annuncio`.`se_spedisce`, `Annuncio`.`descrizione`,".
                " `Annuncio`.`condizione`, `Annuncio`.`prezzo` ".
                'FROM `Annuncio`, `Libro`, `CasaEditrice`, `Autore`, `AutoreLibro`, `Corso`, `Professore`, `Universita`, `Citta` '.
                'WHERE `Libro`.isbn = `Annuncio`.libro AND ';
            for( $i = 1 ; $i < count($b) ; ++$i ){
                if($i==1 && $b[$i]!='') $filtro .= "`Libro`.anno_stampa = ".$b[$i]." AND `Annuncio`.libro = `Libro`.isbn AND ";
                elseif ($i==2 && $b[$i]!='') $filtro .= "`Annuncio`.citta_consegna = `Citta`.id_citta AND `Citta`.comune = '".$b[$i]."' AND ";
                elseif ($i==3 && $b[$i]!='') $filtro .= "`Annuncio`.se_spedisce = ".$b[$i]." AND ";
                elseif ($i==4 && $b[$i]!='') $filtro .= "`Annuncio`.condizione > ".$b[$i]." AND ";
                elseif ($b[$i]!='') $filtro .= "`Annuncio`.prezzo >=".$b[$i]."-10 AND `Annuncio`.prezzo <= 10+".$b[$i]." AND ";
            }
            if ($filtro != '')
                $query.=substr($filtro, 0, strlen($filtro)-4);
            if ($filtro == '')
                $query=substr($query, 0, strlen($query)-4);
            if ($filtro == '' && $b[0] == '')
                $query='SELECT `id_annuncio`, `data` , `Libro`.`titolo`, `venditore`, `corso`, `citta_consegna`, `se_spedisce`,'.
                    ' `descrizione`, `condizione`, `prezzo` FROM `Annuncio`, `Libro` WHERE `Libro`.`isbn` = `Annuncio`.`Libro`';
            if ($a[1] != '')
                $query.='ORDER BY '.$a[1].' ';
            if ($a[2] != '')
                $query.='LIMIT '.$a[2].' ';
        }
        $query=substr($query, 0, strlen($query)-1);
        $this->doQuery($query);
        $catalogo = new ECatalogo();
        $catalogo->setCatalogo($this->getObjectArray());
        return $catalogo;
    }

    public function iMieiAnnunci ($username) {
        $query = 'SELECT DISTINCT `id_annuncio`, `data` , `Libro`.`titolo`, `venditore`, `corso`, `citta_consegna`, `se_spedisce`,'.
            ' `descrizione`, `condizione`, `foto`, `prezzo` '.'FROM `Annuncio`, `Libro` WHERE `Annuncio`.`venditore` = \''.$username.
            '\' AND `Libro`.`isbn` = `Annuncio`.`libro` ORDER BY data DESC';
        $this->doQuery($query);
        $catalogo = new ECatalogo();
        $catalogo->setCatalogo($this->getObjectArray());
        return $catalogo;
    }

}
