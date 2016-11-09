<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PassangerFileFixture
 *
 */
class PassangerFileFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'passanger_file';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'passanger_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'files_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'passanger_id' => ['type' => 'index', 'columns' => ['passanger_id'], 'length' => []],
            'files_id' => ['type' => 'index', 'columns' => ['files_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'filesId' => ['type' => 'foreign', 'columns' => ['files_id'], 'references' => ['files', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'passagerId' => ['type' => 'foreign', 'columns' => ['passanger_id'], 'references' => ['Passangers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'passanger_id' => 1,
            'files_id' => 1
        ],
    ];
}
