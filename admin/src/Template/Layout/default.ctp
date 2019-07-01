<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

	<?= $this->Html->script('jquery-3.4.0.min') ?>

	<?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->script('popper.min') ?>
	<?= $this->Html->script('bootstrap.min') ?>

	<?= $this->Html->css('bootstrap-table.min.css') ?>
	<?= $this->Html->script('bootstrap-table.min') ?>

    <?= $this->Html->css('jodit.min.css') ?>
    <?= $this->Html->script('jodit.min.js') ?>

	<?= $this->Html->css('jquery.fileupload.css') ?>
	<?= $this->Html->script('jquery-ui.min.js') ?>
	<?= $this->Html->script('jquery.iframe-transport.js') ?>
	<?= $this->Html->script('jquery.fileupload.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><?= $this->Html->link($this->Html->image('logout.png') . "&nbsp;" . __('Logout'),['controller'=>'Authentication', 'action'=> 'login']) ?></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
	<h2>Bem-vind@ <?= h($usuario['nome']) ?></h2>
	
    <div class="container clearfix">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
		<?php if($usuario['perfil'] == 'A'){ ?>
            <ul class="side-nav">
                <li><?= $this->Html->link(__('Administradores'), ['controller' => 'Administradores', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Designers'), ['controller' => 'Designers', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Artigos'), ['controller' => 'Artigos', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Desfiles'), ['controller' => 'Desfiles', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Páginas'), ['controller' => 'Paginas', 'action' => 'index']) ?></li>
            </ul>
		<?php } else { ?>
			<ul class="side-nav">
				<li><?= $this->Html->link(__('Designers'), ['controller' => 'Designers', 'action' => 'edit',$usuario{'id'}]) ?></li>
				<li><?= $this->Html->link(__('Artigos'), ['controller' => 'Artigos', 'action' => 'index']) ?></li>
			</ul>
		<?php } ?>
        </nav>
        <?= $this->fetch('content') ?>
		
    </div>
	
    <footer>
		
    </footer>
</body>
</html>
