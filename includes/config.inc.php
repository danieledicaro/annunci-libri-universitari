<?php
global $config;

$config['debug']=false;
$config['db']['type'] = 'mysql';
$config['db']['user'] = 'root';
$config['db']['password'] = '';
$config['db']['host'] = 'localhost';
$config['db']['dbname'] = 'annunci-libri-universitari';


function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


?>