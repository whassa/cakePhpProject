<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Passangers Model
 *
 * @property \Cake\ORM\Association\HasMany $Bookings
 * @property \Cake\ORM\Association\HasMany $PassangerFile
 *
 * @method \App\Model\Entity\Passanger get($primaryKey, $options = [])
 * @method \App\Model\Entity\Passanger newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Passanger[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Passanger|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Passanger patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Passanger[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Passanger findOrCreate($search, callable $callback = null)
 */
class PassangersTable extends Table
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
		
        $this->table('passangers');
        $this->displayField('prenom');
        $this->primaryKey('id');
		
		//$this->addBehavior('Translate', ['fields' => ['prenom']]);
		
        $this->hasMany('Bookings', [
            'foreignKey' => 'passanger_id'
        ]);
        $this->hasMany('PassangerFile', [
            'foreignKey' => 'passanger_id'
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
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom');

        $validator
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->requirePresence('telephone', 'create')
            ->notEmpty('telephone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->requirePresence('ville', 'create')
            ->notEmpty('ville');

        $validator
            ->requirePresence('province', 'create')
            ->notEmpty('province');

        $validator
            ->requirePresence('pays', 'create')
            ->notEmpty('pays');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
