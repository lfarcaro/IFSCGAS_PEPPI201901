<?php
include('conexao.php');

/**
* 
*/
class ModDesigner
{
	function obterDesigners(){
		$arrayName = array();
		$conexao = new conexao();
		$conn = $conexao->connect();
		$sql = 'select * from designers';
		$resultado = $conn->query($sql);
		$retorno = array();
		foreach ($resultado as $linha) {
		 	$retorno[] = $linha;
		 }
		$conn = null;
		return $retorno;
	}

	function obterDetalhesDesigner(int $idDesigner){
		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'select * from designers where id = :idDesigner';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':idDesigner', $idDesigner);
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

/*
obterDesigners(): array
obterDetalhesDesigner(in idDesigner:int): array
*/