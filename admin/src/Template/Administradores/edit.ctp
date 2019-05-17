<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $administrador->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $administrador->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Administradores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="administradores form large-9 medium-8 columns content">
    <?= $this->Form->create($administrador) ?>
    <fieldset>
        <legend><?= __('Edit Administrador') ?></legend>
        <?php
            echo $this->Form->control('senha1', ['type' => 'password']);
            echo $this->Form->control('senha2', ['type' => 'password']);
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('recebe_contato');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
