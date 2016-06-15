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
    private $usernameUtente;
    private $voto;
    
    function __construct($id, $titolo, $data, $descrizione, $recensore, $usernameUtente, $voto) {
        $this->id = $id;
        $this->titolo = $titolo;
        $this->data = $data;
        $this->descrizione = $descrizione;
        $this->recensore = $recensore;
        $this->usernameUtente = $usernameUtente;
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

    function getUsernameUtente() {
        return $this->usernameUtente;
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

    function setUsernameUtente($usernameUtente) {
        $this->usernameUtente = $usernameUtente;
    }

    function setVoto($voto) {
        $this->voto = $voto;
    }



    
}
