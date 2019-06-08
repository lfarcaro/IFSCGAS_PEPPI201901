<?php
include 'cabecalho.php';
?>
	<div class="container contato">
		<form class="form-contato form-row col-md-6">
		  <h3 class="form-contato-titulo">Contate-nos</h3>
		  
		  <div class="form-row col-md-12">
		     
		     <div class="form-group col-md-12">
		       <label for="inputEmail4">Email</label>
		       <input type="email" class="form-control" id="inputEmail4" placeholder="Email" 
		              required="true"/>
		     </div>
		     
		     <div class="form-group col-md-12">
		       <label for="inputPassword4">Nome Completo</label>
		       <input type="text" class="form-control" id="inputPassword4" placeholder="Nome" 
		              required="true"/>
		     </div>
		     
		     <div class="form-group col-md-12">
			    <label for="inputAddress">Endereco</label>
			    <input type="text" class="form-control" id="inputAddress" placeholder="Endereço" 
			           required="true"/>
			 	 </div>

				  <div class="form-group col-md-12">
				    <label for="inputAddress">Telefone</label>
				    <input type="text" class="form-control" placeholder="(00) 0000-0000" id="inputTelefone"
				           required="true" />
				  </div>
				
				  <div class="form-group col-md-12 possuiWhats">
				    <input type="checkbox"/> <span> Possui WhatsApp </span>
				  </div>
			  
				  <div class="form-group col-md-12">
				    <label for="exampleFormControlTextarea1">Informações</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Mensagem que será enviada..." required="true" ></textarea>
				  </div>
			  
			  <button type="submit" class="btn btn-primary">Enviar</button>
		  </div>
		</form>
	</div>
<?php
include 'rodape.php';
?>