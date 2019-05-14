<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Designer $designer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $designer->id],
                ['confirm' => __('Você quer deletar: "{0}"?', $designer->nome)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Designers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Artigos'), ['controller' => 'Artigos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Artigo'), ['controller' => 'Artigos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="designers form large-9 medium-8 columns content">
    <?= $this->Form->create($designer) ?>
    <fieldset>
        <legend><?= __('Editar Designer') ?></legend>
        <?php
            echo $this->Form->control('senha1',['type'=>'password']);
			echo $this->Form->control('senha2',['type'=>'password']);
            echo $this->Form->control('aprovado',["disabled"=>true]);
            echo $this->Form->control('nome');
            echo $this->Form->control('email',["readonly"=>true]);
            echo $this->Form->control('telefone');
            echo $this->Form->control('celular');
            echo $this->Form->control('celular_whatsapp');
            echo $this->Form->control('curso');
            echo $this->Form->control('fase');
            echo $this->Form->control('apresentacao_breve');
            echo $this->Form->control('apresentacao_detalhada');
            echo $this->Form->control('caminho_fotografia');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
