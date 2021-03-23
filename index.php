<?php
date_default_timezone_set('America/Bogota');
error_reporting(E_ALL);
ini_set('display_errors', '1');

//DIR
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__FILE__)) . DS);
define('DIRAPP', 'irocket');
define("URL", 'http://localhost/' . DIRAPP . "/");
define("URL_SITIO", "#");
define("TITLE_APP", "TITAN COMERCIAL");
//DATABASE
define('HOSTDB', 'localhost');
define('DB', 'irocket');
define('USERDB', 'root');
define('PASSDB', '');
//INIT CONTROLLER AND METHOD
define("INIT_CONTROLLER", "index");
define("INIT_METODO", "index");
require_once("config/autoload.php");
config\autoload::Run();
config\routes::run(new config\request());
?>