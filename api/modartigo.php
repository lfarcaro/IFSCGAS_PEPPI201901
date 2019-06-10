<?php
include('conexao.php');

/**
* 
*/
class ModArtigo
{
	private $conexão;

	function __construct()
	{

	}

	function obterCategorias(){
		
		$conexao = new conexao();
		$conn = $conexao->connect();
		$sql = 'select id, nome, descricao from categorias';
		$resultado = $conn->query($sql);
		$retorno = array();
		foreach ($resultado as $linha) {
		 	$retorno[] = $linha;
		 }
		$conn = null;
		return $retorno;
	}

	function obterArtigos($stBusca,
						  $idArtigoCategoria,
						  $fgDisponibilidade, 
						  $fgOrdenacao){

		$lista = '';

		foreach ($idArtigoCategoria as $value) {
			$lista .= $value.',';
		}
		$lista = substr($lista, 0,strlen($lista)-1);

		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'select * from artigos a where a.disponibilidade = :disponibilidade and a.categoria_id in (:idCategoriaArtigo) order by a.codigo '.$fgOrdenacao;
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':disponibilidade', $fgDisponibilidade);
		$stmt->bindParam(':idCategoriaArtigo', $lista);
		$stmt->execute();

		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		$retorno = array();
		foreach ($resultado as $linha) {
			$retorno[] = $linha;
		}
		$conn = null;
		return $retorno;

	}

	function obterArtigosAleatorios(int $Numero){
		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'select * from artigos a where a.id = :id';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':id', $Numero);
		$stmt->execute();
		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		$retorno = array();
		foreach ($resultado as $linha) {
			$retorno[] = $linha;
		}
		$conn = null;
		return $retorno;	
	}

	function contatarDesigner(int $idArtigo,
		                      string $stNome,
		                      string $stEmail,
		                      string $stTelefone,
		                      string $stCel,
		                      boolean $blCelWhatsapp,
		                      string $stVariacoesEscolhidas,
		                      string $stMsg){

		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'insert into log_contatodesigners(artigo_id, datahora, nome, email, telefone, celular, celular_whatsapp, variacoes_escolhidas, mensagem) VALUES (:artigo_id, CURRENT_TIMESTAMP, :nome, :email, :telefone, :celular, :celular_whatsapp, :variacoes_escolhidas, :mensagem)';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':artigo_id', $idArtigo);
		$stmt->bindParam(':nome', $stNome);
		$stmt->bindParam(':email', $stCelular);
		$stmt->bindParam(':telefone', $blCelularWhatsapp);
		$stmt->bindParam(':celular', $stCustomizacao);
		$stmt->bindParam(':celular_whatsapp', $stCustomizacao);
		$stmt->bindParam(':variacoes_escolhidas', $stCustomizacao);
		$stmt->bindParam(':mensagem', $stCustomizacao);
		$stmt->execute();
		return $stmt->rowCount()>0;

	}

	function proporCustomizacao(int $idArtigo,
								string $stNome,
								string $stEmail,
								string $stTelefone,
								string $stCelular,
								boolean $blCelularWhatsapp,
								string $stCustomizacao){

		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'insert into log_artigos set id, nome, email, telefone, celular, celular_whatsapp, customizacao values (:id, :nome, :email, :telefone, :celular, :celular_whatsapp, :customizacao)';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':id', $idArtigo);
		$stmt->bindParam(':nome', $stNome);
		$stmt->bindParam(':email', $stEmail);
		$stmt->bindParam(':celular', $stCelular);
		$stmt->bindParam(':celular_whatsapp', $blCelularWhatsapp);
		$stmt->bindParam(':customizacao', $stCustomizacao);
		$stmt->execute();
		return $stmt->rowCount()>0;
	}

	function registrarVisualizacao(int $idArtigo){
		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'update artigos a set a.numero_visualizacoes = (a.numero_visualizacoes+1) where a.id = :id';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':id', $idArtigo);
		$stmt->execute();
		return $stmt->rowCount()>0;
	}

	function registrarFavoritacao(int $idArtigo){
		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'update artigos a set a.numero_favoritacoes = (a.numero_favoritacoes+1) where a.id = :id';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':id', $idArtigo);
		$stmt->execute();
		return $stmt->rowCount()>0;
	}

	function registrarCompartilhamento(int $idArtigo){
		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'update artigos a set a.numero_compartilhamentos = (a.numero_compartilhamentos+1) where a.id = :id';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':id', $idArtigo);
		$stmt->execute();
		return $stmt->rowCount()>0;
	}

	function obterDetalhesArtigo($stCodigo){
		$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'select * from artigos a inner join artigo_fotografias b on b.artigo_id = a.id inner join categorias c on c.id = a.categoria_id inner join designers d on a.designer_id = d.id where a.codigo = '.$stCodigo;
		$stmt = $con->prepare($sql);
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
?>
