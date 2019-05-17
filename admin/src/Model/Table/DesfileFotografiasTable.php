<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DesfileFotografias Model
 *
 * @property \App\Model\Table\DesfilesTable|\Cake\ORM\Association\BelongsTo $Desfiles
 *
 * @method \App\Model\Entity\DesfileFotografia get($primaryKey, $options = [])
 * @method \App\Model\Entity\DesfileFotografia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DesfileFotografia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DesfileFotografia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DesfileFotografia saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DesfileFotografia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DesfileFotografia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DesfileFotografia findOrCreate($search, callable $callback = null, $options = [])
 */
class DesfileFotografiasTable extends Table
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

        $this->setTable('desfile_fotografias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Desfiles', [
            'foreignKey' => 'desfile_id',
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
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('ordem')
            ->requirePresence('ordem', 'create')
            ->allowEmptyString('ordem', false);

        $validator
            ->scalar('nome_arquivo')
            ->maxLength('nome_arquivo', 128)
            ->requirePresence('nome_arquivo', 'create')
            ->allowEmptyString('nome_arquivo', false);

        $validator
            ->scalar('caminho_arquivo')
            ->maxLength('caminho_arquivo', 512)
            ->requirePresence('caminho_arquivo', 'create')
            ->allowEmptyString('caminho_arquivo', false);

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
        $rules->add($rules->existsIn(['desfile_id'], 'Desfiles'));

        return $rules;
    }
}
