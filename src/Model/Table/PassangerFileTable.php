<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PassangerFile Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Passangers
 * @property \Cake\ORM\Association\BelongsTo $Files
 *
 * @method \App\Model\Entity\PassangerFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\PassangerFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PassangerFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PassangerFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PassangerFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PassangerFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PassangerFile findOrCreate($search, callable $callback = null)
 */
class PassangerFileTable extends Table
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

        $this->table('passanger_file');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Passangers', [
            'foreignKey' => 'passanger_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Files', [
            'foreignKey' => 'files_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['files_id'], 'Files'));

        return $rules;
    }
}
