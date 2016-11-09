
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Passangers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="passangers form large-9 medium-8 columns content">
    <?= $this->Form->create($passanger) ?>
    <fieldset>
        <legend><?= __('Add Passanger') ?></legend>
        <?php
            echo $this->Form->input('prenom');
            echo $this->Form->input('nom');
            echo $this->Form->input('telephone');
            echo $this->Form->input('email');
            echo $this->Form->input('adresse');
            echo $this->Form->input('ville');
            echo $this->Form->input('province');
            echo $this->Form->input('pays');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
