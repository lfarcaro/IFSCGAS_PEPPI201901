<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Desfile[]|\Cake\Collection\CollectionInterface $desfiles
 */
?>
<div class="desfiles index large-9 medium-8 columns content">
    <h3><?= __('Desfiles') ?>
        <?= $this->Html->link(__('New desfiles'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('turma') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($desfiles as $desfile): ?>
            <tr>
                <td><?= h($desfile->data) ?></td>
                <td><?= h($desfile->turma) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $desfile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $desfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $desfile->id)]) ?>
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
