<?php namespace controllers;
$metodo = $request->getMetodo();
/**
* 
*/
use models\Conexion as conexion;
use models\Login as login;
use models\Company as company;
use models\User as user;
use models\DepositAccount as depositaccount;
use models\Cash as cash;

class loginController
{
	public function index()
	{
		if (isset($_POST['usuario']) && isset($_POST['pass'])) {
			$this->conexion = new Conexion();
			$this->login = new Login();
			$this->login->set("usuario", $_POST['usuario']);
			$this->login->set("pass", $_POST['pass']);
			$this->login->set("caja", $_POST['caja']);
			$this->login->auth();

		}
		if (isset($_POST['name_company'])) {
			$this->conexion = new Conexion();
			$this->company = new Company();
			$this->company->set("companyName", $_POST['name_company']);
			$this->company->set("companyNit",$_POST['companyNit']);
			$this->company->set("companyDirection",$_POST['direction']);
			$this->company->set("companyCity",$_POST['city']);
			$this->company->set("companyPhone",$_POST['tel']);
			$this->company->set("companyEmail",$_POST['mail']);
			$this->company->set("regimen",$_POST['regimen']);
			$this->company->set("nameUser",$_POST['nameUser']);
			$this->company->set("lastnameUser",$_POST['lastnameUser']);
			$this->company->set("companyLogo",$_FILES['companyLogo']['tmp_name']);
			$this->company->set("companyLogoNameTemp",$_FILES['companyLogo']['name']);
			$this->company->set("companyLogoSize",$_FILES['companyLogo']['size']);
			$this->company->set("companyLogoType",$_FILES['companyLogo']['type']);
			$datos = $this->company->view();
			$this->company->create();
			
		}
		if (isset($_POST["nameUser"])) {
			//echo $_POST["nameUser"];
			$this->conexion = new Conexion();
			$this->user = new User();
			$this->user->set("nameUser", $_POST['nameUser']);
			$this->user->set("lastnameUser", $_POST['lastnameUser']);
			$this->user->set("documentUser", $_POST['documentUser']);
			$this->user->set("phoneUser", $_POST['phoneUser']);
			$this->user->set("emailUser", $_POST['emailUser']);
			$this->user->set("claveUser", $_POST['claveUser']);
			$this->user->set("genereUser", $_POST['genereUser']);
			$this->user->set("ageUser", $_POST['ageUser']);
			$this->user->set("photoUserNameTemp",$_FILES['photoUser']['tmp_name']);
			$this->user->set("photoUserName",$_FILES['photoUser']['name']);
			$this->user->set("photoUserSize",$_FILES['photoUser']['size']);
			$this->user->set("photoUserType",$_FILES['photoUser']['type']);
			$this->user->createAdmin();
		}
		if (isset($_POST['nameInput'])) {
			//echo $_POST['nameInput'][0];
			$this->conexion = new Conexion();
			$this->user = new DepositAccount();
			$this->user->set("nameInput", $_POST['nameInput']);
			$this->user->set("numberInput", $_POST['numberInput']);
			$this->user->set("currentInput", $_POST['currentInput']);
			$this->user->set("bankInput", $_POST['bankInput']);
			$this->user->createAccount();
		}
		if (isset($_POST['deposit'])) {
			$this->conexion = new Conexion();
			$this->cash = new cash();//echo "Hi";
			$this->cash->set("name", $_POST['name']);
			$this->cash->set("code", $_POST['code']);
			$this->cash->set("clave", $_POST['clave']);
			$this->cash->set("description", $_POST['description']);
			$this->cash->set("deposit", $_POST['deposit']);
			$this->cash->create();
		}
		else{
			//echo "No";
		}
	}
	public function create($cod)
	{
		echo "Hola Isma desde create controller $cod";
		
	}

	public function caja()
	{
		if (isset($_POST['usuario']) && isset($_POST['pass'])) {
			$this->conexion = new Conexion();
			$this->login = new Cash();
			$this->login->set("usuario", $_POST['usuario']);
			$this->login->set("pass", $_POST['pass']);
			$this->login->set("caja", $_POST['caja']);
			$this->login->login();

		}
		
	}
}

