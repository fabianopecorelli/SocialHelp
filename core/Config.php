<?php

/**
 * Created by Netbeans.
 * User: Fabiano
 * Date: 30/05/16
 * Time: 09:09
 */

/**
 * Classe che contiene tutte configurazioni necessarie per il funzionamento del sistema
 */
class Config {

    public static $DB_URL = "5.9.123.184";
    public static $DB_NAME = "simplex";
    public static $DB_USER = "simlex-user";
    public static $DB_PASS = "WtC7kllj";

    public static $PERMA_COOKIE = "permaCookie";

    /**
     *  Varie configurazioni
     */
    public static $MIN_PASSWORD_LEN = 8;    //minima lunghezza della password
    public static $TIPI_UTENTE = array('Disabile', 'Offerente', 'Guest');
    public static $LOG_LEVEL = 0; //0 Debug, 1 Info, 2 Warning, 3 Error
}