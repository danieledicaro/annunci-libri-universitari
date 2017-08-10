<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 24/07/17
 * Time: 12.18
 */
//include ("./Utility/USingleton.php");
include ("../includes/config.inc.php");
include ("../Entity/EUtente.php");
include ("./Fdb.php");
include ("./FUtente.php");
include ("./FLibro.php");
include ("../Entity/ELibro.php");
include ("./FAnnuncio.php");
include ("../Entity/EAnnuncio.php");
include ("FConversazione.php");
include ("../Entity/EMessaggio.php");
include ("../Entity/EConversazione.php");
include ("FCatalogo.php");
include ("../Entity/ECatalogo.php");
include ("../Entity/EBoxmail.php");
include ("FBoxmail.php");
$db = new FBoxmail();
//$dbl = new FLibro();
//$dba = new FAnnuncio();
/*$foo=array(
    "username" => "ciao",
    "password" => "ciao",
    "tipologia_utente" => 0,
    "nome" => NULL,
    "cognome" => NULL,
    "mail" => "ciao@ciao.com",
    "stato" => "IT"
    );
/*$foo = array(
    "id_annuncio" => "",
    "libro" => 9788879591379,
    "venditore" => "ciao",
    "corso" => 1,
    "citta_consegna" => 1,
    "se_spedisce" => 1,
    "descrizione" => "",
    "condizione" => "",
);*/
$a = $db->pop('daniele');
var_dump($a->getConversazioni());
/*$a = array('', '', '', '', '', '');
$foo = array($a, 'data', '');
$annuncio = $db->search($foo);
var_dump($annuncio->getObjectVars());
$foo = array('daniele',1);
$conversazione = $db->load($foo);
var_dump($conversazione);
$db->store($foo);
$annuncio = $dba->load(1);
var_dump($annuncio->getObjectVars());
$libro = $dbl->load('9788879591379');
$user = $db->load('ciao');
/*echo $user->mail."\r\n";
$db->update($foo);
$db->delete($user);
$db->close();*/
?>