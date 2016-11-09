

<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
         <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $file->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?></li>
       </ul>
    </div>
    
</div>


<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <?= $this->Form->create($file) ?>
    <fieldset>
        <legend><?= __('Edit File') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('path');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
