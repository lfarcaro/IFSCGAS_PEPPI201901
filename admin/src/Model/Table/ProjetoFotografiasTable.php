<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjetoFotografias Model
 *
 * @property \App\Model\Table\ProjetosTable|\Cake\ORM\Association\BelongsTo $Projetos
 *
 * @method \App\Model\Entity\ProjetoFotografia get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjetoFotografia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjetoFotografia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjetoFotografia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjetoFotografia saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjetoFotografia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjetoFotografia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjetoFotografia findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjetoFotografiasTable extends Table
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

        $this->setTable('projeto_fotografias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
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
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'));

        return $rules;
    }
}
