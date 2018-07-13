<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Field Entity.
 *
 * @property int $id
 * @property int $fieldTypes_id
 * @property \App\Model\Entity\Fieldtype $fieldtype
 * @property int $apps_id
 * @property \App\Model\Entity\App $app
 * @property string $title
 * @property \Cake\I18n\Time $created
 */
class Field extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
