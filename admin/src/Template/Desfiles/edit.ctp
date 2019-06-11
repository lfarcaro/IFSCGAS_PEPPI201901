<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Desfile $desfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $desfile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $desfile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Desfiles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Desfile Fotografias'), ['controller' => 'DesfileFotografias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Desfile Fotografia'), ['controller' => 'DesfileFotografias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="desfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($desfile, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Desfile') ?></legend>
        <?php
            echo $this->Form->control('data');
            echo $this->Form->control('turma');
            echo $this->Form->control('descricao_breve');
            echo $this->Form->control('descricao_detalhada');
            echo $this->Form->control('capa', ['type' => 'file']);
        ?>
    </fieldset>
	<script>
	$(function () {
		var editor = new Jodit("#descricao-detalhada", {
			"language": "pt_br",
			"defaultMode": "1",
			"buttons": "|,bold,underline,italic,|,|,ul,ol,|,outdent,indent,|,font,fontsize,brush,paragraph,|,image,file,video,table,link,|,align,undo,redo,\n,eraser,|,symbol,fullsize,selectall,print"
		});
	});
	</script>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <hr>

    <script>
        function fmtListagemFotografiasAcoes (value, row, index) {
            return [
                '<img src="<?= $this->Url->image('up.png') ?>" onclick="cmdListagemFotografiasAcaoCima(' + row.id + ')" style="cursor: pointer">',
                '&nbsp;',
                '<img src="<?= $this->Url->image('down.png') ?>" onclick="cmdListagemFotografiasAcaoBaixo(' + row.id + ')" style="cursor: pointer">',
                '&nbsp;',
                '<img src="<?= $this->Url->image('delete.png') ?>" onclick="cmdListagemFotografiasAcaoExcluir(' + row.id + ')" style="cursor: pointer">'
            ].join('');
        }
    </script>

    <table id="tblListagemFotografias" data-toggle="table" data-url="<?= $this->Html->Url->build(['action' => 'fotografiaIndex', $desfile->id]) ?>" class="table-striped">
        <thead class="thead-light">
            <tr>
                <th data-field="nome_arquivo" data-escape="true"><?= h(__('Arquivo')) ?></th>
                <th data-field="acoes" data-width="100px" data-align="center" data-formatter="fmtListagemFotografiasAcoes"><?= h(__('Ações')) ?></th>
            </tr>
        </thead>
    </table>
    <div id="divAJAX"></div>
    <input type="button"  value= "AJAX" id="btnAJAX">
    <script >
        $('#btnAJAX').click(function(){
            $.ajax({
                url: '<?= $this->Html->Url->build(['action'=> 'fotografiaIndex']) ?>/<?=$desfile->id ?>',
                dataType:'json'
            }).done(function(response){
            alert(response);
            });
        });
    </script>
</div>
