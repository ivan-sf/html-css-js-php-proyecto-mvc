<?php namespace config;

/**
* 
*/
class Routes
{
	
	public static function run(request $request){
		$controlador = $request->getControlador() . "Controller";
		//print_r($controlador);
		$ruta = ROOT . "controllers" . DS . $controlador . ".php";
		$metodo = $request->getMetodo();
		$argumento = $request->getArgumento();
		//echo "$metodo";

		if (is_readable($ruta)) {
			include_once $ruta;
			$mostrar = "Controllers\\" . $controlador;
			$controlador = new $mostrar;
			if (!isset($argumento)) {
				$datos = call_user_func(array($controlador, $metodo));
			}else{
				$datos = call_user_func_array(array($controlador, $metodo), $argumento);
			}
		}

		//CARGAR VISTAS
		$ruta = ROOT . "views/snippets/layout/pages" . DS . $request->getControlador() . DS . $request->getMetodo() . ".php";
		if (is_readable($ruta)) {
			require_once $ruta;
		}else{
			echo "<br>$ruta<br>No se encontro la ruta de la vista<br>";
		}

	}
}