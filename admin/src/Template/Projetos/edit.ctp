<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<div class="projetos form large-9 medium-8 columns content">
    <?= $this->Form->create($projeto) ?>
    <fieldset>
        <legend><?= __('Edit Projeto') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('turma');
            echo $this->Form->control('fase');
            echo $this->Form->control('datainicio');
            echo $this->Form->control('datatermino');
            echo $this->Form->control('descricao_breve');
            echo $this->Form->control('descricao_detalhada');
            echo $this->Form->control('caminho_capa');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
	<hr>
	
	<script>
	function fmtListagemFotografiasAcoes (value, row, index) {
		return [
			'<img src="<?= $this->Url->image('up.png') ?>" onclick="cmdListagemFotografiasAcaoCima(' + row.id + ')" style="cursor: pointer">',
			'&nbsp;',
			'<img src="<?= $this->Url->image('down.png') ?>" onclick="cmdListagemFotografiasAcaoBaixo(' + row.id + ')" style="cursor: pointer">',
			'&nbsp;',
			'<img src="<?= $this->Url->image('delete.png') ?>" onclick="cmdListagemFotografiasAcaoExcluir(' + row.id + ')" style="cursor: pointer">'
		].join('');
	}
	</script>
	
	<table id="tblListagemFotografias" data-toggle="table" data-url="<?= $this->Html->Url->build(['action' => 'fotografiaIndex', $projeto->id]) ?>" class="table-striped">
		<thead class="thead-light">
			<tr>
				<th data-field="nome_arquivo" data-escape="true"><?= h(__('Arquivo')) ?></th>
				<th data-field="acoes" data-width="100px" data-align="center" data-formatter="fmtListagemFotografiasAcoes"><?= h(__('Ações')) ?></th>
			</tr>
		</thead>
	</table>
	
	<div id="divAJAX"></div>
	<input type="button" value="AJAX" id="btnAJAX">
	<script>
	$('#btnAJAX').click(function(){
		$.ajax({
			url:'<?= $this->Html->Url->build(['action' => 'fotografiaIndex'] ,$projeto->id) ?>',
			dataType : 'json'
		}).done(function(response){
			alert(response);
		})
	});
	</script>
</div>
