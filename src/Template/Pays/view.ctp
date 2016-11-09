<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pay'), ['action' => 'edit', $pay->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pay'), ['action' => 'delete', $pay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pay->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pays view large-9 medium-8 columns content">
    <h3><?= h($pay->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($pay->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pay->id) ?></td>
        </tr>
    </table>
</div>
