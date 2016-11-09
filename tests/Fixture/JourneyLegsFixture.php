<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JourneyLegsFixture
 *
 */
class JourneyLegsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'booking_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'leg_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'Booking_id' => ['type' => 'index', 'columns' => ['booking_id'], 'length' => []],
            'leg_id' => ['type' => 'index', 'columns' => ['leg_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'booking_id' => ['type' => 'foreign', 'columns' => ['booking_id'], 'references' => ['Bookings', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'leg_id' => ['type' => 'foreign', 'columns' => ['leg_id'], 'references' => ['Legs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'booking_id' => 1,
            'leg_id' => 1
        ],
    ];
}
