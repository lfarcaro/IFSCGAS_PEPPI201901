<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email', ['required'=>true]) ?>
<?= $this->Form->control('senha', ['type'=>'password','required'=>true]) ?>
<?= $this->Form->button('Entrar') ?>
<?= $this->Form->end() ?>