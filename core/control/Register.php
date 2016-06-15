<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once CONTROL_DIR . 'Controller.php';
include_once MODEL_DIR . "Utente.php";
include_once EXCEPTION_DIR . "IllegalArgumentException.php";



register($_POST['nome'], $_POST['cognome'], $_POST['telefono'], $_POST['tipologia'], $_POST['e-mail'], $_POST['data-nascita'], $_POST['citta'], $_POST['descrizione'], $_POST['password'], $_POST['immagine'] = "aaa");
$_SESSION['loggedin'] = true;
$_SESSION['user'] = $user;

function register($nome, $cognome, $telefono, $tipologia, $email, $dataNascita, $citta, $descrizione, $password, $imagePath) {
    if (!preg_match(Patterns::$NAME_GENERIC, $nome)) {
        throw new IllegalArgumentException("Nome assente oppure errato");
    }
    if (!preg_match(Patterns::$NAME_GENERIC, $cognome)) {
        throw new IllegalArgumentException("Cognome assente oppure errato");
    }
    if (!preg_match(Patterns::$TELEPHONE, $telefono)) {
        throw new IllegalArgumentException("Nome assente oppure errato");
    }
    if (!in_array($tipologia, Config::$TIPI_UTENTE) || $tipologia == "admin") {
        throw new IllegalArgumentException("Tipo utente errato");
    }
    if (!preg_match(Patterns::$EMAIL, $email)) {
        throw new IllegalArgumentException("Email non valido");
    }
    if (!preg_match(Patterns::$GENERIC_DATE, $dataNascita)) {
        throw new IllegalArgumentException("Matricola non valida");
    }
    if (!preg_match(Patterns::$NAME_GENERIC, $citta)) {
        throw new IllegalArgumentException("Città assente oppure errato");
    }
    if (strlen($password) < Config::$MIN_PASSWORD_LEN) {
        throw new IllegalArgumentException("Password è troppo corta");
    }
    return createUtente(new Utente($nome, $cognome, $telefono, $email, $citta, $password, $descrizione, $imagePath, $tipologia, $dataNascita));
}

function createUtente($utente) {
    $ident = createIdentity($utente->getEmail(), $utente->getPassword());
    $utente->setPassword($ident);
    $utente->setNome(mysqli_real_escape_string(Controller::getDB(), $utente->getNome()));
    $utente->setCognome(mysqli_real_escape_string(Controller::getDB(), $utente->getCognome()));
    
    $INSERT_UTENTE = "INSERT INTO utente VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');";
    
    $query = sprintf($INSERT_UTENTE, $utente->getNome(), $utente->getCognome(), $utente->getTelefono(), $utente->getEmail(), $utente->getCitta(), $ident, $utente->getDescrizione(), $utente->getImmagine(), $utente->getTipologia(), $utente->getData());
    echo $query;
    if (!Controller::getDB()->query($query)) {
        if (Controller::getDB()->errno == 1062) {
            throw new ApplicationException(Error::$EMAIL_ESISTE, Controller::getDB()->error, Controller::getDB()->errno);
        } else
            throw new ApplicationException(Error::$INSERIMENTO_FALLITO, Controller::getDB()->error, Controller::getDB()->errno);
    }
    return $utente;
}

function createIdentity($email, $pass) {
    $SALT = "r#*1542&ztnsa7uABN83gtkw7lcSjy";
    return md5(md5(strtolower($email) . $pass . $SALT) . $SALT);
}

include_once VIEW_DIR . "home.php";
