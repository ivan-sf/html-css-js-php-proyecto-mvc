<?php namespace views;
/**
* 
*/
$template = new Template();
class Template{
	
	function __construct()
	{
		include_once ("views/snippets/dependencies/auth/template/head.html");
		//include_once ("snippets/dependencies/header.html");

	}


	function __destruct()
	{
		
		include_once ("views/snippets/dependencies/auth/template/footer.html");
		//include_once ("snippets/dependencies/templates/panel/footer.html");


	}
}
?>