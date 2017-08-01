<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 31/07/17
 * Time: 10.05
 */

class ECatalogo {
    private $catalogo;

    public function setCatalogo($catalogo) {
        $this->catalogo = $catalogo;
    }

    public function getCatalogo() {
        return $this->catalogo;
    }

    public function getObjectVars() {
        return get_object_vars($this);
    }

}