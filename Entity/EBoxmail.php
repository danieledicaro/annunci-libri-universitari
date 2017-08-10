<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 10/08/17
 * Time: 16.46
 */

class EBoxmail {
    private $conversazioni = array ();

    /**
     * @return mixed
     */
    public function getConversazioni() {
        return $this->conversazioni;
    }

    /**
     * @param mixed $conversazioni
     */
    public function setConversazioni($conversazioni) {
        $this->conversazioni = array_merge($this->conversazioni, array($conversazioni));
    }

    public function getObjectVars() {
        return get_object_vars($this);
    }

}