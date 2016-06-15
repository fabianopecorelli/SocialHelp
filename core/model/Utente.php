<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Utente {
    
    private $nome;
    private $cognome;
    private $telefono;
    private $email;
    private $citta;
    private $password;
    private $username;
    private $descrizione;
    private $immagine;
    private $tipologia;
    private $data;
    
    
    public function __construct($nome, $cognome, $telefono, $email, $citta, $password, $username, $descrizione, $immagine, $tipologia, $data) {

        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->telefono=$telefono;
        $this->email=$email;
        $this->citta=$citta;
        $this->password=$password;
        $this->username=$username;
        $this->descrizione=$descrizione;
        $this->immagine=$immagine;
        $this->tipologia=$tipologia;
        $this->data=$data;
    }
    
    public function getNome() {
        return $this->nome;
    }
    
    public function getCognome() {
        return $this->cognome;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getCitta() {
        return $this->citta;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getDescrizione() {
        return $this->descrizione;
    }
    
    public function getImmagine() {
        return $this->immagine;
    }
    
    public function getTipologia() {
        return $this->tipologia;
    }
    
    public function getData() {
        return $this->data;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCognome($cognome) {
        $this->cognome = $cognome;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCitta($citta) {
        $this->citta = $citta;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }

    function setImmagine($immagine) {
        $this->immagine = $immagine;
    }

    function setTipologia($tipologia) {
        $this->tipologia = $tipologia;
    }

    function setData($data) {
        $this->data = $data;
    }


}
