<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Administrador Entity
 *
 * @property int $id
 * @property string $senha
 * @property string $nome
 * @property string $email
 * @property bool $recebe_contato
 */
class Administrador extends Entity
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
        'senha' => false,
        'nome' => true,
        'email' => true,
        'recebe_contato' => true
    ];
}
