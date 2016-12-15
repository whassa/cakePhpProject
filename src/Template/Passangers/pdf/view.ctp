<div class="articles view large-9 medium-8 columns content">
    <h1><?= h($passanger->prenom.' '.$passanger->nom) ?></h3>
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
