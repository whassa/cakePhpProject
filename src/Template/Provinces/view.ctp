<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Province'), ['action' => 'edit', $province->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Province'), ['action' => 'delete', $province->id], ['confirm' => __('Are you sure you want to delete # {0}?', $province->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Provinces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Province'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pays'), ['controller' => 'Pays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay'), ['controller' => 'Pays', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="provinces view large-9 medium-8 columns content">
    <h3><?= h($province->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($province->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pay') ?></th>
            <td><?= $province->has('pay') ? $this->Html->link($province->pay->nom, ['controller' => 'Pays', 'action' => 'view', $province->pay->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($province->id) ?></td>
        </tr>
    </table>
</div>
