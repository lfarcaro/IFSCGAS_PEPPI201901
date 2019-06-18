<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador[]|\Cake\Collection\CollectionInterface $administradores
 */
?>
<div class="administradores index large-9 medium-8 columns content">
    <h3><?= __('Administradores') ?>
        <?= $this->Html->link(__('Novo administrador'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recebe_contato') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($administradores as $administrador): ?>
            <tr>
                <td><?= h($administrador->nome) ?></td>
                <td><?= h($administrador->email) ?></td>
                <td><?= h($administrador->recebe_contato) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $administrador->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $administrador->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrador->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
