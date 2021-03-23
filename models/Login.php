<?php namespace models;

/**
* 
*/
class Login
{
	private $usuario;
	private $caja;
	private $pass;

	function __construct(){
		$this->con = new Conexion;
	}

	public function set($atributo, $parametro){
		$this->$atributo = $parametro;
	}

	public function get($atributo){
		return $this->$atributo;
	}
	
	public function auth()
	{
		$connect = $this->con->connect();
		$usuario = strtolower(mysqli_real_escape_string($connect,$this->usuario));
		$pass = mysqli_real_escape_string($connect,$this->pass);
		$caja = mysqli_real_escape_string($connect,$this->caja);
		if ($usuario != '' && $pass != '') {
			$password = base64_encode($pass);
			$sql = "SELECT * FROM users INNER JOIN userdetails ON idusers=users_idusers WHERE userName='$usuario' AND password = '$password' OR documentUser='$usuario' AND password = '$password'";
			$query = $this->con->returnConsulta($sql);
			$row = mysqli_num_rows($query);
			$array = mysqli_fetch_array($query);
			if ($row == 1) {
				
					//echo "Usuario encontrado verificar tipo de usuario";
					$permits = $array['range'];
					$numSes = $array['numSes'];
					$stateBD = $array['stateBD'];

					if ($stateBD == 0) {
    					header("location:" . URL . "login?error=datos");
					}


					if ($permits == 9 AND $stateBD == 1 OR $permits == 1 AND $stateBD == 1 OR $permits == 8 AND $stateBD == 1 OR $permits == 5 AND $stateBD == 1) {
						
						if ($numSes <= 50) {
							$newSes = $numSes + 1;
    						$sql = "UPDATE `users` SET `numSes`='$newSes' WHERE `idusers`='1'";
							$query = $this->con->consulta($sql);
							if($query){
    							session_start();
								$_SESSION['adminUserNew'] = $array['idusers'];
							}
    						if ($permits == 1) {
    							session_start();
								//Sesion de empleado
								$_SESSION['empleado'] = $array['idusers'];
								$_SESSION['cash'] = $caja;
								//echo $_SESSION['adminUserNew'];
    						}else if ($permits == 9 OR $permits == 5) {
								//ADMIN
    							session_start();
								$_SESSION['administrador'] = $array['idusers'];
								$_SESSION['cash'] = $caja;
							}else if ($permits == 8) {
    							session_start();
								$_SESSION['contable'] = $array['idusers'];
								$_SESSION['cash'] = $caja;
							}
						}else{
							
					}
						
					}elseif($permits == 1){
					    
					}elseif($permits == 2){
						echo "Clientes";
					}elseif($permits == 3){
						echo "Proveedor";
					}elseif($permits == 4) {
						echo "Sistemas";
					}elseif($permits == 5){
						echo "Caja";
					}else{
						echo "Ah ocurrido un problema al verificar los permisos de ususario durante el proceso de autentificacion, le aconsejamos contactar con el soporte tecnico.";
					}
}
				
			else{
    			header("location:" . URL . "login?error=datos");
			}
		}else{
			echo "No ha ingresado datos en los campos.";
		}
	}
	
}
