<?php
include 'cabecalho.php';
?>
<?php
$modPagina = new ModPagina();
$paginas = $modPagina->obterPagina('PAGINA_REVISTAS');
if (count($paginas) == 1) {
	$pagina = $paginas[0];
?>
<div class="container">
	<h3 class="sobre"> Revista</h3>
	<br>
	<?= $pagina["conteudo"] ?>
	<br>
</div>
<?php
} else {
	echo "Resultado: Nenhum registro retornado.";
}
?>
<?php
include 'rodape.php';
?>