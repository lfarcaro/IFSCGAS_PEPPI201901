<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artigos'), ['controller' => 'Artigos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artigo'), ['controller' => 'Artigos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($categoria->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($categoria->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoria->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Artigos') ?></h4>
        <?php if (!empty($categoria->artigos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Designer Id') ?></th>
                <th scope="col"><?= __('Categoria Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Descricao Breve') ?></th>
                <th scope="col"><?= __('Descricao Completa') ?></th>
                <th scope="col"><?= __('Disponibilidade') ?></th>
                <th scope="col"><?= __('Customizavel') ?></th>
                <th scope="col"><?= __('Criacao') ?></th>
                <th scope="col"><?= __('Atualizacao') ?></th>
                <th scope="col"><?= __('Variacoes Disponiveis') ?></th>
                <th scope="col"><?= __('Numero Visualizacoes') ?></th>
                <th scope="col"><?= __('Numero Favoritacoes') ?></th>
                <th scope="col"><?= __('Numero Compartilhamentos') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->artigos as $artigos): ?>
            <tr>
                <td><?= h($artigos->id) ?></td>
                <td><?= h($artigos->designer_id) ?></td>
                <td><?= h($artigos->categoria_id) ?></td>
                <td><?= h($artigos->codigo) ?></td>
                <td><?= h($artigos->nome) ?></td>
                <td><?= h($artigos->descricao_breve) ?></td>
                <td><?= h($artigos->descricao_completa) ?></td>
                <td><?= h($artigos->disponibilidade) ?></td>
                <td><?= h($artigos->customizavel) ?></td>
                <td><?= h($artigos->criacao) ?></td>
                <td><?= h($artigos->atualizacao) ?></td>
                <td><?= h($artigos->variacoes_disponiveis) ?></td>
                <td><?= h($artigos->numero_visualizacoes) ?></td>
                <td><?= h($artigos->numero_favoritacoes) ?></td>
                <td><?= h($artigos->numero_compartilhamentos) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Artigos', 'action' => 'view', $artigos->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Artigos', 'action' => 'edit', $artigos->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Artigos', 'action' => 'delete', $artigos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artigos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
