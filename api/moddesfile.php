<?php
include('conexao.php');

/**
* 
*/
class ModDesfile
{
	function obterDesfiles(){
		$arrayName = array();
		$conexao = new conexao();
		$conn = $conexao->connect();
		$sql = 'select * from desfiles';
		$resultado = $conn->query($sql);
		$retorno = array();
		foreach ($resultado as $linha) {
		 	$retorno[] = $linha;
		 }
		$conn = null;
		return $retorno;
	}

	function obterDetalhesDesfile(int $idDesfile){

		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'select * from desfiles d left outer join desfile_fotografias df on df.desfile_id = d.id where d.id = :idDesfile';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':idDesfile', $idDesfile);
		$stmt->execute();

		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		$retorno = array();
		foreach ($resultado as $linha) {
			$retorno[] = $linha;
		}
		$conn = null;
		return $retorno;
	}
}