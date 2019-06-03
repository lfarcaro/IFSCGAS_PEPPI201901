<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.4.0.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
		:root{
			--header-size: 100px;
		}
		
		html, body {
			height: 100%;	
			overflow: hidden;			
		}
		
		#content{
			height: calc(100% - var(--header-size));
		}
		
		.row, #side-menu, #frame-content{
			height:100%;
		}
			
		li{
			font-size: 1.3em;
		}
		hr{
			border-color: var(--gray);
		}
		.navbar-dark .navbar-nav .nav-link:focus, 
		.navbar-dark .navbar-nav .nav-link:hover{
			color: var(--light);
		}
		
		#frame-content{
			height: 100%;
			width: 100%;
			border: 0;
		}
	</style>
</head>
<body>
	<div class="container-fluid">	
		<!--HEADER-->
		<div id="header">
			<div class="row">
				<div class="col-sm-12" style="background-color: black; height: var(--header-size); color: white;">
				LOGO
				</div>
			</div>
		</div>
	</div>
	<div id="content" class="container-fluid overflow-auto" >
		<div class="row">
			<!--MENU LATERAL-->
			<div id="side-menu" class="col-sm-2 pl-0 pr-0 navbar-dark bg-dark">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark  pl-0 pr-0 ">
					<div class="collapse navbar-collapse  pl-0 pr-0 " id="navbarNav">
				    	<ul class="navbar-nav flex-column col-lg-12  pl-0 pr-0 ">
				      		<li class="nav-item">
				        		<a class="nav-link" href="index.php">Ateliê</a>	
								<hr>
				      		</li>
							
				      		<li class="nav-item">
				        		<a class="nav-link" href="designers.php">Designers</a>
								<hr>
				    		</li>
							
				    		<li class="nav-item">
				    	    	<a class="nav-link" href="projetos.php">Projetos</a>
								<hr>
				    		</li>
							
				    		<li class="nav-item">
				    	    	<a class="nav-link" href="desfiles.php">Desfiles</a>
								<hr>
				    		</li>
							
				    		<li class="nav-item">
				    	    	<a class="nav-link" href="revistas.php">Revistas</a>
								<hr>
				    		</li>
							
				    		<li class="nav-item">
				    	    	<a class="nav-link" href="sobre.php">Sobre Nós</a>
								<hr>
				    		</li>
							
				    		<li class="nav-item">
				    	    	<a class="nav-link" href="contato.php">Contato</a>
								<hr>
				    		</li>
							
				    	</ul>
					</div>
				</nav>
			</div>
			<div id="internal" class="col-lg-10 pl-0 pr-0">