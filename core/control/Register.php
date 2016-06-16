<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once CONTROL_DIR . 'Controller.php';
include_once MODEL_DIR . "Utente.php";
include_once EXCEPTION_DIR . "IllegalArgumentException.php";



$utente = register($_POST['nome'], $_POST['cognome'], $_POST['telefono'], $_POST['tipologia'], $_POST['e-mail'], $_POST['data-nascita'], $_POST['citta'], $_POST['descrizione'], $_POST['password'], null);
$newUtente = getUtente($utente->getEmail());
$idUtente = $newUtente->getID();
if (!($imageName = uploadImage($idUtente))) {
    echo "UPLOAD FAILED";
}
else{
    echo "ERRORE CARICAMENTO";
}
$imagePath = UPLOADS_DIR . "images/profile/" . $imageName;
$newUtente->setImmagine($imagePath);
updateUtente($newUtente);

$_SESSION['loggedin'] = true;
$_SESSION['user'] = serialize($newUtente);

//$_SESSION['loggedin'] = true;
//$_SESSION['user'] = $user;

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
    //CONVERT TO DATETIME
    $dataNascita = str_replace('/', '-', $dataNascita);
    $birthDate = date("Y-m-d H:i:s", strtotime($dataNascita));
    return createUtente(new Utente($nome, $cognome, $telefono, $email, $citta, $password, $descrizione, $imagePath, $tipologia, $birthDate));
}

function createUtente($utente) {
    $ident = createIdentity($utente->getEmail(), $utente->getPassword());
    $utente->setPassword($ident);
    $utente->setNome(mysqli_real_escape_string(Controller::getDB(), $utente->getNome()));
    $utente->setCognome(mysqli_real_escape_string(Controller::getDB(), $utente->getCognome()));

    $INSERT_UTENTE = "INSERT INTO `utente` (`nome`, `cognome`, `telefono`, `e-mail`, `citta`, `password`, `descrizione`, `immagine`, `tipologia`, `data`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');";

    $query = sprintf($INSERT_UTENTE, $utente->getNome(), $utente->getCognome(), $utente->getTelefono(), $utente->getEmail(), $utente->getCitta(), $ident, $utente->getDescrizione(), $utente->getImmagine(), $utente->getTipologia(), $utente->getData());

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

function uploadImage($idUtente) {
    $target_dir = ROOT_DIR . "/uploads/images/profile/";
    $target_file = $target_dir . basename($_FILES["immagine"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $imageName = $idUtente . "." . $imageFileType;
    $target_file = $target_dir . basename($imageName);
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["immagine"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo 'errore 1';
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        
            echo 'errore 2';
        $uploadOk = 0;
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        
            echo 'errore 3';
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false;
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["immagine"]["tmp_name"], $target_file)) {
            return $imageName;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}

function updateUtente($newUtente) {
    $query = "UPDATE `utente` SET `immagine`='" . $newUtente->getImmagine() . "' WHERE `e-mail` = '" . $newUtente->getEmail() . "'";
    $res = Controller::getDB()->query($query);
}

function getUtente($email) {
    $query = "SELECT * FROM `utente` WHERE `e-mail` = '" . $email . "'";
    $res = Controller::getDB()->query($query);
    $obj = $res->fetch_assoc();
    if ($obj) {
        return new Utente($obj['nome'], $obj['cognome'], $obj['telefono'], $obj['e-mail'], $obj['citta'], $obj['password'], $obj['descrizione'], $obj['immagine'], $obj['tipologia'], $obj['data'], $obj['id']);
    } else {
        throw new ApplicationException(Error::$UTENTE_NON_TROVATO);
    }
}

header("Location:".DOMINIO_SITO."/");
