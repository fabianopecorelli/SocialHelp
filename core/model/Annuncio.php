<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Annuncio {
    
    private $id;
    private $titolo;
    private $data;
    private $descrizione;
    private $luogo;
    private $dataPubblicazione;
    private $tipologia;
    private $username;
    
    function __construct($id, $titolo, $data, $descrizione, $luogo, $dataPubblicazione, $tipologia, $username) {
        $this->id = $id;
        $this->titolo = $titolo;
        $this->data = $data;
        $this->descrizione = $descrizione;
        $this->luogo = $luogo;
        $this->dataPubblicazione = $dataPubblicazione;
        $this->tipologia = $tipologia;
        $this->username = $username;
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

    function getLuogo() {
        return $this->luogo;
    }

    function getDataPubblicazione() {
        return $this->dataPubblicazione;
    }

    function getTipologia() {
        return $this->tipologia;
    }

    function getUsername() {
        return $this->username;
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

    function setLuogo($luogo) {
        $this->luogo = $luogo;
    }

    function setDataPubblicazione($dataPubblicazione) {
        $this->dataPubblicazione = $dataPubblicazione;
    }

    function setTipologia($tipologia) {
        $this->tipologia = $tipologia;
    }

    function setUsername($username) {
        $this->username = $username;
    }



}