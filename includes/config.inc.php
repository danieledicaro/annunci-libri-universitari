<?php
global $config;

$config['debug']=false;
$config['db']['type'] = 'mysql';
$config['db']['user'] = 'root';
$config['db']['password'] = '';
$config['db']['host'] = '127.0.0.1';
$config['db']['dbname'] = 'Unibookstore';

$config['smarty']['template_dir'] =
    'C:\xampp\htdocs\progetto_bookstore\bookstore\templates\main\template';
$config['smarty']['compile_dir'] =
    '/opt/lampp/htdocs/unibookstore/templates/main/templates_c/';
$config['smarty']['config_dir'] =
    '/opt/lampp/htdocs/unibookstore/templates/main/configs/';
$config['smarty']['cache_dir'] =
    '/opt/lampp/htdocs/unibookstore/templates/main/cache/';


function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


?>