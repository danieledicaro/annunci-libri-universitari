<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    public class ELibro {
        private $isbn;
        private $titolo;
        private $autore;
        private $casaEditrice;
        private $annoStampa;
        private $ambito;
        
        
        public function __construct($isbn,$titolo,$autore,$casaEditrice,$annoStampa,$ambito){
            $this->isbn = $isbn;
            $this->titolo = $titolo;
            $this->autore = $autore;
            $this->casaEditrice = $casaEditrice;
            $this->annoStampa = $annoStampa;
            $this->ambito = $ambito;
        }
        
        public function getIsbn() {
            return $this->isbn;
        }
        public function getTitolo() {
            return $this->titolo;
        }
        public function getAutore() {
            return $this->autore;
        }
        public function getCasaEditrice() {
            return $this->casaEditrice;
        }
        public function getAnnoStampa() {
            return $this->annoStampa;
        }
        public function getAmbito() {
            return $this->ambito;
        }
        
        public function setIsbn($nuovoIsbn){
            $this->isbn = $nuovoIsbn;
        }
        public function setTitolo($nuovoTitolo){
            $this->titolo = $nuovoTitolo;
        }
        public function setAutore($nuovoAutore){
            $this->autore = $nuovoAutore;
        }
        public function setCasaEditrice($nuovaCasaEditrice){
            $this->casaEditrice = $nuovaCasaEditrice;
        }
        public function setAnnoStampa($nuovoAnnoStampa){
            $this->annoStampa = $nuovoAnnoStampa;
        }
        public function setAmbito($nuovoAmbito){
            $this->ambito = $nuovoAmbito;
        }
        
    }
?>