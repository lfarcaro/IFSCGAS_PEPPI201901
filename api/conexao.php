<?php

class Conexao
{
	private $conexao = "mysql:dbname=PE_PPI_201901;host=peppi.gaspar.ifsc.edu.br;charset=utf8";
	private $user = "PE_PPI_201901";
	private $password = "P3PPi201901";
	function __construct()
	{
		
	}

	function connect(){

		$conn = new PDO($this->conexao, $this->user, $this->password);		

		return $conn;
	}

}

?>