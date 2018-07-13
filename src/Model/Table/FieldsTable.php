<?php
namespace App\Model\Table;

use App\Model\Entity\Field;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fields Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fieldtypes
 * @property \Cake\ORM\Association\BelongsTo $Apps
 */
class FieldsTable extends Table
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

        $this->table('fields');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('Fieldtypes', [
            'foreignKey' => 'fieldTypes_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Apps', [
            'foreignKey' => 'apps_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsToMany('Categories', [
            'foreignKey' => 'field_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'categories_fields'
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
            ->allowEmpty('title');

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
        $rules->add($rules->existsIn(['fieldTypes_id'], 'Fieldtypes'));
        $rules->add($rules->existsIn(['apps_id'], 'Apps'));
        return $rules;
    }
}
