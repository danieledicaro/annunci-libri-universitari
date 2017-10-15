<?php
global $config;

$config['debug']=false;
$config['db']['type'] = 'mysql';
$config['db']['user'] = 'root';
$config['db']['password'] = '';
$config['db']['host'] = '127.0.0.1';
$config['db']['dbname'] = 'Unibookstore';

$pathPERSONALE = '/opt/lampp/htdocs/WebProg/annunci-libri-universitari';

$config['smarty']['template_dir'] =
    $pathPERSONALE.'/Templates/main/template';
$config['smarty']['compile_dir'] =
    $pathPERSONALE.'/Templates/main/templates_c/';
$config['smarty']['config_dir'] =
    $pathPERSONALE.'/Templates/main/configs/';
$config['smarty']['cache_dir'] =
    $pathPERSONALE.'/Templates/main/cache/';


function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


?>