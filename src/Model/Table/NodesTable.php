<?php
namespace App\Model\Table;

use App\Model\Entity\Node;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nodes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Apps
 * @property \Cake\ORM\Association\BelongsTo $Categories
 */
class NodesTable extends Table
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

        $this->table('nodes');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Apps', [
            'foreignKey' => 'apps_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'categories_id'
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

        $validator
            ->allowEmpty('quantity');

        $validator
            ->integer('status');
            //->allowEmpty('status');

        $validator
            ->allowEmpty('price');

        $validator
            ->allowEmpty('thumb');

        $validator
            ->allowEmpty('image');

        $validator ->add('status', 'inList', [
            'rule' => ['inList', ['1', '2', '3']],
            'message' => 'Please enter a valid Status'
        ]);

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
        $rules->add($rules->existsIn(['apps_id'], 'Apps'));
        $rules->add($rules->existsIn(['categories_id'], 'Categories'));
        return $rules;
    }

    public function findByType(Query $query, $node_type = [])
    {
        return $query->where(['node_type' => $node_type['node_type']]);
    }

    public function findNodeTypes(Query $query)
    {
        return $query->select(['node_type'])->distinct();
    }

    public function findPages(Query $query)
    {
        return $query->select(['id', 'title'])->where(['node_type' => 'page'])->distinct();
    }
}
