<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<div class="projetos form large-9 medium-8 columns content">
    <?= $this->Form->create($projeto) ?>
    <fieldset>
        <legend><?= __('Add Projeto') ?></legend>
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
</div>
