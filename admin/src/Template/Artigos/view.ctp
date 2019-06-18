<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artigo $artigo
 */
?>
<div class="artigos view large-9 medium-8 columns content">
    <h3><?= h($artigo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Designer') ?></th>
            <td><?= $artigo->has('designer') ? $this->Html->link($artigo->designer->id, ['controller' => 'Designers', 'action' => 'view', $artigo->designer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $artigo->has('categoria') ? $this->Html->link($artigo->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $artigo->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= h($artigo->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($artigo->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao Breve') ?></th>
            <td><?= h($artigo->descricao_breve) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disponibilidade') ?></th>
            <td><?= h($artigo->disponibilidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($artigo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Visualizacoes') ?></th>
            <td><?= $this->Number->format($artigo->numero_visualizacoes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Favoritacoes') ?></th>
            <td><?= $this->Number->format($artigo->numero_favoritacoes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Compartilhamentos') ?></th>
            <td><?= $this->Number->format($artigo->numero_compartilhamentos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criacao') ?></th>
            <td><?= h($artigo->criacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Atualizacao') ?></th>
            <td><?= h($artigo->atualizacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customizavel') ?></th>
            <td><?= $artigo->customizavel ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao Completa') ?></h4>
        <?= $this->Text->autoParagraph(h($artigo->descricao_completa)); ?>
    </div>
    <div class="row">
        <h4><?= __('Variacoes Disponiveis') ?></h4>
        <?= $this->Text->autoParagraph(h($artigo->variacoes_disponiveis)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Artigo Fotografias') ?></h4>
        <?php if (!empty($artigo->artigo_fotografias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Artigo Id') ?></th>
                <th scope="col"><?= __('Ordem') ?></th>
                <th scope="col"><?= __('Nome Arquivo') ?></th>
                <th scope="col"><?= __('Caminho Arquivo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artigo->artigo_fotografias as $artigoFotografias): ?>
            <tr>
                <td><?= h($artigoFotografias->id) ?></td>
                <td><?= h($artigoFotografias->artigo_id) ?></td>
                <td><?= h($artigoFotografias->ordem) ?></td>
                <td><?= h($artigoFotografias->nome_arquivo) ?></td>
                <td><?= h($artigoFotografias->caminho_arquivo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ArtigoFotografias', 'action' => 'view', $artigoFotografias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ArtigoFotografias', 'action' => 'edit', $artigoFotografias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ArtigoFotografias', 'action' => 'delete', $artigoFotografias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artigoFotografias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Log Contatodesigners') ?></h4>
        <?php if (!empty($artigo->log_contatodesigners)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Artigo Id') ?></th>
                <th scope="col"><?= __('Datahora') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Telefone') ?></th>
                <th scope="col"><?= __('Celular') ?></th>
                <th scope="col"><?= __('Celular Whatsapp') ?></th>
                <th scope="col"><?= __('Variacoes Disponiveis') ?></th>
                <th scope="col"><?= __('Variacoes Escolhidas') ?></th>
                <th scope="col"><?= __('Mensagem') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artigo->log_contatodesigners as $logContatodesigners): ?>
            <tr>
                <td><?= h($logContatodesigners->id) ?></td>
                <td><?= h($logContatodesigners->artigo_id) ?></td>
                <td><?= h($logContatodesigners->datahora) ?></td>
                <td><?= h($logContatodesigners->nome) ?></td>
                <td><?= h($logContatodesigners->email) ?></td>
                <td><?= h($logContatodesigners->telefone) ?></td>
                <td><?= h($logContatodesigners->celular) ?></td>
                <td><?= h($logContatodesigners->celular_whatsapp) ?></td>
                <td><?= h($logContatodesigners->variacoes_disponiveis) ?></td>
                <td><?= h($logContatodesigners->variacoes_escolhidas) ?></td>
                <td><?= h($logContatodesigners->mensagem) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LogContatodesigners', 'action' => 'view', $logContatodesigners->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LogContatodesigners', 'action' => 'edit', $logContatodesigners->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LogContatodesigners', 'action' => 'delete', $logContatodesigners->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logContatodesigners->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Log Customizacoes') ?></h4>
        <?php if (!empty($artigo->log_customizacoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Artigo Id') ?></th>
                <th scope="col"><?= __('Datahora') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Telefone') ?></th>
                <th scope="col"><?= __('Celular') ?></th>
                <th scope="col"><?= __('Celular Whatsapp') ?></th>
                <th scope="col"><?= __('Customizacao') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artigo->log_customizacoes as $logCustomizacoes): ?>
            <tr>
                <td><?= h($logCustomizacoes->id) ?></td>
                <td><?= h($logCustomizacoes->artigo_id) ?></td>
                <td><?= h($logCustomizacoes->datahora) ?></td>
                <td><?= h($logCustomizacoes->nome) ?></td>
                <td><?= h($logCustomizacoes->email) ?></td>
                <td><?= h($logCustomizacoes->telefone) ?></td>
                <td><?= h($logCustomizacoes->celular) ?></td>
                <td><?= h($logCustomizacoes->celular_whatsapp) ?></td>
                <td><?= h($logCustomizacoes->customizacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LogCustomizacoes', 'action' => 'view', $logCustomizacoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LogCustomizacoes', 'action' => 'edit', $logCustomizacoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LogCustomizacoes', 'action' => 'delete', $logCustomizacoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logCustomizacoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
