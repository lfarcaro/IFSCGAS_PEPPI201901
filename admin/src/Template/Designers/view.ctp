<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Designer $designer
 */
?>
<div class="designers view large-9 medium-8 columns content">
    <h3><?= h($designer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Senha') ?></th>
            <td><?= h($designer->senha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($designer->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($designer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($designer->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($designer->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Curso') ?></th>
            <td><?= h($designer->curso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fase') ?></th>
            <td><?= h($designer->fase) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apresentacao Breve') ?></th>
            <td><?= h($designer->apresentacao_breve) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Caminho Fotografia') ?></th>
            <td><?= h($designer->caminho_fotografia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($designer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Inscricao') ?></th>
            <td><?= h($designer->inscricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Atualizacao') ?></th>
            <td><?= h($designer->atualizacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aprovado') ?></th>
            <td><?= $designer->aprovado ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular Whatsapp') ?></th>
            <td><?= $designer->celular_whatsapp ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Apresentacao Detalhada') ?></h4>
        <?= $this->Text->autoParagraph(h($designer->apresentacao_detalhada)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Artigos') ?></h4>
        <?php if (!empty($designer->artigos)): ?>
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
            <?php foreach ($designer->artigos as $artigos): ?>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Artigos', 'action' => 'view', $artigos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Artigos', 'action' => 'edit', $artigos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Artigos', 'action' => 'delete', $artigos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artigos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>x
        <?php endif; ?>
    </div>
</div>
