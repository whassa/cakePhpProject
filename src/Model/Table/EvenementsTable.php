<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Evenements Model
 *
 * @method \App\Model\Entity\Evenement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evenement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Evenement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evenement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evenement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evenement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evenement findOrCreate($search, callable $callback = null)
 */
class EvenementsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('evenements');
        $this->displayField('name');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->boolean('is_done')
            ->allowEmpty('is_done');

        return $validator;
    }
}
