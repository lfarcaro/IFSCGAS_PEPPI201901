<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Designers Model
 *
 * @property \App\Model\Table\ArtigosTable|\Cake\ORM\Association\HasMany $Artigos
 *
 * @method \App\Model\Entity\Designer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Designer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Designer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Designer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Designer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Designer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Designer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Designer findOrCreate($search, callable $callback = null, $options = [])
 */
class DesignersTable extends Table
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

        $this->setTable('designers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Artigos', [
            'foreignKey' => 'designer_id'
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
            ->scalar('senha')
            ->maxLength('senha', 64)
            ->requirePresence('senha', 'create')
            ->allowEmptyString('senha', false);

        $validator
            ->boolean('aprovado')
            ->requirePresence('aprovado', 'create')
            ->allowEmptyString('aprovado', false);

        $validator
            ->scalar('nome')
            ->maxLength('nome', 256)
            ->requirePresence('nome', 'create')
            ->allowEmptyString('nome', false);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false)
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 32)
            ->allowEmptyString('telefone');

        $validator
            ->scalar('celular')
            ->maxLength('celular', 32)
            ->allowEmptyString('celular');

        $validator
            ->boolean('celular_whatsapp')
            ->allowEmptyString('celular_whatsapp');

        $validator
            ->dateTime('inscricao')
            ->requirePresence('inscricao', 'create')
            ->allowEmptyDateTime('inscricao', false);

        $validator
            ->dateTime('atualizacao')
            ->requirePresence('atualizacao', 'create')
            ->allowEmptyDateTime('atualizacao', false);

        $validator
            ->scalar('curso')
            ->maxLength('curso', 256)
            ->allowEmptyString('curso');

        $validator
            ->scalar('fase')
            ->maxLength('fase', 128)
            ->allowEmptyString('fase');

        $validator
            ->scalar('apresentacao_breve')
            ->maxLength('apresentacao_breve', 512)
            ->requirePresence('apresentacao_breve', 'create')
            ->allowEmptyString('apresentacao_breve', false);

        $validator
            ->scalar('apresentacao_detalhada')
            ->maxLength('apresentacao_detalhada', 4294967295)
            ->requirePresence('apresentacao_detalhada', 'create')
            ->allowEmptyString('apresentacao_detalhada', false);

        $validator
            ->scalar('caminho_fotografia')
            ->maxLength('caminho_fotografia', 512)
            ->allowEmptyString('caminho_fotografia');

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
