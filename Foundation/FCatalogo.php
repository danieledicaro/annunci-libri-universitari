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
     * Funziona, l'array $a è un array con parametri di ricerca del tipo chiave => valore; quelle che nella query sono
     * stringhe devono avere gli apici '' (es. 'titolo' => "'Fisica Generale I'")
     *
     * @param array $a
     * @param string $ordinamento
     * @param string $limit
     * @return array|bool
     */
    public function search(array $a, $ordinamento = '', $limit = '') {
        $filtro='';
        $b=$a[0];
        end($b);
        $last=key($b);
        foreach ($b as $key => $value) {
            if($key!=$last) {
                $filtro .= '`Libro`.'.$key.' = '.$value.' AND ';
            }
            else $filtro .= '`Libro`.'.$key.' = '.$value;
        }
        $query='SELECT `'.$this->_table.'`.* '.
            'FROM `'.$this->_table.'`, `Libro` ';
        if ($filtro != '')
            $query.='WHERE '.$filtro.' ';
        if ($ordinamento!='')
            $query.='ORDER BY '.$a[1].' ';
        if ($limit != '')
            $query.='LIMIT '.$a[2].' ';
        $this->doQuery($query);
        return $this->getObjectArray();
    }

}