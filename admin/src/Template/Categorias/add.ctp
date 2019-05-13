<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Listar Categorias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Artigos'), ['controller' => 'Artigos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Artigo'), ['controller' => 'Artigos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorias form large-9 medium-8 columns content">
    <?= $this->Form->create($categoria) ?>
    <fieldset>
        <legend><?= __('Adicionar Categoria') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
