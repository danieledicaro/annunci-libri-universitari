<?php
//dobbiamo istanziare le nostre classe, abbiamo scelto FUtente
//per l'inclusione file, slide di Cicerone 09_PHP-OOP
function __autoload($class_name)
{
    if (strpos($class_name, "USingleton")===false) {             //se il nome della classe sta in foundation lo cerco lì, altrimenti cerco in foundation Utility
        include_once "Foundation/{$class_name}.php";
}
else {
    include_once "Foundation/Utility/{$class_name}.php";
}
}
    include_once "Foundation/FUtente.php";
    include_once "Foundation/Fdb.php";
    $fdb = new Fdb();
    $utente = new FUtente();
?>