<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Desfile Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $data
 * @property string $turma
 * @property string $descricao_breve
 * @property string $descricao_detalhada
 * @property string $caminho_capa
 *
 * @property \App\Model\Entity\DesfileFotografia[] $desfile_fotografias
 */
class Desfile extends Entity
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
        'data' => true,
        'turma' => true,
        'descricao_breve' => true,
        'descricao_detalhada' => true,
        'caminho_capa' => false,
        'desfile_fotografias' => true
    ];
}
