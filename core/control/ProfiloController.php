<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once CONTROL_DIR . "Controller.php";
include_once MODEL_DIR . "Utente.php";
include_once MODEL_DIR . "Annuncio.php";
include_once MODEL_DIR . "Esperienza.php";

class ProfiloController extends Controller{
    
    private static $GET_ALL_ANNUNCI_BY_EMAIL="SELECT * FROM `annuncio` WHERE `email_utente` = '%s'";
    private static $GET_UTENTE_BY_ID = "SELECT * FROM `utente` WHERE `id` = '%d'";
    private static $GET_ESPERIENZE_BY_EMAIL="SELECT * FROM `esperienza` WHERE `email_utente` = '%s'";
    private static $GET_UTENTE_EMAIL = "SELECT * FROM `utente` WHERE `e-mail` = '%s'";
    
    
    public function getEsperienzeByEmail($email) {
        $query = sprintf(self::$GET_ESPERIENZE_BY_EMAIL, $email);
        $res = Controller::getDB()->query($query);
        $esperienze = array();
        if($res){
            while ($obj = $res->fetch_assoc()) {
                $esperienza = new Esperienza($obj['id'], $obj['titolo'], $obj['data'], $obj['descrizione'], $obj['recensore'], $obj['voto'], $obj['email_utente']);
                $esperienza->setId($obj['id']);
                $esperienze[] = $esperienza;            }
        }
        return $esperienze;
    }
    
    public function getAnnunciByEmail($email) {
        $query = sprintf(self::$GET_ALL_ANNUNCI_BY_EMAIL, $email);
        $res = Controller::getDB()->query($query);
        $annunci = array();
        if($res){
            while ($obj = $res->fetch_assoc()) {
                $annuncio = new Annuncio($obj['id'], $obj['titolo'], $obj['data'], $obj['descrizione'], $obj['luogo'], $obj['data_pubblicazione'], $obj['tipologia'], $obj['email_utente']);
                $annuncio->setId($obj['id']);
                $annunci[] = $annuncio;            }
        }
        return $annunci;
    }
    
    public function getUtenteById($id){
        $query = sprintf(self::$GET_UTENTE_BY_ID, $id);

        $res = Controller::getDB()->query($query);
        return $this->parseUtente($res);
    }
    
    
    private function parseUtente($res) {
        if ($obj = $res->fetch_assoc()) {
            return new Utente($obj['nome'], $obj['cognome'], $obj['telefono'], $obj['e-mail'], $obj['citta'], $obj['password'], $obj['descrizione'], $obj['immagine'], $obj['tipologia'], $obj['data'], $obj['id']);
        } else {
            throw new ApplicationException(Error::$UTENTE_NON_TROVATO);
        }
    }
    
    
    
    
    
    
    
}