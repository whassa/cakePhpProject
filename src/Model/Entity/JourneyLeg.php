<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JourneyLeg Entity
 *
 * @property int $id
 * @property int $booking_id
 * @property int $leg_id
 *
 * @property \App\Model\Entity\Booking $booking
 * @property \App\Model\Entity\Leg $leg
 */
class JourneyLeg extends Entity
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
