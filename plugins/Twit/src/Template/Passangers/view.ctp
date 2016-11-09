<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li><?= $this->Html->link(__('Edit Passanger'), ['action' => 'edit', $passanger->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Passanger'), ['action' => 'delete', $passanger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passanger->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Passangers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passanger'), ['action' => 'add']) ?> </li>
       </ul>
    </div>
    
</div>


<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h3><?= h($passanger->prenom) ?></h3>
    <table class="table">
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
</div>
