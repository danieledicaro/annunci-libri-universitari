<?php
// BEGIN - FUNZIONAMENTO LOCALE
$locale['flag'] = true; // true per abilitare il funzionamento in locale
if ( $locale['flag'] ) {
    $locale['so'] = 'unix'; // 'unix' per linux e 'ms' per windows
    $locale['unix'] = '/opt/lampp/htdocs/WebProg/unibookstore'; // se usi linux inserisci qui il percorso
    $locale['ms'] = 'C:/xampp/htdocs/unibookstore"'; // se usi windows inserisci qui il percorso
    locale($locale);
}
/*
 * su linux bisogna modificare i permessi della cartella "Templates"
 * da terminale posizionarsi nella cartella "Templates" ed eseguire il comando "sudo chmod 777 -R ./"
 */
// END - FUNZIONAMENTO LOCALE
// BEGIN - VARIABILI DI SISTEMA
$subPath = '/WebProg/unibookstore'; // path relativo (se l'applicazione non è nella root)
$appPath = 'http://'.$_SERVER['SERVER_NAME'].$subPath;
$webservice = $appPath.'/WebService/'; // path del web service

global $config;
$config['debug']= false;
// BEGIN - DATABASE da impostare
$config['db']['type'] = 'mysql';
$config['db']['user'] = 'root';
$config['db']['password'] = '';
$config['db']['host'] = '127.0.0.1';
$config['db']['dbname'] = 'Unibookstore';
// END - DATABASE
$config['smarty']['template_dir'] .= '/Templates/main/template';
$config['smarty']['compile_dir'] .= '/Templates/main/templates_c/';
$config['smarty']['config_dir'] .= '/Templates/main/configs/';
$config['smarty']['cache_dir'] .= '/Templates/main/cache/';
// END - VARIABILI DI SISTEMA
function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}
function locale($locale) {
    global $config;
    $config['smarty']['template_dir'] = $locale[$locale['so']];
    $config['smarty']['compile_dir'] = $locale[$locale['so']];
    $config['smarty']['config_dir'] = $locale[$locale['so']];
    $config['smarty']['cache_dir'] = $locale[$locale['so']];
}
?>