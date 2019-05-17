<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Designer $designer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Designers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Artigos'), ['controller' => 'Artigos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artigo'), ['controller' => 'Artigos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="designers form large-9 medium-8 columns content">
    <?= $this->Form->create($designer, ['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Designer') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('senha', ['type' => 'password', 'required' => true]);
            echo $this->Form->control('confirmacao_senha', ['type' => 'password', 'required' => true]);
            echo $this->Form->control('telefone');
            echo $this->Form->control('celular');
            echo $this->Form->control('celular_whatsapp');
            echo $this->Form->control('curso');
            echo $this->Form->control('fase');
            echo $this->Form->control('apresentacao_breve');
            echo $this->Form->control('apresentacao_detalhada');
            echo $this->Form->control('fotografia', ['type'=>'file']);
        ?>
    </fieldset>
	<script>
	$(function () {
		var editor = new Jodit("#apresentacao-detalhada", {
			"language": "pt_br",
			"defaultMode": "1",
			"buttons": "|,bold,underline,italic,|,|,ul,ol,|,outdent,indent,|,font,fontsize,brush,paragraph,|,image,file,video,table,link,|,align,undo,redo,\n,eraser,|,symbol,fullsize,selectall,print"
		});
	});
	</script>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
