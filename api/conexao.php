<?php

class Conexao
{
	private $user = "PE_PPI_201901";
	private $password = "P3PPi201901";
	function __construct()
	{
		
	}

	function connect(){

		$conn = new PDO('mysql:host=192.168.0.3;dbname=PE_PPI_201901', $this->user, $this->password);		

		return $conn;
	}

}

?>