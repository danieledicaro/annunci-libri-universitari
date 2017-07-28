<?php
/**
 * Created by PhpStorm.
 * User: enrico
 * Date: 24/07/17
 * Time: 12.18
 */
include ("./Utility/USingleton.php");
include ("../includes/config.inc.php");
include ("../Entity/EUtente.php");
include ("Fdb.php");
include ("FUtente.php");
include ("FLibro.php");
$db = new FUtente();
var_dump($db);
//$dbl = new FLibro();
/*$foo=array(
    "username" => "ciao",
    "password" => "ciao",
    "tipologia_utente" => 0,
    "nome" => NULL,
    "cognome" => NULL,
    "mail" => "ciao@ciao.com",
    "stato" => "IT"
    );
$dbu->store($foo);*/
/*$user = $db->load('daniele');
echo $user->mail."\r\n";
//$db->delete($user);
//$db->close();*/
?>