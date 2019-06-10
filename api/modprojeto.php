<?php
include('conexao.php');

/**
* 
*/
class ModProjeto
{
	function obterProjetos(){
		$arrayName = array();
		$conexao = new conexao();
		$conn = $conexao->connect();
		$sql = 'select * from projetos';
		$resultado = $conn->query($sql);
		$retorno = array();
		foreach ($resultado as $linha) {
		 	$retorno[] = $linha;
		 }
		$conn = null;
		return $retorno;
	}

	function obterDetalhesProjeto(int $idProjeto){
		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'select * from projetos p left outer join projeto_fotografias pf on pf.projeto_id = p.id where p.id = :idProjeto';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':idProjeto', $idProjeto);
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
obterProjetos(): array
obterDetalhesProjeto(in idProjeto:int): array
*/