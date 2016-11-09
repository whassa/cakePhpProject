<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Leg Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $actual_departure_time
 * @property \Cake\I18n\Time $actual_arrival_time
 *
 * @property \App\Model\Entity\JourneyLeg[] $journey_legs
 */
class Leg extends Entity
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
