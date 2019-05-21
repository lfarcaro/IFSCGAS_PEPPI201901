<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projetos Model
 *
 * @property \App\Model\Table\ProjetoFotografiasTable|\Cake\ORM\Association\HasMany $ProjetoFotografias
 *
 * @method \App\Model\Entity\Projeto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Projeto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Projeto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Projeto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projeto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projeto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Projeto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Projeto findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjetosTable extends Table
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

        $this->setTable('projetos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('ProjetoFotografias', [
            'foreignKey' => 'projeto_id'
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
            ->scalar('nome')
            ->maxLength('nome', 128)
            ->requirePresence('nome', 'create')
            ->allowEmptyString('nome', false);

        $validator
            ->scalar('turma')
            ->maxLength('turma', 128)
            ->requirePresence('turma', 'create')
            ->allowEmptyString('turma', false);

        $validator
            ->scalar('fase')
            ->maxLength('fase', 128)
            ->requirePresence('fase', 'create')
            ->allowEmptyString('fase', false);

        $validator
            ->date('datainicio')
            ->requirePresence('datainicio', 'create')
            ->allowEmptyDate('datainicio', false);

        $validator
            ->date('datatermino')
            ->requirePresence('datatermino', 'create')
            ->allowEmptyDate('datatermino', false);

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
