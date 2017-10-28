<?php
global $config;

$config['debug']=false;
$config['db']['type'] = 'mysql';
$config['db']['user'] = 'unibookstore1';
$config['db']['password'] = '';
$config['db']['host'] = 'localhost';
$config['db']['dbname'] = 'my_unibookstore1';

$config['smarty']['template_dir'] = '/membri/unibookstore1/Templates/main/template';
$config['smarty']['compile_dir'] = '/membri/unibookstore1/Templates/main/templates_c/';
$config['smarty']['config_dir'] = '/membri/unibookstore1/Templates/main/configs/';
$config['smarty']['cache_dir'] = '/membri/unibookstore1/Templates/main/cache/';

function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


?>