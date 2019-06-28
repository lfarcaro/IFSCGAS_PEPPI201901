<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
	:root{
		--header-size: 70px;
	
	html, body {
	}
		height: 100%;	
		overflow: hidden;			
	}
	
	#content{
		height: calc(100vh - var(--header-size));
	}
	
	#row{
		height: 100%;		
	}	

	#side-menu, #frame-content{
		height:100%;
	}
		
	li{
		font-size: 1em;
	}
	hr{
		border-color: var(--gray);
		margin: 0.1rem 0 0.1rem 0 !important;
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