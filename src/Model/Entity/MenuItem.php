<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MenuItem Entity.
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property int $parent_id
 * @property \App\Model\Entity\MenuItem $parent_menu_item
 * @property int $menu_id
 * @property \App\Model\Entity\Menu $menu
 * @property int $lft
 * @property int $rght
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\MenuItem[] $child_menu_items
 */
class MenuItem extends Entity
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
