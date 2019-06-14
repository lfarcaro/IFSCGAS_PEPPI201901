<?php
include 'cabecalho.php';
?>
<?php
$modDesigner = new ModDesigner();
$designers = $modDesigner->obterDesigners();
foreach ($designers as $designer) {
?>
<br>
<div class="container d-flex justify-content-center" id="container-home">
	<div class="card w-75">
		<div class="card-body">
			<div class="media">
				<img class="fotografia align-self-start mr-3" src="img/fotografias/designers/<?= $designer["caminho_fotografia"] ?>" alt="Imagem de exemplo genérica">
				<div class="media-body">
					<h5 class="mt-0"><?= htmlspecialchars($designer["nome"]) ?></h5>
					<div class="block-with-text"><?= htmlspecialchars($designer["apresentacao_breve"]) ?></div>
					<br>
					Curso: <?= htmlspecialchars($designer["curso"]) ?>
					<br>
					Fase: <?= htmlspecialchars($designer["fase"]) ?>
					<div class="d-flex flex-row-reverse bd-highlight">
						<button type="button" class="btn btn-primary btn-designer" data-id="<?= htmlspecialchars($designer["id"]) ?>">Detalhes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
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