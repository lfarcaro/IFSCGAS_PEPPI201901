<?php

// Obtém id do designer
$id = $_GET["id"];

try {
    // Abre a conexão
    $connection = new PDO("mysql:dbname=PE_PPI_201901;host=peppi.gaspar.ifsc.edu.br;charset=utf8", "PE_PPI_201901", "P3PPi201901");

	$result = $connection->query("SELECT id, nome, curso, fase, apresentacao_detalhada, caminho_fotografia FROM designers WHERE id = " . $id);
	if ($result !== false) {
		// Obtém linha
		$row = $result->fetch();
		if ($row !== false) {
?>
{
	"erro" : null,
	"nome" : <?= json_encode($row["nome"]) ?>,
	"curso" : <?= json_encode($row["curso"]) ?>,
	"fase" : <?= json_encode($row["fase"]) ?>,
	"apresentacao_detalhada" : <?= json_encode($row["apresentacao_detalhada"]) ?>,
	"caminho_fotografia" : <?= json_encode($row["caminho_fotografia"]) ?>
}
<?php
		} else {
?>
{ "erro" : <?= json_encode("Resultado: Nenhum registro retornado.") ?> }
<?php
		}
		$result = null; // Libera o resultado
	} else {
?>
{ "erro" : <?= json_encode("Resultado: A seleção falhou!") ?> }
<?php
	}

    // Fecha a conexão
    $connection = null;
} catch (PDOException $e) {
    // Exceção foi lançada (um erro ocorreu)
?>
{ "erro" : <?= json_encode("Conexão falhou: " . $e->getMessage()) ?> }
<?php
}
?>