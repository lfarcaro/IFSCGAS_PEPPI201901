<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artigo $artigo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $artigo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $artigo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Artigos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Designers'), ['controller' => 'Designers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designer'), ['controller' => 'Designers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artigo Fotografias'), ['controller' => 'ArtigoFotografias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artigo Fotografia'), ['controller' => 'ArtigoFotografias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Log Contatodesigners'), ['controller' => 'LogContatodesigners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Log Contatodesigner'), ['controller' => 'LogContatodesigners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Log Customizacoes'), ['controller' => 'LogCustomizacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Log Customizaco'), ['controller' => 'LogCustomizacoes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="artigos form large-9 medium-8 columns content">
    <?= $this->Form->create($artigo) ?>
    <fieldset>
        <legend><?= __('Edit Artigo') ?></legend>
        <?php
			if($usuario['perfil'] == 'A'){
				echo $this->Form->control('designer_id', ['options' => $designers,'disabled'=> true]);
			}
            echo $this->Form->control('categoria_id', ['options' => $categorias]);
            echo $this->Form->control('codigo');
            echo $this->Form->control('nome');
            echo $this->Form->control('descricao_breve');
            echo $this->Form->control('descricao_completa');
            echo $this->Form->control('disponibilidade',['options' => array("V" => __("Venda"),"D" =>__("Divulgação"))]);
            echo $this->Form->control('customizavel');
            echo $this->Form->control('variacoes_disponiveis');
        ?>
    </fieldset>
	<script>
	$(function () {
		var editor = new Jodit("#descricao-completa", {
			"language": "pt_br",
			"defaultMode": "1",
			"buttons": "|,bold,underline,italic,|,|,ul,ol,|,outdent,indent,|,font,fontsize,brush,paragraph,|,image,file,video,table,link,|,align,undo,redo,\n,eraser,|,symbol,fullsize,selectall,print"
		});
	});
	</script>
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
	<table id="tblListagemFotografias" data-toggle="table" data-url="<?= $this->Html->Url->build(['action' => 'fotografiaIndex', $artigo->id]) ?>" class="table-striped">
		<thead class="thead-light">
			<tr>
				<th data-field="nome_arquivo" data-escape="true"><?= h(__('Arquivo')) ?></th>
				<th data-field="acoes" data-width="100px" data-align="center" data-formatter="fmtListagemFotografiasAcoes"><?= h(__('Ações')) ?></th>
			</tr>
		</thead>
	</table>
	<input type = "button" value = "AJAX" id= "btnAJAX">
	<script>
	$('#btnAJAX').click(function(){
		$.ajax({
			url: '<?= $this->Html->Url->build(['action' => 'fotografiaIndex']) ?>/<?= $artigo->id ?>',
			dataType: 'json'
		}).done(function(response){
			$('#divAJAX').html(response);
		})
	});
	</script>
</div>
