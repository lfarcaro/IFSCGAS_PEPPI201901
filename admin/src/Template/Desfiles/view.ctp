<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Desfile $desfile
 */
?>
<div class="desfiles view large-9 medium-8 columns content">
    <h3><?= h($desfile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Turma') ?></th>
            <td><?= h($desfile->turma) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao Breve') ?></th>
            <td><?= h($desfile->descricao_breve) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Caminho Capa') ?></th>
            <td><?= h($desfile->caminho_capa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($desfile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($desfile->data) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao Detalhada') ?></h4>
        <?= $this->Text->autoParagraph(h($desfile->descricao_detalhada)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Desfile Fotografias') ?></h4>
        <?php if (!empty($desfile->desfile_fotografias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Desfile Id') ?></th>
                <th scope="col"><?= __('Ordem') ?></th>
                <th scope="col"><?= __('Nome Arquivo') ?></th>
                <th scope="col"><?= __('Caminho Arquivo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($desfile->desfile_fotografias as $desfileFotografias): ?>
            <tr>
                <td><?= h($desfileFotografias->id) ?></td>
                <td><?= h($desfileFotografias->desfile_id) ?></td>
                <td><?= h($desfileFotografias->ordem) ?></td>
                <td><?= h($desfileFotografias->nome_arquivo) ?></td>
                <td><?= h($desfileFotografias->caminho_arquivo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DesfileFotografias', 'action' => 'view', $desfileFotografias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DesfileFotografias', 'action' => 'edit', $desfileFotografias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DesfileFotografias', 'action' => 'delete', $desfileFotografias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $desfileFotografias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
