<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Desfiles Model
 *
 * @property \App\Model\Table\DesfileFotografiasTable|\Cake\ORM\Association\HasMany $DesfileFotografias
 *
 * @method \App\Model\Entity\Desfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\Desfile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Desfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Desfile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Desfile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Desfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Desfile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Desfile findOrCreate($search, callable $callback = null, $options = [])
 */
class DesfilesTable extends Table
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

        $this->setTable('desfiles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('DesfileFotografias', [
            'foreignKey' => 'desfile_id'
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
            ->date('data')
            ->requirePresence('data', 'create')
            ->allowEmptyDate('data', false);

        $validator
            ->scalar('turma')
            ->maxLength('turma', 128)
            ->requirePresence('turma', 'create')
            ->allowEmptyString('turma', false);

        $validator
            ->scalar('descricao_breve')
            ->maxLength('descricao_breve', 512)
            ->requirePresence('descricao_breve', 'create')
            ->allowEmptyString('descricao_breve', false);

        $validator
            ->scalar('descricao_detalhada')
            ->maxLength('descricao_detalhada', 4294967295)
            ->requirePresence('descricao_detalhada', 'create')
            ->allowEmptyString('descricao_detalhada', false);

        $validator
            ->scalar('caminho_capa')
            ->maxLength('caminho_capa', 512)
            ->allowEmptyString('caminho_capa');

        return $validator;
    }
}
