<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artigo $artigo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
        <legend><?= __('Add Artigo') ?></legend>
        <?php
            echo $this->Form->control('designer_id', ['options' => $designers]);
            echo $this->Form->control('categoria_id', ['options' => $categorias]);
            echo $this->Form->control('codigo');
            echo $this->Form->control('nome');
            echo $this->Form->control('descricao_breve');
            echo $this->Form->control('descricao_completa');
            echo $this->Form->control('disponibilidade');
            echo $this->Form->control('customizavel');
            echo $this->Form->control('criacao');
            echo $this->Form->control('atualizacao');
            echo $this->Form->control('variacoes_disponiveis');
            echo $this->Form->control('numero_visualizacoes');
            echo $this->Form->control('numero_favoritacoes');
            echo $this->Form->control('numero_compartilhamentos');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
