<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $id
 * @property int $passanger_id
 * @property \Cake\I18n\Time $datebooking
 * @property int $numberinparty
 *
 * @property \App\Model\Entity\Passanger $passanger
 * @property \App\Model\Entity\JourneyLeg[] $journey_legs
 */
class Booking extends Entity
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
        'bookingid' => false
    ];
}
