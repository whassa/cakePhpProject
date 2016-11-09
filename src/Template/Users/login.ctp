<!-- src/Template/Users/login.ctp -->

<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __("Merci de rentrer vos nom d'utilisateur et mot de passe") ?></legend>
        <?= $this->Form->input('username', ['label' => __('username')]) ?>
        <?= $this->Form->input('password', ['label' => __('password')]); ?>
    </fieldset>
<?= $this->Form->button(__('Se Connecter')); ?>
<?= $this->Form->end() ?>
</div>