<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Passanger'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passangers index large-9 medium-8 columns content">
    <h3><?= __('Passangers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('prenom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adresse') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ville') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pays') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($passangers as $passanger): ?>
            <tr>
                <td><?= h($passanger->prenom) ?></td>
                <td><?= h($passanger->nom) ?></td>
                <td><?= h($passanger->telephone) ?></td>
                <td><?= h($passanger->email) ?></td>
                <td><?= h($passanger->adresse) ?></td>
                <td><?= h($passanger->ville) ?></td>
                <td><?= h($passanger->province) ?></td>
                <td><?= h($passanger->pays) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $passanger->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $passanger->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $passanger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passanger->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
