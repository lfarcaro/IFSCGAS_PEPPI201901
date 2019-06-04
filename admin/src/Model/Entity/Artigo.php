<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Artigo Entity
 *
 * @property int $id
 * @property int $designer_id
 * @property int $categoria_id
 * @property string $codigo
 * @property string $nome
 * @property string $descricao_breve
 * @property string $descricao_completa
 * @property string $disponibilidade
 * @property bool $customizavel
 * @property \Cake\I18n\FrozenTime $criacao
 * @property \Cake\I18n\FrozenTime $atualizacao
 * @property string|null $variacoes_disponiveis
 * @property int $numero_visualizacoes
 * @property int $numero_favoritacoes
 * @property int $numero_compartilhamentos
 *
 * @property \App\Model\Entity\Designer $designer
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\ArtigoFotografia[] $artigo_fotografias
 * @property \App\Model\Entity\LogContatodesigner[] $log_contatodesigners
 * @property \App\Model\Entity\LogCustomizaco[] $log_customizacoes
 */
class Artigo extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'designer_id' => false,
        'categoria_id' => true,
        'codigo' => true,
        'nome' => true,
        'descricao_breve' => true,
        'descricao_completa' => true,
        'disponibilidade' => true,
        'customizavel' => true,
        'criacao' => false,
        'atualizacao' => false,
        'variacoes_disponiveis' => true,
        'numero_visualizacoes' => false,
        'numero_favoritacoes' => false,
        'numero_compartilhamentos' => false,
        'designer' => true,
        'categoria' => true,
        'artigo_fotografias' => true,
        'log_contatodesigners' => true,
        'log_customizacoes' => true
    ];
}
