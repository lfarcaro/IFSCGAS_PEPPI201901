<?php
include 'cabecalho.php';
?>
<?php
try {
    // Abre a conexão
    $connection = new PDO($bd_stringConexao, $bd_usuario, $bd_senha);

	$result = $connection->query("SELECT conteudo FROM paginas WHERE identificador = 'PAGINA_SOBRENOS'");
	if ($result !== false) {
		// Obtém linha
		$row = $result->fetch();
		if ($row !== false) {
?>
<div class="container">
	<h3 class="sobre"> Sobre nós</h3>
	<br>
	<?= $row["conteudo"] ?>
	<br>
	<a class="btn btn-primary" href="contato.php" role="button">Entrar em contato</a>
</div>
<?php
		} else {
			echo "Resultado: Nenhum registro retornado.";
		}
		$result = null; // Libera o resultado
	} else {
		echo "Resultado: A seleção falhou!";
	}

    // Fecha a conexão
    $connection = null;
} catch (PDOException $e) {
    // Exceção foi lançada (um erro ocorreu)
	echo "Conexão falhou: " . $e->getMessage();
}
?>
<?php
include 'rodape.php';
?>