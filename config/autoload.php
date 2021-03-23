<?php namespace config;

class Autoload{
	public static function Run(){
		spl_autoload_register(function($class){
			$ruta = str_replace("\\", "/", $class) . ".php";
			//echo $ruta;
			include_once $ruta;
		});
	}
}