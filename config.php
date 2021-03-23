<?php 
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__FILE__)) . DS);
define('DB', 'irocket');
define('DIRAPP', 'irocket');
define('HOSTDB', 'localhost');
define('USERDB', 'root');
define('PASSDB', '');
define("URL", 'http://localhost/' . DIRAPP . "/");
define("URL_SITIO", "#");
$con  = new mysqli(HOSTDB,USERDB,PASSDB,DB);
?>