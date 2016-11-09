<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Legs Model
 *
 * @property \Cake\ORM\Association\HasMany $JourneyLegs
 *
 * @method \App\Model\Entity\Leg get($primaryKey, $options = [])
 * @method \App\Model\Entity\Leg newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Leg[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Leg|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Leg patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Leg[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Leg findOrCreate($search, callable $callback = null)
 */
class LegsTable extends Table
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

        $this->table('legs');
        $this->displayField('actual_departure_time');
        $this->primaryKey('id');

        $this->hasMany('JourneyLegs', [
            'foreignKey' => 'leg_id'
        ]);
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
            ->dateTime('actual_departure_time')
            ->requirePresence('actual_departure_time', 'create')
            ->notEmpty('actual_departure_time');

        $validator
            ->dateTime('actual_arrival_time')
            ->requirePresence('actual_arrival_time', 'create')
            ->notEmpty('actual_arrival_time');

        return $validator;
    }
}
