<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once CONTROL_DIR . 'Controller.php';
static $SALT = "r#*1542&ztnsa7uABN83gtkw7lcSjy";
static $SELECT_UTENTE = "SELECT * FROM `utente` WHERE `password`='%s' LIMIT 1";
include_once MODEL_DIR . 'Utente.php'; 

login($_POST['email'], $_POST['password'], (@$_POST['remember'] == "1" ? true : false));

function login($email, $password, $remember) {
    if (!preg_match(Patterns::$EMAIL, $email)) {
        throw new ApplicationException(Error::$EMAIL_NON_VALIDA);
    }
    if (strlen($password) < Config::$MIN_PASSWORD_LEN) {
        throw new ApplicationException(Error::$PASS_CORTA);
    }

    $user = getUtente($email, $password);

    $_SESSION['loggedin'] = true;
    $_SESSION['user'] = $user;

    if ($remember) {
        setPermanentCookie($user->getPassword());
    }

    return $user;
}

/**
     * Restituisce utente dato email e password
     * @param $email La mail dell'utente
     * @param $password La password dell'utente
     * @return Utente L'utente
     * @throws ConnectionException
     * @throws ApplicationException
     */
    function getUtente($email, $password) {
        return getUtenteByIdentity(createIdentity($email, $password));
    }

    /**
     * @param $identity L'identità dell'utente
     * @return Utente L'utente trovato
     * @throws ConnectionException
     * @throws ApplicationException
     */
    function getUtenteByIdentity($identity) {
        $qr = sprintf(self::$SELECT_UTENTE, $identity);

        $res = Controller::getDB()->query($qr);
        return parseUtente($res);
    }
    
    /**
     * Serializza tupla dal db in un oggetto Utente
     * @param mysqli_result $res
     * @return Utente
     * @throws ApplicationException [$UTENTE_NON_TROVATO]
     */

    function parseUtente($res) {
        if ($obj = $res->fetch_assoc()) {
            return new Utente($obj['nome'], $obj['cognome'], $obj['telefono'], $obj['e-mail'], $obj['citta'], $obj['password'], $obj['username'], $obj['descrizione'], $obj['immagine'], $obj['tipologia'], $obj['data']);
        } else {
            throw new ApplicationException(Error::$UTENTE_NON_TROVATO);
        }
    }
    
    /**
     * Setta il cookie permanente nel browser
     * @param $getPassword identity dell'utente
     */
    function setPermanentCookie($getPassword) {
        $getPassword = $getPassword . "|" . md5(uniqid());
        setcookie(Config::$PERMA_COOKIE, StringUtils::encrypt($getPassword), time() + 365 * 24 * 60 * 60);
    }
    
    function createIdentity($email, $pass) {
        return md5(md5(strtolower($email) . $pass . self::$SALT) . self::$SALT);
    }