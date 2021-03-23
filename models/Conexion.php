<?php namespace models;



class Conexion
{

	private $datos = array(
	
		// 'HOST' => "mysql.hostinger.co", 
		// 'USER' => "u254469571_titanroot", 
		// 'PASS' => "Root1234", 
		// 'DB' => "u254469571_titan"
		'HOST' => HOSTDB, 
		'USER' => USERDB, 
		'PASS' => PASSDB, 
		'DB' => DB
	);
	private $con;

	public function __construct(){
		$this->con = new \mysqli($this->datos['HOST'],$this->datos['USER'],$this->datos['PASS'],$this->datos['DB']);
		if ($this->con -> connect_errno ) { 
			printf ( "Connect failed: %s\n" , $this->con -> connect_error ); 
			//header("location:".URL."database");
		}else{
			echo "Connect to db";
			//printf("Conectado");
		}
		if ( $this->con -> ping ()) { 
			//printf ( "Our connection is ok!\n" ); 
		} else { 
			printf ( "Error ping: %s\n" , $this->con -> error ); 
		} 

	}

	public function consulta($sql){
		$query = $this->con->query($sql);
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}

	public function returnConsulta($sql)
	{
		$datos = $this->con->query($sql);
		return $datos;
	}

	function __destruct(){
		mysqli_close($this->con);
	}

	public function connect()
	{
		$this->con = new \mysqli($this->datos['HOST'],$this->datos['USER'],$this->datos['PASS'],$this->datos['DB']);
		if ($this->con -> connect_errno ) { 
			printf ( "Connect failed: %s\n" , $this->con -> connect_error ); 
		}else{
			return $this->con;
			echo "Connect to db";
		}
		if ( $this->con -> ping ()) {
			
			//printf ( "Our connection is ok!\n" ); 
		} else { 
			printf ( "Error ping: %s\n" , $this->con -> error ); 
		}
	}


}