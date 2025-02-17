<?php

session_start();

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$autoload = function($class){
include('classes/'.$class.'.php');
};

spl_autoload_register($autoload);

define('INCLUDE_PATH','http://localhost/sissrh/');
//define('BASE_DIR_PAINEL',__DIR__.'/painel/');

//Conectar com o banco de dados
define('HOST','172.31.131.10');
//define('HOST','172.31.131.15');
define('DB','BDSSRH');
define('USER','rh');
define('PASS','rhdonarita');


?>