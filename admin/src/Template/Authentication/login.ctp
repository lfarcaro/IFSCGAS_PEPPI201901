<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email', ['required'=>true]) ?>
<?= $this->Form->control('senha', ['type'=>'password','required'=>true]) ?>
<?= $this->Form->button('Entrar') ?>
<br/>
<br/>
<!--
<button type="button" data-toggle="modal" data-target="#exampleModal">
		  Recuperar Senha
</button>
<?= $this->Form->end() ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Recuperar Senha</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		Informe seu e-mail para recuperação da senha associada:
		<form>
			<div class="form-group">
				<input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Ex: joão@email.com">
			 </div>
		</form>
	  </div>
	  
	  <div class="modal-footer">
		<input id="btnrecuperarSenha" type="button" value="Enviar">
	  </div>
	</div>
  </div>
</div>
<script>
$('#btnrecuperarSenha').click(function(){
		$.ajax({
			url:'<?= $this->Html->Url->build(['action' => 'recuperarSenha']) ?>',
			dataType:'json',
			data: {email: $('#InputEmail1').val()}
		}).done(function(response){
			alert(response);
		})
	});
</script>
-->