<?php
/**
* 
*/
class ModPagina
{
	function obterPagina(string $stIdentificador){
        $conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'select * from paginas where identificador = :stIdentificador';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':stIdentificador', $stIdentificador);
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
obterPagina(in stIdentificador:string): array
*/
