<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
?>
<div class="administradores form large-9 medium-8 columns content">
    <?= $this->Form->create($administrador) ?>
    <fieldset>
        <legend><?= __('Add Administrador') ?></legend>
        <?php
            echo $this->Form->control('senha1', ['required' => true, 'type' => 'password']);
            echo $this->Form->control('senha2', ['required' => true, 'type' => 'password']);
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('recebe_contato');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
