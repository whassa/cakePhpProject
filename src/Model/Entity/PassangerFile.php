<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PassangerFile Entity
 *
 * @property int $id
 * @property int $passanger_id
 * @property int $files_id
 *
 * @property \App\Model\Entity\Passanger $passanger
 * @property \App\Model\Entity\File $file
 */
class PassangerFile extends Entity
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
        'id' => false
    ];
}
