<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Desfile $desfile
 */
?>
<div class="desfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($desfile, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Desfile') ?></legend>
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
</div>
