<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LegsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LegsTable Test Case
 */
class LegsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LegsTable
     */
    public $Legs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.legs',
        'app.journey_legs',
        'app.bookings',
        'app.passangers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Legs') ? [] : ['className' => 'App\Model\Table\LegsTable'];
        $this->Legs = TableRegistry::get('Legs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Legs);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
