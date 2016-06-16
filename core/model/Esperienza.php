<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Esperienza {
    
    private $id;
    private $titolo;
    private $data;
    private $descrizione;
    private $recensore;
    private $emailUtente;
    private $voto;
    
    function __construct($id, $titolo, $data, $descrizione, $recensore, $emailUtente, $voto) {
        $this->id = $id;
        $this->titolo = $titolo;
        $this->data = $data;
        $this->descrizione = $descrizione;
        $this->recensore = $recensore;
        $this->emailUtente = $emailUtente;
        $this->voto = $voto;
    }
    
    function getId() {
        return $this->id;
    }

    function getTitolo() {
        return $this->titolo;
    }

    function getData() {
        return $this->data;
    }

    function getDescrizione() {
        return $this->descrizione;
    }

    function getRecensore() {
        return $this->recensore;
    }

    function getEmailUtente() {
        return $this->emailUtente;
    }

    function getVoto() {
        return $this->voto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitolo($titolo) {
        $this->titolo = $titolo;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }

    function setRecensore($recensore) {
        $this->recensore = $recensore;
    }

    function setEmailUtente($emailUtente) {
        $this->emailUtente = $emailUtente;
    }

    function setVoto($voto) {
        $this->voto = $voto;
    }



    
}
