<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pagina $pagina
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pagina'), ['action' => 'edit', $pagina->id]) ?> </li>
        <li><?= $this->Html->link(__('List Paginas'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="paginas view large-9 medium-8 columns content">
    <h3><?= h($pagina->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Identificador') ?></th>
            <td><?= h($pagina->identificador) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($pagina->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pagina->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Conteudo') ?></h4>
        <?= $this->Text->autoParagraph(h($pagina->conteudo)); ?>
    </div>
</div>
