<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artigo $artigo
 */
?>
<div class="artigos form large-9 medium-8 columns content">
    <?= $this->Form->create($artigo) ?>
    <fieldset>
        <legend><?= __('Add Artigo') ?></legend>
        <?php
			if($usuario['perfil'] == 'A'){
				echo $this->Form->control('designer_id', ['options' => $designers]);
			}
            echo $this->Form->control('categoria_id', ['options' => $categorias]);
            echo $this->Form->control('codigo');
            echo $this->Form->control('nome');
            echo $this->Form->control('descricao_breve');
            echo $this->Form->control('descricao_completa');
            echo $this->Form->control('disponibilidade',['options' => array("V" => __("Venda"),"D" =>__("Divulgação"))]);
            echo $this->Form->control('customizavel');
            echo $this->Form->control('variacoes_disponiveis');
        ?>
    </fieldset>
	<script>
	$(function () {
		var editor = new Jodit("#descricao-completa", {
			"language": "pt_br",
			"defaultMode": "1",
			"buttons": "|,bold,underline,italic,|,|,ul,ol,|,outdent,indent,|,font,fontsize,brush,paragraph,|,image,file,video,table,link,|,align,undo,redo,\n,eraser,|,symbol,fullsize,selectall,print"
		});
	});
	</script>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
