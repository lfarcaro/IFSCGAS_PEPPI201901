<?php
require "../api/api.php";

// Obtém id do designer
$id = $_GET["id"];

$modDesigner = new ModDesigner();
$designers = $modDesigner->obterDetalhesDesigner($id);
if (count($designers) == 1) {
	$designer = $designers[0];
?>
{
	"erro" : null,
	"nome" : <?= json_encode(htmlspecialchars($designer["nome"])) ?>,
	"curso" : <?= json_encode(htmlspecialchars($designer["curso"])) ?>,
	"fase" : <?= json_encode(htmlspecialchars($designer["fase"])) ?>,
	"apresentacao_detalhada" : <?= json_encode($designer["apresentacao_detalhada"]) ?>,
	"caminho_fotografia" : <?= json_encode($designer["caminho_fotografia"]) ?>
}
<?php
} else {
?>
{ "erro" : <?= json_encode("Resultado: O designer não foi encontrado.") ?> }
<?php
}
?>