<!DOCTYPE html>
<html>
<head>
	<?php
		include_once 'head.php';
	?>
</head>
<body>
	<?php
		include_once 'header.php';
	?>
	<div id="content" class="container-fluid" >
		<?php
			include_once 'sideMenu.php';
		?>
		<div id="Atelie_Content" class="col-lg-10 pl-0 pr-0">
			<div class="row" style="margin-left: 0 !important; margin-top: 5px !important;">
					<div class="col-lg-1"></div>
					<div class="col-lg-8">
					  <div class="input-group">
					  <input type="text" class="form-control" placeholder="Pesquisar... ">
					  <div class="input-group-append">
						<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtrar por... </button>
						<div class="dropdown-menu">
						  <a class="dropdown-item" href="#">Conteúdo</a>
						  <a class="dropdown-item" href="#">Categoria</a>
						  <a class="dropdown-item" href="#">Disponíbilidade</a>
						  
						</div>
					  </div>
					</div>
					</div>
					<div class="col-lg-1">
						<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ordenação </button>
						<div class="dropdown-menu">
						  <a class="dropdown-item" href="#">Mais recentes</a>
						  <a class="dropdown-item" href="#">Mais visualizados</a>
						  <a class="dropdown-item" href="#">Mais Favoritados</a>
						  <a class="dropdown-item" href="#">Mais Compartilhados</a>
						  
						</div>
					</div>
			</div>
	
			<div style="padding: 5% 10% 0 10%;">				
				<div class="card" style="width: 100%;">
				  <div class="card-body">
					<div style="float: left; width: 180px;">
							<img src="./imagens/exemplo.jpg" style="max-width: 100%; min-width: 100%; max-height: 200px; min-height: 200px;"></img>
					</div>
					<div style="float: right; height: 200px; width: calc(100vh - 250px);">
						<h5 class="card-title">Titulo</h5>
						<h6 class="card-subtitle mb-2 text-muted">Autor</h6>
						<p class="card-text" style="word-wrap: break-word; width: 100%;">Um exemplo rápido de texto inserido no corpo do cartão que faz ele possuir um conteúdo. Um exemplo rápido de texto inserido no corpo do cartão que faz ele possuir um conteúdo. </p>
								
						<p style="position: absolute; bottom: 0; right: 16px;"> Disponível</p>
					</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>