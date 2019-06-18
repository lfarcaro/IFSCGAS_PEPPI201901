<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<div class="projetos view large-9 medium-8 columns content">
    <h3><?= h($projeto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($projeto->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Turma') ?></th>
            <td><?= h($projeto->turma) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fase') ?></th>
            <td><?= h($projeto->fase) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao Breve') ?></th>
            <td><?= h($projeto->descricao_breve) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Caminho Capa') ?></th>
            <td><?= h($projeto->caminho_capa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projeto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datainicio') ?></th>
            <td><?= h($projeto->datainicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datatermino') ?></th>
            <td><?= h($projeto->datatermino) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao Detalhada') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->descricao_detalhada)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projeto Fotografias') ?></h4>
        <?php if (!empty($projeto->projeto_fotografias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Ordem') ?></th>
                <th scope="col"><?= __('Nome Arquivo') ?></th>
                <th scope="col"><?= __('Caminho Arquivo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->projeto_fotografias as $projetoFotografias): ?>
            <tr>
                <td><?= h($projetoFotografias->id) ?></td>
                <td><?= h($projetoFotografias->projeto_id) ?></td>
                <td><?= h($projetoFotografias->ordem) ?></td>
                <td><?= h($projetoFotografias->nome_arquivo) ?></td>
                <td><?= h($projetoFotografias->caminho_arquivo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProjetoFotografias', 'action' => 'view', $projetoFotografias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjetoFotografias', 'action' => 'edit', $projetoFotografias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjetoFotografias', 'action' => 'delete', $projetoFotografias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetoFotografias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
