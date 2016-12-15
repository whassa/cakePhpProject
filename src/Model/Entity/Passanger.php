<?php
namespace App\Model\Entity;
use Cake\ORM\Behavior\Translate\TranslateTrait;
use Cake\ORM\Entity;

/**
 * Passanger Entity
 *
 * @property int $id
 * @property string $prenom
 * @property string $nom
 * @property string $telephone
 * @property string $email
 * @property string $adresse
 * @property string $ville
 * @property string $province
 * @property string $pays
 *
 * @property \App\Model\Entity\Booking[] $bookings
 * @property \App\Model\Entity\PassangerFile[] $passanger_file
 */
class Passanger extends Entity
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
