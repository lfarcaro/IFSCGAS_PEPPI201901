<?php
include 'cabecalho.php';
?>
<?php
try {
    // Abre a conexão
    $connection = new PDO("mysql:dbname=PE_PPI_201901;host=peppi.gaspar.ifsc.edu.br;charset=utf8", "PE_PPI_201901", "P3PPi201901");

	$result = $connection->query("SELECT id, nome, curso, fase, apresentacao_breve, caminho_fotografia FROM designers ORDER BY nome");
	if ($result !== false) {
		// Itera linhas do resultado
		while ($row = $result->fetch()) {
?>
<br>
<div class="container d-flex justify-content-center" id="container-home">
	<div class="card w-75">
		<div class="card-body">
			<div class="media">
				<img class="fotografia align-self-start mr-3" src="img/fotografias/designers/<?= $row["caminho_fotografia"] ?>" alt="Imagem de exemplo genérica">
				<div class="media-body">
					<h5 class="mt-0"><?= htmlspecialchars($row["nome"]) ?></h5>
					<div class="block-with-text"><?= htmlspecialchars($row["apresentacao_breve"]) ?></div>
					<br>
					Curso: <?= htmlspecialchars($row["curso"]) ?>
					<br>
					Fase: <?= htmlspecialchars($row["fase"]) ?>
					<div class="d-flex flex-row-reverse bd-highlight">
						<button type="button" class="btn btn-primary btn-designer" data-id="<?= htmlspecialchars($row["id"]) ?>">Detalhes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
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

<!-- Modal -->
<div class="modal fade modal-designer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="TituloModalCentralizado">Detalhes do designer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="media">
					<div class="media-body">
						<h5 class="mt-0 mb-1" id="fldNomeDesigner"></h5>
						<br>
						<h6 class="mt-0 mb-1">Curso:</h6>
						<span id="spnCurso"></span>
						<br>
						<br>
						<h6 class="mt-0 mb-1">Fase:</h6>
						<span id="spnFase"></span> fase
						<br>
						<br>
						<br>
						<p class="text-justify" id="pApresentacaoDetalhada"></p>
					</div>
					<img class="fotografia ml-3" id="imgFotografia" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh1Nkou14E6ExGLhRkld6K8OYpN6_OMJEYBJVyx1JMchOWDN6o" alt="Imagem de exemplo genérica">	
				</div>
			</div>
			
		</div>
	</div>
</div>
<script>
$('.btn-designer').on('click', function() {
	var id = $(this).data('id');
	$.ajax({
		url: 'designers_getinfo.php',
		type: 'GET',
		dataType: 'json',
		data: {id: id},
		success: function(response) {
			if (response.erro != null) {
				alert(response.erro);
			} else {
				$('#fldNomeDesigner').html(response.nome);
				$('#spnCurso').html(response.curso);
				$('#spnFase').html(response.fase);
				$('#pApresentacaoDetalhada').html(response.apresentacao_detalhada);
				$('#imgFotografia').attr("src", "img/fotografias/designers/" + response.caminho_fotografia);
				$('.modal-designer').modal('show');
			}
		},
		error: function(error) {
			alert('Erro número ' + error.status);
		}
	});
});
</script>
<?php
include 'rodape.php';
?>