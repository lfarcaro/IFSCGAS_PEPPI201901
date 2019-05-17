<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Designer[]|\Cake\Collection\CollectionInterface $designers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acoes') ?></li>
        <li><?= $this->Html->link(__('Novo Designer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Artigos'), ['controller' => 'Artigos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Artigo'), ['controller' => 'Artigos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="designers index large-9 medium-8 columns content">
    <h3><?= __('Designers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inscricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('atualizacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('curso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fase') ?></th>
                <th scope="col" class="actions"><?= __('Acoes') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($designers as $designer): ?>
            <tr>
                <td><?= h($designer->nome) ?></td>
                <td><?= h($designer->email) ?></td>
                <td><?= h($designer->inscricao) ?></td>
                <td><?= h($designer->atualizacao) ?></td>
                <td><?= h($designer->curso) ?></td>
                <td><?= h($designer->fase) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $designer->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $designer->id], ['confirm' => __('Você quer deletar: "{0}"?',$designer->nome)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('proximo') . ' >') ?>
            <?= $this->Paginator->last(__('ultima') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} desginer(s) de {{count}} total')]) ?></p>
    </div>
</div>
