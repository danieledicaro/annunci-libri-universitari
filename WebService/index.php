<?php

//$libro1 = (object) array('isbn' => '1234', 'titolo' => 'Titolo1', 'autore' => 'Autore1', 'casaeditrice' => 'casaeditrice1',
                            // 'anno_stampa' => '2000', 'ambito' => 'scientifico');

header("Content-type:application/json");
$webserviceurl = "http://localhost/WebProg/unibookstore/WebService/";
$file = cerca($_REQUEST['isbn']);
if ( $file ) {
    $jsonurl = $webserviceurl.$file;
    echo file_get_contents($jsonurl);
}


function cerca($isbn) {

    switch ($isbn) {
        case '1234':
            return "libro1.json";
        case '5678':
            return "libro2.json";
        default:
            return false;
    }
}


?>