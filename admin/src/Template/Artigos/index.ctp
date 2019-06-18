<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artigo[]|\Cake\Collection\CollectionInterface $artigos
 */
?>
<div class="artigos index large-9 medium-8 columns content">
    <h3><?= __('Artigos') ?>
        <?= $this->Html->link(__('Novo Artigo'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
			<?php if($usuario['perfil'] == 'A'){ ?>	
                <th scope="col"><?= $this->Paginator->sort('designer_id') ?></th>
			<?php } ?>
                <th scope="col"><?= $this->Paginator->sort('categoria_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artigos as $artigo): ?>
            <tr>
			<?php if($usuario['perfil'] == 'A'){ ?>	
                <td><?= h($artigo->designer->nome) ?></td>
			<?php } ?>
                <td><?= h($artigo->categoria->nome) ?></td>
                <td><?= h($artigo->codigo) ?></td>
                <td><?= h($artigo->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artigo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $artigo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artigo->id)]) ?>
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
