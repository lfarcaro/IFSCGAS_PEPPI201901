<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Designer[]|\Cake\Collection\CollectionInterface $designers
 */
?>
<div class="designers index large-9 medium-8 columns content">
    <h3><?= __('Designers') ?>
        <?= $this->Html->link(__('Novo Designer'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inscricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('atualizacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('curso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fase') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
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
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $designer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $designer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $designer->nome)]) ?>
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
