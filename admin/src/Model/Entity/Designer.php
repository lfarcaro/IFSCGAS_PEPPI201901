<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Designer Entity
 *
 * @property int $id
 * @property string $senha
 * @property bool $aprovado
 * @property string $nome
 * @property string $email
 * @property string|null $telefone
 * @property string|null $celular
 * @property bool|null $celular_whatsapp
 * @property \Cake\I18n\FrozenTime $inscricao
 * @property \Cake\I18n\FrozenTime $atualizacao
 * @property string|null $curso
 * @property string|null $fase
 * @property string $apresentacao_breve
 * @property string $apresentacao_detalhada
 * @property string|null $caminho_fotografia
 *
 * @property \App\Model\Entity\Artigo[] $artigos
 */
class Designer extends Entity
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
        'aprovado' => true,
        'nome' => true,
        'email' => false,
        'telefone' => true,
        'celular' => true,
        'celular_whatsapp' => true,
        'inscricao' => false,
        'atualizacao' => false,
        'curso' => true,
        'fase' => true,
        'apresentacao_breve' => true,
        'apresentacao_detalhada' => true,
        'caminho_fotografia' => false,
        'artigos' => true
    ];
}
