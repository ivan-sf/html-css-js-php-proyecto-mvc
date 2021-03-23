<?php namespace controllers;
$metodo = $request->getMetodo();
/**
* 
*/
use models\Conexion as conexion;
use models\Index as index;


class indexController
{
	function __construct()
	{
		$this->index = new Index();
	}
	public function index()
	{
		$this->conexion = new Conexion;
		$this->index->index();
		echo "Hello friend on controller <br>";
		if($this->conexion){
			echo "Conexion a la bd desde controller <br>";
		}else{
			echo "no";
		}
	}
}

