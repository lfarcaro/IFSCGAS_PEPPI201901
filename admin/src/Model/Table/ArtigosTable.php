<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Artigos Model
 *
 * @property \App\Model\Table\DesignersTable|\Cake\ORM\Association\BelongsTo $Designers
 * @property \App\Model\Table\CategoriasTable|\Cake\ORM\Association\BelongsTo $Categorias
 * @property \App\Model\Table\ArtigoFotografiasTable|\Cake\ORM\Association\HasMany $ArtigoFotografias
 * @property \App\Model\Table\LogContatodesignersTable|\Cake\ORM\Association\HasMany $LogContatodesigners
 * @property \App\Model\Table\LogCustomizacoesTable|\Cake\ORM\Association\HasMany $LogCustomizacoes
 *
 * @method \App\Model\Entity\Artigo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Artigo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Artigo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Artigo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Artigo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Artigo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Artigo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Artigo findOrCreate($search, callable $callback = null, $options = [])
 */
class ArtigosTable extends Table
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

        $this->setTable('artigos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Designers', [
            'foreignKey' => 'designer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ArtigoFotografias', [
            'foreignKey' => 'artigo_id'
        ]);
        $this->hasMany('LogContatodesigners', [
            'foreignKey' => 'artigo_id'
        ]);
        $this->hasMany('LogCustomizacoes', [
            'foreignKey' => 'artigo_id'
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
            ->scalar('codigo')
            ->maxLength('codigo', 32)
            ->requirePresence('codigo', 'create')
            ->allowEmptyString('codigo', false)
            ->add('codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('nome')
            ->maxLength('nome', 128)
            ->requirePresence('nome', 'create')
            ->allowEmptyString('nome', false);

        $validator
            ->scalar('descricao_breve')
            ->maxLength('descricao_breve', 512)
            ->requirePresence('descricao_breve', 'create')
            ->allowEmptyString('descricao_breve', false);

        $validator
            ->scalar('descricao_completa')
            ->requirePresence('descricao_completa', 'create')
            ->allowEmptyString('descricao_completa', false);

        $validator
            ->scalar('disponibilidade')
            ->maxLength('disponibilidade', 1)
            ->requirePresence('disponibilidade', 'create')
            ->allowEmptyString('disponibilidade', false);

        $validator
            ->boolean('customizavel')
            ->requirePresence('customizavel', 'create')
            ->allowEmptyString('customizavel', false);

        $validator
            ->dateTime('criacao')
            ->requirePresence('criacao', 'create')
            ->allowEmptyDateTime('criacao', false);

        $validator
            ->dateTime('atualizacao')
            ->requirePresence('atualizacao', 'create')
            ->allowEmptyDateTime('atualizacao', false);

        $validator
            ->scalar('variacoes_disponiveis')
            ->maxLength('variacoes_disponiveis', 4294967295)
            ->allowEmptyString('variacoes_disponiveis');

        $validator
            ->integer('numero_visualizacoes')
            ->requirePresence('numero_visualizacoes', 'create')
            ->allowEmptyString('numero_visualizacoes', false);

        $validator
            ->integer('numero_favoritacoes')
            ->requirePresence('numero_favoritacoes', 'create')
            ->allowEmptyString('numero_favoritacoes', false);

        $validator
            ->integer('numero_compartilhamentos')
            ->requirePresence('numero_compartilhamentos', 'create')
            ->allowEmptyString('numero_compartilhamentos', false);

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
        $rules->add($rules->isUnique(['codigo']));
        $rules->add($rules->existsIn(['designer_id'], 'Designers'));
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));

        return $rules;
    }
}
