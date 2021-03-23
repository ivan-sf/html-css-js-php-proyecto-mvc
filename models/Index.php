<?php namespace models;

/**
* 
*/
class Index
{

	function __construct(){
		$this->conexion = new Conexion;
	}

	public function set($atributo, $parametro){
		$this->$atributo = $parametro;
	}

	public function get($atributo){
		return $this->$atributo;
	}
	public function index(){
		echo "Hello friend on model <br>";
		if($this->conexion){
			echo "Conexion a la bd desde model <br>";
		}else{
			echo "no";
		}
	}	
}
