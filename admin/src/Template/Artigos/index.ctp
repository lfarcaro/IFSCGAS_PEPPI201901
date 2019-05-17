<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artigo[]|\Cake\Collection\CollectionInterface $artigos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Artigo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designers'), ['controller' => 'Designers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designer'), ['controller' => 'Designers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artigo Fotografias'), ['controller' => 'ArtigoFotografias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artigo Fotografia'), ['controller' => 'ArtigoFotografias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Log Contatodesigners'), ['controller' => 'LogContatodesigners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Log Contatodesigner'), ['controller' => 'LogContatodesigners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Log Customizacoes'), ['controller' => 'LogCustomizacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Log Customizaco'), ['controller' => 'LogCustomizacoes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="artigos index large-9 medium-8 columns content">
    <h3><?= __('Artigos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao_breve') ?></th>
                <th scope="col"><?= $this->Paginator->sort('disponibilidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customizavel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('atualizacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_visualizacoes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_favoritacoes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_compartilhamentos') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artigos as $artigo): ?>
            <tr>
                <td><?= $this->Number->format($artigo->id) ?></td>
                <td><?= $artigo->has('designer') ? $this->Html->link($artigo->designer->id, ['controller' => 'Designers', 'action' => 'view', $artigo->designer->id]) : '' ?></td>
                <td><?= $artigo->has('categoria') ? $this->Html->link($artigo->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $artigo->categoria->id]) : '' ?></td>
                <td><?= h($artigo->codigo) ?></td>
                <td><?= h($artigo->nome) ?></td>
                <td><?= h($artigo->descricao_breve) ?></td>
                <td><?= h($artigo->disponibilidade) ?></td>
                <td><?= h($artigo->customizavel) ?></td>
                <td><?= h($artigo->criacao) ?></td>
                <td><?= h($artigo->atualizacao) ?></td>
                <td><?= $this->Number->format($artigo->numero_visualizacoes) ?></td>
                <td><?= $this->Number->format($artigo->numero_favoritacoes) ?></td>
                <td><?= $this->Number->format($artigo->numero_compartilhamentos) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $artigo->id]) ?>
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
