<?php
try {
    // Abre a conexão
    $connection = new PDO("mysql:dbname=PE_PPI_201901;host=localhost;charset=utf8", "PE_PPI_201901", "P3PPi201901");

	$result = $connection->query("SELECT nome, curso, fase, apresentacao_detalhada, caminho_fotografia FROM designers WHERE id=" . $_GET['id']);
	if ($result !== false) {
		// Obtém resultado
		$row = $result->fetch();
?>
{
	"nome" : <?= json_encode($row["nome"]) ?>,
	"curso" : <?= json_encode($row["curso"]) ?>,
	"fase" : <?= json_encode($row["fase"]) ?>,
	"apresentacao_detalhada" : <?= json_encode($row["apresentacao_detalhada"]) ?>,
	"caminho_fotografia" : <?= json_encode($row["caminho_fotografia"]) ?>
}
<?php
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