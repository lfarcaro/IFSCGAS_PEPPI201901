<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Projeto Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $turma
 * @property string $fase
 * @property \Cake\I18n\FrozenDate $datainicio
 * @property \Cake\I18n\FrozenDate $datatermino
 * @property string $descricao_breve
 * @property string $descricao_detalhada
 * @property string $caminho_capa
 *
 * @property \App\Model\Entity\ProjetoFotografia[] $projeto_fotografias
 */
class Projeto extends Entity
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
        'nome' => true,
        'turma' => true,
        'fase' => true,
        'datainicio' => true,
        'datatermino' => true,
        'descricao_breve' => true,
        'descricao_detalhada' => true,
        'caminho_capa' => true,
        'projeto_fotografias' => true
    ];
}
