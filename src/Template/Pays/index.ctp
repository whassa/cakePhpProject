<?php echo $this->Html->script('autocomplete.js', ['block' => true]); ?>
<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li><?= $this->Html->link(__('New Pays'), ['action' => 'add']) ?></li>
       </ul>
    </div>
    
</div>

<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
	
	 <?php
            echo $this->Form->input('nom du pays', ['id' => 'autocomplete']);
    ?>
	
	<!--
    <h3><?//= __('Pays') ?></h3>
     <table  class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?//= $this->Paginator->sort('nom') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php // foreach ($pays as $pay): ?>
            <tr>
                <td><?//= h($pay->nom) ?></td>
                <td class="actions">
                    <?//= $this->Html->link(__('View'), ['action' => 'view', $pay->id]) ?>
                    <?//= $this->Html->link(__('Edit'), ['action' => 'edit', $pay->id]) ?>
                    <?//= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pay->id)]) ?>
                </td>
            </tr>
            <?php //endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?//= $this->Paginator->prev('< ' . __('previous')) ?>
            <?//= $this->Paginator->numbers() ?>
            <?//= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?//= $this->Paginator->counter() ?></p>
    </div>
	!-->
	</div>
</div>
