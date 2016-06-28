<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once CONTROL_DIR . 'Controller.php';
include_once MODEL_DIR . 'Esperienza.php';
include_once MODEL_DIR . 'Utente.php';
include_once EXCEPTION_DIR . "IllegalArgumentException.php";


$utente=unserialize($_SESSION['user']);//QUI DA RIVEDERE!!!
$esperienza = inserisciEsperienza(strip_tags(htmlspecialchars($_POST['titolo'])), strip_tags(htmlspecialchars($_POST['descrizione'])), $_GET['voto'],$utente->getEmail(), $_GET['email_utente']);



function inserisciEsperienza($titolo, $descrizione, $voto, $recensore,$email) {
    if (!preg_match(Patterns::$NAME_GENERIC, $titolo)) {
        throw new IllegalArgumentException("Titolo assente oppure errato");
    }
    if (!preg_match(Patterns::$NAME_GENERIC, $descrizione)) {
        throw new IllegalArgumentException("Descrizione assente oppure errato");
    }
    if (!preg_match(Patterns::$EMAIL, $recensore)) {
        throw new IllegalArgumentException("Email non valida");
    }
    if (!preg_match(Patterns::$EMAIL, $email)) {
        throw new IllegalArgumentException("Email non valida");
    }
    //CONVERT TO DATETIME
    $dataPubblicazione= new DateTime();
    $dataPub=$dataPubblicazione->format("Y-m-d H:i:s");
    return createEsperienza(new Esperienza(null,$titolo, $dataPub, $descrizione, $recensore, $email, $voto));
}

function createEsperienza($esperienza) {
    
    $INSERT_ESPERIENZA = "INSERT INTO `esperienza`(`titolo`, `data`, `descrizione`, `recensore`, `voto`, `email_utente`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s');";

    $query = sprintf($INSERT_ESPERIENZA, $esperienza->getTitolo(), $esperienza->getData(), $esperienza->getDescrizione(), $esperienza->getRecensore(), $esperienza->getVoto(),$esperienza->getEmailUtente());
    if (!Controller::getDB()->query($query)) {
        if (Controller::getDB()->errno == 1062) {
            throw new ApplicationException(Error::$EMAIL_ESISTE, Controller::getDB()->error, Controller::getDB()->errno);
        } else
            throw new ApplicationException(Error::$INSERIMENTO_FALLITO, Controller::getDB()->error, Controller::getDB()->errno);
    }
    return $esperienza;
}

header("Location:".DOMINIO_SITO."/");