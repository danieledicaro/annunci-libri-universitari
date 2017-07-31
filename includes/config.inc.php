<?php
global $config;

$config['debug']=true;
$config['db']['type'] = 'mysql';
$config['db']['user'] = 'root';
$config['db']['password'] = '';
$config['db']['host'] = '127.0.0.1';
$config['db']['dbname'] = 'Unibookstore';


function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


?>