<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Administrador'), ['action' => 'edit', $administrador->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Administrador'), ['action' => 'delete', $administrador->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrador->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Administradores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Administrador'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="administradores view large-9 medium-8 columns content">
    <h3><?= h($administrador->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Senha') ?></th>
            <td><?= h($administrador->senha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($administrador->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($administrador->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($administrador->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recebe Contato') ?></th>
            <td><?= $administrador->recebe_contato ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
