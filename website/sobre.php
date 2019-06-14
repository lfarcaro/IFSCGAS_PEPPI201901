<?php
include 'cabecalho.php';
?>
<?php
$modPagina = new ModPagina();
$paginas = $modPagina->obterPagina('PAGINA_SOBRENOS');
if (count($paginas) == 1) {
	$pagina = $paginas[0];
?>
<div class="container">
	<h3 class="sobre"> Sobre nós</h3>
	<br>
	<?= $pagina["conteudo"] ?>
	<br>
	<a class="btn btn-primary" href="contato.php" role="button">Entrar em contato</a>
</div>
<?php
} else {
	echo "Resultado: Nenhum registro retornado.";
}
?>
<?php
include 'rodape.php';
?>