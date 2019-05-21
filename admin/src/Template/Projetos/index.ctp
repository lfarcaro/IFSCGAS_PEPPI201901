<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto[]|\Cake\Collection\CollectionInterface $projetos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projeto Fotografias'), ['controller' => 'ProjetoFotografias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto Fotografia'), ['controller' => 'ProjetoFotografias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projetos index large-9 medium-8 columns content">
    <h3><?= __('Projetos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('turma') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fase') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datainicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datatermino') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao_breve') ?></th>
                <th scope="col"><?= $this->Paginator->sort('caminho_capa') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projetos as $projeto): ?>
            <tr>
                <td><?= h($projeto->nome) ?></td>
                <td><?= h($projeto->turma) ?></td>
                <td><?= h($projeto->fase) ?></td>
                <td><?= h($projeto->datainicio) ?></td>
                <td><?= h($projeto->datatermino) ?></td>
                <td><?= h($projeto->descricao_breve) ?></td>
                <td><?= h($projeto->caminho_capa) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projeto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projeto->id)]) ?>
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
