<?php
global $config;

$config['debug']=false;
$config['db']['type'] = 'mysql';
$config['db']['user'] = 'unibookstore1';
$config['db']['password'] = '';
$config['db']['host'] = 'localhost';
$config['db']['dbname'] = 'my_unibookstore1';

$pathPersonale = 'C:\xampp\htdocs\annunci-libri-universitari';
$config['smarty']['template_dir'] = $pathPersonale;
$config['smarty']['compile_dir'] = $pathPersonale;
$config['smarty']['config_dir'] = $pathPersonale;
$config['smarty']['cache_dir'] = $pathPersonale;


function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


?>