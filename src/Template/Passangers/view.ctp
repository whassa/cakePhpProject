<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Passanger'), ['action' => 'edit', $passanger->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Passanger'), ['action' => 'delete', $passanger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passanger->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Passangers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passanger'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="passangers view large-9 medium-8 columns content">
    <h3><?= h($passanger->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($passanger->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($passanger->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($passanger->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($passanger->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adresse') ?></th>
            <td><?= h($passanger->adresse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ville') ?></th>
            <td><?= h($passanger->ville) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($passanger->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pays') ?></th>
            <td><?= h($passanger->pays) ?></td>
        </tr>
    </table>
</div>
