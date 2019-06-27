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
        function fmtListagemFotografiasPrevia (value, row, index) {
            return [
                '<img src="<?= $caminhoFotografias ?>' + row.caminho_arquivo + ' " style="max-width: 30px; max-height: 30px">',
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

    <script>
    
    function cmdListagemFotografiasAcaoCima(id){
        $.ajax({
            url: '<?= $this->Html->Url->build(['action' => 'fotografiaCima']) ?>/'+ id,
            dataType: 'json'
        }).done(function(response){
            if(!response.success){
                alert(response.message);
            }
            $('#tblListagemFotografias').bootstrapTable('refresh', {silent:true});
        })
    }
    
    function cmdListagemFotografiasAcaoBaixo(id){
        $.ajax({
            url: '<?= $this->Html->Url->build(['action' => 'fotografiaBaixo']) ?>/'+ id,
            dataType: 'json'
        }).done(function(response){
            if(!response.success){
                alert(response.message);
            }
            $('#tblListagemFotografias').bootstrapTable('refresh', {silent:true});
        })
    }
    
    function cmdListagemFotografiasAcaoExcluir(id){
        if(!confirm(<?= json_encode(__('Deseja realmente excluir a fotografia?')) ?>)){
            return;
        }
        $.ajax({
            url: '<?= $this->Html->Url->build(['action' => 'fotografiaExcluir']) ?>/'+ id,
            dataType: 'json'
        }).done(function(response){
            if(!response.success){
                alert(response.message);
            }
            $('#tblListagemFotografias').bootstrapTable('refresh', {silent:true});
        })
    }
    
    
    
    $('#btnAJAX').click(function(){
        $.ajax({
            url: '<?= $this->Html->Url->build(['action' => 'fotografiaIndex']) ?>/<?= $desfile->id ?>',
            dataType: 'json'
        }).done(function(response){
            $('#divAJAX').html(response);
        })
    });
    
    $(function () {
            $('#uplFotografia').fileupload({
                url: '<?= $this->Html->Url->build(['action' => 'fotografiaAdd', $desfile->id]) ?>',
                dataType: 'json',
                headers: { 'X-CSRF-Token': <?= json_encode($this->request->getParam('_csrfToken')) ?> },
                done: function (e, data) {
                    if (!data.result.success) {
                        $('#divProgress .progress-bar').removeClass('bg-success bg-warning bg-danger').addClass('bg-warning');
                    }
                },
                start: function () {
                    $('#divProgress .progress-bar').removeClass('bg-success bg-warning bg-danger').addClass('bg-success');
                    $('#divProgress .progress-bar').show();
                },
                progressall: function (e, data) {
                    $('#divProgress .progress-bar').css('width', parseInt(data.loaded / data.total * 100, 10) + '%');
                },
                stop: function (e, data) {
                    $('#tblListagemFotografias').bootstrapTable('refresh', {silent: true});
                    $('#divProgress .progress-bar').hide();
                },
                fail: function (e, data) {
                    $('#divProgress .progress-bar').removeClass('bg-success bg-warning bg-danger').addClass('bg-danger');
                    $('#tblListagemFotografias').bootstrapTable('refresh', {silent: true});
                }
            });
        });
    
    </script>

    <div class="row justify-content-center">
        <div id="divProgress" class="progress d-none">
            <div class="progress-bar bg-success" role="progressbar"></div>
        </div>
        <span class="btn btn-success fileinput-button float-none">
            <span><?= __('Adicionar fotografias') ?></span>
            <input id="uplFotografia" type="file" name="fotografia" multiple>
        </span>
    </div>
   
</div>
