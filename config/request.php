<?php namespace config;
/**
* 
*/
class Request
{
	private $controlador;
	private $metodo;
	private $argumento;
	function __construct(){
		if (isset($_GET['url'])) {
			$ruta = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
			$ruta = explode("/", $ruta);
			$ruta = array_filter($ruta);
			//echo "$ruta[0]";
			if ($ruta[0] == "") {
				$this->controlador = "estudiantes";
			}else{
				$this->controlador = strtolower(array_shift($ruta));
			}
			//echo "$ruta";
			//print_r($ruta);

			$this->metodo = strtolower(array_shift($ruta));
			if (!$this->metodo) {
				$this->metodo = "index";
			}
			$this->argumento = $ruta; 
			//echo $this->controlador . $this->metodo . $this->argumento;
			
		}else{
			$this->controlador = INIT_CONTROLLER;
			$this->metodo = INIT_METODO;
		}
	}
	public function getControlador(){
		return $this->controlador;
	}

	public function getMetodo(){
		return $this->metodo;
	}

	public function getArgumento(){
		return $this->argumento;
	}
}