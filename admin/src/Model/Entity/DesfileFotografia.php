<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DesfileFotografia Entity
 *
 * @property int $id
 * @property int $desfile_id
 * @property int $ordem
 * @property string $nome_arquivo
 * @property string $caminho_arquivo
 *
 * @property \App\Model\Entity\Desfile $desfile
 */
class DesfileFotografia extends Entity
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
        'desfile_id' => true,
        'ordem' => true,
        'nome_arquivo' => true,
        'caminho_arquivo' => true,
        'desfile' => true
    ];
}
