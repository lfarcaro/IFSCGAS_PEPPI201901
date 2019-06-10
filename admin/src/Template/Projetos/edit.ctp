<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projeto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projeto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projeto Fotografias'), ['controller' => 'ProjetoFotografias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto Fotografia'), ['controller' => 'ProjetoFotografias', 'action' => 'add']) ?></li>
    </ul>
</nav>
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
	<div id="divAJAX"></div>
	<input type="button" value="AJAX" id="btnAJAX">
	<script>
	$('#btnAJAX').click(function(){
		$.ajax({
			url:'<?= $this->Html->Url->build(['action' => 'fotografiaIndex']) ?>/<?= $projeto->id ?>',
			dataType : 'json'
		}).done(function(response){
			alert(response);
		})
	});
	</script>
</div>
