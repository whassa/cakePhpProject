<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Passangers
 * @property \Cake\ORM\Association\HasMany $JourneyLegs
 *
 * @method \App\Model\Entity\Booking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Booking newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Booking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Booking|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Booking findOrCreate($search, callable $callback = null)
 */
class BookingsTable extends Table
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

        $this->table('bookings');
        $this->displayField('datebooking');
        $this->primaryKey('id');

        $this->belongsTo('Passangers', [
            'foreignKey' => 'passanger_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('JourneyLegs', [
            'foreignKey' => 'booking_id'
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
            ->date('datebooking')
            ->requirePresence('datebooking', 'create')
            ->notEmpty('datebooking');

        $validator
            ->integer('numberinparty')
            ->requirePresence('numberinparty', 'create')
            ->notEmpty('numberinparty');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['passanger_id'], 'Passangers'));

        return $rules;
    }
}
