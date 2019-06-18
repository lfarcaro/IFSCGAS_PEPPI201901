<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
?>
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
