<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 18/11/15
 * Time: 08:58
 */
define('ROOT_DIR', dirname(__FILE__)); //costante root dir
define('DOMINIO_SITO',"/SocialHelp"); //costante root dir
define('CORE_DIR', ROOT_DIR . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR); //costante core directory
define('VIEW_DIR', CORE_DIR . "view" . DIRECTORY_SEPARATOR); //ecc
define('EXCEPTION_DIR', CORE_DIR . "exception" . DIRECTORY_SEPARATOR);
define('MODEL_DIR', CORE_DIR . "model" . DIRECTORY_SEPARATOR);
define('CONTROL_DIR', CORE_DIR . "control" . DIRECTORY_SEPARATOR);
define('UPLOADS_DIR', DOMINIO_SITO . "/uploads/");
define('STYLE_DIR', DOMINIO_SITO . DIRECTORY_SEPARATOR . "style" . DIRECTORY_SEPARATOR);
define('UTILS_DIR', CORE_DIR . "utils" . DIRECTORY_SEPARATOR);
define('DEBUG', false);
 
try {
    if (DEBUG == true) {
        ini_set("max_execution_time", '30');
        ini_set('display_errors', 'on');
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 'off');
    }
 
    /*
     * URL Parsing, in pratica qualsiasi richiesta al sito arriva a questo file,
     * e quindi possiamo ricavare la richiesta da $_SERVER['SCRIPT_NAME']
     *
     * Successivamente rimuovo tutto ciò che non dovrebbe stare nella richiesta e faccio split
     *
     */
    $_URL = preg_replace("/^(.*?)index.php$/", "$1", $_SERVER['SCRIPT_NAME']);
    $_URL = preg_replace("/^" . preg_quote($_URL, "/") . "/", "", urldecode($_SERVER['REQUEST_URI']));
    $_URL = preg_replace("/(\/?)(\?.*)?$/", "", $_URL);
    $_URL = explode("/", $_URL);
    if (preg_match("/^index.(?:html|php)$/i", $_URL[count($_URL) - 1]))
        unset($_URL[count($_URL) - 1]);
    // definisco costante IP contenente l'ip del client
    if (isset($_SERVER['HTTP_X_REAL_IP'])) {
        define('IP', $_SERVER['HTTP_X_REAL_IP']);
    } else {
        define('IP', $_SERVER['REMOTE_ADDR']);
    }
    session_start(); //facciamo partire la sessione
    include_once UTILS_DIR . "Patterns.php";
    include_once UTILS_DIR . "Error.php";
    include_once UTILS_DIR . "StringUtils.php";
    include_once EXCEPTION_DIR . "ApplicationException.php";
 
    if (!defined("TESTING")) {
        switch (isset($_URL[0]) ? $_URL[0] : '') {
            case '':
                include_once VIEW_DIR. "home.php";
                break;
//            case 'template':
//                include_once "template.html";
//                break;
            case 'inserisciEsperienza':
                StringUtils::checkPermission("Cliente");
                include_once VIEW_DIR . "inserisciEsperienza.php";
                break;
//             case 'standard':
//                include_once "standard.html";
//                break;
             case 'inserisciAnnuncio':
                StringUtils::checkPermission("all");
                include_once VIEW_DIR . "inserisciAnnuncio.php";
                break;
            case 'ricercaAnnuncio':
                StringUtils::checkPermission("all");
                include_once VIEW_DIR . "ricercaAnnuncio.php";
                break;
            case 'profilo':
                StringUtils::checkPermission("all");
                include_once VIEW_DIR . "profilo.php";
                break;
            case 'auth':
                StringUtils::checkPermission("not_logged");
                include_once VIEW_DIR . "login.php";
                break;
            case 'register':
                StringUtils::checkPermission("not_logged");
                include_once VIEW_DIR . "register.php";
                break;
            case 'effettuaRegistrazione':
                StringUtils::checkPermission("not_logged");
                include_once CONTROL_DIR . "Register.php";
                break;
            case 'inserimentoAnnuncio':
                StringUtils::checkPermission("all");
                include_once CONTROL_DIR . "InserisciAnnuncio.php";
                break;
            case 'inserimentoEsperienza':
                StringUtils::checkPermission("all");
                include_once CONTROL_DIR . "InserisciEsperienza.php";
                break;
            case 'effettuaLogin':
                StringUtils::checkPermission("not_logged");
                include_once CONTROL_DIR . "Login.php";
                break;
            case 'logout':
                StringUtils::checkPermission("all");
                include_once CONTROL_DIR . "Logout.php";
                break;
            case 'livesearch':
                include_once CONTROL_DIR . "SearchController.php";
                break;
            case 'cercaUtente':
                include_once CONTROL_DIR . "UtenteFinder.php";
                break;
            case 'cercaAnnunci':
                StringUtils::checkPermission("all");
                include_once CONTROL_DIR . "CercaAnnunci.php";
                break;
            default:
                header('Location: '.DOMINIO_SITO.'/');
                exit;
        }
    }
} catch (Exception $ex) {
    if (DEBUG == true) throw $ex;
    include_once VIEW_DIR . "design/fatalException.php";
}
